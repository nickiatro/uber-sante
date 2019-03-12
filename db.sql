--
-- create table`doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `experience` int(11) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `ext` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Create table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `clinic_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- create table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_id` int(11) NOT NULL,
  `clinic_name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- create table `appointment`
--

CREATE TABLE `appointment` (
  `username` varchar(30) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `clinic_id` int(5) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `appoint_date` date NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `appoint_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- create table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- create table `clinic_admin`
--

CREATE TABLE `admin_clinic` (
  `clinic_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;