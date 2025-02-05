-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2025 at 07:37 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `firstname`, `lastname`, `gender`, `date_of_birth`, `registration_date`, `account_status`) VALUES
(6, 'qw', 'ded', 'ded', 'ded', 'male', '2024-06-06', '2025-02-05 15:20:27', 0),
(2, 'xiaokai', 'efef', 'wavwe', 'vaweva', 'male', '2005-01-27', '2024-12-18 14:40:55', 1),
(3, 'xiaokafsjdfsf', 'ewfaw', 'wavwe', 'vaweva', 'male', '2024-02-20', '2024-12-18 14:55:32', 0),
(5, 'kenneth', '12345', 'xiaokai', 'dw', 'male', '2005-01-27', '2025-02-05 13:56:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` int NOT NULL,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, 49.99, '2015-08-02 12:04:03', '2024-12-28 10:34:26'),
(3, 'PC', 'nfehv', 1, 200, '2015-08-02 12:14:29', '2025-02-05 07:02:19'),
(4, 'Eye Glasses', 'It will make you read better.', 3, 6, '2015-08-02 12:15:04', '2025-01-22 04:55:47'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 3, 3.95, '2015-08-02 12:16:08', '2025-01-22 04:55:50'),
(6, 'Mouse', 'Very useful if you love your computer.', 2, 11.35, '2015-08-02 12:17:58', '2024-12-28 10:34:43'),
(7, 'Earphone', 'You need this one if you love music.', 2, 7, '2015-08-02 12:18:21', '2024-12-28 10:34:46'),
(8, 'Pillow', 'Sleeping well is important.', 3, 9, '2015-08-02 12:18:56', '2025-02-05 07:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL,
  `product_cat_name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `product_cat_description` text NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'sport', ''),
(2, 'game', ''),
(3, 'general', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
