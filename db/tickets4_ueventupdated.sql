-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2019 at 11:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create Database `t4u`;

use t4u;
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_ref` varchar(100) NOT NULL,
  `available_balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `account_ref`, `available_balance`, `created_at`, `updated_at`) VALUES
(13, 'Jo sha', '708899536', 6795, '2019-04-08 13:44:19', '0000-00-00 00:00:00'),
(14, 'Pamito', '711000000', 0, '2019-04-09 12:33:59', '0000-00-00 00:00:00'),
(15, 'Lucas', '701111111', 0, '2019-04-09 13:35:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-off & 1-on',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sports', 1, '2018-10-12 06:46:23', '0000-00-00 00:00:00'),
(3, 'Concerts', 1, '2019-03-26 09:20:48', '0000-00-00 00:00:00'),
(4, 'Theaters', 1, '2019-03-26 09:20:48', '0000-00-00 00:00:00'),
(5, 'Parties', 1, '2019-03-26 09:21:15', '0000-00-00 00:00:00'),
(6, 'Communities', 1, '2019-03-26 09:21:15', '0000-00-00 00:00:00'),
(7, 'Classes', 1, '2019-03-26 09:21:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(15) UNSIGNED NOT NULL,
  `account_id` int(15) NOT NULL,
  `ipay_commission` float NOT NULL DEFAULT '8' COMMENT '%',
  `event_title` varchar(40) NOT NULL,
  `event_venue` varchar(40) NOT NULL,
  `event_coodinates` varchar(40) NOT NULL,
  `event_date` date NOT NULL,
  `event_status` int(3) NOT NULL,
  `event_free` int(3) NOT NULL,
  `event_category_id` int(15) NOT NULL,
  `event_created_by` varchar(199) NOT NULL,
  `event_promoted` int(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `account_id`, `ipay_commission`, `event_title`, `event_venue`, `event_coodinates`, `event_date`, `event_status`, `event_free`, `event_category_id`, `event_created_by`, `event_promoted`, `created_at`, `updated_at`) VALUES
(1, 13, 8, 'Test delete', 'Mada', 'Mada', '2019-04-10', 1, 1, 3, 'jo@gmail.com', 0, '2019-04-09 08:19:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_Assets`
--

CREATE TABLE `event_Assets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `video` text NOT NULL,
  `sponsor_logo` text NOT NULL,
  `slider_image` blob NOT NULL,
  `cover_image` text NOT NULL,
  `event_description` text NOT NULL,
  `snapshots` text COMMENT 'json with image & description',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_Assets`
--

INSERT INTO `event_Assets` (`id`, `event_id`, `video`, `sponsor_logo`, `slider_image`, `cover_image`, `event_description`, `snapshots`, `created_at`, `updated_at`) VALUES
(12, 13, '', '', 0x687474703a2f2f6c6f63616c686f73742f6465762f7469636b65743475732f6173736574732f75706c6f6164732f37633532633338376432386535653931643734383333613665646162313434612e706e67, 'http://localhost/dev/ticket4us/assets/uploads/81e49183f90538dc99df16bf08b26060.png', 'rfded dgh fgd<br>', NULL, '2019-04-08 13:47:06', '0000-00-00 00:00:00'),
;

-- --------------------------------------------------------

--
-- Table structure for table `event_recon`
--

CREATE TABLE `event_recon` (
  `id` int(11) NOT NULL,
  `vid` varchar(50) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ipay_ref` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_recon`
--

INSERT INTO `event_recon` (`id`, `vid`, `session_id`, `reference`, `amount`, `channel`, `account_no`, `status`, `ipay_ref`, `created_at`, `updated_at`) VALUES
(1, 'test', '0727721659', '8962c549cd5ec54', 420, 'mpesa', '254727721659', 'PENDING', '', '2019-03-13 07:23:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets_types`
--

CREATE TABLE `event_tickets_types` (
  `id` int(11) NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `ticket_type` varchar(255) NOT NULL COMMENT 'vip, vvip',
  `amount` int(11) NOT NULL,
  `total_tickets` varchar(50) NOT NULL DEFAULT 'NA',
  `available_tickets` varchar(50) NOT NULL DEFAULT 'NA',
  `ticket_close_on` varchar(50) NOT NULL DEFAULT 'NA',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sell_ticket`
--

CREATE TABLE `sell_ticket` (
  `id` int(11) NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `ticket_amount` int(11) NOT NULL,
  `ticket_type` text NOT NULL COMMENT 'vip, vvip',
  `clientName` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `used_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not',
  `transaction_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sell_ticket`
--

INSERT INTO `sell_ticket` (`id`, `event_id`, `number_of_tickets`, `ticket_amount`, `ticket_type`, `clientName`, `phone`, `email`, `order_id`, `serial_number`, `used_status`, `transaction_status`, `created_at`, `updated_at`) VALUES
(18, 3, 3, 54, 'cbfv', 'Joan Sha', '0708899536', 'joan@ipayafrica.com', 'c9375', 'facbce09', 0, 'PENDING', '2019-04-10 04:57:51', '0000-00-00 00:00:00'),
(19, 11, 3, 1231, 'sdfds', 'Joan Sha', '7867865875', 'joan@ipayafrica.com', '5fdef', '5a54d4f0', 0, 'PENDING', '2019-04-10 05:04:24', '0000-00-00 00:00:00'),
(20, 11, 6, 1231, 'sdfds', 'Joan Sha', '0708899536', 'joan@ipayafrica.com', 'c5e43', '80d8ebb4', 0, 'SUCCESS', '2019-04-10 05:47:37', '0000-00-00 00:00:00'),
(21, 7, 4, 3242, 'VIP changed', 'you', '7867865875', 'joan@ipayafrica.com', 'd553a', 'e3a2ca17', 0, 'PENDING', '2019-04-10 08:56:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '1' COMMENT '1-scantickets, 2-createevents, 3-all',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_id`, `user_name`, `user_phone`, `user_email`, `user_password`, `user_role`, `created_at`, `updated_at`) VALUES
(13, 13, 'Jo sha', '708899536', 'jo@gmail.com', '6b6dd886de4f120e571a9801cfccb633', 3, '2019-04-08 13:44:19', '0000-00-00 00:00:00'),
(14, 14, 'Pamito', '711000000', 'pam@gmail.com', '6b6dd886de4f120e571a9801cfccb633', 1, '2019-04-09 12:33:59', '0000-00-00 00:00:00'),
(15, 15, 'Lucas', '701111111', 'luke@yahoo.com', '6b6dd886de4f120e571a9801cfccb633', 3, '2019-04-09 13:35:57', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_name` (`account_ref`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_Assets`
--
ALTER TABLE `event_Assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_id` (`event_id`);

--
-- Indexes for table `event_recon`
--
ALTER TABLE `event_recon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Indexes for table `event_tickets_types`
--
ALTER TABLE `event_tickets_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_id_tickets` (`event_id`);

--
-- Indexes for table `sell_ticket`
--
ALTER TABLE `sell_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_id_sell` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `event_Assets`
--
ALTER TABLE `event_Assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `event_recon`
--
ALTER TABLE `event_recon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_tickets_types`
--
ALTER TABLE `event_tickets_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `sell_ticket`
--
ALTER TABLE `sell_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
