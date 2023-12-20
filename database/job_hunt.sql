-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 20, 2023 at 03:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Lê Anh', 'leanh0094@gmail.com', '$2y$10$M3DMBJ/slvJFvOCcNxeI2OR9Oh4PFA8pNfuf/pn/la0Xk2iJ6okDW', 'admin.jpg', '', NULL, '2023-11-14 01:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint UNSIGNED NOT NULL,
  `job_listing_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_listing_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_listing_ad_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_listing_ad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_ad_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `job_listing_ad`, `job_listing_ad_status`, `job_listing_ad_url`, `company_listing_ad`, `company_listing_ad_status`, `company_listing_ad_url`, `created_at`, `updated_at`) VALUES
(1, 'job_listing_ad.jpg', 'Show', 'https://www.youtube.com/', 'company_listing_ad.jpg', 'Show', 'https://www.google.com/', NULL, '2023-12-15 02:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_job_listing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job_categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_listing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_pricing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_blog` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_privacy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_signup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_forget_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_panel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_candidate_panel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_job_listing`, `banner_job_detail`, `banner_job_categories`, `banner_company_listing`, `banner_company_detail`, `banner_pricing`, `banner_blog`, `banner_post`, `banner_faq`, `banner_contact`, `banner_terms`, `banner_privacy`, `banner_signup`, `banner_login`, `banner_forget_password`, `banner_company_panel`, `banner_candidate_panel`, `created_at`, `updated_at`) VALUES
(1, 'banner_job_listing.jpg', 'banner_job_detail.jpg', 'banner_job_categories.jpg', 'banner_company_listing.jpg', 'banner_company_detail.jpg', 'banner_pricing.jpg', 'banner_blog.jpg', 'banner_post.jpg', 'banner_faq.jpg', 'banner_contact.jpg', 'banner_terms.jpg', 'banner_privacy.jpg', 'banner_signup.jpg', 'banner_login.jpg', 'banner_forget_password.jpg', 'banner_company_panel.jpg', 'banner_candidate_panel.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `username`, `email`, `password`, `designation`, `token`, `photo`, `biography`, `phone`, `country`, `address`, `state`, `city`, `zip_code`, `gender`, `marital_status`, `date_of_birth`, `website`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lê Anh', 'leanh1904', 'leanh0094@gmail.com', '$2y$10$O4EbRsf4ss2jrjvOF4O6FueqaAaTb7geFaULlFiW.EOT3sdH/fW3O', 'Director, DEF Company', '', 'candidate_photo_1701961668.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt dui ut ornare. Venenatis a condimentum vitae sapien pellentesque habitant morbi.</p>', '0773000094', 'Việt Nam', '5/5 đường số 9 phường 16 quận Gò Vấp thành phố Hồ Chí Minh', 'TP Hồ Chí Minh', 'Hồ Chí Minh', '30000', 'Male', 'Unmarried', '2002-04-19', NULL, 1, '2023-11-27 05:13:55', '2023-12-11 21:58:27'),
(2, 'Nguyễn Văn An', 'an_nguyen', 'an.nguyen@gmail.com', '$2y$10$w.XjcJiEbbUKFY9RJHEI6uCHmT1pYKLyYoZssz74aDoJaeZQaGTta', 'Kỹ sư Phần mềm', '', 'candidate_photo_1702359237.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 123 456 789', 'Việt Nam', '123 Đường ABC, Quận 1, TP.Hồ Chí Minh', 'Hồ Chí Minh', 'Thành phố Hồ Chí Minh', '700000', 'Male', 'Unmarried', '1992-08-20', NULL, 1, '2023-12-11 22:19:31', '2023-12-11 22:33:57'),
(3, 'Trần Thị Bình', 'binh_tran', 'binh.tran@gmail.com', '$2y$10$ogFrE6skvyzoUPqYdfDliO9lgrJaIiCaINNVdedbHZODXicf51cUq', 'Chuyên viên Tiếp thị', '', 'candidate_photo_1702359908.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 987 654 321', 'Việt Nam', '456 Đường XYZ, Quận 2, TP.Hà Nội', 'Hà Nội', 'Hà Nội', '800000', 'Female', 'Married', '1990-03-15', NULL, 1, '2023-12-11 22:21:51', '2023-12-11 22:45:08'),
(4, 'Lê Minh Cường', 'cuong_le', 'cuong.le@gmail.com', '$2y$10$qUOc7zpdRM3sC1tzvmA98ervzBZs9rLrIbTceN3I5XUvSAH4SlxCG', 'Nhân viên Phân tích Dữ liệu', '', 'candidate_photo_1702360054.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 456 789 012', 'Việt Nam', '789 Đường DEF, Quận 3, TP.Đà Nẵng', 'Tỉnh Đà Nẵng', 'Thành phố Đà Nẵng', '900000', 'Male', 'Unmarried', '1985-11-25', NULL, 1, '2023-12-11 22:22:57', '2023-12-11 22:47:34'),
(5, 'Ngô Thị Dung', 'dung_ngo', 'dung.ngo@gmail.com', '$2y$10$89ZdvocufSyetMf84SXh/OFX8/i2ix92yHJJqbK2608yXx8.Vz4aW', 'Giám đốc Dự án', '', 'candidate_photo_1702360183.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 234 567 890', 'Việt Nam', '101 Đường GHI, Quận 4, TP.Cần Thơ', 'Cần Thơ', 'Cần Thơ', '100000', 'Female', 'Married', '1980-07-10', NULL, 1, '2023-12-11 22:23:51', '2023-12-11 22:49:43'),
(6, 'Phạm Văn E', 'van_e_pham', 'van.e.pham@gmail.com', '$2y$10$Jaug5zTDcl1.9l3ijaXGMuwbNJajkRxTywlJEuNZI6CDoWPVvyKCe', 'Chuyên viên Nghiên cứu', '', 'candidate_photo_1702360303.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 345 678 901', 'Việt Nam', '202 Đường JKL, Quận 5, TP.Vũng Tàu', 'Bà Rịa-Vũng Tàu', 'TP.Vũng Tàu', '200000', 'Male', 'Unmarried', '1995-04-30', NULL, 1, '2023-12-11 22:24:53', '2023-12-11 22:51:43'),
(7, 'Trần Văn Phát', 'phat_tran', 'phat.tran@gmail.com', '$2y$10$wK52el6JiRtp4GZ2oiQSd.NGAZHxoUoj0ASgPwuhejDtel65y..g2', 'Kỹ sư lập trình', '', 'candidate_photo_1702360496.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere ac ut consequat semper viverra nam. Arcu dui vivamus arcu felis bibendum. Habitant morbi tristique senectus et netus et. Nisi est sit amet facilisis magna etiam tempor orci eu. Quam quisque id diam vel quam. Eu volutpat odio facilisis mauris. Sit amet commodo nulla facilisi nullam vehicula. Sed blandit libero volutpat sed cras ornare arcu dui. Nascetur ridiculus mus mauris vitae ultricies leo integer malesuada nunc. Massa sapien faucibus et molestie. Risus nec feugiat in fermentum posuere urna nec. Netus et malesuada fames ac turpis egestas integer eget.</p>', '+84 567 890 123', 'Việt Nam', '707 Đường YZ, Quận 10, TP.Bạc Liêu', 'Bạc Liêu', 'Thành phố Bạc Liêu', '700000', 'Male', 'Married', '1989-07-08', NULL, 1, '2023-12-11 22:25:58', '2023-12-11 22:55:38'),
(8, 'Nguyễn Thị Thu Giang', 'giang_nguyen', 'giang.nguyen@gmail.com', '$2y$10$pxD534gZiwadwiNPSwy/XeF8bOlODBU72iZ9Zkmygudf37ITw43x2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-11 22:27:18', '2023-12-11 22:27:40'),
(9, 'Lê Văn Hòa', 'hoa_le', 'hoa.le@gmail.com', '$2y$10$gw/q.hpUcPfRjgHHwspqEu6hdqe/FEOTRPMBIgdvtJccjGlxUKxFa', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-11 22:28:17', '2023-12-11 22:28:41'),
(10, 'Phạm Văn Khánh', 'khanh_pham', 'khanh.pham@gmail.com', '$2y$10$plU9UE1UK5A1S7t41yo2x.w15BWppSO/5rNcfwoGeoiWZ/J3IjLNO', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-11 22:29:17', '2023-12-11 22:29:39'),
(11, 'Trần Thị Kim Anh', 'anh_tran', 'anh.tran@gmail.com', '$2y$10$XKZTp0dkTX13wQVlw20.0eJGwH0eDOk.4ktyj1D37ST7/4Sa/VBFO', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-12-11 22:30:13', '2023-12-11 22:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_applications`
--

CREATE TABLE `candidate_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `job_id` int NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_applications`
--

