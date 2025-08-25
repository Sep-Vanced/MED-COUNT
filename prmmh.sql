-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 09:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prmmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `central_supply_office`
--

CREATE TABLE `central_supply_office` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `batch_num` varchar(255) NOT NULL,
  `exp.date` date NOT NULL,
  `unit_value` int(11) NOT NULL,
  `stock_bal` int(11) NOT NULL,
  `onhand` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `central_supply_office`
--

INSERT INTO `central_supply_office` (`id`, `product_name`, `product_num`, `unit_of_issue`, `batch_num`, `exp.date`, `unit_value`, `stock_bal`, `onhand`, `status`, `image_filename`) VALUES
(5, 'ENDOTRACHEAL TUBE SIZE 2.0 (PARTNERS)', 'PB 2022-476', 'PIECE', '21120112559', '2026-11-26', 41, 10, 10, NULL, NULL),
(6, 'DISPOSABLE SYRINGE WITH NEEDLE 0.3ML (HRXH)', 'WESTELLAR', 'PIECE', '20211216', '2030-12-26', 25, 30, 30, NULL, NULL),
(7, 'CONDOM CATHETER, SMALL (ORMED)', 'PR 597', 'PIECE', 'FY2011065', '2030-03-22', 64, 20, 20, 'Deleted', NULL),
(8, 'BABY\'S TAG, BLUE 100\'S (ORMED)', 'PR 004', 'PIECE', '20160225', '2030-10-12', 2, 20, 20, NULL, NULL),
(9, 'ATR. CHROMIC 1, ROUND NEEDLE/TAPER (ETHICON)', 'PB2023-476', 'PIECE', '211227', '2029-11-26', 400, 10, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_num` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_of_issue` varchar(100) DEFAULT NULL,
  `batch_num` varchar(255) NOT NULL,
  `exp.date` date DEFAULT NULL,
  `unit_value` decimal(11,2) NOT NULL,
  `balance_on_hand` int(11) DEFAULT NULL,
  `balance_at_warehouse` int(11) DEFAULT NULL,
  `approved_quantity` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `target_office` varchar(255) DEFAULT NULL,
  `confirmation_status` enum('Pending','Delivered') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `product_name`, `product_num`, `quantity`, `unit_of_issue`, `batch_num`, `exp.date`, `unit_value`, `balance_on_hand`, `balance_at_warehouse`, `approved_quantity`, `delivery_date`, `target_office`, `confirmation_status`) VALUES
