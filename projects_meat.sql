-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 07:19 AM
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
-- Table structure for table `meat_banners`
--

CREATE TABLE `meat_banners` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `information` text DEFAULT NULL,
  `links` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_banners`
--

INSERT INTO `meat_banners` (`id`, `image`, `information`, `links`, `status`, `created`, `updated`) VALUES
(1, 'uploads/banners/f51e77c0ae864f901f1bd047dcfa76df.jpg', 'Sample Banner 1', '', 1, '2019-11-21 23:24:53', '2019-11-22 05:54:53'),
(2, 'uploads/banners/f95a46d7a2da47184c46a67dd8b0137d.jpg', 'Sample Banner 2', '', 1, '2019-11-21 23:25:14', '2019-11-22 05:55:14'),
(3, 'uploads/banners/bab395befe6b225ded7c4786bbaae950.jpg', 'Sample Banner 3', '', 1, '2019-11-21 23:25:40', '2019-11-22 05:55:40');

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
-- Dumping data for table `meat_cart_details`
--

INSERT INTO `meat_cart_details` (`id`, `order_id`, `user_id`, `name`, `mobile`, `email`, `city`, `landmark`, `area`, `pincode`, `address`, `cart_items`, `special_request`, `amount`, `payment_status`, `payment_details`, `status`, `order_status`, `created`, `updated`) VALUES
(1, '1575209927D32ID1', 1, 'Hara', 8521478885, 'vardhan7794@gmail.com', 'dksjhf', 'ksdf', 'fsfhkjsdf', 588858, 'jdakj', 'a:2:{i:0;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"5\";s:10:\"unit_price\";s:3:\"450\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:450;}i:1;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}}', 'Leg piece', '1300', 0, NULL, 1, 2, '2019-12-01 08:48:47', '2019-12-12 06:02:31'),
(2, '1575210067D24ID1', 1, 'Harsha vardhan', 7846545445, 'ahsvd@hsg.com', 'djkj', 'kdsk', 'kjdnkj', 522415, 'sdkfns', 'a:2:{i:0;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"5\";s:10:\"unit_price\";s:3:\"450\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:450;}i:1;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}}', '', '1300', 0, NULL, 1, 1, '2019-12-01 08:51:07', '2019-12-12 06:02:18'),
(3, '1575257341D63ID1', 1, 'Ravi', 7458313545, 'vardhan@live.com', 'dljgdfl', 'sdfjdlk', 'djlkdjfl', 584658, 'nkjsd', 'a:1:{i:0;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"5\";s:10:\"unit_price\";s:3:\"450\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:450;}}', '', '450', 0, NULL, 1, 3, '2019-12-01 21:59:01', '2019-12-12 06:12:22'),
(4, '1575257736D41ID1', 1, 'gopi nath', 7845454546, 'hdhd@bha.com', 'sdjkdlj', 'dfksdjfk', 'dkjkd', 548585, 'skfskd', 'a:1:{i:0;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}}', '', '875', 0, NULL, 1, 2, '2019-12-01 22:05:36', '2019-12-12 06:02:14'),
(5, '1575450059ID1D17', 1, 'Harsha', 9876543210, 'vardhan7794@gmail.com', 'Gurazala', 'high school', 'cggb bank', 522415, 'jm.puram', 'a:2:{i:0;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}i:1;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:2:\"15\";s:10:\"unit_price\";s:3:\"900\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:900;}}', '2 leg peaces', '1775', 0, NULL, 1, 3, '2019-12-04 09:00:59', '2019-12-12 06:18:10'),
(6, '1575465398ID1D56', 1, 'Ravi', 8456468784, 'sjj@gf.com', 'dgdghkj', 'dfkgkd', 'dfgkk', 454585, 'sdnfkjdshkj', 'a:2:{i:0;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:2:\"15\";s:10:\"unit_price\";s:3:\"900\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:900;}i:1;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}}', 'AH', '1775', 0, NULL, 1, 1, '2019-12-04 13:16:38', '2019-12-12 06:02:09'),
(7, '1575606990ID1D40', 1, 'sslkj', 784548548, 'bavsh@gs.com', 'skfjk', 'kjsdfks', 'fdksjk', 152568, 'skjdf', 'a:2:{i:0;a:9:{s:12:\"product_name\";s:13:\"Black Pomfret\";s:10:\"product_id\";s:1:\"3\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"7\";s:10:\"unit_price\";s:3:\"850\";s:5:\"image\";s:53:\"uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg\";s:8:\"category\";s:4:\"Fish\";s:12:\"sub_category\";s:0:\"\";s:5:\"price\";d:850;}i:1;a:9:{s:12:\"product_name\";s:16:\"Chicken Skinless\";s:10:\"product_id\";s:1:\"2\";s:7:\"quntity\";d:1;s:7:\"unit_id\";s:1:\"6\";s:10:\"unit_price\";s:3:\"658\";s:5:\"image\";s:53:\"uploads/products/0efd1f664ba426992668244e07b3aa71.jpg\";s:8:\"category\";s:7:\"Chicken\";s:12:\"sub_category\";s:7:\"BROILER\";s:5:\"price\";d:658;}}', 'Ha', '1533', 0, NULL, 1, 1, '2019-12-06 04:36:30', '2019-12-12 06:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `meat_categories`
--

CREATE TABLE `meat_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(350) NOT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_categories`
--

INSERT INTO `meat_categories` (`id`, `category_name`, `image`, `status`, `created`, `updated`) VALUES
(1, 'Chicken', 'uploads/Categories/175a3aaf41806faeeeebe9b14786a84a.png', 1, '2019-11-21 23:54:39', '2019-11-22 06:24:39'),
(2, 'Fish', 'uploads/Categories/323bf7a725bab3859a0423f55d53d0ad.png', 1, '2019-11-21 23:54:54', '2019-11-22 06:24:54'),
(3, 'Mutton', 'uploads/Categories/e384127bdc34298c32643bd0d5f0155f.png', 1, '2019-11-21 23:55:10', '2019-11-22 06:25:10'),
(4, 'Prawns', 'uploads/Categories/e264fc1aa0611c7d8868bc13dd351134.png', 1, '2019-11-21 23:55:27', '2019-11-22 06:25:27'),
(5, 'Eggs', 'uploads/Categories/7b6037ab57b9e3e23afcb05ea4ecfa51.png', 1, '2019-11-21 23:55:40', '2019-11-22 06:25:40'),
(6, 'More', 'uploads/Categories/fb6089461624ac8bd0d4ca5977848ecd.png', 1, '2019-11-21 23:55:54', '2019-11-22 06:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `meat_delivery_address`
--

CREATE TABLE `meat_delivery_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(350) DEFAULT NULL,
  `state` varchar(350) NOT NULL,
  `pincode` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meat_newsletters`
--

CREATE TABLE `meat_newsletters` (
  `id` int(11) NOT NULL,
  `email_id` varchar(350) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `publish` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meat_online_users`
