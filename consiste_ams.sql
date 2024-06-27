-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2024 at 08:50 AM
-- Server version: 10.5.24-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consiste_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `family_id` int(11) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `family_id`, `facility_id`, `booking_date`) VALUES
(1, 1, 1, '2024-06-01'),
(2, 2, 2, '2024-06-02'),
(3, 3, 3, '2024-06-03'),
(4, 4, 4, '2024-06-04'),
(5, 5, 5, '2024-06-05'),
(6, 6, 6, '2024-06-06'),
(7, 7, 7, '2024-06-07'),
(8, 8, 8, '2024-06-08'),
(9, 9, 9, '2024-06-09'),
(10, 10, 10, '2024-06-10'),
(11, NULL, 3, '2024-06-04'),
(12, 5, 3, '2024-05-26'),
(13, 1, 12, '2024-06-16'),
(14, 13, 13, '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`) VALUES
(1, 'تالار ورزشی', 'سالن ورزشی با امکانات مدرن و کامل'),
(2, 'استخر', 'استخر با ابعاد المپیک'),
(3, 'زمین تنیس', 'زمین تنیس حرفه‌ای'),
(4, 'سونا', 'سونای آرامش‌بخش با اتاق‌های مختلف'),
(5, 'سالن کنفرانس', 'سالن کنفرانس فضایی بزرگ با امکانات صوتی و تصویری'),
(6, 'پارکینگ', 'پارکینگ زیرزمینی امن'),
(7, 'شهر کودک', 'مجموعه بازی کودکان با پیچ و خم‌ها و لیوان‌ها'),
(8, 'باغ', 'باغ گیاهان'),
(9, 'کتابخانه', 'کتابخانه با مجموعه گسترده‌ای از کتب'),
(10, 'سینما', 'اتاق سینمای خصوصی با ظرفیت 20 نفر'),
(11, 'کافه', 'قهوه و انواع نوشیدنی'),
(12, 'رستوران', '\'رستوران با منوی گسترده و خدمات پذیرایی '),
(13, 'اتاق بازی', 'اتاق بازی برای همسایگان');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` int(11) NOT NULL,
  `family_name` varchar(100) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `apartment_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `family_name`, `head_name`, `contact_number`, `apartment_number`) VALUES
(1, 'محمد', 'علی‌پور\n', '09123456789', 'A101'),
(2, 'سارا ', 'حسینی ', '09129876543', 'A102'),
(3, 'مهرداد ', 'رضایی ', '09127654321', 'A103'),
(4, 'نگین ', 'احمدی ', '09124567890', 'A104'),
(5, 'علی ', 'اسدی ', '09128765432', 'A105'),
(6, 'سمانه ', 'صادقی ', '09125678901', 'A106'),
(7, 'حسین ', 'زارعی ', '09123456789', 'A107'),
(8, 'نیما ', 'کریمی ', '09127890654', 'A108'),
(9, 'فاطمه ', 'نجفی ', '09128765432', 'A109'),
(10, 'امیرحسین ', 'جعفری ', '09126543210', 'A110'),
(11, 'سحر ', 'کریمی ', '09128765432', 'A121'),
(12, 'محمدرضا ', 'احمدی ', '09127654321', 'A122'),
(13, 'زهرا ', 'رضایی ', '09121234567', 'A123');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_requests`
--

CREATE TABLE `maintenance_requests` (
  `id` int(11) NOT NULL,
  `family_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `maintenance_requests`
--