(13, 'GUEDEL AIRWAY SIZE 1', '', 1, NULL, '', NULL, 0.00, 29, 29, 1, '2024-09-30 20:15:22', 'pharmacy', 'Delivered'),
(14, '3WAY STOPCOCK (POLYMED)', 'PR 004', 1, 'PIECE', '1024122C', '2028-05-17', 68.00, 344, 344, 1, '2024-09-30 20:47:02', 'pharmacy', 'Delivered'),
(15, '3WAY STOPCOCK (POLYMED)', 'PR 004', 1, 'PIECE', '1024122C', '2028-05-17', 68.00, 344, 344, 1, '2024-10-01 18:25:59', 'pharmacy', 'Delivered'),
(16, 'BABY\'S TAG, BLUE 100\'S (ORMED)', 'PR 004', 20, 'PIECE', '20160225', '2030-10-12', 2.50, 2000, 2000, 20, '2024-10-01 22:14:42', 'pharmacy', 'Delivered'),
(17, 'BLOOD BAG 450ML 10\'S', 'PR 909', 2, 'BOX', '517200', '2026-09-26', 2500.00, 50, 50, 2, '2024-10-01 22:17:19', 'pharmacy', 'Delivered'),
(21, '3WAY STOPCOCK (POLYMED)', 'PR 004', 1, 'PIECE', '1024122C', '2028-05-17', 68.00, 344, 344, 1, '2024-10-01 22:41:48', 'pharmacy', 'Delivered'),
(22, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 50, 'PIECE', '20160225', '2030-02-13', 10.00, 24800, 24800, 50, '2024-10-02 09:20:03', 'laboratory', 'Delivered'),
(23, 'BABY\'S TAG, PINK 100\'S (ORMED)', 'PR 004', 500, 'BOX', '20160225', '2030-11-21', 2.50, 2000, 2000, 500, '2024-10-09 16:14:14', 'pharmacy', 'Delivered'),
(24, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 33, 'PIECE', '20160225', '2030-02-13', 10.00, 24800, 24800, 33, '2024-10-09 20:55:37', 'pharmacy', 'Delivered'),
(25, 'CONDOM CATHETER, MEDIUM(ORMED)', 'PB2022-476', 20, 'PIECE', 'FY2011065', '2030-12-06', 64.00, 100, 100, 20, '2024-10-09 20:56:06', 'pharmacy', 'Delivered'),
(26, 'HEPLOCK (SURGITECH)', 'PR 597', 10, 'PIECE', '22090101', '2028-11-27', 15.00, 1000, 1000, 10, '2024-10-09 20:56:20', 'pharmacy', 'Delivered'),
(27, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 100, 'PIECE', '20160225', '2030-02-13', 10.00, 24800, 24800, 100, '2024-10-09 23:51:02', 'laboratory', 'Delivered'),
(28, 'FOLEY CATHETER FR. 8 (ORMED)', 'PB2023-476', 10, 'PIECE', 'FY1908034', '2028-10-24', 50.00, 30, 30, 10, '2024-10-09 23:51:29', 'laboratory', 'Delivered'),
(29, 'ECG ELECTRODES, 50\'S (ORMED)', 'PR 597', 5, 'PACK', 'FY12303058', '2025-05-25', 2550.00, 25, 25, 5, '2024-10-09 23:51:52', 'laboratory', 'Delivered'),
(32, 'ELASTIC BANDAGE 4\" (SURGUTECH) 12\'S', 'PB2023-476', 15, 'ROLL', '202208', '2027-08-27', 31.50, 47, 47, 15, '2024-10-09 23:54:19', 'laboratory', 'Delivered'),
(33, 'INSULIN SYRINGE', 'PR 908', 15, 'PIECE', '200610', '2028-05-27', 9.50, 1500, 1500, 15, '2024-10-09 23:54:40', 'laboratory', 'Delivered'),
(34, 'NEBULAZING KIT (ORMED)', 'PR 004', 25, 'PIECE', 'FY2011065', '2028-05-06', 109.50, 1980, 1980, 25, '2024-10-09 23:54:55', 'laboratory', 'Delivered'),
(35, 'ATR. CHROMIC 1, ROUND NEEDLE/TAPER (ETHICON)', 'PB2023-476', 10, 'PIECE', '211227', '2029-11-26', 400.00, 60, 60, 10, '2024-10-09 23:55:23', 'central_supply_office', 'Delivered'),
(36, 'BABY\'S TAG, BLUE 100\'S (ORMED)', 'PR 004', 20, 'PIECE', '20160225', '2030-10-12', 2.50, 2000, 2000, 20, '2024-10-09 23:55:44', 'central_supply_office', 'Delivered'),
(37, 'CONDOM CATHETER, SMALL (ORMED)', 'PR 597', 20, 'PIECE', 'FY2011065', '2030-03-22', 64.00, 100, 100, 20, '2024-10-09 23:56:06', 'central_supply_office', 'Delivered'),
(38, 'DISPOSABLE SYRINGE WITH NEEDLE 0.3ML (HRXH)', 'WESTELLAR', 30, 'PIECE', '20211216', '2030-12-26', 25.00, 9600, 9600, 30, '2024-10-09 23:56:36', 'central_supply_office', 'Delivered'),
(39, 'ENDOTRACHEAL TUBE SIZE 2.0 (PARTNERS)', 'PB 2022-476', 10, 'PIECE', '21120112559', '2026-11-26', 41.00, 30, 30, 10, '2024-10-09 23:56:59', 'central_supply_office', 'Delivered'),
(40, '3 WAY STOPCOCK (POLYMED)', 'PR 004', 200, 'PIECE', '1024122C', '2028-05-17', 68.00, 344, 344, 200, '2024-10-10 07:09:53', 'pharmacy', 'Delivered'),
(46, 'ADHESIVE TAPE 1', 'PR 004', 10, 'BOX', '202701H30', '2024-11-29', 795.00, 294, 294, 10, '2024-11-04 23:58:21', 'pharmacy', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `batch_num` varchar(255) NOT NULL,
  `exp.date` date NOT NULL,
  `unit_value` int(11) NOT NULL,
  `stock_bal` int(11) NOT NULL,
  `onhand` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `product_name`, `product_num`, `unit_of_issue`, `batch_num`, `exp.date`, `unit_value`, `stock_bal`, `onhand`, `status`, `image_filename`) VALUES
