-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 01:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midtermdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `make` varchar(48) DEFAULT NULL,
  `model` varchar(48) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `miles` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `userID` int(10) UNSIGNED DEFAULT NULL,
  `state` varchar(48) DEFAULT NULL,
  `car_image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `make`, `model`, `year`, `miles`, `price`, `userID`, `state`, `car_image`) VALUES
(14, 'Volkswagen', 'Passat', 2009, 19000, 12000, 11, 'Ohio', NULL),
(15, 'Honda', 'Prelude', 1984, 2000, 50000, 12, 'Kentucky', NULL),
(17, 'Ferrari', 'F1', 2020, 2000, 850000, 16, 'Florida', NULL),
(18, 'Honda', 'Civic', 2005, 1000, 12000, 17, 'Florida', NULL),
(19, 'Lexus', 'RX', 2006, 115000, 10000, 17, 'Kansas', NULL),
(22, 'Ford', 'F150', 2015, 20000, 15000, 22, 'Georgia', NULL),
(23, 'Mercedes-Benz', 'C-class', 1995, 12000, 500000, 18, 'Illinois', NULL),
(25, 'Ferrari', 'F1', 1995, 2000, 850000, 24, 'California', NULL),
(26, 'Chevy', 'Malibu', 2013, 60000, 10000, 4, 'Illinois', NULL),
(27, 'Lexus', 'RX', 2013, 115000, 200000, 4, 'Georgia', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
