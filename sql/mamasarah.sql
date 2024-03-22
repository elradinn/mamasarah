-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 06:28 PM
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
-- Database: `mamasarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `price`, `category_id`, `image`, `description`) VALUES
(6, 'Fish Fillet Silog', 195, 1, '65f546106f79a.jpg', NULL),
(7, 'Bangus Silog', 195, 1, '65f5713111928.jpg', NULL),
(8, 'Beef Tapa', 195, 1, '65f57163c8818.jpg', NULL),
(9, 'Honey Glazed Chicken Silog', 210, 1, '65f5718932db3.jpg', NULL),
(10, 'Humbadobo Silog', 195, 1, '65f571aa72984.jpg', NULL),
(11, 'Porkchop Silog', 185, 1, '65f571d2de995.jpg', NULL),
(12, 'Spam Silog', 195, 1, '65f571fcf0c21.jpg', NULL),
(13, 'Blueberry Shake', 135, 2, '65f5724766925.jpg', NULL),
(14, 'Lettuce Shake', 150, 2, '65f5727c2373f.jpg', NULL),
(15, 'Mango Shake', 135, 2, '65f572a16adf8.jpg', NULL),
(16, 'Strawberry Shake', 135, 2, '65f572c67e196.jpg', NULL),
(17, 'Chicken Sandwich', 150, 3, '65f5730ed18f7.jpg', NULL),
(18, 'Fish and Fries', 165, 3, '65f5733400ef9.jpg', NULL),
(19, 'Fresh Lumpia', 150, 3, '65f573583c6be.jpg', NULL),
(20, 'Kare-Kare', 175, 3, '65f573b6e6e68.jpg', NULL),
(21, 'Salad Solo', 150, 3, '65f574076e923.jpg', NULL),
(22, 'Tuna Sandwich', 150, 3, '65f57423aaf82.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
