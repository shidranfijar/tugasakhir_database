<?php
include_once('koneksi.php');


// echo var_dump($_POST);
// Kolom data di table
$number = $_POST['number'];
$product_name = $_POST['product_name'];
$product_image = $_FILES['product_image']['name'];
$flavor = $_POST['flavor'];
$stock = $_POST['stock'];
$price = $_POST['price'];


// echo "Selamat $product_name , alamat anda $product_image , berjenis kelamin $flavor No HP $stock , dengan email $price <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';



$insert_data = mysqli_query($koneksi, "INSERT into produk (`number`,`product_name`,`product_image`,`flavor`,`stock`,`price`) values ('$number','$product_name','$product_image','$flavor','$stock','$price') ");
if ($insert_data) {
    echo "<p>Data berhasil masuk</p>";
    header('location:home.php');
} else {
    echo "<p>Data gagal masuk</p>";
    // echo mysqli_error($koneksi);
}




echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];



move_uploaded_file($_FILES["product_image"]["tmp_name"], "assets/$product_image");
