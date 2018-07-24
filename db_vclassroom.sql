-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2018 at 07:53 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '1',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `class_id`, `ct_id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 1, 1, 1, 'Scripting Language'),
(2, 1, 1, 1, 2, 'Markup Language'),
(3, 1, 1, 1, 1, 'Network Protocol'),
(4, 1, 1, 1, 1, 'Programming Language'),
(5, 1, 1, 2, 2, '1990'),
(6, 1, 1, 2, 1, '1992'),
(7, 1, 1, 2, 1, '1993'),
(8, 1, 1, 2, 1, '1995'),
(9, 1, 1, 3, 1, '1996'),
(10, 1, 1, 3, 1, '1992'),
(11, 1, 1, 3, 1, '1993'),
(12, 1, 1, 3, 2, '1990'),
(13, 1, 1, 4, 1, '1994'),
(14, 1, 1, 4, 1, '1992'),
(15, 1, 1, 4, 2, '1990'),
(16, 1, 1, 4, 1, '1995');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

DROP TABLE IF EXISTS `tbl_assignment`;
CREATE TABLE IF NOT EXISTS `tbl_assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `asn_topic` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assignment`
--

INSERT INTO `tbl_assignment` (`assignment_id`, `userid`, `asn_topic`, `deadline`, `class_id`) VALUES
(2, 1, 'This is first assignment', '2018-06-26', 1),
(3, 1, 'This is second assignment', '2018-06-26', 1),
(4, 1, 'This is third assignment', '2018-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignmentreplay`
--

