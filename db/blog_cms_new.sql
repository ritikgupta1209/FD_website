-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 07:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_cms_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header-settings`
--

CREATE TABLE `header-settings` (
  `id` int(200) NOT NULL,
  `nav-name` varchar(255) NOT NULL,
  `nav-link` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header-settings`
--

INSERT INTO `header-settings` (`id`, `nav-name`, `nav-link`, `from_ip`, `from_browser`, `time`) VALUES
(10, 'Home', 'index', '', '', ''),
(11, 'About', 'about', '', '', ''),
(12, 'Contact', 'contact', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(200) NOT NULL,
  `logo_image` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_image`, `from_ip`, `from_browser`, `time`) VALUES
(1, 'assets/images/logo/logo.svg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'Wed, 16 Jun 2021 13:04:26 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `icon_name` varchar(255) NOT NULL,
  `icon_font` varchar(255) NOT NULL,
  `icon_color` varchar(20) NOT NULL,
  `icon_link` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon_name`, `icon_font`, `icon_color`, `icon_link`, `visibility`) VALUES
(2, 'twitter', 'fab fa-twitter', '#1DA1F2', 'twitter.com', 'true'),
(7, 'instagram', 'fab fa-instagram', '#E1306C;', 'insta.com', 'true'),
(9, 'telegram', 'fab fa-telegram-plane', '#0088CC', 'telegram.com', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `post_id` int(20) NOT NULL,
  `post_uid` varchar(255) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `unlisted` varchar(10) NOT NULL,
  `pin_story` varchar(20) NOT NULL,
  `post_status` varchar(30) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`post_id`, `post_uid`, `user_uid`, `post_title`, `post_content`, `featured_image`, `post_tags`, `unlisted`, `pin_story`, `post_status`, `post_slug`, `meta_title`, `meta_description`, `from_ip`, `from_browser`, `created_at`, `updated_at`) VALUES
(1, '16d2019a-6124-4eb3-8b31-5565afac5397', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', '1640541498.png', '', 'false', 'false', 'draft', 'ffff-8310cbac69', 'ffff | Shubham Gupta', 'ffff is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:27:38 +0530', 'Sun, 26 Dec 2021 23:28:18 +0530'),
(2, 'ae280a04-d65c-4b4c-9149-4c53302fa7c6', '1723205b-c751-487b-bc14-1b3183edb3d4', 'ffff', '<p><br></p>', 'null', '', 'false', 'false', 'draft', 'ffff-7818a770ea', 'ffff | Shubham Gupta', 'ffff is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:30:07 +0530', 'Sun, 26 Dec 2021 23:30:17 +0530'),
(3, '1dfa9441-bf55-4d86-bee8-04c9a2028d8c', '1723205b-c751-487b-bc14-1b3183edb3d4', 'gggg', '<p><br></p>', '1640541831.png', '', 'false', 'false', 'draft', 'gggg-aa0e613558', 'gggg | Shubham Gupta', 'gggg is published by Shubham Gupta.', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobile Safari/537.36', 'Sun, 26 Dec 2021 23:31:30 +0530', 'Sun, 26 Dec 2021 23:33:51 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'tag1', '', ''),
(2, 'tag2', '', ''),
(3, 'tag 3', '', ''),
(4, 'tag 4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL,
  `user_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `email_status` varchar(50) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `from_ip` varchar(255) NOT NULL,
  `from_browser` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_uid`, `name`, `username`, `email`, `password`, `profile`, `bio`, `code`, `email_status`, `account_status`, `from_ip`, `from_browser`, `created_at`) VALUES
(3, '1723205b-c751-487b-bc14-1b3183edb3d4', 'Shubham Gupta', 'shubham8028', 'shubham8028@gmail.com', '$2y$10$vrvOWEPP9j5uxc0E/IL5.erpvx90V9b2.viLfr4tqvTKEoupOh732', '', 'I am a web developer turned travel blogger that is forced to code to eat.', 0, 'verified', 'active', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header-settings`
--
ALTER TABLE `header-settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header-settings`
--
ALTER TABLE `header-settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
