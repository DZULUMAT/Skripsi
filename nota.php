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
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON 
pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian ='$_GET[id]'");
$detail = $ambil->fetch_assoc();

// id yg beli harus sama dengan id yg log in
$orangbeli = $detail['id_pelanggan'];
if (!isset($_SESSION["pelanggan"]['id_pelanggan'])){
    $oranglogin = $_SESSION['pelanggan'];
}else{
    $oranglogin = $_SESSION["pelanggan"]['id_pelanggan'];
}
if ($orangbeli != $oranglogin) {
    echo "<script>alert('Anda tidak bisa melihat nota orang lain')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Keranjang</title>
    <link href='img/Nop.jpg' rel='shortcut icon'>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>


<body class="bg-gradient-white">

    <div class="konten">
        <div class="container-fluid col-md-10 mx-auto mb-3">
            <div class="card-body">
                <h1 class="font-weight mb-4 text-black">Nota Pembelian Produk Vivie <em>Catering</em></h1>
                <!-- <img src="img/barcode.jpg" alt="" class="img-responsive ml-3 mb-2" height="150px"> -->
                <div class="row mx-auto mt-2">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <strong>Id Pembelian : <?= $detail['id_pembelian'] ?></strong><br>
                        <p>
                            Tanggal Pembelian = <?= $detail['tanggal_pembelian'] ?><br>
                            Total keseluruhan = Rp. <?= number_format($detail['total_harga']) ?>
                        </p>

                    </div>
                    <div class="col-md-4">
                        <h3>Pembeli</h3>
                        <strong><?= $detail['nama'] ?></strong><br>
                        <p>
                            <?= $detail['telepon'] ?><br>
                            <?= $detail['email'] ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>Pengiriman</h3>
                        <strong>Alamat Pengiriman :</strong><br>
                        <p>
                            <?= $detail['alamat_pengiriman'] ?>
                        </p>

                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped  bg-white " width="100%" cellspacing="0">
                        <thead class="text-black thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM pembelian_produk  WHERE id_pembelian= '$_GET[id]'");
                            while ($pecah = $data->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $pecah['nama_prod'] ?></td>
                                    <td>Rp. <?= number_format($pecah['harga']) ?></td>
                                    <td><?= $pecah['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($pecah['total_harga']) ?></td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>

                    </table>
                    <div class="jangan row mx-auto">
                        <div class="alert alert-secondary col-md-8" role="alert">
                            Silahkan Lakukan Transfer Pembayaran Senilai Rp. <?= number_format($detail['total_harga']) ?> <br>
                            Ke Rekening 0000-6666-6666-7777 AN. Nopal Ganteng
                        </div>
                        <div class="col-md-3">
                            <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                        </div>

                    </div>

                </div>
            </div>



        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="admin/script.js"></script>
    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>
</body>

</html>