-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:29 PM
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
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin_sriMaha', 'admin@gmail.com', 'admin_SriMaha@321'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `services` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `date`, `services`, `message`) VALUES
(14, 'sneha', 'poomani@gmail.com', '87878879890', '2024-05-22', 'ECG', ' we are hiring'),
(15, 'poo', 'poomani@gmail.com', '8680800512', '2024-05-18', 'Enema', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(222) NOT NULL,
  `common_state_id` int(253) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `common_state_id`, `district_name`) VALUES
(1, 1, 'chennai'),
(3, 1, 'madurai'),
(4, 1, 'selam'),
(5, 1, 'dharmapuri'),
(6, 1, 'thiruvallur'),
(7, 1, 'ariyalur'),
(8, 1, 'kanchipuram'),
(9, 1, 'vilupuram'),
(10, 1, 'thirucy'),
(11, 1, 'kovai'),
(12, 1, 'thenkasi'),
(13, 1, 'namakal'),
(14, 1, 'pudukottai'),
(15, 1, 'ranipet'),
(16, 1, 'theni'),
(17, 1, 'thanjavur'),
(18, 1, 'thiruppur'),
(19, 1, 'virudhunagar'),
(20, 1, 'vellore'),
(21, 2, 'nellore'),
(22, 2, 'godaveri'),
(23, 2, 'west godaveri'),
(24, 2, 'gundur'),
(25, 2, 'chittor'),
(26, 2, 'krishna'),
(27, 2, 'kunoor'),
(28, 2, 'tada'),
(29, 2, 'sulerpet'),
(42, 3, 'kochin'),
(43, 3, 'kollam'),
(44, 3, 'wayanad'),
(45, 3, 'palakad'),
(46, 3, 'mallapuram'),
(47, 3, 'kannur'),
(48, 3, 'kozhikudu'),
(49, 3, 'thiruvandhapuram'),
(57, 4, 'hydrabad'),
(58, 4, 'kamareddy'),
(59, 4, 'jagtial'),
(60, 4, 'pedapalli'),
(61, 4, 'nirmal'),
(62, 4, 'madak'),
(63, 4, 'karimnagar');

-- --------------------------------------------------------

--
-- Table structure for table `galary`
--

CREATE TABLE `galary` (
  `id` int(255) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galary`
--

INSERT INTO `galary` (`id`, `image`) VALUES
(17, 0x67616c6c6572792d312e6a7067),
(19, 0x67616c6c6572792d342e6a7067),
(20, 0x67616c6c6572792d352e6a7067),
(21, 0x67616c6c6572792d362e6a7067),
(22, 0x67616c6c6572792d362e6a7067),
(23, 0x67616c6c6572792d372e6a7067),
(24, 0x67616c6c6572792d382e6a7067),
(25, 0x67616c6c6572792d332e6a7067),
(26, 0x67616c6c6572792d382e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`) VALUES
(46, 'Nebulizer', 'Trust our state\r\n', 0x67616c6c6572792d332e6a7067),
(47, 'IM & IV Injection', 'Trust our state\r\n', 0x67616c6c6572792d342e6a7067),
(48, 'Catheter Care', 'Sri Maha Clinic', 0x67616c6c6572792d352e6a7067),
(49, 'Catheter Care', 'Trust our state', 0x67616c6c6572792d362e6a7067),
(61, 'ECG', 'neermslohiidnsdsl', 0x67616c6c6572792d382e6a7067),
(62, 'Nebulizer', 'neermssjnjdsdjKJKlohiidnsdsl', 0x67616c6c6572792d312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(233) NOT NULL,
  `state_id` int(234) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_id`, `state_name`) VALUES
(1, 1, 'tamilnadu'),
(2, 2, 'ap'),
(3, 3, 'kerala'),
(4, 4, 'telungana');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `state` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `email`, `phone`, `state`) VALUES
(18, 'shiyam', 'shiyam123@gmail.com', '8680800512', ''),
(19, 'shiyam', 'shiyam123@gmail.com', '8680800512', ''),
(20, 'poomani s', 'prakash@gmail.com', '8680800512', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(232) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(232) NOT NULL,
  `password` varchar(232) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `state` varchar(232) NOT NULL,
  `district` varchar(232) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `age`, `gender`, `state`, `district`, `image`) VALUES
(1, 'Shiyam', '8122315788', 'shiyam@gmail.com', 'Sham333@', 21, 'male', 'tamilnadu', 'chennai', 0x6d65646963616c20696d672e706e67),
(2, 'poomani', '8680800512', 'poomani@gmail.com', '212121', 25, 'male', 'tamilnadu', 'theni', 0x67616c6c6572792d312e6a7067),
(4, 'poomani', '8680800512', 'poomani1@gmail.com', '212121', 25, 'male', 'tamilnadu', 'theni', 0x67616c6c6572792d312e6a7067),
(5, 'Shiyam', '8923432343', 'shiya@gmail.com', 'Sham333@', 21, 'male', 'tamilnadu', 'thiruppur', 0x67616c6c6572792d372e6a7067),
(6, 'mk stalin', '9876543210', 'mkstalindmk@gmail.com', '212121', 57, 'male', 'tamilnadu', 'chennai', 0x646f776e6c6f61642e6a7067),
(7, 'MS DHONI', '7898090909', 'dhoni2007@gmail.com', '212121', 42, 'male', 'ap', 'godaveri', 0x53637265656e73686f7420323032342d30352d3039203133313533342e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galary`
--
ALTER TABLE `galary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `galary`
--
ALTER TABLE `galary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
