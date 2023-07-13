-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 05:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suppliers`
--

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `MaterialID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `MaterialName` varchar(30) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`MaterialID`, `SupplierID`, `MaterialName`, `Stock`) VALUES
(1, 2, 'plastic bottle', 20),
(2, 2, 'vanilla fragrance', 10),
(3, 2, 'jasmine fragrance', 5),
(4, 2, 'coffee fragrance', 5),
(5, 3, 'stick rotan', 20),
(6, 4, 'artificial flower', 30),
(7, 5, 'logo sticker', 100),
(8, 6, 'packaging sticker', 100),
(9, 7, 'thank you card', 70),
(10, 8, 'sticker freebies', 100),
(11, 9, 'shredded paper', 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` text NOT NULL,
  `Link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierName`, `Link`) VALUES
(1, 'sentral_box', 'https://shope.ee/7Ufk13CplZ'),
(2, 'wwen_shop', 'https://shope.ee/5fE5pmqFAO'),
(3, 'haritastore', 'https://shope.ee/AUJLbGJF0y'),
(4, 'my_stylee', 'https://shope.ee/5KbFRp6MJk'),
(5, 'miniglamm.id', 'https://shope.ee/20KnTol9lp'),
(6, 'remboprintingstore', 'https://shope.ee/7KMJpikQam'),
(7, 'citramandaka', 'https://shope.ee/7A2tdQp7vk'),
(8, 'tacandra_shop', 'https://shope.ee/8erhQDzrcH'),
(9, 'blummy.deco', 'https://shope.ee/3AWksAF7b7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`MaterialID`,`SupplierID`,`MaterialName`,`Stock`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
