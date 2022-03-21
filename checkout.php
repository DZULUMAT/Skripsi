<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.')</script>";
    echo "<script>location='login.php'</script>";
    session_destroy();
}
if (!isset($_SESSION["pelanggan"]['id_pelanggan'])){
    $id = $_SESSION['pelanggan'];
}else{
    $id = $_SESSION["pelanggan"]['id_pelanggan'];
}

include 'koneksi.php';
?>
<?php
$jml = '0';


$datapel = $koneksi->query("SELECT * FROM pelanggan  WHERE id_pelanggan =$id ");
$datapel2= $datapel->fetch_assoc();
if (isset($_SESSION['pelanggan'])) {
    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
            $jml += $jumlah;
        endforeach;
    } else {
        $jml = '0';
    }
}
if ($jml == 0){
    echo "<script>alert('Anda harus belanja terlebih dahulu.')</script>";
    echo "<script>location='products.php'</script>";
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
                            <li><a href="checkout.php" class="active">Checkout</a></li>
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Easy <em>Checkout</em></h2>
                        <p>Silahkan checkout barang belanjaan kalian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="konten">
            <div class="container-fluid ">
                <div class="card-body col-md-9 mx-auto ">
                    <h1 class="font-weight mb-4">Detail Pesanan</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered text-black bg-white thead-light" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total = 0;
                                if ($jml > 0) {
                                    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
                                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk
                            = '$id_produk'");
                                        $data = $ambil->fetch_assoc();
                                        $subtotal = $data['harga_produk'] * $jumlah; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td>Rp. <?= number_format($data['harga_produk']) ?></td>
                                            <td><?= $jumlah ?></td>
                                            <td>Rp. <?= number_format($subtotal)  ?></td>
                                        </tr>
                                    <?php $no++;
                                        $total += $subtotal;
                                    endforeach; ?><tr>
                                        <td colspan='4' class="text-center">Total Belanja</td>
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
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-black">
                                    <label for="nama">Nama</label>
                                    <input readonly type="text" name="nama" value="<?= $datapel2['nama'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group text-black">
                                    <label for="telp">No Telepon</label>
                                    <input hidden name='telplama'value="<?=$datapel2['telepon']?>">
                                    <?php if(!isset($datapel2['telepon']) or $datapel2['telepon'] ==''){?>
                                     <input required type="number" name="telpbaru" placeholder="Masukkan Nomor Telepon" class="form-control">
                                    <?php }else{?>
                                       <input  type="number" name="telpbaru" placeholder="<?= $datapel2['telepon'] ?>" class="form-control">
                                <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group text-black">
                            <label for="nama">Alamat Pengiriman</label>
                            <textarea type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Pengiriman Secara Lengkap" required></textarea>
                        </div>
                        <button name="pesan" class="btn btn-secondary">Checkout</button>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['pesan'])) {
                if (!isset($_SESSION["pelanggan"]['id_pelanggan'])){
                    $id_pelanggan = $_SESSION['pelanggan'];
                }else{
                    $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                }
                $tanggal = date("Y-m-d");
                $alamat = $_POST['alamat'];
                $telplama = $_POST['telplama'];
                $telpbaru = $_POST['telpbaru'];
                if (!isset($datapel2['telepon'])){
                    $koneksi->query("INSERT INTO pelanggan('telepon') VALUES ('$telpbaru')");
                }
                if(($telplama != $telpbaru) AND $telpbaru != ''){
                    $koneksi->query("UPDATE `pelanggan` SET `telepon` = '$telpbaru' WHERE `pelanggan`.`id_pelanggan` = $id_pelanggan;");
                }
                // Menyimpan ke tabel pembelian 
                $koneksi->query("INSERT INTO pembelian(
                `id_pelanggan`, `tanggal_pembelian`, `total_harga`, `alamat_pengiriman`) VALUES
            ('$id_pelanggan', '$tanggal', '$total', '$alamat')");

                $id_pembelianbaru = $koneksi->insert_id;
                echo $id_pembelianbaru;
                foreach ($_SESSION['keranjang'] as $id_produk => $jmlah) {
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk
                            = '$id_produk'");
                    $perdata = $ambil->fetch_assoc();
                    $nama = $perdata['nama_produk'];
                    $harga = $perdata['harga_produk'];
                    $subharga = $perdata['harga_produk'] * $jmlah;

                    $koneksi->query("INSERT INTO `pembelian_produk`(
                    `id_pembelian`, `id_produk`, `jumlah`, `nama_prod`, `harga`, `total_harga`) 
                    VALUES('$id_pembelianbaru','$id_produk','$jmlah', '$nama','$harga','$subharga')");
                }
                unset($_SESSION['keranjang']);
                echo "<script>alert('Pembelian berhasil, silahkan melakukan pembayaran')</script>";
                echo "<script>location='nota.php?id=$id_pembelianbaru'</script>";
            }
            ?>


        </div>
    </section>




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