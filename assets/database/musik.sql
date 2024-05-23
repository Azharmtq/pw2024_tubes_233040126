-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 07:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040126`
--

-- --------------------------------------------------------

--
-- Table structure for table `musik`
--

CREATE TABLE `musik` (
  `musik_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `thumbnail_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `musik`
--

INSERT INTO `musik` (`musik_id`, `user_id`, `nama_file`, `upload_date`, `thumbnail_name`) VALUES
(6, NULL, 'DJ CANTIK MASHA AND THE BEAR.mp3', '2024-05-13', 'masha.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musik`
--
ALTER TABLE `musik`
  ADD PRIMARY KEY (`musik_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musik`
--
ALTER TABLE `musik`
  MODIFY `musik_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `musik`
--
ALTER TABLE `musik`
  ADD CONSTRAINT `musik_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
