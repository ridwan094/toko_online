-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2022 at 05:19 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'ridwan123', 'ridwan123', 'ridwan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'mod'),
(2, 'pod');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bogor', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'arifrahman2592@gmail.com', 'arif', 'Arif Nur Rohman', '08094778392', ''),
(2, 'rizqa@gmail.com', 'rizqa', 'Rizqa Luviana', '0834758393', ''),
(3, 'teamtrainit@gmail.com', 'trainit', 'trainit jogja', '08990423789', 'jogja');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 15, 'Arif Nur Rohman', 'mandiri', 450000, '2022-01-29', '20220129235413KTP.jpg'),
(2, 17, 'Arif Rahman', 'BCA', 880000, '2022-01-30', '20220130051424github.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `totalberat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(1, 2, '2022-01-26', 1500000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(2, 2, '2022-01-29', 500000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(9, 2, '2022-01-29', 438000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(10, 2, '2022-01-29', 438000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(11, 2, '2022-01-29', 438000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(12, 2, '2022-01-29', 0, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(13, 2, '2022-01-29', 438000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(14, 2, '2022-01-29', 438000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(15, 1, '2022-01-29', 450000, '', 'barang dikirim', 'ABC123', 0, '', '', '', '', '', '', 0, ''),
(16, 1, '2022-01-29', 450000, 'Jalan Sentul no.40 bogor kodepos 11540', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(17, 1, '2022-01-30', 880000, 'jakarta selatan', 'sudah kirim pembayaran', '', 0, '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 1, 2, 1, '', 0, 0, 0, 0),
(7, 9, 11, 1, '', 0, 0, 0, 0),
(8, 9, 14, 1, '', 0, 0, 0, 0),
(9, 10, 11, 1, '', 0, 0, 0, 0),
(10, 10, 14, 1, '', 0, 0, 0, 0),
(11, 11, 11, 1, '', 0, 0, 0, 0),
(12, 11, 14, 1, '', 0, 0, 0, 0),
(13, 13, 11, 1, '', 0, 0, 0, 0),
(14, 13, 14, 1, '', 0, 0, 0, 0),
(15, 14, 11, 1, 'Original Argus Pro 80w Kit', 333000, 300, 300, 333000),
(16, 14, 14, 1, 'Voopoo PNP X Pod Tank', 95000, 200, 200, 95000),
(17, 15, 11, 1, 'Original Argus Pro 80w Kit', 340000, 300, 300, 340000),
(18, 15, 14, 1, 'Voopoo PNP X Pod Tank', 95000, 200, 200, 95000),
(19, 16, 11, 1, 'Original Argus Pro 80w Kit', 340000, 300, 300, 340000),
(20, 16, 14, 1, 'Voopoo PNP X Pod Tank', 95000, 200, 200, 95000),
(21, 17, 11, 2, 'Original Argus Pro 80w Kit', 340000, 300, 600, 680000),
(22, 17, 14, 2, 'Voopoo PNP X Pod Tank', 95000, 200, 400, 190000),
(23, 0, 11, 2, 'Original Argus Pro 80w Kit', 340000, 300, 600, 680000),
(24, 0, 11, 2, 'Original Argus Pro 80w Kit', 340000, 300, 600, 680000),
(25, 0, 11, 2, 'Original Argus Pro 80w Kit', 340000, 300, 600, 680000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(11, 1, 'Original Argus Pro 80w Kit', 340000, 300, 'voopoo_argus.jpeg', 'Argus pro kit', 4),
(12, 2, 'Voopoo VTHRU Pod Pro Kit', 245000, 40, 'voopoo_vthru.jpg', 'voopoo vhtru pod pro kit', 10),
(13, 2, 'DRAG NANO 2 POD KIT by VOOPOO', 265000, 50, 'voopoo_drag_nano2.jpg', 'voopoo drag nano 2 pod pro kit', 10),
(14, 2, 'Voopoo PNP X Pod Tank', 95000, 200, 'voopoo_tank.jpg', 'voopoo pnp x pod tank', 10),
(15, 2, 'Voopoo Vinci Pod Kit 15w', 220000, 150, 'voopoo_vinci.jpg', 'voopoo vinci pod kit 15w', 10),
(16, 1, 'Voopoo Drag S 80w', 469000, 1000, 'cfz.jpg', 'voopoo drag s 80w', 10),
(17, 1, 'Voopoo Drag Max 177w', 590000, 500, 'voopoo_drag_max.jpg', 'Voopoo drag max 177w', 10),
(18, 1, 'Voopoo Drag 3 MOD Only', 440000, 300, 'voopoo_drag3.jpg', 'voopoo drag 3 mod only', 10),
(20, 1, 'Voopoo Drag X PNP X kit', 389000, 300, 'voopoo_drag_x.jpg', 'voopoo drag x', 10),
(21, 1, 'Voopoo Drag 2 177w kit', 700000, 350, 'voopoo_drag2.jpeg', 'voopoo drag 2 177w kit', 10);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(1, 21, 'voopoo_drag2.jpeg'),
(2, 21, 'voopoodrag2.jpeg'),
(4, 21, '20220131064058drag2.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

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
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
