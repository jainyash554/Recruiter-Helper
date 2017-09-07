-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2017 at 12:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tech_candidates`
--

CREATE TABLE `tech_candidates` (
  `tech_can_id` int(11) NOT NULL,
  `tech_can_fullname` varchar(255) NOT NULL,
  `tech_can_email` varchar(255) NOT NULL,
  `tech_can_mobile` varchar(255) NOT NULL,
  `tech_can_gender` varchar(64) NOT NULL,
  `tech_can_qualification` varchar(255) NOT NULL,
  `tech_can_appliedposition` varchar(255) NOT NULL,
  `tech_can_maritalstatus` varchar(64) NOT NULL,
  `tech_can_dor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tech_can_technical_assign` int(11) NOT NULL,
  `tech_can_technical_comment` varchar(1024) NOT NULL,
  `tech_can_hr_comment` varchar(1024) NOT NULL,
  `tech_can_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_candidates`
--

INSERT INTO `tech_candidates` (`tech_can_id`, `tech_can_fullname`, `tech_can_email`, `tech_can_mobile`, `tech_can_gender`, `tech_can_qualification`, `tech_can_appliedposition`, `tech_can_maritalstatus`, `tech_can_dor`, `tech_can_technical_assign`, `tech_can_technical_comment`, `tech_can_hr_comment`, `tech_can_status`) VALUES
(59, 'test user', 'test@gmail.com', '9874563210', 'female', 'test', 'test', 'Unmarried', '2017-08-08 15:19:18', 3, '				    okk				    ', '			Good Guy	    ', 0),
(60, 'test', 'test1@gmail.com', '8574964789', 'male', 'dd', 'dd', 'Unmarried', '2017-08-08 15:17:00', 0, '', '', 1),
(61, 'testuser', 'test2@gmail.com', '9874563210', 'male', 'BE', 'SD', 'married', '2017-08-11 10:10:31', 5, '		ok		    				    ', '				    take it', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tech_candidate_meta`
--

CREATE TABLE `tech_candidate_meta` (
  `tech_can_meta_id` int(11) NOT NULL,
  `tech_can_id` int(11) NOT NULL,
  `tech_can_meta_key` varchar(255) NOT NULL,
  `tech_can_meta_value` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_candidate_meta`
--

INSERT INTO `tech_candidate_meta` (`tech_can_meta_id`, `tech_can_id`, `tech_can_meta_key`, `tech_can_meta_value`) VALUES
(150, 59, 'total_experience', '5'),
(151, 59, 'notice_period', '15,days'),
(152, 59, 'traing_period', 'No'),
(153, 59, 'bond', 'No'),
(154, 59, 'court_case', 'No'),
(155, 59, 'multiShift', 'No'),
(156, 59, 'skills', 'test	java			    				    				    				    				    				    				    				    				    				    				    				    				    '),
(157, 59, 'current_ctc', '1234'),
(158, 59, 'expected_ctc', '12345'),
(159, 59, 'hear_about_company', 'friends'),
(160, 60, 'total_experience', '2'),
(161, 60, 'notice_period', '2,month'),
(162, 60, 'traing_period', 'Yes'),
(163, 60, 'bond', 'Yes'),
(164, 60, 'court_case', 'Yes'),
(165, 60, 'multiShift', 'Yes'),
(166, 60, 'skills', 'f				    '),
(167, 60, 'current_ctc', '3'),
(168, 60, 'expected_ctc', '4'),
(169, 60, 'hear_about_company', 'friends'),
(170, 61, 'total_experience', '1'),
(171, 61, 'notice_period', '1,days'),
(172, 61, 'traing_period', 'Yes'),
(173, 61, 'bond', 'Yes'),
(174, 61, 'court_case', 'Yes'),
(175, 61, 'multishift', 'Yes'),
(176, 61, 'skills', 'JAVA'),
(177, 61, 'current_ctc', '123'),
(178, 61, 'expected_ctc', '1234'),
(179, 61, 'hear_about_company', 'friends');

-- --------------------------------------------------------

--
-- Table structure for table `tech_can_exp`
--

CREATE TABLE `tech_can_exp` (
  `tech_can_exp_id` int(11) NOT NULL,
  `tech_can_id` int(11) NOT NULL,
  `tech_can_exp_nameofcompany` varchar(512) NOT NULL,
  `tech_can_exp_designation` varchar(255) NOT NULL,
  `tech_can_exp_years` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_can_exp`
--

INSERT INTO `tech_can_exp` (`tech_can_exp_id`, `tech_can_id`, `tech_can_exp_nameofcompany`, `tech_can_exp_designation`, `tech_can_exp_years`) VALUES
(55, 59, 'test', 'test', 2.5),
(56, 59, 'test1', 'test', 3.5),
(57, 60, 'test', 'testcarrier', 2),
(58, 61, 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tech_technical_users`
--

CREATE TABLE `tech_technical_users` (
  `tech_technical_users_id` int(11) NOT NULL,
  `tech_technical_users_name` varchar(255) NOT NULL,
  `tech_technical_users_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tech_users`
--

CREATE TABLE `tech_users` (
  `tech_users_id` int(11) NOT NULL,
  `tech_users_username` varchar(255) NOT NULL,
  `tech_users_password` varchar(255) NOT NULL,
  `tech_users_role` int(11) NOT NULL,
  `tech_users_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_users`
--

INSERT INTO `tech_users` (`tech_users_id`, `tech_users_username`, `tech_users_password`, `tech_users_role`, `tech_users_status`) VALUES
(1, 'basic_user', 'BasicAdmin', 0, 0),
(2, 'hr_user', 'HrAdmin', 1, 0),
(3, 'tech_user1', 'TechAdmin', 2, 1),
(4, 'tech_user2', 'TechAdmin', 2, 2),
(5, 'tech_user3', 'TechAdmin', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tech_candidates`
--
ALTER TABLE `tech_candidates`
  ADD PRIMARY KEY (`tech_can_id`);

--
-- Indexes for table `tech_candidate_meta`
--
ALTER TABLE `tech_candidate_meta`
  ADD PRIMARY KEY (`tech_can_meta_id`);

--
-- Indexes for table `tech_can_exp`
--
ALTER TABLE `tech_can_exp`
  ADD PRIMARY KEY (`tech_can_exp_id`);

--
-- Indexes for table `tech_technical_users`
--
ALTER TABLE `tech_technical_users`
  ADD PRIMARY KEY (`tech_technical_users_id`);

--
-- Indexes for table `tech_users`
--
ALTER TABLE `tech_users`
  ADD PRIMARY KEY (`tech_users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tech_candidates`
--
ALTER TABLE `tech_candidates`
  MODIFY `tech_can_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tech_candidate_meta`
--
ALTER TABLE `tech_candidate_meta`
  MODIFY `tech_can_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `tech_can_exp`
--
ALTER TABLE `tech_can_exp`
  MODIFY `tech_can_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tech_technical_users`
--
ALTER TABLE `tech_technical_users`
  MODIFY `tech_technical_users_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tech_users`
--
ALTER TABLE `tech_users`
  MODIFY `tech_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
