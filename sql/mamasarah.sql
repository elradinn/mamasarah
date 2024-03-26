-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 01:35 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u330250787_mamasarah`
--

-- --------------------------------------------------------

--
-- Table structure for table `CartDetail`
--

CREATE TABLE `CartDetail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `dish_id` int(11) NOT NULL,
  `qty` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CartDetail`
--

INSERT INTO `CartDetail` (`id`, `cart_id`, `dish_id`, `qty`) VALUES
(22, 2, 6, 3),
(26, 7, 6, 2),
(27, 2, 20, 1),
(31, 9, 8, 1),
(32, 10, 7, 1),
(33, 10, 15, 1),
(37, 13, 19, 1),
(39, 10, 6, 1),
(42, 12, 19, 1),
(44, 10, 10, 1),
(45, 14, 19, 1),
(46, 15, 19, 1),
(50, 17, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `CartHeader`
--

CREATE TABLE `CartHeader` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CartHeader`
--

INSERT INTO `CartHeader` (`id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(3, 'Ala Carte'),
(2, 'Drinks'),
(1, 'Silog');

-- --------------------------------------------------------

--
-- Table structure for table `Dish`
--

CREATE TABLE `Dish` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dish`
--

INSERT INTO `Dish` (`id`, `name`, `price`, `category_id`, `image`, `description`) VALUES
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
(19, 'Fresh Lumpia', 20, 3, '65f573583c6be.jpg', NULL),
(20, 'Kare-Kare', 175, 3, '65f573b6e6e68.jpg', NULL),
(21, 'Salad Solo', 1, 3, '65f574076e923.jpg', NULL),
(22, 'Tuna Sandwich', 150, 3, '65f57423aaf82.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `dish_id` int(11) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderDetail`
--

INSERT INTO `OrderDetail` (`id`, `order_id`, `dish_id`, `qty`, `remarks`) VALUES
(12, 9, 19, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `OrderHeader`
--

CREATE TABLE `OrderHeader` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `OrderHeader`
--

INSERT INTO `OrderHeader` (`id`, `order_date`, `status_id`, `user_id`) VALUES
(9, '2024-03-24', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`id`, `name`) VALUES
(2, 'Cancelled'),
(1, 'Delivered'),
(3, 'Dispatch'),
(4, 'On The Way');

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE `UserAccount` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserAccount`
--

INSERT INTO `UserAccount` (`id`, `name`, `email`, `password`, `password_reset_token`, `active`, `address`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$DmcCxLNnZJsbpQjH2wYRF.BTUQ/xPnEZyOBEhs09ER9tgaqZ4rFxS', 'X2C4pfXXsKiXdlj7N2K9n25IZrU8irVc1aJCOaQq', b'1', 'N/A'),
(8, 'gerlie', 'gerlieobiasocampo0216@gmail.com', '$2y$10$.A8Hmw4M6gphJ0MFQ6CTAOjaJ.3043jZemiLxrEOO0u1CYMAYBN7a', NULL, b'1', 'calabanga'),
(14, 'Juls', 'juliannavillamil@gmail.com', '$2y$10$EViiMHgU4bopsMob5eS/vuN7uCKcVCz2x36JboAP8.XxO5XikAU86', NULL, b'1', 'Naga City'),
(15, 'lovely', 'lovelyobias@gmail.com', '$2y$10$n4H04QlmYULje0Azlw0.tuKH8jz2xOUtS8E4Hqltz2RqZH/AqgEDm', NULL, b'1', 'calabanga'),
(18, 'vedo', 'vedovergara@gmail.com', '$2y$10$hBIPFkGZd1MWMODiVMDz5uGGCwdkmMWAZwFQ7qs71egLmxaT6/Hlq', 'L2i6xovKQ5riqMOpGtLy2xQ2NlcTK93Cd2L9grpC', b'1', 'Zone 2 Looban St. Sabang, Calabanga, Camarines Sur'),
(19, 'alfie', 'alfieporto9@gmail.com', '$2y$10$43DJb0GmHRFkZxP3UKAahuBDGoymyFFut5ojHVKSpwZMs2FHyDQn6', 'pwdpyar7RatkAMYsITOakYZKh9quB083T5H4rasc', b'1', 'calabanga'),
(20, 'lyka', 'lykaangelpanes@gmail.com', '$2y$10$T7o3ZLt2w6XuF20xtTy3XeLxLEFDlHWqPpM2P0OtKWNqezvEJENkK', NULL, b'1', 'naga');

-- --------------------------------------------------------

--
-- Table structure for table `UserRole`
--

CREATE TABLE `UserRole` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserRole`
--

INSERT INTO `UserRole` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CartDetail`
--
ALTER TABLE `CartDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CartHeader`
--
ALTER TABLE `CartHeader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `Dish`
--
ALTER TABLE `Dish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OrderHeader`
--
ALTER TABLE `OrderHeader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `UserRole`
--
ALTER TABLE `UserRole`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CartDetail`
--
ALTER TABLE `CartDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `CartHeader`
--
ALTER TABLE `CartHeader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Dish`
--
ALTER TABLE `Dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `OrderHeader`
--
ALTER TABLE `OrderHeader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `UserAccount`
--
ALTER TABLE `UserAccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
