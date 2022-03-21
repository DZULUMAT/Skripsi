<?php
include 'koneksi.php';
session_start();
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
$data = $ambil->fetch_assoc();
if (empty($data)) {
    echo "<script>alert('Tidak ada data produk.')</script>";
    echo "<script>location='products.php'</script>";
    exit();
} else {
    // jika sudah ada +1
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id] += 1;
    }
    // jika belum
    else {
        $_SESSION['keranjang'][$id] = 1;
    }
}
echo "<script>location='checkout.php'</script>";
