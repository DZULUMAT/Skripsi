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
                            <li><a href="products.php" class="active">Products</a></li>
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

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Produk <em>Kami</em></h2>
                        <p>Produk yang kami jual pastinya baik dan halal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="row mx-auto text-center mt-4">
                <?php
                $data = $koneksi->query("SELECT * FROM produk ");
                while ($perdata = $data->fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                        <div class="card my-2 mb-3">
                            <div class=" thumbnail">
                                <img src="assets/images/produk/<?= $perdata['foto_produk'] ?>" alt="" class="fit card-img mt-3">
                                <div class=" card-body">
                                    <h5 class='card-title mb-0'><?= $perdata['nama_produk'] ?></h5>
                                    <small><?= $perdata['deskripsi_produk'] ?></small><br>
                                    <span class="badge badge-info mb-2">Rp. <?= number_format($perdata['harga_produk']) ?></span><br>
                                    <a href="beli.php?id=<?= $perdata['id_produk'] ?>" class="btn btn-primary btn-sm">Tambah ke keranjang</a>
                                    <a href="beli2.php?id=<?= $perdata['id_produk'] ?>" class="btn btn-success btn-sm">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-2-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-4-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-5-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-6-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

                            <ul class="social-icons">
                                <li><a href="product-details.php">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->

            <br>

            <!-- <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav> -->

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright ?? 2021 Nopal
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