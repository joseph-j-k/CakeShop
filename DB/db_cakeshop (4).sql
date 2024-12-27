-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 11:43 AM
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
(53, '2024-10-25', 1, '330.00', 12),
(54, '2024-10-25', 2, '330.00', 12);

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
(64, 3, 5, 24, 53),
(65, 1, 2, 25, 53),
(66, 1, 2, 24, 54),
(67, 1, 5, 25, 54);

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
(9, 'Cakes'),
(10, 'Pastry'),
(11, 'Cupcakes'),
(12, 'Donut'),
(14, 'cookies');

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
(1, 1, 'weeee', '2024-09-20', '', 5, 0, 0),
(2, 1, 'aszssdfc', '2024-09-20', '', 5, 0, 0),
(3, 1, 'dasdada', '2024-09-20', '', 5, 0, 0),
(4, 2, 'ccssd', '2024-09-20', 'dfsdf', 5, 1, 0),
(5, 3, 'sdfsdfsfssfds', '2024-09-20', 'friday', 5, 1, 0),
(6, 3, 'jwdwqqof', '2024-09-21', 'we will figure out it with in a fornat', 11, 1, 0),
(7, 3, 'vsvssvsvs', '2024-09-21', 'sdfsdfsdfs', 11, 1, 0),
(8, 4, 'zzxczdczc', '2024-09-21', 'ffsdfsffd', 11, 1, 0),
(9, 4, 'dyntuyi', '2024-09-21', 'Not Yet Replyed', 5, 0, 0),
(10, 2, 'asfasfas', '2024-10-25', 'Not Yet Replyed', 12, 0, 54);

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
(11, '2024-08-31', 'th (3).jpeg', 'Chesse cake ', '2024-09-07', 'Karikethu house haripad Alappuzha', '9877699854', 17, 6, '1'),
(13, '2024-09-19', 'pexels-tima-miroshnichenko-8376277.jpg', 'dsdfsdfsdffsdsdsdfsdfsfsf', '2024-09-17', 'Karikethu house haripad Alappuzha', '9877699854', 19, 0, '120'),
(14, '2024-09-19', 'pexels-tima-miroshnichenko-8376277.jpg', 'dasddscsdfsd', '2024-09-26', 'Karikethu house haripad Alappuzha', '9877699854', 17, 5, '55'),
(15, '2024-09-19', 'pexels-tima-miroshnichenko-8376277.jpg', 'include Cherry on the top of the cakes', '2024-09-26', 'Karikethu house haripad Alappuzha', '9877699854', 17, 5, '5'),
(16, '2024-09-21', 'Screenshot (38).png', 'gugyggyyhu', '2024-09-21', 'tjyyjhjkm', '6799980044', 17, 5, '1kg'),
(17, '2024-09-27', 'Screenshot (1).png', 'i want this in chocolate', '2024-07-12', 'boston city', '9947264618', 19, 11, '2kg'),
(18, '2024-09-30', 'Screenshot (2).png', 'gyqsqhj', '2024-10-04', 'boston city', '7736009251', 20, 11, '2kg');

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
(10, 'Ernakulam'),
(11, 'Alappuzha'),
(13, 'Kottayam'),
(14, 'Kollam'),
(15, 'Idukki'),
(16, 'Thiruvanathapuram'),
(17, 'Thrissur');

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
(15, 'kochi', '682011', 10),
(18, 'Haripad', '858900', 11),
(19, 'Pala', '459065', 13),
(20, ' Eravipuram', '691012', 14),
(21, 'Mattupetty Dam', '685602', 15),
(22, 'Chalakuddy', '680003', 17),
(23, 'Varkala', '685004', 16);

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
(17, 'Cakes', 'Cake is a flour confection made from flour, sugar, and other ingredients and is usually baked.', '900', 'th.jpeg', 20, 10, 9),
(19, 'Muffin', 'A muffin is a small bread - or cake -like baked food. ', '120', 'th (1).jpeg', 20, 12, 5),
(20, 'Sugar donut', 'Simple Sugar Donut - this easy dough is made with flour, milk, yeast, and sugar, then the donuts are fried and dredged in sugar', '100', 'th (2).jpeg', 20, 13, 8),
(22, 'Italian', 'When it comes to Italian pastries, there are many delicious options to choose from. However, one of the most popular and well-known Italian pastries is the cannoli', '900', 'OIP (1).jpeg', 17, 11, 6),
(23, '123', 'man', '1200', 'th (3).jpeg', 22, 13, 10),
(24, 'Raffles', 'Raffles', '230', 'logo-removebg-preview.png', 22, 10, 8),
(25, 'Pastry', 'sweet', '100', 'Screenshot (40).png', 22, 11, 8),
(26, 'cup cake', 'nice cake', '50', 'Screenshot (1).png', 22, 12, 5);

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
(1, '2024-10-04', 'boston city', '9947264618', 10),
(2, '2024-10-09', 'cvdvdfvd', 'fsdsff', 0),
(3, '2024-10-28', 'boston city', '9947264618', 0),
(4, '2024-10-29', 'boston city', '9947264618', 0),
(5, '2024-10-31', 'boston city', '9947264618', 53);

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
(1, 'ddas', '0', 'sfsfsfafafda', '2024-09-20 19:46:05', 24),
(2, 'we', '5', 'fdfgdd', '2024-09-20 19:46:55', 24),
(3, 'rt', '4', ' xcvcv', '2024-09-20 21:21:16', 24),
(4, 'Andrew', '0', 'jdffjefjlesfles;', '2024-09-21 10:31:06', 24),
(5, 'Athulya', '5', 'Good', '2024-09-21 11:54:53', 24),
(6, 'tony', '5', 'good', '2024-09-30 13:12:01', 24);

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
  `seller_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_gender`, `seller_dob`, `seller_contact`, `seller_address`, `seller_email`, `seller_password`, `seller_photo`, `seller_proof`, `place_id`, `seller_status`) VALUES
