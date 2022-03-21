<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.')</script>";
    echo "<script>location='login.php'</script>";
    session_destroy();
}
include 'koneksi.php';
?>
<?php
$jml = '0';
if (isset($_SESSION['pelanggan'])) {
    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
            $jml += $jumlah;
        endforeach;
    } else {
        $jml = '0';
    }
}
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
                            <li><a href="keranjang.php" class="active">Keranjang</a></li>
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
                        <h2>Halaman <em>Keranjang</em></h2>
                        <p>Pelanggan dapat memilih atau mengecek kembali produk yang akan di checkout</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="konten">
            <div class="container-fluid">
                <div class="card-body col-md-9 mx-auto">
                    <h1 class="font-weight mb-4">Keranjang Belanja</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered text-black bg-white thead-light" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total = 0;
                                if ($jml > 0) {
                                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
                                        //menampilkan produk yang sedang diperulangkan berdasarkan id produk
                                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $data = $ambil->fetch_assoc();
                                        //penjumlahan sub total
                                        $subtotal = $data['harga_produk'] * $jumlah; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td>Rp. <?= number_format($data['harga_produk']) ?></td>
                                            <td><?= $jumlah ?></td>
                                            <td>Rp. <?= number_format($subtotal)  ?></td>
                                            <td>
                                                <center>
                                                    <a href="hapuskeranjang.php?id=<?= $data['id_produk'] ?>" onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')" class="badge badge-danger">Hapus</a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                        $total += $subtotal;
                                    endforeach; ?><tr>
                                        <td colspan='4'>Total Belanja</td>
                                        <td>Rp. <?= number_format($total) ?></td>
                                    </tr>

                                <?php } else { ?>
                                    <tr>
                                        <td colspan="6">Kosong</td>


                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <a href="index.php" class="btn btn-light">Lanjut Belanja</a>
                    <?php
                    if ($jml == 0) { ?>
                        <button class="btn btn-primary disabled">Checkout</button>
                    <?php } else { ?>
                        <a href="checkout.php" class="btn btn-primary">Checkout</a>
                    <?php }
                    ?>

                </div>



            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2021 Nopal
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