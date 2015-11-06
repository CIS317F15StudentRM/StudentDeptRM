-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 09:14 PM
-- Server version: 5.6.22-log
-- PHP Version: 5.6.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `reset_key` varchar(45) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `user_type`, `password`, `reset_key`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'patel065', 'administrator', '71b3b26aaa319e0cdf6fdb8429c112b0', '', 0, '2015-03-29 20:32:56', '2015-05-12 04:32:28'),
(6, 'blair001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(7, 'brinckman001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(8, 'frezza001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(9, 'liu001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(10, 'sasi001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(11, 'tang002', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(12, 'vitolo001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(13, 'xu001', 'advisor', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:32:01', '2015-05-13 14:32:01'),
(14, 'tang002', 'administrator', '71b3b26aaa319e0cdf6fdb8429c112b0', NULL, 0, '2015-05-13 14:33:52', '2015-05-13 14:33:52'),
(15, 'tang002', 'chairperson', 'fa5b75c3cc5f6adc787aa5a3b07d5549', NULL, 0, '2015-05-13 21:06:00', '2015-05-13 21:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `grad_undergrad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major`, `name`, `grad_undergrad`) VALUES
(773, ' Information Analytics', '1'),
(774, '  Software Engineering', '1'),
(874, '874', '1'),
(875, '  Information Systems', '1'),
(879, 'Applied Computer Science', '1'),
(883, ' Web Development', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_details`
--

CREATE TABLE IF NOT EXISTS `student_course_details` (
  `student_course_details_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `year` int(4) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `course_type` varchar(45) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `student_id` int(11) NOT NULL,
  `advisor` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `start_semester` varchar(45) NOT NULL,
  `start_year` int(4) NOT NULL,
  `major` varchar(45) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_foundation_courses`
--

CREATE TABLE IF NOT EXISTS `student_foundation_courses` (
  `student_foundation_course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_status` varchar(45) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `salutation` varchar(45) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `salutation`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'Chintan', 'Patel', 'patel065', 'ER.', 0, '2015-03-29 20:32:49', '2015-03-29 20:32:49'),
(2, 'Harry', 'Potter', 'harry001', 'WZ.', 0, '2015-03-29 20:34:09', '2015-03-29 20:34:09'),
(3, 'Mark', 'Blair', 'blair001', 'Mr.', 0, '2015-05-13 14:23:03', '2015-05-13 14:23:03'),
(4, 'Bary', 'Brinkman', 'brinckman001', 'Dr.', 0, '2015-05-13 14:23:03', '2015-05-13 14:23:03'),
(9, 'Stephen', 'Frezza', 'frezza001', 'Dr.', 0, '2015-05-13 14:24:06', '2015-05-13 14:24:06'),
(10, 'Yunkai', 'Liu', 'liu001', 'Dr.', 0, '2015-05-13 14:24:55', '2015-05-13 14:24:55'),
(11, 'Sreela', 'Sasi', 'sasi001', 'Dr.', 0, '2015-05-13 14:24:55', '2015-05-13 14:24:55'),
(12, 'Mei-Huei', 'Tang', 'tang002', 'Dr.', 0, '2015-05-13 14:26:12', '2015-05-13 14:26:12'),
(13, 'Theresa', 'Vitolo', 'vitolo001', 'Dr.', 0, '2015-05-13 14:26:12', '2015-05-13 14:26:12'),
(14, 'Frank', 'Xu', 'xu001', 'Dr.', 0, '2015-05-13 14:27:14', '2015-05-13 14:27:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`), ADD KEY `username_idx` (`username`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major`);

--
-- Indexes for table `student_course_details`
--
ALTER TABLE `student_course_details`
  ADD PRIMARY KEY (`student_course_details_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_foundation_courses`
--
ALTER TABLE `student_foundation_courses`
  ADD PRIMARY KEY (`student_foundation_course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student_course_details`
--
ALTER TABLE `student_course_details`
  MODIFY `student_course_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_foundation_courses`
--
ALTER TABLE `student_foundation_courses`
  MODIFY `student_foundation_course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
