-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 02:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodordersystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminsignup`
--

CREATE TABLE `adminsignup` (
  `id` int(11) NOT NULL,
  `adminUsername` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPhone` varchar(100) NOT NULL,
  `adminDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminsignup`
--

INSERT INTO `adminsignup` (`id`, `adminUsername`, `adminPassword`, `adminEmail`, `adminPhone`, `adminDescription`) VALUES
(5, 'Kawaii_YouMeng', 'admin123', 'admin5@gmail.com', '0155678900', 'Never gonna give you up\r\nNever gonna let you down\r\nNever gonna run around and desert you\r\n'),
(11, 'admin', 'Admin1', 'admin@gmail.com', '0125678900', '');

-- --------------------------------------------------------

--
-- Table structure for table `clientsignup`
--

CREATE TABLE `clientsignup` (
  `Id` int(11) NOT NULL,
  `clientUsername` varchar(255) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientEmail` varchar(255) NOT NULL,
  `clientPhone` varchar(255) NOT NULL,
  `clientAddress` varchar(255) NOT NULL,
  `clientState` varchar(255) NOT NULL,
  `clientCity` varchar(255) NOT NULL,
  `clientDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientsignup`
--

INSERT INTO `clientsignup` (`Id`, `clientUsername`, `clientPassword`, `clientEmail`, `clientPhone`, `clientAddress`, `clientState`, `clientCity`, `clientDescription`) VALUES
(9, 'Kawaii1', 'kawaii123', 'kawaii1@gmail.com', '123456789', '110,Jalan Food, Taman Food 81400', 'Johor', 'Senai', ''),
(10, 'Ruby', 'Ruby123', 'ruby@gmail.com', '2147483647', '404,Jalan Food, Taman Food 81000', 'Johor', 'Kulai', ''),
(11, 'Willian', 'Willian123', 'willian@gmail.com', '1234567801', '404,Jalan Food, Taman Food 55100', 'Kuala Lumpur', 'Wilayah Persekutuan Kuala Lumpur', ''),
(12, 'Izetta', 'Izetta123', 'izetta@gmail.com', '2147483647', '789,Jalan Food, Taman Food 25500', 'Kuantan', 'Pahang', ''),
(31, 'test123', 'Test1', '123@gmail.com', '0123456789', '123,test123,test123,12345', 'WP_Kuala_Lumpur', 'Istana Negara', 'LMAO~🥰 \r\nHello, I am test123~ \r\nI am a web developer, nice to meet you!');

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `orderID` int(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` varchar(100) NOT NULL,
  `quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`orderID`, `food_name`, `food_price`, `quantity`) VALUES
(28, 'Fried Chicken Drumstick', '3', '2'),
(31, 'Half Boiled Egg', '2.5', '1'),
(31, 'Milo', '2', '1'),
(32, 'Spaghetti', '10', '3'),
(32, '100 Plus', '1.5', '3'),
(33, 'Fried Chicken Drumstick', '3', '3'),
(33, 'Coke', '2', '3'),
(33, 'Cendol', '4', '2'),
(33, '100 Plus', '1.5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `client_order_manager`
--

CREATE TABLE `client_order_manager` (
  `orderID` int(100) NOT NULL,
  `orderDate` datetime NOT NULL,
  `clientUsername` varchar(100) NOT NULL,
  `clientEmail` varchar(100) NOT NULL,
  `clientPhone` varchar(100) NOT NULL,
  `deliveryAddress` varchar(250) NOT NULL,
  `payMode` varchar(250) NOT NULL,
  `orderStatus` varchar(100) NOT NULL,
  `grandTotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_order_manager`
--

INSERT INTO `client_order_manager` (`orderID`, `orderDate`, `clientUsername`, `clientEmail`, `clientPhone`, `deliveryAddress`, `payMode`, `orderStatus`, `grandTotal`) VALUES
(28, '2021-10-30 20:18:16', 'Kawaii1', 'kawaii1@gmail.com', '123456789', '110,Jalan Food, Taman Food 81400,Senai,Johor', 'COD', 'Delivered', '6'),
(31, '2021-10-30 20:34:02', 'Izetta', 'izetta@gmail.com', '2147483647', '789,Jalan Food, Taman Food 25500,Pahang,Kuantan', 'COD', 'Delivered', '4.5'),
(32, '2021-10-30 20:53:22', 'Ruby', 'ruby@gmail.com', '2147483647', '404,Jalan Food, Taman Food 81000,Kulai,Johor', 'COD', 'Ordered', '34.5'),
(33, '2021-11-02 15:46:21', 'Willian', 'willian@gmail.com', '1234567801', '404,Jalan Food, Taman Food 55100,Wilayah Persekutuan Kuala Lumpur,Kuala Lumpur', 'COD', 'Delivered', '24.5');

-- --------------------------------------------------------

--
-- Table structure for table `foodcategorylist`
--

CREATE TABLE `foodcategorylist` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryAvailable` varchar(100) NOT NULL,
  `foodCategoryImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodcategorylist`
--

INSERT INTO `foodcategorylist` (`id`, `categoryName`, `categoryAvailable`, `foodCategoryImage`) VALUES
(3, 'Breakfast', 'Yes', 'Breakfast.jpg'),
(4, 'Vegetarian ', 'Yes', 'Vegetarian.jpg'),
(6, 'Dinner', 'Yes', 'Dinner.jpg'),
(7, 'Chicken', 'Yes', 'Chicken.jpg'),
(8, 'Rice Dishes', 'Yes', 'Rice dishes.jpg'),
(9, 'Noodles', 'Yes', 'Noodles.jpg'),
(10, 'Seafood', 'Yes', 'Seafood.jpg'),
(11, 'Ice Cream', 'Yes', 'Ice cream.jpg'),
(12, 'Cakes, Cookies & Confections', 'Yes', 'Cakes Cookies  Confections.jpg'),
(13, 'Bakery', 'Yes', 'Bakery.jpg'),
(27, 'Dessert', 'Yes', 'Dessert.jpg'),
(30, 'Best Seller', 'Yes', 'Best seller.jpg'),
(31, 'Dim Sum & Toast', 'Yes', 'Dim sum and Toast.jpg'),
(33, 'Drinks', 'Yes', 'Drinks.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenulist`
--

CREATE TABLE `foodmenulist` (
  `id` int(100) NOT NULL,
  `foodName` varchar(100) NOT NULL,
  `foodDescription` varchar(100) NOT NULL,
  `foodCategory` varchar(100) NOT NULL,
  `foodPrice` varchar(100) NOT NULL,
  `foodAvailable` varchar(100) NOT NULL,
  `foodImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodmenulist`
--

INSERT INTO `foodmenulist` (`id`, `foodName`, `foodDescription`, `foodCategory`, `foodPrice`, `foodAvailable`, `foodImage`) VALUES
(1, 'Fried Chicken Drumstick', 'Crispy fried chicken drumsticks! ', 'Best Seller', '3.00', 'Yes', 'fried chicken drumstick.jpg'),
(2, 'French Fries', 'Fragrant and crispy french fries', 'Fast Food ', '2.50', 'Yes', 'french fries.jpg'),
(8, 'Half Boiled Egg', 'Half boiled egg with 2x egg', 'Breakfast', '2.50', 'Yes', 'Half boiled egg.jpg'),
(9, 'Cantonese Egg Tart', 'Cantonese egg tart with 2x tart', 'Dim Sum & Toast', '3.00', 'Yes', 'Cantonese egg tart.jpg'),
(11, 'Milo', 'Milo(Iced)', 'Drinks', '2.00', 'Yes', 'Milo(cold).jpg'),
(13, 'BBQ Chicken Bun', 'BBQ Chicken Bun -- 2/set', 'Dim Sum & Toast', '6.00', 'Yes', 'BBQ chicken bun.jpg'),
(14, 'Spaghetti', 'Must Try!', 'Noodles', '10.00', 'Yes', 'spaghetti.jpg'),
(15, 'Coke', '1 can/250ml', 'Best Seller', '2.00', 'Yes', 'coke.jpg'),
(16, '100 Plus', '100Plus 325ml/can', 'Drinks', '1.50', 'Yes', '100plus.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminsignup`
--
ALTER TABLE `adminsignup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientsignup`
--
ALTER TABLE `clientsignup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `client_order_manager`
--
ALTER TABLE `client_order_manager`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `foodcategorylist`
--
ALTER TABLE `foodcategorylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodmenulist`
--
ALTER TABLE `foodmenulist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminsignup`
--
ALTER TABLE `adminsignup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clientsignup`
--
ALTER TABLE `clientsignup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `client_order_manager`
--
ALTER TABLE `client_order_manager`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `foodcategorylist`
--
ALTER TABLE `foodcategorylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `foodmenulist`
--
ALTER TABLE `foodmenulist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
