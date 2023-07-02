/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.30 : Database - puskemasbinong
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `kode_antrian` varchar(255)  NOT NULL,
  `antrian` varchar(255)  DEFAULT NULL,
  `name` varchar(255)  NOT NULL,
  `NIK` varchar(255)  NOT NULL,
  `tgllahir` varchar(255)  NOT NULL,
  `kode_poli` varchar(255)  NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `antrian` */

insert  into `antrian`(`kode_antrian`,`antrian`,`name`,`NIK`,`tgllahir`,`kode_poli`,`status`,`created_at`,`updated_at`) values 
('A002-0001-1687668500','A002-0001','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-25 04:48:20','2023-06-25 04:48:20'),
('A002-0002-1687753270','A002-0002','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-26 04:21:10','2023-06-26 04:22:39'),
('A002-0003-1687754034','A002-0003','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-26 04:33:54','2023-06-26 06:20:19'),
('A002-0004-1687961396','A002-0004','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-28 14:09:56','2023-06-28 14:09:56'),
('A002-0005-1687962614','A002-0005','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-28 14:30:14','2023-06-28 14:41:56'),
('A002-0006-1687964764','A002-0006','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-06-28 15:06:04','2023-06-28 15:08:22'),
('A002-0007-1688273735','A002-0007','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-07-02 04:55:35','2023-07-02 04:55:35'),
('A002-0008-1688290258','A002-0008','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-07-02 09:30:58','2023-07-02 09:30:58'),
('A002-0009-1688292356','A002-0009','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-07-02 10:05:56','2023-07-02 10:05:56'),
('A002-0010-1688294592','A002-0010','Idris Mardefi','101212120120120220','2000-03-09','A002',1,'2023-07-02 10:43:12','2023-07-02 10:43:12');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`image`,`created_at`,`updated_at`) values 
(1,'Balita','balita','category-images/IJ4gFd3mXETQ5u41sjCSHf4WWkmgqZbD7ghw7tjx.png','2023-05-12 12:06:48','2023-05-12 12:06:48');

/*Table structure for table `category_pelayanan` */

DROP TABLE IF EXISTS `category_pelayanan`;

CREATE TABLE `category_pelayanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_category` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category_pelayanan` */

insert  into `category_pelayanan`(`id`,`nama_category`,`created_at`,`updated_at`) values 
(1,'pelayanan kesehatan','2023-06-09 20:36:55','2023-06-09 20:36:58'),
(2,'pelayanan penunjang','2023-06-09 20:37:00','2023-06-09 20:37:03'),
(3,'tarif tambahan poli gigi','2023-06-09 20:37:03','2023-06-09 20:37:36'),
(4,'tarif tambahan poli bidan','2023-06-09 20:37:03','2023-06-09 20:37:36'),
(5,'tarif tambahan UGD','2023-06-09 20:37:03','2023-06-09 20:37:36'),
(6,'tarif tambahan laboratorium','2023-06-09 20:37:03','2023-06-09 20:37:36');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `userid` bigint NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`name`,`userid`,`status`,`created_at`,`updated_at`) values 
(1,'Gilandra',10,0,'2023-05-14 06:27:49','2023-06-21 14:41:09'),
(2,'Faishal Rahmat',11,1,'2023-05-14 06:30:12','2023-06-21 14:41:09'),
(3,'Fikri',15,1,'2023-05-14 06:30:12','2023-06-21 14:47:28'),
(4,'Muhammad Fadillah Abdul Aziz',16,0,'2023-07-02 05:59:58','2023-07-02 05:59:58');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255)  NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

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
(17,'2023_06_08_222944_resep_obat',9),
(18,'2023_06_09_133118_category_pelayanan',10),
(19,'2023_06_09_133126_pelayanan',11),
(20,'2023_06_13_120610_p_pelayanan',12),
(21,'2023_06_13_121144_p_pelayanan',13);

/*Table structure for table `nota_pembayaran` */

DROP TABLE IF EXISTS `nota_pembayaran`;

CREATE TABLE `nota_pembayaran` (
  `kode_notapembayaran` varchar(255) NOT NULL,
  `kode_resepobat` varchar(255) DEFAULT NULL,
  `kode_rujukan` varchar(255) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_notapembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nota_pembayaran` */

