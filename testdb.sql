-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 04:06 PM
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
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain_info`
--

CREATE TABLE `domain_info` (
  `id` bigint(20) NOT NULL,
  `domain_name` mediumtext NOT NULL,
  `domain_ip` text NOT NULL,
  `domain_countryCode` varchar(3) NOT NULL,
  `domain_countryName` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_info`
--

INSERT INTO `domain_info` (`id`, `domain_name`, `domain_ip`, `domain_countryCode`, `domain_countryName`) VALUES
(1, 'facebook.com', '102.132.96.35', 'USA', 'the United States of America'),
(2, 'lexpress.mu', '172.67.74.24', 'USA', 'the United States of America'),
(3, 'govmu.org', '196.13.125.126', 'MUS', 'the Republic of Mauritius'),
(4, 'www.spinandwin.com', '104.17.193.8', 'USA', 'the United States of America'),
(5, 'www.facebook.com', '102.132.96.35', 'USA', 'the United States of America'),
(6, 'meccabingo.com', '217.114.94.2', 'USA', 'the United States of America');

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
(11, 23, 'spin and win', 'https://www.spinandwin.com'),
(12, 23, 'Facebook', 'https://www.facebook.com'),
(13, 23, 'gov mauritius', 'govmu.org'),
(14, 23, 'mecca bingo', 'meccabingo.com');

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
(8, 11, 81, 4279, '2022-09-19 17:35:58'),
(9, 11, 9, 6897, '2022-09-19 17:36:05'),
(10, 12, 42, 918, '2022-09-19 17:36:06'),
(11, 13, 10, 2216, '2022-09-19 17:36:13'),
(12, 12, 41, 913, '2022-09-19 17:36:17'),
(13, 11, 7, 6666, '2022-09-19 17:36:24');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mailcode`
--
ALTER TABLE `mailcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `monitor_result`
--
ALTER TABLE `monitor_result`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
