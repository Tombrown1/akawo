-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 02:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akawo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_pass` varchar(41) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_pass`) VALUES
(1, 'Tombrown', 'godwintombrown@gmail.com', '08069071539', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Emmanuel', 'emmanuel@gmail.com', '08109221432', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float(10,0) NOT NULL,
  `transaction_type` int(50) NOT NULL,
  `transaction_no` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` char(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`transaction_id`, `user_id`, `amount`, `transaction_type`, `transaction_no`, `description`, `date`, `status`) VALUES
(1, 1, 200000, 1, 'TN605a4fc5e134c', 'Salary', '2021-03-01', '1'),
(2, 2, 150000, 1, 'TN605a501590583', 'Monthly Allowance', '2021-03-07', '1'),
(3, 2, 150000, 1, 'TN605a4fbdce3bc', 'Profit Made from Laptop Sales', '2021-03-13', '1'),
(4, 2, -100000, 2, 'TN605a506116604', 'Rent Payment', '2021-03-06', '1'),
(5, 1, -100000, 2, 'TN605a4fe1d56e1', 'Payment for Flight ticket', '2021-03-08', '1'),
(6, 1, 300000, 1, 'TN605a4fe94ef2a', 'February Salary', '2021-03-02', '1'),
(7, 3, 150000, 1, 'TN605a4fa56f88b', 'Monthly Salary', '2021-03-10', '1'),
(8, 1, -50000, 2, 'TN605a4fef2a767', 'Payment made for laptop charger', '2021-03-12', '1'),
(9, 5, 2000, 1, 'TN605a4f6796142', 'Installation of OS ', '2021-03-10', '1'),
(10, 5, 12000, 1, 'TN605a4f71151d4', 'Payment made for servicing of three computer', '2021-03-13', '1'),
(11, 5, -2000, 2, 'TN605a4f76aa780', 'Purchase of DDR 2GB Ram ', '2021-03-13', '1'),
(12, 5, -3000, 2, 'TN605a4f9517d84', 'Purchase of a fairly used original power pack for a mini laptop', '2021-03-13', '1'),
(13, 5, -3000, 2, 'TN605a5071ed467', 'Purchase of HP 250 cooling fan ', '2021-03-13', '1'),
(14, 3, 40000, 1, 'TN605a4facf0282', 'Weekly Allowance', '2021-03-22', '1'),
(15, 4, 100000, 1, 'TN6059ff4981d8f', 'Traveling Allowance', '2021-03-23', '1'),
(16, 5, -2000, 0, 'TN605a4f6796142', 'Installation of OS ', '2021-03-26', '1'),
(17, 1, 50000, 0, 'TN605a4fef2a767', 'Payment made for laptop charger', '2021-03-26', '1'),
(18, 5, 2000, 0, 'TN605a4f6796142', 'Installation of OS ', '2021-03-27', '1'),
(19, 6, 200000, 1, 'TN605ee19030dc6', 'Quarter business profit shares', '2021-03-27', '1'),
(20, 5, -2000, 0, 'TN605a4f6796142', 'Installation of OS ', '2021-04-07', '1'),
(21, 5, 50000, 1, 'TN607d971b50860', 'Monthly Transport and Feeding Allowance ', '2021-04-11', '1'),
(22, 3, -5000, 2, 'TN607dc0f07475d', 'Jamb Lesson Fee', '2021-04-12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `tran_type_id` int(11) NOT NULL,
  `transaction_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`tran_type_id`, `transaction_type`) VALUES
(1, 'Credit'),
(2, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_pass` varchar(41) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_pass`) VALUES
(1, 'Tombrown Godwin', 'godwintombrown@gmail.com', '08069071539', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Anthony', 'anthony@yahoo.com', '08132903243', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Joy Tombrown', 'joyce@yahoo.com', '09032129032', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Ebuka', 'Ebuka@gmail.com', '09032120921', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'Daniel Okere', 'okeredaniel@gmail.com', '08132390832', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 'Matthew Chile', 'matthewchile@yahoo.com', '070232098133', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`tran_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `tran_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
