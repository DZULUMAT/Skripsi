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

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/Nop.jpg" alt="" height="30px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link text-primary" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item form-inline">
                    <a class="nav-link text-primary" href="keranjang.php" data-toggle="tooltip" title=" <?= $jml ?> barang di keranjang" data-placement="top">
                        <!-- mengubah warna keranjang -->
                        <?php
                        if ($jml > 0) {
                            echo "<i class='fas fa-cart-plus text-danger'></i></a>";
                        } else {
                            echo "<i class='fas fa-cart-plus'></i></a>";
                        }
                        ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="checkout.php">Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="riwayat.php">Riwayat Pesanan</a>
                </li>
            </ul>
            <form action="pencarian.php" class="form-inline  my-lg-0" method="get">
                <input type="text" name="keyword" class="warna form-control bg-light border-0 small" placeholder="Cari disini..." aria-label="Search" aria-describedby="basic-addon2">
                <button class="btn btn-secondary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
                <div class="input-group-append">

                    <!-- Sudah login -->
                    <?php if (isset($_SESSION['pelanggan'])) : ?>
                        <strong><a href="logout.php" class="btn ml-3 text-danger">Logout</a></strong>
                    <?php else : ?>
                        <!-- Sudah login -->
                        <strong><a href="logout.php" class="btn ml-3 text-primary">Login</a></strong>
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</nav>