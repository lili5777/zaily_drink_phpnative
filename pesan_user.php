
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="indexx.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Zaily Drink's</title>
</head>
<body>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=masuk");
	}
 
	?>

<!-- menampilkan pesan -->
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="sukses"){
			echo "<script>alert(pesanan telah ditambahkan');</script>";
		}else if($_GET['pesan']=="hapus"){
			echo "<script>alert(pesanan telah dihapus');</script>";
		}
	}
	?>

<?php
  if(empty($_SESSION['pesanan']) or !isset($_SESSION['pesanan'])){
    echo "<script>alert('anda belum memesan, silahkan pesan terlebih dahulu');</script>";
    echo "<script>location='menu_user.php';</script>";
  }
?>



    <!-- Navbar -->
    <?php
      include 'navbar.php';
    ?>
    <!-- akhir navbar -->


      <!-- content -->
      <div class="container">
        <div class="judul-pesanan mt-5
        \">
         
          <h3 class="text-center font-weight-bold">DATA PESANAN</h3>
          
        </div>
        <table class="table table-bordered" id="example">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Pesanan</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Subtotal</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <?php $nomor=1; 
          $idd=$_SESSION['id'];
          ?>
            <?php $totalbelanja = 0; ?>
            <?php foreach ($_SESSION["pesanan"] as $id_produk => $jumlah) : ?>

            <?php 
            // koneksi
              include('koneksi.php');
              // meampilkan produk yang dipesan
              $s = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
              // // meampilkan produk yang dipesan
              // $s = mysqli_query($koneksi, "SELECT * FROM produk JOIN pemesanan_produk ON pemesanan_produk.id_produk= produk.id_produk JOIN user ON user.id=pemesanan_produk.id_user WHERE user.id='$idd'AND produk.id_produk='$id_produk'");
              
              $d = $s -> fetch_assoc();
              // menjumlahkan subtotalnya
              $subharga = $d["harga"]*$jumlah;
            ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $nomor; ?></th>
              <td><?php echo $d["nama_produk"]; ?></td>
              <td>Rp. <?php echo number_format($d["harga"]); ?></td>
              <td><?php echo $jumlah; ?></td>
              <td>Rp. <?php echo number_format($subharga); ?></td>
              <td>
                <a href="hapus_pesan.php?id=<?php echo $d['id_produk']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php $nomor++; ?>
            <?php $totalbelanja+=$subharga; ?>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4">Total Belanja</th>
              <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
            </tr>
          </tfoot>
        </table>
      </div>

      <form method="POST" action="">
        <div class="tpesan">
        <a href="menu_user.php" class="btn btn-primary btn-sm">Lihat Menu</a>
        <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
        </div>
      </form>
      <!-- akhir content -->
      <?php 
      if(isset($_POST['konfirm'])) {
          $tanggal=date("Y-m-d");

          // Menyimpan data ke tabel pemesanan
          $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pesan, total_harga) VALUES ('$tanggal', '$totalbelanja')");

          // Mendapatkan ID barusan
          $id_terbaru = $koneksi->insert_id;
          
          // Menyimpan data ke tabel pemesanan produk
          foreach ($_SESSION["pesanan"] as $id_produk => $jumlah)
          {
            $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_user,id_pesan, id_produk, jumlah) 
              VALUES ('$idd', '$id_terbaru', '$id_produk', '$jumlah') ");
          }          

          // Mengosongkan pesanan
          unset($_SESSION["pesanan"]);

          // Dialihkan ke halaman nota
          echo "<script>alert('Pemesanan Sukses!');</script>";
          echo "<script>location= 'menu_user.php'</script>";
      }
      ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>

</body>
</html>