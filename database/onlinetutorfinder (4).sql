-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 09:01 AM
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
-- Database: `onlinetutorfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`ID`, `Email`, `Name`, `Phone`, `Gender`, `Type`) VALUES
(10, 'tazin@gmail.com', 'tazin', '02154584854545', 'female', 'admin'),
(11, 'israat@gmail.com', 'israt', '01515667288', 'Female', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `bookingaccepted`
--

CREATE TABLE `bookingaccepted` (
  `id` int(50) NOT NULL,
  `tUsername` varchar(100) NOT NULL,
  `pUsername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookingrejected`
--

CREATE TABLE `bookingrejected` (
  `id` int(50) NOT NULL,
  `tEmail` varchar(50) NOT NULL,
  `pEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookingrequest`
--

CREATE TABLE `bookingrequest` (
  `id` int(11) NOT NULL,
  `pEmail` varchar(50) NOT NULL,
  `tEmail` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingrequest`
--

INSERT INTO `bookingrequest` (`id`, `pEmail`, `tEmail`, `Status`) VALUES
(5, 'fahim@gmail.com', 'dola@gmail.com', 'Requested'),
(6, 'fahim@gmail.com', 'azahinhasan@gmail.com', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `classlevel`
--

CREATE TABLE `classlevel` (
  `id` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tUsername` varchar(50) DEFAULT NULL,
  `Level` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classlevel`
--

INSERT INTO `classlevel` (`id`, `Email`, `tUsername`, `Level`) VALUES
(13, 'azahinhasan@gmail.com', 'Zahin', ',Class6to8'),
(14, 'sadiakash1309@gmail.com', 'zaza', ',Class6to8');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Email` varchar(50) NOT NULL,
  `tUsername` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Email`, `tUsername`, `Location`, `id`) VALUES
('azahinhasan@gmail.com', 'Zahin', 'Mirpur', 19),
('sadiakash1309@gmail.com', 'zaza', 'Banani', 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Verify` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Password`, `Verify`, `Email`, `Type`) VALUES
(41, 'Zahin', '123', 'true', 'azahinhasan@gmail.com', 'tutor'),
(42, 'tazin', '2', 'true', 'tazin@gmail.com', 'admin'),
(43, 'is4', '123', 'true', 'israt@gmail.com', 'Parent'),
(44, 'fahim1', '12', 'true', 'fahim@gmail.com', 'Parent'),
(45, 'zaza', '1414', 'false', 'sadiakash1309@gmail.com', 'tutor'),
(46, 'israt', '147', 'true', 'israat@gmail.com', 'moderator'),
(47, '', '', 'true', '', 'Parent'),
(48, '', '', 'true', '', 'Parent'),
(49, '', '', 'true', '', 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `parentsinfo`
--

CREATE TABLE `parentsinfo` (
  `pUsername` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Image` blob NOT NULL,
  `Name` varchar(50) NOT NULL,
  `pid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentsinfo`
--

INSERT INTO `parentsinfo` (`pUsername`, `Email`, `Gender`, `Image`, `Name`, `pid`) VALUES
('fahim12', 'fahim@gmail.com', 'male', 0x692e6a7067, 'Fahim', 0),
('is4', 'israt@gmail.com', 'female', 0x662e6a7067, 'Israt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rangchnagehistory`
--

CREATE TABLE `rangchnagehistory` (
  `ID` int(11) NOT NULL,
  `Updater` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rangchnagehistory`
--

INSERT INTO `rangchnagehistory` (`ID`, `Updater`, `Time`, `Name`, `Status`) VALUES
(11, 'tazin@gmail.com', '2020/09/25 : 12:38:24pm', 'israt', 'promotion'),
(12, 'tazin@gmail.com', '2020/09/25 : 12:38:33pm', 'israt', 'demotion');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`Email`, `Username`, `Salary`, `id`) VALUES
('azahinhasan@gmail.com', 'Zahin', '120-150', 24),
('sadiakash1309@gmail.com', 'zaza', '44-45', 25);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Email` varchar(50) NOT NULL,
  `tUsername` varchar(50) DEFAULT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Email`, `tUsername`, `Subject`, `id`) VALUES
('azahinhasan@gmail.com', 'Zahin', ',Chemistry,Physics', 30),
('sadiakash1309@gmail.com', 'zaza', ',Chemistry', 31);

-- --------------------------------------------------------

--
-- Table structure for table `topteachers`
--

CREATE TABLE `topteachers` (
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `classlevel` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topteachers`
--

INSERT INTO `topteachers` (`email`, `name`, `location`, `classlevel`, `subject`, `salary`) VALUES
('azahinhasan@gmail.com', 'Zahin', 'Banani', 'Class8to10', 'Programming', '10000-20000'),
('dola@gmail.com', 'fariya', 'kuratuli', 'Class8to10', 'English', '2000-3000'),
('rayhan@gmail.com', 'rayhan', 'banani', 'Class6to8', 'Physics', '1000-2000');

-- --------------------------------------------------------

--
-- Table structure for table `tutorinfo`
--

CREATE TABLE `tutorinfo` (
  `tid` int(50) NOT NULL,
  `tUsername` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `ProfilePic` varchar(500) NOT NULL,
  `CV` varchar(500) DEFAULT NULL,
  `Verify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorinfo`
--

INSERT INTO `tutorinfo` (`tid`, `tUsername`, `Name`, `Email`, `Phone`, `Gender`, `ProfilePic`, `CV`, `Verify`) VALUES
(0, 'Zahin', 'Zahin Hasan', 'azahinhasan@gmail.com', 1515667288, 'Male', 'pro.jpg', 'logo.png', 'true'),
(0, 'zaza', 'Sadi Rahman', 'sadiakash1309@gmail.com', 1705387490, 'Male', 'admin.jpg', 'admin.jpg', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bookingaccepted`
--
ALTER TABLE `bookingaccepted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingrejected`
--
ALTER TABLE `bookingrejected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingrequest`
--
ALTER TABLE `bookingrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classlevel`
--
ALTER TABLE `classlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parentsinfo`
--
ALTER TABLE `parentsinfo`
  ADD PRIMARY KEY (`pUsername`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rangchnagehistory`
--
ALTER TABLE `rangchnagehistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topteachers`
--
ALTER TABLE `topteachers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tutorinfo`
--
ALTER TABLE `tutorinfo`
  ADD PRIMARY KEY (`tUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookingrejected`
--
ALTER TABLE `bookingrejected`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingrequest`
--
ALTER TABLE `bookingrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classlevel`
--
ALTER TABLE `classlevel`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rangchnagehistory`
--
ALTER TABLE `rangchnagehistory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
