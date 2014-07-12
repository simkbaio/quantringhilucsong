/*
SQLyog Ultimate v9.51 
MySQL - 5.6.12-log : Database - hosohocvien_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `class_schedules` */

DROP TABLE IF EXISTS `class_schedules`;

CREATE TABLE `class_schedules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `hour_start` varchar(5) DEFAULT '00:00',
  `hour_end` varchar(5) DEFAULT '00:00',
  `day` int(2) DEFAULT '0',
  `place` varchar(255) DEFAULT NULL,
  `subject_id` int(11) unsigned NOT NULL,
  `teacher_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `class_schedules_ibfk_2` (`subject_id`),
  CONSTRAINT `class_schedules_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`id`) ON DELETE CASCADE,
  CONSTRAINT `class_schedules_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `class_schedules_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `class_schedules` */

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`name`,`description`,`created_at`,`updated_at`) values (3,'Tiếng Anh căn bản','Tiếng anh căn bản cho người chưa biết gì','2014-06-18 15:29:54','2014-06-18 15:29:54'),(4,'Tiếng anh chuyên ngành CNTT','Tiếng anh chuyên ngành CNTT','2014-06-18 15:37:51','2014-06-18 15:37:51'),(5,'Tập gõ 10 ngón','','2014-06-18 15:43:51','2014-06-18 15:43:51');

/*Table structure for table `tbl_class` */

DROP TABLE IF EXISTS `tbl_class`;

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_class_ibfk_1` (`course_id`),
  CONSTRAINT `tbl_class_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_class` */

insert  into `tbl_class`(`id`,`name`,`description`,`course_id`,`teacher_id`,`start`,`end`) values (8,'Lập trình web căn bản - 3','Lập trình web căn bản - 3',3,4,NULL,NULL),(9,'Chỉnh sửa ảnh cơ bản','Chỉnh sửa ảnh đợt hè',2,4,NULL,NULL);

/*Table structure for table `tbl_class_student` */

DROP TABLE IF EXISTS `tbl_class_student`;

