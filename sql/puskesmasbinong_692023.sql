/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.30 : Database - puskemasbinong
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`puskemasbinong` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `puskemasbinong`;

/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `kode_antrian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `antrian` */

insert  into `antrian`(`kode_antrian`,`name`,`NIK`,`tgllahir`,`kode_poli`,`status`,`created_at`,`updated_at`) values 
('K001-0001','Muhammad Fadillah Abdul Aziz','101212120120120212','2000-03-09','K001',1,'2023-05-23 10:28:29','2023-05-23 10:28:29'),
('U001-0001','Muhammad Fadillah Abdul Aziz','101212120120120212','2000-03-09','U001',1,'2023-05-23 10:28:59','2023-05-23 10:28:59'),
('A002-0002','Muhammad Fadillah Abdul Aziz','101212120120120212','2000-03-09','A002',0,'2023-05-23 10:29:14','2023-06-07 13:56:57'),
('K001-0002','Dea Belinda','101212120120120192','2000-03-09','K001',1,'2023-05-23 10:30:14','2023-05-23 10:30:14'),
('A002-0001','Dea Belinda','101212120120120192','2000-03-09','A002',1,'2023-05-23 10:30:38','2023-05-23 10:30:38');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`image`,`created_at`,`updated_at`) values 
(1,'Balita','balita','category-images/IJ4gFd3mXETQ5u41sjCSHf4WWkmgqZbD7ghw7tjx.png','2023-05-12 12:06:48','2023-05-12 12:06:48');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`name`,`userid`,`created_at`,`updated_at`) values 
(1,'Gilandra',10,'2023-05-14 06:27:49','2023-05-14 06:27:49'),
(2,'Faishal Rahmat',11,'2023-05-14 06:30:12','2023-05-14 06:30:12');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_03_02_041715_create_posts_table',1),
(6,'2023_03_02_131049_create_categories_table',1),
(7,'2023_03_10_083149_add_is_admin_to_users_table',1),
(8,'2023_03_18_024412_create_obats_table',1),
(9,'2023_04_27_064009_create_obat_categories_table',1),
(10,'2023_05_12_121510_create_polis_table',2),
(11,'2023_05_12_123129_poli',3),
(12,'2023_05_13_145759_create_ruangans_table',4),
(13,'2023_05_14_061119_create_dokters_table',5),
(14,'2023_05_14_192712_antrian',6),
(15,'2023_05_31_142121_rekam_medis',7),
(16,'2023_06_07_083203_surat_rujukan',8),
(17,'2023_06_08_222944_resep_obat',9);

/*Table structure for table `obat_categories` */

DROP TABLE IF EXISTS `obat_categories`;

CREATE TABLE `obat_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `obat_categories` */

insert  into `obat_categories`(`id`,`name`,`slug`,`image`,`created_at`,`updated_at`) values 
(1,'Vaksin','vaksin','obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png','2023-05-19 15:56:51','2023-05-19 15:56:51'),
(2,'Kapsul','kapsul','obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png','2023-05-19 15:56:51','2023-05-19 15:56:51');

/*Table structure for table `obats` */

DROP TABLE IF EXISTS `obats`;

