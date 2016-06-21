-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 03:57 AM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blue999_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_booking`
--

CREATE TABLE IF NOT EXISTS `as_booking` (
  `id` int(11) unsigned NOT NULL,
  `booking_name` varchar(60) NOT NULL,
  `project_name` varchar(60) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `po_date` date NOT NULL,
  `cust_po_num` varchar(60) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `uploaded_file` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `year` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `as_order_details`
--

CREATE TABLE IF NOT EXISTS `as_order_details` (
  `id` int(11) unsigned NOT NULL,
  `booking_name` varchar(60) NOT NULL,
  `product_category` varchar(60) NOT NULL,
  `product` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(30) NOT NULL,
  `converted_price` varchar(30) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `discount` int(3) NOT NULL,
  `total` varchar(30) NOT NULL,
  `converted_total` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `as_year`
--

CREATE TABLE IF NOT EXISTS `as_year` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bmg_booking`
--

CREATE TABLE IF NOT EXISTS `bmg_booking` (
  `id` int(11) unsigned NOT NULL,
  `booking_name` varchar(60) NOT NULL,
  `project_name` varchar(60) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `po_date` date NOT NULL,
  `cust_po_num` varchar(60) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `uploaded_file` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `year` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmg_booking`
--

INSERT INTO `bmg_booking` (`id`, `booking_name`, `project_name`, `customer_id`, `po_date`, `cust_po_num`, `currency`, `rate`, `uploaded_file`, `comments`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BMG2016-01-001', 'UBL Maintenance Y2016', 'United Bank Limited', '2016-01-01', 'WO#R-0187-15', 'USD', '1', '', '', 2016, '', '2016-03-29 07:20:21', '2016-03-29 21:12:16'),
(2, 'BMG2016-01-002', 'G4S Maintenance Y2016', 'Al Majal G4S', '2016-01-01', 'BMG/AS/G4S/001/2016', 'USD', '1', '', '', 2016, '', '2016-03-29 07:47:41', '2016-04-13 16:35:37'),
(3, 'BMG2016-01-003', 'AAA Maintenance Y2016', 'Afro Asian Assistance B.S.C.', '2016-01-01', 'BMG/AS/AAA/001/2016', 'EUR', '1.1', '', '', 2016, '', '2016-03-29 08:08:57', '2016-06-02 22:02:23'),
(4, 'BMG2016-01-004', 'AAC Maintenance Y2016', 'Al Jomaih Automotive Company', '2016-01-01', 'BMG/AS/AAC/001/2011', 'USD', '1', '', '', 2016, '', '2016-03-29 10:45:00', '2016-03-29 20:59:08'),
(5, 'BMG2016-01-005', 'ABP Maintenance Y2016', 'Al Jomaih Bottling Plants', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-03-29 11:10:32', '0000-00-00 00:00:00'),
(6, 'BMG2016-01-006', 'ABO Maintenance Y2016', 'Ahli Bank of Oman ', '2016-01-01', 'BMG/AS/ABO/001/2011', 'USD', '1', '', '', 2016, '', '2016-03-29 12:03:22', '0000-00-00 00:00:00'),
(7, 'BMG2016-01-007', 'ABQ Maintenance Y2016', 'Ahli Bank of Qatar', '2016-01-01', 'BMG/AS/ABQ/001/2013', 'USD', '1', '', '', 2016, '', '2016-03-29 12:13:05', '2016-04-13 20:03:13'),
(8, 'BMG2016-01-008', 'Airmiles Maintenance Y2016', 'Rewards Management ME (Airmiles)', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-03-29 12:27:36', '0000-00-00 00:00:00'),
(9, 'BMG2016-01-009', 'Al Hamra Maintenance Y2016', 'Al Hamra Real Estate', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-03-29 12:32:08', '0000-00-00 00:00:00'),
(10, 'BMG2016-01-010', 'CBQ Maintenance Y2016', 'Commercial Bank Qatar Q.S.C.', '2016-01-21', 'PO-IT-3272', 'USD', '1', '', '', 2016, '', '2016-03-29 12:39:40', '0000-00-00 00:00:00'),
(11, 'BMG2016-01-011', 'CRM ME Maintenance 2016', 'CRM Middle East', '2016-01-01', 'Comm. Prop. 19, V3.0 dtd 16-Apr-2015', 'AED', '3.673', '', '', 2016, '', '2016-04-13 05:07:03', '2016-04-13 14:09:02'),
(12, 'BMG2016-01-012', 'Extra (UEC) Maintenance 2016-2017', 'United Electronics Company (Extra)', '2016-01-01', 'BMG/AS/EXTRA/001/2016', 'USD', '1', '', '', 2016, '', '2016-04-13 05:20:45', '0000-00-00 00:00:00'),
(13, 'BMG2016-01-013', 'Gap Corp Maintenance 2016', 'Gap Corp', '2016-01-01', 'BMG/AS/GAPCORP/001/2016', 'AED', '3.673', '', '', 2016, '', '2016-04-13 05:28:46', '0000-00-00 00:00:00'),
(14, 'BMG2016-01-014', 'Mezzo Maintenance 2016', 'MEZZO SASU', '2016-01-01', 'BMG/AS/Mezzo/001/2016', 'EUR', '1.1', '', '', 2016, '', '2016-04-13 05:46:37', '0000-00-00 00:00:00'),
(15, 'BMG2016-01-015', 'Procco Maintenance 2016', 'Procco Financial Services WLL', '2016-01-01', 'BMG/AS/PROCCO/001/2014', 'USD', '1', '', '', 2016, '', '2016-04-13 05:55:28', '0000-00-00 00:00:00'),
(16, 'BMG2016-01-016', 'SNTTA Maintenance 2015 & 2016', 'Sharjah National Travel & Tourist Agency (SNTTA)', '2016-01-01', 'N/A', 'AED', '3.673', '', '', 2016, '', '2016-04-13 06:02:27', '0000-00-00 00:00:00'),
(17, 'BMG2016-01-017', 'Transmed KSA Maintenance 2016', 'TRANSMED Limited (KSA)', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 06:13:31', '2016-04-13 15:20:08'),
(18, 'BMG2016-01-018', 'Transmed Lebanon Maintenance 2016', 'TRANSMED Lebanon', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 06:22:36', '2016-04-13 15:23:27'),
(19, 'BMG2016-01-019', 'UBL Int''l Maintenance 2016', 'UBL International (UAE)', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 06:30:53', '0000-00-00 00:00:00'),
(20, 'BMG2016-01-020', 'AUB Maintenance 2016', 'Ahli United Bank', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 07:03:35', '0000-00-00 00:00:00'),
(21, 'BMG2016-01-021', 'Advancia Maintenance 2016', 'Advancia Teleservices', '2016-01-01', 'BMG/AS/Advancia/001/2015', 'EUR', '1.1', '', '', 2016, '', '2016-04-13 07:18:45', '2016-05-31 18:11:30'),
(22, 'BMG2016-01-022', 'NBO Maintenance 2016', 'National Bank of Oman', '2016-01-01', 'BMG/AS/NBO/001/2016', 'USD', '1', '', '', 2016, '', '2016-04-13 07:30:56', '2016-04-13 16:32:54'),
(23, 'BMG2016-01-023', 'ASMENA (ADIB) Maintenance 2016', 'Altitude Software MENA FZ LLC', '2016-01-01', '2016-003', 'USD', '1', '', '', 2016, '', '2016-04-13 07:45:57', '0000-00-00 00:00:00'),
(24, 'BMG2016-01-024', 'BSF Collection Maintenance 2016', 'Banque Saudi Fransi (BSF)', '2016-01-01', 'BMG/AS/BSFColl/001/2016', 'SAR', '3.75', '', '', 2016, '', '2016-04-13 07:58:37', '0000-00-00 00:00:00'),
(25, 'BMG2016-01-025', 'CBQ On-Site Engineer (Q1-2016)', 'Commercial Bank Qatar Q.S.C.', '2016-01-31', 'IT-3342', 'USD', '1', '', '', 2016, '', '2016-04-13 09:21:10', '0000-00-00 00:00:00'),
(26, 'BMG2016-01-026', 'UBL PAK Contact Centre Enhancement', 'United Bank Limited', '2016-01-22', 'IT-0152-15', 'USD', '1', '', '', 2016, '', '2016-04-13 10:24:53', '0000-00-00 00:00:00'),
(27, 'BMG2016-01-027', 'ITACO uCI 8 Integration with Adding', 'ITACO Bahrain Co. WLL', '2016-01-18', 'Comm. Prop. V2.0 dtd 18-Jan-16', 'USD', '1', 'ITACO_PO_dtd_18-Jan-16.pdf', '', 2016, '', '2016-04-13 10:43:14', '0000-00-00 00:00:00'),
(28, 'BMG2016-01-028', 'ASMENA (NBAD) Maintenance 2016', 'Altitude Software MENA FZ LLC', '2016-01-22', '2016-001', 'USD', '1', '2016-001,_BMG_(NBAD).pdf', '', 2016, '', '2016-04-13 10:52:19', '0000-00-00 00:00:00'),
(29, 'BMG2016-01-029', 'ASMENA (Canar) Maintenance 2016', 'Altitude Software MENA FZ LLC', '2016-01-22', '2016-002', 'USD', '1', '2016-002,_BMG_(Canar).pdf', '', 2016, '', '2016-04-13 10:56:44', '0000-00-00 00:00:00'),
(30, 'BMG2016-01-030', 'ASMENA (AMEX KSA) Maintenance Q1-2016', 'Altitude Software MENA FZ LLC', '2016-01-22', '2016-004', 'USD', '1', '2016-004,_BMG_(Amex_KSA).pdf', '', 2016, '', '2016-04-13 11:05:19', '0000-00-00 00:00:00'),
(31, 'BMG2016-01-031', 'FT-Etisalat Maintenance 2016', 'Future Technology', '2016-01-25', 'N/A', 'AED', '3.673', '', '', 2016, '', '2016-04-13 12:29:38', '0000-00-00 00:00:00'),
(32, 'BMG2016-01-032', 'ESH (STC) Maintenance 2016', 'e-Solutions House', '2016-01-01', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 12:40:43', '0000-00-00 00:00:00'),
(33, 'BMG2016-01-033', 'ESH (LG Shaker) Maintenance 2016', 'e-Solutions House', '2016-01-25', 'ESH/PO/SHK/2016/03/004', 'USD', '1', '', '', 2016, '', '2016-04-13 12:43:46', '0000-00-00 00:00:00'),
(34, 'BMG2016-01-034', 'ESH (AUB-Egypt) Maintenance 2016', 'e-Solutions House', '2016-01-25', 'N/A', 'USD', '1', '', '', 2016, '', '2016-04-13 12:46:51', '0000-00-00 00:00:00'),
(35, 'BMG2016-01-035', 'ESH (Pizza Hut) Maintenance 2016', 'e-Solutions House', '2016-01-25', 'ESH/PO/PZH/2016/03/003', 'USD', '1', '', '', 2016, '', '2016-04-13 12:48:45', '0000-00-00 00:00:00'),
(36, 'BMG2016-03-036', 'ASMENA (ADIB) - Altitude uCI 8 Migration', 'Altitude Software MENA FZ LLC', '2016-03-30', 'DM-PN-BAU-14-004-01 V6.2 dtd 14-Jan-2014', 'USD', '1', '', '', 2016, '', '2016-04-13 12:53:38', '2016-06-21 14:42:57'),
(37, 'BMG2016-03-037', 'CDM Audit Altitude', 'Credit du Maroc', '2016-03-16', 'N/A', 'EUR', '1.1', '', '', 2016, '', '2016-04-14 05:06:53', '0000-00-00 00:00:00'),
(38, 'BMG2016-03-038', 'Detecon Project K-028510 (Business Financial Planning-STC)', 'Detecon International GmbH', '2016-03-30', 'extension of PO#4500002793', 'SAR', '3.75', '', '', 2016, '', '2016-04-14 05:15:35', '0000-00-00 00:00:00'),
(39, 'BMG2016-03-039', 'Detecon Project AEK-010317 (SA Mol Fiber Roll-out Phases 4)', 'Detecon Consulting FZ LLC', '2016-03-30', 'AEK-010317', 'AED', '3.673', '', '', 2016, '', '2016-04-14 05:19:13', '0000-00-00 00:00:00'),
(40, 'BMG2016-03-040', 'ASMENA (ADIB) - IVR Services Integration with ESB', 'Altitude Software MENA FZ LLC', '2016-03-30', 'DM-PN-BAU-14-004-02, V6.2 dtd 14-Jan-2014', 'USD', '1', '', '', 2016, '', '2016-04-14 05:25:17', '2016-06-21 14:42:39'),
(41, 'BMG2016-04-041', 'NBO Contact Centre Voice Mail Roll-out Project', 'National Bank of Oman', '2016-04-05', '312033', 'USD', '1', '', '', 2016, '', '2016-04-14 05:29:12', '0000-00-00 00:00:00'),
(42, 'BMG2016-04-042', 'Airmiles IVR Flow Change Implementation', 'Rewards Management ME (Airmiles)', '2016-04-04', '02767', 'AED', '3.673', '', '', 2016, '', '2016-04-14 05:32:48', '0000-00-00 00:00:00'),
(43, 'BMG2016-04-043', 'ITACO Additional Licenses & Maintenance (R2)', 'ITACO Bahrain Co. WLL', '2016-04-10', 'ITACO PO dtd 10-Apr-16', 'USD', '1', '', '', 2016, '', '2016-04-14 06:19:25', '0000-00-00 00:00:00'),
(44, 'BMG2016-05-044', 'UBL Int''l Altitude Back Office License (R3)', 'UBL International (UAE)', '2016-05-19', 'UAE-19-05-2016', 'AED', '3.673', '', '', 2016, '', '2016-06-21 05:18:08', '0000-00-00 00:00:00'),
(45, 'BMG2016-05-045', 'Project K-027313 (Acquisition Sheet No. 28 dtd Jun. 12th, 20', 'Detecon International GmbH', '2016-05-30', 'K-027313', 'EUR', '1.1', '', '', 2016, '', '2016-06-21 05:33:42', '0000-00-00 00:00:00'),
(46, 'BMG2016-06-046', 'ASMENA (ADIB) - Onsite Resident Engineer (4 weeks)', 'Altitude Software MENA FZ LLC', '2016-06-05', '2016-011', 'USD', '1', '', '', 2016, '', '2016-06-21 05:41:12', '0000-00-00 00:00:00'),
(47, 'BMG2016-06-047', 'ASMENA (DWTC) - DSW Contact Center Roll-out', 'Altitude Software MENA FZ LLC', '2016-06-14', '2016-012', 'USD', '1', '', '', 2016, '', '2016-06-21 05:48:32', '0000-00-00 00:00:00'),
(48, 'BMG2016-06-048', 'K-026701, Acquisition Sheet No. 12 (Oman Project)', 'Detecon International GmbH', '2016-06-09', 'K-026701', 'EUR', '1.1', '', '', 2016, '', '2016-06-21 06:00:19', '0000-00-00 00:00:00'),
(49, 'BMG2016-06-049', 'Altitude IVR Enhancement (R3)', 'United Electronics Company (Extra)', '2016-06-09', 'PO#29058533', 'USD', '1', '', '', 2016, '', '2016-06-21 06:41:38', '0000-00-00 00:00:00'),
(50, 'BMG2016-06-050', 'Mezzo Contact Centre Virtualization (Orange Tunisia Platform', 'MEZZO', '2016-06-03', 'Service Proposal V1.0 signed 3-Jun-16', 'EUR', '1.1', '', '', 2016, '', '2016-06-21 06:53:08', '0000-00-00 00:00:00'),
(51, 'BMG2016-06-051', 'ABO Disaster Recovery Licenses', 'Ahli Bank of Oman ', '2016-06-19', 'PO/16/00243 dtd 26-May-2016', 'USD', '1', '', '', 2016, '', '2016-06-21 06:58:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bmg_order_details`
--

CREATE TABLE IF NOT EXISTS `bmg_order_details` (
  `id` int(11) unsigned NOT NULL,
  `booking_name` varchar(60) NOT NULL,
  `product_category` varchar(60) NOT NULL,
  `product` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(30) NOT NULL,
  `converted_price` varchar(30) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `discount` int(3) NOT NULL,
  `total` varchar(30) NOT NULL,
  `converted_total` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmg_order_details`
--

INSERT INTO `bmg_order_details` (`id`, `booking_name`, `product_category`, `product`, `description`, `price`, `converted_price`, `qty`, `discount`, `total`, `converted_total`, `created_at`, `updated_at`) VALUES
(1, 'BMG2016-01-001', 'uCI Maintenance', 'Maintenance Level 4', '', '171498', '171498', '1', 0, '171498', '171498', '2016-03-29 07:22:42', '0000-00-00 00:00:00'),
(2, 'BMG2016-01-002', 'uCI Maintenance', 'Maintenance Level 4', '', '52258', '52258', '1', 0, '52258', '52258', '2016-03-29 07:51:00', '0000-00-00 00:00:00'),
(3, 'BMG2016-01-002', 'Other Maintenance', 'Other Maintenance Level 4', '', '42152', '0', '1', 0, '42152', '0', '2016-03-29 07:53:06', '0000-00-00 00:00:00'),
(4, 'BMG2016-01-003', 'uCI Maintenance', 'Maintenance Level 3', '', '6594.5', '5995', '1', 0, '6594.5', '5995', '2016-03-29 11:26:13', '0000-00-00 00:00:00'),
(5, 'BMG2016-01-004', 'uCI Maintenance', 'Maintenance Level 3', '', '33755', '0', '1', 0, '33755', '0', '2016-03-29 11:56:36', '0000-00-00 00:00:00'),
(6, 'BMG2016-01-004', 'Services', 'Premier Services', '', '800', '0', '12', 0, '9600', '0', '2016-03-29 11:59:41', '0000-00-00 00:00:00'),
(7, 'BMG2016-01-006', 'uCI Maintenance', 'Maintenance Level 3', '', '7562', '0', '1', 0, '7562', '0', '2016-03-29 12:04:16', '0000-00-00 00:00:00'),
(8, 'BMG2016-01-007', 'uCI Maintenance', 'Maintenance Level 4', '', '20900', '0', '1', 0, '20900', '0', '2016-03-29 12:13:58', '0000-00-00 00:00:00'),
(9, 'BMG2016-01-007', 'Services', 'Premier Services', '', '900', '0', '9', 0, '8100', '0', '2016-03-29 12:14:36', '0000-00-00 00:00:00'),
(10, 'BMG2016-01-008', 'uCI Maintenance', 'Maintenance Level 3', '', '9492', '0', '1', 0, '9492', '0', '2016-03-29 12:28:37', '0000-00-00 00:00:00'),
(11, 'BMG2016-01-009', 'uCI Maintenance', 'Maintenance Level 3', '', '3188', '0', '1', 0, '3188', '0', '2016-03-29 12:32:51', '0000-00-00 00:00:00'),
(12, 'BMG2016-01-0010', 'uCI Maintenance', 'Maintenance Level 4', '', '73831', '0', '1', 0, '73831', '0', '2016-03-29 12:49:11', '0000-00-00 00:00:00'),
(13, 'BMG2016-01-010', 'uCI Maintenance', 'Maintenance Level 4', '', '73831', '0', '1', 0, '73831', '0', '2016-03-30 11:30:04', '0000-00-00 00:00:00'),
(14, 'BMG2016-01-011', 'uCI Maintenance', 'Maintenance Level 3', '', '5890.55', '21636', '1', 0, '5890.55', '21636', '2016-04-13 05:08:26', '0000-00-00 00:00:00'),
(15, 'BMG2016-01-012', 'uCI Maintenance', 'Maintenance Level 4', '', '26431', '0', '1', 0, '26431', '0', '2016-04-13 05:25:51', '0000-00-00 00:00:00'),
(16, 'BMG2016-01-013', 'uCI Maintenance', 'Maintenance Level 3', '', '5529.54', '20310', '1', 0, '5529.54', '20310', '2016-04-13 05:29:56', '0000-00-00 00:00:00'),
(17, 'BMG2016-01-014', 'uCI Maintenance', 'Maintenance Level 4', '', '28326.1', '25751', '1', 0, '28326.1', '25751', '2016-04-13 05:47:23', '0000-00-00 00:00:00'),
(18, 'BMG2016-01-015', 'uCI Maintenance', 'Maintenance Level 3', '', '9281', '0', '1', 0, '9281', '0', '2016-04-13 05:56:57', '0000-00-00 00:00:00'),
(19, 'BMG2016-01-016', 'uCI Maintenance', 'Maintenance Level 3', '', '3196.03', '11739', '1', 0, '3196.03', '11739', '2016-04-13 06:05:42', '0000-00-00 00:00:00'),
(20, 'BMG2016-01-016', 'uCI Maintenance', 'Maintenance Level 3', '', '14598.15', '53619', '1', 0, '14598.15', '53619', '2016-04-13 06:05:42', '0000-00-00 00:00:00'),
(21, 'BMG2016-01-017', 'uCI Maintenance', 'Maintenance Level 3', '', '3288', '0', '1', 0, '3288', '0', '2016-04-13 06:14:46', '0000-00-00 00:00:00'),
(22, 'BMG2016-01-018', 'uCI Maintenance', 'Maintenance Level 3', '', '3831', '0', '1', 0, '3831', '0', '2016-04-13 06:23:19', '0000-00-00 00:00:00'),
(23, 'BMG2016-01-019', 'uCI Maintenance', 'Maintenance Level 3', '', '16345', '0', '1', 0, '16345', '0', '2016-04-13 06:57:05', '0000-00-00 00:00:00'),
(24, 'BMG2016-01-019', 'uCI Maintenance', 'Maintenance Level 3', '', '861', '0', '1', 0, '861', '0', '2016-04-13 06:57:28', '0000-00-00 00:00:00'),
(25, 'BMG2016-01-020', 'uCI Maintenance', 'Maintenance Level 3', '', '20723', '0', '1', 0, '20723', '0', '2016-04-13 07:04:32', '0000-00-00 00:00:00'),
(26, 'BMG2016-01-020', 'uCI Maintenance', 'Maintenance Level 3', '', '243', '0', '1', 0, '243', '0', '2016-04-13 07:05:01', '0000-00-00 00:00:00'),
(27, 'BMG2016-01-021', 'uCI Maintenance', 'Assistance & Technical Support', '', '33000', '30000', '1', 0, '33000', '30000', '2016-04-13 07:24:00', '0000-00-00 00:00:00'),
(28, 'BMG2016-01-021', 'uCI Maintenance', 'Assistance & Technical Support', '', '4950', '4500', '1', 0, '4950', '4500', '2016-04-13 07:24:43', '0000-00-00 00:00:00'),
(29, 'BMG2016-01-021', 'uCI Maintenance', 'Assistance & Technical Support', '', '598.4', '544', '1', 0, '598.4', '544', '2016-04-13 07:25:08', '0000-00-00 00:00:00'),
(30, 'BMG2016-01-022', 'uCI Maintenance', 'Maintenance Level 4', '', '20314', '0', '1', 0, '20314', '0', '2016-04-13 07:32:14', '0000-00-00 00:00:00'),
(31, 'BMG2016-01-022', 'Other Maintenance', 'Other Maintenance Level 4', '', '7465', '0', '1', 0, '7465', '0', '2016-04-13 07:37:17', '0000-00-00 00:00:00'),
(32, 'BMG2016-01-023', 'uCI Maintenance', 'Maintenance Level 3', '', '19501', '0', '1', 0, '19501', '0', '2016-04-13 07:55:12', '0000-00-00 00:00:00'),
(33, 'BMG2016-01-023', 'Other Maintenance', 'Other Maintenance Level 3', '', '9879', '0', '1', 0, '9879', '0', '2016-04-13 07:55:40', '0000-00-00 00:00:00'),
(34, 'BMG2016-01-023', 'Customer Assistance', 'Customer Assistance', '', '20381', '0', '1', 0, '20381', '0', '2016-04-13 07:56:11', '0000-00-00 00:00:00'),
(35, 'BMG2016-01-024', 'uCI Maintenance', 'Maintenance Level 4', '', '25461.07', '95479', '1', 0, '25461.07', '95479', '2016-04-13 07:59:33', '0000-00-00 00:00:00'),
(36, 'BMG2016-01-025', 'Services', 'Professional Services', '', '13000', '0', '3', 0, '39000', '0', '2016-04-13 09:22:46', '0000-00-00 00:00:00'),
(37, 'BMG2016-01-026', 'Services', 'Professional Services', '', '187270', '0', '1', 17, '155434', '0', '2016-04-13 10:28:33', '0000-00-00 00:00:00'),
(38, 'BMG2016-01-027', 'Services', 'Professional Services', '', '14400', '0', '1', 0, '14400', '0', '2016-04-13 10:44:05', '0000-00-00 00:00:00'),
(39, 'BMG2016-01-028', 'uCI Maintenance', 'Maintenance Level 3', '', '2216', '0', '1', 0, '2216', '0', '2016-04-13 10:53:05', '0000-00-00 00:00:00'),
(40, 'BMG2016-01-028', 'Customer Assistance', 'Customer Assistance', '', '8051', '0', '1', 0, '8051', '0', '2016-04-13 10:53:28', '0000-00-00 00:00:00'),
(41, 'BMG2016-01-029', 'uCI Maintenance', 'Maintenance Level 3', '', '12632', '0', '1', 0, '12632', '0', '2016-04-13 11:01:11', '0000-00-00 00:00:00'),
(42, 'BMG2016-01-029', 'Customer Assistance', 'Customer Assistance', '', '4348', '0', '1', 0, '4348', '0', '2016-04-13 11:01:56', '0000-00-00 00:00:00'),
(43, 'BMG2016-01-030', 'uCI Maintenance', 'Maintenance Level 3', '', '4442', '0', '1', 0, '4442', '0', '2016-04-13 11:06:05', '0000-00-00 00:00:00'),
(44, 'BMG2016-01-031', 'uCI Maintenance', 'Maintenance Level 3', '', '70184', '257786', '1', 0, '70184', '257786', '2016-04-13 12:36:30', '0000-00-00 00:00:00'),
(45, 'BMG2016-01-031', 'uCI Maintenance', 'Maintenance Level 3', '', '20568.47', '75548', '1', 0, '20568.47', '75548', '2016-04-13 12:37:13', '0000-00-00 00:00:00'),
(46, 'BMG2016-01-032', 'uCI Maintenance', 'Maintenance Level 3', '', '45629', '0', '1', 0, '45629', '0', '2016-04-13 12:41:35', '0000-00-00 00:00:00'),
(47, 'BMG2016-01-033', 'uCI Maintenance', 'Maintenance Level 3', '', '9064', '0', '1', 0, '9064', '0', '2016-04-13 12:44:23', '0000-00-00 00:00:00'),
(48, 'BMG2016-01-034', 'uCI Maintenance', 'Maintenance Level 3', '', '2145', '0', '1', 0, '2145', '0', '2016-04-13 12:47:33', '0000-00-00 00:00:00'),
(49, 'BMG2016-01-035', 'uCI Maintenance', 'Maintenance Level 3', '', '10678', '0', '1', 0, '10678', '0', '2016-04-13 12:49:21', '0000-00-00 00:00:00'),
(50, 'BMG2016-03-036', 'Services', 'Professional Services', '', '147468', '0', '1', 0, '147468', '0', '2016-04-13 12:54:14', '0000-00-00 00:00:00'),
(51, 'BMG2016-03-038', 'Services', 'Outsourcing Services', '', '3200', '12000', '1', 0, '3200', '12000', '2016-04-14 05:16:09', '0000-00-00 00:00:00'),
(52, 'BMG2016-03-039', 'Services', 'Outsourcing Services', 'Services for Mar.2016 & Apr. 2016', '5554.86', '20403', '2', 0, '11109.72', '40806', '2016-04-14 05:20:55', '0000-00-00 00:00:00'),
(53, 'BMG2016-03-040', 'Services', 'Professional Services', '', '163256', '0', '1', 0, '163256', '0', '2016-04-14 05:26:46', '0000-00-00 00:00:00'),
(54, 'BMG2016-04-041', 'Services', 'Professional Services', '', '5775', '0', '1', 0, '5775', '0', '2016-04-14 05:29:52', '0000-00-00 00:00:00'),
(55, 'BMG2016-04-042', 'Services', 'Professional Services', '', '3201.74', '11760', '1', 0, '3201.74', '11760', '2016-04-14 05:33:30', '0000-00-00 00:00:00'),
(56, 'BMG2016-05-044', 'uCI License', 'uCI Software', '25 Altitude Back Office License', '14950', '54911.35', '1', 0, '14950', '54911.35', '2016-06-21 05:27:28', '0000-00-00 00:00:00'),
(57, 'BMG2016-05-044', 'uCI Maintenance', 'Maintenance Level 3', 'Maintenance Support from Jun. 1st, 2016 to Dec. 31st, 2016', '1569.74', '5765.66', '1', 0, '1569.74', '5765.66', '2016-06-21 05:29:36', '0000-00-00 00:00:00'),
(58, 'BMG2016-05-045', 'Services', 'Outsourcing Services', 'Professional Services for Prokect K-027313_LY Employee Gap Assessment (Libya International Telecom Company)', '18582.3', '16893', '1', 0, '18582.3', '16893', '2016-06-21 05:35:45', '0000-00-00 00:00:00'),
(59, 'BMG2016-06-046', 'Services', 'Outsourcing Services', 'Phase 1 - Onsite Engineer (2 weeks)', '9505.31', '0', '1', 0, '9505.31', '0', '2016-06-21 05:44:59', '0000-00-00 00:00:00'),
(60, 'BMG2016-06-046', 'Services', 'Outsourcing Services', 'Phase 2 - Onsite Engineer (2 weeks)', '9505.04', '0', '1', 0, '9505.04', '0', '2016-06-21 05:45:50', '0000-00-00 00:00:00'),
(62, 'BMG2016-06-047', 'Services', 'Professional Services', 'Customer Interaction Solution. Software Configuration & Set-up for DSW', '2401.31', '0', '1', 0, '2401.31', '0', '2016-06-21 05:51:37', '0000-00-00 00:00:00'),
(63, 'BMG2016-06-048', 'Services', 'Outsourcing Services', 'Services for Project K-026701 (Oman Project)', '7743.12', '7039.2', '1', 0, '7743.12', '7039.2', '2016-06-21 06:02:01', '0000-00-00 00:00:00'),
(64, 'BMG2016-06-049', 'uCI License', 'uCI Software', 'Altitude IVR Inbound', '720', '0', '15', 0, '10800', '0', '2016-06-21 06:42:48', '0000-00-00 00:00:00'),
(65, 'BMG2016-06-049', 'Services', 'Professional Services', 'Phase 1 of IVR Enhancement', '6400', '0', '1', 0, '6400', '0', '2016-06-21 06:43:39', '0000-00-00 00:00:00'),
(66, 'BMG2016-06-049', 'Services', 'Professional Services', 'Phase 2 of IVR Enhancement', '4000', '0', '1', 0, '4000', '0', '2016-06-21 06:44:26', '0000-00-00 00:00:00'),
(67, 'BMG2016-06-049', 'Services', 'Logistics Services', 'Logistics', '1450', '0', '1', 0, '1450', '0', '2016-06-21 06:45:19', '0000-00-00 00:00:00'),
(68, 'BMG2016-06-050', 'Services', 'Professional Services', 'Mezzo Virtualization (Hybrid Set-up)', '11000', '10000', '1', 0, '11000', '10000', '2016-06-21 06:55:38', '0000-00-00 00:00:00'),
(69, 'BMG2016-06-050', 'Services', 'Professional Services', 'Mezzo Virtualization (DR Set-up)', '3520', '3200', '1', 0, '3520', '3200', '2016-06-21 06:56:29', '0000-00-00 00:00:00'),
(70, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude IVR IP (DR License)', '145.8', '0', '7', 0, '1020.6', '0', '2016-06-21 07:26:03', '0000-00-00 00:00:00'),
(71, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude uAgent Windows (DR License)', '165.6', '0', '6', 0, '993.6', '0', '2016-06-21 07:26:58', '0000-00-00 00:00:00'),
(72, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude Voice Inbound (DR License)', '95.4', '0', '6', 0, '572.4', '0', '2016-06-21 07:27:44', '0000-00-00 00:00:00'),
(73, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude uRouter (DR License)', '115.2', '0', '6', 0, '691.2', '0', '2016-06-21 07:28:52', '0000-00-00 00:00:00'),
(74, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude Integration Server (DR License)', '68.4', '0', '1', 0, '68.4', '0', '2016-06-21 07:29:59', '0000-00-00 00:00:00'),
(75, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude uSupervisor COM API (DR License)', '77.4', '0', '1', 0, '77.4', '0', '2016-06-21 07:30:43', '0000-00-00 00:00:00'),
(76, 'BMG2016-06-051', 'uCI License', 'uCI Software', 'Altitude uSupervisor (DR License)', '583.2', '0', '1', 0, '583.2', '0', '2016-06-21 07:31:36', '0000-00-00 00:00:00'),
(77, 'BMG2016-06-051', 'uCI Maintenance', 'Maintenance Level 3', 'Yearly Maintenance Support', '721.22', '0', '1', 0, '721.22', '0', '2016-06-21 07:33:05', '0000-00-00 00:00:00'),
(78, 'BMG2016-03-037', 'Services', 'Professional Services', 'Altitude Audit', '4277.78', '3888.89', '1', 0, '4277.78', '3888.89', '2016-06-21 07:34:37', '0000-00-00 00:00:00'),
(79, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude uAgent with Voice Inbound & Outbound', '1878', '0', '1', 0, '1878', '0', '2016-06-21 07:36:50', '0000-00-00 00:00:00'),
(80, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude Softphone', '75', '0', '1', 0, '75', '0', '2016-06-21 07:37:23', '0000-00-00 00:00:00'),
(81, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude Voice Recorder', '292', '0', '1', 0, '292', '0', '2016-06-21 07:37:55', '0000-00-00 00:00:00'),
(82, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude uRouter Default (Not Charged)', '0', '0', '1', 0, '0', '0', '2016-06-21 07:38:54', '0000-00-00 00:00:00'),
(83, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude IVR', '675', '0', '1', 0, '675', '0', '2016-06-21 07:39:43', '0000-00-00 00:00:00'),
(84, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude Email', '480', '0', '1', 0, '480', '0', '2016-06-21 07:40:32', '0000-00-00 00:00:00'),
(85, 'BMG2016-04-043', 'uCI License', 'uCI Software', 'Altitude vBox (Not Charged)', '0', '0', '1', 0, '0', '0', '2016-06-21 07:41:14', '0000-00-00 00:00:00'),
(86, 'BMG2016-04-043', 'uCI Maintenance', 'Maintenance Level 3', 'Altitude uCI & vBox Yearly Maintenance Starting from May 1st, 2016 to Apr. 30th, 2017', '779', '0', '1', 0, '779', '0', '2016-06-21 07:42:19', '0000-00-00 00:00:00'),
(87, 'BMG2016-03-039', 'Services', 'Outsourcing Services', 'Services for May 2016', '5554.86', '20403', '1', 0, '5554.86', '20403', '2016-06-21 08:05:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bmg_year`
--

CREATE TABLE IF NOT EXISTS `bmg_year` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmg_year`
--

INSERT INTO `bmg_year` (`id`, `name`, `year`, `created_at`, `updated_at`) VALUES
(1, 'BMG', 2016, '2016-03-22 12:04:48', '0000-00-00 00:00:00'),
(2, 'BMG', 2015, '2016-03-30 13:34:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `rate` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'USD', '1', '2016-03-29 07:17:38', '0000-00-00 00:00:00'),
(2, 'EUR', '1.1', '2016-03-29 07:18:12', '2016-03-29 20:06:56'),
(3, 'AED', '3.673', '2016-03-29 07:18:31', '0000-00-00 00:00:00'),
(4, 'SAR', '3.75', '2016-03-29 07:18:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) unsigned NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_person` varchar(60) NOT NULL,
  `uploaded_file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company`, `address`, `contact_person`, `uploaded_file`, `created_at`, `updated_at`) VALUES
(1, 'Abu Dhabi Islamic Bank (ADIB)', 'PO Box 313, Abu Dhabi, UAE', 'Majdi Al Hassan', 'ADIB_logo.JPG', '2016-03-29 06:19:26', '2016-03-29 20:32:13'),
(2, 'ADIB - IRAQ', '', 'Majdi Al Hassan', '', '2016-03-29 06:22:56', '0000-00-00 00:00:00'),
(3, 'National Bank of Abu Dhabi (NBAD)', 'PO Box 4, Abu Dhabi, UAE', 'Fadi Oweinah', 'nbad.jpg', '2016-03-29 06:26:55', '2016-03-29 20:37:27'),
(4, 'Neuron LLC', 'IT Plaza Building, 6th Floor, Dubai Silicon Oasis, PO Box 72071, Dubai, UAE', 'Shaheen Khan', '', '2016-03-29 06:35:20', '0000-00-00 00:00:00'),
(5, 'Canar Telecommunication Company', 'Al Qibalh Centre Building, Africa Road, Al Amarat, 8182 Khartoum, Sudan', 'Emad M. Elbashir', '', '2016-03-29 06:40:24', '0000-00-00 00:00:00'),
(6, 'American Express KSA', 'PO Box 6624, Riyadh 11452, Kingdom of Saudi Arabia', 'Dany Ibrahim', '', '2016-03-29 06:43:03', '0000-00-00 00:00:00'),
(7, 'Ahmed Seddiqi & Sons LLC', '13th Floor Capricorn Tower, Sheikh Zayed Road, PO Box 2123, Dubai, UAE', 'Rania Mehwi', '', '2016-03-29 06:47:24', '0000-00-00 00:00:00'),
(8, 'United Bank Limited', 'NJI Bldg., Mezzanine Floor, I. I Chundrigar Road, Karachi, Pakistan', 'Atiq Ur Rehman', '', '2016-03-29 06:53:09', '0000-00-00 00:00:00'),
(9, 'Al Majal G4S', 'Al Amoudi Plaza, PO Box 6930, Jeddah 21452, Kingdom of Saudi Arabia', 'Taher Sufian Abu-Sheikha', 'g4s_logo_rgb_jpeg_large_250x159.jpg', '2016-03-29 07:42:08', '2016-03-29 20:35:50'),
(10, 'Afro Asian Assistance B.S.C.', 'PO Box 20078, Manama, Kingdom of Bahrain', 'Zain Makki', '', '2016-03-29 08:06:13', '0000-00-00 00:00:00'),
(11, 'Al Jomaih Automotive Company', 'PO Box 224, Dammam 31411, Kingdom of Saudi Arabia', 'Mohamed Khaled', '', '2016-03-29 09:03:09', '0000-00-00 00:00:00'),
(12, 'Al Jomaih Bottling Plants', 'PO Box 210, Riyadh, Kingdom of Saudi Arabia', 'Nassib Sayegh', '', '2016-03-29 11:09:35', '0000-00-00 00:00:00'),
(13, 'Ahli Bank of Oman ', 'PO Box 545, Mina Al Fahal 116, Oman', 'Tariq Al Zadjali', '', '2016-03-29 11:14:29', '0000-00-00 00:00:00'),
(14, 'Ahli Bank of Qatar', 'PO Box 2309, Suhim Bin Hamdan St., Doha, Qatar', 'Roshan Kareem', '', '2016-03-29 12:10:36', '0000-00-00 00:00:00'),
(15, 'Rewards Management ME (Airmiles)', 'PO Box 33818, Dubai, UAE', 'Helen Fee', '', '2016-03-29 12:21:05', '0000-00-00 00:00:00'),
(16, 'Al Hamra Real Estate', 'PO Box 30019, Ras Al Khaimah, UAE', 'Mathew Alex', '', '2016-03-29 12:31:09', '0000-00-00 00:00:00'),
(17, 'Commercial Bank Qatar Q.S.C.', 'PO Box 3232, Doha, Qatar', 'Sunil Clement Lobo', '', '2016-03-29 12:38:38', '0000-00-00 00:00:00'),
(18, 'CRM Middle East', 'PO Box 15316, Dubai, UAE', 'Lina Zarifeh', '', '2016-03-30 11:33:36', '0000-00-00 00:00:00'),
(19, 'United Electronics Company (Extra)', 'King Faisal Road, PO Box 76688, Al Khobar 31952, Kingdom of Saudi Arabia', 'Zahoor Ahmed', '', '2016-04-13 05:17:55', '0000-00-00 00:00:00'),
(20, 'Gap Corp', 'PO Box 127284, Dubai, UAE', 'Menaka Gopala', '', '2016-04-13 05:27:01', '0000-00-00 00:00:00'),
(21, 'MEZZO SASU', '2 Bis Rue du Creusot - Batiment D, 59170 Croix, France, Siret 48760068600074', 'Frederic Baudine', '', '2016-04-13 05:45:22', '0000-00-00 00:00:00'),
(22, 'Procco Financial Services WLL', 'Office 401/403, Al Moayyed Tower, Seef District, Manama, Bahrain', 'Benard Wiese', '', '2016-04-13 05:52:13', '0000-00-00 00:00:00'),
(23, 'Sharjah National Travel & Tourist Agency (SNTTA)', 'PO Box 17, Sharjah, UAE', 'Matthew Adams', '', '2016-04-13 06:00:58', '0000-00-00 00:00:00'),
(24, 'TRANSMED Limited (KSA)', 'Mazaya Tower, 4th Floor, Al Ma''ather Street, PO Box 2700, Riyadh 11461, Kingdom of Saudi Arabia', 'Mohamad Saleh', '', '2016-04-13 06:12:18', '2016-04-13 15:15:41'),
(25, 'TRANSMED Lebanon', 'PO Box 11-913, Beirut 2060, Lebanon', 'Daoud Al Gharib', '', '2016-04-13 06:17:32', '0000-00-00 00:00:00'),
(26, 'UBL International (UAE)', 'PO Box 35170, Al Garhoud, Dubai, UAE', 'Bharat Mathur', '', '2016-04-13 06:26:31', '0000-00-00 00:00:00'),
(27, 'Ahli United Bank', 'PO Box 2424, Manama, Bahrain', 'Sujatha Shivappala', '', '2016-04-13 07:01:27', '0000-00-00 00:00:00'),
(28, 'Advancia Teleservices', 'Mat. Fiscal 1160010/Z/A/M/000, Zone d''Activite Khereddine, Lot 2.216, 2015 Le Tunis, Tunisie', 'Chedlia Ben Youssef', '', '2016-04-13 07:12:13', '0000-00-00 00:00:00'),
(29, 'National Bank of Oman', 'PO Box 751, Ruwi 112, Sultanate of Oman', 'Aji Bhaskar', '', '2016-04-13 07:27:33', '0000-00-00 00:00:00'),
(30, 'Banque Saudi Fransi (BSF)', 'PO Box 56006, Riyadh 11554, Kingdom of Saudi Arabia', 'Essam Mohammed', '', '2016-04-13 07:40:46', '0000-00-00 00:00:00'),
(31, 'Altitude Software MENA FZ LLC', 'Dubai Internet City, Building 1, Office 215-216, PO Box 500071, Dubai, UAE', 'Abegaile Perez', '', '2016-04-13 07:42:59', '0000-00-00 00:00:00'),
(32, 'ITACO Bahrain Co. WLL', 'PO Box 10871, Manama, Bahrain', 'Joy Thariath', '', '2016-04-13 10:39:05', '0000-00-00 00:00:00'),
(33, 'Future Technology', 'PO Box 25, Dubai, UAE', 'Mazen Mustafa Al Najjar', '', '2016-04-13 12:19:15', '0000-00-00 00:00:00'),
(34, 'e-Solutions House', '7295 Pr Abdulaziz Bin Musaed Bin Jalawi St., Sulimaniah Dist., PO Box 305175, Riyadh 11361, Kingdom ', 'Ayman Howera', '', '2016-04-13 12:39:40', '0000-00-00 00:00:00'),
(35, 'Credit du Maroc', 'Casablanca, Morocco', 'Youssef Touil', '', '2016-04-14 05:03:45', '0000-00-00 00:00:00'),
(36, 'Detecon International GmbH', 'Sternengasse 14-16, 50676 Cologne, Federal Republic of Germany', 'Issa Nasser', '', '2016-04-14 05:11:46', '0000-00-00 00:00:00'),
(37, 'Detecon Consulting FZ LLC', 'Dubai Internet City, Building 1, Office 305, PO Box 500089, Dubai, UAE', 'Issa Nasser', '', '2016-04-14 05:17:35', '0000-00-00 00:00:00'),
(38, 'MEZZO', '12 Rue 8608 - ZI Charguia 1 2035 Tunis, Tunisia', 'Lobna Lachaal', '', '2016-06-21 06:51:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `product_name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maintenance Level 3', '0', '2016-03-29 07:04:19', '0000-00-00 00:00:00'),
(2, 1, 'Maintenance Level 4', '0', '2016-03-29 07:08:44', '0000-00-00 00:00:00'),
(3, 2, 'Other Maintenance Level 4', '0', '2016-03-29 07:44:22', '2016-04-13 16:33:41'),
(4, 3, 'Professional Services', '0', '2016-03-29 11:54:11', '2016-03-29 20:58:11'),
(5, 3, 'Premier Services', '0', '2016-03-29 11:57:51', '0000-00-00 00:00:00'),
(7, 1, 'Assistance & Technical Support', '0', '2016-04-13 07:22:02', '0000-00-00 00:00:00'),
(8, 5, 'Customer Assistance', '0', '2016-04-13 07:47:29', '0000-00-00 00:00:00'),
(9, 2, 'Other Maintenance Level 3', '0', '2016-04-13 07:47:59', '0000-00-00 00:00:00'),
(10, 6, 'Logistics', '0', '2016-04-13 12:17:13', '0000-00-00 00:00:00'),
(11, 4, 'uCI Software', '0', '2016-04-13 12:25:10', '0000-00-00 00:00:00'),
(12, 3, 'Outsourcing Services', '0', '2016-04-14 05:12:35', '0000-00-00 00:00:00'),
(13, 3, 'Logistics Services', '0', '2016-06-21 06:06:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) unsigned NOT NULL,
  `product` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product`, `created_at`, `updated_at`) VALUES
(1, 'uCI Maintenance', '2016-03-29 06:56:27', '0000-00-00 00:00:00'),
(2, 'Other Maintenance', '2016-03-29 07:43:25', '0000-00-00 00:00:00'),
(3, 'Services', '2016-03-29 11:53:45', '0000-00-00 00:00:00'),
(4, 'uCI License', '2016-03-30 14:44:57', '0000-00-00 00:00:00'),
(5, 'Customer Assistance', '2016-04-13 07:46:58', '0000-00-00 00:00:00'),
(6, 'Travel & Lodging', '2016-04-13 12:16:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `user_type` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'joseph.semana@bluemena.com', '161ebd7d45089b3446ee4e0d86dbcf92', 'Aiman Joseph', 'Semana', 1, '2016-03-15 10:03:27', '0000-00-00 00:00:00'),
(2, 'ayman.soliman@bluemena.com', '161ebd7d45089b3446ee4e0d86dbcf92', 'Ayman', 'Soliman', 1, '2016-03-21 10:03:27', '0000-00-00 00:00:00'),
(3, 'abegaile.perez@bluemena.com', '161ebd7d45089b3446ee4e0d86dbcf92', 'Abegaile', 'Perez', 1, '2016-03-21 10:03:27', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_booking`
--
ALTER TABLE `as_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `as_order_details`
--
ALTER TABLE `as_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `as_year`
--
ALTER TABLE `as_year`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `bmg_booking`
--
ALTER TABLE `bmg_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmg_order_details`
--
ALTER TABLE `bmg_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmg_year`
--
ALTER TABLE `bmg_year`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_booking`
--
ALTER TABLE `as_booking`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `as_order_details`
--
ALTER TABLE `as_order_details`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `as_year`
--
ALTER TABLE `as_year`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bmg_booking`
--
ALTER TABLE `bmg_booking`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `bmg_order_details`
--
ALTER TABLE `bmg_order_details`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `bmg_year`
--
ALTER TABLE `bmg_year`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
