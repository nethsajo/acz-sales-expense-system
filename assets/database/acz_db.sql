-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 05:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `employee_id` int(11) NOT NULL,
  `employee_surname` varchar(150) NOT NULL,
  `employee_firstname` varchar(150) NOT NULL,
  `employee_middlename` varchar(150) NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_contact` varchar(50) NOT NULL,
  `employee_address` varchar(255) NOT NULL,
  `employee_birthdate` date NOT NULL,
  `employee_gender` varchar(10) NOT NULL,
  `employee_status` varchar(255) NOT NULL,
  `employee_role_id` int(11) NOT NULL,
  `employee_security_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`employee_id`, `employee_surname`, `employee_firstname`, `employee_middlename`, `employee_number`, `employee_password`, `employee_email`, `employee_contact`, `employee_address`, `employee_birthdate`, `employee_gender`, `employee_status`, `employee_role_id`, `employee_security_code`, `created_at`) VALUES
(1, 'Admin', 'ACZ', '', 'ACZ2020000', '$2y$10$VAUvSG.pzbksmkr.cypKQ.1Pt9te/ReIoPIwvBcYKXy4PMaEvkfTa', 'aczdigitalandprintingservices@gmail.com', '09123456789', 'Binan Laguna', '0000-00-00', '', 'Active', 1, '893518', '2020-12-03 17:22:36'),
(2, 'Babilonia', 'Joshua', '', 'ACZ2020001', '$2y$10$YoUZJg7QlXuonOEsf.5w8Oa/HFy4C4UI5YQ.rxZkL5BUu.A31ONym', 'joshuababilonia03@gmail.com', '09124867234', 'Cavite', '2010-10-10', 'M', 'Active', 2, '306821', '2020-12-10 09:51:04'),
(3, 'Banares', 'Stephen', '', 'ACZ2020002', '$2y$10$iNfNU3hROQWuoHKNi/RPa.UcWQYBgZBYrvm303HjohCjB0yxq7PHu', 'stephenbanares@gmail.com', '09123456789', 'Binan Laguna', '2001-01-01', 'M', 'Active', 2, '173189', '2020-12-08 15:24:39'),
(4, 'Dala', 'Kevin', '', 'ACZ2020003', '$2y$10$alOxfHvznZSO3d996Ozj5u0mkbR14pL7.6/SbwlfI1mBl/69smsEy', 'dalakevin@gmail.com', '09123456789', 'Binan Laguna', '1998-01-23', 'M', 'Active', 2, '855603', '2020-12-10 16:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

CREATE TABLE `tbl_banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`bank_id`, `bank_name`) VALUES
(1, 'BDO'),
(2, 'UnionBank');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_category`
--

CREATE TABLE `tbl_expense_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense_category`
--

INSERT INTO `tbl_expense_category` (`category_id`, `category_name`) VALUES
(1, 'Transportation'),
(2, 'Admin'),
(3, 'Supply');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_details`
--

CREATE TABLE `tbl_expense_details` (
  `expense_id` int(11) NOT NULL,
  `expense_category` varchar(100) NOT NULL,
  `expense_vendor` varchar(100) NOT NULL,
  `expense_si` varchar(100) NOT NULL,
  `expense_or` varchar(100) NOT NULL,
  `expense_tin` varchar(100) NOT NULL,
  `expense_particular` varchar(255) NOT NULL,
  `expense_unit` varchar(100) NOT NULL,
  `expense_payee` varchar(155) NOT NULL,
  `expense_bank` varchar(100) NOT NULL,
  `expense_cvno` int(100) NOT NULL,
  `expense_cn` int(100) NOT NULL,
  `expense_check_date` varchar(100) NOT NULL,
  `expense_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense_details`
--

INSERT INTO `tbl_expense_details` (`expense_id`, `expense_category`, `expense_vendor`, `expense_si`, `expense_or`, `expense_tin`, `expense_particular`, `expense_unit`, `expense_payee`, `expense_bank`, `expense_cvno`, `expense_cn`, `expense_check_date`, `expense_date`) VALUES
(1, 'Transportation', '', '5243556', '8303', ' 004-625-830-001', 'Toll', 'lot', 'Staff', 'BDO', 1024, 123456, '2020-12-16', '2020-12-10 16:03:17'),
(2, 'Supply', '', ' 358481', '595145', ' 201-160-401-001', 'Christmas Party Giveaway', 'pcs', 'Staff', 'BDO', 1024, 123456, '2020-12-23', '2020-12-10 16:05:11'),
(3, 'Supply', '', ' 358481', '345234', ' 201-160-401-001', 'Fukuda Gas Stove', 'pc', 'Staff', 'BDO', 1024, 123456, '2020-12-23', '2020-12-10 16:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_payee`
--

CREATE TABLE `tbl_expense_payee` (
  `payee_id` int(11) NOT NULL,
  `payee_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense_payee`
--

INSERT INTO `tbl_expense_payee` (`payee_id`, `payee_name`) VALUES
(1, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_transactions`
--

CREATE TABLE `tbl_expense_transactions` (
  `expense_transaction_id` int(11) NOT NULL,
  `expense_qty` int(11) NOT NULL,
  `expense_price_unit` int(11) NOT NULL,
  `expense_discount` int(11) NOT NULL,
  `expense_vat` int(11) NOT NULL,
  `expense_total` float NOT NULL,
  `expense_remarks` varchar(100) NOT NULL,
  `expense_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense_transactions`
--

INSERT INTO `tbl_expense_transactions` (`expense_transaction_id`, `expense_qty`, `expense_price_unit`, `expense_discount`, `expense_vat`, `expense_total`, `expense_remarks`, `expense_details_id`) VALUES
(1, 1, 198, 0, 21, 198, 'RELEASED', 1),
(2, 10, 399, 0, 553, 3990, 'RELEASED', 2),
(3, 1, 699, 0, 0, 699, 'RELEASED', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `logs_id` int(11) NOT NULL,
  `logs_content` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`logs_id`, `logs_content`, `employee_id`, `created_at`) VALUES
(1, 'Logged in', 1, '2020-12-10 15:54:56'),
(2, 'Logged in', 4, '2020-12-10 16:08:42'),
(3, 'update his / her password', 4, '2020-12-10 16:09:30'),
(4, 'Logged in', 1, '2020-12-10 16:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security`
--

CREATE TABLE `tbl_security` (
  `security_id` int(11) NOT NULL,
  `security_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_smtp_server`
--

CREATE TABLE `tbl_smtp_server` (
  `smtp_id` int(11) NOT NULL,
  `smtp_socket` varchar(255) NOT NULL,
  `smtp_security` varchar(255) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_email` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `smtp_from` varchar(255) NOT NULL,
  `smtp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_smtp_server`
--

INSERT INTO `tbl_smtp_server` (`smtp_id`, `smtp_socket`, `smtp_security`, `smtp_port`, `smtp_email`, `smtp_password`, `smtp_from`, `smtp_status`) VALUES
(1, 'smtp.gmail.com', 'ssl', 465, 'aczdigitalandprintingservices@gmail.com', 'password!@#$', 'no-reply@aczadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socket`
--

CREATE TABLE `tbl_socket` (
  `socket_id` int(11) NOT NULL,
  `socket_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

CREATE TABLE `tbl_units` (
  `units_id` int(11) NOT NULL,
  `units_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`units_id`, `units_name`) VALUES
(1, 'bot'),
(2, 'box'),
(3, 'con'),
(4, 'cont.'),
(5, 'gal'),
(6, 'kg'),
(7, 'kls'),
(8, 'L'),
(9, 'lot'),
(10, 'lots'),
(11, 'ltr'),
(12, 'pack'),
(13, 'pair'),
(14, 'pc'),
(15, 'pcs'),
(16, 'rl'),
(17, 'roll'),
(18, 'rolls'),
(19, 'sqft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_expense_details`
--
ALTER TABLE `tbl_expense_details`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_expense_payee`
--
ALTER TABLE `tbl_expense_payee`
  ADD PRIMARY KEY (`payee_id`);

--
-- Indexes for table `tbl_expense_transactions`
--
ALTER TABLE `tbl_expense_transactions`
  ADD PRIMARY KEY (`expense_transaction_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_security`
--
ALTER TABLE `tbl_security`
  ADD PRIMARY KEY (`security_id`);

--
-- Indexes for table `tbl_smtp_server`
--
ALTER TABLE `tbl_smtp_server`
  ADD PRIMARY KEY (`smtp_id`);

--
-- Indexes for table `tbl_socket`
--
ALTER TABLE `tbl_socket`
  ADD PRIMARY KEY (`socket_id`);

--
-- Indexes for table `tbl_units`
--
ALTER TABLE `tbl_units`
  ADD PRIMARY KEY (`units_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_banks`
--
ALTER TABLE `tbl_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_expense_details`
--
ALTER TABLE `tbl_expense_details`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_expense_payee`
--
ALTER TABLE `tbl_expense_payee`
  MODIFY `payee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expense_transactions`
--
ALTER TABLE `tbl_expense_transactions`
  MODIFY `expense_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_security`
--
ALTER TABLE `tbl_security`
  MODIFY `security_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_smtp_server`
--
ALTER TABLE `tbl_smtp_server`
  MODIFY `smtp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_socket`
--
ALTER TABLE `tbl_socket`
  MODIFY `socket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_units`
--
ALTER TABLE `tbl_units`
  MODIFY `units_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
