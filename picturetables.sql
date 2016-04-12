-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2016 at 10:40 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kreepster`
--

-- --------------------------------------------------------

--
-- Table structure for table `PictureTables`
--

DROP TABLE IF EXISTS `PictureTables`;
CREATE TABLE IF NOT EXISTS `PictureTables` (
  `PictureID` bigint(50) NOT NULL AUTO_INCREMENT,
  `UserID` bigint(50) NOT NULL,
  `isVideo` tinyint(1) NOT NULL DEFAULT '0',
  `KreepCount` bigint(50) DEFAULT '0',
  `BeautyCount` bigint(50) DEFAULT '0',
  `PictureURL` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `TbnlURL` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Latitude` double NOT NULL DEFAULT '0',
  `Longitude` double NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  PRIMARY KEY (`PictureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `PictureTables`
--

INSERT INTO `PictureTables` (`PictureID`, `UserID`, `isVideo`, `KreepCount`, `BeautyCount`, `PictureURL`, `TbnlURL`, `Latitude`, `Longitude`, `created_at`, `updated_at`, `UserName`) VALUES
(2, 2, 1, 3, 4, 'images/2/1458197592502.409912.mov', NULL, 25.287993, 55.365977, '2016-03-17 10:53:36', '2016-03-29 06:45:05', '1159757900720358'),
(3, 2, 1, 3, 4, 'images/2/1458201944163.157959.mov', NULL, 25.287829, 55.366099, '2016-03-17 12:05:52', '2016-03-29 06:45:17', '1159757900720358'),
(4, 4, 1, 3, 4, 'images/4/1458215762511.491943.mov', NULL, 25.301416, 55.381129, '2016-03-17 15:56:09', '2016-03-29 06:45:23', 'koolahte'),
(9, 2, 1, 3, 3, 'images/2/1458457563764.708008.mov', NULL, 25.287698, 55.365876, '2016-03-20 11:06:29', '2016-03-29 06:45:37', '1159757900720358'),
(11, 3, 1, 6, 0, 'images/3/1458636268159.255859.mov', NULL, 25.239693, 55.316695, '2016-03-22 12:44:27', '2016-03-29 06:46:31', '10156720164715497'),
(13, 11, 0, 1, 4, 'images/11/1458754534682.229004.jpeg', NULL, 51.142685, -114.029667, '2016-03-23 21:35:31', '2016-03-29 06:45:59', '10153943762082152'),
(17, 3, 1, 1, 4, 'images/3/1459198463686.773926.mov', NULL, 25.208416, 55.274293, '2016-03-29 00:54:25', '2016-04-03 01:01:30', '10156720164715497'),
(18, 1, 1, 0, 5, 'images/1/1459200058581.328857.mov', NULL, 34.156791, -118.256505, '2016-03-29 01:20:55', '2016-04-03 01:01:32', '10206714282609841'),
(21, 1, 0, 1, 4, 'images/1/1459219435413.346924.jpeg', NULL, 34.052514, -118.266144, '2016-03-29 06:43:51', '2016-04-03 01:01:33', '10206714282609841'),
(22, 1, 1, 2, 3, 'images/1/1459219494176.011963.mov', NULL, 34.052514, -118.266144, '2016-03-29 06:44:51', '2016-04-03 01:01:34', '10206714282609841'),
(23, 10, 1, 2, 3, 'images/10/1459219496870.264160.mov', NULL, 34.052593, -118.266037, '2016-03-29 06:45:00', '2016-04-03 01:08:01', '10153834440441753'),
(24, 9, 1, 3, 2, 'images/9/1459236504776.708008.mov', NULL, 21.272574, -157.773931, '2016-03-29 11:28:27', '2016-04-03 01:08:09', '1731674557065360'),
(25, 9, 0, 2, 3, 'images/9/1459286397486.515137.jpeg', NULL, 21.271646, -157.773461, '2016-03-30 01:19:54', '2016-04-03 01:08:11', '1731674557065360'),
(26, 10, 1, 3, 2, 'images/10/1459314188593.824951.mov', NULL, 34.042823, -118.253371, '2016-03-30 09:03:08', '2016-04-04 08:39:18', '10153834440441753'),
(27, 10, 0, 1, 3, 'images/10/1459314239105.077148.jpeg', NULL, 34.042793, -118.253328, '2016-03-30 09:03:55', '2016-04-04 08:39:20', '10153834440441753'),
(28, 10, 0, 3, 2, 'images/10/1459320324456.052979.jpeg', NULL, 34.052253, -118.263564, '2016-03-30 10:45:21', '2016-04-04 08:39:20', '10153834440441753'),
(29, 1, 0, 3, 2, 'images/1/1459320518633.802002.jpeg', NULL, 34.055677, -118.266315, '2016-03-30 10:48:35', '2016-04-04 10:55:33', '10206714282609841'),
(30, 11, 0, 2, 3, 'images/11/1459387614140.884766.jpeg', NULL, 34.163284, -118.455624, '2016-03-31 05:26:54', '2016-04-04 10:55:34', '10153943762082152'),
(32, 3, 0, 3, 2, 'images/3/1459418385390.660889.jpeg', NULL, 25.120804, 55.12995, '2016-03-31 13:59:42', '2016-04-04 10:55:35', '10156720164715497'),
(33, 3, 0, 0, 5, 'images/3/1459511855614.081787.jpeg', NULL, 25.073749, 55.130643, '2016-04-01 15:57:32', '2016-04-04 10:55:38', '10156720164715497'),
(34, 3, 0, 1, 4, 'images/3/1459512120559.177002.jpeg', NULL, 25.073713, 55.130637, '2016-04-01 16:01:57', '2016-04-04 10:55:38', '10156720164715497'),
(35, 1, 0, 2, 3, 'images/1/1459534803589.191895.jpeg', NULL, 34.052566, -118.266059, '2016-04-01 22:19:59', '2016-04-05 05:36:15', '10206714282609841'),
(37, 3, 1, 2, 3, 'images/3/1459541038933.321045.mov', NULL, 25.072213, 55.127987, '2016-04-02 00:04:02', '2016-04-07 09:48:46', '10156720164715497'),
(38, 3, 0, 2, 2, 'images/3/1459541050005.793945.jpeg', NULL, 25.07221, 55.127999, '2016-04-02 00:04:07', '2016-04-07 09:48:46', '10156720164715497'),
(39, 3, 1, 1, 3, 'images/3/1459543855726.023926.mov', NULL, 25.0722, 55.128022, '2016-04-02 00:50:56', '2016-04-07 09:48:47', '10156720164715497'),
(40, 11, 0, 2, 2, 'images/11/1459579613522.342041.jpeg', NULL, 34.163206, -118.455531, '2016-04-02 10:46:49', '2016-04-08 09:02:56', '10153943762082152'),
(42, 1, 0, 0, 4, 'images/1/1459662581014.154053.jpeg', NULL, 34.05265, -118.266055, '2016-04-03 09:49:36', '2016-04-08 09:02:59', '10206714282609841'),
(49, 9, 0, 1, 1, 'images/9/1460091780640.196045.jpeg', NULL, 34.07984, -118.432813, '2016-04-08 09:02:59', '2016-04-08 21:51:53', '1731674557065360'),
(50, 3, 0, 0, 2, 'images/3/1460137914015.865967.jpeg', NULL, 25.208017, 55.275538, '2016-04-08 21:51:50', '2016-04-09 08:16:17', '10156720164715497'),
(51, 3, 1, 0, 1, 'images/3/1460147149172.914062.mov', NULL, 25.208364, 55.276738, '2016-04-09 00:25:50', '2016-04-09 05:48:22', '10156720164715497'),
(52, 9, 1, 0, 1, 'images/9/1460175387546.706055.mov', NULL, 34.08235, -118.375746, '2016-04-09 08:16:28', '2016-04-10 05:38:55', '1731674557065360'),
(53, 9, 0, 0, 0, 'images/9/1460477937908.229980.jpeg', NULL, 34.090834, -118.390468, '2016-04-12 20:18:58', '2016-04-12 20:18:58', '1731674557065360');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
