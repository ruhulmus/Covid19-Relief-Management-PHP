-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 08:15 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cfn`
--

-- --------------------------------------------------------

--
-- Table structure for table `relief_request`
--

CREATE TABLE `relief_request` (
  `id` int(11) NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `no_of_family` varchar(4) NOT NULL,
  `releife_items` varchar(200) NOT NULL,
  `no_of_survival_day` varchar(10) NOT NULL,
  `details` varchar(200) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relief_request`
--

INSERT INTO `relief_request` (`id`, `upazila_id`, `user_id`, `type`, `name`, `address`, `no_of_family`, `releife_items`, `no_of_survival_day`, `details`, `nid`, `created_at`) VALUES
(1, 1, 1, 'type', 'Hanif', 'barura, comilla', '2', 'chal, dal, torkari', '5', 'sabxhsbd wehweuhcw', '659598*7-*7+', '2020-04-26 06:02:55'),
(2, 1, 1, 'type', 'Sattar', 'Debidwar, comilla', '2', 'chal, dal, torkari', '5', 'sabxhsbd wehweuhcw', '659598*7-*7+', '2020-04-26 06:04:43'),
(3, 2, 2, 'type', 'Harun', 'Debidwar, comilla', '9', 'chal, dal, torkari', '98', 'sabxhsbd wehweuhcw', '54684849949', '2020-04-26 06:05:49'),
(4, 1, 1, 'type 2', 'Haniffa', 'baruraa, comilla', '7', 'chal, dal, torkari, sobji', '10', 'nsxbhjwb wjewhcw uwehweucgwc', '000000000000', '2020-04-26 06:01:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `relief_request`
--
ALTER TABLE `relief_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `relief_request`
--
ALTER TABLE `relief_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
