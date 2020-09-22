-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 07:54 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itutorrevise`
--

-- --------------------------------------------------------

--
-- Table structure for table `qualified`
--

CREATE TABLE `qualified` (
  `q_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `days` varchar(50) DEFAULT NULL,
  `q_startTime` time DEFAULT NULL,
  `q_endTime` time DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualified`
--

INSERT INTO `qualified` (`q_id`, `u_id`, `p_id`, `subject`, `days`, `q_startTime`, `q_endTime`, `status`) VALUES
(1, 2, 3, 'English', 'M,T', '13:00:00', '14:00:00', 'AVAILABLE'),
(2, 2, 0, 'English', 'M', '09:00:00', '10:00:00', 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `reactivate_request`
--

CREATE TABLE `reactivate_request` (
  `reactivate_req_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactivate_request`
--

INSERT INTO `reactivate_request` (`reactivate_req_id`, `user_id`, `request_status`) VALUES
(10, 3, 'CONFIRMED'),
(11, 3, 'CONFIRMED');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` int(11) NOT NULL,
  `q_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `u_req_startTime` time DEFAULT NULL,
  `u_req_endTime` time DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`r_id`, `q_id`, `p_id`, `u_req_startTime`, `u_req_endTime`, `status`) VALUES
(1, 1, 3, '13:00:00', '14:00:00', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `fname`, `lname`, `email`, `contact`, `address`, `type`, `status`, `img`) VALUES
(1, 'admin', 'admin', 'adminname', 'adminname', 'admin@gmail.com', '00000', 'admin office', 'admin', 'ACTIVE', 'noimage.jpg'),
(2, 'tutor', 'tutor', 'tutor', 'tutor', 'tutor@gmail.com', '0000', 'tutor', 'tutor', 'ACTIVE', '70487974_498861120898913_7043755921742233600_n.jpg'),
(3, 'parent', 'parent', 'parent', 'parent', 'parent@gmail.com', '00000', 'parent', 'parent', 'ACTIVE', 'noimage.jpg'),
(4, 'parent3', 'parent3', 'parent3', 'parent3', 'parent3@gmail.com', '00000', 'parent3', 'parent', 'ACTIVE', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qualified`
--
ALTER TABLE `qualified`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `reactivate_request`
--
ALTER TABLE `reactivate_request`
  ADD PRIMARY KEY (`reactivate_req_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qualified`
--
ALTER TABLE `qualified`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reactivate_request`
--
ALTER TABLE `reactivate_request`
  MODIFY `reactivate_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
