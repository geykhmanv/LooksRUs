-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 02:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `looksrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(11) NOT NULL,
  `PASSWORD` varchar(11) NOT NULL,
  `LOGGED_IN` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`ID`, `USERNAME`, `PASSWORD`, `LOGGED_IN`) VALUES
(1, 'admin', 'admin', 0),
(9, 'vika99', '1234', 1),
(10, 'nick96', 'hello1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ITEM_ID` int(25) NOT NULL,
  `ITEM_NAME` varchar(25) NOT NULL,
  `ITEM_CAT` varchar(25) NOT NULL,
  `ITEM_PRICE` decimal(10,0) NOT NULL,
  `ITEM_IMG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ITEM_ID`, `ITEM_NAME`, `ITEM_CAT`, `ITEM_PRICE`, `ITEM_IMG`) VALUES
(1, 'Green V-Neck', 'Men-Shirts', '25', 'images/clothing/GreenVNeck_M.jpg'),
(2, 'Blue Jeans', 'Men-Bottoms', '222', 'images/clothing/BlueJeans_M.jpg'),
(3, 'Brown Suit Jacket', 'Men-Jackets', '50', 'images/clothing/BrownSuitJacket_M.jpg'),
(4, 'Khaki Pants', 'Men-Bottoms', '40', 'images/clothing/KhakiPants_M.jpg'),
(5, 'Black Trousers', 'Men-Bottoms', '50', 'images/clothing/BlackTrousers_M.jpg'),
(6, 'Blue Dress Shirt', 'Men-Shirts', '30', 'images/clothing/BlueDressShirt_M.jpg'),
(7, 'Black Polo ', 'Men-Shirts', '20', 'images/clothing/BlackPolo_M.jpg'),
(8, 'Black Jacket', 'Men-Jackets', '60', 'images/clothing/BlackJacket_M.jpg'),
(9, 'Khaki Jacket', 'Men-Jackets', '55', 'images/clothing/KhakiJacket_M.jpg'),
(10, 'Brown Dress Shoes', 'Men-Shoes', '70', 'images/clothing/BrownDressShoes_M.jpg'),
(11, 'Black Boots', 'Men-Shoes', '80', 'images/clothing/BlackBoot_M.jpg'),
(12, 'Black Sneakers', 'Men-Shoes', '45', 'images/clothing/BlackSneakers_M.jpg'),
(13, 'Striped Trousers', 'Women-Bottoms', '60', 'images/clothing/StripedTrousers_W.jpg'),
(14, 'Blue Jeans', 'Women-Bottoms', '40', 'images/clothing/BlueJeans_W.jpg'),
(15, 'Pencil Skirt', 'Women-Bottoms', '55', 'images/clothing/PencilSkirt_W.jpg'),
(16, 'Yellow T-Shirt', 'Women-Tops', '20', 'images/clothing/YellowShirt_W.jpg'),
(17, 'Red Shirt', 'Women-Tops', '30', 'images/clothing/RedShirt_W.jpg'),
(18, 'Green Blouse', 'Women-Tops', '40', 'images/clothing/GreenBlouse_W.jpg'),
(19, 'Grey Dress', 'Women-Dresses', '60', 'images/clothing/GreyDress_W.jpg'),
(20, 'Blue Dress', 'Women-Dresses', '70', 'images/clothing/BlueDress_W.jpg'),
(21, 'Black Dress', 'Women-Dresses', '70', 'images/clothing/BlackDress_W.jpg'),
(22, 'Gold Flat', 'Women-Shoes', '30', 'images/clothing/GoldFlat_W.jpg'),
(23, 'Black Pumps', 'Women-Shoes', '65', 'images/clothing/BlackPumps_W.jpg'),
(24, 'Brown Loafer', 'Women-Shoes', '55', 'images/clothing/BrownLoafer_W.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `ID` int(11) NOT NULL,
  `CART_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) NOT NULL,
  `SIZE` varchar(6) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`ID`, `CART_ID`, `ITEM_ID`, `SIZE`, `QUANTITY`) VALUES
(1, 1, 13, 'M', 2),
(2, 1, 20, 'L', 4),
(49, 9, 11, 'XL', 2),
(50, 9, 9, 'S', 1),
(53, 9, 15, 'S', 1),
(54, 9, 15, 'S', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ITEM_ID`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ITEM_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

GRANT SELECT, INSERT, DELETE, UPDATE
ON looksrus.*
TO look_manager@localhost
IDENTIFIED BY 'looksrus2020';





/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