insert  into `nota_pembayaran`(`kode_notapembayaran`,`kode_resepobat`,`kode_rujukan`,`total`,`created_at`,`updated_at`) values 
('pembayaran-1687668607','resep-1687668569',NULL,1730000,'2023-06-25 04:50:07','2023-06-25 04:50:07'),
('pembayaran-1687753407',NULL,'rujukan-1687753359',89000,'2023-06-26 04:23:27','2023-06-26 04:23:27'),
('pembayaran-1687961470',NULL,'101021312031031310',89000,'2023-06-28 14:11:10','2023-06-28 14:11:10'),
('pembayaran-1687961477','resep-1687961444',NULL,574000,'2023-06-28 14:11:17','2023-06-28 14:11:17'),
('pembayaran-1687963355',NULL,'1010213120312131231',309000,'2023-06-28 14:42:35','2023-06-28 14:42:35'),
('pembayaran-1687964924',NULL,'10102131203103131012',84000,'2023-06-28 15:08:44','2023-06-28 15:08:44'),
('pembayaran-1688273879','resep-1688273841',NULL,289000,'2023-07-02 04:57:59','2023-07-02 04:57:59'),
('pembayaran-1688290330','resep-1688290298',NULL,484000,'2023-07-02 09:32:10','2023-07-02 09:32:10'),
('pembayaran-1688292446','resep-1688292409',NULL,1074000,'2023-07-02 10:07:26','2023-07-02 10:07:26'),
('pembayaran-1688294652','resep-1688294633',NULL,2349000,'2023-07-02 10:44:12','2023-07-02 10:44:12');

/*Table structure for table `obat_categories` */

DROP TABLE IF EXISTS `obat_categories`;

