-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 09:14 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumberalam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `foto`) VALUES
(7, 'x.jpg'),
(8, 'y.jpg'),
(9, 'z.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama` varchar(72) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `password` varchar(155) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `nama`, `email`, `telepon`, `password`, `alamat`) VALUES
(6, 'Abrar', 'abrar@gmail.com', '08198229996', 'abrar', 'Jombang'),
(7, 'Beny Sofyan Prayogo', 'bsp@yahoo.com', '0849282829290', 'benysp', 'mojokerto'),
(8, 'Erik Wicaksono', 'erik@yahoo.com', '089918288399', 'erik', 'BAndung'),
(9, 'Joy Nathan', 'joyy123@gmail.com', '0587187217271', 'joy', 'depok'),
(10, 'Jerome Kurnia', 'jerome@gamil.com', '08799999212121', 'jerome', 'surabaya'),
(11, '90', 'beny', 'Mojoikeerot', '0898334809230', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_berangkat` int(20) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `jadwal` varchar(10) NOT NULL,
  `rute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_berangkat`, `tujuan`, `jadwal`, `rute`) VALUES
(1, ' Purwokerto', ' 16:00 WIB', ' Bekasi - Purwokerto'),
(2, 'Mojokerto', '09:00 WIB', 'Sooko - Mojokerto'),
(8, 'Bekasi', '12.00 WIB', ' Bekasi - Lebak Bulus - Pejaten'),
(9, 'Depok', '13.00 WIB', 'Purwosari - Jambangan - Depok'),
(11, ' Yogyakarta', ' 20:00 WIB', ' Bekasi - Gombong - Kebumen - Kutoarjo - Purworejo - Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(10) NOT NULL,
  `urutan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `urutan`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 43),
(42, 44),
(43, 45),
(44, 46),
(45, 47),
(46, 48),
(47, 1),
(48, 2),
(49, 3),
(50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `ttl_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_cus`, `id_kursi`, `tgl_pemesanan`, `ttl_pemesanan`) VALUES
(53, 6, 18, '2020-04-27', 280000),
(54, 10, 1, '2020-04-27', 75000),
(55, 10, 18, '2020-04-27', 150000),
(56, 7, 10, '2020-04-27', 195000),
(57, 6, 15, '2020-04-27', 215000),
(58, 6, 19, '2020-04-27', 175000),
(59, 6, 19, '2020-04-30', 315000),
(60, 6, 16, '2020-05-07', 255000),
(61, 6, 16, '2020-07-21', 310000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_tkt`
--

CREATE TABLE `pemesanan_tkt` (
  `id_pemesanan_tkt` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_tkt` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `kls` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_tkt`
--

INSERT INTO `pemesanan_tkt` (`id_pemesanan_tkt`, `id_pemesanan`, `id_tkt`, `jumlah`, `nama`, `harga`, `kls`, `tujuan`, `subharga`) VALUES
(77, 53, 9, 1, 'VIP Tangerang', 180000, 'VIP', 'Tangerang', 180000),
(78, 53, 2, 1, 'BSN Bogor', 100000, ' Bisnis ', ' Bogor', 100000),
(79, 54, 3, 1, 'EKN Depok', 75000, ' Ekonomi', ' Depok', 75000),
(80, 55, 3, 1, 'EKN Depok', 75000, ' Ekonomi', ' Depok', 75000),
(81, 55, 8, 1, 'EKN Jakarta', 75000, 'Ekonomi', 'Jakarta', 75000),
(82, 56, 3, 1, 'EKN Depok', 75000, ' Ekonomi', ' Depok', 75000),
(83, 56, 1, 1, 'VIP Bandung', 120000, 'VIP', 'Bandung', 120000),
(84, 57, 6, 1, ' VIP Bekasi', 140000, ' VIP', ' Bekasi', 140000),
(85, 57, 3, 1, 'EKN Depok', 75000, ' Ekonomi', ' Depok', 75000),
(86, 58, 8, 1, 'EKN Jakarta', 75000, 'Ekonomi', 'Jakarta', 75000),
(87, 58, 2, 1, 'BSN Bogor', 100000, ' Bisnis ', ' Bogor', 100000),
(88, 59, 8, 1, 'EKN Jakarta', 75000, 'Ekonomi', 'Jakarta', 75000),
(89, 59, 2, 1, 'BSN Bogor', 100000, ' Bisnis ', ' Bogor', 100000),
(90, 59, 6, 1, ' VIP Bekasi', 140000, ' VIP', ' Bekasi', 140000),
(91, 60, 9, 1, 'VIP Tangerang', 180000, 'VIP', 'Tangerang', 180000),
(92, 60, 3, 1, 'EKN Depok', 75000, ' Ekonomi', ' Depok', 75000),
(93, 61, 3, 2, 'EKN Bandung', 120000, ' Ekonomi', ' Bandung', 240000),
(94, 61, 8, 1, 'EKN Surabaya', 70000, 'Ekonomi', 'Surabaya', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tkt` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kls` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tkt`, `nama`, `kls`, `harga`, `tujuan`) VALUES
(1, 'VIP Jakarta', 'VIP', '200000', 'Jakarta'),
(2, 'BSN Mojokerto', ' Bisnis ', ' 150000', 'Mojokerto'),
(3, 'EKN Bandung', ' Ekonomi', '120000', ' Bandung'),
(6, ' VIP Tangerang', ' VIP', ' 100000', ' Tangerang'),
(8, 'EKN Surabaya', 'Ekonomi', '70000', 'Surabaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_berangkat`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_tkt`
--
ALTER TABLE `pemesanan_tkt`
  ADD PRIMARY KEY (`id_pemesanan_tkt`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tkt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_berangkat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pemesanan_tkt`
--
ALTER TABLE `pemesanan_tkt`
  MODIFY `id_pemesanan_tkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
