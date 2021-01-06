-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2020 at 10:12 AM
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
-- Database: `globecwv_globrac`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp8m_wc_product_meta_lookup`
--

CREATE TABLE `wp8m_wc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `virtual` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `min_price` decimal(19,4) DEFAULT NULL,
  `max_price` decimal(19,4) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT '0',
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT '0',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `total_sales` bigint(20) DEFAULT '0',
  `tax_status` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT 'taxable',
  `tax_class` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp8m_wc_product_meta_lookup`
--

INSERT INTO `wp8m_wc_product_meta_lookup` (`product_id`, `sku`, `virtual`, `downloadable`, `min_price`, `max_price`, `onsale`, `stock_quantity`, `stock_status`, `rating_count`, `average_rating`, `total_sales`, `tax_status`, `tax_class`) VALUES
(3786, '113', 0, 0, 115.0000, 115.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(3798, '113-1', 0, 0, 115.0000, 115.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(3800, '113-1', 0, 0, 115.0000, 115.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(3802, '113-1', 0, 0, 115.0000, 115.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(2421, '110', 0, 0, 45.0000, 45.0000, 0, NULL, 'instock', 0, 0.00, 2, 'taxable', ''),
(3929, '', 0, 0, 10000.0000, 10000.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(3947, '', 0, 0, 7000.0000, 7000.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(3948, '', 0, 0, 5000.0000, 5000.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4007, '', 0, 0, 4125.0000, 4125.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4009, '', 0, 0, 4000.0000, 4000.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4011, '', 0, 0, 4000.0000, 4000.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4012, '', 0, 0, 4125.0000, 4125.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4019, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 20, 'taxable', ''),
(4020, '', 0, 0, 50.0000, 75.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4022, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4024, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4046, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4044, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4045, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4048, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4049, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4050, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4074, '', 0, 0, 75.0000, 75.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4075, '', 0, 0, 75.0000, 75.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4076, '', 0, 0, 50.0000, 50.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4077, '', 0, 0, 75.0000, 75.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4078, '', 0, 0, 75.0000, 75.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4079, '', 0, 0, 50.0000, 50.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4080, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4081, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4082, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4083, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4084, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4085, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4086, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4087, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4088, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4089, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4090, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4091, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4092, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4093, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4096, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4097, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4098, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4099, '', 0, 0, 12.0000, 12.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4417, '', 1, 0, 1.3200, 1.3200, 0, NULL, 'instock', 0, 0.00, 1, 'taxable', ''),
(4420, '', 0, 0, 1.3200, 1.3200, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4552, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4553, '', 0, 0, 8.0000, 8.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4757, '', 0, 0, 10.0000, 10.0000, 0, NULL, 'instock', 0, 0.00, 47, 'taxable', ''),
(5192, '', 0, 0, 0.0000, 0.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', ''),
(4797, '', 0, 0, 0.0000, 0.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent'),
(4904, '', 0, 0, 10.0000, 10.0000, 0, NULL, 'instock', 0, 0.00, 0, 'taxable', 'parent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp8m_wc_product_meta_lookup`
--
ALTER TABLE `wp8m_wc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
