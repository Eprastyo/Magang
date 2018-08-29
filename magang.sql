-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 04:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
  `id_user` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_user`
--

INSERT INTO `t_data_user` (`id_user`, `nama`, `password`, `email`, `level`) VALUES
(10, 'Dodi', '123', 'dodih127@gmail.com', 'staff'),
(11, 'Ardi', '123', 'dodih1227@gmail.com', 'staff'),
(12, 'admin', 'admin', 'dodih1227@gmail.com', 'admin'),
(15, 'manager', 'manager', 'ekoprastyo697@gmail.com', 'manager'),
(19, 'prast', 'asd123', 'prastyo050497@gmail.com', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `t_data_utama`
--

CREATE TABLE `t_data_utama` (
  `no` int(10) NOT NULL,
  `kode_project` varchar(100) NOT NULL,
  `nama_pic` varchar(20) NOT NULL,
  `nama_project` varchar(500) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `esti_pendapatan` int(20) NOT NULL,
  `real_pendapatan` int(20) NOT NULL,
  `email_group` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `progres` int(10) NOT NULL,
  `pic_instansi` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_utama`
--

INSERT INTO `t_data_utama` (`no`, `kode_project`, `nama_pic`, `nama_project`, `instansi`, `type`, `divisi`, `esti_pendapatan`, `real_pendapatan`, `email_group`, `tanggal`, `progres`, `pic_instansi`, `no_telp`) VALUES
(123, '', 'Dodi', 'Internet', 'Polindra', 'New', 'ISP (Internet Service Provider)', 300000000, 200000000, 'dodih1227@gmail.com,ekoprastyo697@gmail.com,prastyo050497@gmail.com', '2018-08-29 15:29:55', 10, 'ecos', '321'),
(124, '', 'Ardi', 'Sotware', 'Instansi B', 'New', 'Software Development ', 250000000, 175000000, 'dodih127@gmail.com,dodih1227@gmail.com,ekoprastyo697@gmail.com', '2018-08-29 15:45:41', 20, 'asd', '321');

-- --------------------------------------------------------

--
-- Table structure for table `t_department`
--

CREATE TABLE `t_department` (
  `id_department` int(20) NOT NULL,
  `nama_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_department`
--

INSERT INTO `t_department` (`id_department`, `nama_department`) VALUES
(2, 'Software Development '),
(3, 'ISP (Internet Service Provider)'),
(8, 'Infrastruktur'),
(9, 'BDC');

-- --------------------------------------------------------

--
-- Table structure for table `t_group_mail`
--

CREATE TABLE `t_group_mail` (
  `id_group` int(11) NOT NULL,
  `nama_pic` varchar(30) NOT NULL,
  `nama_project` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  `email_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_log`
--

CREATE TABLE `t_log` (
  `id_log` int(255) NOT NULL,
  `nama_project` varchar(30) NOT NULL,
  `instansi` varchar(30) NOT NULL,
  `nama_pic` varchar(30) NOT NULL,
  `rincian_log` varchar(100) NOT NULL,
  `progress_log` int(100) NOT NULL,
  `update_log` datetime NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_log`
--

INSERT INTO `t_log` (`id_log`, `nama_project`, `instansi`, `nama_pic`, `rincian_log`, `progress_log`, `update_log`, `komentar`, `file`) VALUES
(82, 'Internet', 'Polindra', 'Dodi', '<p>Awal Proposal</p>', 10, '2018-08-29 15:29:55', '', ''),
(83, 'Sotware', 'Instansi B', 'Ardi', '<p>Masih ada Kendala bos</p>', 10, '2018-08-29 15:31:03', '<p>Apa kendalanya ?</p>', ''),
(84, 'Sotware', 'Instansi B', 'Ardi', '<p>Terbaru</p>', 10, '2018-08-29 15:44:24', '', ''),
(85, 'Sotware', 'Instansi B', 'Ardi', '', 20, '2018-08-29 15:45:41', '', '');

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
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `t_group_mail`
--
ALTER TABLE `t_group_mail`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_data_user`
--
ALTER TABLE `t_data_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_data_utama`
--
ALTER TABLE `t_data_utama`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `t_department`
--
ALTER TABLE `t_department`
  MODIFY `id_department` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_group_mail`
--
ALTER TABLE `t_group_mail`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
