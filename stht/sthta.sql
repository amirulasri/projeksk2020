-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 04:21 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stht`
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
('5fikrah', '12345678', '990814040077');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kppelanggan` varchar(12) NOT NULL,
  `namapelanggan` varchar(150) NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `namapelanggan`, `notelpelanggan`, `jantina`, `email`) VALUES
('990814040077', '5fikrah', '0133013153', 'lelaki', '5fikrah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE IF NOT EXISTS `rumah` (
`idrumah` int(150) NOT NULL,
  `namarumah` text NOT NULL,
  `pemandangan` varchar(150) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`idrumah`, `namarumah`, `pemandangan`, `harga`) VALUES
(10, 'Terra 1', 'Pantai', '60'),
(11, 'Terra 2', 'Hutan', '60'),
(12, 'Terra 3', 'Bangunan', '60');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idrumah`, `jumlahhari`, `tarikhmasuk`, `jumlahharga`) VALUES
(2, '990814040077', 10, '4', '2020-09-24', '240');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD UNIQUE KEY `id` (`id`);

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
 ADD PRIMARY KEY (`idtempahan`), ADD UNIQUE KEY `kppelanggan` (`kppelanggan`), ADD UNIQUE KEY `idrumah` (`idrumah`), ADD KEY `idrumah_2` (`idrumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
MODIFY `idrumah` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`kppelanggan`) REFERENCES `pelanggan` (`kppelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`idrumah`) REFERENCES `rumah` (`idrumah`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
