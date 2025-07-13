-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 07:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hound_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `countryId` int(11) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `zip_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `place_id`, `country`, `countryId`, `state`, `city`, `street`, `zip_code`) VALUES
(6, 16, 'UNITED STATES', 6252001, 'TEXAS', 'EL PASO', '47859 TEXAS ST.', '49965');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_shipping`
--

CREATE TABLE `assigned_shipping` (
  `id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `driver_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(2, 'test name');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `UM` varchar(20) COLLATE armscii8_bin NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `unit_value` decimal(10,0) NOT NULL,
  `total_value` decimal(10,0) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `UMW` varchar(10) COLLATE armscii8_bin NOT NULL,
  `shipper_no` varchar(30) COLLATE armscii8_bin NOT NULL,
  `type` varchar(20) COLLATE armscii8_bin NOT NULL,
  `merchandise_id` int(11) NOT NULL,
  `material_type` varchar(35) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `UM`, `amount`, `unit_value`, `total_value`, `weight`, `UMW`, `shipper_no`, `type`, `merchandise_id`, `material_type`) VALUES
(5, 'KG', '98547', '7854', '773988138', '7855', 'KG', '0003258', 'TYPE1', 4, ''),
(6, 'KG', '25', '150', '3750', '1200', 'KG', '0003258', 'FTL', 4, 'BREAK BULK'),
(8, 'KG', '150', '500', '75000', '200', 'KG', '0123456', 'FTL', 4, 'DRY BULK'),
(9, 'KG', '50', '30', '1500', '150', 'KG', '0123456', 'FTL', 4, 'DRY BULK');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_id` varchar(8) NOT NULL,
  `us_dot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `zip` int(5) NOT NULL,
  `country` varchar(30) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `street`, `city`, `state`, `zip`, `country`, `countryId`) VALUES
('04623265', 'JCR TRANSPORTES INTERNACIONALES DE MEXICO', '832 SOUTHWICK DR.', 'EL PASO', 'TEXAS', 79938, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customs`
--

CREATE TABLE `customs` (
  `id` int(11) NOT NULL,
  `shipper_no` int(11) NOT NULL,
  `arrive_date` varchar(11) COLLATE armscii8_bin NOT NULL,
  `arrive_time` varchar(5) COLLATE armscii8_bin NOT NULL,
  `departure_date` varchar(11) COLLATE armscii8_bin NOT NULL,
  `departure_time` varchar(5) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `license_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `lastname`, `driver_license`, `passport`, `phone_number`, `license_type`) VALUES
(5227409, 'gAAAAABlRDq-db_Mer_duZJgOTfMvQ7EkqKD_ghzuqtMTt5_zbj1xzQz_04jt3wgEh7m1Ah-RNcEAyZ11oqqgSFRzlU-qsaDng==', 'gAAAAABlRDq-63u5mG3ykTfTAlExJTvCABaknQjU9iwUNIlLDPCqiKfEYRSfe8IV6-Q8FU41rWvdDaS_7fkatoUwtMyKVrlozg==', 'gAAAAABlRDq-TsgHZxKIfAQkLvotDRWQ0vCqEQRiSnnIMBXBfKKRAaKD1gHgpPu0vnhgXTj3uMC8jtNCH_MMjkCoUt-2mqRm8Q==', 'gAAAAABlRDq-eJWISKnXFSuLRt1W2QQONH9quphkVgmI7wkkllaaJmJljcs5juJd0_X4_xurd1a1YOKgPaHbynpk2d9ATWtJtA==', 'gAAAAABlRDq-viD-j-f9TCwZHlU66AUSw2RXOQBvNL0nwZ08Jf97d3SHAg1sOpz1qJMSJfrh3NKLHWMWATep9gWtOs0OawHjew==', 'gAAAAABlRDq--M5eaXPcgEXnJnIDqGcxTr9_r1Wb7g5SzDJXj6WNFapDPAsM0VdBZapzp-i7jzYv8zmARjCMicVSrqFvnhGOMA==');

-- --------------------------------------------------------

--
-- Table structure for table `geolocation`
--

CREATE TABLE `geolocation` (
  `driver_id` int(9) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `altitude` varchar(20) NOT NULL,
  `accuracy` varchar(20) NOT NULL,
  `altitude_accuracy` varchar(20) NOT NULL,
  `heading` varchar(20) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `geolocation`
--

INSERT INTO `geolocation` (`driver_id`, `latitude`, `longitude`, `altitude`, `accuracy`, `altitude_accuracy`, `heading`, `speed`, `timestamp`, `id`) VALUES
(88185842, '0', '0', '0', '0', '0', '0', '0', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manifest`
--

CREATE TABLE `manifest` (
  `id` int(11) NOT NULL,
  `in_bond_number` int(11) NOT NULL,
  `url` text COLLATE armscii8_bin NOT NULL,
  `trip_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE armscii8_bin NOT NULL,
  `description` text COLLATE armscii8_bin NOT NULL,
  `brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `name`, `description`, `brand`) VALUES
(4, 'SOBRES', 'SOBRES DE IMPORTACION ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`) VALUES
(16, 'WALMART');

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(35) NOT NULL,
  `countryId` int(11) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `street`, `city`, `state`, `country`, `countryId`, `zip`) VALUES