CREATE TABLE `tbl_class_student` (
  `class` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `class` (`class`),
  KEY `student` (`student`),
  CONSTRAINT `tbl_class_student_ibfk_1` FOREIGN KEY (`class`) REFERENCES `tbl_class` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_class_student_ibfk_2` FOREIGN KEY (`student`) REFERENCES `tbl_student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_class_student` */

/*Table structure for table `tbl_course` */

DROP TABLE IF EXISTS `tbl_course`;

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_course` */

insert  into `tbl_course`(`id`,`name`,`description`,`start`,`end`) values (2,'Photoshop','Dạy chỉnh sửa ảnh bằng photoshop',1399334400,1433894400),(3,'Lập trình Web căn bản','Hướng dẫn căn bản về Lập trình Web: HTML, CSS, JS',1400605200,1423587600),(4,'Lập trình Web nâng cao','',1400630400,1407369600);

/*Table structure for table `tbl_educated` */

DROP TABLE IF EXISTS `tbl_educated`;

CREATE TABLE `tbl_educated` (
  `edu_id` int(11) NOT NULL AUTO_INCREMENT,
  `edu_name` varchar(50) NOT NULL,
  `edu_description` text NOT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tbl_educated` */

/*Table structure for table `tbl_student` */

DROP TABLE IF EXISTS `tbl_student`;

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `birthday` int(11) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `married` int(11) DEFAULT NULL,
  `educated` int(11) DEFAULT NULL,
  `type_disabilities` int(11) DEFAULT NULL,
  `person_authen` varchar(250) DEFAULT NULL,
  `person_authen_name` varchar(250) DEFAULT NULL,
  `person_authen_address` varchar(250) DEFAULT NULL,
  `regis_date` int(11) DEFAULT NULL,
  `last_update` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(30) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_student` */

insert  into `tbl_student`(`id`,`name`,`birthday`,`sex`,`address`,`hometown`,`phone`,`email`,`facebook`,`province_id`,`married`,`educated`,`type_disabilities`,`person_authen`,`person_authen_name`,`person_authen_address`,`regis_date`,`last_update`,`active`,`password`,`last_name`,`first_name`,`facebook_id`,`picture`) values (8,'Ellie Wisoky',667612800,0,'170 Rosalyn Villages Apt. 785Conroystad, ME 94017','00966 Schumm Flat Apt. 728Brantville, RI 27158-4451','164-010-3656x99','keshawn.hintz@hotmail.com','fackebook.com/Tempore',1,0,3,1,NULL,'Tatyana Hirthe','2260 Howe UnionWest Abigailport, MS 27170-8507',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),(11,'Hoàng Văn An',24,0,'152 Xuân Đỉnh, Từ Liêm, Hà Nội','Hà Nội','0987654321','abc@abc.com','sdfsdf',1,1,2,1,NULL,'Hoàng Xuân Bê','152 Xuân Đỉnh, Từ Liêm, Hà Nội',1400492706,1400492706,1,NULL,NULL,NULL,NULL,NULL),(17,'Dương Hoàng Nam',635472000,0,'170 Rosalyn Villages Apt. 785Conroystad, ME 94017','00966 Schumm Flat Apt. 728Brantville, RI 27158-4451','20931023810','abc@abc.com','fackebook.com/Tempore',1,1,3,4,NULL,'Hoàng Xuân Bê','2260 Howe UnionWest Abigailport, MS 27170-8507',1400574157,1400574157,1,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL),(18,'ádấdád',631126800,0,'adsađâsd','áđâsdá','0915320568','admin@domain.com','https://www.facebook.com/simkbaio',1,0,0,1,NULL,'đâsd','sdấd',1402299240,1402299240,1,'4297f44b13955235245b2497399d7a93',NULL,NULL,NULL,NULL),(22,'Dương Ngọc Anh',946659600,1,NULL,NULL,NULL,'simkbaio@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'4297f44b13955235245b2497399d7a93','Dương','Ngọc Anh',NULL,NULL),(23,'',1,1,NULL,'Hanoi',NULL,'simkbaio@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'Ngọc Anh','Dương','10152443604284513',NULL);

/*Table structure for table `tbl_student_result` */

DROP TABLE IF EXISTS `tbl_student_result`;

CREATE TABLE `tbl_student_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `result_student_id` int(11) NOT NULL,
  `result_class_id` int(11) NOT NULL,
  `result_type_academic` int(11) DEFAULT '0',
  `result_type_conduct` int(11) DEFAULT '0',
  `result_note` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `subject_id` int(11) unsigned NOT NULL,
  `teacher_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `result_student_id` (`result_student_id`),
  KEY `result_class_id` (`result_class_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `tbl_student_result_ibfk_1` FOREIGN KEY (`result_student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_student_result_ibfk_2` FOREIGN KEY (`result_class_id`) REFERENCES `tbl_class` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_student_result` */

insert  into `tbl_student_result`(`result_id`,`result_student_id`,`result_class_id`,`result_type_academic`,`result_type_conduct`,`result_note`,`status`,`subject_id`,`teacher_id`) values (7,8,9,0,0,NULL,0,0,0),(8,11,9,0,0,NULL,0,0,0),(9,8,8,0,0,NULL,0,0,0),(10,17,8,0,0,NULL,0,0,0),(13,11,8,0,0,NULL,0,0,0),(14,17,9,0,0,NULL,0,0,0),(15,18,9,0,0,NULL,0,0,0),(16,18,8,0,0,NULL,0,0,0),(17,22,9,0,0,NULL,0,0,0),(18,22,8,0,0,NULL,0,0,0);

/*Table structure for table `tbl_teacher` */

DROP TABLE IF EXISTS `tbl_teacher`;

CREATE TABLE `tbl_teacher` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `join_date` int(11) DEFAULT NULL,
  `out_date` int(11) DEFAULT NULL,
  `phone` char(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_teacher` */

insert  into `tbl_teacher`(`id`,`name`,`type`,`join_date`,`out_date`,`phone`,`address`,`email`) values (4,'Dương Ngọc Anh',NULL,1363824000,1426896000,'0984564567','Hà Nội','simkbaio@gmail.com'),(5,'Trần Minh Hiếu',NULL,1391360400,1422896400,'09892312','172 Xuân Đỉnh, Từ Liêm, Hà Nội','simkbaio@12abc.com');

/*Table structure for table `tbl_types_disabilities` */

DROP TABLE IF EXISTS `tbl_types_disabilities`;

CREATE TABLE `tbl_types_disabilities` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_name` varchar(100) NOT NULL,
  `dis_description` text NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tbl_types_disabilities` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
