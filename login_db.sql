-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 01:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `name`, `price`, `image`, `description`, `category`, `quantity`, `status`, `user_id`) VALUES
(23, 'qwqwqwqwq', '222.00', 'bg1.jpg', 'alomi', 'beverage', '1', 'complete', 14),
(24, 'coke', '12.00', 'begining_1.jpg', 'alomi', 'beverage', '1', 'complete', 13),
(25, 'qwqwqwqwq', '222.00', 'bg1.jpg', 'alomi', 'beverage', '1', 'complete', 13),
(26, 'ju', '20.00', 'admin_user_data_logo.jpg', 'ssss', 'fufui', '1', 'complete', 13),
(45, 'wewew', '344.00', 'login-bg.png', 'wewew', 'wewewe', '1', 'complete', 16),
(46, 'qwqwqwqwq', '222.00', 'bg1.jpg', 'alomi', 'beverage', '1', 'complete', 16),
(47, 'coke', '12.00', 'begining_1.jpg', 'alomi', 'beverage', '1', 'complete', 16),
(48, 'qwqwqq', '900.00', 'preview.png', 'wqwqq', 'wqwq', '1', 'pending', 16),
(51, 'qwqwqwqwq', '222.00', 'bg1.jpg', 'alomi', 'beverage', '1', 'complete', 20),
(54, 'SIGNATURE DISH 1', '10.20', 'IMAGES/bg1.jpg', 'signature dish description lorem  ipsum ', 'signature1', '14', 'complete', 20),
(55, 'SIGNATURE DISH 2', '50.20', 'IMAGES/bg1.jpg', 'signature dish description lorem  ipsum ', 'signature2', '50', 'complete', 20);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `img_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `name`, `description`, `price`, `category`, `img_url`) VALUES
(41, 'coke', 'alomi', 12.00, 'beverage', 'begining_1.jpg'),
(42, 'qwqwqwqwq', 'alomi', 222.00, 'beverage', 'bg1.jpg'),
(44, 'qwqwqq', 'wqwqq', 900.00, 'desert', 'login-bg.png'),
(45, 'wewew', 'wewew', 344.00, 'desert', 'login-bg.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `confirmed_by` varchar(255) NOT NULL,
  `ammount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mode` varchar(255) NOT NULL DEFAULT 'uscash',
  `ctreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `confirmed_by`, `ammount`, `mode`, `ctreated_at`, `user_id`) VALUES
(1, '14', 222.00, 'cash', '2024-06-03 20:18:03', '14'),
(2, '14', 222.00, 'cash', '2024-06-03 20:21:16', '14'),
(3, '14', 12.00, 'cash', '2024-06-03 20:21:17', '13'),
(4, '14', 12.00, 'cash', '2024-06-03 20:21:18', '13'),
(5, '14', 12.00, 'cash', '2024-06-03 20:21:41', '13'),
(6, '14', 222.00, 'cash', '2024-06-03 20:21:43', '14'),
(7, '14', 222.00, 'cash', '2024-06-03 20:21:47', '13'),
(8, '14', 20.00, 'cash', '2024-06-03 20:21:49', '13'),
(9, '14', 20.00, 'cash', '2024-06-03 20:27:30', '16'),
(10, '14', 344.00, 'cash', '2024-06-10 20:52:50', '16'),
(11, '14', 222.00, 'cash', '2024-06-10 21:52:50', '16'),
(12, '14', 12.00, 'cash', '2024-06-11 18:43:12', '16'),
(13, '14', 222.00, 'cash', '2024-06-12 00:01:42', '20'),
(14, '14', 10.20, 'cash', '2024-06-12 00:06:28', '20'),
(15, '14', 50.20, 'cash', '2024-06-12 00:08:40', '20');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ID` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signature_dish`
--

CREATE TABLE `signature_dish` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signature_dish`
--

INSERT INTO `signature_dish` (`ID`, `name`, `description`, `price`, `category`, `img_url`) VALUES
(1, 'SIGNATURE DISH 1', 'signature dish description lorem  ipsum ', 10.20, 'signature1', 'IMAGES/bg1.jpg'),
(2, 'SIGNATURE DISH 2', 'signature dish description lorem  ipsum ', 50.20, 'signature2', 'IMAGES/bg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `status` enum('available','occupied') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_number`, `status`) VALUES
(1, 1, 'available'),
(2, 2, 'available'),
(3, 3, 'available'),
(4, 4, 'occupied'),
(5, 5, 'available'),
(6, 6, 'available'),
(7, 7, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `img_url` text NOT NULL,
  `profile_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`ID`, `name`, `comment`, `img_url`, `profile_url`) VALUES
(1, 'kofi', 'very very good', 'IMAGES/cr3.jpg', 'IMAGES/testing_pic.jpg'),
(3, 'kofi', 'very very good', 'IMAGES/cr2.jpg', 'IMAGES/test1.jpg'),
(4, 'kofi', 'very very good', 'IMAGES/cr3.jpg', 'IMAGES/test1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_id`, `user_name`, `password`, `role`, `date`) VALUES
(12, 78619631900091, 'QWQW', '$2y$10$Jr6WFOwxaakM0rcUfiRveu4w02gzRIQhMw3.lhc8UAfG/axBMBbFS', 'admin', '2024-05-27 14:16:49'),
(14, 5112408145, 'safana2', '$2y$10$CzjB38WXDhhFRT90wvZG3eJYpk/DrbJB8WLpTd20m3NaFuzo3IsRi', 'cashier', '2024-06-03 13:04:05'),
(15, 83325062575150, 'kissi', '$2y$10$zWegsFsAEjM027k.rz8rPeobKlHD9jHfK51zsTcHvqEgbvZpFTRXu', 'admin', '2024-06-03 13:03:32'),
(16, 80704720507, 'qq', '$2y$10$0Z99Z/Vy0WOhoH72xBmoW.YXm5IHSUV8vzgRK.xe.kmgdrHYw89WC', 'user', '2024-06-03 13:04:04'),
(17, 56243, 'sa', '$2y$10$FDW/mKC.b2t4Xtcbm7ivfO8Q.vhbEb9i4g2dbE.J2rmCTy0fgXJLq', 'user', '2024-06-11 11:04:44'),
(18, 5918944810, 'xiaomi', '$2y$10$vDhdj3S18Mt8bJGJmLXsWe/i7F0gfxEA/kI.wk5382KwYtIwQy.5m', 'user', '2024-06-03 13:13:01'),
(19, 7973288460020229, 'kgosi', '$2y$10$OmVgKTEtdDSA7T4t41BPtOYxygYE5zGwhXZUrZajmhdCoEbQ8W5/a', 'user', '2024-06-11 11:26:41'),
(20, 1211304, 'memo', '$2y$10$8so0qcbHe1Mtyoz.ZxiGlOHqNt3.rHUvQuwCS4Z54WnFj2U1ea/7S', 'user', '2024-06-11 13:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idx_menu_id` (`ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signature_dish`
--
ALTER TABLE `signature_dish`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`),
  ADD KEY `idx_user_user_id` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signature_dish`
--
ALTER TABLE `signature_dish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `menu` (`ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
