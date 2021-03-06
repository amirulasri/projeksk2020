-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 08:16 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sthh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(150) NOT NULL,
  `katalaluan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `katalaluan`) VALUES
('admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `loginpelanggan`
--

CREATE TABLE IF NOT EXISTS `loginpelanggan` (
  `id` varchar(150) NOT NULL,
  `katalaluan` varchar(8) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginpelanggan`
--

INSERT INTO `loginpelanggan` (`id`, `katalaluan`, `kppelanggan`) VALUES
('5fikrah', '12345678', '030202100235'),
('akmal', '11111111', '950623100396'),
('danial', '11111111', '030202100235'),
('haiqal', '11111111', '960202100476'),
('test12', '12345678', '073723792739');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kppelanggan` varchar(12) NOT NULL,
  `namapelanggan` varchar(150) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `emailpelanggan` varchar(150) NOT NULL,
  `notelpelanggan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `namapelanggan`, `umur`, `emailpelanggan`, `notelpelanggan`) VALUES
('030202100235', 'Muhammad Danial Haiqal Bin Shukor', '24', 'daenial@gmai.com', ''),
('950623100396', 'akmal', '24', 'mal032@gmail.com', ''),
('960202100476', 'danial', '23', 'daenial@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE IF NOT EXISTS `rumah` (
`idrumah` int(150) NOT NULL,
  `namarumah` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`idrumah`, `namarumah`) VALUES
(9, 'Kristina Village'),
(10, 'Dinelle Permata'),
(11, 'Dinelle Kasturi');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE IF NOT EXISTS `tempahan` (
`idtempahan` int(150) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idrumah` int(150) NOT NULL,
  `jumlahhari` varchar(150) NOT NULL,
  `tarikhmasuk` varchar(150) NOT NULL,
  `jumlahharga` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idrumah`, `jumlahhari`, `tarikhmasuk`, `jumlahharga`) VALUES
(14, '950623100396', 10, '3', '2020-02-05', '210'),
(17, '960202100476', 9, '2', '2020-02-02', '140'),
(18, '960202100476', 11, '3', '2020-07-10', '210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginpelanggan`
--
ALTER TABLE `loginpelanggan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`kppelanggan`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
 ADD PRIMARY KEY (`idrumah`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
 ADD PRIMARY KEY (`idtempahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
MODIFY `idrumah` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
