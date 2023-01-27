<?php
include 'koneksi.php';

// update data barang

if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $product_name = $_POST['product_name'];
    $flavor = $_POST['flavor'];
    $price = $_POST['price'];

    $update = mysqli_query($koneksi, "update produk set product_name='$product_name',flavor='$flavor',price='$price' where idbarang='$idb'");
    if($update){
        header('location: home.php');
    }else{
        echo 'gagal';
        header('location: home.php');
    }

}
?>