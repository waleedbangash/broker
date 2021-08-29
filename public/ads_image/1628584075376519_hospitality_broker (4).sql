-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 06:48 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitality_broker`
--

-- --------------------------------------------------------

--
-- Table structure for table `adding_to_bills`
--

CREATE TABLE `adding_to_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_of_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price_services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appear_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_client` bigint(20) UNSIGNED DEFAULT NULL,
  `to_provider` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chetting_on_contacts`
--

CREATE TABLE `chetting_on_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` bigint(20) DEFAULT NULL,
  `hour_time` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_text`, `read_status`, `contact_type_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'heloo i am customer', NULL, 1, 5, '2021-08-05 05:32:44', '2021-08-05 05:32:44', NULL),
(2, 'heloo i am customer', NULL, 1, 8, '2021-08-05 05:35:18', '2021-08-05 05:35:18', NULL),
(3, 'Its my 1st complaint', NULL, 2, 5, '2021-08-05 06:18:03', '2021-08-05 06:18:03', NULL),
(4, 'it\'s my 1st inquiry', NULL, 1, 8, '2021-08-05 06:19:06', '2021-08-05 06:19:06', NULL);

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
-- Table structure for table `lkp_bank_accounts`
--

CREATE TABLE `lkp_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_bank_accounts`
--

