<?php 
//memanggil file koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form register
$username =$_POST['username'];
$password =$_POST['password'];
$nama = $_POST['nama'];
$jkl =$_POST['jkl'];
$tlahir =$_POST['tlahir'];
$alamat = $_POST['alamat'];
$hp =$_POST['hp'];
$level = $_POST['level'];
 
//Menambah data pada tabel user
mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password','$nama','$jkl','$tlahir','$alamat','$hp','$level')");

//alihkan ke halaman login
header("location:login.php?pesan=input");
?>