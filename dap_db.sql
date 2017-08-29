SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+10:00";

-- Database 
CREATE DATABASE IF NOT EXISTS `localhost_dap_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `localhost_dap_db`;

-- Table for USERS
CREATE TABLE IF NOT EXISTS `users`(
   `user_id` int(11) NOT NULL AUTO_INCREMENT,
   `full_name` varchar(75) NOT NULL,
   `address` varchar(150) DEFAULT NULL,
   `phone` varchar(15) NOT NULL,
   `email` varchar(50) NOT NULL,
   `user_group` boolean DEFAULT NULL,
   `password` varchar(100) NOT NULL,
   PRIMARY KEY (`user_id`),
   UNIQUE KEY `email`(`email`)
)ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

-- Add Admin 
INSERT INTO `users`(`user_id`,`full_name`,`address`,`phone`,`email`,`user_group`,`password`) VALUES
(1,'Admin',NULL,'(07) 55555555','admin@email.com',true,'Abc123'),

-- Table for GALLERY
CREATE TABLE IF NOT EXISTS `gallery`(
   `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
   `user_id` int(11) NOT NULL,
   `gallery_name` varchar(150) NOT NULL,
   PRIMARY KEY(`gallery_id`)
)ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- Add default Gallery
INSERT INTO `gallery` (`user_id`,`gallery_name`) VALUES
(1,'PHOTOGRAGHER NAME'),


-- Table for PHOTO
CREATE TABLE IF NOT EXISTS `photo`(
   `gallery_id` int(11),
   `photo_id` int(11) NOT NULL AUTO_INCREMENT,
   `photo_name` varchar(50) NOT NULL,
   PRIMARY KEY(`photo_id`)
)ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
   
INSERT INTO `photo` (`gallery_id`,`photo_name`) VALUES
(1,'pinup1.jpg'),
(1,'pinup2.jpg'),
(1,'pinup3.jpg'),
(1,'pinup4.jpg'),
(1,'pinup5.jpg'),
(1,'pinup6.jpg'),
(2,'portrait1.jpg'),
(2,'portrait2.jpg'),
(2,'portrait3.jpg'),
(2,'portrait4.jpg'),
(2,'portrait5.jpg');


