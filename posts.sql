-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 11:57 AM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_image` VARCHAR(255) DEFAULT NULL,
  `post_video` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
); ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `post_image`, `post_video`) VALUES
(65, 0, 'hello yeahhhhhhh', '2025-12-10 18:27:55', NULL, NULL),
(70, 2, 'hello', '2025-12-11 17:53:28', NULL, NULL),
(71, 2, 'yeahhhh', '2025-12-11 17:53:47', NULL, NULL),
(73, 3, 'what\'s up', '2025-12-11 19:30:17', NULL, NULL),
(74, 1, 'hello everyone', '2025-12-12 10:49:37', NULL, NULL),
(75, 1, 'Friday', '2025-12-12 10:49:58', NULL, NULL),
(78, 1, 'hello eveyone', '2025-12-12 15:04:53', NULL, NULL),
(80, 1, 'hello', '2025-12-15 18:56:32', NULL, NULL),
(89, 1, 'hello everyone', '2025-12-24 17:57:38', NULL, NULL),
(90, 1, 'yeahhhhh', '2025-12-24 18:08:47', NULL, NULL),
(99, 1, '', '2025-12-26 11:14:29', 'uploads/1766747669_white Bear GIF.gif', NULL),
(100, 1, '', '2025-12-26 11:17:20', 'uploads/1766747840_We bare bear.jfif', NULL),
(102, 1, '', '2025-12-26 11:58:39', 'uploads/1766750319_white Bear Dancing GIF.gif', NULL),
(103, 1, '', '2025-12-26 12:11:29', 'uploads/1766751089_We Bare Bears_ Time to Celebrate! _ Line Sticker.gif', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
