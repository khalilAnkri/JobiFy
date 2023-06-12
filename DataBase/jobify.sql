-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:06 PM
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
-- Database: `jobify`
--

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `file_path` varchar(255) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `offer_description` text NOT NULL,
  `skill1` varchar(100) DEFAULT NULL,
  `skill2` varchar(100) DEFAULT NULL,
  `skill3` varchar(100) DEFAULT NULL,
  `locat` varchar(255) DEFAULT NULL,
  `offer_email` varchar(100) DEFAULT NULL,
  `offer_contact` varchar(20) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_title`, `created_at`, `file_path`, `duration`, `offer_description`, `skill1`, `skill2`, `skill3`, `locat`, `offer_email`, `offer_contact`, `salary`) VALUES
(1, 'Software Dev', '2023-06-10 21:00:14', 'url/image1', '12', 'this is the 1st offer', 'option1', 'option1', 'option1', 'nador', 'Ahmed@gmail.com', '0344005511', '12000'),
(2, 'Electrical Engineering', '2023-06-10 21:23:38', 'url/image2', '16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'option2', 'option1', 'option1', 'rabat', 'khalilankri@gmail.com', '0344005522', '15000'),
(3, 'Indus', '2023-06-10 21:40:56', 'url/image3', '20', 'Industriel Job', 'option1', 'option1', 'option2', 'casa', 'abdo@gmaiil.com', '00000000', '200000'),
(4, 'Tekchbila', '2023-06-11 19:31:21', 'url/image4', '30', 'This is test Tekch', 'option1', 'option1', 'option2', 'tewlwila', 'tewtew@gmail.com', '0999999999', '30000'),
(5, 'test', '2023-06-11 19:52:10', 'test', '12', 'test', 'option1', 'option1', 'option1', 'test', 'test@gmail.com', '00000001', '292929'),
(6, 'Create Figma Designs For Web Application', '2023-06-12 16:03:09', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Circle-icons-computer.svg/1200px-Circle-icons-computer.svg.png', '30', 'Looking for an experienced UI/UX for an ongoing project.  You will work with an actual SCRUM team, the SCRUM team has real life Consultants. Waiting for you!', 'communication', 'time-management', 'project-management', 'Oujda', 'Ahmed@gmail.com', '0988772261', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `cooperation` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `cooperation`) VALUES
(26, 'ahmed', 'ahmed@gmail.com', '$2y$10$GUjCtKyHyWgxrLJLyLz4aujnmo4Act5PoJ.cnlibVoMvtZEjTdvrq', 'ensao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
