-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2020 at 10:01 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globecwv_glob_green`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete_data`
--

CREATE TABLE `athlete_data` (
  `data_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `all_ride` float NOT NULL,
  `all_run` float NOT NULL,
  `all_swim` float NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `athlete_data`
--

INSERT INTO `athlete_data` (`data_id`, `user_id`, `all_ride`, `all_run`, `all_swim`, `inserted_at`) VALUES
(1, 20882554, 60434, 52727, 0, '2020-11-13 09:51:35'),
(2, 69818594, 31227, 0, 0, '2020-11-13 09:51:35'),
(3, 44689629, 0, 2992130, 0, '2020-11-13 09:51:35'),
(4, 20186489, 5888, 558052, 0, '2020-11-13 09:51:35'),
(5, 44689629, 0, 2992130, 0, '2020-11-13 09:51:35'),
(6, 39794119, 0, 1873100, 0, '2020-11-13 09:51:36'),
(7, 41965594, 10257, 1416280, 1032, '2020-11-13 09:51:36'),
(8, 48214033, 75816, 629483, 0, '2020-11-13 09:51:36'),
(9, 24676616, 1504470, 7543840, 0, '2020-11-13 09:51:36'),
(10, 47519491, 0, 258471, 0, '2020-11-13 09:51:37'),
(11, 63446798, 0, 0, 0, '2020-11-13 09:51:37'),
(12, 62430303, 0, 0, 0, '2020-11-13 09:51:37'),
(13, 8104078, 252148, 2495480, 0, '2020-11-13 09:51:37'),
(14, 22171131, 983667, 1662060, 0, '2020-11-13 09:51:37'),
(15, 41965594, 10257, 1416280, 1032, '2020-11-13 09:51:38'),
(16, 69818594, 31227, 0, 0, '2020-11-13 09:51:38'),
(17, 72066847, 0, 0, 0, '2020-11-13 09:51:38'),
(18, 38591360, 19217, 265853, 0, '2020-11-13 09:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete_data`
--
ALTER TABLE `athlete_data`
  ADD PRIMARY KEY (`data_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athlete_data`
--
ALTER TABLE `athlete_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
