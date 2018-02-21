-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 08:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inslyq3`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `birth_date` date NOT NULL,
  `ssn` int(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_by` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `modified_by` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `birth_date`, `ssn`, `active`, `created_by`, `modified_by`, `created_at`, `modified_at`) VALUES
(2, 'Name', '1996-02-07', 12345679, 1, 'tester', 'tester', '2018-02-17 07:12:02', '2018-02-17 07:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `employee_background_information`
--

CREATE TABLE `employee_background_information` (
  `employee_id` int(11) NOT NULL,
  `introduction_en` text NOT NULL,
  `work_experience_en` text NOT NULL,
  `education_en` text NOT NULL,
  `introduction_es` text NOT NULL,
  `work_experience_es` text NOT NULL,
  `education_es` text NOT NULL,
  `introduction_fr` text NOT NULL,
  `work_experience_fr` text NOT NULL,
  `education_fr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_background_information`
--

INSERT INTO `employee_background_information` (`employee_id`, `introduction_en`, `work_experience_en`, `education_en`, `introduction_es`, `work_experience_es`, `education_es`, `introduction_fr`, `work_experience_fr`, `education_fr`) VALUES
(2, 'introduction in English', ' experience in English', 'Education in English', 'Introduction in Spanish', 'Experience in Spanish', 'Education in Spanish', 'Introduction in French', 'Experience in French ', 'Education in French');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `employee_id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` int(28) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`employee_id`, `email`, `phone`, `address`) VALUES
(2, 'test@gmail.com', 123456789, 'Address of the employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_background_information`
--
ALTER TABLE `employee_background_information`
  ADD KEY `fk_emolpyee_id` (`employee_id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD KEY `fk_employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_background_information`
--
ALTER TABLE `employee_background_information`
  ADD CONSTRAINT `fk_emolpyee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
