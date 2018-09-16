-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2018 at 05:14 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atmascribe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$5PwjTWYfqilV3kwfcohwb.2.jcowgQeWCAe9wsksL1XJ/tGgXHSpW');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int(20) NOT NULL,
  `catatan` varchar(70) NOT NULL,
  `prioritas` int(2) NOT NULL DEFAULT '0',
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `catatan`, `prioritas`, `user_id`) VALUES
(3, 'makan cowek', 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(20) NOT NULL,
  `jadwal` varchar(60) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(60) NOT NULL,
  `prioritas` int(2) NOT NULL DEFAULT '0',
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `kutipan` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `dibuat_pada` datetime DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `foto`, `ttl`, `kutipan`, `status`, `dibuat_pada`, `token`) VALUES
(39, 'rio09tkj@gmail.com', '$2y$10$TgOFg/JkcW7WR7pwEgXTbeaWaT.Pf8NbVCFrXzx6c6Db3JNvgXoUu', 'Rio Gunawan', '', '0000-00-00', '', 1, '2018-09-11 15:08:08', '1af264fc5a'),
(41, 'rio@rio.com', '$2y$10$PfnaC.7ceF5e5PwcGf0ZbemP1Jk0rO11ZMn5UnD.bhSBLb6r2KBlS', 'rio', '', '0000-00-00', '', 1, '2018-09-11 15:37:46', '1457f63c57'),
(42, 'riogunawan8967uajy@gmail.com', '$2y$10$5PwjTWYfqilV3kwfcohwb.2.jcowgQeWCAe9wsksL1XJ/tGgXHSpW', 'Rio Gunawan', '', '2018-09-27', 'tes', 1, '2018-09-12 04:24:00', 'c26cdfb0e5'),
(43, 'lolyeliatamba@gmail.com', '$2y$10$zxDncdF4L4x0qfOR9SOi/OsHnxutGsm/gJU1fNcaZoDu6EEIH9Ge.', 'Loly', '', '1999-06-01', 'the red', 1, '2018-09-12 11:29:22', '6601240023'),
(47, 'll@lll.com', '$2y$10$UGCIbJiOGv9tqxu1lWKE.e0uftTe.pAi8i3xF55pNQNc1RovHYViS', 'll', '', '0000-00-00', '', 0, '2018-09-12 11:39:50', 'aaf1721690'),
(48, 'tes@tes.com', '$2y$10$msKRXC9Pw1oHq2T3tj3.qOrUPZxWLxWz36mHvKgiIukTq8gBTMn4e', 'tes', '', '0000-00-00', '', 0, '2018-09-13 19:03:43', 'ca60534ec3'),
(49, '', '$2y$10$Z5xuwgxjPBalG90s7SKHeepAzabg0rmsgonNhyjYeVTHi2yOXPuuK', '', '', '0000-00-00', '', 0, '0000-00-00 00:00:00', ''),
(50, 'rigunwasdf@gmail.com', '$2y$10$aPMEiwh1aDQV87gRliDj3Oj9o0E5n9.Le2lu9NGt/rAtmKedEk2OO', 'Nama Panjang', '', '0000-00-00', '', 0, '0000-00-00 00:00:00', ''),
(51, 'sfasv@gmail.com', '$2y$10$T1pDiZYmssPs2633O473c.p8REh1UoGVFIQy9E5NmUgsRbe1l1WCe', 'Nama Panjang', '', '0000-00-00', '', 0, '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dimiliki` (`user_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dipunyai` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `dimiliki` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `dipunyai` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
