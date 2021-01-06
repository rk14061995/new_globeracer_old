-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2020 at 10:38 AM
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
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id_table` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_type` enum('Normal','NGO','Coaches_Nutritionist','Admin') NOT NULL,
  `profile_picture` text,
  `country_code` varchar(10) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `fb_id` varchar(100) DEFAULT NULL,
  `sign_up_type` enum('Normal','Google','Facebook') NOT NULL,
  `resource_state` varchar(10) DEFAULT NULL,
  `profile_completion_status` int(11) NOT NULL COMMENT '1: Completed 0: In Complete',
  `firstname` varchar(100) DEFAULT NULL,
  `middle_name` varchar(200) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `login_type` enum('Normal','Google','Facebook') DEFAULT NULL,
  `token_type` varchar(255) DEFAULT NULL,
  `expires_at` varchar(255) DEFAULT NULL,
  `expires_in` varchar(255) DEFAULT NULL,
  `refresh_token` text,
  `access_token` text,
  `total_distance_covered` double NOT NULL,
  `total_elevation_gain` float NOT NULL,
  `longest_ride` float NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `full_address` varchar(255) NOT NULL,
  `zip_code` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `emg_cont_name` varchar(150) NOT NULL,
  `emg_cont_no` varchar(12) NOT NULL,
  `sex` enum('Male','Female','Other','PreferSay') DEFAULT NULL,
  `d_o_b` varchar(50) DEFAULT NULL,
  `premium` varchar(100) DEFAULT NULL,
  `summit` varchar(100) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `profile_medium` text,
  `profile` text,
  `friend` text,
  `follower` text,
  `data_updated_at` varchar(100) DEFAULT NULL,
  `data_inserted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id_table`, `user_id`, `username`, `user_type`, `profile_picture`, `country_code`, `contact_no`, `google_id`, `fb_id`, `sign_up_type`, `resource_state`, `profile_completion_status`, `firstname`, `middle_name`, `lastname`, `user_email`, `user_password`, `login_type`, `token_type`, `expires_at`, `expires_in`, `refresh_token`, `access_token`, `total_distance_covered`, `total_elevation_gain`, `longest_ride`, `city`, `state`, `country`, `full_address`, `zip_code`, `blood_group`, `emg_cont_name`, `emg_cont_no`, `sex`, `d_o_b`, `premium`, `summit`, `created_at`, `profile_medium`, `profile`, `friend`, `follower`, `data_updated_at`, `data_inserted_at`) VALUES
