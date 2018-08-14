-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 08:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `44_1103`
--

CREATE TABLE `44_1103` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `06-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_1103`
--

INSERT INTO `44_1103` (`id`, `roll`, `06-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'absent'),
(3, 1704, 'absent'),
(4, 1708, 'present'),
(5, 2106, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_2103`
--

CREATE TABLE `44_2103` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `05-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_2103`
--

INSERT INTO `44_2103` (`id`, `roll`, `05-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'present'),
(3, 1704, 'absent'),
(4, 1708, 'present'),
(5, 2106, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_2109`
--

CREATE TABLE `44_2109` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `09-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_2109`
--

INSERT INTO `44_2109` (`id`, `roll`, `09-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'absent'),
(3, 1704, 'absent'),
(4, 1708, 'present'),
(5, 2106, 'present');

-- --------------------------------------------------------

--
-- Table structure for table `44_3104`
--

CREATE TABLE `44_3104` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `16-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_3104`
--

INSERT INTO `44_3104` (`id`, `roll`, `16-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'absent'),
(3, 1704, 'absent'),
(4, 1708, 'present'),
(5, 2106, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_3105`
--

CREATE TABLE `44_3105` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `17-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_3105`
--

INSERT INTO `44_3105` (`id`, `roll`, `17-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'absent'),
(3, 1704, 'absent'),
(4, 1708, 'present'),
(5, 2106, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_3108`
--

CREATE TABLE `44_3108` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `01-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_3108`
--

INSERT INTO `44_3108` (`id`, `roll`, `01-05-2018`) VALUES
(1, 1696, 'present'),
(2, 1703, 'absent'),
(3, 1704, 'present'),
(4, 1708, 'present'),
(5, 2106, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_3205`
--

CREATE TABLE `44_3205` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `07-05-2018` varchar(10) DEFAULT NULL,
  `08-05-2018` varchar(10) DEFAULT NULL,
  `09-05-2018` varchar(10) DEFAULT NULL,
  `10-05-2018` varchar(10) DEFAULT NULL,
  `13-05-2018` varchar(10) DEFAULT NULL,
  `14-05-2018` varchar(10) DEFAULT NULL,
  `15-05-2018` varchar(10) DEFAULT NULL,
  `16-05-2018` varchar(10) DEFAULT NULL,
  `18-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_3205`
--

INSERT INTO `44_3205` (`id`, `roll`, `07-05-2018`, `08-05-2018`, `09-05-2018`, `10-05-2018`, `13-05-2018`, `14-05-2018`, `15-05-2018`, `16-05-2018`, `18-05-2018`) VALUES
(26, 1696, 'present', 'present', 'absent', 'present', 'present', 'absent', 'present', 'present', 'absent'),
(27, 1703, 'absent', 'absent', 'absent', 'present', 'present', 'absent', 'absent', 'absent', 'absent'),
(28, 1704, 'absent', 'absent', 'absent', 'present', 'present', 'absent', 'absent', 'absent', 'absent'),
(29, 1708, 'present', 'present', 'present', 'absent', 'present', 'absent', 'present', 'present', 'absent'),
(30, 2106, 'present', 'absent', 'absent', 'present', 'present', 'absent', 'present', 'absent', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `44_3206`
--

CREATE TABLE `44_3206` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `09-05-2018` varchar(10) DEFAULT NULL,
  `10-05-2018` varchar(10) DEFAULT NULL,
  `17-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `44_3206`
--

INSERT INTO `44_3206` (`id`, `roll`, `09-05-2018`, `10-05-2018`, `17-05-2018`) VALUES
(1, 1696, 'present', 'present', 'present'),
(2, 1703, 'present', 'present', 'present'),
(3, 1704, 'present', 'present', 'absent'),
(4, 1708, 'present', 'absent', 'present'),
(5, 2106, 'present', 'present', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `45_2107`
--

CREATE TABLE `45_2107` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `15-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `45_2107`
--

INSERT INTO `45_2107` (`id`, `roll`, `15-05-2018`) VALUES
(66, 1926, 'present'),
(67, 1927, 'present'),
(68, 1928, 'absent'),
(69, 1929, 'present'),
(70, 1930, 'present'),
(71, 1931, 'absent'),
(72, 1932, 'present'),
(73, 1933, 'present'),
(74, 1934, 'absent'),
(75, 1935, 'present'),
(76, 1936, 'present'),
(77, 1937, 'absent'),
(78, 1938, 'present'),
(79, 1939, 'present'),
(80, 1940, 'absent'),
(81, 1941, 'present'),
(82, 1942, 'present'),
(83, 1943, 'present'),
(84, 1944, 'absent'),
(85, 1945, 'present'),
(86, 1946, 'absent'),
(87, 1947, 'present'),
(88, 1948, 'present'),
(89, 1949, 'absent'),
(90, 1950, 'present'),
(91, 1951, 'present'),
(92, 1952, 'absent'),
(93, 1953, 'present'),
(94, 1954, 'present'),
(95, 1955, 'absent'),
(96, 1956, 'present'),
(97, 1957, 'absent'),
(98, 1958, 'present'),
(99, 1959, 'present'),
(100, 1960, 'absent'),
(101, 1961, 'present'),
(102, 1962, 'present'),
(103, 1963, 'absent'),
(104, 1964, 'present'),
(105, 1965, 'present'),
(106, 1966, 'absent'),
(107, 1967, 'present'),
(108, 1968, 'present'),
(109, 1969, 'absent'),
(110, 1970, 'present'),
(111, 1971, 'present'),
(112, 1972, 'absent'),
(113, 1973, 'present'),
(114, 1974, 'present'),
(115, 1975, 'absent'),
(116, 2036, 'present'),
(117, 2037, 'present'),
(118, 2038, 'absent'),
(119, 2039, 'present'),
(120, 2040, 'present'),
(121, 2041, 'absent'),
(122, 2042, 'present'),
(123, 2043, 'present'),
(124, 2111, 'absent'),
(125, 2116, 'present'),
(126, 2165, 'present'),
(127, 2241, 'absent'),
(128, 2242, 'present'),
(129, 2243, 'present'),
(130, 2244, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `46_1101`
--

CREATE TABLE `46_1101` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `01-05-2018` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `46_1101`
--

INSERT INTO `46_1101` (`id`, `roll`, `01-05-2018`) VALUES
(1, 1960, 'present'),
(2, 1961, 'present'),
(3, 1962, 'present'),
(4, 1963, 'present'),
(5, 1964, 'absent'),
(6, 1966, 'absent'),
(7, 1967, 'absent'),
(8, 1968, 'absent'),
(9, 1969, 'absent'),
(10, 1972, 'absent'),
(11, 1973, 'absent'),
(12, 1974, 'present'),
(13, 1975, 'absent'),
(14, 1976, 'absent'),
(15, 1977, 'present'),
(16, 1978, 'absent'),
(17, 1979, 'absent'),
(18, 1980, 'absent'),
(19, 1981, 'absent'),
(20, 1982, 'absent'),
(21, 1983, 'absent'),
(22, 1984, 'absent'),
(23, 1985, 'absent'),
(24, 1986, 'absent'),
(25, 1987, 'present'),
(26, 1988, 'absent'),
(27, 1989, 'absent'),
(28, 1990, 'present'),
(29, 1991, 'absent'),
(30, 1992, 'absent'),
(31, 1993, 'present'),
(32, 1994, 'absent'),
(33, 1995, 'absent'),
(34, 1996, 'absent'),
(35, 1997, 'absent'),
(36, 1998, 'absent'),
(37, 1999, 'absent'),
(38, 2000, 'absent'),
(39, 2001, 'present'),
(40, 2002, 'absent'),
(41, 2003, 'absent'),
(42, 2004, 'absent'),
(43, 2005, 'absent'),
(44, 2006, 'absent'),
(45, 2007, 'absent'),
(46, 2008, 'absent'),
(47, 2009, 'present'),
(48, 2010, 'absent'),
(49, 2011, 'absent'),
(50, 2012, 'present'),
(51, 2013, 'present'),
(52, 2014, 'present'),
(53, 2015, 'present'),
(54, 2016, 'absent'),
(55, 2056, 'absent'),
(56, 2057, 'present'),
(57, 2085, 'absent'),
(58, 2216, 'absent'),
(59, 2217, 'absent'),
(60, 2218, 'absent'),
(61, 2219, 'present'),
(62, 2238, 'present');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_1201`
--

CREATE TABLE `ass_44_1201` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_1201`
--

INSERT INTO `ass_44_1201` (`id`, `roll`, `assignment_1`) VALUES
(1, 1696, '8'),
(2, 1703, '7'),
(3, 1704, '7'),
(4, 1708, '8'),
(5, 2106, '6');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_2109`
--

CREATE TABLE `ass_44_2109` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_2109`
--

INSERT INTO `ass_44_2109` (`id`, `roll`, `assignment_1`) VALUES
(1, 1696, '8'),
(2, 1703, '7'),
(3, 1704, '7'),
(4, 1708, '9'),
(5, 2106, '7');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_3107`
--

CREATE TABLE `ass_44_3107` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_3107`
--

INSERT INTO `ass_44_3107` (`id`, `roll`, `assignment_1`) VALUES
(1, 1696, '8'),
(2, 1703, '7'),
(3, 1704, '6'),
(4, 1708, '8'),
(5, 2106, '7');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_3108`
--

CREATE TABLE `ass_44_3108` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_3108`
--

INSERT INTO `ass_44_3108` (`id`, `roll`, `assignment_1`) VALUES
(1, 1696, '-1'),
(2, 1703, '20'),
(3, 1704, '5'),
(4, 1708, '14'),
(5, 2106, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_3205`
--

CREATE TABLE `ass_44_3205` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL,
  `assignment_2` varchar(15) DEFAULT NULL,
  `assignment_3` varchar(15) DEFAULT NULL,
  `assignment_4` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_3205`
--

INSERT INTO `ass_44_3205` (`id`, `roll`, `assignment_1`, `assignment_2`, `assignment_3`, `assignment_4`) VALUES
(1, 1696, '6', '7', '8', '7'),
(2, 1703, '7', '8', '9', '8'),
(3, 1704, '6', '6', '7', '5'),
(4, 1708, '10', '9', '8', '6'),
(5, 2106, '6', '7', '8', '2');

-- --------------------------------------------------------

--
-- Table structure for table `ass_44_3206`
--

CREATE TABLE `ass_44_3206` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `assignment_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ass_44_3206`
--

INSERT INTO `ass_44_3206` (`id`, `roll`, `assignment_1`) VALUES
(1, 1696, '7.5'),
(2, 1703, '7'),
(3, 1704, '5'),
(4, 1708, '7'),
(5, 2106, '9');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(4) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1101, 'Information Technology Fundamentals'),
(1103, 'Introduction to Programming Environment'),
(1104, 'Structured Programming Language Lab'),
(1105, 'Electrical Circuits'),
(1106, 'Electrical Circuits Lab'),
(1107, 'Differential and Integral Calculus'),
(1109, 'Communicative English'),
(1201, 'Data Structures'),
(1202, 'Data Structures Lab'),
(1203, 'Object Oriented Programming'),
(1204, 'Object Oriented Programming Lab'),
(1205, 'Discrete Math'),
(1207, 'Economics'),
(1209, 'Accounting'),
(2101, 'Algorithm Analysis'),
(2102, 'Algorithm Analysis Lab'),
(2103, 'Computer Architecture'),
(2104, 'Computer Architecture Lab'),
(2105, 'Electronic Devices and Circuits'),
(2106, 'Electronic Devices and Circuits Lab'),
(2107, 'Complex Variable and Vector Algebra'),
(2109, 'Statistical and Probability Theory'),
(2201, 'Information System Analysis'),
(2202, 'Information System Analysis Lab'),
(2203, 'Digital Logic Design'),
(2204, 'DLD Lab'),
(2205, 'Data Communication'),
(2207, 'Ordinary and Partial Differential Equation'),
(2209, 'Computational Mathematics'),
(2210, 'Computational Mathematics Lab'),
(3101, 'Database Management System'),
(3102, 'Database Management System Lab'),
(3103, 'Computer Network and Internet Technology'),
(3104, 'Computer Network and Internet Technology Lab'),
(3105, 'Signal and System'),
(3107, 'Operating System'),
(3108, 'Operating System Lab'),
(3109, 'Simulation and Modeling'),
(3201, 'Software Engineering'),
(3202, 'Software Engineering Lab'),
(3203, 'Computer Graphics'),
(3204, 'Computer Graphics Lab'),
(3205, 'Web Technologies'),
(3206, 'Web Programming Lab'),
(3207, 'Microprocessor and Interfacing'),
(3208, 'Microprocessor and Interfacing Lab'),
(3209, 'Introduction to Bio-informatics'),
(4101, 'Artificial Intelligences and Neural Networks'),
(4102, 'Artificial Intelligences and Neural Networks Lab'),
(4103, 'Telecommunication Systems'),
(4104, 'Telecommunication Systems Lab'),
(4105, 'Management Information System'),
(4107, 'Parallel and Distributed System'),
(4109, 'Multimedia Systems and Application'),
(4201, 'Human Computer Interfacing'),
(4203, 'Wireless and Mobile Communication'),
(4225, 'Digital Image Processing and Pattern Recognition'),
(4227, 'Mobile application development'),
(4251, 'Digital Communication Systems'),
(4299, 'Thesis or Project');

-- --------------------------------------------------------

--
-- Table structure for table `course_by_teacher_batch`
--

CREATE TABLE `course_by_teacher_batch` (
  `id` int(11) NOT NULL,
  `course_id` int(4) NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `batch` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_by_teacher_batch`
--

INSERT INTO `course_by_teacher_batch` (`id`, `course_id`, `teacher_code`, `batch`) VALUES
(1, 2109, 'FKP', 44),
(2, 3105, 'KMA', 44),
(3, 3209, 'FKP', 44),
(5, 1101, 'FT', 44),
(6, 2203, 'WZ', 44),
(7, 2103, 'WZ', 44),
(8, 3107, 'WZ', 44),
(9, 3108, 'WZ', 44),
(10, 3205, 'WZ', 44),
(11, 3206, 'WZ', 44),
(12, 3101, 'FT', 44),
(13, 3201, 'FT', 44),
(14, 3202, 'FT', 44),
(15, 3102, 'FKP', 44),
(16, 1107, 'MMS', 44),
(17, 1205, 'MMS', 44),
(18, 2107, 'MMS', 44),
(19, 2207, 'MMS', 44),
(20, 2209, 'MMS', 44),
(21, 1105, 'MSK', 44),
(22, 1103, 'JA', 44),
(23, 1104, 'JA', 44),
(24, 1201, 'JA', 44),
(25, 1202, 'JA', 44),
(26, 2205, 'RTK', 44),
(27, 3103, 'RTK', 44),
(28, 3104, 'RTK', 44),
(29, 1203, 'MAY', 44),
(30, 1204, 'MSI', 44),
(31, 2101, 'MAY', 44),
(32, 2102, 'MAY', 44),
(33, 3109, 'MAY', 44),
(34, 2107, 'MMS', 45),
(35, 1103, 'JA', 46),
(36, 1203, 'JA', 46),
(37, 1204, 'JA', 46),
(38, 1105, 'MSI', 46),
(39, 2105, 'MSK', 46),
(40, 1101, 'FT', 46),
(41, 2103, 'WZ', 45),
(42, 2103, 'MSI', 46);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `roll` int(4) NOT NULL,
  `batch` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `roll`, `batch`) VALUES
(1, 'Md. Obydullah Sarder', 1708, 44),
(2, 'Md. Kawsar Ahmed', 1696, 44),
(3, 'Md. Maruf Hosen', 1704, 44),
(4, 'S. M. Pervez Jewel', 2106, 44),
(5, 'Nowaz Shorif Shohag', 1703, 44),
(180, 'Nasrin Akter', 1926, 45),
(181, 'Kaniz Fatema', 1927, 45),
(182, 'Khairun Nahar', 1928, 45),
(183, 'Motahara Sabah Mredula', 1929, 45),
(184, 'Susan Tani Sarcar', 1930, 45),
(185, 'Humayra Binte Arfan', 1931, 45),
(186, 'Khadiza tul Kubra', 1932, 45),
(187, 'Sahera Khatun', 1933, 45),
(188, 'Shahnaz Khan Shapla', 1934, 45),
(189, 'Sadia Afrin', 1935, 45),
(190, 'Sifat-E-Jahan', 1936, 45),
(191, 'Afsara Jahin', 1937, 45),
(192, 'Labony Karmokar', 1938, 45),
(193, 'Moumitu Tasnim', 1939, 45),
(194, 'Nusrat Tasnim', 1940, 45),
(195, 'Nur-E-Laila', 1941, 45),
(196, 'Raima Adhikary', 1942, 45),
(197, 'Tasnuva Tabassum', 1943, 45),
(198, 'Mir Noshin Jahan', 1944, 45),
(199, 'Nishat Tasnim Newaz', 1945, 45),
(200, 'Samiha Kazmi', 1946, 45),
(201, 'Zinia Anjum Tonni', 1947, 45),
(202, 'Nusaiba Nizam', 1948, 45),
(203, 'Md.Nahiduzzaman', 1949, 45),
(204, 'Nidhir Chandra das', 1950, 45),
(205, 'Md. Hasibul Hayat', 1951, 45),
(206, 'Md. Iqbal Hossain', 1952, 45),
(207, 'Syed Mohammad Rakib', 1953, 45),
(208, 'MD. Shohel Rana', 1954, 45),
(209, 'Abrar Fahim Alam', 1955, 45),
(210, 'Rahman Masuk Orpon', 1956, 45),
(211, 'Abu Sayeed', 1957, 45),
(212, 'Tanvir Ahmed Siddique', 1958, 45),
(213, 'Md. Mehedi Hasan Tareq', 1959, 45),
(214, 'S M Mushfiqul Islam', 1960, 45),
(215, 'Abu Nayeem sikder', 1961, 45),
(216, 'Mahmudul Hasan Opu', 1962, 45),
(217, 'Md. Yousuf Khan', 1963, 45),
(218, 'Admission Cancel', 1964, 45),
(219, 'Rafi Mahafid', 1965, 45),
(220, 'Md. Nazmus Sakib', 1966, 45),
(221, 'Rasheduzzaman Riad', 1967, 45),
(222, 'Hasibul Haque Prottoy', 1968, 45),
(223, 'Md. Tarekul Islam Tarek', 1969, 45),
(224, 'Md. Al-Amin', 1970, 45),
(225, 'Md. Shayadat Hossain', 1971, 45),
(226, 'Rezaul karim', 1972, 45),
(227, 'Noyon Dey', 1973, 45),
(228, 'Md. Emran Babu', 1974, 45),
(229, 'Anik Sarker', 1975, 45),
(230, 'Sabikunnahar', 2036, 45),
(231, 'Saria Jahin Taluckder', 2037, 45),
(232, 'Habibul Hasib', 2038, 45),
(233, 'Fahim Fardin', 2039, 45),
(234, 'Md. Al Zobayer', 2040, 45),
(235, 'Lutfor Rahman Shimanto', 2041, 45),
(236, 'Depta Paul', 2042, 45),
(237, 'Md. Nasir Ullah', 2043, 45),
(238, 'Shuvra Tanchangya', 2165, 45),
(239, 'Ali Haider', 2241, 45),
(240, 'Kowshik Sarker', 2242, 45),
(241, 'Md.Sadi Rifat', 2243, 45),
(242, 'Nasim-Uz-Zaman', 2244, 45),
(243, 'Md. AL Mamun Parvez', 2111, 45),
(244, 'S M Sazzad Hossain', 2116, 45),
(296, 'Atiya Sultana', 1960, 46),
(297, 'Tahmina Harun Faria', 1961, 46),
(298, 'Sheama Nasrin Mim', 1962, 46),
(299, 'Afsanan Hossain Bristy', 1963, 46),
(300, 'Shakila Shafiq', 1964, 46),
(301, 'Sazia Sharmin', 1966, 46),
(302, 'Silvia Binte Nur', 1967, 46),
(303, 'Nazeela Nosheen', 1968, 46),
(304, 'Shamim Ara', 1969, 46),
(305, 'Aysha Sultana', 1972, 46),
(306, 'Atika Aktar', 1973, 46),
(307, 'Fabliha Noshen Sithi', 1974, 46),
(308, 'Kazi Fatema', 1975, 46),
(309, 'Adiba Masud', 1976, 46),
(310, 'Nusrat Jahan', 1977, 46),
(311, 'Sadia Rahman', 1978, 46),
(312, 'Moumita Chanda', 1979, 46),
(313, 'Mysha Fahmida Bristy', 1980, 46),
(314, 'Shawlat Hilmee', 1981, 46),
(315, 'Marriam Hossain', 1982, 46),
(316, 'Joya Gosh', 1983, 46),
(317, 'Nusaiba Kalam', 1984, 46),
(318, 'Bhabna Mukharjee', 1985, 46),
(319, 'Maliha Tasnim', 1986, 46),
(320, 'Jarin Tasnim Ritu', 1987, 46),
(321, 'Mehedi Hasan Khan', 1988, 46),
(322, 'Md. Solaiman Hossain', 1989, 46),
(323, 'Md. Shahadat Hossain Shakil', 1990, 46),
(324, 'Md. Hasnat Hasan Shariar Prachurzo', 1991, 46),
(325, 'Md. Shariful Islam', 1992, 46),
(326, 'Md. Aminul Islam Shanto', 1993, 46),
(327, 'Salman Us Sakeeb', 1994, 46),
(328, 'Jahid Hasan Emon', 1995, 46),
(329, 'Md. Habibullah', 1996, 46),
(330, 'Mohammad Tanvir Ahmed', 1997, 46),
(331, 'Supto Mohonta', 1998, 46),
(332, 'Istique Zahan', 1999, 46),
(333, 'Md. Nuruzzaman Sojib', 2000, 46),
(334, 'Md. Rakib Hasan', 2001, 46),
(335, 'Md. Aminul Islam', 2002, 46),
(336, 'Shagir Ahmed Zia', 2003, 46),
(337, 'Al Hel Md. Shahriar Zaman', 2004, 46),
(338, 'Md. Golam Jilani', 2005, 46),
(339, 'Mehedi Hasan', 2006, 46),
(340, 'Shamim Ahmed Shaon', 2007, 46),
(341, 'Sweet Rana', 2008, 46),
(342, 'Md. Nahian Imtiaz Hasan', 2009, 46),
(343, 'Md. Forhad Hossain', 2010, 46),
(344, 'Md. Shakhauat Hossain', 2011, 46),
(345, 'Md. Deloar Hossain', 2012, 46),
(346, 'Sirajum Shihab', 2013, 46),
(347, 'Shahidul Islam', 2014, 46),
(348, 'Saifuzzaman', 2015, 46),
(349, 'Md. Shahin Bashar', 2016, 46),
(350, 'Md. Utbah Bin Anowar Binoy', 2056, 46),
(351, 'Munira Ferdous', 2057, 46),
(352, 'Supti Barman', 2085, 46),
(353, 'Sabbir Ahmed', 2216, 46),
(354, 'Tanvir Ahmed', 2217, 46),
(355, 'Tajin Ahmad Nirab', 2218, 46),
(356, 'Md. Salem Al Bahar', 2219, 46),
(357, 'Nusrat Ahmed Nissa', 2238, 46);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `t_position` varchar(255) NOT NULL,
  `t_speciality` varchar(255) NOT NULL,
  `t_profileImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_code`, `teacher_name`, `t_position`, `t_speciality`, `t_profileImage`) VALUES
(1, 'FKP', 'Md. Fazlul Karim Patwary', 'Associate Professor', 'Database, Web Technology, Statistical Analysis', 'fkp.jpg'),
(2, 'FT', 'Fahima Tabassum', 'Associate Professor', 'Image Processing, Telecommunication', 'ft.jpg'),
(3, 'KMA', 'K M Akkas Ali', 'Associate Professor', 'Authentication, Cryptography, Steganography, Network Securit ...', 'kma.jpg'),
(4, 'MMS', 'M. Mesbahuddin Sarker', 'Associate Professor', 'E-Voting, E-Democracy, E-Government, Media and Com..', 'mms.jpg'),
(5, 'MSK', 'Dr M Shamim Kaiser', 'Associate Professor', 'Data analytics, Machine Learning, Wireless Network &amp; Sign ...', 'msk.png'),
(6, 'JA', 'Jesmin Akhter', 'Associate Professor', 'Wireless Communications', 'js.jpg'),
(7, 'RTK', 'Risala Tasin Khan', 'Associate Professor', 'Telecommunication', 'rtk.jpg'),
(8, 'WZ', 'Dr. Md Whaiduzzaman', 'Associate Professor', 'Mobile Cloud Computing &amp; Big Data', 'wz.jpg'),
(10, 'MAY', 'Dr. Mohammad Abu Yousuf', 'Associate Professor', 'Computer Vision, Human Robot Interaction, Medical Image proc ...', 'may.jpg'),
(11, 'SAM', 'Shamim Al Mamun', 'Assistant Professor', 'Computer Vision, HCI, Software Engineering, Social Media...', 'sam.jpg'),
(12, 'MSI', 'Dr. Mohammad Shahidul Islam', 'Assistant Professor', 'Pattern Recognition', 'msi.jpg'),
(13, 'ZIC', 'Zamshed Iqbal Chowdhury', 'Lecturer', 'Embedded Systems, Reconfigurable Computing ...', 'zic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_2109`
--

CREATE TABLE `t_44_2109` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL,
  `tutorial_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_2109`
--

INSERT INTO `t_44_2109` (`id`, `roll`, `tutorial_1`, `tutorial_2`) VALUES
(1, 1696, '5', '7'),
(2, 1703, '5', '7'),
(3, 1704, '5', '8'),
(4, 1708, '5', '9'),
(5, 2106, '5', '7');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3105`
--

CREATE TABLE `t_44_3105` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_3105`
--

INSERT INTO `t_44_3105` (`id`, `roll`, `tutorial_1`) VALUES
(1, 1696, '7'),
(2, 1703, '5'),
(3, 1704, '5'),
(4, 1708, '8'),
(5, 2106, '7');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3107`
--

CREATE TABLE `t_44_3107` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_3107`
--

INSERT INTO `t_44_3107` (`id`, `roll`, `tutorial_1`) VALUES
(1, 1696, '15'),
(2, 1703, '14'),
(3, 1704, '15'),
(4, 1708, '15.5'),
(5, 2106, '14');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3108`
--

CREATE TABLE `t_44_3108` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_3108`
--

INSERT INTO `t_44_3108` (`id`, `roll`, `tutorial_1`) VALUES
(1, 1696, '2'),
(2, 1703, '14'),
(3, 1704, '15'),
(4, 1708, '17'),
(5, 2106, '25');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3205`
--

CREATE TABLE `t_44_3205` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL,
  `tutorial_2` varchar(15) DEFAULT NULL,
  `tutorial_3` varchar(15) DEFAULT NULL,
  `tutorial_4` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_3205`
--

INSERT INTO `t_44_3205` (`id`, `roll`, `tutorial_1`, `tutorial_2`, `tutorial_3`, `tutorial_4`) VALUES
(1, 1696, '8', '7', '5', '6'),
(2, 1703, '6', '5', '5', '7'),
(3, 1704, '7', '6', '5', '8'),
(4, 1708, '8', '7', '5', '9'),
(5, 2106, '7', '8', '5', '7');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3206`
--

CREATE TABLE `t_44_3206` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL,
  `tutorial_1` varchar(15) DEFAULT NULL,
  `tutorial_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_44_3206`
--

INSERT INTO `t_44_3206` (`id`, `roll`, `tutorial_1`, `tutorial_2`) VALUES
(1, 1696, '6', '7'),
(2, 1703, '7', '8'),
(3, 1704, '5', '7'),
(4, 1708, '9', '10'),
(5, 2106, '5', '7');

-- --------------------------------------------------------

--
-- Table structure for table `t_44_3209`
--

CREATE TABLE `t_44_3209` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_46_1103`
--

CREATE TABLE `t_46_1103` (
  `id` int(11) NOT NULL,
  `roll` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `batch` int(2) NOT NULL,
  `role` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll` int(4) NOT NULL,
  `teacher_code` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `batch`, `role`, `email`, `roll`, `teacher_code`, `password`) VALUES
(1, 'Admin', 0, 'admin', 'admin.icms2@gmail.com', 0, '', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Iqbal Hossian', 45, 'student', 'iqbal@gmail.com', 1952, '', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'Jasmin Akter', 0, 'teacher', 'jasmin.akter@gmail.com', 0, 'JA', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'Obydullah Sarder', 44, 'student', 'shishir.srdr16@gmail.com', 1708, '', '827ccb0eea8a706c4c34a16891f84e7b'),
(15, 'Dr. Md Whaiduzzaman', 0, 'teacher', 'wahid.ripon@gmail.com', 0, 'WZ', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `44_1103`
--
ALTER TABLE `44_1103`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_2103`
--
ALTER TABLE `44_2103`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_2109`
--
ALTER TABLE `44_2109`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_3104`
--
ALTER TABLE `44_3104`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_3105`
--
ALTER TABLE `44_3105`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_3108`
--
ALTER TABLE `44_3108`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_3205`
--
ALTER TABLE `44_3205`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `44_3206`
--
ALTER TABLE `44_3206`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `45_2107`
--
ALTER TABLE `45_2107`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `46_1101`
--
ALTER TABLE `46_1101`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_1201`
--
ALTER TABLE `ass_44_1201`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_2109`
--
ALTER TABLE `ass_44_2109`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_3107`
--
ALTER TABLE `ass_44_3107`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_3108`
--
ALTER TABLE `ass_44_3108`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_3205`
--
ALTER TABLE `ass_44_3205`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_44_3206`
--
ALTER TABLE `ass_44_3206`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_by_teacher_batch`
--
ALTER TABLE `course_by_teacher_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `t_44_2109`
--
ALTER TABLE `t_44_2109`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3105`
--
ALTER TABLE `t_44_3105`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3107`
--
ALTER TABLE `t_44_3107`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3108`
--
ALTER TABLE `t_44_3108`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3205`
--
ALTER TABLE `t_44_3205`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3206`
--
ALTER TABLE `t_44_3206`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_44_3209`
--
ALTER TABLE `t_44_3209`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_46_1103`
--
ALTER TABLE `t_46_1103`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `44_1103`
--
ALTER TABLE `44_1103`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_2103`
--
ALTER TABLE `44_2103`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_2109`
--
ALTER TABLE `44_2109`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_3104`
--
ALTER TABLE `44_3104`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_3105`
--
ALTER TABLE `44_3105`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_3108`
--
ALTER TABLE `44_3108`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `44_3205`
--
ALTER TABLE `44_3205`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `44_3206`
--
ALTER TABLE `44_3206`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `45_2107`
--
ALTER TABLE `45_2107`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `46_1101`
--
ALTER TABLE `46_1101`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `ass_44_1201`
--
ALTER TABLE `ass_44_1201`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ass_44_2109`
--
ALTER TABLE `ass_44_2109`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ass_44_3107`
--
ALTER TABLE `ass_44_3107`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ass_44_3108`
--
ALTER TABLE `ass_44_3108`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ass_44_3205`
--
ALTER TABLE `ass_44_3205`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ass_44_3206`
--
ALTER TABLE `ass_44_3206`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_by_teacher_batch`
--
ALTER TABLE `course_by_teacher_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_44_2109`
--
ALTER TABLE `t_44_2109`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3105`
--
ALTER TABLE `t_44_3105`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3107`
--
ALTER TABLE `t_44_3107`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3108`
--
ALTER TABLE `t_44_3108`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3205`
--
ALTER TABLE `t_44_3205`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3206`
--
ALTER TABLE `t_44_3206`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_44_3209`
--
ALTER TABLE `t_44_3209`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_46_1103`
--
ALTER TABLE `t_46_1103`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
