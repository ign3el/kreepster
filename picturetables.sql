-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2015 at 03:14 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreepster`
--

-- --------------------------------------------------------

--
-- Table structure for table `PictureTables` --

CREATE TABLE IF NOT EXISTS `PictureTables` (
  `PictureID` bigint(50) NOT NULL,
  `UserID` bigint(50) NOT NULL,
  `KreepCount` bigint(50) DEFAULT NULL,
  `BeautyCount` bigint(50) DEFAULT NULL,
  `PictureURL` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Latitude` decimal(10,0) DEFAULT NULL,
  `Longitude` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PictureTables` --

INSERT INTO `PictureTables` (`PictureID`, `UserID`, `KreepCount`, `BeautyCount`, `PictureURL`, `Latitude`, `Longitude`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picturetables`
--
ALTER TABLE `PictureTables` ADD PRIMARY KEY (`PictureID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picturetables`
--
ALTER TABLE `PictureTables` MODIFY `PictureID` bigint(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
