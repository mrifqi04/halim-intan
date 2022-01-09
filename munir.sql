-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `fuses`;
CREATE TABLE `fuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `is_ajukan` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fuses` (`id`, `no_polisi`, `model`, `no_chassis`, `nama_customer`, `no_telp`, `alamat`, `catatan`, `is_ajukan`, `created_at`, `updated_at`, `status_approve`) VALUES
(1,	'AK4556KJJ',	'A300',	'76734',	'Akmall',	'082111',	'Bali',	NULL,	1,	'2021-12-28 10:57:45',	'2022-01-02 09:00:07',	''),
(2,	'AK4556KJJ Updated',	'A300 Updated',	'76734 Updated',	'Rifqi',	'082111',	'Bali Updated',	NULL,	0,	'2019-01-28 10:57:57',	'2021-12-31 03:41:53',	''),
(3,	'B4547KKL',	'A200',	'76734',	'Mal',	'082111',	'Jakarta',	NULL,	1,	'2021-12-29 02:40:56',	'2022-01-02 10:13:11',	'Rejected'),
(4,	'B4547KKL',	'A200',	'76734',	'M',	'082111768038',	'Yogya',	'Catatan',	0,	'2021-01-29 02:50:25',	'2021-12-29 04:49:03',	'');

DROP TABLE IF EXISTS `jadwals`;
CREATE TABLE `jadwals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_fus` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notifikasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jadwals` (`id`, `no_polisi`, `model`, `no_chassis`, `nama_customer`, `no_telp`, `alamat`, `jadwal_fus`, `created_at`, `updated_at`, `notifikasi`) VALUES
(1,	'DK12445JJ',	'A250',	'GHJ',	'Wayan',	'08756',	'Bali',	'2021-12-30',	'2022-01-04 09:02:28',	'2022-01-03 05:44:58',	NULL),
(3,	'1212',	'346346',	'76734',	'asdasd',	'121212',	'113412',	'2021-12-30',	'2021-12-28 09:04:06',	'2022-01-03 05:44:58',	NULL),
(4,	'1212',	'1415',	'125125',	'512125',	'125125',	'125125',	'2021-12-17',	'2021-12-28 09:06:16',	'2022-01-03 05:44:58',	NULL),
(6,	'B4547KKL',	'A200',	'76734',	'Rifqi',	'08211',	'Bekasi',	'2022-01-04',	'2021-12-28 10:25:11',	'2022-01-04 06:40:09',	2),
(7,	'B4547KKL',	'A200',	'76734',	'Moh',	'08211',	'Bekasi',	'2021-12-31',	'2021-12-28 10:25:36',	'2021-12-28 10:32:38',	NULL),
(8,	'B4547KKL',	'A300',	'76734',	'Form Include updated',	'082111768038',	'Jonggol',	'2021-12-31',	'2021-12-29 02:47:52',	'2021-12-29 02:48:28',	NULL),
(9,	'Tes Filter',	'A300',	'76734',	'Tes Filter',	'asd',	'1231',	'2022-01-08',	'2021-12-31 03:02:18',	'2021-12-31 03:02:18',	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16,	'2014_10_12_000000_create_users_table',	1),
(17,	'2014_10_12_100000_create_password_resets_table',	1),
(18,	'2019_08_19_000000_create_failed_jobs_table',	1),
(19,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(20,	'2021_12_28_144650_create_roles_table',	1),
(21,	'2021_12_28_144530_update_table_users',	2),
(22,	'2021_12_28_151749_create_jadwals_table',	3),
(23,	'2021_12_28_174310_create_fuses_table',	4),
(25,	'2021_12_29_095417_create_services_table',	5),
(26,	'2021_12_29_113504_update_table_fus_insert_is_approve',	6),
(27,	'2022_01_03_122031_update_table_jadwal_notifikasi',	7);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	NULL,	NULL),
(2,	'Service Advisor',	NULL,	NULL),
(3,	'Workshop Head',	NULL,	NULL),
(4,	'Customer Relation',	NULL,	NULL),
(5,	'Job Control',	NULL,	NULL);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `no_polisi`, `model`, `no_chassis`, `nama_customer`, `no_telp`, `alamat`, `pekerjaan`, `status`, `created_at`, `updated_at`) VALUES
(3,	'B4547KKL',	'A200',	'76734',	'Moh Service Updated',	'082111768038',	'Bekasi',	'PMS Updated',	'Selesai',	'2021-12-29 03:07:53',	'2021-12-29 03:12:42');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_handphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rank`, `no_handphone`, `jabatan`, `role_id`) VALUES
(1,	'admin',	'akmalrifqi2013@gmail.com',	NULL,	'$2y$10$Fmb7XAt405U6F2Uluu7XX.HlIv3gz/vhT/Dn1HWqNy1u4RtxK9b8W',	'EWtInvtdFYLyyKslL5UqNsUjEHTkIsEnfB7kkoME3cnWPNdUvKm87rYBOyGD',	'2021-12-28 08:00:52',	'2022-01-02 08:39:14',	'CEO',	'0821111',	'CEO',	1),
(3,	'service advisor',	'serviceadvisor@admin.com',	NULL,	'$2y$10$/Tl1xxAxNdfLJaVR9myeuu76uM1N9Zia2/kNCzCGzpErq8ZNTk0HO',	NULL,	'2022-01-02 08:12:28',	'2022-01-02 08:39:14',	NULL,	NULL,	NULL,	2),
(4,	'workshop head',	'workshophead@admin.com',	NULL,	'$2y$10$9kRjDO6WfGDK9ZEmiI.xqe10cxSUbGFg10WI8ACPYVaBhxKp3sWq6',	NULL,	'2022-01-02 08:16:22',	'2022-01-02 08:39:14',	NULL,	NULL,	NULL,	3),
(5,	'customer relation',	'customerrelation@admin.com',	NULL,	'$2y$10$ZceJ9oSwBinHgpoO9S9HpuDpevJnGwxgwDiCQUhik5.3lJ8LyNwe2',	NULL,	'2022-01-02 08:19:01',	'2022-01-02 08:39:14',	NULL,	NULL,	NULL,	4),
(6,	'job control',	'jobcontrol@admin.com',	NULL,	'$2y$10$f/4GsfSxGiw40URLC6j2mezTX8XcAhgOgK0b8H87AEIXf9FbsBD.2',	NULL,	'2022-01-02 08:19:13',	'2022-01-02 08:39:14',	NULL,	NULL,	NULL,	5);

-- 2022-01-05 07:30:36
