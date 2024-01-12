-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 02:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_bar` varchar(255) NOT NULL,
  `id_category` int(50) NOT NULL,
  `stok_bar` int(255) NOT NULL,
  `harga_bar` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_bar`, `id_category`, `stok_bar`, `harga_bar`) VALUES
(2, 'ayam bakar', 1, 123, 25000),
(3, 'mobil', 2, 123, 1000000000),
(6, 'motor', 3, 21, 200000),
(14, 'kabel', 3, 21, 50000),
(15, 'lampu taman', 3, 34, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `category`) VALUES
(1, 'makanan'),
(2, 'peralatan'),
(3, 'elektronik'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custumer`
--

CREATE TABLE `tbl_custumer` (
  `id_cust` int(11) NOT NULL,
  `nama_cust` varchar(50) NOT NULL,
  `alamat_cust` varchar(255) NOT NULL,
  `no_tlp_cust` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custumer`
--

INSERT INTO `tbl_custumer` (`id_cust`, `nama_cust`, `alamat_cust`, `no_tlp_cust`) VALUES
(2, 'Aldo', 'jl apel', '0835435613'),
(3, 'gunawan', 'jalan-alan', '0834554231'),
(4, 'herman', 'asfa', '0233423543'),
(5, 'dadang', 'jl. anyar', '96345342'),
(6, 'samsudin', 'jl apel', '213134234'),
(7, 'ANAM MAULANA', 'dasfa', '2342');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nama_kar` varchar(100) NOT NULL,
  `alamat_kar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `username`, `password`, `nama_kar`, `alamat_kar`) VALUES
(13, 'admin2', '202cb962ac59075b964b07152d234b70', 'anam maulana', 'jalan karang anyar'),
(14, 'admin1', '202cb962ac59075b964b07152d234b70', 'ANAM MAULANA', 'jl apel'),
(15, 'Maulana', '202cb962ac59075b964b07152d234b70', 'MUHAMMAD AHLAM PUTRA GANIS', 'jl duren'),
(16, 'udin', '202cb962ac59075b964b07152d234b70', 'udin pea', 'jl ipik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_barang`, `id_category`, `id_cust`, `jumlah`, `total_harga`) VALUES
(10, 2, 1, 4, 7, 35000),
(11, 6, 1, 2, 67, 670000),
(12, 15, 3, 7, 31231, 468465000),
(13, 3, 2, 6, 12, 60000),
(14, 3, 3, 5, 9, 2147483647),
(20, 3, 1, 7, 73, 2147483647),
(21, 2, 1, 2, 95, 2375000),
(22, 2, 1, 5, 2, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin_user', 'admin_password', 'admin', '2023-12-07 10:18:48', '2023-12-07 10:18:48'),
(2, 'regular_user', 'user_password', 'user', '2023-12-07 10:18:48', '2023-12-07 10:18:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_custumer`
--
ALTER TABLE `tbl_custumer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_barang_2` (`id_barang`,`id_category`,`id_cust`),
  ADD KEY `id_barang` (`id_barang`,`id_category`) USING BTREE,
  ADD KEY `id_cust` (`id_cust`) USING BTREE;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_custumer`
--
ALTER TABLE `tbl_custumer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
