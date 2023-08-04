<?php
session_start();
//mendapaktkan id produk
$id_produk = $_GET['id'];
$jml= $_POST['jml'];

if(isset($_SESSION['pesanan'][$id_produk])){
    $_SESSION['pesanan'][$id_produk]+=$jml;
    // header("location:pesan_user.php?pesan=sukses");
}else{
    $_SESSION['pesanan'][$id_produk]=$jml;
    // header("location:pesan_user.php?pesan=sukses");
}
header("location:pesan_user.php?pesan=sukses");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>"
?>