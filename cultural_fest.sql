-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.infinityfree.com
-- Generation Time: Jul 18, 2024 at 11:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36927130_cultural_fest`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_location`, `event_image`) VALUES
(1, 'Web Development', '2024-07-20', 'SJB Seminar Hall', './images1/web Development.avif'),
(2, 'Animation Development', '2024-07-18', 'SJB Seminar Hall', './images1/animi.jpg'),
(3, 'Dance Competition', '2024-07-18', 'OAT', './images1/dance.jpg'),
(4, 'Chess Competition', '2024-07-25', 'Sports Complex', './images1/chess.jpg'),
(5, 'AI Coding Competition', '2024-07-15', 'ACC Lab', './images1/ai.avif'),
(6, 'Music Competition', '2024-07-10', 'SJB Seminar Hall', './images1/music-competition.jpg'),
(7, 'Coding Competition', '2024-07-05', 'HT1 Lab', './images1/coding.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `event_category` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `event_category`, `event_name`, `event_image`, `event_type`, `event_url`) VALUES
(1, 'Technical', 'Coding', 'images1/coding.png', 'tech', 'https://player.vimeo.com/video/94224205?autoplay=1'),
(2, 'Literature & Cultural', 'Fine Art', 'images1/fineart.jpg', 'literature', 'images1/fineart.jpg'),
(3, 'Boys Sports', 'Volley Ball', 'images1/volly ball.jpg', 'boys', 'images1/volly ball.jpg'),
(4, 'Boys Sports', 'Cricket', 'images1/cricket.jpg', 'boys', 'images1/cricket.jpg'),
(5, 'Technical', 'Web Development', 'images1/web development.jpg', 'tech', 'images1/web development.jpg'),
(6, 'Literature & Cultural', 'Literature', 'images1/literary.jpg', 'literature', 'images1/literary.jpg'),
(7, 'Boys Sports', 'Basket Ball', 'images1/basket ball.jpg', 'boys', 'images1/basket ball.jpg'),
(8, 'Girls Sports', 'Badminton', 'images1/batmenten.jpg', 'girls', 'images1/batmenten.jpg'),
(9, 'Girls Sports', 'Throw Ball', 'images1/throw ball.jpg', 'girls', 'images1/throw ball.jpg'),
(10, 'Literature & Cultural', 'Dance', 'images1/dance.jpg', 'literature', 'images1/dance.jpg'),
(11, 'Literature & Cultural', 'Music', 'images1/music.jpg', 'starters', 'https://player.vimeo.com/video/94224205?autoplay=1');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `issue_subject` varchar(255) NOT NULL,
  `issue_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `full_name`, `email`, `mobile_number`, `issue_subject`, `issue_message`, `created_at`) VALUES
(2, 'Yogesh', 'yoginambula123@gmail.com', '9494724039', 'Test', 'This is a Test issue for the database', '2024-07-18 08:24:16'),
(6, 'Yogi', 'yoginambula123@gmail.com', '9494724039', 'Test', 'This is a Test issue for the databse', '2024-07-18 08:32:17'),
(7, 'Yogeswara Rao', 'yoginambula123@gmail.com', '9494724039', 'Text', 'Heavy Text', '2024-07-18 12:13:26'),
(8, 'Yaswanth Bandalapati', 'byyaswanth0023@gmail.com', '7981157822', 'Layout ', 'Layout is not displayed properly ', '2024-07-18 15:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `regd_no` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `event_registered` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `regd_no`, `email`, `phone`, `event_registered`, `registration_date`, `name`) VALUES
(20, 'Y21CM005', 'byyaswanth0023@gmail.com', '9494724039', 'Animation Development', '2024-07-18 02:28:13', 'Yashwanth'),
(26, 'Y21CM045', 'yoginambula123@gmail.com', '9494724039', 'Animation Development', '2024-07-18 13:54:35', 'Yogeswara Rao Nambula'),
(27, 'Y21CM045', 'yoginambula123@gmail.com', '9494724039', 'Dance Competition', '2024-07-18 13:55:12', 'Yogeswara Rao Nambula'),
(28, 'Y21CM045', 'yoginambula123@gmail.com', '9494724039', 'Web Development', '2024-07-18 13:55:45', 'Yogeswara Rao Nambula'),
(29, 'Y21CM045', 'yoginambula123@gmail.com', '9494724039', 'Chess Competition', '2024-07-18 13:57:50', 'Yogeswara Rao Nambula'),
(30, 'Y21CM005', 'byyaswanth0023@gmail.com', '7981157822', 'Chess Competition', '2024-07-18 14:55:33', 'Yaswanth Bandalapati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
