-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 07:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `davisenwebsitemonitoringtool`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain_info`
--

CREATE TABLE `domain_info` (
  `id` bigint(20) NOT NULL,
  `domain_name` mediumtext NOT NULL,
  `domain_ip` text NOT NULL,
  `domain_countryCode` varchar(3) DEFAULT NULL,
  `domain_countryName` mediumtext NOT NULL,
  `domain_localRank` int(15) DEFAULT NULL,
  `domain_globalRank` int(15) DEFAULT NULL,
  `domain_certValidFrom` varchar(35) DEFAULT NULL,
  `domain_certValidTo` varchar(35) DEFAULT NULL,
  `domain_certIssuer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_info`
--

INSERT INTO `domain_info` (`id`, `domain_name`, `domain_ip`, `domain_countryCode`, `domain_countryName`, `domain_localRank`, `domain_globalRank`, `domain_certValidFrom`, `domain_certValidTo`, `domain_certIssuer`) VALUES
(27, 'facebook.com', '102.132.96.35', 'US', 'United States', 5, 4, 'Sun, 03 Jul 2022 02:00:00 +0200', 'Sun, 02 Oct 2022 01:59:59 +0200', 'DigiCert Inc [US]'),
(28, 'govmu.org', '196.13.125.126', 'MU', 'Mauritius', 17, 43972, 'Wed, 20 Oct 2021 02:00:00 +0200', 'Mon, 21 Nov 2022 00:59:59 +0100', 'DigiCert Inc [US]'),
(29, 'spotify.com', '35.186.224.25', 'US', 'United States', 52, 62, 'Wed, 06 Apr 2022 02:00:00 +0200', 'Fri, 07 Apr 2023 01:59:59 +0200', 'DigiCert Inc [US]'),
(30, 'youtube.com', '172.217.170.174', 'US', 'United States', 2, 2, 'Mon, 05 Sep 2022 10:17:24 +0200', 'Mon, 28 Nov 2022 09:17:23 +0100', 'Google Trust Services LLC [US]'),
(31, 'quillbot.com', '172.67.5.239', 'IN', 'India', 72, 227, 'Mon, 08 Aug 2022 02:00:00 +0200', 'Tue, 08 Aug 2023 01:59:59 +0200', 'Cloudflare, Inc. [US]'),
(32, 'www.spinandwin.com', '104.17.192.8', '', '', 0, 1218280, 'Wed, 22 Jun 2022 02:00:00 +0200', 'Fri, 23 Jun 2023 01:59:59 +0200', 'Cloudflare, Inc. [US]'),
(33, 'www.facebook.com', '102.132.96.35', 'US', 'United States', 5, 4, 'Sun, 03 Jul 2022 02:00:00 +0200', 'Sun, 02 Oct 2022 01:59:59 +0200', 'DigiCert Inc [US]'),
(34, 'meccagames.com', '104.18.43.24', '', '', 0, 1758226, 'Sat, 01 Jan 2022 01:00:00 +0100', 'Mon, 02 Jan 2023 00:59:59 +0100', 'Cloudflare, Inc. [US]'),
(35, 'kittybingo.com', '104.17.213.85', '', '', 0, 990448, 'Wed, 22 Jun 2022 02:00:00 +0200', 'Fri, 23 Jun 2023 01:59:59 +0200', 'Cloudflare, Inc. [US]'),
(37, 'codepen.io', '104.16.176.44', 'IN', 'India', 183, 613, 'Fri, 06 May 2022 02:00:00 +0200', 'Sun, 07 May 2023 01:59:59 +0200', 'Cloudflare, Inc. [US]'),
(38, 'github.com', '140.82.121.3', 'CN', 'China', 21, 27, 'Tue, 15 Mar 2022 01:00:00 +0100', 'Thu, 16 Mar 2023 00:59:59 +0100', 'DigiCert Inc [US]');

-- --------------------------------------------------------

--
-- Table structure for table `mailcode`
--

CREATE TABLE `mailcode` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `mailcode_code` char(8) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailcode`
--

