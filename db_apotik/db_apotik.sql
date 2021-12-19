-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 12:13 PM
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
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME` varchar(225) NOT NULL,
  `PASSWORD` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASSWORD`) VALUES
('1', '1'),
('user1', '24c9e15e52afc47c225b757e7bee1f9d');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `KODE_DETIL` int(11) NOT NULL,
  `KODE_TRANSAKSI` int(11) DEFAULT NULL,
  `KODE_OBAT` int(11) NOT NULL,
  `SUB_TOTAL` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `KODE_OBAT` int(11) NOT NULL,
  `KODE_SUPPLIER` int(11) NOT NULL,
  `KODE_DETIL` int(11) DEFAULT NULL,
  `NAMA_OBAT` varchar(225) DEFAULT NULL,
  `PRODUSEN` varchar(225) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `JML_STOK` int(11) DEFAULT NULL,
  `FOTO` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`KODE_OBAT`, `KODE_SUPPLIER`, `KODE_DETIL`, `NAMA_OBAT`, `PRODUSEN`, `HARGA`, `JML_STOK`, `FOTO`) VALUES
(21, 4, 1231214, 'Paracetamol', 'Pt.Indah Kusuma', 3000, 82, NULL),
(55, 1, NULL, 'Oskadon', 'Pt. Pancen Oye', 1500, 5, 0x77363434312e6a7067),
(123, 5, NULL, 'Parameg', 'tqwtq', 789, 802, 0x4261636b67726f756e642d5a6f6f6d2d53706f6e6765426f622d322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `KODE_SUPPLIER` int(11) NOT NULL,
  `NAMA_SUPPLIER` varchar(225) DEFAULT NULL,
  `ALAMAT` varchar(225) DEFAULT NULL,
  `KOTA` varchar(225) DEFAULT NULL,
  `TELP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`KODE_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT`, `KOTA`, `TELP`) VALUES
(1, 'PT. APOTIKA 24 JAM', 'Jl. Kota Baru', 'Gresik', 852654236),
(2, 'PT. SEMBUH SELALU', 'Jl. Petiken', 'Gresik', 85646654),
(3, 'PT. SEHAT SEJAHTERA', 'Jl. Tenaru', 'Gresik', 50646654),
(4, 'PT. AKU PADAMU', 'Jl. Kesamben Wetan', 'Gresik', 84651654),
(5, 'PT. PUSING MINUM OBAT', 'Jl. Cangkir', 'Gresik', 84546546),
(6, 'PT. LAPAR YA MAKAN', 'Jl. Bambe', 'Gresik', 8465165);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `KODE_TRANSAKSI` int(11) NOT NULL,
  `KODE_DETIL` int(11) NOT NULL,
  `USERNAME` varchar(225) NOT NULL,
  `NAMA_PEMBELI` varchar(225) DEFAULT NULL,
  `TGL_TRANSAKSI` date DEFAULT NULL,
  `SUB_TOTAL` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`KODE_DETIL`),
  ADD KEY `FK_MEMPUNYAI` (`KODE_OBAT`),
  ADD KEY `FK_MEMILIKI2` (`KODE_TRANSAKSI`) USING BTREE;

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`KODE_OBAT`),
  ADD UNIQUE KEY `FK_MENYUPLAI` (`KODE_SUPPLIER`),
  ADD UNIQUE KEY `FK_MEMPUNYAI2` (`KODE_DETIL`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KODE_SUPPLIER`),
  ADD UNIQUE KEY `FK_MENGELOLA` (`NAMA_SUPPLIER`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KODE_TRANSAKSI`),
  ADD UNIQUE KEY `FK_MEMILIKI` (`KODE_DETIL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`KODE_TRANSAKSI`) REFERENCES `transaksi` (`KODE_TRANSAKSI`),
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`KODE_OBAT`) REFERENCES `obat` (`KODE_OBAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
