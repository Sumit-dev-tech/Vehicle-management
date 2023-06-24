-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 03:27 PM
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
  `profileimg` varchar(100) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmasteradmin`
--

INSERT INTO `tblmasteradmin` (`adminId`, `name`, `profileimg`, `username`, `password`, `addDate`) VALUES
(1, 'Admin', '', 'admin96', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-16 12:42:14'),
(2, 'Sumit', '', 'sumit20', 'e10adc3949ba59abbe56e057f20f883e', '2023-05-10 10:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblmastercustomer`
--

CREATE TABLE `tblmastercustomer` (
  `customerId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `countryCode` varchar(5) NOT NULL,
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
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmastercustomer`
--

INSERT INTO `tblmastercustomer` (`customerId`, `name`, `countryCode`, `mobile`, `email`, `gender`, `dob`, `address`, `city`, `state`, `country`, `pincode`, `addDate`, `updateDate`) VALUES
(1, 'Sumit', '', '8956892356', 'sumit@procohat.xyz', 'Male', '2023-04-05', 'plot no. 123, Bhkarwada', 'nagpur', 'Maharashtra', 'India', '412205', '2023-05-27 11:55:36', '2023-05-30 11:50:41'),
(4, 'Sham Verma ', '', '8856235923', 'sham@xyz.com', 'Other', '1960-10-26', 'house no. 1 , Shanakar Nagar', 'Nagpur', 'Maharashtra', 'India', '440010', '2023-05-29 12:56:35', '2023-05-29 13:14:24'),
(5, 'Sunil', '', '985685', 'dmnvms@gmail.com', 'Male', '2008-08-20', 'house no. 1 , Shanakar Nagar', 'Nagpur', 'Maharashtra', 'India', '440010', '2023-05-30 13:28:06', '2023-05-31 10:58:27'),
(6, 'sumit g', '', '8956258963', 'sumit@procohat.xyz', 'Male', '2023-05-17', 'plot no. 123, trimurti nagar', 'Nagpur', 'Maharashtra', 'India', '440010', '2023-05-31 10:56:37', '2023-06-21 13:24:43'),
(10, 'manav', '', '8956238956', 'manavi@gmail.com', 'Male', '2023-05-12', 'plot no. 123, trimurti nagar', 'Nagpur', 'Maharashtra', 'India', '440010', '2023-05-31 13:09:24', '2023-05-31 13:09:24');

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
  `isDeleted` int(1) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmastervehicle`
--

INSERT INTO `tblmastervehicle` (`vehicleId`, `modalNo`, `chassisNo`, `variant`, `color`, `imagePath`, `price`, `isDeleted`, `addDate`, `updateDate`) VALUES
(1, '12a125B', '125115', 'Honda Hornet', 'Brown', 'bajaj-pulsar-high-speed-two-wheeler-bike-with-powerful-engine-and-high-mileage-296.jpg', '120000', 0, '2023-05-27 07:48:30', '2023-06-24 11:41:33'),
(2, '5689ab789in', '888', 'Honda Activa 6G', 'Red', 'honda shine.jpg', '200000', 0, '2023-05-27 07:51:57', '2023-06-14 10:36:05'),
(3, '222', '222', 'Honda Shine', 'Red', '', '100000', 0, '2023-06-24 09:48:02', '2023-06-24 09:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchasedata`
--

CREATE TABLE `tblpurchasedata` (
  `purchaseId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `no_purchase` varchar(20) NOT NULL,
  `total_amount` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpurchasedata`
--

INSERT INTO `tblpurchasedata` (`purchaseId`, `customerId`, `vehicleId`, `no_purchase`, `total_amount`, `purchase_date`) VALUES
(1, 1, 2, '2', '400000', '2023-06-15'),
(2, 5, 1, '3', '360000', '2023-06-16'),
(3, 6, 1, '3', '360000', '2023-06-08'),
(4, 4, 1, '2', '240000', '2023-06-16'),
(5, 1, 1, '2', '240000', '2023-06-22');

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
-- Indexes for table `tblpurchasedata`
--
ALTER TABLE `tblpurchasedata`
  ADD PRIMARY KEY (`purchaseId`);

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
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblmastervehicle`
--
ALTER TABLE `tblmastervehicle`
  MODIFY `vehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpurchasedata`
--
ALTER TABLE `tblpurchasedata`
  MODIFY `purchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
