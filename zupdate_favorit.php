<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_favorit=$_POST['id_favorit'];
$foto =$_POST['foto'];
$nama =$_POST['nama'];
$ket = $_POST['ket'];
 
// update data ke database
mysqli_query($koneksi,"update favorit set foto='$foto', nama='$nama', ket='$ket' where id_favorit='$id_favorit'");
 
// mengalihkan halaman kembali ke index.php
header("location:zproduk.php?pesan=edit");
 
?>