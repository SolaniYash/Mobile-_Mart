-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 09:53 AM
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
-- Database: `mobilemart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'OnePlus');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phno` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(6) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `total_price` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `full_name`, `email`, `phno`, `address`, `country`, `state`, `zip`, `pay_mode`, `total_price`, `date`) VALUES
(1, 3, 'Vishwas Bhatt', 'bhattvishwas7@gmail.com', 2147483647, 'Pl. 141, Street No. 3, Royal Pushpa Park, Bh. Krishna School, Khodiyar Colony', 'India', 'Gujarat', 361006, 'Cash On Delivery', 288899, '2024-05-02'),
(3, 3, 'Vishwas Bhatt', 'bhattvishwas7@gmail.com', 2147483647, 'Pl. 141, Street No. 3, Royal Pushpa Park, Bh. Krishna School, Khodiyar Colony', 'India', 'Gujarat', 361006, 'Cash On Delivery', 243400, '2024-05-04'),
(4, 3, 'Vishwas Bhatt', 'bhattvishwas7@gmail.com', 2147483647, 'Pl. 141, Street No. 3, Royal Pushpa Park, Bh. Krishna School, Khodiyar Colony', 'India', 'Gujarat', 361006, 'Cash On Delivery', 139999, '2024-05-04'),
(5, 3, 'Harmisha Bhatt', 'bhattharmisha@gmail.com', 1234567890, 'Pl 141, St. No. 3, Royal Pushpa Park, Khodiyar Colony', 'India', 'Gujarat', 361006, 'Cash On Delivery', 148900, '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `uid`, `pid`, `image`, `name`, `price`, `qty`) VALUES
(4, 1, 3, 2, 's24ultra.jpg', 'Samsung S24 Ultra', 139999, 1),
(5, 1, 3, 3, 'iphone15promax.jpg', 'iPhone 15 Pro Max', 148900, 1),
(8, 3, 3, 7, 's23ultra.jpg', 'Samsung S23 Ultra', 94500, 1),
(9, 3, 3, 3, 'iphone15promax.jpg', 'iPhone 15 Pro Max', 148900, 1),
(10, 4, 3, 4, 'oneplus_open.jpg', 'OnePlus Open', 139999, 1),
(11, 5, 3, 3, 'iphone15promax.jpg', 'iPhone 15 Pro Max', 148900, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `brand_id` int(5) NOT NULL,
  `image` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `selling_price` float NOT NULL,
  `mrp` float NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `image`, `name`, `selling_price`, `mrp`, `description`) VALUES
(2, 1, 's24ultra.jpg', 'Samsung S24 Ultra', 139999, 144999, 'Hello World'),
(3, 2, 'iphone15promax.jpg', 'iPhone 15 Pro Max', 148900, 159900, 'iPhone 15 Pro Max has a strong and light aerospace grade titanium design with a textured matte glass back. It also features a Ceramic Shield front thats tougher than any smartphone glass. And its splash, water, and dust resistant.\r\n'),
(4, 3, 'oneplus_open.jpg', 'OnePlus Open', 139999, 149999, 'Processor Qulacomm Snapdragon 8 Gen 2 Platform Ray tracing enabled'),
(5, 1, 'zfold5.jpg', 'Samsung Z Fold-5', 164999, 189999, 'Do more than more with Multi View. Whether toggling between texts or catching up on emails, take full advantage of the expansive Main Screen with Multi View. PC-like power in your pocket transforms apps optimized with One UI to give you menus and more in a glance'),
(6, 1, 'zflip5.webp', 'Samsung Z Flip-5', 99999, 102999, 'Style and function that fits in your pocket. Its a pocket-sized statement piece. Small but mighty when folded, this phone is compact enough to fit in your palm, but leaves a big impression with sleek, hazy colors that match your vibe.'),
(7, 1, 's23ultra.jpg', 'Samsung S23 Ultra', 94500, 149999, 'CAPTURE THE NIGHT IN LOW LIGHT Whether you are headed to a concert or romantic night out, there no such thing as bad lighting with Night Mode Galaxy S23 Ultra lets you capture epic content in any setting with stunning Nightography'),
(8, 1, 's24.jpg', 'Samsung Galaxy S24', 79999, 84999, 'Easy to grip. Satisfying to hold. With their unified design and satin finish, Galaxy S24 feels as smooth as it looks.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phno`) VALUES
(2, 'Pratik Doshi', 'pratik', 'pratik@123', 'pratik@gmail.com', 1234567890),
(3, 'Vishwas Bhatt', 'Visu', 'Visu@1307', 'bhattvishwas7@gmail.com', 2147483647),
(4, 'maitri', 'maitri', '12345', 'maitri@gmail.com', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_ID` (`uid`),
  ADD KEY `FK_PRODUCT_ID` (`pid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USERS_ID` (`uid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ORDER_ID` (`order_id`),
  ADD KEY `FK_PRODUCTS_ID` (`pid`),
  ADD KEY `FK_USERS_OID` (`uid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BRAND_ID` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_PRODUCT_ID` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_USERS_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_ORDER_ID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRODUCTS_ID` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERS_OID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_BRAND_ID` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
