<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'koneksi.php';
$keyword = $_GET['keyword'];
$semua = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
    $semua[] = $pecah;
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nop Store</title>
    <link href='img/Nop.jpg' rel='shortcut icon'>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

</head>




<body class="bg-gradient-light">
    <!-- Navbar -->
    <?= include 'navbar.php' ?>
    <!-- End navbar -->

    <!-- Konten -->
    <section class="konten">
        <div class="container">
            <h2>Hasil pencarian : "<?= $keyword ?>" </h2>
            <?php if (empty($semua)) : ?>
                <h4>Tidak ada data yang cocok</h4>
            <?php endif ?>
            <div class="row mx-auto text-center mt-4">
                <?php
                $data = $koneksi->query("SELECT * FROM produk ");
                foreach ($semua as $key => $perdata) :
                ?>
                    <div class="col-md-4">
                        <div class="card my-2 mb-3">
                            <div class=" thumbnail">
                                <img src="img/produk/<?= $perdata['foto_produk'] ?>" alt="" class="fit card-img mt-3">
                                <div class=" card-body">
                                    <h5 class='card-title mb-0'><?= $perdata['nama_produk'] ?></h5>
                                    <small><?= $perdata['deskripsi_produk'] ?></small><br>
                                    <span class="badge badge-info mb-2">Rp. <?= number_format($perdata['harga_produk']) ?></span><br>
                                    <a href="beli.php?id=<?= $perdata['id_produk'] ?>" class="btn btn-primary btn-sm">Tambah ke keranjang</a>
                                    <a href="beli.php?id=<?= $perdata['id_produk'] ?>" class="btn btn-success btn-sm">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </section>
    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="admin/script.js"></script>

</body>

</html>