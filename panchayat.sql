-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 06:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panchayat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2020-05-29 14:59:10'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2020-05-29 14:59:40'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-view architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2020-05-29 15:01:48'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party libraries provide common functions.', '2020-05-29 15:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'Refer Geeks For Geeks ', 1, 0, '2020-09-28 15:15:41'),
(2, 'Refer StackOverflow', 1, 0, '2020-09-28 15:21:48'),
(3, 'Refer StackOverflow', 1, 0, '2020-09-28 15:26:07'),
(4, 'Refer Google\r\n', 1, 0, '2020-09-28 15:26:17'),
(5, 'Refer Programming with mosh', 1, 0, '2020-09-28 15:29:44'),
(6, 'Refer yt ', 1, 0, '2020-10-03 16:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio', 'I am not able to install pyaudio on windows', 1, 0, '2020-05-31 16:58:39'),
(2, 'Unable To use PIP', 'Pip is not recognized as an internal or external command', 1, 0, '2020-09-28 14:05:52'),
(3, 'Unable to install NumPy', 'Numpy is not getting Installed', 1, 0, '2020-09-28 14:53:57'),
(4, 'Unable To install npm', 'Npm is not getting Installed', 2, 0, '2020-09-28 14:57:52'),
(5, 'unable to install pandas', 'Pip is not working', 1, 0, '2020-10-03 16:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `timestamp`) VALUES
(2, 'test@gmail.com', '1234', '2020-09-28 17:26:21'),
(3, 'user1@gmail.com', '$2y$10$3rquOr8AATUYG8FBolr5EeZg04C46XwwFPQbL9BO1LBQIdj1QFcpG', '2020-09-28 17:45:45'),
(4, 'user2@gmail.com', '$2y$10$lMsNNxAzja5p3s6TWQjMveuwxiJ6q3S6Yzr2jCuk5bxhPOCNOzMyG', '2020-09-28 17:47:42'),
(5, 'user3@gmail.com', '$2y$10$VfzZfvPH4.U7argAYuUW1exTPPeaTj9sxu3M9gK6aNKaGLN2IxgZO', '2020-09-28 17:49:53'),
(6, 'u@gg', '$2y$10$TpL8S30HYRb0fu3f3C0k.enulVNCcoXkZyZKtXJhfVbaqNgyNM9Du', '2020-09-28 19:20:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
