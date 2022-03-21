-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 07:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Nopal');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama`, `telepon`, `alamat`, `username`) VALUES
(7, 'irfananda2000@gmail.com', 'nopal123', 'Nopal Ganteng', '08566787600000', 'Solo', ''),
(11, 'nopal@gmail.com', 'nopal', 'Nopal', '089998767898', 'Perumahan Solo', ''),
(25, 'dzulumat@gmail.com', 'dzulumat123', 'Nopal Dzulumat', '087776554345', 'Purwokerto', NULL),
(28, 'l200180096@student.ums.ac.id', NULL, 'IRFANANDA IRSYAD AINUNNAUVAL', '121212', NULL, 'l200180096'),
(29, 'gaminglos776@gmail.com', NULL, 'Nop Gaming', '789', NULL, 'gaminglos776');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `tanggal`, `bukti`) VALUES
(31, 72, 'Nopal', 'BRI', '2021-09-10', '613b118467d52.jpg'),
(40, 85, 'Nopal Wqwk', 'BCA', '2021-10-06', '615de78f4fd29.png'),
(43, 92, 'DZULUMAT', 'BCE', '2021-10-08', '6160062a32432.png'),
(44, 91, 'Nopal 123', 'BCA', '2021-10-12', '61651d4ae35e2.jpg'),
(45, 89, 'Nopal 321', 'BTN', '2021-10-12', '61651d7bbf65f.jpg'),
(47, 101, 'Nopal', 'NOP', '2021-10-12', '6165a43c116ee.png'),
(48, 112, 'Menu 3', 'BTN', '2021-10-12', '6165a82652fe2.jpg'),
(49, 114, 'DZULUMAT', 'BCA', '2021-10-12', '6165a8baa9702.png'),
(50, 117, 'DZULUMAT', 'dsdsd', '2021-10-21', '6170fa846e950.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL DEFAULT 'pending',
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_harga`, `alamat_pengiriman`, `status_pembayaran`, `resi`) VALUES
(84, 21, '2021-10-06', 350000, 'wkwkwkk', 'sudah kirim bukti', ''),
(89, 23, '2021-10-07', 500000, 'Solo Raya AJA', 'sudah kirim bukti', ''),
(91, 7, '2021-10-07', 350000, 'PWT KOTA', 'sudah kirim bukti', ''),
(92, 25, '2021-10-08', 900000, 'Sukoharjo', 'sudah kirim bukti', ''),
(101, 28, '2021-10-12', 500000, 'Solo', 'sudah kirim bukti', ''),
(112, 29, '2021-10-12', 1000000, 'jaksjd', 'sudah kirim bukti', ''),
(114, 7, '2021-10-12', 900000, 'aspodikasd', 'lunas', '000'),
(117, 7, '2021-10-21', 1300000, 'BDG', 'sudah kirim bukti', ''),
(118, 7, '2021-10-21', 850000, 'Jakarta Raya Bro', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_prod` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama_prod`, `harga`, `total_harga`) VALUES
(88, 77, 25, 1, 'Tumpeng Besar 12 Porsi + Ingkung Ayam Kampung', 700000, 700000),
(97, 84, 27, 1, 'Tart Ulang Tahun', 350000, 350000),
(98, 85, 28, 1, 'Tart Blackforest', 400000, 400000),
(103, 89, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(104, 90, 28, 1, 'Tart Blackforest', 400000, 400000),
(105, 91, 27, 1, 'Tart Ulang Tahun', 350000, 350000),
(106, 92, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(107, 92, 28, 1, 'Tart Blackforest', 400000, 400000),
(108, 93, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(109, 94, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(110, 95, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(130, 116, 27, 1, 'Tart Ulang Tahun', 350000, 350000),
(131, 117, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(132, 117, 28, 2, 'Tart Blackforest', 400000, 800000),
(133, 118, 26, 1, 'Tumpeng Besar 12 Porsi', 500000, 500000),
(134, 118, 27, 1, 'Tart Ulang Tahun', 350000, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`) VALUES
(26, 'Tumpeng Besar 12 Porsi', 500000, 15, 'Tumpeng 12 porsi.jpg', 'Isi : Sambal, Krupuk, Ayam, Telur, Urap, Kering Tempe, Sambal Goreng Ati, Bakmi dan Sayurang Segar'),
(27, 'Tart Ulang Tahun', 350000, 10, 'Tar Ultah.jpg', 'Kue Tart Ulang Tahun/Birthday Cake\r\nPilihan cake lezat dengan bahan premium dan kualitas terbaik.\r\n\r\n'),
(28, 'Tart Blackforest', 400000, 10, 'Blackforest.jpg', 'Kue Tart BlackForest dengan Coklat yang Lezat\r\nPilihan cake lezat dengan bahan premium dan kualitas terbaik.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
