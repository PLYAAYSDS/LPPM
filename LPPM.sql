/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.4.6-MariaDB : Database - lppm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`lppm` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lppm`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `lppm_anggota_dosen` */

DROP TABLE IF EXISTS `lppm_anggota_dosen`;

CREATE TABLE `lppm_anggota_dosen` (
  `angggota_dosen_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`angggota_dosen_id`),
  KEY `FK_lppm_anggota_dosen` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_anggota_dosen` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_anggota_dosen` */

insert  into `lppm_anggota_dosen`(`angggota_dosen_id`,`proposal_penelitian_id`,`dosen_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (6,14,7,0,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(7,14,15,0,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(8,17,15,0,NULL,NULL,'2020-08-27 02:36:00',NULL,'2020-08-27 02:36:00',NULL),(9,17,7,0,NULL,NULL,'2020-08-27 03:40:57',NULL,'2020-08-27 03:40:57',NULL),(10,17,21,0,NULL,NULL,'2020-08-27 03:40:57',NULL,'2020-08-27 03:40:57',NULL),(11,20,7,0,NULL,NULL,'2020-08-27 03:51:21',NULL,'2020-08-27 03:51:21',NULL),(12,21,1,0,NULL,NULL,'2020-08-27 13:59:33',NULL,'2020-08-27 13:59:33',NULL),(13,22,14,0,NULL,NULL,'2020-08-27 14:00:25',NULL,'2020-08-27 14:00:25',NULL),(27,23,2,0,NULL,NULL,NULL,NULL,NULL,NULL),(28,23,3,0,NULL,NULL,NULL,NULL,NULL,NULL),(30,23,5,0,NULL,NULL,NULL,NULL,NULL,NULL),(32,24,14,0,NULL,NULL,'2020-08-28 09:17:44',NULL,'2020-08-28 09:17:44',NULL),(33,24,14,0,NULL,NULL,'2020-08-28 09:18:09',NULL,'2020-08-28 09:18:09',NULL),(34,25,14,0,NULL,NULL,'2020-08-28 09:37:53',NULL,'2020-08-28 09:37:53',NULL),(35,26,14,0,NULL,NULL,'2020-08-28 14:52:45',NULL,'2020-08-28 14:52:45',NULL),(36,27,14,0,NULL,NULL,'2020-08-29 02:13:15',NULL,'2020-08-29 02:13:15',NULL);

/*Table structure for table `lppm_anggota_non_dosen` */

DROP TABLE IF EXISTS `lppm_anggota_non_dosen`;

CREATE TABLE `lppm_anggota_non_dosen` (
  `anggota_non_dosen_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(11) DEFAULT NULL,
  `dim_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`anggota_non_dosen_id`),
  KEY `FK_lppm_anggota_non_dosen` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_anggota_non_dosen` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_anggota_non_dosen` */

insert  into `lppm_anggota_non_dosen`(`anggota_non_dosen_id`,`proposal_penelitian_id`,`dim_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (6,14,1306,0,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(7,14,1493,0,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(8,17,1298,0,NULL,NULL,'2020-08-27 02:36:00',NULL,'2020-08-27 02:36:00',NULL),(9,20,1306,0,NULL,NULL,'2020-08-27 03:51:21',NULL,'2020-08-27 03:51:21',NULL),(10,21,1298,0,NULL,NULL,'2020-08-27 13:59:33',NULL,'2020-08-27 13:59:33',NULL),(11,22,1306,0,NULL,NULL,'2020-08-27 14:00:25',NULL,'2020-08-27 14:00:25',NULL),(12,23,1306,0,NULL,NULL,'2020-08-28 04:53:53',NULL,'2020-08-28 04:53:53',NULL),(14,23,1288,0,NULL,NULL,NULL,NULL,NULL,NULL),(15,24,1306,0,NULL,NULL,'2020-08-28 09:15:56',NULL,'2020-08-28 09:15:56',NULL),(16,25,1298,0,NULL,NULL,'2020-08-28 09:37:53',NULL,'2020-08-28 09:37:53',NULL),(17,26,1306,0,NULL,NULL,'2020-08-28 14:52:45',NULL,'2020-08-28 14:52:45',NULL),(18,27,1390,0,NULL,NULL,'2020-08-29 02:13:15',NULL,'2020-08-29 02:13:15',NULL);

/*Table structure for table `lppm_anggota_staff_pengajar` */

DROP TABLE IF EXISTS `lppm_anggota_staff_pengajar`;

CREATE TABLE `lppm_anggota_staff_pengajar` (
  `anggota_staff_pengajar_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(10) DEFAULT NULL,
  `pegawai_id` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`anggota_staff_pengajar_id`),
  KEY `FK_lppm_anggota_staff_pengajar` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_anggota_staff_pengajar` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_anggota_staff_pengajar` */

insert  into `lppm_anggota_staff_pengajar`(`anggota_staff_pengajar_id`,`proposal_penelitian_id`,`pegawai_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (6,14,167,NULL,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(7,14,180,NULL,NULL,NULL,'2020-08-26 04:22:12',NULL,'2020-08-26 04:22:12',NULL),(8,17,167,NULL,NULL,NULL,'2020-08-27 02:36:00',NULL,'2020-08-27 02:36:00',NULL),(9,20,167,NULL,NULL,NULL,'2020-08-27 03:51:21',NULL,'2020-08-27 03:51:21',NULL),(10,21,170,NULL,NULL,NULL,'2020-08-27 13:59:33',NULL,'2020-08-27 13:59:33',NULL),(11,22,169,NULL,NULL,NULL,'2020-08-27 14:00:25',NULL,'2020-08-27 14:00:25',NULL),(13,23,142,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,23,145,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,24,168,NULL,NULL,NULL,'2020-08-28 09:15:58',NULL,'2020-08-28 09:15:58',NULL),(16,25,168,NULL,NULL,NULL,'2020-08-28 09:37:53',NULL,'2020-08-28 09:37:53',NULL),(17,26,168,NULL,NULL,NULL,'2020-08-28 14:52:45',NULL,'2020-08-28 14:52:45',NULL),(18,27,167,NULL,NULL,NULL,'2020-08-29 02:13:16',NULL,'2020-08-29 02:13:16',NULL);

/*Table structure for table `lppm_dokumen_proposal_penelitian` */

DROP TABLE IF EXISTS `lppm_dokumen_proposal_penelitian`;

CREATE TABLE `lppm_dokumen_proposal_penelitian` (
  `dokumen_proposal_penelitian_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(10) DEFAULT NULL,
  `dokumen_proposal_penelitian` varchar(255) DEFAULT NULL,
  `dokumen_tipe` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`dokumen_proposal_penelitian_id`),
  KEY `FK_lppm_dokumen_proposal_penelitian` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_dokumen_proposal_penelitian` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_dokumen_proposal_penelitian` */

insert  into `lppm_dokumen_proposal_penelitian`(`dokumen_proposal_penelitian_id`,`proposal_penelitian_id`,`dokumen_proposal_penelitian`,`dokumen_tipe`,`created_at`,`updated_at`) values (6,14,'Alfred Chrisdianto Simanjuntak contract[745].doc','Kontrak','2020-08-26 05:15:36','2020-08-26 05:15:36'),(8,14,'android.docx','Laporan Harian','2020-08-26 05:19:27','2020-08-26 05:19:27'),(9,14,'container 3.docx','Laporan Harian','2020-08-26 05:44:57','2020-08-26 05:44:57'),(10,14,'2 dan 4.docx','Laporan Kemajuan','2020-08-26 05:50:41','2020-08-26 05:50:41'),(11,14,'ete pembeli.bpm','Laporan Akhir','2020-08-26 08:10:33','2020-08-26 08:10:33'),(12,14,'Lampiran B.1.docx','Kontrak','2020-08-27 03:45:34','2020-08-27 03:45:34'),(13,14,'Lampiran B.3.docx','Laporan Kemajuan','2020-08-27 03:45:59','2020-08-27 03:45:59'),(14,17,'TA05-dokumen-jawaban-sidang.docx','Kontrak','2020-08-27 03:47:07','2020-08-27 03:47:07'),(15,17,'pernyataan Alfred.docx','Laporan Kemajuan','2020-08-27 03:47:21','2020-08-27 03:47:21'),(16,17,'Lampiran B.3.docx','Laporan Akhir','2020-08-27 03:49:32','2020-08-27 03:49:32'),(17,20,'Lampiran B.1.docx','Laporan Akhir','2020-08-27 03:51:21','2020-08-27 03:51:21'),(18,22,'jawaban.docx','Laporan Akhir','2020-08-27 14:00:25','2020-08-27 14:00:25'),(19,22,'jawaban.docx','SK','2020-08-27 14:20:40','2020-08-27 14:20:40'),(20,20,'jawaban.docx','Kontrak','2020-08-27 15:03:33','2020-08-27 15:03:33'),(21,20,'11416010_DIV Teknologi Rekayasa Perankat Lunak.pdf','Laporan Kemajuan','2020-08-27 15:04:06','2020-08-27 15:04:06'),(22,20,'11416010_DIV Teknologi Rekayasa Perankat Lunak.pdf','Laporan Akhir','2020-08-27 15:11:57','2020-08-27 15:11:57'),(23,21,'test.c','Kontrak','2020-08-28 04:37:27','2020-08-28 04:37:27'),(24,24,'jawaban.docx','Kontrak','2020-08-28 09:27:39','2020-08-28 09:27:39'),(25,24,'jawaban.docx','Kontrak','2020-08-28 09:28:34','2020-08-28 09:28:34'),(26,24,'KARTU BEBAS PANTAU.docx','Laporan Kemajuan','2020-08-28 09:29:04','2020-08-28 09:29:04'),(27,24,'Aplikasi Pemesanan Online Melalui Website Berbasis SMS Gateway pada Multicom.pdf','Laporan Kemajuan','2020-08-28 09:30:44','2020-08-28 09:30:44'),(28,24,'Kabupaten Toba Samosir Dalam Angka 2019.pdf','Laporan Akhir','2020-08-28 09:31:50','2020-08-28 09:31:50'),(29,24,'Kabupaten Toba Samosir Dalam Angka 2019.pdf','Laporan Akhir','2020-08-28 09:32:19','2020-08-28 09:32:19'),(30,24,'Kabupaten Toba Samosir Dalam Angka 2019.pdf','Laporan Akhir','2020-08-28 09:32:41','2020-08-28 09:32:41'),(31,25,'KARTU BEBAS PANTAU.docx','Laporan Akhir','2020-08-28 09:37:53','2020-08-28 09:37:53'),(32,25,'jawaban.docx','SK','2020-08-28 09:38:50','2020-08-28 09:38:50'),(33,14,'container 3.docx','Laporan Akhir','2020-08-28 14:16:41','2020-08-28 14:16:41'),(34,14,'android.docx','Laporan Akhir','2020-08-28 14:20:07','2020-08-28 14:20:07'),(35,26,'container 3.docx','Kontrak','2020-08-28 15:01:00','2020-08-28 15:01:00'),(36,26,'Alfred Chrisdianto Simanjuntak contract[745].doc','Laporan Akhir','2020-08-29 02:07:55','2020-08-29 02:07:55');

/*Table structure for table `lppm_kuesioner` */

DROP TABLE IF EXISTS `lppm_kuesioner`;

CREATE TABLE `lppm_kuesioner` (
  `kuesioner_id` int(11) NOT NULL AUTO_INCREMENT,
  `kuesioner_kuesioner` varchar(255) DEFAULT NULL,
  `kuesioner_persentase` int(11) DEFAULT NULL,
  `kuesioner_status` int(2) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kuesioner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_kuesioner` */

insert  into `lppm_kuesioner`(`kuesioner_id`,`kuesioner_kuesioner`,`kuesioner_persentase`,`kuesioner_status`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Kontribusi pada IPTEK, Tinjauan pustaka, Perumusan masalah\r\n',20,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Pentingnya penelitian yang direncanakan	\r\n	\r\n	\r\n	\r\n',20,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Studi pustaka/  kemajuan yang telah dicapai dan studi pendahuluan serta kemutakhiran	\r\n',15,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Desain metode penelitian dan Pola pendekatan ilmiah	\r\n',20,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Peniaian meliputi : Uraian umum penelitian, Kelengkapan Biodata, Rincian anggaran, Dukungan & sarana penunjang	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n',15,1,0,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Keterlibatan mahasiswa sebagai tenaga pembantu dan penyusun tugas akhir',10,1,0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_laporan_akhir` */

DROP TABLE IF EXISTS `lppm_laporan_akhir`;

CREATE TABLE `lppm_laporan_akhir` (
  `laporan_akhir_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`laporan_akhir_id`),
  KEY `FK_lppm_laporan_akhir` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_laporan_akhir` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_laporan_akhir` */

/*Table structure for table `lppm_laporan_kemajuan` */

DROP TABLE IF EXISTS `lppm_laporan_kemajuan`;

CREATE TABLE `lppm_laporan_kemajuan` (
  `laporan_kemajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`laporan_kemajuan_id`),
  KEY `FK_lppm_laporan_kemajuan` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_laporan_kemajuan` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_laporan_kemajuan` */

/*Table structure for table `lppm_luaran` */

DROP TABLE IF EXISTS `lppm_luaran`;

CREATE TABLE `lppm_luaran` (
  `luaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `luaran_tipe` varchar(50) DEFAULT NULL,
  `luaran_jenis` varchar(255) DEFAULT NULL,
  `luaran_jenis_media` varchar(50) DEFAULT NULL,
  `luaran_jenis_jurnal` varchar(20) DEFAULT NULL,
  `luaran_tanggal_publikasi` date DEFAULT NULL,
  `luaran_tahun` year(4) DEFAULT NULL,
  `luaran_nama` varchar(255) DEFAULT NULL,
  `luaran_p_issn` int(11) DEFAULT NULL,
  `luaran_e_issn` int(11) DEFAULT NULL,
  `luaran_volume` int(11) DEFAULT NULL,
  `luaran_nomor` int(11) DEFAULT NULL,
  `luaran_halaman_awal` int(11) DEFAULT NULL,
  `luaran_halaman_akhir` int(11) DEFAULT NULL,
  `luaran_url` varchar(255) DEFAULT NULL,
  `luaran_nama_forum` varchar(100) DEFAULT NULL,
  `luaran_tingkat_forum_ilmiah` varchar(255) DEFAULT NULL,
  `luaran_institusi_penyelenggara` varchar(255) DEFAULT NULL,
  `luaran_tempat_pelaksanaan` varchar(255) DEFAULT NULL,
  `luaran_waktu_pelaksanaan_awal` datetime DEFAULT NULL,
  `luaran_waktu_pelaksanaan_akhir` datetime DEFAULT NULL,
  `luaran_isbn` int(11) DEFAULT NULL,
  `luaran_status` varchar(20) DEFAULT NULL,
  `luaran_deskripsi` text DEFAULT NULL,
  `luaran_lembaga` varchar(255) DEFAULT NULL,
  `luaran_bidang_usaha` varchar(255) DEFAULT NULL,
  `luaran_jumlah_halaman` int(11) DEFAULT NULL,
  `luaran_penerbit` varchar(100) DEFAULT NULL,
  `luaran_file` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`luaran_id`),
  KEY `FK_lppm_luaran` (`status_id`),
  CONSTRAINT `FK_lppm_luaran` FOREIGN KEY (`status_id`) REFERENCES `lppm_r_status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_luaran` */

insert  into `lppm_luaran`(`luaran_id`,`dosen_id`,`status_id`,`luaran_tipe`,`luaran_jenis`,`luaran_jenis_media`,`luaran_jenis_jurnal`,`luaran_tanggal_publikasi`,`luaran_tahun`,`luaran_nama`,`luaran_p_issn`,`luaran_e_issn`,`luaran_volume`,`luaran_nomor`,`luaran_halaman_awal`,`luaran_halaman_akhir`,`luaran_url`,`luaran_nama_forum`,`luaran_tingkat_forum_ilmiah`,`luaran_institusi_penyelenggara`,`luaran_tempat_pelaksanaan`,`luaran_waktu_pelaksanaan_awal`,`luaran_waktu_pelaksanaan_akhir`,`luaran_isbn`,`luaran_status`,`luaran_deskripsi`,`luaran_lembaga`,`luaran_bidang_usaha`,`luaran_jumlah_halaman`,`luaran_penerbit`,`luaran_file`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (2,5,18,'Publikasi di Jurnal','Jurnal Nasional Terakreditasi',NULL,'S1',NULL,2020,'tester',52145,456245,2,12052,1,1000,'tesaja',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'KARTU BEBAS PANTAU.docx',0,NULL,NULL,'2020-08-28 08:32:34',NULL,'2020-08-28 14:35:34',NULL),(3,1,19,'Publikasi di Jurnal','Jurnal Internasional',NULL,'Q1',NULL,2020,'tester 1',52145,456245,2,12052,123,144,'www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jawaban.docx',0,NULL,NULL,'2020-08-28 09:42:27',NULL,'2020-08-28 14:33:08',NULL),(4,5,18,'Publikasi di Jurnal','Jurnal Nasional Terakreditasi',NULL,'Q4',NULL,2020,'test',1234,1231,2,12,1,12,'tes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Controll Camera.PNG',0,NULL,NULL,'2020-08-29 02:11:45',NULL,'2020-08-29 02:12:08',NULL);

/*Table structure for table `lppm_luaran_anggota_dosen` */

DROP TABLE IF EXISTS `lppm_luaran_anggota_dosen`;

CREATE TABLE `lppm_luaran_anggota_dosen` (
  `lppm_luaran_anggota_dosen_id` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`lppm_luaran_anggota_dosen_id`),
  KEY `FK_lppm_luaran_anggota_dosen` (`luaran_id`),
  CONSTRAINT `FK_lppm_luaran_anggota_dosen` FOREIGN KEY (`luaran_id`) REFERENCES `lppm_luaran` (`luaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_luaran_anggota_dosen` */

insert  into `lppm_luaran_anggota_dosen`(`lppm_luaran_anggota_dosen_id`,`luaran_id`,`dosen_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,2,36,0,NULL,NULL,'2020-08-28 08:32:34',NULL,'2020-08-28 08:32:34',NULL),(2,3,48,0,NULL,NULL,'2020-08-28 09:42:27',NULL,'2020-08-28 09:42:27',NULL),(3,4,35,0,NULL,NULL,'2020-08-29 02:11:45',NULL,'2020-08-29 02:11:45',NULL);

/*Table structure for table `lppm_luaran_anggota_mahasiswa` */

DROP TABLE IF EXISTS `lppm_luaran_anggota_mahasiswa`;

CREATE TABLE `lppm_luaran_anggota_mahasiswa` (
  `lppm_anggota_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_id` int(11) DEFAULT NULL,
  `dim_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`lppm_anggota_mahasiswa_id`),
  KEY `FK_lppm_luaran_anggota_mahasiswa` (`luaran_id`),
  CONSTRAINT `FK_lppm_luaran_anggota_mahasiswa` FOREIGN KEY (`luaran_id`) REFERENCES `lppm_luaran` (`luaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_luaran_anggota_mahasiswa` */

insert  into `lppm_luaran_anggota_mahasiswa`(`lppm_anggota_mahasiswa_id`,`luaran_id`,`dim_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,2,1433,0,NULL,NULL,'2020-08-28 08:32:34',NULL,'2020-08-28 08:32:34',NULL),(2,3,1503,0,NULL,NULL,'2020-08-28 09:42:27',NULL,'2020-08-28 09:42:27',NULL),(3,4,1440,0,NULL,NULL,'2020-08-29 02:11:45',NULL,'2020-08-29 02:11:45',NULL);

/*Table structure for table `lppm_luaran_anggota_pegawai` */

DROP TABLE IF EXISTS `lppm_luaran_anggota_pegawai`;

CREATE TABLE `lppm_luaran_anggota_pegawai` (
  `lppm_luaran_anggota_pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `luaran_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`lppm_luaran_anggota_pegawai_id`),
  KEY `FK_lppm_luaran_anggota_pegawai` (`luaran_id`),
  CONSTRAINT `FK_lppm_luaran_anggota_pegawai` FOREIGN KEY (`luaran_id`) REFERENCES `lppm_luaran` (`luaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_luaran_anggota_pegawai` */

insert  into `lppm_luaran_anggota_pegawai`(`lppm_luaran_anggota_pegawai_id`,`luaran_id`,`pegawai_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,2,266,0,NULL,NULL,'2020-08-28 08:32:34',NULL,'2020-08-28 08:32:34',NULL),(2,3,183,0,NULL,NULL,'2020-08-28 09:42:27',NULL,'2020-08-28 09:42:27',NULL),(3,4,176,0,NULL,NULL,'2020-08-29 02:11:45',NULL,'2020-08-29 02:11:45',NULL);

/*Table structure for table `lppm_penilaian` */

DROP TABLE IF EXISTS `lppm_penilaian`;

CREATE TABLE `lppm_penilaian` (
  `penilaian_id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer_id` int(11) DEFAULT NULL,
  `kuesioner_id` int(11) DEFAULT NULL,
  `persentase` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`penilaian_id`),
  KEY `FK_lppm_penilaian` (`kuesioner_id`),
  KEY `FK_lppm_penilaian_reviewer` (`reviewer_id`),
  CONSTRAINT `FK_lppm_penilaian` FOREIGN KEY (`kuesioner_id`) REFERENCES `lppm_kuesioner` (`kuesioner_id`),
  CONSTRAINT `FK_lppm_penilaian_reviewer` FOREIGN KEY (`reviewer_id`) REFERENCES `lppm_reviewer` (`reviewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_penilaian` */

insert  into `lppm_penilaian`(`penilaian_id`,`reviewer_id`,`kuesioner_id`,`persentase`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (26,21,1,6,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(27,21,2,5,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(28,21,3,6,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(29,21,4,7,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(30,21,5,6,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(31,21,6,7,0,NULL,NULL,'2020-08-26 05:01:44',NULL,'2020-08-26 05:01:44',NULL),(32,22,1,5,0,NULL,NULL,NULL,NULL,NULL,NULL),(33,22,2,6,0,NULL,NULL,NULL,NULL,NULL,NULL),(34,22,3,6,0,NULL,NULL,NULL,NULL,NULL,NULL),(35,22,4,6,0,NULL,NULL,NULL,NULL,NULL,NULL),(36,22,5,7,0,NULL,NULL,NULL,NULL,NULL,NULL),(37,22,6,6,0,NULL,NULL,NULL,NULL,NULL,NULL),(50,29,1,6,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(51,29,2,6,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(52,29,3,7,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(53,29,4,6,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(54,29,5,5,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(55,29,6,6,0,NULL,NULL,'2020-08-27 14:57:56',NULL,'2020-08-27 14:57:56',NULL),(56,30,1,5,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(57,30,2,6,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(58,30,3,7,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(59,30,4,7,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(60,30,5,7,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(61,30,6,7,0,NULL,NULL,'2020-08-27 14:58:52',NULL,'2020-08-27 14:58:52',NULL),(68,33,1,6,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(69,33,2,7,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(70,33,3,5,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(71,33,4,6,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(72,33,5,6,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(73,33,6,6,0,NULL,NULL,'2020-08-28 03:48:14',NULL,'2020-08-28 03:48:14',NULL),(86,34,1,5,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(87,34,2,6,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(88,34,3,6,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(89,34,4,6,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(90,34,5,7,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(91,34,6,6,0,NULL,NULL,'2020-08-28 04:34:32',NULL,'2020-08-28 04:34:32',NULL),(92,35,1,6,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(93,35,2,6,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(94,35,3,6,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(95,35,4,7,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(96,35,5,6,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(97,35,6,5,0,NULL,NULL,'2020-08-28 09:21:49',NULL,'2020-08-28 09:21:49',NULL),(104,36,1,5,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(105,36,2,7,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(106,36,3,7,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(107,36,4,6,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(108,36,5,6,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(109,36,6,6,0,NULL,NULL,'2020-08-28 09:25:32',NULL,'2020-08-28 09:25:32',NULL),(128,37,1,5,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(129,37,2,6,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(130,37,3,6,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(131,37,4,6,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(132,37,5,6,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(133,37,6,7,0,NULL,NULL,'2020-08-28 14:57:09',NULL,'2020-08-28 14:57:09',NULL),(134,38,1,3,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(135,38,2,7,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(136,38,3,7,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(137,38,4,6,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(138,38,5,2,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(139,38,6,6,0,NULL,NULL,'2020-08-28 14:58:26',NULL,'2020-08-28 14:58:26',NULL),(140,39,1,5,0,NULL,NULL,'2020-08-29 02:14:44',NULL,'2020-08-29 02:14:44',NULL),(141,39,2,5,0,NULL,NULL,'2020-08-29 02:14:45',NULL,'2020-08-29 02:14:45',NULL),(142,39,3,6,0,NULL,NULL,'2020-08-29 02:14:45',NULL,'2020-08-29 02:14:45',NULL),(143,39,4,6,0,NULL,NULL,'2020-08-29 02:14:45',NULL,'2020-08-29 02:14:45',NULL),(144,39,5,5,0,NULL,NULL,'2020-08-29 02:14:45',NULL,'2020-08-29 02:14:45',NULL),(145,39,6,6,0,NULL,NULL,'2020-08-29 02:14:45',NULL,'2020-08-29 02:14:45',NULL),(146,40,1,3,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL),(147,40,2,3,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL),(148,40,3,2,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL),(149,40,4,5,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL),(150,40,5,6,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL),(151,40,6,6,0,NULL,NULL,'2020-08-29 02:15:12',NULL,'2020-08-29 02:15:12',NULL);

/*Table structure for table `lppm_penilaian_laporan_akhir` */

DROP TABLE IF EXISTS `lppm_penilaian_laporan_akhir`;

CREATE TABLE `lppm_penilaian_laporan_akhir` (
  `penilaian_laporan_akhir_id` int(10) NOT NULL AUTO_INCREMENT,
  `reviewer_id` int(10) DEFAULT NULL,
  `penilaian_laporan_akhir_file` varchar(50) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`penilaian_laporan_akhir_id`),
  KEY `FK_lppm_penilaian_laporan_akhir` (`reviewer_id`),
  CONSTRAINT `FK_lppm_penilaian_laporan_akhir` FOREIGN KEY (`reviewer_id`) REFERENCES `lppm_reviewer` (`reviewer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_penilaian_laporan_akhir` */

insert  into `lppm_penilaian_laporan_akhir`(`penilaian_laporan_akhir_id`,`reviewer_id`,`penilaian_laporan_akhir_file`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,29,'jawaban.docx',NULL,NULL,NULL,'2020-08-27 15:32:01',NULL,'2020-08-27 15:32:01',NULL),(2,30,'11416010_DIV Teknologi Rekayasa Perankat Lunak.pdf',NULL,NULL,NULL,'2020-08-27 15:33:04',NULL,'2020-08-27 15:33:04',NULL),(3,36,'2 dan 4.docx',NULL,NULL,NULL,'2020-08-28 09:34:57',NULL,'2020-08-28 09:34:57',NULL),(4,35,'KARTU BEBAS PANTAU.docx',NULL,NULL,NULL,'2020-08-28 09:35:35',NULL,'2020-08-28 09:35:35',NULL),(5,21,'container 3.docx',NULL,NULL,NULL,'2020-08-28 14:21:33',NULL,'2020-08-28 14:21:33',NULL),(6,22,'Alfred Chrisdianto Simanjuntak contract[745].doc',NULL,NULL,NULL,'2020-08-28 14:22:14',NULL,'2020-08-28 14:22:14',NULL),(7,38,'android.docx',NULL,NULL,NULL,'2020-08-29 02:09:38',NULL,'2020-08-29 02:09:38',NULL),(8,37,'container 3.docx',NULL,NULL,NULL,'2020-08-29 02:10:05',NULL,'2020-08-29 02:10:05',NULL);

/*Table structure for table `lppm_proposal` */

DROP TABLE IF EXISTS `lppm_proposal`;

CREATE TABLE `lppm_proposal` (
  `proposal_id` int(10) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_id` int(10) DEFAULT NULL,
  `proposal_file` varchar(255) DEFAULT NULL,
  `proposal_RAB` varchar(255) DEFAULT NULL,
  `proposal_reviewer_1` int(10) DEFAULT NULL,
  `proposal_reviewer_1_comment` varchar(100) DEFAULT NULL,
  `proposal_reviewer_1_perbaikan` int(10) DEFAULT 0,
  `proposal_reviewer_2` int(10) DEFAULT NULL,
  `proposal_reviewer_2_comment` varchar(100) DEFAULT NULL,
  `proposal_reviewer_2_perbaikan` int(10) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`proposal_id`),
  KEY `FK_lppm_proposal` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_proposal` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_proposal` */

insert  into `lppm_proposal`(`proposal_id`,`proposal_penelitian_id`,`proposal_file`,`proposal_RAB`,`proposal_reviewer_1`,`proposal_reviewer_1_comment`,`proposal_reviewer_1_perbaikan`,`proposal_reviewer_2`,`proposal_reviewer_2_comment`,`proposal_reviewer_2_perbaikan`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values (1,14,'android.docx','container 3.docx',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-26 04:20:32',NULL,'2020-08-26 04:20:32',NULL,NULL,NULL),(4,17,'container 3.docx','Alfred Chrisdianto Simanjuntak contract[745].doc',0,NULL,NULL,NULL,NULL,NULL,'2020-08-27 02:35:59',NULL,'2020-08-27 02:35:59',NULL,NULL,NULL),(5,20,'Lampiran B.1.docx','pernyataan Alfred.docx',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-27 03:51:21',NULL,'2020-08-27 03:51:21',NULL,NULL,NULL),(6,21,'11416010_DIV Teknologi Rekayasa Perankat Lunak.pdf','jawaban.docx',21,'Sudah cukup bagus proposalnya',NULL,21,'Tolong diperbaiki untuk bagian 1 dan 2',NULL,'2020-08-27 13:59:33',NULL,'2020-08-28 03:49:07',NULL,NULL,NULL),(7,22,'jawaban.docx','jawaban.docx',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-27 14:00:25',NULL,'2020-08-27 14:00:25',NULL,NULL,NULL),(8,21,'4.c','test.c',NULL,NULL,NULL,21,'Tolong lengkapi data-data analisisnya',NULL,'2020-08-28 04:03:12',NULL,'2020-08-28 04:31:57',NULL,NULL,NULL),(9,21,'android.docx','44TRPL_2016_02_SlidePresentasi.pptx',NULL,NULL,NULL,21,'Sudah bagus proposalnya',NULL,'2020-08-28 04:33:25',NULL,'2020-08-28 04:34:32',NULL,NULL,NULL),(10,23,'SISTEM INFORMASI PENJUALAN BERBASIS WEB DAN SMS GATEWAY.pdf','Data Produk Unggulan 5 Kecamatan.xlsx',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-28 04:53:53',NULL,'2020-08-28 06:35:48',NULL,NULL,NULL),(11,24,'Kabupaten Toba Samosir Dalam Angka 2019.pdf','Data Produk Unggulan 5 Kecamatan.xlsx',24,'tes',NULL,24,'perbaikan',NULL,'2020-08-28 09:15:55',NULL,'2020-08-28 09:22:49',NULL,NULL,NULL),(12,24,'KARTU BEBAS PANTAU.docx','Data Produk Unggulan 5 Kecamatan.xlsx',NULL,NULL,NULL,24,'tes',NULL,'2020-08-28 09:24:32',NULL,'2020-08-28 09:25:32',NULL,NULL,NULL),(13,25,'Statistik Harga Produsen Kabupaten Toba Samosir 2018.pdf','SISTEM INFORMASI PENJUALAN BERBASIS WEB DAN SMS GATEWAY.pdf',NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-28 09:37:53',NULL,'2020-08-28 09:37:53',NULL,NULL,NULL),(16,26,'all.bpm','Controll Camera.PNG',26,'sudah bagus',0,26,'Datanya jadi kacau',1,'2020-08-28 14:55:22',NULL,'2020-08-28 14:57:09',NULL,NULL,NULL),(17,26,'44TRPL_2016_02_SlidePresentasi.pptx','Alfred Chrisdianto Simanjuntak contract[745].doc',NULL,NULL,0,26,'masih ada kurang di bagian data',0,'2020-08-28 14:57:31',NULL,'2020-08-28 14:58:26',NULL,NULL,NULL),(18,27,'android.docx','container 3.docx',27,'bagus',0,27,'kurang bagus',0,'2020-08-29 02:13:14',NULL,'2020-08-29 02:15:12',NULL,NULL,NULL);

/*Table structure for table `lppm_proposal_penelitian` */

DROP TABLE IF EXISTS `lppm_proposal_penelitian`;

CREATE TABLE `lppm_proposal_penelitian` (
  `proposal_penelitian_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposal_penelitian_judul` varchar(255) DEFAULT NULL,
  `proposal_penelitian_tahun_diajukan` int(11) DEFAULT NULL,
  `proposal_penelitian_tahun_dilaksanakan` int(11) DEFAULT NULL,
  `proposal_penelitian_tahun_pelaksanaan` int(11) DEFAULT NULL,
  `bidang_penelitian_id` int(11) DEFAULT NULL,
  `jenis_penelitian_id` int(11) DEFAULT NULL,
  `proposal_penelitian_jumlah_dana` varchar(100) DEFAULT NULL,
  `proposal_penelitian_ketua` varchar(255) DEFAULT NULL,
  `proposal_penelitian_RAB` varchar(255) DEFAULT NULL,
  `proposal_penelitian_proposal` varchar(255) DEFAULT NULL,
  `proposal_penelitian_sk` varchar(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `tujuan_sosial_ekonomi_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`proposal_penelitian_id`),
  KEY `FK_lppm_proposal_penelitian` (`bidang_penelitian_id`),
  KEY `FK_lppm_jenis_penelitian` (`jenis_penelitian_id`),
  KEY `FK_lppm_status_penelitian` (`status_id`),
  KEY `FK_lppm_tujuan_sosial_ekonomi` (`tujuan_sosial_ekonomi_id`),
  CONSTRAINT `FK_lppm_jenis_penelitian` FOREIGN KEY (`jenis_penelitian_id`) REFERENCES `lppm_r_jenis_penelitian` (`jenis_penelitian_id`),
  CONSTRAINT `FK_lppm_proposal_penelitian` FOREIGN KEY (`bidang_penelitian_id`) REFERENCES `lppm_r_bidang_penelitian` (`bidang_penelitian_id`),
  CONSTRAINT `FK_lppm_status_penelitian` FOREIGN KEY (`status_id`) REFERENCES `lppm_r_status` (`status_id`),
  CONSTRAINT `FK_lppm_tujuan_sosial_ekonomi` FOREIGN KEY (`tujuan_sosial_ekonomi_id`) REFERENCES `lppm_r_tujuan_sosial_ekonomi` (`tujuan_sosial_ekonomi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_proposal_penelitian` */

insert  into `lppm_proposal_penelitian`(`proposal_penelitian_id`,`proposal_penelitian_judul`,`proposal_penelitian_tahun_diajukan`,`proposal_penelitian_tahun_dilaksanakan`,`proposal_penelitian_tahun_pelaksanaan`,`bidang_penelitian_id`,`jenis_penelitian_id`,`proposal_penelitian_jumlah_dana`,`proposal_penelitian_ketua`,`proposal_penelitian_RAB`,`proposal_penelitian_proposal`,`proposal_penelitian_sk`,`status_id`,`dosen_id`,`tujuan_sosial_ekonomi_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (14,'Make earth green again',2020,2020,NULL,4,2,'20.000.000.000',' Prof. Merlin','container 3.docx','android.docx',NULL,8,4,6,0,NULL,NULL,'2020-08-26 04:20:32',NULL,'2020-08-28 14:23:56',NULL),(17,' militer',2020,2020,NULL,5,2,'.000.000',' Bill','16. Kerasaan-REKAP(2).xlsx','Lap-TA-1920-D4TRPL-05.pdf',NULL,19,4,3,0,NULL,NULL,'2020-08-27 02:34:36',NULL,'2020-08-27 03:49:55',NULL),(20,' tes proposal',2018,NULL,NULL,4,2,'20.000.000','Sonny','pernyataan Alfred.docx','Lampiran B.1.docx',NULL,8,4,4,0,NULL,NULL,'2020-08-27 03:51:21',NULL,'2020-08-27 16:02:11',NULL),(21,'tssts',2020,2023,NULL,2,3,'23.456.789.098','sadsad','jawaban.docx','11416010_DIV Teknologi Rekayasa Perankat Lunak.pdf',NULL,10,4,2,0,NULL,NULL,'2020-08-27 13:59:33',NULL,'2020-08-28 04:37:27',NULL),(22,'Dokumentasi Lama',2017,NULL,NULL,2,2,'7.312.713','anj','jawaban.docx','jawaban.docx',NULL,8,4,2,0,NULL,NULL,'2020-08-27 14:00:25',NULL,'2020-08-27 14:20:40',NULL),(23,'tester',2020,2023,NULL,4,2,'Rp.21.231.221.355','haha','jawaban.docx','jawaban.docx',NULL,1,5,3,0,NULL,NULL,'2020-08-28 04:53:53',NULL,'2020-08-28 06:35:48',NULL),(24,'testing',2020,2020,NULL,3,2,'Rp.10.000.000','test',NULL,NULL,NULL,8,4,4,0,NULL,NULL,'2020-08-28 09:15:55',NULL,'2020-08-28 09:36:42',NULL),(25,'tes',2018,NULL,NULL,3,1,'Rp.1.000.000','tes',NULL,NULL,NULL,8,4,1,0,NULL,NULL,'2020-08-28 09:37:53',NULL,'2020-08-28 09:38:50',NULL),(26,'tes dasar',2020,2022,NULL,2,1,'Rp.20.000.000','tes doang',NULL,NULL,NULL,22,4,2,0,NULL,NULL,'2020-08-28 14:52:45',NULL,'2020-08-29 02:10:06',NULL),(27,'coba',2020,2022,NULL,1,2,'Rp.1.000.000','coba',NULL,NULL,NULL,9,4,1,0,NULL,NULL,'2020-08-29 02:13:14',NULL,'2020-08-29 02:15:12',NULL);

/*Table structure for table `lppm_r_bidang_penelitian` */

DROP TABLE IF EXISTS `lppm_r_bidang_penelitian`;

CREATE TABLE `lppm_r_bidang_penelitian` (
  `bidang_penelitian_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_penelitian_nama` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`bidang_penelitian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_r_bidang_penelitian` */

insert  into `lppm_r_bidang_penelitian`(`bidang_penelitian_id`,`bidang_penelitian_nama`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Mathematical Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Physical Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Chemical Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Earth Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Biological Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Information, Computing, and Communication Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Other Natural Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Industrial Biotechnology and Food Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Industrial Biotechnology and Food Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Aerospace Engineerings',0,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Manufacturing Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Automotive Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(13,'Mechanical and Industrial Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Chemical Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Resources Engineering ',0,NULL,NULL,NULL,NULL,NULL,NULL),(16,'Civil Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Electrical and Electonic Engineering ',0,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Geomatic Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(19,'Environmental Engineering ',0,NULL,NULL,NULL,NULL,NULL,NULL),(20,'Maritime Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(21,'Metallurgy',0,NULL,NULL,NULL,NULL,NULL,NULL),(22,'Materials Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(23,'Biomedical Engineering',0,NULL,NULL,NULL,NULL,NULL,NULL),(24,'Computer Hardware',0,NULL,NULL,NULL,NULL,NULL,NULL),(25,'Communications Technologies',0,NULL,NULL,NULL,NULL,NULL,NULL),(26,'Interdisciplinary Engineering ',0,NULL,NULL,NULL,NULL,NULL,NULL),(27,'Other Engineering and Technology',0,NULL,NULL,NULL,NULL,NULL,NULL),(28,'Agricultural and Veterinary Sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(29,'Environmental Sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(30,'Architecture, Urban Environment and Building',0,NULL,NULL,NULL,NULL,NULL,NULL),(31,'Other Agricultural and Environmental Sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(32,'Medical Sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(33,'Resources Engineering ',0,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Public Health and Health Services ',0,NULL,NULL,NULL,NULL,NULL,NULL),(35,'Other Medical and Health Sciences  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(36,'Education',0,NULL,NULL,NULL,NULL,NULL,NULL),(37,'Economics',0,NULL,NULL,NULL,NULL,NULL,NULL),(38,'Commerce, Management, Tourism and Service',0,NULL,NULL,NULL,NULL,NULL,NULL),(39,'Policy and Political Sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(40,'Studies in Human Society',0,NULL,NULL,NULL,NULL,NULL,NULL),(41,'Behavioural and Cognitive Sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(42,'Law, Justice, and Law Enforcement ',0,NULL,NULL,NULL,NULL,NULL,NULL),(43,'Journalism, Librarianship and Curatorial Studies ',0,NULL,NULL,NULL,NULL,NULL,NULL),(44,'Other Social Sciences  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(45,'The Arts ',0,NULL,NULL,NULL,NULL,NULL,NULL),(46,'Language and Culture ',0,NULL,NULL,NULL,NULL,NULL,NULL),(47,'History and Archeology ',0,NULL,NULL,NULL,NULL,NULL,NULL),(48,'Philosophy and Religion ',0,NULL,NULL,NULL,NULL,NULL,NULL),(49,'Other Humanities ',0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_r_jenis_penelitian` */

DROP TABLE IF EXISTS `lppm_r_jenis_penelitian`;

CREATE TABLE `lppm_r_jenis_penelitian` (
  `jenis_penelitian_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_penelitian_nama` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`jenis_penelitian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_r_jenis_penelitian` */

insert  into `lppm_r_jenis_penelitian`(`jenis_penelitian_id`,`jenis_penelitian_nama`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Penelitian Dasar',0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Penelitian Terapan',0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Penelitian Eksperimental',0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_r_status` */

DROP TABLE IF EXISTS `lppm_r_status`;

CREATE TABLE `lppm_r_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_keterangan` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_r_status` */

insert  into `lppm_r_status`(`status_id`,`status_keterangan`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'diajukan',0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'diterima kaprodi',0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'ditolak kaprodi',0,NULL,NULL,NULL,NULL,NULL,NULL),(4,'diterima dekan',0,NULL,NULL,NULL,NULL,NULL,NULL),(5,'sedang direview',0,NULL,NULL,NULL,NULL,NULL,NULL),(6,'proposal disetujui',0,NULL,NULL,NULL,NULL,NULL,NULL),(7,'proposal ditolak',0,NULL,NULL,NULL,NULL,NULL,NULL),(8,'penelitian selesai',0,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Diperiksa LPPM',0,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Proposal Disetujui',0,NULL,NULL,NULL,NULL,NULL,NULL),(11,'Proposal Ditolak',0,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Butuh Perbaikan',0,NULL,NULL,NULL,NULL,NULL,NULL),(13,'pengajuan dokumentasi',0,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Upload dokumen kemajuan',0,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Dokumen kemajuan diterima',0,NULL,NULL,NULL,NULL,NULL,NULL),(16,'Dokumen kemajuan ditolak',0,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Menunggu Persetujuan',0,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Luaran Diterima',0,NULL,NULL,NULL,NULL,NULL,NULL),(19,'Luaran Ditolak',0,NULL,NULL,NULL,NULL,NULL,NULL),(20,'upload dokumen akhir',0,NULL,NULL,NULL,NULL,NULL,NULL),(21,'dokumen akhir belum direview',0,NULL,NULL,NULL,NULL,NULL,NULL),(22,'dokumen akhir telah direview',0,NULL,NULL,NULL,NULL,NULL,NULL),(23,'dokumen akhir diterima',0,NULL,NULL,NULL,NULL,NULL,NULL),(24,'dokumen akhir ditolak',0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_r_status_reviewer` */

DROP TABLE IF EXISTS `lppm_r_status_reviewer`;

CREATE TABLE `lppm_r_status_reviewer` (
  `status_reviewer_id` int(10) NOT NULL AUTO_INCREMENT,
  `status_keterangan` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`status_reviewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_r_status_reviewer` */

insert  into `lppm_r_status_reviewer`(`status_reviewer_id`,`status_keterangan`,`deleted`,`deleted_by`,`deleted_at`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'review proposal',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'proposal diterima',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'proposal ditolak',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'perbaikan proposal',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'review laporan akhir',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'laporan akhir diterima',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'laporan akhir ditolak',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Periksa ulang proposal',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_r_tujuan_sosial_ekonomi` */

DROP TABLE IF EXISTS `lppm_r_tujuan_sosial_ekonomi`;

CREATE TABLE `lppm_r_tujuan_sosial_ekonomi` (
  `tujuan_sosial_ekonomi_id` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan_sosial_ekonomi_nama` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`tujuan_sosial_ekonomi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_r_tujuan_sosial_ekonomi` */

insert  into `lppm_r_tujuan_sosial_ekonomi`(`tujuan_sosial_ekonomi_id`,`tujuan_sosial_ekonomi_nama`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Military and Politics ',0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Military Technology',0,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Military doctrine, education, and training ',0,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Military Capabilities',0,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Police and internal security ',0,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Field crops',0,NULL,NULL,NULL,NULL,NULL,NULL),(7,'Plantation crops ',0,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Horticultural crops ',0,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Forestry',0,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Primary products from plants ',0,NULL,NULL,NULL,NULL,NULL,NULL),(11,'By-products utilisation ',0,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Herbs, Spices and Medicinal Plants ',0,NULL,NULL,NULL,NULL,NULL,NULL),(13,'Other plant production and plant primary products not elsewhere classified  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(14,'Livestock',0,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Pasture, browse and folder crops',0,NULL,NULL,NULL,NULL,NULL,NULL),(16,'Fisheries products',0,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Primary & by-products from animals',0,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Other animal production and animal primary products not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(19,'Exploration',0,NULL,NULL,NULL,NULL,NULL,NULL),(20,'Primary mining and extraction processes',0,NULL,NULL,NULL,NULL,NULL,NULL),(21,'First stage treatment of ores and minerals',0,NULL,NULL,NULL,NULL,NULL,NULL),(22,'Prevention and Treatment of Pollution',0,NULL,NULL,NULL,NULL,NULL,NULL),(23,'Other mineral resources (excluding energy) not elsewhere classified  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(24,'Exploration',0,NULL,NULL,NULL,NULL,NULL,NULL),(25,'Mining and extraction',0,NULL,NULL,NULL,NULL,NULL,NULL),(26,'Preparation and supply of energy source materials',0,NULL,NULL,NULL,NULL,NULL,NULL),(27,'Non-conventional energy resources',0,NULL,NULL,NULL,NULL,NULL,NULL),(28,'Nuclear Energy',0,NULL,NULL,NULL,NULL,NULL,NULL),(29,'Other energy resources not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(30,'Energy transformation',0,NULL,NULL,NULL,NULL,NULL,NULL),(31,'Renewable energy',0,NULL,NULL,NULL,NULL,NULL,NULL),(32,'Energy distribution',0,NULL,NULL,NULL,NULL,NULL,NULL),(33,'Energy Conservation and efficiency',0,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Energy issues',0,NULL,NULL,NULL,NULL,NULL,NULL),(35,'Other energy supply not elsewhere classified',0,NULL,NULL,NULL,NULL,NULL,NULL),(36,'Processed food products and beverages',0,NULL,NULL,NULL,NULL,NULL,NULL),(37,'Fibre processing and textiles, footwear and leather products  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(38,'Wood, wood products and paper',0,NULL,NULL,NULL,NULL,NULL,NULL),(39,'Human pharmaceutical products',0,NULL,NULL,NULL,NULL,NULL,NULL),(40,'Veterinary pharmaceutical products',0,NULL,NULL,NULL,NULL,NULL,NULL),(41,'Agricultural chemicals',0,NULL,NULL,NULL,NULL,NULL,NULL),(42,'Industrial chemicals and related products',0,NULL,NULL,NULL,NULL,NULL,NULL),(43,'Basic metal products (including smelting)',0,NULL,NULL,NULL,NULL,NULL,NULL),(44,'Industrial mineral products',0,NULL,NULL,NULL,NULL,NULL,NULL),(45,'Fabricated metal products',0,NULL,NULL,NULL,NULL,NULL,NULL),(46,'Transport equipment ',0,NULL,NULL,NULL,NULL,NULL,NULL),(47,'Computer hardware and electronic equipment ',0,NULL,NULL,NULL,NULL,NULL,NULL),(48,'Communication equipment',0,NULL,NULL,NULL,NULL,NULL,NULL),(49,'Instrumentation',0,NULL,NULL,NULL,NULL,NULL,NULL),(50,'Machinery and equipment ',0,NULL,NULL,NULL,NULL,NULL,NULL),(51,'Latex product industry',0,NULL,NULL,NULL,NULL,NULL,NULL),(52,'Standard supporting technologies',0,NULL,NULL,NULL,NULL,NULL,NULL),(53,'Materials performance and processes/analysis',0,NULL,NULL,NULL,NULL,NULL,NULL),(54,'Milling and process materials',0,NULL,NULL,NULL,NULL,NULL,NULL),(55,'Synthesis and design of fine and speciality chemical',0,NULL,NULL,NULL,NULL,NULL,NULL),(56,'Consumer Products',0,NULL,NULL,NULL,NULL,NULL,NULL),(57,'Other manufactured products not elsewhere classified',0,NULL,NULL,NULL,NULL,NULL,NULL),(58,'Planning',0,NULL,NULL,NULL,NULL,NULL,NULL),(59,'Design',0,NULL,NULL,NULL,NULL,NULL,NULL),(60,'Construction processes',0,NULL,NULL,NULL,NULL,NULL,NULL),(61,'Building management and services',0,NULL,NULL,NULL,NULL,NULL,NULL),(62,'Other construction not elsewhere classified  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(63,'Ground transport',0,NULL,NULL,NULL,NULL,NULL,NULL),(64,'Water transport',0,NULL,NULL,NULL,NULL,NULL,NULL),(65,'Air & space transport',0,NULL,NULL,NULL,NULL,NULL,NULL),(66,'Other transport not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(67,'Computer software and services',0,NULL,NULL,NULL,NULL,NULL,NULL),(68,'Information services (including library)',0,NULL,NULL,NULL,NULL,NULL,NULL),(69,'Communication services',0,NULL,NULL,NULL,NULL,NULL,NULL),(70,'Geoinformation Services',0,NULL,NULL,NULL,NULL,NULL,NULL),(71,'Other information and communication not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(72,'Electricity, gas and water services and utilities',0,NULL,NULL,NULL,NULL,NULL,NULL),(73,'Waste management and recycling',0,NULL,NULL,NULL,NULL,NULL,NULL),(74,'Wholesale and retail trade ',0,NULL,NULL,NULL,NULL,NULL,NULL),(75,'Finance, property and business services',0,NULL,NULL,NULL,NULL,NULL,NULL),(76,'Tourism',0,NULL,NULL,NULL,NULL,NULL,NULL),(77,'Other commercial services not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(78,'Macroeconomics issues ',0,NULL,NULL,NULL,NULL,NULL,NULL),(79,'Microeconomics issues ',0,NULL,NULL,NULL,NULL,NULL,NULL),(80,'International trade issues ',0,NULL,NULL,NULL,NULL,NULL,NULL),(81,'Management and productivity issues ',0,NULL,NULL,NULL,NULL,NULL,NULL),(82,'Measurement standards and calibration services ',0,NULL,NULL,NULL,NULL,NULL,NULL),(83,'Commercialisation',0,NULL,NULL,NULL,NULL,NULL,NULL),(84,'Socio-economic development ',0,NULL,NULL,NULL,NULL,NULL,NULL),(85,'Economic development and environment',0,NULL,NULL,NULL,NULL,NULL,NULL),(86,'Human resource management ',0,NULL,NULL,NULL,NULL,NULL,NULL),(87,'Other economic issues not elsewhere classified',0,NULL,NULL,NULL,NULL,NULL,NULL),(88,'Soil resources',0,NULL,NULL,NULL,NULL,NULL,NULL),(89,'Water resources',0,NULL,NULL,NULL,NULL,NULL,NULL),(90,'Biodiversity',0,NULL,NULL,NULL,NULL,NULL,NULL),(91,'Bioactive product',0,NULL,NULL,NULL,NULL,NULL,NULL),(92,'Industrial raw materials',0,NULL,NULL,NULL,NULL,NULL,NULL),(93,'Mineral resource',0,NULL,NULL,NULL,NULL,NULL,NULL),(94,'Other natural resources not elsewhere classifie',0,NULL,NULL,NULL,NULL,NULL,NULL),(95,'Clinical(organs, diseases and conditions)',0,NULL,NULL,NULL,NULL,NULL,NULL),(96,'Public health',0,NULL,NULL,NULL,NULL,NULL,NULL),(97,'Health and support services',0,NULL,NULL,NULL,NULL,NULL,NULL),(98,'Other health not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(99,'Early childhood and primary education',0,NULL,NULL,NULL,NULL,NULL,NULL),(100,'Secondary education ',0,NULL,NULL,NULL,NULL,NULL,NULL),(101,'Tertiary education',0,NULL,NULL,NULL,NULL,NULL,NULL),(102,'Technical and further education',0,NULL,NULL,NULL,NULL,NULL,NULL),(103,'Special education',0,NULL,NULL,NULL,NULL,NULL,NULL),(104,'Computer base teaching and learning',0,NULL,NULL,NULL,NULL,NULL,NULL),(105,'Education policy',0,NULL,NULL,NULL,NULL,NULL,NULL),(106,'Teaching',0,NULL,NULL,NULL,NULL,NULL,NULL),(107,'Educational administration',0,NULL,NULL,NULL,NULL,NULL,NULL),(108,'Other education and training not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(109,'Community services',0,NULL,NULL,NULL,NULL,NULL,NULL),(110,'Public services ',0,NULL,NULL,NULL,NULL,NULL,NULL),(111,'Art, sport and recreation',0,NULL,NULL,NULL,NULL,NULL,NULL),(112,'International relations',0,NULL,NULL,NULL,NULL,NULL,NULL),(113,'Ethical issues',0,NULL,NULL,NULL,NULL,NULL,NULL),(114,'Nation building',0,NULL,NULL,NULL,NULL,NULL,NULL),(115,'Urban issues',0,NULL,NULL,NULL,NULL,NULL,NULL),(116,'Other social development and community services not elsewhere classified  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(117,'Climate and atmosphere',0,NULL,NULL,NULL,NULL,NULL,NULL),(118,'Ocean',0,NULL,NULL,NULL,NULL,NULL,NULL),(119,'Water',0,NULL,NULL,NULL,NULL,NULL,NULL),(120,'Land',0,NULL,NULL,NULL,NULL,NULL,NULL),(121,'Nature conservation',0,NULL,NULL,NULL,NULL,NULL,NULL),(122,'Social environment',0,NULL,NULL,NULL,NULL,NULL,NULL),(123,'River and Lake',0,NULL,NULL,NULL,NULL,NULL,NULL),(124,'Other environmental knowledge not elsewhere classified',0,NULL,NULL,NULL,NULL,NULL,NULL),(125,'Plant production and plant primary products (including forestry) ',0,NULL,NULL,NULL,NULL,NULL,NULL),(126,'Animal production and animal primary products (including fishing) ',0,NULL,NULL,NULL,NULL,NULL,NULL),(127,'Mineral resources (excluding energy)',0,NULL,NULL,NULL,NULL,NULL,NULL),(128,'Energy resources',0,NULL,NULL,NULL,NULL,NULL,NULL),(129,'Energy supply',0,NULL,NULL,NULL,NULL,NULL,NULL),(130,'Manufacturing',0,NULL,NULL,NULL,NULL,NULL,NULL),(131,'Construction',0,NULL,NULL,NULL,NULL,NULL,NULL),(132,'Transport',0,NULL,NULL,NULL,NULL,NULL,NULL),(133,'Information and communication services',0,NULL,NULL,NULL,NULL,NULL,NULL),(134,'Commercial services',0,NULL,NULL,NULL,NULL,NULL,NULL),(135,'Environmental economic framework',0,NULL,NULL,NULL,NULL,NULL,NULL),(136,'Other environmental of development not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL),(137,'Environmental management ',0,NULL,NULL,NULL,NULL,NULL,NULL),(138,'Waste management and recycling ',0,NULL,NULL,NULL,NULL,NULL,NULL),(139,'Climate and Weather ',0,NULL,NULL,NULL,NULL,NULL,NULL),(140,'Atmosphere (Excl. Climate and Weather)  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(141,'Marine and Coastal Environment  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(142,'Fresh water and Estuarine Environment ',0,NULL,NULL,NULL,NULL,NULL,NULL),(143,'Urban and Industrial Environment',0,NULL,NULL,NULL,NULL,NULL,NULL),(144,'Forest and Wooded Lands ',0,NULL,NULL,NULL,NULL,NULL,NULL),(145,'Mining Environment ',0,NULL,NULL,NULL,NULL,NULL,NULL),(146,'Other environmental aspects  not elsewhere classified',0,NULL,NULL,NULL,NULL,NULL,NULL),(147,'Mathematical Science',0,NULL,NULL,NULL,NULL,NULL,NULL),(148,'Physical sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(149,'Chemical sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(150,'Earth sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(151,'Information,computer and communication technologies ',0,NULL,NULL,NULL,NULL,NULL,NULL),(152,'Applied sciences and technologies ',0,NULL,NULL,NULL,NULL,NULL,NULL),(153,'Engineering sciences ',0,NULL,NULL,NULL,NULL,NULL,NULL),(154,'Biological sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(155,'Agricultural sciences  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(156,'Medical and health sciences  ',0,NULL,NULL,NULL,NULL,NULL,NULL),(157,'Multimedia',0,NULL,NULL,NULL,NULL,NULL,NULL),(158,'Other Natural sciences, technology, and engineering not elsewhere classified   ',0,NULL,NULL,NULL,NULL,NULL,NULL),(159,'Social sciences',0,NULL,NULL,NULL,NULL,NULL,NULL),(160,'Humanities ',0,NULL,NULL,NULL,NULL,NULL,NULL),(161,'Cyber law',0,NULL,NULL,NULL,NULL,NULL,NULL),(162,'Other Social sciences and humanities not elsewhere classified ',0,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `lppm_reviewer` */

DROP TABLE IF EXISTS `lppm_reviewer`;

CREATE TABLE `lppm_reviewer` (
  `reviewer_id` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) DEFAULT NULL,
  `proposal_penelitian_id` int(11) DEFAULT NULL,
  `reviewer_komentar` varchar(255) DEFAULT NULL,
  `status_id` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`reviewer_id`),
  KEY `FK_lppm_reviewer` (`proposal_penelitian_id`),
  KEY `FK_lppm_reviewer_status` (`status_id`),
  CONSTRAINT `FK_lppm_reviewer` FOREIGN KEY (`proposal_penelitian_id`) REFERENCES `lppm_proposal_penelitian` (`proposal_penelitian_id`),
  CONSTRAINT `FK_lppm_reviewer_status` FOREIGN KEY (`status_id`) REFERENCES `lppm_r_status_reviewer` (`status_reviewer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lppm_reviewer` */

insert  into `lppm_reviewer`(`reviewer_id`,`dosen_id`,`proposal_penelitian_id`,`reviewer_komentar`,`status_id`,`deleted`,`deleted_at`,`deleted_by`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (21,5,14,'Menurut saya proposal ini akan sangat membantu perkembangan',6,0,NULL,NULL,'2020-08-26 04:47:12',NULL,'2020-08-28 14:21:33',NULL),(22,6,14,'Proposal ini sangat berguna apabila dilaksanakan dengan baik',6,0,NULL,NULL,'2020-08-26 04:47:12',NULL,'2020-08-28 14:22:14',NULL),(27,2,17,NULL,5,0,NULL,NULL,'2020-08-27 03:43:44',NULL,'2020-08-27 03:43:44',NULL),(28,12,17,NULL,5,0,NULL,NULL,'2020-08-27 03:43:44',NULL,'2020-08-27 03:43:44',NULL),(29,5,20,'Pemikiran yang sangat elegan saya suka ini',6,0,NULL,NULL,'2020-08-27 14:35:57',NULL,'2020-08-27 15:32:01',NULL),(30,6,20,'Bisalah untuk saat ini cuma gimana ya agak gimana gitu',6,0,NULL,NULL,'2020-08-27 14:35:57',NULL,'2020-08-27 15:33:04',NULL),(33,5,21,'Sudah cukup bagus proposalnya',2,0,NULL,NULL,'2020-08-28 03:31:03',NULL,'2020-08-28 03:48:14',NULL),(34,6,21,'Sudah bagus proposalnya',2,0,NULL,NULL,'2020-08-28 03:31:03',NULL,'2020-08-28 04:34:32',NULL),(35,5,24,'tes',6,0,NULL,NULL,'2020-08-28 09:20:12',NULL,'2020-08-28 09:35:35',NULL),(36,6,24,'tes',6,0,NULL,NULL,'2020-08-28 09:20:12',NULL,'2020-08-28 09:34:57',NULL),(37,5,26,'sudah bagus',6,0,NULL,NULL,'2020-08-28 14:53:38',NULL,'2020-08-29 02:10:05',NULL),(38,6,26,'masih ada kurang di bagian data',6,0,NULL,NULL,'2020-08-28 14:53:38',NULL,'2020-08-29 02:09:38',NULL),(39,5,27,'bagus',2,0,NULL,NULL,'2020-08-29 02:13:59',NULL,'2020-08-29 02:14:45',NULL),(40,6,27,'kurang bagus',3,0,NULL,NULL,'2020-08-29 02:13:59',NULL,'2020-08-29 02:15:12',NULL);

/*Table structure for table `lppm_user_role` */

DROP TABLE IF EXISTS `lppm_user_role`;

CREATE TABLE `lppm_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_info` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `lppm_user_role` */

insert  into `lppm_user_role`(`user_role_id`,`user_role_info`,`created_at`,`updated_at`) values (1,'LPPM',NULL,NULL),(2,'Dekan',NULL,NULL),(3,'Kaprodi',NULL,NULL),(4,'Dosen',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tagslist` */

DROP TABLE IF EXISTS `tagslist`;

CREATE TABLE `tagslist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `pen_id` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tagslist` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_role` (`role`),
  CONSTRAINT `FK_users_role` FOREIGN KEY (`role`) REFERENCES `lppm_user_role` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`role`,`created_at`,`updated_at`) values (1,'LPPM','lppm@del.ac.id',NULL,'$2y$10$2qZPIex71D8coOpMjjGf/.CinrobPgdawZLls6YQyB8pa9NN/vp3m',NULL,1,'2020-08-27 15:15:28','2020-08-27 15:15:28'),(2,'Dekan','dekan@del.ac.id',NULL,'$2y$10$cimdhMH0y.ckJ/2DMNOTzOmTxKrkRoqbGLYwBlqEUiLRdZ5HTNUaO',NULL,2,'2020-08-27 16:51:22','2020-08-27 16:51:22'),(3,'kaprodi','kaprodi@del.ac.id',NULL,'$2y$10$nfN2n2enJEXOYyND0clHUOeaZtJixJwN1Zd9eB6ja2/iJAAG5hJSC',NULL,3,'2020-08-27 16:51:56','2020-08-27 16:51:56'),(4,'Dosen Pengaju','dosen@del.ac.id',NULL,'$2y$10$UUJjTN0Y0pTua0N40PnNq.X54jmcSmfBiLOiTeuYUY4/DdHlhmq5i',NULL,4,'2020-08-27 16:52:59','2020-08-27 16:52:59'),(5,'reviewer1','reviewer1@del.ac.id',NULL,'$2y$10$GlnB/pqRM9jDN8/05LbVIOqKZM0WdgnItWaCB1zmAAWu12RlGIrp2',NULL,4,'2020-08-27 16:53:28','2020-08-27 16:53:28'),(6,'reviewer2','reviewer2@del.ac.id',NULL,'$2y$10$qbAV3H6FngYFlpNUiytG/OzilwFXnaBBeWcXYwFozY1mGFar5AE0G',NULL,4,'2020-08-27 16:53:50','2020-08-27 16:53:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
