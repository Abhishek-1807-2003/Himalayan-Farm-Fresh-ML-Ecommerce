-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 12:57 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(12, 'ranbir', '', '7876698172', 'ranbir@gmail.com', '$2y$10$G5Au.//HJjUBgNiExb1.9eWm10tiqAdVxrwlLCA8LwGAGLayjAHuy', 'farmer', '2025-09-02 22:51:13', '2025-09-02 22:51:13'),
(13, 'krishna', '', '9876544562', 'krishna12@gmail.com', '$2y$10$rnmCH67Ch0V/t5rOOjO9humYJAZcFT8JRHo9EDJC4bFRdGdc2mFLC', 'farmer', '2025-09-03 10:03:46', '2025-09-03 10:03:46'),
(17, 'Vasu', 'Sharma', '7655765247', 'vasu@gmail.com', '$2y$10$FDvqdWtbDAO79mFC3pPHnOHC4oXCkPAS3Dz1LvX3BntJXkPuqZa4G', 'farmer', '2025-09-04 11:11:33', '2025-09-04 11:11:33'),
(18, 'krishna', '', '7875563145', 'krish@gmail.com', '$2y$10$6hu1IC/DneyJZ7mgg.EeouPoqaN9i5Fh3Q0qZyqYEsbojmWmVjdEC', 'farmer', '2025-09-05 12:21:23', '2025-09-05 12:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `farmer_id`, `name`, `description`, `price`, `unit`, `image`) VALUES
(35, 17, 'Banana', 'tasty refreshing banana', 30.00, '7p', 'uploads/1756988563_banana.jpg'),
(38, 18, 'colocasia leaf', 'tasty colocasia leaf', 20.00, '1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2cQvO9MIEJw-F7u60ZJ29Huj0SjIXdDXLqfwC1hQmPv_l1wY0Mjkz732ZPDHd_dwA1aU&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(31, 'Ishita', 'taneja', '7875576456', 'ishita@gmail.com', '$2y$10$o7a8fgRr9jJTTJO1ZbMRcOaU/.2munDlby35uB8h/6zudwnLX8ROK', '2025-09-03 08:16:01', '2025-09-03 08:16:01'),
(32, 'cherry', '', '9816988901', 'cherry@gmail.com', '$2y$10$FufZRVGUl5tU//ELXzH/u.vm8lc4Ra6z4QhLs8GtlIEIN8gYjKOjy', '2025-09-03 10:04:34', '2025-09-03 10:04:34'),
(36, 'priyanka', '', '7875565253', 'priyanka@gmail.com', '$2y$10$Y/vXktwJF9hYP5ukI1lC1.BfFnTAI4Hc1idpJn0/VVRzErG18E8xq', '2025-09-03 11:19:10', '2025-09-03 11:19:10'),
(38, 'harshita', '', '7876645432', 'harshita@gmail.com', '$2y$10$gwxUzairUs1Jg9OPBnh/f.Sd/kj9ixFT4BxwuP2cA2UOpMY29YUZO', '2025-09-03 11:25:08', '2025-09-03 11:25:08'),
(48, 'Bhavika', 'Sharma', '7876694148', 'sbhavika2002@gmail.com', '$2y$10$FoAETc47ptf2xM7JUyU38O3u/a9bzkMFeayjWRbmY76gdXnWz.1/e', '2025-09-05 11:51:17', '2025-09-05 11:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_farmers_email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
