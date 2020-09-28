-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 01:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gces_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `add student`
--

CREATE TABLE `add student` (
  `Roll no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add student`
--

INSERT INTO `add student` (`Roll no`, `name`, `year`, `subject`) VALUES
(40, 'milan', '2018', 'BESE'),
(41, 'Arun', '2018', 'BECE'),
(48, 'abiral', '1998', 'BECE'),
(51, 'abcdefg', '1999', 'BECE'),
(52, 'Milan', '2109', 'BESE'),
(56, '', '', ''),
(54, 'Milan', '2019', 'BESE'),
(55, 'milan', '2919', 'BESE'),
(57, '', '', ''),
(58, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`id`, `student_name`, `roll_number`, `attendance_status`, `date`) VALUES
(0, 'milan', '1', 'present', '2020-07-22'),
(0, 'milan', '1', 'present', '2020-07-23'),
(1, 'Arun', '2', 'absent', '2020-07-23'),
(2, 'abiral', '3', 'present', '2020-07-23'),
(3, 'abcdefg', '4', 'present', '2020-07-23'),
(0, 'milan', '1', 'present', '2020-07-24'),
(1, 'Arun', '2', 'present', '2020-07-24'),
(2, 'abiral', '3', 'present', '2020-07-24'),
(3, 'abcdefg', '4', 'present', '2020-07-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add student`
--
ALTER TABLE `add student`
  ADD PRIMARY KEY (`Roll no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add student`
--
ALTER TABLE `add student`
  MODIFY `Roll no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
