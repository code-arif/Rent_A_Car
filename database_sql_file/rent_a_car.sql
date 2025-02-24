-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 24, 2025 at 08:49 AM
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
-- Database: `rent_a_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `car_type` enum('SUV','Sedan','Hatchback','Truck') NOT NULL,
  `daily_rent_price` decimal(10,2) NOT NULL,
  `weekly_rent_price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `availability` enum('Available','Not Available') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `weekly_rent_price`, `status`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mercedes-Benz', 'Mercedes', 'm-15-d-L', '2022', 'Sedan', 10000.00, NULL, 1, 'Available', 'cars/67bc20c94bb6a.jpg', '2025-02-24 01:33:30', '2025-02-24 01:33:30'),
(2, 'Toyota Corolla', 'Toyota', 'Corolla', '2022', 'Sedan', 50.00, 300.00, 1, 'Available', 'cars/67bc2444e3332.jpg', '2025-02-24 07:43:07', '2025-02-24 01:48:20'),
(3, 'Honda Civic', 'Honda', 'Civic', '2021', 'Sedan', 55.00, 320.00, 1, 'Available', 'cars/67bc243a68c5f.jpg', '2025-02-24 07:43:07', '2025-02-24 01:48:10'),
(4, 'Ford Mustang', 'Ford', 'Mustang', '2023', 'Sedan', 100.00, 600.00, 1, 'Available', 'cars/67bc242f7db63.jpg', '2025-02-24 07:43:07', '2025-02-24 01:47:59'),
(5, 'Tesla Model 3', 'Tesla', 'Model 3', '2022', 'Sedan', 80.00, 500.00, 1, 'Available', 'cars/67bc241071572.jpg', '2025-02-24 07:43:07', '2025-02-24 01:47:28'),
(6, 'BMW X5', 'BMW', 'X5', '2021', 'SUV', 120.00, 700.00, 1, 'Available', 'cars/67bc240354cdf.jpg', '2025-02-24 07:43:07', '2025-02-24 01:47:15'),
(7, 'Audi Q7', 'Audi', 'Q7', '2022', 'SUV', 110.00, 650.00, 1, 'Available', 'cars/67bc23a74cc17.jpg', '2025-02-24 07:43:07', '2025-02-24 01:45:43'),
(8, 'Mercedes-Benz GLC', 'Mercedes-Benz', 'GLC', '2023', 'SUV', 130.00, 750.00, 1, 'Available', 'cars/67bc239e32165.jpg', '2025-02-24 07:43:07', '2025-02-24 01:45:34'),
(9, 'Hyundai Tucson', 'Hyundai', 'Tucson', '2021', 'SUV', 60.00, 350.00, 1, 'Available', 'cars/67bc2393d40a2.jpg', '2025-02-24 07:43:07', '2025-02-24 01:45:23'),
(10, 'Chevrolet Tahoe', 'Chevrolet', 'Tahoe', '2022', 'SUV', 140.00, 800.00, 1, 'Available', 'cars/67bc238ad8027.jpg', '2025-02-24 07:43:07', '2025-02-24 01:45:14'),
(11, 'Nissan Altima', 'Nissan', 'Altima', '2021', 'Sedan', 45.00, 270.00, 1, 'Available', 'cars/67bc23813a800.jpg', '2025-02-24 07:43:07', '2025-02-24 01:45:05'),
(12, 'Kia Sportage', 'Kia', 'Sportage', '2022', 'SUV', 65.00, 380.00, 1, 'Available', 'cars/67bc237767ec0.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:55'),
(13, 'Ford F-150', 'Ford', 'F-150', '2023', 'Truck', 90.00, 550.00, 1, 'Available', 'cars/67bc236cc8ec2.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:44'),
(14, 'Ram 1500', 'Ram', '1500', '2022', 'Truck', 95.00, 580.00, 1, 'Available', 'cars/67bc2365467a8.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:37'),
(15, 'Chevrolet Silverado', 'Chevrolet', 'Silverado', '2021', 'Truck', 92.00, 570.00, 1, 'Available', 'cars/67bc235d266fd.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:29'),
(16, 'Mazda CX-5', 'Mazda', 'CX-5', '2023', 'SUV', 75.00, 450.00, 1, 'Available', 'cars/67bc2355d2080.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:21'),
(17, 'Subaru Outback', 'Subaru', 'Outback', '2022', 'SUV', 68.00, 400.00, 1, 'Available', 'cars/67bc234de1ee8.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:13'),
(18, 'Volkswagen Jetta', 'Volkswagen', 'Jetta', '2021', 'Sedan', 48.00, 290.00, 1, 'Available', 'cars/67bc2345b09b1.jpg', '2025-02-24 07:43:07', '2025-02-24 01:44:05'),
(19, 'Lexus RX', 'Lexus', 'RX', '2023', 'SUV', 125.00, 720.00, 1, 'Available', 'cars/67bc233a2bcf1.jpg', '2025-02-24 07:43:07', '2025-02-24 01:43:54'),
(20, 'Jeep Wrangler', 'Jeep', 'Wrangler', '2022', 'SUV', 85.00, 500.00, 1, 'Available', 'cars/67bc23330e455.jpg', '2025-02-24 07:43:07', '2025-02-24 01:43:47'),
(21, 'Porsche Cayenne', 'Porsche', 'Cayenne', '2023', 'SUV', 150.00, 900.00, 1, 'Available', 'cars/67bc232b13685.jpg', '2025-02-24 07:43:07', '2025-02-24 01:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `seats` int(11) NOT NULL,
  `fuel_type` enum('Petrol','Diesel','CNG','Electric') NOT NULL DEFAULT 'CNG',
  `mileage` decimal(8,2) DEFAULT NULL,
  `transmission` enum('Manual','Automatic') NOT NULL DEFAULT 'Manual',
  `air_conditioning` tinyint(1) NOT NULL DEFAULT 1,
  `gps` tinyint(1) NOT NULL DEFAULT 0,
  `bluetooth` tinyint(1) NOT NULL DEFAULT 0,
  `usb_port` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '0001_01_01_000000_create_users_table', 1),
