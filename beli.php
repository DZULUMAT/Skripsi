<?php
include 'koneksi.php';
session_start();
//mendapatkan id dari barang yang akan di beli atau dimasukan keranjang
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
$data = $ambil->fetch_assoc();
if (empty($data)) {
    echo "<script>alert('Tidak ada data produk.')</script>";
    echo "<script>location='products.php'</script>";
    exit();
}
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.')</script>";
    echo "<script>location='login.php'</script>";
    session_destroy();
} else {
    // jika sudah ada maka akan ditambah 1
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id] += 1;
    }
    // jika belum ada, maka produk itu menjadi barang ke 1 yang dibeli
    else {
        $_SESSION['keranjang'][$id] = 1;
    }
}
echo "<script>alert('Berhasil ditambah')</script>";
echo "<script>location='products.php'</script>";