(6, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 'PIECE', '20160225', '2030-02-13', 10, 50, 50, 'Deleted', NULL),
(7, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 'PIECE', '20160225', '2030-02-13', 10, 100, 100, NULL, NULL),
(8, 'NEBULAZING KIT (ORMED)', 'PR 004', 'PIECE', 'FY2011065', '2028-05-06', 109, 25, 25, NULL, NULL),
(9, 'INSULIN SYRINGE', 'PR 908', 'PIECE', '200610', '2028-05-27', 9, 15, 15, NULL, NULL),
(10, 'ELASTIC BANDAGE 4\" (SURGUTECH) 12\'S', 'PB2023-476', 'ROLL', '202208', '2027-08-27', 31, 15, 15, NULL, NULL),
(11, 'ECG ELECTRODES, 50\'S (ORMED)', 'PR 597', 'PACK', 'FY12303058', '2025-05-25', 2550, 5, 5, NULL, NULL),
(12, 'FOLEY CATHETER FR. 8 (ORMED)', 'PB2023-476', 'PIECE', 'FY1908034', '2028-10-24', 50, 10, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `message`, `recipient`, `created_at`, `status`) VALUES
(1, 'Pharmacy', 'testing1', 'Supply Office', '2024-10-08 03:24:20', 1),
(2, 'Central Supply Room', 'testing1', 'Supply Office', '2024-10-08 03:26:14', 1),
(3, 'Laboratory', 'testing1', 'Supply Office', '2024-10-08 03:26:22', 1),
(4, 'Supply Office', 'reply testing1', 'Pharmacy', '2024-10-08 03:26:39', 0),
(5, 'Supply Office', 'reply testing1', 'Laboratory', '2024-10-08 03:26:46', 0),
(6, 'Supply Office', 'reply testing1', 'Central Supply Room', '2024-10-08 03:26:53', 0),
(8, 'Central Supply Room', 'test2', 'Supply Office', '2024-10-08 10:52:29', 1),
(9, 'Supply Office', 'reply test2', 'Central Supply Room', '2024-10-08 10:52:47', 0),
(10, 'Supply Office', 'Hi', 'Central Supply Room', '2024-10-09 06:45:19', 0),
(11, 'Supply Office', 'test1', 'Pharmacy', '2024-10-09 07:01:33', 0),
(12, 'Supply Office', 'test2', 'Laboratory', '2024-10-09 07:01:37', 0),
(13, 'Supply Office', 'test', 'Central Supply Room', '2024-10-09 07:01:42', 0),
(14, 'Central Supply Room', 'hello', 'Supply Office', '2024-10-09 20:29:38', 1),
(15, 'Supply Office', 'tsrst', 'Pharmacy', '2024-10-13 14:24:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `batch_num` varchar(255) NOT NULL,
  `exp.date` date NOT NULL,
  `unit_value` int(11) NOT NULL,
  `stock_bal` int(11) NOT NULL,
  `onhand` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `product_name`, `product_num`, `unit_of_issue`, `batch_num`, `exp.date`, `unit_value`, `stock_bal`, `onhand`, `status`, `image_filename`) VALUES
