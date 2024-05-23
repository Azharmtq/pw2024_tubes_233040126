-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2024 at 10:39 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username_user`, `email_user`, `password_user`) VALUES
(1, 'azhar', 'azhar@gmail.com', '$2y$10$GYL4HlbvnjdM5NxUapoyn..I7F3rqs4zhc8kW4RbSC.zMZWD3PRjG'),
(2, 'raihan', 'raihan@gmail.com', '$2y$10$hqbRn.As3r6.XJFHtJjgReg4niFo7bs8yUSNB65Hp/V71R/t7uURu'),
(3, 'yapi', 'yapi@gmail.com', '$2y$10$SlWi/IcjouMh3dLO6wPDWONsIiGvEydT9N1fOKM.2z5Dtv3RFc8Wy'),
(4, 'radhia', 'radhia@gmail.com', '$2y$10$xJnlerUgDKiAwvdPkpd1MuCVMlTka7TBJP5U35CTcvcD9ov1BCzTG'),
(5, 'akmal', 'akmal@gmail.com', '$2y$10$imGjlcQ4bsUaFWDlpjR6lutS6KpW/xkrpVf4tkCKZJXksI2sBrQii'),
(6, 'ramon', 'ramon@gmail.com', '$2y$10$OB2QV6lXaBrTmuApKPOlQe8kJD/Y9ViJ/K6KVTYnv6eocC.ClNc9S'),
(7, 'ndaw', 'ndaw@gmail.com', '$2y$10$XkT.tgGUK52/5mL7T1nwc.f9Zlj0HOefgXaE5PmBlXEOKVJPqvXfG'),
(8, 'fadhil', 'fadhil@gmail.com', '$2y$10$kYHEzUlYQ3ms3/6OGraf.ud6qdm/apu4A2h6RyWSH92ghA41C7v9e'),
(9, 'tegar', 'tegar@gmail.com', '$2y$10$9LsO2NZgr9udXnFl4GTmRO28lcEAgRjKQJV1zcXnyAg0Z0iD8dtuG'),
(10, 'yoan', 'yoan@gmail.com', '$2y$10$Oe5VDtE/.FFVm6bnXPgKA.5QrLLQjcp/FdNYLM7MO7aspoXVkmi3m'),
(11, 'ripan', 'ripan@gmail.com', '$2y$10$DyfJxjbmeBX0EvlkOpaSzO8hT9xfZsd5dHVe4M4uLGGoQA9GMwfTm'),
(12, 'haikal', 'haikal@gmail.com', '$2y$10$VFV3f0fkeZYY9/ExyV7Sw.rGQiVlDvfcE8oVWy/GGEiqsYepIRwgy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email_user`),
  ADD UNIQUE KEY `username_user` (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
