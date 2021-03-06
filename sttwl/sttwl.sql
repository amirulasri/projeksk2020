-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 05:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sttwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(150) NOT NULL,
  `katalaluan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginpelanggan`
--

INSERT INTO `loginpelanggan` (`id`, `katalaluan`, `kppelanggan`) VALUES
('amirul', '12345678', ''),
('amirul3', '12345678', '030320030493'),
('amirulasri', '12345678', '030320030490'),
('azhari', '12345678', '123456789098'),
('hakim ziyech', '12345678', '030618100302'),
('liza', '12345678', '730804145446'),
('Muhai', '12345678', '040620100401'),
('pak abu', '12345678', ''),
('Podolski', '12345678', ''),
('pulisic ', '87654321', '183782362892'),
('Ronaldo', '12345678', '030517100301');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kppelanggan` varchar(12) NOT NULL,
  `jantina` varchar(100) NOT NULL,
  `namapelanggan` text NOT NULL,
  `emailpelanggan` text NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `jantina`, `namapelanggan`, `emailpelanggan`, `notelpelanggan`) VALUES
('030320030490', 'Lelaki', 'Amirul Asri', 'a@a.a', '01135020493'),
('030320030491', 'Lelaki', 'Amirul Asri', 'kk@kk.k', '01102020202'),
('030320030492', 'Perempuan', 'Haliza Abdul Khalil', 'haliza@gmail.com', '01123456789'),
('030320030493', 'Lelaki', 'Amirul Asri Bin Azmi', 'amirulasrix@gmail.com', '01135020493'),
('030517100301', 'jantina', 'Ronaldo', 'Ronaldo@gmail.com', '01124259586'),
('030618100302', 'jantina', 'Hakim Ziyech', 'hakim@gmail.com', '01132369687'),
('040620100401', 'jantina', 'Muhai', 'Muhai@yahoo.com', '0122145423'),
('123456789098', 'Lelaki', 'AZHARI ZAINAL', 'jjj@gmail.com', '01135020493'),
('183782362892', 'jantina', 'pulisic', 'pulisic@gmail.com', '742972947'),
('730804145446', 'Perempuan', 'liza', 'cyberone2010@gmail.com', '0196544072'),
('asas', 'Lelaki', 'sasa', 'skasklaj@kljkls.d', '12121312');

-- --------------------------------------------------------

--
-- Table structure for table `tayangan`
--

CREATE TABLE `tayangan` (
  `idtayangan` int(150) NOT NULL,
  `namatayangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tayangan`
--

INSERT INTO `tayangan` (`idtayangan`, `namatayangan`) VALUES
(35, 'iron man'),
(39, 'ready or not'),
(40, 'ready or not'),
(41, 'ready or not'),
(100, 'sonic'),
(103, 'Nawfal n the Gang'),
(104, 'Ready or not'),
(105, 'Jumanji'),
(106, 'Conjuring'),
(154, 'rambo');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idtempahan` int(150) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idtayangan` int(150) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `tarikhtayangan` varchar(150) NOT NULL,
  `jumlahharga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idtayangan`, `jumlahtiket`, `tarikhtayangan`, `jumlahharga`) VALUES
(44, '040620100401', 39, 1, '2020-07-28', '20'),
(46, '183782362892', 39, 4, '2020-08-19', '80');

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
-- Indexes for table `tayangan`
--
ALTER TABLE `tayangan`
  ADD PRIMARY KEY (`idtayangan`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`idtempahan`),
  ADD KEY `kppelanggan` (`kppelanggan`),
  ADD KEY `idtayangan` (`idtayangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tayangan`
--
ALTER TABLE `tayangan`
  MODIFY `idtayangan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`kppelanggan`) REFERENCES `pelanggan` (`kppelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`idtayangan`) REFERENCES `tayangan` (`idtayangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