INSERT INTO `mailcode` (`id`, `users_id`, `mailcode_code`, `date`) VALUES
(56, 23, 'BUD42GWB', '2022-09-22 18:32:24'),
(57, 22, '1FBBCHLK', '2022-09-22 18:40:33'),
(58, 23, 'ZN0P0VZK', '2022-09-22 18:43:32'),
(59, 23, 'U666PXXC', '2022-09-23 11:51:05'),
(60, 23, 'IVX7OWH6', '2022-09-23 11:54:13'),
(61, 23, 'YYMJRZDZ', '2022-09-23 11:57:04'),
(62, 23, 'JCL2O494', '2022-09-23 11:59:55'),
(63, 23, 'U8R7ZG6C', '2022-09-23 12:02:03'),
(64, 23, '3TNBU8MA', '2022-09-23 12:05:12'),
(65, 23, '8ROA75T0', '2022-09-23 12:05:16'),
(66, 23, 'H2NVP9WQ', '2022-09-23 12:07:37'),
(67, 23, 'XF11WQI8', '2022-09-23 17:25:11'),
(68, 23, '1O4V12N7', '2022-09-24 02:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `id` int(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `monitors_name` text NOT NULL,
  `monitors_url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`id`, `users_id`, `monitors_name`, `monitors_url`) VALUES
(12, 23, 'Facebook', 'https://www.facebook.com'),
(13, 23, 'gov mauritius', 'govmu.org'),
(14, 23, 'mecca bingo', 'meccabingo.com'),
(18, 22, 'test3', 'spinandwin.com'),
(19, 22, 'test4', 'youtube.com'),
(20, 23, 'testx', 'meccagames.com'),
(21, 22, 'test5', 'facebook.com'),
(22, 22, 'test6', 'lexpress.mu'),
(25, 23, 'test7', 'kittybingo.com'),
(35, 21, 'lautest', 'grosvenorcasinos.com'),
(40, 23, 'Github', 'github.com');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_result`
--

CREATE TABLE `monitor_result` (
  `id` bigint(20) NOT NULL,
  `monitors_id` int(20) NOT NULL,
  `monitor_result_ping` int(8) DEFAULT NULL,
  `monitor_result_loadtime` int(8) DEFAULT NULL,
  `monitor_result_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor_result`
--

INSERT INTO `monitor_result` (`id`, `monitors_id`, `monitor_result_ping`, `monitor_result_loadtime`, `monitor_result_date`) VALUES
(6, 13, 12, 2196, '2022-09-19 17:35:40'),
(7, 12, 68, 963, '2022-09-19 17:35:49'),
(10, 12, 42, 918, '2022-09-19 17:36:06'),
(11, 13, 10, 2216, '2022-09-19 17:36:13'),
(12, 12, 41, 913, '2022-09-19 17:36:17'),
(22, 18, 15, 4913, '2022-09-19 20:28:13'),
(26, 18, 24, 5887, '2022-09-19 20:29:06'),
(27, 13, 13, 666, '2022-09-19 20:29:34'),
(28, 13, 9, 1742, '2022-09-19 20:31:51'),
(29, 13, 10, 2123, '2022-09-19 20:33:03'),
(31, 14, 7, 382, '2022-09-20 19:04:19'),
(32, 13, 13, 417, '2022-09-20 19:04:23'),
(33, 20, 31, 5040, '2022-09-20 19:07:11'),
(34, 21, 42, 851, '2022-09-20 19:18:00'),
(35, 19, 41, 1192, '2022-09-20 19:18:04'),
(36, 22, 97, 384, '2022-09-20 19:19:48'),
(37, 21, 41, 918, '2022-09-20 19:19:50'),
(38, 19, 42, 1514, '2022-09-20 19:19:54'),
(39, 18, 11, 4190, '2022-09-20 19:20:05'),
(40, 18, 17, 5154, '2022-09-21 08:33:29'),
(41, 19, 43, 1176, '2022-09-21 08:33:32'),
(42, 21, 40, 830, '2022-09-21 08:33:38'),
(43, 22, 44, 212, '2022-09-21 08:33:41'),
(44, 21, 41, 841, '2022-09-21 08:35:40'),
(45, 20, 13, 3519, '2022-09-21 08:43:00'),
(46, 14, 7, 320, '2022-09-21 08:44:34'),
(47, 13, 17, 635, '2022-09-21 08:44:37'),
(48, 12, 56, 895, '2022-09-21 08:44:39'),
(50, 12, 50, 886, '2022-09-21 10:34:30'),
(51, 12, 42, 865, '2022-09-21 10:34:36'),
(52, 12, 51, 1007, '2022-09-21 11:12:53'),
(56, 12, 53, 1429, '2022-09-21 11:33:54'),
(58, 14, 7, 311, '2022-09-21 11:39:21'),
(59, 20, 19, 4168, '2022-09-21 11:40:12'),
(60, 20, 13, 2987, '2022-09-21 11:40:18'),
(61, 20, 29, 4032, '2022-09-21 15:07:38'),
(64, 12, 54, 963, '2022-09-21 15:10:24'),
(65, 20, 9, 3894, '2022-09-21 15:16:40'),
(69, 25, 13, 3335, '2022-09-21 15:33:47'),
(70, 20, 168, 3370, '2022-09-21 15:38:35'),
(72, 20, 11, 4432, '2022-09-21 18:24:15'),
(73, 20, 11, 3595, '2022-09-21 18:24:23'),
(74, 25, 21, 5644, '2022-09-21 18:24:55'),
(77, 20, 19, 3641, '2022-09-21 20:27:54'),
(79, 12, 55, 973, '2022-09-22 10:35:34'),
(80, 13, 13, 490, '2022-09-22 10:35:40'),
(81, 25, 11, 2707, '2022-09-22 10:35:50'),
(82, 20, 11, 3619, '2022-09-22 10:36:06'),
(83, 14, 38, 327, '2022-09-22 10:36:07'),
(84, 18, 11, 4180, '2022-09-22 10:39:10'),
(85, 22, 172, 351, '2022-09-22 10:39:11'),
(86, 18, 17, 4404, '2022-09-22 10:39:19'),
(87, 13, 10, 867, '2022-09-22 12:42:50'),
(93, 35, 6, 633, '2022-09-22 14:50:59'),
(95, 35, 22, 342, '2022-09-24 00:04:57'),
(96, 40, 321, 4467, '2022-09-24 03:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `date`, `user_email`) VALUES
(21, 'laurent', '81dc9bdb52d04dc20036dbd8313ed055', '2022-09-11 13:20:40', 'spiritoffirex@gmail.com'),
(22, 'davisen', '7cdb05f4ac1c4289c19703fe9fab3dff', '2022-09-12 18:04:49', 'sunjiveemooken201904269@gmail.com'),
(23, 'toto', '10cbf38e11e0c990457c93b9beeed2fc', '2022-09-12 18:25:45', 'mookensooryaven@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain_info`
--
ALTER TABLE `domain_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailcode`
--
ALTER TABLE `mailcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_id_code` (`users_id`);

--
-- Indexes for table `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_id` (`users_id`);

--
-- Indexes for table `monitor_result`
--
ALTER TABLE `monitor_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_monitor_id` (`monitors_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain_info`
--
ALTER TABLE `domain_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mailcode`
--
ALTER TABLE `mailcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `monitor_result`
--
ALTER TABLE `monitor_result`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mailcode`
--
ALTER TABLE `mailcode`
  ADD CONSTRAINT `FK_users_id_code` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitors`
--
ALTER TABLE `monitors`
  ADD CONSTRAINT `FK_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitor_result`
--
ALTER TABLE `monitor_result`
  ADD CONSTRAINT `FK_monitor_id` FOREIGN KEY (`monitors_id`) REFERENCES `monitors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
