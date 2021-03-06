-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 08:49 AM
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
-- Database: `sttwp`
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
('admin', '12345678', '030817120318'),
('amirul', '12345678', ''),
('amirul3', '12345678', '030320030493'),
('amirulasri', '12345678', '030320030490'),
('azhari', '12345678', '123456789098'),
('budak46', '12345678', '050412129090'),
('liza', '12345678', '730804145446'),
('nopalla', '03081714', '010302145768'),
('post malone', 'postingx', '040102131212');

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
('010302145768', 'Lelaki', 'nopalla', 'nopalla@gmail.com', '0112928989'),
('030320030490', 'Lelaki', 'Amirul Asri', 'a@a.a', '01135020493'),
('030320030491', 'Lelaki', 'Amirul Asri', 'kk@kk.k', '01102020202'),
('030320030492', 'Perempuan', 'Haliza Abdul Khalil', 'haliza@gmail.com', '01123456789'),
('030320030493', 'Lelaki', 'Amirul Asri Bin Azmi', 'amirulasrix@gmail.com', '01135020493'),
('030817120318', 'Lelaki', 'nopal', 'nopal10@gmail.com', '0123897777'),
('040102131212', 'Lelaki', 'post malone', 'post.malone@gmail.com', '0198999484'),
('050412129090', 'Lelaki', 'budak 46', 'budak46.hensem@gmail.com', '0181217890'),
('123456789098', 'Lelaki', 'AZHARI ZAINAL', 'jjj@gmail.com', '01135020493'),
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
(1, 'Iron Man'),
(2, 'Hadif The Movie 15'),
(3, 'Haliza Film'),
(4, 'Azhari Collection'),
(11, 'Abu Movie 90'),
(12, 'JOKER'),
(30, 'sonic'),
(31, 'alibaba'),
(32, 'rambo'),
(33, 'sonic'),
(34, 'sonic'),
(123, 'Hadif The Movie 15'),
(145, 'Haliza Film'),
(150, 'alibaba'),
(167, 'Azhari Collection'),
(172, 'rambo'),
(183, 'Iron Man'),
(184, 'sonic'),
(185, 'iron man'),
(186, 'iron man'),
(187, 'iron man');

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
(38, '730804145446', 30, 2, '2020-01-31', '40'),
(40, '050412129090', 12, 5, '2020-08-17', '100'),
(41, '030817120318', 12, 3, '2020-03-12', '60');

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
  MODIFY `idtayangan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
