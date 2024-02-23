-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 08:37 AM
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
-- Database: `laravel_evolve_designs`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `user_id`, `name`, `image`, `phone_number`, `email`, `address`, `description`, `website`, `facebook`, `instagram`, `whatsapp`, `twitter`, `created_at`, `updated_at`) VALUES
(2, 10, 'Evolve Designs', 'storage/img/202401080853.jpg', '+263782210021', 'info@evolvedesigns.com', '15 York Road, Newlands, Harare', 'khkjhk', 'hkhklh', 'www.facebook.com', 'www.instragram.com', '+263782210021', 'www.x.com', '2023-12-21 14:07:17', '2024-02-07 05:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Latest Projects', 'fghfhg biuveiur ubeiuh beuigb iuegiu buiweui uihu euihui eiurhgui b the htrh fit grip', '2023-12-23 09:57:32', '2024-01-08 07:11:16'),
(3, 1, 'Residential Projects', 'mlmlmlm', '2023-12-23 09:58:57', '2024-01-08 07:12:27'),
(4, 1, 'Commercial Projects', 'mlmlmlm', '2023-12-23 09:59:02', '2024-01-08 07:11:47');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_19_133610_create_services_table', 1),
(6, '2023_12_19_133630_create_projects_table', 1),
(8, '2023_12_19_133646_create_service_images_table', 1),
(9, '2023_12_19_133726_create_categories_table', 1),
(10, '2023_12_19_133741_create_roles_table', 1),
(11, '2023_12_19_133751_create_permissions_table', 1),
(13, '2023_12_19_140800_create_types_table', 1),
(14, '2023_12_19_140809_create_service_types_table', 1),
(15, '2023_12_19_140825_create_project_categories_table', 1),
(16, '2023_12_19_133813_create_app_infos_table', 1),
(17, '2014_10_12_000000_create_users_table', 1),
(20, '2023_12_19_133637_create_project_images_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `name`, `level`, `description`, `created_at`, `updated_at`) VALUES
(1, 18, 'Permit', 2, 'Qwerty', '2023-12-21 05:21:47', '2023-12-21 05:21:47'),
(6, 18, 'Take', 4, 'Wish well', '2023-12-21 05:25:40', '2023-12-21 05:25:40'),
(7, 1, 'new', 3, 'dcescrv', '2023-12-29 18:58:24', '2023-12-29 18:58:24');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(31, 'App\\Models\\User', 10, 'markchovava@gmail.com', 'dd8d1d7f5f9839e6937e7bcafb23a741116e994434ef8b842ed357923d69dfe8', '[\"*\"]', NULL, NULL, '2024-02-06 06:12:02', '2024-02-06 06:12:02'),
(32, 'App\\Models\\User', 10, 'markchovava@gmail.com', '09b2e88728f2122ce6c82a9ef2786e1b476ba0cb49d28195e18efe0bd94c80ee', '[\"*\"]', NULL, NULL, '2024-02-06 06:13:04', '2024-02-06 06:13:04'),
(34, 'App\\Models\\User', 10, 'markchovava@gmail.com', '983df9ecf6bca4909ca2b3d65b6c4e36bfe755beaf9756ee571da3fe5812f76f', '[\"*\"]', NULL, NULL, '2024-02-06 06:16:19', '2024-02-06 06:16:19'),
(38, 'App\\Models\\User', 10, 'markchovava@gmail.com', '16a4edf99992b1303a14ac22c5f14fab521080a9ac0e1a758ae989f8e5f404fb', '[\"*\"]', '2024-02-07 05:32:22', NULL, '2024-02-07 05:28:23', '2024-02-07 05:32:22'),
(39, 'App\\Models\\User', 8, 'mark@email.com', '41a010c2e049566a69894e2ff82a06ffc683676beca510017ea3ad66b1b972fd', '[\"*\"]', '2024-02-09 07:36:45', NULL, '2024-02-09 06:59:48', '2024-02-09 07:36:45'),
(40, 'App\\Models\\User', 8, 'mark@email.com', 'b04592d9e09c0f0df87d5ef0bba8de87bcf68762fa6fa29fa51419234e9d594c', '[\"*\"]', '2024-02-23 04:11:20', NULL, '2024-02-23 04:11:09', '2024-02-23 04:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `thumbnail`, `description`, `created_at`, `updated_at`) VALUES
(86, 1, 'Project Two', 'storage/img/projects/202401062052.jpg', 'It works', '2024-01-01 19:06:41', '2024-01-08 10:14:54'),
(87, 1, 'Project 1', 'storage/img/projects/thumbnail/202401062055.jpg', 'I will trust in Him', '2024-01-01 19:18:21', '2024-01-08 10:14:25'),
(88, 1, 'Project 3', 'storage/img/projects/thumbnail/202401081213224.jpg', 'Ssomething to write', '2024-01-08 10:13:56', '2024-01-08 10:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `user_id`, `category_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 86, '2024-01-04 09:38:35', '2024-01-04 09:38:35'),
(3, 1, 4, 86, '2024-01-04 11:04:06', '2024-01-04 11:04:06'),
(7, 1, 1, 87, '2024-01-04 11:14:58', '2024-01-04 11:14:58'),
(8, 1, 4, 87, '2024-01-04 11:14:58', '2024-01-04 11:14:58'),
(9, 1, 3, 86, '2024-01-05 12:08:26', '2024-01-05 12:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `user_id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(75, 1, 86, 'storage/img/projects/202401062052597.jpg', '2024-01-06 18:52:10', '2024-01-06 18:52:10'),
(76, 1, 86, 'storage/img/projects/202401062052209.jpg', '2024-01-06 18:52:10', '2024-01-06 18:52:10'),
(77, 1, 86, 'storage/img/projects/202401062052479.jpg', '2024-01-06 18:52:10', '2024-01-06 18:52:10'),
(78, 1, 86, 'storage/img/projects/202401062052750.jpg', '2024-01-06 18:52:10', '2024-01-06 18:52:10'),
(79, 1, 86, 'storage/img/projects/202401062052748.jpg', '2024-01-06 18:52:10', '2024-01-06 18:52:10'),
(80, 1, 87, 'storage/img/projects/202401062053145.jpg', '2024-01-06 18:53:09', '2024-01-06 18:53:09'),
(81, 1, 87, 'storage/img/projects/20240106205350.jpg', '2024-01-06 18:53:09', '2024-01-06 18:53:09'),
(82, 1, 87, 'storage/img/projects/202401062053378.jpg', '2024-01-06 18:53:09', '2024-01-06 18:53:09'),
(83, 1, 87, 'storage/img/projects/202401062053584.jpg', '2024-01-06 18:53:09', '2024-01-06 18:53:09'),
(85, 1, 87, 'storage/img/projects/202401062056822.jpg', '2024-01-06 18:56:50', '2024-01-06 18:56:50'),
(86, 1, 88, 'storage/img/projects/202401081213832.jpg', '2024-01-08 10:13:56', '2024-01-08 10:13:56'),
(87, 1, 88, 'storage/img/projects/202401081213413.jpg', '2024-01-08 10:13:56', '2024-01-08 10:13:56'),
(88, 1, 88, 'storage/img/projects/202401081213361.jpg', '2024-01-08 10:13:56', '2024-01-08 10:13:56'),
(89, 1, 88, 'storage/img/projects/202401081213634.jpg', '2024-01-08 10:13:56', '2024-01-08 10:13:56'),
(90, 1, 88, 'storage/img/projects/202401081213677.jpg', '2024-01-08 10:13:56', '2024-01-08 10:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `name`, `level`, `description`, `created_at`, `updated_at`) VALUES
(3, 18, 'Another', 1, 'ydtdd', '2023-12-21 06:09:14', '2023-12-21 06:09:14'),
(4, 8, 'Manager', 1, 'Work on it', '2024-02-05 19:27:06', '2024-02-05 19:27:06'),
(5, 18, 'Mark Chovava', 2, 'WKJFBIDFBV', '2023-12-21 14:23:27', '2023-12-21 14:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `thumbnail`, `description`, `created_at`, `updated_at`) VALUES
(2, 10, 'Project Management & Implementation', 'storage/img/services/thumbnail/202401062050117.jpg', 'We guide your dream project from concept to completion, ensuring a smooth, stress-free journey. We are your expert partners, navigating every step with meticulous planning, clear communication, and unwavering dedication to quality. We steer your project on course, from feasibility studies and budgeting to scheduling, procurement, and construction oversight. We bridge the gap between design and reality, managing contractors, ensuring adherence to plans and safety regulations, and keeping you informed every step of the way. We maintain transparent communication with you, stakeholders, and the construction team, fostering collaboration and addressing concerns promptly. We meticulously monitor quality throughout the build, guaranteeing your project meets the highest standards and your vision.', '2024-01-03 06:44:16', '2024-02-06 13:37:32'),
(4, 10, 'Interior Architecture & 3D Design', 'storage/img/services/thumbnail/2024020704180.jpg', 'Our architects understand space planning, ergonomics, and aesthetics to create layouts that optimize functionality and reflect your unique style.\r\nVisualize your design in stunning detail with photorealistic 3D renderings. See furniture placement, material textures, and lighting effects before construction begins. 3D models allow you to experiment with different design options and identify potential issues early on, saving time and money in the long run. Share your design plan with contractors, stakeholders, or potential buyers with clear and impactful visuals.', '2024-01-03 07:17:20', '2024-02-07 02:21:20'),
(8, 10, 'Exterior Design & Landscaping', 'storage/img/services/thumbnail/202401062050930.jpg', 'Transform your property from ordinary to extraordinary with the help of skilled professionals. Whether you dream of a vibrant garden paradise, a relaxing patio retreat, or a stunning curb appeal makeover, our combined expertise in exterior design and landscaping brings your vision to life.\r\nCollaborate with our designers to create a personalized plan that reflects your style and needs. From patios and walkways to retaining walls and fire pits, we craft beautiful and functional outdoor structures. Enhance your landscape with vibrant plantings, lush lawns, and colorful flowers, tailored to your local climate and preferences. Add decks, pergolas, water features, and outdoor kitchens to create the perfect space for entertaining or relaxation. Ensure your landscape shines beautifully at night and thrives with proper irrigation systems.', '2024-01-06 18:14:24', '2024-02-06 13:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `user_id`, `service_id`, `image`, `created_at`, `updated_at`) VALUES
(12, 1, 2, 'storage/img/services/202401062012246.jpg', '2024-01-06 18:12:34', '2024-01-06 18:12:34'),
(13, 1, 2, 'storage/img/services/202401062012616.jpg', '2024-01-06 18:12:34', '2024-01-06 18:12:34'),
(14, 1, 2, 'storage/img/services/202401062012255.jpg', '2024-01-06 18:12:34', '2024-01-06 18:12:34'),
(15, 1, 2, 'storage/img/services/202401062012311.jpg', '2024-01-06 18:12:34', '2024-01-06 18:12:34'),
(16, 1, 2, 'storage/img/services/202401062012673.jpg', '2024-01-06 18:12:34', '2024-01-06 18:12:34'),
(33, 1, 8, 'storage/img/services/202401062014326.jpg', '2024-01-06 18:14:24', '2024-01-06 18:14:24'),
(34, 1, 8, 'storage/img/services/202401062014198.jpg', '2024-01-06 18:14:24', '2024-01-06 18:14:24'),
(35, 1, 8, 'storage/img/services/202401062014431.jpg', '2024-01-06 18:14:24', '2024-01-06 18:14:24'),
(36, 1, 8, 'storage/img/services/202401062014625.jpg', '2024-01-06 18:14:24', '2024-01-06 18:14:24'),
(37, 10, 4, 'storage/img/services/202402070418315.jpg', '2024-02-07 02:18:20', '2024-02-07 02:18:20'),
(38, 10, 4, 'storage/img/services/202402070418560.jpg', '2024-02-07 02:18:20', '2024-02-07 02:18:20'),
(39, 10, 4, 'storage/img/services/202402070418673.jpg', '2024-02-07 02:18:20', '2024-02-07 02:18:20'),
(40, 10, 4, 'storage/img/services/20240207041887.jpg', '2024-02-07 02:18:20', '2024-02-07 02:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `user_id`, `type_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, '2024-01-04 12:02:56', '2024-01-04 12:02:56'),
(5, 1, 2, 4, '2024-01-05 13:37:32', '2024-01-05 13:37:32'),
(6, 1, 3, 4, '2024-01-05 13:38:31', '2024-01-05 13:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 18, 'second', 'kwete', '2023-12-23 10:55:36', '2023-12-23 10:55:36'),
(3, 18, 'Customer', 'o[po[o', '2023-12-23 10:57:53', '2023-12-23 10:57:53'),
(4, 18, 'Admin', 'oijj iii', '2023-12-23 10:58:04', '2023-12-23 10:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `permission_id`, `role_id`, `name`, `image`, `first_name`, `last_name`, `phone_number`, `profession`, `address`, `bio`, `code`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'mark@email.com', NULL, '$2y$12$q4PFqId6VdPFHXGZlJoYwO4zVNSU2YUPAfk4YJNZThT9qg7h1f4PS', NULL, '2024-01-10 10:28:51', '2024-01-10 10:28:51'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', 'markchovava@gmail.com', NULL, '$2y$12$22tP4h1Oy2z35UaVGO/f.eyro77j.00jMaZ5rCkD5BQi3cvNzG6Le', NULL, '2024-02-06 05:58:04', '2024-02-06 05:58:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_images`
--
ALTER TABLE `service_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
