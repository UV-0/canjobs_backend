-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 06:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(101) NOT NULL,
  `email` varchar(251) NOT NULL,
  `password` varchar(301) NOT NULL,
  `name` text DEFAULT NULL,
  `contact_no` bigint(21) DEFAULT NULL,
  `admin_type` varchar(251) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`, `contact_no`, `admin_type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin.canjobs@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 9900000001, 'super-admin', 1, '2023-03-11 11:49:45', '2023-03-11 11:49:45'),
(2, 'virat@gmail.com', '5a39fe36ce9aa092ffe8faa0eaedd5da', 'virat', NULL, 'admin', 1, '2023-03-17 05:38:25', '2023-03-17 05:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `apply_on_job`
--

CREATE TABLE `apply_on_job` (
  `apply_id` int(101) NOT NULL,
  `job_id` int(101) NOT NULL,
  `employee_id` int(101) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_on_job`
--

INSERT INTO `apply_on_job` (`apply_id`, `job_id`, `employee_id`, `created_at`) VALUES
(2, 1, 7, '2023-03-15 05:13:29'),
(4, 2, 9, '2023-03-15 05:16:44'),
(5, 1, 1, '2023-03-15 05:19:17'),
(6, 1, 2, '2023-03-15 05:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `company_kyc`
--

CREATE TABLE `company_kyc` (
  `id` int(101) NOT NULL,
  `company_id` int(101) NOT NULL,
  `pan_no` varchar(251) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `pan_date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pincode` int(51) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `gstin` varchar(101) DEFAULT NULL,
  `fax_number` int(101) DEFAULT NULL,
  `tan_number` int(101) DEFAULT NULL,
  `document` varchar(251) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_kyc`
--

INSERT INTO `company_kyc` (`id`, `company_id`, `pan_no`, `name`, `pan_date`, `address`, `pincode`, `city`, `state`, `country`, `gstin`, `fax_number`, `tan_number`, `document`, `created_at`, `updated_at`) VALUES
(1, 5, 'arfgv5615f', 'jhon', '2012-01-01', 'andher nagari chor gali kholi no 420', 454545, NULL, 'comma', 'earth', NULL, NULL, NULL, NULL, '2023-03-07 04:57:38', '2023-03-07 04:59:43'),
(2, 2, 'arfgv5615f', 'tcs', '1990-01-01', 'santa cruz tata bussiness center', 700001, 'mumbai', 'maharashtra', 'India', '65465sdf', 453453, 654554, NULL, '2023-03-09 08:58:31', '2023-03-09 08:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(101) NOT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` bigint(15) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `marital_status` varchar(55) DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `current_location` text DEFAULT NULL,
  `currently_located_country` text DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `religion` text DEFAULT NULL,
  `interested_in` text DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `work_permit_canada` char(100) DEFAULT NULL,
  `work_permit_other_country` text DEFAULT NULL,
  `resume` varchar(301) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `email`, `password`, `contact_no`, `description`, `date_of_birth`, `gender`, `marital_status`, `nationality`, `current_location`, `currently_located_country`, `language`, `religion`, `interested_in`, `experience`, `work_permit_canada`, `work_permit_other_country`, `resume`, `profile_photo`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'sdfg', 'w2c@gmail.com', 'qwerty', 9998887774, 'akljsd dafkjo oijdsfo sdv', '1990-12-16', 'male', 'unmarried', 'canadian', 'toranto', 'canada', 'English', 'atheist', 'swap', 'fresher', 'yes', 'no', NULL, NULL, '2023-02-23 08:53:01', '2023-03-06 04:25:49', 0),
(2, 'utk', 'utk@gmail.com', 'abc', 9100005555, NULL, '1993-11-16', 'male', 'married', NULL, 'hawai', NULL, 'french', NULL, 'part-time', 'experinced', NULL, NULL, 'http://localhost/naukari/uploads/1677142859.docx', NULL, '2023-02-23 09:00:59', '2023-02-23 09:25:46', 0),
(4, 'qaz', 'qaz@gmail.com', 'qaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677839964.docx', NULL, '2023-03-03 10:39:24', '2023-03-03 10:39:24', 1),
(5, 'azc', 'abc@gmail.com', 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677840252.docx', NULL, '2023-03-03 10:44:12', '2023-03-03 10:44:12', 1),
(6, 'xyz', 'xyz@gmail.com', 'd16fb36f0911f878998c136191af705e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677842025.docx', NULL, '2023-03-03 11:13:45', '2023-03-03 11:13:45', 1),
(7, 'jhon', 'jhon@gmail.com', '4c25b32a72699ed712dfa80df77fc582', 9998885552, 'akljsd klqjhndf lsda joidjv oidjasckjkodas poijdsj asdjvcolikjdocv adsrfgv', '1990-12-12', 'male', 'married', 'American', 'ibiza', 'span', 'english', 'hindu', 'development', '5+ yrs', 'Yes', 'Yes', 'http://localhost/naukari/uploads/1677844091.docx', 'http://localhost/naukari/uploads/1678513411.png', '2023-03-03 11:48:11', '2023-03-11 05:43:31', 0),
(9, 'smith', 'smith@gmail.com', 'a66e44736e753d4533746ced572ca821', 9998885552, 'akljsd klqjhndf lsda joidjv oidjasckjkodas poijdsj asdjvcolikjdocv adsrfgv', '1990-12-12', 'male', 'married', 'American', 'ibiza', 'span', 'english', 'hindu', 'development', '5+ yrs', 'Yes', 'Yes', 'http://localhost/naukari/uploads/1678532631.pdf', NULL, '2023-03-11 10:12:17', '2023-03-11 11:03:51', 0),
(10, NULL, 'asdg@gmail.com', 'a66e44736e753d4533746ced572ca821', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1678530032.docx', NULL, '2023-03-11 10:20:32', '2023-03-11 10:20:32', 0),
(12, NULL, 'qwerty@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1678531461.pdf', NULL, '2023-03-11 10:44:21', '2023-03-11 10:44:21', 0),
(13, NULL, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 06:41:54', '2023-03-14 06:41:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_career`
--

CREATE TABLE `employee_career` (
  `career_id` int(251) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `company` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `company_location` varchar(300) DEFAULT NULL,
  `industry` char(30) DEFAULT NULL,
  `functional_area` text DEFAULT NULL,
  `work_level` varchar(101) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `currently_work_here` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_career`
--

INSERT INTO `employee_career` (`career_id`, `employee_id`, `company`, `designation`, `company_location`, `industry`, `functional_area`, `work_level`, `start_date`, `end_date`, `currently_work_here`, `created_at`, `updated_at`) VALUES
(1, 1, 'meta', 'CEO', 'Indore', 'IT', 'Product Design', 'hard', '2016-07-07', '2021-12-31', 1, '2023-02-23 08:56:45', '2023-03-06 06:14:41'),
(2, 1, 'google', 'Team Lead', 'hawa supai', 'software', NULL, '5+', '2010-01-01', '2016-06-01', 0, '2023-02-23 09:03:27', '2023-02-23 09:25:46'),
(9, 7, 'meta', 'CEO', 'Indore', 'IT', 'Product Design', 'hard', '2016-07-07', '2021-12-31', 1, '2023-03-06 06:13:16', '2023-03-06 06:14:11'),
(10, 10, 'facebook', 'SEO', 'Indore', 'IT', 'Product Design', 'hard', '2016-07-07', '2021-12-31', 1, '2023-03-06 06:15:26', '2023-03-10 06:10:37'),
(11, 5, 'tcs', 'senior developer', 'mumbai', 'IT', 'Product Design', 'hard', '2010-08-07', '2021-12-31', 1, '2023-03-10 06:13:30', '2023-03-10 06:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `education_id` int(101) NOT NULL,
  `employee_id` int(101) NOT NULL,
  `qualification` varchar(251) DEFAULT NULL,
  `university_institute` text DEFAULT NULL,
  `course` text DEFAULT NULL,
  `specialization` text DEFAULT NULL,
  `institute_location` text DEFAULT NULL,
  `passing_year` smallint(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_education`
--

INSERT INTO `employee_education` (`education_id`, `employee_id`, `qualification`, `university_institute`, `course`, `specialization`, `institute_location`, `passing_year`, `created_at`, `updated_at`) VALUES
(1, 7, 'graduate', 'davv', 'bca', NULL, 'Indore', 2016, '2023-03-09 12:56:32', '2023-03-09 12:56:32'),
(2, 7, 'post-graduate', 'rgpv', 'mca', 'data science', 'Indore', 2018, '2023-03-10 05:45:43', '2023-03-10 05:50:10'),
(4, 1, 'graduate', 'rgpv', 'b.tek', NULL, 'Indore', 2015, '2023-03-10 05:51:20', '2023-03-10 05:51:20'),
(6, 2, 'post-graduate', 'du', 'mtek', 'data science', 'delhi', 2018, '2023-03-17 09:47:06', '2023-03-17 09:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `employee_skill`
--

CREATE TABLE `employee_skill` (
  `skill_id` int(101) NOT NULL,
  `employee_id` int(101) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_skill`
--

INSERT INTO `employee_skill` (`skill_id`, `employee_id`, `skill`) VALUES
(1, 7, 'android'),
(2, 7, 'react'),
(3, 7, 'laravel'),
(4, 7, 'php'),
(5, 9, 'batting'),
(6, 9, 'spinner'),
(7, 9, 'captian'),
(8, 2, 'php'),
(9, 2, 'html'),
(10, 2, 'javascript'),
(11, 2, 'css');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_view`
-- (See below for the actual view)
--
CREATE TABLE `employee_view` (
`employee_id` int(101)
,`name` text
,`email` varchar(50)
,`password` varchar(255)
,`contact_no` bigint(15)
,`description` longtext
,`date_of_birth` date
,`gender` varchar(20)
,`marital_status` varchar(55)
,`nationality` text
,`current_location` text
,`currently_located_country` text
,`language` varchar(100)
,`religion` text
,`interested_in` text
,`experience` varchar(100)
,`work_permit_canada` char(100)
,`work_permit_other_country` text
,`resume` varchar(301)
,`profile_photo` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`is_deleted` tinyint(1)
,`education` mediumtext
,`specialization` mediumtext
,`skill` mediumtext
);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `company_id` int(101) NOT NULL,
  `company_name` varchar(251) DEFAULT NULL,
  `industry` text DEFAULT NULL,
  `corporation` varchar(251) DEFAULT NULL,
  `alias` text DEFAULT NULL,
  `company_start_date` date DEFAULT NULL,
  `company_size` varchar(251) DEFAULT NULL,
  `website_url` varchar(251) DEFAULT NULL,
  `vacancy_for_post` varchar(251) DEFAULT NULL,
  `about` mediumtext DEFAULT NULL,
  `contact_person_name` char(251) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `contact_no_other` bigint(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pin_code` int(101) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `designation` char(101) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`company_id`, `company_name`, `industry`, `corporation`, `alias`, `company_start_date`, `company_size`, `website_url`, `vacancy_for_post`, `about`, `contact_person_name`, `email`, `password`, `contact_no`, `contact_no_other`, `address`, `pin_code`, `city`, `state`, `country`, `designation`, `logo`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'meta', 'IT', 'B2B', NULL, '1998-01-01', '1000', NULL, 'CEO', 'CEOasdfj a odkf ojvdiuohj SDFJFCVJIOL', 'mark zukerberg', 'jhon@gmail.com', '4c25b32a72699ed712dfa80df77fc582', 9977884455, 7788994455, 'mountain view', 199800, 'san fransisco', 'california', 'USA', 'CEO', 'http://localhost/naukari/uploads/1678187171.png', '2023-03-06 11:13:42', '2023-03-07 11:06:11', 1),
(2, 'tcs', 'IT', 'yes', NULL, '1990-12-12', '100000', NULL, 'Senior developer', 'CEOasdfj a odkf ojvdiuohj SDFJFCVJIOL', 'shree Ratan Tata', 'abz@gmail.com', '00b03726ba42c3aeaf53df65552eff92', 9977884455, 9977000000, 'pali hills', 700001, 'Mumbai', 'maharashtra', 'India', 'CEO', 'http://localhost/naukari/uploads/1678784181.png', '2023-03-09 08:49:20', '2023-03-14 08:56:21', 1),
(3, 'infobeans', 'it', 'b2c', 'infobeans', '2013-03-01', '1200', 'www.infobeans.com', 'dotnet developer', 'uihqd jiiwjwf ujhdch iH H ISDHFHDRG', 'naamsingh', 'naamsingh@gmail.com', NULL, 9998887776, 7123654788, '44,begum pet ', 5401010, 'hyderabad', 'telangana', 'india', 'legal  head', NULL, '2023-03-18 07:25:40', '2023-03-18 07:25:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE `follow_up` (
  `id` int(101) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `next_followup_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow_up`
--

INSERT INTO `follow_up` (`id`, `admin_id`, `job_id`, `employee_id`, `remark`, `next_followup_date`, `created_at`) VALUES
(1, 2, 1, 7, 'dont be bussy when bussiness is calling', '2023-07-01', '2023-03-18 05:14:10'),
(2, 2, 1, 14, 'voilence voilence, voilence', '2023-07-01', '2023-03-18 05:26:17'),
(3, 2, 1, 14, 'dont be bussy when bussiness is calling', '2023-08-05', '2023-03-18 05:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(101) NOT NULL,
  `company_id` int(101) NOT NULL,
  `job_title` varchar(251) DEFAULT NULL,
  `experience_required` varchar(101) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `location` varchar(251) DEFAULT NULL,
  `industry_type` text DEFAULT NULL,
  `apply_link` varchar(301) DEFAULT NULL,
  `job_description` mediumtext DEFAULT NULL,
  `your_duties` mediumtext DEFAULT NULL,
  `requirement` mediumtext DEFAULT NULL,
  `department` text DEFAULT NULL,
  `job_type` varchar(251) DEFAULT NULL,
  `role_category` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `language` text DEFAULT NULL,
  `keyskill` text DEFAULT NULL,
  `employement` text DEFAULT NULL,
  `job_category_id` int(101) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `job_title`, `experience_required`, `salary`, `location`, `industry_type`, `apply_link`, `job_description`, `your_duties`, `requirement`, `department`, `job_type`, `role_category`, `education`, `language`, `keyskill`, `employement`, `job_category_id`, `is_active`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 'php developer', '2+yrs', 400000, 'Indore', 'IT', 'www.canjobs.com', ' hhsiod  oijos oijoj iojh DOIIJ OIJd oh oSDJO OIsdjioj oiSCFJOIJIO', ' OIJO FOIJOJASDFVJ I JOJ Okdwjfoj oiho jOSDJFOIH9wrugh JM[- wmc MJDFHVBIU', 'OJOK ojioj 90dfujpjknel; oijcxjiojoHDFVB OIRBFNDC ,ZXMN HG JKDV', 'POLICE', 'swap', NULL, 'GRADUATE', 'php', 'team management', 'full-time', 1, 0, '2023-03-07 09:02:29', '2023-03-09 05:48:15', 0),
(2, 2, 'Bussiness Development officer', '5+yrs', 1400000, 'Mumbai', 'IT', 'www.careerattcs.com', ' hhsiod  oijos oijoj iojh DOIIJ OIJd oh oSDJO OIsdjioj oiSCFJOIJIO', ' OIJO FOIJOJASDFVJ I JOJ Okdwjfoj oiho jOSDJFOIH9wrugh JM[- wmc MJDFHVBIU', 'OJOK ojioj 90dfujpjknel; oijcxjiojoHDFVB OIRBFNDC ,ZXMN HG JKDV', 'Bussiness', 'other than swap', NULL, 'POST-GRADUATE', 'English,spanish', 'handling immense pressure', 'part-time', 3, 1, '2023-03-09 09:04:57', '2023-03-09 09:04:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `job_category_id` int(101) NOT NULL,
  `category_name` text DEFAULT NULL,
  `category_type` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_category_id`, `category_name`, `category_type`, `is_active`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'php developer', 'software', 1, '2023-03-09 05:38:48', '2023-03-09 05:38:48', 1),
(2, 'HR manager', 'HR', 1, '2023-03-09 06:56:46', '2023-03-09 06:56:46', 1),
(3, 'Bussiness Development Officer', 'Marketing', 1, '2023-03-09 09:05:44', '2023-03-09 09:05:44', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_job_posted`
-- (See below for the actual view)
--
CREATE TABLE `view_job_posted` (
`job_id` int(101)
,`company_id` int(101)
,`job_title` varchar(251)
,`experience_required` varchar(101)
,`salary` double
,`location` varchar(251)
,`industry_type` text
,`apply_link` varchar(301)
,`job_description` mediumtext
,`your_duties` mediumtext
,`requirement` mediumtext
,`department` text
,`job_type` varchar(251)
,`role_category` text
,`education` text
,`language` text
,`keyskill` text
,`employement` text
,`job_category_id` int(101)
,`is_active` tinyint(1)
,`created_at` timestamp
,`updated_at` timestamp
,`category_type` text
,`company_name` varchar(251)
,`contact_person_name` char(251)
,`contact_no_other` bigint(20)
,`industry` text
,`about` mediumtext
,`logo` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `employee_view`
--
DROP TABLE IF EXISTS `employee_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_view`  AS SELECT `e`.`employee_id` AS `employee_id`, `e`.`name` AS `name`, `e`.`email` AS `email`, `e`.`password` AS `password`, `e`.`contact_no` AS `contact_no`, `e`.`description` AS `description`, `e`.`date_of_birth` AS `date_of_birth`, `e`.`gender` AS `gender`, `e`.`marital_status` AS `marital_status`, `e`.`nationality` AS `nationality`, `e`.`current_location` AS `current_location`, `e`.`currently_located_country` AS `currently_located_country`, `e`.`language` AS `language`, `e`.`religion` AS `religion`, `e`.`interested_in` AS `interested_in`, `e`.`experience` AS `experience`, `e`.`work_permit_canada` AS `work_permit_canada`, `e`.`work_permit_other_country` AS `work_permit_other_country`, `e`.`resume` AS `resume`, `e`.`profile_photo` AS `profile_photo`, `e`.`created_at` AS `created_at`, `e`.`updated_at` AS `updated_at`, `e`.`is_deleted` AS `is_deleted`, `education`.`education` AS `education`, `education`.`specialization` AS `specialization`, (select group_concat(`employee_skill`.`skill` separator ',') from `employee_skill` where `employee_skill`.`employee_id` = `e`.`employee_id`) AS `skill` FROM (`employee` `e` left join (select `employee_education`.`employee_id` AS `employee_id`,group_concat(`employee_education`.`course` separator ',') AS `education`,group_concat(`employee_education`.`specialization` separator ',') AS `specialization` from `employee_education` group by `employee_education`.`employee_id`) `education` on(`education`.`employee_id` = `e`.`employee_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_job_posted`
--
DROP TABLE IF EXISTS `view_job_posted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_job_posted`  AS SELECT `j`.`job_id` AS `job_id`, `j`.`company_id` AS `company_id`, `j`.`job_title` AS `job_title`, `j`.`experience_required` AS `experience_required`, `j`.`salary` AS `salary`, `j`.`location` AS `location`, `j`.`industry_type` AS `industry_type`, `j`.`apply_link` AS `apply_link`, `j`.`job_description` AS `job_description`, `j`.`your_duties` AS `your_duties`, `j`.`requirement` AS `requirement`, `j`.`department` AS `department`, `j`.`job_type` AS `job_type`, `j`.`role_category` AS `role_category`, `j`.`education` AS `education`, `j`.`language` AS `language`, `j`.`keyskill` AS `keyskill`, `j`.`employement` AS `employement`, `j`.`job_category_id` AS `job_category_id`, `j`.`is_active` AS `is_active`, `j`.`created_at` AS `created_at`, `j`.`updated_at` AS `updated_at`, `jc`.`category_type` AS `category_type`, `e`.`company_name` AS `company_name`, `e`.`contact_person_name` AS `contact_person_name`, `e`.`contact_no_other` AS `contact_no_other`, `e`.`industry` AS `industry`, `e`.`about` AS `about`, `e`.`logo` AS `logo` FROM ((`jobs` `j` join `job_category` `jc` on(`j`.`job_id` = `jc`.`job_category_id`)) join `employer` `e` on(`j`.`job_id` = `e`.`company_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `apply_on_job`
--
ALTER TABLE `apply_on_job`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `company_kyc`
--
ALTER TABLE `company_kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_career`
--
ALTER TABLE `employee_career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `employee_skill`
--
ALTER TABLE `employee_skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`job_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_on_job`
--
ALTER TABLE `apply_on_job`
  MODIFY `apply_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_kyc`
--
ALTER TABLE `company_kyc`
  MODIFY `id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_career`
--
ALTER TABLE `employee_career`
  MODIFY `career_id` int(251) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `education_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_skill`
--
ALTER TABLE `employee_skill`
  MODIFY `skill_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `company_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_up`
--
ALTER TABLE `follow_up`
  MODIFY `id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `job_category_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
