-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 05:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micinsteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `thumbnail` text NOT NULL,
  `length` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `uploaded` varchar(11) NOT NULL,
  `code` varchar(8) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `link`, `thumbnail`, `length`, `views`, `uploaded`, `code`, `is_deleted`, `folder_id`, `user_id`) VALUES
(45, 'test code folder test reload', 'https://sblanh.com/bg26k19i5g8t.html', 'https://akamai-images-content.com/bg26k19i5g8t_xt.jpg', 10, 14, '2022-09-25 ', 'FNPdb5Il', 0, 6, 2),
(46, 'hd0992 preview', 'https://sblanh.com/tbuxmqwx4v7o.html', 'https://akamai-images-content.com/tbuxmqwx4v7o_xt.jpg', 10, 4, '2022-09-25 ', 'jFfhEDnZ', 0, 1, 1),
(47, 'folder public', 'https://sblanh.com/uvwmlvclkmqm.html', 'https://akamai-images-content.com/uvwmlvclkmqm_xt.jpg', 10, 0, '2022-09-25 ', 'MNh81TYw', 0, 1, 1),
(48, 'folder butan', 'https://sblanh.com/2pybg4cuufsk.html', 'https://akamai-images-content.com/2pybg4cuufsk_xt.jpg', 10, 1, '2022-09-25 ', '9CYQMn8b', 0, 7, 2),
(49, 'folder test reload', 'https://sblanh.com/dlpzevit59g1.html', 'https://akamai-images-content.com/dlpzevit59g1_xt.jpg', 10, 1, '2022-09-25 ', '8exIZHEb', 0, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `folder_name` varchar(30) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `code` varchar(13) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `folder_name`, `slug`, `code`, `user_id`, `is_deleted`) VALUES
(1, 'Public', 'public', 'public', 1, 0),
(2, 'Python', 'python', 'python', 1, 0),
(3, 'Folder Coolgate', 'Folder-Coolgate', 'coolgate', 2, 0),
(4, 'teea', 'iyaiyu', 'iyaiyu', 2, 0),
(5, 'test', '13', '31', 2, 0),
(6, 'test_reload', '42', '33', 2, 0),
(7, 'Upload ke folder buatan', 'masa', '18', 2, 0),
(8, 'folder resek ', '', 'xnhHCqdg', 4, 0),
(9, 'test slug', 'test-slug', 'XNi3O8al', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(24) NOT NULL,
  `per_page` varchar(2) NOT NULL,
  `api_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `per_page`, `api_key`) VALUES
(1, 'Micin Stream', '50', '53091cd0x1mhjc2l3uqvx');

-- --------------------------------------------------------

--
-- Table structure for table `url_uploads`
--

CREATE TABLE `url_uploads` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `url_uploads`
--

INSERT INTO `url_uploads` (`id`, `url`, `code`) VALUES
(1, 'http://163.23.101.174/mp4/106summer.mp4', 'q9xghl7mgq60'),
(2, 'http://163.23.101.174/mp4/106summer.mp4', 'w9yeqcp9tfr9'),
(3, 'http://163.23.101.174/mp4/106summer.mp4', 'pkzw10s74ba9'),
(4, 'http://163.23.101.174/mp4/106summer.mp4', 'nfo73j4obxf1'),
(5, 'http://163.23.101.174/mp4/106summer.mp4', 'm7xipw320vwz'),
(6, 'http://163.23.101.174/mp4/106winter.mp4', 'r0850quberzj'),
(7, 'http://163.23.101.174/mp4/106summer.mp4', 'h3tt4ucwnvf1'),
(8, 'http://163.23.101.174/mp4/106summer.mp4', 'k6p8i8mx8ygd'),
(9, 'http://163.23.101.174/mp4/106summer.mp4', 'wwl0dscx303o'),
(10, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2011.mp4', 'vo5zggn20ftu'),
(11, 'https://64history.net/files/videos/Bad%20Influence%20Series%204%20Episode%2014.mp4', '5woj9z36pe0v'),
(12, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2015.mp4', 'zlans3x8syj6'),
(13, 'https://64history.net/files/videos/Bad%20Influence%20Series%204%20Episode%2013.mp4', 'acsffp1urofo'),
(14, 'https://64history.net/files/videos/Bad%20Influence%20-%20Series%204%20Episode%2011.mp4', 'nbdhmbzx6e2y'),
(15, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2015.mp4', '0l8x3rr4rxmf'),
(16, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2015.mp4', 'vnbma0ymv37c'),
(17, 'https://64history.net/files/videos/Bad%20Influence%20Series%204%20Episode%2013.mp4', 'vzpnpqhi9920'),
(18, 'https://64history.net/files/videos/Bad%20Influence%20-%20Series%204%20Episode%2011.mp4', '7ont0p3dy0n9'),
(19, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2011.mp4', '4r8l7qu7mgd5'),
(20, 'https://64history.net/files/videos/Gamesmaster%20-%20Series%205%20Episode%2011.mp4', 'dkmfworg57be'),
(21, 'https://64history.net/files/videos/Bad%20Influence%20-%20Series%204%20Episode%2011.mp4', '8cs0a6gg5ixk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `badged` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `is_actived`, `is_deleted`, `role_id`, `badged`) VALUES
(1, 'Guests', 'coolgate424@gmail.com', 'Guest', '$2y$10$F9oAna9b5psAAgZCvruOB.CcL46UWu9tUO5tsJzFB5PpoyjIgNlMu', 1, 0, 1, 1),
(2, 'luna424', 'maskulin424@yahoo.com', 'Luna Escape', '$2y$10$F9oAna9b5psAAgZCvruOB.CcL46UWu9tUO5tsJzFB5PpoyjIgNlMu', 1, 0, 1, 1),
(3, 'kami', 'skulin424@yahoo.com', 'Sabrina Aulia', '$2y$10$GCJvt0yhqOaLofELqwrLQ.utXm2kVwm1IMu1iIXZU5A...NiR.RZq', 1, 0, 2, 2),
(4, 'respect424', 'respect424@gmail.com', 'Ahmad Hasan Al-Banjari', '$2y$10$RLLhqag8j69CDdeo0i54JOYkG/mOaQ7uH37Vlnvy.0NsU97UKhhuK', 1, 0, 2, 2),
(5, 'alvin424', 'user@localhost.id', 'Alvin', '$2y$10$2cJaj.L28Z3T0hOIyG.DrOCWCOZhaIl5vAkIyWB1Uej6HYurZvJbm', 1, 0, 2, 2),
(6, 'sabrina424', 'sabrina424@gmail.com', 'Sabrina Aulia', '$2y$10$HuVQ.Nx141Q6DBkc/5utaOlY4qA3h8EfcEANf.qIj1TFluveSpJIe', 1, 0, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_uploads`
--
ALTER TABLE `url_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `badged` (`badged`),
  ADD KEY `badged_2` (`badged`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `url_uploads`
--
ALTER TABLE `url_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
