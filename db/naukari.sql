-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 06:55 AM
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
-- Database: `naukari`
--

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
  `resume` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `email`, `password`, `contact_no`, `description`, `date_of_birth`, `gender`, `marital_status`, `nationality`, `current_location`, `currently_located_country`, `language`, `religion`, `interested_in`, `experience`, `work_permit_canada`, `work_permit_other_country`, `resume`, `profile_photo`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'sdfg', 'w2c@gmail.com', 'qwerty', 9998887774, 'akljsd dafkjo oijdsfo sdv', '1990-12-16', 'male', 'male', 'male', 'male', 'male', 'male', 'male', 'male', 'male', 'male', 'male', NULL, NULL, '2023-02-23 08:53:01', '2023-03-06 04:25:49', 0),
(2, 'utk', 'utk@gmail.com', 'abc', 9100005555, NULL, '1993-11-16', 'male', 'married', NULL, 'hawai', NULL, 'dotnet', NULL, NULL, 'experinced', NULL, NULL, 'http://localhost/naukari/uploads/1677142859.docx', NULL, '2023-02-23 09:00:59', '2023-02-23 09:25:46', 0),
(4, NULL, 'qaz@gmail.com', 'qaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677839964.docx', NULL, '2023-03-03 10:39:24', '2023-03-03 10:39:24', 0),
(5, NULL, 'abc@gmail.com', 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677840252.docx', NULL, '2023-03-03 10:44:12', '2023-03-03 10:44:12', 0),
(6, NULL, 'xyz@gmail.com', 'd16fb36f0911f878998c136191af705e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/naukari/uploads/1677842025.docx', NULL, '2023-03-03 11:13:45', '2023-03-03 11:13:45', 0),
(7, 'jhon', 'jhon@gmail.com', '4c25b32a72699ed712dfa80df77fc582', 9998885552, 'akljsd klqjhndf lsda joidjv oidjasckjkodas poijdsj asdjvcolikjdocv adsrfgv', '1990-12-12', 'male', 'married', 'American', 'ibiza', 'span', 'english', 'hindu', 'development', '5+ yrs', 'Yes', 'Yes', 'http://localhost/naukari/uploads/1677844091.docx', 'http://localhost/naukari/uploads/1678513411.png', '2023-03-03 11:48:11', '2023-03-11 05:43:31', 0);

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
(2, 2, NULL, NULL, 'hawa supai', NULL, NULL, '5+', NULL, NULL, NULL, '2023-02-23 09:03:27', '2023-02-23 09:25:46'),
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
(1, 7, 'graduate', 'davv', 'bca', 'AI', 'Indore', 2016, '2023-03-09 12:56:32', '2023-03-09 12:56:32'),
(2, 7, 'post-graduate', 'rgpv', 'mca', 'data science', 'Indore', 2018, '2023-03-10 05:45:43', '2023-03-10 05:50:10'),
(4, 1, 'graduate', 'rgpv', 'b.tek', 'cs', 'Indore', 2015, '2023-03-10 05:51:20', '2023-03-10 05:51:20');

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
(1, 7, 'android');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`company_id`, `company_name`, `industry`, `corporation`, `alias`, `company_start_date`, `company_size`, `website_url`, `vacancy_for_post`, `about`, `contact_person_name`, `email`, `password`, `contact_no`, `contact_no_other`, `address`, `pin_code`, `city`, `state`, `country`, `designation`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'meta', 'IT', 'B2B', NULL, '1998-01-01', '1000', NULL, 'CEO', 'CEOasdfj a odkf ojvdiuohj SDFJFCVJIOL', 'mark zukerberg', 'jhon@gmail.com', '4c25b32a72699ed712dfa80df77fc582', 9977884455, 7788994455, 'mountain view', 199800, 'san fransisco', 'california', 'USA', 'CEO', 'http://localhost/naukari/uploads/1678187171.png', '2023-03-06 11:13:42', '2023-03-07 11:06:11'),
(2, 'tcs', 'IT', 'yes', NULL, '1990-12-12', '100000', NULL, 'Senior developer', 'CEOasdfj a odkf ojvdiuohj SDFJFCVJIOL', 'shree Ratan Tata', 'abz@gmail.com', '00b03726ba42c3aeaf53df65552eff92', 9977884455, 9977000000, 'pali hills', 700001, 'Mumbai', 'maharashtra', 'India', 'CEO', 'http://localhost/naukari/uploads/1678360446.png', '2023-03-09 08:49:20', '2023-03-09 11:14:06');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `job_title`, `experience_required`, `salary`, `location`, `industry_type`, `apply_link`, `job_description`, `your_duties`, `requirement`, `department`, `job_type`, `role_category`, `education`, `language`, `keyskill`, `employement`, `job_category_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'php developer', '2+yrs', 400000, 'Indore', 'IT', 'www.canjobs.com', ' hhsiod  oijos oijoj iojh DOIIJ OIJd oh oSDJO OIsdjioj oiSCFJOIJIO', ' OIJO FOIJOJASDFVJ I JOJ Okdwjfoj oiho jOSDJFOIH9wrugh JM[- wmc MJDFHVBIU', 'OJOK ojioj 90dfujpjknel; oijcxjiojoHDFVB OIRBFNDC ,ZXMN HG JKDV', 'POLICE', 'full time', NULL, 'GRADUATE', 'php', 'dasfg gafdvfda', 'asdfgvad agf', 1, NULL, '2023-03-07 09:02:29', '2023-03-09 05:48:15'),
(2, 2, 'Bussiness Development officer', '5+yrs', 1400000, 'Mumbai', 'IT', 'www.careerattcs.com', ' hhsiod  oijos oijoj iojh DOIIJ OIJd oh oSDJO OIsdjioj oiSCFJOIJIO', ' OIJO FOIJOJASDFVJ I JOJ Okdwjfoj oiho jOSDJFOIH9wrugh JM[- wmc MJDFHVBIU', 'OJOK ojioj 90dfujpjknel; oijcxjiojoHDFVB OIRBFNDC ,ZXMN HG JKDV', 'Bussiness', 'full-time', NULL, 'POST-GRADUATE', 'English,spanish', 'koqdv kja  jio okjoa jojoqjdo', 'adfdv refgvefrv eqarfvrtg qev', 3, 1, '2023-03-09 09:04:57', '2023-03-09 09:04:57');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_category_id`, `category_name`, `category_type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'php developer', 'software', 1, '2023-03-09 05:38:48', '2023-03-09 05:38:48'),
(2, 'HR manager', 'HR', 1, '2023-03-09 06:56:46', '2023-03-09 06:56:46'),
(3, 'Bussiness Development Officer', 'Marketing', 1, '2023-03-09 09:05:44', '2023-03-09 09:05:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `job_posted`
-- (See below for the actual view)
--
CREATE TABLE `job_posted` (
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
-- Structure for view `job_posted`
--
DROP TABLE IF EXISTS `job_posted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `job_posted`  AS SELECT `j`.`job_id` AS `job_id`, `j`.`company_id` AS `company_id`, `j`.`job_title` AS `job_title`, `j`.`experience_required` AS `experience_required`, `j`.`salary` AS `salary`, `j`.`location` AS `location`, `j`.`industry_type` AS `industry_type`, `j`.`apply_link` AS `apply_link`, `j`.`job_description` AS `job_description`, `j`.`your_duties` AS `your_duties`, `j`.`requirement` AS `requirement`, `j`.`department` AS `department`, `j`.`job_type` AS `job_type`, `j`.`role_category` AS `role_category`, `j`.`education` AS `education`, `j`.`language` AS `language`, `j`.`keyskill` AS `keyskill`, `j`.`employement` AS `employement`, `j`.`job_category_id` AS `job_category_id`, `j`.`is_active` AS `is_active`, `j`.`created_at` AS `created_at`, `j`.`updated_at` AS `updated_at`, `jc`.`category_type` AS `category_type`, `e`.`company_name` AS `company_name`, `e`.`contact_person_name` AS `contact_person_name`, `e`.`contact_no_other` AS `contact_no_other`, `e`.`industry` AS `industry`, `e`.`about` AS `about`, `e`.`logo` AS `logo` FROM ((`jobs` `j` join `job_category` `jc` on(`j`.`job_id` = `jc`.`job_category_id`)) join `employer` `e` on(`j`.`job_id` = `e`.`company_id`))  ;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `company_kyc`
--
ALTER TABLE `company_kyc`
  MODIFY `id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_career`
--
ALTER TABLE `employee_career`
  MODIFY `career_id` int(251) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `education_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_skill`
--
ALTER TABLE `employee_skill`
  MODIFY `skill_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `company_id` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
