-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 01:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(4, 9617685756, 'ben', 'Davisen1097', '2022-05-23 03:31:33'),
(5, 96224271494760052, 'laurent', '1234', '2022-05-23 05:52:45'),
(6, 114310800, 'richard', 'test1234', '2022-05-23 06:03:00'),
(7, 5903194990128530, 'parker', 'park12', '2022-05-23 13:17:33'),
(8, 1768, 'Sooryaven', 'S112906', '2022-05-24 15:13:59'),
(11, 9223372036854775807, 'lafisel', 'soulier1234', '2022-05-24 17:33:33'),
(12, 995930901768, 'yoga', 'rajen12', '2022-05-24 17:39:00'),
(13, 6684611, 'durvish', 'dur123', '2022-05-28 06:30:54'),
(14, 416113246, 'toto666', 'tttxxx', '2022-06-24 02:50:20'),
(15, 26057189944, 'emma', 'emma00', '2022-06-24 03:50:26'),
(16, 749548368581, 'hans', 'hans00', '2022-06-24 16:00:14'),
(17, 199771, 'laura', 'laura00', '2022-06-26 07:00:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
