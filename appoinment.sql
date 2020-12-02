-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 09:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appoinment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(11) NOT NULL,
  `DoctorId` int(11) DEFAULT NULL,
  `PatientId` int(11) DEFAULT NULL,
  `StartTime` varchar(55) DEFAULT NULL,
  `StopTime` varchar(55) DEFAULT NULL,
  `Period` varchar(55) DEFAULT NULL,
  `Fees` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `PhoneNo` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `DoctorId`, `PatientId`, `StartTime`, `StopTime`, `Period`, `Fees`, `Date`, `specialty`, `PhoneNo`, `Name`) VALUES
(4, 1, 4, '12:00', '13:00', 'Day', 5000, '2020-11-27', 'Bone', '03043285916', 'Adil');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int(11) NOT NULL,
  `Name` varchar(55) DEFAULT NULL,
  `Surname` varchar(55) DEFAULT NULL,
  `Specialty` varchar(55) DEFAULT NULL,
  `PhoneNo` varchar(55) DEFAULT NULL,
  `Priod` varchar(55) DEFAULT NULL,
  `DayTime` varchar(40) DEFAULT NULL,
  `Fees` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NightTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `Name`, `Surname`, `Specialty`, `PhoneNo`, `Priod`, `DayTime`, `Fees`, `Email`, `Password`, `NightTime`) VALUES
(1, 'Ali', 'Ansari', 'Bone', '0316', 'Day', '12:00-14:00', 5000, 'aliansari@gmail.com', '123456', 'null - null'),
(3, 'Anus', 'Qureshi', 'Heart', '03000000000', 'Day_Night', '12:00-14:00', 7000, 'anus@gmail.com', '123456', '22:00 - 23:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Id` int(11) NOT NULL,
  `Name` varchar(55) DEFAULT NULL,
  `Surname` varchar(55) DEFAULT NULL,
  `PhoneNo` varchar(55) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `Name`, `Surname`, `PhoneNo`, `Email`, `Password`) VALUES
(4, 'Hanzala Alam', 'Ansari', '0316', 'hanzala54@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DoctorId` (`DoctorId`),
  ADD KEY `PatientId` (`PatientId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`DoctorId`) REFERENCES `doctor` (`Id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`PatientId`) REFERENCES `patient` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
