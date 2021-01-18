-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:22 PM
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
(1, 'Administrator', 'ACZ', '', 'ACZ2021000', '$2y$10$24u5IfBYxfCzSWTqCuLpf.Mt4EYhHY.cAEpwcvSlzHtr2sYtHxZ56', 'aczdigitalandprintingservices@gmail.com', '', 'Binan, Laguna', '0000-00-00', 'M', 'Active', 1, '893518', '2021-01-14 16:26:15'),
(2, 'Banares', 'Stephen', '', 'ACZ2021001', '$2y$10$Txnmnmwp27Dp.NepZ9BDIutVbPlBt7eZoDkzo50ivk92IsqjBewi6', 'stephenbanares@gmail.com', '09327825541', 'Binan, Laguna', '2010-10-10', 'M', 'Active', 2, '298521', '2021-01-14 17:21:16'),
(3, 'Babilonia', 'Joshua', '', 'ACZ2021002', '$2y$10$xlWEVM.ggO3pEISIGawFUuMpT4/JXg8ud4nCkNfQdw11iCL9O0A06', 'joshuababilonia03@gmail.com', '09267548829', 'Cavite', '2010-10-10', 'M', 'Active', 2, '963671', '2021-01-14 17:21:27'),
(4, 'Dala', 'Kevin', '', 'ACZ2021003', '$2y$10$ojhVv2PxYQBm6JcDXknJFeO/I0CZzTu5D2ffUZC8z0psLiaOhnVM6', 'kevindala@gmail.com', '09548971891', 'San Pedro', '2010-10-10', 'M', 'Active', 2, '407713', '2021-01-14 17:21:37');

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
(1, 'BDO');

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
(2, 'Supply'),
(3, 'Meal');

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
(1, 'Transportation', '', '1234', '8303', ' 004-625-830-001', 'Toll', 'lot', 'Staff', 'BDO', 1024, 123456, '2021-01-16', '2021-01-14 17:00:34'),
(2, 'Supply', '', ' 358481', '5598', ' 201-160-401-001', 'Christmas Party  Giveaways', 'pcs', 'Staff', 'BDO', 1024, 123456, '2021-01-23', '2021-01-14 17:02:37'),
(3, 'Supply', '', ' 358481', '5583', ' 201-160-401-001', 'Fukuda Gas Stove', 'pc', 'Staff', 'BDO', 1024, 123456, '2021-01-23', '2021-01-14 17:03:56'),
(4, 'Supply', '', ' 358481', '5583', ' 201-160-401-001', 'Pillow', 'pcs', 'Staff', 'BDO', 1024, 123456, '2021-01-23', '2021-01-14 17:05:32'),
(5, 'Meal', '', '1089', ' 115420', ' 009-456-994-001', 'Meal', 'lot', 'Staff', 'BDO', 1024, 123456, '2021-01-30', '2021-01-14 17:11:56'),
(6, 'Meal', '', '1089', ' 115412 ', ' 009-456-994-001', 'Meal', 'lot', 'Staff', 'BDO', 1024, 123456, '2021-01-30', '2021-01-14 17:12:04');

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
  `expense_qty` double(10,2) NOT NULL,
  `expense_price_unit` double(10,2) NOT NULL,
  `expense_discount` double(10,2) NOT NULL,
  `expense_vat` double(10,2) NOT NULL,
  `expense_total` double(10,2) NOT NULL,
  `expense_remarks` varchar(100) NOT NULL,
  `expense_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_expense_transactions`
--

