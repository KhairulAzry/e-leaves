-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2011 at 08:41 Õ
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_reference` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `feed_back` varchar(1000) NOT NULL,
  PRIMARY KEY (`feedback_reference`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_reference`, `id`, `feed_back`) VALUES
(1, 1, 'hello there, this is my feedback!!!'),
(2, 1, 'hello admin guy!'),
(3, 1, 'HEllo there boss:::: HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss::::HEllo there boss:::'),
(4, 1, 'hello again :D'),
(5, 1, 'there u go again::kohi'),
(6, 1, 'hellooooooooooooooooo. knfknkvekfvowiebfvoiev. owsbvoiwaodbvovovoievql. iviwvmivnmwoiv hwpoiv.... iehvniok iwvnpiwnvpwnvepwi. '),
(7, 1, 'cbejkdvcbklamv'';c m;da'),
(8, 1, 'wdegfcu'';xcadjhfdcnm;,.z''aswodkieofbdsncmx,Z>zx,mkjcdfur980i4w-eo[ps;a\r\nz''>s'),
(9, 1, 'hello :)'),
(10, 40, 'hello'),
(11, 1, 'am not happy right now :(((('),
(12, 1, 'one more time admin! am guna kill ya!!!'),
(13, 1, 'kkkkk'),
(14, 1, 'lkkllk'),
(15, 1, 'hhhodo'),
(16, 1, 'hewofighweiog[pwe'),
(17, 120, 'Hello Admin.\r\nMy contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much. '),
(18, 120, 'Hello Admin.\\r\\nMy contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much.'),
(19, 120, 'Hello Admin.\\r\\nMy contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(20, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(21, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(22, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(23, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(24, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(25, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(26, 120, 'Hello Admin. My contract says that I am entitled for a 20 days of annual leaves. However, the system says I have only 15 days available. I contacted the HR department and they said it was a mistake in their records. Can you please check with HR and update my records? Thank you so much'),
(27, 1, 'hey admin,, wat''s wrong with your system ?!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_date` date NOT NULL,
  `holiday_des` varchar(100) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`number`, `holiday_date`, `holiday_des`) VALUES
(64, '2011-03-11', 'date 8'),
(63, '2011-03-11', 'date 7'),
(62, '2011-03-11', 'date 6'),
(61, '2011-04-02', 'Date 5'),
(60, '2011-04-01', 'Date 4'),
(59, '2011-03-31', 'Date 3'),
(57, '2011-03-12', 'Date 1'),
(58, '2011-03-15', 'Date 2');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `applicant_name` varchar(30) NOT NULL,
  `applicant_department` varchar(30) NOT NULL,
  `type` enum('Annual','Medical','Maternity','Paternity','Compassionate','Unpaid','Emergency') NOT NULL,
  `application_status` enum('pending','approved','rejected') NOT NULL,
  `applicants_id` int(11) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `reference_no` int(10) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` int(5) NOT NULL,
  `reason` varchar(600) NOT NULL,
  `pathtofile` varchar(55) NOT NULL,
  PRIMARY KEY (`reference_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2011000363 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`applicant_name`, `applicant_department`, `type`, `application_status`, `applicants_id`, `approved_by`, `reference_no`, `start_date`, `end_date`, `no_of_days`, `reason`, `pathtofile`) VALUES
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000264, '2011-02-19', '2011-02-24', 4, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000265, '2011-02-19', '2011-02-28', 6, 'hello', 'uploads/d4669a2ec5b5edaec1db9b771c7dacfe.jpg'),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000263, '2011-02-19', '2011-02-19', 0, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000261, '2011-02-04', '2011-02-19', 10, 'ffffff', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000262, '2011-02-01', '2011-02-19', 12, 'm', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000259, '2011-02-19', '2011-02-19', 0, 'h', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000260, '2011-02-15', '2011-02-19', 4, 'fff', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000257, '2011-02-01', '2011-02-19', 12, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000258, '2011-02-01', '2011-02-19', 12, 'bjj', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000256, '2011-02-02', '2011-02-19', 11, 'hjgj', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'pending', 1, '', 2011000255, '2011-02-06', '2011-02-19', 10, 'hehehe', ''),
('Testing4 Testing4', 'Management', 'Compassionate', 'pending', 49, '', 2011000254, '2011-02-01', '2011-02-19', 12, 'hello', ''),
('Testing4 Testing4', 'Management', 'Compassionate', 'pending', 49, '', 2011000252, '2011-02-01', '2011-02-19', 12, 'here', ''),
('Testing4 Testing4', 'Management', 'Emergency', 'pending', 49, '', 2011000253, '2011-02-19', '2011-02-19', 0, 'hello', ''),
('Testing4 Testing4', 'Management', 'Annual', 'pending', 49, '', 2011000250, '2011-02-19', '2011-02-19', 0, 'hello', ''),
('Testing4 Testing4', 'Management', 'Emergency', 'pending', 49, '', 2011000251, '2011-02-01', '2011-02-19', 12, 'hello', 'uploads/a01ec67f59c8d49b811208542bfbbbc1.jpg'),
('Mohamed Ahmed', 'Management', 'Unpaid', 'pending', 1, '', 2011000249, '2011-02-19', '2011-02-19', 0, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000248, '2011-02-19', '2011-02-19', 0, 'hello', 'uploads/3c1dbf67aeda520aaea145ab7f1d3dc8.jpg'),
('testing30 testing30', 'Human Resources', 'Annual', 'pending', 64, '', 2011000246, '2011-02-19', '2011-02-19', 0, 'here u go', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'pending', 1, '', 2011000247, '2011-02-19', '2011-02-19', 0, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000245, '2011-02-18', '2011-02-18', 1, 'tyui', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000243, '2011-02-18', '2011-02-18', 1, 'mmmm', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'rejected', 1, 'admin', 2011000244, '2011-02-18', '2011-02-18', 1, 'yyyyyy', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000242, '2011-02-18', '2011-02-18', 1, 'ghj', ''),
('qassem rassam', 'Public Relations', 'Emergency', 'rejected', 43, 'admin', 2011000241, '2011-02-17', '2011-02-17', 1, 'fgfgfg', ''),
('Testing4 Testing4', 'Management', 'Unpaid', 'pending', 49, '', 2011000239, '2011-02-17', '2011-02-17', 1, 'blm;blm', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000240, '2012-07-23', '2012-07-24', 2, 'kk', ''),
('Testing4 Testing4', 'Management', 'Compassionate', 'pending', 49, '', 2011000238, '2011-02-17', '2011-02-17', 1, 'kvnfkwndv', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000237, '2011-02-17', '2011-02-17', 1, '54806-4836', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000236, '2011-02-17', '2011-02-17', 1, '5454638302847', ''),
('Mohamed Ahmed', 'Management', 'Paternity', 'approved', 1, 'admin', 2011000235, '2011-02-17', '2011-02-17', 1, '65656565656', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'approved', 1, 'admin', 2011000233, '2011-02-17', '2011-02-17', 1, 'ehifklc', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000234, '2011-02-17', '2011-02-17', 1, 'et89r498efiok', ''),
('Mohamed Ahmed', 'Management', 'Paternity', 'rejected', 1, 'admin', 2011000232, '2011-02-17', '2011-02-17', 1, 'ihe;wg', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000230, '2011-02-17', '2011-02-17', 1, 'nnnm', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'rejected', 1, 'admin', 2011000231, '2011-02-17', '2011-02-17', 1, 'oj;l', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'approved', 1, 'admin', 2011000229, '2011-02-16', '2011-02-16', 1, 'lllllllll', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'approved', 1, 'admin', 2011000228, '2011-02-16', '2011-02-16', 1, 'llm', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000227, '2011-02-16', '2011-02-16', 1, 'kl;m;l', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000226, '2011-02-16', '2011-02-16', 1, 'l'''';,'';,'';mlm', ''),
('Mohamed Ahmed', 'Management', 'Paternity', 'rejected', 1, 'admin', 2011000225, '2011-02-16', '2011-02-16', 1, 'kkkl;[p', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000224, '2011-02-16', '2011-02-16', 1, 'kkk', ''),
('Mohamed Ahmed', 'Management', 'Unpaid', 'approved', 1, 'admin', 2011000223, '2011-02-16', '2011-02-16', 1, 'llll', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000222, '2011-02-16', '2011-02-16', 1, 'llll', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000221, '2011-02-16', '2011-02-16', 1, 'yogp['';', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000219, '2011-02-16', '2011-02-16', 1, 'lh;', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000220, '2011-02-16', '2011-02-16', 1, 'khl;', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000218, '2011-02-16', '2011-02-16', 1, 'nn', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000217, '2011-02-16', '2011-02-16', 1, 'nn', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000216, '2011-02-16', '2011-02-24', 7, '  ljl', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000215, '2011-02-16', '2011-02-23', 6, 'mmmmmmmm', ''),
('Mohamed Ahmed', 'Management', 'Unpaid', 'approved', 1, 'admin', 2011000214, '2011-02-14', '2011-02-14', 1, 'kkkkkkkkkkkkkkkkkkkkkkkk', 'uploads/76a05eac4d3a0c968df214e9606bc53d.jpg'),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000201, '2011-02-13', '2011-02-14', 1, 'jhkjjg', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000202, '2011-02-14', '2011-02-14', 1, 'hello', 'uploads/756cbfdb97fe7d4e2009a648634c91ff.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000203, '2011-02-14', '2011-03-09', 18, 'kkkkkkkkkk', 'uploads/87a6356c92db9c5cd7cb88125e63ab74.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000204, '2011-02-14', '2011-02-14', 1, 'hkhkhhkh', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000205, '2011-02-14', '2011-02-14', 1, 'jkjkjkj', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000206, '2011-02-14', '2011-02-14', 1, 'kkkkkkkkkkk', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000207, '2011-02-14', '2011-02-24', 9, 'kkkk', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000208, '2011-02-14', '2011-02-14', 1, 'jljljlj', ''),
('Mohamed Ahmed', 'Management', 'Unpaid', 'rejected', 1, 'admin', 2011000209, '2011-02-14', '2011-02-14', 1, ';oj;ok;l', ''),
('Mohamed Ahmed', 'Management', 'Unpaid', 'approved', 1, 'admin', 2011000210, '2011-02-14', '2011-02-23', 8, 'lhknl.', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000211, '2011-02-14', '2011-02-14', 1, 'pgi;j''', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'rejected', 1, 'admin', 2011000212, '2011-02-14', '2011-02-23', 8, 'kkhkh', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'approved', 1, 'admin', 2011000213, '2011-02-14', '2011-02-14', 1, 'hg;l''\r\n''''''''''''', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000266, '2011-02-21', '2011-02-23', 3, 'here', 'uploads/587588d28f79e48faa1ed26806dfcde2.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000267, '2011-02-20', '2011-02-21', 1, 'here', 'uploads/583fb71cb8ec3ea774cb1092c02346b0.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000268, '2011-02-21', '2011-02-24', 4, 'hello .....!', ''),
('qassem rassam', 'Management', 'Annual', 'pending', 43, '', 2011000269, '2011-02-21', '2011-02-22', 2, 'hello', ''),
('qassem rassam', 'Management', 'Maternity', 'approved', 43, 'admin', 2011000270, '2011-02-23', '2011-02-28', 4, 'heloedf97', ''),
('abddu master', 'Management', 'Annual', 'approved', 40, 'admin', 2011000271, '2011-02-21', '2011-02-21', 1, 'hello', ''),
('abddu master', 'Management', 'Compassionate', 'rejected', 40, 'admin', 2011000272, '2011-02-20', '2011-02-28', 6, 'hello', 'uploads/14b08b4f430f052968fdff23b53c8211.jpg'),
('abddu master', 'Management', 'Unpaid', 'approved', 40, 'admin', 2011000273, '2011-02-25', '2011-02-26', 1, 'there u go', ''),
('abddu master', 'Management', 'Medical', 'approved', 40, 'admin', 2011000274, '2011-02-24', '2011-03-15', 14, 'hello ,, am damn sick!', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000275, '2011-02-20', '2011-02-23', 3, 'admin man!', ''),
('Mohamed Ahmed', 'Management', 'Unpaid', 'rejected', 1, 'admin', 2011000276, '2011-02-24', '2011-03-23', 20, 'there!!!', ''),
('Mohamed Ahmed', 'Management', 'Maternity', 'approved', 1, 'admin', 2011000277, '2011-02-28', '2011-02-28', 1, 'here!!', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000278, '2011-02-21', '2011-02-28', 6, 'hrello', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'pending', 1, '', 2011000279, '2011-02-22', '2011-02-28', 5, 'ffch;''k;lj', 'uploads/0423ea57c584c21afe336f0f6629a50c.jpg'),
('Testing4 Testing4', 'Management', 'Annual', 'approved', 49, 'admin', 2011000280, '2011-02-22', '2011-02-22', 1, 'helo', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000281, '2011-02-26', '2011-02-26', 0, 'kdhl', 'uploads/5b02cc8fd255c217626ed4e5a5b4da46.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000282, '2011-02-26', '2011-02-26', 0, 'dopvjpsodv', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'approved', 1, 'admin', 2011000283, '2011-02-26', '2011-02-28', 1, 'hooooollll;;;;;;', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'pending', 1, '', 2011000284, '2011-03-03', '2011-03-04', 2, 'hello', 'uploads/441a29913aaf8653a27f18666f9194a0.docx'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000285, '2011-03-31', '2011-03-31', 1, 'l;dvj;d', 'uploads/52f37a44c02411d1647262e8021b8d4d.jpg'),
('Mohamed Ahmed', 'Management', 'Unpaid', 'pending', 1, '', 2011000286, '2011-03-05', '2011-03-05', 0, 'hello', 'uploads/1d31828ba83ea4cf3b16cc5d03cd7ddd.jpg'),
('Mohamed Ahmed', 'Management', 'Paternity', 'pending', 1, '', 2011000287, '2011-03-01', '2011-03-01', 1, 'helo', 'uploads/a263321fb3c75db7c086f1ccddd368ec.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000288, '2011-03-05', '2011-03-05', 0, 'v;deal', 'uploads/3ccb515fd7b7b2167130a0fe697a7dc3.jpg'),
('Mohamed Ahmed', 'Management', 'Compassionate', 'pending', 1, '', 2011000289, '2011-03-03', '2011-03-13', 7, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000290, '2011-03-24', '2011-03-31', 6, 'mfmfmfm', 'uploads/2f346470f09359001bb735df4c3de233.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000291, '2011-03-03', '2011-03-05', 2, 'hhfhfhf', 'uploads/53b22655c02e2525565be5b3501fe8db.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000292, '2011-03-03', '2011-03-06', 2, 'hello', 'uploads/ffcad8fd0ea0240dac31f20a39a49652.JPG'),
('Mohamed Ahmed', 'Management', 'Paternity', 'pending', 1, '', 2011000293, '2011-03-24', '2011-03-29', 4, 'hhhl;;', 'uploads/46a71bdef2bbb9b32b5c9659839bd11d.JPG'),
('Mohamed Ahmed', 'Management', 'Emergency', 'pending', 1, '', 2011000294, '2011-03-04', '2011-03-07', 2, 'hello there :D', 'uploads/a31d73bcde9c1050e8ec4a6f6b2de64c.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000295, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/0c492ec61da9c01b2dee2688a9a36859.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000296, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/813495064ab49d5a73259e302a5aa226.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000297, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/b292955aa80de15bbebe515cc171cb29.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000298, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/b8938c5b4ab02431999ceb944867ab72.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000299, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/080a230bf6abbf280eabc55af32ae72e.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000300, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/714fd4a1632c5ea511da7c8b0a218ebb.exe'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000301, '2011-03-04', '2011-03-31', 20, 'hello', 'uploads/8dc3db01a7c89820d743fe175a28df5b.exe'),
('Mohamed Ahmed', 'Management', 'Medical', 'pending', 1, '', 2011000302, '2011-03-07', '2011-03-31', 19, 'pojp[o', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'pending', 1, '', 2011000303, '2011-03-05', '2011-03-11', 5, 'oooo', 'uploads/10a6fdc0e338f9208bc963f36b76cc82.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000304, '2011-03-07', '2011-03-08', 2, 'hello ::::', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000305, '2011-03-07', '2011-03-08', 2, 'hello ::::', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000306, '2011-03-03', '2011-03-10', 6, 'gggo', 'uploads/1fd7046878522b9e0910cfcf06671ad1.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000307, '2011-03-11', '2011-03-22', 8, 'kkjp;jo[p', 'uploads/17f06b04b4ce39552a5eee8a80cde19a.JPG'),
('Mohamed Ahmed', 'Management', 'Emergency', 'rejected', 1, 'admin', 2011000308, '2011-03-02', '2011-03-02', 1, 'llll', 'uploads/17810f847d52067f0d7e607d02249911.jpg'),
('Mohamed Ahmed', 'Management', 'Paternity', 'pending', 1, '', 2011000309, '2011-03-02', '2011-03-02', 1, 'mmcmcm', 'uploads/0ef760eac86aa58dc23f14b17a749c6e.jpg'),
('Mohamed Ahmed', 'Management', 'Paternity', 'approved', 1, 'admin', 2011000310, '2011-03-02', '2011-03-02', 1, 'mmcmcm', 'uploads/5ce487853de5f39d9896e5b51ede25b9.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000311, '2011-03-02', '2011-03-02', 1, 'nnn', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'rejected', 1, 'admin', 2011000312, '2011-03-05', '2011-03-31', 19, 'hehehe', 'uploads/700e63f7dc62fcb3fe30f474bbe9fe9c.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000313, '2011-03-16', '2011-03-31', 12, 'hhhh', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000314, '2011-03-03', '2011-03-03', 1, 'kkk', 'uploads/7751e7be50c6412e17c17fea7be108d2.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000315, '2011-03-03', '2011-03-03', 1, 'mm', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'pending', 1, '', 2011000316, '2011-03-03', '2011-03-03', 1, 'erer', 'uploads/eee90693fa75befd212fc5588cc26536.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000317, '2011-03-03', '2011-03-03', 1, 'erer', 'uploads/162ffa180e634832425bd7d01f177b9f.docx'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000318, '2011-03-03', '2011-03-03', 1, 'hho', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000319, '2011-03-03', '2011-03-16', 10, 'hhhhehee', 'uploads/a8cb4901153160b020017ff24dc9d1d5.JPG'),
('rus rusma', 'Management', 'Annual', 'approved', 41, 'admin', 2011000320, '2011-03-03', '2011-03-03', 1, 'hello admin', 'uploads/aee07384cb3df5c6f135c45b437e3435.docx'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000321, '2011-03-03', '2011-03-03', 1, 'jol', 'uploads/83ecda7076669e3b89448ea20e052868.JPG'),
('Mohamed Ahmed', 'Management', 'Paternity', 'approved', 1, 'admin', 2011000322, '2011-03-03', '2011-03-23', 15, 'mno', 'uploads/6d39b3b6e99c64352aa716ded3b572a1.jpg'),
('Mohamed Ahmed', 'Management', 'Annual', 'rejected', 1, 'admin', 2011000323, '2011-03-03', '2011-03-03', 1, 'hello', 'uploads/cf6add147ad64dd3393b567b4636d6ce.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000324, '2011-03-16', '2011-03-30', 11, 'heeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeheeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'uploads/b0b3f54768c6314a0e22f8ee63e8919d.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000325, '2011-03-03', '2011-03-03', 1, 'hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello hello hello hello hello hellohello he', 'uploads/05fd8e861b474ecd8c346e1d0a4e83ca.jpg'),
('Mohamed Ahmed', 'Management', 'Paternity', 'approved', 1, 'admin', 2011000326, '2011-03-23', '2011-03-31', 7, 'hello', 'uploads/26ac377f0d6375a5ef29704cef779a43.JPG'),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000327, '2011-03-04', '2011-03-11', 6, 'fvjbekjv', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'rejected', 1, 'admin', 2011000328, '2011-03-05', '2011-03-08', 2, 'ssss', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'rejected', 1, 'admin', 2011000329, '2011-03-08', '2011-03-31', 18, 'Hello There :D', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'rejected', 1, 'admin', 2011000330, '2011-03-08', '2011-03-08', 0, 'here', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'rejected', 1, 'admin', 2011000331, '2011-03-08', '2011-03-14', 0, 'only two days', ''),
('Mohamed Ahmed', 'Management', 'Emergency', 'approved', 1, 'admin', 2011000332, '2011-03-08', '2011-03-14', 0, 'only two days', ''),
('Mohamed Ahmed', 'Management', 'Compassionate', 'approved', 1, 'admin', 2011000333, '2011-03-08', '2011-03-14', 3, 'nnno', ''),
('Mohamed Ahmed', 'Management', 'Paternity', 'rejected', 1, 'admin', 2011000334, '2011-03-07', '2011-03-12', 2, 'to', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000335, '2011-03-12', '2011-03-13', 0, 'kkk', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'approved', 1, 'admin', 2011000336, '2011-03-11', '2011-03-11', 0, 'hello', ''),
('Mohamed Ahmed', 'Management', 'Medical', 'rejected', 1, 'admin', 2011000337, '2011-03-11', '2011-03-18', 4, '5 days', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'rejected', 1, 'admin', 2011000338, '2011-03-11', '2011-03-11', 0, 'hello :D', 'uploads/4897d0aed4244efad83aa8cbd7ba92d9.jpg'),
('asa wqa', 'Management', 'Annual', 'approved', 105, 'admin', 2011000339, '2011-03-21', '2011-03-23', 3, 'hello', 'uploads/c49c8a48216b5810997ea4034e26f111.jpg'),
('Testing10 testing10', 'Human Resources', 'Annual', 'pending', 53, '', 2011000340, '2011-03-12', '2011-03-31', 12, 'hello', ''),
('Testing10 testing10', 'Human Resources', 'Unpaid', 'pending', 53, '', 2011000341, '2011-03-12', '2011-03-12', 0, 'hel;lo', ''),
('Testing10 testing10', 'Human Resources', 'Maternity', 'pending', 53, '', 2011000342, '2011-03-16', '2011-03-23', 6, 'hello', ''),
('Testing10 testing10', 'Human Resources', 'Medical', 'pending', 53, '', 2011000343, '2011-03-18', '2011-03-23', 4, 'kkkffo', ''),
('Testing10 testing10', 'Human Resources', 'Paternity', 'pending', 53, '', 2011000344, '2011-03-12', '2011-03-14', 1, 'rrree', ''),
('Testing10 testing10', 'Human Resources', 'Paternity', 'pending', 53, '', 2011000345, '2011-03-12', '2011-03-14', 1, 'kkoop', ''),
('Testing10 testing10', 'Human Resources', 'Emergency', 'pending', 53, '', 2011000346, '2011-03-12', '2011-03-15', 1, 'holp', ''),
('Testing10 testing10', 'Human Resources', 'Maternity', 'pending', 53, '', 2011000347, '2011-03-12', '2011-03-14', 1, 'you!', ''),
('Testing10 testing10', 'Human Resources', 'Annual', 'pending', 53, '', 2011000348, '2011-03-14', '2011-03-19', 4, 'khfikhfkhfkf', ''),
('Testing10 testing10', 'Human Resources', 'Annual', 'pending', 53, '', 2011000349, '2011-03-12', '2011-03-15', 1, 'hello :D', ''),
('testing18 testing18', 'Security', 'Annual', 'pending', 61, '', 2011000350, '2011-03-13', '2011-03-13', 0, 'there', ''),
('hi hi', 'Security', 'Annual', 'pending', 65, '', 2011000351, '2011-03-13', '2011-03-13', 0, 'there', ''),
('testing2 testing2', 'Admin', 'Medical', 'pending', 66, '', 2011000352, '2011-03-15', '2011-03-16', 1, 'there u go', ''),
('testing2 testing2', 'Admin', 'Paternity', 'pending', 66, '', 2011000353, '2011-03-15', '2011-03-15', 0, 'there again :DDDD', ''),
('testing13 testing13', 'Admin', 'Maternity', 'pending', 56, '', 2011000354, '2011-03-15', '2011-03-15', 0, 'heheheheh', ''),
('testing13 testing13', 'Admin', 'Unpaid', 'pending', 56, '', 2011000355, '2011-03-15', '2011-03-15', 0, 'ththth', ''),
('testing13 testing13', 'Admin', 'Unpaid', 'pending', 56, '', 2011000356, '2011-03-15', '2011-03-15', 0, 'therefore am first :DDD', ''),
('Ahmad Ahsan', 'IT', 'Annual', 'approved', 111, 'admin', 2011000357, '2011-03-16', '2011-03-19', 2, 'hello ', 'uploads/3f6c35800f96b9ba378f82db1ceb9f2c.jpg'),
('Adam Ibrahim', 'Human Resources', 'Emergency', 'approved', 120, 'admin', 2011000358, '2011-03-17', '2011-03-18', 1, 'I am sick. I attached the MC herewith in this application.', 'uploads/53f348c2c99e1244565e7d94d67d7c7e.pdf'),
('Adam Ibrahim', 'Human Resources', 'Emergency', 'approved', 120, 'admin', 2011000359, '2011-03-19', '2011-03-20', 0, 'This is Sat and Sun. These will give a duration of 0 day(s) of leave!', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000360, '2011-03-19', '2011-03-19', 0, 'jhewif', ''),
('Mohamed Ahmed', 'Management', 'Annual', 'approved', 1, 'admin', 2011000361, '2011-03-19', '2011-03-19', 0, 'wfc;ow', ''),
('abddu master', 'Management', 'Annual', 'approved', 40, 'admin', 2011000362, '2011-03-19', '2011-03-19', 0, 'cnvcnv', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_control`
--

CREATE TABLE IF NOT EXISTS `time_control` (
  `time_yearly_adjust` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_control`
--

INSERT INTO `time_control` (`time_yearly_adjust`) VALUES
('1297954744');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `registration_status` int(1) NOT NULL DEFAULT '0',
  `access_level` enum('user','manager','admin') NOT NULL,
  `department` varchar(30) NOT NULL,
  `date_joined` date NOT NULL,
  `annual_leave_credit` int(5) NOT NULL,
  `medical_leave_credit` int(5) NOT NULL,
  `maternity_leave_credit` int(5) NOT NULL,
  `paternity_leave_credit` int(5) NOT NULL,
  `emergency_leave_credit` int(5) NOT NULL,
  `unpaid_leave_credit` int(5) NOT NULL,
  `compassionate_leave_credit` int(5) NOT NULL,
  `yearly_adjust` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `e_mail`, `handphone`, `registration_status`, `access_level`, `department`, `date_joined`, `annual_leave_credit`, `medical_leave_credit`, `maternity_leave_credit`, `paternity_leave_credit`, `emergency_leave_credit`, `unpaid_leave_credit`, `compassionate_leave_credit`, `yearly_adjust`) VALUES
(48, 'testing5', 'testing5', 'testing5', 'dGVzdGluZzU=', 'testing5@dddd.com', '192630', 1, 'user', 'Management', '2010-02-17', 0, 0, 0, 0, 0, 0, 0, 0),
(105, 'asa', 'wqa', 'asa', 'MTIz', 'aa@hotmail.com', '0172362690', 1, 'user', 'Management', '2011-03-12', 12, 0, 0, 0, 0, 0, 0, 0),
(47, 'testing', 'testing', 'testing', 'testing', 'testing', '0', 1, 'user', 'testing', '2010-02-09', 0, 0, 0, 0, 0, 0, 0, 0),
(45, 'ahmed', 'sayid', 'ahmed', 'YWhtZWQ=', 'mohamed_ghr73@hotmail.com', '18932836', 1, 'user', 'Marketing', '2011-02-06', 0, 0, 0, 0, 0, 0, 0, 0),
(44, 'Alamin ', 'Sasan', 'meme', 'MTIzNDU=', 'meme704@msn.com', '2147483647', 1, 'user', 'Human Resources', '2011-02-06', 0, 0, 0, 0, 0, 0, 0, 0),
(43, 'qassem', 'rassam', 'qassem', 'cWFzc2Vt', 'qassem@gmail.com', '133513107', 1, 'user', 'Management', '2011-02-06', 10, 9, 4, 0, 0, 0, 0, 0),
(42, 'mohamed', 'elgharabawy', 'user1', 'dXNlcjE=', 'mohamed_ghr73@yahoo.com', '133561738', 1, 'user', 'Security', '2011-02-06', 0, 0, 0, 0, 0, 0, 0, 0),
(41, 'rus', 'rusma', 'rus', 'cnVz', 'rus.flower4@gmail.com', '133513107', 1, 'user', 'Management', '2011-02-02', 9, 9, 8, 7, 6, 5, 4, 0),
(1, 'Mohamed', 'Ahmed', 'admin', 'YWRtaW4=', 'mohamed.ghr@gmail.com', '0133513107', 1, 'admin', 'Management', '2011-02-06', 0, 7, 6, 0, 4, 1, 7, 0),
(40, 'abddu', 'master', 'abddu', 'YWJkZHU=', 'abddu1@gmail.com', '12222387', 1, 'user', 'Management', '2010-02-12', 14, 0, 9, 8, 7, 5, 5, 0),
(49, 'Testing4', 'Testing4', 'testing4', 'dGVzdGluZzQ=', 'mohamed.ghr@gmail.com', '404040404', 1, 'manager', 'Management', '2011-02-10', 24, 9, 9, 9, 9, 0, 9, 0),
(50, 'Hassan', 'Etae', 'hassan', 'aGFzc2Fu', 'h_etae@yahoo.com', '0166928722', 1, 'user', 'Management', '2010-02-14', 0, 0, 0, 0, 0, 0, 0, 0),
(51, 'testing7', 'testing7', 'testing7', 'dGVzdGluZzc=', 'testing7@testing7.com', '018263983', 1, 'user', 'Management', '2010-02-14', 10, 9, 9, 9, 9, 9, 9, 0),
(52, 'testing8', 'testing8', 'testing8', 'dGVzdGluZzg=', 'testing8@testing8.com', '04850345803', 1, 'user', 'Management', '2010-02-17', 1, 1, 1, 1, 1, 1, 1, 0),
(53, 'Testing10', 'testing10', 'testing10', 'dGVzdGluZzEw', 'testing10@jjbj.com', '01839308', 1, 'user', 'Human Resources', '2011-02-14', 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Testing11', 'Testing11', 'testing11', 'dGVzdGluZzEx', 'testing11@testing11.com', '91919193368', 1, 'user', 'Management', '2010-02-17', 0, 0, 0, 0, 0, 0, 0, 1),
(55, 'testing12', 'testing12', 'testing12', 'dGVzdGluZzEy', 'testing12@n.com', '9999099767', 1, 'user', 'Secertary', '2010-02-17', 0, 0, 0, 0, 0, 0, 0, 1),
(56, 'testing13', 'testing13', 'testing13', 'dGVzdGluZzEz', 'testing13@d.com', 'testing13', 1, 'user', 'Admin', '2010-02-17', 0, 0, 0, 0, 0, 0, 0, 1),
(57, 'testing14', 'testing14', 'testing14', 'dGVzdGluZzE0', 'testing14@yu.com', '9697980-', 1, 'user', 'Human Resources', '2010-02-17', 0, 0, 0, 0, 0, 0, 0, 1),
(61, 'testing18', 'testing18', 'testing18', 'dGVzdGluZzE4', 'testing18@hg.com', '94949494', 1, 'user', 'Security', '2011-02-17', 0, 0, 0, 0, 0, 0, 0, 0),
(106, 'golsd', 'golsd', 'golsd', 'Z29sc2Q=', 'golsd@www.com', '375928375928356', 0, 'user', 'Human Resources', '2011-03-12', 0, 0, 0, 0, 0, 0, 0, 0),
(62, 'testing19', 'testing19', 'testing19', 'dGVzdGluZzE5', 'testing19@kkk.com', '99292929', 1, 'user', 'Human Resources', '2011-02-17', 0, 0, 0, 0, 0, 0, 0, 0),
(64, 'testing30', 'testing30', 'testing30', 'dGVzdGluZzMw', 'testing30@g.com', '9566493811', 1, 'user', 'Human Resources', '2011-02-19', 0, 0, 0, 0, 0, 0, 0, 0),
(65, 'hi', 'hi', 'hi', 'aGk=', 'hi@hi.com', '9877900909', 1, 'user', 'Security', '2011-02-19', 0, 0, 0, 0, 0, 0, 0, 0),
(66, 'testing2', 'testing2', 'testing2', 'dGVzdGluZzI=', 'testing2@goo.com', '019273548', 1, 'user', 'Admin', '2011-02-19', 0, 0, 0, 0, 0, 0, 0, 0),
(67, 'mmrs', 'mmrs', 'mmrs', 'bW1ycw==', 'mmrs@gmail.com', '013512327', 1, 'user', 'Management', '2011-02-19', 0, 0, 0, 0, 0, 0, 0, 0),
(68, 'khkhk', 'jljljlj', 'gh', 'Z2g=', 'gh@gh.com', '0909090', 1, 'user', 'Management', '2011-02-19', 0, 0, 0, 0, 0, 0, 0, 0),
(69, 'Moh', 'moh', 'moh', 'bW9o', 'moh@gmail.com', '0133513107', 1, 'user', 'Management', '2011-02-26', 0, 0, 0, 0, 0, 0, 0, 0),
(70, 'hatim', 'hatim', 'hatim', 'aGF0aW0=', 'hatim@gmail.com', '00001933474', 1, 'user', 'Public Relations', '2011-02-26', 0, 0, 0, 0, 0, 0, 0, 0),
(71, 'hoy', 'hoy', 'hoy', 'aG95', 'hoy88@go.com', '98988986', 1, 'user', 'Management', '2011-02-26', 0, 0, 0, 0, 0, 0, 0, 0),
(72, 'they', 'they', 'they', 'dGhleQ==', 'they@go.com', '9235702945', 1, 'user', 'Management', '2011-02-26', 0, 0, 0, 0, 0, 0, 0, 0),
(109, 'golsd39', 'golsd39', 'golsd39', 'Z29sc2QzOQ==', 'golsd39@eer.com', '856345', 0, 'user', 'Human Resources', '2011-03-12', 0, 0, 0, 0, 0, 0, 0, 0),
(108, 'golsd38', 'golsd38', 'golsd38', 'Z29sc2QzOA==', 'golsd38@34.com', '54759475', 0, 'user', 'Human Resources', '2011-03-12', 0, 0, 0, 0, 0, 0, 0, 0),
(93, 'mohamed1', 'mohamed1', 'mohamed1', 'bW9oYW1lZDE=', 'mohamed1@go.com', '87878788780', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(92, 'fofofof', 'fofofof', 'fofofof', 'Zm9mb2ZvZg==', 'fofofof@er.com', '372857829456', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(81, 'rusmawati', 'rusmawati', 'rusmawati', 'cnVzbWF3YXRp', 'rus.rus@gooo.com', '3476586789357', 1, 'user', 'Management', '2011-02-26', 0, 0, 0, 0, 0, 0, 0, 0),
(94, 'mohamed2', 'mohamed2', 'mohamed2', 'bW9oYW1lZDI=', 'mohamed2@er.com', '88886868', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(91, 'holo67', 'holo67', 'holo67', 'aG9sbzY3', 'holo67@er.com', '933486348638', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(89, 'Nurgopppyu', 'Nurgopppyu', 'Nurgopppyu', 'TnVyZ29wcHB5dQ==', 'Nurgopppyu@top.cm', '84774744', 1, 'user', 'Human Resources', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(90, 'holo', 'holo', 'holo', 'aG9sbw==', 'holo@gop.com', '848493373447', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(88, 'Nurgoppp', 'Nurgoppp', 'Nurgoppp', 'TnVyZ29wcHA=', 'Nurgoppp@gol.com', '8475758559', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(87, 'Nurgo', 'Nurgo', 'Nurgo', 'TnVyZ28=', 'Nurgo@go.com', '882229', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(107, 'golsd33', 'golsd33', 'golsd33', 'Z29sc2QzMw==', 'golsd33@rol.com', '4474747655596', 0, 'user', 'Human Resources', '2011-03-12', 0, 0, 0, 0, 0, 0, 0, 0),
(98, 'mohamed6', 'mohamed6', 'mohamed6', 'bW9oYW1lZDY=', 'mohamed6@34.com', '99988', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(100, 'mohamed8', 'mohamed8', 'mohamed8', 'bW9oYW1lZDg=', 'mohamed8@45.com', '228378237823764', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(102, 'mohamed10', 'mohamed10', 'mohamed10', 'bW9oYW1lZDEw', 'mohamed10@12.com', '878868', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(103, 'mohamed11', 'mohamed11', 'mohamed11', 'bW9oYW1lZDEx', 'mohamed11@go.com', '97879', 1, 'user', 'Management', '2011-03-06', 0, 0, 0, 0, 0, 0, 0, 0),
(111, 'Ahmad', 'Ahsan', 'ahsan', 'YWhzYW4=', 'ahmadahsan7@gmail.com', '0132427689', 1, 'user', 'Management', '2011-03-15', 8, 10, 10, 10, 10, 10, 10, 0),
(110, 'golsd37', 'golsd37', 'golsd37', 'Z29sc2QzNw==', 'golsd37@333.com', '3865492835', 0, 'user', 'Human Resources', '2011-03-12', 0, 0, 0, 0, 0, 0, 0, 0),
(112, 'user10', 'user10', 'user10', 'dXNlcjEw', 'user10@google.com', '3838387440', 1, 'user', 'Marketing', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(113, 'user11', 'user11', 'user11', 'dXNlcjEx', 'user11@ero.com', '9843285648', 1, 'user', 'Marketing', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(114, 'user12', 'user12', 'user12', 'dXNlcjEy', 'user12@fffo.com', '836239', 1, 'user', 'Human Resources', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(115, 'user13', 'user13', 'user13', 'dXNlcjEz', 'user13@eerr.com', '485973540', 1, 'user', 'Public Relations', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(116, 'user14', 'user14', 'user14', 'dXNlcjE0', 'user14@google.com', '34657', 1, 'user', 'Security', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(117, 'user15', 'user15', 'user15', 'dXNlcjE1', 'user15@erto.com', '74585489360', 1, 'user', 'Admin', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(118, 'user16', 'user16', 'user16', 'dXNlcjE2', 'user16@foo.com', '8758768954', 1, 'user', 'Secertary', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(119, 'user17', 'user17', 'user17', 'dXNlcjE3', 'user17@ero.com', '565476540', 1, 'user', 'IT', '2011-03-15', 0, 0, 0, 0, 0, 0, 0, 0),
(120, 'Adam', 'Ibrahim', 'adam', 'YWRhbWlicmFoaW0=', 'adamzzz.86@gmail.com', '0133513107', 1, 'user', 'Human Resources', '2011-03-17', 15, 5, 0, 0, 4, 0, 5, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
