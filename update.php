<?php
include 'database.php'; // Sertakan file koneksi ke database

// Periksa apakah permintaan pengiriman data melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data yang dikirimkan dari formulir
    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Buat kueri SQL untuk memperbarui data barang
    $query = "UPDATE tbl_barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE no = $no";

    // Jalankan kueri SQL
    $result = mysqli_query($db, $query);

    // Periksa apakah pembaruan berhasil dilakukan
    if ($result) {
        // Jika berhasil, redirect ke halaman utama dengan pesan sukses
        header("Location: index.php?pesan=update_sukses");
        exit(); // Keluar dari skrip setelah mengalihkan
    } else {
        // Jika gagal, redirect ke halaman utama dengan pesan error
        header("Location: index.php?pesan=update_gagal");
        exit(); // Keluar dari skrip setelah mengalihkan
    }
} else {
    // Jika pengguna mengakses file secara langsung tanpa metode POST, redirect ke halaman utama
    header("Location: index.php");
    exit(); // Keluar dari skrip setelah mengalihkan
}
?>
