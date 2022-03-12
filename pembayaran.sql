-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 08:25 AM
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
-- Database: `pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tagihan`
--

CREATE TABLE `detail_tagihan` (
  `no_tagihan` varchar(20) NOT NULL,
  `nama_tagihan` varchar(255) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tagihan`
--

INSERT INTO `detail_tagihan` (`no_tagihan`, `nama_tagihan`, `sub_total`, `id`) VALUES
('PJ673039', 'SPP', 100000, 35),
('PJ673039', 'Seminar', 157000, 36),
('PJ673039', 'Pembangunan', 3400000, 37),
('PJ490744', 'SPP', 100000, 38),
('PJ490744', 'SKS', 123000, 39),
('PJ490744', 'Pembangunan', 3400000, 40),
('PJ490744', 'Seminar', 157000, 41),
('PJ291219', 'SPP', 100000, 42),
('PJ291219', 'SKS', 123000, 43),
('PJ291219', 'Pembangunan', 3400000, 44),
('PJ291219', 'Seminar', 157000, 45),
('PJ893717', 'SKS', 123000, 46),
('PJ893717', 'Seminar', 157000, 47),
('PJ893717', 'Gedung', 114000, 48),
('PJ495520', 'SPP', 100000, 49),
('PJ495520', 'SKS', 123000, 50),
('PJ495520', 'Parkir', 300000, 51),
('PJ495520', 'Seminar', 157000, 52),
('PJ718251', 'Gedung', 114000, 53),
('PJ718251', 'Parkir', 300000, 54),
('PJ416135', 'Ujian', 1500000, 55),
('PJ416135', 'Parkir', 300000, 56),
('PJ416135', 'SPP', 100000, 57),
('PJ416135', 'Seminar', 157000, 58),
('PJ527035', 'SPP', 100000, 59),
('PJ527035', 'Seminar', 1500000, 60),
('PJ527035', 'Parkir', 157000, 61);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama_pembayaran` varchar(255) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_pembayaran`, `jumlah`) VALUES
(1, 'SPP', 100000),
(2, 'SKS', 123000),
(6, 'Pembangunan', 3400000),
(7, 'Seminar', 157000),
(8, 'Gedung', 114000),
(16, 'Parkir', 300000),
(17, 'Ujian', 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `nim`, `jurusan`, `username`, `password`, `role`) VALUES
(1, 'bendahara', NULL, NULL, 'bendahara', '$2y$10$cl2hGVVA4E7v7xYaiFihfeUKPgkguHX4FB1rui/RuUmPejspaXlhe', 'bendahara'),
(4, 'pimpinan', NULL, NULL, 'pimpinan', '$2y$10$hBfN9jhZXeRahWbYJzKkgOJr9fhHc/TJePoEZUUx1roh23JueNodi', 'pimpinan'),
(5, 'bendahara', NULL, NULL, 'bendahara', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'bendahara'),
(14, 'ani', '33333', 'matematika', '33333', '$2y$10$1RR4S8jVM64P966tzI5q7OLsFrUCjtFRq6bsRunDybGlnu562S0De', 'mahasiswa'),
(15, 'doni ', '12345', 'sistem informasi', '12345', '$2y$10$RRcrLPrzV0XE/OIdLrcVjeMn0m6sSpx1y80OKNBeSnXdQrabmceJK', 'mahasiswa'),
(16, 'andi', '567890', 'matematika', '567890', '$2y$10$raF8sPPXOxjDZoPKQ2o5zO6wKogvA5myfeoEdULQi0I0MMjxkU4la', 'mahasiswa'),
(17, 'sudirman', '232323', 'Sistem informasi', '232323', '$2y$10$sttQSK1GyqSxZE600A87LuCbyM/xppkrfT/4GPrpJByeYofa8eu8.', 'mahasiswa'),
(18, 'karni', NULL, NULL, 'karni', '$2y$10$8vLhxRUONv1g/slJ1HqfD.aQHZa9UDFZTD2EfJu52HddDKBAaPTJu', 'pimpinan'),
(19, 'adam', '23465', 'Biologi', '23465', '$2y$10$4B2wwnFJeXEpFKZdBYARK.Og41j1nN7Y/8vqdC3d4SYQBHTMfk4Z6', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `no_tagihan` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `nama_mahasiswa`, `semester`, `total`, `no_tagihan`, `status`) VALUES
(27, 'doni ', '1', 3657000, 'PJ673039', 'lunas'),
(28, 'ani', '1', 3780000, 'PJ490744', 'belum lunas'),
(29, 'doni ', '2', 3780000, 'PJ291219', 'lunas'),
(30, 'andi', '5', 394000, 'PJ893717', 'lunas'),
(31, 'sudirman', '1', 680000, 'PJ495520', 'lunas'),
(32, 'doni ', '3', 414000, 'PJ718251', 'belum lunas'),
(33, 'adam', '1', 2057000, 'PJ416135', 'lunas'),
(34, 'doni ', '4', 1757000, 'PJ527035', 'belum lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
