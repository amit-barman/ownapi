-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `studentcode` varchar(250) NOT NULL,
  `region` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `subject`, `studentcode`, `region`, `phone`, `email`) VALUES
(1, 'Krish Ahuja', 'Computer Science', 'E1', 'IN', '123456', 'krish.Ahuja@example.com'),
(2, 'Devid Rome', 'Business & Management', 'E2', 'CA', '1111111', 'devid.rome@example.com'),
(3, 'Sonia Patel', 'Architecture', 'E3', 'CA', '2222222', 'sonia.jonson@example.com'),
(4, 'Jack Jonson', 'Data Analysis & Statistics', 'E4', 'CA', '3333333', 'jack.jonson@example.com'),
(5, 'Olivia Smith', 'Computer Science', 'E5', 'US', '2222222', 'Olivia.Smith@example.com'),
(6, 'Arjun Agarwal', 'Architecture', 'E6', 'IN', '4444444', 'arjun.Agarwal@example.com'),
(7, 'Sophia Johnson', 'Computer Science', 'E7', 'EG', '2222222', 'Sophia.Johnson@example.com'),
(8, 'William Johnson', 'Data Analysis & Statistics', 'E8', 'FR', '5555555', 'William.Johnson@example.com'),
(9, 'Isabella Jonson', 'Business & Management', 'E9', 'ES', '2222222', 'Isabella.jonson@example.com'),
(10, 'Mark Jones', 'Architecture', 'E10', 'DE', '1111111', 'Mark.Jones@example.com'),
(11, 'Richard Miller', 'Business & Management', 'E11', 'US', '2222222', 'Richard.Miller@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
