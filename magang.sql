-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 04:58 PM
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_data_user`
--

CREATE TABLE `t_data_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_user`
--

INSERT INTO `t_data_user` (`id_user`, `nama`, `password`, `email`, `level`) VALUES
(10, 'Dodi', '123', 'dodih127@gmail.com', 'staff'),
(11, 'Ardi', '123', '', 'staff'),
(12, 'admin', 'admin', '', 'admin'),
(15, 'manager', 'manager', '', 'manager'),
(16, 'Budi', '123', '', 'staff');

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
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `info` varchar(300) NOT NULL,
  `no_spk` varchar(100) NOT NULL,
  `tgl_spk` date NOT NULL,
  `progres` int(10) NOT NULL,
  `tanggal_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_utama`
--

INSERT INTO `t_data_utama` (`no`, `kode_project`, `nama_pic`, `nama_project`, `instansi`, `type`, `divisi`, `esti_pendapatan`, `real_pendapatan`, `tanggal`, `status`, `info`, `no_spk`, `tgl_spk`, `progres`, `tanggal_update`) VALUES
(36, '123asd', 'Dodi', 'aassd', 'dsa', 'New', 'Software Development ', 987283824, 734892374, '2018-08-02', 'Development', 'Oke bos', '123', '2018-08-05', 0, '2018-08-16 13:44:05'),
(37, '826846823jsdgjsj', 'Ardi', 'Tambah bandwith', 'ASD', 'Upgrade', 'ISP (Internet Service Provider)', 1000000000, 2147483647, '2018-08-03', 'Development', 'Proses', '2268463287', '2018-08-02', 0, '2018-08-16 13:44:43'),
(39, 'asd', 'Budi', 'Pasang Wifi', 'Instansi A', 'New', 'ISP (Internet Service Provider)', 200000000, 150000000, '2018-08-15', '', '', '', '0000-00-00', 0, '2018-08-15 16:40:05');

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
-- Table structure for table `t_detail`
--

CREATE TABLE `t_detail` (
  `id_detail` int(10) NOT NULL,
  `nama_project` varchar(100) NOT NULL,
  `nama_pic` varchar(20) NOT NULL,
  `instansi` varchar(20) NOT NULL,
  `rincian` varchar(100) NOT NULL,
  `progres` int(10) NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_detail`
--

INSERT INTO `t_detail` (`id_detail`, `nama_project`, `nama_pic`, `instansi`, `rincian`, `progres`, `tgl_update`) VALUES
(4, 'Tambah bandwith', 'Ardi', 'ASD', '<p>Proposal</p>', 50, '2018-08-10 11:29:05'),
(5, 'Tambah bandwith', 'Ardi', 'ASD', '<p>Proses</p>', 60, '2018-08-09 11:41:10'),
(9, 'Tambah bandwith', 'Ardi', 'ASD', '<p>Penagihan</p>', 80, '2018-08-09 11:39:32'),
(10, 'Software Development', 'Ardi', 'DSA', '<p>Proposal</p>', 80, '2018-08-09 11:44:24'),
(11, 'Software Development', 'Ardi', 'DSA', '<p>Penagihan</p>', 50, '2018-08-09 11:44:28'),
(12, 'Software Development', 'Ardi', 'DSA', '<p>Proses</p>', 40, '2018-08-09 11:44:31'),
(14, 'Ardi', 'Ardi', 'DSA', '<p>sukses</p>', 30, '2018-08-08 00:00:00'),
(15, 'Ardi', 'Ardi', 'DSA', '<p>sukses</p>', 30, '2018-08-08 00:00:00'),
(21, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Penagihan</p>', 60, '2018-08-09 00:00:00'),
(22, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proposal</p>', 50, '2018-08-09 01:38:36'),
(23, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(24, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(25, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(26, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(27, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(28, 'RBJ Internert', 'Ardi', 'Polindra', '<p>Proses</p>', 30, '2018-08-09 01:40:51'),
(29, 'aassd', 'Dodi', 'dsa', '<p>Proposal</p>', 90, '2018-08-10 11:26:20'),
(30, 'aassd', 'Dodi', 'dsa', '<p>Penagihan</p>', 60, '2018-08-09 03:29:48'),
(31, 'aassd', 'Dodi', 'dsa', '<p>Proses</p>', 40, '2018-08-10 11:13:09');

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
(285, 'aassd', 'dsa', 'Dodi', '', 20, '2018-08-16 13:27:41', '', 'KTP.pdf'),
(286, 'aassd', 'dsa', 'Dodi', '<p>Proses</p>', 20, '2018-08-16 13:30:45', '', 'Form_Pendaftaran1.doc'),
(287, 'aassd', 'dsa', 'Dodi', '', 0, '2018-08-16 13:40:46', '', 'KTP.docx'),
(288, 'aassd', 'dsa', 'Dodi', '', 0, '2018-08-16 13:42:12', '', ''),
(289, 'aassd', 'dsa', 'Dodi', '', 0, '2018-08-16 13:43:55', '', ''),
(290, 'aassd', 'dsa', 'Dodi', '', 0, '2018-08-16 13:44:05', '', 'asd.jpg'),
(291, 'Tambah bandwith', 'ASD', 'Ardi', '', 0, '2018-08-16 13:44:43', '', 'asd1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `t_detail`
--
ALTER TABLE `t_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `t_divisi`
--
ALTER TABLE `t_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_data_user`
--
ALTER TABLE `t_data_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_data_utama`
--
ALTER TABLE `t_data_utama`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `t_department`
--
ALTER TABLE `t_department`
  MODIFY `id_department` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_detail`
--
ALTER TABLE `t_detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `t_divisi`
--
ALTER TABLE `t_divisi`
  MODIFY `id_divisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
