-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 12:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcgdotr`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_code`
--

CREATE TABLE `action_code` (
  `id` int(11) NOT NULL,
  `action_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action_code`
--

INSERT INTO `action_code` (`id`, `action_code`) VALUES
(1, 'VS83 RECTIFY AT NEXT PORT'),
(2, 'VS85 RECTIFY WITHIN 14 DAYS'),
(3, 'VS87 RECTIFY BEFORE DEPARTURE'),
(4, 'VS88 RECTIFY WITHIN 3 MONTHS'),
(5, 'VS90 DETAINABLE DEFICIENCIES'),
(6, 'VS95 OTHERS (SPECIFY)');

-- --------------------------------------------------------

--
-- Table structure for table `activity_conduct`
--

CREATE TABLE `activity_conduct` (
  `id` int(11) NOT NULL,
  `activity_conduct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_conduct`
--

INSERT INTO `activity_conduct` (`id`, `activity_conduct`) VALUES
(1, 'PCG INITIATED'),
(2, 'JOINT'),
(3, 'PARTICIPATED FROM OTHER AGENCY');

-- --------------------------------------------------------

--
-- Table structure for table `affected_area`
--

CREATE TABLE `affected_area` (
  `id` int(11) NOT NULL,
  `affected_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affected_area`
--

INSERT INTO `affected_area` (`id`, `affected_area`) VALUES
(1, 'MANGROVES'),
(2, 'SEA GRASS'),
(3, 'MPA'),
(4, 'PSSA'),
(5, 'TOURISM AREA'),
(6, 'RESIDENTIAL'),
(7, 'DIVE SITES');

-- --------------------------------------------------------

--
-- Table structure for table `affected_biodiversity`
--

CREATE TABLE `affected_biodiversity` (
  `id` int(11) NOT NULL,
  `affected_biodiversity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affected_biodiversity`
--

INSERT INTO `affected_biodiversity` (`id`, `affected_biodiversity`) VALUES
(1, 'BIRDS'),
(2, 'CRUSTACEANS'),
(3, 'RESIDENTIAL AREAS'),
(4, 'MARINE MAMMALS');

-- --------------------------------------------------------

--
-- Table structure for table `application_type`
--

CREATE TABLE `application_type` (
  `id` int(11) NOT NULL,
  `application_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_type`
--

INSERT INTO `application_type` (`id`, `application_type`) VALUES
(1, 'APPLICATION FOR SALVOR CERTIFICATE OF REGISTRATION'),
(2, 'SALVOR CERTIFICATE OF REGISTRATION'),
(3, 'RENEWAL OF SALVOR CERTIFICATE OF REGISTRATION'),
(4, 'INSPECTION PERMIT AND SALVAGE PERMIT'),
(5, 'SALVAGE CERTIFICATE OF INSPECTION');

-- --------------------------------------------------------

--
-- Table structure for table `asset_deployment`
--

CREATE TABLE `asset_deployment` (
  `id` int(11) NOT NULL,
  `asset_deployment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_deployment`
--

INSERT INTO `asset_deployment` (`id`, `asset_deployment`) VALUES
(1, 'ALUMINUM BOAT'),
(2, 'DF CRAFT'),
(3, '24 METER'),
(4, '35 METER'),
(5, '44 METER'),
(6, '56 METER'),
(7, '83 METER'),
(8, '97 METER'),
(9, 'PCGA FLOATING ASSET'),
(10, 'LGU WATER ASSET'),
(11, 'METAL SHARK BOATS');

-- --------------------------------------------------------

--
-- Table structure for table `asset_mobility_deployed_type`
--

CREATE TABLE `asset_mobility_deployed_type` (
  `id` int(11) NOT NULL,
  `asset_mobility_deployed_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_mobility_deployed_type`
--

INSERT INTO `asset_mobility_deployed_type` (`id`, `asset_mobility_deployed_type`) VALUES
(1, 'ALUMINUM BOAT'),
(2, 'RUBBER BOAT'),
(3, 'LAND MOBILITY'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `beach_coast_line_length`
--

CREATE TABLE `beach_coast_line_length` (
  `id` int(11) NOT NULL,
  `beach_coast_line_length` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beach_coast_line_length`
--

INSERT INTO `beach_coast_line_length` (`id`, `beach_coast_line_length`) VALUES
(1, '20 METER'),
(2, '40 METER'),
(3, '60 METER');

-- --------------------------------------------------------

--
-- Table structure for table `body_built`
--

CREATE TABLE `body_built` (
  `id` int(11) NOT NULL,
  `body_built` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `body_built`
--

INSERT INTO `body_built` (`id`, `body_built`) VALUES
(1, 'LIGHT'),
(2, 'HEAVY'),
(3, 'MUSCULAR');

-- --------------------------------------------------------

--
-- Table structure for table `bouy_type`
--

CREATE TABLE `bouy_type` (
  `id` int(11) NOT NULL,
  `bouy_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bouy_type`
--

INSERT INTO `bouy_type` (`id`, `bouy_type`) VALUES
(1, 'LATERAL PORT HAND MARK'),
(2, 'LATERAL STARBOARD HAND MARK'),
(3, 'NORTH CARDINAL MARK'),
(4, 'SOUTH CARDINAL MARK'),
(5, 'WEST CARDINAL MARK');

-- --------------------------------------------------------

--
-- Table structure for table `cadaver_approximate_age`
--

CREATE TABLE `cadaver_approximate_age` (
  `id` int(11) NOT NULL,
  `cadaver_approximate_age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadaver_approximate_age`
--

INSERT INTO `cadaver_approximate_age` (`id`, `cadaver_approximate_age`) VALUES
(1, 'INFANT (0-1 YEAR)'),
(2, 'TODDLER (2-4 YEARS)'),
(3, 'CHILD (5-12 YEARS)'),
(4, 'TEEN (13-19 YEARS)'),
(5, 'ADULT (20-39 YEARS)'),
(6, 'MIDDLE AGE ADULT (40-59)'),
(7, 'SENIOR (MORE THAN 60)');

-- --------------------------------------------------------

--
-- Table structure for table `cadaver_location`
--

CREATE TABLE `cadaver_location` (
  `id` int(11) NOT NULL,
  `cadaver_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadaver_location`
--

INSERT INTO `cadaver_location` (`id`, `cadaver_location`) VALUES
(1, 'LAND'),
(2, 'COASTLINE');

-- --------------------------------------------------------

--
-- Table structure for table `coastal_and_beach_violation`
--

CREATE TABLE `coastal_and_beach_violation` (
  `id` int(11) NOT NULL,
  `coastal_and_beach_violation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coastal_and_beach_violation`
--

INSERT INTO `coastal_and_beach_violation` (`id`, `coastal_and_beach_violation`) VALUES
(1, 'INSUFFICIENT NUMBER OF LIFEGUARD CERTIFIED BY THE PCG'),
(2, 'NO PHYSICIAN'),
(3, 'NON- ACCESSIBILITY TO HOSPITAL OR MEDICAL CENTERS'),
(4, 'FIRST-AIDERS NOT CERTIFIED BY PRC'),
(5, 'NO FIRST-AIDE MEDICINE'),
(6, 'NO LIFE SAVING EQUIPMENTS'),
(7, 'INSUFFICIENTS NUMBER OF BUOYS'),
(8, 'NO VISIBLE WARNING SIGN OF DANGER AREAS'),
(9, 'NO RADIO/COMMUNICATION ROOM'),
(10, 'NO VHF RADIO WITH BASE'),
(11, 'NO HOUSE RULES AND REGULATORY BEATED');

-- --------------------------------------------------------

--
-- Table structure for table `conduct_of_activity`
--

CREATE TABLE `conduct_of_activity` (
  `conduct_of_activity_id` int(11) NOT NULL,
  `conduct_of_activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `conduct_of_activity`
--

INSERT INTO `conduct_of_activity` (`conduct_of_activity_id`, `conduct_of_activity`) VALUES
(2, 'JOINT'),
(3, 'PARTICIPATED FROM OTHER AGENCY'),
(1, 'PCG INITIATED');

-- --------------------------------------------------------

--
-- Table structure for table `damage_estimated_cost`
--

CREATE TABLE `damage_estimated_cost` (
  `id` int(11) NOT NULL,
  `damage_estimated_cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `damage_estimated_cost`
--

INSERT INTO `damage_estimated_cost` (`id`, `damage_estimated_cost`) VALUES
(1, '1 PESOS - 50,000 THOUSAND'),
(2, '51,000 - 100,000 THOUSAND'),
(3, '101,000 - 200,000 THOUSAND'),
(4, '201,000 - 300,000 THOUSAND'),
(5, 'MORE THAN 300K'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(100) DEFAULT NULL,
  `district_contact` varchar(50) DEFAULT NULL,
  `district_email` varchar(100) DEFAULT NULL,
  `district_address` text DEFAULT NULL,
  `district_logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `district_contact`, `district_email`, `district_address`, `district_logo`) VALUES
(1, 'NORTHERN MINDANAO', '09187112668', 'ronil.cajan@gmail.com', 'PUROK 3\r\nLOOC PROPER', '90f6cd2d7a94bd4bbcf456bfcf8d5fcb.png');

-- --------------------------------------------------------

--
-- Table structure for table `drill_conducted`
--

CREATE TABLE `drill_conducted` (
  `id` int(11) NOT NULL,
  `drill_conducted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drill_conducted`
--

INSERT INTO `drill_conducted` (`id`, `drill_conducted`) VALUES
(1, 'ABANDONSHIP'),
(2, 'FIRE IN PORT AND/OR AT SEA'),
(3, 'COLLISION AT PORT AND/OR AT SEA'),
(4, 'EMERGENCY STEERING CASUALTY'),
(5, 'MAN- OVERBOARD');

-- --------------------------------------------------------

--
-- Table structure for table `drowning_cause`
--

CREATE TABLE `drowning_cause` (
  `id` int(11) NOT NULL,
  `drowning_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drowning_cause`
--

INSERT INTO `drowning_cause` (`id`, `drowning_cause`) VALUES
(1, 'NON-SWIMMER'),
(2, 'LACK OF SUPERVISION'),
(3, 'FAILURE TO WEAR/USE FLOATATION DEVICE'),
(4, 'INTOXICATION'),
(5, 'SWIMMING IN UNSUPERVISED AREAS'),
(6, 'CARDIAC ARREST'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `drowning_incident_location`
--

CREATE TABLE `drowning_incident_location` (
  `id` int(11) NOT NULL,
  `drowning_incident_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drowning_incident_location`
--

INSERT INTO `drowning_incident_location` (`id`, `drowning_incident_location`) VALUES
(1, 'POOL'),
(2, 'LAKE'),
(3, 'LAKE (BOATING INCIDENT)'),
(4, 'RIVER'),
(5, 'RIVER (BOATING INCIDENT)'),
(6, 'BEACH'),
(7, 'OCEAN/BAY'),
(8, 'OCEAN/BAY (BOATING INCIDENT)'),
(9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `earthquake_cause`
--

CREATE TABLE `earthquake_cause` (
  `id` int(11) NOT NULL,
  `earthquake_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earthquake_cause`
--

INSERT INTO `earthquake_cause` (`id`, `earthquake_cause`) VALUES
(1, 'VOLCANIC'),
(2, 'TECTONIC'),
(3, 'GEOLOGICAL FAULTS'),
(4, 'MAN-MADE'),
(5, 'LANDSLIDES');

-- --------------------------------------------------------

--
-- Table structure for table `earthquake_location`
--

CREATE TABLE `earthquake_location` (
  `id` int(11) NOT NULL,
  `earthquake_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earthquake_location`
--

INSERT INTO `earthquake_location` (`id`, `earthquake_location`) VALUES
(1, 'COASTAL BARANGAY'),
(2, 'INLAND BARANGAY');

-- --------------------------------------------------------

--
-- Table structure for table `earthquake_magnitude_level`
--

CREATE TABLE `earthquake_magnitude_level` (
  `id` int(11) NOT NULL,
  `earthquake_magnitude_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earthquake_magnitude_level`
--

INSERT INTO `earthquake_magnitude_level` (`id`, `earthquake_magnitude_level`) VALUES
(1, '0 - 1.9 (MICRO)'),
(2, '2.0 - 2.9 (MINOR)'),
(3, '3.0 - 3.9 (MINOR)'),
(4, '4.0 - 4.9 (LIGHT)'),
(5, '5.0 - 5.9 (MODERATE)'),
(6, '6.0 - 6.9 (STRONG)'),
(7, '7.0 - 7.9 (MAJOR)'),
(8, '8.0 - 8.9 (GREAT)'),
(9, '9.0 AND ABOVE (GREAT)'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `eod_deployment`
--

CREATE TABLE `eod_deployment` (
  `id` int(11) NOT NULL,
  `eod_deployment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eod_deployment`
--

INSERT INTO `eod_deployment` (`id`, `eod_deployment`) VALUES
(1, 'BOMB THREAT'),
(2, 'SECURITY PANELING'),
(3, 'CODE ONE MSN');

-- --------------------------------------------------------

--
-- Table structure for table `ere_result`
--

CREATE TABLE `ere_result` (
  `id` int(11) NOT NULL,
  `ere_result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ere_result`
--

INSERT INTO `ere_result` (`id`, `ere_result`) VALUES
(1, 'PASSED');

-- --------------------------------------------------------

--
-- Table structure for table `facility_type`
--

CREATE TABLE `facility_type` (
  `id` int(11) NOT NULL,
  `facility_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility_type`
--

INSERT INTO `facility_type` (`id`, `facility_type`) VALUES
(1, 'DEPOT/TERMINAL'),
(2, 'POWER PLANT'),
(3, 'SHIPYARD'),
(4, 'OIL MILL'),
(5, 'MANUFACTURING PLANT');

-- --------------------------------------------------------

--
-- Table structure for table `fire_cause`
--

CREATE TABLE `fire_cause` (
  `id` int(11) NOT NULL,
  `fire_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fire_cause`
--

INSERT INTO `fire_cause` (`id`, `fire_cause`) VALUES
(1, 'Unattended Cooking Equipment'),
(2, 'Petroleum and Oil'),
(3, 'Electrical Failure');

-- --------------------------------------------------------

--
-- Table structure for table `fire_incident_location`
--

CREATE TABLE `fire_incident_location` (
  `id` int(11) NOT NULL,
  `fire_incident_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fire_incident_location`
--

INSERT INTO `fire_incident_location` (`id`, `fire_incident_location`) VALUES
(1, 'COASTAL BARANGAY'),
(2, 'INLAND BARANGAY');

-- --------------------------------------------------------

--
-- Table structure for table `garbage_type_collected`
--

CREATE TABLE `garbage_type_collected` (
  `id` int(11) NOT NULL,
  `garbage_type_collected` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garbage_type_collected`
--

INSERT INTO `garbage_type_collected` (`id`, `garbage_type_collected`) VALUES
(1, 'HOUSEHOLD PLASTIC ITEMS'),
(2, 'DISCARDED FISHING GEARS (NETS, LINES, FLOATERS, ROPES)'),
(3, 'DISCARDED SANITARY PRODUCTS'),
(4, 'METALS'),
(5, 'BIODEGARDABLE (WOODS, PAPERS, FOOD WASTE)');

-- --------------------------------------------------------

--
-- Table structure for table `incident_cause`
--

CREATE TABLE `incident_cause` (
  `id` int(11) NOT NULL,
  `incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incident_cause`
--

INSERT INTO `incident_cause` (`id`, `incident_cause`) VALUES
(1, 'MACHINERY FAILURE'),
(2, 'NAVIGATIONAL EQUIPMENT FAILURE'),
(3, 'HUMAN ERROR'),
(4, 'SEA AND WEATHER CONDITION');

-- --------------------------------------------------------

--
-- Table structure for table `incident_consequences`
--

CREATE TABLE `incident_consequences` (
  `id` int(11) NOT NULL,
  `incident_consequences` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incident_consequences`
--

INSERT INTO `incident_consequences` (`id`, `incident_consequences`) VALUES
(1, 'INJURY'),
(2, 'DEATH'),
(3, 'MISSING PERSON'),
(4, 'POLLUTION'),
(5, 'DAMAGE TO MARINE ENVIRONMENT'),
(6, 'LOSS OF SHIPS'),
(7, 'DAMAGE OF CARGOES'),
(8, 'MATERIAL DAMAGE');

-- --------------------------------------------------------

--
-- Table structure for table `information_acquired_thru`
--

CREATE TABLE `information_acquired_thru` (
  `id` int(11) NOT NULL,
  `information_acquired_thru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information_acquired_thru`
--

INSERT INTO `information_acquired_thru` (`id`, `information_acquired_thru`) VALUES
(1, 'VHF CALL FROM DISTRESS VESSEL'),
(2, 'CELLULAR PHONE CALL'),
(3, 'PCG COMCEN'),
(4, 'GMDSS'),
(5, 'PCG UNIT'),
(6, 'LGU'),
(7, 'GOVERNMENT AGENCY'),
(8, 'CONCERNED CITIZEN');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_type`
--

CREATE TABLE `inspection_type` (
  `id` int(11) NOT NULL,
  `inspection_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspection_type`
--

INSERT INTO `inspection_type` (`id`, `inspection_type`) VALUES
(1, 'MONITORING INSPECTION'),
(2, 'COMPLIANCE INSPECTION');

-- --------------------------------------------------------

--
-- Table structure for table `k9_deployed_type`
--

CREATE TABLE `k9_deployed_type` (
  `id` int(11) NOT NULL,
  `k9_deployed_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `k9_deployed_type`
--

INSERT INTO `k9_deployed_type` (`id`, `k9_deployed_type`) VALUES
(1, 'EXPLOSIVE'),
(2, 'NARCOTICS'),
(3, 'SEARCH AND RESCUE');

-- --------------------------------------------------------

--
-- Table structure for table `lighthouse_cause_if_not_operating`
--

CREATE TABLE `lighthouse_cause_if_not_operating` (
  `id` int(11) NOT NULL,
  `lighthouse_cause_if_not_operating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lighthouse_cause_if_not_operating`
--

INSERT INTO `lighthouse_cause_if_not_operating` (`id`, `lighthouse_cause_if_not_operating`) VALUES
(1, 'DEFECTIVE LATERN'),
(2, 'DEFECTIVE BATTERY'),
(3, 'SOLAR PANEL DAMAGE'),
(4, 'DEFECTIVE CHARGING CONTROLLER'),
(5, 'DEFECTIVE LAMP CHANGER'),
(6, 'VANDALIZED');

-- --------------------------------------------------------

--
-- Table structure for table `lighthouse_inspection_purpose`
--

CREATE TABLE `lighthouse_inspection_purpose` (
  `id` int(11) NOT NULL,
  `lighthouse_inspection_purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lighthouse_inspection_purpose`
--

INSERT INTO `lighthouse_inspection_purpose` (`id`, `lighthouse_inspection_purpose`) VALUES
(1, 'MAINTENANCE'),
(2, 'REPAIR');

-- --------------------------------------------------------

--
-- Table structure for table `lighthouse_status`
--

CREATE TABLE `lighthouse_status` (
  `id` int(11) NOT NULL,
  `lighthouse_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lighthouse_status`
--

INSERT INTO `lighthouse_status` (`id`, `lighthouse_status`) VALUES
(1, 'OPERATING'),
(2, 'NOT OPERATING');

-- --------------------------------------------------------

--
-- Table structure for table `lighthouse_type`
--

CREATE TABLE `lighthouse_type` (
  `id` int(11) NOT NULL,
  `lighthouse_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lighthouse_type`
--

INSERT INTO `lighthouse_type` (`id`, `lighthouse_type`) VALUES
(1, 'PRIMARY'),
(2, 'SECONDARY');

-- --------------------------------------------------------

--
-- Table structure for table `light_bouy_inspection_purpose`
--

CREATE TABLE `light_bouy_inspection_purpose` (
  `id` int(11) NOT NULL,
  `light_bouy_inspection_purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `light_bouy_inspection_purpose`
--

INSERT INTO `light_bouy_inspection_purpose` (`id`, `light_bouy_inspection_purpose`) VALUES
(1, 'MAINTENANCE'),
(2, 'REPAIR');

-- --------------------------------------------------------

--
-- Table structure for table `light_buoy_status`
--

CREATE TABLE `light_buoy_status` (
  `id` int(11) NOT NULL,
  `light_buoy_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `light_buoy_status`
--

INSERT INTO `light_buoy_status` (`id`, `light_buoy_status`) VALUES
(1, 'OPERATING'),
(2, 'NOT OPERATING');

-- --------------------------------------------------------

--
-- Table structure for table `light_buoy__cause_if_not_operating`
--

CREATE TABLE `light_buoy__cause_if_not_operating` (
  `id` int(11) NOT NULL,
  `light_buoy__cause_if_not_operating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `light_buoy__cause_if_not_operating`
--

INSERT INTO `light_buoy__cause_if_not_operating` (`id`, `light_buoy__cause_if_not_operating`) VALUES
(1, 'DRIFTED'),
(2, 'DETACHED SINKER'),
(3, 'DEFECTIVE 3 AD 1 LANTERN'),
(4, 'DAMAGE BUOY ASSEMBLY'),
(5, 'DEFECTIVE BATTERY'),
(6, 'VANDALIZED'),
(7, 'STOLEN PARTS');

-- --------------------------------------------------------

--
-- Table structure for table `man_overboard_incident_cause`
--

CREATE TABLE `man_overboard_incident_cause` (
  `id` int(11) NOT NULL,
  `man_overboard_incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `man_overboard_incident_cause`
--

INSERT INTO `man_overboard_incident_cause` (`id`, `man_overboard_incident_cause`) VALUES
(1, 'Failure to wear PPE'),
(2, 'Failure to wear PPE'),
(3, 'Failure to wear PPE'),
(4, 'Murder'),
(5, 'Suicide'),
(6, 'Weather and Sea Condition'),
(7, 'Working Over The Sides');

-- --------------------------------------------------------

--
-- Table structure for table `marep`
--

CREATE TABLE `marep` (
  `id` int(11) NOT NULL,
  `station` int(11) DEFAULT NULL,
  `sub_station` int(11) DEFAULT NULL,
  `report_type` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `activity_conduct` varchar(100) DEFAULT NULL,
  `participating_agency` varchar(100) DEFAULT NULL,
  `participant_number` varchar(100) DEFAULT NULL,
  `area_coverage` varchar(100) DEFAULT NULL,
  `garbage_type_collected` varchar(100) DEFAULT NULL,
  `garbage_collected_volume` varchar(100) DEFAULT NULL,
  `seedlings_planted_number` varchar(100) DEFAULT NULL,
  `planted_trees_kind` varchar(100) DEFAULT NULL,
  `incident_cause` int(11) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `inspection_type` varchar(100) DEFAULT NULL,
  `marpol_violation` varchar(100) DEFAULT NULL,
  `facility_type` varchar(100) DEFAULT NULL,
  `facility_name` varchar(100) DEFAULT NULL,
  `oil_spill_date_incident` datetime DEFAULT NULL,
  `oil_spill_location` varchar(100) DEFAULT NULL,
  `oil_spill_map_location` text DEFAULT NULL,
  `spiller` varchar(100) DEFAULT NULL,
  `oil_spill_vessel_name` varchar(100) DEFAULT NULL,
  `oil_spill_companyl_name` varchar(100) DEFAULT NULL,
  `tier_level` varchar(100) DEFAULT NULL,
  `oil_type` varchar(100) DEFAULT NULL,
  `responding_unit` varchar(100) DEFAULT NULL,
  `oil_retrieved_volume` varchar(100) DEFAULT NULL,
  `affected_area` varchar(100) DEFAULT NULL,
  `affected_biodiversity` varchar(100) DEFAULT NULL,
  `training_type` int(11) DEFAULT NULL,
  `training_center_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marep`
--

INSERT INTO `marep` (`id`, `station`, `sub_station`, `report_type`, `date_created`, `location`, `activity_conduct`, `participating_agency`, `participant_number`, `area_coverage`, `garbage_type_collected`, `garbage_collected_volume`, `seedlings_planted_number`, `planted_trees_kind`, `incident_cause`, `vessel_type`, `vessel_name`, `inspection_type`, `marpol_violation`, `facility_type`, `facility_name`, `oil_spill_date_incident`, `oil_spill_location`, `oil_spill_map_location`, `spiller`, `oil_spill_vessel_name`, `oil_spill_companyl_name`, `tier_level`, `oil_type`, `responding_unit`, `oil_retrieved_volume`, `affected_area`, `affected_biodiversity`, `training_type`, `training_center_name`) VALUES
(2, 3, 7, 4, '2023-01-11 15:13:00', 'this is location2', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, '2', 'vessel name3213213', '1', 'marpol violation', NULL, NULL, NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 0, NULL),
(3, 3, 7, 1, '2023-01-26 14:12:00', 'oroqueita', '2', '1,2,7', '13', 'fasdf', '1,2,4', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 0, NULL),
(8, 1, 1, 2, '2023-01-06 18:19:00', NULL, '1', '6,7,8', '200', '500', '', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 0, NULL),
(9, 1, 2, 3, '2023-01-05 03:04:00', NULL, '2', '3,4,5', '200', 'whole mis occ', '', NULL, '200', 'lubi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 0, NULL),
(10, 3, 7, 5, '2023-01-13 03:03:00', 'Mobod', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', 'Moelce', NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 0, NULL),
(11, 5, 18, 6, '2023-01-12 03:04:00', 'Mobod', NULL, '', '324', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ::00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 2, 'fsfsdfsdf'),
(13, 3, 8, 7, '2023-02-08 13:13:00', 'Mobod', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 3, '4', 'Don Ron', NULL, NULL, NULL, NULL, '2023-02-15 00:00:00', '3213213213', '2023-02-15 05:07:00', '2', 'RONIL MANGOMPIT CAJAN', 'Ronil Cajan', '2', '2', '1,2,3', 'wqewqewqe', '2,5,6', '1,2,4', 0, NULL),
(14, 1, 2, 7, '2023-02-01 00:00:00', 'Mobod', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 2, '2', 'RONIL MANGOMPIT CAJAN', NULL, NULL, NULL, NULL, '2023-02-12 00:00:00', '3213213213', '2023-02-12 15:12:00', '2', 'RONIL MANGOMPIT CAJAN', 'Ronil Cajan', '1', '2', '2', 'wqewqewqe', '2', '3', 0, NULL),
(15, 1, 1, 7, '2023-02-23 15:14:00', 'Mobod', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 4, '6', 'RONIL MANGOMPIT CAJAN', NULL, NULL, NULL, NULL, '2023-02-16 14:10:00', '3213213213', NULL, '2', 'RONIL MANGOMPIT CAJAN', 'Ronil Cajan', '3', '3', '2', 'wqewqewqe', '2', '3', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maritime_acitivity`
--

CREATE TABLE `maritime_acitivity` (
  `id` int(11) NOT NULL,
  `maritime_acitivity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maritime_acitivity`
--

INSERT INTO `maritime_acitivity` (`id`, `maritime_acitivity`) VALUES
(1, 'FLUVIAL PARADE'),
(2, 'MARINE PARADE'),
(3, 'TRIATHLON'),
(4, 'REGATTA');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_casualty_nature`
--

CREATE TABLE `maritime_casualty_nature` (
  `id` int(11) NOT NULL,
  `maritime_casualty_nature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maritime_casualty_nature`
--

INSERT INTO `maritime_casualty_nature` (`id`, `maritime_casualty_nature`) VALUES
(1, 'AGROUNDING'),
(2, 'ALLISION'),
(3, 'CAPSIZING'),
(4, 'COLLISION'),
(5, 'EXPLOSION'),
(6, 'MECHANICAL FAILURE'),
(7, 'FIRE'),
(8, 'HALF-SUBMERGED'),
(9, 'SINKING'),
(10, 'OCCUPATIONAL ACCIDENT'),
(11, 'HULL FAILURE');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_incident_severity`
--

CREATE TABLE `maritime_incident_severity` (
  `id` int(11) NOT NULL,
  `maritime_incident_severity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maritime_incident_severity`
--

INSERT INTO `maritime_incident_severity` (`id`, `maritime_incident_severity`) VALUES
(1, 'VERY SERIOUS MC - INVOLVING TOTAL LOSS OF VESSEL, DEATH OR SEVERE DAMAGE TO THE ENVIRONMENT'),
(2, 'SERIOUS MC - A) FIRE, EXPLOSION, GROUNDING, CONTACT, HEAVY WEATHER, HULL CRACKING OR SUSPECTED HULL DEFECT. B) STRUCTURAL DAMAGE RENDERING THE VESSEL UNSEAWORTHY, SUCH AS PENETRATION OF THE HULL UNDERWATER, IMMOBILIZATION OF MAIN ENGINES, EXTENSIVE ACCOMMODATION DAMAGE. C) POLLUTION. AND D) BREAKDOWN NECESSITATING TOWAGE OR SHORE ASSISTANCE.'),
(3, 'MI - EVENTS OTHER THAN MARINE CASUALTY, WHICH HAS OCCURED DIRECTLY IN CONNECTION WITH THE OPERATION OF A SHIP THAT ENDANGERED, OR IF NOT CORRECTED WOULD ENDANGER THE SAFETY OF SHIP, ITS OCCUPANTS OR ANY OTHER PERSON OR ENVIRONMENT');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_incident_type`
--

CREATE TABLE `maritime_incident_type` (
  `id` int(11) NOT NULL,
  `maritime_incident_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maritime_incident_type`
--

INSERT INTO `maritime_incident_type` (`id`, `maritime_incident_type`) VALUES
(1, 'AGROUNDING'),
(2, 'ALLISION'),
(3, 'CAPSIZING'),
(4, 'COLLISION'),
(5, 'ENGINE TROUBLE'),
(6, 'FIRE'),
(7, 'MAN OVERBOARD'),
(8, 'STEERING CASUALTY');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_related_violation`
--

CREATE TABLE `maritime_related_violation` (
  `id` int(11) NOT NULL,
  `maritime_related_violation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maritime_related_violation`
--

INSERT INTO `maritime_related_violation` (`id`, `maritime_related_violation`) VALUES
(1, 'FAILURE TO SECURE PERMIT'),
(2, 'OWNER/OPERATOR/BOAT CAPTAIN OF WATERCRAFT JOINING MARINE EVENT WITHOUT PERMISSION OF THE PCG'),
(3, 'PASSENGER AND CREWS FAILED TO WEAR LIFE JACKETS IN OPEN DECK BOATS'),
(4, 'PASSENGER/CREWS UNDER THE INFLUENCE OF LIQUOR AND ILLEGAL DRUGS');

-- --------------------------------------------------------

--
-- Table structure for table `marpol_violation`
--

CREATE TABLE `marpol_violation` (
  `id` int(11) NOT NULL,
  `marpol_violation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marpol_violation`
--

INSERT INTO `marpol_violation` (`id`, `marpol_violation`) VALUES
(1, 'DISPOSAL OF GARBAGE (HPCG MC 07-14 DATED 19 DEC 14)'),
(2, 'DISCHARGE OF SEWAGE FROM SHIPS (HPCG MC 10-2014)'),
(3, 'DISPOSAL OF USED OIL (HPCG MC 01-2005)');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf`
--

CREATE TABLE `marsaf` (
  `id` int(11) NOT NULL,
  `station` int(11) DEFAULT NULL,
  `sub_station` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `psc_center` int(11) DEFAULT NULL,
  `report_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_aton`
--

CREATE TABLE `marsaf_aton` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `lh_name` varchar(100) DEFAULT NULL,
  `lh_type` varchar(100) DEFAULT NULL,
  `lh_inspection_purpose` varchar(100) DEFAULT NULL,
  `lh_vessel_name` varchar(100) DEFAULT NULL,
  `lh_last_operation` date DEFAULT NULL,
  `lh_status` varchar(100) DEFAULT NULL,
  `lh_cause_if_not_operating` varchar(100) DEFAULT NULL,
  `lh_operating` int(11) DEFAULT NULL,
  `lh_not_operating` int(11) DEFAULT NULL,
  `lb_name` varchar(100) DEFAULT NULL,
  `lb_type` varchar(100) DEFAULT NULL,
  `lb_location` varchar(100) DEFAULT NULL,
  `lb_inspection_purpose` varchar(100) DEFAULT NULL,
  `lb_repair` varchar(100) DEFAULT NULL,
  `lb_last_operating` date DEFAULT NULL,
  `lb_status` varchar(100) DEFAULT NULL,
  `lb_cause_if_not_operating` varchar(100) DEFAULT NULL,
  `lb_operating` int(11) DEFAULT NULL,
  `lb_not_operating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_aton`
--

INSERT INTO `marsaf_aton` (`id`, `marsaf_report_type`, `lh_name`, `lh_type`, `lh_inspection_purpose`, `lh_vessel_name`, `lh_last_operation`, `lh_status`, `lh_cause_if_not_operating`, `lh_operating`, `lh_not_operating`, `lb_name`, `lb_type`, `lb_location`, `lb_inspection_purpose`, `lb_repair`, `lb_last_operating`, `lb_status`, `lb_cause_if_not_operating`, `lb_operating`, `lb_not_operating`) VALUES
(1, 10, 'ASD', '1,2', '1', 'asd', '2023-03-10', '1,2', '1,2,3', 1, 1, 'ASD', '1,2', 'asd', '1,2', 'ASDasd', '2023-03-07', '1,2', '1,2,4', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_cabrsasi`
--

CREATE TABLE `marsaf_cabrsasi` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_cabrsasi_data`
--

CREATE TABLE `marsaf_cabrsasi_data` (
  `id` int(11) NOT NULL,
  `marsaf_cabrsasi` int(11) NOT NULL,
  `coastal_name` varchar(100) DEFAULT NULL,
  `coastal_place` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `beach_coast_line_length` varchar(100) DEFAULT NULL,
  `violation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_ere`
--

CREATE TABLE `marsaf_ere` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `bulk_carrier` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `chemical_tanker` varchar(100) DEFAULT NULL,
  `container` varchar(100) DEFAULT NULL,
  `fishing_vessel` varchar(100) DEFAULT NULL,
  `passenger` varchar(100) DEFAULT NULL,
  `roll_on_roll_off` varchar(100) DEFAULT NULL,
  `tanker` varchar(100) DEFAULT NULL,
  `tugboat` varchar(100) DEFAULT NULL,
  `passed` varchar(100) DEFAULT NULL,
  `failed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_ere_data`
--

CREATE TABLE `marsaf_ere_data` (
  `id` int(11) NOT NULL,
  `marsaf_ere` int(11) NOT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `port_place` varchar(100) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `captain_name` varchar(100) DEFAULT NULL,
  `vessel_age` int(11) DEFAULT NULL,
  `gross_tonnage` double(10,2) DEFAULT NULL,
  `kilowat` double(10,2) DEFAULT NULL,
  `previous_date` datetime DEFAULT NULL,
  `inspection_type` varchar(100) DEFAULT NULL,
  `drill_conducted` varchar(100) DEFAULT NULL,
  `ere_result` varchar(100) DEFAULT NULL,
  `next_schedule` date DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_incident_cause`
--

CREATE TABLE `marsaf_incident_cause` (
  `id` int(11) NOT NULL,
  `incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_incident_cause`
--

INSERT INTO `marsaf_incident_cause` (`id`, `incident_cause`) VALUES
(1, 'HUMAN FACTOR'),
(2, 'OPERATIONAL FACTOR');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_inspection_type`
--

CREATE TABLE `marsaf_inspection_type` (
  `id` int(11) NOT NULL,
  `inspection_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_inspection_type`
--

INSERT INTO `marsaf_inspection_type` (`id`, `inspection_type`) VALUES
(1, 'OVERRIDING INSPECTION'),
(2, 'REQUEST OF OWNER/COMPANY'),
(3, 'REGULAR INSPECTIONS ONCE EVERY 6 MONTHS'),
(4, 'INITIAL INSPECTION');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_mci`
--

CREATE TABLE `marsaf_mci` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `exact_location` varchar(100) DEFAULT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `registry_flag` varchar(100) DEFAULT NULL,
  `foreign_imo_number` varchar(100) DEFAULT NULL,
  `domestic_official_number` varchar(100) DEFAULT NULL,
  `gt_nt` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(100) DEFAULT NULL,
  `captain_name` varchar(100) DEFAULT NULL,
  `crew_nationality_number` varchar(100) DEFAULT NULL,
  `passenger_number` varchar(100) DEFAULT NULL,
  `cargoe_onboard` varchar(100) DEFAULT NULL,
  `port_origin` varchar(100) DEFAULT NULL,
  `departure_date_from_port_origin` date DEFAULT NULL,
  `departure_time_from_port_origin` varchar(100) DEFAULT NULL,
  `incident_time` varchar(100) DEFAULT NULL,
  `maritime_casualty_nature` varchar(100) DEFAULT NULL,
  `incident_cause` varchar(100) DEFAULT NULL,
  `incident_consequences` varchar(100) DEFAULT NULL,
  `maritime_incident_severity` varchar(100) DEFAULT NULL,
  `very_serious_mc_category` varchar(100) DEFAULT NULL,
  `ship_name_involved` varchar(100) DEFAULT NULL,
  `registry_flag_2` varchar(100) DEFAULT NULL,
  `foreign_imo_number_2` varchar(100) DEFAULT NULL,
  `domestic_official_number_2` varchar(100) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `gt_nt_2` varchar(100) DEFAULT NULL,
  `company_name_2` varchar(100) DEFAULT NULL,
  `company_address_2` varchar(100) DEFAULT NULL,
  `captain_name_2` varchar(100) DEFAULT NULL,
  `crew_nationality_number_2` varchar(100) DEFAULT NULL,
  `passenger_number_2` varchar(100) DEFAULT NULL,
  `cargoe_onboard_2` varchar(100) DEFAULT NULL,
  `port_origin_2` varchar(100) DEFAULT NULL,
  `departure_date_from_port_origin_2` varchar(100) DEFAULT NULL,
  `departure_hour_from_port_origin_2` varchar(100) DEFAULT NULL,
  `departure_minute_from_port_origin_2` varchar(100) DEFAULT NULL,
  `total_injured_person` varchar(100) DEFAULT NULL,
  `total_death` varchar(100) DEFAULT NULL,
  `total_missing_person` varchar(100) DEFAULT NULL,
  `total_survivor` varchar(100) DEFAULT NULL,
  `safety_recommendation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_mci`
--

INSERT INTO `marsaf_mci` (`id`, `marsaf_report_type`, `exact_location`, `vessel_name`, `registry_flag`, `foreign_imo_number`, `domestic_official_number`, `gt_nt`, `company_name`, `company_address`, `captain_name`, `crew_nationality_number`, `passenger_number`, `cargoe_onboard`, `port_origin`, `departure_date_from_port_origin`, `departure_time_from_port_origin`, `incident_time`, `maritime_casualty_nature`, `incident_cause`, `incident_consequences`, `maritime_incident_severity`, `very_serious_mc_category`, `ship_name_involved`, `registry_flag_2`, `foreign_imo_number_2`, `domestic_official_number_2`, `vessel_type`, `gt_nt_2`, `company_name_2`, `company_address_2`, `captain_name_2`, `crew_nationality_number_2`, `passenger_number_2`, `cargoe_onboard_2`, `port_origin_2`, `departure_date_from_port_origin_2`, `departure_hour_from_port_origin_2`, `departure_minute_from_port_origin_2`, `total_injured_person`, `total_death`, `total_missing_person`, `total_survivor`, `safety_recommendation`) VALUES
(1, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 20, 'asdf', 'asdf', 'as', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2023-03-22', '12:12', 'asdf', '1,2,4,5', '1,2', '1,6,7', '1,2,3', '1,2,3', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2023-03-23', '15', '13', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(3, 21, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_mpramra`
--

CREATE TABLE `marsaf_mpramra` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `event_organizer` varchar(100) DEFAULT NULL,
  `maritime_acitivity` varchar(100) DEFAULT NULL,
  `departure_date_from_origin_port` date DEFAULT NULL,
  `departure_hour_from_origin_port` varchar(100) DEFAULT NULL,
  `departure_minutefrom_origin_port` varchar(100) DEFAULT NULL,
  `origin_point` varchar(100) DEFAULT NULL,
  `destination_point` varchar(100) DEFAULT NULL,
  `involved_vessel` varchar(100) DEFAULT NULL,
  `mpramra_involved_vessel_total` varchar(100) DEFAULT NULL,
  `mpramra_maritime_related_violation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_mpramra`
--

INSERT INTO `marsaf_mpramra` (`id`, `marsaf_report_type`, `location`, `application_date`, `event_organizer`, `maritime_acitivity`, `departure_date_from_origin_port`, `departure_hour_from_origin_port`, `departure_minutefrom_origin_port`, `origin_point`, `destination_point`, `involved_vessel`, `mpramra_involved_vessel_total`, `mpramra_maritime_related_violation`) VALUES
(1, 31, 'asdfasdf', '2023-03-21', '1', '1,2', '2023-03-09', '15', '14', 'asdf', 'asdf', 'asdf', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_pdi`
--

CREATE TABLE `marsaf_pdi` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) NOT NULL,
  `bulk_carrier` varchar(100) DEFAULT NULL,
  `bulk_carrier_2` varchar(100) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL,
  `chemical_tanker` int(11) DEFAULT NULL,
  `container` int(11) DEFAULT NULL,
  `fishing_vessel` int(11) DEFAULT NULL,
  `passenger` int(11) DEFAULT NULL,
  `roll_on_roll_off` int(11) DEFAULT NULL,
  `tanker` int(11) DEFAULT NULL,
  `tugboat` int(11) DEFAULT NULL,
  `noted_deficiency` varchar(100) DEFAULT NULL,
  `cleared_to_depart` int(11) DEFAULT NULL,
  `not_cleared_to_depart` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_pdi_data`
--

CREATE TABLE `marsaf_pdi_data` (
  `id` int(11) NOT NULL,
  `marsaf_pdi` int(11) NOT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `port_place` varchar(100) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `captain_name` varchar(100) DEFAULT NULL,
  `gross_tonnage` double(19,2) DEFAULT NULL,
  `kilowat` double(10,2) DEFAULT NULL,
  `pdi_result` varchar(100) DEFAULT NULL,
  `action_code` varchar(100) DEFAULT NULL,
  `noted_deficiency` varchar(100) DEFAULT NULL,
  `specify_noted_deficiency` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_psc`
--

CREATE TABLE `marsaf_psc` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `bulk_carrier` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `chemical_tanker` varchar(100) DEFAULT NULL,
  `container` varchar(100) DEFAULT NULL,
  `fishing_vessel` varchar(100) DEFAULT NULL,
  `passenger` varchar(100) DEFAULT NULL,
  `roll_on_roll_off` varchar(100) DEFAULT NULL,
  `tanker` varchar(100) DEFAULT NULL,
  `tugboat` varchar(100) DEFAULT NULL,
  `detained` varchar(100) DEFAULT NULL,
  `not_detained` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_psc_data`
--

CREATE TABLE `marsaf_psc_data` (
  `id` int(11) NOT NULL,
  `marsaf_psc` int(11) NOT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `port_place` varchar(100) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `registry_flag` varchar(100) DEFAULT NULL,
  `imo_nr` varchar(100) DEFAULT NULL,
  `gt_nt` varchar(100) DEFAULT NULL,
  `vessel_age` double(10,2) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `captain_name` varchar(100) DEFAULT NULL,
  `inspection_type` varchar(100) DEFAULT NULL,
  `action_code` varchar(100) DEFAULT NULL,
  `related_international_conventions_noted_deficiency` varchar(100) DEFAULT NULL,
  `noted_deficiency` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_rsei`
--

CREATE TABLE `marsaf_rsei` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_rsei_data`
--

CREATE TABLE `marsaf_rsei_data` (
  `id` int(11) NOT NULL,
  `marsaf_rsei` int(11) NOT NULL,
  `resort_name` varchar(100) DEFAULT NULL,
  `inspection_place` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `recration_watercraft` varchar(100) DEFAULT NULL,
  `recreational_violation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_so`
--

CREATE TABLE `marsaf_so` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `salvor_name` varchar(100) DEFAULT NULL,
  `application_type` varchar(100) DEFAULT NULL,
  `exact_location` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `violation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_so`
--

INSERT INTO `marsaf_so` (`id`, `marsaf_report_type`, `salvor_name`, `application_type`, `exact_location`, `purpose`, `violation`) VALUES
(1, 32, 'asd', '1,3', 'asdf', '1,4', NULL),
(2, 33, 'asd', '1,3', 'asdf', '1,4', NULL),
(3, 34, 'asd', '1,3', 'asdf', '1,4', 'on'),
(4, 35, 'asd', '1,3', 'asdf', '1,4', NULL),
(5, 36, 'asd', '1,3', 'asdf', '1,4', NULL),
(6, 37, '', '', '', '1,2,3', NULL),
(7, 38, '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_vessel_type`
--

CREATE TABLE `marsaf_vessel_type` (
  `id` int(11) NOT NULL,
  `vessel_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsaf_vessel_type`
--

INSERT INTO `marsaf_vessel_type` (`id`, `vessel_type`) VALUES
(1, 'BULK CARRIER'),
(2, 'CARGO'),
(3, 'CHEMICAL TANKER'),
(4, 'CONTAINER'),
(5, 'FISHING VESSEL'),
(6, 'PASSENGER'),
(7, 'ROLL-ON/ROLL-OFF'),
(8, 'TANKER'),
(9, 'TUGBOAT');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_vsei`
--

CREATE TABLE `marsaf_vsei` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL,
  `bulk_carrier` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `chemical_tanker` varchar(100) DEFAULT NULL,
  `container` varchar(100) DEFAULT NULL,
  `fishing_vessel` varchar(100) DEFAULT NULL,
  `passenger` varchar(100) DEFAULT NULL,
  `roll_on_roll_off` varchar(100) DEFAULT NULL,
  `tanker` varchar(100) DEFAULT NULL,
  `tugboat` varchar(100) DEFAULT NULL,
  `vsei_deficiency_code` varchar(100) DEFAULT NULL,
  `detained` varchar(100) DEFAULT NULL,
  `not_detained` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_vsei_data`
--

CREATE TABLE `marsaf_vsei_data` (
  `id` int(11) NOT NULL,
  `marsaf_vsei` int(11) NOT NULL,
  `vessel_name` varchar(100) DEFAULT NULL,
  `port_place` varchar(100) DEFAULT NULL,
  `vessel_type` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `captain_name` varchar(100) DEFAULT NULL,
  `vessel_age` int(11) DEFAULT NULL,
  `gross_tonnage` double(10,2) DEFAULT NULL,
  `kilowat` double(10,2) DEFAULT NULL,
  `inspection_type` varchar(100) DEFAULT NULL,
  `vsei_result` varchar(100) DEFAULT NULL,
  `action_code` varchar(100) DEFAULT NULL,
  `deficiency_code` varchar(100) DEFAULT NULL,
  `specify_noted_deficiency` varchar(250) DEFAULT NULL,
  `next_schedule` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marsar`
--

CREATE TABLE `marsar` (
  `id` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  `sub_station` int(11) NOT NULL,
  `maritime_incident_type` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `google_map_location` text DEFAULT NULL,
  `incident_cause` varchar(100) DEFAULT NULL,
  `fire_cause` varchar(100) DEFAULT NULL,
  `man_overboard_incident_cause` varchar(100) DEFAULT NULL,
  `location_incident_location` varchar(100) DEFAULT NULL,
  `survivor_number` varchar(100) DEFAULT NULL,
  `casualty_number` varchar(100) DEFAULT NULL,
  `missing_number` varchar(100) DEFAULT NULL,
  `material_report` varchar(100) DEFAULT NULL,
  `description_extend_vessel_damage` varchar(100) DEFAULT NULL,
  `asset_deployment` varchar(100) DEFAULT NULL,
  `information_acquired_thru` varchar(100) DEFAULT NULL,
  `time_assets_deployment` varchar(100) DEFAULT NULL,
  `vessel_type_involved` varchar(100) DEFAULT NULL,
  `vessel_age_1` varchar(100) DEFAULT NULL,
  `vessel_size_1` varchar(100) DEFAULT NULL,
  `registry_port_1` varchar(100) DEFAULT NULL,
  `departure_port_1` varchar(100) DEFAULT NULL,
  `call_next_port_1` varchar(100) DEFAULT NULL,
  `vessel_age_2` varchar(100) DEFAULT NULL,
  `vessel_size_2` varchar(100) DEFAULT NULL,
  `registry_port_2` varchar(100) DEFAULT NULL,
  `departure_port_2` varchar(100) DEFAULT NULL,
  `call_next_port_2` varchar(100) DEFAULT NULL,
  `radio_message_spot_report` text DEFAULT NULL,
  `photograph` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsar`
--

INSERT INTO `marsar` (`id`, `station`, `sub_station`, `maritime_incident_type`, `date_created`, `google_map_location`, `incident_cause`, `fire_cause`, `man_overboard_incident_cause`, `location_incident_location`, `survivor_number`, `casualty_number`, `missing_number`, `material_report`, `description_extend_vessel_damage`, `asset_deployment`, `information_acquired_thru`, `time_assets_deployment`, `vessel_type_involved`, `vessel_age_1`, `vessel_size_1`, `registry_port_1`, `departure_port_1`, `call_next_port_1`, `vessel_age_2`, `vessel_size_2`, `registry_port_2`, `departure_port_2`, `call_next_port_2`, `radio_message_spot_report`, `photograph`) VALUES
(3, 2, 4, 4, '2023-03-15 04:00:00', NULL, '3,4', '', '', '3243242423342', '7', '768', '87', '2,3', '786786786', '2,5,6,9', '2,3,7', '1', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(4, 2, 3, 7, '2023-03-09 02:30:00', NULL, '', '', '3,6', '1tyutgutyu', '324', '324', '342', '2,3', '324342342', '4,7,9', '1,3,5', '1', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL),
(6, 2, 5, 1, '2023-03-10 03:30:00', NULL, '2,4,5', '', '', '675675', '675', '675', '675', '3', '675675675', '4,6,8,10', '2,3,7,8', '1', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marsar_incident_cause`
--

CREATE TABLE `marsar_incident_cause` (
  `id` int(11) NOT NULL,
  `incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marsar_incident_cause`
--

INSERT INTO `marsar_incident_cause` (`id`, `incident_cause`) VALUES
(1, 'Machinery Failure'),
(2, 'Navigational Equipment failure'),
(3, 'Human Error'),
(4, 'Environmental Factor (Geographic Location)'),
(5, 'Electrical Failure'),
(6, 'Failure in Ships Steering System');

-- --------------------------------------------------------

--
-- Table structure for table `marslec`
--

CREATE TABLE `marslec` (
  `id` int(11) NOT NULL,
  `station` int(11) DEFAULT NULL,
  `sub_station` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `ra_10654` varchar(100) DEFAULT NULL,
  `ra_9165` varchar(100) DEFAULT NULL,
  `ra_10591` varchar(100) DEFAULT NULL,
  `ra_9208` varchar(100) DEFAULT NULL,
  `ra_9147` varchar(100) DEFAULT NULL,
  `pd_no_705` varchar(100) DEFAULT NULL,
  `ra_1937` varchar(100) DEFAULT NULL,
  `pd_no_532` varchar(100) DEFAULT NULL,
  `ra_10066` varchar(100) DEFAULT NULL,
  `ra_6539` varchar(100) DEFAULT NULL,
  `ra_10845` varchar(100) DEFAULT NULL,
  `marpol_violation` varchar(100) DEFAULT NULL,
  `seaborne_patrol_date` datetime DEFAULT NULL,
  `seaborne_patrol_location` varchar(100) DEFAULT NULL,
  `seaborne_patrol_activity_conduct` varchar(100) DEFAULT NULL,
  `seaborne_patrol_number_conduncted` int(11) DEFAULT NULL,
  `seaborne_patrol_area_covered` varchar(100) DEFAULT NULL,
  `seaborne_patrol_number_hour_conducted` int(11) DEFAULT NULL,
  `shore_patrol_date_started` datetime DEFAULT NULL,
  `shore_patrol_date_ended` datetime DEFAULT NULL,
  `shore_patrol_number_conducted` int(11) DEFAULT NULL,
  `shore_patrol_coastline_covered_length` int(11) DEFAULT NULL,
  `sea_marshall_date_started` datetime DEFAULT NULL,
  `sea_marshall_date_ended` datetime DEFAULT NULL,
  `panelling_conducted_date` datetime DEFAULT NULL,
  `panelling_conducted_facilities` varchar(100) DEFAULT NULL,
  `k9_deployed_type` varchar(100) DEFAULT NULL,
  `eod_deployment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marslec`
--

INSERT INTO `marslec` (`id`, `station`, `sub_station`, `date_created`, `ra_10654`, `ra_9165`, `ra_10591`, `ra_9208`, `ra_9147`, `pd_no_705`, `ra_1937`, `pd_no_532`, `ra_10066`, `ra_6539`, `ra_10845`, `marpol_violation`, `seaborne_patrol_date`, `seaborne_patrol_location`, `seaborne_patrol_activity_conduct`, `seaborne_patrol_number_conduncted`, `seaborne_patrol_area_covered`, `seaborne_patrol_number_hour_conducted`, `shore_patrol_date_started`, `shore_patrol_date_ended`, `shore_patrol_number_conducted`, `shore_patrol_coastline_covered_length`, `sea_marshall_date_started`, `sea_marshall_date_ended`, `panelling_conducted_date`, `panelling_conducted_facilities`, `k9_deployed_type`, `eod_deployment`) VALUES
(1, 1, 2, '2023-01-07 20:56:16', '', '', '', '', '', '', '', '', '', '', '', '1', '2023-01-06 02:07:00', '', '2', 0, '', 0, '2023-01-13 00:00:00', '2023-01-13 00:00:00', 0, 0, '2023-01-20 12:08:00', '2023-01-20 00:00:00', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_report`
--

CREATE TABLE `material_report` (
  `id` int(11) NOT NULL,
  `material_report` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_report`
--

INSERT INTO `material_report` (`id`, `material_report`) VALUES
(1, 'VESSEL SUNK'),
(2, 'FULLY DAMAGE BUT AFLOAT'),
(3, 'PARTIALLY DAMAGE BUT CAN BE PROPELLED ON HER OWN'),
(4, 'HALF SUBMERGE');

-- --------------------------------------------------------

--
-- Table structure for table `noted_deficiency`
--

CREATE TABLE `noted_deficiency` (
  `id` int(11) NOT NULL,
  `noted_deficiency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noted_deficiency`
--

INSERT INTO `noted_deficiency` (`id`, `noted_deficiency`) VALUES
(1, 'MARINA MC 161/ MC 2006-06 CERTIFIED OF PUBLIC CONVENIENCE (CPC)'),
(2, 'MARINA MC 203 (SHIP SAFETY CERTIFICATES)'),
(3, 'MARINA MC 177 (CERTIFICATE OF VESSEL SAFETY) AND (CERTIFICATE OF OWNERSHIP)'),
(4, 'MARINA MC 110 (COSTWISE/BAY AND RIVER LICENSE) '),
(5, 'MARINA MC 89,148,179 (MINIMUM SAFE MANNING CERTIFICATE) '),
(6, 'MARINA MC 2007-03 (LOADLINE CERTIFICATE)'),
(7, 'MARINA MC 2007-04 (TONNAGE MEASUREMENT CERTIFICATE)'),
(8, 'MARINA MC 124 (CLASSIFICATION SOCIETY CERTIFICATE)'),
(9, 'MARINA MC 143, 159 (DOCUMENT OF COMPLIANCE) '),
(10, 'MARINA MC 148, 179 (SAFETY MANAGEMENT CERTIFICATE) '),
(11, 'MARINA MC 105, 105-A (SPECIAL PERMIT) '),
(12, 'MARINA MC 2007-05 (CERTIFICATE OF STABILITY) '),
(13, 'MARINA MC 123 (ADEQUACY OF LIFEJACKETS/LIFECRAFTS AND OTHER LIFE SAVING APPLIANCES) '),
(14, 'MARINA MC 151,170 (SHIPS OFFICES PASSSES LICENSES) '),
(15, 'MARINA MC 180, 2009-13, 2009-18 (CARGO MANIFEST)'),
(16, 'MARINA MC 191 (INFLUENCE OF ALCOHOL OR PROHIBITED DRUGS) '),
(17, 'MARINA MC 114 (WEARING OF PROPER UNIFORM)'),
(18, 'PMMRR 1997 CHAPTER X (SHIP STATION LICENSE) '),
(19, 'PMMRR 1997 CHAPTER X AND XI (NAVIGATIONAL EQUIPMENT REQUIREMENT FOR SHIP STATION LICENSE)'),
(20, 'PMMRR 1997 CHAPTER XI (RUNNING LIGHTS)'),
(21, 'PMMRR 1997 CHAPTER V, HPCG MC 04-98 (MASTER AND CHIEF ENGINEER ATTESTED ALL MAIN AND AUXILLIARY AGEN'),
(22, 'HPCG MC 08-12 (MASTER DECLARANT SAFE DEPARTURE) '),
(23, 'HPCG MC 00-2011 (VESSEL SAFETY INSPECTION BOOKLET)'),
(24, 'HPCG MC 04-98 (VESSEL STABILITY)'),
(25, 'HPCG MC 01-09 MC 03-01 (GUIDELINES OF MOVEMENT IN HEAVY WEATHER)');

-- --------------------------------------------------------

--
-- Table structure for table `oil_type`
--

CREATE TABLE `oil_type` (
  `id` int(11) NOT NULL,
  `oil_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oil_type`
--

INSERT INTO `oil_type` (`id`, `oil_type`) VALUES
(1, 'HEAVY OIL'),
(2, 'CRUDE OIL'),
(3, 'BUNKER FUEL'),
(4, 'DIESEL'),
(5, 'GASOLINE');

-- --------------------------------------------------------

--
-- Table structure for table `panelling_conducted_facilities`
--

CREATE TABLE `panelling_conducted_facilities` (
  `id` int(11) NOT NULL,
  `panelling_conducted_facilities` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panelling_conducted_facilities`
--

INSERT INTO `panelling_conducted_facilities` (`id`, `panelling_conducted_facilities`) VALUES
(1, 'PORTS'),
(2, 'AIRPORTS'),
(3, 'MALLS'),
(4, 'AFP/PNP/PCG CHECKPOINTS'),
(5, 'EVENTS PLACE');

-- --------------------------------------------------------

--
-- Table structure for table `participating_agency`
--

CREATE TABLE `participating_agency` (
  `id` int(11) NOT NULL,
  `participating_agency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participating_agency`
--

INSERT INTO `participating_agency` (`id`, `participating_agency`) VALUES
(1, 'LGU'),
(2, 'NATIONAL LINE AGENCIES'),
(3, 'ACADEME'),
(4, 'PRIVATE CORPORATIONS'),
(5, 'SHIPPING COMPANIES'),
(6, 'PCG UNITS'),
(7, 'PCG AUXILIARY'),
(8, 'RESIDENTS OF COASTAL COMMUNITY');

-- --------------------------------------------------------

--
-- Table structure for table `pdi_result`
--

CREATE TABLE `pdi_result` (
  `id` int(11) NOT NULL,
  `pdi_result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pdi_result`
--

INSERT INTO `pdi_result` (`id`, `pdi_result`) VALUES
(1, 'CLEARED TO DEPART'),
(2, 'NOT CLEARED TO DEPART');

-- --------------------------------------------------------

--
-- Table structure for table `pd_no_532`
--

CREATE TABLE `pd_no_532` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pd_no_532`
--

INSERT INTO `pd_no_532` (`id`, `section`) VALUES
(1, 'SECTION 3 (PARAGRAPH A) PIRACY'),
(2, 'SECTION 3 (PARAGRAPH B) HIGHWAY ROBBERY/BRIGANDAGE');

-- --------------------------------------------------------

--
-- Table structure for table `pd_no_705`
--

CREATE TABLE `pd_no_705` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pd_no_705`
--

INSERT INTO `pd_no_705` (`id`, `section`) VALUES
(1, 'SECTION 68. CUTTING, GATHERING AND/OR COLLECTING TIMBER OR OTHER PRODUCTS WITHOUT LICENSE'),
(2, 'SECTION 69. UNLAWFUL OCCUPATION OR DESTRUCTION OF FOREST LANDS'),
(3, 'SECTION 70. PASTURING LIVESTOCK'),
(4, 'SECTION 71. ILLEGAL OCCUPATION OF NATIONAL PARKS SYSTEM AND RECREATION AREAS AND VANDALISM THEREIN'),
(5, 'SECTION 72. DESTRUCTION OF WILDLIFE RESOURCES'),
(6, 'SECTION 73. SURVEY BY UNAUTHORIZED PERSON'),
(7, 'SECTION 74. MISCLASSIFICATION AND SURVEY BY GOVERNMENT OFFICIAL OR EMPLOYEE'),
(8, 'SECTION 75. TAX DECLARATION ON REAL PROPERTY.'),
(9, 'SECTION 76. COERCION AND INFLUENCE'),
(10, 'SECTION 77. UNLAWFUL POSSESSION OF IMPLEMENTS AND DEVICES USED BY FOREST OFFICERS'),
(11, 'SECTION 78. PAYMENT, COLLECTION AND REMITTANCE OF FOREST CHARGES');

-- --------------------------------------------------------

--
-- Table structure for table `pre_emptive_evacuation_activity`
--

CREATE TABLE `pre_emptive_evacuation_activity` (
  `id` int(11) NOT NULL,
  `pre_emptive_evacuation_activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_emptive_evacuation_activity`
--

INSERT INTO `pre_emptive_evacuation_activity` (`id`, `pre_emptive_evacuation_activity`) VALUES
(1, 'EVACUATION OF LOCAL RESIDENTS'),
(2, 'CONDUCT SEABORN PATROL'),
(3, 'CONDUCT COASTAL PATROL'),
(4, 'WEATHER MONITORING');

-- --------------------------------------------------------

--
-- Table structure for table `pre_emptive_evacuation_coordination_with`
--

CREATE TABLE `pre_emptive_evacuation_coordination_with` (
  `id` int(11) NOT NULL,
  `pre_emptive_evacuation_coordination_with` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_emptive_evacuation_coordination_with`
--

INSERT INTO `pre_emptive_evacuation_coordination_with` (`id`, `pre_emptive_evacuation_coordination_with`) VALUES
(1, 'LGU'),
(2, 'DSWD'),
(3, 'DRRMC');

-- --------------------------------------------------------

--
-- Table structure for table `psc_action_code`
--

CREATE TABLE `psc_action_code` (
  `id` int(11) NOT NULL,
  `psc_action_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psc_action_code`
--

INSERT INTO `psc_action_code` (`id`, `psc_action_code`) VALUES
(1, '15-RECTIFY AT NEXT PORT'),
(2, '16-RECTIFY WITHIN 14 DAYS'),
(3, '17-RECTIFY BEFORE DEPARTURE'),
(4, '18-RECTIFY WITHIN 3 MONTHS'),
(5, '30-DETAINABLE DEFICIENCIES'),
(6, '46-RECTIFY DETAINABLE DEF AT AGREED REPAIR PORT'),
(7, '48-AS IN THE AGREED  FLAG STATION CONDITION'),
(8, '49-AS IN THE AGREED RECTIFICATION ACTION PLAN'),
(9, '99-OTHER (SPECIFY)');

-- --------------------------------------------------------

--
-- Table structure for table `psc_center`
--

CREATE TABLE `psc_center` (
  `id` int(11) NOT NULL,
  `psc_center` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psc_center`
--

INSERT INTO `psc_center` (`id`, `psc_center`) VALUES
(1, 'CAGAYAN DE ORO'),
(2, 'ILIGAN'),
(3, 'OZAMIS');

-- --------------------------------------------------------

--
-- Table structure for table `ra_1937`
--

CREATE TABLE `ra_1937` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ra_1937`
--

INSERT INTO `ra_1937` (`id`, `section`) VALUES
(1, 'SECTION 3601. UNLAWFUL IMPORTATION'),
(2, 'SECTION 3602. VARIOUS FRAUDULENT PRACTICES AGAINST CUSTOMS REVENUE'),
(3, 'SECTION 3603. FAILURE TO REPORT FRAUD'),
(4, 'SECTION 3604. STATUTORY OFFENSE OF OFFICIALS AND EMPLOYEES'),
(5, 'SECTION 3605. CONCEALMENT OF DESTRUCTION OF EVIDENCE OF FRAUD'),
(6, 'SECTION 3606. BREAKING OF SEAL ON CAR OR CONVEYANCE BY LAND, SEA OR AIR'),
(7, 'SECTION 3607. ALTERATION OF MARKS ON ANY PACKAGE OF WAREHOUSED ARTICLES'),
(8, 'SECTION 3608. FRAUDULENT OPENING OR ENTERING OF WAREHOUSE'),
(9, 'SECTION 3609. FRAUDULENT REMOVAL OF CONCEALMENT OF WAREHOUSED ARTICLES'),
(10, 'SECTION 3610. VIOLATION OF TARIFF AND CUSTOMS LAWS AND REGULATIONS IN GENERAL');

-- --------------------------------------------------------

--
-- Table structure for table `ra_6539`
--

CREATE TABLE `ra_6539` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ra_6539`
--

INSERT INTO `ra_6539` (`id`, `section`) VALUES
(1, 'SECTION 12. DEFACING OR TAMPERING WITH SERIAL NUMBERS OF MOTOR VEHICLE ENGINES, ENGINE BLOCKS AND CHASSIS.');

-- --------------------------------------------------------

--
-- Table structure for table `ra_9147`
--

CREATE TABLE `ra_9147` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ra_9147`
--

INSERT INTO `ra_9147` (`id`, `section`) VALUES
(1, 'SECTION 27. (PARAGRAPH A) KILLING AND DESTROYING WILDLIFE SPECIES'),
(2, 'SECTION 27. (PARAGRAPH B) INFLICTING INJURY WHICH CRIPPLES AND/OR IMPAIRS THE REPRODUCTIVE SYSTEM OF WILDLIFE SPECIES'),
(3, 'SECTION 27. (PARAGRAPH C) EFFECTING ANY OF THE FOLLOWING ACTS IN CRITICAL HABITAT(S)'),
(4, 'SECTION 27. (PARAGRAPH D) INTRODUCTION, REINTRODUCTION OR RESTOCKING OF WILDLIFE RESOURCES'),
(5, 'SECTION 27. (PARAGRAPH E) TRADING OF WILDLIFE'),
(6, 'SECTION 27. (PARAGRAPH F) COLLECTING, HUNTING OR POSSESSING WILDLIFE, THEIR BY-PRODUCTS AND DERIVATIVES'),
(7, 'SECTION 27. (PARAGRAPH  G) GATHERING OR DESTROYING OF ACTIVE NESTS, NEST TREES, HOST PLANTS AND THE LIKE'),
(8, 'SECTION 27. (PARAGRAPH H) MALTREATING AND/OR INFLICTING OTHER INJURIES NOT COVERED BY THE PRECEDING PARAGRAPH; AND'),
(9, 'SECTION 27. (PARAGRAPH I) TRANSPORTING OF WILDLIFE.');

-- --------------------------------------------------------

--
-- Table structure for table `ra_9165`
--

CREATE TABLE `ra_9165` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
