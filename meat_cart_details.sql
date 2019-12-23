-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 10:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_meat`
--

-- --------------------------------------------------------

--
-- Table structure for table `meat_cart_details`
--

CREATE TABLE `meat_cart_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(350) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(350) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(350) NOT NULL,
  `city` varchar(350) NOT NULL,
  `landmark` varchar(350) NOT NULL,
  `area` varchar(350) NOT NULL,
  `pincode` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `cart_items` longtext DEFAULT NULL,
  `special_request` text DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0 - pending payment, 1 - payment Done',
  `payment_details` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order_status` int(11) NOT NULL COMMENT '1-ordered,2-failed_user,3-order_ready,4-ordered',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meat_cart_details`
--
ALTER TABLE `meat_cart_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meat_cart_details`
--
ALTER TABLE `meat_cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
