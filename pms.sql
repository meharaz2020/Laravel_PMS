-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 08:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disease_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `disease_name`) VALUES
(7, 'Cough'),
(1, 'Fiver'),
(3, 'Fiver typoid'),
(9, 'Fiver typoid1'),
(10, 'Fiver16'),
(12, 'hii'),
(11, 'hip'),
(6, 'Malaria'),
(5, 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `test_name`, `created_at`, `updated_at`) VALUES
(1, 'x-ray', NULL, NULL),
(2, 'Eco', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`) VALUES
(2, 'Amodice'),
(1, 'Napa');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_details`
--

CREATE TABLE `medicines_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `packing` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines_details`
--

INSERT INTO `medicines_details` (`id`, `medicine_id`, `packing`) VALUES
(2, 1, '20gm'),
(1, 2, '20gm'),
(3, 2, '40gm');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_02_12_081451_create_medicines_table', 1),
(6, '2023_02_12_081802_create_medicines_details_table', 1),
(7, '2023_02_12_083227_create_patients_table', 1),
(8, '2023_02_12_083556_alter_patients_table', 1),
(9, '2023_02_12_083842_create_disease_table', 1),
(10, '2023_02_12_084053_create_patients_visit_table', 1),
(11, '2023_02_12_084443_create_patients_visit_diseases_table', 1),
(12, '2023_02_12_084513_create_patients_visit_medications_table', 1),
(13, '2023_02_20_092325_create_lab_test_table', 2),
(14, '2023_02_20_092955_create_patient_visit_tests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_name`, `date_of_birth`, `gender`, `phone_number`) VALUES
(1, 'MHR ss', '2023/03/03', 2, '7557675'),
(2, 'meharaz hossain fgfggdgf', '2023/03/03', 2, '7557675');

-- --------------------------------------------------------

--
-- Table structure for table `patients_visit`
--

CREATE TABLE `patients_visit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `visit_date` date NOT NULL,
  `bp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_visit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients_visit`
--

INSERT INTO `patients_visit` (`id`, `patient_id`, `visit_date`, `bp`, `weight`, `last_visit`) VALUES
(28, 2, '2023-03-02', '111', '111', '2023/3/2');

-- --------------------------------------------------------

--
-- Table structure for table `patients_visit_diseases`
--

CREATE TABLE `patients_visit_diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_visit_id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients_visit_diseases`
--

INSERT INTO `patients_visit_diseases` (`id`, `patient_visit_id`, `disease_id`) VALUES
(31, 28, 3),
(32, 28, 12);

-- --------------------------------------------------------

--
-- Table structure for table `patients_visit_medications`
--

CREATE TABLE `patients_visit_medications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_visit_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_detail_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `dosage` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients_visit_medications`
--

INSERT INTO `patients_visit_medications` (`id`, `patient_visit_id`, `medicine_detail_id`, `quantity`, `dosage`) VALUES
(22, 28, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `patient_visit_tests`
--

CREATE TABLE `patient_visit_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_visit_id` bigint(20) UNSIGNED NOT NULL,
  `lab_test` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_visit_tests`
--

INSERT INTO `patient_visit_tests` (`id`, `patient_visit_id`, `lab_test`, `created_at`, `updated_at`) VALUES
(58, 28, 2, NULL, NULL),
(59, 28, 2, NULL, NULL),
(60, 28, 2, NULL, NULL),
(61, 28, 2, NULL, NULL),
(62, 28, 2, NULL, NULL),
(63, 28, 2, NULL, NULL),
(64, 28, 2, NULL, NULL),
(65, 28, 2, NULL, NULL),
(66, 28, 2, NULL, NULL),
(67, 28, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disease_disease_name_unique` (`disease_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicines_medicine_name_unique` (`medicine_name`);

--
-- Indexes for table `medicines_details`
--
ALTER TABLE `medicines_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicines_details_medicine_id_packing_unique` (`medicine_id`,`packing`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_visit`
--
ALTER TABLE `patients_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_visit_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `patients_visit_diseases`
--
ALTER TABLE `patients_visit_diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_visit_diseases_patient_visit_id_foreign` (`patient_visit_id`),
  ADD KEY `patients_visit_diseases_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `patients_visit_medications`
--
ALTER TABLE `patients_visit_medications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_visit_medications_patient_visit_id_foreign` (`patient_visit_id`),
  ADD KEY `patients_visit_medications_medicine_detail_id_foreign` (`medicine_detail_id`);

--
-- Indexes for table `patient_visit_tests`
--
ALTER TABLE `patient_visit_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_visit_tests_patient_visit_id_foreign` (`patient_visit_id`),
  ADD KEY `patient_visit_tests_lab_test_foreign` (`lab_test`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines_details`
--
ALTER TABLE `medicines_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients_visit`
--
ALTER TABLE `patients_visit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `patients_visit_diseases`
--
ALTER TABLE `patients_visit_diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patients_visit_medications`
--
ALTER TABLE `patients_visit_medications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patient_visit_tests`
--
ALTER TABLE `patient_visit_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines_details`
--
ALTER TABLE `medicines_details`
  ADD CONSTRAINT `medicines_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`);

--
-- Constraints for table `patients_visit`
--
ALTER TABLE `patients_visit`
  ADD CONSTRAINT `patients_visit_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `patients_visit_diseases`
--
ALTER TABLE `patients_visit_diseases`
  ADD CONSTRAINT `patients_visit_diseases_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `patients_visit_diseases_patient_visit_id_foreign` FOREIGN KEY (`patient_visit_id`) REFERENCES `patients_visit` (`id`);

--
-- Constraints for table `patients_visit_medications`
--
ALTER TABLE `patients_visit_medications`
  ADD CONSTRAINT `patients_visit_medications_medicine_detail_id_foreign` FOREIGN KEY (`medicine_detail_id`) REFERENCES `medicines_details` (`id`),
  ADD CONSTRAINT `patients_visit_medications_patient_visit_id_foreign` FOREIGN KEY (`patient_visit_id`) REFERENCES `patients_visit` (`id`);

--
-- Constraints for table `patient_visit_tests`
--
ALTER TABLE `patient_visit_tests`
  ADD CONSTRAINT `patient_visit_tests_lab_test_foreign` FOREIGN KEY (`lab_test`) REFERENCES `lab_test` (`id`),
  ADD CONSTRAINT `patient_visit_tests_patient_visit_id_foreign` FOREIGN KEY (`patient_visit_id`) REFERENCES `patients_visit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
