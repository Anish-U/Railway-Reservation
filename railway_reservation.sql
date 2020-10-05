-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 09:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancel_details`
--

CREATE TABLE `cancel_details` (
  `ticket_id` varchar(10) NOT NULL,
  `cancel_date` varchar(10) NOT NULL,
  `cancel_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancel_details`
--

INSERT INTO `cancel_details` (`ticket_id`, `cancel_date`, `cancel_time`) VALUES
('790', '05 October', '09:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `coach_price`
--

CREATE TABLE `coach_price` (
  `coach_type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_price`
--

INSERT INTO `coach_price` (`coach_type`, `price`) VALUES
('AC', 1300),
('CHAIRCAR', 550),
('GENERAL', 450),
('NON-AC', 850),
('SPL', 2050);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE `passenger_details` (
  `passenger_id` varchar(10) NOT NULL,
  `name` varchar(35) NOT NULL,
  `age` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger_details`
--

INSERT INTO `passenger_details` (`passenger_id`, `name`, `age`, `gender`, `seat_no`) VALUES
('26249', 'Anish', '19', 'male', 16),
('97484', 'Anish', '19', 'male', 70);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_ticket`
--

CREATE TABLE `passenger_ticket` (
  `passenger_id` varchar(10) NOT NULL,
  `ticket_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger_ticket`
--

INSERT INTO `passenger_ticket` (`passenger_id`, `ticket_id`) VALUES
('26249', '790'),
('97484', '527');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` varchar(10) NOT NULL,
  `sname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `sname`) VALUES
('S0001', 'Chennai Central'),
('S0002', 'Kashmir'),
('S0003', 'Bengaluru Central'),
('S0004', 'Kodaikanal'),
('S0005', 'Katpadi'),
('S0006', 'Salem'),
('S0007', 'Ooty'),
('S0008', 'Mysore'),
('S0009', 'Nagarkovil'),
('S0010', 'Kumbakonam'),
('S0011', 'Trichy'),
('S0012', 'Kanyakumai'),
('S0013', 'Goa'),
('S0014', 'Pondicherry');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_amount`
--

