-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 24, 2012 at 11:40 PM
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
  `time` date NOT NULL,
  `active` enum('yes','no') NOT NULL default 'yes',
  `group` enum('admin','support') NOT NULL default 'support',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (28, 'Anthony Tran', 'tonytran', '96e79218965eb72c92a549dd5a330112', 'incredibletran@gmail.com', '2012-05-18', 'yes', 'admin');
INSERT INTO `admin` VALUES (43, 'Anthony Tran', 'anthonytran', '96e79218965eb72c92a549dd5a330112', 'incredibletran@gmail.com', '2012-04-30', 'yes', 'admin');
INSERT INTO `admin` VALUES (48, 'Thanh', 'thanhtv', '96e79218965eb72c92a549dd5a330112', 'thanhtran@vietnambiz.com', '2012-04-28', 'yes', 'admin');
INSERT INTO `admin` VALUES (52, 'Jason Statham', 'jason', '96e79218965eb72c92a549dd5a330112', 'jason@hotmail.com', '2012-04-28', 'yes', 'support');
INSERT INTO `admin` VALUES (53, 'Bruce willis', 'bruce', '44aa8b235d60363d5d1765e355e404f8', 'bruce@gmail.com', '2012-04-28', 'yes', 'support');
INSERT INTO `admin` VALUES (54, 'Sam Worthington', 'sam', '96e79218965eb72c92a549dd5a330112', 'sam@hotmail.com', '2012-05-17', 'yes', 'support');
INSERT INTO `admin` VALUES (55, 'Taylor Kitsch', 'taylor', '96e79218965eb72c92a549dd5a330112', 'taylor@gmail.com', '2012-05-17', 'yes', 'support');
INSERT INTO `admin` VALUES (56, 'Anthony Tran', 'bigC', '96e79218965eb72c92a549dd5a330112', 'incredibletran@gmail.com', '2012-04-28', 'yes', 'support');
INSERT INTO `admin` VALUES (57, 'Metro', 'metro', '96e79218965eb72c92a549dd5a330112', 'incredibletran@gmail.com', '2012-04-28', 'yes', 'support');
INSERT INTO `admin` VALUES (58, 'Mosscow', 'mosscow', '96e79218965eb72c92a549dd5a330112', 'chinhnt@gmail.com', '2012-04-28', 'yes', 'support');
INSERT INTO `admin` VALUES (59, 'Paris', 'paris', '147dc3ada296fb189916abd05643d1f7', 'incredibletran@gmail.com', '2012-04-29', 'yes', 'support');
INSERT INTO `admin` VALUES (60, 'mylove', 'mylove', '96e79218965eb72c92a549dd5a330112', 'incredibletran@gmail.com', '2012-05-18', 'yes', 'support');

-- --------------------------------------------------------

-- 
-- Table structure for table `ans_answer`
-- 

