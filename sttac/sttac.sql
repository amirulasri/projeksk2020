-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 06:52 AM
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
-- Database: `sttac`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
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
  `id` varchar(255) NOT NULL,
  `katalaluan` varchar(8) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginpelanggan`
--

INSERT INTO `loginpelanggan` (`id`, `katalaluan`, `kppelanggan`) VALUES
('5fikrah', '12345678', '031103160077'),
('admin', '12345678', ''),
('aiman', 'aiman678', ''),
('akram', '12345678', ''),
('amirul', '12345678', ''),
('amirul3', '12345678', '030320030493'),
('amirulasri', '12345678', '030320030490'),
('azhari', '12345678', '123456789098'),
('dina', '12345678', '012345678955'),
('hassnol', '12345678', ''),
('itshadzwan', '12345678', '031103160055'),
('johan', '12345678', '031103160088'),
('kamarul', '12345678', ''),
('liza', '12345678', '730804145446'),
('mira', '12345678', '031103160011'),
('syahmi', '12345678', '031103160099'),
('tan', '12345678', '030419141177'),
('Zizan ', '12345678', '');

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
('012345678955', 'Perempuan', 'dina', 'dina@gmail.com', '0126453768'),
('030320030490', 'Lelaki', 'Amirul Asri', 'a@a.a', '01135020493'),
('030320030491', 'Lelaki', 'Amirul Asri', 'kk@kk.k', '01102020202'),
('030320030492', 'Perempuan', 'Haliza Abdul Khalil', 'haliza@gmail.com', '01123456789'),
('030320030493', 'Lelaki', 'Amirul Asri Bin Azmi', 'amirulasrix@gmail.com', '01135020493'),
('030419141177', 'Lelaki', 'tan', 'tan@gmail.com', '0129818810'),
('031103160011', 'Perempuan', 'mira', 'mira@gmail.com', '01111515501'),
('031103160055', 'Lelaki', 'Syahmi', 'syahmih@gmail.com', '01111515501'),
('031103160077', 'Lelaki', 'HADZWAN SYAHMI', 'hadzwanh@gmail.com', '01132747055'),
('031103160088', 'Lelaki', 'johan', 'johan@gmail.com', '0125649379'),
('031103160099', 'Lelaki', 'syahmi', 'syahmihs@gmail.com', '01111515501'),
('123456789098', 'Lelaki', 'AZHARI ZAINAL', 'jjj@gmail.com', '01135020493'),
('730804145446', 'Perempuan', 'liza', 'cyberone2010@gmail.com', '0196544072'),
('asas', 'Lelaki', 'sasa', 'skasklaj@kljkls.d', '12121312');

-- --------------------------------------------------------

--
-- Table structure for table `tayangan`
--

CREATE TABLE `tayangan` (
  `idtayangan` int(150) NOT NULL,
  `namatayangan` text NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tayangan`
--

INSERT INTO `tayangan` (`idtayangan`, `namatayangan`, `harga`) VALUES
(1, 'hantu kak limah', '10'),
(2, 'Iron Man', '10'),
(3, 'Itaewon Class', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idtempahan` int(255) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idtayangan` int(255) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `tarikhtayangan` varchar(255) NOT NULL,
  `jumlahharga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idtayangan`, `jumlahtiket`, `tarikhtayangan`, `jumlahharga`) VALUES
(1, '030419141177', 1, 2, '2020-09-30', '20'),
(2, '030419141177', 1, 2, '2020-10-30', '20'),
(3, '030419141177', 1, 2, '2020-11-05', '20'),
(4, '030419141177', 2, 2, '2020-11-05', '20'),
(5, '030419141177', 1, 2, '2020-11-05', '20'),
(6, '031103160011', 2, 5, '2020-11-07', '50');

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
  MODIFY `idtayangan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