DROP TABLE IF EXISTS `tbl_assignmentreplay`;
CREATE TABLE IF NOT EXISTS `tbl_assignmentreplay` (
  `assignmentReplay_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `asn_topic` varchar(255) NOT NULL,
  `replay_assignment` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `marks` float NOT NULL,
  PRIMARY KEY (`assignmentReplay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assignmentreplay`
--

INSERT INTO `tbl_assignmentreplay` (`assignmentReplay_id`, `userid`, `assignment_id`, `asn_topic`, `replay_assignment`, `class_id`, `image`, `name`, `marks`) VALUES
(1, 1, 4, 'This is third assignment', 'Hmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.sitepoint.com.\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.\r\nHmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.sitepoint.com.\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.\r\nHmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.sitepoint.com.\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.\r\nHmm. Weâ€™re having trouble finding that site.\r\n\r\nWe canâ€™t connect to the server at www.sitepoint.com.\r\nIf that address is correct, here are three other things you can try:\r\n\r\n    Try again later.\r\n    Check your network connection.\r\n    If you are connected but behind a firewall, check that Firefox has permission to access the Web.', 1, 'uploads/7cc31883b3.jpg', 'saidur', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_box`
--

DROP TABLE IF EXISTS `tbl_box`;
CREATE TABLE IF NOT EXISTS `tbl_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_box`
--

INSERT INTO `tbl_box` (`id`, `class_id`, `name`, `body`, `time`) VALUES
(1, 1, 'roky', 'hi', '03:31:09'),
(2, 1, 'saidur', 'hi', '03:41:10'),
(3, 1, 'roky', 'how r u?', '03:46:00'),
(4, 1, 'saidur', 'valo.whats about you?', '03:48:00'),
(5, 1, 'roky', 'how r u?', '03:46:00'),
(6, 1, 'saidur', 'valo.whats about you?', '03:48:00'),
(7, 1, 'roky', 'nothing', '03:46:00'),
(8, 1, 'saidur', 'what r u donig?', '03:48:00'),
(9, 1, 'roky', 'nothing', '03:46:00'),
(10, 1, 'saidur', 'what r u donig?', '03:48:00'),
(11, 1, 'Theme Parlor', 'hi', '12:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

DROP TABLE IF EXISTS `tbl_class`;
CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `classcode` varchar(255) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `userid`, `classname`, `coursename`, `coursecode`, `classcode`) VALUES
(1, 1, 'ice first batch', 'optical communication', 'ice3202', '12345'),
(2, 1, 'ice 2nd batch', 'digital signal communication', 'ice3206', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ct`
--

DROP TABLE IF EXISTS `tbl_ct`;
CREATE TABLE IF NOT EXISTS `tbl_ct` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ctname` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ct`
--

INSERT INTO `tbl_ct` (`ct_id`, `userid`, `ctname`, `class_id`) VALUES
(1, 1, 'Class Test No.-01', 1),
(2, 1, 'Class Test No.-02', 1),
(3, 1, 'Class Test No.-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion`
--

DROP TABLE IF EXISTS `tbl_discussion`;
CREATE TABLE IF NOT EXISTS `tbl_discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `body` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`discussion_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discussion`
--

INSERT INTO `tbl_discussion` (`discussion_id`, `userid`, `body`, `title`, `class_id`, `image`, `name`) VALUES
(1, 1, 'body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....body of ice fist batch discussion page first discussion post ....', 'This is title', 1, 'uploads/da52798a9f.jpg', 'saidur'),
(2, 1, 'V-Classroom 2018. All rights reserved.V-Classroom 2018. All rights reserved.V-Classroom 2018. All rights reserved.', 'This is title', 1, 'uploads/e4d6fd64e0.pdf', 'saidur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dis_comment`
--

DROP TABLE IF EXISTS `tbl_dis_comment`;
CREATE TABLE IF NOT EXISTS `tbl_dis_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dis_comment`
--

INSERT INTO `tbl_dis_comment` (`comment_id`, `userid`, `comment`, `name`, `discussion_id`) VALUES
(1, 1, 'this is first comment .', 'saidur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `star` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `userid`, `star`, `feedback`, `class_id`) VALUES
(1, 1, '5 star', 'you are good.', 1),
(2, 1, '5_star', 'good', 1),
(3, 1, '5 star', 'good sir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_handout`
--

DROP TABLE IF EXISTS `tbl_handout`;
CREATE TABLE IF NOT EXISTS `tbl_handout` (
  `handout_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `handout` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`handout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_handout`
--

INSERT INTO `tbl_handout` (`handout_id`, `userid`, `handout`, `class_id`) VALUES
(2, 1, 'this if first handout', 1),
(3, 1, 'this is second handout', 1),
(4, 1, 'this is third handout', 1),
(5, 1, 'this is second handout', 1),
(6, 1, 'this is second handout', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_joinclass`
--

DROP TABLE IF EXISTS `tbl_joinclass`;
CREATE TABLE IF NOT EXISTS `tbl_joinclass` (
  `jclass_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `classcode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jclass_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_joinclass`
--

INSERT INTO `tbl_joinclass` (`jclass_id`, `userid`, `name`, `classcode`, `status`) VALUES
(1, 2, 'roky', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

DROP TABLE IF EXISTS `tbl_marks`;
CREATE TABLE IF NOT EXISTS `tbl_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ct1` double NOT NULL,
  `ct2` double NOT NULL,
  `assignment` double NOT NULL,
  `attendence` double NOT NULL,
  `final` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`id`, `name`, `userid`, `class_id`, `ct1`, `ct2`, `assignment`, `attendence`, `final`) VALUES
(1, 'saidur   rahman', 1, 1, 22, 22, 22, 5, 53),
(2, 'saidur   rahman', 1, 1, 22, 22, 22, 5, 53);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `ques_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`ques_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`ques_id`, `userid`, `class_id`, `ct_id`, `quesNo`, `ques`) VALUES
(1, 1, 1, 1, 1, 'HTML is what type of language ?'),
(2, 1, 1, 1, 2, 'The year in which HTML was first proposed'),
(3, 1, 1, 1, 3, 'The year in which HTML was first proposed'),
(4, 1, 1, 1, 4, 'The year in which HTML was first proposed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fname`, `lname`, `email`, `password`, `role`) VALUES
(1, 'saidur', 'rahman', 'roky@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(2, 'roky', 'rahman', 'rr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
