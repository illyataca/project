-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 07:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodemcu_rc522_mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$JWeSmDTA1QRHQXtEahaTs.VgnQpsxJG4M1NSNS2wtnm2v6PCy/rFC');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idkehadiran` int(11) NOT NULL,
  `idpelajar` varchar(100) NOT NULL,
  `masa` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`idkehadiran`, `idpelajar`, `masa`) VALUES
(1, '3', '2020-09-23 04:36:13.529542'),
(2, '4', '2020-09-23 04:38:38.794876'),
(3, '3', '2020-09-23 04:41:26.558539'),
(4, '3', '2020-09-25 00:27:52.641752'),
(5, '3', '2020-09-25 02:14:02.481300');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `idpelajar` int(11) NOT NULL,
  `norfid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`idpelajar`, `norfid`, `name`, `gender`, `email`, `mobile`) VALUES
(3, '999F67B3', 'Mia Sara Nasuha', 'Female', 'sabri@gmail.com', '0129580072'),
(4, '39A5DB6E', 'Ariff Bin Yussoff', 'Female', 'Yussoff@gmail.com', '0192283744');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idpelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `idpelajar`) VALUES
(1, 'Mia', '$2y$10$/sZ.j2TlKSheyHZ8wkltBOZpui.Zilbr0d9ZLkyrLQFQczG6SG19S', 3),
(4, 'Ariff', '$2y$10$4s00ZKAq3Z.q9LULoitF8eT8oAEdHknyl0NVfIBIZZeDxD8GS685.', 4),
(5, 'azmiah', '$2y$10$TTm8dFZAvYbXi8j2jVi9y./Xx0ymffbTeUfBW9.lXOuxpSEDRAn2S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yuran`
--

CREATE TABLE `yuran` (
  `idyuran` int(11) NOT NULL,
  `idpelajar` varchar(100) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tarikh` date NOT NULL,
  `yuran` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yuran`
--

INSERT INTO `yuran` (`idyuran`, `idpelajar`, `bulan`, `tarikh`, `yuran`) VALUES
(12, '3', 9, '2020-09-01', 1),
(13, '4', 9, '2020-09-03', 1),
(14, '10', 10, '2020-10-21', 1),
(15, '4', 10, '2020-10-21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idkehadiran`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`idpelajar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yuran`
--
ALTER TABLE `yuran`
  ADD PRIMARY KEY (`idyuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `idkehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `idpelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yuran`
--
ALTER TABLE `yuran`
  MODIFY `idyuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