INSERT INTO `candidate_applications` (`id`, `candidate_id`, `job_id`, `cover_letter`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Hi \r\nI have appli for this job\r\nThank you !', 'Applied', '2023-12-14 05:58:40', '2023-12-14 05:58:40'),
(2, 1, 4, 'Hi \r\nabnc\r\ntest', 'Approved', '2023-12-14 06:16:24', '2023-12-14 22:51:06'),
(3, 2, 2, 'Hi \r\ni want apply too', 'Applied', '2023-12-14 22:04:08', '2023-12-14 22:50:45'),
(4, 1, 2, 'Hello\r\nI want to apply to this job', 'Approved', '2023-12-18 07:35:53', '2023-12-18 07:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_awards`
--

CREATE TABLE `candidate_awards` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_awards`
--

INSERT INTO `candidate_awards` (`id`, `candidate_id`, `title`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Employee of the Year, AMB Software Solutions', 'Won the employee of the year award for accomplishing all the targets and goals.', 'Sep 2021', '2023-12-07 23:12:31', '2023-12-07 23:15:31'),
(2, 1, 'The Dean\'s Award, MJ University', 'Awarded for representing the univerity at muiltiple international business case competitions.', 'Feb 2022', '2023-12-07 23:12:55', '2023-12-07 23:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_bookmarks`
--

CREATE TABLE `candidate_bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `job_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_bookmarks`
--

INSERT INTO `candidate_bookmarks` (`id`, `candidate_id`, `job_id`, `created_at`, `updated_at`) VALUES
(4, 1, 5, '2023-12-15 07:17:03', '2023-12-15 07:17:03'),
(5, 1, 4, '2023-12-15 07:17:22', '2023-12-15 07:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_educations`
--

CREATE TABLE `candidate_educations` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_educations`
--

INSERT INTO `candidate_educations` (`id`, `candidate_id`, `level`, `institute`, `degree`, `passing_year`, `created_at`, `updated_at`) VALUES
(1, 1, 'Graduation', 'Khulna University', 'B. Sc. in CSE', '2008', '2023-12-07 20:43:12', '2023-12-07 20:43:12'),
(2, 1, 'Higher Secondary', 'Cant. Public College, Khulna', 'H.S.C.', '2002', '2023-12-07 20:43:58', '2023-12-07 20:48:51'),
(3, 1, 'Secondary', 'Cant. Public College, Khulna', 'H.S.C.', '2000', '2023-12-07 20:49:22', '2023-12-07 20:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_experiences`
--

CREATE TABLE `candidate_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `company` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_experiences`
--

INSERT INTO `candidate_experiences` (`id`, `candidate_id`, `company`, `designation`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Google', 'System Analyst', 'Jan 2021', 'Present', '2023-12-07 22:06:04', '2023-12-07 22:08:21'),
(2, 1, 'Facebook', 'Senior Web Developer', 'Aug 2017', 'Dec 2020', '2023-12-07 22:06:42', '2023-12-07 22:06:42'),
(3, 1, 'Pixel Media Ltd.', 'Web Developer', 'Apr 2015', 'Mar 2017', '2023-12-07 22:07:18', '2023-12-07 22:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_resumes`
--

CREATE TABLE `candidate_resumes` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_resumes`
--

INSERT INTO `candidate_resumes` (`id`, `candidate_id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(4, 1, 'Main CV', 'resume_1702046267.docx', '2023-12-08 07:08:06', '2023-12-08 07:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_skills`
--

CREATE TABLE `candidate_skills` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_skills`
--

INSERT INTO `candidate_skills` (`id`, `candidate_id`, `name`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 1, 'Photoshop', '70', '2023-12-07 21:27:49', '2023-12-07 21:32:37'),
(2, 1, 'PHP', '80', '2023-12-07 21:27:58', '2023-12-07 21:27:58'),
(3, 1, 'Laravel', '95', '2023-12-07 21:28:08', '2023-12-07 21:28:08'),
(4, 1, 'Javascript', '80', '2023-12-07 21:28:16', '2023-12-07 21:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_location_id` int DEFAULT NULL,
  `company_size_id` int DEFAULT NULL,
  `company_industry_id` int DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded_on` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `oh_mon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_tue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_wed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_thu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_fri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_sat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_sun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `person_name`, `username`, `email`, `password`, `token`, `logo`, `phone`, `address`, `company_location_id`, `company_size_id`, `company_industry_id`, `website`, `founded_on`, `description`, `oh_mon`, `oh_tue`, `oh_wed`, `oh_thu`, `oh_fri`, `oh_sat`, `oh_sun`, `map_code`, `facebook`, `twitter`, `linkedin`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(5, 'University of economic finance', 'Lê Anh', 'leanh1904', 'leanh0094@gmail.com', '$2y$10$8Kd3/v0VjK2KthCvz3tLF.SUnKClUc.Bb9F.pV3/zOxQ6saHfkqz2', '', 'company_logo_1702346840.png', '0773000094', '5/5 đường số 9 phường 16 quận Gò Vấp thành phố Hồ Chí Minh', 50, 3, 2, 'abc.com.vn', '2020', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis. Magna ac placerat vestibulum lectus mauris ultrices eros in.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.590765294795!2d106.70227883846259!3d10.797404597338172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f315d625c89%3A0x73084dd08a9fe5a4!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMTQx!5e0!3m2!1svi!2s!4v1701575172700!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-11-25 20:46:23', '2023-12-11 20:42:49'),
(7, 'GreenTech Solutions Ltd.', 'Nguyễn Thị A', 'greentech_user', 'thi.a@greentech.vn', '$2y$10$LfzPn/EP3vHj7LWA5Db7ROJ.IqOyK9YcqztWRhsWVD9.0J715eNAK', '', 'company_logo_1702348858.jpg', '+84 123 456 789', '123 Đường Xanh, Quận 1, Thành phố Hồ Chí Minh', 50, 4, 4, 'http://www.greentech.vn/', '1978', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:15:07', '2023-12-11 20:47:23'),
(8, 'InnovateSoft Co.', 'Trần Văn B', 'innovate_user', 'van.b@innovatesoft.com', '$2y$10$Cq2lglHWAflgMD6CndXO4uv7feCMDIHVOgpiGVbHjTMqRdLagPvkO', '', 'company_logo_1702349063.jpg', '+84 987 654 321', '456 Đường Đổi Mới, Quận 2, Thành phố Hà Nội', 1, 3, 1, 'http://www.innovatesoft.com/', '2016', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:16:19', '2023-12-11 19:44:23'),
(9, 'DataCrafters Corporation', 'Lê Thị C', 'datacrafters_user', 'thi.c@datacrafters.vn', '$2y$10$mIFnIenvS/V.sRNHBCtQ4uUOos1Aq4ZsRb.RZLXnYwTdN6sQUWsX2', '', 'company_logo_1702349292.jpg', '+84 456 789 012', '789 Đường Công Nghệ, Quận 3, Thành phố Đà Nẵng', 32, 4, 1, 'http://www.datacrafters.vn/', '1995', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:17:16', '2023-12-11 20:48:33'),
(10, 'QuantumSolutions Ltd.', 'Ngô Văn D', 'quantum_user', 'van.d@quantumsolutions.com', '$2y$10$2OoKlP8n/oMI2GCWS9D1x.CCulP/dS.RfCjs5piFjLH2TnJ9lJzKi', '', 'company_logo_1702349388.png', '+84 789 012 345', '234 Đường Khoa Học, Quận 4, Thành phố Cần Thơ', 59, 3, 10, 'http://www.quantumsolutions.com/', '2020', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:18:15', '2023-12-11 20:48:58'),
(11, 'TechInnovators Inc.', 'Phạm Thị E', 'techinnovator_user', 'thi.e@techinnovators.vn', '$2y$10$g5l7pYAqZKBaeOfHTPm80u/l2kmLSHD/rC9l93nuQGrqn1mB8IgYO', '', 'company_logo_1702349553.png', '+84 234 567 890', '567 Đường Đổi Đời, Quận 5, Thành phố Vũng Tàu', 49, 3, 1, 'http://www.techinnovators.vn/', '2020', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:19:05', '2023-12-11 20:49:34'),
(12, 'CyberGuard Systems Co.', 'Trần Văn F', 'cyberguard_user', 'van.f@cyberguard.vn', '$2y$10$TrKzObVcX1x9UeYEIueovujyl7iuXPrHnD5osJx0FlyTvZI9sn/56', '', 'company_logo_1702349961.jpg', '+84 345 678 901', '890 Đường An Ninh, Quận 6, Thành phố Nha Trang', 37, 1, 2, 'http://www.cyberguardsystems.vn/', '2013', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702347161707!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:20:03', '2023-12-11 20:55:30'),
(13, 'FutureTech Solutions Ltd.', 'Lê Thị G', 'futuretech_user', 'thi.g@futuretechsolutions.com', '$2y$10$B4fISg/8KPgyjfOIhrDprexawUr3It6PI5tr98/3ykf6ob9ihM5my', '', 'company_logo_1702350238.png', '+84 567 890 123', '1234 Đường Tương Lai, Quận 7, Thành phố Hải Phòng', 20, 3, 5, 'http://www.futuretechsolutions.com/', '2012', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702350376575!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:20:57', '2023-12-11 20:57:29'),
(14, 'CodeMasters Co.', 'Nguyễn Văn H', 'codemaster_user', 'van.h@codemasters.vn', '$2y$10$LLhoM4VqUQO81OeqrJDaKu5/IYiafIP2OOcTbpT5QNVa.6esigGom', '', 'company_logo_1702350355.png', '+84 678 901 234', '2345 Đường Mã Nguồn, Quận 8, Thành phố Qui Nhơn', 35, 4, 1, 'http://www.codemasters.vn/', '2000', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702350376575!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:23:27', '2023-12-11 20:58:54'),
(15, 'SkyNet Innovations Ltd.', 'Phạm Văn I', 'skynet_user', 'van.i@skynetinnovations.com', '$2y$10$JSTbGnO4O4NWkKFgKAEAaeNNAycDMdupfLrh/H.7onNoINJ4Xx6ju', '', 'company_logo_1702350889.png', '+84 789 012 345', '3456 Đường SkyNet, Quận 9, Thành phố Pleiku', 41, 2, 1, 'http://www.skynetinnovations.com/', '2011', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702350376575!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:24:35', '2023-12-11 20:59:37'),
(16, 'AlphaData Dynamics Corporation', 'Trần Văn K', 'alphadata_user', 'van.k@alphadata.vn', '$2y$10$kVRKIlpda.HdZjazdFQ5suAd3R8nvKytg.EGum3ZXpBjhyrCCEjna', '', 'company_logo_1702351095.png', '+84 890 123 456', '4567 Đường Alpha, Quận 10, Thành phố Bạc Liêu', 62, 2, 1, 'http://www.alphadata.vn/', '2017', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Vel facilisis volutpat est velit egestas dui. Id faucibus nisl tincidunt eget. Mi eget mauris pharetra et ultrices neque. Id ornare arcu odio ut. Malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Massa tempor nec feugiat nisl pretium fusce id velit.</p>', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', '09:00 AM to 05:00 PM', 'Off day', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1585495690997!2d106.70402257465578!3d10.799166089351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752928c00763bd%3A0x9ae9db69155653f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMjc2!5e0!3m2!1svi!2s!4v1702350376575!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '#', '#', '#', '#', 1, '2023-12-11 19:25:25', '2023-12-11 21:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `company_industries`
--

CREATE TABLE `company_industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_industries`
--

INSERT INTO `company_industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Healthcare and Pharmaceuticals', '2023-12-01 07:15:37', '2023-12-11 19:36:16'),
(2, 'Information Technology', '2023-12-01 07:15:44', '2023-12-11 19:36:01'),
(3, 'Financial Services and Banking', '2023-12-01 07:15:52', '2023-12-11 19:36:48'),
(4, 'Oil and Energy', '2023-12-11 19:37:01', '2023-12-11 19:37:01'),
(5, 'Food and Beverage', '2023-12-11 19:37:08', '2023-12-11 19:37:08'),
(6, 'Construction and Real Estate', '2023-12-11 19:37:14', '2023-12-11 19:37:14'),
(7, 'Media and Advertising', '2023-12-11 19:37:21', '2023-12-11 19:37:21'),
(8, 'Education and Training', '2023-12-11 19:37:28', '2023-12-11 19:37:28'),
(9, 'Travel and Passenger Services', '2023-12-11 19:37:34', '2023-12-11 19:37:34'),
(10, 'Environment and Conservation', '2023-12-11 19:37:40', '2023-12-11 19:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `company_locations`
--

CREATE TABLE `company_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_locations`
--

INSERT INTO `company_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hà Nội', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(2, 'Tỉnh Hà Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(3, 'Tỉnh Cao Bằng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(4, 'Tỉnh Bắc Kạn', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(5, 'Tỉnh Tuyên Quang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(6, 'Tỉnh Lào Cai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(7, 'Tỉnh Điện Biên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(8, 'Tỉnh Lai Châu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(9, 'Tỉnh Sơn La', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(10, 'Tỉnh Yên Bái', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(11, 'Tỉnh Hoà Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(12, 'Tỉnh Thái Nguyên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(13, 'Tỉnh Lạng Sơn', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(14, 'Tỉnh Quảng Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(15, 'Tỉnh Bắc Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(16, 'Tỉnh Phú Thọ', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(17, 'Tỉnh Vĩnh Phúc', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(18, 'Tỉnh Bắc Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(19, 'Tỉnh Hải Dương', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(20, 'Thành phố Hải Phòng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(21, 'Tỉnh Hưng Yên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(22, 'Tỉnh Thái Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(23, 'Tỉnh Hà Nam', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(24, 'Tỉnh Nam Định', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(25, 'Tỉnh Ninh Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(26, 'Tỉnh Thanh Hóa', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(27, 'Tỉnh Nghệ An', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(28, 'Tỉnh Hà Tĩnh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(29, 'Tỉnh Quảng Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(30, 'Tỉnh Quảng Trị', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(31, 'Tỉnh Thừa Thiên Huế', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(32, 'Thành phố Đà Nẵng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(33, 'Tỉnh Quảng Nam', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(34, 'Tỉnh Quảng Ngãi', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(35, 'Tỉnh Bình Định', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(36, 'Tỉnh Phú Yên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(37, 'Tỉnh Khánh Hòa', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(38, 'Tỉnh Ninh Thuận', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(39, 'Tỉnh Bình Thuận', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(40, 'Tỉnh Kon Tum', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(41, 'Tỉnh Gia Lai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(42, 'Tỉnh Đắk Lắk', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(43, 'Tỉnh Đắk Nông', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(44, 'Tỉnh Lâm Đồng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(45, 'Tỉnh Bình Phước', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(46, 'Tỉnh Tây Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(47, 'Tỉnh Bình Dương', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(48, 'Tỉnh Đồng Nai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(49, 'Tỉnh Bà Rịa - Vũng Tàu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(50, 'Thành phố Hồ Chí Minh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(51, 'Tỉnh Long An', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(52, 'Tỉnh Tiền Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(53, 'Tỉnh Bến Tre', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(54, 'Tỉnh Trà Vinh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(55, 'Tỉnh Vĩnh Long', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(56, 'Tỉnh Đồng Tháp', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(57, 'Tỉnh An Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(58, 'Tỉnh Kiên Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(59, 'Thành phố Cần Thơ', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(60, 'Tỉnh Hậu Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(61, 'Tỉnh Sóc Trăng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(62, 'Tỉnh Bạc Liêu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(63, 'Tỉnh Cà Mau', '2023-12-11 20:39:30', '2023-12-11 20:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `company_photos`
--

CREATE TABLE `company_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_photos`
--

INSERT INTO `company_photos` (`id`, `company_id`, `photo`, `created_at`, `updated_at`) VALUES
(6, 5, 'company_photo_1701751553.jpg', '2023-12-04 21:45:53', '2023-12-04 21:45:53'),
(7, 5, 'company_photo_1701751563.jpg', '2023-12-04 21:46:03', '2023-12-04 21:46:03'),
(8, 5, 'company_photo_1701751569.jpg', '2023-12-04 21:46:09', '2023-12-04 21:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `company_sizes`
--

CREATE TABLE `company_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_sizes`
--

INSERT INTO `company_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2-5 Persons', '2023-12-01 07:32:38', '2023-12-01 07:32:38'),
(2, '5-10 Persons', '2023-12-01 07:32:49', '2023-12-01 07:32:49'),
(3, '15-30 Persons', '2023-12-01 07:33:09', '2023-12-01 07:33:09'),
(4, '100+ Persons', '2023-12-01 07:33:25', '2023-12-01 07:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `company_videos`
--

CREATE TABLE `company_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_videos`
--

INSERT INTO `company_videos` (`id`, `company_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'rNSIwjmynYQ', '2023-12-04 21:42:33', '2023-12-04 21:42:33'),
(2, 5, '3b-mstwDfuc', '2023-12-04 21:43:05', '2023-12-04 21:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Varius sit amet mattis vulputate enim nulla aliquet porttitor?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra convallis posuere morbi leo urna molestie at. Varius sit amet mattis vulputate enim nulla aliquet porttitor. Tellus pellentesque eu tincidunt tortor. Lacus vestibulum sed arcu non odio euismod lacinia at. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Euismod elementum nisi quis eleifend quam. Dolor sit amet consectetur adipiscing elit ut. Sed nisi lacus sed viverra tellus in hac habitasse platea. Cursus turpis massa tincidunt dui ut ornare lectus. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Massa vitae tortor condimentum lacinia quis vel eros donec.</p>', '2023-11-20 19:11:11', '2023-11-20 19:11:11'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Gravida in fermentum et sollicitudin ac orci. Tincidunt augue interdum velit euismod.</p>\r\n<div class=\"ddict_btn\" style=\"top: 27px; left: 402.062px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '2023-11-20 19:13:47', '2023-11-20 19:13:47'),
(3, 'Habitasse platea dictumst quisque sagittis purus sit amet?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa ultricies mi quis hendrerit. Habitasse platea dictumst quisque sagittis purus sit amet. Nulla malesuada pellentesque elit eget gravida.</p>\r\n<div class=\"ddict_btn\" style=\"top: 56px; left: 651.588px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '2023-11-20 19:14:43', '2023-11-20 19:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci,
  `skill` text COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `benefit` text COLLATE utf8mb4_unicode_ci,
  `deadline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` int NOT NULL,
  `job_category_id` int NOT NULL,
  `job_location_id` int NOT NULL,
  `job_type_id` int NOT NULL,
  `job_experience_id` int NOT NULL,
  `job_gender_id` int NOT NULL,
  `job_salary_range_id` int NOT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint NOT NULL,
  `is_urgent` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `description`, `responsibility`, `skill`, `education`, `benefit`, `deadline`, `vacancy`, `job_category_id`, `job_location_id`, `job_type_id`, `job_experience_id`, `job_gender_id`, `job_salary_range_id`, `map_code`, `is_featured`, `is_urgent`, `created_at`, `updated_at`) VALUES
(1, 5, 'Software Engineer', '<p>We are looking for a motivated PHP / Laravel developer to come join our agile team of professionals. If you are passionate about technology, constantly seeking to learn and improve your skillset, then you are the type of person we are looking for! We are offering superb career growth opportunities, great compensation, and benefits.</p>', '<ul style=\"box-sizing: border-box; padding-left: 2rem; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: \'Work Sans\', sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box;\">Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</li>\r\n<li style=\"box-sizing: border-box;\">Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team</li>\r\n<li style=\"box-sizing: border-box;\">Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications</li>\r\n<li style=\"box-sizing: border-box;\">Prepare and maintain all applications utilizing standard development tools</li>\r\n<li style=\"box-sizing: border-box;\">Utilize backend data services and contribute to increase existing data services API</li>\r\n<li style=\"box-sizing: border-box;\">Lead the entire web application development life cycle right from concept stage to delivery and post launch support</li>\r\n</ul>', '<ul style=\"box-sizing: border-box; padding-left: 2rem; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: \'Work Sans\', sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box;\">Previous working experience as a PHP / Laravel developer for 4 year(s)</li>\r\n<li style=\"box-sizing: border-box;\">BS/MS degree in Computer Science, Engineering, MIS or similar relevant field</li>\r\n<li style=\"box-sizing: border-box;\">In depth knowledge of object-oriented PHP and Laravel PHP Framework</li>\r\n<li style=\"box-sizing: border-box;\">Hands on experience with SQL schema design, SOLID principles, REST API design</li>\r\n<li style=\"box-sizing: border-box;\">Software testing (PHPUnit, PHPSpec, Behat)</li>\r\n<li style=\"box-sizing: border-box;\">MySQL profiling and query optimization</li>\r\n<li style=\"box-sizing: border-box;\">Creative and efficient problem solver</li>\r\n</ul>', '<ul style=\"box-sizing: border-box; padding-left: 2rem; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: \'Work Sans\', sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box;\">B.Sc. in CSE from any reputed University</li>\r\n<li style=\"box-sizing: border-box;\">CGPA minimum 3.50</li>\r\n</ul>', '<p>benefit 1</p>\r\n<p>benefit 2</p>', '2023-12-27', 5, 2, 50, 1, 4, 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d49577.60973875464!2d105.6612633005451!3d9.742178132420502!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0f74fff8c88b3%3A0x786729ba9dd297c7!2zS2h1IGLhuqNvIHThu5NuIHRoacOqbiBuaGnDqm4gTHVuZyBOZ-G7jWMgSG_DoG5n!5e0!3m2!1svi!2s!4v1701876297334!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 0, '2023-12-06 08:25:09', '2023-12-11 20:43:45'),
(2, 5, 'Data Engineer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A scelerisque purus semper eget duis at tellus at. Integer eget aliquet nibh praesent tristique magna sit amet.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A scelerisque purus semper eget duis at tellus at. Integer eget aliquet nibh praesent tristique magna sit amet.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A scelerisque purus semper eget duis at tellus at. Integer eget aliquet nibh praesent tristique magna sit amet.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nulla at volutpat diam ut venenatis tellus.</p>', NULL, '2023-12-29', 3, 2, 50, 1, 1, 2, 2, NULL, 1, 1, '2023-12-06 20:01:14', '2023-12-11 20:43:31'),
(4, 5, 'Lecture University', '<p>absdvjjdhd</p>', '<p>ạmdbkfjbas</p>', '<p>&aacute;dhkakjd</p>', '<p>kdjhafkj</p>', NULL, '2023-12-19', 1, 11, 50, 1, 1, 1, 3, NULL, 0, 0, '2023-12-08 20:42:46', '2023-12-11 20:44:08'),
(5, 7, 'Kỹ sư Phần mềm', '<p>- Tham gia v&agrave;o qu&aacute; tr&igrave;nh ph&aacute;t triển v&agrave; duy tr&igrave; c&aacute;c ứng dụng phần mềm.</p>\r\n<p>- Phối hợp chặt chẽ với đội ngũ kỹ sư v&agrave; nh&oacute;m sản phẩm để đảm bảo hiệu suất v&agrave; chất lượng sản phẩm.</p>\r\n<p>- X&acirc;y dựng v&agrave; duy tr&igrave; c&aacute;c hệ thống phần mềm c&oacute; khả năng mở rộng.</p>', '<p>- Ph&aacute;t triển m&atilde; nguồn chất lượng cao v&agrave; hiệu suất.</p>\r\n<p>- Kiểm thử, sửa lỗi v&agrave; duy tr&igrave; m&atilde; nguồn hiện tại.</p>\r\n<p>- Hỗ trợ qu&aacute; tr&igrave;nh triển khai v&agrave; bảo tr&igrave; ứng dụng.</p>', '<p>- Kiến thức s&acirc;u sắc về lập tr&igrave;nh hướng đối tượng (OOP).</p>\r\n<p>- Kinh nghiệm l&agrave;m việc với ng&ocirc;n ngữ lập tr&igrave;nh như Java, C++, hoặc Python.</p>\r\n<p>- Hiểu biết về c&aacute;c nguy&ecirc;n tắc thiết kế phần mềm.</p>', '<p>- Bằng cử nh&acirc;n hoặc cao hơn trong lĩnh vực C&ocirc;ng nghệ Th&ocirc;ng tin hoặc c&aacute;c lĩnh vực c&oacute; li&ecirc;n quan.&nbsp;</p>', '<p>- Mức lương cạnh tranh.</p>\r\n<p>- Chế độ bảo hiểm v&agrave; ph&uacute;c lợi kh&aacute;c theo quy định của c&ocirc;ng ty.</p>\r\n<p>- Cơ hội thăng tiến v&agrave; đ&agrave;o tạo chuy&ecirc;n s&acirc;u.</p>', '2023-12-28', 2, 2, 59, 1, 3, 1, 3, NULL, 1, 1, '2023-12-12 06:32:21', '2023-12-12 06:32:21'),
(6, 8, 'Chuyên viên Tiếp thị (Marketing Specialist)', '<p>- Ph&aacute;t triển v&agrave; thực hiện chiến lược tiếp thị để tăng cường nhận thức thương hiệu.</p>\r\n<p>- Tổ chức c&aacute;c chiến dịch quảng c&aacute;o trực tuyến v&agrave; ngoại tuyến.</p>\r\n<p>- Theo d&otilde;i v&agrave; đ&aacute;nh gi&aacute; hiệu suất tiếp thị để đề xuất cải tiến.</p>', '<p>- Tạo nội dung quảng c&aacute;o s&aacute;ng tạo v&agrave; hiệu quả.</p>\r\n<p>- Quản l&yacute; c&aacute;c k&ecirc;nh truyền th&ocirc;ng x&atilde; hội v&agrave; theo d&otilde;i tương t&aacute;c của kh&aacute;ch h&agrave;ng.</p>\r\n<p>- Hợp t&aacute;c với đội ngũ thiết kế để tạo c&aacute;c t&agrave;i liệu quảng c&aacute;o.</p>', '<p>- Kinh nghiệm l&agrave;m việc với c&ocirc;ng cụ tiếp thị trực tuyến như Google AdWords, Facebook Ads.</p>\r\n<p>- Khả năng s&aacute;ng tạo v&agrave; giao tiếp tốt.</p>\r\n<p>- Hiểu biết s&acirc;u sắc về quảng c&aacute;o v&agrave; chiến lược thương hiệu.</p>', '<p>- Bằng cử nh&acirc;n hoặc cao hơn trong Tiếp thị, Quảng c&aacute;o hoặc lĩnh vực tương đương.</p>', '<p>- Mức lương cạnh tranh.</p>\r\n<p>- Thưởng hiệu suất v&agrave; chế độ thưởng kh&aacute;c.</p>\r\n<p>- Cơ hội tham gia c&aacute;c sự kiện v&agrave; hội thảo tiếp thị.</p>', '2023-12-31', 10, 1, 1, 3, 6, 1, 1, NULL, 1, 0, '2023-12-12 06:40:40', '2023-12-12 06:42:56'),
(7, 9, 'Chuyên viên Phân tích Dữ liệu (Data Analyst)', '<p>- Ph&acirc;n t&iacute;ch dữ liệu để đưa ra những th&ocirc;ng tin chiến lược cho quyết định kinh doanh.</p>\r\n<p>- Ph&aacute;t triển bảng điều khiển v&agrave; b&aacute;o c&aacute;o dữ liệu dễ hiểu.</p>\r\n<p>- Đề xuất v&agrave; triển khai c&aacute;c chiến lược tối ưu h&oacute;a dữ liệu.</p>', '<p>- Thu thập v&agrave; xử l&yacute; dữ liệu từ nhiều nguồn kh&aacute;c nhau.</p>\r\n<p>- Ph&acirc;n t&iacute;ch xu hướng v&agrave; dự đo&aacute;n dữ liệu tương lai.</p>\r\n<p>- Tư vấn cho c&aacute;c đội ngũ nghiệp vụ dựa tr&ecirc;n ph&acirc;n t&iacute;ch dữ liệu.</p>', '<p>- Sử dụng th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ ph&acirc;n t&iacute;ch dữ liệu như SQL, Python, hoặc R.</p>\r\n<p>- Hiểu biết s&acirc;u sắc về thống k&ecirc; v&agrave; machine learning.</p>\r\n<p>- Khả năng tư duy logic v&agrave; giải quyết vấn đề.</p>', '<p>- Bằng cử nh&acirc;n hoặc cao hơn trong Thống k&ecirc;, Khoa học Dữ liệu hoặc lĩnh vực tương đương.</p>', '<p>- Mức lương cạnh tranh.</p>\r\n<p>- Chế độ bảo hiểm v&agrave; ph&uacute;c lợi kh&aacute;c theo quy định của c&ocirc;ng ty.</p>\r\n<p>- Cơ hội thăng ti</p>', '2023-12-12', 2, 5, 32, 1, 1, 1, 5, NULL, 0, 1, '2023-12-12 06:49:37', '2023-12-12 06:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', 'fas fa-landmark', '2023-11-17 08:39:12', '2023-11-17 09:11:47'),
(2, 'Engineering', 'fas fa-magic', '2023-11-17 08:39:41', '2023-11-17 08:39:41'),
(3, 'Medical', 'fas fa-stethoscope', '2023-11-17 08:40:04', '2023-11-17 08:40:04'),
(4, 'Production', 'fas fa-sitemap', '2023-11-17 08:40:23', '2023-11-17 08:40:23'),
(5, 'Data Entry', 'fas fa-share-alt', '2023-11-17 08:40:39', '2023-11-17 08:40:39'),
(6, 'Marketing', 'fas fa-bullhorn', '2023-11-17 08:40:54', '2023-11-17 08:40:54'),
(7, 'Technician', 'fas fa-street-view', '2023-11-17 08:41:19', '2023-11-17 08:41:19'),
(8, 'Security', 'fas fa-lock', '2023-11-17 08:41:36', '2023-11-17 08:41:36'),
(9, 'Garments', 'fas fa-users', '2023-11-17 08:41:52', '2023-11-17 08:41:52'),
(10, 'Telecommunication', 'fas fa-vector-square', '2023-11-17 08:42:08', '2023-11-17 08:42:08'),
(11, 'Education', 'fas fa-user-graduate', '2023-11-17 08:42:22', '2023-11-17 08:42:22'),
(12, 'Commercial', 'fas fa-suitcase', '2023-11-17 08:42:37', '2023-11-17 08:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experiences`
--

INSERT INTO `job_experiences` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1 Year', '2023-11-29 00:54:00', '2023-11-29 00:54:00'),
(2, '2 Years', '2023-11-29 00:54:08', '2023-11-29 01:05:30'),
(3, '3 Years', '2023-11-29 01:05:02', '2023-11-29 01:05:02'),
(4, '4 Years', '2023-11-29 01:05:09', '2023-11-29 01:05:09'),
(5, '5 Years', '2023-11-29 01:05:16', '2023-11-29 01:05:16'),
(6, 'Fresher', '2023-11-29 01:05:23', '2023-11-29 01:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `job_genders`
--

CREATE TABLE `job_genders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_genders`
--

INSERT INTO `job_genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2023-11-29 01:27:29', '2023-11-29 01:27:29'),
(2, 'Female', '2023-11-29 01:27:37', '2023-11-29 01:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hà Nội', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(2, 'Tỉnh Hà Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(3, 'Tỉnh Cao Bằng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(4, 'Tỉnh Bắc Kạn', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(5, 'Tỉnh Tuyên Quang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(6, 'Tỉnh Lào Cai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(7, 'Tỉnh Điện Biên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(8, 'Tỉnh Lai Châu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(9, 'Tỉnh Sơn La', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(10, 'Tỉnh Yên Bái', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(11, 'Tỉnh Hoà Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(12, 'Tỉnh Thái Nguyên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(13, 'Tỉnh Lạng Sơn', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(14, 'Tỉnh Quảng Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(15, 'Tỉnh Bắc Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(16, 'Tỉnh Phú Thọ', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(17, 'Tỉnh Vĩnh Phúc', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(18, 'Tỉnh Bắc Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(19, 'Tỉnh Hải Dương', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(20, 'Thành phố Hải Phòng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(21, 'Tỉnh Hưng Yên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(22, 'Tỉnh Thái Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(23, 'Tỉnh Hà Nam', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(24, 'Tỉnh Nam Định', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(25, 'Tỉnh Ninh Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(26, 'Tỉnh Thanh Hóa', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(27, 'Tỉnh Nghệ An', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(28, 'Tỉnh Hà Tĩnh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(29, 'Tỉnh Quảng Bình', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(30, 'Tỉnh Quảng Trị', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(31, 'Tỉnh Thừa Thiên Huế', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(32, 'Thành phố Đà Nẵng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(33, 'Tỉnh Quảng Nam', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(34, 'Tỉnh Quảng Ngãi', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(35, 'Tỉnh Bình Định', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(36, 'Tỉnh Phú Yên', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(37, 'Tỉnh Khánh Hòa', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(38, 'Tỉnh Ninh Thuận', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(39, 'Tỉnh Bình Thuận', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(40, 'Tỉnh Kon Tum', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(41, 'Tỉnh Gia Lai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(42, 'Tỉnh Đắk Lắk', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(43, 'Tỉnh Đắk Nông', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(44, 'Tỉnh Lâm Đồng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(45, 'Tỉnh Bình Phước', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(46, 'Tỉnh Tây Ninh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(47, 'Tỉnh Bình Dương', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(48, 'Tỉnh Đồng Nai', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(49, 'Tỉnh Bà Rịa - Vũng Tàu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(50, 'Thành phố Hồ Chí Minh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(51, 'Tỉnh Long An', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(52, 'Tỉnh Tiền Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(53, 'Tỉnh Bến Tre', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(54, 'Tỉnh Trà Vinh', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(55, 'Tỉnh Vĩnh Long', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(56, 'Tỉnh Đồng Tháp', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(57, 'Tỉnh An Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(58, 'Tỉnh Kiên Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(59, 'Thành phố Cần Thơ', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(60, 'Tỉnh Hậu Giang', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(61, 'Tỉnh Sóc Trăng', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(62, 'Tỉnh Bạc Liêu', '2023-12-11 20:39:30', '2023-12-11 20:39:30'),
(63, 'Tỉnh Cà Mau', '2023-12-11 20:39:30', '2023-12-11 20:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `job_salary_ranges`
--

CREATE TABLE `job_salary_ranges` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_salary_ranges`
--

INSERT INTO `job_salary_ranges` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '$100-$500', '2023-11-29 01:54:05', '2023-11-29 01:54:05'),
(2, '$1000-$1500', '2023-11-29 01:54:34', '2023-11-29 01:54:34'),
(3, '$500-$1000', '2023-11-29 01:55:01', '2023-11-29 01:55:01'),
(4, '$1500-$2000', '2023-11-29 01:55:18', '2023-11-29 01:55:18'),
(5, '$2500-$3000', '2023-11-29 01:55:31', '2023-11-29 01:55:31'),
(6, 'above $3000', '2023-11-29 01:55:40', '2023-11-29 01:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full time', '2023-11-29 00:32:35', '2023-11-29 00:32:35'),
(2, 'Part time', '2023-11-29 00:32:42', '2023-11-29 00:32:42'),
(3, 'Contractual', '2023-11-29 00:32:49', '2023-11-29 00:32:49'),
(4, 'Internship', '2023-11-29 00:33:04', '2023-11-29 00:33:04'),
(5, 'Freelance', '2023-11-29 00:33:13', '2023-11-29 00:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_13_073953_create_admins_table', 1),
(6, '2023_11_17_044509_create_page_home_items_table', 2),
(7, '2023_11_17_135202_create_job_categories_table', 3),
(8, '2023_11_19_140349_create_why_choose_items_table', 4),
(9, '2023_11_20_060716_create_testimonials_table', 5),
(10, '2023_11_20_130609_create_posts_table', 6),
(11, '2023_11_21_014001_create_faqs_table', 7),
(12, '2023_11_21_031101_create_page_faq_items_table', 8),
(13, '2023_11_21_042751_create_page_blog_items', 9),
(14, '2023_11_21_054247_create_page_term_items_table', 10),
(15, '2023_11_21_071817_create_page_privacy_items_table', 11),
(16, '2023_11_22_124233_create_page_contact_items_table', 12),
(17, '2023_11_22_142314_create_page_job_category_items', 13),
(18, '2023_11_24_021747_create_packages_table', 14),
(19, '2023_11_24_065454_create_page_pricing_items_table', 15),
(20, '2023_11_25_040828_create_page_other_items', 16),
(21, '2023_11_25_151823_create_companies_table', 17),
(22, '2023_11_27_013418_create_cadidates_table', 18),
(23, '2023_11_27_013418_create_candidates_table', 19),
(24, '2023_11_27_120716_create_orders_table', 19),
(25, '2023_11_29_065426_create_job_locations_table', 20),
(26, '2023_11_29_072123_create_job_types_table', 21),
(27, '2023_11_29_073845_create_job_experiences', 22),
(28, '2023_11_29_075258_create_job_experiences_table', 23),
(29, '2023_11_29_081515_create_job_genders_table', 24),
(30, '2023_11_29_082651_create_job_genders_table', 25),
(31, '2023_11_29_084330_create_job_salary_ranges_table', 26),
(32, '2023_12_01_122959_create_company_locations_table', 27),
(33, '2023_12_01_140152_create_company_industries_table', 28),
(34, '2023_12_01_142104_create_company_sizes_table', 29),
(35, '2023_12_03_034752_create_company_photos_table', 30),
(36, '2023_12_05_042243_create_company_videos_table', 31),
(37, '2023_12_06_135903_create_jobs_table', 32),
(38, '2023_12_08_024244_create_candidate_educations_table', 33),
(39, '2023_12_08_031900_create_candidate_educations_table', 34),
(40, '2023_12_08_041225_create_candidate_skills_table', 35),
(41, '2023_12_08_043818_create_candidate_experiences_table', 36),
(42, '2023_12_08_054945_create_candidate_awards_table', 37),
(43, '2023_12_08_133816_create_candidate_resumes_table', 38),
(44, '2023_12_14_031823_create_candidate_bookmarks_table', 39),
(45, '2023_12_14_123223_create_candidate_applications_table', 40),
(46, '2023_12_15_073436_create_advertisements_table', 41),
(47, '2023_12_17_023643_create_banners_table', 42),
(48, '2023_12_18_030316_create_subcribers_table', 43),
(49, '2023_12_18_033149_create_subscribers_table', 44),
(50, '2023_12_19_040750_create_settings_table', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `package_id` int NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currently_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company_id`, `package_id`, `order_no`, `paid_amount`, `payment_method`, `start_date`, `expire_date`, `currently_active`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '1701187484', '19', 'Paypal', '2023-11-28', '2023-12-05', 0, '2023-11-28 09:04:44', '2023-11-28 20:25:15'),
(2, 5, 2, '1701187896', '29', 'Paypal', '2023-11-28', '2023-12-28', 0, '2023-11-28 09:11:36', '2023-11-28 20:25:15'),
(4, 5, 3, '1701228315', '49', 'Stripe', '2023-11-29', '2024-01-11', 1, '2023-11-28 20:25:15', '2023-11-28 20:25:15'),
(5, 7, 2, '1702387555', '29', 'Stripe', '2023-12-12', '2024-01-11', 1, '2023-12-12 06:25:55', '2023-12-12 06:25:55'),
(6, 8, 2, '1702388111', '29', 'Stripe', '2023-12-12', '2024-01-11', 1, '2023-12-12 06:35:11', '2023-12-12 06:35:11'),
(7, 9, 2, '1702388811', '29', 'Stripe', '2023-12-12', '2024-01-11', 1, '2023-12-12 06:46:51', '2023-12-12 06:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `package_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` smallint NOT NULL,
  `package_days` smallint NOT NULL,
  `package_display_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_allowed_jobs` tinyint NOT NULL,
  `total_allowed_featured_jobs` tinyint NOT NULL,
  `total_allowed_photos` tinyint NOT NULL,
  `total_allowed_videos` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_price`, `package_days`, `package_display_time`, `total_allowed_jobs`, `total_allowed_featured_jobs`, `total_allowed_photos`, `total_allowed_videos`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 19, 7, '1 Week', 5, 0, 0, 0, '2023-11-23 20:19:18', '2023-11-23 20:30:57'),
(2, 'Standard', 29, 30, '1 Month', 5, 2, 2, 2, '2023-11-23 20:20:20', '2023-11-23 20:20:20'),
(3, 'Gold', 49, 90, '3 Months', -1, 15, 10, 10, '2023-11-23 20:23:45', '2023-11-23 20:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `page_blog_items`
--

CREATE TABLE `page_blog_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blog_items`
--

INSERT INTO `page_blog_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', 'Blog', 'Blog', NULL, '2023-11-20 21:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_contact_items`
--

CREATE TABLE `page_contact_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contact_items`
--

INSERT INTO `page_contact_items` (`id`, `heading`, `map_code`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1815306937633!2d106.70099137465567!3d10.797404589352618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f315d625c89%3A0x73084dd08a9fe5a4!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gVMOgaSBjaMOtbmggVFAuSENNIChVRUYpIC0gQ8ahIHPhu58gMTQx!5e0!3m2!1svi!2s!4v1700657920556!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Contact', 'Contact', NULL, '2023-11-22 06:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `page_faq_items`
--

CREATE TABLE `page_faq_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_faq_items`
--

INSERT INTO `page_faq_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Freequently Asked Questions (FAQ)', 'FAQ', 'FAQ', NULL, '2023-11-20 21:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_items`
--

CREATE TABLE `page_home_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `job_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category_subheading` text COLLATE utf8mb4_unicode_ci,
  `job_category_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_subheading` text COLLATE utf8mb4_unicode_ci,
  `why_choose_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_job_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_job_subheading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_job_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_subheading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_home_items`
--

INSERT INTO `page_home_items` (`id`, `heading`, `text`, `job_title`, `job_category`, `job_location`, `search`, `background`, `job_category_heading`, `job_category_subheading`, `job_category_status`, `why_choose_heading`, `why_choose_subheading`, `why_choose_status`, `why_choose_background`, `featured_job_heading`, `featured_job_subheading`, `featured_job_status`, `testimonial_heading`, `testimonial_background`, `testimonial_status`, `blog_heading`, `blog_subheading`, `blog_status`, `title`, `meta_discription`, `created_at`, `updated_at`) VALUES
(1, 'Find Your Desired Job', 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.', 'Job Title', 'Job Category', 'Job Location', 'Search', 'banner_home.jpg', 'Job Categories', 'Get the list of all the popular job categories here', 'Show', 'Why Choose Us', 'Our Methods to help you build your career in future', 'Show', 'why_choose_home.jpg', 'Featured Jobs', 'Find the awesome jobs that matches your skill', 'Show', 'Our Happy Clients', 'testimonial_home.jpg', 'Show', 'Latest News', 'Check our latest news from the following section', 'Show', 'JobHunt - A Complete Job Directory Website', 'JobHunt - A Complete Job Directory Website', NULL, '2023-11-24 00:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `page_job_category_items`
--

CREATE TABLE `page_job_category_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_job_category_items`
--

INSERT INTO `page_job_category_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Job Categories', 'Job Categories', 'Job Categories', NULL, '2023-11-22 07:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `page_other_items`
--

CREATE TABLE `page_other_items` (
  `id` bigint UNSIGNED NOT NULL,
  `login_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_page_title` text COLLATE utf8mb4_unicode_ci,
  `login_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `signup_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signup_page_title` text COLLATE utf8mb4_unicode_ci,
  `signup_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `forget_password_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forget_password_page_title` text COLLATE utf8mb4_unicode_ci,
  `forget_password_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `company_listing_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_page_title` text COLLATE utf8mb4_unicode_ci,
  `company_listing_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `job_listing_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_listing_page_title` text COLLATE utf8mb4_unicode_ci,
  `job_listing_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_other_items`
--

INSERT INTO `page_other_items` (`id`, `login_page_heading`, `login_page_title`, `login_page_meta_description`, `signup_page_heading`, `signup_page_title`, `signup_page_meta_description`, `forget_password_page_heading`, `forget_password_page_title`, `forget_password_page_meta_description`, `company_listing_page_heading`, `company_listing_page_title`, `company_listing_page_meta_description`, `job_listing_page_heading`, `job_listing_page_title`, `job_listing_page_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Login', 'Login', 'Login', 'Create Account', 'Signup', 'Signup', 'Forget Password', 'Forget Password', 'Forget Password', 'Company Listing', 'Company Listing', 'Company Listing', 'Job Listing', 'Job Listing', 'Job Listing', NULL, '2023-12-18 20:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `page_pricing_items`
--

CREATE TABLE `page_pricing_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_pricing_items`
--

INSERT INTO `page_pricing_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', 'Pricing', 'Pricing', NULL, '2023-11-24 00:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `page_privacy_items`
--

CREATE TABLE `page_privacy_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_privacy_items`
--

INSERT INTO `page_privacy_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed lectus vestibulum mattis. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Lorem mollis aliquam ut porttitor leo a diam sollicitudin. Quis enim lobortis scelerisque fermentum dui faucibus in. Vel fringilla est ullamcorper eget nulla. Eu sem integer vitae justo eget magna fermentum iaculis eu. Ipsum a arcu cursus vitae congue mauris rhoncus. Pharetra convallis posuere morbi leo urna molestie at elementum. Ut sem viverra aliquet eget sit amet tellus cras. Id diam maecenas ultricies mi eget mauris pharetra et ultrices. Aliquam faucibus purus in massa tempor nec. Dolor morbi non arcu risus quis varius quam quisque id.</p>\r\n<p>Ultricies leo integer malesuada nunc vel risus commodo viverra maecenas. Id diam maecenas ultricies mi eget mauris. Ultrices in iaculis nunc sed augue. Aliquet lectus proin nibh nisl condimentum id venenatis a. Mattis rhoncus urna neque viverra justo nec ultrices dui sapien. Pharetra et ultrices neque ornare aenean euismod. Sem integer vitae justo eget magna fermentum iaculis eu non. Interdum velit laoreet id donec ultrices tincidunt arcu. Eget nunc lobortis mattis aliquam faucibus purus in. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Sed felis eget velit aliquet sagittis. Malesuada proin libero nunc consequat interdum varius sit amet. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla.</p>\r\n<p>Id neque aliquam vestibulum morbi blandit. Eros donec ac odio tempor orci dapibus. Sociis natoque penatibus et magnis dis parturient montes. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec. Gravida neque convallis a cras semper auctor neque. Eget mauris pharetra et ultrices neque. At risus viverra adipiscing at. Nec nam aliquam sem et tortor consequat id porta. Turpis nunc eget lorem dolor sed viverra ipsum nunc aliquet.</p>\r\n<p>Rhoncus mattis rhoncus urna neque viverra justo nec ultrices dui. In fermentum posuere urna nec. Lectus mauris ultrices eros in cursus turpis massa. Ipsum a arcu cursus vitae. Neque sodales ut etiam sit amet nisl. Vel pretium lectus quam id leo. Nisl nisi scelerisque eu ultrices vitae auctor. A iaculis at erat pellentesque adipiscing. Tellus mauris a diam maecenas sed enim ut sem. Maecenas sed enim ut sem. Elementum facilisis leo vel fringilla est ullamcorper eget nulla. Porttitor rhoncus dolor purus non. Hac habitasse platea dictumst vestibulum rhoncus. Nisl tincidunt eget nullam non. Eu non diam phasellus vestibulum.</p>', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet', NULL, '2023-11-21 00:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `page_term_items`
--

CREATE TABLE `page_term_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_term_items`
--

INSERT INTO `page_term_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Aenean et tortor at risus viverra adipiscing at. Neque laoreet suspendisse interdum consectetur libero id. Feugiat scelerisque varius morbi enim nunc. Malesuada fames ac turpis egestas. Nam at lectus urna duis. Eu consequat ac felis donec et odio pellentesque. Sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Eu turpis egestas pretium aenean. Leo a diam sollicitudin tempor. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus.</p>\r\n<p>Habitant morbi tristique senectus et netus et malesuada fames. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu odio ut sem nulla. Feugiat sed lectus vestibulum mattis ullamcorper velit sed. Amet nisl purus in mollis nunc sed. Sed nisi lacus sed viverra tellus. Dui sapien eget mi proin sed. Ipsum a arcu cursus vitae congue. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Quis auctor elit sed vulputate mi sit amet mauris. Tortor at auctor urna nunc id cursus. Fermentum leo vel orci porta non. Euismod lacinia at quis risus sed vulputate odio. Consequat nisl vel pretium lectus quam id leo. Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius. Diam quam nulla porttitor massa. Lorem ipsum dolor sit amet consectetur adipiscing elit. Nullam eget felis eget nunc.</p>\r\n<p>Tellus at urna condimentum mattis pellentesque id nibh tortor id. A cras semper auctor neque vitae tempus quam. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor. Dis parturient montes nascetur ridiculus. Phasellus egestas tellus rutrum tellus. Est lorem ipsum dolor sit. Elementum curabitur vitae nunc sed velit dignissim sodales. Pharetra convallis posuere morbi leo urna molestie at. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. At auctor urna nunc id cursus metus aliquam. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Auctor elit sed vulputate mi. Vestibulum lorem sed risus ultricies tristique. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Sed egestas egestas fringilla phasellus. Turpis in eu mi bibendum neque.</p>\r\n<p>Venenatis lects magna fringilla urna porttitor rhoncus. Facilisis volutpat est velit egestas dui. Pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Euismod quis viverra nibh cras. In eu mi bibendum neque egestas congue quisque. Pellentesque adipiscing commodo elit at imperdiet. Pulvinar mattis nunc sed blandit libero. Arcu cursus euismod quis viverra nibh cras pulvinar. Amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Nascetur ridiculus mus mauris vitae ultricies. Dignissim diam quis enim lobortis scelerisque fermentum dui. Mi sit amet mauris commodo quis imperdiet massa tincidunt nunc. Nisl suscipit adipiscing bibendum est ultricies. Et netus et malesuada fames ac turpis egestas. Augue mauris augue neque gravida in fermentum et. Faucibus ornare suspendisse sed nisi lacus. Enim neque volutpat ac tincidunt. Mauris sit amet massa vitae tortor condimentum lacinia. Odio aenean sed adipiscing diam.</p>\r\n<p>Ipsum suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Id diam vel quam elementum pulvinar etiam non. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit. Nulla aliquet enim tortor at auctor urna nunc id cursus. Blandit aliquam etiam erat velit scelerisque in dictum. Faucibus turpis in eu mi. Sagittis vitae et leo duis ut. Id donec ultrices tincidunt arcu non sodales neque. Maecenas sed enim ut sem viverra aliquet. Phasellus vestibulum lorem sed risus ultricies tristique nulla. Amet consectetur adipiscing elit duis tristique. A arcu cursus vitae congue. Tortor id aliquet lectus proin nibh nisl condimentum. Sit amet consectetur adipiscing elit ut aliquam purus. Mollis aliquam ut porttitor leo a diam. Interdum varius sit amet mattis vulputate. Elementum facilisis leo vel fringilla est ullamcorper eget nulla.</p>', 'Terms', 'Terms', NULL, '2023-11-20 23:09:59');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `heading`, `slug`, `short_description`, `description`, `total_view`, `photo`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'urna nunc id cursus metus', 'urna-nunc-id', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc congue nisi vitae suscipit tellus mauris a. Sit amet purus gravida quis. Sed turpis tincidunt id aliquet risus feugiat. Sodales ut etiam sit amet nisl purus in.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi morbi tempus iaculis urna id. Nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Nec tincidunt praesent semper feugiat nibh sed pulvinar. Vitae auctor eu augue ut lectus arcu bibendum at varius. Sed enim ut sem viverra. Velit sed ullamcorper morbi tincidunt. Sit amet porttitor eget dolor morbi non arcu risus quis. Quisque id diam vel quam elementum pulvinar etiam non. Aliquet lectus proin nibh nisl condimentum.</p>\r\n<p>&nbsp;</p>\r\n<p>Malesuada pellentesque elit eget gravida. Sagittis orci a scelerisque purus semper eget duis. Nunc consequat interdum varius sit. Ut sem viverra aliquet eget sit amet tellus cras. Amet nulla facilisi morbi tempus iaculis urna. Ut aliquam purus sit amet luctus venenatis lectus magna. Scelerisque purus semper eget duis at. Arcu cursus vitae congue mauris. Purus in massa tempor nec feugiat nisl pretium. Quis lectus nulla at volutpat. Vel pretium lectus quam id leo in vitae turpis massa. Nulla aliquet porttitor lacus luctus. Odio ut enim blandit volutpat maecenas volutpat blandit aliquam. Massa id neque aliquam vestibulum morbi blandit. Sodales ut etiam sit amet nisl purus in mollis nunc. Proin fermentum leo vel orci porta non pulvinar. Purus in massa tempor nec feugiat nisl pretium fusce.</p>', 2, 'post_1700488665.jpg', 'urna nunc id cursus metus', 'urna nunc id cursus metus', '2023-11-20 06:57:45', '2023-11-20 22:23:22'),
(2, 'mauris augue neque', 'mauris-augue-neque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque massa placerat duis ultricies lacus sed. Est lorem ipsum dolor sit amet consectetur.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et molestie. Aliquet nibh praesent tristique magna sit amet purus. Etiam sit amet nisl purus in mollis nunc sed id. Mauris nunc congue nisi vitae suscipit tellus mauris a. Lacus vel facilisis volutpat est velit egestas dui. Duis convallis convallis tellus id interdum velit laoreet id donec. Leo integer malesuada nunc vel risus commodo. Blandit volutpat maecenas volutpat blandit aliquam etiam. Lacus viverra vitae congue eu consequat ac felis donec. Porttitor eget dolor morbi non arcu risus quis. Dui id ornare arcu odio ut sem nulla pharetra diam. Et leo duis ut diam. Enim sit amet venenatis urna cursus. Mattis molestie a iaculis at erat pellentesque. Bibendum enim facilisis gravida neque.</p>\r\n<p>&nbsp;</p>\r\n<p>Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Sit amet consectetur adipiscing elit pellentesque habitant morbi. Sit amet facilisis magna etiam tempor orci. Diam volutpat commodo sed egestas. Massa ultricies mi quis hendrerit dolor. Sem nulla pharetra diam sit amet nisl suscipit. Urna neque viverra justo nec ultrices dui sapien eget. Erat velit scelerisque in dictum non consectetur a erat nam. Non enim praesent elementum facilisis leo vel fringilla est ullamcorper. Proin sed libero enim sed faucibus turpis in.</p>', 2, 'post_1700488867.jpg', 'mauris augue neque', 'mauris augue neque', '2023-11-20 07:01:07', '2023-12-12 06:55:03'),
(3, 'et netus et malesuada fames', 'et-netus-et-malesuada-fames', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id velit ut tortor pretium viverra suspendisse potenti nullam ac. Eget nunc scelerisque viverra mauris.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nec tincidunt praesent semper feugiat. Integer malesuada nunc vel risus commodo viverra. Duis tristique sollicitudin nibh sit amet. Tincidunt lobortis feugiat vivamus at. Ac tincidunt vitae semper quis lectus nulla at. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Duis ut diam quam nulla porttitor massa id neque aliquam. Penatibus et magnis dis parturient montes nascetur. Cras adipiscing enim eu turpis egestas. Netus et malesuada fames ac. In eu mi bibendum neque. Sed viverra ipsum nunc aliquet bibendum enim. Eu volutpat odio facilisis mauris sit amet massa vitae tortor. Ullamcorper eget nulla facilisi etiam dignissim diam quis enim lobortis. Viverra vitae congue eu consequat. Lorem ipsum dolor sit amet consectetur adipiscing.</p>\r\n<p>&nbsp;</p>\r\n<p>Interdum posuere lorem ipsum dolor sit amet consectetur. Nisl nunc mi ipsum faucibus vitae. Mi in nulla posuere sollicitudin. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque eu. Nunc vel risus commodo viverra maecenas accumsan lacus. Massa sed elementum tempus egestas sed. Tortor dignissim convallis aenean et tortor at risus viverra adipiscing. Neque aliquam vestibulum morbi blandit cursus risus at ultrices. Consectetur purus ut faucibus pulvinar elementum integer enim. Scelerisque viverra mauris in aliquam sem fringilla ut morbi tincidunt. Amet venenatis urna cursus eget nunc. Sit amet dictum sit amet justo donec enim. Euismod nisi porta lorem mollis. Pellentesque elit ullamcorper dignissim cras tincidunt. A diam maecenas sed enim. Tincidunt dui ut ornare lectus. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum.</p>', 0, 'post_1700488940.jpg', 'et netus et malesuada fames', 'et netus et malesuada fames', '2023-11-20 07:02:20', '2023-11-20 22:23:36'),
(4, 'quisque sagittis purus sit amet', 'quisque-sagittis-purus-sit-amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non arcu risus quis varius quam quisque id. In massa tempor nec feugiat nisl. Neque sodales ut etiam sit amet nisl purus in mollis. Neque aliquam vestibulum morbi blandit cursus risus at ultrices mi.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl vel pretium lectus quam id. Senectus et netus et malesuada fames ac turpis egestas. Nulla aliquet enim tortor at auctor. Cras sed felis eget velit aliquet sagittis. Integer eget aliquet nibh praesent tristique magna sit amet. Auctor elit sed vulputate mi sit amet mauris. Sodales ut eu sem integer vitae justo eget magna. Est ultricies integer quis auctor elit. Convallis posuere morbi leo urna molestie. Quis commodo odio aenean sed adipiscing diam. Consectetur lorem donec massa sapien faucibus et molestie. Velit scelerisque in dictum non consectetur. Platea dictumst vestibulum rhoncus est. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Augue ut lectus arcu bibendum. Sed turpis tincidunt id aliquet risus. Fermentum iaculis eu non diam phasellus vestibulum lorem.</p>\r\n<p>&nbsp;</p>\r\n<p>In metus vulputate eu scelerisque felis. Et pharetra pharetra massa massa ultricies. Augue interdum velit euismod in pellentesque. Ut morbi tincidunt augue interdum velit euismod. Et netus et malesuada fames ac turpis egestas. Sed enim ut sem viverra aliquet eget sit. Nec feugiat nisl pretium fusce id velit. Placerat in egestas erat imperdiet sed euismod nisi porta. Ac turpis egestas sed tempus urna et pharetra pharetra. Mi sit amet mauris commodo quis imperdiet massa. Nunc sed id semper risus in hendrerit gravida rutrum. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Nisl suscipit adipiscing bibendum est ultricies integer quis. Maecenas ultricies mi eget mauris. Sollicitudin tempor id eu nisl nunc mi. Orci sagittis eu volutpat odio facilisis mauris sit amet.</p>\r\n<p>&nbsp;</p>\r\n<p>Dui sapien eget mi proin sed libero. Sollicitudin nibh sit amet commodo nulla. Augue neque gravida in fermentum et sollicitudin ac orci. Lacus vestibulum sed arcu non odio euismod. Non sodales neque sodales ut etiam sit. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt id. Quisque sagittis purus sit amet volutpat. Arcu dui vivamus arcu felis bibendum ut tristique et. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum. Diam quam nulla porttitor massa id. Facilisi etiam dignissim diam quis enim. Arcu dictum varius duis at consectetur lorem.</p>', 3, 'post_1700489008.jpg', 'quisque sagittis purus sit amet', NULL, '2023-11-20 07:03:28', '2023-12-16 19:35:15'),
(5, 'nibh venenatis cras sed', 'nibh-venenatis-cras-sed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum lectus mauris ultrices eros in. Posuere morbi leo urna molestie at elementum. Elit at imperdiet dui accumsan sit amet nulla facilisi.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor at auctor urna nunc id cursus. Aliquet risus feugiat in ante metus dictum at tempor commodo. Consectetur adipiscing elit duis tristique sollicitudin nibh sit. Urna nec tincidunt praesent semper feugiat nibh. Volutpat blandit aliquam etiam erat velit scelerisque in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Nam libero justo laoreet sit amet cursus sit amet dictum. Pulvinar sapien et ligula ullamcorper. Etiam sit amet nisl purus in mollis. Auctor eu augue ut lectus arcu bibendum at varius. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Commodo sed egestas egestas fringilla phasellus faucibus. Non arcu risus quis varius quam quisque id. Orci sagittis eu volutpat odio facilisis mauris sit amet.</p>\r\n<p>&nbsp;</p>\r\n<p>Fusce id velit ut tortor. Semper auctor neque vitae tempus quam. Vitae justo eget magna fermentum iaculis. Nisl rhoncus mattis rhoncus urna neque viverra justo. Sit amet venenatis urna cursus eget nunc scelerisque viverra mauris. Sed felis eget velit aliquet sagittis id consectetur purus. Faucibus in ornare quam viverra orci sagittis eu. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Dignissim sodales ut eu sem integer vitae justo eget. Sit amet venenatis urna cursus eget. Arcu cursus euismod quis viverra nibh. Quis blandit turpis cursus in hac. Mattis vulputate enim nulla aliquet porttitor lacus. Pretium fusce id velit ut tortor pretium viverra. Non sodales neque sodales ut etiam. Mauris nunc congue nisi vitae suscipit tellus mauris. Donec ultrices tincidunt arcu non sodales neque sodales ut etiam. Est sit amet facilisis magna etiam tempor.</p>\r\n<p>&nbsp;</p>\r\n<p>Diam phasellus vestibulum lorem sed risus ultricies. Tincidunt nunc pulvinar sapien et ligula ullamcorper. Orci a scelerisque purus semper eget duis at tellus at. Feugiat nibh sed pulvinar proin gravida hendrerit lectus. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Venenatis lectus magna fringilla urna porttitor rhoncus dolor. Tincidunt id aliquet risus feugiat in ante metus dictum. Leo vel fringilla est ullamcorper. Sodales ut etiam sit amet nisl purus in. Vitae tempus quam pellentesque nec nam. Etiam sit amet nisl purus in mollis. Aliquam faucibus purus in massa tempor nec feugiat nisl. Platea dictumst quisque sagittis purus sit amet volutpat consequat mauris. Eget aliquet nibh praesent tristique magna. Viverra nam libero justo laoreet sit amet cursus. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Amet porttitor eget dolor morbi non arcu risus. Arcu ac tortor dignissim convallis aenean. Sed vulputate mi sit amet mauris commodo quis imperdiet massa.</p>', 6, 'post_1700489073.jpg', 'nibh venenatis cras sed', 'nibh venenatis cras sed', '2023-11-20 07:04:33', '2023-12-16 20:50:19'),
(6, 'tristique senectus et', 'tristique-senectus-et', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed lectus vestibulum. Egestas congue quisque egestas diam in arcu. Pulvinar etiam non quam lacus suspendisse faucibus interdum posuere.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Etiam dignissim diam quis enim lobortis. Ultricies mi eget mauris pharetra et ultrices neque. Duis at consectetur lorem donec massa sapien faucibus et. Aliquam malesuada bibendum arcu vitae elementum curabitur. Nisi vitae suscipit tellus mauris a. Morbi quis commodo odio aenean sed adipiscing diam donec. Molestie ac feugiat sed lectus vestibulum mattis. Odio eu feugiat pretium nibh ipsum consequat nisl vel. Non curabitur gravida arcu ac tortor dignissim convallis aenean. Tristique sollicitudin nibh sit amet commodo nulla facilisi. Id diam vel quam elementum pulvinar etiam non quam. Convallis aenean et tortor at. Convallis a cras semper auctor neque vitae tempus. Urna cursus eget nunc scelerisque viverra mauris in aliquam. Lorem ipsum dolor sit amet consectetur adipiscing elit. Tortor consequat id porta nibh venenatis cras. Commodo nulla facilisi nullam vehicula ipsum a.</p>\r\n<p>&nbsp;</p>\r\n<p>Sit amet venenatis urna cursus eget nunc scelerisque. Nam libero justo laoreet sit amet cursus sit amet dictum. Fames ac turpis egestas integer eget. Consequat mauris nunc congue nisi vitae suscipit tellus. Eget egestas purus viverra accumsan in nisl. Malesuada nunc vel risus commodo viverra maecenas accumsan. Libero volutpat sed cras ornare arcu dui vivamus arcu. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo integer. Gravida neque convallis a cras. Eget nunc lobortis mattis aliquam faucibus purus. Vitae suscipit tellus mauris a diam. Sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit. Ac auctor augue mauris augue neque. Senectus et netus et malesuada fames.</p>\r\n<p>&nbsp;</p>\r\n<p>Ut placerat orci nulla pellentesque dignissim enim sit amet. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Sem fringilla ut morbi tincidunt augue interdum velit euismod in. Tempus quam pellentesque nec nam aliquam. Nisl rhoncus mattis rhoncus urna. Arcu cursus euismod quis viverra nibh. Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit. Est ante in nibh mauris cursus mattis. In ornare quam viverra orci sagittis eu volutpat. Non odio euismod lacinia at quis risus sed vulputate odio. Eu scelerisque felis imperdiet proin fermentum. In tellus integer feugiat scelerisque varius. Id velit ut tortor pretium viverra suspendisse potenti nullam ac. Sagittis vitae et leo duis ut diam. Tortor at risus viverra adipiscing at in tellus integer.</p>\r\n<p>&nbsp;</p>\r\n<p>Lectus nulla at volutpat diam ut venenatis tellus. Tristique nulla aliquet enim tortor at auctor urna nunc id. Suscipit tellus mauris a diam maecenas sed enim ut. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Venenatis urna cursus eget nunc scelerisque. Sit amet commodo nulla facilisi nullam vehicula ipsum a arcu. Arcu bibendum at varius vel pharetra vel turpis nunc eget. Sed felis eget velit aliquet sagittis id consectetur purus. Quis blandit turpis cursus in hac habitasse. Magna ac placerat vestibulum lectus mauris ultrices eros. Aliquam eleifend mi in nulla posuere sollicitudin. Nec feugiat nisl pretium fusce. Tempus urna et pharetra pharetra massa massa. Id semper risus in hendrerit. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Gravida arcu ac tortor dignissim convallis aenean et tortor at. Malesuada pellentesque elit eget gravida cum sociis natoque. Tortor at auctor urna nunc id cursus metus.</p>', 4, 'post_1700489120.jpg', 'tristique senectus et', 'tristique senectus et', '2023-11-20 07:05:20', '2023-12-04 21:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_phone` text COLLATE utf8mb4_unicode_ci,
  `top_bar_email` text COLLATE utf8mb4_unicode_ci,
  `footer_phone` text COLLATE utf8mb4_unicode_ci,
  `footer_email` text COLLATE utf8mb4_unicode_ci,
  `footer_address` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `linkedin` text COLLATE utf8mb4_unicode_ci,
  `pinterest` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `copyright_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `top_bar_phone`, `top_bar_email`, `footer_phone`, `footer_email`, `footer_address`, `facebook`, `twitter`, `linkedin`, `pinterest`, `instagram`, `copyright_text`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'favicon.png', '0773000094', 'leanh0094@gmail.com', '0773000094', 'leanh0094@gmail.com', '141 Điện Biên Phủ Phường 15 Quận Bình Thạnh Thành phố Hồ Chí Minh', '##', '##', '##', '##', '##', 'Copyright 2024, LE ANH. All Rights Reserved.', NULL, '2023-12-18 21:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'leanh0094@gmail.com', '', 1, '2023-12-18 07:06:49', '2023-12-18 07:07:07'),
(2, 'anhl20@uef.edu.vn', '', 1, '2023-12-18 07:07:40', '2023-12-18 07:07:56'),
(3, 'khanh.pham@gmail.com', '', 1, '2023-12-18 07:08:07', '2023-12-18 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `photo`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Robert Krol', 'CEO, ABC Company', 'testimonial_1700462178.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis nibh et est pharetra hendrerit. Pellentesque at neque nisl. Phasellus vel elit augue. Sed quis placerat nisi. Nam congue viverra.', '2023-11-19 23:36:18', '2023-11-19 23:58:23'),
(3, 'Sal Harvey', 'Director, DEF Company', 'testimonial_1700463579.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis nibh et est pharetra hendrerit. Pellentesque at neque nisl. Phasellus vel elit augue. Sed quis placerat nisi. Nam congue viverra.', '2023-11-19 23:59:39', '2023-11-19 23:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_items`
--

CREATE TABLE `why_choose_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_items`
--

INSERT INTO `why_choose_items` (`id`, `heading`, `icon`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Quick Apply', 'fas fa-briefcase', 'You can just create your account in our website and apply for desired job very quickly.', '2023-11-19 07:56:13', '2023-11-19 08:10:56'),
(2, 'Search Tool', 'fas fa-search', 'We provide a perfect and advanced search tool for job seekers, employers or companies.', '2023-11-19 07:56:35', '2023-11-19 07:56:35'),
(3, 'Best Companies', 'fas fa-share-alt', 'The best and reputed worldwide companies registered here and so you will get the quality jobs.', '2023-11-19 07:56:55', '2023-11-19 07:56:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_applications`
--
ALTER TABLE `candidate_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_bookmarks`
--
ALTER TABLE `candidate_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_educations`
--
ALTER TABLE `candidate_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_resumes`
--
ALTER TABLE `candidate_resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_industries`
--
ALTER TABLE `company_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_locations`
--
ALTER TABLE `company_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_photos`
--
ALTER TABLE `company_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_sizes`
--
ALTER TABLE `company_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_videos`
--
ALTER TABLE `company_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_genders`
--
ALTER TABLE `job_genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_salary_ranges`
--
ALTER TABLE `job_salary_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_items`
--
ALTER TABLE `page_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_job_category_items`
--
ALTER TABLE `page_job_category_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_other_items`
--
ALTER TABLE `page_other_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_term_items`
--
ALTER TABLE `page_term_items`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `candidate_applications`
--
ALTER TABLE `candidate_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_bookmarks`
--
ALTER TABLE `candidate_bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `candidate_educations`
--
ALTER TABLE `candidate_educations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_resumes`
--
ALTER TABLE `candidate_resumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company_industries`
--
ALTER TABLE `company_industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_locations`
--
ALTER TABLE `company_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `company_photos`
--
ALTER TABLE `company_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_sizes`
--
ALTER TABLE `company_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_videos`
--
ALTER TABLE `company_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_genders`
--
ALTER TABLE `job_genders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `job_salary_ranges`
--
ALTER TABLE `job_salary_ranges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_home_items`
--
ALTER TABLE `page_home_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_job_category_items`
--
ALTER TABLE `page_job_category_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_other_items`
--
ALTER TABLE `page_other_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_term_items`
--
ALTER TABLE `page_term_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
