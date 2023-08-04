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
    <!-- akhir Bootstrap CSS -->

    <!-- judul halaman -->
    <title>Zaily Drink's</title>
    <!-- akhir judul -->

</head>
<body>
<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=masuk");
	}
 
	?>

    <!-- Navbar -->
    <?php
      include 'navbar.php';
    ?>
    <!-- akhir navbar -->


      <!-- content -->
      <div class="container-fluid pb-5">

        <div class="judul text-center mt-5">
            <h1 class="font-weight-bold">DAFTAR MENU</h1>
            <hr><br>
        </div>

        <div class="container-fluid ">
          <div class="row d-flex justify-content-center">
          
            <!-- memanggil data dari tabel produk -->
            <?php 
            include 'koneksi.php';
            $data = mysqli_query($koneksi,"select * from produk");
            while($d = mysqli_fetch_array($data)){
            ?>

            <!-- card -->
            <form action="beli.php?id=<?php echo $d['id_produk']; ?>" method="post" class="col-3 mx-4">
            <div class="card col-12 mb-4 text-center pt-3">
                <img src="images/produk/<?php echo $d['foto']; ?>" class="img-fluid" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $d['nama_produk']; ?></h5>
                  <p><?php echo $d['ket']; ?></p>
                  <h3 class="card-text">Rp. <?php echo $d['harga']; ?></h3>
                  <input type="number" class="form-control my-2 " name="jml" placeholder="Masukan Jumlah" required>
                  <button type="submit" class="btn tbeli text-light">Beli</button>
                </div>
            </div>
            </form>
            <!-- akhir card -->
            <?php 
            }
            ?>
              
            </div>
        </div>
      </div>
    
      <!-- akhir content -->

      <!-- footer -->
      <div class="container-fluid fuut">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2022 -  Designed by Ferdiansyah</p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div>
      <!-- akhir footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>