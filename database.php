<?php
    $host = 'localhost'; // Ganti dengan host database Anda
    $username = 'root'; // Ganti dengan username database Anda
    $password = ''; // Ganti dengan password database Anda
    $database = '4sia7'; // Ganti dengan nama database Anda

    // Buat koneksi ke database
    $db = mysqli_connect($host, $username, $password, $database);

    // Periksa koneksi
    if(!$db){
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>
