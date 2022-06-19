-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 04:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_kredit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` double NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `id_kredit`, `id_user`, `tgl_bayar`, `jml_bayar`, `bukti`) VALUES
(1, 1, 3, '2022-06-13', 555555.55555556, '4772-Modul Pertemuan 9.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kredit`
--

CREATE TABLE `tbl_kredit` (
  `id_kredit` int(11) NOT NULL,
  `no_ref` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `sisa_lama` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kredit`
--

INSERT INTO `tbl_kredit` (`id_kredit`, `no_ref`, `tgl_pembayaran`, `id_pengajuan`, `sisa_lama`, `total`) VALUES
(1, 1234, '2022-06-13', 4, 35, 19444444.444444),
(2, 678905, '2022-06-18', 3, 24, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `nm_pengaju` varchar(40) NOT NULL,
  `jumlah` double NOT NULL,
  `lama` int(11) NOT NULL,
  `cicilan` double NOT NULL,
  `ktp` text NOT NULL,
  `jaminan` text NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `tgl_pengajuan`, `nm_pengaju`, `jumlah`, `lama`, `cicilan`, `ktp`, `jaminan`, `foto`, `status`) VALUES
(3, '2022-04-11', 'Wakidin Nur', 10000000, 24, 416666.66666667, '4255-TI.PNG', '4255-halaman sister.PNG', '4255-KA.PNG', 'Diterima'),
(4, '2022-06-11', 'Budi Sulap', 20000000, 36, 555555.55555556, '9873-Pertemuan 1.pdf', '9873-Pertemuan 2.pdf', '9873-Pertemuan 3.pdf', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_user`, `status`) VALUES
(1, 'kidin', '12345', 'Wakidin Nur', 'Nasabah'),
(2, 'admin', '12345', 'Chairun Nas', 'Administrator'),
(3, 'budi', '12345', 'Budi Sulap', 'Nasabah'),
(4, 'manajer', '12345', 'Ali Akbar', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tbl_kredit`
--
ALTER TABLE `tbl_kredit`
  ADD PRIMARY KEY (`id_kredit`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kredit`
--
ALTER TABLE `tbl_kredit`
  MODIFY `id_kredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
