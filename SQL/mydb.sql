-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 09:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alljobs`
--

CREATE TABLE `alljobs` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `takerid` varchar(50) DEFAULT NULL,
  `posterid` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alljobs`
--

INSERT INTO `alljobs` (`id`, `title`, `description`, `photo`, `price`, `takerid`, `posterid`, `reg_date`) VALUES
(1, '011162031_CSE429.pdf', 'dfsdf', 'dfsDf', 10000, '2', '1', '2020-11-05 14:25:50'),
(2, '011162031_CSE429.pdf', 'asdfg', 'dfsd', 1010, '2', '2', '2021-01-04 06:40:20'),
(3, '011162031_CSE481.pdf', 'old', 'werwerf', 2000, NULL, '1', '2021-01-04 07:01:47'),
(4, '011162031_CSE321.pdf', 'dfsdgfdfg', 'dasgsdfg', 214235, '7', '6', '2021-01-03 12:21:54'),
(5, 'new', 'grtgherth', 'gwrthg', 23344, NULL, '6', '2021-01-03 20:39:36'),
(6, 'need people', 'anyone', 'one', 10000, NULL, '6', '2021-01-04 06:25:54'),
(7, 'sik', 'https://drive.google.com/drive/u/0/folders/1F91xL4ysTLStWKbEPJCQ8j_bf4m-NQVT', 'https://drive.google.com/drive/u/0/folders/1F91xL4', 3000, NULL, '6', '2021-01-04 07:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `phone` char(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `submit_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `profile_pic`, `username`, `useremail`, `phone`, `password`, `submit_date`, `role`) VALUES
(1, '', 'Kaushik Debdas', 'kaushikdebdas27@gmail.com', '01685474608', '011162043', '2020-06-24 17:25:02', 1),
(4, '', 'Rafsan', 'rafsan@gmail.com', '01624119178', '12345', '2020-06-24 17:25:02', 0),
(8, '', 'Saimun', 'saimun@gmail.com', '45', '123', '2020-06-25 14:22:34', 0),
(9, 'IMG_9299.jpg', '12', '123@gmail.com', '1', '12', '2020-06-25 14:24:09', 0),
(14, '', 'ssssss', 'ssss@gmail.com', '16546451', '666666', '2021-01-03 12:39:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `usertype` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'saimun', 'saimunrahman29@gmail.com', '32ee85c926c338c93abc288f81789f3f', 0),
(2, 'saimun1234', 'saimunkhanbd@yahoo.com', '3c34535c9c5bc690c503d4c93df37b01', 1),
(3, 'rafsan', 'ashekehabib05@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'saimun', 'saimunkhanbd@yahmmocom', 'cf07b50376783816571b39b52fadc2ef', 0),
(5, 'saimun', 'saimunrahman29@gmail.com', 'ef800207a3648c7c1ef3e9fe544f17f0', 0),
(6, 'saimun', 'saimun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'admin', 'admin', '8ddcff3a80f4189ca1c9d4d902c3c909', 1),
(8, 'tanzeen', 'xyz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alljobs`
--
ALTER TABLE `alljobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uq1` (`useremail`),
  ADD UNIQUE KEY `uq2` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alljobs`
--
ALTER TABLE `alljobs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
