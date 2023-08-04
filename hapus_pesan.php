<?php
session_start();
$id_produk= $_GET['id'];
unset($_SESSION['pesanan'][$id_produk]);

header("location:pesan_user.php?pesan=hapus");
?>