CREATE TABLE `obat_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `obat_categories` */

insert  into `obat_categories`(`id`,`name`,`slug`,`image`,`created_at`,`updated_at`) values 
(1,'Vaksin','vaksin','obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png','2023-05-19 15:56:51','2023-05-19 15:56:51'),
(2,'Kapsul','kapsul','obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png','2023-05-19 15:56:51','2023-05-19 15:56:51');

/*Table structure for table `obats` */

DROP TABLE IF EXISTS `obats`;

CREATE TABLE `obats` (
  `kode_obat` varchar(255)  NOT NULL,
  `nama_obat` varchar(255)  NOT NULL,
  `kategori_obat` varchar(255)  NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `obats` */

insert  into `obats`(`kode_obat`,`nama_obat`,`kategori_obat`,`stok`,`harga`,`created_at`,`updated_at`) values 
('Kapsul-IN001','Intunal Xtra','2',90,6000,'2023-05-19 15:57:18','2023-07-02 10:44:36'),
('Vaksin-SB001','Vaksin SB','1',90,120000,'2023-05-19 15:57:18','2023-07-02 10:44:36'),
('Vaksin-SH001','Vaksin SH','1',90,100000,'2023-05-19 15:57:18','2023-07-02 10:44:36');

/*Table structure for table `p_pelayanan` */

DROP TABLE IF EXISTS `p_pelayanan`;

CREATE TABLE `p_pelayanan` (
  `pelayanan_id` bigint NOT NULL,
  `kode_rekammedis` varchar(255)  NOT NULL,
  `biaya` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `p_pelayanan` */

insert  into `p_pelayanan`(`pelayanan_id`,`kode_rekammedis`,`biaya`,`created_at`,`updated_at`) values 
(1,'A002-0001-1687668500-1687668532',14000,NULL,NULL),
(2,'A002-0001-1687668500-1687668532',75000,NULL,NULL),
(7,'A002-0001-1687668500-1687668532',50000,NULL,NULL),
(8,'A002-0001-1687668500-1687668532',50000,NULL,NULL),
(26,'A002-0001-1687668500-1687668532',43000,NULL,NULL),
(27,'A002-0001-1687668500-1687668532',14000,NULL,NULL),
(33,'A002-0001-1687668500-1687668532',42000,NULL,NULL),
(34,'A002-0001-1687668500-1687668532',42000,NULL,NULL),
(1,'A002-0002-1687753270-1687753327',14000,NULL,NULL),
(2,'A002-0002-1687753270-1687753327',75000,NULL,NULL),
(1,'A002-0003-1687754034-1687754251',14000,NULL,NULL),
(2,'A002-0003-1687754034-1687754251',75000,NULL,NULL),
(1,'A002-0004-1687961396-1687961419',14000,NULL,NULL),
(1,'A002-0005-1687962614-1687963258',14000,NULL,NULL),
(2,'A002-0005-1687962614-1687963258',75000,NULL,NULL),
(10,'A002-0005-1687962614-1687963258',150000,NULL,NULL),
(12,'A002-0005-1687962614-1687963258',70000,NULL,NULL),
(1,'A002-0006-1687964764-1687964828',14000,NULL,NULL),
(12,'A002-0006-1687964764-1687964828',70000,NULL,NULL),
(1,'A002-0007-1688273735-1688273824',14000,NULL,NULL),
(2,'A002-0007-1688273735-1688273824',75000,NULL,NULL),
(1,'A002-0008-1688290258-1688290282',14000,NULL,NULL),
(12,'A002-0008-1688290258-1688290282',70000,NULL,NULL),
(1,'A002-0009-1688292356-1688292383',14000,NULL,NULL),
(11,'A002-0009-1688292356-1688292383',150000,NULL,NULL),
(12,'A002-0009-1688292356-1688292383',70000,NULL,NULL),
(1,'A002-0010-1688294592-1688294614',14000,NULL,NULL),
(2,'A002-0010-1688294592-1688294614',75000,NULL,NULL);

/*Table structure for table `p_resep_obat` */

DROP TABLE IF EXISTS `p_resep_obat`;

CREATE TABLE `p_resep_obat` (
  `kode_resep_obat` varchar(255) NOT NULL,
  `kode_obat` varchar(255)  NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `qty` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `p_resep_obat` */

insert  into `p_resep_obat`(`kode_resep_obat`,`kode_obat`,`dosis`,`qty`,`status`,`created_at`,`updated_at`) values 
('resep-1687668569','Kapsul-IN001','2x1',2,1,NULL,'2023-07-02 10:44:36'),
('resep-1687961444','Vaksin-SB001','2x sehari',3,1,NULL,'2023-07-02 10:44:36'),
('resep-1687961444','Kapsul-IN001','1x sehari',2,1,NULL,'2023-07-02 10:44:36'),
('resep-1688273841','Kapsul-IN001','2x1',2,1,NULL,'2023-07-02 10:44:36'),
('resep-1688290298','Kapsul-IN001','1x sehari',4,1,NULL,'2023-07-02 10:44:36'),
('resep-1688292409','Vaksin-SB001','1 x sehari',2,1,NULL,'2023-07-02 10:44:36'),
('resep-1688292409','Vaksin-SH001','10x1.',4,1,NULL,'2023-07-02 10:44:36'),
('resep-1688292409','Kapsul-IN001','2x1',2,1,NULL,'2023-07-02 10:44:36'),
('resep-1688294633','Vaksin-SB001','dosis ...',10,1,NULL,'2023-07-02 10:44:36'),
('resep-1688294633','Vaksin-SH001','dosis ...',10,1,NULL,'2023-07-02 10:44:36'),
('resep-1688294633','Kapsul-IN001','dosis ...',10,1,NULL,'2023-07-02 10:44:36');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pelayanan` */

DROP TABLE IF EXISTS `pelayanan`;