--

CREATE TABLE `meat_online_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(350) NOT NULL,
  `lastname` varchar(350) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `mail_id` varchar(250) NOT NULL,
  `password` varchar(350) DEFAULT NULL,
  `address` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varbinary(25) NOT NULL,
  `other_details` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meat_products`
--

CREATE TABLE `meat_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` varchar(11) DEFAULT NULL,
  `product_name` varchar(350) NOT NULL,
  `image` text DEFAULT NULL,
  `information` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `stock_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 - off, 1- on',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_products`
--

INSERT INTO `meat_products` (`id`, `category_id`, `sub_category_id`, `product_name`, `image`, `information`, `status`, `stock_status`, `created`, `updated`) VALUES
(1, 1, '1', 'Country Chicken (with skin)', 'uploads/products/3f536dcaa927bab3c3ace867e01e0a1d.jpg', '<p>\r\n\r\n</p><h1>Country Chicken (With Skin)</h1><div>No Cheating. From the tender breast to the juicy leg piece, every atom of our country chicken is desi delivered right to your doorstep. Desi Chicken, Natu Kodi as the Telugu call it, is an acquired taste that you simply cannot forgo. Make pulao, biryani, roast directly or bake it in an oven. Sink in your teeth to magically travel into the lush green farm fields for the rural India. Pure Desi taste and nothing else.</div>\r\n\r\n<br><p></p><p>\r\n\r\n</p><h2>Meet the source:</h2><div>The lush green farms, the smell of petrichor, the crackling bonfire, organically and naturally grown country chicken being roasted atop it. There is nothing that beats the juicy and chewy taste of a country chicken. Natu Kodi at its prime.</div><div><br></div><div>We believe in purity and the taste associated with it. All of the country chickens procured and processed by OnlyMeat are strictly bred in wild by rural chicken farmers so as not to tamper with its nutritional value and incredible taste. Organic in every way and untouched by any external growth elements. Take your tongue on a journey to the lush and rural part of the desi India. Let your taste buds dance around the bonfire with like a child on a vacation.</div>\r\n\r\n<br><p></p>', 1, 0, '2019-11-14 09:59:33', '2019-11-14 16:29:33'),
(2, 1, '2', 'Chicken Skinless', 'uploads/products/0efd1f664ba426992668244e07b3aa71.jpg', '<p>\r\n\r\n</p><h1>Skinless</h1><p>No love matches the love of a chicken that gives its entire life just for you. Skinless chicken perfectly curry cut into succulent and juicy pieces and packed hygienically for a fast delivery to reach your next culinary journey. Package includes a full sized leg piece cut into equal halves, a chicken wing without the tip (depending on order quantity). High in taste and nutrients, order as per your customization.</p><p><br></p><h2>Meet the Source:<br></h2><p>Only meat believes in only one thing. Quality. This is perfectly summed up and reflected on our superior quality and hygienically processed chicken which is humanely bred in highly maintained farms through which we procure our chicken.</p><p>Graded the best in the city, all of our chicken farming methods strictly adhere to the highest scientific standards. The growth of these chicken follow a natural stress free protocol and controlled feeding environment.</p><p>Such scientific, healthy and natural upbringing yields us our king fit quality chicken. So that it could deliver the taste fit for an emperor.</p>\r\n\r\n<br><p></p>', 1, 0, '2019-11-14 10:06:21', '2019-11-15 09:54:33'),
(3, 2, '', 'Black Pomfret', 'uploads/products/a265ded8a118c2d3d5845bb22d24b463.jpg', '<p>\r\n\r\n</p><h1><b>Black Pomfret:</b></h1><i>Nalla chanduva: </i>White meat at its prime taste. Bred in the oceanic saltwater the black pomfret is an acquired taste with a mild touch to the taste buds. With the scales scrapped out, the fish is cut neatly into steakable portions to be enjoyed for its taste and to preserve its valuable proteins and nutrients\r\n\r\n<br><p></p>', 1, 0, '2019-11-14 10:11:19', '2019-11-14 16:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `meat_products_reviews`
--

CREATE TABLE `meat_products_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `firstname` varchar(350) DEFAULT NULL,
  `lastname` varchar(350) DEFAULT NULL,
  `email_id` varchar(350) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meat_product_price_details`
--

CREATE TABLE `meat_product_price_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_size` varchar(350) DEFAULT NULL,
  `price` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_product_price_details`
--

INSERT INTO `meat_product_price_details` (`id`, `product_id`, `unit_size`, `price`, `status`, `created`, `updated`) VALUES
(1, 1, '1kg', '150', 1, '2019-11-14 09:59:33', '2019-11-19 08:32:14'),
(2, 1, '2kg', '300', 1, '2019-11-14 09:59:33', '2019-11-19 08:32:14'),
(3, 1, '1/2 kg', '75', 1, '2019-11-14 09:59:33', '2019-11-19 08:32:14'),
(4, 2, '250 gms', '58', 1, '2019-11-14 10:06:21', '2019-11-14 10:06:21'),
(5, 2, '1 kg', '450', 1, '2019-11-14 10:06:21', '2019-11-14 10:06:21'),
(6, 2, '1.1/2 kg', '658', 1, '2019-11-14 10:06:22', '2019-11-14 10:06:22'),
(7, 3, '1 kg', '850', 1, '2019-11-14 10:11:19', '2019-11-19 08:30:49'),
(15, 2, '2 kg', '900', 1, '2019-11-15 02:32:12', '2019-11-19 08:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `meat_reg_users`
--

CREATE TABLE `meat_reg_users` (
  `id` int(11) NOT NULL,
  `reg_name` varchar(350) DEFAULT NULL,
  `email_id` varchar(350) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(350) DEFAULT NULL,
  `otp` int(11) NOT NULL,
  `otp_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_reg_users`
--

INSERT INTO `meat_reg_users` (`id`, `reg_name`, `email_id`, `mobile`, `password`, `otp`, `otp_status`, `status`, `created`, `updated`) VALUES
(1, 'Harshavardhan Reddy', 'admin@gmail.com', 9492411708, 'admin@123', 0, 0, 1, '2019-08-23 14:33:47', '2019-08-24 09:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `meat_site_details`
--

CREATE TABLE `meat_site_details` (
  `id` int(11) NOT NULL,
  `site_name` varchar(350) NOT NULL,
  `site_url` varchar(350) NOT NULL,
  `site_logo` text NOT NULL,
  `address` text NOT NULL,
  `state` varchar(350) NOT NULL,
  `city` varchar(350) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email_id` varchar(350) NOT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_site_details`
--

INSERT INTO `meat_site_details` (`id`, `site_name`, `site_url`, `site_logo`, `address`, `state`, `city`, `pincode`, `mobile`, `email_id`, `facebook`, `twitter`, `instagram`, `linkedin`, `status`, `created`, `updated`) VALUES
(1, 'APPAS MEAT', 'www.appasmeat.com', 'uploads/sitedetails/', 'Sr.nagar', 'Telanagana', 'Hyderabad', 500038, '9876543210', 'info@appasmeat.com', 'http://facebook.com', 'http://twitter.com', 'http://instagram.com', 'http://linkedin.com', 1, '2019-11-21 23:13:23', '2019-11-22 05:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `meat_sub_categories`
--

CREATE TABLE `meat_sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(350) NOT NULL,
  `image` text DEFAULT NULL,
  `information` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_sub_categories`
--

INSERT INTO `meat_sub_categories` (`id`, `category_id`, `sub_category_name`, `image`, `information`, `status`, `created`, `updated`) VALUES
(1, 1, 'COUNTRY', 'uploads/SubCategories/412766af9de808a70c1a2c799f7cad8f.png', 'Sample Information for sub category', 1, '2019-11-14 08:16:48', '2019-11-15 04:19:47'),
(2, 1, 'BROILER', 'uploads/SubCategories/4a4ded183e1e5fc23940add901e67c9e.png', 'Sample Information.', 1, '2019-11-14 08:17:47', '2019-11-15 04:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `meat_users`
--

CREATE TABLE `meat_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(350) NOT NULL,
  `last_name` varchar(350) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `mail_id` varchar(350) NOT NULL,
  `password` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meat_users`
--

INSERT INTO `meat_users` (`id`, `first_name`, `last_name`, `mobile`, `mail_id`, `password`, `status`, `created`, `updated`) VALUES
(1, 'Harshavardhan Reddy', 'yenumula', '9875684855', 'user@gmail.com', 'admin@123', 1, '2019-11-23 06:11:08', '2019-12-12 05:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meat_banners`
--
ALTER TABLE `meat_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_cart_details`
--
ALTER TABLE `meat_cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_categories`
--
ALTER TABLE `meat_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_delivery_address`
--
ALTER TABLE `meat_delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_newsletters`
--
ALTER TABLE `meat_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_online_users`
--
ALTER TABLE `meat_online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_products`
--
ALTER TABLE `meat_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_products_reviews`
--
ALTER TABLE `meat_products_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_product_price_details`
--
ALTER TABLE `meat_product_price_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `meat_reg_users`
--
ALTER TABLE `meat_reg_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_site_details`
--
ALTER TABLE `meat_site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_sub_categories`
--
ALTER TABLE `meat_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_users`
--
ALTER TABLE `meat_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meat_banners`
--
ALTER TABLE `meat_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meat_cart_details`
--
ALTER TABLE `meat_cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meat_categories`
--
ALTER TABLE `meat_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meat_delivery_address`
--
ALTER TABLE `meat_delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_newsletters`
--
ALTER TABLE `meat_newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_online_users`
--
ALTER TABLE `meat_online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_products`
--
ALTER TABLE `meat_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meat_products_reviews`
--
ALTER TABLE `meat_products_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meat_product_price_details`
--
ALTER TABLE `meat_product_price_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `meat_reg_users`
--
ALTER TABLE `meat_reg_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meat_site_details`
--
ALTER TABLE `meat_site_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meat_sub_categories`
--
ALTER TABLE `meat_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meat_users`
--
ALTER TABLE `meat_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
