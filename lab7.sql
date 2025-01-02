-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 04:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab7`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `component` varchar(255) DEFAULT NULL,
  `year_2010` double DEFAULT NULL,
  `year_2011` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `component`, `year_2010`, `year_2011`) VALUES
(1, 'Shopping', 8914, 13149),
(2, 'Transport', 8098, 10019),
(3, 'Food & beverages', 7975, 9691),
(4, 'Accommodation', 6130, 5028),
(5, 'Expenditure before the trip/packages/entrance fees/tickets', 894, 1097),
(6, 'Other activities', 2667, 3362);

-- --------------------------------------------------------

--
-- Table structure for table `travel_expenditure`
--

CREATE TABLE `travel_expenditure` (
  `id` int(11) NOT NULL,
  `component` varchar(255) DEFAULT NULL,
  `year_2010` double DEFAULT NULL,
  `year_2011` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_expenditure`
--

INSERT INTO `travel_expenditure` (`id`, `component`, `year_2010`, `year_2011`) VALUES
(1, 'Food & beverages', 6448, 7756),
(2, 'Transport', 6220, 7417),
(3, 'Accommodation', 6096, 4985),
(4, 'Shopping', 2603, 3801),
(5, 'Expenditure before the trip/packages/entrance fees/tickets', 595, 801),
(6, 'Other activities', 1722, 2249);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_expenditure`
--
ALTER TABLE `travel_expenditure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travel_expenditure`
--
ALTER TABLE `travel_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
