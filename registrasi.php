<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'koneksi.php';
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Vivie Catering</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Vivie <em> Catering</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li><a href="keranjang.php">Keranjang</a></li>
                            <li><a href="riwayat.php">Riwayat</a></li>
                            <li><a href="about.php">About</a></li>
                            <!-- Sudah login -->
                            <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <strong><a href="logout.php" class="btn ml-3 text-danger">Logout</a></strong>
                            <?php else : ?>
                                <!-- Sudah login -->
                                <strong><a href="logout.php" class="btn ml-3 text-primary">Login</a></strong>
                            <?php endif ?>


                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <div class="container mb-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <?php
                                    if (isset($_POST['daftar'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $no_telpon = $_POST['no_telpon'];
                                        $pass = $_POST['pass'];
                                        $pass2 = $_POST['pass2'];
                                        if ($pass == $pass2) {
                                            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$_POST[email]'");
                                            $sama = $ambil->num_rows;
                                            if ($sama == 1) {
                                                $tag = "<div class='alert alert-danger mt-3'>Email sudah terdaftar</div>";
                                                echo $tag;
                                            } else {
                                                $koneksi->query("INSERT INTO `pelanggan`(`email`, `password`, `nama`, `telepon`, `alamat`) 
                                        VALUES('$email','$pass', '$nama', '$no_telpon', '$alamat')");
                                                echo "<div class='alert alert-info mt-3'>Berhasil mendaftar</div>";
                                                echo "<script>location='login.php'</script>";
                                            }
                                        } else {
                                            echo "<div class='alert alert-danger mt-3'>password tidak sama</div>";
                                        }
                                    }
                                    ?>
                                    <div class="text-center">
                                        <h1 colour="white">Buat Akun Baru!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Masukkan Nama" required>

                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Masukkan Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control form-control-user" name="alamat" name='alamat' placeholder="Masukkan Alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="no_telpon" name='no_telpon' placeholder="Masukkan Nomor Telepon" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" name="pass" placeholder="Masukkan Password" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" name="pass2" placeholder="Ulangi Password" required>
                                            </div>
                                        </div>
                                        <button name="daftar" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah punya akun? Login!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2021 Nopal
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>