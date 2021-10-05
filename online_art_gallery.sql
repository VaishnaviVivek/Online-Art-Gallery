-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2019 at 12:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_art_gallery`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `user_user` VARCHAR(255), IN `user_password` VARCHAR(255))
    NO SQL
SELECT * FROM user WHERE user_username = user_user AND user_password = user_password$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE IF NOT EXISTS `art` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type_id` varchar(255) NOT NULL,
  `product_company_id` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`product_id`, `product_name`, `product_type_id`, `product_company_id`, `product_price`, `product_image`, `product_description`, `product_stock`) VALUES
(1, 'Krishna Radha', '1', '2', '1200', 'krishan radha1.jpg', 'Product 1', '0'),
(2, 'Urban Artworks', '2', '1', '1100', 'urban art.jpeg', 'Product 1', '95'),
(3, 'Monalisa Art', '3', '1', '1170', 'monalisha.jpg', 'Product 1', '200'),
(4, 'Simon Dewey Art', '2', '4', '1170', 'simon dewey art.jpg', 'Product 1', '90'),
(5, 'Wall Art', '3', '2', '1170', 'wall art.jpg', 'Test', '16'),
(6, 'Isle Weight Art', '2', '2', '1170', 'Isle Weight.jpg', 'Test', '17'),
(7, 'Emma Blyth Art', '6', '2', '1200', 'Emma Blyth.jpg', 'Gift Item', '98'),
(8, 'Tree Paint Art', '1', '2', '1200', 'Tree Art.jpg', 'Gift Item', '100'),
(9, 'Oil Painting Art', '3', '2', '1500', 'oil paint.jpg', 'test', '15'),
(10, 'Frame Art', '3', '2', '1200', 'frame painting.jpg', 'test', '10');

-- --------------------------------------------------------

-- Table structure for table `auth_users`
CREATE TABLE auth_user (
auth_id INT(13) NOT NULL PRIMARY KEY,
user_level_id varchar(255) DEFAULT NULL,
auth_name TINYTEXT NOT NULL,
auth_username TINYTEXT NOT NULL,
auth_password TINYTEXT NOT NULL);


INSERT INTO `auth_user` (`auth_id`, `user_level_id`, `auth_name`, `auth_username`, `auth_password`) 
VALUES ('001', '1', 'Dhruva', 'dhruva', '$2y$12$OphBFRWGphdx.BK.QhO/hOd.nNYqsOes0JDm9HdVMxqRcX6CH.riW'), 
('002', '1', 'Vaishnavi', 'vaishnavi', '$2y$12$OphBFRWGphdx.BK.QhO/hOd.nNYqsOes0JDm9HdVMxqRcX6CH.riW');


--
-- Table structure for table `Artists`
--

CREATE TABLE IF NOT EXISTS `Artists` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_image` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `artist_id` varchar(255) NOT NULL,
  `artist_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`company_id`, `company_name`, `company_image`, `artist_name`, `artist_id`, `artist_desc`) VALUES
