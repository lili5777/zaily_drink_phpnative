<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Pelanggan</title>
</head>

<body>
<!-- menampilkan pesan alert-->
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="input"){
			echo "<script>alert('produk berhasil terdaftar');</script>";
		}else if($_GET['pesan']=="edit"){
			echo "<script>alert('produk berhasil diupdate');</script>";
		}else if($_GET['pesan']=="hapus"){
			echo "<script>alert('produk berhasil dihapus');</script>";
		}
	}
	?>


<?php
    include 'znavbar.php';
?>
    <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <?php 
                include 'slider.php';
            ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Produk</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i><?php echo $_SESSION["nama"]; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Data Produk</h3>
                    <div class="col">
                    <a class="btn btn-primary mb-2 px-5" href="ztambah_produk.php">Tambah</a>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">NO</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include 'koneksi.php';
                                $data = mysqli_query($koneksi,"select * from produk ");
                                $nomor=0;
                                while($d = mysqli_fetch_array($data)){
                                $nomor++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor ?></th>
                                    <td><img src="images/produk/<?php echo $d['foto']; ?>"  alt="" width="50" ></td>
                                    <td><?php echo $d['nama_produk']; ?></td>
                                    <td><?php echo $d['harga']; ?></td>
                                    <td><?php echo $d['ket']; ?></td>
                                    <td><a class="btn btn-warning me-2" href="zedit_produk.php?id_produk=<?php echo $d['id_produk']; ?>">Edit</a><a class="btn btn-danger" href="zhapus_produk.php?id_produk=<?php echo $d['id_produk']; ?>">Hapus</a></td>
                                </tr>
                            <?php } ?>    
                            </tbody>
                        </table>

                        <h3>Menu Favorit</h3?>

                        <table class="table bg-white rounded shadow-sm  table-hover mt-3" style="font-size:15px ;">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">NO</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include 'koneksi.php';
                                $data = mysqli_query($koneksi,"select * from favorit ");
                                $nomor=0;
                                while($d = mysqli_fetch_array($data)){
                                $nomor++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $nomor ?></th>
                                    <td><img src="images/produk/<?php echo $d['foto']; ?>"  alt="" width="50" ></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['ket']; ?></td>
                                    <td><a class="btn btn-warning me-2" href="zedit_favorit.php?id_favorit=<?php echo $d['id_favorit']; ?>">Edit</a></td>
                                </tr>
                            <?php } ?>    
                            </tbody>
                        </table>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>