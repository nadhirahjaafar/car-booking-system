-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 09:44 AM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` int(10) NOT NULL,
  `id` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone no` varchar(11) NOT NULL,
  `ic no` varchar(12) NOT NULL,
  `cars` varchar(100) NOT NULL,
  `pickup location` varchar(100) NOT NULL,
  `dropoff location` varchar(100) NOT NULL,
  `pickup date` date NOT NULL,
  `dropoff date` date NOT NULL,
  `pickup time` time NOT NULL,
  `car price` double NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookid`, `id`, `name`, `phone no`, `ic no`, `cars`, `pickup location`, `dropoff location`, `pickup date`, `dropoff date`, `pickup time`, `car price`, `payment_status`) VALUES
(1, '2', 'NADHIRAH BINTI JAAFAR', '01136453122', '970413045194', 'Mercedes Benz E250', 'Subang Jaya Airport', 'Subang Jaya Airport', '2022-02-01', '2022-02-03', '16:43:00', 1200, 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
