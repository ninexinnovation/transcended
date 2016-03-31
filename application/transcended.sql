-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2016 at 03:52 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `bill_details` (
  `bill_no.` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `current_date` int(11) NOT NULL,
  `reffer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `measutement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_details`
--

CREATE TABLE `bill_item_details` (
  `bill_item_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `item_code_no` int(11) NOT NULL,
  `item_catagory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagory_details`
--

CREATE TABLE `catagory_details` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(50) NOT NULL,
  `stiching_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory_details`
--

INSERT INTO `catagory_details` (`catagory_id`, `catagory_name`, `stiching_charge`) VALUES
(1, 'Pant', 500),
(2, 'Shirt', 400),
(3, 'ddddd', 3333),
(4, 'kurtha', 550);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `measurement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `phone_no`, `address`, `measurement_id`) VALUES
(1, 'kasdflkfjf', 123123123, 'lsjlsdjf', 0),
(2, 'Sushil', 2147483647, 'Koteshowr', 0),
(3, 'Rumzzu', 1234564789, 'Ghaighat', 0),
(4, 'punteee', 123456789, 'sinamangal', 0),
(5, 'zogbi', 123456789, 'Brazil', 0),
(6, 'hemanta', 2147483647, 'kalopool', 0),
(7, 'Suraj shrestha', 2147483647, 'ktm', 0),
(8, 'sushant ', 2147483647, 'sadobato', 0),
(9, 'kaleee', 98745621, 'bodee', 0),
(11, 'sushant gauchan ', 2147483647, 'baneshowr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_catagory`
--

CREATE TABLE `item_catagory` (
  `item_code_no` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_deduction`
--

CREATE TABLE `item_deduction` (
  `deduction_id` int(11) NOT NULL,
  `code_no` int(11) NOT NULL,
  `deducted_quantity` int(11) NOT NULL,
  `deducted_date` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `item_code_no` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `current_quantity` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `measurement_id` int(11) NOT NULL,
  `measurement_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `measurement_details`
--

CREATE TABLE `measurement_details` (
  `measurement_detail_id` int(11) NOT NULL,
  `length` double NOT NULL,
  `chest` double NOT NULL,
  `waist` double NOT NULL,
  `shoulder` double NOT NULL,
  `sleeve` double NOT NULL,
  `hip` double NOT NULL,
  `hback` double NOT NULL,
  `neck` double NOT NULL,
  `kf` double NOT NULL,
  `thai` double NOT NULL,
  `knee` double NOT NULL,
  `bottom` double NOT NULL,
  `sheet` double NOT NULL,
  `inseam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

CREATE TABLE `production_details` (
  `production_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_item_details`
--

CREATE TABLE `production_item_details` (
  `production_id` int(11) NOT NULL,
  `bill_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_date` int(11) NOT NULL,
  `is_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reffer_details`
--

CREATE TABLE `reffer_details` (
  `reffer_id` int(11) NOT NULL,
  `reffer_by` int(11) NOT NULL,
  `reffer_to` int(11) NOT NULL,
  `royalty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `last_logged_in` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `user_name`, `password`, `user_type_id`, `last_logged_in`) VALUES
(2, 'Suraj', 'shrestha', 'admin12345', '7488e331b8b64e5794da3fa4eb10ad5d', 0, 0),
(4, 'Sanam', 'Shrestha', 'sanam123', 'sanam123', 0, 0),
(5, 'sushil', 'Shrestha', 'Kalee12345', 'kalee12345', 0, 0),
(6, 'rumesh', 'rumesh', 'rumesh38', 'ca82c47dc9b5e1c0786522e7ffc0327d', 0, 0),
(8, 'asdasdasd', 'asdasdasd', 'asdasdasd', '6a1b63b7445a2c816b0a9ac810dbb165', 0, 0),
(9, 'asdasdqq', 'qwe', 'qwerty', '868da3bfa27e104c57e1cf4533271ed4', 0, 0),
(10, 'asdasdasdas', 'asdasdasdasd', 'asdasdasdasdasd', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 0),
(11, 'punte', 'punte', 'ppuunntee', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 0),
(12, 'testing', 'test', 'test123', '6c8e7923f116a85dd3ed7fafd7353b5a', 0, 0),
(13, 'hemant', 'thapa', 'hemant123', 'cac4726bc5ea0407d8cfabdf70fafbb6', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_details`
--

CREATE TABLE `user_type_details` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_details`
--

CREATE TABLE `worker_details` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`bill_no.`);

--
-- Indexes for table `bill_item_details`
--
ALTER TABLE `bill_item_details`
  ADD PRIMARY KEY (`bill_item_id`);

--
-- Indexes for table `catagory_details`
--
ALTER TABLE `catagory_details`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `item_catagory`
--
ALTER TABLE `item_catagory`
  ADD PRIMARY KEY (`item_code_no`,`catagory_id`);

--
-- Indexes for table `item_deduction`
--
ALTER TABLE `item_deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`item_code_no`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`measurement_id`);

--
-- Indexes for table `measurement_details`
--
ALTER TABLE `measurement_details`
  ADD PRIMARY KEY (`measurement_detail_id`);

--
-- Indexes for table `production_details`
--
ALTER TABLE `production_details`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `reffer_details`
--
ALTER TABLE `reffer_details`
  ADD PRIMARY KEY (`reffer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type_details`
--
ALTER TABLE `user_type_details`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `worker_details`
--
ALTER TABLE `worker_details`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `bill_no.` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bill_item_details`
--
ALTER TABLE `bill_item_details`
  MODIFY `bill_item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catagory_details`
--
ALTER TABLE `catagory_details`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_deduction`
--
ALTER TABLE `item_deduction`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `item_code_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `measurement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `measurement_details`
--
ALTER TABLE `measurement_details`
  MODIFY `measurement_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_details`
--
ALTER TABLE `production_details`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reffer_details`
--
ALTER TABLE `reffer_details`
  MODIFY `reffer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_type_details`
--
ALTER TABLE `user_type_details`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worker_details`
--
ALTER TABLE `worker_details`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