(31, 'ALCOHOL, ISOPROPYL 70%', 'PR 597', 'PIECE', 'FY2011065', '2024-11-28', 68, 10, 3200, NULL, NULL),
(32, '3WAY STOPCOCK (POLYMED)', 'PR 004', 'PIECE', '1024122C', '2028-05-17', 68, 1, 1, 'Deleted', NULL),
(33, 'BABY\'S TAG, BLUE 100\'S (ORMED)', 'PR 004', 'PIECE', '20160225', '2030-10-12', 2, 1, 20, NULL, NULL),
(34, 'BLOOD BAG 450ML 10\'S', 'PR 909', 'BOX', '517200', '2026-09-26', 2500, 2, 2, NULL, NULL),
(35, '3WAY STOPCOCK (POLYMED)', 'PR 004', 'PIECE', '1024122C', '2028-05-17', 68, 1, 1, NULL, NULL),
(36, 'BABY\'S TAG, PINK 100\'S (ORMED)', 'PR 004', 'BOX', '20160225', '2030-11-21', 2, 450, 500, NULL, NULL),
(37, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 'PIECE', '20160225', '2030-02-13', 10, 33, 33, NULL, NULL),
(38, 'HEPLOCK (SURGITECH)', 'PR 597', 'PIECE', '22090101', '2028-11-27', 15, 10, 10, NULL, NULL),
(39, 'CONDOM CATHETER, MEDIUM(ORMED)', 'PB2022-476', 'PIECE', 'FY2011065', '2030-12-06', 64, 20, 20, NULL, NULL),
(40, '3 WAY STOPCOCK (POLYMED)', 'PR 004', 'PIECE', '1024122C', '2028-05-17', 68, 200, 170, NULL, NULL),
(41, 'ADHESIVE TAPE 1', 'PR 004', 'BOX', '202701H30', '2024-11-29', 795, 6, 10, NULL, '6720d1716ecf4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supply_office`
--

CREATE TABLE `supply_office` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `batch_num` varchar(255) NOT NULL,
  `exp.date` date NOT NULL,
  `unit_value` decimal(11,2) NOT NULL,
  `stock_bal` int(11) NOT NULL,
  `onhand` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_office`
--

INSERT INTO `supply_office` (`id`, `product_name`, `product_num`, `unit_of_issue`, `batch_num`, `exp.date`, `unit_value`, `stock_bal`, `onhand`, `status`, `image_filename`) VALUES
(16, 'ADHESIVE TAPE 1', 'PR 004', 'BOX', '202701H30', '2024-11-29', 795.00, 10, 294, NULL, '6720d1716ecf4.jpg'),
(17, 'ATR. CHROMIC 1, ROUND NEEDLE/TAPER (ETHICON)', 'PB2023-476', 'PIECE', '211227', '2029-11-26', 400.00, 50, 60, NULL, '67275f6c762a4.jpg'),
(18, 'ATR. ETHILON 3.0 REVERCE CUTTING (ETHICON)', 'LP', 'PIECE', 'QEBBPX', '2029-05-14', 445.00, 150, 150, NULL, '67275f90ad330.jpg'),
(19, 'BABY\'S TAG, BLUE 100\'S (ORMED)', 'PR 004', 'PIECE', '20160225', '2030-10-12', 2.50, 1449, 2000, NULL, '67275fe61a090.jpg'),
(20, 'BABY\'S TAG, PINK 100\'S (ORMED)', 'PR 004', 'BOX', '20160225', '2030-11-21', 2.50, 1469, 2000, 'Deleted', NULL),
(21, 'BLOOD BAG 450ML 10\'S', 'PR 909', 'BOX', '517200', '2026-09-26', 2500.00, 38, 50, NULL, '6727600eda3d9.jpg'),
(22, 'COLOSTOMY BAG (ORMED)', 'STERITEX', 'PIECE', '22090101', '2026-07-28', 40.00, 20, 20, NULL, '6727604f50258.jpg'),
(23, 'CONDOM CATHETER, LARGE (ORMED)', 'LP', 'PIECE', 'FY2011065', '2030-08-29', 60.00, 100, 100, NULL, '672760a971d61.jpg'),
(24, 'CONDOM CATHETER, MEDIUM(ORMED)', 'PB2022-476', 'PIECE', 'FY2011065', '2030-12-06', 64.00, 80, 100, NULL, '672760b517283.jpg'),
(25, 'CONDOM CATHETER, SMALL (ORMED)', 'PR 597', 'PIECE', 'FY2011065', '2030-03-22', 64.00, 37, 100, NULL, '672760bd6049c.jpg'),
(26, 'DISPOSABLE SYRINGE WITH NEEDLE 0.3ML (HRXH)', 'WESTELLAR', 'PIECE', '20211216', '2030-12-26', 25.00, 9570, 9600, NULL, '672760e451792.jpg'),
(27, 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 'PR 597', 'PIECE', '20160225', '2030-02-13', 10.00, 24657, 24800, NULL, '672760d7a86b0.jpg'),
(28, 'DOUBLE LUMEN CATHETER / HEMODIALYSIS KIT (ABLE)', 'PB2023-476', 'SET', 'T220408', '2027-04-25', 1400.00, 20, 20, NULL, '6727611c8adf0.jpg'),
(29, 'ECG ELECTRODES, 50\'S (ORMED)', 'PR 597', 'PACK', 'FY12303058', '2025-05-25', 2550.00, 20, 25, NULL, '67276136d0b0c.jpg'),
(30, 'ELASTIC BANDAGE 4', 'PB2023-476', 'ROLL', '202208', '2027-08-27', 31.50, 32, 47, NULL, '67276159c74d4.jpg'),
(31, 'ENDOTRACHEAL TUBE SIZE 2.0 (PARTNERS)', 'PB 2022-476', 'PIECE', '21120112559', '2026-11-26', 41.00, 20, 30, NULL, '67276171c104f.jpg'),
(32, 'FOLEY CATHETER FR. 8 (ORMED)', 'PB2023-476', 'PIECE', 'FY1908034', '2028-10-24', 50.00, 20, 30, NULL, '67276198dee27.jpg'),
(33, 'GUEDEL AIRWAY SIZE 1', 'PR 908', 'PIECE', '190729', '2026-08-25', 170.00, 30, 29, NULL, '67276201ab3bb.jpg'),
(34, 'GUEDEL AIRWAY SIZE 2 GREEN', 'PB 2022-476', 'PIECE', '20220825', '2027-06-27', 165.00, 20, 20, NULL, '6727621fc505d.jpg'),
(35, 'HEPLOCK (SURGITECH)', 'PR 597', 'PIECE', '22090101', '2028-11-27', 15.00, 957, 1000, NULL, '6727624d396aa.jpg'),
(36, 'HEXITIDINE 60ML (ORMED)', 'PR 004', 'BOTTLE', '230302', '2026-03-25', 150.00, 231, 290, NULL, '67276262a1921.jpg'),
(37, 'HYDROGEN PEROXIDE 500ML (APNC)', 'PR 004', 'BOTTLE', 'B2302006', '2025-02-25', 78.50, 121, 200, NULL, '672762774b794.jpg'),
(38, 'INSULIN SYRINGE', 'PR 908', 'PIECE', '200610', '2028-05-27', 9.50, 1485, 1500, NULL, '6727628da03c4.jpg'),
(39, 'IV CATHETER G.18 (B.BRAUN)', 'PB2023-476', 'PIECE', '22090101', '2028-09-28', 84.50, 390, 390, NULL, '672762a70f646.jpg'),
(40, 'NOASOGASTRIC TUBE FR.10 (PARTNERS)', 'PR 456', 'PIECE', 'MD22807901', '2026-05-28', 409.50, 100, 100, NULL, '672762ecc8a96.jpg'),
(41, 'NOASOGASTRIC TUBE FR.12 (SURGITECH)', 'STERITEX', 'PIECE', 'FY1908034', '2027-10-28', 405.00, 300, 300, NULL, '672762f740e9a.jpg'),
(42, 'NEBULIZING KIT (ORMED)', 'PR 004', 'PIECE', 'FY2011065', '2028-05-06', 109.50, 1434, 1980, NULL, '672762d470916.jpg'),
(43, 'ADHESIVE TAPE 1', 'PR 004', 'PIECE', '4831945', '2035-05-29', 50.00, 40, 50, NULL, '67275f1d0d282.jpg'),
(45, 'BLOOD BAG 450ML 10\'S', 'PR 909', 'BOX', '517200', '2025-03-04', 2500.00, 20, 20, NULL, '6720c7dbae616.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supply_requests`
--

CREATE TABLE `supply_requests` (
  `id` int(11) NOT NULL,
  `requested_quantity` int(11) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `onhand` int(11) NOT NULL,
  `warehouse` int(11) NOT NULL,
  `approvedqty` int(11) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Pending',
  `types` varchar(255) NOT NULL,
  `request_date` datetime DEFAULT current_timestamp(),
  `delivered` varchar(3) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_requests`
--

INSERT INTO `supply_requests` (`id`, `requested_quantity`, `unit_of_issue`, `product_name`, `onhand`, `warehouse`, `approvedqty`, `status`, `types`, `request_date`, `delivered`) VALUES
(45, 1, 'PIECE', '3WAY STOPCOCK (POLYMED)', 344, 280, 1, 'Admin Approved', 'pharmacy', '2024-10-01 22:26:31', 'Yes'),
(47, 100, 'PIECE', 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 0, 0, 50, 'Admin Approved', 'laboratory', '2024-10-02 09:05:10', 'Yes'),
(48, 100, 'PIECE', 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 24800, 24575, 100, 'Admin Approved', 'laboratory', '2024-10-02 09:16:33', 'Yes'),
(50, 33, 'PIECE', 'DISPOSABLE SYRINGE WITH NEEDLE 10CC (CARDINAL)', 24800, 24800, 33, 'Admin Approved', 'pharmacy', '2024-10-05 14:16:54', 'Yes'),
(54, 20, 'PIECE', 'CONDOM CATHETER, MEDIUM(ORMED)', 100, 100, 20, 'Admin Approved', 'pharmacy', '2024-10-09 20:34:55', 'Yes'),
(55, 10, 'PIECE', 'HEPLOCK (SURGITECH)', 1000, 1000, 10, 'Admin Approved', 'pharmacy', '2024-10-09 20:35:24', 'Yes'),
(56, 10, 'PIECE', 'FOLEY CATHETER FR. 8 (ORMED)', 30, 30, 10, 'Admin Approved', 'laboratory', '2024-10-09 20:41:22', 'Yes'),
(57, 5, 'PACK', 'ECG ELECTRODES, 50\'S (ORMED)', 25, 25, 5, 'Admin Approved', 'laboratory', '2024-10-09 20:49:42', 'Yes'),
(58, 15, 'ROLL', 'ELASTIC BANDAGE 4\" (SURGUTECH) 12\'S', 47, 47, 15, 'Admin Approved', 'laboratory', '2024-10-09 20:50:01', 'Yes'),
(59, 15, 'PIECE', 'INSULIN SYRINGE', 1500, 1500, 15, 'Admin Approved', 'laboratory', '2024-10-09 20:50:28', 'Yes'),
(60, 25, 'PIECE', 'NEBULAZING KIT (ORMED)', 1980, 1459, 25, 'Admin Approved', 'laboratory', '2024-10-09 20:50:46', 'Yes'),
(65, 10, 'PIECE', 'ATR. CHROMIC 1, ROUND NEEDLE/TAPER (ETHICON)', 60, 60, 10, 'Admin Approved', 'central_supply_office', '2024-10-09 23:21:45', 'Yes'),
(66, 20, 'PIECE', 'BABY\'S TAG, BLUE 100\'S (ORMED)', 2000, 1469, 20, 'Admin Approved', 'central_supply_office', '2024-10-09 23:22:35', 'Yes'),
(67, 20, 'PIECE', 'CONDOM CATHETER, SMALL (ORMED)', 100, 57, 20, 'Admin Approved', 'central_supply_office', '2024-10-09 23:23:26', 'Yes'),
(68, 30, 'PIECE', 'DISPOSABLE SYRINGE WITH NEEDLE 0.3ML (HRXH)', 9600, 9600, 30, 'Admin Approved', 'central_supply_office', '2024-10-09 23:23:38', 'Yes'),
(69, 10, 'PIECE', 'ENDOTRACHEAL TUBE SIZE 2.0 (PARTNERS)', 30, 30, 10, 'Admin Approved', 'central_supply_office', '2024-10-09 23:23:58', 'Yes'),
(70, 5000, 'PIECE', '3 WAY STOPCOCK (POLYMED)', 0, 0, 200, 'Admin Approved', 'pharmacy', '2024-10-10 07:04:45', 'Yes'),
(71, 10, 'BOX', 'ADHESIVE TAPE 1', 0, 0, 10, 'Admin Approved', 'pharmacy', '2024-11-04 23:54:23', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `used_items`
--

CREATE TABLE `used_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_num` varchar(100) NOT NULL,
  `unit_of_issue` varchar(50) NOT NULL,
  `batch_num` varchar(50) NOT NULL,
  `exp_date` date NOT NULL,
  `unit_value` decimal(10,2) NOT NULL,
  `used_quantity` int(11) NOT NULL,
  `used_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` varchar(255) NOT NULL,
  `onhand` int(255) NOT NULL,
  `stock_bal` int(255) NOT NULL,
  `issued` varchar(255) NOT NULL DEFAULT 'PATIENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `used_items`
--

INSERT INTO `used_items` (`id`, `product_name`, `product_num`, `unit_of_issue`, `batch_num`, `exp_date`, `unit_value`, `used_quantity`, `used_date`, `user`, `onhand`, `stock_bal`, `issued`) VALUES
(15, 'BABY\'S TAG, PINK 100\'S (ORMED)', 'PR 004', 'BOX', '20160225', '2030-11-21', 2.00, 25, '2024-11-05 16:14:48', 'pharmacy', 500, 500, 'PATIENT'),
(16, 'BABY\'S TAG, PINK 100\'S (ORMED)', 'PR 004', 'BOX', '20160225', '2030-11-21', 2.00, 25, '2024-11-05 16:15:10', 'pharmacy', 475, 500, 'PATIENT'),
(17, '3 WAY STOPCOCK (POLYMED)', 'PR 004', 'PIECE', '1024122C', '2028-05-17', 68.00, 30, '2024-11-06 10:48:17', 'pharmacy', 200, 200, 'PATIENT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `office`, `fullname`) VALUES
(1, 'csoffice', '33d03bc034472daba82b2ca4c2ede950', 'csoffice', 'Central Supply Office'),
(2, 'laboratory', '2e63a2fa2a70d228b8b7a7c2e9bf303d', 'laboratory', 'Laboratory'),
(3, 'pharmacy', 'b9c8d9e60105d490253285b096bf7488', 'pharmacy', 'Pharmacy'),
(4, 'supplyoffice', '43a1f8b19583fad6cb9ae42c596f8d4d', 'supplyoffice', 'Supply Office'),
(5, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 'Admin'),
(7, 'Glory', '3ea258cb9b2aa0096bd08ac8ab767d01', 'supplyoffice', 'Joseph Mangubat'),
(8, 'Dars', '37be3cb4ed5565ab8bb61460a14cfe5c', 'laboratory', 'Darren Ebanculla'),
(9, 'Hokori', '8ffe3d66b69d7330c9586571dbab114e', 'admin', 'Nathaniel Lucero');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `central_supply_office`
--
ALTER TABLE `central_supply_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_office`
--
ALTER TABLE `supply_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_requests`
--
ALTER TABLE `supply_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_items`
--
ALTER TABLE `used_items`
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
-- AUTO_INCREMENT for table `central_supply_office`
--
ALTER TABLE `central_supply_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `supply_office`
--
ALTER TABLE `supply_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `supply_requests`
--
ALTER TABLE `supply_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `used_items`
--
ALTER TABLE `used_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
