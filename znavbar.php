<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=masuk");
	}

    // mengambil data id sesuai login
    // menghubungkan php dengan koneksi database
    include 'koneksi.php';
    //membuat_sesion_USER
    $username=$_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    //membuat_sesion_post
    // $id_admin=$_SESSION['id'];
    // $query = "SELECT * FROM user WHERE id='$id_admin'";
    // $res = mysqli_query($koneksi, $query);
?>

<!-- mengambil data sesuai id login -->
<?php 
    if(mysqli_num_rows($result)>0) {
        $data = mysqli_fetch_array($result);
        $_SESSION["id"]  = $data["id"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["level"]   = $data["level"];
    }
?>
 
	


    