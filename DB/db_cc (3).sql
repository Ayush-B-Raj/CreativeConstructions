-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 12:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'AYUSHBRAJ', 'ayushbraj@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(3, 'bus'),
(5, 'car');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` varchar(200) NOT NULL,
  `complaint_title` varchar(200) NOT NULL,
  `complaint_details` varchar(200) NOT NULL,
  `complaint_reply` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(3, 'kottayam'),
(6, 'Eranakulam'),
(8, 'Alappuzha'),
(9, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_engineer`
--

CREATE TABLE `tbl_engineer` (
  `engineer_id` int(11) NOT NULL,
  `engineer_name` varchar(60) NOT NULL,
  `engineer_contact` varchar(60) NOT NULL,
  `engineer_email` varchar(60) NOT NULL,
  `engineer_password` varchar(60) NOT NULL,
  `engineer_gender` varchar(60) NOT NULL,
  `engineer_address` varchar(60) NOT NULL,
  `place_id` varchar(60) NOT NULL,
  `engineer_photo` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_engineer`
--

INSERT INTO `tbl_engineer` (`engineer_id`, `engineer_name`, `engineer_contact`, `engineer_email`, `engineer_password`, `engineer_gender`, `engineer_address`, `place_id`, `engineer_photo`) VALUES
(2, 'anand', '1233333', 'aand@gmail.com', '999', 'MALE', 'sfdfdfdfdf', '8', 'uwp1975891fo.jpeg'),
(3, 'Ayush raj', '9087674567', 'abcd@gmail.com', 'qwerty', 'MALE', 'hf 202 arora st', '9', 'uwp1975891.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_caption` varchar(100) NOT NULL,
  `gallery_image` varchar(600) NOT NULL,
  `work_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_caption`, `gallery_image`, `work_id`) VALUES
(6, 'ssdd', 'uwp1975891.jpeg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payement_date` date NOT NULL,
  `payment_duedate` date NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `site_id` int(11) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `payment_left` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payement_date`, `payment_duedate`, `payment_amount`, `site_id`, `payment_status`, `payment_left`) VALUES
(7, '0000-00-00', '2023-09-04', '200000', 6, '', '1800000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(3, 'kothamangalam', 6),
(6, 'Aluva', 6),
(7, 'nedumkandam', 9),
(8, 'kuttanadu', 8),
(9, 'pambadi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_date` date NOT NULL,
  `review_details` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_count` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `site_id` int(11) NOT NULL,
  `site_details` varchar(500) NOT NULL,
  `site_landmark` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `site_image` varchar(600) NOT NULL,
  `site_plot` varchar(600) NOT NULL,
  `user_id` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL DEFAULT 0,
  `supervisor_id` int(11) NOT NULL DEFAULT 0,
  `site_status` varchar(500) NOT NULL DEFAULT '0',
  `request_date` date NOT NULL,
  `site_estimate` varchar(500) NOT NULL DEFAULT '0',
  `site_sketchup` varchar(500) NOT NULL,
  `site_model` varchar(500) NOT NULL,
  `site_reply` varchar(500) NOT NULL,
  `site_completedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`site_id`, `site_details`, `site_landmark`, `place_id`, `site_image`, `site_plot`, `user_id`, `engineer_id`, `supervisor_id`, `site_status`, `request_date`, `site_estimate`, `site_sketchup`, `site_model`, `site_reply`, `site_completedate`) VALUES
(6, 'ddddddddd', 'dddddddd', 3, 'uwp1975891.jpeg', '3434', 14, 2, 0, '5', '2023-09-20', '2000000', 'f3175b3ecba9dd763a2660da4c2d5a0ft.jpg', 'hhhh.jpg', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisor`
--

CREATE TABLE `tbl_supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_name` varchar(60) NOT NULL,
  `supervisor_contact` varchar(60) NOT NULL,
  `supervisor_email` varchar(60) NOT NULL,
  `supervisor_password` varchar(60) NOT NULL,
  `supervisor_gender` varchar(60) NOT NULL,
  `supervisor_address` varchar(60) NOT NULL,
  `place_id` varchar(60) NOT NULL,
  `supervisor_photo` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supervisor`
--

INSERT INTO `tbl_supervisor` (`supervisor_id`, `supervisor_name`, `supervisor_contact`, `supervisor_email`, `supervisor_password`, `supervisor_gender`, `supervisor_address`, `place_id`, `supervisor_photo`) VALUES
(3, 'james bond', '9087674567', 'bond@gmail.com', '007', 'MALE', 'unknown ok', '3', 'uwp1975891fo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_update`
--

CREATE TABLE `tbl_update` (
  `update_id` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `update_time` varchar(200) NOT NULL,
  `update_details` varchar(200) NOT NULL,
  `update_image` varchar(600) NOT NULL,
  `site_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_update`
--

INSERT INTO `tbl_update` (`update_id`, `update_date`, `update_time`, `update_details`, `update_image`, `site_id`) VALUES
(7, '0002-02-22', '2', '32424', '1305462f.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `place_id` varchar(40) NOT NULL,
  `user_photo` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_password`, `user_gender`, `user_address`, `place_id`, `user_photo`) VALUES
(14, 'Ayush raj k', '3345535', 'abcd@gmail.com', 'aaaa', 'MALE', 'hf 202 arora st', '3', 'uwp1975891ffff.jpeg'),
(15, 'anantha krishna v a', '9087674567', 'anathak999@gmail.com', 'anana', 'MALE', 'poliyaaa', '9', 'uwp1975891ffff.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work`
--

CREATE TABLE `tbl_work` (
  `work_id` int(11) NOT NULL,
  `work_date` date NOT NULL,
  `work_caption` varchar(60) NOT NULL,
  `work_details` varchar(60) NOT NULL,
  `work_image` varchar(600) NOT NULL,
  `work_unique_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_work`
--

INSERT INTO `tbl_work` (`work_id`, `work_date`, `work_caption`, `work_details`, `work_image`, `work_unique_id`) VALUES
(5, '2222-02-22', 'cjjfjg', 'dyddydyu', 'uwp1975891fo.jpeg', '4444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_engineer`
--
ALTER TABLE `tbl_engineer`
  ADD PRIMARY KEY (`engineer_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `tbl_update`
--
ALTER TABLE `tbl_update`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_engineer`
--
ALTER TABLE `tbl_engineer`
  MODIFY `engineer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_update`
--
ALTER TABLE `tbl_update`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_work`
--
ALTER TABLE `tbl_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
