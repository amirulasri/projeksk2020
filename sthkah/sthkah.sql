-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 11:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
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

CREATE TABLE `loginpelanggan` (
  `id` varchar(150) NOT NULL,
  `katalaluan` varchar(8) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginpelanggan`
--

INSERT INTO `loginpelanggan` (`id`, `katalaluan`, `kppelanggan`) VALUES
('5fikrah', '12345678', ''),
('afif', '12345678', '030703100733'),
('afiq', '12345678', '010101100101'),
('kerol anwar', '12345678', ''),
('khairul anwar', '12345678', '030307100733'),
('razin', '12345678', '040407100377');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kppelanggan` varchar(12) NOT NULL,
  `namapelanggan` varchar(255) NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL,
  `jantina` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `namapelanggan`, `notelpelanggan`, `jantina`, `email`) VALUES
('010101100101', 'afiq', '0123392049', 'lelaki', 'afiq7@gmail.com'),
('030307100733', 'Khairul Anwar', '0124823379', 'lelaki', 'anwar36.ka@gmail.com'),
('040407100377', 'Razin', '0123392049', 'lelaki', 'razin7@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `idrumah` int(150) NOT NULL,
  `pemandangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`idrumah`, `pemandangan`) VALUES
(0, 'bawah pasir'),
(4, 'Tepi Sawah'),
(5, 'Bawah Pasir'),
(6, 'Dalam Gua'),
(7, 'Tepi Laut'),
(8, 'Tepi Pantai'),
(9, 'Atas Bukit'),
(10, 'Atas Gunung');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idtempahan` int(150) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idrumah` int(150) NOT NULL,
  `jumlahhari` varchar(255) NOT NULL,
  `tarikhmasuk` varchar(255) NOT NULL,
  `jumlahharga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idrumah`, `jumlahhari`, `tarikhmasuk`, `jumlahharga`) VALUES
(13, '030307100733', 4, '3', '2020-05-25', '390'),
(14, '030307100733', 5, '5', '2020-05-27', '650'),
(15, '040407100377', 4, '3', '2020-05-20', '390'),
(16, '040407100377', 5, '5', '2020-05-25', '650'),
(19, '030307100733', 6, '3', '2020-05-25', '390');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`idtempahan`),
  ADD KEY `kppelanggan` (`kppelanggan`),
  ADD KEY `idrumah` (`idrumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`kppelanggan`) REFERENCES `pelanggan` (`kppelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`idrumah`) REFERENCES `rumah` (`idrumah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
