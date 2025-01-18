

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('superadmin','admin','operasional','driver','mekanik') NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `admins` WRITE;

INSERT INTO `admins` VALUES (1,'Super Admin','superadmin','$2y$10$yl2M02G8wJU/irP/W9dURO5fgEaKo01rpIgxT6oKlyCu8aR0k3AfC','superadmin','on',NULL,'2024-12-27 08:50:17','2024-12-27 08:50:17'),(2,' Admin','admin','$2y$10$25H/tcPpBnZHyvYkFn4nBerntfOJpoEQODkg3vgP.F2lPd6brCOe6','admin','on',NULL,'2024-12-27 08:50:17','2024-12-27 08:50:17'),(3,' Operasional','operasional','$2y$10$ur10LAHuDbNwmmpjjOOPjOpYcWKgbG2wEX4LBt8nY5McuYFdCvliq','operasional','on',NULL,'2024-12-27 08:50:17','2024-12-27 08:50:17'),(4,'Mekanik2','mekanik','$2y$10$nCBFkvPBt5vjuUMP7heaOO4ZZL7z6ZC.yGlk.aIwcUhik3.2ZZlH2','driver','on',NULL,'2024-12-27 08:50:17','2025-01-16 00:41:02'),(5,' Driver','driver','$2y$10$WgQdNdJ3gqqWe2OjTdDPhuDNRF0C6/634tIu.sLU1cD3cnVnnQno6','driver','off',NULL,'2024-12-27 08:50:17','2024-12-27 08:50:52');

UNLOCK TABLES;


DROP TABLE IF EXISTS `driver_kendaraans`;

CREATE TABLE `driver_kendaraans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kendaraan` bigint(20) unsigned DEFAULT NULL,
  `id_driver` bigint(20) unsigned NOT NULL,
  `tipe_driver` enum('tetap','cadangan') NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_kendaraans_id_kendaraan_foreign` (`id_kendaraan`),
  KEY `driver_kendaraans_id_driver_foreign` (`id_driver`),
  CONSTRAINT `driver_kendaraans_id_driver_foreign` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id`),
  CONSTRAINT `driver_kendaraans_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `driver_kendaraans` WRITE;

INSERT INTO `driver_kendaraans` VALUES (1,1,1,'tetap','on','2024-12-27 08:50:18','2024-12-27 08:50:18');

UNLOCK TABLES;


DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `drivers_no_ktp_unique` (`no_ktp`),
  UNIQUE KEY `drivers_no_hp_unique` (`no_hp`),
  UNIQUE KEY `drivers_email_unique` (`email`),
  KEY `drivers_id_user_foreign` (`id_user`),
  CONSTRAINT `drivers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `drivers` WRITE;
INSERT INTO `drivers` VALUES (1,1,'Doni','3207311212980002','Truck Mixer','083116546574','ini adalah alamat saya','on','doni@mail.com','2024-12-27 08:50:18','2024-12-27 08:50:18'),(2,2,'Yono','3207311212980003','Truck Mixer','083116546572','ini adalah alamat saya','on','yono@mail.com','2024-12-27 08:50:18','2024-12-27 08:50:18');

UNLOCK TABLES;


DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;


DROP TABLE IF EXISTS `jenis_kendaraans`;

CREATE TABLE `jenis_kendaraans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `jenis_kendaraans` WRITE;
INSERT INTO `jenis_kendaraans` VALUES (1,'Truck Mixer','off','2024-12-27 08:50:17','2025-01-17 20:41:46'),(2,'Dump Truck','off','2024-12-27 08:50:17','2025-01-17 20:40:41');

UNLOCK TABLES;



DROP TABLE IF EXISTS `kendaraans`;

CREATE TABLE `kendaraans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_pintu` varchar(255) DEFAULT NULL,
  `id_jenis_kendaraan` bigint(20) unsigned NOT NULL,
  `no_polisi` varchar(255) NOT NULL,
  `warna_kendaraan` varchar(255) NOT NULL,
  `warna_tnbk` varchar(255) NOT NULL,
  `no_rangka` varchar(255) NOT NULL,
  `no_mesin` varchar(255) NOT NULL,
  `isi_silinder` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kendaraans_id_jenis_kendaraan_foreign` (`id_jenis_kendaraan`),
  CONSTRAINT `kendaraans_id_jenis_kendaraan_foreign` FOREIGN KEY (`id_jenis_kendaraan`) REFERENCES `jenis_kendaraans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `kendaraans` WRITE;

INSERT INTO `kendaraans` VALUES (1,'11101',1,'B 9285 WIN','Merah','Merah','SDFDSFXXX','SDFDSFXXX',120,'on','2024-12-27 08:50:17','2024-12-27 08:50:17'),(2,'11102',2,'B 9286 WIN','Merah','Merah','SDFDSFXXX','SDFDSFXXX',120,'on','2024-12-27 08:50:17','2024-12-27 08:50:17');

UNLOCK TABLES;



DROP TABLE IF EXISTS `kirs`;

CREATE TABLE `kirs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kendaraan` bigint(20) unsigned NOT NULL,
  `no_uji_kir` varchar(255) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kirs_id_kendaraan_foreign` (`id_kendaraan`),
  CONSTRAINT `kirs_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `kirs` WRITE;

UNLOCK TABLES;



DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `migrations` WRITE;

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_12_18_142819_create_admins_table',1),(6,'2024_12_22_132107_create_jenis_kendaraans_table',1),(7,'2024_12_22_132121_create_kendaraans_table',1),(8,'2024_12_22_132137_create_drivers_table',1),(9,'2024_12_22_132152_create_sims_table',1),(10,'2024_12_22_132204_create_stnks_table',1),(11,'2024_12_22_132216_create_kirs_table',1),(12,'2024_12_22_132301_create_driver_kendaraans_table',1);

UNLOCK TABLES;


DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `password_reset_tokens` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `personal_access_tokens` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `sims`;
CREATE TABLE `sims` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_driver` bigint(20) unsigned NOT NULL,
  `no_sim` varchar(255) NOT NULL,
  `foto_sim` varchar(255) NOT NULL,
  `jenis_sim` varchar(255) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sims_no_sim_unique` (`no_sim`),
  KEY `sims_id_driver_foreign` (`id_driver`),
  CONSTRAINT `sims_id_driver_foreign` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sims` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `stnks`;
CREATE TABLE `stnks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kendaraan` bigint(20) unsigned NOT NULL,
  `masa_berlaku` date NOT NULL,
  `masa_berlaku_plat` date NOT NULL,
  `pkb` double(8,2) NOT NULL,
  `swdkllj` double(8,2) NOT NULL,
  `biaya_admin_stnk` double(8,2) NOT NULL,
  `biaya_admin_tnkb` double(8,2) NOT NULL,
  `transport` double(8,2) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stnks_id_kendaraan_foreign` (`id_kendaraan`),
  CONSTRAINT `stnks_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `stnks` WRITE;

UNLOCK TABLES;



DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
UNLOCK TABLES;
