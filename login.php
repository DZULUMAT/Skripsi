<!DOCTYPE html>
<html lang="en">
<?php
session_start();
session_destroy();
session_start();
if(isset($_SESSION['id'])){ // Jika session username ada berarti dia sudah login
    header('location: index.php'); // Kita Redirect ke halaman index.php
  }
include 'koneksi.php';
//$var = '';
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Vivi Catering</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

     <!-- Custom fonts for this template -->
     <!-- <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"> -->
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
                            <!--Jika Sudah login -->
                            <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <strong><a href="logout.php" class="btn ml-3 text-danger">Logout</a></strong>
                            <?php else : ?>
                                <!-- Selain itu,jika Belum login (belum ada session pelanggan) -->
                                <strong><a href="logout.php" class="btn ml-3 text-primary">Login</a></strong>
                                <!-- //saya kasih logout.php karena kalau belum login maka
                                //akan kembali ke halaman login lagi (begitu gaes) -->
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
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <?php
                    // jika ada tombol login, maka lakukan  
                    // query mengecek akun dari tabel pelanggan di database
                    if (isset($_POST['login'])) {
                        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[email]' 
                                            AND password = '$_POST[pass]'");
                        $cocok = $ambil->num_rows;
                        if ($cocok == 1) {
                            if (isset($_SESSION['pelanggan'])) {
                                session_destroy();
                            } else {
                                $_SESSION['admin'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info mt-3'>Login berhasil sebagai admin</div>";
                                echo "<meta http-equiv='refresh' content ='1;url=admin/index.php'>";
                            }
                        } else {
                            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email='$_POST[email]' 
                                            AND password = '$_POST[pass]'");
                            $cocok = $ambil->num_rows;
                            if ($cocok == 1) {
                                $_SESSION['pelanggan'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info mt-3'>Login Berhasil</div>";
                                echo "<meta http-equiv='refresh' content ='1;url=index.php'>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Email atau password tidak ditemukan.</div>";
                                echo "<meta http-equiv='refresh' content ='1; url=login.php'>";
                            }
                        }
                    }
                    ?>
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-xl">
                                <div class="p-3">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    
                                    <?php
                                    // Cek apakah terdapat cookie dengan nama message
                                    if(isset($_COOKIE["message"])){ // Jika ada
                                    ?>
                                    <div class="alert alert-danger">
                                    <?php
                                    // Tampilkan pesannya
                                    echo $_COOKIE["message"];
                                    ?>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <form class='user' method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="email" aria-describedby="emailHelp" name='email' placeholder="Masukkan Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control " id="tPassword" name="pass" placeholder="Masukan Password...">
                                        </div>

                                        <button name="login" class="btn btn-danger btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <div class="small"> Belum punya akun?<a href="registrasi.php"> Daftar </a> Sekarang!</div>
                                    </div>

                                    <br>

                                    <form method="post" action="login_google.php">
                                        <div class="small">
                                        atau login dengan
                                        </div>
                                        <div class="text-center">
                                        <a href="google.php" class="btn btn-danger"><i class="fa fa-google"></i>  GOOGLE</a>
                                        </div>
                                    </form>

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