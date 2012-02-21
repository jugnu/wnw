/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.8 : Database - wnw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`wnw` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wnw`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`cat_name`,`parent_id`,`created_on`,`updated_on`) values (1,'men',0,NULL,NULL),(2,'shoe',1,NULL,NULL),(3,'women',0,NULL,NULL),(4,'classical',2,NULL,NULL),(5,'New in',0,'2012-02-19 16:04:38','2012-02-19 16:04:38'),(6,'trendy',2,'2012-02-19 16:10:33','2012-02-19 16:10:33'),(7,'New arrival',3,'2012-02-19 19:07:13','2012-02-19 19:07:13'),(8,'Brands',0,'2012-02-19 21:01:48','2012-02-19 21:01:48');

/*Table structure for table `product_colors` */

DROP TABLE IF EXISTS `product_colors`;

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `product_colors` */

insert  into `product_colors`(`id`,`product_id`,`color_name`) values (1,1,'black'),(2,1,'white'),(3,2,'red'),(4,2,'blue');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `original_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`thumb`,`original_image`) values (1,1,'tttt','bbbbbbb'),(2,2,'aaaaa','ccccc');

/*Table structure for table `product_sizes` */

DROP TABLE IF EXISTS `product_sizes`;

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `product_sizes` */

insert  into `product_sizes`(`id`,`product_id`,`size`) values (1,1,'5'),(2,1,'6'),(3,1,'7');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `material` varchar(255) DEFAULT NULL,
  `unitPrice` float DEFAULT NULL,
  `discountPrice` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_featured` tinyint(1) DEFAULT '0',
  `units_in_stock` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products` (`category_id`),
  KEY `FK_product1` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`title`,`description`,`material`,`unitPrice`,`discountPrice`,`is_active`,`is_featured`,`units_in_stock`,`created_on`,`updated_on`) values (1,1,'TEST','jhgjhgghghjgjhgghjgh','leather',19,15,1,0,20,NULL,NULL),(2,3,'test1','jhkjhkjhjhkjhkhkhl','leather',12.3,10.5,1,0,10,NULL,NULL);

/*Table structure for table `schema_migrations` */

DROP TABLE IF EXISTS `schema_migrations`;

CREATE TABLE `schema_migrations` (
  `version` varchar(255) NOT NULL,
  UNIQUE KEY `unique_schema_migrations` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schema_migrations` */

insert  into `schema_migrations`(`version`) values ('20111111233704');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`role`) values (1,'khurram','admin','users'),(2,'user1','pass1','admins');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