(22, 'Ananthu S', 'Male', '27/03/2002', '6500344212', 'Chullikal(House) Haripad ', 'ananthu155@gmail.com', '8888', 'OIP (4).jpeg', 'OIP (3).jpeg', 18, 1),
(23, 'Alan ', 'Male', '27/03/2000', '9077334174', 'Devavasam(House) Pala', 'alan455@gmail.com', '45500', 'OIP (5).jpeg', 'Salesperson-Employment-Agreement.png', 19, 2),
(24, 'Akhil K.P', 'Male', '05/09/1998', '85909087776', 'Pazhaganad(Hose) Kochi', 'akhilkp132@gmail.com', '9088', 'OIP (2).jpeg', 'Letter-Template-to-Car-Salesman-Free-Word-Editable.webp', 15, 2),
(25, 'Rohan', '', '2004-08-06', '9947264618', 'abcd(h)', 'rohan@gmail.com', 'Rohan@123', 'Screenshot (1).png', '', 15, 0),
(26, 'Peter Parker', 'Male', '2000-06-12', '7736009251', 'boston city', 'peter@gmail.com', 'Peter@123', 'Screenshot (1).png', 'Screenshot (2).png', 21, 0);

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
(2, '20', '2024-08-31', 17),
(3, '30', '2024-08-31', 19),
(4, '11', '2024-08-31', 20),
(6, '12', '2024-08-31', 22),
(7, '5', '2024-08-31', 23),
(8, '50', '2024-09-19', 24),
(9, '22', '2024-09-21', 25),
(10, '1000', '2024-10-18', 24),
(11, '1000', '2024-10-18', 25),
(12, '500', '2024-10-18', 26),
(13, '500', '2024-10-18', 26);

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
(10, 'Red Velvet', 9),
(11, 'White Chocolate', 10),
(12, 'Muffin', 11),
(14, 'paper', 9);

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
(5, 'Small'),
(6, 'Large'),
(8, 'Medium'),
(9, 'Rectangle'),
(10, 'Square');

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
(5, 'Athulya P.R', 'Female', '17/11/2004', '8977660451   ', 'Athulya@gmail.com', '1234', 'img4.jpg', 15, '', '', ''),
(6, 'Sandra', 'Female', '16/12/2004', '8977660451  ', 'sandra@gmail.com', '5678', 'download.jpeg', 18, '', '', ''),
(7, 'Athulya P.R', 'Female', '31/08/2001', '8977660451  ', 'Athulya12@gmail.com', '5678', 'OIP.jpeg', 19, '', '', ''),
(8, 'Athulya P.R', 'Male', '05/09/1998', '8977660451  ', 'Athulya12@gmail.com', '5678', 'download.jpeg', 15, '1600 Fake Street\r\nApartment 1', '', ''),
(9, 'Athulya P.R', 'Male', '05/09/1998', '8977660451  ', 'Athulya12@gmail.com', '5678', 'download.jpeg', 15, '1600 Fake Street\r\nApartment 1', '', ''),
(10, 'Athulya P.R', 'Male', '05/09/1998', '8977660451  ', 'Athulya12@gmail.com', '5678', 'download.jpeg', 15, '1600 Fake Street\r\nApartment 1', '', ''),
(11, 'Tony', 'Male', '09/04/2001', '8977660451  ', 'tony@gmail.com', 'tony@123', 'download.jpeg', 20, 'gaiaaaa', 'What is your favourite movie?', 'Ironman'),
(12, 'Tom Holland', 'Male', '26-08-2000', '7024194338', 'tom@gmail.com', 'Tomholland@123', 'Screenshot (1).png', 15, 'NewYork city', 'What is your favourite movie?', 'SpiderMan');

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  MODIFY `customization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_requirement`
--
ALTER TABLE `tbl_requirement`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
