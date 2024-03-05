<?php
include 'database.php'; // Sertakan file koneksi ke database

// Periksa apakah nomor barang dikirim melalui parameter GET
if(isset($_GET['no'])) {
    // Tangkap nomor barang dari parameter GET
    $no = $_GET['no'];

    // Buat kueri SQL untuk mengambil data barang berdasarkan nomor
    $query = "SELECT * FROM tbl_barang WHERE no = $no";

    // Jalankan kueri SQL
    $result = mysqli_query($db, $query);

    // Periksa apakah data barang ditemukan
    if(mysqli_num_rows($result) == 1) {
        // Ambil data barang dari hasil kueri
        $barang = mysqli_fetch_assoc($result);
    } else {
        // Jika data barang tidak ditemukan, redirect ke halaman utama dengan pesan error
        header("Location: index.php?pesan=edit_tidak_ditemukan");
        exit(); // Keluar dari skrip setelah mengalihkan
    }
} else {
    // Jika nomor barang tidak ditemukan di parameter URL, redirect ke halaman utama dengan pesan error
    header("Location: index.php?pesan=edit_tidak_ditemukan");
    exit(); // Keluar dari skrip setelah mengalihkan
}
?>

<?php include 'layout/header.php'; ?>

<div class="container mt-5">
    <h1>Edit Barang</h1>
    <hr>

    <form action="update.php" method="POST">
        <!-- Nomor barang tidak ditampilkan -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $barang['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" name="jumlah" value="<?php echo $barang['jumlah']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" name="harga" value="<?php echo $barang['harga']; ?>" required>
        </div>
        <input type="hidden" name="no" value="<?php echo $barang['no']; ?>"> <!-- Kirim nomor barang tersembunyi -->
        <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