(2, 70411320, NULL, 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', '2', 0, 'Shubham', '', 'Bhatt', 'pandeygreen5@gmail.com', 'cmFodWxAMTIz', 'Normal', 'Bearer', '1604316051', '21600', '9b1ae673c4900ddfd493ff78da7d7a8c342fd3a0', 'c1f6bdb17bf57c85b2a0c19b68363af682981e53', 149, 0, 148.8, NULL, NULL, NULL, '', '', '', '', '', '', '1995-05-12', '0', '0', '2020-10-16T11:37:20Z', 'https://lh3.googleusercontent.com/a-/AOh14GieJqIcOWPhlnWdNjdybAFTF3T5hi55F6LmjqEGMw=s96-c', 'https://lh3.googleusercontent.com/a-/AOh14GieJqIcOWPhlnWdNjdybAFTF3T5hi55F6LmjqEGMw=s96-c', NULL, NULL, '2020-10-22 07-45-23', '2020-10-17 06:39:19'),
(3, 70411297, 'md_kaif', 'Admin', NULL, '', '', NULL, NULL, 'Normal', '2', 0, 'Global', '', 'Racers', 'kaif@gmail.com', 'cmFodWxAMTIz', 'Normal', 'Bearer', '1604503735', '21599', 'c023384fe8b0085839dede04e0f6e7c3d35ac436', '5e2101df5153cef4ab8ffdbf3390e07896f05fba', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0', '0', '2020-10-16T11:36:47Z', 'https://lh3.googleusercontent.com/a-/AOh14Gha0wl9j0NNHTQHzB6sg6M2ByN_zWZyzHPtJF-rPw=s96-c', 'https://lh3.googleusercontent.com/a-/AOh14Gha0wl9j0NNHTQHzB6sg6M2ByN_zWZyzHPtJF-rPw=s96-c', NULL, NULL, '2020-10-26 05-51-31', '2020-10-17 06:40:17'),
(5, 70453466, 'sayyedsafder_ali', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', '2', 0, 'sayyed safder', '', 'ali', 'ali@gmail.com', 'cmFodWxAMTIz', 'Normal', 'Bearer', '1603455115', '21600', '8e38e28c3e69f6b2b627c2558e0587b7bca57ddf', '3e9b0c959ab7b7add9175dd221179ca30c4a38af', 17453, 381, 17452.9, NULL, NULL, NULL, '', '', '', '', '', NULL, '0', '0', '0', '2020-10-17T06:45:55Z', 'https://lh6.googleusercontent.com/-2IRXl6w-WdY/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnqyDgTbTk34bBNgxz-HTmDfSzufQ/s96-c/photo.jpg', 'https://lh6.googleusercontent.com/-2IRXl6w-WdY/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnqyDgTbTk34bBNgxz-HTmDfSzufQ/s96-c/photo.jpg', NULL, NULL, '2020-10-23 06-12-53', '2020-10-17 06:46:03'),
(18, 64904441, 'globeracersglobal', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', '2', 0, NULL, '', NULL, NULL, NULL, NULL, 'Bearer', '1603749584', '21600', '25ed907043ccd8f12a0b63147af929e0a16afbe3', '9cb5b925503844f0d1d6de9ead403c68f917c501', 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, '0', '0', '2020-07-28T00:53:14Z', 'https://dgalywyr863hv.cloudfront.net/pictures/athletes/64904441/16313078/1/medium.jpg', 'https://dgalywyr863hv.cloudfront.net/pictures/athletes/64904441/16313078/1/large.jpg', NULL, NULL, '2020-10-26 05-24-26', '2020-10-26 15:59:44'),
(22, NULL, 'New Account', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'self@gmail.com', 'c2VsZkAxMjM=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 05:19:24'),
(30, NULL, 'Aman', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'amangroover@gmail.com', 'MTIzNDU2Nzg=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 21:12:00'),
(31, 70407796, NULL, 'Normal', 'https://lh4.googleusercontent.com/-WOz2V--Qw3M/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclo4ts32F_3xKZRl8Dxh6bk5t3yLA/s96-c/photo.jpg', '', '2222222222', '113254395711876641347', NULL, 'Google', '2', 1, 'global', 'STreet', 'racer', 'globalracer2020@gmail.com', 'cmFodWxAMTIz', NULL, 'Bearer', '1604405267', '21600', 'db1fea7be6052eaca33ec457158b2426ac2787d5', '87ce7a48c874aa44c1f378ce77f94bd4209901d5', 1806684, 0, 1000, 'Dehra Dun', 'Uttarakhand', 'India', 'sdfsfs fsfsd sdfsf sdfsfsdf', '248002', 'O+', 'sara', '01321421234', 'Male', '2010-07-16', '0', '0', NULL, NULL, NULL, NULL, NULL, '2020-11-02 04-55-39', '2020-10-31 05:14:26'),
(32, NULL, 'abhishek', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'abhishek@greenusys.com', 'YXNkQDA5MA==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 05:54:54'),
(33, NULL, 'abhishek', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'abhishek@greenusys.com', 'YXNkQDkwOTA=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 05:56:58'),
(34, NULL, 'renasirmans8930', 'Coaches_Nutritionist', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 12:59:50'),
(35, NULL, 'renasirmans8930', 'NGO', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 22:11:40'),
(36, NULL, 'renasirmans8930', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 01:10:59'),
(37, NULL, 'josefmonds4', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'joker24@exnik.com', 'bk5lUE5ROFM5', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-03 10:02:24'),
(38, NULL, 'loisdipietro68', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'mobiqrcode@gmail.com', 'cGpUNFJHU2IxeA==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 00:26:45'),
(39, NULL, 'Globe Admin', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 1, NULL, '', NULL, 'info@globeracers.com', 'Z2xvYmVAQEAzMjE=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 06:44:46'),
(40, NULL, 'sharylripley4', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'rozochka_katrenko@mail.ru', 'TDJOMllmWk0=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 18:06:49'),
(41, NULL, 'renasirmans8930', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 01:35:12'),
(42, NULL, 'renasirmans8930', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 11:37:00'),
(43, NULL, 'issacg095660', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'gilbertojerome@mcdrives.com', 'QVkwM0JmbFM=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 11:40:54'),
(44, NULL, 'Test Account For None Existing User', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'abcde@gmail.com', 'ZGVtb0A5MDkw', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 12:28:50'),
(45, NULL, 'renasirmans8930', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 15:33:56'),
(46, NULL, 'renasirmans8930', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-05 18:16:22'),
(47, NULL, 'renasirmans8930', 'Coaches_Nutritionist', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 00:55:48'),
(48, NULL, 'sharoneiu599512', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'tobi@j.thailandresort.asia', 'TndlZzFCZVFJbw==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 04:22:33'),
(49, NULL, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GhXi6tDRn1Hw23xZ51qM8lbQJOJ-1UX-xglKOd2sg=s96-c', '', NULL, '106303356325465910661', NULL, 'Google', NULL, 0, 'Aman', '', 'Grover', 'amangroover@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 05:35:05'),
(50, NULL, 'Aman WW', 'Normal', NULL, '', '', NULL, NULL, 'Normal', NULL, 1, 'Aman', '', 'Grover', 'aman@wastewarriors.org', 'YW1hbmdyb3Zlcg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 05:57:37'),
(51, 53931358, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GhR8WaoMA6N0uUc90ID_uVo8uQwZp0xjXbefLzc-Q=s96-c', '', '9762436649', '115174147378782247932', NULL, 'Google', '2', 1, 'Swapnil', 'Govind', 'Pawar', 'pawar.swapnilg@gmail.com', NULL, NULL, 'Bearer', '1604664175', '21600', 'befb924142eda6c112e727098ae5898bc3af289f', 'ca41b81b0b15b940fe11b8b4706da4527f209634', 0, 0, 0, 'Pune', 'Maharashtra', 'India', '', '411048', 'O+', '9881507010', '9405027860', 'Male', '1972-02-04', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 06:01:54'),
(52, NULL, 'Testing', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'aatmbodh1@gmail.com', 'Y3JlYXRpdmUwMDI=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 07:11:13'),
(53, NULL, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GiP5unSjVx-TYCbJnzXIaZoC5ubu66qldq0WCq4-A=s96-c', '', NULL, '117298763580220662342', NULL, 'Google', NULL, 0, 'Aatm', '', 'bodh', 'aatmbodh1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 07:11:27'),
(62, NULL, 'Parveen global Dahiya', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'admin@admin.com', 'c2Rmc2Q=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 12:18:43'),
(63, NULL, 'Harikiruban', '', NULL, '', '8056970242', NULL, NULL, 'Normal', NULL, 1, 'Harikiruban.k', 'Hari', 'Kiruban', 'harishpanther6666@gmail.com', 'QU1NQUFQUEE=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'Pandalur', 'Tamil Nadu', 'India', '12/159, pandalur, kovamulla the Nilgiris', '643233', 'O+ve', 'Hari kiruban.k', '8056970242', 'Male', '2005-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 13:04:17'),
(65, NULL, 'global STreet racer', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'preferapp00@gmail.com', 'cmFodWxAMTIz', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 16:11:12'),
(66, NULL, 'Kavitha  Kanaparthi', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'ksimmsimm@gmail.com', 'YnZjc3dh', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 16:16:08'),
(67, NULL, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GiMCQILucB4MnyDHYUpFtl6juuYT0i2LGEapalT=s96-c', '', NULL, '103912473740483346577', NULL, 'Google', NULL, 0, 'Aman', '', 'Grover', 'aman@wastewarriors.org', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 16:38:22'),
(68, NULL, 'renasirmans8930', 'Admin', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 19:58:02'),
(69, NULL, 'rob75844007', 'Normal', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'maurinebadeflrd@yahoo.com', 'SUVXM2dmTmU=', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-07 01:14:55'),
(70, 25742405, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GhuwzGsWY-Hs7t5GtwFDo6pqaqwwWQL299s3cvLM5I=s96-c', '', NULL, '103331141956943346545', NULL, 'Google', '2', 0, 'Sudeep', '', 'Anurag', 'sudeepanurag@gmail.com', NULL, NULL, 'Bearer', '1604747272', '21600', '6b466631932da6c8373c6bc758e77fb8b46ab700', 'c66ff00236e4e5e3cdf56b66fdcaa5dfeb53df3b', 6765960, 25030, 200998, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, '2020-11-07 05-08-09', '2020-11-07 05:07:22'),
(71, NULL, 'renasirmans8930', 'NGO', NULL, '', NULL, NULL, NULL, 'Normal', NULL, 0, NULL, '', NULL, 'katherine@c.indiatravel.network', 'MHJuR0I2cEhHVg==', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-07 05:48:55'),
(72, 24676616, NULL, 'Normal', 'https://lh3.googleusercontent.com/a-/AOh14GhvLm0egNo4foVG7lWyv0DRGyiCfsDo_fpSHi8tOQ=s96-c', '', NULL, '109351608087532431166', NULL, 'Google', '2', 0, 'Ramit', '', 'Wadhwa', 'ramit.wadhwa@gmail.com', NULL, NULL, 'Bearer', '1604760206', '21600', 'a1bee64efdef93576e48f0bd951ffe447f11a40f', 'f049d362d1462c2d3bcef9f5ba2d46753d581302', 8973142, 3759, 115569, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, '2020-11-07 08-45-55', '2020-11-07 08:42:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id_table`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
