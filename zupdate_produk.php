<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_produk=$_POST['id_produk'];
$foto =$_POST['foto'];
$nama_produk =$_POST['nama_produk'];
$harga = $_POST['harga'];
$ket = $_POST['ket'];
 
// update data ke database
mysqli_query($koneksi,"update produk set foto='$foto', nama_produk='$nama_produk', harga='$harga', ket='$ket' where id_produk='$id_produk'");
 
// mengalihkan halaman kembali ke index.php
header("location:zproduk.php?pesan=edit");
 
?>