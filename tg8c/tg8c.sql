-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 07:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tg8c`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
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

CREATE TABLE IF NOT EXISTS `loginpelanggan` (
  `id` varchar(255) NOT NULL,
  `katalaluan` varchar(8) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginpelanggan`
--

INSERT INTO `loginpelanggan` (`id`, `katalaluan`, `kppelanggan`) VALUES
('5fikrah', '12345678', '031023141597'),
('amirul', '12345678', ''),
('amirul3', '12345678', '030320030493'),
('amirulasri', '12345678', '030320030490'),
('azhari', '12345678', '123456789098'),
('eddy', '12345678', '123456789102'),
('liza', '12345678', '730804145446'),
('Zulfaidhi', '12345678', '031023141597');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
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
('031023141597', 'Lelaki', 'Zulfaidhi ', 'Zulfaidhi@gmail.com', '0182804618'),
('123456789102', 'Lelaki', 'ez', 'ez@gmail.com', '0111253647');

-- --------------------------------------------------------

--
-- Table structure for table `tayangan`
--

CREATE TABLE IF NOT EXISTS `tayangan` (
`idtayangan` int(255) NOT NULL,
  `namatayangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tayangan`
--

INSERT INTO `tayangan` (`idtayangan`, `namatayangan`) VALUES
(12, 'JOKER'),
(34, 'PARASITE'),
(37, 'THE MEG'),
(38, 'STAR WARS : THE LAST JEDI'),
(39, 'AQUAMAN'),
(40, 'IRON MAN 3');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE IF NOT EXISTS `tempahan` (
`idtempahan` int(255) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idtayangan` int(255) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `tarikhtayangan` varchar(255) NOT NULL,
  `jumlahharga` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idtayangan`, `jumlahtiket`, `tarikhtayangan`, `jumlahharga`) VALUES
(1, '031023141597', 12, 1, '2003-10-23', '20');

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
 ADD PRIMARY KEY (`idtempahan`), ADD KEY `kppelanggan` (`kppelanggan`), ADD KEY `idtayangan` (`idtayangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tayangan`
--
ALTER TABLE `tayangan`
MODIFY `idtayangan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
MODIFY `idtempahan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
ADD CONSTRAINT `tempahan_ibfk_1` FOREIGN KEY (`kppelanggan`) REFERENCES `pelanggan` (`kppelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tempahan_ibfk_2` FOREIGN KEY (`idtayangan`) REFERENCES `tayangan` (`idtayangan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
