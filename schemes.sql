-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 01:31 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zerobug`
--

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `schemeid` int(11) NOT NULL,
  `schemename` varchar(255) NOT NULL,
  `schemeurl` varchar(255) NOT NULL,
  `schemedesc` varchar(255) NOT NULL,
  `stateid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isfeatured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`schemeid`, `schemename`, `schemeurl`, `schemedesc`, `stateid`, `categoryid`, `isfeatured`) VALUES
(4, 'Scheme 1', 'google.com', 'qwertyuioiytreqwrtdy', 1, 2, 1),
(5, 'Scheme 2', 'google.com', 'frgthyjtkfgffhkuhd', 1, 1, 1),
(6, 'Scheme 3 ', 'google.com', 'bchcbehcblwhlnwgxdgdygd', 1, 2, 1),
(7, 'Scheme 4', 'google.com', 'None', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`schemeid`),
  ADD KEY `stateid` (`stateid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `schemeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schemes`
--
ALTER TABLE `schemes`
  ADD CONSTRAINT `schemes_ibfk_1` FOREIGN KEY (`stateid`) REFERENCES `states` (`stateid`),
  ADD CONSTRAINT `schemes_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
