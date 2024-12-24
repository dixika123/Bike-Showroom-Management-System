-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 08:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jawanp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `AID` int(11) NOT NULL,
  `accessory_name` varchar(255) NOT NULL,
  `accessory_image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`AID`, `accessory_name`, `accessory_image`, `price`, `available`) VALUES
(6, 'Back Rest', 'BackRest.png', 9500.00, 'Y'),
(8, 'Crash Guard', 'CrashGuard.png', 8000.00, 'Y'),
(9, 'Bike Cover', 'bike cover.png', 700.00, 'N'),
(10, 'Emblishment', 'Emblishment.png', 9500.00, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `accessories_order`
--

CREATE TABLE `accessories_order` (
  `OID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Password`) VALUES
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `BikeID` int(10) NOT NULL,
  `Model` varchar(200) NOT NULL,
  `Bikeimage` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Mileage` varchar(100) NOT NULL,
  `Descriptions` varchar(255) NOT NULL,
  `Available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`BikeID`, `Model`, `Bikeimage`, `Price`, `Mileage`, `Descriptions`, `Available`) VALUES
(11, 'Perak', 'perakpic.png', 850000.00, '40', 'CAPACITY-334cc\r\nMAX POWER-30.64BHP\r\n', 'N'),
(12, 'yezdi scrambler', 'scram.png', 950000.00, '30', 'Engine Power 29.1hp ', 'Y'),
(13, 'Yezdi Adventure', 'adventurepic.png', 880000.00, '35', 'Adventure BIke op', 'Y'),
(14, 'JAWA 42', 'Jawa42pic.png', 450000.00, '35', 'Forty two is the best', 'Y'),
(15, 'Yezdi Roadster', 'Roadsterpic.png', 916000.00, '30', 'The Yezdi Roadster is powered by 334cc BS6 engine which develops a power of 29.23 bhp and a torque of 28.95 Nm.', 'Y'),
(16, 'Jawa 350', 'JawaClassicpic.png', 485000.00, '25', 'air-cooled four-stroke single-cylinder with Delphi electronic injection', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `bookjawa`
--

CREATE TABLE `bookjawa` (
  `BookID` int(10) NOT NULL,
  `BikeID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BookPlace` varchar(255) NOT NULL,
  `BookDate` date NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Mobile_Number` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `BookStatus` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookjawa`
--

INSERT INTO `bookjawa` (`BookID`, `BikeID`, `Email`, `BookPlace`, `BookDate`, `Customer_Name`, `Mobile_Number`, `Price`, `BookStatus`) VALUES
(41, 14, 'dixika1000@gmail.com', 'Uttardhoka', '2024-05-23', 'dixika', 2147483647, 450000, 'Pending'),
(42, 11, 'anil123@gmail.com', 'teku', '2024-05-22', 'anil', 2147483647, 850000, 'Pending'),
(45, 14, 'dixika1000@gmail.com', 'Uttardhoka', '2024-06-03', 'anil', 2147483647, 450000, 'Pending'),
(47, 12, 'kri18happy@gmail.com', 'Kathmandu', '2024-06-10', 'Krinesh Maharjan', 2147483647, 950000, 'Pending'),
(49, 12, 'kri18happy@gmail.com', 'Kathmandu', '2024-06-10', 'Krinesh Maharjan', 2147483647, 950000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `EID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MobileNo` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `AgeGroup` varchar(255) NOT NULL,
  `BikeModel` varchar(255) NOT NULL,
  `FollowUpDetails` text DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`EID`, `Name`, `Email`, `MobileNo`, `Address`, `Occupation`, `AgeGroup`, `BikeModel`, `FollowUpDetails`, `Status`) VALUES
(14, 'Bishal', 'dixika1000@gmail.com', '9860820021', 'Imadol', 'Teacher', 'b', 'Roadster', 'visiting today evening', 'Followed Up'),
(15, 'Lashiv', 'lashiv@gmail.com', '9851061611', 'kritipur', 'student', 'a', 'Adventure', NULL, 'Pending'),
(16, 'Bibek', 'bibek@gmail.com', '94515464875', 'Bhaisepati', 'Doctor', 'b', 'Perak', NULL, 'Pending'),
(18, 'Krinesh', 'Krinesh@gmail.com', '9860251245', 'Imadol', 'Student', 'a', 'Jawa 42', NULL, 'Pending'),
(19, 'Pranish', 'Pranish@gmail.com', '9841525252', 'Dallu', 'Teacher', 'c', 'Perak', 'Will visit on 18th June.', 'Followed Up');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `BikeModel` varchar(100) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `style` int(1) DEFAULT NULL,
  `comfort` int(1) DEFAULT NULL,
  `power` int(1) DEFAULT NULL,
  `suspension` int(1) DEFAULT NULL,
  `overall` int(1) DEFAULT NULL,
  `experience` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp` int(11) NOT NULL,
  `user_id` int(121) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedID`, `Name`, `BikeModel`, `Phone`, `Email`, `date`, `style`, `comfort`, `power`, `suspension`, `overall`, `experience`, `submission_date`, `otp`, `user_id`) VALUES
(35, 'Sybill Mathews', 'Yezdi Adventure', '9860820021', 'qunepyra@mailinator.com', '0000-00-00', 4, 3, 3, 4, 0, 'ok', '2024-06-16 16:52:04', 284468, 6),
(36, 'Wade Noble', 'yezdi scrambler', '9841526352', 'wivugykyn@mailinator.com', '2024-06-16', 3, 3, 3, 3, 4, 'Fair only!', '2024-06-16 16:53:47', 693929, 6),
(43, 'Clio Taylor', 'Yezdi Adventure', '9852121212', 'myxagin@mailinator.com', '0000-00-00', 4, 3, 4, 4, 4, 'Lovely experience', '2024-06-16 17:06:56', 765010, 6),
(44, 'Amanda Walton', 'Perak', '9874568955', 'genu@mailinator.com', '0000-00-00', 4, 3, 3, 3, 0, 'I loved the bike a lot', '2024-06-16 17:12:14', 656619, 6),
(45, 'Maya Goodman', 'Yezdi Adventure', '9874512312', 'wunicude@mailinator.com', '0000-00-00', 3, 3, 3, 3, 0, 'good cha ekdum', '2024-06-16 18:14:34', 450595, 16),
(46, 'Claire Lawrence', 'Yezdi Adventure', '9860820021', 'cybi@mailinator.com', '0000-00-00', 4, 3, 3, 3, 4, 'damiii', '2024-06-16 18:21:01', 499759, 16);

-- --------------------------------------------------------

--
-- Table structure for table `follow_up_details`
--

CREATE TABLE `follow_up_details` (
  `follow_up_id` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `messages` text NOT NULL,
  `bike_model` int(11) NOT NULL,
  `follow_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawauser`
--

CREATE TABLE `jawauser` (
  `id` int(10) UNSIGNED NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `LicenceNo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawauser`
--

INSERT INTO `jawauser` (`id`, `FName`, `LName`, `Phone`, `Email`, `LicenceNo`, `Password`) VALUES
(6, 'Anil', 'Dangol', 2147483647, 'anil123@gmail.com', '123456789', 'e308a6f03b77f1a72cfb0a6c875e2fa516df8ab8'),
(7, 'Dixika', 'Maskey', 2147483647, 'dixika1000@gmail.com', '353535', 'd2c2d11d8850f1458e7463a68fb7b9d83e0aded4'),
(8, 'User', '123', 2147483647, 'user123@gmail.com', '12121212', '40430383aa399ef2c3af8ef4232d660fb93b057a'),
(9, 'abc', 'xyz', 2147483647, 'abc@gmail.com', '10101010', 'd9285791470b141a67a3a6c111d526d32672d60a'),
(10, 'test', 'test', 1234567890, 'test@gmail.com', '1234567890', '719855e8f4ebd94341277b0b0d50b75c5187133f'),
(11, 'Kree', 'Maharjan', 2147483647, 'kri18happy@gmail.com', '03-06-01040831', '2b12e1a2252d642c09f640b63ed35dcc5690464a'),
(12, 'Kreenesh', 'Maharjan', 2147483647, 'kri19happy@gmail.com', '03-06-01040831', 'b158a5bdfedb931525c2e5984ecdd582fd29cad9'),
(13, 'Dixika', 'Shrestha', 2147483647, 'dixikaM@gmail.com', '10111011', '32fcbe4acc0348d332886cbd10b883e23be09cfa');

-- --------------------------------------------------------

--
-- Table structure for table `motors`
--

CREATE TABLE `motors` (
  `MotorID` int(11) NOT NULL,
  `MotorName` varchar(255) NOT NULL,
  `MotorImage` varchar(255) NOT NULL,
  `MotorPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PayID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `CardNo` varchar(255) NOT NULL,
  `ExpDate` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PayID`, `BookID`, `CardNo`, `ExpDate`, `CVV`, `Price`) VALUES
(1, 32, '1212 1221 1221 1', '12/12', 100, 850000),
(2, 33, '1010101010101010', '12/12', 111, 950000),
(3, 38, '1234123412341234', '12\\12', 100, 850000),
(4, 39, '5555555555555555', '12/12', 111, 950000),
(5, 40, '1245784512', '12/12', 888, 880000),
(6, 41, '4512316546532132', '12/12', 0, 450000),
(7, 42, '1515151515555151', '12/12', 121, 850000),
(8, 43, '12345678456', '12/12', 999, 850000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pidx` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `purchase_order_id` varchar(255) DEFAULT NULL,
  `purchase_order_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pidx`, `amount`, `status`, `transaction_id`, `purchase_order_id`, `purchase_order_name`, `mobile`, `created_at`) VALUES
