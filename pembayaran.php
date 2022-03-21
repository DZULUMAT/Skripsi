<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.')</script>";
    echo "<script>location='login.php'</script>";
    session_destroy();
    exit();
}
include 'koneksi.php';
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pembelian ON 
pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembayaran.id_pembelian ='$id_pembelian'");

$data = $ambil->fetch_assoc();
if (empty($data)) {
    echo "<script>alert('Tidak ada data pembayaran.')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
if (!isset($_SESSION["pelanggan"]['id_pelanggan'])){
    $oranglogin = $_SESSION['pelanggan'];
}else{
    $oranglogin = $_SESSION["pelanggan"]['id_pelanggan'];
}
if ($oranglogin != $data['id_pelanggan']) {
    echo "<script>alert('Tidak bisa melihat data orang lain.')</script>";
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

    <title>Vivie Catering</title>
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
    <br>
    <br>
    <br>


    <div class="konten">
        <div class="container-fluid col-md-9 mx-auto mb-3">
            <h2>Bukti Pembayaran</h2>
            <div class="row text-light">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Nama Penyetor</th>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <td><?= $data['bank'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $data['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Tagihan</th>
                            <td>Rp. <?= number_format($data['total_harga'])  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" class="btn btn-danger" value="Kembali" onclick="history.back(-1)">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/bukti/<?= $data['bukti'] ?>" alt="" class="img-responsive" height="250px">
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