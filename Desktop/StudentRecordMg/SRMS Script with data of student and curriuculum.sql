-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 09:12 PM
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
-- Table structure for table `773_fall_2015_foundation_courses`
--

CREATE TABLE IF NOT EXISTS `773_fall_2015_foundation_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `course_set` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `773_fall_2015_foundation_courses`
--

INSERT INTO `773_fall_2015_foundation_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_ava`, `course_set`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'GCIS 500', 3, 'GCIS 500', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(2, 'GCIS 501', 3, 'GCIS 501', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(3, 'GCIS 502', 3, 'GCIS 502', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(4, 'GCIS 503', 3, 'GCIS 503', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(5, 'GCIS 504', 3, 'GCIS 504', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(6, 'GCIS 505', 3, 'GCIS 505', 0, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(7, 'GCIS 506', 3, 'GCIS 506', 1, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(9, 'GCIS 508', 3, 'GCIS 508', 2, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(10, 'GCIS 509', 3, 'GCIS 509', 0, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(11, 'GCIS 510', 3, 'GCIS 510', 1, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `773_fall_2015_prereq_courses`
--

CREATE TABLE IF NOT EXISTS `773_fall_2015_prereq_courses` (
  `course_id` int(11) NOT NULL,
  `req_course_code` varchar(45) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_set` int(11) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `773_fall_2015_prereq_courses`
--

