-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 03:23 AM
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
-- Database: `sthf`
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
('amirulasri', '12345678', '030320030493'),
('faiz', '12345678', '040427140417'),
('faizbaik', '12345678', '030303140417'),
('faizhensam', 'dadadada', ''),
('zakwangay', '12345678', '901382313233'),
('zakwangayx2', '12345678', '030876141321');

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
('030303140417', 'faiz syg nika', '01160778679', 'lelaki', 'faizalacart@gmail.com'),
('030314248410', 'Muhammad Faiz Bin Muhammad Zaimi', '0135845626', 'lelaki', 'faizalacart@gmail.com'),
('030320030493', 'Amirul Asri', '01135020493', 'lelaki', 'kkk@s.s'),
('030327140417', 'Muhammad Faiz Bin Muhammad Zaimi', '01160778679', 'lelaki', 'faizalacart@gmail.com'),
('030327140714', 'Muhammad Faiz Bin Muhammad Zaimi', '01160778679', 'lelaki', 'faizalacart@gmail.com'),
('030876141321', 'zakwangayx2', '23023124123', 'perempuan', 'faizalacart@gmail.com'),
('040427140417', 'faiz', '01160778679', 'lelaki', 'faizalacart@gmail.com'),
('901382313233', 'zakwangay', '03028462811', 'perempuan', 'faizalacart@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `idrumah` int(150) NOT NULL,
  `namarumah` text NOT NULL,
  `pemandangan` varchar(150) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`idrumah`, `namarumah`, `pemandangan`, `harga`) VALUES
(3, 'BANGLO 2 TINGKAT', 'Tepi pantai', '350'),
(4, 'BANGLO SETINGKAT', 'Teluk Pantai', '300'),
(5, 'BANGLO KECIL', 'Tepi pantai', '260');

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
(1, '030327140417', 3, '3', '2020-10-27', '1050');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginpelanggan`
--
ALTER TABLE `loginpelanggan`
  ADD UNIQUE KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `idrumah` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
