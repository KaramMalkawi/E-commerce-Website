-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 11:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `phone`, `gender`) VALUES
(1, 'karam', '123', 'karam@gmail.com', '0797767312', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `img1`, `img2`, `img3`, `img4`) VALUES
(2, 'iphone 13', '1000.00', 'The iPhone 13 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'iphone 13/iphone13pro-digitalmat-gallery-3-202111.png', 'iphone 13/iphone13pro-digitalmat-gallery-2-202111.png', 'iphone 13/iphone13pro-digitalmat-gallery-4-202111.jpg', 'iphone 13/iphone13pro-digitalmat-gallery-5-202111.png'),
(3, 'iPhone 12', '900.00', 'The iPhone 13 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'iphone 12\\iphone12-digitalmat-gallery-2-202111.png', 'iphone 12\\iphone12-digitalmat-gallery-3-202111_GEO_US.png', 'iphone 12\\iphone12-digitalmat-gallery-4-202111.png', 'iphone 12\\iphone12-digitalmat-gallery-5-202111.png'),
(4, 'iPhone 11', '800.00', 'The iPhone 11 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'iphone 11\\iphone11-digitalmat-gallery-2-202111.png', 'iphone 11\\iphone11-digitalmat-gallery-3-202111.png', 'iphone 11\\iphone11-digitalmat-gallery-4-202111.png', 'iphone 11\\iphone11-digitalmat-gallery-5-202111.png'),
(6, 'Huawei Nova 9', '850.00', 'The Huawei nova 9 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'Huawei nova 9\\huawei_nova_9_128gb_8gb_starry_blue-1_364.jpg', 'Huawei nova 9\\huawei_nova_9_128gb_8gb_starry_blue-2_364.jpg', 'Huawei nova 9\\huawei_nova_9_128gb_8gb_starry_blue-5_364.jpg', 'Huawei nova 9\\huawei_nova_9_128gb_8gb_starry_blue_364.jpg'),
(7, 'Huawei Nova 7', '850.00', 'The Huawei nova 7 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'Huawei Nova 7\\Huawei-Nova-7-Silver-eBuy.jo-2-364.jpg', 'Huawei Nova 7\\Huawei-Nova-7-Silver-eBuy.jo-3-364.jpg', 'Huawei Nova 7\\Huawei-Nova-7-Silver-eBuy.jo-1-364.jpg', NULL),
(8, 'Samsung Galaxy Note 20 Ultra', '950.00', 'The Huawei nova 7 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 5.42 inches diagonally', 'Samsung Galaxy Note 20 Ultra\\Samsung-Galaxy-Note-20-Ultra-Bronze-eBuy.jo-1-364.jpg', 'Samsung Galaxy Note 20 Ultra\\Samsung-Galaxy-Note-20-Ultra-Bronze-eBuy.jo-3-364.jpg', 'Samsung Galaxy Note 20 Ultra\\Samsung-Galaxy-Note-20-Ultra-Bronze-eBuy.jo-2-364.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `items_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `items_id`) VALUES
(1, 1, 3),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `cardname` varchar(255) DEFAULT NULL,
  `cardnumber` varchar(255) DEFAULT NULL,
  `expmonth` varchar(255) DEFAULT NULL,
  `expyear` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `items_id` (`items_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