INSERT INTO `maintenance_requests` (`id`, `family_id`, `description`, `status`, `request_date`) VALUES
(1, 1, 'Leaky faucet in the kitchen.', 'Completed', '2024-06-01'),
(2, 2, 'Air conditioning not working.', 'Completed', '2024-06-02'),
(3, 3, 'Broken window in the living room.', 'In Progress', '2024-06-03'),
(4, 4, 'Clogged drain in the bathroom.', 'Completed', '2024-06-04'),
(5, 5, 'No hot water in the shower.', 'Pending', '2024-06-05'),
(6, 6, 'Electrical outlet not working.', 'In Progress', '2024-06-06'),
(7, 7, 'Fridge making loud noise.', 'Pending', '2024-06-07'),
(8, 8, 'Door lock is jammed.', 'Completed', '2024-06-08'),
(9, 9, 'Paint peeling off the walls.', 'Pending', '2024-06-09'),
(10, 10, 'Broken tiles in the bathroom.', 'In Progress', '2024-06-10'),
(11, 2, 'GYM PLA', 'Pending', '2024-06-03'),
(12, 12, 'I want bedromm', 'Completed', '2024-06-16'),
(13, 13, 'شوفاژ خبرایه ', 'In Progress', '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'manager1', 'manager123'),
(3, 'manager2', 'manager123'),
(4, 'manager3', 'manager123'),
(5, 'manager4', 'manager123'),
(6, 'manager5', 'manager123'),
(7, 'manager6', 'manager123'),
(8, 'manager7', 'manager123'),
(9, 'manager8', 'manager123'),
(10, 'manager9', 'manager123');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `post_date`) VALUES
(1, 'Annual Maintenance', 'The annual maintenance will be conducted next month.', '2024-05-01'),
(2, 'Swimming Pool Closure', 'The swimming pool will be closed for cleaning on June 15th.', '2024-06-01'),
(3, 'Gym Equipment Upgrade', 'New gym equipment will be installed next week.', '2024-06-05'),
(4, 'Parking Lot Renovation', 'The parking lot will undergo renovation from June 10th to June 20th.', '2024-06-02'),
(5, 'New Library Books', 'New books have been added to the library.', '2024-06-03'),
(6, 'Fire Drill', 'A fire drill will be conducted on June 25th.', '2024-06-04'),
(7, 'Garden Maintenance', 'The garden will be closed for maintenance on June 12th.', '2024-06-06'),
(8, 'Tennis Tournament', 'A tennis tournament will be held on June 30th.', '2024-06-08'),
(9, 'Cinema Room Booking', 'The cinema room can now be booked online.', '2024-06-09'),
(10, 'Playground Upgrade', 'The playground will be upgraded with new equipment.', '2024-06-10'),
(11, 'استخر آب گرم', 'باید داشته باشیم . ', '2024-06-16'),
(12, 'توانایی های ذهنی', 'توضیحات توانایی ذهنی', '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `family_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `family_id`, `amount`, `payment_date`) VALUES
(1, 1, 150.00, '2024-05-01'),
(2, 2, 200.00, '2024-05-02'),
(3, 3, 250.00, '2024-05-03'),
(4, 4, 300.00, '2024-05-04'),
(5, 5, 350.00, '2024-05-05'),
(6, 6, 400.00, '2024-05-06'),
(7, 7, 450.00, '2024-05-07'),
(8, 8, 500.00, '2024-05-08'),
(9, 9, 550.00, '2024-05-09'),
(10, 10, 600.00, '2024-05-10'),
(11, 1, 2000000.00, '2024-06-04'),
(12, 12, 50.00, '2024-06-16'),
(13, 13, 200000.00, '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `visit_date` date NOT NULL,
  `family_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `contact_number`, `visit_date`, `family_id`) VALUES
(1, 'Alice', '9876543210', '2024-06-01', 1),
(2, 'Bob', '9876543211', '2024-06-02', 2),
(3, 'Charlie', '9876543212', '2024-06-03', 3),
(4, 'David', '9876543213', '2024-06-04', 4),
(5, 'Eve', '9876543214', '2024-06-05', 5),
(6, 'Frank', '9876543215', '2024-06-06', 6),
(7, 'Grace', '9876543216', '2024-06-07', 7),
(8, 'Hank', '9876543217', '2024-06-08', 8),
(9, 'Ivy', '9876543218', '2024-06-09', 9),
(10, 'Jack', '9876543219', '2024-06-10', 10),
(11, 'hamid', '09910096008', '2024-06-03', 4),
(12, 'reza', '111', '2024-06-16', 3),
(13, 'حمید کمیزی', '09910096008', '2024-06-16', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_id` (`family_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`);

--
-- Constraints for table `maintenance_requests`
--
ALTER TABLE `maintenance_requests`
  ADD CONSTRAINT `maintenance_requests_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`);

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
