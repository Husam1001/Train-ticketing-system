-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 10:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `Train_id` varchar(30) NOT NULL,
  `Route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(100) NOT NULL,
  `Customer_email` varchar(100) NOT NULL,
  `Customer_phone` varchar(20) NOT NULL,
  `cus_password` varchar(100) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_id` int(11) NOT NULL,
  `feedback` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `card_owner` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `re_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
------------------------------------------------------

--
-- Table structure for table `resarvation`
--

CREATE TABLE `resarvation` (
  `r_id` int(10) NOT NULL,
  `ticket_quantity` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_id` int(11) NOT NULL,
  `Depature` varchar(50) NOT NULL,
  `Arrival` varchar(50) NOT NULL,
  `Departure_time` time NOT NULL,
  `Arrival_time` time NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Available_seats` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_id`, `Depature`, `Arrival`, `Departure_time`, `Arrival_time`, `Price`, `Available_seats`, `Date`) VALUES
(121, 'PJ', 'KLCC', '03:17:00', '03:45:00', '23.80', 50, '2020-10-06'),
(321, 'KLCC', 'Ampang', '04:17:44', '04:33:44', '10.00', 75, '2020-10-07'),
(322, 'Ampang', 'KLIA', '20:38:13', '22:55:13', '12.50', 50, '2020-10-22'),
(323, 'KM7', 'JHK5', '26:23:22', '08:38:33', '5.70', 80, '2020-10-23'),
(324, 'Ampang', 'KLIA', '11:41:39', '12:19:39', '12.50', 40, '2020-10-15'),
(325, 'KLCC', 'PJ', '09:41:39', '10:09:39', '8.99', 45, '2020-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t-id` int(10) NOT NULL,
  `rout_id` int(10) NOT NULL,
  `reserve_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `Train_id` varchar(30) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD KEY `Train_id` (`Train_id`),
  ADD KEY `Route_id` (`Route_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`),
  ADD UNIQUE KEY `Customer_id` (`Customer_id`,`Customer_email`,`Customer_phone`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_id`),
  ADD KEY `Res_id` (`Res_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t-id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`Train_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `Route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `t-id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `Assigned_ibfk_1` FOREIGN KEY (`Train_id`) REFERENCES `train` (`Train_id`),
  ADD CONSTRAINT `Assigned_ibfk_2` FOREIGN KEY (`Route_id`) REFERENCES `route` (`Route_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