CREATE TABLE `pelayanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` bigint NOT NULL,
  `layanan` varchar(255)  NOT NULL,
  `biaya` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelayanan` */

insert  into `pelayanan`(`id`,`category`,`layanan`,`biaya`,`created_at`,`updated_at`) values 
(1,1,'pelayanan rawat jalan',14000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(2,1,'pelayanan UGD dan Observasi',75000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(3,1,'pelayanan observasi pasien poned',75000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(4,1,'pemeriksaan Haji tahap 1',150000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(5,1,'keuring untuk anak sekolah atau kuliah',15000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(6,1,'keuring umum',25000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(7,1,'pemberkasan casn/p3k',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(8,1,'keuring calon pengantin',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(9,1,'keuring polisi asuransi',100000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(10,2,'pelayanan ambulan angkut jenazah 5km',150000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(11,2,'pelayanan angkut jenazah 50km',150000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(12,3,'tumpatan tetap dengan GIC',70000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(13,3,'pencabutan gigi dengan CE',30000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(14,3,'pencabutan gigi dengan anestesi lokal (tanpa penyulit)',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(15,3,'pencabutan gigi dengan anestesi lokal (dengan penyulit)',100000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(16,4,'oksigen 30 menit pertama',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(17,4,'oksigen 30 menit berikutnya',15000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(18,5,'pemasangan botol infus pertama',150000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(19,5,'pemasangan infus tiap botol berikutnya',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(20,5,'tindakan jahit luka 1 sampai dengan 3 jahitan ',75000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(21,5,'tindakan jahit luka setiap jahitan berikutnya',10000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(22,5,'tindakan angkat jahitan',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(23,5,'tindakan ekstrasi kuku',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(24,5,'tindakan simkursisi',350000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(25,5,'tindakan perawatan luka dengan penyulit',50000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(26,6,'carik celup urine sendimen',43000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(27,6,'hemogoblin',14000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(28,6,'golongan darah ABO',14000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(29,6,'golongan darah ABO + Rhesus',14000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(30,6,'mikroskopis ZN(BTA)1x',85000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(31,6,'mikroskopis ZN(BTA)3x',100000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(32,6,'widal/aglutinassi',42000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(33,6,'asam urat',42000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43'),
(34,6,'glukosa',42000.00,'2023-06-09 20:53:43','2023-06-09 20:53:43');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255)  NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `poli` */

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `kode_poli` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `description` varchar(255)  NOT NULL,
  `dokter` int NOT NULL,
  `ruangan` varchar(255)  NOT NULL,
  `jadwal` varchar(255)  NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `poli` */

insert  into `poli`(`kode_poli`,`name`,`description`,`dokter`,`ruangan`,`jadwal`,`isActive`,`created_at`,`updated_at`) values 
('A002','Poli Anak','<div>Poli Untuk anak</div>',2,'01-001','08:00 s/d 13:00',1,'2023-05-14 19:20:37','2023-05-14 19:20:37'),
('002','Poli','<div>cej</div>',3,'01-002','02:02 s/d 14:00',1,'2023-06-21 14:47:28','2023-06-21 14:47:28');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  DEFAULT NULL,
  `excerpt` text  NOT NULL,
  `body` text  NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `posts` */

insert  into `posts`(`id`,`category_id`,`user_id`,`title`,`slug`,`image`,`excerpt`,`body`,`published_at`,`created_at`,`updated_at`) values 
(1,1,1,'Balita Indonesia','balita-indonesia','post-images/88b0vioVxEaeEy3dSKeWJFSHEiWGubIXtAV1kMla.png','Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.','<div>Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.</div>',NULL,'2023-05-12 12:08:06','2023-05-12 12:08:06'),
(2,1,1,'cek','cek','post-images/O11atREyBCjrXAGGn5Khj1DpJx0dOtkTWRbpSm6U.jpg','cek','<div>cek</div>',NULL,'2023-06-20 16:23:12','2023-06-20 16:23:12');

/*Table structure for table `rekam_medis` */

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `kode_rekammedis` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `antrian` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `bpjs` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `anamnesa` text  NOT NULL,
  `pemeriksaan_fisik` text  NOT NULL,
  `diagnosa` varchar(255)  NOT NULL,
  `tindakan` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekam_medis` */

