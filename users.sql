-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2018 at 12:57 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_status` int(1) NOT NULL,
  `account_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_attach` int(2) NOT NULL,
  `account_lock` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balancer`
--

CREATE TABLE `balancer` (
  `balancer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `coind_symbol` int(255) NOT NULL,
  `balancer_private` float(10,8) NOT NULL,
  `balancer_trader` float(10,8) NOT NULL,
  `balancer_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `balancer_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coind_service`
--

CREATE TABLE `coind_service` (
  `coind_id` int(11) NOT NULL,
  `coind_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_rpc_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_rpc_port` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_rpc_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_rpc_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_algorithm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_wallet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coind_min_fee` float(10,8) NOT NULL,
  `coind_fee` float(10,8) NOT NULL,
  `coind_trade_min` float(10,8) NOT NULL,
  `coind_trade_fee` float(10,8) NOT NULL,
  `coind_withdraw_min` float(10,8) NOT NULL,
  `coind_withdraw_fee` float(10,8) NOT NULL,
  `coind_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coind_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `profile_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_address_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_service`
--

CREATE TABLE `trade_service` (
  `trade_id` int(11) NOT NULL,
  `coind_s` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accoint_id` int(11) NOT NULL,
  `trade_prices` float(10,8) NOT NULL,
  `trade_amout` float(10,8) NOT NULL,
  `trade_type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `trade_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `validate`
--

CREATE TABLE `validate` (
  `validate_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `validate_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validate_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `balancer`
--
ALTER TABLE `balancer`
  ADD PRIMARY KEY (`balancer_id`);

--
-- Indexes for table `coind_service`
--
ALTER TABLE `coind_service`
  ADD PRIMARY KEY (`coind_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `trade_service`
--
ALTER TABLE `trade_service`
  ADD PRIMARY KEY (`trade_id`);

--
-- Indexes for table `validate`
--
ALTER TABLE `validate`
  ADD PRIMARY KEY (`validate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `balancer`
--
ALTER TABLE `balancer`
  MODIFY `balancer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coind_service`
--
ALTER TABLE `coind_service`
  MODIFY `coind_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trade_service`
--
ALTER TABLE `trade_service`
  MODIFY `trade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validate`
--
ALTER TABLE `validate`
  MODIFY `validate_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
