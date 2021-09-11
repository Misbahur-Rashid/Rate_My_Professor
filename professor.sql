-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 09:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `professor`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Humayun', 'h.kabir1716@gmail.com', '75687458904', 'hello Banglad', 'If you follow us on Twitter or Facebook we will \'post\' when we have added the lecturer, course or university to the database that was requested.', 1, '2021-08-23 20:55:03', '2021-08-23 20:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LAW Department', 1, '2021-08-23 18:41:52', '2021-08-23 18:41:52'),
(2, 'CSE Department', 1, '2021-08-23 18:44:54', '2021-08-23 18:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `three_star` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feed_backs`
--

INSERT INTO `feed_backs` (`id`, `teacher_id`, `user_id`, `three_star`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '3', 'Nice work', 1, '2021-08-31 14:30:38', '2021-08-31 14:30:38'),
(2, 2, 8, '4', 'great work', 1, '2021-08-31 14:33:26', '2021-08-31 14:33:26'),
(3, 3, 8, '5', 'Not good', 1, '2021-08-31 14:34:01', '2021-08-31 14:34:01'),
(4, 1, 9, '1', 'not bad', 1, '2021-08-31 14:34:31', '2021-08-31 14:34:31'),
(5, 3, 9, '4', 'Absolute ', 1, '2021-08-31 14:34:31', '2021-08-31 14:34:31'),
(6, 3, 10, '5', 'hello sir', 1, '2021-09-02 16:30:19', '2021-09-02 18:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_01_163447_create_roles_table', 1),
(10, '2021_05_01_042940_create_students_table', 2),
(11, '2021_08_23_221101_create_departments_table', 3),
(12, '2021_08_23_225232_create_schools_table', 4),
(13, '2021_08_24_010145_create_contacts_table', 5),
(14, '2021_08_24_223042_create_site_settings_table', 6),
(15, '2021_08_26_153949_create_requestteachers_table', 7),
(16, '2021_08_26_213506_create_teachers_table', 8),
(17, '2021_08_31_193029_create_feed_backs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestteachers`
--

CREATE TABLE `requestteachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestteachers`
--

INSERT INTO `requestteachers` (`id`, `name`, `lastname`, `department_id`, `job_type`, `cv`, `photo`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Humayun', 'Kabir', 2, 'professor', '1629976938.pdf', 'pro.jpg-36701.jpg', 'gefhytgighfeiu', 1, '2021-08-26 11:22:18', '2021-08-26 11:59:18'),
(3, 'LAW Department', 'Kabir', 2, 'professor', '1630056663.pdf', 'pro.jpg-82498.jpg', 'hefyihguyrio809qe', 1, '2021-08-27 09:31:03', '2021-08-27 09:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `status`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', NULL, '2021-04-30 22:19:54'),
(2, 1, 'VC', '2021-04-30 22:12:32', '2021-04-30 22:12:32'),
(3, 1, 'student', '2021-08-26 12:20:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School Of Computer Departments', 1, '2021-08-23 21:25:29', '2021-08-23 21:29:11'),
(3, 'School Of Business Department', 1, '2021-08-23 21:30:20', '2021-08-23 21:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_h` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_h` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_c` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title_h`, `description_h`, `title_a`, `description_a`, `title_c`, `description_c`, `logo`, `banner_a`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WELCOME TO RATE YOUR LECTURER', 'The site that finally gives students a say. RYL is essentially a giant sounding board; so instead of hoping a friend knows how good a lecturer is you can visit this site and see reviews put up by other students whilst adding your own. This is the only way to improve teaching in the UK whilst holding your lecturers to account. Please do take a couple of minutes to add your thoughts and help out your fellow students!', 'ABOUT US', 'The site that finally gives students a say. RYL is essentially a giant sounding board; so instead of hoping a friend knows how good a lecturer is you can visit this site and see reviews put up by other students whilst adding your own. This is the only way to improve teaching in the UK whilst holding your lecturers to account. Please do take a couple of minutes to add your thoughts and help out your fellow students!', 'Contact us', 'The site that finally gives students a say. RYL is essentially a giant sounding board; so instead of hoping a friend knows how good a lecturer is you can visit this site and see reviews put up by other students whilst adding your own. This is the only way to improve teaching in the UK whilst holding your lecturers to account. Please do take a couple of minutes to add your thoughts and help out your fellow students!', 'Icon-logo-01.png-4427.png', '240471250_363658218698266_200804363978056457_n.jpg-40793.jpg', 1, '2021-08-24 21:24:52', '2021-08-24 21:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentid` int(11) NOT NULL,
  `courese_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `logo`, `classes`, `job_title`, `department_id`, `school_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Md.humayun Kabir', 'h.kabir1716@gmail.com', '01796010084', 'pro.jpg-8208.jpg', 'DataStructure, DataBase and System Analysis', 'professor', '1', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', '1', '2021-08-29 17:30:48', '2021-08-29 17:30:48'),
(2, 'Md.humayun Kabir', 'h.kabir1498@gmail.com', '0179601084', 'Screenshot_16.png-97304.png', 'DataStructure, Algoritham', 'Lecturer', '2', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', '1', '2021-08-29 18:19:33', '2021-08-29 18:19:33'),
(3, 'Md.humayun', 'h.kabir17@gmail.com', '017960100848', 'Screenshot_15.png-30278.png', 'DataStructure, DataBase', 'Asst.professor', '1', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', '1', '2021-08-29 18:24:01', '2021-08-29 18:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) DEFAULT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `phone`, `email_verified_at`, `password`, `status`, `username`, `slug`, `code`, `address`, `image`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hadi', 1, 'h.kabir1498@gmail.com', '01796010084', NULL, '$2y$10$DLTGFbcEBzMNBw.HxukJgerAtauGOOVH/hmfXtnyzLCadFDGWkl8m', 1, NULL, '10612430d77c994', 5487, NULL, '91131.jpg', NULL, NULL, NULL, '2021-08-23 23:35:51'),
(2, 'Humayun', 2, 'h.kabir@gmail.com', '0778899678904556', NULL, '$2y$10$6SW.L4mCouM2sefdsyQAyeGNicYyjaIxKavGeYsd63CJB/z30knM2', 1, 'kabir48', '105f04ca1586105', 5486, 'Dhaka', '86787.jpg', NULL, NULL, '2020-07-07 19:16:37', '2020-07-08 19:02:35'),
(3, 'Hadi', 1, 'hadi@gmail.com', '07788996789', NULL, '$2y$10$VouebjADGR6dW5.Ijy0TpeIvY/SFnTPEs5Dybki37WcYgegVmMlze', 1, NULL, '105f04e63bbc252', NULL, NULL, '49004.jpg', NULL, NULL, '2020-07-07 21:16:44', '2020-07-07 21:16:44'),
(4, 'Apple Watch', 2, 'riasad@gmail.com', '0778899678989', NULL, '$2y$10$/Fe4034C4CFj3QGN21jvhuVWS65acWp8J/wMlpuXnS4mROVZQzxyK', 1, 'hadi12', '105f050585ee328', 2347, 'Australia', '92714.jpg', NULL, NULL, '2020-07-07 23:30:15', '2020-07-07 23:32:48'),
(5, 'Hadi', 2, 'riasad96@gmail.com', '0449843880', NULL, '$2y$10$RIv2T2EGO.0oxE8oQZ/MGunwCZLb.xNK165IWKFPbvUCmC2M1Oh3e', 1, 'had56', '105f061973a562b', 5591, 'Ballarat', '80458.jpg', NULL, NULL, '2020-07-08 19:07:32', '2020-07-08 19:08:01'),
(6, 'Humayun', 1, 'h.kabir149845@gmail.com', '756874589', NULL, '$2y$10$3fya588qdKgs2jDqkwFQ1u8rkIQpzdEjP68125qRzYVpHYdIBMfQi', 1, NULL, '10612428826376b', NULL, NULL, 'Screenshot_2.png-41456.png', NULL, NULL, '2021-08-23 21:58:34', '2021-08-23 23:00:18'),
(7, 'Humayunr', 1, '', '1234567', NULL, '$2y$10$XO.omDlBx8WdLifHoejodeT5vbfGDpp883cDclGMgOJlcWB9hoAyq', 1, NULL, '10612436eccfe17', NULL, NULL, 'Screenshot_4.png-21896.png', NULL, NULL, '2021-08-23 23:31:53', '2021-08-24 00:01:48'),
(8, 'CSE Department', 3, 'h.kabir13@gmail.com', '756874589067678', NULL, '$2y$10$52NNzFh/vpXP9KXxUKHwQ.UVtMW5XVp1O34ns1PTirgBEpfyLWzn.', 1, 'h.kabir1', '106127a27968f33', NULL, 'Dhaka', 'pro.jpg-50265.jpg', NULL, NULL, '2021-08-26 14:17:29', '2021-08-26 15:09:57'),
(9, 'LAW Department', 3, 'h.kabir178@gmail.com', '7568745890456', NULL, '$2y$10$UIeHc74./XEi2oYRbR8LuOoUiR2JZJbbc/OABvufspFCAPVMAPB6u', 1, 'h.kabir14', '106127af4e71f0b', NULL, 'Dhaka', 'pro.jpg-50334.jpg', NULL, NULL, '2021-08-26 15:12:14', '2021-08-26 15:12:14'),
(10, 'asif', 3, 'asif123@gmail.com', '01796045840', NULL, '$2y$10$5tjqrBewEL7f2AsbMZ3Zbub6OAi7Ic0JayzyW2CYBMvv.oMiM1Yj2', 1, 'asif123', '106130fbd858cdb', NULL, 'Rampura', 'pro.jpg-55682.jpg', NULL, NULL, '2021-09-02 16:29:13', '2021-09-02 16:29:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `requestteachers`
--
ALTER TABLE `requestteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requestteachers`
--
ALTER TABLE `requestteachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
