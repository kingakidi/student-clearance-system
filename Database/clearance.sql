-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 03:47 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `category`, `time`) VALUES
(1, 'isa abubakar', '$2y$10$rtDHdxqbtxyQCWXU6zwNH.qxyikGQQAKAxJYI8E4299dGPCfO.TIy', 'student', '2021-07-06 11:19:20'),
(2, 'zainab', '$2y$10$hu7OP1BZTvH6lImBExlaY.c43F4Mgyldo7ZksyaFgmkopKZS85CxK', 'student', '2021-07-06 13:18:38'),
(3, 'suleiman', '$2y$10$59BsVAkwo2lZMaTplkLd2uutWpi9yPYwkVWRsx.kmbIuCDti.7axu', 'examofficer', '2021-07-06 13:21:57'),
(4, 'isa', '$2y$10$LUbeESgPBgLgIpcCR1BwLuVQw2mURwMbJS5F1zKYWhePZHqS.senK', 'student', '2021-07-06 13:23:31'),
(5, 'dagash', '$2y$10$qQcV6f7wWJLWzgyh9/75ae3immU1wSIy1BWK.O6OOeJGq8HTLfhki', 'student', '2021-07-06 13:25:19'),
(6, 'musa', '$2y$10$TUbiRr5Za7hGkxfbNNTt3.raqEkvATio5mWev15Ws8gW9U3bgBhv.', 'director', '2021-07-06 13:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clearance`
--

CREATE TABLE `tbl_clearance` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othernames` varchar(255) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clearance`
--

INSERT INTO `tbl_clearance` (`id`, `username`, `regno`, `surname`, `firstname`, `othernames`, `gender`, `status`, `date`) VALUES
(2, 'zainab', 'd18csc1146', 'salisu', 'zainab', '', 'female', 'pending', '2021-07-06 13:20:32'),
(3, 'isa', 'd18csc1154', 'abubakar', 'isa', '', 'male', 'pending', '2021-07-06 13:24:50'),
(4, 'dagash', 'd18cse1084', 'aliyu', 'al ameen', 'ahmad', 'male', 'pending', '2021-07-06 13:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clearance_cleared`
--

CREATE TABLE `tbl_clearance_cleared` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `clear_by` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clearance_cleared`
--

INSERT INTO `tbl_clearance_cleared` (`id`, `regno`, `clear_by`, `comment`, `status`, `date`) VALUES
(1, 'd18cse1084', 'examofficer', 'you are cleared', 'cleared', '2021-07-06 13:34:03'),
(2, 'd18csc1154', 'examofficer', 'you have outstanding missing script', 'uncleared', '2021-07-06 13:35:25'),
(3, 'd18cse1084', 'director', 'cleared', 'cleared', '2021-07-06 13:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `title` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `submit_by` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `admin_username`, `regno`, `fullname`, `title`, `message`, `date`, `submit_by`, `action`, `status`) VALUES
(1, 'suleiman', 'd18cse1084', 'aliyu al ameen ahmad', 'award', 'award of excellence', '2021-07-06 13:31:48', 'examofficer', 'kindly give him 2020/2021 award of excellence', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clearance_cleared`
--
ALTER TABLE `tbl_clearance_cleared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_clearance_cleared`
--
ALTER TABLE `tbl_clearance_cleared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
