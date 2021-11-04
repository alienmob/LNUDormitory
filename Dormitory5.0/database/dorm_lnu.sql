-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 07:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorm_lnu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `contact`, `photo`, `created_at`) VALUES
(1, 'username', '$2y$10$UmEi94KQFWXwypsWNdot1e0o/x46SY71Pdnx2OeQeS8vHpqlxxUZm', 'Admin', 'Admin', 'Tacloban City', 'admin@gmail.com', '09063774018', 'profile.jpg', '2021-06-02 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_borrow` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Appliances'),
(2, 'Hardware Supply'),
(4, 'Furniture'),
(5, 'Bed Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `transient_id` varchar(100) NOT NULL,
  `room_id` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `date_out` date NOT NULL,
  `time_out` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `transient_id`, `room_id`, `date_in`, `time_in`, `date_out`, `time_out`, `status`) VALUES
(26, 'UON1059', 14, '2021-07-29', '09:33:00', '2021-07-31', '09:33:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `transient_id` varchar(100) NOT NULL,
  `room_id` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `date_out` date NOT NULL,
  `time_out` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `transient_id`, `room_id`, `date_in`, `time_in`, `date_out`, `time_out`, `status`) VALUES
(16, 'UON1059', 2, '2021-06-29', '09:32:00', '2021-06-30', '09:32:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`) VALUES
(1, 'Bachelor of Science in Business Administration', 'BSBA'),
(2, 'Bachelor of Science in Information Technology', 'BSIT'),
(3, 'Bachelor of Science in Hospitality Management', 'BSHM');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity` bigint(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `code`, `category_id`, `title`, `quantity`, `status`) VALUES
(20, 'S06', 5, 'Mattress/Foam', 0, 0),
(21, 'P28', 5, 'Pillow', 14, 0),
(22, 'K56', 5, 'Blanket', 15, 0),
(23, 'D58', 5, 'Bed Sheet', 35, 0),
(24, 'N34', 1, 'Electric Fan', 11, 0),
(25, 'C94', 2, 'Clothes Drawer', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_category_id`, `description`, `location`, `date`, `time_start`, `time_end`, `status`) VALUES
(14, 2, 'Conucting clean up drive', 'LNU Dorm Grounds', '2021-06-30', '09:30:00', '10:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `event_name`) VALUES
(1, 'Meeting'),
(2, 'Clean Up Drive'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `student_id`, `date_from`, `date_to`, `date_paid`, `status`) VALUES
(120, 1800567, '2021-06-29', '2021-07-29', '2021-06-29 01:27:50', 1),
(121, 1800649, '2021-06-29', '2021-07-29', '2021-06-29 01:29:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `date_pending` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `student_id`, `equipment_id`, `note`, `feedback`, `date_pending`, `status`) VALUES
(69, 1800649, 21, 'dscdsdc', '', '2021-06-29 04:37:12', 0),
(70, 1800649, 21, 'borrow', '', '2021-06-29 15:47:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promissory`
--

CREATE TABLE `promissory` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `pnote` varchar(255) NOT NULL,
  `date_promissory` timestamp NOT NULL DEFAULT current_timestamp(),
  `deadline` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promissory`
--

INSERT INTO `promissory` (`id`, `student_id`, `date_from`, `date_to`, `pnote`, `date_promissory`, `deadline`, `status`) VALUES
(42, 1800649, '2021-06-29', '2021-07-29', 'i will pay by end of the month', '2021-06-29 01:29:14', '2021-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `date_return` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `student_id`, `equipment_id`, `date_return`) VALUES
(74, 1800649, 21, '2021-06-29 01:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `description`) VALUES
(1, '1-1', '1st Floor - Room 1'),
(2, '1-2', '1st Floor - Room 2'),
(3, '1-3', '1st Floor - Room 3'),
(4, '1-4', '1st Floor - Room 4'),
(5, '1-5', '1st Floor - Room 5'),
(6, '2-1', '2nd Floor - Room 1'),
(7, '2-2', '2nd Floor - Room 2'),
(8, '2-3', '2nd Floor - Room 3'),
(9, '2-4', '2nd Floor - Room 4'),
(10, '2-5', '2nd Floor - Room 5'),
(11, '3-1', '3rd Floor - Room 1'),
(12, '3-2', '3rd Floor - Room 2'),
(13, '3-3', '3rd Floor - Room 3'),
(14, '3-4', '3rd Floor - Room 4'),
(15, '3-5', '3rd Floor - Room 5'),
(16, '4-1', '4th Floor - Room 1'),
(17, '4-2', '4th Floor - Room 2'),
(18, '4-3', '4th Floor - Room 3'),
(19, '4-4', '4th Floor - Room 4'),
(20, '4-5', '4th Floor - Room 5');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `guardian_contact` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `password`, `firstname`, `lastname`, `gender`, `address`, `contact`, `email`, `room_id`, `privilege`, `guardian`, `guardian_contact`, `photo`, `course_id`, `status`, `created_at`) VALUES
(1800234, '$2y$10$ritHvvjd5C1MamkadCcs9OsnhV.4g9RGXQhTOzboJmNyDOrUQ9xCu', 'Lynette', 'Pomasin', 'Female', 'Samar', '+639876543214', 'pomasin@gmail.com', 18, 'Non-Athlete', 'Mrs. Pomasin', '09123232233', '', 2, 0, '2021-06-24 16:37:31'),
(1800435, '$2y$10$hSTVMJe9M4ZSnP6fSSfkTu8Z077d82NVBjY.0Z1u7VaOMIJt5cHDK', 'Jalyne', 'Terrora', 'Female', 'Jaro, Leyte', '+639534545345', 'terrora@gmail.com', 10, 'Athlete', 'Mr. Terrora', '42323425', '', 2, 0, '2021-06-24 16:35:25'),
(1800567, '$2y$10$JySTB0llmzwi.3qDVdHxMOsV6zqeeh9TwbIiaJE9EjlvyHlLmDkgW', 'Gia Nila', 'Pantas', 'Female', 'Tacloban City', '+639845353453', 'pantas@gmail.com', 1, 'Non-Athlete', 'Gil Pantas', '09123456789', '', 2, 0, '2021-06-14 12:11:02'),
(1800649, '$2y$10$WXD587S7S64jwGc0akJAuekTQR3SNZmhR0u8eb7i/pOz06X4sU4/6', 'Jeremiah', 'Embana', 'Male', 'Brgy. 76 Fatima Village Tacloban City, Leyte', '+639613057822', 'jeremiahembana22@gmail.com', 5, 'Athlete', 'Jeany Embana', '09063774018', 'ID PIC.png', 2, 1, '2021-06-12 12:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `stud_timeout`
--

CREATE TABLE `stud_timeout` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_timeout`
--

INSERT INTO `stud_timeout` (`id`, `student_id`, `reason`, `created_at`) VALUES
(10, 1800649, 'Going home', '2021-06-29 15:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_at`) VALUES
(1, 'mis', '$2y$10$I5pKP20.JNB7RCWP6lszlugZwbMpElWXBdqM1Rvxgxoe2v2RjmuyG', 'mis', 'mis', '', '2021-06-24 07:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `timein`
--

CREATE TABLE `timein` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `ttcreated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timein`
--

INSERT INTO `timein` (`id`, `student_id`, `reason`, `ttcreated_at`) VALUES
(12, 1800649, 'going home', '2021-06-29 01:23:34'),
(13, 1800649, 'dffsg', '2021-06-29 02:20:08'),
(14, 1800649, 'going home', '2021-06-29 15:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `timeout`
--

CREATE TABLE `timeout` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `tcreated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeout`
--

INSERT INTO `timeout` (`id`, `student_id`, `reason`, `tcreated_at`) VALUES
(16, 1800649, 'going home', '2021-06-29 01:22:43'),
(17, 1800649, 'dffsg', '2021-06-29 01:50:36'),
(18, 1800649, 'going home', '2021-06-29 02:25:51'),
(19, 1800649, 'Going home', '2021-06-29 15:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `transient`
--

CREATE TABLE `transient` (
  `transient_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transient`
--

INSERT INTO `transient` (`transient_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `status`, `created_at`) VALUES
('UON1059', 'Jeremiah', 'Embana', 'Male', 'Brgy. 76 Fatima Village Tacloban City, Leyte', '09063774018', 1, '2021-06-29 01:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `unpaid`
--

CREATE TABLE `unpaid` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `date_unpaid` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unpaid`
--

INSERT INTO `unpaid` (`id`, `student_id`, `date_from`, `date_to`, `date_unpaid`, `status`) VALUES
(147, 1800435, '2021-06-29', '2021-07-29', '2021-06-29 01:27:05', 0),
(148, 1800234, '2021-06-29', '2021-07-29', '2021-06-29 01:27:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transient_id` (`transient_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transient_id` (`transient_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_category_id` (`event_category_id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `promissory`
--
ALTER TABLE `promissory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `stud_timeout`
--
ALTER TABLE `stud_timeout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timein`
--
ALTER TABLE `timein`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `timeout`
--
ALTER TABLE `timeout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `transient`
--
ALTER TABLE `transient`
  ADD PRIMARY KEY (`transient_id`);

--
-- Indexes for table `unpaid`
--
ALTER TABLE `unpaid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `promissory`
--
ALTER TABLE `promissory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stud_timeout`
--
ALTER TABLE `stud_timeout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timein`
--
ALTER TABLE `timein`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timeout`
--
ALTER TABLE `timeout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `unpaid`
--
ALTER TABLE `unpaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`transient_id`) REFERENCES `transient` (`transient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`transient_id`) REFERENCES `transient` (`transient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_category_id`) REFERENCES `event_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paid`
--
ALTER TABLE `paid`
  ADD CONSTRAINT `paid_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending`
--
ALTER TABLE `pending`
  ADD CONSTRAINT `pending_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pending_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promissory`
--
ALTER TABLE `promissory`
  ADD CONSTRAINT `promissory_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `returns_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timein`
--
ALTER TABLE `timein`
  ADD CONSTRAINT `timein_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeout`
--
ALTER TABLE `timeout`
  ADD CONSTRAINT `timeout_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unpaid`
--
ALTER TABLE `unpaid`
  ADD CONSTRAINT `unpaid_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
