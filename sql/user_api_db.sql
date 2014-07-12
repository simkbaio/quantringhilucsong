/*
SQLyog Ultimate v9.51 
MySQL - 5.6.12-log : Database - users_api
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`permissions`,`created_at`,`updated_at`) values (2,'Thành viên thông thường','{\"user\":1,\"admin\":1,\"admin.menuspack.index\":1}','0000-00-00 00:00:00','2014-05-16 08:50:11'),(6,'Quản trị viên','{\"admin\":1,\"admin.menuspack.index\":1,\"admin.menuspacks.index\":1,\"admin.students.create\":1,\"admin.students.index\":1,\"user\":1}','2014-05-15 21:48:08','2014-05-20 08:51:09'),(7,'Học viên nghị lực sống','{\"admin.menuspack.index\":1,\"user\":1}','2014-05-15 22:16:47','2014-05-16 09:13:12'),(8,'Giáo viên Nghị Lực Sống','{\"user\":1}','2014-05-15 22:17:17','2014-05-16 09:15:56'),(9,'Developers','{\"admin\":1,\"admin.menuspack.index\":1,\"admin.menuspacks.index\":1,\"admin.students.create\":1,\"admin.students.index\":1,\"user\":1}','2014-05-17 10:39:25','2014-05-20 09:22:54');

/*Table structure for table `menu_menuspack` */

DROP TABLE IF EXISTS `menu_menuspack`;

CREATE TABLE `menu_menuspack` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `menuspack_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menu_menuspack_menu_id_index` (`menu_id`),
  KEY `menu_menuspack_menuspack_id_index` (`menuspack_id`),
  CONSTRAINT `menu_menuspack_menuspack_id_foreign` FOREIGN KEY (`menuspack_id`) REFERENCES `menuspacks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menu_menuspack_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu_menuspack` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `menuspack_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `sercury` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`title`,`parent`,`menuspack_id`,`order`,`link`,`sercury`,`icon`,`description`,`permission`,`created_at`,`updated_at`) values (2,'Quản lý Thành viên',0,1,2,'#',0,'fa fa-group',NULL,NULL,'2014-05-13 09:51:18','2014-05-25 07:37:31'),(6,'Trang chủ',0,1,0,'admin',0,'fa fa-home',NULL,NULL,'2014-05-14 09:41:10','2014-05-25 07:37:31'),(9,'Config',0,1,3,'#',0,'fa fa-gears ',NULL,NULL,'2014-05-14 10:19:50','2014-05-25 07:37:31'),(12,'Nhóm',2,1,0,'admin/groups',0,'fa fa-group',NULL,NULL,'2014-05-15 09:00:49','2014-05-25 07:37:31'),(13,'Thành viên',2,1,1,'admin/users',0,'fa fa-user',NULL,NULL,'2014-05-15 09:06:35','2014-05-25 07:37:31'),(14,'Menus',9,1,0,'admin/menuspacks',0,'fa fa-tasks',NULL,NULL,'2014-05-15 09:08:30','2014-05-25 07:37:31'),(15,'Quyền truy cập',2,1,2,'admin/permissions',0,'fa fa-lock',NULL,NULL,'2014-05-16 09:25:07','2014-05-25 07:37:31'),(16,'Quản lý học tập',0,1,1,'#',0,'fa fa-building-o',NULL,NULL,'2014-05-19 05:07:53','2014-05-25 07:37:31'),(17,'Học viên',16,1,3,'admin/students',0,'fa fa-book',NULL,NULL,'2014-05-19 05:09:58','2014-05-25 07:37:31'),(18,'Giáo viên',16,1,2,'admin/teachers',0,'fa fa-briefcase',NULL,NULL,'2014-05-20 09:17:23','2014-05-25 07:37:31'),(19,'Khóa học',16,1,0,'admin/courses',0,'fa fa-leaf',NULL,NULL,'2014-05-21 09:03:54','2014-05-25 07:37:31'),(20,'Lớp học',16,1,1,'admin/classes',0,'fa fa-coffee',NULL,NULL,'2014-05-22 08:02:59','2014-05-25 07:37:31');

/*Table structure for table `menuspacks` */

DROP TABLE IF EXISTS `menuspacks`;

CREATE TABLE `menuspacks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menuspacks` */

insert  into `menuspacks`(`id`,`name`,`order`,`created_at`,`updated_at`) values (1,'Admin: Left Sidebar',0,'2014-05-13 09:51:18','2014-05-13 09:51:18'),(2,'Menu trang chủ',0,'2014-05-15 21:50:18','2014-05-15 21:50:18');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),('2014_05_11_201752_create_permissions_table',2),('2014_05_12_095049_create_menuspacks_table',3),('2014_05_12_095932_create_menus_table',3),('2014_05_12_102758_create_menu_menuspack_table',3),('2014_05_16_094357_create_tblTeacher_table',4),('2014_05_31_024313_Create_Pages_Table',5),('2014_06_12_160302_create_subjects_table',6);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `homepage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'index,follow',
  `actived` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pages` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`created_at`,`updated_at`) values (3,'admin','2014-05-15 20:57:44','2014-05-15 20:57:44'),(4,'user','2014-05-15 20:57:44','2014-05-15 20:57:44'),(5,'admin.menuspack.index','2014-05-20 04:38:34','2014-05-20 04:38:34'),(6,'admin.students.index','2014-05-20 04:39:24','2014-05-20 04:39:24'),(7,'admin.students.create','2014-05-20 04:43:13','2014-05-20 04:43:13'),(8,'admin.menuspacks.index','2014-05-20 08:50:40','2014-05-20 08:50:40');

/*Table structure for table `throttle` */

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `throttle` */

insert  into `throttle`(`id`,`user_id`,`ip_address`,`attempts`,`suspended`,`banned`,`last_attempt_at`,`suspended_at`,`banned_at`) values (1,25,'127.0.0.1',0,0,0,NULL,NULL,NULL),(2,27,'127.0.0.1',0,0,0,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`permissions`,`activated`,`activation_code`,`activated_at`,`last_login`,`persist_code`,`reset_password_code`,`first_name`,`last_name`,`created_at`,`updated_at`) values (27,'simkbaio@gmail.com','$2y$10$nHfg2TgWGXSMvU5Ur9LkJeGwNg37usrtwEJjOW1dRhifyYcNrrSem','',1,NULL,NULL,'2014-06-26 16:36:03','$2y$10$7HcOVACl57SPMhzJWLDiZePpjZNJVxZV2w1O7meueSYp/utUcdkB2',NULL,'Ngọc Anh','Dương','2014-05-16 04:39:39','2014-06-26 16:36:03');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_groups` */

insert  into `users_groups`(`user_id`,`group_id`) values (27,2),(27,6),(27,9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
