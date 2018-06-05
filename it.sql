-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 06, 2015 at 07:54 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `it`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `addjob`
-- 

CREATE TABLE `addjob` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `datepicker` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `piority` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `comment` varchar(255) default NULL,
  `status` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=296 ;

-- 
-- Dumping data for table `addjob`
-- 

INSERT INTO `addjob` VALUES (285, 'user2', '2015-06-04', '13:07', 'Administrator', 'Ungent', 'Test add job', 'Hareware', 'Test add job to system 2', NULL, NULL);
INSERT INTO `addjob` VALUES (286, 'user3', '2015-06-04', '13:36', 'Administrator', 'Ungent', 'Test add job', 'Hareware', 'test add job to system', 'ทดสอบภาษาไทย', 'กำลังดำเนินการ');
INSERT INTO `addjob` VALUES (288, 'user5', '2015-06-04', '13:45', 'Accounting', 'Ungent', 'Test add job', 'Hareware', 'Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (289, 'user6', '2015-06-04', '13:45', 'Administrator', 'Normall', 'Re: (ไม่มีหัวข้อ)', 'Hareware', 'Test add job to system', 'admin test comment', 'Broken');
INSERT INTO `addjob` VALUES (290, 'user7', '2015-06-04', '13:46', 'Accounting', 'Ungent', 'Re: แจก! ระบบแจ้งซ่อมออนไลน์ ครับ', 'Hareware', 'Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (291, 'user8', '2015-06-04', '13:46', 'Administrator', 'Ungent', 'Re: แจก! ระบบแจ้งซ่อมออนไลน์ ครับ', 'Hareware', 'Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (292, 'user9', '2015-06-04', '13:47', 'Engineer', 'Normall', 'Test add job', 'Hareware', 'Re: Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (293, 'user10', '2015-06-04', '13:47', 'Accounting', 'Normall', 'Test add job', 'Software', 'Re: Test add job to system', 'admin test comment', 'Pending');
INSERT INTO `addjob` VALUES (294, 'user11', '2015-06-04', '13:48', 'Accounting', 'Normall', 'Test add job', 'Hareware', 'Re: Test add job to system', 'admin test comment', 'Finished');
INSERT INTO `addjob` VALUES (295, 'user12', '2015-06-04', '13:48', 'Accounting', 'Ungent', 'Test add job', 'Hareware', 'Re: Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (284, 'user1', '2015-06-04', '12:59', 'Engineer', 'Normall', 'Test add job', 'Software', 'Test add job to system', NULL, NULL);
INSERT INTO `addjob` VALUES (287, 'user4', '2015-06-04', '13:44', 'Administrator', 'Normall', 'Test add job', 'Hareware', 'test add job to system', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `department`
-- 

CREATE TABLE `department` (
  `id` int(5) NOT NULL auto_increment,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `department`
-- 

INSERT INTO `department` VALUES (1, 'Administrator');
INSERT INTO `department` VALUES (2, 'Accounting');
INSERT INTO `department` VALUES (3, 'Engineer');
INSERT INTO `department` VALUES (4, 'Sale');

-- --------------------------------------------------------

-- 
-- Table structure for table `mantenace`
-- 

CREATE TABLE `mantenace` (
  `id` int(5) NOT NULL auto_increment,
  `datepicker` date NOT NULL,
  `device_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position_user` varchar(50) NOT NULL,
  `details` varchar(150) NOT NULL,
  `repair_by` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `coment` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `mantenace`
-- 

INSERT INTO `mantenace` VALUES (1, '2014-10-05', 'PC-RS-001', 'k.Duangtha Pullsawat ', 'Reservation', 'Group Revenue Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (2, '2014-10-05', 'PC-RS-002', 'k.Phitchayanee Suwannasak  ', 'Reservation', 'Reservation Supervisor', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (3, '2014-10-05', 'PC-RS-003', 'k.Chatima Sansanawisit', 'Reservation', 'Reservation Officer', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (4, '2014-10-05', 'PC-SA-001', 'k.Kreingsak Dhamrikarn', 'Sales', 'Assistant sales Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (5, '2014-10-05', 'PC-SA-002', 'Vacan', 'Sales', 'Sale Admin', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (6, '2014-10-09', 'PC-HR-002', 'k.Supattra Hiranrat', 'HR', 'HR Supervisor', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (7, '2014-10-12', 'PC-AC-001', 'k.Tippawan Sarachart', 'Accounting', 'Accounting Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (8, '2014-10-12', 'PC-AC-004', 'k.Manita  Wichaidit', 'Accounting', 'Accounting Receiving', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (9, '2014-10-12', 'PC-AC-002', 'k.Vasin Tubthong', 'Accounting', 'Cost Supervisor', 'เป่าฝุนทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (10, '2014-10-12', 'PC-AC-003', 'k.Natchalida Yadewa', 'Accounting', 'Income  Supervisor', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (11, '2014-10-12', 'PC-AC-005', 'k.Paisri nganlasom', 'Accounting', 'Accounting Payable', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (12, '2014-10-12', 'PC-AC-006', 'k.Natthakan Naphasukweeramongkol', 'Accounting', 'Store Receiving Supervisor', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (13, '2014-10-12', 'PC-FO-003', 'GSA 1', 'Front Office', 'GSA Team', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (14, '2014-10-12', 'PC-FO-004', 'GSA 2', 'Front Office', 'GSA Team', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (15, '2014-10-12', 'PC-FO-001', 'Vacan', 'Front Office', 'Front Office Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (16, '2014-10-12', 'PC-FO-002', 'k.Boonrat Manjan', 'Front Office', 'Asst.Front Office Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (17, '2014-10-19', 'PC-MK-001', 'k.Azizskandar Awang ', 'Main Kitchen', 'Group Executive Chef', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดี ใช้งานได้ตามปกติ');
INSERT INTO `mantenace` VALUES (18, '2014-10-19', 'PC-MK-002', 'k.Paiboon Narkauk', 'Main Kitchen', 'Sous Chef', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องเก่ามาก เห็นสมควรที่จะเปลียนเครื่องใหม่');
INSERT INTO `mantenace` VALUES (19, '2014-10-19', 'PC-MK-003', 'k.Pramote Dareh', 'Main Kitchen', 'Sous Chef', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องพอใช้ ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (20, '2014-10-19', 'PC-FB-003', 'k.Metika Seeon', 'F & B', 'Secretary to F&B Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (21, '2014-10-19', 'PC-FB-002', 'k.Boonckok Sukbangnob', 'F & B', 'Asst. FB. Manager', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดีใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (22, '2014-10-19', 'PC-FB-001', 'k.Suchart Lueanlongs', 'F & B', 'Restaurant Manager ', 'เป่าฝุ่นทำความสะอาดเครื่อง Computer', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องประกอบจากอะไหล่เครื่องเก่าที่เสีย สภาพพอใช้งาน');
INSERT INTO `mantenace` VALUES (23, '2014-10-26', 'PC-HK-002', 'K.Nathamon Suwarat', 'HK', 'Clerk Housekeeping', 'เป่าฝุ่นทความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (24, '2014-10-26', 'PC-HK-001', 'k.Chaiwat Deepatchana', 'HK', 'Executive Housekeeping', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (25, '2014-11-02', 'PC-AC-007', 'Seawrap Cashier', 'Accounting', 'Cashier', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (26, '2014-11-02', 'PC-FB-004', 'Seawrap Waiter ', 'F & B', 'Waiter', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องประกอบจากอะไหล่เครื่องเก่าที่เสีย สภาพพอใช้');
INSERT INTO `mantenace` VALUES (27, '2014-11-02', 'PC-FB-005', 'Waiter Pool Bar', 'F & B', 'Waiter', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องประกอบจากอะไหล่เครื่องเก่าที่เสีย สภาพพอใช้.');
INSERT INTO `mantenace` VALUES (28, '2014-11-02', 'PC-FO-006', 'Guest PC 1', 'Front Office', 'Guest Hotel', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (29, '2014-11-02', 'PC-FO-007', 'Guest PC 2', 'Front Office', 'Guest Hotel', 'เป่าฝุ่นทำความสะอาดเครื่อง', 'Mr.Mana Duangsri', 'IT Supervisor', 'เครื่องคอมพิวเตอร์ยังสภาพดี ใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (30, '2014-12-06', 'PC-EN-002', 'K.Kurlawan Pangpromma', 'Engineering', 'Secretary to Engineering', 'เป่าฝุ่นทำความสะอาดเครื่องคอมพิวเตอร์', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดีใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (31, '2014-12-06', 'PC-EN-001', 'K.Weerasak Khamkhieo', 'Engineering', 'Chief Engineering', 'เป่าฝุ่นทำความสะอาดเครื่องคอมพิวเตอร์', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดีใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (32, '2014-12-06', 'PC-LD-001', 'K.Sudta Lansawat', 'HK', 'Laundry Manager', 'เป่าฝุ่นทำความสะอาดเครื่องคอมพิวเตอร์', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดีใช้งานได้ปกติ');
INSERT INTO `mantenace` VALUES (33, '2014-12-13', 'PC-EN-002', 'K.Kurlawan Pangpromma', 'Engineering', 'Secretary to Engineering', 'เป่าฝุ่นทำความสะอาดเครื่องคอมพิวเตอร์', 'Mr.Mana Duangsri', 'IT Supervisor', 'สภาพเครื่องยังดีใช้งานได้ปกติ');

-- --------------------------------------------------------

-- 
-- Table structure for table `network_office`
-- 

CREATE TABLE `network_office` (
  `id` int(5) NOT NULL auto_increment,
  `device_id` varchar(10) NOT NULL,
  `date_pr` date NOT NULL,
  `localtion` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `network_office`
-- 

INSERT INTO `network_office` VALUES (3, 'RT-IT-001', '2015-01-13', 'Server Room', 'Cisco', 'Cisco SG200-26P 26-port', 'Working');

-- --------------------------------------------------------

-- 
-- Table structure for table `network_wifi`
-- 

CREATE TABLE `network_wifi` (
  `id` int(5) NOT NULL auto_increment,
  `device_id` varchar(50) NOT NULL,
  `date_pr` date NOT NULL,
  `localtion` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `network_wifi`
-- 

INSERT INTO `network_wifi` VALUES (1, 'RT-WiFi-001', '2015-01-13', 'Room 112', 'HP', 'hp procurve v1910-24g', 'Working');

-- --------------------------------------------------------

-- 
-- Table structure for table `priority`
-- 

CREATE TABLE `priority` (
  `id` int(5) NOT NULL auto_increment,
  `priority` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `priority`
-- 

INSERT INTO `priority` VALUES (1, 'Ungent');
INSERT INTO `priority` VALUES (2, 'Normall');

-- --------------------------------------------------------

-- 
-- Table structure for table `problem`
-- 

CREATE TABLE `problem` (
  `id` int(5) NOT NULL auto_increment,
  `problem` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `problem`
-- 

INSERT INTO `problem` VALUES (1, 'Hareware');
INSERT INTO `problem` VALUES (2, 'Software');

-- --------------------------------------------------------

-- 
-- Table structure for table `pr_order`
-- 

CREATE TABLE `pr_order` (
  `id` int(5) NOT NULL auto_increment,
  `date_pr` date NOT NULL,
  `pr_number` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `item` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `vender` varchar(100) NOT NULL,
  `remarks` varchar(400) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

-- 
-- Dumping data for table `pr_order`
-- 

INSERT INTO `pr_order` VALUES (7, '2013-08-09', '23054', 'Administrator (IT)', 'สายแลน Cat5e 1 กล่องกับหัว RJ 45 1 กล่อง', '1 ชุด', '2,760 บาท', '2,760 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานในโซนห้องพักแขกและ Office', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (6, '2013-08-07', '23053', 'Administrator (IT)', 'ปลั็กไฟ 6 เมตร 6ตัวกับ cable tide 1 ถุง', '1 ชุด', '875 บาท', '875 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้เป็นปล็กไฟของ WiFi ภายในโรงแรม', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (4, '2013-08-02', '23051', 'Administrator (IT)', 'Switch HP-1905  24 Port POE', '3 ตัว', '24,140 บาท', '73,230 บาท', 'Advance IT', 'สั่งมาทดแทนตัวเก่าที่ชำรุด 3 ตัว\r\nจากเหตุฟ้าผ่าวันที่ 22/06/2556', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (5, '2013-08-02', '23052', 'Administrator (IT)', 'Computer Lenovo Edge 72', ' 2 เครื่อง', '17,900 บาท', '35,800 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้ตัวเก่าที่ชำรุดจากเหตุฟ้าผ่าวันที่ 22/06/2556', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (8, '2013-08-13', '23056', 'Administrator (IT)', 'Computer Server Lenovo Edge72 SFF 2497A36 ', '1 เครื่อง', '18,500 บาท', '18,500 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้แทน Server IBSG ตัวเก่าที่ชำรุดจากฟ้าผ่าวันที่ 22/06/2556', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (9, '2013-08-13', '23057', 'Administrator (IT)', 'Mini Gbic sfp module', '2 ตัว', '12,000 บาท', '24,000 บาท', 'Advance IT', 'ใช้แทนตัวเก่าที่เสียจากเหตุฟ้าผ่าวันที่ 22/06/2556', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (10, '2013-09-02', '23059', 'Administrator (IT)', 'Computer PC Lenovo Edge72', '4 ชุด', '17,900 บาท', '71,600 บาท', 'ร้าน เซาเทริน์ไอที', 'ซื้อมาทดแทนเครื่องที่ถูกฟ้าผ่า 4 เครื่อง Sale , HK , Laundry , Eng', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (11, '2014-08-31', '23060', 'Administrator (IT)', 'Project CCTV 32 จุด', '1 ชุด', '161,142 บาท', '161,142 บาท', 'Advance IT', 'เปลียนทดแทนตัวที่เสียจากเหตุฟ้าผ่าวันที่ 22/06/2556', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (12, '2014-09-02', '23059', 'Administrator (IT)', 'Print Server D-Link', '1 ตัว', '1,950 บาท', '1,950 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้แทนตัวเก่าที่ชำรุด Office แม่บ้าน', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (13, '2013-09-02', '23059', 'Administrator (IT)', 'KVM Switch ATEN', '1 ตัว', '4,590 บาท', '4,590 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้แทนตัวตัวเก่าที่ชำรุดห้อง Server', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (14, '2014-09-02', '23061', 'Administrator (IT)', 'Hub D-Link  8 Port', '3 ตัว', '630 บาท', '1,890 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานตาม Office พนักงาน', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (15, '2013-09-02', '23061', 'Administrator (IT)', 'Hub D-Link  5 Port ', '4 ตัว', '500 บาท', '2,000 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานตาม Office พนักงาน', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (16, '2014-09-11', '23062', 'Administrator (IT)', 'หมุดหัวใหญ่ 2 กล่องกับ แฟ้มหวง 2 ตัว', '1 ชุด', '436 บาท', '436 บาท', 'Lotus', 'ใช้งานทำป้าย Miss Hotel', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (17, '2013-09-18', '23063', 'Administrator (IT)', 'ปั้มกุญแจห้องบัญชี', '5 ดอก', '40 บาท', '200 บาท', 'ร้านปั้มกุญแจบ่อผุด', 'ห้องบัญชี', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (18, '2013-09-30', '23064', 'Administrator (IT)', 'ผ้าหมึกเครื่องปริ้น HP LeserJet P1102 ', '2 ชุด', '2,424 บาท', '4,849 บาท', 'ร้าน Assign Sytem', 'เครื่องปริ้นเตอร์ Cashier', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (19, '2013-10-07', '23065', 'Administrator (IT)', 'Computer PC Lenovo Edge72', '1 ชุด', '17,900 บาท', '17,900 บาท', 'ร้าน เซาเทริน์ไอที', 'เปลียนใหม่ให้ Cashier ทดแทนตัวก่าที่ชำรุด', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (20, '2013-10-11', '23067', 'Administrator (IT)', 'แบตเตอรี่สำรองไฟ UPS ', '5 ลูก', '249 บาท', '1,245 บาท', 'ร้าน เซาเทริน์ไอที', 'เปลียนแทนเครื่อง UPS ที่แบตเตอรี่เสื่อม', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (21, '2013-11-07', '23068', 'Administrator (IT)', 'Hard disk WD Notebook  1 TB  ', '1 ตัว', '3,250 บาท', '3,250 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้กับ Notebook IT Manager เครื่อเก่า', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (22, '2013-11-12', '23069', 'Administrator (IT)', 'Parallel Card for TMU220', '1 ตัว', '1,490 บาท', '1,490 บาท', 'ร้าน เซาเทริน์ไอที', 'ใช้กับเครื่องปริ้นเตอร์ TMU220', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (23, '2013-12-25', '23070', 'Administrator (IT)', 'ชุดหัวแร้งบัดกรี 1 ชุด', '1 ชุด', '1,445 บาท', '1,445 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานภายในแผนก IT', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (24, '2014-02-06', '23071', 'Administrator (IT)', 'Add POS Outlet Spa License', '1 ชุด', '5,350 บาท', '5,350 บาท', 'HIS PMS', 'เพิ่ม Outlet Spa 1 จุด', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (25, '2014-04-25', '23072', 'Administrator (IT)', 'แบตเตอรี่สำรองไฟ ', '5 ลูก', '249 บาท', '1,245 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้กับเปลียนเตอรี่ที่เสื่อมสภาพเครื่อง UPS', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (26, '2014-04-08', '23073', 'Administrator (IT)', 'Project CCTV 8 จุด', '1 ชุด', '141,668 บาท', '141,668 บาท', 'Advance IT', 'ติดตั้งกล้องวงจรปิดเพิ่มอีก 8 จุดภายในโรงแรม', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (27, '2014-10-02', '23074', 'Administrator (IT)', 'ป้ายไวนิว 22.5 x 50.5 หน้าโรงแรม', '1 แผ่น', '1,700 บาท', '1,700 บาท', 'ร้าน นาโนฮาร์ทเกาะสมุย ', 'ป้ายหน้าโรงแรม', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (28, '2014-05-04', '23075', 'Administrator (IT)', 'Apple mini display port to VGA adapter ', '1 ตัว', '1,090 บาท', '1,090 บาท', 'ฺBanana IT', 'Meeting function on 04/05/2014', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (29, '2014-06-12', '23077', 'Administrator (IT)', 'แผ่น DVD 1 หลอด', '1 หลอด', '1,400 บาท', '1,400 บาท', 'ร้าน สมุยอักษร', 'ใช้งานภายในแผนก IT', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (30, '2014-06-20', '23078', 'Administrator (IT)', 'บล็อกพลาสติกกันน้ำขนาด 6x6 นิ้ว', '1 กล่อง', '80 บาท', '80 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้ติดตั้ง Access Point หน้าห้องบัญชี', 'ยังไม่ได้รับของ');
INSERT INTO `pr_order` VALUES (31, '2014-07-11', '23080', 'Administrator (IT)', 'DVR Recorder Hi-View H.264', '2 ตัว', '46,000 บาท', '46,000 บาท', 'Advance IT', 'ซื้อมาทดแทนตัวเก่าที่ชำรุด 2 ตัว Server Room and EAM Office', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (32, '2014-07-11', '23081', 'Administrator (IT)', 'Lan interface module CBSAP ', '1 ตัว', '28,000 บาท', '28,000 บาท', 'TGS Enterprise Network ', 'ใช้แทน Module ตัวเก่าที่เสียจากฟ้าผ่าของตู้โทรศัพท์ ', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (33, '2014-07-11', '23082', 'Administrator (IT)', 'Switch Cisco SG-200 26 Port', '1 ตัว', '17,500 บาท', '17,500 บาท', 'Advance IT', 'ใช้แทน Core switch ตัวเก่าที่ชำรุดจากฟ้าผ่า Server Room', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (34, '2014-08-11', '23083', 'Administrator (IT)', 'สาย RCA 15 เมตร ', '1 เส้น', '235 บาท', '235 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้ในงานวันแม่แห่งชาติ', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (35, '2014-08-20', '23084', 'Administrator (IT)', 'ต่อ MA Winpac Server', '1 ชุด', '30,000 บาท', '30,000 บาท', 'Juru Data', 'ต่อ MA การบำรุ่งรักษาโปรแกรมรายปี', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (36, '2014-09-01', '23085', 'Administrator (IT)', 'Power adapter CCTV', '3 ตัว', '1,196 บาท', '3,590 บาท', 'Advance IT', 'ซื้อมาทดแทนตัวเก่าที่ชำรุดจากฟ้าผ่า', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (37, '2014-09-01', '23086', 'Administrator (IT)', 'Access Point Pico Station M2', '3 ตัว', '3,863 บาท', '11,590 บาท', 'Advance IT', 'ติดขยายพื้นที่สัญาณในโซนห้องพักแขก', 'ยังไม่ได้รับของ');
INSERT INTO `pr_order` VALUES (38, '2014-09-02', '23087', 'Administrator (IT)', 'กระดาษ A4 สีขาว 180 แกรม', '2 ชุด', '50 บาท', '100 บาท', 'ร้าน สมุยอักษร', 'ใช้ปริ้นงานใบราคาของ Gift Shop', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (39, '2014-09-12', '23088', 'Administrator (IT)', 'Air Blower Makita', '1 ตัว', '2,048 บาท', '2,048 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้ทำความสะอาดเป่าฝุ่น Computer  PC', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (40, '2014-09-12', '23089', 'Administrator (IT)', 'ริบบอนสี 1 กล่อง + ชุดทำความสะอาดเครื่องปริ้น 3 ชุด', '1 ชุด', '2,210 บาท', '2,210 บาท', 'ร้าน EOS ', 'ใช้ปริ้นบัตรประจำตัวพนักงาน', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (41, '2014-09-12', '23090', 'Administrator (IT)', 'แบตเตอรี่สำหรับ UPS ', '5 ลูก', '565 บาท', '2,825 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้เปลียนแบตเตอรี่ที่เสื่อมสภาพ เครื่อง UPS', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (42, '2014-11-08', '23091', 'Administrator (IT)', 'Switch D-Link 24 Port DES-1024D', '1 ตัว', '1,806 บาท', '1,806 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานที่ Office บัญชีแทนตัวเก่าที่ชำรุด', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (43, '2014-11-21', '23094', 'Administrator (IT)', 'ค่าเช่า Host www.peaceresort.com', '1 ชุด', '8,077.64 บาท', '8,077.64 บาท', '็Host Pacific.net', 'ค่าเช่าพื้นที่สำหรับ Website รายปี', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (44, '2014-11-21', '23095', 'Administrator (IT)', 'แผ่น CD เปล่า 50 แผ่น+แผ่น DVD เปล่า 50 แผ่น  ', '2 หลอด', '445 บาท', '911 บาท', 'ร้าน สมุยอักษร', 'ใช้งานภายในแผนก IT', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (45, '2014-12-02', '23096', 'Administrator (IT)', 'เครื่องเล่น DVD Soken BP-16', '1 เครื่อง', '4,800 บาท', '4,800 บาท', 'ฺBig C', 'ใช้เปิดช่อง 1 ของโรงแรม', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (46, '2014-12-08', '23097', 'Administrator (IT)', 'สายแลน Cat 5e  ', '1 กล่อง', '2,743 บาท', '2,743 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'เดินสายแลน Office คนสวน', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (47, '2014-12-25', '23098', 'Administrator (IT)', 'สีสเรย์กระป๋อง ( สีฟ้า )', '4 กระป๋อง', '75 บาท', '300 บาท', 'ร้าน เคหะพันธ์', 'ใช้ทำ Back Drop งานปีใหม่', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (48, '2014-12-27', '23099', 'Administrator (IT)', 'สีสเปรย์กระป๋องสีขาว', '10 กระป๋อง', '75 บาท', '750 บาท', 'ร้าน สมุยเคหะภัณฑ์', 'ใช้ทำ Back Drop งานปีใหม่', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (49, '2014-12-27', '23099', 'Administrator (IT)', 'ดอกส่วาน 2 หุน 1 ตัว น็อต 2 หุน 2 1/2 1 ตัว', '2 ตัว', '57 บาท', '115 บาท', 'ร้าน สมุยเคหะภัณฑ์', 'ใช้ทำ Back Drop งานปีใหม่', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (50, '2015-01-14', '21840', 'Administrator (IT)', 'Pico Station M2 HP', '10 ตัว', '3,500 บาท', '35,000 บาท', 'ร้าน Assign System', 'ติดตั้งเพิ่มในโซนห้องพักแขก', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (52, '2015-01-14', '21841', 'Administrator (IT)', 'Hard disk WD Red 2 TB', '3 ลูก', '3,439 บาท', '10,317 บาท', 'ร้าน Southern IT', 'ใช้ทำ Backup Server and File sharing', 'ยังไม่ได้รับของ');
INSERT INTO `pr_order` VALUES (53, '2015-01-14', '21842', 'Administrator (IT)', 'กระดาษ A4 180 แกรม', '50 แผ่น', '75 บาท', '75 บาท', 'ร้าน สมุยอักษร', 'ใช้สำหรับงานออกแบบโปส์เตอร์', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (54, '2015-01-14', '21843', 'Administrator (IT)', 'หัว RJ45 ', '10 ถุง', '50 บาท', '500 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'ใช้งานภายในแผนก IT', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (55, '2015-01-19', '21846', 'Administrator (IT)', 'VGA Card Gigabyte', '1 ตัว', '1,350 บาท', '1,350 บาท', 'ร้าน สุพจน์การไฟฟ้า', 'เปลียนแทน VGA on Board ตัวเก่าที่เสีย', 'ได้รับของแล้ว');
INSERT INTO `pr_order` VALUES (56, '2015-01-29', '21847', 'Administrator (IT)', 'Lenovo Ideapad G5080', '1 เครื่อง', '18,900 บาท', '18,900 บาท', 'ร้าน Southern IT', 'ซื้อทดแทน Notebook HP G42 ตัวเก่าที่ชำรุด\r\n ', 'ได้รับของแล้ว');

-- --------------------------------------------------------

-- 
-- Table structure for table `table_computer`
-- 

CREATE TABLE `table_computer` (
  `id` int(5) NOT NULL auto_increment,
  `device_id` varchar(20) NOT NULL,
  `date_pr` date NOT NULL,
  `username` varchar(150) NOT NULL,
  `position` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `images` varchar(200) default NULL,
  `ip` varchar(20) NOT NULL,
  `cpu` varchar(150) NOT NULL,
  `mainboard` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `vga` varchar(100) NOT NULL,
  `harddisk` varchar(100) NOT NULL,
  `optical_drive` varchar(100) NOT NULL,
  `monitor` varchar(100) NOT NULL,
  `mouse` varchar(100) NOT NULL,
  `keyboard` varchar(100) NOT NULL,
  `network` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `license` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

-- 
-- Dumping data for table `table_computer`
-- 

INSERT INTO `table_computer` VALUES (56, 'PC-AM-001', '2013-04-18', 'K.Mayuree Ongcharoen', 'Hotel Manager', 'Administrator', NULL, '192.168.2.81', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (57, 'PC-RS-001', '2012-04-18', 'K.Duangta Pullsawat', 'Revenue Manager', 'Reservation', NULL, '192.168.2.38', 'Intel Core i5 3570 @ 3.4 GHz', 'Unspecified Unspecified', 'Kingston 4 GB DDR3', 'ATI Radeon HD4500', 'HITACHI 1 TB', 'Packard DVD A GH16ACSHR', 'Samaung SME1920 19"', 'HP', 'HP', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (58, 'PC-RS-002', '2013-04-18', 'K.Soraya Khanom', 'Asst.Reservation Manager', 'Reservation', NULL, '192.168.2.30', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (59, 'PC-RS-003', '2013-04-18', 'k.Phitchayanee Suwannasak  ', 'Reservation Supervisor', 'Reservation', NULL, '192.168.2.36', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (60, 'PC-RS-004', '2013-04-18', 'Vacan', 'Reservation Office', 'Reservation', NULL, '192.168.2.34', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (61, 'NB-AM-001', '2013-05-21', 'k.Kanyanat Theppawan  ', 'Assistant Director of Sales', 'Sales', NULL, 'DHCP', 'Intel Core i5 3570 @ 3.4 GHz', 'Intel HM55', 'Kingston 4 GB DDR3', 'ATI Radeon HD4500', 'HITACHI 1 TB', 'Packard DVD A GH16ACSHR', '14″ (1366*768)', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (62, 'PC-SA-001', '2013-04-18', 'K.Kreingsak Dhamrikarn', 'Asst.Sales Manager', 'Sales', NULL, '192.168.2.33', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'HP', 'HP', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (63, 'NB-SA-002', '2013-05-18', 'k.Sawita Dieophanit', 'Executive Sales ', 'Sales', NULL, 'DHCP', 'intel Core i3 3220 @3.3 Ghz', 'Intel HM55', 'Kingston 4 GB DDR3', 'ATI Radeon HD4500', 'HITACHI 1 TB', 'Packard DVD A GH16ACSHR', 'Lenovo G4 14"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (64, 'PC-FO-001', '2008-07-16', 'k.Nanthiyar Noithubthim ', 'Front Office Manager', 'Front Office', NULL, '192.168.2.10', 'Intel Core 2 Duo E7500 @ 2.9 GHz', 'Asus P8H61-M LX', 'Kingston 2 GB DDR3', 'On Board', 'Seagate 160 GB', 'ASUS CB-5216A', 'Packard HP W2072B 20"', 'Logitech', 'Logitech', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (65, 'PC-FO-002', '2009-05-23', 'k.Boobrat Manjan', 'Asst.Front Office Manager', 'Front Office', NULL, '192.168.2.12', 'AMD Athlon II x2 250 @ 3.0 GHz', 'Asus M5A78L-M LE', 'Kingston 2 GB DDR3', 'On Board', 'Seagate 250 GB', 'ASUS CB-5216A', 'Samsung Syn 17"', 'Logitech', 'Logitech', 'On Board', 'Windows 7', 'Yes');
INSERT INTO `table_computer` VALUES (71, 'PC-AC-003', '2013-04-18', 'k.Natchalida Yadewa', 'Income Supervisor', 'Accounting', NULL, '192.168.2.84', 'intel Core i3 3220 @3.3 Ghz', 'Lenovo Unspecified', 'Kingston 4 GB DDR3', 'On Board', 'Seagate 1 TB', 'HL-DT-ST DVD GH82N', 'Lenovo LEN D186wa 19"', 'Lenovo', 'Lenovo', 'On Board', 'Windows 7', 'ํYes');
INSERT INTO `table_computer` VALUES (72, 'PC-AC-005', '2009-05-12', 'k.Manita  Wichaidit', 'AR Supervisor', 'Accounting', NULL, '192.168.2.85', 'Intel Celeron @ 2.7 GHz', 'FOXCONN 2A8C', 'Kingston 2 GB DDR3', 'On Board', 'Seagate 500 GB', 'ASUS CB-5216A', 'Compaqq S2021 20"', 'Logitech', 'Logitech', 'On Board', 'Windows 7', 'ํYes');

-- --------------------------------------------------------

-- 
-- Table structure for table `table_printer`
-- 

CREATE TABLE `table_printer` (
  `id` int(5) NOT NULL auto_increment,
  `device_id` varchar(50) NOT NULL,
  `date_pr` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `position` varchar(150) character set ucs2 NOT NULL,
  `brand` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `images` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `table_printer`
-- 

INSERT INTO `table_printer` VALUES (3, 'PT-AC-001', '2013-01-23', 'K.Tippawan Sarachart', 'Accounting Manager', 'Epson', 'Epson L210', 'Accouting', 'Working', '');
INSERT INTO `table_printer` VALUES (2, 'PT-AM-001', '2014-04-30', 'K.Mayuree Ongcharoen', 'Hotel Manager', 'Epson', 'Epson L210', 'Administrator', 'Working', 'epson-l210.jpeg');
INSERT INTO `table_printer` VALUES (4, 'PT-MK-001', '2013-05-14', 'k.Azizskandar Awang ', 'Group Executive Chef', 'Epson', 'Epson L210', 'Main Kitchen', 'Working', 'epson-l210-400x400.jpeg');
INSERT INTO `table_printer` VALUES (5, 'PT-HR-001', '2013-06-04', 'K. Supattra Hiranrat ', 'HR Supervisor', 'Epson', 'Epson L210', 'HR', 'Working', '');
INSERT INTO `table_printer` VALUES (6, 'PT-HR-002', '2012-03-05', 'K.Chareeya Yadewa', 'Asst.Human Resource', 'HP', 'HP Leserjet p1006', 'HR', 'Working', 'HP-LaserJet P1106.jpg');
INSERT INTO `table_printer` VALUES (7, 'PT-FO-001', '2013-11-18', 'Front Office ', 'GSA Team', 'Brother', 'Brother MFC 7380', 'Front Office', 'Working', '');
INSERT INTO `table_printer` VALUES (8, 'PT-RS-001', '2013-02-18', 'K.Kreingsak Dhamrikarn', 'Asst.Sales Manager', 'HP', 'HP LASERJET P1101', 'Seles', 'Working', '');
INSERT INTO `table_printer` VALUES (9, 'PT-RS-002', '2013-05-20', 'K.Kreingsak Dhamrikarn', 'Asst.Sales Manager', 'Brother', 'Brother MFC 7380', 'Seles', 'Working', '');
INSERT INTO `table_printer` VALUES (10, 'PT-EN-001', '2013-04-30', 'K. Krulawan Pangpromma', 'Secretary to Engineering', 'Epson', 'Epson L210', 'Engineering', 'Working', 'epson-l210-400x400.jpeg');
INSERT INTO `table_printer` VALUES (11, 'PT-PC-001', '2013-01-21', 'K.Nantathep Songsaeng', 'Purchase Supervisor', 'Epson', 'Epson L210', 'Purchasing', 'Working', 'epson-l210-400x400.jpeg');
INSERT INTO `table_printer` VALUES (12, 'PT-SA-001', '2012-10-15', 'K.Kreingsak Dhamrikarn', 'Asst.Sales Manager', 'Canon', 'Canon PIXMA', 'Seles', 'Working', 'Canon-PIXMA-MG3250-600-.jpg');
INSERT INTO `table_printer` VALUES (13, 'SC-RS-001', '2012-02-12', 'K.Soraya Khanom', 'Asst.Reservation Manager', 'HP', 'HP LASERJET P2015', 'Reservation', 'Working', 'hp-scanjet-g2410.jpg');
INSERT INTO `table_printer` VALUES (14, 'PT-AC-002 ', '2012-09-11', 'IT Office', 'IT Department', 'HP', 'HP Leserjet p1006', 'Accouting', 'Retest', 'HP-LaserJet P1106.jpg');
INSERT INTO `table_printer` VALUES (15, 'PT-AC-003', '2008-12-19', 'k.Paisri nganlasom', 'AP Supervisor', 'HP', 'HP Leserjet M1319', 'Accouting', 'Working', 'cq5dam.thumbnail.280.280.png');
INSERT INTO `table_printer` VALUES (16, 'PT-AC-004', '2008-07-15', 'Seawrap Cashier ', 'Cashier', 'HP', 'HP Leserjet p1006', 'Accouting', 'Working', 'HP-LaserJet P1106.jpg');
INSERT INTO `table_printer` VALUES (17, 'PT-AC-005', '2013-03-22', 'Seawrap Cashier (TM U220)', 'Cashier', 'Epson', 'Epson TM U220', 'Accouting', 'Working', 'tmu220_rf.jpg');
INSERT INTO `table_printer` VALUES (18, 'PT-AC-006', '2010-07-30', 'Bar Printer', 'Pool Bar', 'Epson', 'Epson TM U220', 'F & B', 'Working', 'tmu220_rf.jpg');
INSERT INTO `table_printer` VALUES (19, 'PT-AC-007', '2010-03-17', 'Kitchen Printer', 'Main Kitchen', 'Epson', 'Epson TM U220', 'Main Kitchen', 'Working', 'tmu220_rf.jpg');
INSERT INTO `table_printer` VALUES (20, 'PT-AC-008', '2013-03-23', 'HK Printer', 'Housekeeping Office', 'Epson', 'Epson TM U220', 'HK', 'Working', 'tmu220_rf.jpg');
INSERT INTO `table_printer` VALUES (21, 'PT-HK-001', '2012-07-31', 'Canon HK Printer', 'Housekeeping Office', 'Canon', 'Canon PIXMA', 'HK', 'Working', 'Canon-PIXMA-MG3250-600-.jpg');
INSERT INTO `table_printer` VALUES (22, 'PT-FO-002', '2011-04-14', 'For Guest Hotel', 'Internet Room', 'HP', 'HP LASERJET P2015', 'Front Office', 'Working', 'hp-p1102.jpg');
INSERT INTO `table_printer` VALUES (23, 'PT-FB-001', '2013-03-10', 'k.Metika Seeon', 'Secretary to FB', 'Brother', 'Brother MFC 7380', 'F & B', 'Working', 'cq5dam.thumbnail.280.280.png');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(5) NOT NULL auto_increment,
  `date_re` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, '2014-09-19', 'IT Manager', 'admin', 'admin12');
INSERT INTO `user` VALUES (2, '2014-09-21', 'IT Supervisor', 'admin', 'admin12');
