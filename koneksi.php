<!-- koneksi database-->
<!-- <?php
$koneksi = new mysqli('localhost', 'root', '', 'online_shop');
?> -->

<?php
$host = "localhost"; // Nama hostnya
$username = "root"; // Username
$password = ""; // Password (Isi jika menggunakan password)
$database = "online_shop"; // Nama databasenya

$connect = mysqli_connect($host, $username, $password, $database); // Koneksi ke MySQL
?>