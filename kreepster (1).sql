-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2015 at 05:23 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kreepster`
--
CREATE DATABASE IF NOT EXISTS `kreepster` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kreepster`;

-- --------------------------------------------------------

--
-- Table structure for table `PictureTables`
--
-- Creation: Nov 11, 2015 at 01:54 PM
--

DROP TABLE IF EXISTS `PictureTables`;
CREATE TABLE IF NOT EXISTS `PictureTables` (
  `PictureID` bigint(50) NOT NULL AUTO_INCREMENT,
  `UserID` bigint(50) NOT NULL,
  `KreepCount` bigint(50) DEFAULT NULL,
  `BeautyCount` bigint(50) DEFAULT NULL,
  `PictureURL` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Latitude` decimal(10,0) DEFAULT NULL,
  `Longitude` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`PictureID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserPictures`
--
-- Creation: Nov 14, 2015 at 12:23 PM
--

DROP TABLE IF EXISTS `UserPictures`;
CREATE TABLE IF NOT EXISTS `UserPictures` (
  `UserPictureID` bigint(50) NOT NULL AUTO_INCREMENT,
  `UserID` bigint(50) NOT NULL,
  `PictureID` bigint(50) NOT NULL,
  `userAction` smallint(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`UserPictureID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserTables`
--
-- Creation: Nov 14, 2015 at 12:20 PM
--

DROP TABLE IF EXISTS `UserTables`;
CREATE TABLE IF NOT EXISTS `UserTables` (
  `UserID` bigint(50) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `DeviceType` varchar(10) CHARACTER SET latin1 NOT NULL,
  `DeviceID` varchar(50) CHARACTER SET latin1 NOT NULL,
  `LoginType` varchar(15) CHARACTER SET latin1 NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `MobileNumber` int(20) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
