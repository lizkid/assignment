/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.29-0ubuntu0.20.04.3 : Database - assignment
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`assignment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `assignment`;

/*Table structure for table `cargos` */

DROP TABLE IF EXISTS `cargos`;

CREATE TABLE `cargos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cargo_no` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `cargo_type` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cargo_size` decimal(8,0) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `remarks` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wharfage` decimal(10,2) NOT NULL,
  `penalty` int NOT NULL,
  `storage` decimal(10,2) NOT NULL,
  `electricity` decimal(40,2) unsigned NOT NULL,
  `destuffing` decimal(40,2) NOT NULL,
  `lifting` decimal(40,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cargos` */

/*Table structure for table `cff` */

DROP TABLE IF EXISTS `cff`;

CREATE TABLE `cff` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cargo_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `cargo_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `cargo_size` int DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `remarks` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wharfage` double DEFAULT NULL,
  `penalty` int DEFAULT NULL,
  `storage` float DEFAULT NULL,
  `electricity` float DEFAULT NULL,
  `destuffing` float DEFAULT NULL,
  `lifting` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cff` */

insert  into `cff`(`id`,`cargo_no`,`cargo_type`,`cargo_size`,`weight`,`remarks`,`wharfage`,`penalty`,`storage`,`electricity`,`destuffing`,`lifting`,`created_at`,`updated_at`) values 
(2,'Cargo no','Cargo type',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:20:58','2022-06-10 10:20:58'),
(3,'CXDU2001497','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:20:59','2022-06-10 10:20:59'),
(4,'KLSU2009485','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:20:59','2022-06-10 10:20:59'),
(5,'JLOI2006409','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:00','2022-06-10 10:21:00'),
(6,'OPLW2004799','HALF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:01','2022-06-10 10:21:01'),
(7,'QAWA2001198','HALF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:02','2022-06-10 10:21:02'),
(8,'PQZP2002997','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:03','2022-06-10 10:21:03'),
(9,'RIFY2005197','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:04','2022-06-10 10:21:04'),
(10,'MQPL2009088','HALF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:05','2022-06-10 10:21:05'),
(11,'KHWS2008809','FULL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-06-10 10:21:06','2022-06-10 10:21:06');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`created_at`,`updated_at`) values 
(1,'admin','$2y$10$NP4GOb7A2yDK9MSRTn7Q1erethDPZy3.NcKf7f2z5ZArqe4lfpwjO','2022-06-10 16:42:52','2022-06-10 16:42:52');

/* Procedure structure for procedure `saveCargoSP` */

/*!50003 DROP PROCEDURE IF EXISTS  `saveCargoSP` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`syntaxroot`@`%` PROCEDURE `saveCargoSP`(cNo varchar(20), cType varchar(10), cSize int(20), weight float(10),  
    remarks varchar(25), wharfage float(10), penalty int(8), cStorage float(10),
    ele float(10), dest float(8), lift float(10)
     )
BEGIN
	insert into cargos(cargo_no, cargo_type, cargo_size, weight, remarks, wharfage, 
	penalty, storage, electricity, destuffing, lifting) values(cNo, cType, cSize, weight, remarks, wharfage,
	penalty, cStorage, ele, dest, lift);
	
	if (Row_count() > 0) then
	select 'successfull saved' as message, '01' as result_code;
	else
	select 'failed' as message, '0' as result_code;
	end if;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `getAllCargosSP` */

/*!50003 DROP PROCEDURE IF EXISTS  `getAllCargosSP` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`syntaxroot`@`%` PROCEDURE `getAllCargosSP`()
BEGIN
	
	select `id`,`cargo_no`,`cargo_type`,`cargo_size`,
	`weight`,`remarks`,`wharfage`,`penalty`,`storage`,`electricity`,`destuffing`,
	`lifting`,`created_at`,`updated_at`
	from cargos;

	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
