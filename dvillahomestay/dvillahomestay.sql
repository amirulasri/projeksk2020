-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 05:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvillahomestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namaadmin` text NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`, `namaadmin`, `role`) VALUES
('admin', '12345678', 'Admin', 'root'),
('adminamirul', '12345678', 'Amirul Asri', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `email` varchar(150) NOT NULL,
  `namapelanggan` varchar(150) NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`email`, `namapelanggan`, `notelpelanggan`) VALUES
('amirulasrix@gmail.com', 'Amirul Asri', '01135020493');

-- --------------------------------------------------------

--
-- Table structure for table `pelangganlogin`
--

CREATE TABLE `pelangganlogin` (
  `email` varchar(150) NOT NULL,
  `katalaluan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelangganlogin`
--

INSERT INTO `pelangganlogin` (`email`, `katalaluan`) VALUES
('amirulasrix@gmail.com', 'amirulasri');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `idrumah` int(150) NOT NULL,
  `namarumah` varchar(150) NOT NULL,
  `hargarumah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`idrumah`, `namarumah`, `hargarumah`) VALUES
(1, 'Teres', '120'),
(2, 'Banglo', '210'),
(3, 'Rumah Kampung', '85'),
(4, 'Rumah Air', '110');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idtempahan` int(150) NOT NULL,
  `idrumah` int(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tarikhmasuk` varchar(15) NOT NULL,
  `tarikhkeluar` varchar(15) NOT NULL,
  `bildewasa` int(10) NOT NULL,
  `bilkanakkanak` int(10) NOT NULL,
  `jumlahharga` varchar(150) NOT NULL,
  `namapelanggan` varchar(150) NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL,
  `statusbayaran` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `idrumah`, `email`, `tarikhmasuk`, `tarikhkeluar`, `bildewasa`, `bilkanakkanak`, `jumlahharga`, `namapelanggan`, `notelpelanggan`, `statusbayaran`) VALUES
(22, 4, 'amirulasrix@gmail.com', '2020-09-16', '2020-10-01', 3, 2, '1650', 'Amirul Asri', '01135020493', 'Belum dibuat'),
(24, 4, 'amirulasrix@gmail.com', '2020-10-14', '2024-12-28', 4, 4, '168960', 'Amirul Asri', '01135020493', 'Belum dibuat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelangganlogin`
--
ALTER TABLE `pelangganlogin`
  ADD KEY `kunci_asing_email` (`email`) USING BTREE;

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`idrumah`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`idtempahan`),
  ADD KEY `kunci_asing_idrumah` (`idrumah`) USING BTREE,
  ADD KEY `kunci_asing_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `idrumah` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelangganlogin`
--
ALTER TABLE `pelangganlogin`
  ADD CONSTRAINT `pelangganlogin_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `kunci_asing_email` FOREIGN KEY (`email`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kunci_asing_idrumah` FOREIGN KEY (`idrumah`) REFERENCES `rumah` (`idrumah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
