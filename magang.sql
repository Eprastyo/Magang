-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 04:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_data_user`
--

CREATE TABLE `t_data_user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_user`
--

INSERT INTO `t_data_user` (`id_user`, `nama`, `password`, `level`) VALUES
('0001ST', 'Ahmad', '123', 'staff'),
('0002MN', 'Rudi', '123', 'manager'),
('0002ST', 'Soni', '321', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `t_data_utama`
--

CREATE TABLE `t_data_utama` (
  `no` int(10) NOT NULL,
  `nama_pic` varchar(20) NOT NULL,
  `nama_project` varchar(20) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `esti_pendapatan` int(20) NOT NULL,
  `real_pendapatan` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_utama`
--

INSERT INTO `t_data_utama` (`no`, `nama_pic`, `nama_project`, `instansi`, `type`, `divisi`, `esti_pendapatan`, `real_pendapatan`, `tanggal`) VALUES
(14, 'Dodi', 'Software', 'AAA', 'Upgrade', 'Infrastruktur', 200000000, 400000000, '2018-07-19'),
(15, 'Ahmad', 'Infrastruktur', 'Polindra', 'Baru', 'Infrastruktur', 300000000, 300000000, '2018-07-20'),
(16, 'Toni', 'Internet', 'ASD', 'Baru', 'ISP', 200000000, 500000000, '2018-07-24'),
(22, 'Aditya', 'Penambahan Bandwith', 'ASD', 'Upgrade', 'ISP', 100000000, 70000000, '2018-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `t_department`
--

CREATE TABLE `t_department` (
  `kode_department` varchar(20) NOT NULL,
  `nama_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_divisi`
--

CREATE TABLE `t_divisi` (
  `id_divisi` int(10) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_divisi`
--

INSERT INTO `t_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Departemen Software Development'),
(2, 'Departemen ISP (Internet Service Provider)'),
(3, 'Departemen BDC (Bisnis Development Consultant)'),
(4, 'Departemen Infrastruktur');

-- --------------------------------------------------------

--
-- Table structure for table `t_type`
--

CREATE TABLE `t_type` (
  `id_type` int(5) NOT NULL,
  `nama_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_type`
--

INSERT INTO `t_type` (`id_type`, `nama_type`) VALUES
(1, 'Baru'),
(2, 'Upgrade'),
(3, 'Downgrade');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_data_user`
--
ALTER TABLE `t_data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_data_utama`
--
ALTER TABLE `t_data_utama`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `t_department`
--
ALTER TABLE `t_department`
  ADD PRIMARY KEY (`kode_department`);

--
-- Indexes for table `t_divisi`
--
ALTER TABLE `t_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `t_type`
--
ALTER TABLE `t_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_data_utama`
--
ALTER TABLE `t_data_utama`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_divisi`
--
ALTER TABLE `t_divisi`
  MODIFY `id_divisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_type`
--
ALTER TABLE `t_type`
  MODIFY `id_type` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
