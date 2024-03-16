-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 08:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intership`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `cost` int(11) NOT NULL,
  `guide` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image_path`, `name`, `description`, `destination`, `datefrom`, `dateto`, `cost`, `guide`, `status`) VALUES
(12, 'class-3.jpg', 'Yoga', 'A smaller version of the sculpture was created to fit into the limited gallery space.', 'beirut', '2024-03-20', '2024-03-28', 20, 'ahmad', 'pending'),
(13, 'act1.jpg', 'Drawing', 'Immerse yourself in the captivation world of artistry at our drawing event, where creativity flows freely and each stroke tells a unique visual story.', 'beirut', '2024-03-17', '2024-03-22', 15, 'ahmad', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `joindate` date NOT NULL,
  `profession` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `name`, `email`, `password`, `birth`, `joindate`, `profession`) VALUES
(1, 'ali', 'ali@gmail.com', 'ali123', '2004-07-09', '2024-02-17', 'Drawings'),
(2, 'ahmad', 'ahmad@gmail.com', '123@sau', '2000-06-16', '2024-02-17', 'music'),
(3, 'sara', 'sara@gmail.com', 'sara', '2005-01-09', '2024-02-20', 'Camping'),
(4, 'lara', 'lara@gmail.com', 'lara123', '2020-01-08', '2024-02-18', 'Sports'),
(5, 'sami', 'sami@gmail.com', 'sami', '2015-05-15', '2024-02-20', 'Drawings');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` int(15) NOT NULL,
  `emergency` int(15) NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `birth`, `gender`, `mobile`, `emergency`, `nationality`) VALUES
(1, 'ahmad', 'ahmad@gmail.com', 'ahmad123@', '2000-06-14', 'male', 71653043, 5123456, 'beirut'),
(2, 'sara', 'sara@gmail.com', 'Sara111@1', '2019-03-20', 'female', 81452625, 71526348, 'saida'),
(3, 'sami', 'sami@gmail.com', '1231', '2004-12-22', 'male', 70541782, 1785214, 'beirut'),
(4, 'sally', 'sally@gmail.com', 'sally', '2017-06-23', 'female', 71653474, 70152452, 'tripoli'),
(5, 'yara', 'yara@gmail.com', 'YARA11', '2014-06-03', 'female', 81452625, 1785214, 'jounieh'),
(6, 'karim', 'karim@gmail.com', 'karim111', '2016-12-16', 'male', 70541777, 5123444, 'beirut'),
(7, 'rami', 'rami@gmail.com', '123456', '2015-02-04', 'male', 70541777, 70152452, 'jounieh');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `event`, `feedback`) VALUES
(2, 'ahmad', 'ahmad@gmail.com', 'Drawing', 'I had a nice time'),
(5, 'sara', 'sara@gmail.com', 'Drawing', ''),
(7, 'karim', 'karim@gmail.com', 'Drawing', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `joindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `birth`, `gender`, `email`, `password`, `joindate`) VALUES
(1, 'ahmad', '2000-06-14', 'male', 'ahmad@gmail.com', '12345', '2024-02-18'),
(2, 'yara', '2015-07-08', 'female', 'yara@gmail.com', 'ya@111', '2024-02-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