INSERT INTO `lkp_bank_accounts` (`id`, `bank_name`, `account_number`, `bank_logo`, `organization_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HBL', 'SA100002525415854', 'bank_logo/hbl.jpg', 'revorb soft', '2021-07-26 23:53:54', '2021-08-04 12:12:23', NULL),
(2, 'ABL', 'SA15252140000411541552', 'bank_logo/abl.jpg', 'cortexom innovation', '2021-07-28 06:35:08', '2021-08-04 12:13:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_constonts`
--

CREATE TABLE `lkp_constonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_constonts`
--

INSERT INTO `lkp_constonts` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'order_fee', '20', NULL, NULL),
(2, 'who_we_are', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', NULL, NULL),
(3, 'privacy_policy', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', NULL, NULL),
(4, 't_and_c', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', NULL, NULL),
(5, 'whatsapp', 'https://www.whatsapp.com/', NULL, NULL),
(6, 'google', 'https://www.google.com/', NULL, NULL),
(7, 'twitter', 'https://twitter.com/', NULL, '2021-08-05 07:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `lkp_contact_types`
--

CREATE TABLE `lkp_contact_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_contact_types`
--

INSERT INTO `lkp_contact_types` (`id`, `contact_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Inquiry', '2021-08-05 09:13:18', '2021-08-05 11:20:11', NULL),
(2, 'Complaint ', '2021-08-05 09:13:52', '2021-08-05 09:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_occation_times`
--

CREATE TABLE `lkp_occation_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_occation_times`
--

INSERT INTO `lkp_occation_times` (`id`, `occation_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Breakfast', '2021-07-26 12:18:24', '2021-07-26 12:18:24', NULL),
(2, 'Lunch', '2021-07-26 12:18:24', '2021-07-26 12:18:24', NULL),
(3, 'Dinner', '2021-07-26 12:18:36', '2021-07-26 12:18:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_order_statuses`
--

CREATE TABLE `lkp_order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_order_statuses`
--

INSERT INTO `lkp_order_statuses` (`id`, `order_status_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', '2021-07-26 12:17:29', '2021-07-26 12:17:29', NULL),
(2, 'Accepted', '2021-07-26 12:17:29', '2021-07-26 12:17:29', NULL),
(3, 'Conformation', '2021-07-26 12:17:43', '2021-08-05 04:38:58', NULL),
(4, 'Completed', '2021-08-04 07:38:31', '2021-08-05 04:39:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_services`
--

CREATE TABLE `lkp_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_services`
--

INSERT INTO `lkp_services` (`id`, `service_name`, `service_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tables', 'service_image/table_588358070_1000.jpg', '2021-07-26 12:39:30', '2021-07-26 12:42:55', NULL),
(2, 'Chairs', 'service_image/download.jpg', '2021-07-26 12:39:30', '2021-07-28 04:48:37', NULL),
(6, 'plats', 'service_image/1627472043653090_plate.jpg', '2021-07-28 06:34:03', '2021-07-28 06:34:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_user_statuses`
--

CREATE TABLE `lkp_user_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_user_statuses`
--

INSERT INTO `lkp_user_statuses` (`id`, `status_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Active', '2021-07-29 06:08:20', '2021-07-29 06:08:20', NULL),
(2, 'Forbiden', '2021-07-29 06:08:20', '2021-07-29 06:08:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_user_types`
--

CREATE TABLE `lkp_user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lkp_user_types`
--

INSERT INTO `lkp_user_types` (`id`, `type_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Customer', '2021-07-26 12:19:45', '2021-07-26 12:19:45', NULL),
(2, 'Provider', '2021-07-26 12:19:45', '2021-07-26 12:19:45', NULL),
(3, 'Admin', '2021-07-26 12:19:58', '2021-07-26 12:19:58', NULL);

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_30_070407_create_lkp_user_types_table', 1),
(10, '2021_06_30_072640_create_lkp_user_statuses_table', 1),
(11, '2021_06_30_073717_create_offers_table', 1),
(13, '2021_06_30_074846_create_offer_chettings_table', 1),
(14, '2021_06_30_075456_create_orders_table', 1),
(15, '2021_06_30_082120_create_order_evalutions_table', 1),
(16, '2021_06_30_082631_create_order_services_table', 1),
(17, '2021_06_30_083100_create_lkp_occation_times_table', 1),
(18, '2021_06_30_083407_create_lkp_order_statuses_table', 1),
(19, '2021_06_30_083937_create_lkp_services_table', 1),
(20, '2021_06_30_084614_create_announcements_table', 1),
(21, '2021_06_30_085333_create_lkp_bank_accounts_table', 1),
(22, '2021_06_30_085819_create_organization_features_table', 1),
(23, '2021_06_30_090315_create_lkp_contact_types_table', 1),
(24, '2021_06_30_090443_create_contacts_table', 1),
(25, '2021_06_30_091035_create_chetting_on_contacts_table', 1),
(26, '2021_06_30_091434_create_organization_information_table', 1),
(27, '2021_07_02_130151_relations_fields_to_users_table', 1),
(28, '2021_07_02_130632_relations_fields_to_offers_table', 1),
(30, '2021_07_02_130949_relations_fields_to_offer_chettings_table', 1),
(31, '2021_07_02_131125_relations_fields_to_orders_table', 1),
(32, '2021_07_02_131324_relations_fields_to_order_evalutions_table', 1),
(33, '2021_07_02_131438_relations_fields_to_order_services_table', 1),
(34, '2021_07_02_131546_relations_fields_to_announcements_table', 1),
(35, '2021_07_02_131704_relations_fields_to_contacts_table', 1),
(36, '2021_07_02_131756_relations_fields_to_chetting_on_contacts_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(38, '2021_06_30_074312_create_adding_to_bills_table', 3),
(39, '2021_07_02_130848_relations_fields_to_adding_to_bills_table', 3),
(41, '2021_07_28_092930_adding_fields_to_offer_chettings_table', 4),
(44, '2021_08_04_063612_create_lkp_constonts_table', 6),
(47, '2021_08_04_131333_add_fields_to_orders_table', 8),
(48, '2021_08_04_094049_create_notifications_table', 9),
(49, '2021_08_05_071736_add_fields_to_notifications_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `data`, `body`, `from_user_id`, `to_user_id`, `created_at`, `updated_at`) VALUES
(1, '02 - Muh - 1443', '{\"order_bill\":[],\"deliver_time\":\"09:00 PM\",\"id\":7,\"nots\":\"New order\",\"number_of_guest\":\"50\",\"occationdetail\":{\"id\":1,\"occation_name\":\"Breakfast\"},\"occation_id\":1,\"order_services\":[{\"id\":53,\"order_id\":7,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\",\"service_numbers\":\"10\"}},{\"id\":54,\"order_id\":7,\"service_id\":2,\"service_numbers\":\"50\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\",\"service_numbers\":\"50\"}},{\"id\":55,\"order_id\":7,\"service_id\":6,\"service_numbers\":\"50\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\",\"service_numbers\":\"50\"}}],\"order_address\":\"Service Rd, Trade Centre Commercial Area Phase 2 Johar Town, Lahore, Punjab, Pakistan\",\"order_city\":\"Lahore\",\"order_deliver_date\":\"02 - Muh - 1443\",\"order_status_id\":1,\"provider\":[{\"device_token\":\"e_j2mPRhRACy-Z4LS-h3Wb:APA91bGmVoz2dVOpJ1tf6Lk-c6FNFkD0HZgxsHTJ1165mVy24O9Bk9sH-2usXkoGv9Tx8LkaqfGz8Cym_fyuZt7r1Y1GOF1crQjhbSXKM9JlPfiMP0nSuybDLgUq9oAaqBisJ6Sq7vzM\",\"id\":8,\"name\":\"Rawaea Party Organizer\",\"offers\":[{\"id\":7,\"order_service\":{\"id\":38,\"order_id\":2,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":2,\"order_services_id\":38,\"provider_id\":8,\"total_price_services\":\"200\",\"unit_of_price\":\"20\"},{\"id\":8,\"order_service\":{\"id\":39,\"order_id\":2,\"service_id\":2,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":2,\"order_services_id\":39,\"provider_id\":8,\"total_price_services\":\"200\",\"unit_of_price\":\"20\"},{\"id\":9,\"order_service\":{\"id\":40,\"order_id\":2,\"service_id\":6,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":2,\"order_services_id\":40,\"provider_id\":8,\"total_price_services\":\"200\",\"unit_of_price\":\"20\"},{\"id\":10,\"order_service\":{\"id\":41,\"order_id\":3,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":3,\"order_services_id\":41,\"provider_id\":8,\"total_price_services\":\"200\",\"unit_of_price\":\"20\"},{\"id\":11,\"order_service\":{\"id\":42,\"order_id\":3,\"service_id\":2,\"service_numbers\":\"100\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":3,\"order_services_id\":42,\"provider_id\":8,\"total_price_services\":\"2000\",\"unit_of_price\":\"20\"},{\"id\":12,\"order_service\":{\"id\":43,\"order_id\":3,\"service_id\":6,\"service_numbers\":\"100\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":3,\"order_services_id\":43,\"provider_id\":8,\"total_price_services\":\"1000\",\"unit_of_price\":\"10\"},{\"id\":13,\"order_service\":{\"id\":44,\"order_id\":4,\"service_id\":1,\"service_numbers\":\"7\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":4,\"order_services_id\":44,\"provider_id\":8,\"total_price_services\":\"140\",\"unit_of_price\":\"20\"},{\"id\":14,\"order_service\":{\"id\":45,\"order_id\":4,\"service_id\":2,\"service_numbers\":\"55\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":4,\"order_services_id\":45,\"provider_id\":8,\"total_price_services\":\"1100\",\"unit_of_price\":\"20\"},{\"id\":15,\"order_service\":{\"id\":46,\"order_id\":4,\"service_id\":6,\"service_numbers\":\"55\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":4,\"order_services_id\":46,\"provider_id\":8,\"total_price_services\":\"550\",\"unit_of_price\":\"10\"},{\"id\":16,\"order_service\":{\"id\":47,\"order_id\":5,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":5,\"order_services_id\":47,\"provider_id\":8,\"total_price_services\":\"500\",\"unit_of_price\":\"50\"},{\"id\":17,\"order_service\":{\"id\":48,\"order_id\":5,\"service_id\":2,\"service_numbers\":\"75\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":5,\"order_services_id\":48,\"provider_id\":8,\"total_price_services\":\"1875\",\"unit_of_price\":\"25\"},{\"id\":18,\"order_service\":{\"id\":49,\"order_id\":5,\"service_id\":6,\"service_numbers\":\"75\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":5,\"order_services_id\":49,\"provider_id\":8,\"total_price_services\":\"1125\",\"unit_of_price\":\"15\"},{\"id\":19,\"order_service\":{\"id\":50,\"order_id\":6,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":6,\"order_services_id\":50,\"provider_id\":8,\"total_price_services\":\"500\",\"unit_of_price\":\"50\"},{\"id\":20,\"order_service\":{\"id\":51,\"order_id\":6,\"service_id\":2,\"service_numbers\":\"80\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":6,\"order_services_id\":51,\"provider_id\":8,\"total_price_services\":\"1600\",\"unit_of_price\":\"20\"},{\"id\":21,\"order_service\":{\"id\":52,\"order_id\":6,\"service_id\":6,\"service_numbers\":\"80\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":6,\"order_services_id\":52,\"provider_id\":8,\"total_price_services\":\"800\",\"unit_of_price\":\"10\"},{\"id\":22,\"order_service\":{\"id\":53,\"order_id\":7,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\"}},\"order_id\":7,\"order_services_id\":53,\"provider_id\":8,\"total_price_services\":\"200\",\"unit_of_price\":\"20\"},{\"id\":23,\"order_service\":{\"id\":54,\"order_id\":7,\"service_id\":2,\"service_numbers\":\"50\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\"}},\"order_id\":7,\"order_services_id\":54,\"provider_id\":8,\"total_price_services\":\"1000\",\"unit_of_price\":\"20\"},{\"id\":24,\"order_service\":{\"id\":55,\"order_id\":7,\"service_id\":6,\"service_numbers\":\"50\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\"}},\"order_id\":7,\"order_services_id\":55,\"provider_id\":8,\"total_price_services\":\"500\",\"unit_of_price\":\"10\"}],\"phone_number\":\"03056409367\"}],\"provider_id\":0}', 'Customer has buy your offer', 5, 8, '2021-08-05 02:44:44', '2021-08-05 02:44:44'),
(2, '03 - Muh - 1443', '{\"userdetail\":{\"device_token\":\"egJJjjLhRUuXTa7em0BRAW:APA91bEbZVCENoVhsDHvUjJEasUPi-6shPAUGf67ItONEUqPetSSZ2UFtwrWjhZ13CpEJiSeHqilDiGD1zEGYK8sZSnawQIH86XTL2JMPTvXPEtfMonPI1dmx6EdXCfUCOuHyCq5xkf9\",\"id\":5,\"name\":\"Customer\",\"phone_number\":\"03056409368\"},\"deliver_time\":\"03:00 PM\",\"id\":8,\"nots\":\"New order\",\"number_of_guest\":\"50\",\"occationdetail\":{\"id\":2,\"occation_name\":\"Lunch\"},\"occation_id\":2,\"offers\":[],\"order_services\":[{\"id\":56,\"order_id\":8,\"service_id\":1,\"service_numbers\":\"10\",\"lkpservices\":{\"id\":1,\"service_picture\":\"service_image/table_588358070_1000.jpg\",\"service_name\":\"Tables\",\"service_numbers\":\"10\",\"total_price\":\"200\",\"unit_price\":\"20\"}},{\"id\":57,\"order_id\":8,\"service_id\":2,\"service_numbers\":\"60\",\"lkpservices\":{\"id\":2,\"service_picture\":\"service_image/download.jpg\",\"service_name\":\"Chairs\",\"service_numbers\":\"60\",\"total_price\":\"1200\",\"unit_price\":\"20\"}},{\"id\":58,\"order_id\":8,\"service_id\":6,\"service_numbers\":\"60\",\"lkpservices\":{\"id\":6,\"service_picture\":\"service_image/1627472043653090_plate.jpg\",\"service_name\":\"plats\",\"service_numbers\":\"60\",\"total_price\":\"600\",\"unit_price\":\"10\"}}],\"order_address\":\"Abdul Sattar Edhi Rd, Shabbir Town, Lahore, Punjab, Pakistan\",\"order_city\":\"Lahore\",\"order_deliver_date\":\"03 - Muh - 1443\",\"order_status_id\":1,\"provider_id\":0}', 'Rawaea Party Organizer has sent you offer', 8, 5, '2021-08-05 03:41:54', '2021-08-05 03:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02874ed2837b6490d7a2af34657f327bd63dc0135bbef0d35144287571c559818886781f4ae9ef8f', 5, 1, 'Token Name', '[]', 0, '2021-08-04 23:59:56', '2021-08-04 23:59:56', '2022-08-05 04:59:56'),
('0439a9f1034eb5168ab6fb9e210c3aa5b6ecfe52f544c7515b38408123c89cc08f0183650c635362', 8, 1, 'Token Name', '[]', 0, '2021-08-05 02:24:20', '2021-08-05 02:24:20', '2022-08-05 07:24:20'),
('04c1c156b8b774016e543c96bf0e905209dfd95eebf12d2661860cab0e3ef3d80de6388e916eaced', 5, 1, 'Token Name', '[]', 0, '2021-07-29 01:21:31', '2021-07-29 01:21:31', '2022-07-29 06:21:31'),
('0602851c3eaa77bea6bd8cd7cf54c955526fd52b925b6c7f51d80995720c087cafc429019f67c9e8', 8, 1, 'Token Name', '[]', 0, '2021-07-27 23:46:37', '2021-07-27 23:46:37', '2022-07-28 04:46:37'),
('0c88aa1cdaf1a0d5b731fcf84750d12845c79d90c15e9d6eaca8ef8b265d321deec73b7b78c5e539', 5, 1, 'Token Name', '[]', 0, '2021-08-05 05:38:37', '2021-08-05 05:38:37', '2022-08-05 10:38:37'),
('0d5423637c44e26052451e8f073b36247a77107f7422c63f0f82e0a35bf9b89eb6d4f1f6ee62fa50', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:46', '2021-07-28 05:55:46', '2022-07-28 10:55:46'),
('122e9e19f260ffa22b9f84b3fb860b799515dcc351f4827e3d26eb1cbf4fadb17111267db57a510e', 8, 1, 'Token Name', '[]', 0, '2021-08-04 05:14:32', '2021-08-04 05:14:32', '2022-08-04 10:14:32'),
('14a7b487e1273c6d9f35c80ddf8907294f1f0fe8303912044ec799c4c62a8c2e4d7e7bf80c58eba2', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:55', '2021-07-28 05:55:55', '2022-07-28 10:55:55'),
('176c4953c939e8578fd1e88f9d59c9fb848a9d15e142bce7af34226280125229765f023d4a552e3a', 5, 1, 'Token Name', '[]', 0, '2021-08-05 05:34:43', '2021-08-05 05:34:43', '2022-08-05 10:34:43'),
('1bae47c4fceee93c7dd77a0429e51f9b671151d362f16898da990e8cd460e8aa87f306e681acc7b0', 5, 1, 'Token Name', '[]', 0, '2021-08-04 00:03:50', '2021-08-04 00:03:50', '2022-08-04 05:03:50'),
('1d87da02812e7ae29e3550c5dc4c86a050b9fac702fb143f82b9286e12a592845bca1fd9e0324283', 8, 1, 'Token Name', '[]', 0, '2021-08-05 06:18:24', '2021-08-05 06:18:24', '2022-08-05 11:18:24'),
('1dbafb11bf034a19a434903c6ec3fec5e1c52a6d2e06f53c2ad69073c900600d5c5e4224f201c8b4', 9, 1, 'Token Name', '[]', 0, '2021-08-05 04:21:18', '2021-08-05 04:21:18', '2022-08-05 09:21:18'),
('211955c367b1eef4eab816b1ca63ee33ffaf4cdf7ec4dd69d4327433065e987ed9cc8feb1d0a46c8', 8, 1, 'Token Name', '[]', 0, '2021-08-05 03:09:32', '2021-08-05 03:09:32', '2022-08-05 08:09:32'),
('24edf3b0c2e190d595fd6abc803fa4e32a7bfe9d453bab71625e21df336ff7bc895fe59c90f71028', 8, 1, 'Token Name', '[]', 0, '2021-08-05 04:17:18', '2021-08-05 04:17:18', '2022-08-05 09:17:18'),
('2653c87cdc9c4039d0eb68e59701d501dc3564be3b5de237b17112e899dbab4bd4c4d805b81dad69', 9, 1, 'Token Name', '[]', 0, '2021-08-05 05:07:05', '2021-08-05 05:07:05', '2022-08-05 10:07:05'),
('31b0ee5df448cb9c57a1a0b5fb87fd38b67cb0cfaf69f5f3868dbef42149898a921dbe8fee79b61f', 8, 1, 'Token Name', '[]', 0, '2021-07-28 03:53:40', '2021-07-28 03:53:40', '2022-07-28 08:53:40'),
('371c15b77eedae4c518c0893e4aaea3b2818c18f45e527ad28ccc090a1007fd1e88f83f48104d5a3', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:22', '2021-07-28 05:51:22', '2022-07-28 10:51:22'),
('38eb74d4256b849c7018efe03fe1e6a99b229b7761f37134db2271ee97baf62e358f278c3d7e3ca3', 5, 1, 'Token Name', '[]', 0, '2021-08-04 00:03:50', '2021-08-04 00:03:50', '2022-08-04 05:03:50'),
('395fad32fdae4ee797bf9210e84340a50128469712f1a7439d9bd6e42a510b85911aecdc424a3e3e', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:51', '2021-07-28 05:55:51', '2022-07-28 10:55:51'),
('3b29388f11bec3ed20f3aa9f20b972f289a5aef0cfe130d70aa42183a6705d84b8cbdd5854f3fe59', 5, 1, 'Token Name', '[]', 0, '2021-07-30 05:04:42', '2021-07-30 05:04:42', '2022-07-30 10:04:42'),
('3bc614c9a714795477d510b7eb496b99f5e073173c98ed74caa954f35923d163c83be0a2748119e0', 9, 1, 'Token Name', '[]', 0, '2021-08-05 04:21:34', '2021-08-05 04:21:34', '2022-08-05 09:21:34'),
('3fa452e0f99571880d06c6b99b3334629d3fa818aab79df73266d8ab918d6b5414333644fc8d116d', 3, 1, 'Token Name', '[]', 0, '2021-07-26 07:48:13', '2021-07-26 07:48:13', '2022-07-26 12:48:13'),
('4028751541c295ccc64f100a12bec1c303fb3099068b14364591d58a82b9813dac7548e550b56123', 8, 1, 'Token Name', '[]', 0, '2021-08-04 05:14:19', '2021-08-04 05:14:19', '2022-08-04 10:14:19'),
('4047271c02f04efd5fe632bf464311542dfb195b6c039c8b3ab0177b8bccda08aac34cfe1c8b3aa9', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:26', '2021-07-28 05:51:26', '2022-07-28 10:51:26'),
('41199a2ffe2c36ff9ffd2415effc3bc390ea71a3df17400db27c788c5c21fd11960590a7a8710f18', 5, 1, 'Token Name', '[]', 0, '2021-07-30 01:10:19', '2021-07-30 01:10:19', '2022-07-30 06:10:19'),
('4561c6708fbd8e76e54c17cbeef7fef152a10c4d9cd803006b306304ba7aabd084926b9f323828d2', 5, 1, 'Token Name', '[]', 0, '2021-07-27 23:30:59', '2021-07-27 23:30:59', '2022-07-28 04:30:59'),
('4f54837372c2d28c5d80d9a87009fd5458abbf08a9a3160bf03e170ce22bf01e610efea67a0c9791', 8, 1, 'Token Name', '[]', 0, '2021-08-05 04:21:10', '2021-08-05 04:21:10', '2022-08-05 09:21:10'),
('58b9a9cc3108872931e4c502f7c0447e5acdcd761d9bfc40d203326d8fba6e82af3aa1451c23033b', 9, 1, 'Token Name', '[]', 0, '2021-08-04 02:45:11', '2021-08-04 02:45:11', '2022-08-04 07:45:11'),
('5dc890bbc4b83c23e428e052609566fd2a62a3262c72c49c5dc16695707e60fcc57f4383ce514339', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:49', '2021-07-28 05:55:49', '2022-07-28 10:55:49'),
('629d836f9d6283ae22e9fecadc808ddd24d1c0b910706fa6c6677529aba0b5a3603567c16dcb78aa', 8, 1, 'Token Name', '[]', 0, '2021-08-05 06:21:06', '2021-08-05 06:21:06', '2022-08-05 11:21:06'),
('638d083664140d53c358285f0e18336ce526c9147735b6f96649e6fd4a05c74f4a66cf6d09e29344', 8, 1, 'Token Name', '[]', 0, '2021-07-30 01:30:16', '2021-07-30 01:30:16', '2022-07-30 06:30:16'),
('665676a079760faf6cf1b686e91e93c6b6c75310292a0e32901d51a76808fa6c74fe65fcbcdf14f3', 8, 1, 'Token Name', '[]', 0, '2021-08-04 07:10:58', '2021-08-04 07:10:58', '2022-08-04 12:10:58'),
('6828ae708297bcd9c7eac3e9ba14fd8f2886d7486f2ac37ab84cb679091b957aa670364339375f16', 5, 1, 'Token Name', '[]', 0, '2021-07-28 06:08:57', '2021-07-28 06:08:57', '2022-07-28 11:08:57'),
('696f2cca4132d950cead375df3e969eafff77dfa49bacd079fddb0c2b9b93ac30bf0d364f5a4a9e1', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:48', '2021-07-28 05:55:48', '2022-07-28 10:55:48'),
('698d852c57b910a2e51436790ba6eb002d8871e0953acedecaf12574b3f45a8f62dfd227ac5f457c', 8, 1, 'Token Name', '[]', 0, '2021-08-04 04:27:30', '2021-08-04 04:27:30', '2022-08-04 09:27:30'),
('6b9cd625be46d551f2b78c099a4803616319b7e9bbfac0bdb8f90a3562bbc12838495aa7735a749d', 5, 1, 'Token Name', '[]', 0, '2021-07-28 06:29:32', '2021-07-28 06:29:32', '2022-07-28 11:29:32'),
('6ca1e61e40f39d0c2610971ed7cf7748c263a133e8c67e6f0620c2d10b1473e6a2b8147d259af779', 8, 1, 'Token Name', '[]', 0, '2021-08-05 04:23:34', '2021-08-05 04:23:34', '2022-08-05 09:23:34'),
('6cb7b02118b9c9eb5c4fcc1c050b8a9c6d5b505f6f82441e4f39646bcf1c6a33c80423740c70c98e', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:57', '2021-07-28 05:55:57', '2022-07-28 10:55:57'),
('7106e3bed96cafe4b3bb01853e6a71fba8707c26d99cde7dfa8c048e5c9d94cc262f4e70967b06e6', 8, 1, 'Token Name', '[]', 0, '2021-08-05 06:10:17', '2021-08-05 06:10:17', '2022-08-05 11:10:17'),
('724fbaddd5ce68644c372c06046c96158017a9e080123bbf2efefd72492e449e772602412d32cf08', 8, 1, 'Token Name', '[]', 0, '2021-08-04 05:14:19', '2021-08-04 05:14:19', '2022-08-04 10:14:19'),
('72a6a0abb85039d378a3271917d264fe50b273da457eb89a98bf413b85de7c219929e0a8be4fdfc5', 8, 1, 'Token Name', '[]', 0, '2021-07-30 01:11:40', '2021-07-30 01:11:40', '2022-07-30 06:11:40'),
('74d09026abc15623645c89d530bb0c9d835df3a2bbae0510fdf5e971c6600d897ceff618718296e9', 5, 1, 'Token Name', '[]', 0, '2021-08-05 06:21:35', '2021-08-05 06:21:35', '2022-08-05 11:21:35'),
('74e540b06195ffa23d4a4d8c761be7c4fd7782146c57ce3f492b6c801a61f0a25d291bb4ffbaf8a4', 8, 1, 'Token Name', '[]', 0, '2021-08-04 07:13:55', '2021-08-04 07:13:55', '2022-08-04 12:13:55'),
('759b41bdb51490b4503822d340ee6570c0cf8e2792684e826b671df08f477ee161a976865c21c2e9', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:54', '2021-07-28 05:55:54', '2022-07-28 10:55:54'),
('7918e06d54b0119cfeeff42c01ebbb742289a79d26650d54c283527dc614abfb46bbcdcc85f5e701', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:21', '2021-07-28 05:51:21', '2022-07-28 10:51:21'),
('80a095f6a886a0bbd043349125d6c732b4aa3c154037dfe88d494632dfe45f813206485572d701ef', 5, 1, 'Token Name', '[]', 0, '2021-08-05 05:40:04', '2021-08-05 05:40:04', '2022-08-05 10:40:04'),
('81b757470638ec0f7eb6f925192a865b404d503bde38f5add720d06f26a557952a355066e68cd68d', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:23', '2021-07-28 05:51:23', '2022-07-28 10:51:23'),
('84bd3e7828c2d5bafded8d8b7e50901d0065e5004d14dd96b0ec8a5d40ac2b5737a339bb45d05ecf', 5, 1, 'Token Name', '[]', 0, '2021-08-04 03:16:41', '2021-08-04 03:16:41', '2022-08-04 08:16:41'),
('8985beda02286854002a309d434e01a9ef6bb3f831f7caeee7a5c973a57e9bb9837aac3f92918821', 5, 1, 'Token Name', '[]', 0, '2021-07-27 23:47:30', '2021-07-27 23:47:30', '2022-07-28 04:47:30'),
('8c412f8e2f6557f3da01d3b39b48685fae1db089080cc0e62aa48daa465fd12249371096f64a0f22', 5, 1, 'Token Name', '[]', 0, '2021-08-05 02:23:37', '2021-08-05 02:23:37', '2022-08-05 07:23:37'),
('8df916be8c5f6386166c0e34204a16ed01f14d0ec3c4e58e521dbbcb6c62f5afe47eacf15e1fd380', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:51', '2021-07-28 05:55:51', '2022-07-28 10:55:51'),
('97ae2caf5a1b3e5ba168356d8ac78b250ad49d568193ae0f8433d4a1c506c0aa23e85054b11e76ed', 9, 1, 'Token Name', '[]', 0, '2021-07-29 00:38:34', '2021-07-29 00:38:34', '2022-07-29 05:38:34'),
('9995a953f0deb9966962620b636f435cd82d713c29e5032820e0b0abba3d602a8aad45353f31bf46', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:52', '2021-07-28 05:55:52', '2022-07-28 10:55:52'),
('9a7ddb6f6a4a50b8a8c7d799fb8007491aa79b898b1c4a938c589e034f6622ba36e649d35408ba76', 1, 1, 'Token Name', '[]', 0, '2021-07-26 07:50:28', '2021-07-26 07:50:28', '2022-07-26 12:50:28'),
('9e1f4e635e6329b4531c586bdcf13f3931a737f8f9fc82823c3af8da2271d270b31ef03df8359ada', 8, 1, 'Token Name', '[]', 0, '2021-08-04 04:49:23', '2021-08-04 04:49:23', '2022-08-04 09:49:23'),
('a2f59005ed2e61953572a8b938aad92ab98e98c9936272555b5be145468595d36920c0b07fbf2228', 8, 1, 'Token Name', '[]', 0, '2021-08-04 04:49:20', '2021-08-04 04:49:20', '2022-08-04 09:49:20'),
('a77ecb09291ad80bc9ea48f08a52073e29b05e6b8d51ca66aca776b7612fea233ff1003f6c5ce306', 8, 1, 'Token Name', '[]', 0, '2021-07-28 03:58:53', '2021-07-28 03:58:53', '2022-07-28 08:58:53'),
('a8c94dffbb517f73e825ab0f7fde4422260e8931a33f55c69f4138fdd8d72fb0ce651fcfc5091704', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:24', '2021-07-28 05:51:24', '2022-07-28 10:51:24'),
('aabde0f41381b9212a3ca25c64eaf743646cc517fc6a9a7dbbf4a0549668fdcbfac66e2c091eb138', 1, 1, 'Token Name', '[]', 0, '2021-07-26 07:31:00', '2021-07-26 07:31:00', '2022-07-26 12:31:00'),
('ac2611a27b236cd25feaf0d6859b9a0013414292247acf0e5a426d7d155fab6dc960e44b7f98ce33', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:27', '2021-07-28 05:51:27', '2022-07-28 10:51:27'),
('ad3595dd86c067fd7498a3355eaf6c6bb4ffb968e5a97d140c2967590b0f112032f23d2503796a96', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:51:21', '2021-07-28 05:51:21', '2022-07-28 10:51:21'),
('ba5d739fafa80cb38d6f4dfc860d96efcf9bbe608020a07d6206ad752d3a45b51078b41ea3f457be', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:59', '2021-07-28 05:55:59', '2022-07-28 10:55:59'),
('c17e3ca854fc1cc87f1affaed24b408afd68b08197192c9b4aad4e5b2dea857bbcabd6575e2b4ad5', 8, 1, 'Token Name', '[]', 0, '2021-08-05 03:00:31', '2021-08-05 03:00:31', '2022-08-05 08:00:31'),
('c82092e8502c229d755c8da99ebe3cc7d320e0f9d392e8b92248bb44988a9ac186969a88d80f610b', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:56', '2021-07-28 05:55:56', '2022-07-28 10:55:56'),
('cc2c844bbbaff19de9c5376cfd631725e851a3da5865a8077a2cf90cc9ce6fcf3aa1aa1d1b4313c0', 5, 1, 'Token Name', '[]', 0, '2021-08-04 03:16:44', '2021-08-04 03:16:44', '2022-08-04 08:16:44'),
('ce0b20e823158ba2dff27348604970e92b240cff9e5768363bdc73721734e3effd0cbc5f9d4184b7', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:47', '2021-07-28 05:55:47', '2022-07-28 10:55:47'),
('d15e5a8aaa2eb3505722da7d24f70ff2692f4065ebd52e338f792c8d003dd83aab6eaf7abf27b504', 5, 1, 'Token Name', '[]', 0, '2021-07-30 05:04:42', '2021-07-30 05:04:42', '2022-07-30 10:04:42'),
('d2176d88de67aa25005c5da1a1456eb52e80abceb4018406f8b50ce810b45947f1db9ea36cc77692', 5, 1, 'Token Name', '[]', 0, '2021-07-30 05:04:47', '2021-07-30 05:04:47', '2022-07-30 10:04:47'),
('d394814f1c4a9896096743c7f0fb763246e4235957fd77fb6173143290b6d59d8145729e730baa6e', 5, 1, 'Token Name', '[]', 0, '2021-07-29 23:28:11', '2021-07-29 23:28:11', '2022-07-30 04:28:11'),
('d41bf65fda475e292345175f4cb3bda7b65d126151ab896fd14e49618e935ee9cd6efbffca81ffd3', 12, 1, 'Token Name', '[]', 0, '2021-07-30 00:56:19', '2021-07-30 00:56:19', '2022-07-30 05:56:19'),
('d4b9b98ea4d5f621710ac2f7db8761bb0c1eaaa050f5f7b4aef0187778e61cd760714e8c7d91bf35', 8, 1, 'Token Name', '[]', 0, '2021-07-28 03:53:40', '2021-07-28 03:53:40', '2022-07-28 08:53:40'),
('da7abb40c0e8be7ce6fe8b6ecec91418df2b14346c20df668ef6bd53d67960d61d88257631df51ec', 2, 1, 'Token Name', '[]', 0, '2021-07-26 07:30:54', '2021-07-26 07:30:54', '2022-07-26 12:30:54'),
('dbb43d12dcc627591e1da7c66db8637f9203a1b488dfd0352dcc50bbc957fcb7abfcae8e48c95472', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:45', '2021-07-28 05:55:45', '2022-07-28 10:55:45'),
('df5bf67c79cba94309cac610bd038cdb47b34f767050096c49877862be286bb1af2085c90f871aee', 9, 1, 'Token Name', '[]', 0, '2021-08-04 03:12:59', '2021-08-04 03:12:59', '2022-08-04 08:12:59'),
('e3934aceef2717f2210131bb8f31bfa5010710a94a230214c04514594fbce8af2d6c388f1445eb45', 8, 1, 'Token Name', '[]', 0, '2021-08-04 03:54:58', '2021-08-04 03:54:58', '2022-08-04 08:54:58'),
('e4bad179a0caeb9ed3e0387f37ca04f5d9f70fb2fd0db35360cbbb5e71daaee050598a75fef978fe', 5, 1, 'Token Name', '[]', 0, '2021-08-04 02:51:38', '2021-08-04 02:51:38', '2022-08-04 07:51:38'),
('e503c6f4e9ebcf1a2cde902085bfe8563cbe68eea15c5c4bf064fd1834eb1c63c3464fbb85919a13', 5, 1, 'Token Name', '[]', 0, '2021-07-29 23:29:09', '2021-07-29 23:29:09', '2022-07-30 04:29:09'),
('e88c7dff7522f99c8fc48eb2c9b539afbb6c575920b493ad305d307f58d111af49333306f3895381', 8, 1, 'Token Name', '[]', 0, '2021-08-05 03:07:52', '2021-08-05 03:07:52', '2022-08-05 08:07:52'),
('e8be80e17ad3cd6252d103a13362cfdbb39e421329885c2aee9ba2447164dabf5dfe2b02ea364e0e', 5, 1, 'Token Name', '[]', 0, '2021-07-30 01:04:04', '2021-07-30 01:04:04', '2022-07-30 06:04:04'),
('ebf6072e24ee5721457bfc698a283d9014ae6a149bb7903edabbf8cbec363f531d9226bdff88ead9', 8, 1, 'Token Name', '[]', 0, '2021-08-05 04:20:50', '2021-08-05 04:20:50', '2022-08-05 09:20:50'),
('f08115e90ac3e537d4f4b785680772bcee0b1c9fa9a48ad6e2f1c0d609b218fbb1ae48d9828ad063', 8, 1, 'Token Name', '[]', 0, '2021-07-30 01:03:41', '2021-07-30 01:03:41', '2022-07-30 06:03:41'),
('f3ade445474994e1851b740d17fe4e683ecee586586aef70d6a42e590a9afb9bc322df5a767aff9e', 8, 1, 'Token Name', '[]', 0, '2021-08-04 04:00:47', '2021-08-04 04:00:47', '2022-08-04 09:00:47'),
('f77020a44e0f32ddecd77def61307e8d390af4c5a2340c1eed76c43c319c8b5334c4795c3b6efbea', 9, 1, 'Token Name', '[]', 0, '2021-07-29 00:38:56', '2021-07-29 00:38:56', '2022-07-29 05:38:56'),
('f85e5155d2a839bd72cf3f6ed1fec55dc9a33e6fea6d49f13532c9b9fe45a23f5499a9d3721a901c', 5, 1, 'Token Name', '[]', 0, '2021-07-28 05:55:58', '2021-07-28 05:55:58', '2022-07-28 10:55:58'),
('fc26b31abfe5f1b9ea13660f15e1eed3a2be8b0598f6f4efb71fc8d186b5d8e504acc34f2b9be54b', 5, 1, 'Token Name', '[]', 0, '2021-07-29 23:28:11', '2021-07-29 23:28:11', '2022-07-30 04:28:11'),
('fd792c981466b707b1bfd242dddfe75d170d12d0e3032f735a83f5ef4b57150a58fe362a3fa8e2e1', 9, 1, 'Token Name', '[]', 0, '2021-08-04 02:44:38', '2021-08-04 02:44:38', '2022-08-04 07:44:38'),
('fd871aa608f3e105c9aeb65a9482d1db9661f6a61cff3a18416f3e16e7c44ae3502efebbe8554cdf', 8, 1, 'Token Name', '[]', 0, '2021-08-04 07:10:57', '2021-08-04 07:10:57', '2022-08-04 12:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'broker', 'K0DvoiuTol8zt5Bn3nYLDwtPlFZWcjyOk3893szl', NULL, 'http://localhost', 1, 0, 0, '2021-07-26 07:30:47', '2021-07-26 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-26 07:30:47', '2021-07-26 07:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_of_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price_services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insertion_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_services_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_chettings`
--

CREATE TABLE `offer_chettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_deliver_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliver_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_longitude` double DEFAULT NULL,
  `order_latitude` double DEFAULT NULL,
  `occation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_end_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_deliver_date`, `deliver_time`, `number_of_guest`, `nots`, `order_address`, `order_city`, `order_longitude`, `order_latitude`, `occation_id`, `order_status_id`, `provider_id`, `client_id`, `service_fee`, `provider_end_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '26 - Thul-H - 1442', '03:00 PM', '50', 'order', 'F65X+QH9, Ali Town, Lahore, Punjab, Pakistan', 'Lahore', 74.24880232662, 31.459551216043, 2, 2, 8, 5, '10', NULL, '2021-08-04 06:50:06', '2021-08-05 03:36:37', NULL),
(3, '27 - Thul-H - 1442', '09:00 PM', '100', 'order', 'Abdul Sattar Edhi Rd, Shabbir Town, Lahore, Punjab, Pakistan', 'Lahore', 74.23922650516, 31.454277347552, 3, 4, 8, 5, NULL, NULL, '2021-07-02 05:58:25', '2021-08-05 08:36:18', NULL),
(4, '28 - Thul-H - 1442', '09:00 AM', '50', 'order', '64A, Aitchison Society Lahore, Punjab, Pakistan', 'Lahore', 74.251383282244, 31.457038729509, 1, 4, 8, 5, '10', NULL, '2021-08-01 01:49:32', '2021-08-05 08:03:31', NULL),
(5, '29 - Thul-H - 1442', '03:00 PM', '70', 'order', 'Plot 115, Block E Nawab Town, Lahore, Punjab, Pakistan', 'Lahore', 74.252242930233, 31.450652963815, 2, 4, 8, 5, '10', NULL, '2021-07-31 01:50:06', '2021-08-05 02:12:28', NULL),
(6, '01 - Muh - 1443', '02:00 AM', '80', 'order', 'Plot 332, Block G4 Block G 4 Phase 2 Johar Town, Lahore, Punjab, Pakistan', 'Lahore', 74.270672053099, 31.47406426092, 2, 4, 8, 5, '10', NULL, '2021-07-30 01:51:05', '2021-08-05 02:25:46', NULL),
(7, '02 - Muh - 1443', '09:00 PM', '50', 'New order', 'Service Rd, Trade Centre Commercial Area Phase 2 Johar Town, Lahore, Punjab, Pakistan', 'Lahore', 74.258192740381, 31.463762375527, 1, 2, 8, 5, NULL, NULL, '2021-08-05 02:29:24', '2021-08-05 02:44:43', NULL),
(8, '03 - Muh - 1443', '03:00 PM', '50', 'New order', 'Abdul Sattar Edhi Rd, Shabbir Town, Lahore, Punjab, Pakistan', 'Lahore', 74.240540452302, 31.452550405683, 2, 1, NULL, 5, NULL, NULL, '2021-08-05 02:30:11', '2021-08-05 02:30:11', NULL),
(9, '03 - Muh - 1443', '09:00 PM', '100', 'New order', 'Plot 231, Block E Nawab Town, Lahore, Punjab, Pakistan', 'Lahore', 74.250677190721, 31.452456592758, 3, 1, NULL, 5, NULL, NULL, '2020-08-05 02:30:50', '2021-08-05 08:04:34', NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:16:24', '2021-08-05 08:16:24', NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:26:40', '2021-08-05 08:26:40', NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:27:00', '2021-08-05 08:27:00', NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:28:11', '2021-08-05 08:28:11', NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:29:33', '2021-08-05 08:29:33', NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, '2021-08-05 08:31:21', '2021-08-05 08:31:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_evalutions`
--

CREATE TABLE `order_evalutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_of_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insertion_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_numbers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_services`
--

INSERT INTO `order_services` (`id`, `service_numbers`, `order_id`, `service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, '2', 9, 1, '2021-07-30 01:38:13', '2021-07-30 01:38:13', NULL),
(21, '3', 9, 2, '2021-07-30 01:38:14', '2021-07-30 01:38:14', NULL),
(22, '6', 10, 1, '2021-07-30 01:39:06', '2021-07-30 01:39:06', NULL),
(23, '5', 10, 2, '2021-07-30 01:39:06', '2021-07-30 01:39:06', NULL),
(24, '7', 10, 6, '2021-07-30 01:39:06', '2021-07-30 01:39:06', NULL),
(25, '333', 11, 1, '2021-07-30 01:39:42', '2021-07-30 01:39:42', NULL),
(26, '33', 11, 2, '2021-07-30 01:39:42', '2021-07-30 01:39:42', NULL),
(27, '33', 11, 6, '2021-07-30 01:39:42', '2021-07-30 01:39:42', NULL),
(28, '222', 12, 1, '2021-07-30 06:41:10', '2021-07-30 06:41:10', NULL),
(29, '22', 12, 2, '2021-07-30 06:41:10', '2021-07-30 06:41:10', NULL),
(30, '22', 13, 1, '2021-07-30 06:41:46', '2021-07-30 06:41:46', NULL),
(31, '22', 14, 1, '2021-07-30 06:45:08', '2021-07-30 06:45:08', NULL),
(32, '22', 14, 2, '2021-07-30 06:45:08', '2021-07-30 06:45:08', NULL),
(33, '222', 15, 1, '2021-07-30 06:49:25', '2021-07-30 06:49:25', NULL),
(34, '555', 16, 6, '2021-07-30 06:50:42', '2021-07-30 06:50:42', NULL),
(38, '10', 2, 1, '2021-08-04 01:48:00', '2021-08-04 01:48:00', NULL),
(39, '10', 2, 2, '2021-08-04 01:48:00', '2021-08-04 01:48:00', NULL),
(40, '10', 2, 6, '2021-08-04 01:48:00', '2021-08-04 01:48:00', NULL),
(41, '10', 3, 1, '2021-08-04 01:48:39', '2021-08-04 01:48:39', NULL),
(42, '100', 3, 2, '2021-08-04 01:48:39', '2021-08-04 01:48:39', NULL),
(43, '100', 3, 6, '2021-08-04 01:48:39', '2021-08-04 01:48:39', NULL),
(44, '7', 4, 1, '2021-08-04 01:49:32', '2021-08-04 01:49:32', NULL),
(45, '55', 4, 2, '2021-08-04 01:49:32', '2021-08-04 01:49:32', NULL),
(46, '55', 4, 6, '2021-08-04 01:49:32', '2021-08-04 01:49:32', NULL),
(47, '10', 5, 1, '2021-08-04 01:50:06', '2021-08-04 01:50:06', NULL),
(48, '75', 5, 2, '2021-08-04 01:50:07', '2021-08-04 01:50:07', NULL),
(49, '75', 5, 6, '2021-08-04 01:50:07', '2021-08-04 01:50:07', NULL),
(50, '10', 6, 1, '2021-08-04 01:51:05', '2021-08-04 01:51:05', NULL),
(51, '80', 6, 2, '2021-08-04 01:51:05', '2021-08-04 01:51:05', NULL),
(52, '80', 6, 6, '2021-08-04 01:51:05', '2021-08-04 01:51:05', NULL),
(53, '10', 7, 1, '2021-08-05 02:29:24', '2021-08-05 02:29:24', NULL),
(54, '50', 7, 2, '2021-08-05 02:29:24', '2021-08-05 02:29:24', NULL),
(55, '50', 7, 6, '2021-08-05 02:29:24', '2021-08-05 02:29:24', NULL),
(56, '10', 8, 1, '2021-08-05 02:30:11', '2021-08-05 02:30:11', NULL),
(57, '60', 8, 2, '2021-08-05 02:30:11', '2021-08-05 02:30:11', NULL),
(58, '60', 8, 6, '2021-08-05 02:30:11', '2021-08-05 02:30:11', NULL),
(59, '10', 9, 1, '2021-08-05 02:30:50', '2021-08-05 02:30:50', NULL),
(60, '100', 9, 2, '2021-08-05 02:30:50', '2021-08-05 02:30:50', NULL),
(61, '100', 9, 6, '2021-08-05 02:30:50', '2021-08-05 02:30:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_features`
--

CREATE TABLE `organization_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_status_on_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_app_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date_off` bigint(20) DEFAULT NULL,
  `end_date_off` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization_information`
--

CREATE TABLE `organization_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `who_we` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privact_policy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_latitude` double DEFAULT NULL,
  `shop_longitude` double DEFAULT NULL,
  `shop_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_online_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_on_offline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(2024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` bigint(20) UNSIGNED DEFAULT NULL,
  `user_status` bigint(20) UNSIGNED DEFAULT NULL,
  `device_token` varchar(2024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `commercial_registration_no`, `shop_latitude`, `shop_longitude`, `shop_city`, `shop_address`, `otp`, `Register_date`, `last_online_date`, `user_on_offline`, `api_token`, `user_type`, `user_status`, `device_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', '03017070770', '$2y$10$e//9fZItqeEHwvzs90d9PO2dl0frlGQXVjXItcYNp8aI4n9ys1SRe', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-28 04:29:48', NULL, NULL, NULL, 3, NULL, 'this is device token', NULL, '2021-07-26 08:16:35', '2021-07-28 04:29:48', NULL),
(5, 'Customer', NULL, '03056409368', '$2y$10$BxWqzJmhiHjIitsQfxHTeuYeAM0h8WjzutZEoZO4o3XeQwM9Eun9u', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-05 11:21:35', NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzRkMDkwMjZhYmMxNTYyMzY0NWM4OWQ1MzBiYjBjOWQ4MzVkZjNhMmJiYWUwNTEwZmRmNWU5NzFjNjYwMGQ4OTdjZWZmNjE4NzE4Mjk2ZTkiLCJpYXQiOjE2MjgxNjI0OTUuMzE1NjA2LCJuYmYiOjE2MjgxNjI0OTUuMzE1NjI3LCJleHAiOjE2NTk2OTg0OTUuMjUyMjE5LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.rRwQ_Su01Rm5HiOphnAFkz0wlgA47syoc5gu4Mj9HLEwCHm8nkYKYVDOjwDUVViMDqi_wUp4RB8qk2vDiZiI-OzGyO4b1WJ3ystUwOLy4ClB_amQLjS6iKmG7DTRPKJlLDJN3G0tR-iDViuHhJZxnX5kpfUOhPCAUWm26mYt1YqQjdNHA6nDmlG949NaeDBu6iX_MY64UMLliazw8gFFNUwPk3SaH3QOjil8pW7nIMiQlvlpoD1_HKA2xWO1Iv38UZUrl8OXmwQGO2-_PaqodXyQKO_yfGj4_EkxYCAV1L_yL3lLimNNA5Ce_UnybJM-IVcd6tEwlwcWrI202ZVWDuoPGXEM4c3ZupQUhKYgANstj-gme5KnfQYcsM2xxiu4wVAwaqvGGerqIqIUsf_M174ZoJm4AHoTka7iXloMtimwQu9MlKBzKLkBjF-DpLs1GfD4A1bvvQjk4m9Hi4BKDYkisFebNq4mWXQwrkhnUhIgr_GpEf5bdu-ta2nNcc62ke4y4ijsETPnI5W_t-uSwnmicbw3HEOapSL2kmN8oZ8Fj7X4zJVe_YTuLSJbG1QZbKPAQpNQmxCGYt2zsujzJXg5SU16V-B8E6P_eBOQFXtA-_A0U0ju0sioM4KvcC5R8C_ZWbBLLll_H9cosH7SYfY1ynMiEqMPsb4UDfD0Wz4', 1, 1, 'egJJjjLhRUuXTa7em0BRAW:APA91bEbZVCENoVhsDHvUjJEasUPi-6shPAUGf67ItONEUqPetSSZ2UFtwrWjhZ13CpEJiSeHqilDiGD1zEGYK8sZSnawQIH86XTL2JMPTvXPEtfMonPI1dmx6EdXCfUCOuHyCq5xkf9', NULL, '2021-07-27 23:29:45', '2021-08-05 06:21:35', NULL),
(8, 'Rawaea Party Organizer', NULL, '03056409367', '$2y$10$aq9z3n/3zXSNnplKNqr8wennKPAg4FnzVLrpHF/31fND4ZkQwXYKC', 'Abcd123', 31.4664564, 74.2463109, 'Lahore', 'F68W+HGX, Block C Judicial Colony, Lahore, Punjab, Pakistan', NULL, '2021-08-05 11:21:06', NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjI5ZDgzNmY5ZDYyODNhZTIyZTlmZWNhZGM4MDhkZGQyNGQxYzBiOTEwNzA2ZmE2YzY2Nzc1MjlhYmEwYjVhMzYwMzU2N2MxNmRjYjc4YWEiLCJpYXQiOjE2MjgxNjI0NjYuNjEwMTI2LCJuYmYiOjE2MjgxNjI0NjYuNjEwMTQsImV4cCI6MTY1OTY5ODQ2Ni40MDgxMTMsInN1YiI6IjgiLCJzY29wZXMiOltdfQ.ZI_owc-WGnDABVw4GYq99djHu1ijdT9kIgiiDWlVtMNUGZ1-feQOJwcRZiUHSLwhYHt951NGZSyzVPBJXp9FAH-hIV0y6Urxy7bOVnYU4dd72xVa2JlwpSlf-gJx_eZjBsbcjjHIY7a_yyOm4M4wGem4py8sbo8vJMpesT43qkY0KNkLrc66teTsHQlSZQIMKeQjzeJYv7CroDT-9yjffWR5yZNZ7ys9bSKt7eXE2hddRvKnVFeEOdXYmgmtP0qtD6VPhD3bQM5sW5duNfjLzxlUR_4okuJhLRSokuZd8_td6iCgg5fQa8kzJqU5AszS3Cx4J9tDer0KKoUpiFKM8SC1p_bLuuX-6itt1IyVzHIt6HytDWZkz-dgWMdZvGrVKBrBHgNgRbjrjiKYChx1u15fpf9KHf375J49PSsB22kGeN8yxYIeunZ7fYe48MhBN5q1TkPk-9E-DJwWOhr47gOo_mwMXfcuh4yg8R0G_-ISx7SqaW5DPClHJGJwAraWcvu8jOPAHU6MNzKcC7gca6cDVICwuqycWFDw9Odok9XABnZdjyX1tgfyzXi09Mkj8DumyS77DNBS68dwvjXI7ponLQKNo6zAKsA9CjzlVxMu3TFuyyR18bzDXRhqLFM_ZLp8DDr8fX1FfSO2-JH-Lat59vZAn3fV9aVGL0YJ20E', 2, 1, 'e_j2mPRhRACy-Z4LS-h3Wb:APA91bGmVoz2dVOpJ1tf6Lk-c6FNFkD0HZgxsHTJ1165mVy24O9Bk9sH-2usXkoGv9Tx8LkaqfGz8Cym_fyuZt7r1Y1GOF1crQjhbSXKM9JlPfiMP0nSuybDLgUq9oAaqBisJ6Sq7vzM', NULL, '2021-07-30 01:03:10', '2021-08-05 06:21:06', NULL),
(9, 'testclient', NULL, '03018383983', '$2y$10$J7e8OPLxX15yeFd4sa9IQ.aMqo9NUSAA85zJ4R8DyzLQmdAPfv60m', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-05 10:07:06', NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjY1M2M4N2NkYzljNDAzOWQwZWI2OGU1OTcwMWQ1MDFkYzM1NjRiZTNiNWRlMjM3YjE3MTEyZTg5OWRiYWI0YmQ0YzRkODA1YjgxZGFkNjkiLCJpYXQiOjE2MjgxNTgwMjYuMTU1NTA3LCJuYmYiOjE2MjgxNTgwMjYuMTU1NTMyLCJleHAiOjE2NTk2OTQwMjUuOTM1NTExLCJzdWIiOiI5Iiwic2NvcGVzIjpbXX0.uxMgzmQifLrm6vCyt0nPYJ5JkRwyH-5War3YfgQ8wwKmXMW_dT6zh4NkhUfKdUeNIUDDw7INvJVjJpccMs38z__Z71IGUTO__rDyFekYJwZ0pl3-unYG7Q7c3lKZ8XLFjvSouAZcAYCxObKtM8cOcS2rI_V24F2QWHSy3H30Q1R6AuBblRakdRVIzSxoX0cv0s8L2GVx1JZTTsRHyBis2UzC8WahhPhqbjA-O-2SX4-1CUqCgHLhcvbMROPj-A3ouqvgn5MY0nqFiHmQX7YibIMZpTwKy2l0ukBdH8tSYyONFxKG3RdFba1VtgaUKrJydgczuPgdS7p8IpG_nCZ_FNmTKA2O2IQWZ5PEXBlkVvSDk__hi5oXotCIeOYo1IQ2o8xATjnxGHwL_3-Kl7sz7azHP7flo8RGtzh-3Cd1LbMNp7H-oap4abU7szSSh01hiWXPXGtThrN6YC0TlZ5Y6oxxn70aNEQVAVm7u7Ipm0W6OrvczDtIG5Eb3uoXI8NPRgGrI5Y_ZcKAQGuQlJ5h3Y1iFJlNau1TwVYMWVqGUQX1AL0LNb7tO0i8tWfu_DTkJsX5ajt61A67YuFLLuGnfRJG2VP5_5eblC5aSsX8YVK1lVdCRUJMkiyB7PkvYkWo1joxjin8AkoxOFc7Qwjqb8UTgi6iJ8ciSB2rq6RigyM', 1, 1, 'this is device token', NULL, '2021-07-29 00:35:18', '2021-08-05 05:07:06', NULL),
(11, 'activeClient', NULL, '03018001620', '$2y$10$L0.L5h0OvHz/qoXtmR/1IOmibkhFTKDmwtOQcgaslKo9h6tj5Sjiy', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 10:52:10', NULL, NULL, NULL, 1, 2, 'this is device token', NULL, '2021-07-29 01:11:11', '2021-07-29 05:52:10', NULL),
(12, 'Lahore parties', NULL, '03015555960', '$2y$10$18hDN6MDaSuxp/2vOIRiv.679RVzstz5/F9gEcLbHs6vF5tTqEug.', '12345', 31.464895995885, 74.234557114542, 'Lahore', 'Metro Mall Building, Metro Access Rd, Amarkot, Lahore, Punjab, Pakistan', NULL, '2021-07-30 05:56:19', NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDQxYmY2NWZkYTQ3NWUyOTIzNDUxNzVmNGNiM2JkYTdiNjVkMTI2MTUxYWI4OTZmZDE0ZTQ5NjE4ZTkzNWVlOWNkNmVmYmZmY2E4MWZmZDMiLCJpYXQiOjE2Mjc2MjQ1NzkuMzY4MTcsIm5iZiI6MTYyNzYyNDU3OS4zNjgxOTMsImV4cCI6MTY1OTE2MDU3OS4yNzQzOTksInN1YiI6IjEyIiwic2NvcGVzIjpbXX0.pR2hiA0BZeA1ebSUYCDF_pGvEkAQxSlI8EUkrSQcD6fjuLAHsTORlZj9A-7lZkGVqXtmnQFF6i3E_k03R_v7r5Ku8Y4pUwhLbvSWmp3086EpvKtF3pbySEXMgCFbEw-PrzVl5MjyjZ-h3GqjiG6NoEYI8mRRoAQOaXM8LfmM9M9p--lAraCezq34SPwy_5dbGIcmdO3jWr52pKjBGlzeS_L4v2aQC1YPQ4vxSjIEcB0ukOxpm2FFun0z4qUuu-h5_PxiLt_XEpl3jG_YL-JibkVGphSf62n_VapQVg9PRM8dvCYb2FvPK10Q8oft0swvPixNImtN0BRvPiNGffAZdmN7ca6-h-dVNCq--FbDpFkvYBlYLxDl5x5eOCNe-_629fgrx4-XYMBOmEMI9C81W6UiPiBGNkslidpf8Ma4XQtnVjtOKbhlRU4lCzbA7BcPcJiA4qC6j8XWgmOS0FNUHwrPQmVUg8RV8NFbMWEPGcpYsh7bNX6Kvdh0P1wvwqmRsps14AyXFZRv0cGCGhrxju6gbCX_z0uEFx2mvqx7pwgFh3cCsb5w0X1TIbLObkhrzggYthRZLBgltlV58AWw59F9jzohUfdMYn4BqSDL9qJ8-k4X30Sftv39RazGkjxEZ8wd_jkHK0HWDkdeDaupzCNL8aKkFcbwNvgqA7JLne8', 2, 1, 'update device token', NULL, '2021-07-29 07:30:45', '2021-07-30 00:56:19', NULL),
(13, 'Peshwar hall', NULL, '0305454954', '$2y$10$CQZReqwgPwq/WW8ZYnq/HuNXbus6WgMLPvhDXaXJmS67wzF6l0g3G', '8765', 31.468103460863, 74.237103201449, 'Lahore', 'Canal Rd, Amarkot, Lahore, Punjab, Pakistan', NULL, '2021-07-29 12:35:51', NULL, NULL, NULL, 2, 2, 'fycNrdvaRpamrFyo8QXx6J:APA91bFQ9HFvSzwL5tGhH4DmgKzDGgewq8bUTttvjQf-Ub0cnvmuoI0pk4eh7W5XxpDuk0YJ7vNMVjkWXdSDRvOg_jdlursugSrd4f2exkM8-cKozquepWUGB3mYIfSmbQU3onYIUua9', NULL, '2021-07-29 07:31:46', '2021-07-29 12:35:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adding_to_bills`
--
ALTER TABLE `adding_to_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adding_to_bills_order_id_foreign` (`order_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_to_client_foreign` (`to_client`),
  ADD KEY `announcements_to_provider_foreign` (`to_provider`);

--
-- Indexes for table `chetting_on_contacts`
--
ALTER TABLE `chetting_on_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chetting_on_contacts_contact_id_foreign` (`contact_id`),
  ADD KEY `chetting_on_contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_contact_type_id_foreign` (`contact_type_id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lkp_bank_accounts`
--
ALTER TABLE `lkp_bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_constonts`
--
ALTER TABLE `lkp_constonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_contact_types`
--
ALTER TABLE `lkp_contact_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_occation_times`
--
ALTER TABLE `lkp_occation_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_order_statuses`
--
ALTER TABLE `lkp_order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_services`
--
ALTER TABLE `lkp_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_user_statuses`
--
ALTER TABLE `lkp_user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_user_types`
--
ALTER TABLE `lkp_user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_from_user_id_foreign` (`from_user_id`),
  ADD KEY `notifications_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_provider_id_foreign` (`provider_id`),
  ADD KEY `offers_order_services_id_foreign` (`order_services_id`),
  ADD KEY `offers_order_id_foreign` (`order_id`);

--
-- Indexes for table `offer_chettings`
--
ALTER TABLE `offer_chettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_chettings_from_user_id_foreign` (`from_user_id`),
  ADD KEY `offer_chettings_to_user_id_foreign` (`to_user_id`),
  ADD KEY `offer_chettings_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_occation_id_foreign` (`occation_id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`),
  ADD KEY `orders_provider_id_foreign` (`provider_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `order_evalutions`
--
ALTER TABLE `order_evalutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_evalutions_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_services_order_id_foreign` (`order_id`),
  ADD KEY `order_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `organization_features`
--
ALTER TABLE `organization_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_information`
--
ALTER TABLE `organization_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organization_information_email_unique` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_commercial_registration_no_unique` (`commercial_registration_no`),
  ADD KEY `users_user_type_foreign` (`user_type`),
  ADD KEY `users_user_status_foreign` (`user_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adding_to_bills`
--
ALTER TABLE `adding_to_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chetting_on_contacts`
--
ALTER TABLE `chetting_on_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lkp_bank_accounts`
--
ALTER TABLE `lkp_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lkp_constonts`
--
ALTER TABLE `lkp_constonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lkp_contact_types`
--
ALTER TABLE `lkp_contact_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lkp_occation_times`
--
ALTER TABLE `lkp_occation_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lkp_order_statuses`
--
ALTER TABLE `lkp_order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lkp_services`
--
ALTER TABLE `lkp_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lkp_user_statuses`
--
ALTER TABLE `lkp_user_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lkp_user_types`
--
ALTER TABLE `lkp_user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_chettings`
--
ALTER TABLE `offer_chettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_evalutions`
--
ALTER TABLE `order_evalutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_services`
--
ALTER TABLE `order_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `organization_features`
--
ALTER TABLE `organization_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_information`
--
ALTER TABLE `organization_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adding_to_bills`
--
ALTER TABLE `adding_to_bills`
  ADD CONSTRAINT `adding_to_bills_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_to_client_foreign` FOREIGN KEY (`to_client`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcements_to_provider_foreign` FOREIGN KEY (`to_provider`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chetting_on_contacts`
--
ALTER TABLE `chetting_on_contacts`
  ADD CONSTRAINT `chetting_on_contacts_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chetting_on_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_contact_type_id_foreign` FOREIGN KEY (`contact_type_id`) REFERENCES `lkp_contact_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_order_services_id_foreign` FOREIGN KEY (`order_services_id`) REFERENCES `order_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer_chettings`
--
ALTER TABLE `offer_chettings`
  ADD CONSTRAINT `offer_chettings_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_chettings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_chettings_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_occation_id_foreign` FOREIGN KEY (`occation_id`) REFERENCES `lkp_occation_times` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `lkp_order_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_evalutions`
--
ALTER TABLE `order_evalutions`
  ADD CONSTRAINT `order_evalutions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_services`
--
ALTER TABLE `order_services`
  ADD CONSTRAINT `order_services_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `lkp_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_status_foreign` FOREIGN KEY (`user_status`) REFERENCES `lkp_user_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_user_type_foreign` FOREIGN KEY (`user_type`) REFERENCES `lkp_user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
