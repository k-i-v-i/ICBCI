-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 01:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icbci`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE `accidents` (
  `accident_id` int(11) NOT NULL,
  `opponent_licensepl` varchar(9) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`accident_id`, `opponent_licensepl`, `location`) VALUES
(13, '34AA3333', 'Tuzla'),
(14, '34ALI569', 'Pendik'),
(17, '34ALI569', 'Pendik'),
(18, '41ALI569', 'Tuzla'),
(19, '30ABO3030', 'Kocaeli');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `aname` varchar(100) NOT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`aname`, `phone`) VALUES
('Aksa', '033322244'),
('Anadolu ', '0850 724 0 ');

-- --------------------------------------------------------

--
-- Table structure for table `agencybranches`
--

CREATE TABLE `agencybranches` (
  `bcode` int(11) NOT NULL,
  `bname` varchar(50) DEFAULT NULL,
  `aname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencybranches`
--

INSERT INTO `agencybranches` (`bcode`, `bname`, `aname`, `address`) VALUES
(11, NULL, 'Anadolu ', 'sagdshzbjda'),
(12, NULL, 'Anadolu ', 'sagdshzbjda'),
(13, 'Kurtukoy', 'Aksa', 'Dedepa?a bulvar?'),
(111, NULL, 'Anadolu ', 'sagdshzbjda');

-- --------------------------------------------------------

--
-- Table structure for table `branchcustomers`
--

CREATE TABLE `branchcustomers` (
  `bcode` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchcustomers`
--

INSERT INTO `branchcustomers` (`bcode`, `cid`) VALUES
(13, 13),
(13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `caraccidents`
--

CREATE TABLE `caraccidents` (
  `license_plate` varchar(9) NOT NULL,
  `accident_id` int(11) NOT NULL,
  `accident_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caraccidents`
--

INSERT INTO `caraccidents` (`license_plate`, `accident_id`, `accident_date`) VALUES
('26ABY159', 17, '2021-12-08'),
('26ABY159', 18, '2021-12-16'),
('26ABY159', 19, '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `carpolicies`
--

CREATE TABLE `carpolicies` (
  `license_plate` varchar(9) NOT NULL,
  `pid` int(11) NOT NULL,
  `begin_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpolicies`
--

INSERT INTO `carpolicies` (`license_plate`, `pid`, `begin_date`) VALUES
('26ABY159', 14, '2021-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `surname`) VALUES
(1, 'Deniz', 'Incereis'),
(2, 'Deniz', 'Incereis'),
(3, 'Deniz', 'Incereis'),
(4, 'Deniz', 'Incereis'),
(7, 'Deniz', 'Incereis'),
(8, 'Elif', 'Incereis'),
(9, 'Ala', 'Incereis'),
(10, 'Ala', 'Incereis'),
(11, 'Mete', 'Incereis'),
(12, 'Mete', 'Incereis'),
(13, 'Ata', 'Incereis'),
(14, 'AyÃ§a', 'Incereis'),
(15, 'Belma', 'Incereis'),
(16, 'Yigit', 'Kilicaslan');

-- --------------------------------------------------------

--
-- Table structure for table `customercars`
--

CREATE TABLE `customercars` (
  `license_plate` varchar(9) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `model` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customercars`
--

INSERT INTO `customercars` (`license_plate`, `type`, `brand`, `model`, `cid`) VALUES
('26ABY159', 'Motorcyle', 'Falcon', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `pid` int(11) NOT NULL,
  `policy_type` varchar(30) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`pid`, `policy_type`, `cost`) VALUES
(1, 'Traffic', 1000),
(2, 'Traffic', 1000),
(3, 'Traffic', 1000),
(4, 'Traffic', 1000),
(5, 'Traffic', 123),
(6, 'Traffic', 1111),
(7, 'Traffic', 11111),
(8, 'Traffic', 11111),
(9, 'Traffic', 11111),
(10, 'Traffic', 11111),
(11, 'Traffic', 1233),
(12, 'Traffic', 1233),
(14, 'Traffic', 500);

-- --------------------------------------------------------

--
-- Table structure for table `policyaccidents`
--

CREATE TABLE `policyaccidents` (
  `pid` int(11) DEFAULT NULL,
  `accident_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policyaccidents`
--

INSERT INTO `policyaccidents` (`pid`, `accident_id`) VALUES
(10, 13),
(9, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidents`
--
ALTER TABLE `accidents`
  ADD PRIMARY KEY (`accident_id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`aname`);

--
-- Indexes for table `agencybranches`
--
ALTER TABLE `agencybranches`
  ADD PRIMARY KEY (`bcode`),
  ADD KEY `aname` (`aname`);

--
-- Indexes for table `branchcustomers`
--
ALTER TABLE `branchcustomers`
  ADD PRIMARY KEY (`bcode`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `caraccidents`
--
ALTER TABLE `caraccidents`
  ADD PRIMARY KEY (`license_plate`,`accident_id`),
  ADD KEY `accident_id` (`accident_id`);

--
-- Indexes for table `carpolicies`
--
ALTER TABLE `carpolicies`
  ADD PRIMARY KEY (`license_plate`,`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customercars`
--
ALTER TABLE `customercars`
  ADD PRIMARY KEY (`license_plate`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `policyaccidents`
--
ALTER TABLE `policyaccidents`
  ADD KEY `pid` (`pid`),
  ADD KEY `accident_id` (`accident_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidents`
--
ALTER TABLE `accidents`
  MODIFY `accident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencybranches`
--
ALTER TABLE `agencybranches`
  ADD CONSTRAINT `agencybranches_ibfk_1` FOREIGN KEY (`aname`) REFERENCES `agency` (`aname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branchcustomers`
--
ALTER TABLE `branchcustomers`
  ADD CONSTRAINT `branchcustomers_ibfk_1` FOREIGN KEY (`bcode`) REFERENCES `agencybranches` (`bcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branchcustomers_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caraccidents`
--
ALTER TABLE `caraccidents`
  ADD CONSTRAINT `caraccidents_ibfk_1` FOREIGN KEY (`license_plate`) REFERENCES `customercars` (`license_plate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `caraccidents_ibfk_2` FOREIGN KEY (`accident_id`) REFERENCES `accidents` (`accident_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carpolicies`
--
ALTER TABLE `carpolicies`
  ADD CONSTRAINT `carpolicies_ibfk_1` FOREIGN KEY (`license_plate`) REFERENCES `customercars` (`license_plate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carpolicies_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `policy` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customercars`
--
ALTER TABLE `customercars`
  ADD CONSTRAINT `customercars_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policyaccidents`
--
ALTER TABLE `policyaccidents`
  ADD CONSTRAINT `policyaccidents_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `policy` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `policyaccidents_ibfk_2` FOREIGN KEY (`accident_id`) REFERENCES `accidents` (`accident_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
