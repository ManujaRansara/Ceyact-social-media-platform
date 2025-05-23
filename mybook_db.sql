-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 11:33 AM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint NOT NULL,
  `type` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contentid` bigint DEFAULT NULL,
  `likes` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `following` text CHARACTER SET latin1 COLLATE latin1_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `contentid`, `likes`, `following`) VALUES
(60, 'user', 79672283660356, '[{\"userid\":\"804603706918\",\"date\":\"2024-05-17 17:10:50\"},{\"userid\":\"79672283660356\",\"date\":\"2024-05-17 17:15:09\"}]', '{\"2\":{\"userid\":\"79672283660356\",\"date\":\"2024-05-09 16:04:29\"},\"3\":{\"userid\":\"804603706918\",\"date\":\"2024-05-12 07:00:05\"}}'),
(61, 'post', 6002901, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 08:54:28\"}]', ''),
(62, 'post', 28785744282992, '[]', ''),
(63, 'user', 804603706918, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 08:46:23\"},{\"userid\":\"4689420\",\"date\":\"2025-05-23 10:48:42\"}]', '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-17 17:10:50\"}]'),
(64, 'post', 1514, '[]', ''),
(65, 'post', 98422359349, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-12 06:48:07\"}]', ''),
(66, 'post', 9427947381, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 08:46:18\"}]', ''),
(67, 'post', 865851022, '[]', ''),
(68, 'post', 1919351204295, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 08:54:17\"}]', ''),
(69, 'post', 65849845358495923, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 08:54:06\"}]', ''),
(70, 'post', 23526, '[]', ''),
(71, 'post', 292413527, '[{\"userid\":\"804603706918\",\"date\":\"2024-05-17 17:11:51\"}]', ''),
(72, 'post', 54231500451120615, '[]', ''),
(73, 'post', 22765769812, '[]', ''),
(74, 'post', 397932, '[{\"userid\":\"79672283660356\",\"date\":\"2024-05-18 09:12:57\"}]', ''),
(75, 'user', 4689420, '[{\"userid\":\"4689420\",\"date\":\"2025-05-23 11:24:24\"}]', '[{\"userid\":\"804603706918\",\"date\":\"2025-05-23 10:48:42\"},{\"userid\":\"4689420\",\"date\":\"2025-05-23 11:24:24\"},{\"userid\":\"18904996092\",\"date\":\"2025-05-23 11:30:36\"}]'),
(76, 'user', 18904996092, '[{\"userid\":\"4689420\",\"date\":\"2025-05-23 11:30:36\"}]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint NOT NULL,
  `postid` bigint NOT NULL,
  `userid` bigint NOT NULL,
  `post` text NOT NULL,
  `image` varchar(400) NOT NULL,
  `comments` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `likes` bigint DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `has_image` tinyint(1) DEFAULT NULL,
  `is_profile_image` tinyint(1) DEFAULT NULL,
  `is_cover_image` tinyint(1) DEFAULT NULL,
  `parent` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `date`, `has_image`, `is_profile_image`, `is_cover_image`, `parent`) VALUES
(113, 9427947381, 804603706918, 'm', 'uploads//7F2QpLsfhzn6pxj4uYNk.jpg', '3', 1, '2024-05-18 06:47:12', 1, 1, 0, 0),
(139, 6002901, 79672283660356, 'My name is manuja', '', '0', 1, '2024-05-17 05:40:08', 0, 0, 0, 0),
(143, 279791, 79672283660356, 'congrat for ceyact', '', '', 0, '2024-05-02 04:22:20', 0, 0, 0, 28785744282992),
(147, 865851022, 79672283660356, 'manuaj halo\r\n', '', '', 0, '2024-05-09 15:44:09', 0, 0, 0, 0),
(154, 1919351204295, 79672283660356, 'boss is always boss\r\n', '', '2', 1, '2024-05-18 06:51:49', 0, 0, 0, 0),
(155, 65849845358495923, 79672283660356, 'boss is always boss\r\n', '', '0', 1, '2024-05-18 06:51:48', 0, 0, 0, 0),
(162, 23526, 79672283660356, 'halo\r\n', '', '', 0, '2024-05-17 15:07:24', 0, 0, 0, 9427947381),
(164, 9223372036854775807, 79672283660356, 'itin\r\n', '', '', 0, '2024-05-17 14:49:11', 0, 0, 0, 9427947381),
(166, 292413527, 79672283660356, 'manuja ransara', '', '', 1, '2024-05-18 06:45:12', 0, 0, 0, 1919351204295),
(167, 54231500451120615, 804603706918, 'manuja', '', '', 0, '2024-05-17 15:22:40', 0, 0, 0, 1919351204295),
(169, 8409117755686143214, 804603706918, 'mn oyata kamanthi', '', '', 0, '2024-05-17 15:10:25', 0, 0, 0, 9427947381),
(171, 298182321018, 79672283660356, 'Manuja is going to conquer the world', '', '', 0, '2024-05-18 07:08:19', 0, 0, 0, 0),
(172, 5531841, 79672283660356, 'Manuja is going to conquer the world', '', '', 0, '2024-05-18 07:08:19', 0, 0, 0, 0),
(184, 20664438, 4689420, '', 'uploads/4689420/7jVqB2mfIzG67pcvJfUi.jpg', NULL, NULL, '2025-05-23 09:32:49', 1, 1, 0, 0),
(185, 611307106139138037, 4689420, '', 'uploads/4689420/i3RiKJDh5vbLFS7g0y0Y.jpg', NULL, NULL, '2025-05-23 09:33:03', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `userid` bigint NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_image` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cover_image` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `about` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `first_name`, `last_name`, `gender`, `Email`, `password`, `url_address`, `date`, `profile_image`, `cover_image`, `likes`, `about`) VALUES
(66, 79672283660356, 'Manuja', 'Ransara', 'Male', 'hapuarachchiransara@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'manuja.ransara.23672', '2024-05-17 15:15:09', 'uploads/79672283660356/5Yl5qzy0VKkIBXQukk4A.jpg', 'uploads/79672283660356/ltyaIZq3i5zJyGfCyXxw.jpg', 2, ''),
(67, 804603706918, 'Naleeka', 'Kumarasinghe', 'Male', 'naleekapakaya@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'naleeka.kumarasinghe.53212', '2025-05-23 08:48:42', 'uploads/804603706918/IaKgBHdEJi2CZFpokTZn.jpg', '', 2, ''),
(68, 4689420, 'Manuja', 'Ransara', 'Male', 'ransaramanuja02@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'manuja.ransara.49651', '2025-05-23 09:33:03', 'uploads/4689420/i3RiKJDh5vbLFS7g0y0Y.jpg', NULL, NULL, NULL),
(69, 18904996092, 'Manuja', 'Ransara', 'Male', 'ransaramanuja02@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'manuja.ransara.605', '2025-05-23 09:30:08', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `following` (`following`(3072));

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `comments` (`comments`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`),
  ADD KEY `parent` (`parent`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `gender` (`gender`),
  ADD KEY `Email` (`Email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`),
  ADD KEY `likes` (`likes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
