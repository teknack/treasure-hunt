-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 04:36 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teknack_15`
--

-- --------------------------------------------------------

--
-- Table structure for table `oth_15`
--

CREATE TABLE `oth_15` (
  `tek_name` varchar(11) NOT NULL,
  `startlevel` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '-1',
  `stime` timestamp NULL DEFAULT NULL,
  `ctime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dtimemin` int(10) NOT NULL,
  `quit` int(4) NOT NULL,
  `score` int(10) NOT NULL,
  `final` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oth_15`
--

INSERT INTO `oth_15` (`tek_name`, `startlevel`, `level`, `stime`, `ctime`, `dtimemin`, `quit`, `score`, `final`) VALUES
('teknack', 11, 10, '2016-02-04 07:43:42', '2016-02-04 07:43:42', 12720, 0, 525, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oth_15`
--
ALTER TABLE `oth_15`
  ADD PRIMARY KEY (`tek_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
