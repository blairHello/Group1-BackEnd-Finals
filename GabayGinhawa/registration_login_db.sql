-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 08:14 AM
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
-- Database: `registration_login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_activity_tracker`
--

CREATE TABLE `tb_activity_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type_of_activity` varchar(255) DEFAULT NULL,
  `intensity_level` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `calories_burned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `firstname`, `surname`, `email`, `password`, `birthdate`) VALUES
(1, 'Lyanna Ysabel', 'Cristobal', 'guardian@gginhawa.ph', 'guardian2iti', '2004-03-22'),
(2, 'Angelo Blair', 'Pollojan', 'guardian2@gginhawa.ph', 'guardian2iti', '2004-02-15'),
(3, 'Lex Albert', 'Durante', 'guardian3@gginhawa.ph', 'guardian2iti', '2002-04-06'),
(4, 'Deseree Anne', 'Morales', 'guardian4@gginhawa.ph', 'guardian2iti', '2003-04-18'),
(5, 'Roginald', 'Francisco', 'guardian5@gginhawa.ph', 'guardian2iti', '2004-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_calorie_tracker`
--

CREATE TABLE `tb_calorie_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_of_meal` time NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `meal_type` enum('breakfast','lunch','dinner','snack') NOT NULL,
  `calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mood_tracker`
--

CREATE TABLE `tb_mood_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `mood` int(11) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sleep_tracker`
--

CREATE TABLE `tb_sleep_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_of_sleep` time DEFAULT NULL,
  `wake_up_time` time DEFAULT NULL,
  `quality_of_sleep` int(11) DEFAULT NULL,
  `hours_of_sleep` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`firstname`, `surname`, `birthdate`, `email`, `password`, `id`) VALUES
('Jose', 'Rizal', '2004-02-01', 'j.riz@gmail.com', 'josephine1', 1),
('Lyanna', 'Cristobal', '2024-01-01', 'lyannacristobal@gmail.com', '$2y$10$X72d35X0jXF5zHxt43ZYYudrx1jdOZYkaTXEKycei7Lg6HePNruEW', 15),
('Ryo', 'Beagle', '2024-03-01', 'ryobeagle@gmail.com', '$2y$10$ryoA5qG.kSWd25Tu6d26QuDl5gcJADDzxjqw.dWLfG33yI8wTC/KG', 16),
('Hello', 'Hello', '2011-01-01', 'hello@gmail.com', '$2y$10$GGWygcFnsrF7nNWqwGGYEeZnprtuGoc4Hfyp45qTMr7ViajPpF0bS', 17),
('Lyanna Ysabel', 'Cristobal', '2003-12-31', 'lyannaysabelcristobal2@gmail.com', '$2y$10$Qn/c89M2MedzHPtvJeZHWe.9V6Uqra4J1/ZGoqd2mPMK8.b1nvhdC', 18),
('hello', 'hi', '2000-12-31', 'jfaksdfh@gmail.com', '$2y$10$O3gTSOvqky3SZ1xKSoeaG.criteVj/i.U2YjNeby208M6gZc.2lAC', 19),
('hahahah', 'hahdhashdas', '1999-12-31', 'hjasdfhjadks@gmail.com', '$2y$10$t8A.kxuV8wBbQMjfWk1ILu096C3rikb5szpuZfaSXJV3PE4lup5w.', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_water_tracker`
--

CREATE TABLE `tb_water_tracker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_of_water_intake` time NOT NULL,
  `glasses_of_water` int(11) NOT NULL,
  `quantity_of_water_ml` int(11) NOT NULL,
  `total_water_intake_l` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_activity_tracker`
--
ALTER TABLE `tb_activity_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_calorie_tracker`
--
ALTER TABLE `tb_calorie_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_mood_tracker`
--
ALTER TABLE `tb_mood_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_sleep_tracker`
--
ALTER TABLE `tb_sleep_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_water_tracker`
--
ALTER TABLE `tb_water_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_activity_tracker`
--
ALTER TABLE `tb_activity_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_calorie_tracker`
--
ALTER TABLE `tb_calorie_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mood_tracker`
--
ALTER TABLE `tb_mood_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sleep_tracker`
--
ALTER TABLE `tb_sleep_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_water_tracker`
--
ALTER TABLE `tb_water_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_activity_tracker`
--
ALTER TABLE `tb_activity_tracker`
  ADD CONSTRAINT `tb_activity_tracker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_calorie_tracker`
--
ALTER TABLE `tb_calorie_tracker`
  ADD CONSTRAINT `tb_calorie_tracker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_mood_tracker`
--
ALTER TABLE `tb_mood_tracker`
  ADD CONSTRAINT `tb_mood_tracker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_sleep_tracker`
--
ALTER TABLE `tb_sleep_tracker`
  ADD CONSTRAINT `tb_sleep_tracker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_water_tracker`
--
ALTER TABLE `tb_water_tracker`
  ADD CONSTRAINT `tb_water_tracker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
