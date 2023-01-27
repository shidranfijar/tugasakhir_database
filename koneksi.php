<?php

$servername = "localhost";
$database = "tugas_akhir";
$username = "root";
$password = "";

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi gagal apa berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil";


?>