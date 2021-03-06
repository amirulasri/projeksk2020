-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 09:06 AM
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
-- Database: `stgc`
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
('afiq', '12345678', '010101010101'),
('AFIQHAKIM', '12345678', '010630140154'),
('amir', 'amir1234', '01345678'),
('asri', 'asri1234', '112233445566'),
('berdosa', 'sonic123', ''),
('hakim', 'hakim124', '0123445671'),
('LEMAN', 'leman123', ''),
('LOGES', 'sonic123', '044556677889'),
('naqid', 'sonic123', ''),
('nurra', 'sonic123', ''),
('pahala', 'pahala12', '030630140153'),
('salman', 'salman13', '01122334455'),
('stgc', 'stgc1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kppelanggan` varchar(12) NOT NULL,
  `umur` varchar(150) NOT NULL,
  `namapelanggan` varchar(150) NOT NULL,
  `emailpelanggan` varchar(150) NOT NULL,
  `notelpelanggan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kppelanggan`, `umur`, `namapelanggan`, `emailpelanggan`, `notelpelanggan`) VALUES
('010101010101', '20', 'Afiq', 'afiq@gmail.com', '0998765432'),
('010630140154', '20', 'AFIQHAKIM', 'M.AFIQ@gmail.com', '0192345771'),
('01122334455', '23', 'salman', 'salman12@gmail.com', '012345689'),
('0123445671', '20', 'hakim', 'hakim02@gmail.com', '0164578890'),
('01345678', '21', 'amir', 'amir12@gmail.com', '011223344'),
('030630140153', '20', 'M.AFIQ HAKIM', 'M.AFIQ11@gmail.com', '0123456781'),
('044556677889', '12', 'loges', 'loges12@gmail.com', '0144556677'),
('112233445566', '21', 'asri', 'asri17@gmail.com', '123567890');

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
(1, 'sonic'),
(2, 'hantu bonceng'),
(3, 'avengers'),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ' initial-scale=1.0\">'),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, ''),
(32, ''),
(33, ''),
(34, ''),
(35, ''),
(36, ''),
(37, ''),
(38, ''),
(39, ''),
(40, ''),
(41, ''),
(42, ''),
(43, ''),
(44, ''),
(45, ''),
(46, ''),
(47, ''),
(48, ''),
(49, ''),
(50, ''),
(51, ''),
(52, ''),
(53, ''),
(54, ''),
(55, ''),
(56, ''),
(57, ''),
(58, ''),
(59, ''),
(60, ''),
(61, ''),
(62, ''),
(63, ''),
(64, ''),
(65, ''),
(66, ''),
(67, ''),
(68, ''),
(69, ''),
(70, ''),
(71, ''),
(72, ''),
(73, ''),
(74, ''),
(75, ''),
(76, ''),
(77, ''),
(78, ''),
(79, ''),
(80, ''),
(81, ''),
(82, ''),
(83, ''),
(84, ''),
(85, ''),
(86, ''),
(87, ''),
(88, ''),
(89, ''),
(90, ''),
(91, ''),
(92, ''),
(93, ''),
(94, ''),
(95, ''),
(96, ''),
(97, ''),
(98, ''),
(99, ''),
(100, ''),
(101, ''),
(102, ''),
(103, ''),
(104, ''),
(105, ''),
(106, ''),
(107, ''),
(108, ''),
(109, ''),
(110, ''),
(111, ''),
(112, ''),
(113, ''),
(114, ''),
(115, ''),
(116, ''),
(117, ''),
(118, ''),
(119, ''),
(120, ''),
(121, ''),
(122, ''),
(123, ''),
(124, ''),
(125, ''),
(126, ' initial-scale=1.0\">'),
(127, ''),
(128, ''),
(129, ''),
(130, ''),
(131, ''),
(132, ''),
(133, ''),
(134, ''),
(135, ''),
(136, ''),
(137, ''),
(138, ''),
(139, ''),
(140, ''),
(141, ''),
(142, ''),
(143, ''),
(144, ''),
(145, ''),
(146, ''),
(147, ''),
(148, ''),
(149, ''),
(150, ''),
(151, ''),
(152, ''),
(153, ''),
(154, ''),
(155, ''),
(156, ''),
(157, ''),
(158, ''),
(159, ''),
(160, 'SELECT * FROM pelanggan INNER JOIN tempahan ON pelanggan.kppelanggan = tempahan.kppelanggan);'),
(161, ''),
(162, ''),
(163, ''),
(164, ''),
(165, ''),
(166, ''),
(167, ''),
(168, ''),
(169, ''),
(170, ''),
(171, ''),
(172, ''),
(173, ''),
(174, ''),
(175, ''),
(176, ''),
(177, ''),
(178, ''),
(179, ''),
(180, ''),
(181, ''),
(182, ''),
(183, ''),
(184, ''),
(185, ''),
(186, ''),
(187, ''),
(188, ''),
(189, ''),
(190, ''),
(191, 'sonic'),
(192, 'Ejen Ali'),
(193, 'Ejen Ali'),
(194, 'iron man'),
(195, 'shazam');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idtempahan` int(150) NOT NULL,
  `kppelanggan` varchar(12) NOT NULL,
  `idtayangan` int(150) NOT NULL,
  `jumlahtiket` int(11) NOT NULL,
  `tarikhtayangan` varchar(20) NOT NULL,
  `jumlahharga` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idtayangan`, `jumlahtiket`, `tarikhtayangan`, `jumlahharga`) VALUES
(1, '030630140153', 1, 5, '2020-05-05', '100'),
(2, '010630140154', 1, 5, '2020-05-05', '100'),
(3, '0123445671', 1, 5, '2020-05-05', '100'),
(4, '01345678', 2, 5, '2020-05-05', '100'),
(6, '01122334455', 1, 5, '2020-07-30', '100'),
(7, '112233445566', 3, 2, '2020-07-16', '40'),
(8, '044556677889', 3, 1, '2020-07-16', '20');

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
  MODIFY `idtayangan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `tempahan`
--
ALTER TABLE `tempahan`
  MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
