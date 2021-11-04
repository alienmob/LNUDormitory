-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 04:48 AM
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
(1, 'username', '$2y$10$NerVx9w3.CT57djN.YO8w.pe1gBR9X8.RZdypcTeNpDSQ7UUp71SO', 'Admin', 'Admin', 'Tacloban City', 'embanaj@gmail.com', '09063774018', 'profile.jpg', '2021-06-02 16:00:00'),
(9, 'Frazier', '$2y$10$pZGblWZkqeRlypd04wH4teDcYkws8LpufaYYyJ3O836Tmiybrr2SW', 'Reuben', 'Frazier', 'Ut repellendus Modi', 'lyrav@mailinator.com', 'Excepteur ut aut qui', '', '2021-10-07 03:41:24');

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
(4, 'Furniture'),
(5, 'Bed Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `transient_id` varchar(100) NOT NULL,
  `floor_id` int(15) NOT NULL,
  `room_id` int(15) NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `date_out` date NOT NULL,
  `time_out` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `transient_id` varchar(100) NOT NULL,
  `floor_id` int(15) NOT NULL,
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

INSERT INTO `checkout` (`id`, `transient_id`, `floor_id`, `room_id`, `date_in`, `time_in`, `date_out`, `time_out`, `status`) VALUES
(18, 'UON1059', 1, 2, '1994-03-27', '02:59:00', '1999-08-18', '11:29:00', 0),
(20, 'UON1059', 1, 2, '1997-02-05', '22:20:00', '2016-06-23', '02:42:00', 0),
(21, 'GDZ0829', 1, 2, '2011-04-24', '02:52:00', '2003-01-05', '07:20:00', 0),
(22, 'GDZ0829', 1, 2, '1980-07-05', '07:16:00', '2021-05-29', '19:34:00', 0),
(23, 'GDZ0829', 1, 2, '1997-05-25', '06:51:00', '1977-09-30', '22:02:00', 0),
(24, 'GDZ0829', 1, 2, '2003-12-19', '15:33:00', '2003-12-22', '16:31:00', 0),
(25, 'GDZ0829', 1, 2, '2016-08-15', '15:59:00', '2010-09-01', '22:14:00', 0),
(26, 'GDZ0829', 1, 2, '1992-05-17', '02:43:00', '1978-12-12', '09:10:00', 0),
(27, 'GDZ0829', 1, 2, '1996-10-10', '21:04:00', '1973-01-02', '14:38:00', 0),
(28, 'GDZ0829', 1, 2, '2015-06-25', '07:14:00', '2019-11-15', '19:35:00', 0),
(29, 'GDZ0829', 1, 2, '2018-05-30', '00:24:00', '2011-11-15', '06:47:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department`, `title`, `code`) VALUES
(1, 'College of Management and Entrepreneurship', 'Bachelor of Science in Business Administration', 'BSBA'),
(2, 'College of Arts and Sciences', 'Bachelor of Science in Information Technology', 'BSIT'),
(3, 'College of Management and Entrepreneurship', 'Bachelor of Science in Hospitality Management', 'BSHM');

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
  `quantity_used` bigint(255) NOT NULL,
  `quantity_service` bigint(255) NOT NULL,
  `quantity_unservice` bigint(255) NOT NULL,
  `quantity_total` bigint(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `code`, `category_id`, `title`, `quantity`, `quantity_used`, `quantity_service`, `quantity_unservice`, `quantity_total`, `status`) VALUES
(20, 'S06', 5, 'Mattress/Foam', 10, 0, 10, 0, 10, 0),
(21, 'P28', 5, 'Pillow', 10, 0, 10, 0, 10, 0),
(22, 'K56', 5, 'Blanket', 10, 0, 10, 0, 10, 0),
(23, 'D58', 5, 'Bed Sheet', 10, 0, 10, 5, 15, 0),
(24, 'N34', 1, 'Electric Fan', 10, 0, 10, 0, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipments_u`
--

CREATE TABLE `equipments_u` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` varchar(50) NOT NULL,
  `attendance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_category_id`, `description`, `location`, `date`, `time_start`, `time_end`, `status`, `attendance`) VALUES
(40, 1, 'Ipsa et nihil ut et', 'Ullam quo iure eos ', '2010-11-18', '15:49:00', '02:43:00', '', ''),
(43, 2, 'Cleaning Backyard and front', 'LNU Dorm Grounds', '2021-10-27', '07:00:00', '09:00:00', 'Cancelled!', ''),
(45, 4, 'Dolor ut tempore un', 'Delectus dolorem id', '2021-11-14', '00:53:00', '09:05:00', 'Cancelled!', ''),
(46, 2, 'Consectetur sed cul', 'Fugiat ut et irure ', '2021-11-20', '17:49:00', '08:46:00', 'Cancelled!', ''),
(47, 1, 'efwfw', 'LNU Dorm Building', '2021-10-31', '18:41:00', '19:41:00', 'Cancelled!', '');

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
-- Table structure for table `floor_category`
--

CREATE TABLE `floor_category` (
  `id` int(11) NOT NULL,
  `floor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor_category`
--

INSERT INTO `floor_category` (`id`, `floor_name`) VALUES
(1, '1st Floor'),
(2, '2nd Floor'),
(3, '3rd Floor'),
(4, '4th Floor');

-- --------------------------------------------------------

--
-- Table structure for table `log_book`
--

CREATE TABLE `log_book` (
  `id` int(11) NOT NULL,
  `rfid_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_book`
--

INSERT INTO `log_book` (`id`, `rfid_id`, `date`, `time_in`, `time_out`) VALUES
(154, '0435A012', '2021-10-18', '10:10 pm', '10:11 pm'),
(155, 'FADEEEBE', '2021-10-18', '10:10 pm', '10:11 pm'),
(156, '9AB00DBF', '2021-10-18', '10:10 pm', '10:11 pm'),
(157, 'FADEEEBE', '2021-10-22', '10:07 pm', '10:07 pm'),
(158, '63AB812E', '2021-10-26', '03:59 pm', '03:59 pm');

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
  `status` int(1) NOT NULL,
  `receipt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `student_id`, `date_from`, `date_to`, `date_paid`, `status`, `receipt`) VALUES
(202, 1800649, '2021-11-01', '2021-11-30', '2021-11-04 02:51:16', 1, 'Picture9.png');

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
  `decline` varchar(255) NOT NULL,
  `date_pending` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `student_id`, `equipment_id`, `note`, `feedback`, `decline`, `date_pending`, `status`) VALUES
(140, 1800649, 21, 'requesting', '', '', '2021-11-03 04:07:56', 0),
(141, 1800649, 21, 'mahuram kay mabaho na hahaha', '', '', '2021-11-03 04:19:46', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `date_reports` timestamp NOT NULL DEFAULT current_timestamp(),
  `equipment_reports` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date_reports`, `equipment_reports`, `details`) VALUES
(10, '2021-09-21 10:10:33', 'Pillow', 'Added 5 Pillow as Serviceable Equipment'),
(11, '2021-09-21 10:10:44', 'Electric Fan', 'Marked 1 Electric Fan as Unerviceable Equipment'),
(12, '2021-09-21 10:10:54', 'Blanket', 'Marked 2 Blanket as Unerviceable Equipment'),
(13, '2021-09-21 12:12:44', 'Bed Sheet', 'Added 5 Bed Sheet as Serviceable Equipment'),
(14, '2021-09-21 12:13:01', 'Mattress/Foam', 'Marked 1 Mattress/Foam as Unerviceable Equipment'),
(16, '2021-10-17 14:00:20', 'Mattress/Foam', 'Marked 13 Mattress/Foam as Unserviceable Equipment'),
(17, '2021-10-17 14:03:57', 'Mattress/Foam', 'Added 1 Mattress/Foam as Serviceable Equipment'),
(18, '2021-10-17 14:09:16', 'Mattress/Foam', 'Added 1 Mattress/Foam as Serviceable Equipment'),
(19, '2021-10-17 14:28:24', 'Mattress/Foam', 'Added 1 Mattress/Foam as Serviceable Equipment'),
(20, '2021-10-17 15:17:59', 'Bed Sheet', 'Added 10 Bed Sheet as Serviceable Equipment'),
(21, '2021-10-17 15:18:26', 'Bed Sheet', 'Marked 5 Bed Sheet as Unserviceable Equipment'),
(22, '2021-10-17 15:18:39', 'Bed Sheet', 'Added 5 Bed Sheet as Serviceable Equipment'),
(23, '2021-10-17 15:24:02', 'Blanket', 'Added 10 Blanket as Serviceable Equipment'),
(24, '2021-10-17 15:24:07', 'Electric Fan', 'Added 10 Electric Fan as Serviceable Equipment'),
(25, '2021-10-17 15:24:12', 'Mattress/Foam', 'Added 10 Mattress/Foam as Serviceable Equipment'),
(26, '2021-10-17 15:24:17', 'Pillow', 'Added 10 Pillow as Serviceable Equipment');

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
(104, 1800649, 23, '2021-10-17 15:23:30'),
(105, 1800649, 23, '2021-10-17 15:23:33'),
(106, 1800649, 24, '2021-11-02 13:07:20'),
(107, 1800649, 20, '2021-11-02 13:07:26'),
(108, 1800649, 21, '2021-11-02 13:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `floor_category_id` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `occupants` bigint(255) NOT NULL,
  `occupancy` bigint(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `floor_category_id`, `room_category_id`, `occupants`, `occupancy`, `status`) VALUES
(1, '1-1', 1, 1, 1, 15, 1),
(2, '1-2', 1, 2, 0, 5, 1),
(3, '1-3', 1, 3, 1, 16, 0),
(4, '1-4', 1, 4, 0, 16, 0),
(5, '1-5', 1, 5, 0, 16, 0),
(6, '2-1', 2, 1, 0, 15, 0),
(7, '2-2', 2, 2, 0, 16, 0),
(8, '2-3', 2, 3, 0, 16, 0),
(9, '2-4', 2, 4, 1, 16, 0),
(10, '2-5', 2, 5, 0, 16, 0),
(11, '3-1', 3, 1, 0, 16, 0),
(12, '3-2', 3, 2, 0, 16, 0),
(13, '3-3', 3, 3, 0, 16, 0),
(14, '3-4', 3, 4, 0, 16, 0),
(15, '3-5', 3, 5, 0, 16, 0),
(16, '4-1', 4, 1, 0, 16, 0),
(17, '4-2', 4, 2, 0, 16, 0),
(18, '4-3', 4, 3, 0, 16, 0),
(19, '4-4', 4, 4, 0, 16, 0),
(20, '4-5', 4, 5, 1, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `room_name`) VALUES
(1, 'Room 1'),
(2, 'Room 2'),
(3, 'Room 3'),
(4, 'Room 4'),
(5, 'Room 5');

-- --------------------------------------------------------

--
-- Table structure for table `room_occupants`
--

CREATE TABLE `room_occupants` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_report`
--

CREATE TABLE `room_report` (
  `id` int(11) NOT NULL,
  `date_reports` timestamp NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_report`
--

INSERT INTO `room_report` (`id`, `date_reports`, `room_id`, `details`, `reason`) VALUES
(34, '2021-10-20 17:34:43', 2, 'Marked as Available', 'dfsdf'),
(35, '2021-10-20 17:34:49', 2, 'Occupancy decreased by 1', 'sdfsdf'),
(36, '2021-10-20 17:34:56', 2, 'Occupancy increased by 1', 'sdfsdf'),
(37, '2021-10-20 17:35:01', 2, 'Marked as Unavailable', 'sdfsdf'),
(38, '2021-10-20 17:35:05', 2, 'Marked as Available', 'sdfsdf'),
(39, '2021-10-20 17:37:54', 2, 'Marked as Unavailable', 'dsfsdf'),
(40, '2021-10-22 09:08:25', 2, 'Occupancy increased by 1', 'asf'),
(41, '2021-10-25 03:26:58', 1, 'Occupancy decreased by 1', 'Voluptates veniam d'),
(42, '2021-10-25 03:27:13', 1, 'Occupancy increased by 1', 'Et repellendus Reru'),
(43, '2021-10-25 03:27:34', 1, 'Marked as Unavailable', 'Eligendi aliquid qui');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(15) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `actualroom_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
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

INSERT INTO `students` (`student_id`, `rfid`, `password`, `firstname`, `lastname`, `gender`, `address`, `contact`, `floor_id`, `room_id`, `actualroom_id`, `email`, `privilege`, `guardian`, `guardian_contact`, `photo`, `course_id`, `status`, `created_at`) VALUES
(1800123, '63AB812E', '$2y$10$emEHPqaQTU2MsXi7l5eWCeOE4PXqYWQREyVkg/YHAfVZL0mx257NO', 'sampe', 'sample', 'Male', 'Consectetur quae tem', '+6365343754343', 2, 4, 9, 'sdsd@gmail,com', 'Non-Athlete', 'Calvin Holloway', '745575534', '', 2, 1, '2021-10-26 07:58:14'),
(1800234, '0435A012', '$2y$10$uOEprdOjqZAKH5qEImdJYuCyFGg.BC89YsiCGRvGqJb5zy2hV0Wx6', 'Lynette', 'Pomasin', 'Female', 'Samar', '+633653653445', 1, 1, 1, 'pomasin@gmail.com', 'Athlete', 'Mrs. Pomasin', '09123232233', '', 2, 1, '2021-07-08 15:30:17'),
(1800567, '9AB00DBF', '$2y$10$diKHkQssg.oilu6jmSMHcuiK/WxQ22kRMFSbLakRcwhQ3s43IWLjm', 'Gia Nila', 'Pantas', 'Female', 'Tacloban City', '+633653653445', 1, 3, 3, 'embanaj@gmail.com', 'Non-Athlete', 'Gil Pantas', '09123456789', 'profile.jpg', 2, 1, '2021-07-07 07:04:32'),
(1800649, 'FADEEEBE', '$2y$10$bxlvXiEAaJVYfnaGBE9J.uP.L1AVKs9gckDrYel96IxJlnXuZnRo6', 'Jeremiah', 'Embana', 'Male', 'Brgy. 76 Fatima Village Tacloban City, Leyte', '+639613057822', 4, 5, 20, 'jeremiahembana22@gmail.com', 'Athlete', 'Jeany Embana', '09063774018', 'ID PIC.png', 2, 0, '2021-06-12 12:30:31');

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
(1, 'mis', '$2y$10$8FPnQu.E7l/JDNyHucswQeZ2MhFe7fc1bkLdUZqCFWRGJCEkHVqHW', 'mis', 'mis', '', '2021-06-24 07:04:30');

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
('GDZ0829', 'Kirby', 'Rhodes', 'Male', 'Qui magni nostrud su', '714288424', 0, '2021-10-17 11:05:07'),
('UON1059', 'Jeremiah', 'Embana', 'Male', 'Brgy. 76 Fatima Village Tacloban City, Leyte', '09063774018', 0, '2021-06-29 01:32:19');

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
  `deadline` date NOT NULL,
  `status` int(1) NOT NULL,
  `receipt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unpaid`
--

INSERT INTO `unpaid` (`id`, `student_id`, `date_from`, `date_to`, `date_unpaid`, `deadline`, `status`, `receipt`) VALUES
(430, 1800123, '2021-11-01', '2021-11-30', '2021-10-31 11:41:32', '2021-11-15', 0, ''),
(431, 1800234, '2021-11-01', '2021-11-30', '2021-10-31 11:41:32', '2021-11-15', 0, ''),
(432, 1800567, '2021-11-01', '2021-11-30', '2021-10-31 11:41:32', '2021-11-15', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(11) NOT NULL,
  `student_id` int(15) NOT NULL,
  `violation` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `student_id`, `violation`, `date`) VALUES
(8, 1800649, 'lost item', '2021-11-03');

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
  ADD KEY `room_id` (`room_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transient_id` (`transient_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `floor_id` (`floor_id`);

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
-- Indexes for table `equipments_u`
--
ALTER TABLE `equipments_u`
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
-- Indexes for table `floor_category`
--
ALTER TABLE `floor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_book`
--
ALTER TABLE `log_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfid_id` (`rfid_id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_category_id` (`floor_category_id`),
  ADD KEY `room_category_id` (`room_category_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_occupants`
--
ALTER TABLE `room_occupants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_report`
--
ALTER TABLE `room_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `rfid_id` (`rfid`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `floor_id` (`floor_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `actualroom_id` (`actualroom_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `equipments_u`
--
ALTER TABLE `equipments_u`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `floor_category`
--
ALTER TABLE `floor_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_book`
--
ALTER TABLE `log_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `promissory`
--
ALTER TABLE `promissory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_occupants`
--
ALTER TABLE `room_occupants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_report`
--
ALTER TABLE `room_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unpaid`
--
ALTER TABLE `unpaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`floor_id`) REFERENCES `floor_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkin_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`transient_id`) REFERENCES `transient` (`transient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`floor_id`) REFERENCES `floor_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkout_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments_u`
--
ALTER TABLE `equipments_u`
  ADD CONSTRAINT `equipments_u_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`event_category_id`) REFERENCES `event_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_book`
--
ALTER TABLE `log_book`
  ADD CONSTRAINT `log_book_ibfk_1` FOREIGN KEY (`rfid_id`) REFERENCES `students` (`rfid`);

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
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`floor_category_id`) REFERENCES `floor_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`room_category_id`) REFERENCES `room_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_report`
--
ALTER TABLE `room_report`
  ADD CONSTRAINT `room_report_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`floor_id`) REFERENCES `floor_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`room_id`) REFERENCES `room_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`actualroom_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unpaid`
--
ALTER TABLE `unpaid`
  ADD CONSTRAINT `unpaid_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `violations`
--
ALTER TABLE `violations`
  ADD CONSTRAINT `violations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
