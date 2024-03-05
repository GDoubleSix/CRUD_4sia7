<?php
    include 'database.php';
    function select($query){
        //panggil koneksi database
        global $db;
        $result = mysqli_query($db,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    $data_barang = select("SELECT * FROM tbl_barang");

    function create_barang($post){
        global $db;
        $nama = $post ['nama'];
        $jumlah = $post ['jumlah'];
        $harga = $post ['harga'];
        //query tambah data
        $query = "INSERT INTO tbl_barang VALUES(null,'$nama','$jumlah','$harga', CURRENT_TIMESTAMP())";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD PHP</title>
</head>