insert  into `rekam_medis`(`kode_rekammedis`,`antrian`,`bpjs`,`anamnesa`,`pemeriksaan_fisik`,`diagnosa`,`tindakan`,`created_at`,`updated_at`) values 
('A002-0001-1687668500-1687668532','A002-0001-1687668500','10119312122131','cek','cek','cek','obat-resep','2023-06-25 04:48:52','2023-06-25 04:48:52'),
('A002-0002-1687753270-1687753327','A002-0002-1687753270','10119312122131','cek','cek','cek','surat-rujukan','2023-06-26 04:22:08','2023-06-26 04:22:08'),
('A002-0003-1687754034-1687754251','A002-0003-1687754034','10119312122131','cek','cek','cek','surat-rujukan','2023-06-26 04:37:31','2023-06-26 04:37:31'),
('A002-0004-1687961396-1687961419','A002-0004-1687961396','10119312122131','cek','cek','cek','obat-resep','2023-06-28 14:10:19','2023-06-28 14:10:19'),
('A002-0005-1687962614-1687963258','A002-0005-1687962614','10119312122131','cek','cek','cek','surat-rujukan','2023-06-28 14:40:59','2023-06-28 14:40:59'),
('A002-0006-1687964764-1687964828','A002-0006-1687964764','10119312122131','cek','cek','cek','surat-rujukan','2023-06-28 15:07:08','2023-06-28 15:07:08'),
('A002-0007-1688273735-1688273824','A002-0007-1688273735','10119312122131','cek','cek','cek diagnosa','obat-resep','2023-07-02 04:57:04','2023-07-02 04:57:04'),
('A002-0008-1688290258-1688290282','A002-0008-1688290258','10119312122131','cek','cek','cek','obat-resep','2023-07-02 09:31:22','2023-07-02 09:31:22'),
('A002-0009-1688292356-1688292383','A002-0009-1688292356','10119312122131','cek','cek','cek','obat-resep','2023-07-02 10:06:23','2023-07-02 10:06:23'),
('A002-0010-1688294592-1688294614','A002-0010-1688294592','10119312122131','cek','cek','cek','obat-resep','2023-07-02 10:43:34','2023-07-02 10:43:34');

/*Table structure for table `resep_obat` */

DROP TABLE IF EXISTS `resep_obat`;

