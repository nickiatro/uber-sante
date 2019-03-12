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
  `contact` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

