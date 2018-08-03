-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 03:49 AM
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
  `id_user` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_user`
--

INSERT INTO `t_data_user` (`id_user`, `nama`, `password`, `level`) VALUES
(1, 'Rudi', '123', 'manager'),
(10, 'Dodi', '123', 'staff'),
(11, 'Ardi', '123', 'staff'),
(12, 'admin', 'admin', 'manager'),
(14, 'staff', 'staff', 'staff');

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
  `tgl_spk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_data_utama`
--

INSERT INTO `t_data_utama` (`no`, `kode_project`, `nama_pic`, `nama_project`, `instansi`, `type`, `divisi`, `esti_pendapatan`, `real_pendapatan`, `tanggal`, `status`, `info`, `no_spk`, `tgl_spk`) VALUES
(36, '123asd', 'Dodi', 'aassd', 'dsa', 'New', 'Software Development ', 987283824, 734892374, '2018-08-02', 'Development', 'Oke bos', '123', '2018-08-02'),
(37, '826846823jsdgjsj', 'Ardi', 'aksdhasldkas', 'skdhkaskd', 'Upgrade', 'ISP (Internet Service Provider)', 1000000000, 2147483647, '0000-00-00', 'Development', 'Proses', '2268463287', '2018-08-02'),
(38, 'yuqwetqwue273', 'Ardi', 'hsdkhaskjdh', 'kjhsdkaks', 'Existing', 'Software Development ', 72848726, 78238725, '0000-00-00', 'Development', 'jaksdaskdgaskjd', '47476', '2018-08-02');

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
  ADD PRIMARY KEY (`id_department`);

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
-- AUTO_INCREMENT for table `t_data_user`
--
ALTER TABLE `t_data_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_data_utama`
--
ALTER TABLE `t_data_utama`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `t_department`
--
ALTER TABLE `t_department`
  MODIFY `id_department` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