(1, 'Painting', 'paint4.jpg', 'dileep', '1', 'xyz'),
(2, 'Scupture', 'scul3.jpg', 'kumar', '2', 'xyz'),
(3, 'Culture', 'tribal3.jpg', 'sachin', '3', 'xyz'),
(4, 'Photograph', 'photo1.jpg', 'vijay', '4', 'xyz'),
(5, 'Oil Painting', 'paint3.jpg', 'hemanth', '5', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`city_id` int(10) unsigned NOT NULL,
  `city_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Mumbai'),
(2, 'Delhi'),
(3, 'Chenai'),
(4, 'Banglore'),
(5, 'Varanasi'),
(6, 'Kolkatta');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
`month_id` int(11) NOT NULL,
  `month_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(11) NOT NULL,
  `order_user_id` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_user_id`, `order_date`, `order_amount`, `order_status`) VALUES
(1, '2', '10 January,2019 05:32:32 PM', '1170', 'Confirmed'),
(2, '2', '10 January,2019 05:33:08 PM', '1170', 'Confirmed'),
(3, '2', '10 January,2019 05:34:04 PM', '1170', 'Confirmed'),
(4, '2', '10 January,2019 05:38:26 PM', '1100', 'Confirmed'),
(5, '2', '10 January,2019 05:48:36 PM', '4540', 'Confirmed'),
(6, '2', '10 January,2019 05:52:49 PM', '7140', 'Confirmed'),
(7, '2', '10 January,2019 05:57:06 PM', '4640', 'Confirmed'),
(8, '2', '10 January,2019 06:49:22 PM', '5840', 'Confirmed'),
(9, '2', '11 January,2019 03:25:13 PM', '1200', 'Confirmed'),
(10, '2', '11 January,2019 03:37:43 PM', '1170', 'Confirmed'),
(11, '2', '14 January,2019 03:08:18 PM', '2300', 'Confirmed'),
(12, '2', '15 January,2019 03:25:12 PM', '0', 'Pending'),
(13, '2', '26 October,2019 08:57:33 PM', '1170', 'Confirmed'),
(14, '12', '31 October,2019 06:39:07 AM', '1100', 'Confirmed'),
(15, '12', '31 October,2019 06:49:42 AM', '0', 'Confirmed'),
(16, '12', '31 October,2019 06:53:58 AM', '0', 'Pending'),
(17, '13', '02 November,2019 09:32:37 AM', '1100', 'Confirmed'),
(18, '13', '02 November,2019 09:34:02 AM', '1170', 'Confirmed'),
(19, '13', '02 November,2019 09:36:35 AM', '1100', 'Confirmed'),
(20, '13', '02 November,2019 09:38:36 AM', '1100', 'Confirmed'),
(21, '13', '07 November,2019 07:11:56 AM', '2200', 'Confirmed'),
(22, '13', '07 November,2019 07:14:02 AM', '4540', 'Confirmed'),
(23, '13', '07 November,2019 08:16:56 AM', '3510', 'Confirmed'),
(24, '13', '07 November,2019 08:18:31 AM', '2200', 'Confirmed'),
(25, '13', '07 November,2019 08:19:37 AM', '2200', 'Confirmed'),
(26, '13', '07 November,2019 08:25:06 AM', '2340', 'Confirmed'),
(27, '13', '07 November,2019 08:27:51 AM', '2340', 'Confirmed'),
(28, '13', '07 November,2019 08:29:22 AM', '1170', 'Confirmed'),
(29, '13', '07 November,2019 08:29:51 AM', '1170', 'Confirmed'),
(30, '13', '07 November,2019 08:31:22 AM', '2340', 'Confirmed'),
(31, '13', '07 November,2019 08:32:50 AM', '1170', 'Confirmed'),
(32, '13', '07 November,2019 08:35:20 AM', '4340', 'Confirmed'),
(33, '13', '07 November,2019 08:38:59 AM', '2340', 'Confirmed'),
(34, '13', '07 November,2019 08:40:56 AM', '4680', 'Confirmed'),
(35, '13', '07 November,2019 09:24:52 AM', '2340', 'Confirmed'),
(36, '13', '07 November,2019 09:27:17 AM', '2340', 'Confirmed'),
(37, '13', '07 November,2019 09:30:32 AM', '1170', 'Confirmed'),
(38, '13', '07 November,2019 09:30:48 AM', '4680', 'Confirmed'),
(39, '13', '07 November,2019 09:31:40 AM', '1170', 'Confirmed'),
(40, '13', '07 November,2019 09:38:02 AM', '4680', 'Confirmed'),
(41, '13', '07 November,2019 09:40:42 AM', '2340', 'Confirmed'),
(42, '13', '07 November,2019 09:41:46 AM', '2340', 'Confirmed'),
(43, '13', '11 November,2019 06:58:22 AM', '2200', 'Confirmed'),
(44, '13', '11 November,2019 07:31:41 AM', '3510', 'Confirmed'),
(45, '13', '11 November,2019 07:34:51 AM', '3510', 'Confirmed'),
(46, '', '11 November,2019 08:00:00 AM', '1200', 'Confirmed'),
(47, '13', '11 November,2019 08:08:11 AM', '2200', 'Confirmed'),
(48, '13', '12 November,2019 11:25:49 AM', '3300', 'Confirmed'),
(49, '', '12 November,2019 11:45:46 AM', '1200', 'Confirmed'),
(50, '13', '12 November,2019 12:45:34 PM', '3510', 'Confirmed'),
(51, '13', '12 November,2019 03:52:07 PM', '2200', 'Confirmed'),
(52, '13', '12 November,2019 04:52:31 PM', '6600', 'Confirmed'),
(53, '13', '12 November,2019 04:55:31 PM', '5850', 'Confirmed'),
(54, '13', '13 November,2019 08:01:30 AM', '2340', 'Confirmed'),
(55, '13', '13 November,2019 08:02:41 AM', '5850', 'Confirmed'),
(56, '13', '13 November,2019 08:05:31 AM', '4710', 'Confirmed'),
(57, '13', '13 November,2019 08:12:21 AM', '3510', 'Confirmed'),
(58, '13', '13 November,2019 08:12:47 AM', '1170', 'Confirmed'),
(59, '13', '13 November,2019 08:15:05 AM', '1170', 'Confirmed'),
(60, '13', '13 November,2019 08:15:17 AM', '1170', 'Confirmed'),
(61, '13', '13 November,2019 08:15:42 AM', '1170', 'Confirmed'),
(62, '13', '13 November,2019 08:18:11 AM', '1100', 'Confirmed'),
(63, '13', '13 November,2019 08:22:49 AM', '2340', 'Confirmed'),
(64, '13', '13 November,2019 08:24:06 AM', '2340', 'Confirmed'),
(65, '13', '13 November,2019 08:37:55 AM', '4540', 'Confirmed'),
(66, '13', '13 November,2019 08:42:45 AM', '5640', 'Confirmed'),
(67, '13', '13 November,2019 08:46:43 AM', '5850', 'Confirmed'),
(68, '13', '13 November,2019 08:49:07 AM', '9360', 'Confirmed'),
(69, '13', '13 November,2019 09:24:16 AM', '10740', 'Confirmed'),
(70, '13', '21 November,2019 08:31:25 AM', '3300', 'Confirmed');

--
-- Triggers `order`
--
DELIMITER //
CREATE TRIGGER `add` AFTER INSERT ON `order`
 FOR EACH ROW UPDATE order_item
    SET oi_total = new.order_amount
    WHERE oi_id = new.order_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
`oi_id` int(11) NOT NULL,
  `oi_order_id` varchar(255) NOT NULL,
  `oi_product_id` varchar(255) NOT NULL,
  `oi_price_per_unit` varchar(255) NOT NULL,
  `oi_cart_quantity` varchar(255) NOT NULL,
  `oi_total` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `oi_order_id`, `oi_product_id`, `oi_price_per_unit`, `oi_cart_quantity`, `oi_total`) VALUES
(2, '13', '3', '1170', '1', '1170'),
(8, '1', '3', '1170', '1', '1170'),
(9, '2', '4', '1170', '1', '1170'),
(10, '3', '3', '1170', '1', '1170'),
(11, '4', '2', '1100', '1', '1100'),
(12, '5', '2', '1100', '2', '1100'),
(13, '5', '4', '1170', '2', '1170'),
(14, '6', '3', '1170', '1', '1170'),
(17, '6', '7', '1200', '1', '1200'),
(18, '6', '8', '1200', '1', '1200'),
(19, '6', '8', '1200', '1', '1200'),
(20, '6', '4', '1170', '1', '1170'),
(21, '6', '8', '1200', '1', '1200'),
(22, '7', '6', '1170', '1', '1170'),
(23, '7', '7', '1200', '1', '1200'),
(25, '7', '4', '1170', '1', '1170'),
(26, '7', '2', '1100', '1', '1100'),
(27, '8', '2', '1100', '1', '1100'),
(28, '8', '6', '1170', '1', '1170'),
(29, '8', '3', '1170', '1', '1170'),
(30, '8', '1', '1200', '1', '1200'),
(31, '8', '8', '1200', '1', '1200'),
(32, '9', '1', '1200', '1', '2000'),
(33, '10', '3', '1170', '1', '1170'),
(34, '11', '1', '1200', '1', '1200'),
(35, '11', '2', '1100', '1', '1100'),
(36, '12', '2', '1100', '1', '1100'),
(38, '14', '2', '1100', '1', '1100'),
(41, '17', '2', '1100', '1', '1100'),
(42, '18', '5', '1170', '1', '1170'),
(43, '19', '2', '1100', '1', '1100'),
(44, '20', '2', '1100', '1', '0'),
(45, '21', '2', '1100', '2', '0'),
(46, '22', '3', '1170', '1', '0'),
(47, '22', '5', '1170', '1', '0'),
(48, '22', '2', '1100', '1', '0'),
(49, '22', '2', '1100', '4', '0'),
(50, '23', '3', '1170', '3', '0'),
(51, '24', '2', '1100', '2', '0'),
(52, '25', '2', '1100', '2', '0'),
(53, '26', '3', '1170', '2', '0'),
(54, '27', '3', '1170', '2', '0'),
(55, '28', '3', '1170', '1', '0'),
(56, '29', '3', '1170', '1', '0'),
(57, '30', '4', '1170', '2', '0'),
(58, '31', '4', '1170', '1', '0'),
(59, '32', '2', '1100', '1', '0'),
(60, '32', '4', '1170', '2', '0'),
(61, '33', '4', '1170', '2', '0'),
(62, '34', '3', '1170', '4', '0'),
(63, '35', '4', '1170', '2', '0'),
(64, '36', '4', '1170', '2', '0'),
(65, '37', '4', '1170', '1', '0'),
(66, '38', '4', '1170', '4', '0'),
(67, '39', '4', '1170', '1', '0'),
(68, '40', '4', '1170', '2', '0'),
(69, '40', '4', '1170', '2', '0'),
(70, '41', '4', '1170', '2', '0'),
(71, '42', '5', '1170', '2', '2340'),
(72, '43', '2', '1100', '2', '2200'),
(73, '44', '3', '1170', '3', '3510'),
(74, '45', '4', '1170', '3', '1170'),
(75, '46', '1', '1200', '1', '1200'),
(76, '47', '2', '1100', '2', '2200'),
(77, '48', '2', '1100', '3', '3300'),
(78, '49', '1', '1200', '1', '1200'),
(79, '50', '3', '1170', '3', '3510'),
(80, '51', '2', '1100', '2', '2200'),
(81, '52', '2', '1100', '6', '6600'),
(82, '53', '4', '1170', '1', '5850'),
(83, '53', '3', '1170', '4', '5850'),
(84, '54', '3', '1170', '2', '1170'),
(85, '55', '3', '1170', '3', '1170'),
(86, '55', '4', '1170', '2', '1170'),
(87, '56', '10', '1200', '1', '1200'),
(88, '56', '4', '1170', '3', '1170'),
(89, '57', '3', '1170', '2', '1170'),
(90, '57', '4', '1170', '1', '1170'),
(91, '58', '4', '1170', '1', '1170'),
(92, '59', '3', '1170', '1', '1170'),
(93, '60', '3', '1170', '1', '1170'),
(94, '61', '4', '1170', '1', '1170'),
(95, '62', '2', '1100', '1', '1100'),
(96, '63', '3', '1170', '2', '1170'),
(97, '64', '3', '1170', '2', '1170'),
(101, '65', '2', '1100', '2', '1100'),
(102, '65', '4', '1170', '2', '1170'),
(103, '66', '2', '1100', '3', '1100'),
(104, '66', '4', '1170', '2', '1170'),
(107, '67', '3', '1170', '1', '1170'),
(108, '67', '4', '1170', '4', '1170'),
(110, '68', '3', '1170', '1', '1170'),
(111, '68', '5', '1170', '7', '1170'),
(112, '69', '3', '1170', '2', '1170'),
(113, '69', '9', '1500', '4', '1500'),
(114, '69', '8', '1200', '2', '1200'),
(115, '70', '2', '1100', '1', '1100'),
(116, '70', '2', '1100', '2', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`os_id` int(11) NOT NULL,
  `os_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`os_id`, `os_title`) VALUES
