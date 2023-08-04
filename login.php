<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="indexx.css">
  </head>
  <body style="background: linear-gradient(rgba(36, 156, 204, 0.7),rgba(255,142,200,0.7));">
  
  <!-- menampilkan pesan alert-->
  <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script>alert('username dan password salah');</script>";
		}else if($_GET['pesan']=="input"){
			echo "<script>alert('data berhasil terdaftar');</script>";
		}else if($_GET['pesan']=="masuk"){
			echo "<script>alert('silahkan login terlebih dahulu');</script>";
		}
	}
	?>
    <!-- content -->
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="images/icon/cewek.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <!-- form login -->
              <form action="cek_login.php" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label lbl" for="form1Example13">Username</label>
                    <input type="text" id="form1Example13" class="form-control form-control-lg" name="username" required />
                  
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label lbl" for="form1Example23">Password</label>
                  <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" required />
                  
                </div>
      
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block masuk">Masuk</button><br>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>

                <a type="submit" href="register.php" class="btn btn-primary btn-lg btn-block daftar">Daftar</a>
      
              </form>
              <!-- akhir form -->
            </div>
          </div>
        </div>
      </section>
      <!-- akhr content -->
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>