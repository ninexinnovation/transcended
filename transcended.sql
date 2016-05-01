-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 06:10 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transcended`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

DROP TABLE IF EXISTS `bill_details`;
CREATE TABLE IF NOT EXISTS `bill_details` (
  `bill_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `current_date` int(11) NOT NULL,
  `reffer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  PRIMARY KEY (`bill_no`),
  KEY `customer_id` (`customer_id`),
  KEY `reffer_id` (`reffer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`bill_no`, `customer_id`, `delivery_date`, `current_date`, `reffer_id`, `user_id`, `discount`, `advance`) VALUES
(1, 1, 1461801600, 1460851200, 0, 1, 0, 0),
(2, 3, 1461369600, 1461283200, 7, 2, 0, 0),
(3, 1, 1462492800, 1461369600, 0, 2, 0, 0),
(4, 1, 1464220800, 1451606400, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_details`
--

DROP TABLE IF EXISTS `bill_item_details`;
CREATE TABLE IF NOT EXISTS `bill_item_details` (
  `bill_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `item_code_no` int(11) NOT NULL,
  `item_catagory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  PRIMARY KEY (`bill_item_id`),
  KEY `bill_no` (`bill_no`),
  KEY `item_code_no` (`item_code_no`),
  KEY `item_catagory_id` (`item_catagory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_item_details`
--

INSERT INTO `bill_item_details` (`bill_item_id`, `bill_no`, `item_code_no`, `item_catagory_id`, `quantity`, `length`) VALUES
(1, 1, 1, 1, 1, 10),
(2, 2, 1, 1, 1, 12),
(3, 3, 1, 1, 1, 1),
(4, 3, 1, 2, 1, 2),
(5, 3, 2, 3, 1, 21),
(6, 4, 2, 1, 1, 1),
(7, 4, 2, 2, 11, 2),
(8, 4, 3, 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catagory_details`
--

DROP TABLE IF EXISTS `catagory_details`;
CREATE TABLE IF NOT EXISTS `catagory_details` (
  `catagory_id` int(11) NOT NULL AUTO_INCREMENT,
  `catagory_name` varchar(50) NOT NULL,
  `stiching_charge` int(11) NOT NULL,
  PRIMARY KEY (`catagory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory_details`
--

INSERT INTO `catagory_details` (`catagory_id`, `catagory_name`, `stiching_charge`) VALUES
(1, 'Pant', 500),
(2, 'Shirt', 500),
(3, 'Coat', 1),
(4, 'a', 1),
(5, 'asdfdsf', 1212),
(6, 'fasdf', 1231),
(7, 'kdfjalksdjflaksjflak alskdfjlasdjf', 21221),
(8, 'rumesh udash', 111);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
CREATE TABLE IF NOT EXISTS `company_details` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `company_name`) VALUES
(1, 'aaaaa'),
(2, 'dfdfd'),
(3, 'Kriplon');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE IF NOT EXISTS `customer_details` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `phone_no`, `address`) VALUES
(1, 'rumesh', '9860054156', 'sinamangal'),
(2, 'suraj', '232323223', 'aslkdfjsdfj'),
(3, 'simran', '1212121212', 'asdfsafsd'),
(4, 'mohan prashad shrestha', '9841287706', 'kasdfksjdf'),
(6, 'ASDFSF', '2147483647', 'asfsadf'),
(7, 'rumesh udash', '1231231231', 'sinamangal'),
(8, 'asdfasdf', '123123123', 'asdfasdfasd');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

DROP TABLE IF EXISTS `customer_transaction`;
CREATE TABLE IF NOT EXISTS `customer_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `bill_no` (`bill_no`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_catagory`
--

DROP TABLE IF EXISTS `item_catagory`;
CREATE TABLE IF NOT EXISTS `item_catagory` (
  `item_code_no` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  PRIMARY KEY (`item_code_no`,`catagory_id`),
  KEY `catagory_id` (`catagory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_deduction`
--

DROP TABLE IF EXISTS `item_deduction`;
CREATE TABLE IF NOT EXISTS `item_deduction` (
  `deduction_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code_no` int(11) NOT NULL,
  `deducted_quantity` int(11) NOT NULL,
  `deducted_date` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_deduction`
--

INSERT INTO `item_deduction` (`deduction_id`, `item_code_no`, `deducted_quantity`, `deducted_date`, `bill_no`) VALUES
(1, 1, 10, 1459973278, 6),
(2, 1, 1, 1460307408, 7),
(3, 1, 5, 1460307484, 8),
(4, 2, 2, 1460307846, 9),
(5, 2, 2, 1460307846, 9),
(6, 3, 3, 1460307846, 9),
(7, 1, 12, 1460866539, 10),
(8, 1, 12, 1460866557, 11),
(9, 1, 12, 1460866582, 12),
(10, 1, 12, 1460866948, 13),
(11, 1, 12, 1460867083, 14),
(12, 1, 10, 1460924901, 1),
(13, 1, 12, 1461304395, 2),
(14, 1, 1, 1461427822, 3),
(15, 1, 2, 1461427823, 3),
(16, 2, 21, 1461427823, 3),
(17, 2, 1, 1461428003, 4),
(18, 2, 22, 1461428004, 4),
(19, 3, 5, 1461428004, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
CREATE TABLE IF NOT EXISTS `item_details` (
  `item_code_no` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `current_quantity` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  PRIMARY KEY (`item_code_no`),
  KEY `company_id` (`company_id`),
  KEY `catagory_id` (`catagory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`item_code_no`, `company_id`, `catagory_id`, `current_quantity`, `added_date`, `selling_price`) VALUES
(1, 1, 1, 13, 1459900800, 200),
(2, 1, 2, 6, 1460239200, 450),
(3, 3, 1, 45, 1460239200, 1450);

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

DROP TABLE IF EXISTS `measurement`;
CREATE TABLE IF NOT EXISTS `measurement` (
  `measurement_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `measurement_type_id` int(11) NOT NULL,
  `measurement_detail_id` int(11) NOT NULL,
  PRIMARY KEY (`measurement_id`),
  KEY `bill_no` (`bill_no`),
  KEY `measurement_type_id` (`measurement_type_id`),
  KEY `measurement_detail_id` (`measurement_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`measurement_id`, `bill_no`, `measurement_type_id`, `measurement_detail_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 3),
(4, 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `measurement_details`
--

DROP TABLE IF EXISTS `measurement_details`;
CREATE TABLE IF NOT EXISTS `measurement_details` (
  `measurement_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `length` double NOT NULL,
  `chest` double NOT NULL,
  `waist` double NOT NULL,
  `shoulder` double DEFAULT NULL,
  `sleeve` double DEFAULT NULL,
  `hip` double NOT NULL,
  `hback` double DEFAULT NULL,
  `neck` double DEFAULT NULL,
  `kf` double DEFAULT NULL,
  `thai` double DEFAULT NULL,
  `knee` double DEFAULT NULL,
  `bottom` double DEFAULT NULL,
  `sheet` double DEFAULT NULL,
  `inseam` double DEFAULT NULL,
  `so` double DEFAULT NULL,
  PRIMARY KEY (`measurement_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_details`
--

INSERT INTO `measurement_details` (`measurement_detail_id`, `length`, `chest`, `waist`, `shoulder`, `sleeve`, `hip`, `hback`, `neck`, `kf`, `thai`, `knee`, `bottom`, `sheet`, `inseam`, `so`) VALUES
(1, 12, 22, 12, 34, 131, 12, 12, 12, 12, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 21, 12, 12, 12, 12, 12, 12, 12, 12, NULL, NULL, NULL, NULL, NULL, 12),
(3, 12, 12, 12, 12, 12, 12, 12, 12, 12, NULL, NULL, NULL, NULL, NULL, 12),
(4, 12, 12, 12, 12, 12, 12, 12, 12, 12, NULL, NULL, NULL, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `measurement_type`
--

DROP TABLE IF EXISTS `measurement_type`;
CREATE TABLE IF NOT EXISTS `measurement_type` (
  `measurement_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `measurement_type` varchar(10) NOT NULL,
  PRIMARY KEY (`measurement_type_id`),
  KEY `measurement_type_id` (`measurement_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_type`
--

INSERT INTO `measurement_type` (`measurement_type_id`, `measurement_type`) VALUES
(1, 'Upper'),
(2, 'Lower');

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

DROP TABLE IF EXISTS `production_details`;
CREATE TABLE IF NOT EXISTS `production_details` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`production_id`),
  KEY `bill_no` (`bill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_item_details`
--

DROP TABLE IF EXISTS `production_item_details`;
CREATE TABLE IF NOT EXISTS `production_item_details` (
  `production_id` int(11) NOT NULL,
  `bill_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_date` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  KEY `bill_item_id` (`bill_item_id`,`user_id`),
  KEY `production_id` (`production_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reffer_details`
--

DROP TABLE IF EXISTS `reffer_details`;
CREATE TABLE IF NOT EXISTS `reffer_details` (
  `reffer_id` int(11) NOT NULL AUTO_INCREMENT,
  `reffer_by` int(11) NOT NULL,
  `reffer_to` int(11) NOT NULL,
  `royalty` int(11) NOT NULL,
  PRIMARY KEY (`reffer_id`),
  KEY `reffer_by` (`reffer_by`,`reffer_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `last_logged_in` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `user_name`, `password`, `user_type_id`, `last_logged_in`) VALUES
(1, 'rumesh', 'udash', 'rumesh38', 'ca82c47dc9b5e1c0786522e7ffc0327d', 1, 12312313),
(2, 'Suraj', 'Shrestha', 'suraj12345', '32ba914c38a0551f5041ef8a8b6da75e', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_details`
--

DROP TABLE IF EXISTS `user_type_details`;
CREATE TABLE IF NOT EXISTS `user_type_details` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type_details`
--

INSERT INTO `user_type_details` (`user_type_id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `worker_details`
--

DROP TABLE IF EXISTS `worker_details`;
CREATE TABLE IF NOT EXISTS `worker_details` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_details`
--

INSERT INTO `worker_details` (`worker_id`, `worker_name`) VALUES
(1, 'sanam'),
(2, 'Rumesh'),
(3, 'punte');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_item_details`
--
ALTER TABLE `bill_item_details`
  ADD CONSTRAINT `bill_item_details_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill_details` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD CONSTRAINT `customer_transaction_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill_details` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_catagory`
--
ALTER TABLE `item_catagory`
  ADD CONSTRAINT `item_catagory_ibfk_1` FOREIGN KEY (`item_code_no`) REFERENCES `item_details` (`item_code_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_catagory_ibfk_2` FOREIGN KEY (`catagory_id`) REFERENCES `catagory_details` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_details`
--
ALTER TABLE `item_details`
  ADD CONSTRAINT `item_details_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `measurement`
--
ALTER TABLE `measurement`
  ADD CONSTRAINT `measurement_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill_details` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `measurement_ibfk_2` FOREIGN KEY (`measurement_detail_id`) REFERENCES `measurement_details` (`measurement_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production_details`
--
ALTER TABLE `production_details`
  ADD CONSTRAINT `production_details_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill_details` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production_item_details`
--
ALTER TABLE `production_item_details`
  ADD CONSTRAINT `production_item_details_ibfk_1` FOREIGN KEY (`production_id`) REFERENCES `production_details` (`production_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
