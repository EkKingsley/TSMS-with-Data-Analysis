-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 09:58 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver_info_tbl`
--

CREATE TABLE `driver_info_tbl` (
  `driver_number` int(3) NOT NULL,
  `driver_fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `driver_lname` varchar(25) COLLATE utf8_bin NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_bin NOT NULL,
  `age` int(2) NOT NULL,
  `marital_status` enum('Single','Married','Divorced') COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `license_number` varchar(18) COLLATE utf8_bin NOT NULL,
  `license_deadline` date NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `driver_info_tbl`
--

INSERT INTO `driver_info_tbl` (`driver_number`, `driver_fname`, `driver_lname`, `gender`, `age`, `marital_status`, `phone`, `license_number`, `license_deadline`, `password`, `date_registered`, `vehicle_ID`) VALUES
(1, 'Elvis', 'Awor', 'Male', 46, 'Single', '0245332568', 'NAG-03102017-10785', '2024-04-01', 'adminone', '2020-03-13 21:42:46', 'WR 2416-13');

-- --------------------------------------------------------

--
-- Table structure for table `line_info_tbl`
--

CREATE TABLE `line_info_tbl` (
  `line_number` int(2) NOT NULL,
  `line_name` varchar(15) COLLATE utf8_bin NOT NULL,
  `stopping_point` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `line_info_tbl`
--

INSERT INTO `line_info_tbl` (`line_number`, `line_name`, `stopping_point`) VALUES
(1, 'Techiman', 'Techiman Station');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `receiver` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `receiver`, `type`, `time`) VALUES
(1, 'Ek', 'Admin', 'Passenger Comment', '2020-03-14 14:59:44'),
(2, 'Anthony', 'Admin', 'Passenger Comment', '2020-03-14 15:03:30'),
(3, 'Moses', 'Admin', 'Passenger Comment', '2020-03-14 15:04:38'),
(4, 'Chris', 'Admin', 'Passenger Comment', '2020-03-16 12:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_comment_tbl`
--

CREATE TABLE `passenger_comment_tbl` (
  `comment_number` int(11) NOT NULL,
  `comment` varchar(100) COLLATE utf8_bin NOT NULL,
  `passenger_name` varchar(25) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `passenger_comment_tbl`
--

INSERT INTO `passenger_comment_tbl` (`comment_number`, `comment`, `passenger_name`, `phone`, `date`, `vehicle_ID`) VALUES
(1, 'This is only a trial comment. But the driver oversped tho.', 'Ek', '0242564352', '2020-03-14 14:59:44', 'WR 2416-13'),
(2, 'Driver was rude to me.', 'Esi', '0543278901', '2020-03-14 15:01:40', 'WR 2416-13'),
(3, 'Driver drive really well.', 'Anthony', '0202356984', '2020-03-14 15:03:30', 'WR 2416-13'),
(4, 'Driver charged too much.', 'Moses', '0230876543', '2020-03-14 15:04:38', 'WR 2416-13'),
(5, 'Driver is drunk driving.', 'Chris', '0204568543', '2020-03-16 12:50:31', 'WR 2416-13');

-- --------------------------------------------------------

--
-- Table structure for table `station_dues_record`
--

CREATE TABLE `station_dues_record` (
  `dues_number` int(11) NOT NULL,
  `status` enum('paid','unpaid') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `vehicle_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin_tbl`
--

CREATE TABLE `userlogin_tbl` (
  `user_ID` int(11) NOT NULL,
  `user_name` enum('driver','admin','dues collector') COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userlogin_tbl`
--

INSERT INTO `userlogin_tbl` (`user_ID`, `user_name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'dues collector', 'dues'),
(3, 'driver', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_accident_record`
--

CREATE TABLE `vehicle_accident_record` (
  `accident_recordNumber` int(11) NOT NULL,
  `location_of_accident` varchar(40) COLLATE utf8_bin NOT NULL,
  `cause_of_accident` varchar(100) COLLATE utf8_bin NOT NULL,
  `tot_number_of_Passengers` int(2) NOT NULL,
  `number_dead` int(2) NOT NULL,
  `number_injured` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_accident_record`
--

INSERT INTO `vehicle_accident_record` (`accident_recordNumber`, `location_of_accident`, `cause_of_accident`, `tot_number_of_Passengers`, `number_dead`, `number_injured`, `date`, `vehicle_ID`) VALUES
(1, 'Techiman main road', 'Overspeeding', 15, 1, 5, '2020-03-14 22:20:38', 'WR 2416-13');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info_tbl`
--

CREATE TABLE `vehicle_info_tbl` (
  `vehicle_number` int(3) NOT NULL,
  `model` varchar(15) COLLATE utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  `odometer_reading` int(10) NOT NULL,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL,
  `line_number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_info_tbl`
--

INSERT INTO `vehicle_info_tbl` (`vehicle_number`, `model`, `year`, `odometer_reading`, `vehicle_ID`, `line_number`) VALUES
(1, 'opel astra', 2014, 123456, 'WR 1452-09', 1),
(2, 'corolla', 2016, 132781, 'WR 1710-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_maintenance_tbl`
--

CREATE TABLE `vehicle_maintenance_tbl` (
  `record_number` int(11) NOT NULL,
  `maintenance_station` varchar(30) COLLATE utf8_bin NOT NULL,
  `service_performed` varchar(150) COLLATE utf8_bin NOT NULL,
  `serviced_by` varchar(25) COLLATE utf8_bin NOT NULL,
  `maintenance_cost` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_operation_tbl`
--

CREATE TABLE `vehicle_operation_tbl` (
  `operation_number` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trip_startTime` time NOT NULL,
  `trip_startLocation` varchar(15) COLLATE utf8_bin NOT NULL,
  `trip_start_OdometerReading` int(10) NOT NULL,
  `trip_endTime` time NOT NULL,
  `trip_endLocation` varchar(15) COLLATE utf8_bin NOT NULL,
  `trip_end_OdometerReading` int(10) NOT NULL,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_violation_record`
--

CREATE TABLE `vehicle_violation_record` (
  `vv_number` int(11) NOT NULL,
  `violation_reasons` varchar(150) COLLATE utf8_bin NOT NULL,
  `penalisation` enum('Fine','Dismissal') COLLATE utf8_bin NOT NULL,
  `Note_on_penalisation` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicle_ID` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_violation_record`
--

INSERT INTO `vehicle_violation_record` (`vv_number`, `violation_reasons`, `penalisation`, `Note_on_penalisation`, `date`, `vehicle_ID`) VALUES
(1, 'Drink driving', 'Dismissal', '3 weeks dismissal', '2020-03-14 21:29:49', 'WR 2416-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver_info_tbl`
--
ALTER TABLE `driver_info_tbl`
  ADD PRIMARY KEY (`driver_number`);

--
-- Indexes for table `line_info_tbl`
--
ALTER TABLE `line_info_tbl`
  ADD PRIMARY KEY (`line_number`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_comment_tbl`
--
ALTER TABLE `passenger_comment_tbl`
  ADD PRIMARY KEY (`comment_number`);

--
-- Indexes for table `station_dues_record`
--
ALTER TABLE `station_dues_record`
  ADD PRIMARY KEY (`dues_number`);

--
-- Indexes for table `userlogin_tbl`
--
ALTER TABLE `userlogin_tbl`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `vehicle_accident_record`
--
ALTER TABLE `vehicle_accident_record`
  ADD PRIMARY KEY (`accident_recordNumber`);

--
-- Indexes for table `vehicle_info_tbl`
--
ALTER TABLE `vehicle_info_tbl`
  ADD PRIMARY KEY (`vehicle_number`);

--
-- Indexes for table `vehicle_maintenance_tbl`
--
ALTER TABLE `vehicle_maintenance_tbl`
  ADD PRIMARY KEY (`record_number`);

--
-- Indexes for table `vehicle_operation_tbl`
--
ALTER TABLE `vehicle_operation_tbl`
  ADD PRIMARY KEY (`operation_number`);

--
-- Indexes for table `vehicle_violation_record`
--
ALTER TABLE `vehicle_violation_record`
  ADD PRIMARY KEY (`vv_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver_info_tbl`
--
ALTER TABLE `driver_info_tbl`
  MODIFY `driver_number` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `line_info_tbl`
--
ALTER TABLE `line_info_tbl`
  MODIFY `line_number` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passenger_comment_tbl`
--
ALTER TABLE `passenger_comment_tbl`
  MODIFY `comment_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `station_dues_record`
--
ALTER TABLE `station_dues_record`
  MODIFY `dues_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlogin_tbl`
--
ALTER TABLE `userlogin_tbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_accident_record`
--
ALTER TABLE `vehicle_accident_record`
  MODIFY `accident_recordNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_info_tbl`
--
ALTER TABLE `vehicle_info_tbl`
  MODIFY `vehicle_number` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_maintenance_tbl`
--
ALTER TABLE `vehicle_maintenance_tbl`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_operation_tbl`
--
ALTER TABLE `vehicle_operation_tbl`
  MODIFY `operation_number` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_violation_record`
--
ALTER TABLE `vehicle_violation_record`
  MODIFY `vv_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
