-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 03:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_reference` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `feed_back` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `number` int(11) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_des` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`number`, `holiday_date`, `holiday_des`) VALUES
(64, '2016-12-11', 'Birthday Of The Sultan Selangor'),
(63, '2016-12-12', 'Maulidur Rasul'),
(66, '2016-12-25', 'Christmas');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `applicant_name` varchar(30) NOT NULL,
  `applicant_department` varchar(30) NOT NULL,
  `type` enum('Annual','Medical','Maternity','Paternity','Compassionate','Unpaid','Emergency') NOT NULL,
  `application_status` enum('pending','approved','rejected') NOT NULL,
  `applicants_id` int(11) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `reference_no` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` int(5) NOT NULL,
  `reason` varchar(600) NOT NULL,
  `pathtofile` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_control`
--

CREATE TABLE `time_control` (
  `time_yearly_adjust` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_control`
--

INSERT INTO `time_control` (`time_yearly_adjust`) VALUES
('1297954744');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `registration_status` int(1) NOT NULL DEFAULT '0',
  `access_level` enum('user','manager','admin') NOT NULL,
  `department` varchar(30) NOT NULL,
  `date_joined` date NOT NULL,
  `annual_leave_credit` int(5) NOT NULL,
  `medical_leave_credit` int(5) NOT NULL,
  `maternity_leave_credit` int(5) NOT NULL,
  `paternity_leave_credit` int(5) NOT NULL,
  `emergency_leave_credit` int(5) NOT NULL,
  `unpaid_leave_credit` int(5) NOT NULL,
  `compassionate_leave_credit` int(5) NOT NULL,
  `yearly_adjust` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `e_mail`, `handphone`, `registration_status`, `access_level`, `department`, `date_joined`, `annual_leave_credit`, `medical_leave_credit`, `maternity_leave_credit`, `paternity_leave_credit`, `emergency_leave_credit`, `unpaid_leave_credit`, `compassionate_leave_credit`, `yearly_adjust`) VALUES
(1, 'Portal One', 'Admin', 'admin', 'YWRtaW4=', 'admin.p1@portalone.com.my', '0129876543', 1, 'admin', 'Management', '2016-07-06', 20, 7, 16, 10, 0, 0, 0, 0),
(124, 'Khairul', 'Azry', 'trainee5', 'UEBzc3cwcmQ=', 'app.eng05@portalone.com.my', '0148481669', 1, 'user', 'Trainee', '2016-11-26', 20, 7, 10, 7, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_reference`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`reference_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `reference_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2011000364;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
