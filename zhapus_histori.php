<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_histori'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from histori where id_histori='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:zhistori.php?pesan=hapus");
 
?>