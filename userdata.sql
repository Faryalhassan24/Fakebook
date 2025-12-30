-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 01:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DateRegistered` datetime NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'images/Default_pfp.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`user_id`, `email`, `username`, `password`, `DateRegistered`, `profile_pic`) VALUES
(1, 'faryal@example.com', 'Faryal Hassan', '$2y$10$G6OP/YRfC.39fD26qzVX1uSyncWp3ot5SZTixawoE2IMPTGi/H3wi', '0000-00-00 00:00:00', 'images/6953bff3467ee2.33223493.png'),
(2, 'umer@example.com', 'Umer Ali', '$2y$10$AwhmbPnnoRnkdAFVvNlRGO/T2aCeRdT3aSsPAhyYigSc3kmBDYmE6', '0000-00-00 00:00:00', 'images/Default_pfp.jpg'),
(3, 'hash@example.com', 'Hash khan', '$2y$10$B91zPRzTmgdn3fnsZBz8zucbzjjNyBO.iMYIGytSv.zaGoHSDFWH2', '0000-00-00 00:00:00', 'images/Default_pfp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
