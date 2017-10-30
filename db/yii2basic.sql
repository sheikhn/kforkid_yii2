-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 05:47 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.23-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `count`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails_cca`
--

CREATE TABLE `schooldetails_cca` (
  `id` int(11) NOT NULL,
  `school_details_id` int(11) NOT NULL,
  `school_cca_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails_infra`
--

CREATE TABLE `schooldetails_infra` (
  `id` int(11) NOT NULL,
  `school_details_id` int(11) NOT NULL,
  `school_infra_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails_level`
--

CREATE TABLE `schooldetails_level` (
  `id` int(11) NOT NULL,
  `school_details_id` int(11) NOT NULL,
  `school_level_id` int(11) NOT NULL,
  `value` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails_syllabus`
--

CREATE TABLE `schooldetails_syllabus` (
  `id` int(11) NOT NULL,
  `school_details_id` int(11) NOT NULL,
  `school_syllabus_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_cca`
--

CREATE TABLE `school_cca` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_cca`
--

INSERT INTO `school_cca` (`id`, `name`) VALUES
(1, 'Dance'),
(2, 'Folk songs'),
(3, 'Musical activities'),
(4, 'Art'),
(5, 'Yoga'),
(6, 'Debate and discussion');

-- --------------------------------------------------------

--
-- Table structure for table `school_details`
--

CREATE TABLE `school_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `studentratio` int(11) NOT NULL,
  `teacherratio` int(11) NOT NULL,
  `classroom` int(11) NOT NULL,
  `totalstudents` int(11) NOT NULL,
  `playgroundsize` int(11) NOT NULL,
  `campussize` int(11) NOT NULL,
  `sslcfirstclass` int(11) NOT NULL,
  `studentmaleratio` int(11) NOT NULL,
  `studentfemaleratio` int(11) NOT NULL,
  `teachermaleratio` int(11) NOT NULL,
  `teacherfemaleratio` int(11) NOT NULL,
  `minoritystudents` int(11) NOT NULL,
  `avgyearlycost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_infra`
--

CREATE TABLE `school_infra` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_infra`
--

INSERT INTO `school_infra` (`id`, `name`) VALUES
(1, 'Libraries'),
(2, 'Science Laboratories'),
(3, 'ICT Laboratories'),
(4, 'Multimedia Centre'),
(5, 'Languages Laboratory'),
(6, 'Home Science Laboratory'),
(7, 'Discovery Room'),
(8, 'Art Room'),
(9, 'Maths Laboratories'),
(10, 'Smart Board Classrooms');

-- --------------------------------------------------------

--
-- Table structure for table `school_level`
--

CREATE TABLE `school_level` (
  `id` int(50) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_level`
--

INSERT INTO `school_level` (`id`, `level`) VALUES
(1, 'Pre-Primary(Pre Nursery - UKG)'),
(2, 'Primary(1st-4th)'),
(3, 'Middle(5th-7th)'),
(4, 'Secondary(8th-10th)'),
(5, 'Senior Secondary(11th-12th)');

-- --------------------------------------------------------

--
-- Table structure for table `school_syllabus`
--

CREATE TABLE `school_syllabus` (
  `id` int(11) NOT NULL,
  `syllabus` varchar(75) NOT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_syllabus`
--

INSERT INTO `school_syllabus` (`id`, `syllabus`, `state_id`) VALUES
(1, 'Indian Certificate of Secondary Education', NULL),
(2, 'Central Board of Secondary Education', NULL),
(3, 'State Board', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam	'),
(4, 'Bihar	'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana	'),
(9, 'Himachal Pradesh'),
(10, 'Jammu and Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu	'),
(25, 'Telangana'),
(26, 'Tripura	'),
(27, 'Uttar Pradesh'),
(28, 'Uttarakhand'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`) VALUES
(1, 'niranjan', 'qweasd'),
(2, 'napster', 'asdzxc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schooldetails_cca`
--
ALTER TABLE `schooldetails_cca`
  ADD PRIMARY KEY (`id`,`school_details_id`,`school_cca_id`),
  ADD KEY `school_details_id` (`school_details_id`),
  ADD KEY `school_cca_id` (`school_cca_id`);

--
-- Indexes for table `schooldetails_infra`
--
ALTER TABLE `schooldetails_infra`
  ADD PRIMARY KEY (`id`,`school_details_id`,`school_infra_id`),
  ADD KEY `school_details_id` (`school_details_id`),
  ADD KEY `school_infra_id` (`school_infra_id`);

--
-- Indexes for table `schooldetails_level`
--
ALTER TABLE `schooldetails_level`
  ADD PRIMARY KEY (`id`,`school_details_id`,`school_level_id`),
  ADD KEY `school_details_id` (`school_details_id`),
  ADD KEY `school_level_id` (`school_level_id`);

--
-- Indexes for table `schooldetails_syllabus`
--
ALTER TABLE `schooldetails_syllabus`
  ADD PRIMARY KEY (`id`,`school_details_id`,`school_syllabus_id`),
  ADD KEY `school_details_id` (`school_details_id`),
  ADD KEY `school_syllabus_id` (`school_syllabus_id`);

--
-- Indexes for table `school_cca`
--
ALTER TABLE `school_cca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_details`
--
ALTER TABLE `school_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_infra`
--
ALTER TABLE `school_infra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_level`
--
ALTER TABLE `school_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_syllabus`
--
ALTER TABLE `school_syllabus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_id` (`state_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schooldetails_cca`
--
ALTER TABLE `schooldetails_cca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schooldetails_infra`
--
ALTER TABLE `schooldetails_infra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schooldetails_level`
--
ALTER TABLE `schooldetails_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schooldetails_syllabus`
--
ALTER TABLE `schooldetails_syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_cca`
--
ALTER TABLE `school_cca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `school_details`
--
ALTER TABLE `school_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_infra`
--
ALTER TABLE `school_infra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `school_level`
--
ALTER TABLE `school_level`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `school_syllabus`
--
ALTER TABLE `school_syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `schooldetails_cca`
--
ALTER TABLE `schooldetails_cca`
  ADD CONSTRAINT `schooldetails_cca_ibfk_1` FOREIGN KEY (`school_details_id`) REFERENCES `school_details` (`id`),
  ADD CONSTRAINT `schooldetails_cca_ibfk_2` FOREIGN KEY (`school_cca_id`) REFERENCES `school_cca` (`id`);

--
-- Constraints for table `schooldetails_infra`
--
ALTER TABLE `schooldetails_infra`
  ADD CONSTRAINT `schooldetails_infra_ibfk_1` FOREIGN KEY (`school_details_id`) REFERENCES `school_details` (`id`),
  ADD CONSTRAINT `schooldetails_infra_ibfk_2` FOREIGN KEY (`school_infra_id`) REFERENCES `school_infra` (`id`);

--
-- Constraints for table `schooldetails_level`
--
ALTER TABLE `schooldetails_level`
  ADD CONSTRAINT `schooldetails_level_ibfk_1` FOREIGN KEY (`school_details_id`) REFERENCES `school_details` (`id`),
  ADD CONSTRAINT `schooldetails_level_ibfk_2` FOREIGN KEY (`school_level_id`) REFERENCES `school_level` (`id`);

--
-- Constraints for table `schooldetails_syllabus`
--
ALTER TABLE `schooldetails_syllabus`
  ADD CONSTRAINT `schooldetails_syllabus_ibfk_1` FOREIGN KEY (`school_details_id`) REFERENCES `school_details` (`id`),
  ADD CONSTRAINT `schooldetails_syllabus_ibfk_2` FOREIGN KEY (`school_syllabus_id`) REFERENCES `school_syllabus` (`id`);

--
-- Constraints for table `school_syllabus`
--
ALTER TABLE `school_syllabus`
  ADD CONSTRAINT `school_syllabus_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
