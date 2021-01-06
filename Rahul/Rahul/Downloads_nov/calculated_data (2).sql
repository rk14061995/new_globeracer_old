-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2020 at 11:59 AM
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
-- Table structure for table `calculated_data`
--

CREATE TABLE `calculated_data` (
  `dt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(155) NOT NULL,
  `distance` float NOT NULL,
  `data_Date` varchar(50) NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calculated_data`
--

INSERT INTO `calculated_data` (`dt_id`, `user_id`, `full_name`, `distance`, `data_Date`, `inserted_at`) VALUES
(1, 20882554, 'Kavitha  Kanaparthi', 321, '2020-11-14', '2020-11-15 10:04:20'),
(3, 39794119, 'Rohit  Singh', 8492, '2020-11-14', '2020-11-15 10:04:20'),
(5, 24676616, 'Ramit  Wadhwa', 25012, '2020-11-14', '2020-11-15 10:04:20'),
(8, 32210107, 'Ursula  Edginton', 9974, '2020-11-14', '2020-11-15 10:04:20'),
(9, 46315861, 'Uma  Valluri', 17715, '2020-11-14', '2020-11-15 10:04:20'),
(10, 63446798, 'Azhar  Tambuwala', 15631, '2020-11-14', '2020-11-15 10:04:20'),
(12, 8104078, 'Anirudha  Athani', 10352, '2020-11-14', '2020-11-15 10:04:20'),
(14, 41965594, 'Keith  MacIntosh', 4534, '2020-11-14', '2020-11-15 10:04:20'),
(15, 72066847, 'Ramesh  T', 10028, '2020-11-14', '2020-11-15 10:04:20'),
(20, 44689629, 'Prikshit  Thakur', 23472, '2020-11-15', '2020-11-15 10:04:47'),
(21, 48214033, 'Harish Gopal Tarikar', 21204, '2020-11-15', '2020-11-15 10:04:47'),
(22, 47519491, 'Jacob  Boopalan', 21667, '2020-11-15', '2020-11-15 10:04:47'),
(23, 72101584, 'Nikhil  Mehta', 10028, '2020-11-15', '2020-11-15 10:04:47'),
(25, 72114401, 'Harshal  Oswal', 10243, '2020-11-15', '2020-11-15 10:04:47'),
(26, 22171131, 'Ravi Kanth Gollapudi', 12493, '2020-11-15', '2020-11-15 10:04:47'),
(27, 38591360, 'Venkata  Subbarao Tripuramallu', 23024, '2020-11-15', '2020-11-15 10:04:47'),
(28, 63959155, 'Sandhya  Rao', 14217, '2020-11-15', '2020-11-15 10:04:47'),
(29, 8104078, 'Anirudha  Athani', 10260, '2020-11-15', '2020-11-15 12:00:14'),
(31, 71503391, 'Srija  Thanniru', 9024, '2020-11-16', '2020-11-16 05:46:46'),
(34, 72249853, 'Chethana  Kanaparthi', 6726, '2020-11-15', '2020-11-16 07:11:50'),
(35, 72155742, 'Simran  Oswal', 1725, '2020-11-15', '2020-11-16 07:11:50'),
(36, 72066847, 'Ramesh  T', 12512, '2020-11-15', '2020-11-16 07:11:50'),
(37, 30228090, 'SRIRAM  MAHADEVAN', 5037, '2020-11-15', '2020-11-16 07:11:50'),
(38, 47519491, 'Jacob  Boopalan', 43052, '2020-11-14', '2020-11-16 07:12:24'),
(39, 72101584, 'Nikhil  Mehta', 7105, '2020-11-14', '2020-11-16 07:12:24'),
(40, 72114401, 'Harshal  Oswal', 7691, '2020-11-14', '2020-11-16 07:12:24'),
(41, 38591360, 'Venkata  Subbarao Tripuramallu', 17010, '2020-11-14', '2020-11-16 07:12:24'),
(42, 63959155, 'Sandhya  Rao', 12646, '2020-11-14', '2020-11-16 07:12:24'),
(43, 7454026, 'Alfredo  Miranda', 0, '2020-11-14', '2020-11-16 07:15:19'),
(44, 71503391, 'Srija  Thanniru', 0, '2020-11-14', '2020-11-16 07:15:19'),
(45, 53931358, 'Swapnil Govind Pawar', 0, '2020-11-14', '2020-11-16 07:15:19'),
(46, 69818594, 'Rahul  Kumar', 0, '2020-11-14', '2020-11-16 07:15:19'),
(47, 72110864, 'maniraj  nimmana', 0, '2020-11-14', '2020-11-16 07:15:19'),
(48, 20186489, 'Sujit  kispotta', 0, '2020-11-14', '2020-11-16 07:15:19'),
(49, 44689629, 'Prikshit  Thakur', 0, '2020-11-14', '2020-11-16 07:15:19'),
(50, 48214033, 'Harish Gopal Tarikar', 0, '2020-11-14', '2020-11-16 07:15:19'),
(51, 72237071, 'BrianJohn  ', 0, '2020-11-14', '2020-11-16 07:15:19'),
(52, 62430303, 'Adnan  Shaiwala', 0, '2020-11-14', '2020-11-16 07:15:19'),
(53, 72249853, 'Chethana  Kanaparthi', 0, '2020-11-14', '2020-11-16 07:15:19'),
(54, 72237854, 'Jhansi  Kanaparthi', 0, '2020-11-14', '2020-11-16 07:15:19'),
(55, 72237854, 'Venkata  kanaparti', 0, '2020-11-14', '2020-11-16 07:15:19'),
(56, 31729122, 'Sonali  Singh', 0, '2020-11-14', '2020-11-16 07:15:19'),
(57, 72155742, 'Simran  Oswal', 0, '2020-11-14', '2020-11-16 07:15:19'),
(58, 22171131, 'Ravi Kanth Gollapudi', 0, '2020-11-14', '2020-11-16 07:15:19'),
(59, 70505349, 'Pooja  Aswal', 0, '2020-11-14', '2020-11-16 07:15:19'),
(60, 50922565, 'Phani Raj  K', 0, '2020-11-14', '2020-11-16 07:15:19'),
(62, 30228090, 'SRIRAM  MAHADEVAN', 0, '2020-11-14', '2020-11-16 07:15:19'),
(63, 41486162, 'Rama  Vedashree', 0, '2020-11-14', '2020-11-16 07:15:19'),
(64, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 0, '2020-11-14', '2020-11-16 07:15:19'),
(65, 7454026, 'Alfredo  Miranda', 0, '2020-11-15', '2020-11-16 07:17:19'),
(66, 71503391, 'Srija  Thanniru', 0, '2020-11-15', '2020-11-16 07:17:19'),
(67, 53931358, 'Swapnil Govind Pawar', 0, '2020-11-15', '2020-11-16 07:17:19'),
(68, 69818594, 'Rahul  Kumar', 0, '2020-11-15', '2020-11-16 07:17:19'),
(69, 72110864, 'maniraj  nimmana', 0, '2020-11-15', '2020-11-16 07:17:19'),
(70, 20186489, 'Sujit  kispotta', 0, '2020-11-15', '2020-11-16 07:17:19'),
(71, 39794119, 'Rohit  Singh', 0, '2020-11-15', '2020-11-16 07:17:19'),
(72, 24676616, 'Ramit  Wadhwa', 0, '2020-11-15', '2020-11-16 07:17:19'),
(74, 46315861, 'Uma  Valluri', 0, '2020-11-15', '2020-11-16 07:17:19'),
(75, 63446798, 'Azhar  Tambuwala', 0, '2020-11-15', '2020-11-16 07:17:19'),
(76, 62430303, 'Adnan  Shaiwala', 0, '2020-11-15', '2020-11-16 07:17:19'),
(77, 72237854, 'Jhansi  Kanaparthi', 0, '2020-11-15', '2020-11-16 07:17:19'),
(78, 72237854, 'Venkata  kanaparti', 0, '2020-11-15', '2020-11-16 07:17:19'),
(79, 31729122, 'Sonali  Singh', 0, '2020-11-15', '2020-11-16 07:17:19'),
(80, 70505349, 'Pooja  Aswal', 0, '2020-11-15', '2020-11-16 07:17:19'),
(81, 50922565, 'Phani Raj  K', 0, '2020-11-15', '2020-11-16 07:17:19'),
(82, 72088597, 'Radha krishna Reddy Mandala', 0, '2020-11-15', '2020-11-16 07:17:20'),
(83, 65706702, 'aaisus  ', 0, '2020-11-15', '2020-11-16 07:17:20'),
(84, 41486162, 'Rama  Vedashree', 0, '2020-11-15', '2020-11-16 07:17:20'),
(85, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 0, '2020-11-15', '2020-11-16 07:17:20'),
(86, 20882554, 'Kavitha  Kanaparthi', 6057, '2020-11-16', '2020-11-16 17:12:54'),
(87, 48214033, 'Harish Gopal Tarikar', 10214, '2020-11-16', '2020-11-16 17:12:54'),
(88, 72101584, 'Nikhil  Mehta', 10028, '2020-11-16', '2020-11-16 17:12:54'),
(90, 46315861, 'Uma  Valluri', 23195, '2020-11-16', '2020-11-16 17:12:54'),
(91, 63446798, 'Azhar  Tambuwala', 21116, '2020-11-16', '2020-11-16 17:12:54'),
(92, 72155742, 'Simran  Oswal', 4893, '2020-11-16', '2020-11-16 17:12:54'),
(93, 22171131, 'Ravi Kanth Gollapudi', 20446, '2020-11-16', '2020-11-16 17:12:54'),
(94, 41965594, 'Keith  MacIntosh', 21867, '2020-11-16', '2020-11-16 17:12:54'),
(96, 50922565, 'Phani Raj  K', 4703, '2020-11-16', '2020-11-16 17:12:54'),
(99, 41486162, 'Rama  Vedashree', 9509, '2020-11-16', '2020-11-16 17:12:54'),
(100, 63959155, 'Sandhya  Rao', 11753, '2020-11-16', '2020-11-16 17:12:54'),
(101, 72249853, 'Chethana  Kanaparthi', 11792, '2020-11-16', '2020-11-17 03:24:49'),
(102, 72066847, 'Ramesh  T', 11247, '2020-11-16', '2020-11-17 03:24:49'),
(103, 53931358, 'Swapnil Govind Pawar', 10602, '2020-11-17', '2020-11-17 05:22:36'),
(105, 47519491, 'Jacob  Boopalan', 21479, '2020-11-17', '2020-11-17 07:26:32'),
(106, 63446798, 'Azhar  Tambuwala', 20321, '2020-11-17', '2020-11-17 07:26:32'),
(107, 63959155, 'Sandhya  Rao', 14254, '2020-11-17', '2020-11-17 07:26:32'),
(108, 68457515, 'Priyanka Pal Mantri', 8020, '2020-11-17', '2020-11-17 07:26:32'),
(110, 22171131, 'Ravi Kanth Gollapudi', 17021, '2020-11-17', '2020-11-17 09:00:20'),
(111, 38304790, 'Ruby  manuja', 10299, '2020-11-17', '2020-11-17 09:00:20'),
(112, 23879300, 'Shyamak  Das', 12249, '2020-11-17', '2020-11-17 09:00:20'),
(113, 14093840, 'Muffadal  Quettawala', 0, '2020-11-15', '2020-11-17 09:13:31'),
(114, 38304790, 'Ruby  manuja', 0, '2020-11-15', '2020-11-17 09:13:31'),
(115, 20534721, 'Raghav  Mantri', 0, '2020-11-15', '2020-11-17 09:13:31'),
(116, 72320558, 'Simha Kanaparthi Sanjeevan', 0, '2020-11-15', '2020-11-17 09:13:31'),
(117, 63869822, 'Ankit  Dokania', 0, '2020-11-15', '2020-11-17 09:13:31'),
(118, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-15', '2020-11-17 09:13:31'),
(119, 23879300, 'Shyamak  Das', 0, '2020-11-15', '2020-11-17 09:13:31'),
(120, 14093840, 'Muffadal  Quettawala', 0, '2020-11-14', '2020-11-17 09:30:52'),
(121, 38304790, 'Ruby  manuja', 0, '2020-11-14', '2020-11-17 09:30:52'),
(122, 20534721, 'Raghav  Mantri', 0, '2020-11-14', '2020-11-17 09:30:52'),
(123, 72320558, 'Simha Kanaparthi Sanjeevan', 0, '2020-11-14', '2020-11-17 09:30:52'),
(124, 63869822, 'Ankit  Dokania', 0, '2020-11-14', '2020-11-17 09:30:52'),
(125, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-14', '2020-11-17 09:30:52'),
(126, 23879300, 'Shyamak  Das', 0, '2020-11-14', '2020-11-17 09:30:52'),
(127, 53931358, 'Swapnil Govind Pawar', 5161, '2020-11-16', '2020-11-17 09:32:46'),
(128, 63869822, 'Ankit  Dokania', 8036, '2020-11-16', '2020-11-17 09:32:46'),
(129, 7454026, 'Alfredo  Miranda', 0, '2020-11-16', '2020-11-17 09:35:36'),
(130, 69818594, 'Rahul  Kumar', 0, '2020-11-16', '2020-11-17 09:35:36'),
(131, 72110864, 'maniraj  nimmana', 0, '2020-11-16', '2020-11-17 09:35:36'),
(132, 20186489, 'Sujit  kispotta', 0, '2020-11-16', '2020-11-17 09:35:36'),
(133, 44689629, 'Prikshit  Thakur', 0, '2020-11-16', '2020-11-17 09:35:36'),
(134, 39794119, 'Rohit  Singh', 0, '2020-11-16', '2020-11-17 09:35:36'),
(135, 24676616, 'Ramit  Wadhwa', 0, '2020-11-16', '2020-11-17 09:35:36'),
(136, 47519491, 'Jacob  Boopalan', 0, '2020-11-16', '2020-11-17 09:35:36'),
(138, 62430303, 'Adnan  Shaiwala', 0, '2020-11-16', '2020-11-17 09:35:36'),
(139, 72114401, 'Harshal  Oswal', 0, '2020-11-16', '2020-11-17 09:35:36'),
(140, 72237854, 'Venkata  kanaparti', 0, '2020-11-16', '2020-11-17 09:35:36'),
(141, 31729122, 'Sonali  Singh', 0, '2020-11-16', '2020-11-17 09:35:36'),
(142, 8104078, 'Anirudha  Athani', 0, '2020-11-16', '2020-11-17 09:35:36'),
(143, 38591360, 'Venkata  Subbarao Tripuramallu', 0, '2020-11-16', '2020-11-17 09:35:36'),
(144, 30228090, 'SRIRAM  MAHADEVAN', 0, '2020-11-16', '2020-11-17 09:35:36'),
(145, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 0, '2020-11-16', '2020-11-17 09:35:36'),
(146, 14093840, 'Muffadal  Quettawala', 0, '2020-11-16', '2020-11-17 09:35:36'),
(147, 20184809, 'Gaurav  Verma', 0, '2020-11-16', '2020-11-17 09:35:36'),
(148, 38304790, 'Ruby  manuja', 0, '2020-11-16', '2020-11-17 09:35:36'),
(149, 20534721, 'Raghav  Mantri', 0, '2020-11-16', '2020-11-17 09:35:36'),
(150, 72320558, 'Simha Kanaparthi Sanjeevan', 0, '2020-11-16', '2020-11-17 09:35:36'),
(151, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-16', '2020-11-17 09:35:36'),
(152, 23879300, 'Shyamak  Das', 0, '2020-11-16', '2020-11-17 09:35:36'),
(153, 20650038, 'Burhanuddin  Pedhiwala', 10004, '2020-11-17', '2020-11-17 11:00:19'),
(154, 44689629, 'Prikshit  Thakur', 11695, '2020-11-17', '2020-11-17 11:33:33'),
(156, 71503391, 'Srija  Thanniru', 16065, '2020-11-17', '2020-11-17 13:00:19'),
(157, 39794119, 'Rohit  Singh', 12705, '2020-11-17', '2020-11-17 13:00:20'),
(158, 72101584, 'Nikhil  Mehta', 10018, '2020-11-17', '2020-11-17 13:00:20'),
(159, 26715780, 'Sunil  Agarwal', 12031, '2020-11-17', '2020-11-17 13:00:20'),
(160, 32210107, 'Ursula  Edginton', 0, '2020-11-17', '2020-11-17 13:00:20'),
(161, 46315861, 'Uma  Valluri', 23571, '2020-11-17', '2020-11-17 13:00:20'),
(162, 72114401, 'Harshal  Oswal', 12210, '2020-11-17', '2020-11-17 13:00:20'),
(163, 72155742, 'Simran  Oswal', 5618, '2020-11-17', '2020-11-17 13:00:20'),
(166, 72066847, 'Ramesh  T', 19345, '2020-11-17', '2020-11-17 13:00:20'),
(167, 41486162, 'Rama  Vedashree', 0, '2020-11-17', '2020-11-17 13:00:20'),
(168, 14093840, 'Muffadal  Quettawala', 8042, '2020-11-17', '2020-11-17 13:00:20'),
(169, 65382454, 'Rajesh  Narayan', 5972, '2020-11-17', '2020-11-17 13:00:20'),
(170, 72320558, 'Simha Kanaparthi Sanjeevan', 1363, '2020-11-17', '2020-11-17 13:00:20'),
(171, 20882554, 'Kavitha  Kanaparthi', 13113, '2020-11-17', '2020-11-17 14:11:14'),
(172, 62361912, 'Dhanashree  Shingvi', 10010, '2020-11-17', '2020-11-17 14:11:14'),
(173, 69818594, 'Rahul  Kumar', 21689, '2020-11-17', '2020-11-17 14:11:14'),
(174, 38591360, 'Venkata  Subbarao Tripuramallu', 7524, '2020-11-17', '2020-11-17 14:11:14'),
(176, 7454026, 'Alfredo  Miranda', 0, '2020-11-17', '2020-11-18 00:00:02'),
(177, 72110864, 'maniraj  nimmana', 0, '2020-11-17', '2020-11-18 00:00:02'),
(178, 20186489, 'Sujit  kispotta', 0, '2020-11-17', '2020-11-18 00:00:02'),
(179, 48214033, 'Harish Gopal Tarikar', 0, '2020-11-17', '2020-11-18 00:00:02'),
(180, 24676616, 'Ramit  Wadhwa', 0, '2020-11-17', '2020-11-18 00:00:02'),
(182, 62430303, 'Adnan  Shaiwala', 0, '2020-11-17', '2020-11-18 00:00:02'),
(183, 72249853, 'Chethana  Kanaparthi', 0, '2020-11-17', '2020-11-18 00:00:02'),
(184, 72270577, 'Venkata  kanaparti', 0, '2020-11-17', '2020-11-18 00:00:02'),
(185, 31729122, 'Sonali  Singh', 0, '2020-11-17', '2020-11-18 00:00:02'),
(186, 8104078, 'Anirudha  Athani', 0, '2020-11-17', '2020-11-18 00:00:02'),
(187, 50922565, 'Phani Raj  K', 0, '2020-11-17', '2020-11-18 00:00:02'),
(188, 65706702, 'aaisus  ', 0, '2020-11-17', '2020-11-18 00:00:02'),
(189, 30228090, 'SRIRAM  MAHADEVAN', 0, '2020-11-17', '2020-11-18 00:00:02'),
(190, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 0, '2020-11-17', '2020-11-18 00:00:02'),
(191, 20184809, 'Gaurav  Verma', 0, '2020-11-17', '2020-11-18 00:00:02'),
(193, 63869822, 'Ankit  Dokania', 0, '2020-11-17', '2020-11-18 00:00:03'),
(194, 45426027, 'Khuzema Shabbir Hyderabadwala', 0, '2020-11-17', '2020-11-18 00:00:03'),
(195, 16307072, 'Ajay  Desai', 0, '2020-11-17', '2020-11-18 00:00:03'),
(196, 72086454, 'Naresh   Muthireddy', 7745, '2020-11-18', '2020-11-18 03:00:24'),
(197, 53931358, 'Swapnil Govind Pawar', 12430, '2020-11-18', '2020-11-18 05:00:22'),
(198, 38591360, 'Venkata  Subbarao Tripuramallu', 50003, '2020-11-18', '2020-11-18 05:00:22'),
(199, 45426027, 'Khuzema Shabbir Hyderabadwala', 20081, '2020-11-18', '2020-11-18 05:00:22'),
(200, 16307072, 'Ajay  Desai', 20081, '2020-11-18', '2020-11-18 05:00:22'),
(201, 63959155, 'Sandhya  Rao', 14358, '2020-11-18', '2020-11-18 06:00:23'),
(202, 47519491, 'Jacob  Boopalan', 22073, '2020-11-18', '2020-11-18 07:49:39'),
(204, 14093840, 'Muffadal  Quettawala', 38765, '2020-11-18', '2020-11-18 08:00:22'),
(205, 63446798, 'Azhar  Tambuwala', 23211, '2020-11-18', '2020-11-18 09:00:23'),
(206, 46315861, 'Uma  Valluri', 0, '2020-11-18', '2020-11-18 09:59:34'),
(207, 20882554, 'Kavitha  Kanaparthi', 5018, '2020-11-18', '2020-11-18 13:00:18'),
(208, 62361912, 'Dhanashree  Shingvi', 10007, '2020-11-18', '2020-11-18 13:00:18'),
(209, 71503391, 'Srija  Thanniru', 10026, '2020-11-18', '2020-11-18 13:00:18'),
(210, 20650038, 'Burhanuddin  Pedhiwala', 11433, '2020-11-18', '2020-11-18 13:00:18'),
(211, 48214033, 'Harish Gopal Tarikar', 8444, '2020-11-18', '2020-11-18 13:00:18'),
(212, 24676616, 'Ramit  Wadhwa', 10018, '2020-11-18', '2020-11-18 13:00:18'),
(213, 72101584, 'Nikhil  Mehta', 10201, '2020-11-18', '2020-11-18 13:00:18'),
(216, 22171131, 'Ravi Kanth Gollapudi', 20403, '2020-11-18', '2020-11-18 13:00:18'),
(218, 20184809, 'Gaurav  Verma', 0, '2020-11-18', '2020-11-18 13:00:18'),
(219, 63869822, 'Ankit  Dokania', 27341, '2020-11-18', '2020-11-18 13:00:18'),
(220, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-18', '2020-11-18 13:00:18'),
(222, 72391463, 'Reema Nitin Mehta', 264, '2020-11-18', '2020-11-18 14:00:19'),
(223, 69818594, 'Rahul  Kumar', 36351, '2020-11-18', '2020-11-18 15:00:22'),
(224, 72099162, 'Sheetal  Oswal', 10054, '2020-11-18', '2020-11-18 15:00:22'),
(226, 7454026, 'Alfredo  Miranda', 0, '2020-11-18', '2020-11-19 00:00:02'),
(227, 7586730, 'Shshank  Pundir', 0, '2020-11-18', '2020-11-19 00:00:02'),
(228, 24449689, 'MEENAL  Bishnoi', 0, '2020-11-18', '2020-11-19 00:00:02'),
(229, 72110864, 'maniraj  nimmana', 0, '2020-11-18', '2020-11-19 00:00:02'),
(230, 20186489, 'Sujit  kispotta', 0, '2020-11-18', '2020-11-19 00:00:02'),
(231, 44689629, 'Prikshit  Thakur', 0, '2020-11-18', '2020-11-19 00:00:02'),
(232, 39794119, 'Rohit  Singh', 0, '2020-11-18', '2020-11-19 00:00:02'),
(233, 72237071, 'BrianJohn  ', 0, '2020-11-18', '2020-11-19 00:00:02'),
(234, 62430303, 'Adnan  Shaiwala', 0, '2020-11-18', '2020-11-19 00:00:02'),
(235, 72114401, 'Harshal  Oswal', 0, '2020-11-18', '2020-11-19 00:00:02'),
(236, 72249853, 'Chethana  Kanaparthi', 0, '2020-11-18', '2020-11-19 00:00:02'),
(237, 72270577, 'Venkata  kanaparti', 0, '2020-11-18', '2020-11-19 00:00:02'),
(238, 31729122, 'Sonali  Singh', 0, '2020-11-18', '2020-11-19 00:00:02'),
(239, 8104078, 'Anirudha  Athani', 0, '2020-11-18', '2020-11-19 00:00:02'),
(240, 72155742, 'Simran  Oswal', 0, '2020-11-18', '2020-11-19 00:00:02'),
(241, 72066847, 'Ramesh  T', 0, '2020-11-18', '2020-11-19 00:00:02'),
(242, 50922565, 'Phani Raj  K', 0, '2020-11-18', '2020-11-19 00:00:02'),
(245, 30228090, 'SRIRAM  MAHADEVAN', 0, '2020-11-18', '2020-11-19 00:00:02'),
(246, 41486162, 'Rama  Vedashree', 0, '2020-11-18', '2020-11-19 00:00:02'),
(247, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 0, '2020-11-18', '2020-11-19 00:00:02'),
(248, 38304790, 'Ruby  Manuja', 0, '2020-11-18', '2020-11-19 00:00:03'),
(249, 20534721, 'Raghav  Mantri', 0, '2020-11-18', '2020-11-19 00:00:03'),
(250, 65382454, 'Rajesh  Narayan', 0, '2020-11-18', '2020-11-19 00:00:03'),
(251, 72320558, 'Simha Kanaparthi Sanjeevan', 0, '2020-11-18', '2020-11-19 00:00:03'),
(252, 23879300, 'Shyamak  Das', 0, '2020-11-18', '2020-11-19 00:00:03'),
(254, 66176715, 'Rahul M Agrawal', 0, '2020-11-18', '2020-11-19 00:00:03'),
(255, 72086454, 'Naresh   Muthireddy', 8239, '2020-11-19', '2020-11-19 03:00:26'),
(256, 71794585, 'Yamini  Sawant', 10000, '2020-11-19', '2020-11-19 05:00:25'),
(257, 53931358, 'Swapnil Govind Pawar', 11013, '2020-11-19', '2020-11-19 07:00:26'),
(258, 47519491, 'Jacob  Boopalan', 22098, '2020-11-19', '2020-11-19 08:00:21'),
(259, 72101584, 'Nikhil  Mehta', 10075, '2020-11-19', '2020-11-19 08:00:21'),
(260, 20650038, 'Burhanuddin  Pedhiwala', 10400, '2020-11-19', '2020-11-19 09:00:24'),
(262, 44689629, 'Prikshit  Thakur', 15082, '2020-11-19', '2020-11-19 11:22:26'),
(263, 72099162, 'Sheetal  Oswal', 9735, '2020-11-19', '2020-11-19 11:22:26'),
(264, 72066847, 'Ramesh  T', 16557, '2020-11-19', '2020-11-19 11:22:26'),
(265, 45426027, 'Khuzema Shabbir Hyderabadwala', 1051, '2020-11-19', '2020-11-19 11:22:26'),
(266, 16307072, 'Ajay  Desai', 162, '2020-11-19', '2020-11-19 11:22:26'),
(267, 62361912, 'Dhanashree  Shingvi', 10008, '2020-11-19', '2020-11-19 13:00:26'),
(269, 72110864, 'Maniraj  Nimmana', 5280, '2020-11-19', '2020-11-19 13:42:03'),
(270, 46315861, 'Uma  Valluri', 25077, '2020-11-19', '2020-11-19 13:42:03'),
(271, 72114401, 'Harshal  Oswal', 8140, '2020-11-19', '2020-11-19 13:42:03'),
(272, 72155742, 'Simran  Oswal', 4938, '2020-11-19', '2020-11-19 13:42:03'),
(273, 22171131, 'Ravi Kanth Gollapudi', 20392, '2020-11-19', '2020-11-19 13:42:03'),
(274, 70505349, 'Pooja  Aswal', 10187, '2020-11-19', '2020-11-19 13:42:03'),
(276, 41486162, 'Rama  Vedashree', 11045, '2020-11-19', '2020-11-19 13:42:03'),
(277, 63446798, 'Azhar  Tambuwala', 3265, '2020-11-19', '2020-11-19 13:46:18'),
(278, 38304790, 'Ruby  Manuja', 10017, '2020-11-19', '2020-11-19 13:46:18'),
(279, 65382454, 'Rajesh  Narayan', 6287, '2020-11-19', '2020-11-19 13:46:18'),
(280, 68457515, 'Priyanka Pal Mantri', 6434, '2020-11-19', '2020-11-19 13:46:18'),
(281, 23879300, 'Shyamak  Das', 10005, '2020-11-19', '2020-11-19 13:46:18'),
(282, 66176715, 'Rahul M Agrawal', 6419, '2020-11-19', '2020-11-19 13:46:18'),
(283, 69818594, 'Rahul  Kumar', 31931, '2020-11-19', '2020-11-19 15:00:19'),
(284, 20186489, 'Sujit  kispotta', 7532, '2020-11-19', '2020-11-19 15:00:19'),
(286, 44883482, 'Nilesh  Oswal', 10005, '2020-11-19', '2020-11-19 16:00:21'),
(287, 72086454, 'Naresh   Muthireddy', 7283, '2020-11-20', '2020-11-20 02:00:20'),
(288, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 9026, '2020-11-20', '2020-11-20 02:00:20'),
(290, 72101584, 'Nikhil  Mehta', 10038, '2020-11-20', '2020-11-20 03:00:01'),
(291, 62361912, 'Dhanashree  Shingvi', 10009, '2020-11-20', '2020-11-20 03:00:16'),
(292, 7586730, 'Shshank  Pundir', 10025, '2020-11-20', '2020-11-20 03:00:16'),
(293, 20650038, 'Burhanuddin  Pedhiwala', 10010, '2020-11-20', '2020-11-20 03:00:16'),
(294, 53931358, 'Swapnil Govind Pawar', 10061, '2020-11-20', '2020-11-20 03:00:16'),
(295, 26715780, 'Sunil  Agarwal', 8005, '2020-11-20', '2020-11-20 03:00:16'),
(296, 63446798, 'Azhar  Tambuwala', 11257, '2020-11-20', '2020-11-20 03:00:16'),
(297, 72155742, 'Simran  Oswal', 199, '2020-11-20', '2020-11-20 03:00:16'),
(299, 38591360, 'Venkata  Subbarao Tripuramallu', 26788, '2020-11-20', '2020-11-20 03:00:16'),
(301, 45426027, 'Khuzema Shabbir Hyderabadwala', 8030, '2020-11-20', '2020-11-20 03:00:16'),
(302, 16307072, 'Ajay  Desai', 8059, '2020-11-20', '2020-11-20 03:00:16'),
(303, 36294819, 'DR.RAKESH K JAIN', 9933, '2020-11-20', '2020-11-20 03:00:16'),
(304, 32062334, 'Kumar Gulabrao Ghadage', 9011, '2020-11-20', '2020-11-20 03:00:16'),
(305, 36620981, 'Akshay Chandrashekhar  Aiyar', 8147, '2020-11-20', '2020-11-20 03:00:16'),
(306, 48214033, 'Harish Gopal Tarikar', 5099, '2020-11-20', '2020-11-20 03:27:53'),
(307, 65382454, 'Rajesh  Narayan', 5834, '2020-11-20', '2020-11-20 03:27:54'),
(309, 44883482, 'Nilesh  Oswal', 10063, '2020-11-20', '2020-11-20 05:00:22'),
(310, 72099162, 'Sheetal  Oswal', 10247, '2020-11-20', '2020-11-20 05:00:22'),
(311, 69818594, 'Rahul  Kumar', 25689, '2020-11-20', '2020-11-20 05:49:54'),
(312, 39794119, 'Rohit  Singh', 13132, '2020-11-20', '2020-11-20 05:49:54'),
(313, 71794585, 'Yamini  Sawant', 10000, '2020-11-20', '2020-11-20 05:49:54'),
(314, 8104078, 'Anirudha  Athani', 12734, '2020-11-20', '2020-11-20 05:49:54'),
(315, 70505349, 'Pooja  Oswal', 8059, '2020-11-20', '2020-11-20 08:00:02'),
(316, 62361912, 'Dhanashree  Shingvi', 10006, '2020-11-21', '2020-11-21 02:00:24'),
(357, 20650038, 'Burhanuddin  Pedhiwala', 10020, '2020-11-21', '2020-11-21 09:19:05'),
(358, 53931358, 'Swapnil Govind Pawar', 10169, '2020-11-21', '2020-11-21 09:19:05'),
(361, 47519491, 'Jacob  Boopalan', 24430, '2020-11-21', '2020-11-21 09:19:05'),
(362, 71794585, 'Yamini  Sawant', 10014, '2020-11-21', '2020-11-21 09:19:05'),
(363, 72101584, 'Nikhil  Mehta', 10062, '2020-11-21', '2020-11-21 09:19:05'),
(364, 26715780, 'Sunil  Agarwal', 10286, '2020-11-21', '2020-11-21 09:19:05'),
(365, 41899639, 'Vaibhav Vasant Munot', 2001, '2020-11-21', '2020-11-21 09:19:05'),
(366, 63446798, 'Azhar  Tambuwala', 12707, '2020-11-21', '2020-11-21 09:19:05'),
(367, 22171131, 'Ravi Kanth Gollapudi', 30337, '2020-11-21', '2020-11-21 09:19:05'),
(368, 70505349, 'Pooja  Oswal', 11268, '2020-11-21', '2020-11-21 09:19:05'),
(369, 38591360, 'Venkata  Subbarao Tripuramallu', 21105, '2020-11-21', '2020-11-21 09:19:05'),
(370, 30228090, 'SRIRAM  MAHADEVAN', 5150, '2020-11-21', '2020-11-21 09:19:05'),
(371, 41486162, 'Rama  Vedashree', 16013, '2020-11-21', '2020-11-21 09:19:05'),
(372, 20184809, 'Gaurav  Verma', 9644, '2020-11-21', '2020-11-21 09:19:05'),
(373, 38304790, 'Ruby  Manuja', 15023, '2020-11-21', '2020-11-21 09:19:05'),
(374, 65382454, 'Rajesh  Narayan', 32059, '2020-11-21', '2020-11-21 09:19:05'),
(375, 68457515, 'Priyanka Pal Mantri', 10010, '2020-11-21', '2020-11-21 09:19:05'),
(376, 23879300, 'Shyamak  Das', 27899, '2020-11-21', '2020-11-21 09:19:05'),
(377, 45426027, 'Khuzema Shabbir Hyderabadwala', 8228, '2020-11-21', '2020-11-21 09:19:05'),
(378, 72391463, 'Reema Nitin Mehta', 8728, '2020-11-21', '2020-11-21 09:19:05'),
(379, 66176715, 'Rahul M Agrawal', 8704, '2020-11-21', '2020-11-21 09:19:05'),
(380, 32062334, 'Kumar Gulabrao Ghadage', 9529, '2020-11-21', '2020-11-21 09:19:05'),
(381, 36620981, 'Akshay Chandrashekhar  Aiyar', 18017, '2020-11-21', '2020-11-21 09:19:05'),
(382, 7586730, 'Shshank  Pundir', 12006, '2020-11-18', '2020-11-21 09:23:00'),
(383, 71794585, 'Yamini  Sawant', 9990, '2020-11-18', '2020-11-21 09:23:00'),
(384, 26715780, 'Sunil  Agarwal', 25142, '2020-11-18', '2020-11-21 09:23:00'),
(385, 41899639, 'Vaibhav Vasant Munot', 7010, '2020-11-18', '2020-11-21 09:23:00'),
(386, 32210107, 'Ursula  Edginton', 9976, '2020-11-18', '2020-11-21 09:23:00'),
(387, 46315861, 'Uma  Valluri', 6397, '2020-11-18', '2020-11-21 09:23:00'),
(388, 72237854, 'Jhansi  Lakshmi', 8865, '2020-11-18', '2020-11-21 09:23:00'),
(389, 44883482, 'Nilesh  Oswal', 10668, '2020-11-18', '2020-11-21 09:23:00'),
(390, 10212736, 'Sangeeta  Saikia', 10351, '2020-11-18', '2020-11-21 09:23:00'),
(391, 70505349, 'Pooja  Oswal', 20079, '2020-11-18', '2020-11-21 09:23:00'),
(392, 41965594, 'Keith  MacIntosh', 11208, '2020-11-18', '2020-11-21 09:23:00'),
(393, 72066847, 'Ramesh  T', 10016, '2020-11-18', '2020-11-21 09:23:00'),
(394, 72088597, 'Radhakrishna  Reddy Mandala', 7890, '2020-11-18', '2020-11-21 09:23:00'),
(395, 65706702, 'Ayush  B. Singh', 5002, '2020-11-18', '2020-11-21 09:23:01'),
(396, 20184809, 'Gaurav  Verma', 13510, '2020-11-18', '2020-11-21 09:23:01'),
(397, 36620981, 'Akshay Chandrashekhar  Aiyar', 8010, '2020-11-18', '2020-11-21 09:23:01'),
(398, 20882554, 'Kavitha  Kanaparthi', 378, '2020-11-19', '2020-11-21 09:23:14'),
(399, 24676616, 'Ramit  Wadhwa', 16025, '2020-11-19', '2020-11-21 09:23:14'),
(400, 72249853, 'Chethana  Kanaparthi', 25254, '2020-11-19', '2020-11-21 09:23:14'),
(401, 72237854, 'Jhansi  Lakshmi', 9742, '2020-11-19', '2020-11-21 09:23:14'),
(402, 8104078, 'Anirudha  Athani', 18744, '2020-11-19', '2020-11-21 09:23:14'),
(403, 10212736, 'Sangeeta  Saikia', 7550, '2020-11-19', '2020-11-21 09:23:14'),
(405, 41965594, 'Keith  MacIntosh', 11706, '2020-11-19', '2020-11-21 09:23:14'),
(406, 65706702, 'Ayush  B. Singh', 16139, '2020-11-19', '2020-11-21 09:23:14'),
(407, 63959155, 'Sandhya  Rao', 27473, '2020-11-19', '2020-11-21 09:23:14'),
(408, 20184809, 'Gaurav  Verma', 4847, '2020-11-19', '2020-11-21 09:23:14'),
(409, 72391463, 'Reema Nitin Mehta', 9458, '2020-11-19', '2020-11-21 09:23:14'),
(410, 36294819, 'DR.RAKESH K JAIN', 42248, '2020-11-19', '2020-11-21 09:23:14'),
(411, 32062334, 'Kumar Gulabrao Ghadage', 10030, '2020-11-19', '2020-11-21 09:23:14'),
(412, 7454026, 'Alfredo  Miranda', 2010, '2020-11-20', '2020-11-21 09:23:29'),
(413, 20882554, 'Kavitha  Kanaparthi', 4250, '2020-11-20', '2020-11-21 09:23:29'),
(414, 20186489, 'Sujit  kispotta', 1984, '2020-11-20', '2020-11-21 09:23:29'),
(415, 32210107, 'Ursula  Edginton', 9114, '2020-11-20', '2020-11-21 09:23:29'),
(416, 46315861, 'Uma  Valluri', 16115, '2020-11-20', '2020-11-21 09:23:29'),
(417, 72237854, 'Jhansi  Lakshmi', 5097, '2020-11-20', '2020-11-21 09:23:29'),
(418, 41965594, 'Keith  MacIntosh', 16180, '2020-11-20', '2020-11-21 09:23:29'),
(419, 72066847, 'Ramesh  T', 16234, '2020-11-20', '2020-11-21 09:23:29'),
(420, 50922565, 'Phani Raj  K', 10733, '2020-11-20', '2020-11-21 09:23:29'),
(421, 72088597, 'Radhakrishna  Reddy Mandala', 5635, '2020-11-20', '2020-11-21 09:23:30'),
(422, 63959155, 'Sandhya  Rao', 9160, '2020-11-20', '2020-11-21 09:23:30'),
(423, 14093840, 'Muffadal  Quettawala', 0, '2020-11-20', '2020-11-21 09:23:30'),
(424, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-20', '2020-11-21 09:23:30'),
(425, 72237071, 'Brian  Arganbright', 4001, '2020-11-17', '2020-11-21 10:15:56'),
(426, 72249853, 'Chethana  Kanaparthi', 15937, '2020-11-17', '2020-11-21 10:15:56'),
(427, 72237854, 'Jhansi  Lakshmi', 651, '2020-11-17', '2020-11-21 10:15:56'),
(428, 44883482, 'Nilesh  Oswal', 10000, '2020-11-17', '2020-11-21 10:15:56'),
(429, 10212736, 'Sangeeta  Saikia', 16128, '2020-11-17', '2020-11-21 10:15:56'),
(430, 70505349, 'Pooja  Oswal', 12042, '2020-11-17', '2020-11-21 10:15:56'),
(431, 72099162, 'Sheetal  Oswal', 10029, '2020-11-17', '2020-11-21 10:15:56'),
(432, 41965594, 'Keith  MacIntosh', 16593, '2020-11-17', '2020-11-21 10:15:56'),
(433, 72086454, 'Naresh   Muthireddy', 7640, '2020-11-17', '2020-11-21 10:15:56'),
(434, 72088597, 'Radhakrishna  Reddy Mandala', 16005, '2020-11-17', '2020-11-21 10:15:56'),
(435, 36620981, 'Akshay Chandrashekhar  Aiyar', 16008, '2020-11-17', '2020-11-21 10:15:56'),
(436, 62361912, 'Dhanashree  Shingvi', 10021, '2020-11-14', '2020-11-21 11:32:17'),
(437, 20650038, 'Burhanuddin  Pedhiwala', 10011, '2020-11-14', '2020-11-21 11:32:17'),
(438, 53931358, 'Swapnil Govind Pawar', 6212, '2020-11-14', '2020-11-21 11:32:17'),
(439, 71794585, 'Yamini  Sawant', 5064, '2020-11-14', '2020-11-21 11:32:17'),
(440, 44883482, 'Nilesh  Oswal', 10266, '2020-11-14', '2020-11-21 11:32:17'),
(441, 10212736, 'Sangeeta  Saikia', 13612, '2020-11-14', '2020-11-21 11:32:17'),
(442, 72099162, 'Sheetal  Oswal', 10104, '2020-11-14', '2020-11-21 11:32:17'),
(443, 72088597, 'Radhakrishna  Reddy Mandala', 16566, '2020-11-14', '2020-11-21 11:32:17'),
(444, 65706702, 'Ayush  B. Singh', 5063, '2020-11-14', '2020-11-21 11:32:17'),
(445, 41486162, 'Rama  Vedashree', 12552, '2020-11-14', '2020-11-21 11:32:17'),
(446, 20184809, 'Gaurav  Verma', 23011, '2020-11-14', '2020-11-21 11:32:17'),
(447, 36620981, 'Akshay Chandrashekhar  Aiyar', 18007, '2020-11-14', '2020-11-21 11:32:17'),
(448, 20882554, 'Kavitha  Kanaparthi', 16304, '2020-11-15', '2020-11-21 11:32:46'),
(449, 62361912, 'Dhanashree  Shingvi', 10005, '2020-11-15', '2020-11-21 11:32:46'),
(450, 20650038, 'Burhanuddin  Pedhiwala', 10003, '2020-11-15', '2020-11-21 11:32:46'),
(451, 53931358, 'Swapnil Govind Pawar', 15411, '2020-11-15', '2020-11-21 11:32:46'),
(452, 71794585, 'Yamini  Sawant', 10001, '2020-11-15', '2020-11-21 11:32:46'),
(453, 32210107, 'Ursula  Edginton', 9973, '2020-11-15', '2020-11-21 11:32:47'),
(454, 72237071, 'Brian  Arganbright', 1801, '2020-11-15', '2020-11-21 11:32:47'),
(455, 72237854, 'Jhansi  Lakshmi', 201, '2020-11-15', '2020-11-21 11:32:47'),
(456, 44883482, 'Nilesh  Oswal', 10059, '2020-11-15', '2020-11-21 11:32:47'),
(457, 10212736, 'Sangeeta  Saikia', 14434, '2020-11-15', '2020-11-21 11:32:47'),
(458, 41965594, 'Keith  MacIntosh', 13127, '2020-11-15', '2020-11-21 11:32:47'),
(459, 72086454, 'Naresh   Muthireddy', 7755, '2020-11-15', '2020-11-21 11:32:47'),
(460, 8640528, 'Jujjavarapu Siva Rama Krishna Prasad', 158140, '2020-11-15', '2020-11-21 11:32:47'),
(461, 20184809, 'Gaurav  Verma', 10009, '2020-11-15', '2020-11-21 11:32:47'),
(462, 65382454, 'Rajesh  Narayan', 32436, '2020-11-15', '2020-11-21 11:32:47'),
(463, 62361912, 'Dhanashree  Shingvi', 10004, '2020-11-16', '2020-11-21 11:32:59'),
(464, 20650038, 'Burhanuddin  Pedhiwala', 10003, '2020-11-16', '2020-11-21 11:32:59'),
(465, 24676616, 'Ramit  Wadhwa', 15027, '2020-11-16', '2020-11-21 11:32:59'),
(466, 71794585, 'Yamini  Sawant', 10002, '2020-11-16', '2020-11-21 11:32:59'),
(467, 32210107, 'Ursula  Edginton', 4986, '2020-11-16', '2020-11-21 11:32:59'),
(468, 72237071, 'Brian  Arganbright', 7092, '2020-11-16', '2020-11-21 11:32:59'),
(469, 44883482, 'Nilesh  Oswal', 10026, '2020-11-16', '2020-11-21 11:32:59'),
(470, 10212736, 'Sangeeta  Saikia', 3940, '2020-11-16', '2020-11-21 11:32:59'),
(471, 70505349, 'Pooja  Oswal', 10129, '2020-11-16', '2020-11-21 11:32:59'),
(472, 72099162, 'Sheetal  Oswal', 10016, '2020-11-16', '2020-11-21 11:32:59'),
(473, 72088597, 'Radhakrishna  Reddy Mandala', 21405, '2020-11-16', '2020-11-21 11:32:59'),
(474, 65706702, 'Ayush  B. Singh', 5001, '2020-11-16', '2020-11-21 11:32:59'),
(475, 20184809, 'Gaurav  Verma', 11266, '2020-11-16', '2020-11-21 11:32:59'),
(476, 66176715, 'Rahul M Agrawal', 5045, '2020-11-16', '2020-11-21 11:32:59'),
(477, 36620981, 'Akshay Chandrashekhar  Aiyar', 10117, '2020-11-16', '2020-11-21 11:32:59'),
(478, 20534721, 'Raghav  Mantri', 9242, '2020-11-17', '2020-11-21 11:33:17'),
(479, 20534721, 'Raghav  Mantri', 9764, '2020-11-19', '2020-11-21 11:33:40'),
(480, 20534721, 'Raghav  Mantri', 8273, '2020-11-21', '2020-11-21 11:34:00'),
(481, 8104078, 'Anirudha  Athani', 25079, '2020-11-21', '2020-11-21 13:00:02'),
(482, 48991220, 'Leena R Mehta', 7045, '2020-11-21', '2020-11-21 13:00:02'),
(483, 63959155, 'Sandhya  Rao', 23791, '2020-11-21', '2020-11-21 13:00:02'),
(484, 20186489, 'Sujit  kispotta', 26140, '2020-11-21', '2020-11-21 16:30:01'),
(485, 48214033, 'Harish Gopal Tarikar', 12100, '2020-11-21', '2020-11-21 16:30:01'),
(486, 46315861, 'Uma  Valluri', 10576, '2020-11-21', '2020-11-21 16:30:01'),
(487, 72099162, 'Sheetal  Oswal', 10194, '2020-11-21', '2020-11-21 16:30:01'),
(488, 41965594, 'Keith  MacIntosh', 13382, '2020-11-21', '2020-11-21 16:30:01'),
(489, 72066847, 'Ramesh  T', 4233, '2020-11-21', '2020-11-21 16:30:01'),
(491, 63869822, 'Ankit  Dokania', 2479, '2020-11-21', '2020-11-21 16:30:01'),
(492, 20650038, 'Burhanuddin  Pedhiwala', 10005, '2020-11-22', '2020-11-22 05:30:01'),
(493, 53931358, 'Swapnil Govind Pawar', 11725, '2020-11-22', '2020-11-22 05:30:01'),
(494, 72101584, 'Nikhil  Mehta', 11555, '2020-11-22', '2020-11-22 05:30:01'),
(495, 26715780, 'Sunil  Agarwal', 17997, '2020-11-22', '2020-11-22 05:30:01'),
(496, 72114401, 'Harshal  Oswal', 18471, '2020-11-22', '2020-11-22 05:30:02'),
(497, 8104078, 'Anirudha  Athani', 8920, '2020-11-22', '2020-11-22 05:30:02'),
(498, 44883482, 'Nilesh  Oswal', 10076, '2020-11-22', '2020-11-22 05:30:02'),
(499, 22171131, 'Ravi Kanth Gollapudi', 20431, '2020-11-22', '2020-11-22 05:30:02'),
(500, 48991220, 'Leena R Mehta', 8010, '2020-11-22', '2020-11-22 05:30:02'),
(501, 70505349, 'Pooja  Oswal', 18155, '2020-11-22', '2020-11-22 05:30:02'),
(502, 72099162, 'Sheetal  Oswal', 10270, '2020-11-22', '2020-11-22 05:30:02'),
(503, 30228090, 'SRIRAM  MAHADEVAN', 12013, '2020-11-22', '2020-11-22 05:30:02'),
(504, 41486162, 'Rama  Vedashree', 11254, '2020-11-22', '2020-11-22 05:30:02'),
(506, 14093840, 'Muffadal  Quettawala', 43842, '2020-11-22', '2020-11-22 05:30:02'),
(507, 20184809, 'Gaurav  Verma', 20011, '2020-11-22', '2020-11-22 05:30:02'),
(508, 23879300, 'Shyamak  Das', 9653, '2020-11-22', '2020-11-22 05:30:02'),
(509, 45426027, 'Khuzema Shabbir Hyderabadwala', 17762, '2020-11-22', '2020-11-22 05:30:02'),
(510, 16307072, 'Ajay  Desai', 17409, '2020-11-22', '2020-11-22 05:30:02'),
(511, 72391463, 'Reema Nitin Mehta', 10162, '2020-11-22', '2020-11-22 05:30:02'),
(512, 32062334, 'Kumar Gulabrao Ghadage', 11431, '2020-11-22', '2020-11-22 05:30:02'),
(513, 24676616, 'Ramit  Wadhwa', 50033, '2020-11-21', '2020-11-22 06:10:13'),
(514, 32210107, 'Ursula  Edginton', 1619, '2020-11-21', '2020-11-22 06:10:13'),
(515, 72237071, 'Brian  Arganbright', 4957, '2020-11-21', '2020-11-22 06:10:13'),
(516, 44883482, 'Nilesh  Oswal', 9998, '2020-11-21', '2020-11-22 06:10:13'),
(518, 72086454, 'Naresh   Muthireddy', 10803, '2020-11-21', '2020-11-22 06:10:13'),
(519, 36294819, 'DR.RAKESH K JAIN', 156751, '2020-11-21', '2020-11-22 06:10:13'),
(520, 20882554, 'Kavitha  Kanaparthi', 21878, '2020-11-22', '2020-11-22 09:30:01'),
(522, 72320558, 'Simha Kanaparthi Sanjeevan', 1181, '2020-11-22', '2020-11-22 09:30:01'),
(524, 65706702, 'Ayush  B. Singh', 69069, '2020-11-22', '2020-11-22 12:30:02'),
(525, 66176715, 'Rahul M Agrawal', 11015, '2020-11-22', '2020-11-22 12:30:02'),
(526, 7454026, 'Alfredo  Miranda', 2009, '2020-11-22', '2020-11-22 16:30:01'),
(527, 62361912, 'Dhanashree  Shingvi', 7418, '2020-11-22', '2020-11-22 16:30:01'),
(528, 46315861, 'Uma  Valluri', 15808, '2020-11-22', '2020-11-22 16:30:01'),
(529, 10212736, 'Sangeeta  Saikia', 12943, '2020-11-22', '2020-11-22 16:30:01'),
(530, 41965594, 'Keith  MacIntosh', 13606, '2020-11-22', '2020-11-22 16:30:01'),
(531, 50922565, 'Phani Raj  K', 10534, '2020-11-22', '2020-11-22 16:30:01'),
(532, 63959155, 'Sandhya  Rao', 24370, '2020-11-22', '2020-11-22 16:30:01'),
(533, 36294819, 'DR.RAKESH K JAIN', 35924, '2020-11-22', '2020-11-22 16:30:01'),
(534, 71503391, 'Srija  Thanniru', 25287, '2020-11-23', '2020-11-23 05:30:01'),
(535, 20650038, 'Burhanuddin  Pedhiwala', 13166, '2020-11-23', '2020-11-23 05:30:01'),
(536, 39794119, 'Rohit  Singh', 8543, '2020-11-23', '2020-11-23 05:30:01'),
(537, 71794585, 'Yamini  Sawant', 10008, '2020-11-23', '2020-11-23 05:30:01'),
(538, 72101584, 'Nikhil  Mehta', 10305, '2020-11-23', '2020-11-23 05:30:01'),
(539, 72114401, 'Harshal  Oswal', 7803, '2020-11-23', '2020-11-23 05:30:01'),
(540, 44883482, 'Nilesh  Oswal', 10169, '2020-11-23', '2020-11-23 05:30:01'),
(541, 22171131, 'Ravi Kanth Gollapudi', 20440, '2020-11-23', '2020-11-23 05:30:01'),
(542, 10212736, 'Sangeeta  Saikia', 3270, '2020-11-23', '2020-11-23 05:30:01'),
(543, 70505349, 'Pooja  Oswal', 8176, '2020-11-23', '2020-11-23 05:30:01'),
(544, 72099162, 'Sheetal  Oswal', 10221, '2020-11-23', '2020-11-23 05:30:01'),
(545, 63959155, 'Sandhya  Rao', 14199, '2020-11-23', '2020-11-23 05:30:01'),
(546, 45426027, 'Khuzema Shabbir Hyderabadwala', 7394, '2020-11-23', '2020-11-23 05:30:01'),
(547, 36294819, 'DR.RAKESH K JAIN', 33171, '2020-11-23', '2020-11-23 05:30:01'),
(548, 32062334, 'Kumar Gulabrao Ghadage', 31009, '2020-11-23', '2020-11-23 05:30:01'),
(549, 36620981, 'Akshay Chandrashekhar  Aiyar', 10128, '2020-11-23', '2020-11-23 05:30:01'),
(550, 7586730, 'Shshank  Pundir', 100064, '2020-11-21', '2020-11-23 06:50:49'),
(551, 72616733, 'Navita  Shyam  Dharwadkar', 14476, '2020-11-21', '2020-11-23 06:50:49'),
(552, 44689629, 'Prikshit  Thakur', 62177, '2020-11-21', '2020-11-23 06:50:49'),
(553, 10212736, 'Sangeeta  Saikia', 31467, '2020-11-21', '2020-11-23 06:50:49'),
(554, 72088597, 'Radhakrishna  Reddy Mandala', 18375, '2020-11-21', '2020-11-23 06:50:49'),
(555, 72616733, 'Navita  Shyam  Dharwadkar', 15615, '2020-11-22', '2020-11-23 06:51:07'),
(556, 32210107, 'Ursula  Edginton', 6445, '2020-11-22', '2020-11-23 06:51:07'),
(557, 63446798, 'Azhar  Tambuwala', 31182, '2020-11-22', '2020-11-23 06:51:07'),
(558, 72066847, 'Ramesh  T', 6760, '2020-11-22', '2020-11-23 06:51:08'),
(559, 72086454, 'Naresh   Muthireddy', 38177, '2020-11-22', '2020-11-23 06:51:08'),
(560, 36620981, 'Akshay Chandrashekhar  Aiyar', 2355, '2020-11-22', '2020-11-23 06:51:08'),
(561, 53931358, 'Swapnil Govind Pawar', 2173, '2020-11-23', '2020-11-23 09:30:02'),
(562, 45218665, 'ALI LAKDAWALA AKBER', 8148, '2020-11-23', '2020-11-23 09:30:02'),
(563, 68457515, 'Priyanka Pal Mantri', 0, '2020-11-23', '2020-11-23 09:30:02'),
(564, 25012554, 'Rakesh  Chawat', 12065, '2020-11-23', '2020-11-23 09:30:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculated_data`
--
ALTER TABLE `calculated_data`
  ADD PRIMARY KEY (`dt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculated_data`
--
ALTER TABLE `calculated_data`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
