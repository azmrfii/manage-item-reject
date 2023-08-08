-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 05:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(50) NOT NULL,
  `warna_barang` varchar(20) NOT NULL,
  `ukuran_barang` varchar(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_barang`, `nama_barang`, `merk_barang`, `warna_barang`, `ukuran_barang`, `tgl_masuk`, `keterangan`) VALUES
(1, 'SBH01', 'Scarlett Mango Body Wash', 'Scarlett', 'Kuning', 'S', '2022-06-27', 'exp. 2024'),
(2, 'SBH02', 'Coca Cola', 'Cola Coca', 'Biru Navy', 'M', '2022-06-26', 'exp. 2023'),
(4, 'SHB03', 'Micellar Water', 'Garnier', 'Pink Magenta', 'L', '2022-06-27', 'exp. 2025');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_rusak`
--

CREATE TABLE `tb_barang_rusak` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(50) NOT NULL,
  `warna_barang` varchar(20) NOT NULL,
  `ukuran_barang` varchar(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_rusak`
--

INSERT INTO `tb_barang_rusak` (`id_barang`, `kd_barang`, `nama_barang`, `merk_barang`, `warna_barang`, `ukuran_barang`, `tgl_masuk`, `keterangan`) VALUES
(4, 'SBH01', 'Scarlett Mango Body Wash', 'Scarlett', '', '', '2022-06-27', 'exp. 2024'),
(5, 'SHB03', 'Micellar Water', 'Garnier', '', '', '2022-06-27', 'exp. 2025'),
(6, 'SBH02', 'Coca Cola', 'Cola Coca', 'Biru Navy', 'M', '2022-06-26', 'exp. 2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'abc', 'Admin'),
(2, 'manager', 'abc', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_rusak`
--
ALTER TABLE `tb_barang_rusak`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_barang_rusak`
--
ALTER TABLE `tb_barang_rusak`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
