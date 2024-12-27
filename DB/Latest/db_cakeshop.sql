-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(9, 'Aanjala Albert', 'aanjala@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_amount` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `user_id`) VALUES
(30, '2024-12-27', 1, '50.00', 16),
(31, '2024-12-27', 1, '650.00', 15),
(32, '2024-12-27', 1, '50.00', 16),
(33, '2024-12-27', 1, '50.00', 16),
(34, '2024-12-27', 1, '50.00', 0),
(35, '2024-12-27', 4, '50.00', 16),
(36, '0000-00-00', 0, '', 16),
(37, '2024-12-27', 2, '650.00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) DEFAULT 1,
  `cart_status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `cart_status`, `product_id`, `booking_id`) VALUES
(34, 3, 1, 25, 29),
(35, 1, 5, 26, 30),
(36, 4, 2, 27, 30),
(37, 1, 1, 26, 31),
(39, 5, 1, 28, 32),
(40, 4, 2, 28, 33),
(41, 1, 1, 27, 34),
(42, 1, 2, 27, 35),
(43, 1, 0, 27, 36),
(44, 1, 2, 32, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(15, 'Pastry'),
(16, 'pancakes'),
(17, 'Donut'),
(18, 'cake'),
(19, 'Biscuits'),
(20, 'Muffins'),
(22, ' Pies'),
(23, 'Bread roll'),
(24, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL DEFAULT 'Not Yet Replyed',
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `complaint_date`, `complaint_reply`, `user_id`, `complaint_status`, `booking_id`) VALUES
(10, 3, 'sfsdgsg', '2024-12-27', 'Not Yet Replyed', 16, 0, 30),
(11, 4, 'fhkoo', '2024-12-27', 'Not Yet Replyed', 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(2, 'No adequate Quality'),
(3, 'Lately Delivered'),
(4, 'Bad serive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customization`
--

CREATE TABLE `tbl_customization` (
  `customization_id` int(11) NOT NULL,
  `customization_date` varchar(50) NOT NULL,
  `customization_photo` varchar(500) NOT NULL,
  `customization_details` varchar(50) NOT NULL,
  `customization_todate` varchar(50) NOT NULL,
  `customization_address` varchar(50) NOT NULL,
  `customization_contact` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customization_quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customization`
--

INSERT INTO `tbl_customization` (`customization_id`, `customization_date`, `customization_photo`, `customization_details`, `customization_todate`, `customization_address`, `customization_contact`, `product_id`, `user_id`, `customization_quantity`) VALUES
(19, '2024-12-13', 'OIP (1).jpeg', 'Including in chesse', '2024-12-26', 'Annaparambil(house)', '9033277091', 26, 15, '1kg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(18, 'Ernakulam'),
(19, 'Alappuzha'),
(20, 'Kottayam'),
(21, 'Kollam'),
(22, 'Trivandrum'),
(23, 'Thrissur'),
(24, 'Idukki'),
(25, 'Malapuram'),
(26, 'Kozhikode'),
(27, 'Wayanad'),
(28, 'Kannur'),
(29, 'Kasargod'),
(30, 'Palakkad'),
(31, 'Pathanamthitta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(26, 'Thripunnithara', '3565822', 18),
(29, 'Kakkanad', '642225', 18),
(30, 'Vyttila', '355885', 18),
(31, 'Pallikara', '876660', 18),
(32, 'Perumbavoor', '986600', 18),
(33, 'Chaghanaserry', '725250', 19),
(34, 'Cherthala', '489633', 19),
(35, ' Haripad', '854220', 19),
(36, 'Mavelikkara', '307756', 19),
(37, 'Aroor', '785202', 19),
(38, 'Kayamkulam', '120055', 19),
(39, 'kochi', '682011', 18),
(40, 'Aluva', '56899', 18),
(41, ' Thuravoor', '457776', 19),
(43, 'Erattupetta', '702544', 20),
(44, 'Vaikom', '425220', 20),
(45, 'Ettumanoor', '954520', 20),
(46, 'Pala', '9631520', 20),
(47, ' Athirampuzha', '3001455', 20),
(48, 'Puthupally', '501895', 20),
(49, 'Kaduthuruthy', '621004', 20),
(50, ' Adinad', '785665', 21),
(51, 'Chavara', '327895', 21),
(52, 'Eravipuram', '585222', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_photo` varchar(50) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_photo`, `seller_id`, `subcategory_id`, `type_id`) VALUES
(26, 'Red Velvet Cake', 'Red velvet cake is traditionally a red, crimson, or scarlet-colored layer cake, layered with ermine icing. Traditional recipes do not use food coloring, with the red color possibly due to non-Dutched,', '800', 'th.jpeg', 27, 29, 14),
(27, 'Jam Biscuit', 'Jam Biscuits are delicious soft cookies made by blending flour, butter, flavours & custard powder with yogurt & baking it after garnishing with jam', '50', 'd89e25353d875d85def4d167b828031c.jpg', 27, 34, 14),
(28, 'Chocolate Biscuit', 'A chocolate biscuit is a biscuit which is covered in chocolate, or which has been made by replacing some of the flour with cocoa powder', '50', 'OIP (1).jpg', 27, 36, 15),
(29, 'Banana Chocolate Chip Crumb Muffins', 'These muffins are light and moist, loaded with banana flavor, lightly dotted with mini chocolate chips', '80', 'OIP (2).jpg', 29, 38, 15),
(30, 'Sour Cherry Chocolate Chunk Muffins', 'These cherry chocolate chip muffins are soft and fluffy, loaded with fresh juicy cherries, and packed with mini chocolate chips', '100', 'OIP (3).jpg', 29, 39, 15),
(31, 'Chocolate Donut', 'These chocolate donuts have a crackly, craggy exterior that’s perfect for catching glaze, and a tender, moist inside that’s rich and chocolatey', '150', 'mmm.jpeg', 29, 25, 16),
(32, 'Chocalate Turffle', 'A chocolate truffle is a French chocolate confectionery traditionally made with a chocolate ganache center and coated in cocoa powder, coconut, or chopped nuts ', '650', 'chocolate-birthday-cake-png-image.png', 31, 31, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `request_details` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(20) NOT NULL,
  `request_bill` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirement`
--

CREATE TABLE `tbl_requirement` (
  `requirement_id` int(11) NOT NULL,
  `requirement_date` date NOT NULL,
  `requirement_address` varchar(50) NOT NULL,
  `requirement_contact` varchar(50) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requirement`
--

INSERT INTO `tbl_requirement` (`requirement_id`, `requirement_date`, `requirement_address`, `requirement_contact`, `booking_id`) VALUES
(5, '2024-11-15', 'Chullikaparambil(house)', '6247016005', 30),
(6, '2024-12-11', 'fdsfdsfsd', '8945566000', 32),
(7, '2025-01-08', 'njhuy', '6799980044', 35),
(8, '2025-01-06', 'Lsqhwdjd', '9035545217', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_datetime`, `product_id`) VALUES
(7, 'Athulya', '5', 'fdfdfdssds', '2024-12-27 10:35:36', 0),
(8, 'Athulya', '5', 'dewdfsdfs', '2024-12-27 10:55:51', 0),
(9, 'Athulya', '5', 'fsdfsdf', '2024-12-27 10:56:28', 27),
(10, 'Athulya', '5', 'dcsdfsdffsd', '2024-12-27 11:49:21', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_gender` varchar(50) NOT NULL,
  `seller_dob` varchar(50) NOT NULL,
  `seller_contact` varchar(50) NOT NULL,
  `seller_address` varchar(50) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_password` varchar(50) NOT NULL,
  `seller_photo` varchar(500) NOT NULL,
  `seller_proof` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `seller_status` int(11) NOT NULL DEFAULT 0,
  `seller_squestion` varchar(50) NOT NULL,
  `seller_sanswer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_gender`, `seller_dob`, `seller_contact`, `seller_address`, `seller_email`, `seller_password`, `seller_photo`, `seller_proof`, `place_id`, `seller_status`, `seller_squestion`, `seller_sanswer`) VALUES
(27, 'Alan sebastin', 'Male', '06-12-2001', '9640057852', 'Devabhavanam(house) Kochi', 'alansebastin4354@gmail.com', 'Alan@2001', 'OIP (6).jpeg', 'download (3).jpeg', 39, 1, 'What is your favourite movie?', 'Haripotter'),
(28, 'Jeeva  santhosh', 'Male', '14-11-2001', '9855248017', 'Chullikalparambil(house)', 'jeevas9098@gmail.com', 'Jeeva@3155', 'OIP (4).jpeg', 'OIP (5).jpeg', 26, 0, 'What is your favourite color?', 'Red'),
(29, 'Manu M', 'Male', '13-09-1990', '6214778045', 'Chakaraparambil(house)', 'manu46@gmail.com', 'Manu%9878', 'images.jpg', 'OIP (5).jpeg', 36, 1, 'What is your favourite movie?', 'Spiderman'),
(30, 'Preshanth', 'Male', '03-04-1998', '7800314872', 'Pullathara(house)', 'preshanthgp6744@gmail.com', 'Preshanth@1445', 'images (1).jpg', 'download (3).jpeg', 38, 1, 'What is your favourite movie?', 'Chicken Fried Rice'),
(31, 'Abi', 'Male', '06-08-1999', '7542520052', 'Kallathil house', 'abimon@98909', 'Abi@1234', 'Screenshot (38).png', 'Screenshot (44).png', 29, 1, 'What is your favourite movie?', 'Tom And Jerry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_qty` varchar(50) NOT NULL,
  `stock_date` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_qty`, `stock_date`, `product_id`) VALUES
(10, '250', '2024-11-05', 29),
(11, '300', '2024-11-05', 30),
(12, '500', '2024-11-05', 31),
(13, '200', '2024-11-05', 26),
(14, '100', '2024-11-05', 27),
(15, '500', '2024-11-05', 28),
(16, '10', '2024-12-27', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(15, ' Flaky', 15),
(16, 'shortcrust', 15),
(17, ' puff', 15),
(18, 'choux', 15),
(19, ' filo', 15),
(20, 'French crêpes', 16),
(21, ' Scotch pancakes', 16),
(22, 'Korean jeon', 16),
(23, 'Chocolate-stuffed pancakes', 16),
(24, 'American blueberry pancakes', 16),
(25, 'ring donut', 17),
(26, 'fried donut', 17),
(28, ' Jelly Donut ', 17),
(29, 'Red velvet', 18),
(30, 'Strawberry', 18),
(31, 'Chocolate', 18),
(33, 'Vanilla', 18),
(34, 'Jam ', 19),
(35, 'Cream ', 19),
(36, 'Chocolate', 19),
(37, 'Cokkies', 19),
(38, 'Banana Chocolate Chip Crumb Muffins', 20),
(39, 'Sour Cherry Chocolate Chunk Muffins', 20),
(40, 'Cheese Pizza', 24),
(41, 'Veg Pizza', 24),
(42, 'Chicken Pizza', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(12, 'Rectangle'),
(13, 'Square'),
(14, 'Circle'),
(15, 'Small'),
(16, 'Medium'),
(17, 'Star');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `User_gender` varchar(50) NOT NULL,
  `User_dob` varchar(50) NOT NULL,
  `User_contact` varchar(50) NOT NULL,
  `User_email` varchar(50) NOT NULL,
  `User_password` varchar(50) NOT NULL,
  `User_photo` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `User_address` varchar(50) NOT NULL,
  `user_squestion` varchar(50) NOT NULL,
  `user_sanswer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_id`, `User_name`, `User_gender`, `User_dob`, `User_contact`, `User_email`, `User_password`, `User_photo`, `place_id`, `User_address`, `user_squestion`, `user_sanswer`) VALUES
(14, 'Amala Jacob', 'Female', '12-09-2000', '9612507844  ', 'amalajacob23@gmail.com', 'Amala@8566', 'OIP.jpeg', 31, 'Chavarakattil(house) Pallikara', 'What is your favourite color?', 'Yellow'),
(15, 'Miya', 'Female', '08-04-1999', '7802595014', 'miyamol908@gamil.com', 'Miya@899', 'OIP (3).jpeg', 29, 'Amaravathi(house) Kakkanad', 'What is your favourite book?', 'The Great Gatsby'),
(16, 'Paul ', 'Male', '14-02-2003', '6247016005', 'paulmathew6555@gmail.com', 'Paul&234', 'OIP (2).jpeg', 37, 'Chullikaparambil(house)', 'What is your favourite movie?', 'Noodles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  ADD PRIMARY KEY (`customization_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_requirement`
--
ALTER TABLE `tbl_requirement`
  ADD PRIMARY KEY (`requirement_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  MODIFY `customization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_requirement`
--
ALTER TABLE `tbl_requirement`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
