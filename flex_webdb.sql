-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 07:00 PM
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
-- Database: `flex_webdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `permissions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `permissions`) VALUES
(8, 'aaa', '$2y$10$o05k7QRhXdjL2vgpNA/.oOV./3lzNuddtOTP5ti0I0e0Yh57UnQwy', NULL),
(9, 'jan', '$2y$10$TJ3pZfO0LPJ6ChKp0lc4y.oJeI.X.U6XcBeTxzteWLBechyQsaw7y', NULL),
(10, 'piet', '$2y$10$rch9s37LIe3XOZcEKWY1LeI5IqHck4mztqGGstk4NSVvk7fZpviZi', NULL),
(11, 'kees', '$2y$10$bJdpDYEGxg5dHRjxGlxVfuY89lfeyEYpGy21By9RPhkXIx.A/CVES', NULL),
(13, 'kees', '$2y$10$jHOz4f2uq2KZb/f4dFDVc.A4Txy2tyJCV9aaAHRgA6sP6m6t/6exi', NULL),
(15, 'Admin', '$2y$10$CiTWavSffpdXiL191SUc2uZDWe0sUa.G9lh0A6TSpQG9e0BKxgiBK', 0),
(16, 'luci', '$2y$10$1zF5UtfRz.IZR.9datH3Vejl424PfOcaFcLGMpiIwsww/DtUTkFgC', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