(17, '0001_01_01_000001_create_cache_table', 1),
(18, '2025_02_14_081622_create_cars_table', 1),
(19, '2025_02_14_163551_create_rentals_table', 1),
(20, '2025_02_15_090714_create_car_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` enum('Pending','Ongoing','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `pickup_location` varchar(255) DEFAULT NULL,
  `drop_off_location` varchar(255) DEFAULT NULL,
  `pickup_time` varchar(255) DEFAULT NULL,
  `drop_off_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `name`, `phone`, `start_date`, `end_date`, `total_cost`, `status`, `pickup_location`, `drop_off_location`, `pickup_time`, `drop_off_time`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL, '2025-02-24', '2025-02-27', 30000.00, 'Pending', NULL, NULL, NULL, NULL, '2025-02-24 01:34:01', '2025-02-24 01:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rJ2oJFo2VydYIuoBnLQqBeDjIrrm0J61VKeSWLm7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQTZNVTZKZnZFZGtkYVN1b3p4cmowTFlHZUdLN0FDc0RiN1JaS1lDQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjU6InN0YXRlIjtzOjQwOiJldVVSME9yTU90VE9PdzhWNnRZN2NLcFJ6SGRXcGNrYVNUYktPcEdnIjt9', 1740383302);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `role`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, 'MD. Ariful Islam', 'arifulislam6460@gmail.com', 'admin', '$2y$12$wLpSxw9pL1ppXlSdruEzjePVWHJPAWKFa5Xj/V9xzqevcCQOdXPYG', '01785421417', 'Dhaka,Bangladesh', '2025-02-24 01:22:43', '2025-02-24 01:28:37'),
(2, '112259164709456368985', 'MD. Ariful Islam', 'ahsanullahariful6460@gmail.com', 'customer', NULL, NULL, NULL, '2025-02-24 01:31:12', '2025-02-24 01:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_details_car_id_foreign` (`car_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_details`
--
ALTER TABLE `car_details`
  ADD CONSTRAINT `car_details_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