INSERT INTO `tbl_expense_transactions` (`expense_transaction_id`, `expense_qty`, `expense_price_unit`, `expense_discount`, `expense_vat`, `expense_total`, `expense_remarks`, `expense_details_id`) VALUES
(1, 1.00, 198.00, 0.00, 21.21, 198.00, 'RELEASED', 1),
(2, 10.00, 399.00, 0.00, 553.39, 3990.00, 'RELEASED', 2),
(3, 1.00, 699.00, 0.00, 0.00, 699.00, 'RELEASED', 3),
(4, 4.00, 119.00, 0.00, 0.00, 476.00, 'RELEASED', 4),
(5, 1.00, 105.00, 0.00, 0.00, 105.00, 'RELEASED', 5),
(6, 1.00, 330.00, 0.00, 0.00, 330.00, 'RELEASED', 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `media_id` int(11) NOT NULL,
  `media_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`media_id`, `media_name`) VALUES
(1, 'Sticker on Sintra'),
(2, 'Sticker with Lamination');

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
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `sales_id` int(11) NOT NULL,
  `sales_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sales_po` varchar(100) NOT NULL,
  `sales_so` varchar(100) NOT NULL,
  `sales_dr` varchar(100) NOT NULL,
  `sales_si` varchar(100) NOT NULL,
  `sales_company` varchar(255) NOT NULL,
  `sales_cp` varchar(50) NOT NULL,
  `sales_particulars` varchar(255) NOT NULL,
  `sales_media` varchar(255) NOT NULL,
  `sales_width` double(10,2) NOT NULL,
  `sales_height` double(10,2) NOT NULL,
  `sales_unit` varchar(100) NOT NULL,
  `sales_total_area` double(10,2) NOT NULL,
  `sales_price_unit` double(10,2) NOT NULL,
  `sales_qty` double(10,2) NOT NULL,
  `sales_total` double(10,2) NOT NULL,
  `sales_vat` double(10,2) NOT NULL,
  `sales_discount` double(10,2) NOT NULL,
  `sales_net_amount` double(10,2) NOT NULL,
  `sales_balance` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`sales_id`, `sales_date`, `sales_po`, `sales_so`, `sales_dr`, `sales_si`, `sales_company`, `sales_cp`, `sales_particulars`, `sales_media`, `sales_width`, `sales_height`, `sales_unit`, `sales_total_area`, `sales_price_unit`, `sales_qty`, `sales_total`, `sales_vat`, `sales_discount`, `sales_net_amount`, `sales_balance`) VALUES
(1, '2021-01-11 10:33:58', '1', '2', '3', '4', '', '', 'Admin Signage', 'Sticker on Sintra', 27.50, 20.00, 'in', 550.00, 1.00, 1.00, 550.00, 66.00, 0.00, 616.00, 116.00),
(2, '2021-01-14 15:05:02', '100549', '1234', '5678', '1794', 'Try', '09123456789', 'Employee Only', 'Sticker with Lamination', 16.00, 8.00, 'in', 128.00, 4.00, 15.00, 7680.00, 921.60, 0.00, 8601.60, 0.00),
(3, '2021-01-11 17:26:33', '100549', '1234', '5768', '1794', '', '', 'Authorized Personnel Only', 'Sticker on Sintra', 16.00, 8.00, 'in', 128.00, 4.00, 15.00, 7680.00, 921.60, 0.00, 8601.60, 4601.60),
(4, '2021-01-12 09:25:22', '100549', '1234', '5678', '1794', 'Try', '09662394487', 'No Smoking Sign', 'Sticker on Sintra', 16.00, 8.00, 'in', 128.00, 5.00, 10.00, 6400.00, 768.00, 0.00, 7168.00, 5168.00),
(5, '2021-01-14 17:18:12', '100600', '1234', '6204', '2087', ' ', ' ', 'HD 36 Decal Ligtas Byahe', 'Sticker with Lamination', 142.00, 45.00, 'in', 6390.00, 39.00, 1.00, 249210.00, 29905.20, 0.00, 279115.20, 214115.20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_payments`
--

CREATE TABLE `tbl_sales_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment_remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_payments`
--

INSERT INTO `tbl_sales_payments` (`payment_id`, `payment_amount`, `payment_date`, `sales_id`, `payment_remarks`) VALUES
(1, 500.00, '2021-01-16', 1, ''),
(2, 8601.60, '2021-01-14', 2, ''),
(3, 1000.00, '2021-01-15', 3, ''),
(4, 1000.00, '2021-01-18', 3, ''),
(5, 2000.00, '2021-01-29', 3, ''),
(6, 2000.00, '2021-01-16', 4, 'Down Payment'),
(7, 55000.00, '2021-01-18', 5, 'Down Payment'),
(8, 10000.00, '2021-01-19', 5, '');

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
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `tbl_sales_payments`
--
ALTER TABLE `tbl_sales_payments`
  ADD PRIMARY KEY (`payment_id`);

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
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expense_category`
--
ALTER TABLE `tbl_expense_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_expense_details`
--
ALTER TABLE `tbl_expense_details`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_expense_payee`
--
ALTER TABLE `tbl_expense_payee`
  MODIFY `payee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expense_transactions`
--
ALTER TABLE `tbl_expense_transactions`
  MODIFY `expense_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sales_payments`
--
ALTER TABLE `tbl_sales_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
