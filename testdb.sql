-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 02:56 AM
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
-- Table structure for table `mailcode`
--

CREATE TABLE `mailcode` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `mailcode_code` char(8) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailcode`
--

INSERT INTO `mailcode` (`id`, `users_id`, `mailcode_code`, `date`) VALUES
(8, 22, '8EZPOR1B', '0000-00-00'),
(9, 23, 'BPXYXDPY', '0000-00-00'),
(10, 23, 'HN4TGF39', '0000-00-00'),
(11, 22, 'BXYM44KK', '0000-00-00'),
(12, 23, 'RO4L5895', '0000-00-00');

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
(4, 23, 'test1', 'facebook.com'),
(5, 23, 'test2', 'youtube.com'),
(6, 23, 'test3', 'https://meccabingo.com'),
(7, 23, 'test4', 'www.spinandwin.com');

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
(2, 4, 60, 1351, '2022-09-17 00:54:23'),
(3, 6, 21, 763, '2022-09-17 00:55:17');

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
-- AUTO_INCREMENT for table `mailcode`
--
ALTER TABLE `mailcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `monitor_result`
--
ALTER TABLE `monitor_result`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
