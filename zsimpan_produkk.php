<?php 
//memanggil file koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form register
$foto =$_POST['foto'];
$nama_produk =$_POST['nama_produk'];
$harga = $_POST['harga'];
$ket =$_POST['ket'];

 
//Menambah data pada tabel user
mysqli_query($koneksi,"INSERT INTO produk VALUES('','$foto','$nama_produk','$harga','$ket')");

//alihkan ke halaman login
header("location:zproduk.php?pesan=input");
?>