-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 05:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1stsymphony_be`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'mpadanta@gmail.com', 'kel1pbl'),
(2, 'admins', NULL, 'kel1pbl');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `file_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `birthdate`, `phone_number`, `address`, `file_path`) VALUES
(1, 'MUHAMMAD PADANTA TARIGAN', 'dantoz', 'mpadanta@gmail.com', 'danta', '2024-05-01', 812345678, 'Batam, Kepulauan Riau', NULL),
(5, 'TESTACCOUNT1', 'bot1', 'bot@gmail.com', '$2y$12$5tU.Rt6/b0u7LEtsqxosxuxf7.I67iBeQUUbE7YjQ8JorSxpWvhKS', '2024-05-15', 812345678, 'Batam, Kepulauan Riau', NULL),
(6, 'TESTACCOUNT2', 'bot2', 'bot2@gmail.com', '$2y$12$UvPDx01DhisCIDVxMwKgpuV70g/k0Gja49swBgE6LAuirY56Xs08C', '2024-05-22', 812345678, 'Batam, Kepulauan Riau', NULL),
(7, 'TESTACCOUNT3', 'bot3', 'bot3@gmail.com', '$2y$12$9PEaEgviZK.SEPsS.gxDC.qovWFihrRL3ojPnp6geo6g.ZsKkiGmS', '2024-05-30', 812345678, 'Batam, Kepulauan Riau', NULL),
(9, 'TESTACCOUNT4', 'bot4', 'bot4@gmail.com', '$2y$12$hirm7xX550UZn0AVyFrSp.qSsLH8OZUw7EZtqEqj3UgzMXsDMuylq', '2024-05-16', 812345678, 'Batam, Kepulauan Riau', NULL),
(10, 'TESTACCOUNT5', 'bot5', 'bot5@gmail.com', '$2y$12$z8D6XTSvohIHyT0ZB8dmv.KkLMa0oGt2Z//1AckfsMt/1GfDA71Sq', '2024-05-01', 812345678, 'Batam, Kepulauan Riau', NULL),
(11, 'TESTACCOUNT6', 'bot6', 'bot6@gmail.com', '$2y$12$vQDAeOQU/LghHTiMT5xOauvejj0DMtT5o5KMpYKapBgYs9dzC9NgG', '2024-05-27', 812345678, 'Batam, Kepulauan Riau', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
