<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_produk'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from produk where id_produk='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:zproduk.php?pesan=hapus");
 
?>