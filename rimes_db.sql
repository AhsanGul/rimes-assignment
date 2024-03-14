-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 12:29 AM
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
-- Database: `rimes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` smallint(6) NOT NULL COMMENT 'Article ID',
  `title` varchar(255) NOT NULL COMMENT 'Title of the article',
  `article` text NOT NULL COMMENT 'Content or text of the article',
  `article_user_id` tinyint(4) NOT NULL COMMENT 'User ID as foreign key',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Article created datetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Articles or News';

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `article`, `article_user_id`, `created_date`) VALUES
(8, 'Article 1', 'The project seeks to enhance the overall national institutional framework that underpins DRR/DRM planning, emergency response and disaster reporting till the local level. This initiative will capacitate representatives of NMHS, NDMA, local authorities and relevant agencies including media in the pilot areas on impact-based forecasting\r\nand risk-based warning to help them better formulate and communicate early warning information. Customization and piloting of DSS to assist with last mile response, emergency management and long-term DRR are primary focal areas during implementation.', 5, '2024-03-14 22:41:36'),
(9, 'Article 2', 'Early warning is a key element in building resilience to weather- and climate-related risks. In order to galvanize Forecast-based Actions (FbA) in the communities, National Hydrological and Meteorological Services (NMHSs) need to develop capacities along the entire service delivery chain for generating targeted impact-based forecasting and timely dissemination of accurate, understandable and customized information.\r\n\r\nSendai Framework for Disaster Risk Reduction 2015-2030 (United Nations, 2015), WMO Guidelines on Multi-hazard Impact-based Forecast and Warning Services (2015, WMO-No 1150) as well as the Multi-hazard Early Warning Systems: A Checklist (2018), highlight the significance of integrating risk and impact information in early warning systems by utilizing the advances in information and communication technologies and Earth observations.\r\n\r\nRIMES implemented Enhancing weather and climate resilience in RIMES member States through capacity building on impact forecasting- Phase I, from January 1, 2017 through December 31, 2018, aimed at building resilience to weather- and climate-related hazards by building capacity on impact forecasting in Cambodia, Myanmar, and Sri Lanka in the Asian region, and Fiji, Papua New Guinea, and Samoa in the Pacific region.', 5, '2024-03-14 22:42:27'),
(10, 'Article 3', 'Supporting Flood Forecast-based Action and Learning in Bangladesh (SUFAL) was implemented in a consortium led by CARE, with Concern Worldwide, Islamic Relief and technical partner: Regional Integrated Multi-Hazard Early Warning System for Asia (RIMES); and was funded by the Directorate-General for European Civil Protection and Humanitarian Aid Operations (ECHO).\r\n\r\nSUFAL project focuses on reducing the vulnerability of flood-prone populations in the Brahmaputra-Jamuna basin by strengthening impact-based forecasting and early warning to trigger early actions and funding prior to flood events. The aim is to reduce the impact of floods on communities, improve effectiveness of emergency preparedness, response and recovery efforts, and reduce the humanitarian burden.\r\n\r\nFlood Forecasting Warning Committee (FFWC) had introduced a 15-day flood outlook in the 2020 monsoon, with support of USAID-funded SHOUHARDO through CARE-RIMES, which was utilized by the SUFAL project. RIMES was responsible for providing technical support to FFWC in customizing EWMs through developing Upazila-level vulnerability maps, installing gauges, and developing Digital Elevation Model (DEM).', 5, '2024-03-14 22:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(4) NOT NULL COMMENT 'User ID',
  `email` varchar(255) NOT NULL COMMENT 'Email address of the user',
  `name` varchar(255) NOT NULL COMMENT 'Full name of the user',
  `password` varchar(255) NOT NULL COMMENT 'Encrypted password of the user',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'User registration date and time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Registered users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `password`, `created_date`) VALUES
(5, 'admin@test.com', 'Test Account', '3fe2c8507ca31a30b97b083b0c2f1679', '2024-03-14 22:40:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `articles_FK_userid` (`article_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'Article ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_FK_userid` FOREIGN KEY (`article_user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
