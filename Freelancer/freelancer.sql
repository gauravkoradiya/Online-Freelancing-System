-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 03:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admid` int(11) NOT NULL,
  `admemail` text NOT NULL,
  `admpass` text NOT NULL,
  `admdp` text NOT NULL,
  `secque` text NOT NULL,
  `secans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admid`, `admemail`, `admpass`, `admdp`, `secque`, `secans`) VALUES
(1, 'a@gmail.com', 'A@123', 'A', 'WHAT is your name?', 'A'),
(2, 'gauravkoradiya@gmail.com', 'Gaurav@123', 'GK', 'what is your best friend???', 'sdk'),
(3, 'b@gmail.com', 'B@123', 'B', 'what is your friend??', 'C'),
(4, 'c@gmail.com', 'C@123', 'C', 'what is your friend??', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `bidtbl`
--

CREATE TABLE `bidtbl` (
  `bid_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `budget` text NOT NULL,
  `days` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidtbl`
--

INSERT INTO `bidtbl` (`bid_id`, `employee_id`, `project_id`, `budget`, `days`, `employer_id`, `status`, `date`) VALUES
(18, 1, 2, '900', 900, 1, '', '2016-04-04'),
(19, 2, 1, '888', 8, 1, '', '2016-04-04'),
(20, 1, 5, '0', 3, 1, '', '2016-04-06'),
(21, 1, 5, '$2,500 to $5,000', 89, 1, '', '2016-04-06'),
(22, 1, 4, '$2,500 to $5,000', 9, 3, '', '2016-04-06'),
(23, 2, 5, '7676', 10, 1, '', '2016-04-06'),
(24, 2, 2, '1000', 100, 3, '', '2016-04-06'),
(25, 2, 2, '100000', 10, 3, '', '2016-04-06'),
(26, 2, 8, '5000', 50, 1, '', '2016-04-06'),
(27, 2, 5, '4000', 40, 2, '', '2016-04-06'),
(28, 1, 11, '9000', 15, 1, '', '2016-04-06'),
(29, 1, 12, '60000', 100, 1, '', '2016-04-06'),
(30, 1, 3, '1111', 11, 3, '', '2016-04-06'),
(31, 1, 2, '999', 99, 3, '', '2016-04-06'),
(32, 1, 2, '1000', 10, 3, '', '2016-04-07'),
(33, 1, 2, '1000', 10, 3, '', '2016-04-09'),
(34, 1, 5, '9090', 15, 1, '', '2016-04-09'),
(35, 1, 9, '9999', 15, 1, '', '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `catetbl`
--

CREATE TABLE `catetbl` (
  `cate_id` int(11) NOT NULL,
  `cate_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catetbl`
--

INSERT INTO `catetbl` (`cate_id`, `cate_name`) VALUES
(1, 'Computer & IT'),
(2, 'Designing'),
(3, 'Data Entry'),
(4, 'Computer science'),
(12, 'ergergerg'),
(13, 'fdfgdg'),
(14, 'dfbdfdvdfvdfvdf'),
(15, 'wefwefwe'),
(16, 'dfvdfvdf'),
(17, 'vdfdvdfv'),
(18, '1234567890'),
(19, 'dfbfvdf'),
(20, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `choosed_skill`
--

CREATE TABLE `choosed_skill` (
  `cs_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choosed_skill`
--

INSERT INTO `choosed_skill` (`cs_id`, `employee_id`, `skill_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 12),
(4, 4, 8),
(5, 4, 11),
(6, 4, 0),
(7, 4, 0),
(9, 4, 21),
(10, 4, 21),
(11, 4, 21),
(12, 4, 8),
(13, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `completeprj`
--

CREATE TABLE `completeprj` (
  `completeprj_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `Budget` int(11) NOT NULL,
  `prjfile` text NOT NULL,
  `complete_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completeprj`
--

INSERT INTO `completeprj` (`completeprj_id`, `p_id`, `employee_id`, `employer_id`, `Budget`, `prjfile`, `complete_Date`) VALUES
(1, 1, 4, 1, 6000, 'completed', '2017-09-15'),
(2, 4, 1, 2, 6000, 'ctf0q1f071g02qchmkukoi8b6p.ppt', '2017-10-25'),
(3, 6, 2, 1, 6000, '16h2i00kbgpmfof01kcqutc8q7.docx', '2017-10-25'),
(4, 5, 3, 3, 6000, '8chomuf10fctg76q2biq0k10pk.ppt', '2017-10-25'),
(5, 2, 5, 2, 6000, '', '2017-10-25'),
(6, 7, 6, 1, 6000, '', '2017-10-25'),
(7, 4, 4, 3, 3000, '', '2017-10-25'),
(8, 4, 4, 2, 6000, '', '2017-10-25'),
(9, 4, 4, 3, 0, '', '2017-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `contactustbl`
--

CREATE TABLE `contactustbl` (
  `comp_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactustbl`
--

INSERT INTO `contactustbl` (`comp_id`, `email`, `subject`, `msg`) VALUES
(2, 'vgv@gmail.com', 'vhvhgbHGVFH', 'fgvbj'),
(4, 'gauravkoradiya@gmail.com', 'complain', 'asdfghjkl;zxcvbnm,ertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `employee_acc`
--

CREATE TABLE `employee_acc` (
  `acc_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `ac_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_acc`
--

INSERT INTO `employee_acc` (`acc_id`, `employee_id`, `name`, `ac_no`) VALUES
(1, 1, 'sonali', '2147483647'),
(2, 4, 'gaurav', '000000000'),
(3, 5, 'sandip', '9999999999'),
(4, 0, 'acshjashc', '12345678909876');

-- --------------------------------------------------------

--
-- Table structure for table `employee_regitbl`
--

CREATE TABLE `employee_regitbl` (
  `employee_id` int(11) NOT NULL,
  `fn` text NOT NULL,
  `ln` text NOT NULL,
  `em` text NOT NULL,
  `un` text NOT NULL,
  `pass` text NOT NULL,
  `cn1` text NOT NULL,
  `cn2` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `que` text NOT NULL,
  `ans` text NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_regitbl`
--

INSERT INTO `employee_regitbl` (`employee_id`, `fn`, `ln`, `em`, `un`, `pass`, `cn1`, `cn2`, `address`, `city`, `que`, `ans`, `balance`) VALUES
(1, 'sonali', 'mistry', 'sonalimistry@gmail.com', 'sonali', 'sonali', '9876543210', '9876543201', 'bilimora', 'Bilimora', 'cousin_name', 'Sonali', 0),
(2, 'Yagnesh', 'Mistry', 'yagu@gmail.com', 'yagu', 'yagnesh', '9876543210', '9876543201', 'bilimora', 'bilimora', 'nick_name', 'Yagu', 0),
(3, 'Mitali', 'Patel', 'mitali@gmal.icom', 'soygu', 'sonali', '9876543210', '9876543201', 'narayan nagar', 'Bilimora', 'cousin_name', 'mit', 0),
(4, 'gaurav', 'koradiya', 'gauravkoradiya@gmail.com', 'gauravkoradiya', 'Gaurav@123', '7874869304', '7874869304', 'varachha road', 'surat', 'what is your friend??', 'dada', 10000),
(5, 'sandip', 'mathukiya', 'sandipmathukiya@gmail.com', 'sandip', 'Sandip@123', '9662944745', '9662944745', 'kalakunj', 'surat', 'what is your friend', 'GK', 50000),
(6, 'mayur', 'vekariya', 'mayurvekariya@gmail.com', 'mayur', 'Mayur@123', '9099563254', '8160575599', 'kargilchovk', 'surat', 'what is your nick name??', 'mayu', 0),
(7, 'gaurang', 'kumbhani', 'gaurangkumbhai@gmail.com', 'gaurang', 'Gauravg@123', '9016693057', '9016693057', 'yogichock', 'surat', 'who is your nickname', 'gavo', 0),
(8, 'vdfvdfv', 'fvdfvdf', 'vdfvdf', 'a@gmail.com', 'A@123', 'vdfvdf', 'vdfv', 'dfvd', 'fvdf', 'cousin_name', 'dfvdfv', 0),
(10, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaa', '123456789@gmail.com', '123456789', 'aaa', '1234567890', '1234567890', '123456789', '123456789', 'childhood_hero', '123456789', 0),
(11, 'gfbfhdfhdf', 'bdfbdfb', 'dfbdfb', 'vdfvsdv@gmail.com', 'dsvdsvsdv', '657567', '776457', 'dfgbdfbdf', 'bfsdsd', 'nick_name', 'nggcnc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employerpaytbl`
--

CREATE TABLE `employerpaytbl` (
  `employerpay_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employerpaytbl`
--

INSERT INTO `employerpaytbl` (`employerpay_id`, `p_id`, `amount`, `employer_id`, `employee_id`) VALUES
(1, 1, 6000, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `employer_regitbl`
--

CREATE TABLE `employer_regitbl` (
  `employer_id` int(11) NOT NULL,
  `fn` text NOT NULL,
  `ln` text NOT NULL,
  `em` text NOT NULL,
  `un` text NOT NULL,
  `pass` text NOT NULL,
  `cnm` text NOT NULL,
  `cadd` text NOT NULL,
  `cem` text NOT NULL,
  `cn1` text NOT NULL,
  `city` text NOT NULL,
  `que` text NOT NULL,
  `ans` text NOT NULL,
  `balance` int(11) NOT NULL,
  `Img_upld` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_regitbl`
--

INSERT INTO `employer_regitbl` (`employer_id`, `fn`, `ln`, `em`, `un`, `pass`, `cnm`, `cadd`, `cem`, `cn1`, `city`, `que`, `ans`, `balance`, `Img_upld`) VALUES
(1, 'sonali1', 'Patel', 'sonalimistry@gmail.com', 'sonali', 'ssssss', 'Sheetal glass', 'bilimora', 'test@gmail.com', '9876543210', 'bilimora', 'nick_name', 'sonali', 0, 'epsl1d567qjk263ih7uvljndvn.jpg'),
(2, 'gaurav', 'koradiya', 'gauravkoradiya@gmail.com', 'anonymousgksdkb', '123', 'anonymouscore', 'punee', 'anonymouscore@yahoo.in', '7865683252', 'pune', 'what is your friend?', 'dada', 60000, 'gk.jpg'),
(3, 'Yagnesh', 'Mistry', 'yagneshmistry@gmail.com', 'yagu', 'yagnesh', 'yagnesh', 'gcgvbh', 'glass@yahoo.in', '9876543210', 'Bilimora', 'nick_name', 'Yagu', 0, 'mnr5nuqupre90iu7lpjug0qm3h.jpg'),
(4, 'sandip', 'mathukiya', 'sandipmathukiya@gmail.com', 'sandip', 'Sandip@123', 'Aylen pharma', 'jammu', 'aylenphrma@gmail.com', '5698756895', 'surat', 'friend???', 'atul', 2000, 'sm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `p_id`, `username`, `message`) VALUES
(1, 12, '', 'sonali'),
(2, 12, '', 'bhjbn'),
(3, 12, 'sonali', 'sonali'),
(4, 5, '234', 'bhjun'),
(5, 12, '234', 'vbhj'),
(6, 12, 'sonali', 'hnj'),
(7, 12, '234', 'vghb'),
(8, 5, '234', 'vhgbjn'),
(9, 5, '234', 'vbyh'),
(10, 5, '234', 'bjn'),
(11, 12, '234', 'n jnjn'),
(12, 12, '234', 'vhb'),
(13, 12, 'sonali', 'vghb'),
(14, 5, 'yagu', 'vbhynj'),
(15, 5, '234', 'bjn'),
(16, 2, 'sonali', 'v hb'),
(17, 2, 'sonali', 'cvghb\r\n'),
(18, 2, 'yagu', 'cfvh'),
(19, 9, 'sonali', 'hi..\r\n'),
(20, 0, 'Array', 'fdvfererv'),
(21, 0, 'anonymousgksdkb', 'ervevev'),
(22, 0, 'anonymousgksdkb', 'gbgbgbg'),
(23, 1, 'anonymousgksdkb', 'vsfvfvefvv'),
(24, 1, 'anonymousgksdkb', 'ascasca');

-- --------------------------------------------------------

--
-- Table structure for table `prjtbl`
--

CREATE TABLE `prjtbl` (
  `p_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `budget` text NOT NULL,
  `days` int(11) NOT NULL,
  `files` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prjtbl`
--

INSERT INTO `prjtbl` (`p_id`, `employer_id`, `p_name`, `cate_id`, `skill_id`, `details`, `budget`, `days`, `files`, `date`) VALUES
(2, 1, 'Project1', 1, 4, 'Make a website for Freelancer', '$250 to $500', 10, '3ehm0of863197t103ftgd4jsvq.docx', '2016-04-09'),
(3, 3, 'abc', 3, 6, 'abc', '800', 8, '', '2016-04-04'),
(4, 3, 'abc', 1, 4, 'abc', '900', 9, '', '2016-04-04'),
(5, 1, 'html', 1, 4, 'html php php phh php jhp h phjj n j nbjnjn bhjn bhbnj jnnj bhjbn ', '$2,500 to $5,000', 5, '', '2016-04-05'),
(6, 1, 'php', 1, 5, 'php njdn jbjc sdbxja szam bjh jhnm', '$250 to $500', 9, '', '2016-04-06'),
(9, 1, 'yagnesh', 1, 4, 'yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh yagnesh', '$500 to $1,000', 8, '6i2jo8nuqddkq1ufooeh025ae2.jpg', '2016-04-05'),
(10, 1, 'html php', 3, 19, 'html html html html', '$250 to $500', 15, 'fggb9nkvi1nsug7baod2kmfqgm.docx', '2016-04-06'),
(11, 1, 'ABC', 3, 17, 'ABC', '$250 to $500', 10, 'nkmg9ofv2ibb7mugkggdqsfan1.php', '2016-04-06'),
(13, 3, 'yagnesh', 1, 8, 'Yagnesh', '$250 to $500', 19, 'on7bkqsf1gab29iknugdmmfgvg.php', '2016-04-06'),
(14, 3, 'abc', 3, 6, 'bjn bjn  jb', '$250 to $500', 80, '9gd2ukavsggimn1q7kbmgfbonf.php', '2016-04-06'),
(15, 3, 'bnj', 1, 5, 'nk', 'Under $250', 78, '72ga9sggboqku1imgdnfkvmfnb.php', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `prj_allocated`
--

CREATE TABLE `prj_allocated` (
  `allocated_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_allocated`
--

INSERT INTO `prj_allocated` (`allocated_id`, `p_id`, `budget`, `employee_id`, `employer_id`, `date`) VALUES
(1, 1, 6000, 4, 1, '2017-06-20'),
(2, 2, 1000, 1, 3, '2016-07-12'),
(3, 9, 9999, 1, 1, '2016-04-09'),
(5, 5, 5000, 5, 4, '2016-10-13'),
(6, 8, 5000, 2, 0, '2017-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `skilltbl`
--

CREATE TABLE `skilltbl` (
  `skill_id` int(11) NOT NULL,
  `skill_name` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skilltbl`
--

INSERT INTO `skilltbl` (`skill_id`, `skill_name`, `cate_id`, `sub_id`) VALUES
(2, 'HTML', 2, 3),
(4, 'jQuery1', 2, 3),
(5, 'photoshop', 2, 2),
(6, 'logoX', 2, 2),
(8, 'Ethical Hacking', 1, 1),
(11, 'network administator & security analyst', 1, 1),
(12, 'ASP', 2, 3),
(13, 'PHP', 2, 3),
(15, 'python', 1, 5),
(16, 'MongoDB', 3, 4),
(17, 'Oracle', 3, 4),
(19, 'Mysql', 3, 4),
(20, 'Artificial Intelligence', 4, 6),
(21, 'java ', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcatetbl`
--

CREATE TABLE `subcatetbl` (
  `sub_id` int(11) NOT NULL,
  `sub_name` text NOT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcatetbl`
--

INSERT INTO `subcatetbl` (`sub_id`, `sub_name`, `cate_id`) VALUES
(1, 'networking & security', 1),
(2, 'Logo Design', 2),
(3, 'Templet Design & web appliaction', 2),
(4, 'Accounting Data', 3),
(5, 'desktop Application', 1),
(6, 'neural network', 4),
(7, 'robotics', 4),
(15, 'dfvsfs', 14),
(16, ' df df df', 14),
(18, 'fvdfsd', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admid`) USING BTREE;

--
-- Indexes for table `bidtbl`
--
ALTER TABLE `bidtbl`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `catetbl`
--
ALTER TABLE `catetbl`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `choosed_skill`
--
ALTER TABLE `choosed_skill`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `completeprj`
--
ALTER TABLE `completeprj`
  ADD PRIMARY KEY (`completeprj_id`);

--
-- Indexes for table `contactustbl`
--
ALTER TABLE `contactustbl`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `employee_acc`
--
ALTER TABLE `employee_acc`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `employee_regitbl`
--
ALTER TABLE `employee_regitbl`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employerpaytbl`
--
ALTER TABLE `employerpaytbl`
  ADD PRIMARY KEY (`employerpay_id`);

--
-- Indexes for table `employer_regitbl`
--
ALTER TABLE `employer_regitbl`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prjtbl`
--
ALTER TABLE `prjtbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prj_allocated`
--
ALTER TABLE `prj_allocated`
  ADD PRIMARY KEY (`allocated_id`);

--
-- Indexes for table `skilltbl`
--
ALTER TABLE `skilltbl`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `subcatetbl`
--
ALTER TABLE `subcatetbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bidtbl`
--
ALTER TABLE `bidtbl`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `catetbl`
--
ALTER TABLE `catetbl`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `choosed_skill`
--
ALTER TABLE `choosed_skill`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `completeprj`
--
ALTER TABLE `completeprj`
  MODIFY `completeprj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactustbl`
--
ALTER TABLE `contactustbl`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_acc`
--
ALTER TABLE `employee_acc`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_regitbl`
--
ALTER TABLE `employee_regitbl`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employerpaytbl`
--
ALTER TABLE `employerpaytbl`
  MODIFY `employerpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer_regitbl`
--
ALTER TABLE `employer_regitbl`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prjtbl`
--
ALTER TABLE `prjtbl`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prj_allocated`
--
ALTER TABLE `prj_allocated`
  MODIFY `allocated_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skilltbl`
--
ALTER TABLE `skilltbl`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subcatetbl`
--
ALTER TABLE `subcatetbl`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
