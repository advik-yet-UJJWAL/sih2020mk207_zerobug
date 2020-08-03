-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 11:45 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `auser` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apass` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `auser`, `apass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreated` date NOT NULL,
  `status` int(11) NOT NULL,
  `categoryimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`, `datecreated`, `status`, `categoryimage`) VALUES
(1, 'Finance', '2019-09-20', 1, ''),
(2, 'Health', '2019-09-20', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `user` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_payments` int(11) NOT NULL,
  `payment_dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `schemeid` int(11) NOT NULL,
  `schemename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schemeurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schemedesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `isfeatured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`schemeid`, `schemename`, `schemeurl`, `schemedesc`, `stateid`, `categoryid`, `isfeatured`) VALUES
(4, 'Scheme 1', 'google.com', 'qwertyuioiytreqwrtdy', 1, 2, 1),
(5, 'Scheme 2', 'google.com', 'frgthyjtkfgffhkuhd', 1, 1, 1),
(6, 'Scheme 3 ', 'google.com', 'bchcbehcblwhlnwgxdgdygd', 1, 2, 1),
(7, 'Scheme 4', 'google.com', 'None', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schemeuser`
--

CREATE TABLE `schemeuser` (
  `id` int(10) NOT NULL,
  `user` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schemes` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schemeuser`
--

INSERT INTO `schemeuser` (`id`, `user`, `schemes`) VALUES
(12, '38', '[\"5\",\"4\"]'),
(14, '39', '[\"6\"]'),
(15, '40', '[\"5\",\"6\"]');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateid`, `statename`, `status`) VALUES
(1, 'Odisha', 1),
(2, 'West Bengal', 1),
(3, 'Karnataka', 1),
(4, 'Assam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(100) NOT NULL,
  `first_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `isUpdated` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhaar` bigint(12) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` int(8) DEFAULT NULL,
  `pan` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_acc_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rashan_card_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `isUpdated`, `father_name`, `dob`, `gender`, `aadhaar`, `address`, `district`, `state`, `pin`, `pan`, `bank_acc_no`, `rashan_card_no`) VALUES
(38, 'A', 'B', 'a@a', '$2y$10$IwENpi9ubHx7RwbiQOzh8uI0KwCn.dVh49cbeOxT3SJ17DO/z8VnK', 12345678, 'true', 'KK', '2020-08-04', 'Male', 123456789012, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'k', 'q', 'k@k', '$2y$10$iK3lA7ITdZZTHyd9cLE35O7Qv2lDFYmGZkW47TZQl8eRVhOWd0XBG', 2324567, 'true', 'JJ', '2020-02-22', 'Male', 666430376110, 'wqer', 'qwer', 'wqer', 201301, 'wqer', '12345', '2345'),
(40, 'Yadi', 'KK', 'yadi@y', '$2y$10$z9e66uCt787wyQ1JWC.sh.FQWiWiU5auXRE.BpzfdRhmLwzgYOmNS', 1111111, 'true', 'AA', '2020-08-04', 'Male', 424353612345, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `auser` (`auser`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`schemeid`),
  ADD KEY `stateid` (`stateid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `schemeuser`
--
ALTER TABLE `schemeuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `aadhaar` (`aadhaar`),
  ADD UNIQUE KEY `bank_acc_no` (`bank_acc_no`),
  ADD UNIQUE KEY `rashan_card_no` (`rashan_card_no`),
  ADD UNIQUE KEY `pan` (`pan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `schemeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schemeuser`
--
ALTER TABLE `schemeuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
