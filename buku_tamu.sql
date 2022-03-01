-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 10:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_inout`
--

CREATE TABLE `cek_inout` (
  `id_inout` int(20) NOT NULL,
  `No_Ktp` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Check_in` time NOT NULL,
  `Check_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cek_inout`
--

INSERT INTO `cek_inout` (`id_inout`, `No_Ktp`, `Tanggal`, `Check_in`, `Check_out`) VALUES
(8, '2345456789876546', '2022-02-23', '13:00:00', '15:25:52'),
(22, '124125315136333', '2022-02-23', '10:00:00', '16:34:34'),
(23, '23344565667789776', '2022-02-23', '13:00:00', '16:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `No_Ktp` varchar(25) NOT NULL,
  `Nama_tamu` varchar(40) NOT NULL,
  `Alamat_tamu` varchar(50) NOT NULL,
  `No_Hp` varchar(12) NOT NULL,
  `Instansi` varchar(30) NOT NULL,
  `Keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`No_Ktp`, `Nama_tamu`, `Alamat_tamu`, `No_Hp`, `Instansi`, `Keperluan`) VALUES
('124125315136333', 'Aditya Redi', 'Waru', '089223456678', 'ITATS', 'Magang'),
('23344565667789776', 'Nasrudin', 'Waru', '081234657876', 'UNITOMO', 'Kontrak'),
('2345456789876546', 'Helma Setiawan', 'Gubeng', '085234123456', 'ITATS', 'Magang');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_pengguna`, `status`) VALUES
(2, 'admin', 'admin123', 'Administrator', 'Aktif'),
(3, 'admin2', 'admin321', 'Administrator', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_inout`
--
ALTER TABLE `cek_inout`
  ADD PRIMARY KEY (`id_inout`),
  ADD KEY `No_Ktp` (`No_Ktp`);

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`No_Ktp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cek_inout`
--
ALTER TABLE `cek_inout`
  MODIFY `id_inout` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
