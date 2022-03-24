-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 07:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ic no` varchar(12) NOT NULL,
  `phone no` varchar(11) NOT NULL,
  `driver name` varchar(100) NOT NULL,
  `driver ic no` varchar(12) NOT NULL,
  `driver phone no` varchar(11) NOT NULL,
  `license` varchar(100) NOT NULL,
  `license start period` date NOT NULL,
  `license end period` date NOT NULL,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `ic no`, `phone no`, `driver name`, `driver ic no`, `driver phone no`, `license`, `license start period`, `license end period`, `role`, `username`, `password`) VALUES
(1, 'ADMIN', '960412045213', '0123456789', 'EN.OMAR BIN RAMLI', '850909036511', '0198745632', 'DA', '2022-01-21', '2027-01-21', 'admin', 'admin', '$2y$10$.IeHgNDXnUsrx0Zujcl.GelIgnjHq1PWeNJ18mngRTIyctKGroVrC'),
(2, 'NADHIRAH BINTI JAAFAR', '970413045532', '01136483745', 'EN.RAZAK BIN ABU', '880812076511', '01165342856', 'DA', '2020-04-13', '2025-04-13', 'User', 'nadhirah', '$2y$10$PYUH9ed28AQaTyDJiYeq8OisyC323dzZiOcMKbA1y5y7jM6CADOgS'),
(3, 'IMANINA IZZATI BINTI HAFIZ', '930428015577', '01386574323', 'EN.ZAIN SAIDIN BIN ANNUAR', '730524115621', '0163234718', 'D', '2022-01-10', '2025-01-10', 'User', 'imanina', '$2y$10$WlneFL9bcZJqnAZhidtZj.yDLzSO60Q1ZU20DUo6TQwxMeW.bqISu'),
(4, 'KAMSIAH BINTI OMAR', '630228065124', '01235427456', 'EN. AMIRUL BIN KAMIL', '880312145575', '0178945363', 'DA', '2021-03-17', '2025-03-17', 'User', 'kamsiah', '$2y$10$t7L34Uz76mD/a0Oht3V2we83tKmpjp.XwQQpaoLjVQO7ldQN8caVS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
