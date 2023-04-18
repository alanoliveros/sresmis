-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 11:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sresmis-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `purok` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `userId`, `purok`, `barangay`, `city`, `province`, `zipCode`, `created_at`, `updated_at`) VALUES
(7, 17, 'P-9, Laligan, Valencia City, Bukidnon', 'Laligan', 'VALENCIA CITY', 'BUKIDNON', 8709, '2023-04-17 17:14:16', '2023-04-17 17:14:16'),
(8, 18, 'P-9, Laligan, Valencia City, Bukidnon', NULL, 'VALENCIA CITY', 'BUKIDNON', 8709, '2023-04-17 17:15:44', '2023-04-17 17:15:44'),
(9, 19, 'P-9, Laligan, Valencia City, Bukidnon', NULL, 'VALENCIA CITY', 'BUKIDNON', 8709, '2023-04-17 18:59:43', '2023-04-17 18:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `gradeLevelId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gradeLevelName` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_levels`
--

INSERT INTO `grade_levels` (`id`, `gradeLevelName`, `created_at`, `updated_at`) VALUES
(1, 'Kindergarten', '2023-04-06 16:12:48', '2023-04-06 16:00:00'),
(2, 'Grade I', '2023-04-06 16:14:14', '2023-04-06 16:14:50'),
(3, 'Grade II', '2023-04-06 16:14:14', '2023-04-06 16:14:50'),
(4, 'Grade III', '2023-04-06 16:14:14', '2023-04-06 16:14:50'),
(5, 'Grade IV', '2023-04-06 16:14:14', '2023-04-06 16:14:50'),
(6, 'Grade V', '2023-04-06 16:14:14', '2023-04-06 16:14:50'),
(7, 'Grade VI', '2023-04-06 16:14:14', '2023-04-06 16:14:50');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_27_065003_create_sessions_table', 1),
(6, '2023_04_06_125532_create_schools_table', 2),
(7, '2023_04_06_130908_create_schools_table', 3),
(8, '2023_04_06_160422_create_grade_levels_table', 4),
(9, '2023_04_06_160327_create_subjects_table', 5),
(10, '2023_04_06_224504_create_sections_table', 6),
(11, '2023_04_06_225232_create_teachers_table', 7),
(12, '2023_04_06_230800_create_teachers_table', 8),
(13, '2023_04_07_015939_create_addresses_table', 9),
(14, '2023_04_12_123837_create_students_table', 10),
(15, '2023_04_12_125007_create_parent_guardians_table', 11),
(16, '2023_04_17_114322_create_attendances_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `parent_guardians`
--

CREATE TABLE `parent_guardians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `fathersFirstName` varchar(255) DEFAULT NULL,
  `fathersMiddleName` varchar(255) DEFAULT NULL,
  `fathersLastName` varchar(255) DEFAULT NULL,
  `fathersSuffix` varchar(255) DEFAULT NULL,
  `mothersFirstName` varchar(255) DEFAULT NULL,
  `mothersMiddleName` varchar(255) DEFAULT NULL,
  `mothersLastName` varchar(255) DEFAULT NULL,
  `mothersSuffix` varchar(255) DEFAULT NULL,
  `guardiansFirstName` varchar(255) DEFAULT NULL,
  `guardiansMiddleName` varchar(255) DEFAULT NULL,
  `guardiansLastName` varchar(255) DEFAULT NULL,
  `guardiansSuffix` varchar(255) DEFAULT NULL,
  `relationshiptoStudent` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_guardians`
--

INSERT INTO `parent_guardians` (`id`, `adminId`, `teacherId`, `studentId`, `fathersFirstName`, `fathersMiddleName`, `fathersLastName`, `fathersSuffix`, `mothersFirstName`, `mothersMiddleName`, `mothersLastName`, `mothersSuffix`, `guardiansFirstName`, `guardiansMiddleName`, `guardiansLastName`, `guardiansSuffix`, `relationshiptoStudent`, `contactNumber`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 16, 'Alvin Joseph', 'Bregildo', 'Goron', 'asd', 'Alvin Joseph', 'Bregildo', 'Goron', 'Asd', NULL, NULL, NULL, NULL, 'Son', 123123123, '2023-04-17 02:36:11', '2023-04-17 02:36:11'),
(2, 1, 7, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grandson', 123123123, '2023-04-17 17:14:16', '2023-04-17 17:14:16'),
(3, 1, 7, 18, 'Alan', 'jasdd', 'dasd', NULL, 'Alvin Joseph', 'Bregildo', 'Goron', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-17 17:15:44', '2023-04-17 17:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) DEFAULT NULL,
  `schoolId` int(11) DEFAULT NULL,
  `schoolName` varchar(255) DEFAULT NULL,
  `schoolRegion` varchar(255) DEFAULT NULL,
  `schoolDivision` varchar(255) DEFAULT NULL,
  `schoolYear` varchar(255) DEFAULT NULL,
  `schoolDistrict` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `adminId`, `schoolId`, `schoolName`, `schoolRegion`, `schoolDivision`, `schoolYear`, `schoolDistrict`, `created_at`, `updated_at`) VALUES
(1, 1, 126674, 'San Roque Elementary School', 'Region X', 'Bukidnon', '2021-2022', 'Maramag II', '2023-04-06 13:14:07', '2023-04-06 13:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `sectionName` varchar(255) NOT NULL,
  `gradeLevelId` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `adminId`, `sectionName`, `gradeLevelId`, `created_at`, `updated_at`) VALUES
(1, 1, 'Daisy', '2', '2023-04-06 22:50:31', '2023-04-06 22:50:31'),
(2, 1, 'Mahogani', '6', '2023-04-06 22:50:31', '2023-04-06 22:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `adminId`, `school_year`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-2019', '2023-04-18 07:10:04', '2023-04-18 07:10:04'),
(2, 1, '2019-2020', '2023-04-18 07:10:04', '2023-04-18 07:10:04'),
(3, 1, '2020-2021', '2023-04-18 07:10:04', '2023-04-18 07:10:04'),
(4, 1, '2021-2022', '2023-04-18 07:10:04', '2023-04-18 07:10:04'),
(5, 1, '2022-2023', '2023-04-18 07:10:04', '2023-04-18 07:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `lrn` bigint(20) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `gradeLevelId` int(11) NOT NULL,
  `mothertongue` varchar(255) DEFAULT NULL,
  `ethnicgroup` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `adminId`, `teacherId`, `studentId`, `lrn`, `sectionId`, `gradeLevelId`, `mothertongue`, `ethnicgroup`, `religion`, `created_at`, `updated_at`) VALUES
(5, 1, 7, 17, 12345678910, 1, 2, 'Cebuano', 'Talaandig', 'Catholic', '2023-04-17 17:14:16', '2023-04-17 17:14:16'),
(6, 1, 7, 18, 1213141516161717, 1, 2, 'Cebuano', 'Talaandig', 'Catholic', '2023-04-17 17:15:44', '2023-04-17 17:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `adminId`, `subjectName`, `created_at`, `updated_at`) VALUES
(1, 1, 'ALL SUBJECTS', '2023-04-06 16:37:00', '2023-04-06 16:37:00'),
(2, 1, 'Mother Tongue', '2023-04-06 16:41:20', '2023-04-06 16:00:00'),
(3, 1, 'Filipino', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(4, 1, 'English', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(5, 1, 'Mathematics', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(6, 1, 'Science', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(7, 1, 'Araling Panlipunan', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(8, 1, 'Edukasyon sa Pagpapakatao (EsP)', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(9, 1, 'Music', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(10, 1, 'Arts', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(11, 1, 'Physical Education', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(12, 1, 'Health', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(13, 1, 'Edukasyong Pantahanan at Pangkabuhayan (EPP)', '2023-04-06 16:41:46', '2023-04-06 16:00:00'),
(14, 1, 'Technology and Livelihood Education (TLE)', '2023-04-06 16:41:46', '2023-04-06 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `gradeLevelId` int(11) NOT NULL,
  `subjectId` varchar(255) NOT NULL,
  `addressId` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `employeeNumber` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `fundSource` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) DEFAULT NULL,
  `totalTeachingTimePerWeek` int(11) NOT NULL,
  `numberOfAncillary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `adminId`, `teacherId`, `sectionId`, `gradeLevelId`, `subjectId`, `addressId`, `designation`, `employeeNumber`, `position`, `fundSource`, `degree`, `major`, `minor`, `totalTeachingTimePerWeek`, `numberOfAncillary`, `created_at`, `updated_at`) VALUES
(3, 1, 7, 1, 2, '1', 4, 'Head Teacher', 123123, 'Teacher II', 'National', 'BEED', 'Software Development', NULL, 1212121, 1, '2023-04-09 04:05:35', '2023-04-09 04:05:35'),
(4, 1, 19, 2, 6, '7, 10, 8, 13, 4, 3, 12, 5, 2, 9, 11, 6', 9, 'Head Teacher', 123123, 'Teacher II', 'National', 'BEED', 'English', NULL, 1212121, 1, '2023-04-17 18:59:43', '2023-04-17 18:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `middlename`, `lastname`, `suffix`, `gender`, `birthdate`, `age`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rico', 1, 'Bregildo', 'Goron', NULL, '', NULL, NULL, 'sresmis@admin', NULL, '$2y$10$VSvcPdxo3SM7cJyUBk.GIOoteMGpHQ2pdW1fI3Y/YM8MWBWeWS146', 'avatar.png', NULL, '2023-04-13 04:09:18', '2023-04-13 04:09:18'),
(7, 'Rico', 2, 'Bregildo', 'Goron', NULL, 'Male', NULL, NULL, 'sresmis@teacher', NULL, '$2y$10$UDOmiaYoIeYBOa7inINKee3mmYYmFJbPGyMkqIP3hEcjRdVwtrqOW', 'avatar.png', NULL, '2023-04-09 04:05:33', '2023-04-09 04:05:33'),
(17, 'Alvin Joseph', 3, 'Bregildo', 'Goron', NULL, 'Male', '2023-04-18', 23, '12345678910', NULL, '$2y$10$yGSOai4wCSz/tAuwVjtODu90rm4tDVw8RCDKVye/LG.2WxAC4cy5O', 'avatar.png', NULL, '2023-04-17 17:14:16', '2023-04-17 17:14:16'),
(18, 'Alan', 3, 'Supla-ag', 'Oliveros', NULL, 'Male', '2023-04-18', 21, '1213141516161717', NULL, '$2y$10$hOT7M5vpdgAuEzJPkgpWp.Eq9JusVFb01ikSoqoqzNimHoNQp4vMK', 'avatar.png', NULL, '2023-04-17 17:15:44', '2023-04-17 17:15:44'),
(19, 'Alvin Joseph', 2, 'Bregildo', 'Goron', NULL, 'Male', NULL, NULL, 'sresmis@teacher2', NULL, '$2y$10$cE1QQM023xkLnid469fQpeKc/N.RnH2Ej015ED3bYn4SK7uXAEGMq', 'avatar.png', NULL, '2023-04-17 18:59:43', '2023-04-17 18:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_guardians`
--
ALTER TABLE `parent_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_lrn_unique` (`lrn`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `parent_guardians`
--
ALTER TABLE `parent_guardians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
