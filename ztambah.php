<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>tambah pelanggan</title>
</head>

<body>
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
                        <h2 class="fs-2 m-0">Pelanggan</h2>
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
            <form method="POST" action="zsimpan_akun.php">
                <div class="row my-3">
                    <div class="col-6">
                        <label for="user">Username</label>
                        <input type="text" class="form-control" id="user" name="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="col-6">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="password" placeholder="Masukan Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
                </div>
                <div class="form-group mt-3">
                    <label for="jk">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jkl" id="jk" value="Laki-Laki">
                    <label class="form-check-label" for="jk" name="jkl">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jkl" id="jk" value="Perempuan">
                    <label class="form-check-label" for="jk" name="jkl">Perempuan</label>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl" name="tlahir" required>
                </div>
                <div class="row mt-3">
                    <div class="form-group col-md-6">
                    <label for="rumah">Alamat</label>
                    <input type="text" class="form-control" id="rumah" name="alamat" placeholder="Masukan Alamat" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="telp">No. Telephone</label>
                    <input type="text" class="form-control" id="telp" name="hp" placeholder="No. Telephone" required>
                    </div>
                </div>
           
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
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