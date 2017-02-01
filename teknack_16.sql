-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 04:41 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teknack_16`
--

-- --------------------------------------------------------

--
-- Table structure for table `oth_16`
--

CREATE TABLE `oth_16` (
  `tek_emailid` varchar(60) NOT NULL,
  `tek_fname` varchar(60) NOT NULL,
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
-- Dumping data for table `oth_16`
--

INSERT INTO `oth_16` (`tek_emailid`, `tek_fname`, `startlevel`, `level`, `stime`, `ctime`, `dtimemin`, `quit`, `score`, `final`) VALUES
('teknack@xyz.com', 'teknack', 9, 8, '2016-02-09 14:59:31', '2016-02-09 14:55:52', 13, 1, 1000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oth_16`
--
ALTER TABLE `oth_16`
  ADD PRIMARY KEY (`tek_emailid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
