-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 11:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `city_name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `city_name`, `address`, `time`) VALUES
(1, 'Enugu', 'No 10 Abakpa', '2022-02-24 21:56:58'),
(2, 'Lagos', 'Ikeja', '2022-02-24 21:56:58'),
(3, 'Onitsha', 'Onitsha', '2022-02-24 21:58:07'),
(4, 'Owerre', 'Owerre', '2022-02-24 21:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `shipper_name` varchar(225) NOT NULL,
  `shipper_phone` varchar(225) NOT NULL,
  `shipper_address` varchar(225) NOT NULL,
  `reciever_name` varchar(225) NOT NULL,
  `reciever_phone` varchar(225) NOT NULL,
  `reciever_address` varchar(225) NOT NULL,
  `consignment_id` varchar(225) NOT NULL,
  `from_city` varchar(225) NOT NULL,
  `to_city` varchar(225) NOT NULL,
  `vehicle_number` varchar(225) NOT NULL,
  `driver_name` varchar(225) NOT NULL,
  `consignment_weight` varchar(225) NOT NULL,
  `tracking_number` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `date_arrived` varchar(225) NOT NULL,
  `date_claimed` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `name`, `number`, `shipper_name`, `shipper_phone`, `shipper_address`, `reciever_name`, `reciever_phone`, `reciever_address`, `consignment_id`, `from_city`, `to_city`, `vehicle_number`, `driver_name`, `consignment_weight`, `tracking_number`, `status`, `date_arrived`, `date_claimed`, `time`) VALUES
(1, 'Obiora', '08147078588', 'Obiora hillary', '+2347033606960', 'Nsukka', 'Obiora hillary', '+2347033606960', 'No 5 ikeja, lagos', '0051', 'Enugu', 'Lagos', '18', 'Mr. James', '50', '47039863', 'In-transit', '', '', '2022-02-25 00:14:58'),
(2, 'Hillary', '08144455543', 'Hillary ceejay', '+234912343455', 'lekki', 'Emeka', '+2347033606960', 'Nsukka', '0034', 'Lagos', 'Enugu', '12', 'Mr.Tony', '100', '62428105', 'Claimed', '2022-02-28 02:43:17', '2022-02-28 02:46:54', '2022-02-25 02:24:50'),
(4, 'Obiora', '08147078588', 'mike', '+2347033606960', 'unn', 'james', '+2347033606960', 'no 3 ikeja', '4', 'Enugu', 'Lagos', '14', 'Mr. moses', '70', '86099426', 'In-transit', '', '', '2022-02-26 01:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `branch` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `email`, `password`, `number`, `address`, `branch`, `time`) VALUES
(1, 'Obiora', 'obi@gmail.com', 'obiora', '08147078589', 'New heaven', 'Enugu', '2022-02-24 12:35:19'),
(2, 'hillary', 'hillary@gmail.com', 'hillary', '08147078588', 'Lagos', 'Lagos', '2022-02-25 02:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