CREATE TABLE `obats` (
  `kode_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `obats` */

insert  into `obats`(`kode_obat`,`nama_obat`,`kategori_obat`,`stok`,`harga`,`created_at`,`updated_at`) values 
('Kapsul-IN001','Intunal Xtra','2',47,100000,'2023-05-19 15:57:18','2023-06-09 04:19:04'),
('Vaksin-SB001','Vaksin SB','1',58,120000,'2023-05-19 15:57:18','2023-06-09 04:19:04'),
('Vaksin-SH001','Vaksin SH','1',165,100000,'2023-05-19 15:57:18','2023-06-09 04:17:54');

/*Table structure for table `p_resep_obat` */

DROP TABLE IF EXISTS `p_resep_obat`;

CREATE TABLE `p_resep_obat` (
  `kode_resep_obat` varchar(255) NOT NULL,
  `kode_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dosis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `p_resep_obat` */

insert  into `p_resep_obat`(`kode_resep_obat`,`kode_obat`,`dosis`) values 
('resep-1686284008','Vaksin-SH001',5),
('resep-1686284050','Vaksin-SH001',5),
('resep-1686284116','Vaksin-SH001',5),
('resep-1686284274','Vaksin-SH001',5),
('resep-1686284344','Vaksin-SB001',2),
('resep-1686284344','Kapsul-IN001',3);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `poli` */

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter` int NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `poli` */

insert  into `poli`(`kode`,`name`,`description`,`dokter`,`ruangan`,`jadwal`,`isActive`,`created_at`,`updated_at`) values 
('A002','Poli Anak','<div>Poli Untuk anak</div>',2,'01-001','08:00 s/d 13:00',1,'2023-05-14 19:20:37','2023-05-14 19:20:37'),
('U001','Poli Umum','<div>Poli untuk umum</div>',1,'01-002','08:00 s/d 14:00',1,'2023-05-14 19:22:38','2023-05-14 19:22:38'),
('K001','Poli KIA','<div>cek poli kia</div>',1,'01-001','07:00 s/d 15:00',1,'2023-05-19 15:32:29','2023-05-19 15:32:29');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`category_id`,`user_id`,`title`,`slug`,`image`,`excerpt`,`body`,`published_at`,`created_at`,`updated_at`) values 
(1,1,1,'Balita Indonesia','balita-indonesia','post-images/88b0vioVxEaeEy3dSKeWJFSHEiWGubIXtAV1kMla.png','Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.','<div>Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.</div>',NULL,'2023-05-12 12:08:06','2023-05-12 12:08:06');

/*Table structure for table `rekam_medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antrian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpjs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anamnesa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeriksaan_fisik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rekam_medis` */

insert  into `rekam_medis`(`kode`,`antrian`,`bpjs`,`anamnesa`,`pemeriksaan_fisik`,`diagnosa`,`tindakan`,`giz`,`created_at`,`updated_at`) values 
('A002-0001-1686284334','A002-0001',NULL,'cek','cek','cek','obat-resep','gzi','2023-06-09 04:18:54','2023-06-09 04:18:54');

/*Table structure for table `resep_obat` */

DROP TABLE IF EXISTS `resep_obat`;

CREATE TABLE `resep_obat` (
  `kode_resep_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rekamedis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_resep_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `resep_obat` */

insert  into `resep_obat`(`kode_resep_obat`,`kode_rekamedis`,`created_at`,`updated_at`) values 
('resep-1686284344','A002-0001-1686284334','2023-06-09 04:19:04','2023-06-09 04:19:04');

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ruangan` */

insert  into `ruangan`(`kode`,`name`,`status`,`created_at`,`updated_at`) values 
('01-001','Ruangan Lt 1 - 001',0,'2023-05-14 14:47:16','2023-05-14 14:47:18'),
('01-002','Ruangan Lt 1 - 002',0,'2023-05-14 07:49:40','2023-05-14 07:54:18');

/*Table structure for table `surat_rujukan` */

DROP TABLE IF EXISTS `surat_rujukan`;

CREATE TABLE `surat_rujukan` (
  `kode_rujukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rekammedis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_tindak_lanjut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_rujukan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `surat_rujukan` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepalakeluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsibpjs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpjs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `age` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cek` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nik_unique` (`NIK`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`NIK`,`alamat`,`kepalakeluarga`,`opsibpjs`,`bpjs`,`tgllahir`,`age`,`username`,`email`,`email_verified_at`,`password`,`cek`,`remember_token`,`created_at`,`updated_at`,`is_admin`) values 
(1,'admin','10121212012012010','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','admin','TIDAK',NULL,'2000-03-09',23,'admin','admin@email.com',NULL,'$2y$10$KtncpJF44p.h7UPAXTirluV96KrckTaEE7LpfxlHT8KY1ITvgXv7y',1,NULL,'2023-05-12 08:29:31','2023-05-12 08:30:21',1),
(2,'farmasi','10121212012012011','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','farmasi','TIDAK',NULL,'2000-03-09',23,'farmasi','farmasi@email.com',NULL,'$2y$10$U7F8Yd8f0uW2iYIDVmzlPud/rVJ8vN8jQH6hu5XenT2lJIqnzbs8G',1,NULL,'2023-05-12 08:31:19','2023-05-12 08:31:19',4),
(4,'administrasi','10121212012012014','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','administrasi','TIDAK',NULL,'2000-03-09',23,'administrasi','administrasi@email.com',NULL,'$2y$10$AXmHDElmWDdjjmCrGmgu2O.a9gUK/5UXLN2tQp4P30E2TR6gDbXOy',1,NULL,'2023-05-12 08:33:21','2023-05-12 08:33:21',3),
(5,'Muhammad Fadillah Abdul Aziz','101212120120120212','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','Fadil','YA','1011931212121','2000-03-09',23,'Fadillah','gozzafadillah@gmail.com',NULL,'$2y$10$vqvTkHXRoAdmkoT8PIPyXOMJtFH1e3pLU2G6q/rCJOcS/caIJYzXu',1,NULL,'2023-05-12 08:34:09','2023-05-12 08:34:09',0),
(9,'Dea Belinda','101212120120120192','JL Sarijadi No 1 A','Dea','TIDAK',NULL,'2000-03-09',23,'Dea','dea@gmail.com',NULL,'$2y$10$LhOLOGwWq0uxkSZucSzBVuCkF9hK7COA1yTLwZzG4x.J9oHMwZFya',1,NULL,'2023-05-14 06:26:20','2023-05-14 06:26:20',0),
(10,'Gilandra','10121212012012022','JL Sarinah No 1 A','Gilan','TIDAK',NULL,'2000-03-09',23,'Gilandra','Gilandra@dokter.com',NULL,'$2y$10$lFXYwGm0.RVSljUWk4B1auLRaWbZ5hr3cMj9yOCQbMOS9KuXR5Y6.',1,NULL,'2023-05-14 06:27:49','2023-05-14 06:27:49',2),
(11,'Faishal Rahmat','10121212012012009','JL Sarijadi No 1 A','Dr Faishal','TIDAK',NULL,'2000-03-09',23,'Faishal','faishal@dokter.com',NULL,'$2y$10$6AgKjiUfTBIjOl2JQWKfzOYbMkb/zSa4copAjV/RTH58c1NfxTKwy',1,NULL,'2023-05-14 06:30:12','2023-05-14 06:30:12',2),
(12,'Idris Mardefi','101212120120120220','JL Sarijadi No 1 B','Idris','YA','1011931212130','2000-03-09',23,'Idris','idris@gmail.com',NULL,'$2y$10$SN4MBj.KBOB8rwoyxbOGAONcX5Ww4ZecRDki4U8js5XDKddzYBa0.',0,NULL,'2023-05-19 15:45:12','2023-05-19 15:50:12',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
