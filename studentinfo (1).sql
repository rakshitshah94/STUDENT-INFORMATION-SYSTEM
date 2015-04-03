-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 01:44 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `adminid` bigint(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `adminname` varchar(80) NOT NULL,
  `address` text NOT NULL,
  `contactno` varchar(25) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=562 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminid`, `password`, `adminname`, `address`, `contactno`) VALUES
(111, '0b1c108d8b9c46d402a502c5b6b9261c', 'Rakshit', 'c101', '8488948220'),
(222, '0b1c108d8b9c46d402a502c5b6b9261c', 'rikhil', 'c102', '8488948220'),
(333, '0b1c108d8b9c46d402a502c5b6b9261c', 'purav', 'c103', '878946515874'),
(444, '0b1c108d8b9c46d402a502c5b6b9261c', 'setu', 'c104', '87974521165'),
(555, '0b1c108d8b9c46d402a502c5b6b9261c', 'Juhi', 'c105', '879'),
(561, 'd41d8cd98f00b204e9800998ecf8427e', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attid` bigint(4) NOT NULL AUTO_INCREMENT,
  `studid` varchar(20) NOT NULL,
  `subid` bigint(4) NOT NULL,
  `totalclasses` int(2) NOT NULL,
  `attendedclasses` int(2) NOT NULL,
  `percentage` double(4,2) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`attid`),
  KEY `studid` (`studid`),
  KEY `subid` (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attid`, `studid`, `subid`, `totalclasses`, `attendedclasses`, `percentage`, `comment`) VALUES
(6, '1', 1, 13, 10, 92.00, 'DONE! WORKING'),
(7, '1', 1, 19, 15, 90.00, 'DONE! WORKING!!');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` bigint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `name`, `emailid`, `contactno`, `subject`, `message`) VALUES
(2, 'JIM CARREY', 'j@c.c', '8494', 'HELlo', ' kxfkfhdklfj woew\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseid` bigint(4) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `coursekey` varchar(15) NOT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `comment`, `coursekey`) VALUES
(1, 'Bachelor of Arts', 'This Course is related to Arts field.', 'BA'),
(2, 'Bachelor of Commerce', 'This course is related to commerce field.', 'BCom'),
(3, 'Bachelor of Bussiness Management', 'This course is related to Bussiness field.', 'BBM'),
(4, 'Bachelor of Science', 'This field is related to science field.', 'BSc'),
(5, 'Bachelor of Computer Application', 'This field is related to computer field.', 'BCA'),
(6, 'Bachelor of Social Work', 'This field is related to social welfare field.', 'BSW'),
(7, 'RAX', 'Relational Algebra Programming language', 'RAX');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE IF NOT EXISTS `examination` (
  `examid` bigint(4) NOT NULL AUTO_INCREMENT,
  `studid` varchar(20) NOT NULL,
  `subid` bigint(4) NOT NULL,
  `courseid` bigint(4) NOT NULL,
  `internaltype` varchar(20) NOT NULL,
  `maxmarks` int(2) NOT NULL,
  `scored` int(2) NOT NULL,
  `percentage` float NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`examid`),
  KEY `subid` (`subid`),
  KEY `studid` (`studid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lecid` bigint(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `courseid` bigint(4) NOT NULL,
  `lecname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  PRIMARY KEY (`lecid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecid`, `password`, `courseid`, `lecname`, `gender`, `address`, `contactno`) VALUES
(1, '11111', 5, 'geetha', 'Female', 'MENTIONED ABOVE', '9876543211'),
(2, '0b1c108d8b9c46d402a502c5b6b9261c', 5, 'REEMA', 'Male', 'c101', '9897978789'),
(3, '0b1c108d8b9c46d402a502c5b6b9261c', 7, 'SEEMA', 'Female', 'BAMDEAKDNKD', '9879778754'),
(4, '0b1c108d8b9c46d402a502c5b6b9261c', 1, 'MEENA', 'Female', 'jskfbh', '255478896');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `semid` bigint(4) NOT NULL AUTO_INCREMENT,
  `semester` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`semid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE IF NOT EXISTS `studentdetails` (
  `studid` varchar(25) NOT NULL,
  `studfname` varchar(20) NOT NULL,
  `studlname` varchar(20) NOT NULL,
  `fathername` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `courseid` bigint(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`studid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`studid`, `studfname`, `studlname`, `fathername`, `gender`, `address`, `contactno`, `courseid`, `semester`, `dob`) VALUES
('1', 'sam', ' ababjnadlks', 'asdf', 'Male', 'xcv', '452757855', 5, '1', '1994-11-25'),
('20', 'setu', 'pandya', 'w', 'Female', 'C/101,SHAGUN JYOTI APT,nr dhananjay tower satellite', '9865489877', 6, '3', '2015-04-06'),
('33', 'rikhil', 'gandhi', 'r', 'Male', 'c/101 shagun jyoti\r\nshyamal ,satellite', '9876543215', 1, '3', '2015-04-13'),
('5', 'Rakshit', ' Shah', 'P', 'Male', 'C/101,SHAGUN JYOTI APT,\r\nNR SHYAMAL CROSS ROAD,SHYAMAL', '8488948220', 7, '6', '1994-11-25'),
('8', 'purav', 'doshi', 'eio', 'Male', 'C/101,SHAGUN JYOTI APT,nr dhananjay tower satellite', '8488948220', 3, '5', '1994-11-25'),
('9', 'juhi', 'shah', 'd', 'Male', 'C/101,SHAGUN JYOTI APT,\r\nNR SHYAMAL CROSS ROAD,SHYAMAL', '8488948220', 5, '2', '1994-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` bigint(4) NOT NULL AUTO_INCREMENT,
  `subname` varchar(20) NOT NULL,
  `courseid` bigint(4) NOT NULL,
  `lecid` bigint(4) NOT NULL,
  `subtype` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`subid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `courseid`, `lecid`, `subtype`, `semester`, `comment`) VALUES
(1, 'CPU', 1, 0, 'Language', '1', 'fhjfbg'),
(3, 'C++', 3, 0, 'Theory', '1', 'jsjk'),
(4, 'ANDROID', 7, 0, 'Lab', '6', 'andro'),
(5, 'PHP', 7, 0, 'Lab', '6', 'Php');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`studid`) REFERENCES `studentdetails` (`studid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `studentdetails` (`studid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_2` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_ibfk_3` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
