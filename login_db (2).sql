-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 05:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
(19, 'coke', '12.00', 'begining_1.jpg', 'alomi', 'beverage', '9', 'pending', 13);

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
(43, 'ju', 'ssss', 20.00, 'fufui', 'admin_user_data_logo.jpg');

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
(1, 'SIGNATURE DISH', 'signature dish description lorem  ipsum ', 10.20, 'signature1', 'IMAGES/bg1.jpg'),
(2, 'SIGNATURE DISH', 'signature dish description lorem  ipsum ', 50.20, 'signature2', 'IMAGES/bg1.jpg');

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
  `role` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_id`, `user_name`, `password`, `role`, `date`) VALUES
(1, 24891505523868611, 'ERER', '123123', 'admin', '2024-04-20 16:37:03'),
(2, 98590486584, 'asdf', '1212', 'user', '2024-04-20 16:38:27'),
(3, 4454786, 'lichade', '123456', '', '2024-04-23 19:01:59'),
(4, 902261589581, 'laoshi', '123123', '', '2024-04-24 05:22:44'),
(5, 17227523, 'seth', '123456', '', '2024-05-07 19:18:31'),
(6, 9223372036854775807, 'ghana', '$2y$10$Zh5ZbC9GJ/2bg9lJSUmuCuPkOQoBe4s.NvaDE8v9ZZKiPgjgvJbz6', '', '2024-05-14 02:56:10'),
(7, 6854803922, 'nija', '$2y$10$YniS07YVaI5i6YVJSMVHJuZUnAcgViXxdKGob7zZdMC60kevA66Sm', '', '2024-05-14 03:04:41'),
(8, 69838247616753, 'POLICE', '$2y$10$COj1kGYV8cARlU741tmtk.3tbH7Le/oNTjWXx4K4q4EEoFMC1p6ju', '', '2024-05-14 20:27:07'),
(9, 38446678, 'safana', '$2y$10$OnTzTDC8q4wuf7sOiqy1U.CSrsxCb1fJwvMu8766wNMDIw6PaZp5.', '', '2024-05-16 17:21:09'),
(10, 440016132001488, 'qweqwe', '$2y$10$Ti0xehgae3v3U5DoFgJq1OGaMv02gL4N6znPJ0P1PU9BYSRB5Z6La', '', '2024-05-16 20:54:54'),
(11, 1227360805, 'qwerqwer', '$2y$10$auKZwiS319EpC.ojVU8I0ucHDj6sMQLd2AHL/g0c3BKfMqGqFmMum', '', '2024-05-20 07:51:35'),
(12, 78619631900091, 'QWQW', '$2y$10$Jr6WFOwxaakM0rcUfiRveu4w02gzRIQhMw3.lhc8UAfG/axBMBbFS', 'admin', '2024-05-27 14:16:49'),
(13, 88320918, 'zzzz', '$2y$10$N.qnbql92N3UaDvyMPS33uYzJpMXtszHIOBFBras11QhGYOgNueNC', 'admin', '2024-06-02 19:25:33');

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
-- Indexes for table `signature_dish`
--
ALTER TABLE `signature_dish`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signature_dish`
--
ALTER TABLE `signature_dish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
