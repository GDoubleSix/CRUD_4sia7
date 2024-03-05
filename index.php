<?php
    include 'layout/header.php';
?>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Informasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <br>
    <h1>Data Barang</h1>
    <hr>
    <a class="text-light btn btn-primary" href="formtambah.php">Tambah Barang</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <?php foreach($data_barang as $barang):?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $barang['nama']; ?></td>
                <td><?php echo $barang['jumlah']; ?></td>
                <td><?php echo $barang['harga']; ?></td>
                <td><?php echo $barang['tanggal']; ?></td>
                <td>
                    <a href="formedit.php?no=<?php echo $barang['no']; ?>" class="btn btn-outline-primary">Ubah</a>
                    <a href="delete.php?no=<?php echo $barang['no']; ?>" class="btn btn-outline-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
	</table>
</div>

<script>
    // Ambil pesan dari parameter URL
    const urlParams = new URLSearchParams(window.location.search);
    const pesan = urlParams.get('pesan');

    // Tampilkan alert sesuai dengan pesan yang diterima
    if(pesan === 'hapus_sukses') {
        alert('Data Barang Berhasil Dihapus');
    } else if(pesan === 'hapus_gagal') {
        alert('Gagal menghapus data barang');
    } else if(pesan === 'hapus_tidak_ditemukan') {
        alert('Nomor Barang Tidak Ditemukan');
    }
</script>

<?php
    include 'layout/footer.php';
?>