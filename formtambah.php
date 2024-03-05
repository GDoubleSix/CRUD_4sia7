<?php
    include 'layout/header.php';

    //cek tombol tambah apakah berhasil atau tidak
    if(isset($_POST['tambah'])){
        if (create_barang($_POST) > 0){
            echo "<script>
                    alert('Data Barang Berhasil Ditambahkan');
                    document.location.href = 'index.php';
                </script>";
        }else{
            echo "<script>
                    alert('Data Barang Gagal Ditambahkan');
                    document.location.href = 'index.php';
                </script>";
        }
    }
    
?>

<div class="container mt-5">
    <h1>Tambah Barang</h1>
    <hr>
    
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label" >Nama Barang</label>
            <input type="text" class="form-control" name="nama" placeholder="nama barang" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label" >Jumlah Barang</label>
            <input type="number" class="form-control" name="jumlah" placeholder="jumlah barang" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label" >Harga Barang</label>
            <input type="number" class="form-control" name="harga" placeholder="harga barang" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary" style="float:right">Tambah</button>
    </form>
</div>

<?php
    include 'layout/footer.php';
?>