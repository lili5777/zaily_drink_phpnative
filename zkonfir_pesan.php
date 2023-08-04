<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_pesan'];
$tanggal=date("Y-m-d");

// mengambil data sesuai idpesan
$query = "SELECT * FROM pemesanan WHERE id_pesan='$id'";
$result = mysqli_query($koneksi, $query);
if(mysqli_num_rows($result)>0) {
    $data = mysqli_fetch_array($result);
    $_SESSION["id"]  = $data["id"];
    $_SESSION["total_harga"] = $data["total_harga"];
}

$total=$_SESSION["total_harga"];
//Menambah data pada tabel histori
mysqli_query($koneksi,"INSERT INTO histori VALUES('','$id','$tanggal','$total')");
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pemesanan where id_pesan='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:zpesanan.php?pesan=hapus");
 
?>