(4, 'ZARAGOZA PORT OF ENTRY', 'ZARAGOZA AVE', 'EL PASO', 'TEXAS', '', 0, 79907),
(7, 'TEST PORT NAME', '874 SUN CITY', 'EL PASO', '3632306', 'VENEZUELA', 3625428, 78825);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `driver` int(8) NOT NULL,
  `truck` int(11) NOT NULL,
  `trailer` int(11) NOT NULL,
  `customer` varchar(8) NOT NULL,
  `port` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `weight` decimal(11,0) NOT NULL,
  `shipper_no` varchar(30) NOT NULL,
  `seal` varchar(50) NOT NULL,
  `comments` text NOT NULL,
  `UM` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_documents`
--

CREATE TABLE `shipping_documents` (
  `id` int(11) NOT NULL,
  `shipper_no` varchar(30) COLLATE armscii8_bin NOT NULL,
  `file_name` varchar(150) COLLATE armscii8_bin NOT NULL,
  `file_location` text COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `shipping_documents`
--

INSERT INTO `shipping_documents` (`id`, `shipper_no`, `file_name`, `file_location`) VALUES
(25, '0123456', 'Yahaira A Resume .docx', '/shipperDocuments/0123456/'),
(26, '0123456', 'Yahaira A Resume .pdf', '/shipperDocuments/0123456/');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_status`
--

CREATE TABLE `shipping_status` (
  `id` int(11) NOT NULL,
  `shipper_no` varchar(30) COLLATE armscii8_bin NOT NULL,
  `date` varchar(10) COLLATE armscii8_bin NOT NULL,
  `arrive_hour` varchar(5) COLLATE armscii8_bin NOT NULL,
  `origin` varchar(20) COLLATE armscii8_bin NOT NULL,
  `destiny` varchar(20) COLLATE armscii8_bin NOT NULL,
  `departour_hour` varchar(5) COLLATE armscii8_bin NOT NULL,
  `delivered` int(1) NOT NULL,
  `status` varchar(35) COLLATE armscii8_bin NOT NULL,
  `CBP` varchar(2) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `shipping_status`
--

INSERT INTO `shipping_status` (`id`, `shipper_no`, `date`, `arrive_hour`, `origin`, `destiny`, `departour_hour`, `delivered`, `status`, `CBP`) VALUES
(10, '0003258', '2022-09-03', '00:00', 'MOVARTEX PLANTA', 'MOVARTEX PLANTA', '00:00', 0, '', ''),
(11, '000785', '2022-09-03', '00:00', 'MOVARTEX PLANTA', 'MOVARTEX PLANTA', '00:00', 0, '', ''),
(12, '875757', '2022-10-28', '00:00', 'WALMART', 'WALMART', '00:00', 0, '', ''),
(13, '97458', '2022-10-22', '00:00', 'WALMART', 'WALMART', '00:00', 0, '', ''),
(14, '0123456', '2023-04-14', '00:00', 'WALMART', 'WALMART', '00:00', 0, 'Waiting Documents', '');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `trailer_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `plate_number` varchar(100) NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `truck_id` int(11) NOT NULL,
  `plate_number` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `model` varchar(11) NOT NULL,
  `vin_number` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `countryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`truck_id`, `plate_number`, `state`, `model`, `vin_number`, `country`, `countryId`) VALUES
(5, 'ZAAA1802', 'ILLINOIS', 'PETERBIL', '1HGBH41JXMN109184', '', 0),
(28728915, '5547TUAS', 'PORTUGUESA', 'SOME MODEL', '574WFASD', 'VENEZUELA', 3625428),
(41022241, '8547AEFA478', 'MITROVICA', 'HONDA', '747ARED78', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_shipping`
--
ALTER TABLE `assigned_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping` (`shipping_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipper_no` (`shipper_no`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customs`
--
ALTER TABLE `customs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `geolocation`
--
ALTER TABLE `geolocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifest`
--
ALTER TABLE `manifest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipper_no` (`shipper_no`),
  ADD KEY `driver` (`driver`),
  ADD KEY `truck` (`truck`),
  ADD KEY `trailer` (`trailer`),
  ADD KEY `customer` (`customer`),
  ADD KEY `port` (`port`);

--
-- Indexes for table `shipping_documents`
--
ALTER TABLE `shipping_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_status`
--
ALTER TABLE `shipping_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipper_no` (`shipper_no`),
  ADD UNIQUE KEY `shipper_no_3` (`shipper_no`),
  ADD KEY `shipper_no_2` (`shipper_no`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`trailer_id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`truck_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assigned_shipping`
--
ALTER TABLE `assigned_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customs`
--
ALTER TABLE `customs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geolocation`
--
ALTER TABLE `geolocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manifest`
--
ALTER TABLE `manifest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping_documents`
--
ALTER TABLE `shipping_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shipping_status`
--
ALTER TABLE `shipping_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_shipping`
--
ALTER TABLE `assigned_shipping`
  ADD CONSTRAINT `driver_id` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `shipping` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customer`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `driver` FOREIGN KEY (`driver`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `port` FOREIGN KEY (`port`) REFERENCES `ports` (`id`),
  ADD CONSTRAINT `trailer` FOREIGN KEY (`trailer`) REFERENCES `trailer` (`trailer_id`),
  ADD CONSTRAINT `truck` FOREIGN KEY (`truck`) REFERENCES `truck` (`truck_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
