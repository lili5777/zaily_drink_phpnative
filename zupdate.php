<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id=$_POST['id'];
$username =$_POST['username'];
$password =$_POST['password'];
$nama = $_POST['nama'];
$jkl =$_POST['jkl'];
$tlahir =$_POST['tlahir'];
$alamat = $_POST['alamat'];
$hp =$_POST['hp'];
 
// update data ke database
mysqli_query($koneksi,"update user set username='$username', password='$password', nama='$nama', jkl='$jkl', tlahir='$tlahir', alamat='$alamat', hp='$hp' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:zpelanggan.php?pesan=edit");
 
?>