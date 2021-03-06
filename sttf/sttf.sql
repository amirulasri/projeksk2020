-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 02:57 AM
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
-- Database: `sttf`
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
('adriana123', '12345678', ''),
('aiesha', '12345678', '001222879768'),
('eric1234', '23456781', ''),
('fatin1234', '12345678', '030609100987'),
('najah1234', '12345678', ''),
('nurin', '12345678', '020304110987'),
('sabrina1234', '12345678', '000412100938'),
('sofea1234', '12345678', '030609100938');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kppelanggan` varchar(150) NOT NULL,
  `jantina` varchar(100) NOT NULL,
  `namapelanggan` text NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `jantina`, `namapelanggan`, `notelpelanggan`) VALUES
('000412100938', 'jantina', 'sabrina', '0172926775'),
('001222879768', 'jantina', 'aiesha', '0172926775'),
('020304110987', 'jantina', 'nurin', '0172926775'),
('030609100938', 'jantina', 'sofea', '0172926775'),
('030609100987', 'jantina', 'fatin', '0172926775');

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
(1, 'sangkar', '10'),
(2, 'the nun', '12'),
(3, 'annabelle comes home', '11'),
(4, 'wreck it ralph', '9'),
(5, 'annabelle comes home', '11');

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
(1, '030609100938', 1, 3, '2020-09-01', '30'),
(2, '030609100938', 2, 2, '2020-09-09', '24'),
(3, '030609100938', 4, 3, '2020-10-25', '27'),
(5, '030609100938', 2, 2, '2020-11-02', '24'),
(6, '020304110987', 2, 3, '2020-10-25', '36'),
(7, '001222879768', 1, 4, '2020-10-08', '40'),
(8, '001222879768', 3, 4, '2020-10-26', '44');

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
  MODIFY `idtayangan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