(3, '8hHbUrjr6q7sWhmoehTymh', 800000, 'Completed', 'oWMZYhCat3DoZS3vJiJTuW', 'Order01', 'test', '98XXXXX005', '2024-06-15 14:16:03'),
(4, '5ryKiVfeuVykTdJcAHuRGT', 950000, 'Completed', 'bT7JLtud7yBnTMyMKnvSn7', 'Order01', 'test', '98XXXXX005', '2024-06-16 05:39:21'),
(5, 'mmzGfCmuSSphpx2KeFLvoZ', 850000, 'Completed', '2E799Q2kLC3vrGJJJv8s6J', 'Order01', 'test', '98XXXXX005', '2024-06-16 08:20:34'),
(6, 'Xw2BasppdCR2SAVyLe4mTf', 850000, 'Completed', 'dGscMNhevLLdRSat3LieoA', 'Order01', 'test', '98XXXXX005', '2024-06-16 08:31:02'),
(7, 'hDMZjtW6LL3YWzy3eGuj4W', 850000, 'Completed', 'dZHv9JLMoh6T76SqpSp3w3', 'Order01', 'test', '98XXXXX005', '2024-06-16 08:46:51'),
(8, 'ta3qnBqtc8ah4vxygW9M6C', 450000, 'Completed', '6akMWUe93BTBpFEhwKtNkW', 'Order01', 'test', '98XXXXX005', '2024-06-16 13:34:39'),
(9, 'NhUfB7AMxGiszq6PhfifY5', 880000, 'User canceled', '', 'Order01', 'test', '', '2024-06-16 13:42:16'),
(11, 'EPT5EVEUWWgQkLGo3yp6oJ', 450000, 'User canceled', '', 'Order01', 'test', '', '2024-06-16 13:57:12'),
(12, 'PMTNFxDmZNaBfVPw6jtPKi', 950000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 14:00:23'),
(13, 'PMTNFxDmZNaBfVPw6jtPKi', 950000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 14:02:24'),
(14, 'Jd4xvTaMSRSEUCQFJwhTia', 950000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 14:03:22'),
(15, 'NZLcdrN8Mcqu2uvqQSeT6R', 950000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 14:05:00'),
(16, 'L5dYo9y7ca3M39kYcLDXm2', 450000, 'Completed', '5szMZt87Rhf8KrnaTngidF', 'Order01', 'test', '98XXXXX005', '2024-06-16 14:05:45'),
(17, 'QFmfnVQ9drpdqLdDyQN6QA', 950000, 'Completed', 'bsbbxzXEfXjbcUvp9q8FXH', 'Order01', 'test', '98XXXXX005', '2024-06-16 14:06:42'),
(18, 'qZ9TgxWFyhNdwF5tV8gT7Y', 916000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 14:53:53'),
(19, 'n7EpheM4AM3cAfC6DVatqh', 950000, 'Completed', 'gWybWXVviKqWpgkDkCC3B6', 'Order01', 'test', '98XXXXX005', '2024-06-16 14:58:05'),
(20, 'WbpyTEAWTFpnEA8W3awwoL', 950000, 'Completed', 'AmcHXgXJBU8k73XTjeoUoZ', 'Order01', 'test', '98XXXXX005', '2024-06-16 17:14:29'),
(21, 'GKiq8ntADgoXwj7EenKsXW', 950000, 'Completed', 'FadVMbao9F2ne5jDZgPMaj', 'Order01', 'test', '98XXXXX005', '2024-06-16 17:38:40'),
(22, 'tRdFSBNNbFLpTasfR5kGZd', 800000, 'User canceled', NULL, 'Order01', 'test', NULL, '2024-06-16 17:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `testride`
--

CREATE TABLE `testride` (
  `testID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `LicenceNo` bigint(255) NOT NULL,
  `BikeModel` varchar(255) NOT NULL,
  `TRDate` date NOT NULL,
  `TRTime` time NOT NULL,
  `otp` int(11) NOT NULL,
  `otp_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testride`
--

INSERT INTO `testride` (`testID`, `Name`, `Phone`, `Email`, `Address`, `LicenceNo`, `BikeModel`, `TRDate`, `TRTime`, `otp`, `otp_verified`) VALUES
(41, 'aaa', '9860820021', 'dixika1000@gmail.com', 'Imadol', 20202020, 'Perak', '2024-06-01', '11:13:00', 557556, 1),
(42, 'Dixika Shrestha', '9860820021', 'dixika1000@gmail.com', 'Imadol', 525252, 'Jawa 350', '2024-06-02', '05:36:00', 337882, NULL),
(43, 'Dixika Shrestha', '9860820021', 'dixika1000@gmail.com', 'Imadol', 525252, 'Jawa 350', '2024-06-01', '11:36:00', 653363, 1),
(44, 'Dixika Shrestha', '9860820021', 'dixika1000@gmail.com', 'Imadol', 535353, 'Roadster', '2024-06-02', '13:38:00', 848433, 1),
(45, 'Dixika Shrestha', '9860820021', 'dixika1000@gmail.com', 'Imadol', 111111, 'Scrambler', '2024-06-02', '13:40:00', 364459, 1),
(46, 'Anita', '9841421099', 'dixika1000@gmail.com', 'Bhaisepati', 12458956, 'Perak', '2024-06-16', '10:11:00', 146059, 1),
(47, 'Iha', '9874568955', 'dixika1000@gmail.com', 'KTM', 12456598, 'Scrambler', '2024-06-16', '09:15:00', 193613, 1),
(48, 'ABC', '9860820021', 'dixika1000@gmail.com', 'KTM', 11111111, 'Jawa 42', '2024-06-16', '09:22:00', 467026, 1),
(49, 'Ram', '9860820021', 'dixika1000@gmail.com', 'teku', 2222222, 'Adventure', '2024-06-16', '09:34:00', 734350, 1),
(50, 'Ram', '9860820021', 'dixika1000@gmail.com', 'teku', 2222222, 'Adventure', '2024-06-16', '09:34:00', 706946, NULL),
(51, 'Aman', '9860820021', 'dixika1000@gmail.com', 'baneswor', 20202020, 'Jawa 42', '2024-06-16', '12:39:00', 981867, 1),
(52, 'Amena Grant', '9845334511', 'fitem@mailinator.com', 'Ex accusantium sint ', 0, 'yezdi scrambler', '2024-06-16', '01:57:00', 448545, 1),
(53, 'Amena Grant', '9845334511', 'fitem@mailinator.com', 'Ex accusantium sint ', 0, 'yezdi scrambler', '2024-06-16', '01:57:00', 633054, 1),
(54, 'Kim Harrell', '1234567890', 'quron@mailinator.com', 'Exercitation amet i', 0, 'Perak', '2024-06-16', '19:26:00', 840132, 1),
(55, 'Sybill Mathews', '9860820021', 'qunepyra@mailinator.com', 'Laboris exercitation', 0, 'Yezdi Adventure', '2024-06-16', '09:08:00', 284468, 1),
(56, 'Wade Noble', '9841526352', 'wivugykyn@mailinator.com', 'Vel saepe eveniet e', 0, 'yezdi scrambler', '2024-06-16', '18:31:00', 693929, 1),
(57, 'Dixika Maskey', '9860820021', 'dixika1000@gmail.com', 'Imadol', 1245789, 'Yezdi Adventure', '2024-06-16', '12:42:00', 339562, 1),
(58, 'Cecilia Sandoval', '9841421099', 'qobyhet@mailinator.com', 'Inventore rerum volu', 0, 'Jawa 350', '2024-06-16', '12:59:00', 329761, 1),
(59, 'Clio Taylor', '9852121212', 'myxagin@mailinator.com', 'Voluptate sunt beata', 0, 'Yezdi Adventure', '2024-06-16', '08:15:00', 765010, 1),
(60, 'Amanda Walton', '9874568955', 'genu@mailinator.com', 'Lorem aut nisi et au', 0, 'Perak', '2024-06-16', '16:17:00', 656619, 1),
(61, 'Cassady Cooley', '9841526352', 'xunem@mailinator.com', 'Odit architecto unde', 0, 'JAWA 42', '2024-06-16', '01:46:00', 806633, NULL),
(62, 'Cassady Cooley', '9841526352', 'xunem@mailinator.com', 'Odit architecto unde', 0, 'JAWA 42', '2024-06-16', '01:46:00', 180085, NULL),
(63, 'Jerome Bowers', '9860820021', 'lezegy@mailinator.com', 'Alias et laboris con', 525252, 'Yezdi Roadster', '2024-06-16', '11:52:00', 934776, NULL),
(64, 'Maya Goodman', '9874512312', 'wunicude@mailinator.com', 'Quo voluptas eiusmod', 0, 'Yezdi Adventure', '2024-06-16', '20:42:00', 450595, 1),
(65, 'Claire Lawrence', '9860820021', 'cybi@mailinator.com', 'Quis ut necessitatib', 0, 'Yezdi Adventure', '2024-06-17', '23:04:00', 499759, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `accessories_order`
--
ALTER TABLE `accessories_order`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `fk_aid` (`AID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `AdminID` (`AdminID`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`BikeID`);

--
-- Indexes for table `bookjawa`
--
ALTER TABLE `bookjawa`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `BikeID` (`BikeID`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedID`);

--
-- Indexes for table `follow_up_details`
--
ALTER TABLE `follow_up_details`
  ADD PRIMARY KEY (`follow_up_id`),
  ADD KEY `EID` (`EID`);

--
-- Indexes for table `jawauser`
--
ALTER TABLE `jawauser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motors`
--
ALTER TABLE `motors`
  ADD PRIMARY KEY (`MotorID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PayID`),
  ADD UNIQUE KEY `BookID` (`BookID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testride`
--
ALTER TABLE `testride`
  ADD PRIMARY KEY (`testID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `accessories_order`
--
ALTER TABLE `accessories_order`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `BikeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bookjawa`
--
ALTER TABLE `bookjawa`
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `follow_up_details`
--
ALTER TABLE `follow_up_details`
  MODIFY `follow_up_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawauser`
--
ALTER TABLE `jawauser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `motors`
--
ALTER TABLE `motors`
  MODIFY `MotorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testride`
--
ALTER TABLE `testride`
  MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessories_order`
--
ALTER TABLE `accessories_order`
  ADD CONSTRAINT `fk_aid` FOREIGN KEY (`AID`) REFERENCES `accessories` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookjawa`
--
ALTER TABLE `bookjawa`
  ADD CONSTRAINT `bookjawa_ibfk_1` FOREIGN KEY (`BikeID`) REFERENCES `bikes` (`BikeID`);

--
-- Constraints for table `follow_up_details`
--
ALTER TABLE `follow_up_details`
  ADD CONSTRAINT `follow_up_details_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `enquiry` (`EID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