CREATE TABLE `resep_obat` (
  `kode_resep_obat` varchar(255)  NOT NULL,
  `kode_rekamedis` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_resep_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `resep_obat` */

insert  into `resep_obat`(`kode_resep_obat`,`kode_rekamedis`,`status`,`created_at`,`updated_at`) values 
('resep-1687668569','A002-0001-1687668500-1687668532',1,'2023-06-25 04:49:29','2023-07-02 09:33:51'),
('resep-1687961444','A002-0004-1687961396-1687961419',1,'2023-06-28 14:10:44','2023-06-28 14:12:17'),
('resep-1688273841','A002-0007-1688273735-1688273824',1,'2023-07-02 04:57:21','2023-07-02 05:00:03'),
('resep-1688290298','A002-0008-1688290258-1688290282',1,'2023-07-02 09:31:38','2023-07-02 09:40:17'),
('resep-1688292409','A002-0009-1688292356-1688292383',1,'2023-07-02 10:06:49','2023-07-02 10:40:13'),
('resep-1688294633','A002-0010-1688294592-1688294614',1,'2023-07-02 10:43:53','2023-07-02 10:44:36');

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `kode` varchar(255)  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ruangan` */

insert  into `ruangan`(`kode`,`name`,`status`,`created_at`,`updated_at`) values 
('01-001','Ruangan Lt 1 - 001',1,'2023-05-14 14:47:16','2023-06-21 14:40:10'),
('01-002','Ruangan Lt 1 - 002',1,'2023-05-14 07:49:40','2023-06-21 14:47:28');

/*Table structure for table `surat_rujukan` */

DROP TABLE IF EXISTS `surat_rujukan`;

CREATE TABLE `surat_rujukan` (
  `kode_rujukan` varchar(255)  NOT NULL,
  `kode_rekammedis` varchar(255)  NOT NULL,
  `fasilitas` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `rencana_tindak_lanjut` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_rujukan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat_rujukan` */

insert  into `surat_rujukan`(`kode_rujukan`,`kode_rekammedis`,`fasilitas`,`rencana_tindak_lanjut`,`created_at`,`updated_at`) values 
('101021312031031310','A002-0003-1687754034-1687754251','Perlu Pemeriksaan Penunjang','Perlu Pemeriksaan Penunjang','2023-06-26 06:20:19','2023-06-26 06:20:19'),
('10102131203103131012','A002-0006-1687964764-1687964828','Perlu Pemeriksaan Penunjang',NULL,'2023-06-28 15:08:22','2023-06-28 15:08:22'),
('1010213120312131231','A002-0005-1687962614-1687963258','Perlu Pemeriksaan Penunjang,Masih membutuhkan terapi lanjut,cek','Perlu Pemeriksaan Penunjang,Melihat efek Therapy sebelumnya,cek 123','2023-06-28 14:41:56','2023-06-28 14:41:56'),
('rujukan-1687753359','A002-0002-1687753270-1687753327','Perlu Pemeriksaan Penunjang','Perlu Pemeriksaan Penunjang','2023-06-26 04:22:39','2023-06-26 04:22:39');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `invoice` varchar(255) NOT NULL,
  `kode_notapembayaran` varchar(255)  DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

insert  into `transaksi`(`invoice`,`kode_notapembayaran`,`total`,`status`,`created_at`,`updated_at`) values 
('invoice-1687668607','pembayaran-1687668607',1730000,'Settled','2023-06-25 04:50:07','2023-06-25 04:50:13'),
('invoice-1687753407','pembayaran-1687753407',89000,'Settled','2023-06-26 04:23:27','2023-06-26 04:23:31'),
('invoice-1687961470','pembayaran-1687961470',89000,'Settled','2023-06-28 14:11:10','2023-06-28 14:11:26'),
('invoice-1687961477','pembayaran-1687961477',574000,'Settled','2023-06-28 14:11:18','2023-06-28 14:11:25'),
('invoice-1687963355','pembayaran-1687963355',309000,'Settled','2023-06-28 14:42:35','2023-06-28 14:42:40'),
('invoice-1687964924','pembayaran-1687964924',84000,'Settled','2023-06-28 15:08:44','2023-06-28 15:08:47'),
('invoice-1688273879','pembayaran-1688273879',289000,'Settled','2023-07-02 04:57:59','2023-07-02 04:58:10'),
('invoice-1688290330','pembayaran-1688290330',484000,'Settled','2023-07-02 09:32:10','2023-07-02 09:32:13'),
('invoice-1688292446','pembayaran-1688292446',1074000,'Settled','2023-07-02 10:07:26','2023-07-02 10:07:30'),
('invoice-1688294652','pembayaran-1688294652',2349000,'Settled','2023-07-02 10:44:12','2023-07-02 10:44:15');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `NIK` varchar(255)  NOT NULL,
  `alamat` varchar(255)  NOT NULL,
  `kepalakeluarga` varchar(255)  NOT NULL,
  `opsibpjs` varchar(255)  NOT NULL,
  `bpjs` varchar(255)  DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `age` int NOT NULL,
  `username` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `cek` int NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nik_unique` (`NIK`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`NIK`,`alamat`,`kepalakeluarga`,`opsibpjs`,`bpjs`,`tgllahir`,`age`,`username`,`email`,`email_verified_at`,`password`,`cek`,`remember_token`,`created_at`,`updated_at`,`is_admin`) values 
(1,'admin','10121212012012010','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','admin','TIDAK',NULL,'2000-03-09',23,'admin','admin@email.com',NULL,'$2y$10$KtncpJF44p.h7UPAXTirluV96KrckTaEE7LpfxlHT8KY1ITvgXv7y',1,NULL,'2023-05-12 08:29:31','2023-05-12 08:30:21',1),
(2,'farmasi','10121212012012011','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','farmasi','TIDAK',NULL,'2000-03-09',23,'farmasi','farmasi@email.com',NULL,'$2y$10$U7F8Yd8f0uW2iYIDVmzlPud/rVJ8vN8jQH6hu5XenT2lJIqnzbs8G',1,NULL,'2023-05-12 08:31:19','2023-05-12 08:31:19',4),
(4,'administrasi','10121212012012014','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','administrasi','TIDAK',NULL,'2000-03-09',23,'administrasi','administrasi@email.com',NULL,'$2y$10$AXmHDElmWDdjjmCrGmgu2O.a9gUK/5UXLN2tQp4P30E2TR6gDbXOy',1,NULL,'2023-05-12 08:33:21','2023-05-12 08:33:21',3),
(5,'Muhammad Fadillah Abdul Aziz','101212120120120212','Jl kav korobokan. kel Citeureup. Kec Cimahi utara','Fadil','YA','1011931212121','2000-03-09',23,'Fadillah','gozzafadillah@gmail.com',NULL,'$2y$10$vqvTkHXRoAdmkoT8PIPyXOMJtFH1e3pLU2G6q/rCJOcS/caIJYzXu',1,NULL,'2023-05-12 08:34:09','2023-05-12 08:34:09',0),
(9,'Dea Belinda','101212120120120192','JL Sarijadi No 1 A','Dea','TIDAK',NULL,'2000-03-09',23,'Dea','dea@gmail.com',NULL,'$2y$10$LhOLOGwWq0uxkSZucSzBVuCkF9hK7COA1yTLwZzG4x.J9oHMwZFya',1,NULL,'2023-05-14 06:26:20','2023-05-14 06:26:20',0),
(10,'Gilandra','10121212012012022','JL Sarinah No 1 A','Gilan','TIDAK',NULL,'2000-03-09',23,'Gilandra','Gilandra@dokter.com',NULL,'$2y$10$lFXYwGm0.RVSljUWk4B1auLRaWbZ5hr3cMj9yOCQbMOS9KuXR5Y6.',1,NULL,'2023-05-14 06:27:49','2023-05-14 06:27:49',2),
(11,'Faishal Rahmat','10121212012012009','JL Sarijadi No 1 A','Dr Faishal','TIDAK',NULL,'2000-03-09',23,'Faishal','faishal@dokter.com',NULL,'$2y$10$6AgKjiUfTBIjOl2JQWKfzOYbMkb/zSa4copAjV/RTH58c1NfxTKwy',1,NULL,'2023-05-14 06:30:12','2023-05-14 06:30:12',2),
(12,'Idris Mardefi','101212120120120220','JL Sarijadi No 1 B','Idris','YA','10119312122131','2000-03-09',23,'Idris','idris@gmail.com',NULL,'$2y$10$SN4MBj.KBOB8rwoyxbOGAONcX5Ww4ZecRDki4U8js5XDKddzYBa0.',1,NULL,'2023-05-19 15:45:12','2023-06-10 13:05:23',0),
(13,'Aldy Pratama','101212131212121212131414','JL Sarijadi No 1 A','Aldy','YA','1230192381241031312','2000-03-09',23,'Aldy','aldy@gmail.com',NULL,'$2y$10$SN4MBj.KBOB8rwoyxbOGAONcX5Ww4ZecRDki4U8js5XDKddzYBa0.',0,NULL,'2023-06-11 11:46:43','2023-06-20 16:48:50',0),
(14,'Kiana Sekar','123123120841048123','JL Sarijadi No 1 A','Sumanto','YA','12212113213131','1945-02-01',78,'Kiana','kiana@gmail.com',NULL,'$2y$10$JNLggFSRvvpToQuXmHPHY.C9gUVo95FexAhzzNLuTOQvvc2Ml86uG',0,NULL,'2023-06-20 17:07:37','2023-06-20 17:09:32',0),
(15,'Fikri','10121212012012041','JL Sarijadi No 1 A','Dr Fikri','TIDAK',NULL,'2000-03-09',23,'Fikri','fikri@dokter.com',NULL,'$2y$10$6AgKjiUfTBIjOl2JQWKfzOYbMkb/zSa4copAjV/RTH58c1NfxTKwy',1,NULL,'2023-05-14 06:30:12','2023-05-14 06:30:12',2),
(16,'Muhammad Fadillah Abdul Aziz','1209813012830213','JL Sarijadi No 1 A','Fadillah','TIDAK',NULL,'2000-03-09',23,'Dokter Fadil','fadillah@dokter.com',NULL,'$2y$10$PGCyYyMfqRsW.HGQNrNCb.zj4tTCO4PHLt.phdwy.QXaof8LpJ/0.',1,NULL,'2023-07-02 05:59:58','2023-07-02 05:59:58',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