CREATE TABLE `ticket_amount` (
  `ticket_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_amount`
--

INSERT INTO `ticket_amount` (`ticket_id`, `total_amount`) VALUES
(790, 2050),
(527, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `ticket_id` int(11) NOT NULL,
  `train_no` varchar(10) NOT NULL,
  `dept_date` date NOT NULL,
  `coach_type` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`ticket_id`, `train_no`, `dept_date`, `coach_type`, `user_id`, `status`) VALUES
(790, 'TR016', '2020-11-02', 'SPL', 'U0004', 0),
(527, 'TR006', '2020-11-06', 'AC', 'U0004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_passenger`
--

CREATE TABLE `ticket_passenger` (
  `ticket_id` int(11) NOT NULL,
  `no_of_passenger` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_passenger`
--

INSERT INTO `ticket_passenger` (`ticket_id`, `no_of_passenger`) VALUES
(527, 1),
(790, 1);

-- --------------------------------------------------------

--
-- Table structure for table `train_coach`
--

CREATE TABLE `train_coach` (
  `train_no` varchar(10) NOT NULL,
  `coach_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_coach`
--

INSERT INTO `train_coach` (`train_no`, `coach_type`) VALUES
('TR001', 'AC'),
('TR002', 'NON-AC'),
('TR003', 'GENERAL'),
('TR004', 'CHAIRCAR'),
('TR005', 'SPL'),
('TR006', 'AC'),
('TR007', 'AC'),
('TR008', 'AC'),
('TR009', 'NON-AC'),
('TR010', 'GENERAL'),
('TR011', 'AC'),
('TR012', 'AC'),
('TR013', 'AC'),
('TR014', 'AC'),
('TR015', 'NON-AC'),
('TR016', 'SPL'),
('TR017', 'AC'),
('TR018', 'NON-AC'),
('TR019', 'GENERAL'),
('TR020', 'GENERAL'),
('TR004', 'GENERAL'),
('TR004', 'SPL'),
('TR002', 'AC'),
('TR002', 'GENERAL'),
('TR002', 'SPL'),
('TR002', 'CHAIRCAR'),
('TR001', 'NON-AC'),
('TR001', 'SPL'),
('TR001', 'GENERAL'),
('TR011', 'SPL');

-- --------------------------------------------------------

--
-- Table structure for table `train_date`
--

CREATE TABLE `train_date` (
  `train_no` varchar(10) NOT NULL,
  `depDate` date NOT NULL,
  `arrTime` varchar(10) NOT NULL,
  `depTime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_date`
--

INSERT INTO `train_date` (`train_no`, `depDate`, `arrTime`, `depTime`) VALUES
('TR001', '2020-11-01', '12:30pm', '3:45pm'),
('TR002', '2020-11-02', '2:30pm', '2:10am'),
('TR003', '2020-11-03', '6:50pm', '4:15am'),
('TR004', '2020-11-04', '2:30pm', '5:40pm'),
('TR005', '2020-11-05', '11:15am', '3:27pm'),
('TR006', '2020-11-06', '1:00pm', '4:10pm'),
('TR007', '2020-11-07', '7:00pm', '4:42am'),
('TR008', '2020-11-01', '6:45am', '9:45am'),
('TR009', '2020-11-02', '9:10pm', '7:45am'),
('TR010', '2020-11-03', '4:12pm', '1:00pm'),
('TR011', '2020-11-04', '3:15pm', '4:45pm'),
('TR012', '2020-11-05', '5:40pm', '3:15am'),
('TR013', '2020-11-06', '6:45am', '4:28pm'),
('TR014', '2020-11-07', '9:10pm', '6:30am'),
('TR015', '2020-11-01', '7:17am', '11:24pm'),
('TR016', '2020-11-02', '6:50pm', '4:15am'),
('TR017', '2020-11-03', '8:40pm', '9:10am'),
('TR018', '2020-11-04', '5:30pm', '6:45am'),
('TR019', '2020-11-05', '1:00pm', '4:27pm'),
('TR020', '2020-11-06', '3:45pm', '10:40am'),
('TR002', '2020-11-06', '5:55pm', '8:30am'),
('TR002', '2020-11-04', '6:25pm', '3:25am'),
('TR004', '2020-11-01', '3:55pm', '4:25am'),
('TR004', '2020-11-07', '2:54am', '12:45pm'),
('TR004', '2020-11-02', '8:45pm', '5:50am');

-- --------------------------------------------------------

--
-- Table structure for table `train_details`
--

CREATE TABLE `train_details` (
  `tname` varchar(55) NOT NULL,
  `start` varchar(10) NOT NULL,
  `end` varchar(10) NOT NULL,
  `halts` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_details`
--

INSERT INTO `train_details` (`tname`, `start`, `end`, `halts`) VALUES
('Bangalore Mail', 'S0003', 'S0001', 4),
('Chennai Express', 'S0001', 'S0002', 1),
('Goa Express', 'S0003', 'S0013', 4),
('Kashmir Chennai Express', 'S0001', 'S0002', 8),
('Katpadi Express', 'S0001', 'S0005', 3),
('Kodai Express', 'S0004', 'S0001', 7),
('Kumbakonam Express', 'S0010', 'S0011', 7),
('Maharaja Express', 'S0008', 'S0001', 3),
('Maharani Express', 'S0008', 'S0001', 4),
('Mysore Express', 'S0008', 'S0006', 3),
('Mysore Passenger', 'S0008', 'S0003', 7),
('Mysore Sal Express', 'S0008', 'S0006', 7),
('Nagarkovil Express', 'S0001', 'S0009', 6),
('Ooty Mail', 'S0007', 'S0001', 3),
('Pondy Express', 'S0014', 'S0001', 7),
('Salem Express', 'S0006', 'S0011', 8),
('Shadhabdi Express', 'S0003', 'S0001', 0),
('Trichy Express', 'S0011', 'S0012', 5),
('VIT Express', 'S0001', 'S0005', 4),
('Westcoast', 'S0001', 'S0006', 5);

-- --------------------------------------------------------

--
-- Table structure for table `train_info`
--

CREATE TABLE `train_info` (
  `train_no` varchar(10) NOT NULL,
  `tname` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train_info`
--

INSERT INTO `train_info` (`train_no`, `tname`) VALUES
('TR001', 'Chennai Express'),
('TR002', 'Bangalore Mail'),
('TR003', 'Kodai Express'),
('TR004', 'Katpadi Express'),
('TR005', 'Westcoast'),
('TR006', 'Shadhabdi Express'),
('TR007', 'Ooty Mail'),
('TR008', 'Mysore Passenger'),
('TR009', 'Nagarkovil Express'),
('TR010', 'Kumbakonam Express'),
('TR011', 'Trichy Express'),
('TR012', 'Maharaja Express'),
('TR013', 'Goa Express'),
('TR014', 'Mysore Sal Express'),
('TR015', 'Pondy Express'),
('TR016', 'Kashmir Chennai Express'),
('TR017', 'Mysore Express'),
('TR018', 'Maharani Express'),
('TR019', 'VIT Express'),
('TR020', 'Salem Express');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`) VALUES
('U0001', 'Danu', 'password'),
('U0002', 'Ria', 'password'),
('U0003', 'Joe', 'password'),
('U0004', 'Murthi', 'password'),
('U0005', 'Sharma', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `user_id` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_phone`
--

INSERT INTO `user_phone` (`user_id`, `mobile`) VALUES
('U0001', '3859790518'),
('U0001', '3851275858'),
('U0001', '9793850254'),
('U0002', '7554441213'),
('U0003', '9455555143'),
('U0004', '9055582232'),
('U0005', '9456856741');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach_price`
--
ALTER TABLE `coach_price`
  ADD PRIMARY KEY (`coach_type`);

--
-- Indexes for table `passenger_details`
--
ALTER TABLE `passenger_details`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `passenger_ticket`
--
ALTER TABLE `passenger_ticket`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `ticket_passenger`
--
ALTER TABLE `ticket_passenger`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `train_details`
--
ALTER TABLE `train_details`
  ADD PRIMARY KEY (`tname`);

--
-- Indexes for table `train_info`
--
ALTER TABLE `train_info`
  ADD PRIMARY KEY (`train_no`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket_passenger`
--
ALTER TABLE `ticket_passenger`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
