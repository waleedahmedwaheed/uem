-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 07:06 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `type`, `status`) VALUES
(1, 'Gaming', 0),
(2, 'Painting', 0),
(3, 'Quiz', 0),
(15, 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` text NOT NULL,
  `e_desc` text NOT NULL,
  `e_venue` text NOT NULL,
  `e_date` date NOT NULL,
  `e_fee` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `entry_datetime` datetime NOT NULL,
  `e_banner` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `e_time` time NOT NULL,
  `uni_id` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `voting` int(11) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_name`, `e_desc`, `e_venue`, `e_date`, `e_fee`, `u_id`, `status`, `entry_datetime`, `e_banner`, `c_id`, `e_time`, `uni_id`, `team`, `result`, `voting`) VALUES
(1, 'test', ' asdasdasdas\r\ndasdadasdasd\r\ndas\r\n										\r\n										', 'islam', '2016-11-30', 100, 7, 0, '2016-08-18 14:51:19', '', 3, '23:58:00', 0, 0, 0, 0),
(2, 'test', ' asdasdasdas\r\ndasdadasdasd\r\ndas\r\n										\r\n										', 'islam', '2016-11-30', 100, 5, 0, '2016-08-18 14:54:18', '', 2, '23:58:00', 0, 0, 0, 0),
(3, 'test', ' asdasdasdas\r\ndasdadasdasd\r\ndas\r\n										\r\n										', 'islam', '2016-11-30', 100, 5, 0, '2016-08-18 14:55:09', '', 1, '23:58:00', 0, 0, 0, 0),
(4, 'test', ' asdadadadasdasdasdad\r\nasdasdasdasdasdsd\r\nasdasdasdasd\r\n										\r\n										', 'islam', '2016-11-30', 100, 7, 0, '2016-08-18 14:56:02', 'images/uploaded_files/Capture.PNG', 1, '11:58:00', 0, 0, 0, 0),
(5, 'testsss', ' \r\n										 \r\n										 asdadadadasdasdasdad\r\nasdasdasdasdasdsd\r\nasdasdasdasd\r\n										\r\n																														', 'islam', '2016-11-30', 100, 7, 0, '2016-08-18 14:56:42', 'images/uploaded_files/bag-banner.jpg', 1, '00:58:00', 0, 0, 0, 0),
(6, 'Dota', ' \r\n										sdaskjdhkasd a asdjhd askjdhjasdh askjdhasd sadkjhaskjshkjdhas dasdkjashdjashdkjasdhasjdhasdhasdhakjsdhaskkjdsk d \r\n																														', 'Islamabad', '2015-11-28', 100, 7, 0, '2016-08-19 08:24:16', 'images/uploaded_files/', 1, '23:58:00', 97, 3, 1, 0),
(8, 'Photo', 'asdajskdhasdjkkjhjsadkhjsadsadjjjjsajkdjk sadkjasdaskjdasdas kjasdasdkjasdkjsadhj sadkjj sadkjasdjhasd asdjkasdh  \r\n																				', 'Rawalpindi', '2016-08-23', 50, 8, 0, '2016-08-21 06:34:37', 'images/uploaded_files/', 2, '13:00:00', 119, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` text NOT NULL,
  `p_contact` text NOT NULL,
  `p_email` text NOT NULL,
  `t_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`p_id`, `p_name`, `p_contact`, `p_email`, `t_id`, `image`, `score`) VALUES
(1, 'ahmed', '123445', 'waleed@yaho.com', 3, '', 0),
(2, 'waleedssss', '123445', 'waleed@yaho.com', 3, '', 0),
(4, 'ahmse', '12313', 'ahm@ha.com', 0, '', 0),
(5, 'test', '21123', 'asd@yah.com', 3, '', 0),
(6, 'wal', '23123', 'wal@ja.com', 4, 'images/event/image-2.jpg', 0),
(7, 'ahmed', '122314', 'wads@jad.com', 5, 'images/event/image-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` text NOT NULL,
  `uni_id` int(11) NOT NULL,
  `t_contact` text NOT NULL,
  `t_fee` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `entry_datetime` date NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `uni_id`, `t_contact`, `t_fee`, `u_id`, `e_id`, `entry_datetime`, `position`) VALUES
(1, 'Star', 98, '03415326', 0, 1, 6, '2016-08-19', 1),
(2, 'VO', 45, '123123', 1, 0, 6, '2016-08-19', 2),
(3, 'Wal', 119, '23123', 1, 8, 6, '2016-08-19', 3),
(4, 'P11', 97, '343516247', 1, 7, 8, '2016-08-21', 1),
(5, 'Sa', 176, '123123', 1, 9, 8, '2016-08-21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `title` text NOT NULL,
  `uni_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`uni_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`title`, `uni_id`) VALUES
