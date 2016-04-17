-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 03:58 AM
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
  `bill_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `current_date` int(11) NOT NULL,
  `reffer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `measurement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`bill_no`, `customer_id`, `delivery_date`, `current_date`, `reffer_id`, `user_id`, `discount`, `advance`, `measurement_id`) VALUES
(4, 1, 5, 1459900800, 0, 1, 200, 1000, 0),
(5, 2, 4, 1459900800, 0, 1, 200, 1200, 0),
(6, 1, 5, 1459900800, 0, 1, 500, 1000, 0),
(7, 1, 4, 1460239200, 3, 1, 0, 0, 0),
(8, 7, 4, 1460239200, 6, 1, 0, 0, 0),
(9, 4, 4, 1460239200, 7, 1, 450, 4563, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_details`
--

CREATE TABLE `bill_item_details` (
  `bill_item_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `item_code_no` int(11) NOT NULL,
  `item_catagory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_item_details`
--

INSERT INTO `bill_item_details` (`bill_item_id`, `bill_no`, `item_code_no`, `item_catagory_id`, `quantity`, `length`) VALUES
(2, 4, 1, 1, 1, 12),
(3, 5, 1, 2, 1, 22),
(4, 6, 1, 1, 1, 10),
(5, 7, 1, 1, 1, 1),
(6, 8, 1, 1, 1, 5),
(7, 9, 2, 1, 1, 2),
(8, 9, 2, 2, 1, 2),
(9, 9, 3, 4, 1, 3);

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
(2, 'Shirt', 500),
(3, 'sd', 1),
(4, 'a', 1),
(5, 'asdfdsf', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `measurement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `phone_no`, `address`, `measurement_id`) VALUES
(1, 'rumesh', '9860054156', 'sinamangal', 0),
(2, 'suraj', '232323223', 'aslkdfjsdfj', 0),
(3, 'simran', '1212121212', 'asdfsafsd', 0),
(4, 'mohan prashad shrestha', '9841287706', 'kasdfksjdf', 0),
(6, 'ASDFSF', '2147483647', 'asfsadf', 0),
(7, 'rumesh udash', '1231231231', 'sinamangal', 0);

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
  `item_code_no` int(11) NOT NULL,
  `deducted_quantity` int(11) NOT NULL,
  `deducted_date` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_deduction`
--

INSERT INTO `item_deduction` (`deduction_id`, `item_code_no`, `deducted_quantity`, `deducted_date`, `bill_no`) VALUES
(1, 1, 10, 1459973278, 6),
(2, 1, 1, 1460307408, 7),
(3, 1, 5, 1460307484, 8),
(4, 2, 2, 1460307846, 9),
(5, 2, 2, 1460307846, 9),
(6, 3, 3, 1460307846, 9);

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

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`item_code_no`, `company_id`, `catagory_id`, `current_quantity`, `added_date`, `selling_price`) VALUES
(1, 1, 1, 4, 1459900800, 200),
(2, 1, 2, 9, 1460239200, 450),
(3, 3, 1, 13, 1460239200, 1450);

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `measurement_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
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
  `completed` tinyint(1) NOT NULL
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
(1, 'rumesh', 'udash', 'rumesh38', 'ca82c47dc9b5e1c0786522e7ffc0327d', 1, 12312313),
(2, 'Suraj', 'Shrestha', 'suraj12345', '32ba914c38a0551f5041ef8a8b6da75e', 0, 0);

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
  ADD PRIMARY KEY (`bill_no`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bill_item_details`
--
ALTER TABLE `bill_item_details`
  MODIFY `bill_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `catagory_details`
--
ALTER TABLE `catagory_details`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_deduction`
--
ALTER TABLE `item_deduction`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `item_code_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_type_details`
--
ALTER TABLE `user_type_details`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
