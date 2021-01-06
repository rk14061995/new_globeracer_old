-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2020 at 07:02 AM
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
-- Table structure for table `race_registeration`
--

CREATE TABLE `race_registeration` (
  `reg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `amount_to_pay` double NOT NULL,
  `amoun_status` enum('Pending','Paid') NOT NULL,
  `prev_distance` double NOT NULL,
  `prev_dist_date_time` varchar(100) NOT NULL,
  `new_distance_covered` double NOT NULL,
  `race_last_date` varchar(100) NOT NULL,
  `last_updated_at` datetime NOT NULL,
  `medice_name_allergy` varchar(255) DEFAULT NULL,
  `food_name_allerg` varchar(255) DEFAULT NULL,
  `surgery_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` varchar(255) NOT NULL,
  `transactiondate` varchar(255) NOT NULL,
  `transaction_timezone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `race_registeration`
--

INSERT INTO `race_registeration` (`reg_id`, `user_id`, `event_id`, `team_id`, `amount_to_pay`, `amoun_status`, `prev_distance`, `prev_dist_date_time`, `new_distance_covered`, `race_last_date`, `last_updated_at`, `medice_name_allergy`, `food_name_allerg`, `surgery_name`, `created_at`, `transaction_id`, `transactiondate`, `transaction_timezone`) VALUES
(1, 28, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:40', '', '', ''),
(2, 33, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(3, 146, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(4, 153, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(5, 154, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(6, 157, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(7, 157, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(8, 162, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(9, 170, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(10, 176, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(11, 177, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(12, 185, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(13, 214, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(14, 223, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(15, 223, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:41', '', '', ''),
(16, 223, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(17, 224, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(18, 253, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(19, 260, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(20, 268, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(21, 274, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(22, 275, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(23, 276, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(24, 278, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(25, 278, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(26, 282, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(27, 304, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(28, 318, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:42', '', '', ''),
(29, 325, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(30, 328, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(31, 354, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(32, 367, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(33, 368, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(34, 371, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(35, 378, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(36, 379, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(37, 379, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(38, 379, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(39, 379, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(40, 381, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(41, 382, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(42, 397, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(43, 399, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(44, 405, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:43', '', '', ''),
(45, 408, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:44', '', '', ''),
(46, 420, 10, 124, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-08 12:17:44', '', '', ''),
(47, 446, 10, 0, 769.95, 'Pending', 0, '', 0, '', '0000-00-00 00:00:00', '', '', '', '2020-11-09 04:47:29', '', '', ''),
(48, 45559, 10, 4, 769.95, 'Pending', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 07:38:38', '', '', ''),
(49, 45560, 11, 6, 20.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 07:42:56', 'REF-09112020074258', '2020-11-09 07:50:20', 'UTC'),
(50, 45561, 10, 6, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 07:55:02', 'REF-09112020075504', '2020-11-09 08:02:13', 'UTC'),
(51, 446, 11, 3, 20.95, 'Pending', 0, '', 0, '', '0000-00-00 00:00:00', '', '', '', '2020-11-09 10:17:29', '', '', ''),
(52, 45563, 10, 8, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 16:49:06', 'REF-09112020044907', '2020-11-09 16:52:01', 'UTC'),
(53, 45564, 10, 8, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 17:05:08', 'REF-09112020050510', '2020-11-09 17:06:56', 'UTC'),
(54, 45565, 10, 3, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 17:23:46', 'REF-09112020052348', '2020-11-09 17:30:14', 'UTC'),
(55, 45566, 10, 3, 769.95, 'Paid', 0, '', 0, '', '0000-00-00 00:00:00', NULL, NULL, NULL, '2020-11-09 17:33:04', 'REF-09112020053305', '2020-11-09 17:34:27', 'UTC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `race_registeration`
--
ALTER TABLE `race_registeration`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `race_registeration`
--
ALTER TABLE `race_registeration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
