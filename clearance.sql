-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 04:41 PM
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
(6, 'musa', '$2y$10$TUbiRr5Za7hGkxfbNNTt3.raqEkvATio5mWev15Ws8gW9U3bgBhv.', 'director', '2021-07-06 13:38:21'),
(7, 'salma', '$2y$10$JFR6bVQJS4lb92jlPrswMeAO.DQcqWn7.cZub8wq/52.0vQJSXDAW', 'student', '2021-07-07 11:45:12'),
(8, 'mai wada', '$2y$10$xkOs6cIbNPJLr7iKM.Hkx.jB7qQOmKS8XgvnNrZv7RFBNcyjji.nO', 'examofficer', '2021-07-07 11:48:28'),
(9, 'suleiman ladan', '$2y$10$WTPEcNxif61xVEBWamkPQOswvE3p3WF7oLktLYDWOpl2NP4gBqc.S', 'student', '2021-07-07 12:04:33'),
(10, 'mal.musa', '$2y$10$JPuVk1HTWZDnoQwrXBt9eeDQSOUkw6/snEJjuwPqpfwOjdFjh1PR2', 'security', '2021-07-07 12:11:32'),
(11, 'yahuza', '$2y$10$chP79AvWFHBBPUoO1xf4Y.4iEux3J53uu8hNecF/o3mWmVi4PJgcW', 'student', '2021-07-12 11:58:49'),
(12, 'd18csc1154', '$2y$10$NdkagiYBbBjoI8M15AvXPO0TsLW/0TbDCPWvOSxyHxPD6G9LrylBe', 'student', '2021-07-12 12:19:09'),
(13, 'umar abba', '$2y$10$CG5ha7nrf7NWFi1gr3PMXOKAYF8rgmItZHWZ/JYWo7HBNuTN96MaC', 'student', '2021-07-12 12:21:11'),
(14, 'aliyu', '$2y$10$LCt.h4IDG7lyRcnDKMYfbupygh7JH.4LKeKtvtgcRszyxVxHEqTYG', 'student', '2021-07-12 12:21:26'),
(15, 'musa sani', '$2y$10$sG4yQogrB.r5PhvaCnl3/ujDW/4/Cd1Ie0nLq/xrNvUq7dnmgrlSG', 'student', '2021-07-12 12:22:45'),
(16, 'isah', '$2y$10$KwWtlIP1JrgLNrsoekxMyuzaLcRlrwYQM1zJGzniW4XORiNa/Z7cq', 'student', '2021-07-12 12:25:13'),
(17, 'sani', '$2y$10$fGSHOC8BDHeO27NAiHWSAuVZxoQzLNJuBruh5RrYdEtBFG2a743w6', 'director', '2021-07-12 12:30:58'),
(18, 'fatimu sadiq', '$2y$10$aYrQ3FqYASGCB4UWncc/h.7Cg848A0wlYPB3DHtMjN0HKkZYgPRH.', 'student', '2021-07-12 12:34:13'),
(19, 'yusuf', '$2y$10$sqdEEgFqJt/hnf3zrtZn8.VqS0EOnKm1FdRpu7AhWly7PQNsiXGVC', 'student', '2021-07-12 12:36:04'),
(20, 'mal.sani', '$2y$10$Gc.KHk.xS1QKYW6WaYJ9SuNgQqnHt/AivajMLbjSyoVQehx3zLPt6', 'security', '2021-07-12 12:41:46'),
(21, 'moses', '$2y$10$GfFBMDdr8Fc3KotzX4JSz.uPOlMDs2VqJeFduaDktJWqLsnnG3qAy', 'secretary', '2021-07-12 12:44:22'),
(22, 'hajaratu hassan', '$2y$10$aT.x91gX9PMFiKRnRwCWHuyTsLjxXgG.bZ.OZsP6so69UHFR/i4vy', 'student', '2021-07-13 13:27:58'),
(23, 'aminu', '$2y$10$TdavV74sAoqGmS7ygu/R..YCeM.lGv5B2H7gAmHr5tbBKM6I3ZJa6', 'student', '2021-07-14 14:13:13'),
(24, 'halima yusuf', '$2y$10$/7D2AAyQBYTP.tQWie6jnegFl0px3elZ/MgErn6.BK3kVJerLci4K', 'student', '2021-07-29 06:59:34'),
(25, 'king', '$2y$10$nZawlsPBo6/UNfFD0tLjl.O6.eDHtkxHkm4nkQLZr.wcK6o27XefS', 'examofficer', '2021-10-20 14:39:15');

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
(4, 'dagash', 'd18cse1084', 'aliyu', 'al ameen', 'ahmad', 'male', 'pending', '2021-07-06 13:29:25'),
(5, 'salma', 's19gce2331', 'aliyu', 'salma', '', 'female', 'pending', '2021-07-07 11:47:32'),
(6, 'suleiman ladan', 'd18csc1148', 'ladan', 'suleiman', 'nasir', 'male', 'pending', '2021-07-07 12:05:31'),
(7, 'halima yusuf', 'd17csc1041', 'yusuf', 'halima', 'usman', 'female', 'pending', '2021-07-12 12:04:23'),
(8, 'isah', 'd18csc1152', 'isah', 'abubakar', '', 'male', 'pending', '2021-07-12 12:26:35'),
(9, 'yusuf', 'd18cse1023', 'yusuf', 'adam', '', 'male', 'pending', '2021-07-12 12:37:08'),
(10, 'aminu', 'd18csc1111', 'musa', 'aminu', 'isa', 'male', 'pending', '2021-07-14 14:14:16');

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
(2, 'd18csc1154', 'examofficer', 'yes', 'cleared', '2021-10-20 14:40:23'),
(3, 'd18cse1084', 'director', 'cleared', 'cleared', '2021-07-06 13:39:03'),
(4, 's19gce2331', 'examofficer', 'CLEARED', 'cleared', '2021-07-07 11:49:58'),
(5, 'd18csc1146', 'examofficer', 'cleared', 'cleared', '2021-07-07 11:58:28'),
(6, 'd18csc1148', 'examofficer', 'cleared', 'cleared', '2021-07-07 12:06:40'),
(7, 'd18csc1148', 'security', 'cleared', 'cleared', '2021-07-07 12:12:22'),
(8, 'd17csc1041', 'examofficer', 'AN excellent and intelligent student wishing success in your life', 'cleared', '2021-07-12 12:15:15'),
(9, 'd18csc1152', 'examofficer', 'cleared', 'cleared', '2021-07-12 12:28:46'),
(10, 'd18csc1152', 'director', 'uncleared', 'uncleared', '2021-07-12 12:31:58'),
(11, 'd18cse1023', 'examofficer', 'missing script', 'uncleared', '2021-07-12 12:39:22'),
(12, 'd18cse1023', 'security', 'cleared', 'cleared', '2021-07-12 12:42:50'),
(13, 'd18cse1023', 'secretary', 'cleared', 'cleared', '2021-07-12 12:45:25'),
(14, 'd17csc1041', 'security', 'excellent', 'cleared', '2021-07-12 14:10:54'),
(15, 'd18csc1111', 'examofficer', 'CLEARED', 'cleared', '2021-07-14 14:15:47');

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
(1, 'suleiman', 'd18cse1084', 'aliyu al ameen ahmad', 'award', 'award of excellence', '2021-07-06 13:31:48', 'examofficer', 'kindly give him 2020/2021 award of excellence', 'pending'),
(2, 'mai wada', 'd18csc1146', 'salisu zainab', 'droped course', 'you regestered first semester course and second semester', '2021-07-07 11:55:33', 'examofficer', 'kindly droped dce112', 'pending'),
(3, 'mai wada', 'd18csc1148', 'nasir suleiman ladan', 'no isssues', 'you have no issues', '2021-07-07 12:09:48', 'examofficer', 'you are cleared with no issues', 'pending'),
(4, 'mai wada', 'd17csc1041', 'halima yusuf usman', 'no isssues', 'cleared', '2021-07-12 12:16:34', 'examofficer', 'cleared', 'pending'),
(5, 'mal.musa', 'd17csc1041', 'halima yusuf usman', 'no isssues', 'cleared', '2021-07-12 14:04:32', 'security', 'cleared', 'pending'),
(6, 'mal.musa', 'd17csc1041', 'halima yusuf usman', 'no issues', 'cleared', '2021-07-12 14:06:05', 'security', 'cleared', 'pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_clearance_cleared`
--
ALTER TABLE `tbl_clearance_cleared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
