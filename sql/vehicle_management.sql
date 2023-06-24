-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 02:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmasteradmin`
--

CREATE TABLE `tblmasteradmin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmasteradmin`
--

INSERT INTO `tblmasteradmin` (`adminId`, `name`, `username`, `password`, `addDate`) VALUES
(1, 'Admin', 'admin96', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-16 12:42:14'),
(2, 'Sumit Gharat', 'sumit19', 'e10adc3949ba59abbe56e057f20f883e', '2023-05-10 10:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblmastercustomer`
--

CREATE TABLE `tblmastercustomer` (
  `customerId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmastervehicle`
--

CREATE TABLE `tblmastervehicle` (
  `vehicleId` int(11) NOT NULL,
  `modalNo` varchar(100) NOT NULL,
  `chassisNo` varchar(100) NOT NULL,
  `variant` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `imagePath` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmastervehicle`
--

INSERT INTO `tblmastervehicle` (`vehicleId`, `modalNo`, `chassisNo`, `variant`, `color`, `imagePath`, `price`, `isDeleted`, `addDate`, `updateDate`) VALUES
(1, '121', '121', 'Honda Activa 6G', 'Brown', '', '2623', 0, '2023-03-20 11:03:42', '2023-03-20 11:03:42'),
(2, '121', '256', 'Honda Activa 6G', 'Brown', '', '89565', 0, '2023-03-20 11:13:53', '2023-03-20 11:13:53'),
(3, '12316', '1631', 'Honda Activa 6G', 'Brown', 'demo.jpg', '2356', 0, '2023-03-20 11:32:57', '2023-03-20 11:32:57'),
(4, '265', '265', 'Honda Activa 6G', 'Brown', 'demo.jpg', '123244', 0, '2023-03-20 11:33:34', '2023-03-20 11:33:34'),
(5, '2525', '2525', 'Honda Hornet', 'Brown', 'demo.jpg', '2356', 0, '2023-03-21 08:55:05', '2023-03-21 08:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmasteradmin`
--
ALTER TABLE `tblmasteradmin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tblmastercustomer`
--
ALTER TABLE `tblmastercustomer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tblmastervehicle`
--
ALTER TABLE `tblmastervehicle`
  ADD PRIMARY KEY (`vehicleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmasteradmin`
--
ALTER TABLE `tblmasteradmin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmastercustomer`
--
ALTER TABLE `tblmastercustomer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmastervehicle`
--
ALTER TABLE `tblmastervehicle`
  MODIFY `vehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
