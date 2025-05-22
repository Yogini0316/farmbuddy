-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2013 at 03:49 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cropify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `total_cost` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `cart_id`, `prod_id`, `qty`, `total_cost`) VALUES
(45, 7, 29, 1, 250),
(44, 7, 30, 1, 3000),
(43, 7, 31, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `crop_name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `crop_name`) VALUES
(10, 'cotton'),
(8, 'Wheat'),
(3, 'Rice'),
(4, 'Millet'),
(5, 'Sugarcane'),
(9, 'Pomegranate'),
(11, 'pumpkin'),
(13, 'Mustard'),
(14, 'Groundnut'),
(15, 'Bulrush Millet'),
(16, 'Onion'),
(18, 'cucumber'),
(29, 'lady finger');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feedback_msg` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `amount` float NOT NULL,
  `order_status` varchar(200) DEFAULT 'Order_placed',
  `placed_date` timestamp NULL DEFAULT current_timestamp(),
  `delivery_address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `prod_id`, `qty`, `amount`, `order_status`, `placed_date`, `delivery_address`) VALUES
(1, 4, 1, 1, 120, 'Order_placed', '2021-08-07 08:54:06', 'Shirsuphal, \n Baramati\n 413102'),
(5, 10, 29, 1, 250, 'placed', '2013-01-22 03:15:36', 'Shubham LagadAt post kolgaon tal.shrigonda dist.ahmednagarAhmednagar413728Mob :0800 787 8524'),
(6, 10, 30, 1, 3000, 'placed', '2013-01-22 03:17:40', 'Shubham Lagad<br>At post kolgaon tal.shrigonda dist.ahmednagar<br>Ahmednagar<br>413728<br>Mob :0800 787 8524'),
(7, 10, 31, 1, 500, 'placed', '2013-01-22 03:18:49', 'Shubham Lagad<br>At post kolgaon tal.shrigonda dist.ahmednagar<br>Ahmednagar<br>413728<br>Mob :0800 787 8524');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float NOT NULL,
  `payment_mode` varchar(400) NOT NULL,
  `transaction_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subtitle` varchar(300) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `crop_id` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subtitle`, `type`, `price`, `crop_id`, `image`) VALUES
(31, 'JKHPH 178(Chilli)', 'seeds', 'seeds', 500, NULL, '31.jfif'),
(32, 'JKTH 447(Tomato)', 'seeds', 'seeds', 200, NULL, '32.jfif'),
(29, 'GS-10(Peas)', 'seeds', 'seeds', 250, NULL, '29.jfif'),
(25, 'Humic Acid', 'fertilizer', 'nutrients', 340, NULL, '25.jpg'),
(30, 'selection-101(Onion)', 'seeds', 'seeds', 3000, NULL, '30.jfif'),
(33, 'NAVINA(Brinjal)', 'seeds', 'seeds', 350, NULL, '33.jfif'),
(34, 'Roundup', 'Herbicides', 'protectors', 350, NULL, '34.jfif'),
(35, 'TARGA SUPER', 'Herbicides', 'protectors', 450, NULL, '35.jfif'),
(41, 'OMEGA', 'Herbicides', 'protectors', 650, NULL, '41.png'),
(40, 'Green-Mix', 'Herbicides', 'protectors', 200, NULL, '36.png'),
(42, 'Racer', 'Herbicides', 'protectors', 350, NULL, '42.png'),
(43, 'N:P:K 00:52:34', 'fertilizer', 'nutrients', 1500, NULL, '43.png'),
(44, 'N:P:K 00:00:50', 'fertilizer', 'nutrients', 1540, NULL, '44.png'),
(45, 'Ecomax', 'fertilizer', 'nutrients', 2000, NULL, '45.jpg'),
(47, 'hello', 'dcsvs', '', 850, NULL, '46.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `image_path` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE `sales_report` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `total_sales` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `search_tags`
--

CREATE TABLE `search_tags` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `tag_name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_tags`
--

INSERT INTO `search_tags` (`id`, `prod_id`, `tag_name`) VALUES
(26, 42, ''),
(27, 43, ''),
(28, 44, ''),
(29, 45, ''),
(30, 46, ''),
(31, 46, '');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `stocks_count` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `prod_id`, `stocks_count`) VALUES
(1, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `subtype`
--

CREATE TABLE `subtype` (
  `id` int(11) NOT NULL,
  `subtype` varchar(30) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtype`
--

INSERT INTO `subtype` (`id`, `subtype`, `type_id`) VALUES
(1, 'Herbicide', 2),
(2, 'Insecticides', 4),
(3, 'Fungicide', 5),
(4, 'Weedicide', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'seeds'),
(2, 'protectors'),
(3, 'nutrients'),
(4, 'protector'),
(5, 'pesticide');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mobile_number` bigint(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `signup_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mobile_number`, `email`, `password`, `name`, `address`, `state`, `city`, `pincode`, `signup_date`) VALUES
(10, 8007878524, 'shubhamlagad2000@gmail.com', '1234', 'Shubham Lagad', 'At post kolgaon tal.shrigonda dist.ahmednagar', 'maharashtra', 'Pune', 413728, '2022-01-13 06:53:37');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_cart` AFTER INSERT ON `user` FOR EACH ROW begin
insert into cart(user_id) values(new.id);
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crop_name` (`crop_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_tags`
--
ALTER TABLE `search_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtype`
--
ALTER TABLE `subtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_tags`
--
ALTER TABLE `search_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subtype`
--
ALTER TABLE `subtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
