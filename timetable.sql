-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `type_name`, `hall_name`, `hall_capacity`) VALUES
(1, 'theoretical', 'as', 50),
(2, 'theoretical', '202', 50),
(3, 'theoretical', '203', 50),
(4, 'theoretical', '204', 50),
(5, 'theoretical', '205', 50);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(20) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `major_name`) VALUES
(1, 'Computer Science'),
(2, 'Software Engineering'),
(3, 'Computer Information System'),
(4, 'Information Security and Digital Evidence'),
(5, 'Data Science and Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `report_teacher`
--

CREATE TABLE `report_teacher` (
  `id` int(20) NOT NULL,
  `teacher_name` int(255) NOT NULL,
  `subject_num` int(20) NOT NULL,
  `num_of_study` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `section` varchar(100) NOT NULL,
  `techer` int(10) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `hall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(20) NOT NULL,
  `hall_id` int(20) NOT NULL,
  `students_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `year` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_num` int(11) NOT NULL,
  `subject_type` varchar(100) NOT NULL,
  `num_of_study` int(11) NOT NULL,
  `pre_subsnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `subject_name`, `subject_num`, `subject_type`, `num_of_study`, `pre_subsnum`) VALUES
(1, 'c++', 1233, 'theoretical', 250, 1222);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(20) NOT NULL,
  `year` int(20) NOT NULL,
  `semester` int(20) NOT NULL,
  `major_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `pre_sub_num` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `semester`, `major_id`, `subject_id`, `pre_sub_num`, `name`, `type_name`) VALUES
(1, 0, 0, 1, 1233, 1222, 'c++', 'theoretical'),
(2, 2, 2, 2, 12331, 1222, 'C++ lab', 'laboratory'),
(3, 1, 1, 1, 122312, 231223, 'OOP', 'theoretical'),
(4, 1, 1, 1, 766554, 654576, 'OOP lab', 'laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `depar_num` int(20) NOT NULL,
  `active` varchar(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `permission` varchar(100) NOT NULL,
  `report_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `email`, `password`, `name`, `depar_num`, `active`, `date_from`, `date_to`, `permission`, `report_id`) VALUES
(1, 'ismail@a', '12345', 'ismail', 1, '0', '2024-04-30', '2024-05-03', '3', 0),
(2, 'ali@gmail.com', '123', 'ali', 1, '0', '2024-05-24', '2024-05-27', '3', 0),
(3, 'ali2@gmail.com', '123', 'ali2', 1, '0', '2024-05-24', '2024-05-27', '3', 0),
(4, 'm@g.c', '123', 'mohammed', 1, 'yes', '2024-05-24', '2026-06-17', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tetches`
--

CREATE TABLE `tetches` (
  `id` int(11) NOT NULL,
  `techer_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `state` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_teacher`
--
ALTER TABLE `report_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`,`students_id`,`teacher_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_id` (`subject_id`),
  ADD KEY `major_id` (`major_id`,`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `depar_num` (`depar_num`);

--
-- Indexes for table `tetches`
--
ALTER TABLE `tetches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `techer_id` (`techer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report_teacher`
--
ALTER TABLE `report_teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tetches`
--
ALTER TABLE `tetches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`depar_num`) REFERENCES `major` (`id`);

--
-- Constraints for table `tetches`
--
ALTER TABLE `tetches`
  ADD CONSTRAINT `tetches_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `tetches_ibfk_2` FOREIGN KEY (`techer_id`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