(1, 'Confirmed'),
(2, 'Processing'),
(3, 'Packed'),
(4, 'Dispatched');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
`state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Karnataka'),
(2, 'Gujrat'),
(3, 'Bihar'),
(4, 'Uttar Pradesh'),
(5, 'Delhi'),
(6, 'Haryana');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_image`) VALUES
(1, 'Spray Paint Art', 'spray paint art.jpg'),
(2, 'Tradition Art', 'Tradition Art.jpg'),
(3, 'Western Art', 'Western Art.jpg'),
(4, 'Print Art', 'Prints Art.jpg'),
(5, 'Digital Art', 'nazi.jpg'),
(6, 'Water Colour Art', 'paint2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_level_id` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_add1` varchar(255) NOT NULL,
  `user_add2` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level_id`, `user_username`, `user_password`, `user_name`, `user_add1`, `user_add2`, `user_city`, `user_state`, `user_country`, `user_email`, `user_mobile`, `user_gender`, `user_dob`, `user_image`) VALUES
(2, '2', 'customer', 'test', 'Sunil Kumar', 'Yelanka', 'Bangalore', '4', '3', '1', 'vivkum06@gmail.com', '9324324546', '', '26 December,2015', 'c5.jpg'),
(8, '2', 'cook', 'test', 'Suman Singh', 'House no : 768', 'Sector 2A', '1', '2', '1', 'suman@gmail.com', '987654321', '', '13 January,1961', 'p3.jpg'),
(9, '2', 'kaushal', 'test', 'Arun Kumar', 'House no : 768', 'Sector 2A', '1', '1', '1', 'arun@gmail.com', '987654321', '', '12 january, 2013', 'p4.jpg'),
(10, '2', 'manasa', 'test', 'Manasa', 'New Delhi', 'India', '2', '2', '1', 'manasa@gmail.com', '9876543212', '', '18 January,1968', 'p5.jpg'),
(11, '2', 'aman', 'test', 'Aman Singh', 'Sector 120', 'Circel Road', '1', '1', '2', 'aman@gmail.com', '8978765654', '', '12 May,1999', '28bdc83.jpg'),
(13, '2', 'dileep', '9900', 'dileep kumar', 'sagar', 'karnataka', '4', '6', '1', 'dileepsagar678@gmail.com', '9900616411', '', '23 November,2019', 'hotellogin.png'),
(14, '2', 'ak47', 'ak47', 'bharat', 'sagsh', 'dwd', '4', '3', '1', 'dil@gmail.com', '99000022', '', '15 November,2019', 'disease2.jpg'),
(15, '2', 'dileep', '9900', 'dileep kumar', 'sagar', 'karnataka', '4', '1', '1', 'dil@gmail.com', '09900878711', '', '18 October,2019', 'Screenshot from 2019-11-15 11-21-19.png'),
(16, '2', 'dileep11', '9900', 'dileep kumar', 'sagar', 'karnataka', '4', '3', '1', 'dil@gmail.com', '09900878711', '', '24 October,2019', 'Screenshot from 2019-08-03 13-22-17.png'),
(17, '2', 'dileep33', '9900', 'dileep kumar', 'sagar', 'karnataka', '4', '1', '1', 'dil@gmail.com', '09900878711', '', '27 November,2019', 'Screenshot from 2019-08-03 13-22-17.png');

--
-- Triggers `user`
--
DELIMITER //
CREATE TRIGGER `Before_Insert_User` BEFORE INSERT ON `user`
 FOR EACH ROW BEGIN
  IF (EXISTS(SELECT 1 FROM user WHERE user_username = NEW.user_username)) THEN
    SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT = 'Username Already Exits. Kindly choose another.... ';
  END IF;
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
 ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
 ADD PRIMARY KEY (`oi_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
 ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `city_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
