<?php
session_start();
require_once('koneksi.php');

$username = $_POST['username'];
$pass = $_POST['password'];
/* Cek data di database dengan tabel login */
$query = "select * from login where `username` = '$username' and  `password` = '$pass'  ";
$ambil_data = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($ambil_data);
// Jika ada maka boleh masuk ke menu index
if ($data) {
    // Cek status login
    if ($data['status'] == 1) {
        // setcookie('nama_login',$_POST['username'],time()+3600);
        $_SESSION['nama_login'] = $_POST['username'];
        if ($_POST['ingatkan']) {
            $_SESSION['ingatkan'] = true;
        }
        echo "<script>alert('Anda berhasil login');</script>";
        header("Location: home.php");
    } else {
        echo "<script>alert('Status belum aktivasi');</script>";
        header("Location: index.php?pesan=Status belum aktivasi");
    }
} else {
    // jika gagal. kasihkan info bahwa login gagal/ username tidak diketahui
    header("Location: index.php?pesan=Maaf data tidak ada");
}



// echo var_dump($_POST);
