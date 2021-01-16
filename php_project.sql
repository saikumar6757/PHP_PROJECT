-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 02:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comments`) VALUES
(1, 1, 3, 'cool'),
(2, 3, 3, 'hello'),
(3, 7, 3, 'nice'),
(4, 2, 3, 'beautiful'),
(5, 2, 3, 'nice...'),
(6, 1, 3, 'nice!!'),
(7, 3, 9, 'Good Morning'),
(8, 1, 9, 'superb car');

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_post` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `user_id`, `user_post`, `image_name`) VALUES
(1, 1, 'superb car', 'car.jpg'),
(2, 1, 'house', 'house.jpg'),
(3, 1, 'hello!!!....Good Morning', ''),
(4, 1, '', 'Alone.jpg'),
(5, 3, 'Alone', 'Alone.jpg'),
(6, 9, 'superb car', 'car.jpg'),
(7, 1, '', 'house.jpg'),
(8, 1, 'house', 'house.jpg'),
(9, 3, 'hello', ''),
(10, 3, 'hello', 'Alone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'sai', '$2y$10$ezL9/PeykzB.quNyvJPuYewJPEgCT7Nzr3rR327/nORsbrj/vIE0S'),
(2, 'venkatsaireddy', '$2y$10$DpgRDxyohERyYy4Q8VEHGelJOd3BVHANtPgKCaq2ooyaDU5ZlwIe.'),
(3, 'sai_reddy', '$2y$10$1H0VxQTOtoWzlkMdfUAB6.lWtfbBZyaonDIpmtbtflWPmKZnB99Ka'),
(4, 'kumarsai', '$2y$10$pmGcPTqjfbnPYc.xyfzMkOy57DeIZGcr6cawVNYBocs8b3nvV4jXm'),
(5, 'saikumarreddy', '$2y$10$d72QO6LArZP3yaByHk/MtueoiiI5Pat1cx/n5XDHaFkwG/TtpBnke'),
(6, 'saireddy6', '$2y$10$/YXy2I70KS3G3Ae73DH2Pum1Gx0w3RsWPZD4XMDJC1ZNG0bvg05S6'),
(7, 'saireddy69', '$2y$10$JanM/WH5aa0ajwu9.5gXHOFlafKAiFGOahSe/mT4MnV49OlE7sG9m'),
(8, 'reddy', '$2y$10$oT0uqITepdJZXQlN6qT8FuH.NQaPkag96cwbISKarxmZQaX7H2Mna'),
(9, 'sandeep', '$2y$10$Mvq/enFOaPUnPF.NSgNKseAJUQ32uPZVDnsubGOsvH0U2DTUV7Oym');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_fk` (`post_id`),
  ADD KEY `c_f_k` (`user_id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `c_f_k` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `c_fk` FOREIGN KEY (`post_id`) REFERENCES `form_data` (`id`);

--
-- Constraints for table `form_data`
--
ALTER TABLE `form_data`
  ADD CONSTRAINT `c_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