('Foundation University', 1),
('Forman Christian College', 2),
('Federal Urdu University of Arts, Sciences and Technology', 3),
('Fatima Jinnah Women University', 4),
('Dow University of Health Sciences', 5),
('Domino English Learning Center', 6),
('Dawood College of Engineering & Technology', 7),
('Dadabhoy Institute of Higher Education', 8),
('College Of Digital Science', 9),
('City University of Science & Information Technology', 10),
('COMSATS Institute of Information Technology', 11),
('Beaconhouse National University', 12),
('Baqai Medical University', 13),
('Balochistan University of Information Technology and Management Sciences', 14),
('Balochistan University of Engineering and Technology', 15),
('Bahria University', 16),
('Bahauddin Zakariya University', 17),
('BISE Zhob', 18),
('BISE Turbat', 19),
('BISE Swat', 20),
('BISE Sukkur', 21),
('BISE Sargodha', 22),
('BISE Quetta', 23),
('BISE Peshawar', 24),
('BISE Mirpurkhas', 25),
('BISE Mardan', 26),
('BISE Malakand', 27),
('BISE Larkana', 28),
('BISE Kohat', 29),
('BISE Karachi', 30),
('BISE Hyderabad', 31),
('BISE Faisalabad', 32),
('BISE DG Khan', 33),
('BISE Bannu', 34),
('Shah Abdul Latif University Sind', 35),
('BISE Bahawalpur', 36),
('BISE Abbottabad', 37),
('BISE Rawalpindi', 38),
('BISE Multan', 39),
('BISE Lahore', 40),
('BISE Gujranwala', 41),
('Allama Iqbal Open University', 42),
('Al-Khair University', 43),
('Air University', 44),
('Aga Khan University Examination Board', 45),
('AJK BISE', 46),
('ACCA Pakistan', 47),
('BISE D.I.Khan', 48),
('Govt High School Munde', 49),
('Govt Middle School Jakak Pur', 50),
('Govt High School Khushab', 51),
('Govt High School Langah Bhattiyan', 52),
('Directorate of Social Walfare Government of Pakistan', 53),
('Secondary School Certificate Examination', 54),
('SDC Karachi', 55),
('SDC Lahore', 56),
('SDC Islamabad', 57),
('SDC Peshawar', 58),
('Overseas Pakistanis Foundation', 59),
('Pakistan Air Force', 60),
('Askari College Rawalpindi', 61),
('Kali suba Khan Gujranwala', 62),
('Gharial Kalan Sheikhupura', 63),
('Rawalpindi Board of Education', 64),
('Board of Secondary Education Karachi', 65),
('Board of Intermediate & Secondary Education Peshawar', 66),
('Hyderabad Board', 67),
('Hyderabad Board', 68),
('Sindh University Jamshoro', 69),
('Sidat Hyder Audit Firm', 70),
('Punjab University', 71),
('FBISE - Islamabad', 72),
('Corvit Systems', 73),
('Militry College of Engineering', 74),
('Middle School Amra', 75),
('Highest Military Education Certificate', 76),
('Frontier Women University', 77),
('GIFT University', 78),
('Gandhara University', 79),
('Ghulam Ishaq Khan Institute of Engineering Sciences & Technology', 80),
('Gomal University', 81),
('Government College University Faisalabad', 82),
('Government College University Lahore', 83),
('Greenwich University', 84),
('Hajvery University', 85),
('Hamdard University', 86),
('Hazara University, Dodhial', 87),
('Imperial College of Business Studies', 88),
('Indus Institute of Higher Education', 89),
('Indus Valley School of Art and Architecture', 90),
('Institute of Business & Technology BIZTEK', 91),
('Institute of Business Administration (IBA)', 92),
('Institute of Business Management (IoBM)', 93),
('Institute of Cost and Management Accountants of Pakistan', 94),
('Institute of Management Sciences', 95),
('Institute of Space Technology (IST)', 96),
('International Islamic University', 97),
('Iqra University', 98),
('Islamia University', 99),
('Isra University', 100),
('Jinnah University for Women', 101),
('KASB (Khadim Ali Shah Bukhari) Institute of Technology', 102),
('Karachi Institute of Economics & Technology', 103),
('Karakurum International University', 104),
('Khyber Medical University', 105),
('King Edward Medical University', 106),
('Kinnaird College for Women', 107),
('Kohat University of Science & Technology', 108),
('LOGIX College', 109),
('Lahore College for Women University', 110),
('Lahore School of Economics', 111),
('Lahore University of Management Sciences', 112),
('Liaquat University of Medical and Health Sciences', 113),
('Mehran University of Engineering & Technology', 114),
('Minhaj University', 115),
('Mohammad Ali Jinnah University', 116),
('Mohi-ud-Din Islamic University', 117),
('NED University of Engineering & Technology', 118),
('NUST Business School', 119),
('NWFP Agriculture University', 120),
('NWFP Board of Technical Education', 121),
('NWFP Board of Technical Education, Peshawar', 122),
('NWFP University of Engineering & Technology', 123),
('National College of Arts', 124),
('National Textile University, Faisalabad (Federal Chartered)', 125),
('National University of Computer and Emerging Sciences', 126),
('National University of Modern Languages (NUML)', 127),
('National University of Science and Technology', 128),
('Netsol Technology Institute', 129),
('Newports Institute of Communications and Economics', 130),
('Northern University', 131),
('Pakistan Military Academy', 132),
('Pakistan Naval Academy', 133),
('Preston Institute of Management Sciences and Technology', 134),
('Preston University', 135),
('Punjab Board of Technical Education', 136),
('Punjab Board of Technical Education Lahore', 137),
('Quaid-e-Awam University of Engineering, Science & Technology', 138),
('Quaid-i-Azam University', 139),
('Riphah International University', 140),
('SEECS', 141),
('Sardar Bahadur Khan Women University', 142),
('Sarhad University of Science & Information Technology', 143),
('Shah Abdul Latif University', 144),
('Shaheed Zulfikar Ali Bhutto Institute of Science & Technology (SZABIST)', 145),
('Sindh Agriculture University', 146),
('Sindh Board of Technical Education, Karachi', 147),
('Sir Syed University of Engg. & Technology', 148),
('Sukkur Institute of Business Administration', 149),
('Textile Institute of Pakistan', 150),
('The Superior College', 151),
('University Of Engineering & Technology, Taxila', 152),
('University of Agriculture', 153),
('University of Arid Agriculture, Murree Road', 154),
('University of Azad Jammu & Kashmir, Muzaffarabad', 155),
('University of Balochistan', 156),
('University of Central Punjab (UCP)', 157),
('University of East', 158),
('University of Education', 159),
('University of Engineering & Technology, Lahore', 160),
('University of Faisalabad', 161),
('University of Gujrat', 162),
('University of Health Sciences', 163),
('University of Karachi', 164),
('University of Lahore', 165),
('University of Malakand, Chakdara', 166),
('University of Management & Technology (UMT)', 167),
('University of Peshawar', 168),
('University of Sargodha', 169),
('University of Science & Technology Bannu', 170),
('University of Sindh', 171),
('University of South Asia', 172),
('University of Veterinary and Animal Sciences', 173),
('University of the Punjab', 174),
('Usman Institute of Technology (UIT)', 175),
('Virtual university of Pakistan', 176),
('Ziauddin Medical University', 177),
('Others', 178),
('Nicon - Lahore', 179),
('Space Way Technology Multan', 180),
('Armed Forces Board for Higher Education', 181),
('Armed Forces Board for Higher Education', 182),
('Govt Muslim Model High School Bhairi Khurd', 183),
('Allama Iqbal University ', 184),
('Govt High School Retrhi', 185),
('Armed Forces Board for Higher Education', 186),
('Allama Iqbal University ', 187),
('Govt High School Khanpur', 188),
('Govt High School Haveel Bhadar Jhang', 189),
('Mirpur Azad Khasmir', 190),
('Militry College of Engineering', 191),
('Govt High School Bara Pind', 192),
('Armed Forces Board for Higher Education', 193),
('Govt College Ravi Road Shahdara Lahore', 194),
('Govt High School Balkassar', 195),
('Radiant College Lahore', 196),
('Islami College Peshawar', 197),
('Govt Middle School Lahore', 198),
('Govt High School Kot Naina', 199),
('Govt Primary School Pakhokey ', 200),
('Govt High School 38 D Okara', 201),
('Mardan Board', 202),
('Govt Primary School Mor Khunda', 203),
('Sarhad University', 204),
('Govt Degree college', 205),
('Chartered Institute of Personnel & Development - UK', 206),
('Madrasa Taleemul Quran Rwp', 207),
('Vanguard Consulting', 208),
('Gujranwala Board of Education', 209),
('Board of Intermediate & Secondary Education, Faisalabad', 210),
('CTTI - Islamabad', 211),
('CTTB - Karachi', 212);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(10, '', '', 'wsaleed@wlssoft.com', '123456', 0),
(9, '', '', 'walseed@wlssoft.com', '123456', 0),
(8, '', '', 'waleeds@wlssoft.com', '123456', 0),
(7, '', '', 'waleed@wlssoft.com', '123456', 0),
(11, '', '', 'sawaleed@wlssoft.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote_hist`
--

CREATE TABLE IF NOT EXISTS `vote_hist` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vote_hist`
--

INSERT INTO `vote_hist` (`v_id`, `u_id`, `p_id`, `e_id`) VALUES
(8, 10, 7, 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
