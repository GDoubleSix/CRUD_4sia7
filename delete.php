<?php
include 'database.php'; // Sertakan file koneksi ke database

// Pastikan nomor barang telah dikirim melalui parameter GET
if(isset($_GET['no'])) {
    // Tangkap nomor barang dari parameter GET
    $no = $_GET['no'];

    // Buat kueri SQL untuk menghapus barang berdasarkan nomor
    $query = "DELETE FROM tbl_barang WHERE no = $no";

    // Jalankan kueri SQL
    if(mysqli_query($db, $query)) {
        // Jika penghapusan berhasil, redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?pesan=hapus_sukses");
        exit(); // Jangan lupa untuk keluar dari skrip setelah mengalihkan
    } else {
        // Jika terjadi kesalahan saat menjalankan kueri SQL, redirect ke halaman utama dengan pesan error
        header("Location: index.php?pesan=hapus_gagal");
        exit(); // Jangan lupa untuk keluar dari skrip setelah mengalihkan
    }
} else {
    // Jika nomor barang tidak ditemukan di parameter URL, redirect ke halaman utama dengan pesan error
    header("Location: index.php?pesan=hapus_tidak_ditemukan");
    exit(); // Jangan lupa untuk keluar dari skrip setelah mengalihkan
}
?>
