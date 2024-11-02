-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 11:57 AM
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
-- Database: `sport_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `gmail`, `password`, `type`, `profile_picture`, `number`, `address`) VALUES
(1, 'adsadada', 'asdas@gmail.com', '123', 'User', '../profile_pictures/default.avif', '', ''),
(2, 'Ejie Florida', 'ejieflorida123@gmail.com', '123', 'User', '../profile_pictures/tabs-3.jpg', '09128343746', 'Maasin City, Southern Leyte, Pinaskohan'),
(3, 'Erica Bellota', 'erica123@gmail.com', '123', 'User', '../profile_pictures/default.avif', '', ''),
(5, 'Staff123', 'Staff1@gmail.com', '123', 'Admin', '../profile_pictures/default.avif', 'no information provided!', 'no information provided!'),
(6, 'Stafff10', 'Staff2@gmail.com', '123', 'Admin', '../profile_pictures/default.avif', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `team1_name` varchar(255) NOT NULL,
  `team1_score` int(11) NOT NULL,
  `team2_name` varchar(255) NOT NULL,
  `team2_score` int(11) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `venue_img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `game_type`, `team1_name`, `team1_score`, `team2_name`, `team2_score`, `schedule`, `venue_img`, `status`, `admin_id`) VALUES
(5, 'Basketball', 'Java', 76, 'C#', 54, '2024-11-13T07:11', '../venue_images/bg.jpg', 'score', 5),
(6, 'Rugby', 'Yumshoi', 45, 'Qweroze', 98, '2024-11-07T04:24', '../venue_images/1.jpg', 'score', 5),
(8, 'Table Tennis', 'iffel', 0, 'Forenty', 0, '2024-11-07T04:24', '../venue_images/tabs-2.jpg', 'game', 5),
(9, 'example', 'example', 100, 'example', 98, '2024-11-20T09:41', '../venue_images/2024-10-23 15_05_07-.png', 'score', 5),
(10, 'Rugby', 'Example2', 0, 'Example2', 0, '2024-11-13T21:46', '../venue_images/2024-10-22 17_28_59-.png', 'game', 6);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `event_report_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
