-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 12:44 PM
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
-- Database: `clothing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clothing_admin`
--

CREATE TABLE `clothing_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_username` varchar(10) NOT NULL,
  `role_id` int(5) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_date` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing_admin`
--

INSERT INTO `clothing_admin` (`admin_id`, `admin_username`, `role_id`, `admin_email`, `admin_password`, `status`, `created_date`, `updated_date`) VALUES
(20, 'sarthak', 0, 'patelsarthak666@gmail.com', 'kkk', 1, '0000-00-00 00:00:00.000000', '2024-02-21 19:20:07.3682');

-- --------------------------------------------------------

--
-- Table structure for table `clothing_category`
--

CREATE TABLE `clothing_category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `category_description` text NOT NULL,
  `category_thumb` varchar(400) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing_category`
--

INSERT INTO `clothing_category` (`category_id`, `category_title`, `category_description`, `category_thumb`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Men', 'Men Shoe', 'slide-twoww.jpg', 1, '2024-02-21 11:29:34', '2024-02-21 11:29:34'),
(2, 'Women', 'Women Shoes', 'slide-twoww.jpg', 1, '2024-02-21 11:30:26', '2024-02-21 11:30:26'),
(3, 'Kid', 'Kids Shoes', 'slide-twoww.jpg', 1, '2024-02-21 11:31:08', '2024-02-21 11:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `clothing_role`
--

CREATE TABLE `clothing_role` (
  `role_id` int(5) NOT NULL,
  `role_title` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing_role`
--

INSERT INTO `clothing_role` (`role_id`, `role_title`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Admin', 1, '2023-11-08 13:11:06', '2023-11-08 13:11:06'),
(2, 'DBA', 1, '2023-11-08 13:11:06', '2023-11-08 13:11:06'),
(3, 'Administrator', 1, '2023-11-08 13:11:06', '2023-11-08 13:11:06'),


-- --------------------------------------------------------

--
-- Table structure for table `clothing_sub_category`
--

CREATE TABLE `clothing_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_title` varchar(50) NOT NULL,
  `sub_category_description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing_sub_category`
--

INSERT INTO `clothing_sub_category` (`sub_category_id`, `category_id`, `sub_category_title`, `sub_category_description`, `status`, `created_date`, `updated_date`) VALUES
(1, 3, 'Kids-Sports', 'Sports Shoes for Kids', 1, '2024-02-21', '2024-02-21 12:00:09'),
(2, 3, 'Kids-SNKRS', 'Sneaker Shoes for Kids', 1, '2024-02-21', '2024-02-21 12:00:23'),
(3, 1, 'Men-SNKRS', 'Sneaker Shoes for Mens', 1, '2024-02-21', '2024-02-21 12:00:7'),
(4, 1, 'Men-Sports', 'Sports Shoes for Mens', 1, '2024-02-21', '2024-02-21 12:00:2'),
(5, 1, 'Men-Jordans', 'Jordan Shoes for Mens', 1, '2024-02-21', '2024-02-21 12:01:17'),
(6, 2, 'Women-Sports', 'Sports Shoes for Womens', 1, '2024-02-21', '2024-02-21 12:01:2'),
(7, 2, 'Women-SNKRS', 'Sneaker Shoes for Womens', 1, '2024-02-21', '2024-02-21 12:01:3');

-- --------------------------------------------------------

--
-- Table structure for table `clothing_user`
--

CREATE TABLE `clothing_user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` int(30) NOT NULL,
  `contact_no` int(12) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothing_user`
--

INSERT INTO `clothing_user` (`user_id`, `username`, `user_email`, `user_password`, `status`, `created_date`, `updated_date`, `address`, `contact_no`, `gender`) VALUES
(17, 'sarthak', 'patelsarthak176@gmail.com', 'kkk', 1, '2024-02-07 04:03:39', '2024-02-07 04:03:39', 0, 0, ''),
(18, 'asmin123', 'sarthakpatel666@gmail.com', 'kkk', 1, '2024-02-16 14:26:39', '2024-02-16 14:26:39', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_thumb` varchar(400) NOT NULL,
  `product_images` varchar(400) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_price` varchar(7) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_title`, `product_thumb`, `product_images`, `product_description`, `product_price`, `product_quantity`, `status`, `created_date`, `updated_date`) VALUES
(104, 1, 2, 'Nike SB Force 58', 'product-one.png', 'product-1-detail-img1.png,product-1-detail-img2.png,product-1-detail-img3.png,size-chart.jpg', '', '6295.0', 100, 1, '2024-02-21', '2024-02-21 15:2:13'),
(105, 1, 2, 'Nike Air Max Plus', 'product-two.png', 'product-2-detail-img1.png,product-2-detail-img2.jpg,product-2-detail-img3.png,size-chart.jpg', '', '14995.0', 100, 1, '2024-02-21', '2024-02-21 15:44:12'),
(106, 1, 3, 'Nike Air max solo', 'product-three.png', 'product-3-detail-img1.png,product-3-detail-img2.png,product-3-detail-img3.png,size-chart.jpg', '', '8695.0', 100, 1, '2024-02-21', '2024-02-21 15:4:52'),
(107, 3, 1, 'Nike Air max plus drift', 'product-four.png', 'product-4-detail-img1.png,product-4-detail-img2.png,product-4-detail-img3.png,size-chart.jpg', '', '16295.0', 100, 1, '2024-02-21', '2024-02-21 15:7:06'),
(108, 1, 4, 'Jumpman MVP', 'product-five.png', 'product-5-detail-img1.png,product-5-detail-img2.png,product-5-detail-img3.png,size-chart.jpg', '', '15295', 4, 1, '2024-02-21', '2024-02-21 15:48:42'),
(109, 1, 4, 'Jordan Stay Loyal 3', 'product-six.png', 'product-6-detail-img1.png,product-6-detail-img2.png,product-6-detail-img3.png,size-chart.jpg', '', '10295.0', 2, 1, '2024-02-21', '2024-02-21 15:49:51'),
(110, 2, 5, 'Nike Downshifter', 'product-seven.png', 'product-7-detail-img1.png,product-7-detail-img2.png,product-7-detail-img3.png,size-chart.jpg', '', '4295.0', 78, 1, '2024-02-21', '2024-02-21 15:52:32'),
(111, 3, 6, 'Tautam 1 Home Team', 'product-eight.png', 'product-8-detail-img1.png,product-8-detail-img2.jpg,product-8-detail-img3.jpg,size-chart.jpg', '', '10395.0', 67, 1, '2024-02-21', '2024-02-21 15:54:16'),
(112, 1, 3, 'Luka 2 Caves', 'product-nine.png', 'product-9-detail-img1.png,product-9-detail-img2.jpg,product-9-detail-img3.jpg,size-chart.jpg', '', '12795.0', 6, 1, '2024-02-21', '2024-02-21 15:1:47'),
(113, 1, 4, 'Air Jordan 1 High G', 'product-ten.png', 'product-10-detail-img1.png,product-10-detail-img2.jpg,product-10-detail-img3.png,size-chart.jpg', '', '16995.0', 9, 1, '2024-02-21', '2024-02-21 15:3:39'),
(114, 2, 7, 'Nike Air Max SC', 'product-eleven.png', 'product-11-detail-img1.png,product-11-detail-img2.png,product-11-detail-img3.png,size-chart.jpg', '', '7095.0', 2, 1, '2024-02-21', '2024-02-21 15:58:6'),
(116, 3, 1, 'Nike Revolution 6', 'product-tweleve.png', 'product-12-detail-img1.png,product-12-detail-img2.jpg,product-12-detail-img3.png,size-chart.jpg', '', '3698.0', 65, 1, '2024-02-21', '2024-02-21 16:00:05'),
(117, 1, 3, 'Nike MC Trainer 2', 'product-thirteen.png', 'product-13-detail-img1.png,product-13-detail-img2.png,product-13-detail-img3.png,size-chart.jpg', '', '269.0', 23, 1, '2024-02-21', '2024-02-21 16:02:17'),
(118, 2, 5, 'Nike Flex Experienced Run 12 ', 'product-fourteen.png', 'product-14-detail-img1.png,product-14-detail-img2.jpg,product-14-detail-img3.jpg,size-chart.jpg', '', '4995.0', 15, 1, '2024-02-21', '2024-02-21 16:03:21'),
(119, 3, 1, 'GT Jump 2 ASW EP', 'product-fifteen.png', 'product-15-detail-img1.png,product-15-detail-img2.jpg,product-15-detail-img3.jpg,size-chart.jpg', '', '17995.0', 10, 1, '2024-02-21', '2024-02-21 16:04:29'),
(120, 1, 3, 'Flyby Mid 3', 'product-sixteen.png', 'product-16-detail-img1.png,product-16-detail-img2.png,product-16-detail-img3.png,size-chart.jpg', '', '4995.0', 54, 1, '2024-02-21', '2024-02-21 16:05:22'),
(121, 3, 6, 'nikeeeee', 'istockphoto-1337191336-612x612 (1).png', 'item-cart-one.jpg,item-cart-two.jpg,limited-two.png,product-1-detail-img1.png', 'hello', '50000', 4000, 1, '2024-02-21', '2024-02-21 20:24:7'),
(122, 3, 6, 'nikeeeee', 'istockphoto-1337191336-612x612 (1).png', 'item-cart-one.jpg,item-cart-two.jpg,limited-two.png,product-1-detail-img1.png', 'asukdujsahuylid.udas', '50000', 4000, 1, '2024-02-21', '2024-02-21 20:27:4');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `product_price` int(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `product_id`, `user_id`, `quantity`, `product_price`, `status`, `created_date`, `updated_date`) VALUES
(12, 106, 17, 3, 8695, 1, '2024-02-21 10:49:31', '2024-02-21 14:29:50'),
(17, 116, 17, 1, 3698, 1, '2024-02-21 14:36:10', '2024-02-21 14:36:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothing_admin`
--
ALTER TABLE `clothing_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clothing_category`
--
ALTER TABLE `clothing_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clothing_role`
--
ALTER TABLE `clothing_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `clothing_sub_category`
--
ALTER TABLE `clothing_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `clothing_user`
--
ALTER TABLE `clothing_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothing_admin`
--
ALTER TABLE `clothing_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `clothing_category`
--
ALTER TABLE `clothing_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `clothing_role`
--
ALTER TABLE `clothing_role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `clothing_sub_category`
--
ALTER TABLE `clothing_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `clothing_user`
--
ALTER TABLE `clothing_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
