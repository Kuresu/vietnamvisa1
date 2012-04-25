-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 25, 2012 at 12:48 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `visa1`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(4) NOT NULL auto_increment,
  `fullname` varchar(255) NOT NULL default '',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `active` enum('Yes','No') NOT NULL default 'Yes',
  `group` enum('admin','support') NOT NULL default 'support',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (20, 'Nguyen Tien Chinh', 'tienchinh', 'e10adc3949ba59abbe56e057f20f883e', 'chinhnt@vietnamdeltatour.com', 'Yes', 'admin');
INSERT INTO `admin` VALUES (26, 'Tran Ngoc Ha', 'hatn', '65bd67b978b15eb1930d1ed615f034ca', 'hatn@vietnamdeltatour.com', 'Yes', 'admin');
INSERT INTO `admin` VALUES (28, 'Anthony Tran', 'tonytran', 'e10adc3949ba59abbe56e057f20f883e', 'incredibletran@gmail.com', 'Yes', 'admin');
