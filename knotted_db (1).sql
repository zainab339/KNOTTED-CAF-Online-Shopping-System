-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 18, 2024 at 10:43 PM
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
-- Database: `knotted_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL COMMENT 'Counter',
  `productID` int(11) NOT NULL COMMENT 'Product ID in the Products table',
  `milkType` enum('Regular','Almond','Oat') DEFAULT NULL COMMENT 'Type of milk added (only in coffee products category)',
  `quantity` int(11) NOT NULL COMMENT 'Required quantity',
  `userID` int(11) NOT NULL COMMENT 'The user ID in the Users table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL COMMENT 'counter',
  `Name` varchar(30) NOT NULL COMMENT 'Sender:Full Name',
  `Email` varchar(40) NOT NULL COMMENT 'Sender:Email',
  `Phone` varchar(20) NOT NULL COMMENT 'Sender:Phone',
  `Subject` varchar(20) NOT NULL COMMENT 'Subject',
  `Message` text DEFAULT NULL COMMENT 'Message Content'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Message From ContactUs Page';

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL COMMENT 'First name',
  `Lname` varchar(50) NOT NULL COMMENT 'Last name',
  `Email` varchar(250) NOT NULL COMMENT 'E-mail',
  `EmailMeOffers` int(1) NOT NULL COMMENT '1 means that the customer wants to receive offers via email\r\n0 means the customer does not want it.',
  `Country` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `PaymentMethod` varchar(250) NOT NULL COMMENT 'Payment method used',
  `OrderSummary` text NOT NULL COMMENT 'Order Summary',
  `TotalAmount` decimal(10,2) NOT NULL COMMENT 'Total Amount'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL COMMENT 'counter',
  `productCategory` varchar(30) NOT NULL COMMENT 'Product category (Tea, Coffee or Sweet)',
  `productName` varchar(30) NOT NULL COMMENT 'product name',
  `productPIC` varchar(60) DEFAULT NULL COMMENT 'Product image',
  `productStock` int(11) DEFAULT NULL COMMENT 'Quantity available in stock',
  `productPrice` decimal(10,2) DEFAULT NULL COMMENT 'Product price',
  `productDescription` text DEFAULT NULL COMMENT 'Description of the product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productCategory`, `productName`, `productPIC`, `productStock`, `productPrice`, `productDescription`) VALUES
(1, 'Tea', 'Strawberry Yogurt Tea', 'Strawberry Yogurt Tea.jpg', 4, 14.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(2, 'Tea', 'Peach Lemon Tea', 'Peach Lemon Tea.jpg', 0, 16.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(3, 'Tea', 'Mango Yogurt Tea', 'Mango Yogurt Tea.jpg', 0, 23.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(4, 'Tea', 'Strawberry Jasmine Tea', 'Strawberry Jasmine Tea.jpg', 11, 21.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(5, 'Tea', 'Grapefruit Citrus Tea', 'Grapefruit Citrus Tea.jpg', 13, 15.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(6, 'Tea', 'Earl Grey Milk Tea', 'Earl Grey Milk Tea.jpg', 13, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(7, 'Coffee', 'Coffee Latte', 'Coffee Latte.jpg', 13, 9.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(8, 'Coffee', 'Cold Brew Latte', 'Cold Brew Latte.jpg', 7, 12.02, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(9, 'Coffee', 'Cinnamon Latte', 'Cinnamon Latte.jpg', 10, 12.50, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(10, 'Coffee', 'Vanilla Latte', 'Vanilla Latte.jpg', 13, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(11, 'Coffee', 'Iced Americano', 'Iced Americano.jpg', 13, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(12, 'Coffee', 'Caramel Macchiato', 'Caramel Macchiato.jpg', 13, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(13, 'Sweet', 'Choco Mousse Donut', 'Choco Mousse Donut.jpg', 9, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(14, 'Sweet', 'Earl Grey Donut', 'Earl Grey Donut.jpg', 11, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(15, 'Sweet', 'Strawberry Delight Donut', 'Strawberry Delight Donut.jpg', 11, 7.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(16, 'Sweet', 'Peanut Cream Donut', 'Peanut Cream Donut .jpg', 12, 6.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(17, 'Sweet', 'Whipped Cream Vanilla Cake', 'Whipped Cream Vanilla Cake.jpg', 13, 12.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n'),
(18, 'Sweet', 'Strawberry Mascarpone Donut', 'Strawberry Mascarpone Donut.jpg', 2, 8.00, 'Delicious Coffee Latte Prepared With Fine Coffee Beans\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL COMMENT 'counter',
  `userType` varchar(20) NOT NULL COMMENT 'Type of membership used => Customer(user) or supervisor(admin)',
  `userName` varchar(30) NOT NULL COMMENT 'Email',
  `userPassword` varchar(32) NOT NULL COMMENT 'user Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userType`, `userName`, `userPassword`) VALUES
(1, 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'user', 'user@mail.com', '4718370870ab3ef34e91943110fcc57e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Counter';

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'counter', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'counter', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'counter', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
