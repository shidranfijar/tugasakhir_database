<?php
// membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tugas_akhir");

// menambahkan barang masuk
if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($koneksi, "SELECT * FROM produk where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_assoc($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahstock = $stocksekarang + $qty;

    $addtomasuk = mysqli_query($koneksi, "insert into masuk (idbarang, keterangan, qty) values ('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($koneksi, "update produk set stock ='$tambahstock' where idbarang='$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
}

// menambahkan barang keluar
if (isset($_POST['barangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($koneksi, "SELECT * FROM produk where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_assoc($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahstock = $stocksekarang - $qty;

    $addtokeluar = mysqli_query($koneksi, "insert into keluar (idbarang, penerima, qty) values ('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($koneksi, "update produk set stock ='$tambahstock' where idbarang='$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
}

// update info barang

if (isset($_POST['updatebarang'])) {
    $idb = $_POST['idb'];
    $product_name = $_POST['product_name'];
    $product_image = $_FILES['product_image']['name'];
    $flavor = $_POST['flavor'];
    $price = $_POST['price'];

    if (!empty($product_image)) {
        $path = "assets/" . $product_image;
        move_uploaded_file($_FILES['product_image']['tmp_name'], $path);
        $query = "UPDATE produk SET product_name='$product_name', product_image='$path', flavor='$flavor', price='$price' WHERE idb='$idb'";
    } else {
        $query = "UPDATE produk SET product_name='$product_name', flavor='$flavor', price='$price' WHERE idb='$idb'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diubah');</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}


// delete modal

if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];
    $sql = "DELETE FROM produk WHERE idbarang = '$idb'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "Barang berhasil dihapus";
    } else {
        echo "Gagal menghapus barang";
    }
}
?>

