<?php 
// membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tugas_akhir");


// delete modal

if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idbarang'];
    $sql = "DELETE FROM produk WHERE `idbarang` = '$idb'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('location:home.php');
    } else {
        echo "Gagal menghapus barang";
        header('location:home.php');
    }
}
?>
