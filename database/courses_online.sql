-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2024 at 10:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int DEFAULT NULL COMMENT '1=>admin\r\n2=>admin help'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', '$2y$10$InwDAMO1id1BA.cqsrr9VuqTfftmleVZ8azKyjTrTtLRAl4AN49pC', 1),
(2, 'adminhelp@gmail.com', '$2y$10$ldDtOc/k53nup1XrWhZgBOQGOpPegZ1cffnkhzkZ1EqbuZxWRQiTy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `duration_time` int NOT NULL,
  `cost` int NOT NULL,
  `stage` int NOT NULL,
  `classroom` int NOT NULL,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `duration`, `duration_time`, `cost`, `stage`, `classroom`, `teacher_id`, `subject_id`) VALUES
(12, 'لغة عربية', '2', 3, 10000, 1, 1, 6, 9),
(13, 'رياضيات ', '3', 2, 20000, 1, 2, 6, 9),
(14, 'كيمياء', '4', 2, 35000, 1, 3, 6, 9),
(15, 'ادارة اعمال', '4', 3, 50000, 2, 7, 7, 7),
(16, 'ادارة مكاتب سياحية', '6', 1, 45000, 2, 9, 7, 7),
(17, 'ادارة علوم سياحية', '8', 2, 77000, 2, 8, 7, 7),
(18, 'فوتوشوب', '2', 1, 35000, 3, 1, 8, 8),
(19, 'ICDL', '3', 2, 100000, 3, 2, 8, 8),
(20, 'برنامج البيان', '3', 2, 125000, 2, 11, 8, 8),
(21, 'مونتاج', '6', 3, 155000, 3, 12, 8, 8),
(22, 'فيزياء', '4', 1, 33000, 2, 8, 6, 9),
(23, 'انكليزي', '5', 1, 230000, 3, 12, 9, 9),
(24, 'فرنسي', '6', 1, 125000, 2, 9, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `phone_number`, `email`, `password`) VALUES
(5, 'student1', 16, '0999999999', 'student1@gmail.com', '$2y$10$6Ir3RKhGdBijt9MbxYBr5uFCKr5O/ZRLbqOexkKHINNMbFAx1GJAq'),
(6, 'student 2', 22, '0999999999', 'student2@gmail.com', '$2y$10$QuVRkk4MRnoUe24hvMo//OnSoEZcxWLWTXESII5txMfQoIVZcpUSG'),
(7, 'student 3', 12, '0999999999', 'student3@gmail.com', '$2y$10$7OaZrYgKgHvqPB5lrHlsl.KuERcNnmAdTQPU9twhZqxBhHUD98ylu');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(7, 'سياحية'),
(8, 'تدريبية'),
(9, 'تعليمية');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`) VALUES
(6, 'teacher 1', 'teacher1@gmail.com', '$2y$10$bm2uWk0hiOWc3dsdp.iNqeoYmeRGJ3eodiFql5Xaoi/mN.2PJOvSq'),
(7, 'teacher 2', 'teacher2@gmail.com', '$2y$10$zWdXZXZyZjhdLYmDNFfEfe8cPwT/aI41IOyWmzFto.9vzLZlizlkC'),
(8, 'teacher 3', 'teacher3@gmail.com', '$2y$10$sgUD/at428VCkSLHYiqiZeyNoFKPJL/vxo5X0UzaK3ppAlFmHZf4m'),
(9, 'teacher 4', 'teacher4@gmail.com', '$2y$10$kYhGw2AG.HjnxuTCRrCVVO5POCyyqj.9XB4hwLvK6pXuaIi5i7iOu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `students_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_courses_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
