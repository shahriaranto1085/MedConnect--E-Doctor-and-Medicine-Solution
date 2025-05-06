-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:01 AM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'anonYmous@1937');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `medicines` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`medicines`)),
  `total_price` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `confirmed` varchar(20) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `update_info` varchar(200) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `email`, `medicines`, `total_price`, `location`, `confirmed`, `created_at`, `updated_at`, `update_info`) VALUES
(1, 'shuddhanoor@gmail.com', '{\"1\":{\"name\":\"Napa\",\"price\":200,\"quantity\":1},\"2\":{\"id\":2,\"name\":\"Maxpro\",\"price\":80,\"quantity\":1}}', 280, 'Merul Badda Dhaka', 'no', '2025-05-05 22:41:34', '2025-05-05 22:41:34', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `doc_email` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `confirmed` varchar(50) NOT NULL DEFAULT 'no',
  `updated_at` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`doc_email`, `user_email`, `confirmed`, `updated_at`, `time`, `id`) VALUES
('salam@gmail.com', 'shuddhanoor@gmail.com', 'yes', '2025-04-29', 'Saturday 11.30 pm(30/04/2025)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `stock` varchar(10000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL,
  `weight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `type`, `manufacturer`, `image_path`, `stock`, `description`, `price`, `weight`) VALUES
(1, 'Napa', 'tablet', 'Beximco', 'images/napa.png', '100', 'Napa 500 mg has analgesic and antipyretic properties with weak anti-inflammatory activity. Napa 500 mg (Acetaminophen) is thought to act primarily in the CNS, increasing the pain threshold by inhibiting both isoforms of cyclooxygenase, COX-1, COX-2, and COX-3 enzymes involved in prostaglandin (PG) synthesis.', 200, '500mg'),
(2, 'Maxpro', 'capsule', 'Squire', 'images/maxpro.png', '500', 'Maxpro 20 mg Tablet is a proton pump inhibitor (PPI). PPIs work by reducing the amount of acid produced in the stomach. Maxpro 20 mg Tablet is used to treat gastroesophageal reflux disease (GERD), ulcers, and other conditions that involve too much stomach acid.', 80, '20mg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `sender_role` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `doctor_email`, `patient_email`, `sender_role`, `message`, `created_at`, `updated_at`) VALUES
(1, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'Hello?', '2025-04-28 22:34:18', '2025-04-28 22:34:18'),
(2, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'Are you there?', '2025-04-28 22:34:31', '2025-04-28 22:34:31'),
(3, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'hello?', '2025-04-28 22:35:45', '2025-04-28 22:35:45'),
(4, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'patient', 'Yes???', '2025-04-28 23:41:11', '2025-04-28 23:41:11'),
(5, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'patient', 'asdakjaksjdklajsdkaldsjlasjldjlaskdjlkasjdlkasjd', '2025-04-28 23:43:02', '2025-04-28 23:43:02'),
(6, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'Hello?', '2025-04-29 05:23:27', '2025-04-29 05:23:27'),
(7, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'hello!!!!!!!!!!!!!', '2025-04-29 05:28:02', '2025-04-29 05:28:02'),
(8, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'doctor', 'Hello?', '2025-04-29 05:46:50', '2025-04-29 05:46:50'),
(9, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'patient', 'hello again!!!', '2025-04-29 05:47:53', '2025-04-29 05:47:53'),
(10, 'salam@gmail.com', 'shuddhanoor@gmail.com', 'patient', 'Oi kire oi kireeeeeeeeeeeeeeee', '2025-05-04 19:39:24', '2025-05-04 19:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `doc_email` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `diseases` varchar(500) NOT NULL,
  `doses` varchar(500) NOT NULL,
  `updated_at` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`doc_email`, `user_email`, `diseases`, `doses`, `updated_at`, `id`) VALUES
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Jor Matha Betha', 'Napa extra\n1+1+1', '2025-04-28', 3),
('salam@gmail.com', 'abdul@gmail.com', 'jor', 'Napa Extra\r\n1+0+1', '2025-04-28', 4),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Matha betha', 'Napa\r\n1+0+1\r\nGurgle', '2025-04-28', 5),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Thanda', 'Napa\n1+0+0\n', '2025-04-29', 6),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Mtha Betha', 'Napa \r\n1+1+1', '2025-04-29', 7),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Abaro Matha Betha', 'Napa !\r\n\r\n1+1+1', '2025-04-29', 8),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Abaroo jor Matha Bethda', 'Napa\r\n1+1+1', '2025-04-29', 9),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'xyz', 'napa\r\n1+1+1', '2025-04-29', 10),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'Thanda', '1+0+0', '2025-04-29', 11),
('salam@gmail.com', 'shuddhanoor@gmail.com', 'thanda', 'napa \r\n1+0+0', '2025-04-29', 12);

-- --------------------------------------------------------

--
-- Table structure for table `reg_doc`
--

CREATE TABLE `reg_doc` (
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `institution` varchar(50) NOT NULL,
  `bmdc` varchar(20) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `verified` varchar(5) NOT NULL DEFAULT 'no',
  `worplc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_doc`
--

INSERT INTO `reg_doc` (`name`, `age`, `sex`, `phone`, `email`, `nid`, `address`, `institution`, `bmdc`, `specialization`, `degree`, `password`, `verified`, `worplc`) VALUES
('Prof. Dr. Md Abdus Salam', 50, 'Male', '01521545400', 'salam@gmail.com', '234234234234546', 'Dhanmondi', 'Dhaka Medical College, Dhaka', '22201722', 'Hip, Knee & Shoulder Specialist', 'M.S, M.B.B.S', '$2y$12$aw.K7OfrXy0MpMqA5JSdJ.sVqhYO.vlWWJ0mb2sTkwght2JLUaZDe', 'yes', 'National Institute Of Traumatology and Orthopaedic Rehabilitation - NITOR'),
('ggggggg', 33, 'Male', '333333333', 'zodiac@gmail.com', '6565648393823', 'Dhanmondi', 'Dhaka Medical College, Dhaka', '222017224', 'Hip, Knee & Shoulder Specialist', 'M.S, M.B.B.S', '$2y$12$Pm7/pRmtSVkYnDjK1khql.52Ylsj39lUR24xEYXIL8NxAuNmCaoSa', 'yes', 'National Institute Of Traumatology and Orthopaedic Rehabilitation - NITOR'),
('djhfjdfhjdhgdfj', 25, 'Male', '32737847324', 'samiullah@gmail.com', '234324234', 'dwrwerwe', 'sdfsdfsd', '234234324', 'werwerwer', 'fsdfsdfsd', '$2y$12$jjZHG65iiqXchtFMIGa36OGDFsBlj7VMM9AVYjRAViyD1StZELH8u', 'yes', 'werwerwe'),
('anto', 44, 'Male', '3249023840923', 'anto@gmail.com', '234234324', 'Merul Badda', 'asdasdasd', '2343243244', 'asdasdasd', 'asdasdsad', '$2y$12$X0C3B0lxZKNEmV2/RfKCGuj7W/Cg8RPFuqVk0FBletQnx0VkwuWqO', 'yes', 'adsasdasd'),
('Masuka Arafin', 27, 'Female', '01718809796', 'masuka@gmail.com', '23982397', 'Gudaraghat, Dhaka', 'Monsur Ali', '32432434', 'gyniii', 'MBBS', '$2y$12$UPxZ8qpXlutgam.e44YSmuBgy2Kf1FoIIgyjEqP0u9PnIk8U3MHxy', 'yes', 'Sirajganj'),
('sumaiya', 25, 'Female', '4655', 'sumaiya@gmail.com', '2398239766', 'Gudaraghat, Dhaka', 'Monsur Ali', '3243243444', 'medicine', 'MBBS', '$2y$12$3oIiTDLEu4rLxtjxIlToF.hU1ShGM6ZpgPKlV1cpSJsDxbkKWjo82', 'yes', 'none'),
('Hello World2', 22, 'Male', '2222222222', 'hello@gmail.com', '22221121222', 'Gulshan', 'Monsur Ali', '4423239999', 'medicine', 'MBBS', '$2y$12$lu6fHJ32aHypvinfgCr3vu7uQCJLRM8DUrha2DIWqaamK2Dp.PtZq', 'yes', 'Sirajganj'),
('Anto Neel', 60, 'Male', '01317672246', 'anto@gmail.com', '343493049', 'Badda', 'Brac', '9999999', 'Naaaaiiii', 'Failed', '$2y$12$fLMWPe62kcpYtl5LUWvaie5alnFtt3ukSGlyLNqT6Y3t/OBfF/S4G', 'yes', 'Bekar');

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE `reg_user` (
  `name` varchar(50) NOT NULL,
  `age` varchar(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `ID` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `marital status` varchar(10) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`name`, `age`, `sex`, `phone`, `email`, `ID`, `address`, `marital status`, `nid`, `height`, `weight`, `password`) VALUES
('Jamil Shahriar Anto', '25', 'Male', '01568200434', 'shahriaranto1085@gmail.com', 1, 'Merul Badda', 'Single', '4668820808', 170, 72, '$2y$12$GoJxvT6Ocndd.tl4rh1DCeD0NuT0ZPnQInVKEaC70w8y8AkJrVn0S'),
('Jamil Shahriar Anto', '25', 'Male', '01568200434', 'shahriaranto143@gmail.com', 2, 'Savar, Dhaka', 'Single', '4668820808', 184, 105, '$2y$12$M0tVC2zfD7AW9S3.VBUqoeiTqYfWBWXvlCfiuQ/ZveINZdoYG7mLC'),
('Shuddha Noor', '44', 'Other', '01968200434', 'shuddhanoor@gmail.com', 3, 'Badda', 'Single', '99999222992', 184, 105, '$2y$12$T46G55/DPhxVRYmW3Qs/O.6Rfv2Pf0UCQcVSy9csE/rKRBFYYisBK'),
('Sami1234', '22', 'Male', '01657652245', 'sami@gmail.com', 4, 'Gulshan', 'Single', '2323454522', 168, 52, '$2y$12$gllAxX9SdwKQbgJAJMoKRuZys/6MzKh1IoHIFQSXdD.wDXrdtTWt2'),
('Abdul', '25', 'Male', '139201293193', 'abdul@gmail.com', 5, 'Merul Badda', 'Divorced', '03298093248932', 170, 80, '$2y$12$FFzVlfXQdELD.ESmSaloqOlTxO2XKBvx8BjtnOtoJy4d28ZYJqDF6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_doc`
--
ALTER TABLE `reg_doc`
  ADD PRIMARY KEY (`bmdc`);

--
-- Indexes for table `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
