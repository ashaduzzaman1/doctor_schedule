-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2017 at 01:04 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_schedule_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement_table`
--

CREATE TABLE `achievement_table` (
  `id` int(11) NOT NULL,
  `achievement_name` varchar(255) NOT NULL,
  `org_level` varchar(1) NOT NULL,
  `doctor_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievement_table`
--

INSERT INTO `achievement_table` (`id`, `achievement_name`, `org_level`, `doctor_id`) VALUES
(1, 'some Achievement', '4', 11),
(2, 'Hoiubion', '3', 11),
(3, 'OOp, shash', '2', 9),
(4, 'Blank dhash', '4', 6);

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_pass` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `a_email`, `a_pass`, `role`) VALUES
(1, 'admin@dsm.com', '2a8d28f32e1692264abadec24ec5b4b3', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `booking_serial` int(11) NOT NULL,
  `booking_shift` varchar(15) NOT NULL,
  `booking_time` varchar(20) NOT NULL,
  `booking_date` varchar(30) NOT NULL,
  `booking_day` varchar(20) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`id`, `user_id`, `doctor_id`, `booking_serial`, `booking_shift`, `booking_time`, `booking_date`, `booking_day`, `status`) VALUES
(44, 11, 11, 1, 'Morning', '8:00 am-9:00 am', '2016-12-17', 'Monday', 'Ok'),
(45, 11, 11, 2, 'Evening', '4:00 pm-5:00 pm', '2016-12-17', 'Monday', 'Ok'),
(46, 11, 11, 1, 'Morning', '8:00 am-9:00 am', '2016-12-12', 'Monday', 'Ok'),
(47, 11, 9, 1, 'Morning', '9:00 am-10:00 am', '2016-12-18', 'Sunday', 'Ok'),
(48, 11, 9, 1, 'Evening', '2:00 pm-3:00 pm', '2016-12-14', 'Wednesday', 'Ok'),
(49, 1, 8, 1, 'Morning', '9:00 am-10:00 am', '2016-12-19', 'Monday', 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `degree_table`
--

CREATE TABLE `degree_table` (
  `id` int(11) NOT NULL,
  `degree_value` int(4) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `institute_rate` int(7) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree_table`
--

INSERT INTO `degree_table` (`id`, `degree_value`, `degree_name`, `institute`, `institute_rate`, `doctor_id`) VALUES
(9, 4, 'MBBS', 'DMC', 1955, 11),
(10, 3, 'de1', 'fsdf', 3086, 11),
(11, 5, 'Higher Doctorate', 'MIT', 2150, 6),
(12, 4, '', '55', 1250, 7);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(11) NOT NULL,
  `unique_id` int(7) NOT NULL,
  `dr_name` varchar(111) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `qualification` text NOT NULL,
  `institute` varchar(150) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `location` text NOT NULL,
  `about` text NOT NULL,
  `password` varchar(111) NOT NULL,
  `status` varchar(11) NOT NULL,
  `rating_point` int(5) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `unique_id`, `dr_name`, `phone`, `email`, `gender`, `qualification`, `institute`, `specialist_id`, `location`, `about`, `password`, `status`, `rating_point`, `picture`, `deleted_at`) VALUES
(6, 406184, 'Dr Anisur Rahman', '1256255', 'anis@gmail.com', 'Male', 'P.hD Holder', 'CMC, CHittagong', 1, 'CMC, CHittagong', 'good Careness of patient. alwayz active', '202cb962ac59075b964b07152d234b70', 'Yes', 78, 'mockup3.png', NULL),
(7, 743298, 'Dr mohammad Roshid', '25586', 'md_ali@gmail.com', 'Male', 'ssccres', 'CMC', 2, 'jklj', 'kjlk', '202cb962ac59075b964b07152d234b70', 'Yes', 0, '11822795_950078011722185_1089942377169858174_n.jpg', '1480617038'),
(8, 843980, 'dr ali akbaar', '1256255', 'gmail@gmail.com', 'Male', 'MBBS, FCPS', 'DMC, Dhaka', 1, 'Chawkbazar, CHittagong', 'good Careness of patient. alwayz active', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'creative-box2.jpg', NULL),
(9, 266191, 'dr azhar mahmud', '154655464', 'mark@mark.com', 'Male', 'MBBS, FCPS, FRDS', 'CMC, CHittagong', 2, 'Parcival Hill, College Road, Chawkbazar, Chittagong', 'good Careness of patient. alwayz active and awareness', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'creative-box6.jpg', NULL),
(10, 686618, ' dr Mitali sen', '12458', 'mitalishen@gmail.com', 'Female', 'MBBS, P.hD Holder', 'DMC, Dhaka, thilend', 1, 'Parcival Hill, College Road, Chawkbazar, Chittagong', 'good Careness of patient. alwayz active and awareness', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'doc-time3.jpg', NULL),
(11, 110888, 'Dr Hasirur Rahman', '0185247965', 'jobayerfx09@gmail.com', 'Male', 'MBBS, FCPS, FRDS', 'CMC, CHittagong', 2, 'Parcival Hill, College Road, Chawkbazar, Chittagong', 'good Careness of patient. alwayz active and awareness', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'gallery9.jpg', NULL),
(12, 976524, 'Doctor Muhammad Iqbal', '01840163354', 'silentiq16@gmail.com', 'Male', 'MBBS, FCPS, FRDS', 'Ctg medical college', 1, 'choittagong', 'I am a cardiology specialist', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'creative-box2.jpg', NULL),
(13, 301291, 'Doctor Muhammad Iqbal', '+8801733756139', 'md_ali@gmail.com', 'Female', 'MBBS, FCPS, FRDS', 'CMC, CHittagong', 2, 'Chawkbazar, CHittagong', 'jobayerfx09@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'author2.jpg', NULL),
(14, 585776, 'Doctor Muhammad Anis', '+8801733756139', 'gmail@gmail.com', 'Male', 'MBBS, FCPS, FRDS', 'CMC, CHittagong', 1, 'Chawkbazar, CHittagong', 'rakib', 'a36949228c1d9146cace6359d88968e8', 'Yes', 0, 'author.jpg', NULL),
(15, 642346, 'Doctor Muhammad Haque', '+8801733756139', 'admin@admin.com', 'Female', 'MBBS, FCPS, FRDS', 'CMC, CHittagong', 2, 'Chawkbazar, CHittagong', 'jobayerfx09@gmail.com', '202cb962ac59075b964b07152d234b70', 'Yes', 0, 'avatar.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(11) NOT NULL,
  `morning_vanue` varchar(255) NOT NULL,
  `morning_time_from` int(4) NOT NULL,
  `morning_time_to` int(4) NOT NULL,
  `evening_vanue` varchar(255) NOT NULL,
  `evening_time_from` int(4) NOT NULL,
  `evening_time_to` int(4) NOT NULL,
  `sdl_day` varchar(255) NOT NULL,
  `doctor_uid` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `morning_vanue`, `morning_time_from`, `morning_time_to`, `evening_vanue`, `evening_time_from`, `evening_time_to`, `sdl_day`, `doctor_uid`) VALUES
(6, 'jk', 7, 9, 'jk', 12, 16, 'Saturday,Sunday,Monday,Wednesday,Thursday', 406184),
(7, 'lklkklks sdf', 9, 13, 'dsfdgfhgjh', 16, 23, 'Sunday,Tuesday,Wednesday', 743298),
(8, 'morning', 7, 9, 'EBJKJD', 12, 16, 'Saturday,Sunday,Monday,Thursday', 843980),
(9, 'morning', 8, 12, 'dsfdgf', 12, 16, 'Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday', 266191),
(10, 'ctg,cmc', 7, 9, 'halishar', 12, 16, 'Saturday,Monday,Tuesday,Wednesday,Thursday', 686618),
(11, 'Chittagong', 8, 11, 'Dhaka', 16, 20, 'Saturday,Sunday,Wednesday,Thursday', 110888),
(12, 'mehedibag', 7, 9, 'gffdg', 12, 16, 'Tuesday,Wednesday,Thursday,Friday', 976524),
(13, 'morning', 7, 11, 'dsfdgf', 13, 17, 'Saturday,Sunday,Monday', 301291),
(14, 'ahaktk ksd', 7, 11, 'bmnuk hkjj', 13, 19, 'Monday,Tuesday,Wednesday,Thursday', 585776),
(15, 'ahaktk ksd', 9, 10, 'dsfdgf', 13, 20, 'Saturday,Monday,Tuesday', 642346);

-- --------------------------------------------------------

--
-- Table structure for table `engaged_table`
--

CREATE TABLE `engaged_table` (
  `id` int(11) NOT NULL,
  `org_name` varchar(150) NOT NULL,
  `org_level` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engaged_table`
--

INSERT INTO `engaged_table` (`id`, `org_name`, `org_level`, `doctor_id`) VALUES
(1, 'International Oraganization dsf', 4, 11),
(2, '', 2, 8),
(3, '', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(8) NOT NULL,
  `patient_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `patient_phone` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `password` varchar(111) NOT NULL,
  `email_verified` varchar(100) NOT NULL,
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_name`, `email`, `patient_phone`, `gender`, `patient_address`, `password`, `email_verified`, `deleted_at`) VALUES
(1, 'Kawser Alam', 'jobayerfx09@gmail.com', '01245897632', 'Male', 'Address not available here.. ', '827ccb0eea8a706c4c34a16891f84e7b', 'Yes', NULL),
(2, 'Manik Hasan', 'gmail@gmail.com', '01245897632', 'Male', 'Chittagong', '202cb962ac59075b964b07152d234b70', 'Yes', NULL),
(4, 'Jobayer Hossain', 'sn_jobayer@yahoo.com', '0125789654', 'Male', 'kfsjdfkskj,sdfksj', '827ccb0eea8a706c4c34a16891f84e7b', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `research_table`
--

CREATE TABLE `research_table` (
  `id` int(11) NOT NULL,
  `paper_name` varchar(255) NOT NULL,
  `doi_no` varchar(255) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `paper_rating` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_table`
--

INSERT INTO `research_table` (`id`, `paper_name`, `doi_no`, `journal`, `paper_rating`, `doctor_id`) VALUES
(1, 'Paper Name mn', '1248sdfs25862448', '2145214sdf2458sdf14785', 980, 11),
(2, 'Paper Name', '75dk2ff5125d215d25d', 'doctor journal', 1455, 6),
(3, 'fgd', 'gdfd', 'gfd', 125, 6),
(4, 'fjsdkf', 'sdkfjalk', 'sdjfks', 800, 12);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `one` int(11) NOT NULL,
  `two` int(11) NOT NULL,
  `three` int(11) NOT NULL,
  `four` int(11) NOT NULL,
  `five` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `one`, `two`, `three`, `four`, `five`, `doctor_id`) VALUES
(17, 1, 8, 12, 2, 15, 6),
(18, 14, 25, 15, 12, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `specialist_table`
--

CREATE TABLE `specialist_table` (
  `id` int(11) NOT NULL,
  `specialist` varchar(125) NOT NULL,
  `symptoms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialist_table`
--

INSERT INTO `specialist_table` (`id`, `specialist`, `symptoms`) VALUES
(1, 'Neurologist', 'Muscle weakness'),
(2, 'Heart Specialist', 'Back Pain'),
(3, 'Child Specialist', 'Child, baby, New born');

-- --------------------------------------------------------

--
-- Table structure for table `web_content_table`
--

CREATE TABLE `web_content_table` (
  `id` int(11) NOT NULL,
  `bmdc_id` varchar(50) NOT NULL,
  `bmdc_value` int(11) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `facebook_value` int(11) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `website_value` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_content_table`
--

INSERT INTO `web_content_table` (`id`, `bmdc_id`, `bmdc_value`, `facebook_url`, `facebook_value`, `website_url`, `website_value`, `doctor_id`) VALUES
(5, 'A5734589', 1, 'www.facebook.com/drrr3', 15200, 'www.drfirst.com/dr', 1455, 11),
(7, '', 1, '', 9060, '', 2014, 6),
(8, '', 1, '', 2410, '', 2567, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement_table`
--
ALTER TABLE `achievement_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `degree_table`
--
ALTER TABLE `degree_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_uid` (`doctor_uid`);

--
-- Indexes for table `engaged_table`
--
ALTER TABLE `engaged_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_table`
--
ALTER TABLE `research_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist_table`
--
ALTER TABLE `specialist_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_content_table`
--
ALTER TABLE `web_content_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement_table`
--
ALTER TABLE `achievement_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `degree_table`
--
ALTER TABLE `degree_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `engaged_table`
--
ALTER TABLE `engaged_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `research_table`
--
ALTER TABLE `research_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `specialist_table`
--
ALTER TABLE `specialist_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `web_content_table`
--
ALTER TABLE `web_content_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD CONSTRAINT `doctor_schedule_ibfk_1` FOREIGN KEY (`doctor_uid`) REFERENCES `doctor_info` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
