<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['pelanggan']) and !isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.')</script>";
    echo "<script>location='login.php'</script>";
    session_destroy();
}
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]['id_pelanggan'])){
    $id = $_SESSION['pelanggan'];
}else{
    $id = $_SESSION["pelanggan"]['id_pelanggan'];
}

$ambil = $koneksi->query("SELECT * FROM pembelian  WHERE id_pelanggan =$id ");
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Vivie Catering</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <li><a href="riwayat.php" class="active">Riwayat</a></li>
                            <li><a href="about.php">About</a></li>
                            <!-- Sudah login -->
                            <?php if (isset($_SESSION['pelanggan'])) : ?>
                                <strong><a href="logout.php" class="btn ml-3 text-danger">Logout</a></strong>
                            <?php elseif (isset($_SESSION['username'])) : ?>
                                
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
                        <h2>Riwayat <em>Pesanan</em></h2>
                        <p>Silahkan cek riwayat pesanan anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
    <br>
    <br>
    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="konten">
            <div class="container-fluid col-md-9 mx-auto mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered text-black bg-white thead-light" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($pecah = $ambil->fetch_assoc()) { ?>

                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $pecah['tanggal_pembelian'] ?></td>
                                    <td>Rp. <?= number_format($pecah['total_harga']) ?></td>
                                    <td><?= $pecah['status_pembayaran'] ?> <br>
                                        <?php if (!empty($pecah['resi'])) { ?>
                                            Resi : <?= $pecah['resi'] ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="nota.php?id=<?= $pecah['id_pembelian'] ?>" class="btn btn-success btn-sm">Nota</a>

                                            <?php if ($pecah['status_pembayaran'] == 'pending') { ?>
                                                <a href="#" class="bayar-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#bayarModal" data-id="<?= $pecah['id_pembelian'] ?>" data-harga="<?= number_format($pecah['total_harga']) ?>">Input Pembayaran</a>
                                            <?php } else { ?>
                                                <a href="pembayaran.php?id=<?= $pecah['id_pembelian'] ?>" class="btn btn-primary btn-sm">Lihat Pembayaran</a>
                                            <?php } ?>
                                        </center>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>

                    </table>

                </div>



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
    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

    <!-- Modal bayar-->
    <div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Kirim Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id='id' required>
                        <div class="form-group">
                            <label>Jumlah Yang harus dibayar</label>
                            <input type="text" class="form-control" name="harga" id='hr' readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Penyetor</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label>Bank</label>
                            <input type="textr" class="form-control" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label>Bukti Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <strong>Perhatian! </strong>Anda hanya bisa melakukan pengiriman bukti pembayaran satu kali saja.
                            Pastikan anda memasukkan data dengan benar. Jika ada kendala silahkan hubungi kami.
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-success" name='bayar' value="Kirim">
                    </div>
                </form>
                <?php
                if (isset($_POST['bayar'])) {
                    $namaFile = $_FILES['foto']['name'];
                    $ukuranFile = $_FILES['foto']['size'];
                    $error = $_FILES['foto']['error'];
                    $tmpName = $_FILES['foto']['tmp_name'];

                    if ($error === 4) {
                        echo "<script>
				alert('foto belum di upload');
			</script>";
                        return false;
                        exit();
                    }

                    $ekstensifotoValid = ['jpeg', 'jpg', 'png'];
                    $ekstensifoto = explode('.', $namaFile);
                    $ekstensifoto = strtolower(end($ekstensifoto));

                    if (!in_array($ekstensifoto, $ekstensifotoValid)) {
                        echo "<script>
				alert('ekstensi foto yang diperbolehkan adalah jpeg, jpg, dan png');
			</script>";
                        return false;
                        exit();
                    }

                    //lolos pengecekan, file dimasukan ke database
                    //buat nama file menjadi unik
                    $namaFileBaru = uniqid();
                    $namaFileBaru .= '.';
                    $namaFileBaru .= $ekstensifoto;

                    // move_uploaded_file($tmpName, 'photo/' . $namaFileBaru);

                    // $namabukti = $_FILES['foto']['name'];
                    // $lokasibukti = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($tmpName, "assets/images/bukti/" . $namaFileBaru);
                    $idpem = $_POST['id'];
                    $nama = $_POST['nama'];
                    $bank = $_POST['bank'];
                    $tanggal = date('Y-m-d');
                    // simpan pembayaran
                    $koneksi->query("INSERT INTO `pembayaran`( `id_pembelian`, `nama`, `bank`, `tanggal`, `bukti`) VALUES 
                ('$idpem', '$nama', '$bank','$tanggal', '$namaFileBaru')");

                    // ubah status pembayaran
                    $koneksi->query("UPDATE pembelian SET status_pembayaran = 'sudah kirim bukti' WHERE id_pembelian='$idpem'");

                    echo "<script>alert('Berhasil mengirim bukti pembayaran.')</script>";
                    echo "<meta http-equiv= 'refresh' content='1;url=riwayat.php'>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- function modal bayar -->
    <script>
        $(function() {
            $(document).on('click', '.bayar-modal', function(e) {
                var id = $(this).data('id');
                var harga = $(this).data('harga');
                $("#id").val(id);
                $("#hr").val("Rp. " + harga);

            });
        });
    </script>
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