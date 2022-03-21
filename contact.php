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

  <title>Food Store</title>

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
              <li><a href="about.php" class="active">About</a></li>
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

  <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content">
            <br>
            <br>
            <h2><em>Hubungi </em> Kami</h2>
            <p>Tak kenal maka Tak Sayang</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ***** Features Item Start ***** -->
  <section class="section" id="features">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Kontak <em> info</em></h2>
            <img src="assets/images/line-dec.png" alt="waves">

          </div>
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-phone"></i>
          </div>

          <h5><a href="#">+62 852 2701 0535</a></h5>

          <br>
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>

          <h5><a href="#">gaminglos@gmail.com</a></h5>

          <br>
        </div>

        <div class="col-md-4">
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>

          <h5><a href="#">Perum Graha Tiara 1 B7, Gumpang, Kartasura, Sukoharjo</a></h5>

          <br>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Item End ***** -->

  <!-- ***** Contact Us Area Starts ***** -->
  <section class="section" id="contact-us" style="margin-top: 0">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-lg-6 col-md-6 col-xs-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d214.0396251661409!2d110.75689138905653!3d-7.567779792638406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a14ff41ec68e9%3A0xbc7a9eb7afaf571d!2sGumpang%2C%20Kec.%20Kartasura%2C%20Kabupaten%20Sukoharjo%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1617935934377!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- ***** Contact Us Area Ends ***** -->

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