CREATE TABLE `ans_answer` (
  `id` int(4) NOT NULL auto_increment,
  `id_question` int(4) default NULL,
  `sender` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default 'Jenny Garden',
  `answer` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `ans_answer`
-- 

INSERT INTO `ans_answer` VALUES (20, 15, 'Kelly Rose', '<p>\r\n oh my god?</p>', '2012-05-24 23:22:58');
INSERT INTO `ans_answer` VALUES (17, 22, 'Tony tran', '<p>\r\n Of course you can.</p>', '2012-05-18 12:05:17');
INSERT INTO `ans_answer` VALUES (18, 17, 'Tony tran', '<p>\r\n hahahahahaa</p>', '2012-05-24 23:21:39');
INSERT INTO `ans_answer` VALUES (19, 16, 'Jenny Garden', '<p>\r\n what?</p>', '2012-05-24 23:22:33');

-- --------------------------------------------------------

-- 
-- Table structure for table `ans_category`
-- 

CREATE TABLE `ans_category` (
  `id` int(4) NOT NULL auto_increment,
  `name` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
  `name_ascii` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `order` int(5) NOT NULL,
  `active` enum('yes','no') character set utf8 collate utf8_unicode_ci NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `ans_category`
-- 

INSERT INTO `ans_category` VALUES (13, 'My love', 'my-love', 8, 'yes');
INSERT INTO `ans_category` VALUES (11, 'Visa Guide', 'visa-guide', 4, 'yes');
INSERT INTO `ans_category` VALUES (12, 'Visa Online', 'visa-online', 2, 'yes');
INSERT INTO `ans_category` VALUES (14, 'My love 4', 'my-love-4', 9, 'yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `ans_question`
-- 

CREATE TABLE `ans_question` (
  `id` int(4) NOT NULL auto_increment,
  `cate_id` int(5) NOT NULL,
  `cate_name` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `brief` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `brief_ascii` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sender` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `sender_email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `detail` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `active` enum('yes','no') default 'no',
  `is_admin` enum('yes','no') default NULL,
  `is_home` enum('yes','no') default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- 
-- Dumping data for table `ans_question`
-- 

INSERT INTO `ans_question` VALUES (12, 1, '', 'Photo and visa on arrival', 'photo-and-visa-on-arrival', 'Riley Hertweck', 'riley@yahoo.com', 'I am from Germany. Do I need to submit scanned photos when I apply for a Vietnam visa online? What are the sizes?', '2012-04-11 03:32:04', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (14, 1, '', 'Entry/exit application', 'entry-exit-application', 'Daniel', 'daniel@gmail.com', 'I have recently applied for a visa for Vietnam online. I have been given the forms to state that they have been accepted but they ask for an application form to be filled out as well. At the bottom it tells you to submit 1 form to the visa issuing office and the other to the police post on arrival. Where is the visa issuing office? Do I need to go to the embassy?', '2012-04-11 03:35:12', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (11, 1, '', 'Visa for US citizen', 'visa-for-us-citizen', 'Ethan', 'ethan@gmail.com', 'Hello, \nI am going to fly from U.S. to visit Manila, and then fly to Hanoi. I will stay for 4 days then fly to Saigon, then go on to Cambodia. What is the easiest way to make arrival into Hanoi? Can I get a visa for 14 days at the Hanoi arrival? Thank you very much.', '2012-04-11 03:30:35', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (15, 13, 'My love', 'Is the Visa-on-arrival desk open 24 hours?', 'is-the-visa-on-arrival-desk-open-24-hours', 'Braden', 'braden@yahoo.com', 'We arrive from Manila at 12:30 a.m. I have already applied for and received our approval letters. Can we enter Vietnam?\nThanks a lot.', '2012-04-11 03:36:39', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (16, 14, 'My love 4', 'Do my children need a visa to Vietnam?', 'do-my-children-need-a-visa-to-vietnam', 'Mathew', 'mathew@gmail.com', 'My wife and I have an APEC business card holder and are approved to be Vietnam visa exempted. We would like to carry my children (age 11 and 15) together for my next trip. Do they need to apply for entry visa? Please advise, thank you very much. \nRegards', '2012-04-11 03:37:45', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (17, 14, 'My love 4', 'Visa for UK citizens entering Vietnam via a land border', 'visa-for-uk-citizens-entering-vietnam-via-a-land-border', 'Tristan Reid', 'reid@yahoo.com', 'Hello,\n\nI would like to visit Vietnam and I have looked for information regarding visas and find that I can apply for a visa on arrival, the information then says that I collect the visa when I arrive at an airport.\n \nI want to ask how to apply for and collect a visa on arrival when entering Vietnam across a land border?', '2012-04-11 03:38:41', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (18, 1, '', 'Cruising & visa', 'cruising-visa', 'Caroline Jones', 'caroline@gmail.com', 'We are cruising (2 adults) in October 2010 and will enter Vietnam on several occasions as the ship sails along the coast. We land at Cai Lang (2 days), Da Nang (1day), Nha Trang (1 day) and Ho Chi Minh City (2days). Does this count as one entry? \nYours sincerely', '2012-04-11 03:39:36', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (19, 1, '', 'Vietnam visa on arrival for business purpose', 'vietnam-visa-on-arrival-for-business-purpose', 'Evan Lautensläger', 'evan@gmail.com', 'We need a visa for one of our technicians (UK citizens) for a service in Vietnam. Is it possible to apply online for a visa on arrival for business purposes? \nThanks and best regards', '2012-04-11 03:40:33', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (20, 2, '', 'Visa on arrival from Thailand', 'visa-on-arrival-from-thailand', 'Charlotte', 'charlotte@gmail.com', 'I''m a British citizen hoping to visit Vietnam but would be entering form Thailand (Bangkok). If I apply for visa on arrival while in UK will this be valid when entering form Thailand?', '2012-04-11 03:42:01', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (29, 0, '', 'Visum für vietnamin Bangkok', 'visum-f-r-vietnamin-bangkok', 'Brian Lion', 'brian_brian@gmail.com', 'Hello, We are US citizens and we will travel by air to Vietnam In July from Bangkok to Hanoi. Can you tell me what is the best way to get Vietnam visum in Bangkok?  Thank you.', '2012-05-11 03:29:01', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (28, 0, '', 'Vietnam Transit visa', 'vietnam-transit-visa', 'Tony Adam', 'Tony@yahoo.com.au', 'Hi there, I am just transiting at the Hanoi airport. I only need to collect the luggage and then, I check in for the next flight to Singapore. So I will not be checked all the way through. Do I need a Vietnam visa?', '2012-05-09 04:08:58', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (32, 0, '', 'Other person on the Vietnam Visa approval letter?', 'other-person-on-the-vietnam-visa-approval-letter', 'Mary lee', 'marylee@yahoo.com', 'Hi there, There is a second person listed on my Vietnam visa approval letter that is not part of my party. Can you explain it?  Can  I requested an approval letter for myself alone? Could you please have the letter for Visa to Vietnam reissued?', '2012-05-11 03:32:59', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (33, 0, '', 'Vietnam visa for Bristish passport holder in Singapore?', 'vietnam-visa-for-bristish-passport-holder-in-singapore', 'Jack London', 'Londoninmay@yahoo.com', 'Hi there, There is a second person listed on my Vietnam visa approval letter that is not part of my party. Can you explain it?  Can  I requested an approval letter for myself alone? Could you please have the letter for Visa to Vietnam reissued?', '2012-05-11 03:34:07', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (34, 0, '', 'Visa to vietnam for Japanese Citizens', 'visa-to-vietnam-for-japanese-citizens', 'Ishimoto Ian', 'Ishimoto@yahoo.co.jp', 'Hi there, There is a second person listed on my Vietnam visa approval letter that is not part of my party. Can you explain it?  Can  I requested an approval letter for myself alone? Could you please have the letter for Visa to Vietnam reissued?', '2012-05-11 03:35:18', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (35, 0, '', 'Passports and visas for Vietnam', 'passports-and-visas-for-vietnam', 'Klisman', 'liveandlive@yahoo.com', 'Hi there, There is a second person listed on my Vietnam visa approval letter that is not part of my party. Can you explain it?  Can  I requested an approval letter for myself alone? Could you please have the letter for Visa to Vietnam reissued?', '2012-05-11 03:36:58', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (22, 0, '', 'change arrival airport', 'change-arrival-airport', 'Donald Hill', 'oldmandh@gmail.com', 'I am planning to arrive in SaiGon airport, but if things change at a late date, and\nI actually arrive in HanOi, can I still get the Vietnam visa at the new airport? \nThank you', '2012-05-01 16:32:08', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (23, 0, '', 'visa', 'visa', 'nhan', 'nhanvanle@gmail.com', 'I live in US .I heard about 10 years visa in VN .How can I apply that .', '2012-05-02 02:04:28', 'yes', NULL, 'yes');
INSERT INTO `ans_question` VALUES (25, 0, '', 'Apply for further stay in Vietnam', 'apply-for-further-stay-in-vietnam', 'Le Cam Tu Nguyen', 'cutamphan@yahoo.com', 'Dear Sir/ Madam,\n\nMy son is Leon J Phan, DOB 29/06/2010 and his grandmother is Thi Tu Nguyen, DOB 22/02/1954. They are Australian citizens with Vietnamese background and have been in Vietnam for holiday.\nMy son departed from Sydney airport and arrived to Tan Son Nhat airport on 31st of March.\nMy mother in law arrived later to Tan Son Nhat airport on 24th of April.\n\nTheir visa granted that they could only stay in for maximum 90 days. But because of some reasons they need to stay longer till 6th of October as their travel ticket shown.\nI was wondering what  they should do to remain longer in Vietnam after their visa expired. I have some concerns about as below:\n\n1. How should they apply for extension visa and how long have they had further stay?\n2.Could  they stay in Vietnam until 06/10/2012?\n3. Where is the nearest office to apply and lodge application form in Hochiminh city ?( They stay temporarily in Can Tho province)\n4. What do they need to prepare with for lodging form? ( photo, document, etc...)\n5. How is the fee of extension visa for two of them?\n\nHope to hear from you soon. I appreciate it.\nThanks a lots!\n\nKind regards,\n\nLe Cam Tu Nguyen', '2012-05-09 03:55:38', 'yes', NULL, 'yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `apply`
-- 

CREATE TABLE `apply` (
  `id` int(15) NOT NULL auto_increment,
  `customer_id` int(15) NOT NULL,
  `full_name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `passport` varchar(50) collate utf8_unicode_ci NOT NULL,
  `expiration` varchar(50) collate utf8_unicode_ci NOT NULL,
  `nationality` varchar(150) collate utf8_unicode_ci NOT NULL,
  `birth_date` varchar(50) collate utf8_unicode_ci NOT NULL,
  `gender` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=170 ;

-- 
-- Dumping data for table `apply`
-- 

INSERT INTO `apply` VALUES (95, 77, 'Tien Chinh', '22222222ddd', '1/1/2014', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (96, 78, 'daniel craig', '123456', '2/18/2027', 'United States', '2/2/2010', 'male');
INSERT INTO `apply` VALUES (97, 79, 'daniel craig', '123456', '1/19/2027', 'United Kingdom', '1/1/2011', 'male');
INSERT INTO `apply` VALUES (98, 80, 'aaaaaaaaa', 'aaaaaaaaaa', '12/18/2029', 'Bolivia', '1/17/1993', 'male');
INSERT INTO `apply` VALUES (99, 81, 'TEST OP', '121212121212', '2/19/2028', 'United States', '11/19/1986', 'male');
INSERT INTO `apply` VALUES (100, 82, 'aaaaaaaaa', 'aaaaaaaaaa', '1/1/2013', 'United Kingdom', '1/1/2011', 'male');
INSERT INTO `apply` VALUES (101, 82, 'aaaaaaaaaaaaaa', '222222222222222', '1/1/2013', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (102, 83, 'cccccccccccc', 'ccccc', '4/8/2014', 'United Kingdom', '2/1/2004', 'female');
INSERT INTO `apply` VALUES (103, 84, 'tien chinh', '22222222ddd', '2/2/2013', 'United Kingdom', '1/1/2011', 'male');
INSERT INTO `apply` VALUES (104, 85, 'vietnamvisa', '22222222ddd', '10/17/2028', 'Bolivia', '4/18/1993', 'male');
INSERT INTO `apply` VALUES (105, 86, 'Tien Chinh', 'aaaaaaaaaa', '1/2/2013', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (106, 87, 'Phuong Nguyen', '23333333', '12/18/2028', 'United States', '1/19/1964', 'male');
INSERT INTO `apply` VALUES (107, 88, 'test', '43524566', '2/16/2020', 'United Kingdom', '1/5/1988', 'female');
INSERT INTO `apply` VALUES (108, 89, 'sss', 'ssssffww3', '2/19/2029', 'United States', '3/3/1967', 'male');
INSERT INTO `apply` VALUES (109, 90, 'hatran', '123456', '1/30/2017', 'United States', '2/18/1997', 'male');
INSERT INTO `apply` VALUES (110, 91, 'hatran', '123456', '2/12/2015', 'United States', '2/10/2008', 'male');
INSERT INTO `apply` VALUES (111, 92, 'hatran', '123456', '2/17/2025', 'Algeria', '2/19/2001', 'male');
INSERT INTO `apply` VALUES (112, 93, 'hatran', '123456', '1/18/2015', 'United States', '1/18/1996', 'male');
INSERT INTO `apply` VALUES (113, 94, 'sssss', 'sssw', '1/19/2023', 'United Kingdom', '1/3/1971', 'male');
INSERT INTO `apply` VALUES (114, 95, 'hatran', '123456', '1/17/2014', 'United States', '2/17/2001', 'male');
INSERT INTO `apply` VALUES (115, 96, 'Tien Chinh', '22222222ddd', '1/1/2016', 'United Kingdom', '2/2/2010', 'female');
INSERT INTO `apply` VALUES (116, 96, 'Tien Chinh', '222222222222222', '1/1/2014', 'United Kingdom', '2/1/2011', 'female');
INSERT INTO `apply` VALUES (117, 97, 'hatran', '123456', '1/1/2013', 'United States', '1/2/2010', 'male');
INSERT INTO `apply` VALUES (118, 98, 'Tien Chinh', 'aaaaaaaaaa', '2/2/2013', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (119, 99, 'hatran', '123456', '1/18/2015', 'United States', '2/17/1995', 'male');
INSERT INTO `apply` VALUES (120, 100, 'hatran', '123456', '1/18/2015', 'United States', '2/17/1998', 'male');
INSERT INTO `apply` VALUES (121, 101, 'Phuong Nguyen', '23333333', '10/18/2030', 'United Kingdom', '2/19/1993', 'male');
INSERT INTO `apply` VALUES (122, 102, 'Tien Chinh', 'aaaaaaaaaa', '4/2/2014', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (123, 102, 'aaaaaaaaaaaaaa', '222222222222222', '9/1/2017', 'United Kingdom', '1/1/2010', 'male');
INSERT INTO `apply` VALUES (124, 103, 'Tien Chinh', '22222222ddd', '2/18/2029', 'United Kingdom', '2/5/2008', 'male');
INSERT INTO `apply` VALUES (125, 104, 'test', 'fg2244555', '1/11/2021', 'United Kingdom', '1/12/1987', 'male');
INSERT INTO `apply` VALUES (126, 105, 'daniel craig', '123456', '3/18/2013', 'United States', '1/2/2008', 'male');
INSERT INTO `apply` VALUES (127, 106, 'daniel craig', '123456', '2/18/2014', 'United States', '1/2/2010', 'male');
INSERT INTO `apply` VALUES (128, 107, 'daniel craig', '123456', '2/16/2013', 'United States', '2/1/2010', 'male');
INSERT INTO `apply` VALUES (129, 108, 'daniel craig', '123456', '2/17/2013', 'United Kingdom', '2/2/2010', 'male');
INSERT INTO `apply` VALUES (130, 109, 'Phuong Nguyen', '222', '12/19/2029', 'United States', '2/1/1993', 'male');
INSERT INTO `apply` VALUES (131, 110, 'daniel craig', '123456', '2/15/2013', 'United States', '1/1/2006', 'male');
INSERT INTO `apply` VALUES (132, 110, 'megan fox', '13457', '2/8/2013', 'United States', '1/15/2010', 'female');
INSERT INTO `apply` VALUES (133, 110, 'briney spears', '342545', '2/3/2013', 'United States', '2/3/2010', 'female');
INSERT INTO `apply` VALUES (134, 110, 'jason staham', '23456', '11/18/2015', 'United States', '2/19/1993', 'male');
INSERT INTO `apply` VALUES (135, 110, 'crazy fog', '2312312', '2/19/2014', 'United States', '3/4/2009', 'male');
INSERT INTO `apply` VALUES (136, 110, 'linkin park', '22332', '2/17/2013', 'United States', '1/19/2011', 'male');
INSERT INTO `apply` VALUES (137, 110, 'critiano ronaldo', '32dfadf3', '4/18/2015', 'Afghanistan', '3/2/2009', 'male');
INSERT INTO `apply` VALUES (138, 110, 'thio waltcot', '3rfae343', '9/10/2013', 'United States', '12/17/2006', 'male');
INSERT INTO `apply` VALUES (139, 110, 'camaron diaz', '23e3233', '3/18/2013', 'United States', '2/3/2009', 'female');
INSERT INTO `apply` VALUES (140, 110, 'enrique iglesias', '32rf23', '3/3/2016', 'Spain', '3/4/2007', 'male');
INSERT INTO `apply` VALUES (141, 111, 'daniel craig', '123456', '2/17/2013', 'United States', '2/2/2009', 'male');
INSERT INTO `apply` VALUES (142, 112, 'daniel craig', '123456', '2/19/2029', 'United Kingdom', '3/2/2009', 'male');
INSERT INTO `apply` VALUES (143, 113, 'Phuong Nguyen', 'id8785093290', '1/19/2029', 'United Kingdom', '2/3/1976', 'male');
INSERT INTO `apply` VALUES (144, 114, 'open case', '122121212', '2/1/2016', 'United Kingdom', '2/2/2002', 'female');
INSERT INTO `apply` VALUES (145, 115, 'Tien Chinh', '22222222222222', '1/5/2029', 'United Kingdom', '2/2/2009', 'female');
INSERT INTO `apply` VALUES (146, 116, 'incredible tran', '123456', '2/17/2013', 'United States', '4/3/1993', 'male');
INSERT INTO `apply` VALUES (147, 117, 'ha tran', '123456', '2/17/2013', 'United Kingdom', '2/2/2010', 'male');
INSERT INTO `apply` VALUES (148, 118, 'hatran', '123456', '2/5/2013', 'United States', '3/19/1988', 'male');
INSERT INTO `apply` VALUES (149, 119, 'Daniel Terence Clifton', 'M3219517', '9/15/2015', 'Australia', '8/30/1982', 'male');
INSERT INTO `apply` VALUES (150, 119, 'Jessica Maree Whitehead', 'M3018196', '8/26/2015', 'Australia', '2/21/1986', 'male');
INSERT INTO `apply` VALUES (151, 119, 'John Matthew Whitehead', 'M2103657', '4/15/2014', 'Australia', '10/21/1982', 'male');
INSERT INTO `apply` VALUES (152, 120, 'Laura Gandy', 'M8580924', '4/8/2015', 'Australia', '10/10/1980', 'female');
INSERT INTO `apply` VALUES (153, 121, 'Laura Gandy', 'M8580924', '4/8/2015', 'Australia', '10/10/1980', 'female');
INSERT INTO `apply` VALUES (154, 122, 'Donald Ray Hill', '452034635', '3/7/2020', 'United States', '9/5/1949', 'male');
INSERT INTO `apply` VALUES (155, 123, 'Leon Dan Ainslie', '473397488', '11/8/2020', 'United States', '6/25/1940', 'male');
INSERT INTO `apply` VALUES (156, 123, 'Deonna Ainslie', '476373764', '11/8/2020', 'United States', '7/25/1942', 'female');
INSERT INTO `apply` VALUES (157, 124, '', '', '//', '', '//', 'male');
INSERT INTO `apply` VALUES (158, 125, '', '', '//', '', '//', 'male');
INSERT INTO `apply` VALUES (159, 126, 'ADESOKAN OLAWALE HAHABBEB', 'A03591242', '4/6/2017', 'Nigeria', '5/15/1988', 'male');
INSERT INTO `apply` VALUES (160, 127, '', '', '//', '', '//', 'male');
INSERT INTO `apply` VALUES (161, 128, 'Tony tran', '123456', '2/6/2013', 'United States', '3/4/1996', 'male');
INSERT INTO `apply` VALUES (162, 129, 'tien chinh', '2222222222222', '2/3/2014', 'United Kingdom', '2/1/2009', 'female');
INSERT INTO `apply` VALUES (163, 130, 'Tien Chinh', '22', '2/18/2029', 'United Kingdom', '1/1/2011', 'female');
INSERT INTO `apply` VALUES (164, 131, 'Tien Chinh', '222222222', '2/3/2015', 'United Kingdom', '2/2/2010', 'female');
INSERT INTO `apply` VALUES (165, 132, 'daniel craig', '123456', '5/18/2014', 'United States', '2/4/1994', 'female');
INSERT INTO `apply` VALUES (166, 133, 'daniel craig', '123456', '10/28/2030', 'United States', '10/28/1988', 'male');
INSERT INTO `apply` VALUES (167, 134, 'Robert Charles Gandy', 'N5923873', '7/21/2021', 'Australia', '7/26/1979', 'male');
INSERT INTO `apply` VALUES (168, 135, 'Tien Chinh', '222222222222', '3/18/2014', 'United Kingdom', '2/4/2010', 'female');
INSERT INTO `apply` VALUES (169, 136, 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', '7/4/2015', 'Albania', '05/10/2012', 'female');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `id` int(5) NOT NULL auto_increment,
  `parent_id` int(5) NOT NULL,
  `name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(150) collate utf8_unicode_ci NOT NULL,
  `url` varchar(200) collate utf8_unicode_ci NOT NULL,
  `status` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'yes',
  `order` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=147 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` VALUES (146, 145, 'asdfadfadfaf', 'asdfadfadfaf', 'category/asdfadfadfaf', 'yes', 21);
INSERT INTO `category` VALUES (145, 144, 'asdfdasfa', 'asdfdasfa', 'category/asdfdasfa', 'yes', 24);
INSERT INTO `category` VALUES (138, 0, 'Goodbye2', 'goodbye2', 'category/goodbye2', 'yes', 14);
INSERT INTO `category` VALUES (139, 0, 'Goodbye3', 'goodbye3', 'category/goodbye3', 'yes', 12);
INSERT INTO `category` VALUES (140, 0, 'Goodbye4', 'goodbye4', 'category/goodbye4', 'yes', 16);
INSERT INTO `category` VALUES (142, 0, 'Goodbyefasdf', 'goodbyefasdf', 'category/goodbyefasdf', 'yes', 20);
INSERT INTO `category` VALUES (143, 0, 'asdfasdfasd', 'asdfasdfasd', 'category/asdfasdfasd', 'yes', 23);
INSERT INTO `category` VALUES (144, 138, 'adfadfad', 'adfadfad', 'category/adfadfad', 'yes', 2);
INSERT INTO `category` VALUES (135, 0, 'My love333', 'my-love333', 'category/my-love333', 'yes', 10);
INSERT INTO `category` VALUES (136, 0, 'Goodbye', 'goodbye', 'category/goodbye', 'yes', 29);
INSERT INTO `category` VALUES (137, 0, 'Goodbye1', 'goodbye1', 'category/goodbye1', 'yes', 27);

-- --------------------------------------------------------

-- 
-- Table structure for table `country`
-- 

CREATE TABLE `country` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(150) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(150) character set utf8 collate utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') character set utf8 collate utf8_unicode_ci NOT NULL default 'yes',
  `show_off` enum('yes','no') character set utf8 collate utf8_unicode_ci default 'yes',
  `flag_icon` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
  `required` enum('yes','no') default 'yes',
  `continent` enum('Asia','Europe','Africa','America','Oceania') NOT NULL,
  `potential` enum('yes','no') NOT NULL default 'no',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

-- 
-- Dumping data for table `country`
-- 

INSERT INTO `country` VALUES (1, 'United Kingdom', 'united-kingdom', 'yes', 'yes', 'uploads/flag/gb.png', 'yes', 'Europe', 'yes');
INSERT INTO `country` VALUES (2, 'United States', 'united-states', 'yes', 'yes', 'uploads/flag/us.png', 'yes', 'America', 'yes');
INSERT INTO `country` VALUES (3, 'Afghanistan', '', 'no', 'no', 'af.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (4, 'Albania', '', 'yes', 'no', 'al.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (5, 'Algeria', 'algeria', 'no', 'yes', 'algeria.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (6, 'American Samoa', '', 'yes', 'no', 'as.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (7, 'Argentina', 'argentina', 'yes', 'yes', 'ar.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (8, 'Austria', 'austria', 'yes', 'no', 'at.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (9, 'Australia', 'australia', 'yes', 'yes', 'au.png', 'yes', 'Oceania', 'yes');
INSERT INTO `country` VALUES (10, 'Azerbaijan', '', 'yes', 'no', 'az.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (11, 'Barbados', '', 'yes', 'no', 'bb.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (12, 'Belarus', '', 'yes', 'yes', 'by.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (13, 'Belgium', '', 'yes', 'yes', 'be.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (14, 'Belize', '', 'yes', 'no', 'bz.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (15, 'Benin', '', 'no', 'no', 'bj.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (16, 'Bermuda', '', 'yes', 'no', 'bm.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (17, 'Bhutan', '', 'no', 'no', 'bt.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (18, 'Bolivia', '', 'yes', 'no', 'bo.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (19, 'Botswana', 'botswana', 'no', 'no', 'bw.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (20, 'Bouvet', 'bouvet', 'yes', 'no', 'bv.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (21, 'Brazil', 'brazil', 'yes', 'yes', 'uploads/flag/br.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (22, 'Brunei Darussalam', 'brunei-darussalam', 'yes', 'yes', 'bn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (23, 'Bulgaria', 'bulgaria', 'yes', 'yes', 'bg.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (24, 'Burkina Faso', '', 'no', 'no', 'bf.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (25, 'Burundi', '', 'no', 'no', 'bi.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (26, 'Byelorussian SSR', '', 'no', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (27, 'Cambodia', 'cambodia', 'yes', 'yes', 'uploads/flag/cambodia.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (28, 'Cameroon', 'cameroon', 'no', 'no', 'cm.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (29, 'Canada', 'canada', 'yes', 'yes', 'uploads/flag/ca.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (30, 'Cape Verde', '', 'yes', 'no', 'cv.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (31, 'Cayman Islands', '', 'yes', 'no', 'cayman_islands.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (32, 'Central African', 'central-african', 'no', 'no', 'cf.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (33, 'Chad', '', 'no', 'no', 'chad.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (34, 'Chile', 'chile', 'yes', 'yes', 'cl.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (35, 'China', 'china', 'no', 'yes', 'uploads/flag/cn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (36, 'Colombia', 'colombia', 'yes', 'no', 'co.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (37, 'Comoros', '', 'yes', 'no', 'comoros.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (38, 'Congo', 'congo', 'no', 'no', 'cd.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (39, 'Cook Islands', '', 'yes', 'no', 'ck.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (40, 'Costa Rica', 'costa-rica', 'yes', 'no', 'cr.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (41, 'Coted Ivoire', '', 'no', 'no', 'ci.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (42, 'Croatia', 'croatia', 'yes', 'no', 'hr.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (43, 'Cuba', 'cuba', 'yes', 'yes', 'cu.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (44, 'Cyprus', '', 'yes', 'no', 'cy.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (45, 'Czech Republic', 'czech-republic', 'yes', 'yes', 'cz.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (47, 'Denmark', 'denmark', 'yes', 'yes', 'dk.png', 'no', 'Europe', 'no');
INSERT INTO `country` VALUES (48, 'Djibouti', '', 'yes', 'no', 'dj.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (49, 'Dominica', 'dominica', 'yes', 'no', 'dm.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (51, 'East Timor', '', 'no', 'no', 'tl.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (52, 'Ecuador', 'ecuador', 'yes', 'no', 'ec.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (53, 'Egypt', 'egypt', 'yes', 'yes', 'eg.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (54, 'El Salvador', 'el-salvador', 'yes', 'no', 'el_salvador.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (55, 'England', 'england', 'yes', 'yes', 'england.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (56, 'Equatorial Guinea', '', 'yes', 'no', 'equatorial_guinea.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (57, 'Eritrea', '', 'no', 'no', 'er.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (58, 'Estonia', '', 'yes', 'no', 'ee.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (59, 'Ethiopia', '', 'no', 'no', 'et.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (60, 'Falkland', '', 'yes', 'no', 'fk.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (61, 'Faroe', '', 'yes', 'no', 'fo.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (62, 'Fiji', '', 'no', 'no', 'fj.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (63, 'Finland', 'finland', 'yes', 'yes', 'fi.png', 'no', 'Europe', 'no');
INSERT INTO `country` VALUES (64, 'France', 'france', 'yes', 'yes', 'fr.png', 'yes', 'Europe', 'yes');
INSERT INTO `country` VALUES (65, 'Gabon', 'gabon', 'no', 'no', 'ga.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (66, 'Gambia', '', 'yes', 'no', 'gambia.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (67, 'Georgia', 'georgia', 'yes', 'no', 'ge.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (68, 'Germany', 'germany', 'yes', 'yes', 'de.png', 'yes', 'Europe', 'yes');
INSERT INTO `country` VALUES (69, 'Ghana', 'ghana', 'no', 'no', 'gh.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (70, 'Gibraltar', '', 'yes', 'no', 'gi.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (71, 'Great Britain', 'great-britain', 'yes', 'no', 'gb.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (72, 'Greece', 'greece', 'yes', 'no', 'gr.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (73, 'Greenland', '', 'yes', 'no', 'gl.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (74, 'Grenada', '', 'yes', 'no', 'gd.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (75, 'Guadeloupe', '', 'yes', 'no', 'guadeloupe.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (76, 'Guam', '', 'yes', 'no', 'gu.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (77, 'Guatemela', 'guatemela', 'yes', 'no', 'gt.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (78, 'Guernsey', '', 'yes', 'no', 'gg.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (79, 'Guiana', '', 'yes', 'no', 'guiana.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (80, 'Guinea', '', 'no', 'no', 'gn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (82, 'Guyana', '', 'yes', 'no', 'gy.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (83, 'Haiti', 'haiti', 'no', 'no', 'ht.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (84, 'Heard', '', 'yes', 'no', 'hm.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (85, 'Honduras', '', 'yes', 'no', 'hn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (86, 'Hong Kong', '', 'yes', 'yes', 'hk.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (87, 'Hungary', 'hungary', 'yes', 'yes', 'hu.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (88, 'Iceland', 'iceland', 'yes', 'no', 'is.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (89, 'India', '', 'yes', 'yes', 'in.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (90, 'Indonesia', '', 'yes', 'yes', 'id.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (93, 'Ireland', 'ireland', 'yes', 'no', 'ie.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (94, 'Isle Of Man', '', 'yes', 'no', 'im.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (95, 'Israel', '', 'yes', 'no', 'il.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (96, 'Italy', 'italy', 'yes', 'yes', 'it.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (97, 'Jamaica', 'jamaica', 'yes', 'no', 'jm.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (98, 'Japan', 'japan', 'yes', 'yes', 'uploads/flag/jp.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (99, 'Jersey', '', 'yes', 'no', 'je.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (101, 'Kazakhstan', '', 'yes', 'no', 'kz.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (102, 'Kenya', 'kenya', 'no', 'no', 'ke.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (103, 'Kiribati', '', 'no', 'no', 'ki.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (104, 'South Korea', 'south-korea', 'no', 'yes', 'uploads/flag/kr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (105, 'North Korea', 'north-korea', 'yes', 'yes', 'uploads/flag/kp.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (106, 'Kuwait', '', 'no', 'yes', 'kw.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (107, 'Kyrgyzstan', '', 'yes', 'no', 'kg.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (108, 'Laos', 'laos', 'yes', 'yes', 'uploads/flag/la.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (109, 'Latvia', '', 'yes', 'no', 'lv.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (111, 'Lesotho', '', 'no', 'no', 'ls.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (112, 'Liberia', '', 'no', 'no', 'lr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (113, 'Libya', 'libya', 'no', 'yes', 'ly.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (114, 'Liechtenstein', '', 'yes', 'no', 'li.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (115, 'Lithuania', '', 'yes', 'no', 'lt.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (116, 'Luxembourg', 'luxembourg', 'yes', 'no', 'lu.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (117, 'Macau', '', 'yes', 'no', 'mo.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (118, 'Macedonia', '', 'yes', 'no', 'mk.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (119, 'Madagascar', 'madagascar', 'yes', 'no', 'mg.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (121, 'Malaysia', 'malaysia', 'yes', 'yes', 'uploads/flag/my.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (122, 'Maldives', '', 'yes', 'no', 'mv.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (123, 'Mali', '', 'yes', 'no', 'ml.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (124, 'Malta', '', 'yes', 'no', 'mt.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (125, 'Mariana', '', 'yes', 'no', 'mariana.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (126, 'Marshall', '', 'yes', 'no', 'mh.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (127, 'Martinique', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (128, 'Mauritania', '', 'no', 'no', 'mr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (129, 'Mauritius', '', 'yes', 'no', 'mu.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (130, 'Mayotte', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (131, 'Mexico', 'mexico', 'yes', 'yes', 'mx.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (132, 'Micronesia', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (133, 'Moldova', '', 'yes', 'no', 'md.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (134, 'Monaco', 'monaco', 'yes', 'no', 'mc.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (135, 'Mongolia', '', 'yes', 'yes', 'mn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (136, 'Montserrat', '', 'yes', 'no', 'ms.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (137, 'Morocco', '', 'no', 'no', 'ma.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (138, 'Mozambique', 'mozambique', 'yes', 'no', 'mz.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (139, 'Myanmar', 'myanmar', 'yes', 'yes', 'myanmar.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (140, 'Namibia', '', 'no', 'no', 'na.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (141, 'Nauru', '', 'yes', 'no', 'nr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (142, 'Nepal', 'nepal', 'no', 'no', 'nepal.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (143, 'Netherlands', 'netherlands', 'yes', 'yes', 'nl.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (144, 'Neutral Zone', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (145, 'New Caledonia', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (146, 'New Zealand', 'new-zealand', 'yes', 'yes', 'nz.png', 'yes', 'Oceania', 'no');
INSERT INTO `country` VALUES (147, 'Nicaragua', 'nicaragua', 'yes', 'no', 'ni.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (148, 'Nigeria', 'nigeria', 'no', 'no', 'ng.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (150, 'Niue', '', 'yes', 'no', 'nu.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (151, 'Norfolk Island', '', 'no', 'no', 'nf.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (152, 'Northern Ireland', 'northern-ireland', 'yes', 'no', 'north_ireland.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (153, 'Norway', 'norway', 'yes', 'no', 'no.png', 'no', 'Europe', 'no');
INSERT INTO `country` VALUES (154, 'Oman', '', 'no', 'no', 'om.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (156, 'Palau', '', 'yes', 'no', 'pw.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (157, 'Panama', 'panama', 'yes', 'yes', 'pan.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (158, 'Papua New Guinea', 'papua-new-guinea', 'no', 'no', 'pg.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (159, 'Paraguay', 'paraguay', 'yes', 'no', 'py.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (160, 'Peru', 'peru', 'yes', 'no', 'pe.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (161, 'Philippines', '', 'yes', 'yes', 'ph.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (162, 'Pitcairn', '', 'yes', 'no', 'pn.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (163, 'Poland', 'poland', 'yes', 'yes', 'pl.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (164, 'Polynesia', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (165, 'Portugal', 'portugal', 'yes', 'no', 'pt.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (166, 'Puerto Rico', '', 'yes', 'no', 'pr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (167, 'Qatar', '', 'no', 'no', 'qa.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (168, 'Reunion', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (169, 'Romania', 'romania', 'yes', 'yes', 'ro.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (170, 'Russian', 'russian', 'yes', 'yes', 'ru.png', 'no', 'Europe', 'no');
INSERT INTO `country` VALUES (171, 'Rwanda', '', 'no', 'no', 'rw.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (172, 'Saint Helena', '', 'yes', 'no', 'sh.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (173, 'Saint Kitts', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (174, 'Saint Lucia', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (175, 'Saint Pierre', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (176, 'Saint Vincent', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (177, 'Samoa', 'samoa', 'no', 'no', 'noflag.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (178, 'San Marino', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (180, 'Scotland', 'scotland', 'yes', 'no', 'uploads/flag/scotland.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (181, 'Senegal', 'senegal', 'no', 'no', 'sn.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (182, 'Seychelles', '', 'no', 'no', 'sc.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (183, 'Sierra Leone', '', 'no', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (184, 'Singapore', '', 'yes', 'yes', 'sg.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (185, 'Slovakia', '', 'yes', 'no', 'sk.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (186, 'Slovenia', '', 'yes', 'no', 'si.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (187, 'Solomon', '', 'yes', 'no', 'sb.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (188, 'Somalia', 'somalia', 'no', 'no', 'so.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (189, 'South Africa', 'south-africa', 'yes', 'yes', 'uploads/flag/south-africa.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (190, 'South Georgia', '', 'yes', 'no', 'south-georgia.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (191, 'Spain', 'spain', 'yes', 'yes', 'uploads/flag/spain.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (193, 'Sudan', 'sudan', 'no', 'no', 'sd.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (194, 'Suriname', '', 'yes', 'no', 'sr.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (195, 'Svalbard', '', 'yes', 'no', 'sj.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (196, 'Swaziland', '', 'yes', 'no', 'sz.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (197, 'Sweden', 'sweden', 'yes', 'yes', 'se.png', 'no', 'Europe', 'no');
INSERT INTO `country` VALUES (198, 'Switzerland', 'switzerland', 'yes', 'yes', 'uploads/flag/switzerland.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (199, 'Syrian Arab', '', 'no', 'no', 'syrian-arab.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (200, 'Taiwan', '', 'yes', 'yes', 'tw.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (201, 'Tajikista', '', 'no', 'no', 'tj.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (202, 'Tanzania', '', 'yes', 'yes', 'tz.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (203, 'Thailand', '', 'yes', 'yes', 'th.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (204, 'Togo', 'togo', 'no', 'no', 'tg.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (205, 'Tokelau', '', 'yes', 'no', 'tk.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (206, 'Tonga', 'tonga', 'no', 'no', 'to.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (207, 'Trinidad and Tobago', 'trinidad-and-tobago', 'no', 'no', 'tt.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (209, 'Turkey', 'turkey', 'no', 'yes', 'uploads/flag/tr.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (210, 'Turkmenistan', '', 'yes', 'no', 'tm.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (211, 'Turksand Caicos', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (212, 'Tuvalu', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (213, 'Uganda', 'uganda', 'no', 'no', 'ug.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (214, 'Ukraine', 'ukraine', 'yes', 'yes', 'ua.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (215, 'UAE', '', 'no', 'yes', 'uae.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (216, 'Uruguay', 'uruguay', 'yes', 'no', 'uy.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (217, 'Uzbekistan', '', 'yes', 'yes', 'uz.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (218, 'Vanuatu', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (219, 'Vatican', 'vatican', 'yes', 'no', 'va.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (220, 'Venezuela', 'venezuela', 'yes', 'yes', 've.png', 'yes', 'America', 'no');
INSERT INTO `country` VALUES (221, 'Vietnam', 'vietnam', 'no', 'no', 'uploads/flag/vn.png', 'no', 'Asia', 'no');
INSERT INTO `country` VALUES (222, 'Virgin', '', 'yes', 'no', 'vi.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (223, 'Wales', 'wales', 'yes', 'no', 'uploads/flag/wales.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (224, 'Western Sahara', 'western-sahara', 'no', 'no', 'western-sahara.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (225, 'Yemen', 'yemen', 'no', 'no', 'ye.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (226, 'Yugoslavia', '', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (227, 'Zaire', '', 'no', 'no', 'noflag.png', 'yes', 'Asia', 'no');
INSERT INTO `country` VALUES (228, 'Zambia', 'zambia', 'no', 'no', 'zm.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (229, 'Zimbabwe', 'zimbabwe', 'no', 'no', 'zw.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (230, 'Montenegro', 'montenegro', 'yes', 'no', 'montenegro.png', 'yes', 'Africa', 'no');
INSERT INTO `country` VALUES (231, 'Serbia', 'serbia', 'yes', 'no', 'serbia.png', 'yes', 'Europe', 'no');
INSERT INTO `country` VALUES (232, 'Bosnia and Herzegonia', 'bosnia-and-herzegonia', 'yes', 'no', 'noflag.png', 'yes', 'Asia', 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `customers`
-- 

CREATE TABLE `customers` (
  `id` int(15) NOT NULL auto_increment,
  `name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `cat` enum('GVSC','GVC','GVS','GV') collate utf8_unicode_ci NOT NULL default 'GV',
  `email` varchar(150) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(100) collate utf8_unicode_ci NOT NULL,
  `purpose` varchar(100) collate utf8_unicode_ci NOT NULL,
  `message` varchar(250) collate utf8_unicode_ci NOT NULL,
  `amount_visa` int(4) NOT NULL,
  `type_visa` varchar(50) collate utf8_unicode_ci NOT NULL,
  `services` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_arrival` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_exit` varchar(50) collate utf8_unicode_ci NOT NULL,
  `arrival_port` varchar(50) collate utf8_unicode_ci NOT NULL,
  `nationality` varchar(100) collate utf8_unicode_ci NOT NULL,
  `flight_number` varchar(15) collate utf8_unicode_ci NOT NULL,
  `airfast_track` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `carpick_up` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `tour_booking` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `hotel_booking` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `refund_amount` float NOT NULL default '0',
  `total_prices` float NOT NULL,
  `pay_method` enum('paypal','onepay','western','bankaccount') collate utf8_unicode_ci NOT NULL default 'paypal',
  `status` enum('paid','pending','new','processing','finish','paid_confirm','refund','delete') collate utf8_unicode_ci NOT NULL default 'new',
  `time` datetime NOT NULL,
  `confirm` enum('false','paid','pending') collate utf8_unicode_ci default 'false',
  `active` enum('No','Yes') collate utf8_unicode_ci default 'Yes',
  `partner_id` int(11) default NULL,
  `step` int(1) default NULL,
  `ip` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=137 ;

-- 
-- Dumping data for table `customers`
-- 

INSERT INTO `customers` VALUES (77, 'Tien Chinh', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'nhanh nhe', 1, '1 month single', 'normal', '04/21/2012', '04/28/2012', 'Hochiminh-Saigon', 'United Kingdom', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'onepay', 'delete', '2012-04-09 12:23:35', 'false', 'Yes', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (78, 'tonytran', 'GV', 'incredible@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'normal', '04/11/2012', '04/21/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'processing', '2012-04-09 22:56:34', 'false', 'Yes', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (79, 'tonytran', 'GV', 'incredible@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'normal', '04/11/2012', '04/27/2012', 'Hanoi', 'Bhutan', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'processing', '2012-04-09 22:59:51', 'false', 'Yes', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (80, 'chinhnnntn', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'aa', 1, '1 month single', 'normal', '04/14/2012', '04/26/2012', 'Hochiminh-Saigon', 'Bhutan', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'processing', '2012-04-10 00:03:55', 'false', 'Yes', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (81, 'TEST', 'GV', 'noi_nhieu_hon_yeu@yahoo.com', '084 9762585', '', 'test onepay', 1, '1 month single', 'normal', '05/14/2012', '05/19/2012', 'Hanoi', 'United States', '1211', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-10 11:20:07', 'false', 'Yes', NULL, NULL, NULL);
INSERT INTO `customers` VALUES (82, 'aaaaa', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'aaaaaaaaaaaaaa', 2, '1 month single', 'urgent', '04/14/2012', '04/21/2012', 'Hanoi', 'United Kingdom', '', 'yes', 'yes', 'yes', 'yes', 0, 132, 'onepay', '', '2012-04-10 11:47:56', 'false', 'Yes', NULL, 3, NULL);
INSERT INTO `customers` VALUES (83, 'chinhnnntn', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'hay day', 1, '1 month single', 'urgent', '04/14/2012', '04/26/2012', 'Hanoi', 'Bolivia', '', 'yes', 'no', 'no', 'no', 0, 54.5, 'paypal', 'processing', '2012-04-10 12:27:41', 'false', 'Yes', NULL, 3, '113.22.101.11');
INSERT INTO `customers` VALUES (84, 'Tien chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'aaaaaaa', 1, '1 month single', 'normal', '04/14/2012', '04/28/2012', 'Hanoi', 'Bermuda', '', 'yes', 'yes', 'yes', 'yes', 0, 67.5, 'onepay', 'processing', '2012-04-10 22:02:14', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (85, 'chinhnnntn', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'aaaaaaa', 1, '1 month single', 'normal', '04/21/2012', '04/27/2012', 'Hanoi', 'Belarus', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-10 22:38:20', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (86, 'Tien Chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'aa', 1, '1 month single', 'urgent', '04/28/2012', '04/28/2012', 'Hochiminh-Saigon', 'Bolivia', '', 'no', 'no', 'no', 'no', 0, 29.5, 'onepay', 'delete', '2012-04-10 23:08:19', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (87, 'Phuongna', 'GV', 'phuongna@vietnamdeltatour.com', '344333333', '', 'KIIII', 1, '1 month single', 'normal', '04/14/2012', '04/21/2012', 'Hanoi', 'United Kingdom', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'onepay', 'delete', '2012-04-11 03:23:29', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (88, 'test', '', 'nhunglt@vietnamdeltatour.com', '45634554', 'business', 'hehe', 1, '3 months single', 'urgent', '04/19/2012', '04/27/2012', 'Hanoi', 'United States', '76467465', 'yes', 'no', 'no', 'no', 0, 64, 'onepay', 'delete', '2012-04-11 03:37:55', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (89, 'eeeee', 'GV', '33@gmail.com', '3333', 'vacation', 'eeeee', 1, '1 month single', 'normal', '04/19/2012', '04/28/2012', 'Hanoi', 'United Kingdom', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'delete', '2012-04-11 04:15:26', 'false', 'Yes', NULL, NULL, '113.190.171.136');
INSERT INTO `customers` VALUES (90, 'tony', '', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/12/2012', '05/01/2012', 'Hanoi', 'United States', '', 'yes', 'yes', 'no', 'no', 0, 42.5, 'onepay', 'delete', '2012-04-12 21:56:50', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (91, 'tony', '', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/19/2012', '05/13/2012', '', 'United States', '', 'yes', 'yes', 'no', 'no', 0, 42.5, 'onepay', 'delete', '2012-04-12 22:19:48', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (92, 'tony', 'GVC', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/14/2012', '04/28/2012', '', 'United States', '', 'no', 'yes', 'no', 'no', 0, 42.5, 'paypal', 'delete', '2012-04-13 04:31:15', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (93, 'tony', 'GVC', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'urgent', '04/14/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'yes', 'no', 'no', 0, 52.5, 'onepay', 'delete', '2012-04-13 04:40:26', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (94, 'eêee', '', 'phuongna@vietnamdeltatour.com', '43355666', 'vacation', 'eee', 1, '1 month single', 'normal', '04/19/2012', '04/26/2012', 'Hanoi', 'United Kingdom', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'paypal', 'delete', '2012-04-15 22:52:09', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (95, 'tony', 'GVC', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'urgent', '04/17/2012', '05/13/2012', 'Hanoi', 'United States', '', 'no', 'yes', 'yes', 'yes', 0, 52.5, 'onepay', 'delete', '2012-04-16 02:18:56', 'false', 'Yes', NULL, 3, '113.190.171.136');
INSERT INTO `customers` VALUES (96, 'Tien Chinh', '', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'toot nhe', 2, '1 month single', 'urgent', '04/20/2012', '04/25/2012', 'Hanoi', 'Argentina', '', 'yes', 'yes', 'yes', 'yes', 0, 132, 'onepay', 'delete', '2012-04-16 21:51:47', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (97, 'tony', 'GVC', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/18/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'yes', 'no', 'no', 0, 42.5, 'paypal', 'delete', '2012-04-16 22:35:16', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (98, 'Tien Chinh', '', 'chinnhnt@gmail.com', '+084 168 671 4663', '', 'aaa', 1, '1 month single', 'urgent', '04/26/2012', '04/27/2012', 'Hanoi', 'Bermuda', '', 'yes', 'no', 'no', 'no', 0, 54.5, 'paypal', 'delete', '2012-04-16 22:43:21', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (99, 'tony', 'GV', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/18/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-16 23:50:00', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (100, 'tony', 'GV', 'tony@yahoo.com', '0168 67 14 663', '', '', 1, '1 month single', 'normal', '04/19/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 1, 'onepay', 'processing', '2012-04-17 04:09:45', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (101, 'Phuongna', 'GV', 'phuongna@vietnamdeltatour.com', '3333', 'vacation', 'Testtttttttt', 1, '1 month single', 'normal', '04/24/2012', '04/28/2012', 'Hanoi', 'United Kingdom', '', 'no', 'no', 'no', 'no', 0, 1, 'onepay', 'processing', '2012-04-17 04:12:23', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (102, 'Tien Chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'aa', 2, '1 month single', 'normal', '05/16/2012', '05/25/2012', '', 'United States', '', 'no', 'no', 'no', 'no', 0, 2, 'onepay', 'finish', '2012-04-17 04:20:48', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (103, 'Tien Chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'aaaaaaaaaaa', 1, '1 month single', 'normal', '05/16/2012', '05/31/2012', 'Hochiminh-Saigon', 'Belize', '', 'no', 'no', 'no', 'no', 0, 1, 'onepay', 'finish', '2012-04-17 05:00:41', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (104, 'test', 'GV', 'nhunglt@vietnamdeltatour.com', '4563567', 'vacation', 'fsdsf', 1, '3 months single', 'normal', '04/19/2012', '04/21/2012', 'Hanoi', 'Argentina', '', 'no', 'no', 'yes', 'yes', 0, 1, 'onepay', 'delete', '2012-04-17 05:22:28', 'false', 'Yes', NULL, 3, '27.69.136.93');
INSERT INTO `customers` VALUES (105, 'tonytran', 'GV', 'incredible@gmail.com', '+100-250-520', '', 'a', 1, '1 month single', 'normal', '04/19/2012', '05/03/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 1, 'onepay', 'delete', '2012-04-17 08:43:24', 'false', 'Yes', NULL, 3, '113.22.101.11');
INSERT INTO `customers` VALUES (106, 'tonytran', 'GV', 'incredibletran@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'normal', '04/20/2012', '05/13/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 1, 'onepay', 'finish', '2012-04-17 08:53:54', 'false', 'Yes', NULL, 3, '113.22.101.11');
INSERT INTO `customers` VALUES (107, 'tonytran', '', 'incredible@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'urgent', '04/20/2012', '05/20/2012', 'Hanoi', 'United States', '', 'yes', 'yes', 'no', 'no', 0, 77.5, 'paypal', 'delete', '2012-04-17 21:40:37', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (108, 'tonytran', 'GV', 'incredible@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'normal', '04/20/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'paypal', 'delete', '2012-04-17 22:07:00', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (109, 'eeeee', '', 'phuongna@vietnamdeltatour.com', '43355666', 'business', 'test', 1, '1 month single', 'normal', '04/28/2012', '05/02/2012', 'Hanoi', 'United States', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'onepay', 'delete', '2012-04-17 22:11:21', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (110, 'anthony tran', '', 'incredible@gmail.com', '100 250 425 142', 'vacation', '', 10, '3 months multiple', 'urgent', '04/21/2012', '05/13/2012', 'Hochiminh-Saigon', 'United States', 'BA122', 'yes', 'yes', 'no', 'no', 0, 618, 'onepay', 'delete', '2012-04-18 03:22:19', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (111, 'tonytran', 'GV', 'incredible@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'normal', '04/26/2012', '05/22/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-18 04:43:32', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (112, 'tonytran', 'GV', 'incredibletran@gmail.com', '100 250 425 142', '', '', 1, '1 month single', 'normal', '04/25/2012', '04/28/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-18 04:44:29', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (113, 'Phuongna', 'GV', 'phuongna@vietnamdeltatour.com', '3333', '', '5555', 1, '3 months single', 'normal', '04/28/2012', '05/16/2012', 'Hanoi', 'United Kingdom', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'delete', '2012-04-18 04:55:01', 'false', 'Yes', NULL, NULL, '113.190.239.194');
INSERT INTO `customers` VALUES (114, 'open case', 'GV', 'phanvuanhquoc@gmail.com', '0903752521', 'business', '', 1, '1 month single', 'normal', '04/28/2012', '04/30/2012', 'Hanoi', 'United Kingdom', 'kj212', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-04-18 12:03:07', 'false', 'Yes', NULL, 3, '58.186.89.145');
INSERT INTO `customers` VALUES (115, 'Tien Chinh', '', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'Chinhnt', 1, '1 month single', 'urgent', '04/26/2012', '04/30/2012', 'Hanoi', 'United Kingdom', '', 'yes', 'yes', 'no', 'no', 0, 77.5, 'onepay', 'delete', '2012-04-19 21:54:18', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (116, 'tonytran', 'GV', 'incredible@gmail.com', '100 250 425 142', '', '', 1, '1 month single', 'normal', '04/21/2012', '04/26/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'western', 'delete', '2012-04-19 22:51:30', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (117, 'tonytran', 'GV', 'incredibletran@gmail.com', '100 250 425 142', '', '', 1, '1 month single', 'normal', '04/21/2012', '05/13/2012', 'Hanoi', 'United States', '', 'no', 'no', 'no', 'no', 0, 19.5, 'western', 'delete', '2012-04-19 23:15:17', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (118, 'tony tran', '', 'incredibletran@gmail.com', '+084 466 807 638', 'business', '', 1, '3 months multiple', 'normal', '04/21/2012', '05/08/2012', 'Hanoi', 'United States', '', 'yes', 'yes', 'no', 'no', 0, 85, 'western', 'delete', '2012-04-19 23:46:31', 'false', 'Yes', NULL, 3, '113.190.239.194');
INSERT INTO `customers` VALUES (119, 'Daniel Terence Clifton', 'GV', 'daniel.clifton@live.com', '+084 425 902 323', 'family_visit', '', 3, '1 month single', 'urgent', '04/25/2012', '05/04/2012', 'Hanoi', 'Austria', '780', 'no', 'no', 'no', 'no', 0, 84, 'onepay', 'finish', '2012-04-23 07:43:45', 'false', 'Yes', NULL, 3, '202.167.227.34');
INSERT INTO `customers` VALUES (120, 'Laura Gandy', 'GVS', 'gandylaura@gmail.com', '+612 937 44313', 'vacation', '', 1, '1 month single', 'normal', '06/06/2012', '06/22/2012', 'Hochiminh-Saigon', 'Austria', 'MH 750', 'yes', 'no', 'no', 'no', 0, 44.5, 'onepay', 'finish', '2012-05-01 04:53:08', 'false', 'Yes', NULL, 3, '124.171.26.112');
INSERT INTO `customers` VALUES (121, 'Laura Gandy', 'GVS', 'gandylaura@gmail.com', '+612 937 44313', 'vacation', '', 1, '1 month single', 'normal', '06/06/2012', '06/22/2012', 'Hochiminh-Saigon', 'Australia', 'Mh 750', 'yes', 'no', 'no', 'no', 0, 44.5, 'onepay', 'refund', '2012-05-01 05:00:01', 'false', 'Yes', NULL, 3, '124.171.26.112');
INSERT INTO `customers` VALUES (122, 'Donald Hill', 'GV', 'oldmandh@gmail.com', '19709806819', 'vacation', '', 1, '3 months multiple', 'normal', '05/09/2012', '05/15/2012', 'Hochiminh-Saigon', 'United States', 'ua079', 'no', 'no', 'no', 'no', 0, 37, 'onepay', 'refund', '2012-05-01 16:23:00', 'false', 'Yes', NULL, 3, '72.164.117.227');
INSERT INTO `customers` VALUES (123, 'Danyl Ainslie', 'GV', 'danylthegolfman@hotmail.com', '303-668-9645', 'vacation', '', 2, '1 month single', 'normal', '10/26/2012', '11/17/2012', 'Hochiminh-Saigon', 'United States', '9715', 'no', 'no', 'no', 'no', 0, 39, 'onepay', 'refund', '2012-05-02 14:21:13', 'false', 'Yes', NULL, 3, '75.171.209.171');
INSERT INTO `customers` VALUES (126, 'ADESOKAN OLAWALE HABBE', 'GV', 'micheal3223@gmail.com', '2348157322330', '', '', 1, '1 month single', 'normal', '05/03/2012', '05/31/2012', 'Hanoi', 'Nigeria', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'refund', '2012-05-03 10:21:41', 'false', 'Yes', NULL, 3, '172.190.126.60');
INSERT INTO `customers` VALUES (128, 'tonytran', 'GV', 'incredibletran@gmail.com', '100 250 425 142', '', '', 1, '1 month single', 'normal', '05/12/2012', '06/07/2012', 'Hanoi', 'United States', 'BA231', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'refund', '2012-05-11 02:20:59', 'false', 'Yes', NULL, 3, '123.16.232.140');
INSERT INTO `customers` VALUES (129, 'Nguyen Tien Cinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'test', 1, '1 month single', 'normal', '06/13/2012', '06/22/2012', 'Hochiminh-Saigon', 'Afghanistan', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'onepay', 'refund', '2012-05-11 02:24:50', 'false', 'Yes', NULL, 3, '123.16.232.140');
INSERT INTO `customers` VALUES (130, 'Tien Chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'test', 1, '1 month single', 'normal', '06/05/2012', '06/13/2012', 'Hochiminh-Saigon', 'Bermuda', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'refund', '2012-05-11 02:37:18', 'false', 'Yes', NULL, NULL, '123.16.232.140');
INSERT INTO `customers` VALUES (131, 'Tien Chinh', 'GVSC', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'vaaa', 1, '1 month single', 'normal', '06/06/2012', '06/13/2012', 'Hochiminh-Saigon', 'Belize', '', 'yes', 'yes', 'no', 'no', 0, 67.5, 'onepay', 'refund', '2012-05-11 02:38:35', 'false', 'Yes', NULL, 3, '123.16.232.140');
INSERT INTO `customers` VALUES (132, 'tonytran', 'GVSC', 'incredibletran@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'urgent', '05/12/2012', '06/11/2012', 'Hanoi', 'United States', '29AFB3', 'yes', 'yes', 'no', 'no', 0, 77.5, 'onepay', 'delete', '2012-05-11 02:45:03', 'false', 'Yes', NULL, 3, '123.16.232.140');
INSERT INTO `customers` VALUES (133, 'tonytran', 'GVSC', 'incredibletran@gmail.com', '+100-250-520', '', '', 1, '1 month single', 'urgent', '05/12/2012', '06/12/2012', 'Hanoi', 'United States', '', 'yes', 'yes', 'yes', 'yes', 0, 77.5, 'onepay', 'delete', '2012-05-11 02:48:07', 'false', 'Yes', NULL, 3, '123.16.232.140');
INSERT INTO `customers` VALUES (134, 'Robert Charles Gandy', 'GVS', 'robertgandy@hotmail.com', '+614 0474 9565', 'vacation', '', 1, '1 month single', 'normal', '06/10/2012', '06/22/2012', 'Hanoi', 'Australia', 'MH752', 'yes', 'no', 'no', 'no', 0, 44.5, 'onepay', 'finish', '2012-05-13 00:37:31', 'false', 'Yes', NULL, 3, '124.171.26.112');
INSERT INTO `customers` VALUES (135, 'Tien Chinh', 'GV', 'chinhnt@vietnamdeltatour.com', '+084 168 671 4663', '', 'dan', 1, '1 month single', 'normal', '05/18/2012', '05/26/2012', 'Hanoi', 'United Kingdom', '', 'no', 'no', 'no', 'no', 0, 0, 'paypal', 'delete', '2012-05-16 22:00:55', 'false', 'Yes', NULL, NULL, '123.16.232.140');
INSERT INTO `customers` VALUES (136, 'aaaaaa', 'GV', 'chinnhnt@gmail.com', '+084 168 671 4663', '', '', 1, '1 month single', 'normal', '05/18/2012', '06/15/2012', 'Hanoi', 'Bermuda', '', 'no', 'no', 'no', 'no', 0, 19.5, 'onepay', 'delete', '2012-05-16 22:31:26', 'false', 'Yes', NULL, 3, '123.16.232.140');

-- --------------------------------------------------------

-- 
-- Table structure for table `email_temp`
-- 

CREATE TABLE `email_temp` (
  `id` int(4) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `active` enum('yes','no') character set utf8 collate utf8_unicode_ci NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `email_temp`
-- 

INSERT INTO `email_temp` VALUES (7, 'Email gui sau 2 ngay khach nhan duoc visa', 'Vietnam-visa.com: Welcome to Vietnam', '<p>\r\n [time_now]</p>\r\n<p class="MsoNormal">\r\n Dear [fullname],<br />\r\n <br />\r\n We would like to ensure that you have got the done visa approval letter in your hand by this moment already! Please take a look to carefully check your approval letter again to avoid any troubles at the <st1:country-region w:st="on"><st1:place w:st="on">Vietnam</st1:place></st1:country-region> airports or Vietnam Embassy and Consulate.&nbsp;<br />\r\n <br />\r\n With the expectation of making your feelings convenient with our country and avoiding any unexpected situation during your stay in <st1:place w:st="on"><st1:country-region w:st="on">Vietnam</st1:country-region></st1:place>, we are very glad to share with you some useful travel tip links as below for your reference:</p>\r\n<p class="MsoNormal">\r\n - <a href="http://www.vntraveltips.com/before-you-go/further-for-foreign-tourists/113-tips-and-things-to-remember-before-you-go"><strong>Tips and Things to remember Before You Go</strong> </a>(dat link den Vntraveltips.com - http://www.vntraveltips.com/before-you-go/further-for-foreign-tourists/113-tips-and-things-to-remember-before-you-go</p>\r\n<p class="MsoNormal">\r\n - <strong><span -="" accommodation="" at="" available="" class="MsoNormal" for="" in="" information="" is="" p="" span="" st1:country-region="" st1:place="" the="" w:st="on">For the specific tips during your trip in <st1:country-region w:st="on"><st1:place w:st="on">Vietnam</st1:place></st1:country-region></span></strong>, it can be reached at:</p>\r\n<p class="MsoNormal">\r\n http://www.vntraveltips.com/while-youre-in-vietnam</p>\r\n<p class="MsoNormal">\r\n -<span span=""><strong><a href="http://www.vntraveltips.com/while-youre-in-vietnam/do-a-dont">DOs &amp; DON&#39;Ts (While You are in Vietnam)</a></strong>, learn out more at http://www.vntraveltips.com/while-youre-in-vietnam/do-a-dont/68-general-dos-a-donts-for-vietnam</span></p>\r\n<p class="MsoNormal">\r\n -<span span=""><strong>&lt;span blue;&quot;=&quot;&quot;&gt;For the most beautiful beaches, famous attractions as well as cultural activities and most traditional food and drink</strong></span>, you can find at: http://www.vietnam-beauty.com/</p>\r\n<p>\r\n &nbsp;</p>\r\n<p class="MsoNormal">\r\n We do hope that the above information can be helpful and wish you a happy and unforgettable trip in <st1:place w:st="on"><st1:country-region w:st="on">Vietnam</st1:country-region></st1:place>!</p>\r\n<p class="MsoNormal">\r\n &nbsp;</p>\r\n<p class="MsoNormal">\r\n Should you have any questions regarding in <st1:country-region w:st="on"><st1:place w:st="on">Vietnam</st1:place></st1:country-region>, we are always available at:</p>\r\n<p class="MsoNormal">\r\n <o:p></o:p>Client Support:+84.4625.12.798 or hotline: +84.946.583.583.</p>\r\n<p class="MsoNormal">\r\n Email: support@vietnam-visa.com</p>\r\n<p class="MsoNormal">\r\n <o:p>&nbsp;</o:p></p>\r\n<p class="MsoNormal">\r\n We warmly welcome Mr/Ms [full name] to our beautiful country.<br />\r\n &lt;!--[if !supportLineBreakNewLine]--&gt;<br />\r\n &lt;!--[endif]--&gt;</p>\r\n<p class="MsoNormal">\r\n Visa Support Department<br />\r\n VNB Travel</p>\r\n<p class="MsoNormal">\r\n <o:p>&nbsp;</o:p></p>\r\n<div id="refHTML">\r\n &nbsp;</div>', 'yes');
INSERT INTO `email_temp` VALUES (16, 'check status', 'your application is finished', '<p>\r\n Dear [fullname],</p>\r\n<p class="MsoNormal" line-height:="" p="">\r\n Thank you for using our service at our website <a href="../../../">www.vietnam-visa.com</a>!</p>\r\n<p class="MsoNormal" line-height:="" p="">\r\n We are pleased to inform that your visa application has been accepted by the Vietnam Immigration Department. <strong a="" assess="" href="../../../checkstatus.html" link:="" please="" span="" this="">http://www.vietnam-visa.com/checkstatus.html and fill your Application ID and registered email to download your visa approval letter/code.</strong></p>\r\n<p class="MsoNormal" line-height:="" p="">\r\n Please be kindly noted that this letter may include several people whose requests were sent on the same day, but each person will receive one separate visa in the airport. Please don&rsquo;t worry about that because it&rsquo;s not a problem at all.</p>\r\n<p class="MsoNormal" line-height:="" p="" span="" strong="">\r\n <strong and="" enter="" exit="" for="" st1:country-region="" strong="" to="" w:st="on" you=""><st1:place w:st="on">Vietnam</st1:place> is above your name, not below, </strong>and kindly check carefully your own information to avoid any unexpected mistake (if any)!</p>\r\n<p class="MsoNormal" em="" line-height:="" p="">\r\n <o:p>&nbsp;</o:p></p>\r\n<p>\r\n <em class="MsoNormal" line-height:="" p=""><em and="" any="" charge="" contact="" even="" feel="" for="" free="" further="" information="" of="" related="" strong="" to="" us="" visa=""><st1:place w:st="on"><st1:country-region w:st="on">Vietnam</st1:country-region></st1:place> Travel consultation service at: <o:p></o:p></em> </em></p>\r\n<ul class="MsoNormal" li="" line-height:="" type="disc">\r\n support@vietnam-visa.com ; and/or <o:p></o:p>\r\n <li .4.625.127.98="" class="MsoNormal" daily="" em="" li="" line-height:="" o:p="" phone:="" within="" working="">\r\n  <em class="MsoNormal" line-height:="" p=""><em span="">(24/7)<o:p></o:p></em></em></li>\r\n</ul>\r\n<p a="" any="" click="" for="" here="" href="http://www.vietnam-beauty.com/" line-height:="" p="" please="" target="_blank" vietnam-destination="">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you=""><strong>Many thanks and Best Regards,<o:p></o:p></strong></em></em></p>\r\n<p bui="" class="MsoNormal" line-height:="" p="">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">Vietnam Visa Department</em></em></p>\r\n<p class="MsoNormal" line-height:="" p="">\r\n <br />\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">Tel: 84.4.625.127.98<br />\r\n Fax: 84.4.625.102.39<br />\r\n Hotline: 84.946.583.583<br />\r\n Email: support@vietnam-visa.com<br />\r\n Website: www.vietnam-visa.com</em></em></p>\r\n<p class="MsoNormal">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you=""><o:p>&nbsp;</o:p></em></em></p>\r\n<p class="MsoNormal">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you=""><o:p>&nbsp;</o:p></em></em></p>\r\n<p>\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">&lt;input id="gwProxy" type="hidden" /&gt;&lt;!--Session data--&gt;&lt;input id="jsProxy" type="hidden" /&gt;&lt;/em></em></p>\r\n<div id="refHTML">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">&nbsp;</em></em></div>\r\n<p>\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">&lt;input id="gwProxy" type="hidden" /&gt;&lt;!--Session data--&gt;&lt;input id="jsProxy" type="hidden" /&gt;&lt;/em></em></p>\r\n<div id="refHTML">\r\n <em class="MsoNormal" line-height:="" p=""><em a="" and="" class="MsoNormal" happy="" hope="" in="" line-height:="" p="" see="" st1:country-region="" st1:place="" strong="" to="" w:st="on" wish="" you="">&nbsp;</em></em></div>', 'yes');
INSERT INTO `email_temp` VALUES (22, 'Thu hen normal', 'Govietnamvisa - Your Visa Approval Letter processing', '<p>\r\n	Dear&nbsp;<strong>Sir/Madam</strong>,</p>\r\n<p>\r\n	Thank you for your Vietnam Visa booking via <a href="../">Govietnamvisa.com</a>!</p>\r\n<p>\r\n	After receiving your full payment, we have just submitted your visa request to Vietnam Immigration Department.</p>\r\n<p>\r\n	As noticed, your normal visa approval letter will be finished after 2 working days via email <em>(except Saturday, Sunday and national holidays</em>). &nbsp;<strong>Please kindly download and print your visa approval letter on [&hellip;&hellip;] around 6pm Vietnam time (GMT+7).</strong></p>\r\n<p>\r\n	<strong>Before getting on board, p</strong><strong>lease DO NOTICE some following useful guidance: </strong></p>\r\n<ul>\r\n	<li>\r\n		Make sure your passport is valid at least&nbsp;<strong>six months</strong>&nbsp;as well as all the information in the visa approval letter is correct</li>\r\n	<li>\r\n		Prepare&nbsp;<strong>02 latest passport-sized photos</strong>&nbsp;(in color, at any sizes, with a face straight forward)</li>\r\n	<li>\r\n		Show the printed visa approval letter (not this email) to the Airlines when you get on board.</li>\r\n	<li>\r\n		Preparing some US Dollars <strong>to pay for the stamping fee</strong>&nbsp;(to get your visa stamped into your passport) directly to the Vietnam Immigration Officials at arrival airport (USD 25/person for single entry, and USD 50/person for multiple entry visa)</li>\r\n</ul>\r\n<p>\r\n	<strong>Many thanks and Best Regards</strong>,&nbsp;</p>\r\n<p>\r\n	Govietnamvisa Support Team</p>\r\n', 'yes');
INSERT INTO `email_temp` VALUES (18, 'Application Confirmation', 'Govietnamvisa.com - Application Confirmation', '<p>\r\n <strong>[time_now]</strong></p>\r\n<p>\r\n Dear [fullname],<br />\r\n Thank you for your Vietnam Visa booking with Govietnamvisa.com!</p>\r\n<p>\r\n Please review your application and if you submit any errors, kindly notify us immediately</p>\r\n<p>\r\n <strong>Your Order Id is</strong> : [order]</p>\r\n<table border="0" cellpadding="0" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n    <p>\r\n     Your application details are:</p>\r\n    <p>\r\n     &nbsp;</p>\r\n    <p>\r\n     <strong>Visa Information</strong></p>\r\n    <p \r\n     APPLICATION NUMBER: [visa_number]</p>\r\n    <p \r\n     TYPE OF VISA:[visa_type]</p>\r\n    <p \r\n     CONTACT PHONE: [phone]</p>\r\n    <p \r\n     <strong>Applicant details</strong>:</p>\r\n    [application]</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n<p>\r\n After receiving your final&nbsp;<em><strong><u>confirmation of payment</u></strong></em>, we will send it to Vietnam Immgiration Dept to process it. If you failed to make payment for your application, please try again here</p>\r\n<p>\r\n <br />\r\n Please feel free to contact us for any further visa related information</p>\r\n<p \r\n - Contact Client Support at local phone +84-4.668.07.638 within working hours or hotline +84-946.466.068 (24/7)</p>\r\n<p \r\n - Email us at&nbsp;<u>support@govietnamvisa.com</u><br />\r\n <br />\r\n Many thanks and best regards,&nbsp;<br />\r\n <br />\r\n Govietnamvisa Support Team</p>', 'yes');
INSERT INTO `email_temp` VALUES (21, 'Thu xac nhan booking (chua pay)', 'Govietnamvisa.com - Application Form Received', '<p>\r\n <strong><span 20px="" 7px="" p="" td="">Thank you for your Vietnam visa application via <a href="http://govietnamvisa.com" target="_blank">govietnamvisa.com</a>!</span></strong></p>\r\n<p>\r\n <strong><span 20px="" 7px="" p="" td="">Please review your application information as below; and if you find any errors, kindly notify us immediately via hotline <em>+84 946 466 068</em> or email <em>support@govietnamvisa.com</em> ;</span></strong></p>\r\n<br />\r\n<p>\r\n [time_now]</p>\r\n<table align="center" border="0" border:1px="" cellpadding="0" cellspacing="0" solid="" td="" width="618">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n    <strong><span 20px="" 7px="" p="" td=""><strong>Your application details:</strong></span></strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n    <table align="center" border="1" cellpadding="10" cellspacing="0" tbody="">\r\n     <tbody>\r\n      <tr>\r\n       <td>\r\n        <p>\r\n         <strong><span 20px="" 7px="" p="" td=""><b>General information:</b></span></strong></p>\r\n        <p application="" number:="" p="">\r\n         &nbsp;</p>\r\n        <p of="" p="" type="" visa:="">\r\n         &nbsp;</p>\r\n        <p air:="" arrival="" by="" date="" of="" p="">\r\n         &nbsp;</p>\r\n        <p a="" address:="" email="" href="mailto:[email]" target="_blank">\r\n         <strong><span 20px="" 7px="" p="" td="">[email]</span></strong></p>\r\n       </td>\r\n      </tr>\r\n      <tr>\r\n       <td>\r\n        <strong><span 20px="" 7px="" p="" td=""><b>Applicant details</b>:</span></strong></td>\r\n      </tr>\r\n      <tr>\r\n       <td>\r\n        <strong><span 20px="" 7px="" p="" td="">[application]</span></strong></td>\r\n      </tr>\r\n     </tbody>\r\n    </table>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td td="">\r\n    &nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n    <p>\r\n     <strong><span 20px="" 7px="" p="" td="">After receiving your final&nbsp;<em><strong><u>confirmation of payment</u></strong></em>, we will submit your visa application to Vietnam Immgiration Department to process it. If you failed to make payment for your application, please try again <a href="http://govietnamvisa.com/make-a-payment">here.</a></span></strong></p>\r\n    <p>\r\n     <strong><span 20px="" 7px="" p="" td=""><strong>Please feel free to contact us for any further visa or travel related information:</strong></span></strong></p>\r\n    <p -="" 24="" 84-4.668.07.638="" 84-946.466.068="" at="" client-care="" contact="" hotline="" hours="" local="" or="" our="" p="" phone="" within="" working="">\r\n     &nbsp;</p>\r\n    <p -="" a="" at="" com="" email="" us="">\r\n     <strong><span 20px="" 7px="" p="" td=""><u>support@govietnamvisa.com</u></span></strong></p>\r\n    <p>\r\n     <strong><span 20px="" 7px="" p="" td="">Please add the email address of &quot;GoVietnamVisa&quot; to your address book to make sure that our emails will go into your inbox.</span></strong></p>\r\n    <p>\r\n     <strong><span 20px="" 7px="" p="" td=""><b>Many thanks and Best regards!</b></span></strong></p>\r\n    <p>\r\n     <strong><span 20px="" 7px="" p="" td=""><strong>Visa Supporting Team</strong></span></strong></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n    <strong><span 20px="" 7px="" p="" td=""><strong>Keep in touch with us to get more useful information</strong> <a href="http://www.facebook.com/profile.php?id=100003710110182&sk=wall, https://twitter.com/#!/">facebook</a> | <a href="http://govietnamvisa.com/blog/">Blog</a></span></strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td border-top:2px="" delta="" repeat="" scroll="" solid="" span="" tour="" visa="">\r\n    <strong><span 20px="" 7px="" p="" td="">.</span><br />\r\n    99 Giang Van Minh Str., Ba Dinh Dist., Hanoi, Vietnam</strong></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n<p>\r\n <strong>&nbsp;</strong></p>', 'yes');
INSERT INTO `email_temp` VALUES (19, 'Thu tra visa', 'Govietnamvisa.com - Your Visa Approval Letter finished', '<p>\r\n Dear&nbsp;<strong>[fullname]</strong>,</p>\r\n<p>\r\n Thank you for your Vietnam Visa booking at <a href="http://govietnamvisa.com/">Govietnamvisa.com!</a></p>\r\n<p>\r\n We are pleased to inform that your visa application has been accepted by Vietnam Immigration Department.</p>\r\n<p>\r\n <strong>You can download your visa approval letter by logging in at <a href="http://govietnamvisa.com/check-status">check status</a> or accessing the </strong><strong>below</strong><strong> link : [link].</strong></p>\r\n<p>\r\n <strong>Please be reminded to print your visa approval letter out before getting on board and double check</strong> your visa approval letter carefully to make sure there&#39;s no unexpected mistakes in your personal information. If there&#39;s any mistake, kindly <a href="http://govietnamvisa.com/page/contact-us">contact us</a> immediately.</p>\r\n<p>\r\n <u><em>Notice</em></u>: The date for you to enter and exit Vietnam should be on the line above your name, not below.</p>\r\n<p>\r\n For saving time at Vietnam arrival airport, <strong>please DO NOTICE some following useful information: </strong></p>\r\n<ul>\r\n <li>\r\n  The visa approval letter may include several people whose requests were sent on the same day, but each person will receive one separate visa at the airport.&nbsp;There is definitely no need for you to worry about it.</li>\r\n <li>\r\n  You should also download, print out, glue your photo(s) and fill out the <strong>entry and exit form</strong>&nbsp;IN ADVANCE. In addition, remember to BRING it with you to Vietnam airport, SHOW it to Vietnam Immigration Officers with the visa approval letter. Should you have any problem filling out the entry and exit form, please follow instructions&nbsp;<a href="http://vietnam-visa.com/blog/important-remarks-for-“entry-and-exit-form”/">here</a><a href="http://govietnamvisa.com/blog/important-remarks-for-entry-and-exit-form/">.</a></li>\r\n</ul>\r\n<p>\r\n Please feel free to contact us for any further visa related information and Vietnam Travel consultation service, totally FREE OF CHARGE, at:</p>\r\n<p \r\n * Email address:&nbsp;<a href="mailto:support@vietnam-visa.com">support@govietnamvisa.com</a>; and/or</p>\r\n<p \r\n * Local phone: +84-4.668.07.638&nbsp;within daily working hours</p>\r\n<p \r\n * Hotline:&nbsp;<strong>+84-946.466.068</strong>&nbsp;(24/7)</p>\r\n<p>\r\n Welcome to Vietnam and Wish you an enjoyable trip!</p>\r\n<p>\r\n <strong>Many thanks and Best Regards,</strong></p>\r\n<p>\r\n Visa Supporting Team</p>', 'yes');
INSERT INTO `email_temp` VALUES (20, 'Thu hen urgent', 'Govietnamvisa.com - Your Visa Approval Letter processing', '<p>\r\n Dear&nbsp;<strong>Sir/Madam</strong>,</p>\r\n<p>\r\n Thank you for your Vietnam Visa booking via <a href="http://govietnamvisa.com/">Govietnamvisa.com</a>!</p>\r\n<p>\r\n After receiving your full payment, we have just submitted your visa request to Vietnam Immigration Department.</p>\r\n<p>\r\n As noticed, your urgent visa approval letter will be finished after 1 working day via email <em>(except Saturday, Sunday and national holidays</em>). &nbsp;<strong>Please kindly download and print your visa approval letter on [&hellip;&hellip;] around 6pm Vietnam time (GMT+7).</strong></p>\r\n<p>\r\n <strong>Before getting on board, p</strong><strong>lease DO NOTICE some following useful guidance: </strong></p>\r\n<ul>\r\n <li>\r\n  Make sure your passport is valid at least&nbsp;<strong>six months</strong>&nbsp;as well as all the information in the visa approval letter is correct</li>\r\n <li>\r\n  Prepare&nbsp;<strong>02 latest passport-sized photos</strong>&nbsp;(in color, at any sizes, with a face straight forward)</li>\r\n <li>\r\n  Show the printed visa approval letter (not this email) to the Airlines when you get on board.</li>\r\n <li>\r\n  Preparing some US Dollars <strong>to pay for the stamping fee</strong>&nbsp;(to get your visa stamped into your passport) directly to the Vietnam Immigration Officials at arrival airport (USD 25/person for single entry, and USD 50/person for multiple entry visa)</li>\r\n</ul>\r\n<p>\r\n <strong>Many thanks and Best Regards</strong>,&nbsp;</p>\r\n<p>\r\n Govietnamvisa Support Team</p>', 'yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `embassy`
-- 

CREATE TABLE `embassy` (
  `id` int(4) NOT NULL auto_increment,
  `id_country` int(4) default NULL,
  `country_name` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL default '',
  `phone` varchar(15) NOT NULL default '',
  `fax` varchar(15) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `website` varchar(50) default NULL,
  `active` enum('no','yes') NOT NULL default 'yes',
  `allow_visa_code` tinyint(1) default '1',
  `note` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

-- 
-- Dumping data for table `embassy`
-- 

INSERT INTO `embassy` VALUES (28, 1, '', 'London', '12-14 Victoria Rd., London W8-5rd, UK', '(4420) 79371912', '(44020) 7565385', 'embassy@vietnamembassy.org.uk', '', 'yes', 1, 'Office hour:  Monday - Friday:  Morning:     9.00a.m - 11.30a.m\r\n                                             Afternoon:  13.00p.m - 17.00 p.m');
INSERT INTO `embassy` VALUES (30, 34, 'Chile', 'SANTIAGO', '2751 Eliodoro Yanez, Providencia, Santiago Chile', '(56.2) 244 3633', '(56.2) 244 3799', 'ewrerw@hafsdh.com; sqvnchile@yahoo.com', 'http://www.vietnamembassy-chile.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (31, 35, 'China', 'Beijing', 'No 32 Guanghua Rd., Jiangou menwai, P.O.Box 00600, Beijing, CHINA', '(86-10) 6532 11', '(86-10) 6532 57', 'suquanbk@yahoo.com', 'www.vnemba.org.cn', 'yes', 0, 'Consular telephone:  (86-10) 6532 7038');
INSERT INTO `embassy` VALUES (32, 35, 'China', 'Guangzhou', '2nd floor, Hotel Landmark B Building North, Qiaoguang Rd. (Haizhu square), Guangzhou, CHINA.', '(86-20) 8330 59', '(86-20) 8330 59', 'tlsq.quangchau@mofa.gov.vn', 'http://www.vietnamconsulate-guangzhou.org', 'yes', 0, 'Consular telephone: 8330 5910-11\r\nMobile : (86)138 296 7900');
INSERT INTO `embassy` VALUES (33, 35, 'China', 'Kun Ming', 'No. 507, Hong Ta Mansion 1 No. 155 Beijing Road, Kunming, China', '(0086-871)- 351', '(0086-871) 351', 'tlsqcm@yahoo.com', 'http://www.vietnamconsulate-kunming.org', 'yes', 0, 'Consular telephone: (0086-871)-3522669');
INSERT INTO `embassy` VALUES (34, 35, 'China', 'Nanning', '1st floor, Touzi Dasha, 109 Minzu Avenue, Nanning, CHINA.', '(86-77) 1551 05', '(86-77) 1553 47', 'tlsqvn@rediffmail.com', 'http://www.vietnamconsulate-nanning.org', 'yes', 0, '');
INSERT INTO `embassy` VALUES (35, 35, 'China', 'HongKong', '15/F, Great Smart Tower, 230 Wan Chai Road, Wan Chai, HONG KONG, CHINA', '(852) 2591 4517', '(852) 2591 4524', 'vnconsul@netvigator.com; tlsqhk@mofa.gov.vn ;', 'http://www.vietnamconsulate-hongkong.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (36, 200, 'Taiwan', 'Taipei', '3F, No.65, Sung Chiang Road, TAIPEI, TAIWAN', '(8862) 2516 662', '(8862) 2504 176', 'vecotaipei@mofa.gov.vn', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (37, 98, 'Japan', 'TOKYO', '50-11, Motoyoyogi-cho Shibuya-ku, Tokyo 151, JAPAN', '(813) 3466 3313', '(813) 3466 3391', 'vnembasy@blue.ocn.ne.jp', 'http://www.vietnamembassy-japan.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (38, 98, 'Japan', 'OSAKA', 'Osaka-fu, Osaka-shi, Chuo-ku, Bakuro-cho 1-4-10 Estate Bakurocho Building 10F, Osaka, 541-0059 Japan', '(81-6) 6263 160', '(81-6) 6263 177', 'tlsvnosa@gold.ocn.ne.jp', 'http://www.vietnamconsulate-osaka.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (54, 108, 'Laos', 'Vientiane', 'Thatluang Rd. Vientiane Laos', '(856) 2141 3409', '(856) 2141 3379', 'lao.dsqvn@mofa.gov.vn', 'http://www.vietnamconsulate-pakse.org', 'yes', 0, 'Consul General: 21 4199  -Home: 25 2947\r\n\r\nConsular service: 21 4140');
INSERT INTO `embassy` VALUES (41, 203, 'Thailand', 'Bangkok', '83/1 Wireless Road, Lumpini, Pathumwan, Bangkok 10330, THAILAND', '(662) 267 9602', '(662) 254 4630', 'vnembtl@asianet.co.th', '', 'yes', 1, 'Office hours for public:\r\n8h30 - 11h30 ; 13h30 -16h30 from Monday to Friday (Except Vietnamese and Thai public holidays).');
INSERT INTO `embassy` VALUES (42, 203, 'Thailand', 'KHONKHAEN', '65/6 Chatapadung, Khonkaen 40000, THAILAND', '(66) 4324 2190', '(66) 4324 1154', 'khue@loxinfo.co.th', 'http://www.vietnamconsulate-khonkaen.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (43, 105, 'North Korea', 'Pyongyang', 'No. 7 Munsu Street, Pyongyang, North Korea', '00-850-2-381-73', '00-850-2-381-76', 'vnembassydprk@mofa.gov.vn', ' www.vietnamembassy-pyongyang.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (44, 146, '', 'Welllington', 'Level 21, Grand Plimmer Tower, 2-6 Gilmer Terrace P.O. Box 8042, Welllington, NEW ZEALAND', '(644) 473 5912', '(644) 473  5913', 'embassyvn@clear.net.nz', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (45, 139, 'Myanmar', 'Yangon', 'Building No.70-72, Thanlwin Road, Bahan Township, Yangon.', '95-1- 511305, 9', '95-1- 514897', 'vnembmyr@cybertech.net.mm', '', 'yes', 1, 'Office Hours :  Monday to Friday: 08.00 â€“ 12.00; 13.00 â€“ 16.30');
INSERT INTO `embassy` VALUES (46, 121, '', 'Kuala Lumpur', 'No.4, Persiaran Stonor 50450, Kualar Lumpur, MALAYSIA', '+603-2148 4036;', '(603) 2148 3270', 'daisevn1@streamyx.com;daisevn1@putra.net.my', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (47, 104, 'South Korea', 'Seoul', '28-58, Samchong-Dong, Chongno-Ku, 110-230, SEOUL, SOUTH KOREA', '(822) 739 2065', '(822) 739 2064;', 'vndsq@yahoo.com', 'http://www.vietnamembassy-seoul.org', 'yes', 1, 'Consular telephone: (822) 734 7948');
INSERT INTO `embassy` VALUES (48, 90, 'Indonesia', 'Jakarta', 'No.25 JL. Teuku Umar, Menteng, Jakarta-Pusat, INDONESIA', '(6221) 310 0358', '(6221) 314 9615', 'embvnam@uninet.net.id', '', 'yes', 1, 'Working hours: From 08.00 until 16.30 Mondays to Fridays');
INSERT INTO `embassy` VALUES (49, 161, 'Philippines', 'Manila', '670 Pablo Ocampo (formerly Vito Cruz) Malate, Manila, The PHILIPPINES', '(632) 521 6843', '(632) 526 0472', 'vnembph@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (50, 135, 'Mongolia', 'Ulaanbaatar', 'Ench Taivny UrgunChulur 47, Ulaan baatar, MONGOLIA - C.P.Box 670', '(976) 145 4632', '(976) 145 8923', 'vinaemba@magicnet.mn', 'http://www.vietnamembassy-mongolia.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (51, 22, 'Brunei Darussalam', 'DARUSSALAM', 'No 9, Spg 148-3 jalan Telanai BA 2312,BSB - BRUNEI DARUSSALAM', '(673) 265 1580', '(673) 265 1574', 'vnembassy@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (52, 108, 'Laos', 'Vientiane', 'No 85 23 Singha Road, Ban Phonxay, Saysettha District', '(856) 2141 3409', '(856) 2141 3379', 'dsqvn@laotel.com', 'lao.dsqvn@mofa.gov.vn', 'yes', 0, 'Consular'' s phone : (856) 413400');
INSERT INTO `embassy` VALUES (53, 184, 'Singapore', 'Singapore', '10 Leedon Park St., SINGAPORE 267887', '(65)  64625994', '(65)  6462 5936', 'vnemb@singnet.com.sg', '', 'yes', 1, 'Office Hours:  Mon - Fri   8.30am - 12.00pm\r\n                                           2.30pm - 5.30pm\r\nVisa Hours:    Mon-Fri    9.00am - 12.00 noon');
INSERT INTO `embassy` VALUES (55, 108, 'Laos', 'Luang Prabang', 'No. 427-428, That Bo Sot village, Luang phrabang town, Luang phrabang province, Laos.', '(856) 071 25474', '(856) 071 25474', 'luongpb@yahoo.com.vn', 'http://www.vietnamconsulate-luangprabang.org/', 'yes', 0, '');
INSERT INTO `embassy` VALUES (56, 108, 'Laos', 'Savanakhet', 'No.118, Sisavangvong, Kayson Phomvihan district, Savannakhet province', '(856) 41 212418', '(856) 4121 2182', 'tlsxavan@laotel.com', 'http://www.vietnamconsulate-savanakhet.org', 'yes', 0, '');
INSERT INTO `embassy` VALUES (57, 27, 'Cambodia', 'Phnom Penh', '436 Monivong Blvd., Khan Chamcarmon, Phnom Penh', '(855) 23 726 28', '(855) 2372 6273', 'vnembassy03@yahoo.com; vnembpnh@online.com.kh', 'http://www.vietnamembassy-cambodia.org', 'yes', 0, '');
INSERT INTO `embassy` VALUES (58, 27, 'Cambodia', 'Sihanouk Ville', '310 Ekreach-  Khan Mittapheap â€“ Sihanouk City', '(855) 3493 3669', '(855) 3493 3669', 'tlsqsiha@camintel.com', 'http://www.vietnamconsulate-shihanoukville.org', 'yes', 0, '');
INSERT INTO `embassy` VALUES (59, 27, 'Cambodia', 'Batambang', 'Road No.3, Batambang province, CAMBODIA', '(855) 5395 2894', '(855) 5395 2894', 'lsqvnbat@camintel.com', 'http://www.vietnamconsulate-battambang.org', 'yes', 0, '');
INSERT INTO `embassy` VALUES (60, 89, 'India', 'New Delhi', '17, Kautilya Marg, Chanakyapuri, New Delhi 110 021, INDIA', '(91-11) 2301 98', '(91-11) 2301 05', 'sqdelhi@del3.vsnl.net.in; ebsvnin@yahoo.com.vn', '', 'yes', 1, 'Telephone: (00-91) 23018059 â€“ ext: 46 (answering machine; visa officer available on phone from 4:00 to 5:00p.m or for emergency cases only)\r\n\r\nWorking hours: 9:30am â€“ 5:00pm, Monday through Friday.\r\n\r\nApplications are accepted in the morning, from 10:30 to 12:30.\r\n\r\nVisa collection is in the afternoon, from 4:00 to 5:00.');
INSERT INTO `embassy` VALUES (61, 89, 'India', 'Mumbai', 'B-306 Oberoi chamber New Link road andheri (w), Mumbai 400 053, India.', '(9122) 2673 668', '(9122) 2673 663', 'vietnam@mtnl.net.in', 'vietnam@mtnl.net.in; tlsq.mumbai@mofa.gov.vn', 'yes', 1, '');
INSERT INTO `embassy` VALUES (62, 9, 'Australia', 'Canberra', '6 Timbarra Crescent, O''Malley, ACT, 2606, Australia', '612 - 6286 6059', '(612) 6286 4534', 'vembassy@webone.com.au; Canberra@au.vnembassy.org', '', 'yes', 1, 'Working time : Monday - Friday 9.00 am - 5.00 p.m. Australian public holidays are excepted');
INSERT INTO `embassy` VALUES (63, 8, 'Austria', 'Vienna', 'Felix Mottl - Strabe A-1190 Vienna', '(612) 9327 2539', '(612) 9328 1653', 'embassy.vietnam@aon.at', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (64, 209, 'Turkey', 'Ankara', 'No. 34 Cayhane Sokak, Gajiosmanpasa, Ankara, TURKEY', '(90-312) 446 80', '(90-312) 446 56', 'dsqvnturkey@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (65, 170, 'Russian', 'Moscow', '13, Bolshaya Pirogovskaya St., Moscow,  RUSSIAN FEDERATION', '(70-95) 245 092', '(70-95) 246 312', 'dsqvn@com2com.ru', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (66, 170, 'Russian', 'Karla Libknhesta', '411 â€“Divs-22 â€“Karla Libknhesta-620075', '(7343) 253 0280', '(7343) 253 0282', 'lequyquynh@mofa.gov.vn', 'lequyquynh2@yahoo.gov.vn', 'yes', 1, '');
INSERT INTO `embassy` VALUES (67, 170, 'Russian', 'Vladivostok', '107/1, Puskinskaya St., Vladivostok, RUSSIAN FEDERATION', '(7-4232) 205 81', '(7-4232) 261 49', 'tls_vla@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (68, 214, 'Ukraine', 'Kiev', '51 Tovarna Str. 01103 Kiev, UKRAINE', '(3804) 4294 808', '(3804) 4294 806', 'dsq@dsqvn.kiev.ua', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (69, 12, 'Belarus', 'Minsk', 'No 3, Mozajskovo Str., Minsk – BELARUS 220040', '(3751) 7239 -15', '(3751)7239-15-3', 'dsqvn.belarus@mofa.gov.vn', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (70, 217, 'Uzbekistan', 'Tashkent', 'Rashidov Str. 100 Tashkent 700084, UZBEKISTAN', '(9987) 1134 039', '(9987) 1120 626', 'dsqvntas@rol.uz', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (71, 163, 'Poland', 'Amsterdam', 'UL Resorowa 36 02-956 Warszawa, POLAND', '(4822) 651 6098', '(4822) 651 6095', 'vnemb.pl@mofa.gov.vn', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (72, 87, 'Hungary', 'Budapest', '1062 Déhibáb, U.29, Budapest, Hungary', '(361) 342 5583;', '(361) 352 8798', 'su_quan@hu.inter.net; dungsq03@yahoo.com', 'http://www.vietnamembassy-hungary.org/', 'yes', 1, 'Office Hours:  Monday - Friday:     Morning:    8h00 â€“ 12h00\r\n                                \r\n                                                     Afternoon:  13h00 â€“ 16h00');
INSERT INTO `embassy` VALUES (73, 23, 'Bulgaria', 'Sofia', '#1, Jetvarka St., Sofia 1113, BULGARIA', '(359) 2963 2609', '(359) 2963 3658', 'vnemb.bg@mofa.gov.vn', '', 'yes', 1, 'Office hours: Tuesday and Thurday');
INSERT INTO `embassy` VALUES (74, 169, 'Romania', 'Bucharest', 'No. 35, C.A. Rosetti street, district 2, Bucharest, Romania', '(4021) 312 1626', '0040-21-211.37.', 'vietrom2005@yahoo.com', 'http://www.vietnamembassy-romania.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (75, 45, 'Czech Republic', 'Praha', 'Plzenská 214, Praha 5, 150 00 - Czech Republic', '(420) 257 211 5', '(420) 257 211 7', 'dsqvietnamcz@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (76, 47, 'Denmark', 'Copenhagen', 'Gammel Vartov Vej 20, DK - 2900 Hellerup, Copenhagen, Denmark', '(45) 3918 3932', '(45) 3918 4171', 'embvndk@hotmail.com', 'http://www.vietnamemb.dk', 'yes', 1, 'Office Hours: Monday - Friday: 10.00a.m - 13.00p.m');
INSERT INTO `embassy` VALUES (77, 68, 'Germany', 'Berlin', 'Elsenstrasse 3, Treptow, 12435 Berlin, GERMANY', '(030) 536 30 10', '(030) 536 30 20', 'info@vietnambotschaft.org', 'http://www.vietnambotschaft.org/', 'yes', 1, 'Office hours: Monday - Friday:  Morning:    9.00a.m - 12h30p.m\r\n                                              Afternoon: 13.30p.m - 17.00p.m');
INSERT INTO `embassy` VALUES (78, 68, 'Germany', 'FRáº NKFURT', 'SIESMAYERSTR.10, 60323 FRáº NKFURT/M, GERMANY', '(00- 49 - 69) 7', '(00- 49 - 69) 7', 'tlsqvietnam_framkfurt@mofa.gov.vn', '', 'yes', 1, 'Officer hour:  Monday - Friday:  Morning:          08.30 â€“ 12.30\r\n                                                  Afternoon:  13.30 â€“ 17.30');
INSERT INTO `embassy` VALUES (79, 198, 'Switzerland', 'Stockholm', 'Schlosslistrasse 26, 3008 Bern - SWITZERLAND', '+41 (0)31 388 7', '+41 (0) 31 388', 'vietsuisse@bluewin.ch', 'http://www.vietnam-embassy.ch', 'yes', 1, 'Office hour: Monday - Thursday:  Morning:      9.00a.m - 12p.m\r\n                                                 Afternoon:   14.00p.m - 17.00p.m\r\n\r\n                                     Friday:  9.00a.m - 12.00p.m');
INSERT INTO `embassy` VALUES (80, 198, 'Switzerland', 'Geneve', '18A, Chemin Francois-Lehmann, 1218 Grand-Saconnex, Geneve, SWITZERLAND', '(412) 798 9866', '(412) 798 0724', 'mission.vietnam@itu.ch', '', 'yes', 1, 'Officer hour:     Monday - Friday:        Morning:   9.30a.m â€“ 12.00p.m\r\n                                                        Afternoon:   14.30p.m â€“ 18.00p.m');
INSERT INTO `embassy` VALUES (81, 64, 'France', 'Paris', '62-66 Rue Boileau, 75016 Paris, FRANCE', '01 44 14 64 0', '01 44 96 70 89', 'vnparis@wanadoo.fr; vnparis@club-internet.fr', 'http://www.vietnamembassy-france.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (82, 64, 'France', 'Paris', '2, Le Verrier, 75006 Paris, FRANCE', '(331) 4432 0877', '(331) 4432 0879', 'unescovn@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (83, 1, '', 'London', '12-14 Victoria Rd., London W8-5rd, UK', '(4420) 79371912', '(44020) 7565385', 'embassy@vietnamembassy.org.uk', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (84, 13, 'Belgium', 'Bruxelles', '#1, Boul. Général Jacques, 1050 - Bruxelles, BELGIUM', '(322) 379 2737;', '(322) 374 9376', 'vnemb.brussels@skynet.be', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (85, 143, 'Netherlands', 'Amsterdam', 'Nassauplein 12,2585 EB, The Hague, the NETHERLANDS', '(00-31-70) 3648', '(00-31-70) 3648', 'emviet@wanadoo.nl.', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (86, 197, 'Sweden', 'Stockholm', '#26, Orby Slottsvag, 125 71 Alvsjo, Stockholm, SWEDEN', '46-8-5562 1077', '(468) 5562 1080', 'infor@vietnamemb.se', 'www.vietnamemb.se', 'yes', 1, 'Office hour:  Monday - Friday : 14.00p.m - 16.00p.m');
INSERT INTO `embassy` VALUES (87, 191, 'Spain', 'Madrid', 'C/ Arturo Soria 201, 1-AyB 28043 - Madrid, SPAIN', '(3491) 510 2867', '(3491) 415 7067', 'claudiomes@yahoo.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (88, 96, '', 'Roma', ' Via di Bravetta, 156  00164 ROMA', '(+39) 06.661661', '(+39) 06.661575', 'vnemb.it@mofa.gov.vn', '', 'yes', 1, 'Office hour: Monday - Friday:  Morning:    8.30a.m - 13p.m\r\n                                            Afternoon:  14.30p.m - 18.00p.m');
INSERT INTO `embassy` VALUES (89, 189, 'South Africa', 'Pretoria', '87 Brooks St., Brooklyn, Pretoria, SOUTH AFRICA', '+27 (0) 12 3628', '+27 (0) 12 362', 'embassy@vietnam.co.za', 'http://www.vietnamembassy-southafrica.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (90, 5, 'Algeria', 'Alger', '30, Rue Chénoua – Hydra – Alger – Algérie', '00213 21 69 27', '00213 21 69 377', 'sqvnalgerie@yahoo.com.vn', 'http://www.vietnamembassy-algerie.org/', 'yes', 1, 'Office hour: Sunday - Thursday: Morning: 8.00a.m - 11.30a.m\r\n                                                Afternoon: 14.00p.m - 16.30p.m');
INSERT INTO `embassy` VALUES (91, 113, 'Libya', 'Tripoli', 'P.O. Box 587 Gargaresh Rd., Km 7, Abou Nawas, Tripoli, LIBYA', '00 218 21 49014', '00 218 21 4901', 'dsqvnlib@yahoo.com', '', 'yes', 0, '');
INSERT INTO `embassy` VALUES (92, 53, 'Egypt', 'Cairo', '#8 Madina El Monawara st., Dokki, Cairo, EGYPT', '(202) 761 7309', '(202) 336 8612', 'vinaemb@intouch.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (94, 202, 'Tanzania', 'Salaam', 'Plot 478 - Kawe Low Density P.O Box: 9724, Dares Salaam - Tanzania', '255-22-2781330', '255-22-2781336', 'vnembassy@raha.com', 'http://www.vietnamembassy-tanzania.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (95, 106, 'Kuwait', 'Dasman', 'Jabriya, Block 10, Street 19, Villa 96, Kuwait man 15463, KUWAIT', '+ 965-25351593', '+ 965-25351592', 'vnembassy.ku@mofa.gov.vn', 'http://www.vietnamembassy-kuwait.org/', 'yes', 0, 'Office hour: Monday - Thursday:  8.00a.m - 13p.m');
INSERT INTO `embassy` VALUES (96, 215, 'UAE', 'Dubai', 'Villa 0101, 27th str., sector 24, Al Mushrif area, Abu Dhabi, the UAE', '+ 971.2.449 671', '+ 971.2.449 673', 'vnconsul@emirates.net.ae', '', 'yes', 1, 'Working Hours: 08:00 Ã· 14:00 Sunday Ã· Thursday');
INSERT INTO `embassy` VALUES (97, 43, 'Cuba', 'La Habana', '# 1802, 5ta. Avenide, Esquina A 18, Miramarm Playa. La Habana, CUBA', '(537) 204 1502;', '(537) 204 1041', 'embaviet@ceniai.inf.cu; vndaisu@ceniai.inf.cu', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (98, 131, 'Mexico', 'Mexico', '255 Sierra Ventana, Lomas de Chapultepec, Delegation Miguel Hidalgo, CP.11000, MEXICO D.F.', '(5255) 5540 163', '(5255) 5540 161', 'dsqvn9@aol.com.mx', 'http://www.vietnamembassy-mexico.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (99, 7, 'Argentina', 'Buenos Aires', '11 de Septiembre 1442 (CP 1426), Belgrano  Buenos Aires, Capital Federal - Argentinaral ARGENTINA', '(5411) 4783 180', '(5411) 4728 007', 'sqvnartn@fibertel.com', ': www.vietnamembassy.org.ar', 'yes', 1, 'Office hour: Monday - Friday: Morning:    10.00a.m - 13.00p.m\r\n                                           Afternoon:  14.30p.m - 16.00p.m');
INSERT INTO `embassy` VALUES (100, 21, 'Brazil', 'Brasilia', 'Shis Q1 05, Conjunto 14, Casa 21, Lago Sul, CEP: 71615-140,   Brasilia/DF,  Brasil', '55 61 33645876', '(5561) 364 5836', 'tlsqvnsp@uol.com.br', 'http://www.vietnamembassy-brazil.org/', 'yes', 1, '');
INSERT INTO `embassy` VALUES (102, 157, 'Panama', 'El Dorado', 'Local 3, Piso 10, Edificio Banco Atlantico, Calle 50 y 53, Panama.', '(507) 265 2551', '(507) 265 6052;', 'embavinapa@cwpanama.net', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (103, 220, 'Venezuela', 'Caracas D.C', '9na Transversal, Entre 6ta y 7ma Avenidas, Quinta Las Mercedes, Altamira, Chacao 1060-025 D.F, Caracas, Venezuela,', '(+58) 212-63574', '(+58) 212-26473', 'embavive@yahoo.com.vn', '  http://www.vietnamembassy-venezuela.org/', 'yes', 1, 'Office hour: Monday, Wednesday, and Thursday:  9.00a.m - 12.00p.m');
INSERT INTO `embassy` VALUES (104, 29, 'Canada', 'Ottawa', '470 Wilbrod Street, Ottawa, Ontario, K1N 6M8, CANADA', '(1613) 236 0772', '(1613) 236 2704', 'vietem@istar.ca; vietnamembassy@rogers.com', '', 'yes', 1, 'Office hours:   Monday to Friday: Morning:    9.30 a.m - 11.30 a.m\r\n                                                 Afternoon:  13.30 p.m - 16.00 p.m');
INSERT INTO `embassy` VALUES (105, 2, 'United States', 'Washington DC', '1233, 20th St., NW, Suite 400, Washington DC, 20036, USA', '(1-202) 861 073', '1-202) 861 0917', 'consular@vietnamembassy.us', 'http://www.vietnamembassy.us', 'yes', 1, '<br>\r\nVisa Section of the Embassy: <br>\r\n\r\nOpening hours: 9:30 â€“ 12:30 Monday through Friday. <br>\r\n\r\nPhone: (202) 861- 2293, (202) 861- 0694 and (202) 861- 0737 ext. 221, 222, 236, 237 during 10:00 â€“ 12:00 AM and 2:30 â€“ 5:30 PM Monday through Friday <br>\r\n\r\nFax: (202) 861- 1297 and (202) 861- 0917');
INSERT INTO `embassy` VALUES (106, 2, 'United States', 'San Francisco', '1700 California St, Suite 430 San Francisco, CA 94109', '(1415) 922 1577', '(1415) 922 1848', 'info@vietnamconsulate-sf.org', 'http://www.vietnamconsulate-sf.org', 'yes', 1, '');
INSERT INTO `embassy` VALUES (108, 9, 'Australia', 'Sydney', 'Suite 205, level 2, Edgecliff Centre 203 - 233 New South Head Road, Edgecliff, NSW 2027', '(612) 9327 2539', '(612) 9328 1653', 'vnconsul@ihug.com.au', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (109, 63, 'Finland', 'Helsinki', 'Aleksanterinkatu 15A, 00100, Helsinki', '+358-9- 622 99', '+358 9 622 99 0', 'vietnamfinland@gmail.com', '', 'yes', 1, '');
INSERT INTO `embassy` VALUES (110, 72, 'Greece', 'Athens', '50 Yakinthon street, Palaio Psychiko', '+30-210-612-873', '+30-210-612-873', 'vnemb.gr@mofa.gov.vn', NULL, 'yes', 1, '');
INSERT INTO `embassy` VALUES (111, 148, 'Nigeria', 'Abuja', '9 River Niger street, Off Danube street,Maitama, Abuja,Nigeria', '+234.9.870.3678', '', 'vnemb.ng@mofa.gov.vn', NULL, 'yes', 1, '');
INSERT INTO `embassy` VALUES (112, 86, 'Hong Kong', 'Hong Kong', '15/F, Great Smart Tower, 230 Wan Chai Road, Wan Chai, Hong Kong, China.', '(852) 2591 4517', '(852) 2591 4524', 'tlsqhk@mofa.gov.vn', NULL, 'yes', 1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `faq`
-- 

CREATE TABLE `faq` (
  `id` int(10) NOT NULL auto_increment,
  `question` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `question_ascii` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `answers` text NOT NULL,
  `order` int(2) NOT NULL default '0',
  `cate_id` int(5) NOT NULL,
  `cate_name` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') character set utf8 collate utf8_unicode_ci NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

-- 
-- Dumping data for table `faq`
-- 

INSERT INTO `faq` VALUES (85, 'e4rwefvc', 'e4rwefvc', '<p>\r\n refsdfadf</p>', 8, 10, 'Goodbye', 'yes');
INSERT INTO `faq` VALUES (81, 'asdfsad', 'asdfsad', '<p>\r\n asdfasdfasf</p>', 19, 11, 'Goodbye2', 'yes');
INSERT INTO `faq` VALUES (82, 'fadfadfasf', 'fadfadfasf', '<p>\r\n asdfasfasdf</p>', 17, 10, 'Goodbye', 'yes');
INSERT INTO `faq` VALUES (83, 'fteraf', 'fteraf', '<p>\r\n twer</p>', 6, 10, 'Goodbye', 'yes');
INSERT INTO `faq` VALUES (84, 'ghgfca', 'ghgfca', '<p>\r\n fdfadf</p>', 14, 10, 'Goodbye', 'yes');
INSERT INTO `faq` VALUES (80, 'asdfsadf', 'asdfsadf', '<p>\r\n asdfasdf</p>', 18, 10, 'Goodbye', 'yes');
INSERT INTO `faq` VALUES (86, 'fdfadf', 'fdfadf', '<p>\r\n fdadf</p>', 1, 10, 'Goodbye', 'yes');

-- --------------------------------------------------------

-- 
-- Table structure for table `faq_category`
-- 

CREATE TABLE `faq_category` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(255) collate utf8_unicode_ci NOT NULL,
  `order` int(4) NOT NULL,
  `active` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `faq_category`
-- 

INSERT INTO `faq_category` VALUES (10, 'Goodbye', 'goodbye', 2, 'yes');
INSERT INTO `faq_category` VALUES (11, 'Goodbye2', 'goodbye2', 1, 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `menu`
-- 

CREATE TABLE `menu` (
  `id` int(5) NOT NULL auto_increment,
  `parent_id` int(5) NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(255) collate utf8_unicode_ci NOT NULL,
  `url` varchar(255) collate utf8_unicode_ci NOT NULL,
  `order` int(3) NOT NULL,
  `active` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'yes',
  `on_top` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `on_menubar` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  `at_bottom` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `menu`
-- 

INSERT INTO `menu` VALUES (18, 0, 'Feedback', 'feedback', '', 94, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (19, 0, 'My love23', 'my-love23', '', 89, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (3, 0, 'My love baby', 'my-love-baby', 'category/my-love', 5, 'no', 'no', 'yes', 'no');
INSERT INTO `menu` VALUES (5, 3, 'My love 2', 'my-love-2', 'category/my-love/my-love-2', 26, 'yes', 'yes', 'yes', 'yes');
INSERT INTO `menu` VALUES (15, 0, 'My love', 'my-love', '', 100, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (17, 0, 'Hello2', 'hello2', '', 97, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (16, 0, 'Goodbye', 'goodbye', '', 99, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (13, 3, 'Hello', 'hello', '', 90, 'yes', 'no', 'no', 'no');
INSERT INTO `menu` VALUES (14, 0, 'Hello Lady', 'hello-lady', '', 10, 'yes', 'no', 'no', 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `meta_tags`
-- 

CREATE TABLE `meta_tags` (
  `id` int(5) NOT NULL auto_increment,
  `page` varchar(255) default NULL,
  `page_ascii` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
  `title` text,
  `description` text,
  `keywords` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

-- 
-- Dumping data for table `meta_tags`
-- 

INSERT INTO `meta_tags` VALUES (132, 'dfasdfasd', 'dfasdfasd', 'faf', 'fasdfasdfas', 'sadfasd');
INSERT INTO `meta_tags` VALUES (133, 'ffasd', 'ffasd', 'f', 'asdf', 'fasdf');
INSERT INTO `meta_tags` VALUES (127, 'My love', 'my-love', 'asdfadfasf', 'asdfasdf', 'asdfa');
INSERT INTO `meta_tags` VALUES (128, 'Feedback1', 'feedback1', 'asdfa', 'asdfads', 'asdfadf');
INSERT INTO `meta_tags` VALUES (129, 'My love 2', 'my-love-2', 'fasdfa', 'aasdfsf', 'asdfasdf');
INSERT INTO `meta_tags` VALUES (130, 'My love32a', 'my-love32a', 'dfasf', 'sdasdfasdsd', 'asdfa');
INSERT INTO `meta_tags` VALUES (131, 'My love34r', 'my-love34r', 'adsf', 'dfadfadsf', 'asdfa');

-- --------------------------------------------------------

-- 
-- Table structure for table `page`
-- 

CREATE TABLE `page` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(255) collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `keyword` text collate utf8_unicode_ci NOT NULL,
  `description` varchar(450) collate utf8_unicode_ci default NULL,
  `url` varchar(250) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL default '0',
  `cate_id` varchar(100) collate utf8_unicode_ci NOT NULL,
  `cate_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'yes',
  `hit` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'no',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

-- 
-- Dumping data for table `page`
-- 

INSERT INTO `page` VALUES (88, 'Công trình hạ tầng', 'cong-trinh-ha-tang', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'page/cong-trinh-ha-tang', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 4, '|135|', '|My love333|', 'yes', 'no');
INSERT INTO `page` VALUES (94, 'asdfafasdf', 'asdfafasdf', '', '', '', 'page/asdfafasdf', '<p>\r\n asdfsad</p>', 13, '|136|', '|Goodbye|', 'yes', 'no');
INSERT INTO `page` VALUES (95, 'erdsfaf', 'erdsfaf', '', '', 'asdfda', 'page/erdsfaf', '<p>\r\n asdf</p>', 11, '|140|', '|Goodbye4|', 'yes', 'no');
INSERT INTO `page` VALUES (101, 'My love', 'my-love', '', '', '', 'page/my-love', '<p>\r\n asdfasd</p>', 3, '', '', 'yes', 'no');
INSERT INTO `page` VALUES (99, 'dafd', 'dafd', '', '', 'asdf', 'page/dafd', '<p>\r\n adsfas</p>', 5, '', '', 'yes', 'no');
INSERT INTO `page` VALUES (100, 'asdfasdf', 'asdfasdf', '', '', '', 'page/asdfasdf', '<p>\r\n asdf</p>', 18, '|135|', '|My love333|', 'yes', 'no');
INSERT INTO `page` VALUES (90, 'Customs Procedures For Vietnam Entry Exit', 'customs-procedures-for-vietnam-entry-exit', '', '', 'What to do before departure\r\n\r\nBefore booking a flight to Vietnam, what you need to do is to make sure your passport is valid at least 6 months from the date of arrival, and that you have your Vietnam visa already or the Vietnam visa approval letter available in hand to get the visa at arrival airport in Vietnam (called visa on arrival).', 'page/customs-procedures-for-vietnam-entry-exit', '<p>\r\n &nbsp;</p>\r\n<p before="" color:="" do="" font-family:="" line-height:="" margin-bottom:="" margin-left:="" margin-right:="" p="" to="" what="">\r\n <strong>Before booking a flight to Vietnam, what you need to do is to make sure your passport is valid at least 6 months from the date of arrival, and that you have your Vietnam visa already or the Vietnam visa approval letter available in hand to get the visa at arrival airport in Vietnam (called&nbsp;<a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa=""> <strong>The easiest way to get visa to Vietnam is to&nbsp;</strong></a><strong><a  airport="" and="" apply="" approval="" arrival="" at="" before="" bring="" could="" for="" get="" href="http://govietnamvisa.com/apply-online" in="" it="" just="" letter="" mentioned="" need=""  out="" p="" passport="" photos="" precious="" print="" save="" so="" stamped="" that="" the="" time="" to="" vietnam="" visa="" with="" you="" your=""> <strong>What to do upon entry/exit</strong></a></strong></strong></p>\r\n<p a="" all="" and="" color:="" complete="" customs="" entering="" entry="" exit="" exiting="" fill="" font-family:="" have="" href="http://govietnamvisa.com/form-on-arrival.pdf" line-height:="" margin-bottom:="" margin-left:="" margin-right:="" must="" or="" out="" procedures.="" text-decoration:="" the="" they="" to="" upon="" vietnam="" visitors="">\r\n <strong><strong><a  airport="" and="" apply="" approval="" arrival="" at="" before="" bring="" could="" for="" get="" href="http://govietnamvisa.com/apply-online" in="" it="" just="" letter="" mentioned="" need=""  out="" p="" passport="" photos="" precious="" print="" save="" so="" stamped="" that="" the="" time="" to="" vietnam="" visa="" with="" you="" your=""><u>entry &amp; exit form</u>&nbsp;</a></strong>(CHY2000),&nbsp; submit to the Immigration Officers, show all the required documents (passport, plus visa approval letter &amp; photos in case you use visa on arrival) and wait a couple of minutes until the procedures are completed to enter or exit the country.</strong></p>\r\n<p any="" be="" color:="" exit="" following="" font-family:="" form="" fulfill="" line-height:="" margin-bottom:="" margin-left:="" margin-right:="" noted="" please="" quickly="" the="" to="" ul="" with="" without="">\r\n &nbsp;</p>\r\n<ul>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">The goods, luggage &amp; personal possessions brought to Vietnam must be sufficient for personal use only.</a></strong></li>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Luggage of travelers as declared at Customs on arrival must be shown again at Customs when leaving Vietnam (except for those having been consumed or given as gifts).</a></strong></li>\r\n</ul>\r\n<p and="" color:="" exit="" following="" font-family:="" form="" if="" in="" line-height:="" margin-bottom:="" margin-left:="" margin-right:="" remember="" specify="" stuffs="" the="" those="" to="" ul="">\r\n &nbsp;</p>\r\n<ul>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Video cameras, recorders and electronic devices not for personal use;</a></strong></li>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Gold, silver, gemstones and jewelleries not personal belongings;</a></strong></li>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Foreign currency in cash (paper, coins and traveller&rsquo;s cheques) over US$ 7,000 or equivalent in other currencies; over 5,000,000 Vietnamese Dong in cash.</a></strong></li>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Gold (over 300 g): If more than 3,000 g, you are required to deposit and re-export the surplus;</a></strong></li>\r\n <li>\r\n  <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa="">Other commodities out of duty-free luggage.</a></strong></li>\r\n</ul>\r\n<p 1.5="" 150g="" 200="" 50="" :="" allowed="" and="" are="" bringing="" color:="" duty-free="" exceeding="" font-family:="" goods="" items="" line-height:="" litres="" margin-bottom:="" margin-left:="" margin-right:="" not="" nto="" of="" other="" p="" prohibited="" to="" tobacco="" total="" value="" which="" with="">\r\n <strong><a  href="http://govietnamvisa.com/page/vietnam-visa-on-arrival"  p="" visa=""><strong><em>Prohibited goods for import or export from Vietnam</em></strong>&nbsp;(if without permit): weapons, ammunition, explosives, inflammables, firecrackers of all sorts, opium and other narcotics, toxic chemicals, antiques, rare fauna and flora, documents related to national security, cultural items improper to Vietnamese traditions and customs, and toys that have negative effects on children&rsquo;s character developments etc.</a></strong></p>', 53, '|136|', '|Goodbye|', 'yes', 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `slider`
-- 

CREATE TABLE `slider` (
  `id` int(5) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(255) collate utf8_unicode_ci NOT NULL,
  `source` text collate utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `order` int(4) NOT NULL,
  `active` enum('yes','no') collate utf8_unicode_ci NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `slider`
-- 

INSERT INTO `slider` VALUES (18, 'Sweet', 'sweet', 'uploads/slider/05052012224-jpg.jpg', 'uploads/slider/thumbs/05052012224-jpg.jpg', 'asdf', 1, 'yes');
INSERT INTO `slider` VALUES (23, 'M Ldy', 'm-ldy', 'uploads/slider/05052012226.jpg', 'uploads/slider/thumbs/05052012226.jpg', 'asdfadfafdas', 2, 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `testimonials`
-- 

CREATE TABLE `testimonials` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `country` varchar(255) NOT NULL default '',
  `title` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `rating` tinyint(5) NOT NULL,
  `active` enum('yes','no') character set utf8 collate utf8_unicode_ci NOT NULL default 'no',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

-- 
-- Dumping data for table `testimonials`
-- 

INSERT INTO `testimonials` VALUES (67, 'Austin Holland ', '', 'Australia', 'asdfefwf', '<p>\r\n	I&#39;ve received the approval letter and I am very happy now, Thank You for your service, Thank You for your prompt replies, Thank You for the help, Thank You for everything, its such a wonderful Christmas gift to receive the letter today.</p>\r\n<p>\r\n	Austin Holland&nbsp;</p>\r\n', '0000-00-00 00:00:00', 5, 'yes');
INSERT INTO `testimonials` VALUES (65, 'Vivienne Hutchinson ', '', 'USA', 'asdfgadsfd', '<p>\r\n Thank you for the approval letter which we received last night. The procedure so far has been excellent. I hope to have a wonderful holiday in Vietnam.</p>\r\n<p>\r\n Best,</p>\r\n<p>\r\n Vivienne Hutchinson</p>', '0000-00-00 00:00:00', 4, 'yes');
INSERT INTO `testimonials` VALUES (74, 'Tony', '', 'United States', 'asdfefwf', '<p>\r\n I&#39;ve received the approval letter and I am very happy now, Thank You for your service, Thank You for your prompt replies, Thank You for the help, Thank You for everything, its such a wonderful Christmas gift to receive the letter today. Austin Holland</p>', '2012-05-21 10:17:17', 4, 'yes');
INSERT INTO `testimonials` VALUES (75, 'Jason Statham', '', 'US', 'Great', '<p>\r\n I&#39;ve received the approval letter and I am very happy now, Thank You for your service, Thank You for your prompt replies, Thank You for the help, Thank You for everything, its such a wonderful Christmas gift to receive the letter today. Austin Holland by Austin Holland asdfgadsfd Thank you for the approval letter which we received last night. The procedure so far has been excellent. I hope to have a wonderful holiday in Vietnam. Best,</p>', '2012-05-23 10:18:34', 4, 'yes');
INSERT INTO `testimonials` VALUES (76, 'Sam Worthington', '', 'United States', 'Awesome', 'Thank you very much. Your website was easy to use, and quite efficient. Thanks again,\r\nRegards,', '2012-05-22 10:19:15', 5, 'yes');
INSERT INTO `testimonials` VALUES (77, 'Taylor kitsch', '', 'US', 'Hello lady', '<p>\r\n I&#39;ve received the approval letter and I am very happy now, Thank You for your service, Thank You for your prompt replies, Thank You for the help, Thank You for everything, its such a wonderful Christmas gift to receive the letter today.</p>', '2012-05-23 10:21:30', 5, 'no');