INSERT INTO `773_fall_2015_prereq_courses` (`course_id`, `req_course_code`, `course_code`, `course_name`, `credit`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(36, 'GCIS 514', 'GCIS 509', 'SYSTEM ANALYSIS AND DESIGN', 3, 2, 0, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(37, 'GCIS 514', 'GCIS 510', 'Software Engineering in UML', 3, 0, 0, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(38, 'GCIS 516', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 2, 0, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(39, 'GCIS 516', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(40, 'GCIS 516', 'GCIS 508', 'Database Management Systems', 3, 3, 1, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(41, 'GCIS 523', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 2, 0, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(42, 'GCIS 523', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(43, 'GCIS 523', 'GCIS 500', 'Applied Statistics', 3, 3, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(44, 'GCIS 544', 'GCIS 516', 'Data-Centric Concepts and Methods', 3, 0, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(45, 'GCIS 544', 'GCIS 523', 'Statistical Computing', 3, 3, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(46, 'GCIS 644', 'GCIS 516', 'Data-Centric Concepts and Methods', 3, 0, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(47, 'GCIS 644', 'GCIS 523', 'Statistical Computing', 3, 3, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(48, 'GCIS 646', 'GCIS 509', 'SYSTEM ANALYSIS AND DESIGN', 3, 0, 0, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(49, 'GCIS 646', 'GCIS 514', 'Requirements and Project Management', 3, 3, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(50, 'GCIS 799-2', 'GCIS 799-1', 'Thesis-1', 3, 1, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `773_fall_2015_req_courses`
--

CREATE TABLE IF NOT EXISTS `773_fall_2015_req_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_set` int(11) DEFAULT '0',
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `773_fall_2015_req_courses`
--

INSERT INTO `773_fall_2015_req_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(65, 'GCIS 514', 3, 'Requirements and Project Management', 0, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(66, 'GCIS 516', 3, 'Data-Centric Concepts and Methods', 0, 2, 0, '2015-04-18 16:42:15', '2015-04-20 02:14:40'),
(67, 'GCIS 523', 3, 'Statistical Computing', 1, 2, 0, '2015-04-18 16:42:15', '2015-04-19 16:20:06'),
(68, 'GCIS 544', 3, 'Data Mining Concepts and Techniqus', 0, 1, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(69, 'GCIS 605', 3, 'Scholarship Seminar', 0, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(70, 'GCIS 644', 3, 'Knowledge-Based Systems', 1, 1, 0, '2015-04-18 16:42:15', '2015-04-19 21:07:40'),
(71, 'GCIS 646', 3, 'Architecting Enterprise Information Systems', 0, 0, 0, '2015-04-18 16:42:15', '2015-04-24 23:23:19'),
(72, 'GCIS ELE', 3, 'GCIS Elective', 0, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(73, 'GCIS 698', 3, 'Field Study', 2, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(74, 'GCIS 799', 6, 'Thesis', 2, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(75, 'GCIS 799-1', 3, 'Thesis-1', 2, 2, 0, '2015-04-18 16:42:15', '2015-04-18 16:42:15'),
(76, 'GCIS 799-2', 3, 'Thesis-2', 3, 2, 0, '2015-04-18 16:42:15', '2015-04-29 16:42:30'),
(77, 'GCIS ELE2', 3, 'Elective 2', 3, 2, 0, '2015-04-18 16:42:15', '2015-04-29 16:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2014_foundation_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2014_foundation_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `course_set` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2014_foundation_courses`
--

INSERT INTO `774_fall_2014_foundation_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_ava`, `course_set`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'GCIS 500', 3, 'GCIS 500', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(2, 'GCIS 501', 3, 'GCIS 501', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(3, 'GCIS 502', 3, 'GCIS 502', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(4, 'GCIS 503', 3, 'GCIS 503', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(5, 'GCIS 504', 3, 'GCIS 504', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(6, 'GCIS 505', 3, 'GCIS 505', 0, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(7, 'GCIS 506', 3, 'GCIS 506', 1, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(9, 'GCIS 508', 3, 'GCIS 508', 2, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(10, 'GCIS 509', 3, 'GCIS 509', 0, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(11, 'GCIS 510', 3, 'GCIS 510', 1, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2014_prereq_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2014_prereq_courses` (
  `course_id` int(11) NOT NULL,
  `req_course_code` varchar(45) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_set` int(11) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2014_prereq_courses`
--

INSERT INTO `774_fall_2014_prereq_courses` (`course_id`, `req_course_code`, `course_code`, `course_name`, `credit`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'GCIS 514', 'GCIS 509', 'SYSTEM ANALYSIS AND DESIGN', 3, 2, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(2, 'GCIS 514', 'GCIS 510', 'Software Engineering in UML', 3, 0, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(3, 'GCIS 516', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 2, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(4, 'GCIS 516', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(5, 'GCIS 516', 'GCIS 508', 'Database Management Systems', 3, 3, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(6, 'GCIS 521', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 0, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(7, 'GCIS 521', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(8, 'GCIS 522', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(9, 'GCIS 522', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(10, 'GCIS 533', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 2, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(11, 'GCIS 533', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(12, 'GCIS 533', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 2, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(13, 'GCIS 533', 'GCIS 507', 'Data Structures', 3, 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(14, 'GCIS 533', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(15, 'GCIS 634', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(16, 'GCIS 634', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(17, 'GCIS 639', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(18, 'GCIS 639', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(19, 'GCIS 799-2', 'GCIS 799-1', 'Thesis-1', 3, 1, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(20, 'GCIS ELE2', 'GCIS 799-1', 'Thesis-1', 3, 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(21, 'GCIS ELE2', 'GCIS 698', 'Field Study', 3, 0, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2014_req_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2014_req_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_set` int(11) DEFAULT '0',
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2014_req_courses`
--

INSERT INTO `774_fall_2014_req_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'GCIS 514', 3, 'Requirements and Project Management', 0, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(2, 'GCIS 516', 3, 'Data-Centric Concepts and Methods', 0, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(3, 'GCIS 521', 3, 'ADVANCED PROGRAMMING IOS', 1, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(4, 'GCIS 522', 3, 'ADVANCED PROGRAMMING: Android', 1, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(5, 'GCIS 533', 3, 'Software Patterns and Architecture', 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(6, 'GCIS 605', 3, 'Scholarship Seminar', 0, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(7, 'GCIS 634', 3, 'Software Maintenance', 0, 1, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(8, 'GCIS 639', 3, 'Interactive Software Development', 0, 0, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(9, 'GCIS ELE', 3, 'GCIS Elective', 0, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(10, 'GCIS 698', 3, 'Field Study', 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(11, 'GCIS 799', 6, 'Thesis', 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(12, 'GCIS 799-1', 3, 'Thesis-1', 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(13, 'GCIS 799-2', 3, 'Thesis-2', 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(14, 'GCIS ELE2', 3, 'Elective 2', 2, 2, 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2015_foundation_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2015_foundation_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `course_set` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2015_foundation_courses`
--

INSERT INTO `774_fall_2015_foundation_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_ava`, `course_set`, `is_deleted`, `date_created`, `last_updated`) VALUES
(1, 'GCIS 500', 3, 'GCIS 500', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(2, 'GCIS 501', 3, 'GCIS 501', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(3, 'GCIS 502', 3, 'GCIS 502', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(4, 'GCIS 503', 3, 'GCIS 503', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(5, 'GCIS 504', 3, 'GCIS 504', 0, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(6, 'GCIS 505', 3, 'GCIS 505', 0, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(7, 'GCIS 506', 3, 'GCIS 506', 1, 2, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(9, 'GCIS 508', 3, 'GCIS 508', 2, 0, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(10, 'GCIS 509', 3, 'GCIS 509', 0, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16'),
(11, 'GCIS 510', 3, 'GCIS 510', 1, 1, 0, '2015-05-13 20:04:16', '2015-05-13 20:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2015_prereq_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2015_prereq_courses` (
  `course_id` int(11) NOT NULL,
  `req_course_code` varchar(45) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_set` int(11) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2015_prereq_courses`
--

INSERT INTO `774_fall_2015_prereq_courses` (`course_id`, `req_course_code`, `course_code`, `course_name`, `credit`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(22, 'GCIS 514', 'GCIS 509', 'SYSTEM ANALYSIS AND DESIGN', 3, 2, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(23, 'GCIS 514', 'GCIS 510', 'Software Engineering in UML', 3, 0, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(24, 'GCIS 516', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 2, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(25, 'GCIS 516', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(26, 'GCIS 516', 'GCIS 508', 'Database Management Systems', 3, 3, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(27, 'GCIS 521', 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, 0, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(28, 'GCIS 521', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(29, 'GCIS 522', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(30, 'GCIS 522', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(31, 'GCIS 533', 'GCIS 506', 'obj.-ori. Prog. in Java', 3, 2, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(32, 'GCIS 533', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(33, 'GCIS 533', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 2, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(34, 'GCIS 533', 'GCIS 507', 'Data Structures', 3, 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(35, 'GCIS 533', 'GCIS 510', 'Software Engineering in UML', 3, 3, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(36, 'GCIS 634', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(37, 'GCIS 634', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(38, 'GCIS 639', 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, 2, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(39, 'GCIS 639', 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(40, 'GCIS 799-2', 'GCIS 799-1', 'Thesis-1', 3, 1, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `774_fall_2015_req_courses`
--

CREATE TABLE IF NOT EXISTS `774_fall_2015_req_courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_set` int(11) DEFAULT '0',
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `774_fall_2015_req_courses`
--

INSERT INTO `774_fall_2015_req_courses` (`course_id`, `course_code`, `credit`, `course_name`, `course_set`, `course_ava`, `is_deleted`, `date_created`, `last_updated`) VALUES
(15, 'GCIS 514', 3, 'Requirements and Project Management', 0, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(16, 'GCIS 516', 3, 'Data-Centric Concepts and Methods', 0, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(17, 'GCIS 521', 3, 'ADVANCED PROGRAMMING IOS', 1, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(18, 'GCIS 522', 3, 'ADVANCED PROGRAMMING: Android', 1, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(19, 'GCIS 533', 3, 'Software Patterns and Architecture', 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(20, 'GCIS 605', 3, 'Scholarship Seminar', 0, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(21, 'GCIS 634', 3, 'Software Maintenance', 0, 1, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(22, 'GCIS 639', 3, 'Interactive Software Development', 0, 0, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(23, 'GCIS ELE', 3, 'GCIS Elective', 0, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(24, 'GCIS 698', 3, 'Field Study', 2, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(25, 'GCIS 799', 6, 'Thesis', 2, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(26, 'GCIS 799-1', 3, 'Thesis-1', 2, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(27, 'GCIS 799-2', 3, 'Thesis-2', 2, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33'),
(28, 'GCIS ELE2', 3, 'Elective 2', 2, 2, 0, '2015-04-25 23:19:33', '2015-04-25 23:19:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_course_details`
--

INSERT INTO `student_course_details` (`student_course_details_id`, `student_id`, `credit`, `course_code`, `semester`, `year`, `grade`, `course_type`, `is_deleted`, `date_created`, `last_updated`) VALUES
(2, 3039779, 3, 'GCIS 698', 'fall', 2014, 'A', 'REQUIRED', 0, '2015-04-12 04:55:06', '2015-04-22 15:37:36'),
(13, 3039778, 3, 'GCIS 514', 'fall', 2014, 'C', 'REQUIRED', 0, '2015-04-12 04:55:06', '2015-04-12 04:55:06'),
(14, 3039778, 3, 'GCIS 516', 'fall', 2014, 'C', 'REQUIRED', 0, '2015-04-12 04:55:06', '2015-04-12 04:55:06'),
(15, 3039778, 3, 'GCIS 523', 'fall', 2014, 'C', 'REQUIRED', 0, '2015-04-12 04:55:06', '2015-04-12 04:55:06'),
(16, 3039778, 3, 'GCIS 509', 'fall', 2014, 'C', 'FOUNDATION', 0, '2015-04-12 04:55:06', '2015-04-12 04:55:06'),
(17, 3039778, 3, 'GCIS 602', 'fall', 2014, 'C', 'ELECTIVE', 0, '2015-04-12 04:55:06', '2015-04-12 04:55:06'),
(31, 9993, 3, 'GCIS 514', 'fall', 2016, 'A', 'REQUIRED', 0, '2015-04-24 20:37:20', '2015-04-24 20:37:20'),
(32, 9993, 3, 'GCIS 516', 'fall', 2016, 'A', 'REQUIRED', 0, '2015-04-24 20:37:20', '2015-04-24 20:37:20'),
(33, 9993, 3, 'GCIS 533', 'fall', 2016, 'A', 'ELECTIVE', 0, '2015-04-24 20:37:20', '2015-04-24 20:37:20'),
(34, 9993, 3, 'GCIS 639', 'fall', 2016, 'A', 'ELECTIVE', 0, '2015-04-24 20:37:20', '2015-04-24 20:37:20'),
(35, 9994, 3, 'GCIS 514', 'fall', 2016, 'B', 'REQUIRED', 0, '2015-04-24 20:37:21', '2015-04-24 20:37:21'),
(36, 9994, 3, 'GCIS 516', 'fall', 2016, 'B', 'REQUIRED', 0, '2015-04-24 20:37:21', '2015-04-24 20:37:21'),
(37, 9994, 3, 'GCIS 522', 'fall', 2016, 'B', 'ELECTIVE', 0, '2015-04-24 20:37:21', '2015-04-24 20:37:21'),
(38, 9994, 3, 'GCIS 509', 'fall', 2016, 'B', 'FOUNDATION', 0, '2015-04-24 20:37:21', '2015-04-24 20:37:21'),
(39, 777, 0, 'GCIS500', 'Spring', 2014, 'A+', 'Foundation', 0, '2015-04-25 19:45:54', '2015-04-25 19:45:54'),
(79, 3039779, 3, 'GCIS 514', 'Spring', 2014, 'A+', 'Required', 0, '2015-05-01 01:33:16', '2015-05-01 01:33:16'),
(80, 123, 0, 'GCIS 505', 'Spring', 2014, 'A+', 'Foundation', 0, '2015-05-02 03:45:48', '2015-05-02 03:45:48');

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

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `advisor`, `first_name`, `last_name`, `start_semester`, `start_year`, `major`, `is_deleted`, `date_created`, `last_updated`) VALUES
(303, 'blair001', '4', '45', 'fall', 2014, '774', 0, '2015-05-13 19:28:56', '2015-05-13 19:28:56'),
(420, 'blair001', '420', '420', 'fall', 2014, '774', 0, '2015-05-13 16:40:21', '2015-05-13 16:40:21'),
(435, 'blair001', 're', 'ge', 'fall', 2014, '774', 0, '2015-05-13 19:31:12', '2015-05-13 19:31:12'),
(456, 'blair001', '32', '231', 'fall', 2014, '774', 0, '2015-05-13 16:08:30', '2015-05-13 16:08:30'),
(777, 'blair001', 'Ruchi', 'Patel', 'fall', 2014, '774', 0, '2015-05-13 16:04:16', '2015-05-13 16:04:16'),
(3223, 'blair001', '232', '323', 'fall', 2014, '774', 0, '2015-05-13 16:24:45', '2015-05-13 16:24:45'),
(123456, 'blair001', 'yash', 'shah', 'fall', 2014, '774', 0, '2015-05-13 19:30:16', '2015-05-13 19:30:16'),
(123741, 'blair001', '123741', '123741', 'fall', 2014, '774', 0, '2015-05-13 19:34:27', '2015-05-13 19:34:27'),
(3039776, 'tang002', 'Chintankumar', 'Patel', 'fall', 2015, '773', 0, '2015-04-05 05:01:20', '2015-05-13 14:50:15'),
(3039778, 'tang002', 'Patel', 'John', 'fall', 2015, '773', 0, '2015-04-05 05:01:20', '2015-05-13 14:50:20'),
(3039779, 'tang002', 'Bruce', 'Wayne', 'fall', 2015, '773', 0, '2015-04-21 23:26:34', '2015-05-13 14:50:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=377 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_foundation_courses`
--

INSERT INTO `student_foundation_courses` (`student_foundation_course_id`, `student_id`, `course_code`, `course_status`, `is_deleted`, `date_created`, `last_updated`) VALUES
(30, 3039776, 'GCIS 505', 'REQ', 0, '2015-04-06 05:10:16', '2015-04-13 15:51:22'),
(31, 3039776, 'GCIS 508', 'TR', 0, '2015-04-06 15:24:01', '2015-05-13 16:43:59'),
(32, 3039776, 'GCIS 506', 'REQ', 0, '2015-04-06 15:24:01', '2015-04-13 15:51:29'),
(61, 3039779, 'GCIS 505', 'REQ', 0, '2015-04-19 21:21:54', '2015-04-19 21:21:54'),
(62, 3039779, 'GCIS 506', 'TR', 0, '2015-04-19 21:21:54', '2015-05-13 16:44:05'),
(63, 3039779, 'GCIS 508', 'REQ', 0, '2015-04-19 21:21:54', '2015-04-19 21:21:54'),
(64, 3039779, 'GCIS 509', 'REQ', 0, '2015-04-19 21:21:54', '2015-04-19 21:21:54'),
(65, 3039779, 'GCIS 510', 'TR', 0, '2015-04-19 21:21:54', '2015-05-13 16:44:12'),
(66, 3039779, 'GCIS 500', 'NQ', 0, '2015-04-19 21:21:54', '2015-04-19 21:37:42'),
(71, 9993, 'GCIS 505', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(72, 9993, 'GCIS 506', 'REQ', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(73, 9993, 'GCIS 508', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(74, 9993, 'GCIS 509', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(75, 9993, 'GCIS 510', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(76, 9993, 'GCIS 500', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(77, 9994, 'GCIS 505', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(78, 9994, 'GCIS 506', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(79, 9994, 'GCIS 508', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(80, 9994, 'GCIS 509', 'REQ', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(81, 9994, 'GCIS 510', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(82, 9994, 'GCIS 500', 'TR', 0, '2015-04-24 19:59:25', '2015-04-24 19:59:25'),
(97, 999999999, 'GCIS 505', 'TR', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(98, 999999999, 'GCIS 506', 'REq', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(99, 999999999, 'GCIS 508', 'TR', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(100, 999999999, 'GCIS 509', 'TR', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(101, 999999999, 'GCIS 510', 'REQ', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(102, 999999999, 'GCIS 500', 'TR', 0, '2015-04-26 21:02:49', '2015-04-26 21:02:49'),
(103, 456, 'GCIS 508', 'REQ', 0, '2015-04-26 21:35:51', '2015-04-26 21:35:51'),
(104, 456, 'GCIS 508', 'REQ', 0, '2015-04-26 21:35:51', '2015-04-26 21:35:51'),
(108, 1, 'GCIS 508', 'NR', 0, '2015-04-29 18:54:56', '2015-04-29 18:54:56'),
(109, 12, 'GCIS 505', 'NR', 0, '2015-05-01 01:54:51', '2015-05-01 01:54:51'),
(110, 12, 'GCIS 505', 'NR', 0, '2015-05-01 01:54:51', '2015-05-01 01:54:51'),
(111, 123, 'GCIS 505', 'NR', 0, '2015-05-02 03:45:07', '2015-05-02 03:45:07'),
(112, 123, 'GCIS 505', 'NR', 0, '2015-05-02 03:45:07', '2015-05-02 03:45:07'),
(113, 123, 'GCIS 505', 'NR', 0, '2015-05-03 17:41:01', '2015-05-03 17:41:01'),
(114, 123, 'GCIS 508', 'REQ', 0, '2015-05-03 17:41:01', '2015-05-03 17:41:01'),
(115, 999999999, 'GCIS 505', 'TR', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(116, 999999999, 'GCIS 506', 'REq', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(117, 999999999, 'GCIS 508', 'TR', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(118, 999999999, 'GCIS 509', 'TR', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(119, 999999999, 'GCIS 510', 'REQ', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(120, 999999999, 'GCIS 500', 'TR', 0, '2015-05-04 02:51:25', '2015-05-04 02:51:25'),
(121, 1434, 'GCIS 505', 'NR', 0, '2015-05-04 02:53:03', '2015-05-04 02:53:03'),
(122, 1434, 'GCIS 505', 'NR', 0, '2015-05-04 02:53:03', '2015-05-04 02:53:03'),
(123, 8787, 'GCIS 505', 'NR', 0, '2015-05-04 02:55:13', '2015-05-04 02:55:13'),
(124, 8787, 'GCIS 505', 'NR', 0, '2015-05-04 02:55:13', '2015-05-04 02:55:13'),
(125, 4444, 'GCIS 505', 'NR', 0, '2015-05-08 04:44:02', '2015-05-08 04:44:02'),
(126, 4444, 'GCIS 505', 'NR', 0, '2015-05-08 04:44:02', '2015-05-08 04:44:02'),
(127, 27, 'GCIS 505', 'NR', 0, '2015-05-08 05:01:02', '2015-05-08 05:01:02'),
(128, 520, 'GCIS 505', 'NR', 0, '2015-05-08 05:06:45', '2015-05-08 05:06:45'),
(129, 520, 'GCIS 505', 'NR', 0, '2015-05-08 05:06:45', '2015-05-08 05:06:45'),
(130, 520, 'GCIS 505', 'NR', 0, '2015-05-08 05:09:24', '2015-05-08 05:09:24'),
(131, 520, 'GCIS 505', 'NR', 0, '2015-05-08 05:09:24', '2015-05-08 05:09:24'),
(132, 1009, 'GCIS 505', 'NR', 0, '2015-05-08 05:13:04', '2015-05-08 05:13:04'),
(133, 1009, 'GCIS 505', 'NR', 0, '2015-05-08 05:13:04', '2015-05-08 05:13:04'),
(134, 30396, 'GCIS 561', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(135, 30396, 'GCIS 562', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(136, 30396, 'GCIS 563', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(137, 30396, 'GCIS 564', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(138, 30396, 'GCIS 565', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(139, 30396, 'GCIS 566', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(140, 30396, 'GCIS 567', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(141, 3777, 'GCIS 561', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(142, 3777, 'GCIS 562', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(143, 3777, 'GCIS 563', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(144, 3777, 'GCIS 564', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(145, 3777, 'GCIS 565', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(146, 3777, 'GCIS 566', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(147, 3777, 'GCIS 567', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(148, 54522, 'GCIS 561', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(149, 54522, 'GCIS 562', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(150, 54522, 'GCIS 563', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(151, 54522, 'GCIS 564', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(152, 54522, 'GCIS 565', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(153, 54522, 'GCIS 566', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(154, 54522, 'GCIS 567', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(155, 8653, 'GCIS 561', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(156, 8653, 'GCIS 562', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(157, 8653, 'GCIS 563', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(158, 8653, 'GCIS 564', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(159, 8653, 'GCIS 565', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(160, 8653, 'GCIS 566', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(161, 8653, 'GCIS 567', 'TR', 0, '2015-05-08 13:03:27', '2015-05-08 13:03:27'),
(162, 30396, 'GCIS 561', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(163, 30396, 'GCIS 562', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(164, 30396, 'GCIS 563', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(165, 30396, 'GCIS 564', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(166, 30396, 'GCIS 565', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(167, 30396, 'GCIS 566', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(168, 30396, 'GCIS 567', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(169, 3777, 'GCIS 561', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(170, 3777, 'GCIS 562', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(171, 3777, 'GCIS 563', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(172, 3777, 'GCIS 564', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(173, 3777, 'GCIS 565', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(174, 3777, 'GCIS 566', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(175, 3777, 'GCIS 567', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(176, 54522, 'GCIS 561', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(177, 54522, 'GCIS 562', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(178, 54522, 'GCIS 563', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(179, 54522, 'GCIS 564', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(180, 54522, 'GCIS 565', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(181, 54522, 'GCIS 566', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(182, 54522, 'GCIS 567', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(183, 8653, 'GCIS 561', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(184, 8653, 'GCIS 562', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(185, 8653, 'GCIS 563', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(186, 8653, 'GCIS 564', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(187, 8653, 'GCIS 565', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(188, 8653, 'GCIS 566', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(189, 8653, 'GCIS 567', 'TR', 0, '2015-05-08 13:04:18', '2015-05-08 13:04:18'),
(190, 30396, 'GCIS 561', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(191, 30396, 'GCIS 562', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(192, 30396, 'GCIS 563', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(193, 30396, 'GCIS 564', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(194, 30396, 'GCIS 565', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(195, 30396, 'GCIS 566', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(196, 30396, 'GCIS 567', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(197, 3777, 'GCIS 561', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(198, 3777, 'GCIS 562', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(199, 3777, 'GCIS 563', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(200, 3777, 'GCIS 564', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(201, 3777, 'GCIS 565', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(202, 3777, 'GCIS 566', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(203, 3777, 'GCIS 567', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(204, 54522, 'GCIS 561', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(205, 54522, 'GCIS 562', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(206, 54522, 'GCIS 563', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(207, 54522, 'GCIS 564', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(208, 54522, 'GCIS 565', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(209, 54522, 'GCIS 566', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(210, 54522, 'GCIS 567', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(211, 8653, 'GCIS 561', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(212, 8653, 'GCIS 562', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(213, 8653, 'GCIS 563', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(214, 8653, 'GCIS 564', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(215, 8653, 'GCIS 565', 'TR', 0, '2015-05-08 13:07:26', '2015-05-08 13:07:26'),
(216, 8653, 'GCIS 566', 'TR', 0, '2015-05-08 13:07:27', '2015-05-08 13:07:27'),
(217, 8653, 'GCIS 567', 'TR', 0, '2015-05-08 13:07:27', '2015-05-08 13:07:27'),
(218, 653, 'GCIS 561', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(219, 653, 'GCIS 562', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(220, 653, 'GCIS 563', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(221, 653, 'GCIS 564', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(222, 653, 'GCIS 565', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(223, 653, 'GCIS 566', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(224, 653, 'GCIS 567', 'TR', 0, '2015-05-08 13:37:19', '2015-05-08 13:37:19'),
(225, 653, 'GCIS 561', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(226, 653, 'GCIS 562', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(227, 653, 'GCIS 563', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(228, 653, 'GCIS 564', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(229, 653, 'GCIS 565', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(230, 653, 'GCIS 566', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(231, 653, 'GCIS 567', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(232, 30396, 'GCIS 561', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(233, 30396, 'GCIS 562', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(234, 30396, 'GCIS 563', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(235, 30396, 'GCIS 564', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(236, 30396, 'GCIS 565', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(237, 30396, 'GCIS 566', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(238, 30396, 'GCIS 567', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(239, 3777, 'GCIS 561', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(240, 3777, 'GCIS 562', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(241, 3777, 'GCIS 563', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(242, 3777, 'GCIS 564', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(243, 3777, 'GCIS 565', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(244, 3777, 'GCIS 566', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(245, 3777, 'GCIS 567', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(246, 54522, 'GCIS 561', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(247, 54522, 'GCIS 562', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(248, 54522, 'GCIS 563', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(249, 54522, 'GCIS 564', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(250, 54522, 'GCIS 565', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(251, 54522, 'GCIS 566', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(252, 54522, 'GCIS 567', 'TR', 0, '2015-05-08 14:23:29', '2015-05-08 14:23:29'),
(253, 143, 'GCIS 505', 'NR', 0, '2015-05-08 16:33:47', '2015-05-08 16:33:47'),
(254, 143, 'GCIS 508', 'REQ', 0, '2015-05-08 16:33:47', '2015-05-08 16:33:47'),
(255, 653, 'GCIS 561', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(256, 653, 'GCIS 562', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(257, 653, 'GCIS 563', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(258, 653, 'GCIS 564', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(259, 653, 'GCIS 565', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(260, 653, 'GCIS 566', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(261, 653, 'GCIS 567', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(262, 30396, 'GCIS 561', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(263, 30396, 'GCIS 562', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(264, 30396, 'GCIS 563', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(265, 30396, 'GCIS 564', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(266, 30396, 'GCIS 565', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(267, 30396, 'GCIS 566', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(268, 30396, 'GCIS 567', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(269, 3777, 'GCIS 561', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(270, 3777, 'GCIS 562', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(271, 3777, 'GCIS 563', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(272, 3777, 'GCIS 564', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(273, 3777, 'GCIS 565', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(274, 3777, 'GCIS 566', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(275, 3777, 'GCIS 567', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(276, 54522, 'GCIS 561', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(277, 54522, 'GCIS 562', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(278, 54522, 'GCIS 563', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(279, 54522, 'GCIS 564', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(280, 54522, 'GCIS 565', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(281, 54522, 'GCIS 566', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(282, 54522, 'GCIS 567', 'TR', 0, '2015-05-12 01:38:53', '2015-05-12 01:38:53'),
(283, 653, 'GCIS 561', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(284, 653, 'GCIS 562', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(285, 653, 'GCIS 563', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(286, 653, 'GCIS 564', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(287, 653, 'GCIS 565', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(288, 653, 'GCIS 566', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(289, 653, 'GCIS 567', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(290, 30396, 'GCIS 561', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(291, 30396, 'GCIS 562', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(292, 30396, 'GCIS 563', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(293, 30396, 'GCIS 564', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(294, 30396, 'GCIS 565', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(295, 30396, 'GCIS 566', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(296, 30396, 'GCIS 567', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(297, 3777, 'GCIS 561', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(298, 3777, 'GCIS 562', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(299, 3777, 'GCIS 563', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(300, 3777, 'GCIS 564', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(301, 3777, 'GCIS 565', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(302, 3777, 'GCIS 566', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(303, 3777, 'GCIS 567', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(304, 54522, 'GCIS 561', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(305, 54522, 'GCIS 562', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(306, 54522, 'GCIS 563', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(307, 54522, 'GCIS 564', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(308, 54522, 'GCIS 565', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(309, 54522, 'GCIS 566', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(310, 54522, 'GCIS 567', 'TR', 0, '2015-05-12 01:42:59', '2015-05-12 01:42:59'),
(311, 1, 'GCIS 561', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(312, 1, 'GCIS 562', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(313, 1, 'GCIS 563', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(314, 1, 'GCIS 564', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(315, 1, 'GCIS 565', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(316, 1, 'GCIS 566', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(317, 1, 'GCIS 567', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(318, 2, 'GCIS 561', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(319, 2, 'GCIS 562', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(320, 2, 'GCIS 563', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(321, 2, 'GCIS 564', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(322, 2, 'GCIS 565', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(323, 2, 'GCIS 566', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(324, 2, 'GCIS 567', 'TR', 0, '2015-05-12 13:00:25', '2015-05-12 13:00:25'),
(325, 3, 'GCIS 561', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(326, 3, 'GCIS 562', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(327, 3, 'GCIS 563', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(328, 3, 'GCIS 564', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(329, 3, 'GCIS 565', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(330, 3, 'GCIS 566', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(331, 3, 'GCIS 567', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(332, 4, 'GCIS 561', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(333, 4, 'GCIS 562', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(334, 4, 'GCIS 563', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(335, 4, 'GCIS 564', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(336, 4, 'GCIS 565', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(337, 4, 'GCIS 566', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(338, 4, 'GCIS 567', 'TR', 0, '2015-05-12 13:00:26', '2015-05-12 13:00:26'),
(339, 11, 'GCIS 561', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(340, 11, 'GCIS 562', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(341, 11, 'GCIS 563', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(342, 11, 'GCIS 564', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(343, 11, 'GCIS 565', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(344, 11, 'GCIS 566', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(345, 11, 'GCIS 567', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(346, 22, 'GCIS 561', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(347, 22, 'GCIS 562', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(348, 22, 'GCIS 563', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(349, 22, 'GCIS 564', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(350, 22, 'GCIS 565', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(351, 22, 'GCIS 566', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(352, 22, 'GCIS 567', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(353, 33, 'GCIS 561', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(354, 33, 'GCIS 562', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(355, 33, 'GCIS 563', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(356, 33, 'GCIS 564', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(357, 33, 'GCIS 565', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(358, 33, 'GCIS 566', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(359, 33, 'GCIS 567', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(360, 44, 'GCIS 561', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(361, 44, 'GCIS 562', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(362, 44, 'GCIS 563', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(363, 44, 'GCIS 564', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(364, 44, 'GCIS 565', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(365, 44, 'GCIS 566', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(366, 44, 'GCIS 567', 'TR', 0, '2015-05-12 13:13:52', '2015-05-12 13:13:52'),
(367, 3223, 'GCIS 505', 'NR', 0, '2015-05-13 16:24:48', '2015-05-13 16:24:48'),
(368, 420, 'GCIS 505', 'REQ', 0, '2015-05-13 16:41:11', '2015-05-13 16:41:11'),
(369, 420, 'GCIS 508', 'TR', 0, '2015-05-13 16:41:11', '2015-05-13 16:41:11'),
(370, 420, 'GCIS 503', 'REQ', 0, '2015-05-13 16:41:11', '2015-05-13 16:41:11'),
(371, 420, 'GCIS 504', 'TR', 0, '2015-05-13 16:41:11', '2015-05-13 16:41:11'),
(372, 420, 'GCIS 503', 'TR', 0, '2015-05-13 16:41:11', '2015-05-13 16:41:11'),
(373, 123741, 'GCIS 503', 'REQ', 0, '2015-05-13 19:34:51', '2015-05-13 19:34:51'),
(374, 123741, 'GCIS 501', 'TR', 0, '2015-05-13 19:34:51', '2015-05-13 19:34:51'),
(375, 123741, 'GCIS 502', 'REQ', 0, '2015-05-13 19:34:51', '2015-05-13 19:34:51'),
(376, 123741, 'GCIS 500', 'REQ', 0, '2015-05-13 19:34:51', '2015-05-13 19:54:58');

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
-- Indexes for table `773_fall_2015_foundation_courses`
--
ALTER TABLE `773_fall_2015_foundation_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `773_fall_2015_prereq_courses`
--
ALTER TABLE `773_fall_2015_prereq_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `773_fall_2015_req_courses`
--
ALTER TABLE `773_fall_2015_req_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2014_foundation_courses`
--
ALTER TABLE `774_fall_2014_foundation_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2014_prereq_courses`
--
ALTER TABLE `774_fall_2014_prereq_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2014_req_courses`
--
ALTER TABLE `774_fall_2014_req_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2015_foundation_courses`
--
ALTER TABLE `774_fall_2015_foundation_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2015_prereq_courses`
--
ALTER TABLE `774_fall_2015_prereq_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `774_fall_2015_req_courses`
--
ALTER TABLE `774_fall_2015_req_courses`
  ADD PRIMARY KEY (`course_id`);

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
-- AUTO_INCREMENT for table `773_fall_2015_foundation_courses`
--
ALTER TABLE `773_fall_2015_foundation_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `773_fall_2015_prereq_courses`
--
ALTER TABLE `773_fall_2015_prereq_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `773_fall_2015_req_courses`
--
ALTER TABLE `773_fall_2015_req_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `774_fall_2014_foundation_courses`
--
ALTER TABLE `774_fall_2014_foundation_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `774_fall_2014_prereq_courses`
--
ALTER TABLE `774_fall_2014_prereq_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `774_fall_2014_req_courses`
--
ALTER TABLE `774_fall_2014_req_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `774_fall_2015_foundation_courses`
--
ALTER TABLE `774_fall_2015_foundation_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `774_fall_2015_prereq_courses`
--
ALTER TABLE `774_fall_2015_prereq_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `774_fall_2015_req_courses`
--
ALTER TABLE `774_fall_2015_req_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student_course_details`
--
ALTER TABLE `student_course_details`
  MODIFY `student_course_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `student_foundation_courses`
--
ALTER TABLE `student_foundation_courses`
  MODIFY `student_foundation_course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=377;
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
