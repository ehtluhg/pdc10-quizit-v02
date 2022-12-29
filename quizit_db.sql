-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2022 at 05:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cards`
--

CREATE TABLE `tb_cards` (
  `id` int(11) NOT NULL,
  `set_id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cards`
--

INSERT INTO `tb_cards` (`id`, `set_id`, `title`, `description`) VALUES
(1, 1, 'PDC10', 'Professional Domain Course 1'),
(2, 1, 'IPT10', 'Integrative Programming Technologies'),
(3, 1, 'AIM10', 'Advanced Information Management'),
(4, 1, 'AIM10', 'Advanced Information Management'),
(5, 1, 'AIM10', 'Advanced Information Management'),
(6, 1, 'SIP10', 'Social Issues and Professional Ethics napakapabibong subject tapos yung prof laging may pinapagawa na mema lang huehue tapos movie marathon lagi kapag nagddiscuss siya'),
(7, 1, 'SIP10', 'Social Issues and Professional Ethics napakapabibong subject tapos yung prof laging may pinapagawa na mema lang huehue tapos movie marathon lagi kapag nagddiscuss siya'),
(8, 1, 'asas', 'asasa'),
(9, 1, 'asas', 'asasa'),
(10, 1, 'asas', 'asasa'),
(11, 1, 'asas', 'asasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `first_name`, `last_name`, `username`, `email_address`, `password`) VALUES
(1, 'Gabriel', 'Dy', 'gabdy', 'dygabriel31@gmail.com', 'abcd1234'),
(2, 'Audriel', 'Bustarde', 'bustarde01', 'bustarde.audriel@auf.edu.ph', 'abcd1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cards`
--
ALTER TABLE `tb_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cards`
--
ALTER TABLE `tb_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
