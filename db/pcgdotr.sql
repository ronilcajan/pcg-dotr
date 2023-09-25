-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 10:02 AM
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
-- Database: `pcgdotr`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_code`
--

CREATE TABLE `action_code` (
  `id` int(11) NOT NULL,
  `action_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affected_area`
--

INSERT INTO `affected_area` (`id`, `affected_area`) VALUES
(1, 'INDUSTRIAL AREA'),
(2, 'MANGROVES'),
(3, 'SEA GRASS'),
(4, 'MPA'),
(5, 'PSSA'),
(6, 'TOURISM AREA'),
(7, 'RESIDENTIAL'),
(8, 'DIVE SITES'),
(9, 'INDUSTRIAL AREA');

-- --------------------------------------------------------

--
-- Table structure for table `affected_biodiversity`
--

CREATE TABLE `affected_biodiversity` (
  `id` int(11) NOT NULL,
  `affected_biodiversity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affected_biodiversity`
--

INSERT INTO `affected_biodiversity` (`id`, `affected_biodiversity`) VALUES
(1, 'BIRDS'),
(2, 'CRUSTACEANS'),
(3, 'RESIDENTIAL AREAS'),
(4, 'MARINE MAMMALS'),
(5, 'MARICULTURE AREAS ');

-- --------------------------------------------------------

--
-- Table structure for table `application_type`
--

CREATE TABLE `application_type` (
  `id` int(11) NOT NULL,
  `application_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_type`
--

INSERT INTO `application_type` (`id`, `application_type`) VALUES
(1, 'APPLICATION FOR SALVOR CERTIFICATE OF REGISTRATION'),
(2, 'SALVOR CERTIFICATE OF REGISTRATION'),
(3, 'RENEWAL OF SALVOR CERTIFICATE OF REGISTRATION'),
(4, 'INSPECTION PERMIT AND SALVAGE PERMIT'),
(5, 'SALVAGE CERTIFICATE OF INSPECTION'),
(6, 'SALVAGE PERMIT FOR CARGO ');

-- --------------------------------------------------------

--
-- Table structure for table `asset_deployment`
--

CREATE TABLE `asset_deployment` (
  `id` int(11) NOT NULL,
  `asset_deployment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Error reading structure for table pcgdotr.beach_coast_line_length: #1932 - Table &#039;pcgdotr.beach_coast_line_length&#039; doesn&#039;t exist in engine
-- Error reading data for table pcgdotr.beach_coast_line_length: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `pcgdotr`.`beach_coast_line_length`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `body_built`
--

CREATE TABLE `body_built` (
  `id` int(11) NOT NULL,
  `body_built` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bouy_type`
--

INSERT INTO `bouy_type` (`id`, `bouy_type`) VALUES
(1, 'LATERAL PORT HAND MARK'),
(2, 'LATERAL STARBOARD HAND MARK'),
(3, 'NORTH CARDINAL MARK'),
(4, 'SOUTH CARDINAL MARK'),
(5, 'WEST CARDINAL MARK'),
(6, 'EAST CARDINAL MARK ');

-- --------------------------------------------------------

--
-- Table structure for table `cadaver_approximate_age`
--

CREATE TABLE `cadaver_approximate_age` (
  `id` int(11) NOT NULL,
  `cadaver_approximate_age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cadaver_location`
--

INSERT INTO `cadaver_location` (`id`, `cadaver_location`) VALUES
(1, 'LAND'),
(2, 'COASTLINE'),
(3, 'WATER ');

-- --------------------------------------------------------

--
-- Table structure for table `coastal_and_beach_violation`
--

CREATE TABLE `coastal_and_beach_violation` (
  `id` int(11) NOT NULL,
  `coastal_and_beach_violation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conduct_of_activity`
--

INSERT INTO `conduct_of_activity` (`conduct_of_activity_id`, `conduct_of_activity`) VALUES
(1, 'PCG INITIATED'),
(2, 'JOINT'),
(3, 'PARTICIPATED FROM OTHER AGENCY');

-- --------------------------------------------------------

--
-- Table structure for table `damage_estimated_cost`
--

CREATE TABLE `damage_estimated_cost` (
  `id` int(11) NOT NULL,
  `damage_estimated_cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fire_cause`
--

INSERT INTO `fire_cause` (`id`, `fire_cause`) VALUES
(1, 'Unattended Cooking Equipment'),
(2, 'Petroleum and Oil'),
(3, 'Electrical Failure'),
(4, 'ENGINE ROOM EXPLOSION ');

-- --------------------------------------------------------

--
-- Table structure for table `fire_incident_location`
--

CREATE TABLE `fire_incident_location` (
  `id` int(11) NOT NULL,
  `fire_incident_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incident_cause`
--

INSERT INTO `incident_cause` (`id`, `incident_cause`) VALUES
(1, 'MACHINERY FAILURE'),
(2, 'NAVIGATIONAL EQUIPMENT FAILURE'),
(3, 'HUMAN ERROR'),
(4, 'SEA AND WEATHER CONDITION'),
(5, 'GEOGRAPHICAL FACTOR '),
(6, 'WEATHER AND SEA CONDITION '),
(7, 'BROKEN PROPELLER AND RUDDER (WOODEN HULLED VESSELS) '),
(8, 'WEATHER AND SEA CONDITION ');

-- --------------------------------------------------------

--
-- Table structure for table `incident_consequences`
--

CREATE TABLE `incident_consequences` (
  `id` int(11) NOT NULL,
  `incident_consequences` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `man_overboard_incident_cause`
--

INSERT INTO `man_overboard_incident_cause` (`id`, `man_overboard_incident_cause`) VALUES
(3, 'Failure to wear PPE'),
(4, 'Murder'),
(5, 'Suicide'),
(6, 'Weather and Sea Condition'),
(7, 'Working Over The Sides'),
(8, 'PERSONAL ACCIDENT '),
(9, 'MISSING FOR UNKNOWN REASON ');

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
  `responding_unit_other` varchar(100) DEFAULT NULL,
  `oil_retrieved_volume` varchar(100) DEFAULT NULL,
  `affected_area` varchar(100) DEFAULT NULL,
  `affected_biodiversity` varchar(100) DEFAULT NULL,
  `training_type` varchar(100) DEFAULT NULL,
  `training_type_others` varchar(100) DEFAULT NULL,
  `training_center_name` varchar(100) DEFAULT NULL,
  `land_base_comments` text DEFAULT NULL,
  `spot_report` text DEFAULT NULL,
  `mep_violation` varchar(100) DEFAULT NULL,
  `mep_violation_marpol_equipment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marep`
--

INSERT INTO `marep` (`id`, `station`, `sub_station`, `report_type`, `date_created`, `location`, `activity_conduct`, `participating_agency`, `participant_number`, `area_coverage`, `garbage_type_collected`, `garbage_collected_volume`, `seedlings_planted_number`, `planted_trees_kind`, `incident_cause`, `vessel_type`, `vessel_name`, `inspection_type`, `marpol_violation`, `facility_type`, `facility_name`, `oil_spill_date_incident`, `oil_spill_location`, `oil_spill_map_location`, `spiller`, `oil_spill_vessel_name`, `oil_spill_companyl_name`, `tier_level`, `oil_type`, `responding_unit`, `responding_unit_other`, `oil_retrieved_volume`, `affected_area`, `affected_biodiversity`, `training_type`, `training_type_others`, `training_center_name`, `land_base_comments`, `spot_report`, `mep_violation`, `mep_violation_marpol_equipment`) VALUES
(19, 1, 1, 2, '2023-09-22 10:33:00', NULL, '2', '2,5,8', '342', '7', '', NULL, '324324', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '', ''),
(20, 3, 8, 3, '2023-09-22 10:36:00', NULL, '1', '2,6,7', '342', '432', '', NULL, '432', '423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 1, 5, '2023-09-22 00:00:00', 'dsadsad', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'Moelce', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '0', NULL, NULL, '534534543543543', NULL, NULL, NULL),
(23, 1, 1, 7, '2023-09-22 11:16:00', '342432', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 2, '3', '4324324', NULL, NULL, NULL, NULL, '2023-09-22 11:16:00', '324324324', NULL, '1', '4324324', '4234fdsdfsd', '2', '3,5', '3', NULL, '4324', '4,5', '3,4', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 1, 7, '2023-09-22 11:48:00', 'dsad', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 2, '2', 'dasdas', NULL, NULL, NULL, NULL, '2023-09-22 11:48:00', 'dasdasd', 'a04f78bda2c50e1523ee97ea1f7e3e97.png', '2', 'dasd', 'dasdasd', '2', '3,5', '3', NULL, 'dasdsad', '3,6', '3,5', '0', NULL, NULL, NULL, 'e68d008954048a770dae6af19aa1542f.png', NULL, NULL),
(25, 1, 2, 4, '2023-09-24 19:29:00', 'public_html/demoapp.ronilcajan.com', NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, '3', '432432', NULL, '4324234324', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '0', NULL, NULL, NULL, NULL, '3', '3'),
(27, 3, 8, 6, '2023-09-24 19:52:00', 'Mobod', NULL, '', '4343', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '1,2,3,5', 'dasdsad', '45343', NULL, NULL, '', ''),
(28, 2, 5, 6, '2023-09-24 20:16:00', '213213', NULL, '', '3213213', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '1,2,3,5', '45345', '321321', NULL, NULL, '', ''),
(29, 1, 2, 7, '2023-09-24 20:43:00', 'rewrewr', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 3, '4', 'ewrewrew', NULL, NULL, NULL, NULL, '2023-09-24 20:43:00', 'rwerwer', NULL, '2', 'rewrewr', 'ewr', '2', '1,3,6', '1,2,4', 'sdadsad', 'rewrwer', '5,7', '2,3', '', NULL, NULL, NULL, NULL, '', ''),
(30, 1, 1, 6, '2023-09-25 09:41:00', '', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', '', '', '', NULL, NULL, '', ''),
(31, 2, 3, 6, '2023-09-25 09:41:00', '21212121', NULL, '', '212121', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', '', '1,5', '1212121', '2121', NULL, NULL, '', ''),
(32, 2, 3, 7, '2023-09-25 10:00:00', '', NULL, '', NULL, NULL, '', NULL, NULL, NULL, 3, '5', '', NULL, NULL, NULL, NULL, '2023-09-25 10:00:00', 'dsa', NULL, '1', 'dsa', 'dsa', '1', '3,5', '1,3,5', '543543', 'dasdas', '2,4', '2,5', '', NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_acitivity`
--

CREATE TABLE `maritime_acitivity` (
  `id` int(11) NOT NULL,
  `maritime_acitivity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maritime_acitivity`
--

INSERT INTO `maritime_acitivity` (`id`, `maritime_acitivity`) VALUES
(1, 'FLUVIAL PARADE'),
(2, 'MARINE PARADE'),
(3, 'TRIATHLON'),
(4, 'REGATTA'),
(5, 'DRAGON BOAT ');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_casualty_nature`
--

CREATE TABLE `maritime_casualty_nature` (
  `id` int(11) NOT NULL,
  `maritime_casualty_nature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'STEERING CASUALTY'),
(9, 'SUBMERGED ');

-- --------------------------------------------------------

--
-- Table structure for table `maritime_related_violation`
--

CREATE TABLE `maritime_related_violation` (
  `id` int(11) NOT NULL,
  `maritime_related_violation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marpol_violation`
--

INSERT INTO `marpol_violation` (`id`, `marpol_violation`) VALUES
(1, 'DISPOSAL OF GARBAGE (HPCG MC 07-14 DATED 19 DEC 14)'),
(2, 'DISCHARGE OF SEWAGE FROM SHIPS (HPCG MC 10-2014)'),
(3, 'DISPOSAL OF USED OIL (HPCG MC 01-2005)'),
(4, 'DISPOSAL OF NOXIOUS SUBSTANCES (HPCG MC 11-2014) ');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf`
--

INSERT INTO `marsaf` (`id`, `station`, `sub_station`, `date_created`, `psc_center`, `report_type`) VALUES
(21, 1, 1, '2023-04-05 09:16:00', 1, 1),
(22, 3, 9, '2023-02-14 10:06:00', 2, 2),
(23, 2, 4, '2023-04-05 03:02:00', 1, 3),
(24, 2, 4, '2023-04-05 10:08:00', 3, 4),
(25, 3, 8, '2023-04-19 08:05:00', 2, 5),
(26, 5, 18, '2023-03-30 11:11:00', 2, 6),
(27, 3, 9, '2023-04-05 04:05:00', 1, 7),
(28, 3, 9, '2023-04-11 04:06:00', 3, 8),
(34, 2, 4, '2023-03-30 15:14:00', 3, 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_aton`
--

INSERT INTO `marsaf_aton` (`id`, `marsaf_report_type`, `lh_name`, `lh_type`, `lh_inspection_purpose`, `lh_vessel_name`, `lh_last_operation`, `lh_status`, `lh_cause_if_not_operating`, `lh_operating`, `lh_not_operating`, `lb_name`, `lb_type`, `lb_location`, `lb_inspection_purpose`, `lb_repair`, `lb_last_operating`, `lb_status`, `lb_cause_if_not_operating`, `lb_operating`, `lb_not_operating`) VALUES
(3, 27, 'NAME OF LH', '1,2', '1,2', 'NAME OF VESSEL', '2023-04-09', '1,2', '1,4', 5, 5, '231231', '2,4', '321', '1', '231231', '2023-04-23', '2', '4,6,7', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_cabrsasi`
--

CREATE TABLE `marsaf_cabrsasi` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_cabrsasi`
--

INSERT INTO `marsaf_cabrsasi` (`id`, `marsaf_report_type`) VALUES
(2, 25);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_cabrsasi_data`
--

INSERT INTO `marsaf_cabrsasi_data` (`id`, `marsaf_cabrsasi`, `coastal_name`, `coastal_place`, `owner_name`, `beach_coast_line_length`, `violation`) VALUES
(4, 25, 'NAME OF COASTAL/RESORT', 'PLACE OF COASTAL/BEACH RESORT', 'NAME OF OWNER', '1,2,3', '3,4,5,10,11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_ere`
--

INSERT INTO `marsaf_ere` (`id`, `marsaf_report_type`, `bulk_carrier`, `cargo`, `chemical_tanker`, `container`, `fishing_vessel`, `passenger`, `roll_on_roll_off`, `tanker`, `tugboat`, `passed`, `failed`) VALUES
(2, 23, '1,2', '1,2', '1', '1', '2', '1', '1', '1', '1', '1,2,3', '1,2,3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_ere_data`
--

INSERT INTO `marsaf_ere_data` (`id`, `marsaf_ere`, `vessel_name`, `port_place`, `vessel_type`, `company`, `captain_name`, `vessel_age`, `gross_tonnage`, `kilowat`, `previous_date`, `inspection_type`, `drill_conducted`, `ere_result`, `next_schedule`, `comment`) VALUES
(12, 23, 'EMERGENCY READINESS EVALUATION DATA', 'EMERGENCY READINESS EVALUATION DATA', '1,5,8,9', 'dasdsad', 'asdasd', 21, 321.00, 321.00, '2023-04-12 00:00:00', '1,3,4', '2,3,4', '1,2', '2023-04-18', '3213213');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_incident_cause`
--

CREATE TABLE `marsaf_incident_cause` (
  `id` int(11) NOT NULL,
  `incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_incident_cause`
--

INSERT INTO `marsaf_incident_cause` (`id`, `incident_cause`) VALUES
(1, 'HUMAN FACTOR'),
(2, 'OPERATIONAL FACTOR'),
(3, 'MANAGEMENT/ORGANIZATIONAL FACTOR ');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_inspection_type`
--

CREATE TABLE `marsaf_inspection_type` (
  `id` int(11) NOT NULL,
  `inspection_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `departure_time_from_port_origin` time DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_mci`
--

INSERT INTO `marsaf_mci` (`id`, `marsaf_report_type`, `exact_location`, `vessel_name`, `registry_flag`, `foreign_imo_number`, `domestic_official_number`, `gt_nt`, `company_name`, `company_address`, `captain_name`, `crew_nationality_number`, `passenger_number`, `cargoe_onboard`, `port_origin`, `departure_date_from_port_origin`, `departure_time_from_port_origin`, `incident_time`, `maritime_casualty_nature`, `incident_cause`, `incident_consequences`, `maritime_incident_severity`, `very_serious_mc_category`, `ship_name_involved`, `registry_flag_2`, `foreign_imo_number_2`, `domestic_official_number_2`, `vessel_type`, `gt_nt_2`, `company_name_2`, `company_address_2`, `captain_name_2`, `crew_nationality_number_2`, `passenger_number_2`, `cargoe_onboard_2`, `port_origin_2`, `departure_date_from_port_origin_2`, `departure_hour_from_port_origin_2`, `departure_minute_from_port_origin_2`, `total_injured_person`, `total_death`, `total_missing_person`, `total_survivor`, `safety_recommendation`) VALUES
(6, 28, 'EXACT LOCATION (COORDINATES)', 'NAME OF VESSEL', '321', '321', '321', '213', '213', '213', '213', '213', '321', '321', '21312', '2023-04-26', '09:00:00', '321231', '1,5', '2', '5,7', '2,3', '3', '321', '2133', '21', '3', '213', '321', '231', '231', '213', '231', '321', '231', '231', '2023-04-13', '14', '10', '231', '231', '213', '231', 'SAFETY RECOMMENDATIONS');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `cleared_to_depart` varchar(100) DEFAULT NULL,
  `not_cleared_to_depart` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_pdi`
--

INSERT INTO `marsaf_pdi` (`id`, `marsaf_report_type`, `bulk_carrier`, `bulk_carrier_2`, `cargo`, `chemical_tanker`, `container`, `fishing_vessel`, `passenger`, `roll_on_roll_off`, `tanker`, `tugboat`, `noted_deficiency`, `cleared_to_depart`, `not_cleared_to_depart`) VALUES
(7, 21, NULL, '1', 1, 1, 1, 1, 1, 1, 1, 1, '1,24,25', '1,4,6', '1,3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_pdi_data`
--

INSERT INTO `marsaf_pdi_data` (`id`, `marsaf_pdi`, `vessel_name`, `port_place`, `vessel_type`, `company`, `captain_name`, `gross_tonnage`, `kilowat`, `pdi_result`, `action_code`, `noted_deficiency`, `specify_noted_deficiency`) VALUES
(32, 21, 'TYPE OF VESSEL', 'PLACE OF PORT', '1,2,7,9', 'OWNER/COMPANY', 'CAPTAINS NAME', 321.00, 0.00, '1,2', '3,4', '1,3,10,12,20,24,25', '321231231');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_psc`
--

INSERT INTO `marsaf_psc` (`id`, `marsaf_report_type`, `bulk_carrier`, `cargo`, `chemical_tanker`, `container`, `fishing_vessel`, `passenger`, `roll_on_roll_off`, `tanker`, `tugboat`, `detained`, `not_detained`) VALUES
(3, 24, '1', '3', '2', '1', '2', '2', '2', '3', '1', '1,2', '1,2,3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_psc_data`
--

INSERT INTO `marsaf_psc_data` (`id`, `marsaf_psc`, `vessel_name`, `port_place`, `vessel_type`, `registry_flag`, `imo_nr`, `gt_nt`, `vessel_age`, `company`, `captain_name`, `inspection_type`, `action_code`, `related_international_conventions_noted_deficiency`, `noted_deficiency`) VALUES
(4, 24, 'NAME OF VESSEL', 'PLACE OF PORT', '1,2,3,4,5,6,7,8,9', '543', '453', '453', 453.00, '453', '453', '1,2,4', '1,7,8,9', '5,8,9,10,11', '543453453');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_rsei`
--

CREATE TABLE `marsaf_rsei` (
  `id` int(11) NOT NULL,
  `marsaf_report_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_rsei`
--

INSERT INTO `marsaf_rsei` (`id`, `marsaf_report_type`) VALUES
(2, 26);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_rsei_data`
--

INSERT INTO `marsaf_rsei_data` (`id`, `marsaf_rsei`, `resort_name`, `inspection_place`, `owner_name`, `recration_watercraft`, `recreational_violation`) VALUES
(3, 26, 'NAME OF RESORT', 'PLACE OF INSPECTION', 'NAME OF OWNER', '1,2,6,7', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_so`
--

INSERT INTO `marsaf_so` (`id`, `marsaf_report_type`, `salvor_name`, `application_type`, `exact_location`, `purpose`, `violation`) VALUES
(11, 34, '432', '3,4', '432', '2,4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `marsaf_vessel_type`
--

CREATE TABLE `marsaf_vessel_type` (
  `id` int(11) NOT NULL,
  `vessel_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_vsei`
--

INSERT INTO `marsaf_vsei` (`id`, `marsaf_report_type`, `bulk_carrier`, `cargo`, `chemical_tanker`, `container`, `fishing_vessel`, `passenger`, `roll_on_roll_off`, `tanker`, `tugboat`, `vsei_deficiency_code`, `detained`, `not_detained`) VALUES
(2, 22, '1', '1,3', '3', '1', '3', '1', '3', '2', '2', '4,19,21,22,23,24', '1', '1,2,3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marsaf_vsei_data`
--

INSERT INTO `marsaf_vsei_data` (`id`, `marsaf_vsei`, `vessel_name`, `port_place`, `vessel_type`, `company`, `captain_name`, `vessel_age`, `gross_tonnage`, `kilowat`, `inspection_type`, `vsei_result`, `action_code`, `deficiency_code`, `specify_noted_deficiency`, `next_schedule`) VALUES
(9, 22, 'VESSEL SAFETY ENFORCEMENT INSPECTION DATA', 'VESSEL SAFETY ENFORCEMENT INSPECTION DATA', '1,4,5,7,9', 'OWNER/COMPANY', 'CAPTAINS NAME', 323232, 3232.00, 32.00, '1,3,4', '1,2', '1,3,5,6', '1,2,3,19,23,24', 'SPECIFY NOTED DEFICIENCY/IES (IF ANY)', '2023-04-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marsar_incident_cause`
--

CREATE TABLE `marsar_incident_cause` (
  `id` int(11) NOT NULL,
  `incident_cause` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_report`
--

INSERT INTO `material_report` (`id`, `material_report`) VALUES
(1, 'VESSEL SUNK'),
(2, 'FULLY DAMAGE BUT AFLOAT'),
(3, 'PARTIALLY DAMAGE BUT CAN BE PROPELLED ON HER OWN'),
(4, 'HALF SUBMERGE'),
(5, 'VESSEL OPERATIONAL ');

-- --------------------------------------------------------

--
-- Table structure for table `mep_violation`
--

CREATE TABLE `mep_violation` (
  `id` int(11) NOT NULL,
  `mep_violation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mep_violation`
--

INSERT INTO `mep_violation` (`id`, `mep_violation`) VALUES
(1, 'OWS SEPARATOR FOR VESSELS 400GT AND ABOVE (HPCG MC 01/05-2005NDATD 017/17 OCT 2005)\r\n'),
(2, 'OIL RECORD BOOK, PAR 1 & 2 FOR OIL TANKERS OF 150GT AND ABOVE AND PART 1 FOR VESSEL 400 GT AND ABOVE\r\n'),
(3, 'GARBAGE MANAGEMENT PLAN AND GARBAGE RECORD BOOK TO ALL PHILIPPINE REGISTERED VESSELS ENGAGED IN INTERNATIIONAL TARDE AND TO ALL SMALL CRAFTS (HPCG MC 07-14 DATED 19 DEC 2014)'),
(4, 'ISPPC FOR REGISTERED VESSELS OF 200 GT AND ABOVE, VESSEL LESS THAN 200 (HPCG MC 09-14 DTD 19 DEC 2014)'),
(5, 'SOPEP FOR PHILIPPINE REGISTERED VESSELS IN INTERNATIONAL OR DOMESTIC TRADE (HPCG MC 09-14 DATED 19 DEC 2014)'),
(6, 'IOPPC FOR PHILIPPINE REGISTERED VESSELS IN INTERNATIONAL OR DOMESTIC TRADE (HPCG MC 06-2005 DATED 28 OCT 2005)'),
(7, 'SEWAGE TREATMENT PLANT/HOLDING TANK ACCREDITATION FOR COLLECTION AND STORAGE OF SEWAGE (HPCG MC 07-2005 DATED 03 NOV 2005)'),
(8, 'OIL DISPERSANT ACCREDITATION CERTIFCATE'),
(9, 'OIL SPILL BOOM ACCREDITATION CERTIFICATE'),
(10, 'ANNUAL HYDRAULIC HOSE TEST CERTIFICATE');

-- --------------------------------------------------------

--
-- Table structure for table `mep_violation_marpol_equipment`
--

CREATE TABLE `mep_violation_marpol_equipment` (
  `id` int(11) NOT NULL,
  `mep_violation_marpol_equipment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mep_violation_marpol_equipment`
--

INSERT INTO `mep_violation_marpol_equipment` (`id`, `mep_violation_marpol_equipment`) VALUES
(1, 'WOODEN SCUPPER PLUGS AND VARIOUS SIZES OF WOODEN PLUGS (HPCG MC 01-2005 DATED 07 OCT 2005)\r\n'),
(2, 'ADEQUATE QUANTITY OF RAGS (3KLS MINIMUM) AND SORBENT MATERIALS (HPCG MC 01-2005 DATED 07 OCT 2005)\r\n'),
(3, 'OWS FOR VESSELS 400GT AND ABOVE (HPCG MC 01/05-2005 DATED 07/17 OCT 2005)\r\n'),
(4, 'OPEN-ENDED DRUMS WITH ADEQUATE COVERS (MINIMUM OF FIVE (5) DRUMS)\r\n'),
(5, 'MINIMUM OF ONE (1) DRUM (210 LTRS) OF DISPERSANT AND SPRAYER DULY ACCREDITED BY PCG FOR SELF PROPELLED BARGE/TANKERS AND VESSELS TOWING DUMB BARGE CONTAINING OIL OPERATING IN SEA WATER (HPCG MC 01-2005 DATED 07 OCT 2005)\r\n'),
(6, 'COMPLETE SET OF OIL CONTAINMENT AND RECOVERY EQUIPMENT FOR VESSELS ENGAGED IN BLACK PRODUCT AND PERSISTENT OIL (HPCG MC 01-2005 DATED 07 OCT 2005)\r\n'),
(7, 'SEWAGE TREATMENT PLANT/HOLDING TANK FOR THE COLLECTION AND STORAGE OF SEWAGE (HPCG MC 07-2005 DATED 03 NOV 2005)\r\n'),
(8, 'ADEQUATE COLOR CODED GARBAGE RECEPTACLE ON BOARD (HPCG MC 07-15 DATED 19 DEC 2014)\r\n'),
(9, 'GARBAGE DISPOSAL REGULATIOM PLACARD SHALL BE PERMANENTLY POSTED ON BOARD IN A CONSPICOUS PLACE (HPCG MC 07-15 DATED 19 DEC 2014\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `noted_deficiency`
--

CREATE TABLE `noted_deficiency` (
  `id` int(11) NOT NULL,
  `noted_deficiency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oil_type`
--

INSERT INTO `oil_type` (`id`, `oil_type`) VALUES
(1, 'HEAVY OIL'),
(2, 'CRUDE OIL'),
(3, 'BUNKER FUEL'),
(4, 'DIESEL'),
(5, 'GASOLINE'),
(6, 'HAZARDOUS AND NOXIOUS SUBSTANCES (HNS) ');

-- --------------------------------------------------------

--
-- Table structure for table `panelling_conducted_facilities`
--

CREATE TABLE `panelling_conducted_facilities` (
  `id` int(11) NOT NULL,
  `panelling_conducted_facilities` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pd_no_532`
--

INSERT INTO `pd_no_532` (`id`, `section`) VALUES
(1, 'SECTION 3 (PARAGRAPH A) PIRACY'),
(2, 'SECTION 3 (PARAGRAPH B) HIGHWAY ROBBERY/BRIGANDAGE'),
(3, 'SECTION 4. AIDING PIRATES OR HIGHWAY ROBBERS/BRIGANDS OR ABETTING PIRACY OR HIGHWAY ROBBERY/BRIGANDAGE ');

-- --------------------------------------------------------

--
-- Table structure for table `pd_no_705`
--

CREATE TABLE `pd_no_705` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 'SECTION 78. PAYMENT, COLLECTION AND REMITTANCE OF FOREST CHARGES'),
(12, 'SECTION 79. SALE OF WOOD PRODUCTS ');

-- --------------------------------------------------------

--
-- Table structure for table `pre_emptive_evacuation_activity`
--

CREATE TABLE `pre_emptive_evacuation_activity` (
  `id` int(11) NOT NULL,
  `pre_emptive_evacuation_activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_6539`
--

INSERT INTO `ra_6539` (`id`, `section`) VALUES
(1, 'SECTION 12. DEFACING OR TAMPERING WITH SERIAL NUMBERS OF MOTOR VEHICLE ENGINES, ENGINE BLOCKS AND CHASSIS.'),
(2, 'SECTION 13. PENAL PROVISIONS ');

-- --------------------------------------------------------

--
-- Table structure for table `ra_9147`
--

CREATE TABLE `ra_9147` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_9165`
--

INSERT INTO `ra_9165` (`id`, `section`) VALUES
(1, 'SECTION 4. IMPORTATION OF DANGEROUS DRUGS AND/OR CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(2, 'SECTION 5. SALE, TRADING, ADMINISTRATION, DISPENSATION, DELIVERY, DISTRIBUTION AND TRANSPORTATION OF DANGEROUS DRUGS AND/OR CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(3, 'SECTION 6. MAINTENANCE OF A DEN, DIVE OR RESORT'),
(4, 'SECTION 7. EMPLOYEES AND VISITORS OF A DEN, DIVE OR RESORT'),
(5, 'SECTION 8. MANUFACTURE OF DANGEROUS DRUGS AND/OR CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(6, 'SECTION 9. ILLEGAL CHEMICAL DIVERSION OF CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(7, 'SECTION 10. MANUFACTURE OR DELIVERY OF EQUIPMENT, INSTRUMENT, APPARATUS, AND OTHER PARAPHERNALIA FOR DANGEROUS DRUGS AND/OR CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(8, 'SECTION 11. POSSESSION OF DANGEROUS DRUGS'),
(9, 'SECTION 12. POSSESSION OF EQUIPMENT, INSTRUMENT, APPARATUS AND OTHER PARAPHERNALIA FOR DANGEROUS DRUGS'),
(10, 'SECTION 13. POSSESSION OF DANGEROUS DRUGS DURING PARTIES, SOCIAL GATHERINGS OR MEETINGS'),
(11, 'SECTION 14. POSSESSION OF EQUIPMENT, INSTRUMENT, APPARATUS AND OTHER PARAPHERNALIA FOR DANGEROUS DRUGS DURING PARTIES, SOCIAL GATHERINGS OR MEETINGS'),
(12, 'SECTION 15. USE OF DANGEROUS DRUGS'),
(13, 'SECTION 16. CULTIVATION OR CULTURE OF PLANTS CLASSIFIED AS DANGEROUS DRUGS OR ARE SOURCES THEREOF'),
(14, 'SECTION 17. MAINTENANCE AND KEEPING OF ORIGINAL RECORDS OF TRANSACTIONS ON DANGEROUS DRUGS AND/OR CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS'),
(15, 'SECTION 18. UNNECESSARY PRESCRIPTION OF DANGEROUS DRUGS.'),
(16, 'SECTION 19. UNLAWFUL PRESCRIPTION OF DANGEROUS DRUGS'),
(17, 'SECTION 20. CONFISCATION AND FORFEITURE OF THE PROCEEDS OR INSTRUMENTS OF THE UNLAWFUL ACT, INCLUDING THE PROPERTIES OR PROCEEDS DERIVED FROM THE ILLEGAL TRAFFICKING OF DANGEROUS DRUGS AND/OR PRECURSORS AND ESSENTIAL CHEMICALS'),
(18, 'SECTION 21. CUSTODY AND DISPOSITION OF CONFISCATED, SEIZED, AND/OR SURRENDERED DANGEROUS DRUGS, PLANT SOURCES OF DANGEROUS DRUGS, CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS, INSTRUMENTS/PARAPHERNALIA AND/OR LABORATORY EQUIPMENT.'),
(19, 'SECTION 22. GRANT OF COMPENSATION, REWARD AND AWARD'),
(20, 'SECTION 23. PLEA-BARGAINING PROVISION'),
(21, 'SECTION 24. NON-APPLICABILITY OF THE PROBATION LAW FOR DRUG TRAFFICKERS AND PUSHERS'),
(22, 'SECTION 25. QUALIFYING AGGRAVATING CIRCUMSTANCES IN THE COMMISSION OF A CRIME BY AN OFFENDER UNDER THE INFLUENCE OF DANGEROUS DRUGS'),
(23, 'SECTION 26. ATTEMPT OR CONSPIRACY'),
(24, 'SECTION 27. CRIMINAL LIABILITY OF A PUBLIC OFFICER OR EMPLOYEE FOR MISAPPROPRIATION, MISAPPLICATION OR FAILURE TO ACCOUNT FOR THE CONFISCATED, SEIZED AND/OR SURRENDERED DANGEROUS DRUGS, PLANT SOURCES OF DANGEROUS DRUGS, CONTROLLED PRECURSORS AND ESSENTIAL CHEMICALS, INSTRUMENTS/PARAPHERNALIA AND/OR LABORATORY EQUIPMENT INCLUDING THE PROCEEDS OR PROPERTIES OBTAINED FROM THE UNLAWFUL ACT COMMITTED'),
(25, 'SECTION 28. CRIMINAL LIABILITY OF GOVERNMENT OFFICIALS AND EMPLOYEES');

-- --------------------------------------------------------

--
-- Table structure for table `ra_9208`
--

CREATE TABLE `ra_9208` (
  `id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_9208`
--

INSERT INTO `ra_9208` (`id`, `section`) VALUES
(1, 'SECTION 4. ACTS OF TRAFFICKING IN PERSONS'),
(2, 'SECTION 5. ACTS THAT PROMOTE TRAFFICKING IN PERSONS'),
(3, 'SECTION 6. QUALIFIED TRAFFICKING IN PERSONS'),
(4, 'SECTION 11. USE OF TRAFFICKED PERSONS ');

-- --------------------------------------------------------

--
-- Table structure for table `ra_10066`
--

CREATE TABLE `ra_10066` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_10066`
--

INSERT INTO `ra_10066` (`id`, `section`) VALUES
(1, 'SECTION 48. (PARAGRAPH A) DESTROYS, DEMOLISHES, MUTILATES OR DAMAGES ANY WORLD HERITAGE SITE, NATIONAL CULTURAL TREASURES, IMPORTANT CULTURAL PROPERTY AND ARCHAEOLOGICAL AND ANTHROPOLOGICAL SITES;'),
(2, 'SECTION 48. (PARAGRAPH B) MODIFIES, ALTERS, OR DESTROYS THE ORIGINAL FEATURES OF OR UNDERTAKES CONSTRUCTION OR REAL ESTATE DEVELOPMENT IN ANY NATIONAL SHRINE, MONUMENT, LANDMARK AND OTHER HISTORIC EDIFICES AND STRUCTURES, DECLARED, CLASSIFIED, AND MARKED BY THE NATIONAL HISTORICAL INSTITUTE AS SUCH, WITHOUT THE PRIOR WRITTEN PERMISSION FROM THE COMMISSION. THIS INCLUDES THE DESIGNATED SECURITY OR BUFFER ZONE, EXTENDING FIVE (5) METERS FROM THE VISIBLE PERIMETER OF THE MONUMENT OR SITE;'),
(3, 'SECTION 48. (PARAGRAPH C) EXPLORES, EXCAVATES OR UNDERTAKES DIGGINGS FOR THE PURPOSE OF OBTAINING MATERIALS OF CULTURAL HISTORICAL VALUE WITHOUT PRIOR WRITTEN AUTHORITY FROM THE NATIONAL MUSEUM. NO EXCAVATION OR DIGGINGS SHALL BE PERMITTED WITHOUT THE SUPERVISION OF A CERTIFIED ARCHAEOLOGIST;'),
(4, 'SECTION 48. (PARAGRAPH D) APPROPRIATES EXCAVATION FINDS CONTRARY TO THE PROVISIONS OF THE NEW CIVIL CODE AND OTHER PERTINENT LAWS;'),
(5, 'SECTION 48. (PARAGRAPH E) IMPORTS, SELLS, DISTRIBUTES, PROCURES, ACQUIRES, OR EXPORTS CULTURAL PROPERTY STOLEN, OR OTHERWISE LOST AGAINST THE WILL OF THE LAWFUL OWNER;'),
(6, 'SECTION 48. (PARAGRAPH F) ILLICITLY EXPORTS CULTURAL PROPERTY LISTED IN THE PHILIPPINE REGISTRY OF CULTURAL PROPERTY OR THOSE THAT MAY BE CATEGORIZED AS SUCH UPON VISITATION OR INCORRECTLY DECLARES THE SAME DURING TRANSIT; AND'),
(7, 'SECTION 48. (PARAGRAPH G) DEALS IN CULTURAL PROPERTY WITHOUT PROPER REGISTRATION AND LICENSE ISSUED BY THE CULTURAL AGENCY CONCERNED ');

-- --------------------------------------------------------

--
-- Table structure for table `ra_10591`
--

CREATE TABLE `ra_10591` (
  `id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_10591`
--

INSERT INTO `ra_10591` (`id`, `section`) VALUES
(1, 'SECTION 38. LIABILITY FOR PLANTING EVIDENCE'),
(2, 'SECTION 38. LIABILITY FOR PLANTING EVIDENCE'),
(3, 'SECTION 29. USE OF LOOSE FIREARM IN THE COMMISSION OF A CRIME'),
(4, 'SECTION 30. LIABILITY OF JURIDICAL PERSON'),
(5, 'SECTION 31. ABSENCE OF PERMIT TO CARRY OUTSIDE OF RESIDENCE'),
(6, 'SECTION 32. UNLAWFUL MANUFACTURE, IMPORTATION, SALE OR DISPOSITION OF FIREARMS OR AMMUNITION OR PART'),
(7, 'SECTION 33. ARMS SMUGGLING'),
(8, 'SECTION 34. TAMPERING, OBLITERATION OR ALTERATION OF FIREARMS IDENTIFICATION'),
(9, 'SECTION 35. USE OF AN IMITATION FIREARM'),
(10, 'SECTION 40. FAILURE TO NOTIFY LOST OR STOLEN FIREARM OR LIGHT WEAPON'),
(11, 'SECTION 41. ILLEGAL TRANSFER/REGISTRATION OF FIREARMS '),
(12, 'SECTION 38. LIABILITY FOR PLANTING EVIDENCE');

-- --------------------------------------------------------

--
-- Table structure for table `ra_10654`
--

CREATE TABLE `ra_10654` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_10654`
--

INSERT INTO `ra_10654` (`id`, `section`) VALUES
(1, 'SECTION 86. UNAUTHORIZED FISHING'),
(2, 'SECTION 87. ENGAGING IN UNAUTHORIZED FISHERIES ACTIVITIES'),
(3, 'SECTION 88. FAILURE TO SECURE FISHING PERMIT PRIOR TO ENGAGING IN DISTANT WATER FISHING'),
(4, 'SECTION 89. UNREPORTED FISHING'),
(5, 'SECTION 90. UNREGULATED FISHING'),
(6, 'SECTION 91. POACHING IN PHILIPPINE WATERS'),
(7, 'SECTION 92. FISHING THROUGH EXPLOSIVES, NOXIOUS OR POISONOUS SUBSTANCE, OR ELECTRICITY'),
(8, 'SECTION 93. USE OF FINE MESH NET'),
(9, 'SECTION 94. FISHING IN OVEREXPLOITED FISHERY MANAGEMENT AREAS'),
(10, 'SECTION 95. USE OF ACTIVE GEAR IN MUNICIPAL WATERS, BAYS AND OTHER FISHERY MANAGEMENT AREAS'),
(11, 'SECTION 96. BAN ON CORAL EXPLOITATION AND EXPORTATION'),
(12, 'SECTION 97. BAN ON MURO-AMI, OTHER METHODS AND GEAR DESTRUCTIVE TO CORAL REEFS AND OTHER MARINE HABITAT'),
(13, 'SECTION 98. ILLEGAL USE OF SUPERLIGHTS OR FISHING LIGHT ATTRACTOR'),
(14, 'SECTION 99. CONVERSION OF MANGROVES'),
(15, 'SECTION 100. FISHING DURING CLOSED SEASON'),
(16, 'SECTION 101. FISHING IN MARINE PROTECTED AREAS, FISHERY RESERVES, REFUGE AND SANCTUARIES'),
(17, 'Section 102. Fishing or Taking of Rare, Threatened or Endangered Species'),
(18, 'Section 103. Capture of Sabalo and Other Breeders/'),
(19, 'SECTION 104. EXPORTATION OF BREEDERS, SPAWNERS, EGGS OR FRY'),
(20, 'SECTION 105. IMPORTATION OR EXPORTATION OF FISH OR FISHERY SPECIES'),
(21, 'SECTION 106. VIOLATION OF HARVEST CONTROL RULES'),
(22, 'SECTION 107. AQUATIC POLLUTION'),
(23, 'SECTION 108. FAILURE TO COMPLY WITH MINIMUM SAFETY STANDARDS'),
(24, 'SECTION 109. FAILURE TO SUBMIT A YEARLY REPORT ON ALL FISHPONDS, FISH PENS AND FISH CAGES'),
(25, 'SECTION 110. GATHERING AND MARKETING OF SHELL FISHES OR OTHER AQUATIC SPECIES'),
(26, 'SECTION 111. OBSTRUCTION TO NAVIGATION OR FLOW OR EBB OF TIDE IN ANY STREAM, RIVER, LAKE OR BAY'),
(27, 'SECTION 112. NONCOMPLIANCE WITH GOOD AQUACULTURE PRACTICES'),
(28, 'SECTION 113. COMMERCIAL FISHING VESSEL OPERATORS EMPLOYING UNLICENSED FISHERFOLK, FISHWORKER OR CREW'),
(29, 'SECTION 114. OBSTRUCTION OF DEFINED MIGRATION PATHS'),
(30, 'SECTION 115. OBSTRUCTION TO FISHERY LAW ENFORCEMENT OFFICER'),
(31, 'SECTION 116. NONCOMPLIANCE WITH FISHERIES OBSERVER COVERAGE'),
(32, 'SECTION 117. NONCOMPLIANCE WITH PORT STATE MEASURES'),
(33, 'SECTION 118. FAILURE TO COMPLY WITH RULES AND REGULATIONS ON CONSERVATION AND MANAGEMENT MEASURES'),
(34, 'SECTION 119. NONCOMPLIANCE WITH VESSEL MONITORING MEASURES.'),
(35, 'SECTION 120. CONSTRUCTING, IMPORTING OR CONVERTING FISHING VESSELS OR GEARS WITHOUT PERMIT FROM THE DEPARTMENT'),
(36, 'SECTION 121. USE OF UNLICENSED GEAR'),
(37, 'SECTION 122. FALSIFYING, CONCEALING OR TAMPERING WITH VESSEL MARKINGS, IDENTITY OR REGISTRATION'),
(38, 'SECTION 123. CONCEALING, TAMPERING OR DISPOSING OF EVIDENCE RELATING TO AN INVESTIGATION OF A VIOLATION'),
(39, 'SECTION 124. NONCOMPLIANCE WITH THE REQUIREMENTS FOR THE INTRODUCTION OF FOREIGN OR EXOTIC AQUATIC SPECIES'),
(40, 'SECTION 125. FAILURE TO COMPLY WITH STANDARDS AND TRADE-RELATED MEASURES'),
(41, 'SECTION 126. POSSESSING, DEALING IN OR DISPOSING ILLEGALLY CAUGHT OR TAKEN FISH.'),
(42, 'SECTION 127. UNAUTHORIZED DISCLOSURE OF SENSITIVE TECHNICAL INFORMATION.'),
(43, 'SECTION 128. OTHER VIOLATIONS');

-- --------------------------------------------------------

--
-- Table structure for table `ra_10845`
--

CREATE TABLE `ra_10845` (
  `id` int(11) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ra_10845`
--

INSERT INTO `ra_10845` (`id`, `section`) VALUES
(1, 'SECTION 3. (PARAGRAPH A) IMPORTING OR BRINGING INTO THE PHILIPPINES WITHOUT THE REQUIRED IMPORT PERMIT FROM THE REGULATORY AGENCIES;'),
(2, 'SECTION 3. (PARAGRAPH B) USING IMPORT PERMITS OF PERSONS, NATURAL OR JURIDICAL, OTHER THAN THOSE SPECIFICALLY NAMED IN THE PERMIT;'),
(3, 'SECTION 3. (PARAGRAPH C) USING FAKE, FICTITIOUS OR FRAUDULENT IMPORT PERMITS OR SHIPPING DOCUMENTS;'),
(4, 'SECTION 3. (PARAGRAPH D) SELLING, LENDING, LEASING, ASSIGNING, CONSENTING OR ALLOWING THE USE OF IMPORT PERMITS OF CORPORATIONS, NONGOVERNMENT ORGANIZATIONS, ASSOCIATIONS, COOPERATIVES, OR SINGLE PROPRIETORSHIPS BY OTHER PERSONS;'),
(5, 'SECTION 3. (PARAGRAPH E) MISCLASSIFICATION, UNDERVALUATION OR MISDECLARATION UPON THE FILING OF IMPORT ENTRY AND REVENUE DECLARATION WITH THE BOC IN ORDER TO EVADE THE PAYMENT OF RIGHTFUL TAXES AND DUTIES DUE TO THE GOVERNMENT;'),
(6, 'SECTION 3. (PARAGRAPH F) ORGANIZING OR USING DUMMY CORPORATIONS, NONGOVERNMENT ORGANIZATIONS, ASSOCIATIONS, COOPERATIVES, OR SINGLE PROPRIETORSHIPS FOR THE PURPOSE OF ACQUIRING IMPORT PERMITS;'),
(7, 'SECTION 3. (PARAGRAPH G)  TRANSPORTING OR STORING THE AGRICULTURAL PRODUCT SUBJECT TO ECONOMIC SABOTAGE REGARDLESS OF QUANTITY; OR'),
(8, 'SECTION 3. (PARAGRAPH H) ACTING AS BROKER OF THE VIOLATING IMPORTER ');

-- --------------------------------------------------------

--
-- Table structure for table `recration_watercraft`
--

CREATE TABLE `recration_watercraft` (
  `id` int(11) NOT NULL,
  `recration_watercraft` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recration_watercraft`
--

INSERT INTO `recration_watercraft` (`id`, `recration_watercraft`) VALUES
(1, 'PERSONAL WATERCRAFT(PWC)'),
(2, 'BANANA BOAT'),
(3, 'DRAGON BOAT'),
(4, 'KAYAK BOAT'),
(5, 'MOTOR BOAT'),
(6, 'HELMS-POWERED'),
(7, 'PARASAIL');

-- --------------------------------------------------------

--
-- Table structure for table `recreational_violation`
--

CREATE TABLE `recreational_violation` (
  `id` int(11) NOT NULL,
  `recreational_violation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recreational_violation`
--

INSERT INTO `recreational_violation` (`id`, `recreational_violation`) VALUES
(1, 'BOATING OUTSIDE THE DESIGNATED SAILING AREAS'),
(2, 'BOATING WITHOUT WEARING OF PERSONAL FLOATATION DEVICES OR LIFEJACKETS'),
(3, 'OPERATING WITH LACK OF SAFETY EQUIPMENT');

-- --------------------------------------------------------

--
-- Table structure for table `related_international_conventions_noted_deficiency`
--

CREATE TABLE `related_international_conventions_noted_deficiency` (
  `id` int(11) NOT NULL,
  `related_international_conventions_noted_deficiency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `related_international_conventions_noted_deficiency`
--

INSERT INTO `related_international_conventions_noted_deficiency` (`id`, `related_international_conventions_noted_deficiency`) VALUES
(1, 'SOLAS'),
(2, 'MARPOL'),
(3, 'STCW'),
(4, 'LOADLINE'),
(5, 'TONNAGE'),
(6, 'MLC'),
(7, 'BALLAST WATER MANAGEMENT CONVENTION'),
(8, 'ANTI FOULING SYSTEM'),
(9, 'COLREG'),
(10, 'ISM CODE'),
(11, 'ISPS CODE');

-- --------------------------------------------------------

--
-- Table structure for table `report_selection`
--

CREATE TABLE `report_selection` (
  `report_selection_id` int(11) NOT NULL,
  `report_selection` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_selection`
--

INSERT INTO `report_selection` (`report_selection_id`, `report_selection`) VALUES
(1, 'COASTAL CLEAN-UP'),
(2, 'MANGROVE PLANTING'),
(3, 'TREE PLANTING'),
(4, 'VESSEL INSPECTION'),
(5, 'LAND BASE INSPECTION'),
(6, 'TRAININGS CONDUCTED'),
(7, 'MARITIME INCIDENT');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `id` int(11) NOT NULL,
  `report_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`id`, `report_type`) VALUES
(1, 'PRE-DEPARTURE INSPECTION (PDI)'),
(2, 'VESSEL SAFETY ENFORCEMENT INSPECTION (VSEI)'),
(3, 'EMERGENCY READINESS EVALUATION (ERE)'),
(4, 'PORT STATE CONTROL (PSC)'),
(5, 'COASTAL AND BEACH RESORT SAFETY AND SECURITY INSPECTION'),
(6, 'RECREATIONAL SAFETY ENFORCEMENT INSPECTION (RSEI)'),
(7, 'AIDS TO NAVIGATION (ATON) INSPECTION'),
(8, 'MARITIME CASUALTY INVESTIGATION (MCI)'),
(9, 'SALVAGE OPERATION'),
(10, 'MARINE PARADES, REGATTAS AND MARITIME RELATED ACTIVITY');

-- --------------------------------------------------------

--
-- Table structure for table `responding_unit`
--

CREATE TABLE `responding_unit` (
  `id` int(11) NOT NULL,
  `responding_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responding_unit`
--

INSERT INTO `responding_unit` (`id`, `responding_unit`) VALUES
(1, 'SPILLER'),
(2, 'MEP FORCE'),
(3, 'PCG UNITS'),
(4, 'CREDITED SALVOR'),
(5, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `salvage_operation_purpose`
--

CREATE TABLE `salvage_operation_purpose` (
  `id` int(11) NOT NULL,
  `salvage_operation_purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salvage_operation_purpose`
--

INSERT INTO `salvage_operation_purpose` (`id`, `salvage_operation_purpose`) VALUES
(1, 'HAZARDS TO MARITIME NAVIGATION, ESPECIALY THOSE WHICH OBSTRUCT THE SEALANES'),
(2, 'HAMPER THE DEVELOPMENT OF PORTS AND HARBOR'),
(3, 'EMERGENCY CONDITIONS FOR THE SAFETY AND PROPERTY AT SEA'),
(4, 'FOR THE VALUE OF CARGO');

-- --------------------------------------------------------

--
-- Table structure for table `seaborne_patrol_activity_conduct`
--

CREATE TABLE `seaborne_patrol_activity_conduct` (
  `id` int(11) NOT NULL,
  `seaborne_patrol_activity_conduct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seaborne_patrol_activity_conduct`
--

INSERT INTO `seaborne_patrol_activity_conduct` (`id`, `seaborne_patrol_activity_conduct`) VALUES
(1, 'INITIATED'),
(2, 'JOINT (LGU AND OTHER LAW ENFORCEMENT AGENCY)'),
(3, 'PARTICIPATED');

-- --------------------------------------------------------

--
-- Table structure for table `spiller`
--

CREATE TABLE `spiller` (
  `id` int(11) NOT NULL,
  `spiller` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spiller`
--

INSERT INTO `spiller` (`id`, `spiller`) VALUES
(1, 'VESSEL'),
(2, 'LANDBASED FACILITY');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL,
  `station` varchar(100) NOT NULL,
  `station_contact` varchar(100) DEFAULT NULL,
  `station_email` varchar(100) DEFAULT NULL,
  `station_address` text DEFAULT NULL,
  `station_logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station`, `station_contact`, `station_email`, `station_address`, `station_logo`) VALUES
(1, 'CGS CAMIGUIN', NULL, NULL, NULL, NULL),
(2, 'CGS LANAO DEL NORTE', NULL, NULL, NULL, NULL),
(3, 'CGS MISAMIS OCCIDENTAL', NULL, NULL, NULL, NULL),
(5, 'CGS WMISOR', '09187112668', 'ronil.cajan@gmail.com', 'PUROK 3\r\nLOOC PROPER', '35e90eac30d5fed0736ee9597a6551c3.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_station`
--

CREATE TABLE `sub_station` (
  `sub_station_id` int(11) NOT NULL,
  `sub_station` varchar(100) NOT NULL,
  `station_id` int(11) NOT NULL,
  `substation_contact` varchar(20) DEFAULT NULL,
  `substation_email` varchar(100) DEFAULT NULL,
  `substation_address` text DEFAULT NULL,
  `substation_logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_station`
--

INSERT INTO `sub_station` (`sub_station_id`, `sub_station`, `station_id`, `substation_contact`, `substation_email`, `substation_address`, `substation_logo`) VALUES
(1, 'CGSS MAHINOG', 1, NULL, NULL, NULL, NULL),
(2, 'CGSS MAMBAJAO', 1, NULL, NULL, NULL, NULL),
(3, 'CGSS KAUSWAGAN', 2, NULL, NULL, NULL, NULL),
(4, 'CGSS KOLAMBUGAN', 2, NULL, NULL, NULL, NULL),
(5, 'CGSS TUBOD', 2, NULL, NULL, NULL, NULL),
(6, 'CGSS JIMENEZ', 3, NULL, NULL, NULL, NULL),
(7, 'CGS OROQUIETA', 3, '09187112668', 'ronil.cajan@gmail.com', 'PUROK 3\r\nLOOC PROPER', '8b5d42a8e6da3b4ff82ca52d7a838c66.png'),
(8, 'CGSS OZAMIS', 3, NULL, NULL, NULL, NULL),
(9, 'CGSS PLARIDEL', 3, NULL, NULL, NULL, NULL),
(10, 'CGSS BALINGASAG', 4, NULL, NULL, NULL, NULL),
(11, 'CGSS BALINGOAN', 4, NULL, NULL, NULL, NULL),
(12, 'CGSS GINGOOG', 4, NULL, NULL, NULL, NULL),
(13, 'CGSS MEDINA', 4, NULL, NULL, NULL, NULL),
(14, 'CGSS TALISAYAN', 4, NULL, NULL, NULL, NULL),
(15, 'CGSS CAGAYAN DE ORO', 5, NULL, NULL, NULL, NULL),
(16, 'CGSS EL SALVADOR', 5, NULL, NULL, NULL, NULL),
(17, 'CGSS JASAAN', 5, NULL, NULL, NULL, NULL),
(18, 'CGSS LAGUINDINGAN', 5, NULL, NULL, NULL, NULL),
(19, 'CGSS LUGAIT', 5, NULL, NULL, NULL, NULL),
(20, 'CGSS NAAWAN', 5, NULL, NULL, NULL, NULL),
(21, 'CGSS OPOL', 5, NULL, NULL, NULL, NULL),
(22, 'CGSS TAGOLOAN', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `system_name2` varchar(50) DEFAULT NULL,
  `system_logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `system_name`, `system_name2`, `system_logo`) VALUES
(1, 'eTanaw Monitoring System', 'PCG-DOTR', 'ee833dcecaba44b0fab57d5cae03cf6c.png');

-- --------------------------------------------------------

--
-- Table structure for table `tier_level`
--

CREATE TABLE `tier_level` (
  `id` int(11) NOT NULL,
  `tier_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tier_level`
--

INSERT INTO `tier_level` (`id`, `tier_level`) VALUES
(1, 'TIER 1'),
(2, 'TIER 2'),
(3, 'TIER 3');

-- --------------------------------------------------------

--
-- Table structure for table `time_assets_deployment`
--

CREATE TABLE `time_assets_deployment` (
  `id` int(11) NOT NULL,
  `time_assets_deployment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_assets_deployment`
--

INSERT INTO `time_assets_deployment` (`id`, `time_assets_deployment`) VALUES
(1, '15 MINUTES'),
(2, '30 MINUTES'),
(3, '1 HOUR'),
(4, '2 HOURS'),
(5, 'MORE THAN 3 HOURS ');

-- --------------------------------------------------------

--
-- Table structure for table `training_type`
--

CREATE TABLE `training_type` (
  `id` int(11) NOT NULL,
  `training_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_type`
--

INSERT INTO `training_type` (`id`, `training_type`) VALUES
(1, 'OIL SPILL RESPONSE AWARENESS AND EMERGENCY TRAINING'),
(2, 'BASIC MAREP'),
(3, 'GUEST INSTRUCTOR'),
(5, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `urban_marsar`
--

CREATE TABLE `urban_marsar` (
  `id` int(11) NOT NULL,
  `station` int(11) DEFAULT NULL,
  `sub_station` int(11) DEFAULT NULL,
  `urban_rescue_type` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `incident_details` varchar(100) DEFAULT NULL,
  `incident_barangay_name` varchar(100) DEFAULT NULL,
  `incident_map_location` varchar(100) DEFAULT NULL,
  `information_acquired_thru` varchar(100) DEFAULT NULL,
  `time_assets_deployment` varchar(100) DEFAULT NULL,
  `asset_mobility_deployed_type` varchar(100) DEFAULT NULL,
  `number_rescued_person` int(11) DEFAULT NULL,
  `number_injured_person` int(11) DEFAULT NULL,
  `number_casualties` int(11) DEFAULT NULL,
  `number_missing_person` int(11) DEFAULT NULL,
  `number_rescuers_deployed` int(11) DEFAULT NULL,
  `drowning_victim_name` varchar(100) DEFAULT NULL,
  `drowning_victim_gender` varchar(11) DEFAULT NULL,
  `first_responder` varchar(100) DEFAULT NULL,
  `drowning_victim_age` varchar(100) DEFAULT NULL,
  `drowning_victim_number` varchar(100) DEFAULT NULL,
  `response_barangay_name` varchar(100) DEFAULT NULL,
  `drowning_cause` varchar(100) DEFAULT NULL,
  `drowning_incident_location` varchar(100) DEFAULT NULL,
  `drowning_action_taken` varchar(100) DEFAULT NULL,
  `retrieval_victim_name` varchar(100) DEFAULT NULL,
  `retrieval_victim_gender` varchar(100) DEFAULT NULL,
  `body_built` int(100) DEFAULT NULL,
  `adistinct_feature` varchar(100) DEFAULT NULL,
  `cadaver_location` int(11) DEFAULT NULL,
  `cadaver_approximate_age` varchar(100) DEFAULT NULL,
  `exact_cadaver_location` varchar(100) DEFAULT NULL,
  `retrieval_barangay_name` varchar(100) DEFAULT NULL,
  `cadaver_discovered_number` varchar(100) DEFAULT NULL,
  `retrieval_operation_length` varchar(11) DEFAULT NULL,
  `time_person_reported_missing` varchar(100) DEFAULT NULL,
  `retrieval_last_location` varchar(100) DEFAULT NULL,
  `retrieval_action_taken` varchar(100) DEFAULT NULL,
  `storm_surge_victim_name` varchar(100) DEFAULT NULL,
  `weather_forecast` int(11) DEFAULT NULL,
  `storm_surge_injured_person_number` varchar(100) DEFAULT NULL,
  `storm_surge_casualty_number` varchar(100) DEFAULT NULL,
  `storm_surge_rescue_number` varchar(100) DEFAULT NULL,
  `storm_surge_action_taken` varchar(100) DEFAULT NULL,
  `earthquake_barangay_name` varchar(100) DEFAULT NULL,
  `earthquake_location` int(11) DEFAULT NULL,
  `earthquake_cause` int(11) DEFAULT NULL,
  `earthquake_magnitude_level` varchar(100) DEFAULT NULL,
  `earthquake_action_taken` varchar(100) DEFAULT NULL,
  `lanslide_casualty_number` varchar(100) DEFAULT NULL,
  `lanslide_affected_area` varchar(100) DEFAULT NULL,
  `landslide_rescued_adult_male_number` varchar(100) DEFAULT NULL,
  `landslide_rescued_children_number` varchar(100) DEFAULT NULL,
  `landslide_rescued_adult_female_number` varchar(100) DEFAULT NULL,
  `landslide_rescued_18y_below_female_number` varchar(100) DEFAULT NULL,
  `lanslide_location` varchar(100) DEFAULT NULL,
  `fire_incident_barangay_name` varchar(100) DEFAULT NULL,
  `fire_incident_location` varchar(100) DEFAULT NULL,
  `fire_incident_cause` varchar(100) DEFAULT NULL,
  `fire_incident_cost` varchar(100) DEFAULT NULL,
  `fire_incident_acton_taken` varchar(100) DEFAULT NULL,
  `pre_emptive_evacuation_activity` varchar(100) NOT NULL,
  `pre_emptive_evacuation_date` datetime NOT NULL,
  `evacuation_center_location` varchar(100) DEFAULT NULL,
  `pre_emptive_evacuation_coordination_with` varchar(100) DEFAULT NULL,
  `spot_report` varchar(100) DEFAULT NULL,
  `photographs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urban_marsar`
--

INSERT INTO `urban_marsar` (`id`, `station`, `sub_station`, `urban_rescue_type`, `date_created`, `incident_details`, `incident_barangay_name`, `incident_map_location`, `information_acquired_thru`, `time_assets_deployment`, `asset_mobility_deployed_type`, `number_rescued_person`, `number_injured_person`, `number_casualties`, `number_missing_person`, `number_rescuers_deployed`, `drowning_victim_name`, `drowning_victim_gender`, `first_responder`, `drowning_victim_age`, `drowning_victim_number`, `response_barangay_name`, `drowning_cause`, `drowning_incident_location`, `drowning_action_taken`, `retrieval_victim_name`, `retrieval_victim_gender`, `body_built`, `adistinct_feature`, `cadaver_location`, `cadaver_approximate_age`, `exact_cadaver_location`, `retrieval_barangay_name`, `cadaver_discovered_number`, `retrieval_operation_length`, `time_person_reported_missing`, `retrieval_last_location`, `retrieval_action_taken`, `storm_surge_victim_name`, `weather_forecast`, `storm_surge_injured_person_number`, `storm_surge_casualty_number`, `storm_surge_rescue_number`, `storm_surge_action_taken`, `earthquake_barangay_name`, `earthquake_location`, `earthquake_cause`, `earthquake_magnitude_level`, `earthquake_action_taken`, `lanslide_casualty_number`, `lanslide_affected_area`, `landslide_rescued_adult_male_number`, `landslide_rescued_children_number`, `landslide_rescued_adult_female_number`, `landslide_rescued_18y_below_female_number`, `lanslide_location`, `fire_incident_barangay_name`, `fire_incident_location`, `fire_incident_cause`, `fire_incident_cost`, `fire_incident_acton_taken`, `pre_emptive_evacuation_activity`, `pre_emptive_evacuation_date`, `evacuation_center_location`, `pre_emptive_evacuation_coordination_with`, `spot_report`, `photographs`) VALUES
(1, 1, 1, '3', '2023-08-11 17:14:00', '21321321', '231', NULL, '2', '2', '1', 3213, 321, 3, 321, 321, 'dasdasd', 'MALE', 'dfsdfsfd', '2,5', '3', '231', '5,7', '4,6', 'dasdas', 'dasdsa', 'FEMALE', 1, 'fdsdfsfds', 1, '2', 'asd', 'sad', '1', 'MORE THAN O', '12 HOURS', 'das', 'dasd', 'dasd', 5, '3', '4', '3', 'dasdasd', '', 2, 1, '1,5', 'dasd', 'MORE THAN 20', '', NULL, NULL, NULL, NULL, 'dasd', 'dasd', '1', 'dasd', 'MORE THAN 300K', 'dasdas', '2', '2023-08-09 02:02:00', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urban_rescue_type`
--

CREATE TABLE `urban_rescue_type` (
  `id` int(11) NOT NULL,
  `urban_rescue_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urban_rescue_type`
--

INSERT INTO `urban_rescue_type` (`id`, `urban_rescue_type`) VALUES
(1, 'FLASHFLOODS'),
(2, 'RETRIEVAL OF CADAVER'),
(3, 'STORM SURGE'),
(4, 'EARTHQUAKE'),
(5, 'LANDSLIDE'),
(6, 'FIRE'),
(7, 'PRE-EMPTIVE EVACUATION'),
(8, 'DROWNING ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_picture` text NOT NULL,
  `role` int(11) NOT NULL,
  `station` int(11) DEFAULT NULL,
  `sub_station` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `date_registered`, `first_name`, `last_name`, `profile_picture`, `role`, `station`, `sub_station`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'asdfasdf@gma.com', '2022-10-26 07:50:40', 'John', 'Doe', '', 1, NULL, NULL),
(24, 'ronil.c32231ajan@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ronil.cajan321@gmail.com', '2023-02-02 21:08:34', 'RONIL', 'CAJAN', '', 4, 2, 5),
(25, 'roncajan', 'f3a1fdd22113e31ec7403c115e4b8303', 'roni23l.cajan@gmail.com', '2023-02-27 18:29:58', 'RONIL', 'CAJAN', '', 2, 5, NULL),
(26, 'manage', '70682896e24287b0476eff2a14c148f0', 'ronil.caja423n@gmail.com', '2023-02-27 18:30:22', 'RONIL', 'CAJAN', '', 3, 3, 7),
(27, 'staff', '1253208465b1efa876f982d8a9e73eef', 'ronil.c432342ajan@gmail.com', '2023-02-27 18:31:09', 'RONIL', 'CAJAN', '', 4, 5, 20),
(29, 'ronil', 'd587f39fa514a8b9b227a6bdba0aa86c', 'ronil.caj432an@gmail.com', '2023-02-27 20:34:34', 'RONIL', 'CAJAN', '79aa7be9e88f11dd9ec90bfbed769898.jpg', 2, 5, NULL),
(30, 'ronil.c321ajan@gmail.com', '003e9e7d4c60c284c683eae402170fcc', 'ronil.cajan@gmail.com', '2023-02-28 21:51:23', 'RONIL', 'CAJAN', 'b3df2bf994e5e731ee52301b675e2c03.png', 3, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `value`, `text`) VALUES
(1, 'super-admin', 'SUPER ADMIN'),
(2, 'admin', 'ADMIN'),
(3, 'manager', 'MANAGER'),
(4, 'staff', 'STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `very_serious_mc_category`
--

CREATE TABLE `very_serious_mc_category` (
  `id` int(11) NOT NULL,
  `very_serious_mc_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `very_serious_mc_category`
--

INSERT INTO `very_serious_mc_category` (`id`, `very_serious_mc_category`) VALUES
(1, 'CATEGORY 1 - INVOLVING CONVENTIONAL VESSEL OF 300 GT ABOVE WITH MULTIPLE DEATHS'),
(2, 'CATEGORY 2 - INVOLVING NON-CONVENTIONAL VESSEL OF LESS THAN 300 GT WITH 1 OR MORE DEATHS'),
(3, 'CATEGORY 3 - INVOLVING CONVENTIONAL VESSEL OF 300 GT WITH 1 DEATH');

-- --------------------------------------------------------

--
-- Table structure for table `vessel_age`
--

CREATE TABLE `vessel_age` (
  `id` int(11) NOT NULL,
  `vessel_age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vessel_age`
--

INSERT INTO `vessel_age` (`id`, `vessel_age`) VALUES
(1, '5 -10 YEARS'),
(2, '10-15 YEARS'),
(3, '15-20 YEARS '),
(4, 'MORE THAN 20 YEARS');

-- --------------------------------------------------------

--
-- Table structure for table `vessel_size`
--

CREATE TABLE `vessel_size` (
  `id` int(11) NOT NULL,
  `vessel_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vessel_size`
--

INSERT INTO `vessel_size` (`id`, `vessel_size`) VALUES
(1, 'LESS THAN 500GT'),
(2, '500 GT TO 1000 GT'),
(3, '1000 GT TO 2000 GT'),
(4, 'MORE THAN 2000 GT');

-- --------------------------------------------------------

--
-- Table structure for table `vessel_type`
--

CREATE TABLE `vessel_type` (
  `id` int(11) NOT NULL,
  `vessel_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vessel_type`
--

INSERT INTO `vessel_type` (`id`, `vessel_type`) VALUES
(1, 'PASSENGER VESSEL'),
(2, 'PASSENGER-CARGO VESSEL'),
(3, 'CARGO VESSEL'),
(4, 'TANKER'),
(5, 'LANDING CRAFT TANK (LCT) VESSEL'),
(6, 'TUGBOAT/BARGE'),
(7, 'TANKER (LPG)');

-- --------------------------------------------------------

--
-- Table structure for table `vessel_type_involved`
--

CREATE TABLE `vessel_type_involved` (
  `id` int(11) NOT NULL,
  `vessel_type_involved` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vessel_type_involved`
--

INSERT INTO `vessel_type_involved` (`id`, `vessel_type_involved`) VALUES
(1, 'PASSENGER/ CARGO VESSEL'),
(2, 'GENERAL CARGO VESSEL'),
(3, 'RORO VESSEL'),
(4, 'FISHING VESSEL'),
(5, 'WOODEN HULLED VESSEL 15 GT ABOVE'),
(6, 'WOODEN HULLED VESSEL 3GT BELOW'),
(7, 'SAILING VESSEL'),
(8, 'PLEASURE CRAFTS'),
(9, 'TANKER VESSELS'),
(10, 'LNG CARRIERS'),
(11, 'GOVERNMENT VESSEL'),
(12, 'WARSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `victim_age`
--

CREATE TABLE `victim_age` (
  `id` int(11) NOT NULL,
  `victim_age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victim_age`
--

INSERT INTO `victim_age` (`id`, `victim_age`) VALUES
(1, 'INFANT (0-1 YEAR)'),
(2, 'TODDLER (2-4 YEARS)'),
(3, 'CHILD (5-12 YEARS)'),
(4, 'TEEN (13-19 YEARS)'),
(5, 'ADULT (20-39 YEARS)'),
(6, 'MIDDLE AGE ADULT (40-59)'),
(7, 'SENIOR (MORE THAN 60)');

-- --------------------------------------------------------

--
-- Table structure for table `victim_number`
--

CREATE TABLE `victim_number` (
  `id` int(11) NOT NULL,
  `victim_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vsei_deficiency_code`
--

CREATE TABLE `vsei_deficiency_code` (
  `id` int(11) NOT NULL,
  `vsei_deficiency_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vsei_deficiency_code`
--

INSERT INTO `vsei_deficiency_code` (`id`, `vsei_deficiency_code`) VALUES
(1, 'VS8100 ABSENCE OF SHIPS CERTIFICATE AND DOCUMENT'),
(2, 'VS8200 ABSENCE OF CERTIFICATE AND WATCH KEEPING FOR SEAFARER'),
(3, 'VS8300 WHEELHOUSE/ DOCUMENTATION INSTRUMENTAL EQUIPMENT'),
(4, 'VS8400 CREW AND ACCOMODATION'),
(5, 'VS8500 FIRE FIGHTING APPLIANCES/FIRE SAFETY MEASURES'),
(6, 'VS8600 BOAT DECK/OPEN DECK/ACCOMODATION LIFE-SAVING APPLIANCES'),
(7, 'VS8700 NAVIGATIONAL SAFETY'),
(8, 'VS8800 WORKING SPACES'),
(9, 'VS81000 ALARM SIGNAL'),
(10, 'VS81100 CARRIAGE OF CARGO AND DANGEROUS GOODS'),
(11, 'VS81300 RADIO COMMUNICATION'),
(12, 'VS81400 CONSTRUCTIONS SAFETY'),
(13, 'VS81500 EGIE ROOM/FIREFIGHTIG APPLIANCES'),
(14, 'VS81600 OIL CHEMICAL TANNKERS AND GA CARRIER'),
(15, 'VS81700 MARPOL'),
(16, 'VS81800 SOLAS RELATE OPERATIONAL DEFICIENCY'),
(17, 'VS81900 EGINE ROOM SHYLIGTH AD ADJACENT STRUCTURE'),
(18, 'VS82000 H.O REQUIREMENTS'),
(19, 'VS82100 FOODS AND CATERS'),
(20, 'VS82200 MOORING ARRANGEMENTS'),
(21, 'VS82300 PROPOLSION AN AUXILIARY MACHINERY'),
(22, 'VS82400 ISM RELATED DEFICENCIES'),
(23, 'VS82500 BULK CARRIER- ADDITIONAL SAFETY MEASURES'),
(24, 'VS82600 ADDITIONAL MEASURES TO ENHANCE MARITIME SECURITY');

-- --------------------------------------------------------

--
-- Table structure for table `vsei_result`
--

CREATE TABLE `vsei_result` (
  `id` int(11) NOT NULL,
  `vsei_result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vsei_result`
--

INSERT INTO `vsei_result` (`id`, `vsei_result`) VALUES
(1, 'UNDETAINED'),
(2, 'DETAINED');

-- --------------------------------------------------------

--
-- Table structure for table `weather_forecast`
--

CREATE TABLE `weather_forecast` (
  `id` int(11) NOT NULL,
  `weather_forecast` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather_forecast`
--

INSERT INTO `weather_forecast` (`id`, `weather_forecast`) VALUES
(1, 'LPA'),
(2, 'PSWS NR 1'),
(3, 'PSWS NR 2'),
(4, 'PSWS NR 3'),
(5, 'PSWS NR 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_code`
--
ALTER TABLE `action_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_conduct`
--
ALTER TABLE `activity_conduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affected_area`
--
ALTER TABLE `affected_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affected_biodiversity`
--
ALTER TABLE `affected_biodiversity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_type`
--
ALTER TABLE `application_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_deployment`
--
ALTER TABLE `asset_deployment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_mobility_deployed_type`
--
ALTER TABLE `asset_mobility_deployed_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `body_built`
--
ALTER TABLE `body_built`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bouy_type`
--
ALTER TABLE `bouy_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadaver_approximate_age`
--
ALTER TABLE `cadaver_approximate_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadaver_location`
--
ALTER TABLE `cadaver_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coastal_and_beach_violation`
--
ALTER TABLE `coastal_and_beach_violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conduct_of_activity`
--
ALTER TABLE `conduct_of_activity`
  ADD PRIMARY KEY (`conduct_of_activity_id`);

--
-- Indexes for table `damage_estimated_cost`
--
ALTER TABLE `damage_estimated_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drill_conducted`
--
ALTER TABLE `drill_conducted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drowning_cause`
--
ALTER TABLE `drowning_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drowning_incident_location`
--
ALTER TABLE `drowning_incident_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earthquake_cause`
--
ALTER TABLE `earthquake_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earthquake_location`
--
ALTER TABLE `earthquake_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earthquake_magnitude_level`
--
ALTER TABLE `earthquake_magnitude_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eod_deployment`
--
ALTER TABLE `eod_deployment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ere_result`
--
ALTER TABLE `ere_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_type`
--
ALTER TABLE `facility_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_cause`
--
ALTER TABLE `fire_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_incident_location`
--
ALTER TABLE `fire_incident_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garbage_type_collected`
--
ALTER TABLE `garbage_type_collected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_cause`
--
ALTER TABLE `incident_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_consequences`
--
ALTER TABLE `incident_consequences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information_acquired_thru`
--
ALTER TABLE `information_acquired_thru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_type`
--
ALTER TABLE `inspection_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k9_deployed_type`
--
ALTER TABLE `k9_deployed_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lighthouse_cause_if_not_operating`
--
ALTER TABLE `lighthouse_cause_if_not_operating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lighthouse_inspection_purpose`
--
ALTER TABLE `lighthouse_inspection_purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lighthouse_status`
--
ALTER TABLE `lighthouse_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lighthouse_type`
--
ALTER TABLE `lighthouse_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light_bouy_inspection_purpose`
--
ALTER TABLE `light_bouy_inspection_purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light_buoy_status`
--
ALTER TABLE `light_buoy_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light_buoy__cause_if_not_operating`
--
ALTER TABLE `light_buoy__cause_if_not_operating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `man_overboard_incident_cause`
--
ALTER TABLE `man_overboard_incident_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marep`
--
ALTER TABLE `marep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritime_acitivity`
--
ALTER TABLE `maritime_acitivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritime_casualty_nature`
--
ALTER TABLE `maritime_casualty_nature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritime_incident_severity`
--
ALTER TABLE `maritime_incident_severity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritime_incident_type`
--
ALTER TABLE `maritime_incident_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritime_related_violation`
--
ALTER TABLE `maritime_related_violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marpol_violation`
--
ALTER TABLE `marpol_violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsaf`
--
ALTER TABLE `marsaf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsaf_aton`
--
ALTER TABLE `marsaf_aton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_cabrsasi`
--
ALTER TABLE `marsaf_cabrsasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_cabrsasi_data`
--
ALTER TABLE `marsaf_cabrsasi_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_cabrsasi` (`marsaf_cabrsasi`);

--
-- Indexes for table `marsaf_ere`
--
ALTER TABLE `marsaf_ere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_ere_data`
--
ALTER TABLE `marsaf_ere_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_ere` (`marsaf_ere`);

--
-- Indexes for table `marsaf_incident_cause`
--
ALTER TABLE `marsaf_incident_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsaf_inspection_type`
--
ALTER TABLE `marsaf_inspection_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsaf_mci`
--
ALTER TABLE `marsaf_mci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_mpramra`
--
ALTER TABLE `marsaf_mpramra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_pdi`
--
ALTER TABLE `marsaf_pdi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_pdi_data`
--
ALTER TABLE `marsaf_pdi_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_pdi_data_ibfk_1` (`marsaf_pdi`);

--
-- Indexes for table `marsaf_psc`
--
ALTER TABLE `marsaf_psc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_psc_data`
--
ALTER TABLE `marsaf_psc_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_psc` (`marsaf_psc`);

--
-- Indexes for table `marsaf_rsei`
--
ALTER TABLE `marsaf_rsei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_rsei_data`
--
ALTER TABLE `marsaf_rsei_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_rsei` (`marsaf_rsei`);

--
-- Indexes for table `marsaf_so`
--
ALTER TABLE `marsaf_so`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_vessel_type`
--
ALTER TABLE `marsaf_vessel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsaf_vsei`
--
ALTER TABLE `marsaf_vsei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_report_type` (`marsaf_report_type`);

--
-- Indexes for table `marsaf_vsei_data`
--
ALTER TABLE `marsaf_vsei_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marsaf_vsei` (`marsaf_vsei`);

--
-- Indexes for table `marsar`
--
ALTER TABLE `marsar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsar_incident_cause`
--
ALTER TABLE `marsar_incident_cause`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marslec`
--
ALTER TABLE `marslec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_report`
--
ALTER TABLE `material_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mep_violation`
--
ALTER TABLE `mep_violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mep_violation_marpol_equipment`
--
ALTER TABLE `mep_violation_marpol_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noted_deficiency`
--
ALTER TABLE `noted_deficiency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oil_type`
--
ALTER TABLE `oil_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panelling_conducted_facilities`
--
ALTER TABLE `panelling_conducted_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participating_agency`
--
ALTER TABLE `participating_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdi_result`
--
ALTER TABLE `pdi_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pd_no_532`
--
ALTER TABLE `pd_no_532`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pd_no_705`
--
ALTER TABLE `pd_no_705`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_emptive_evacuation_activity`
--
ALTER TABLE `pre_emptive_evacuation_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_emptive_evacuation_coordination_with`
--
ALTER TABLE `pre_emptive_evacuation_coordination_with`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psc_action_code`
--
ALTER TABLE `psc_action_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psc_center`
--
ALTER TABLE `psc_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_1937`
--
ALTER TABLE `ra_1937`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_6539`
--
ALTER TABLE `ra_6539`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_9147`
--
ALTER TABLE `ra_9147`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_9165`
--
ALTER TABLE `ra_9165`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_9208`
--
ALTER TABLE `ra_9208`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_10066`
--
ALTER TABLE `ra_10066`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_10591`
--
ALTER TABLE `ra_10591`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_10654`
--
ALTER TABLE `ra_10654`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ra_10845`
--
ALTER TABLE `ra_10845`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recration_watercraft`
--
ALTER TABLE `recration_watercraft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recreational_violation`
--
ALTER TABLE `recreational_violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_international_conventions_noted_deficiency`
--
ALTER TABLE `related_international_conventions_noted_deficiency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_selection`
--
ALTER TABLE `report_selection`
  ADD PRIMARY KEY (`report_selection_id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responding_unit`
--
ALTER TABLE `responding_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salvage_operation_purpose`
--
ALTER TABLE `salvage_operation_purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seaborne_patrol_activity_conduct`
--
ALTER TABLE `seaborne_patrol_activity_conduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spiller`
--
ALTER TABLE `spiller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `sub_station`
--
ALTER TABLE `sub_station`
  ADD PRIMARY KEY (`sub_station_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tier_level`
--
ALTER TABLE `tier_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_assets_deployment`
--
ALTER TABLE `time_assets_deployment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_type`
--
ALTER TABLE `training_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urban_marsar`
--
ALTER TABLE `urban_marsar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urban_rescue_type`
--
ALTER TABLE `urban_rescue_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `very_serious_mc_category`
--
ALTER TABLE `very_serious_mc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessel_age`
--
ALTER TABLE `vessel_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessel_size`
--
ALTER TABLE `vessel_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessel_type`
--
ALTER TABLE `vessel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessel_type_involved`
--
ALTER TABLE `vessel_type_involved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `victim_age`
--
ALTER TABLE `victim_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `victim_number`
--
ALTER TABLE `victim_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vsei_deficiency_code`
--
ALTER TABLE `vsei_deficiency_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vsei_result`
--
ALTER TABLE `vsei_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather_forecast`
--
ALTER TABLE `weather_forecast`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_code`
--
ALTER TABLE `action_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_conduct`
--
ALTER TABLE `activity_conduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `affected_area`
--
ALTER TABLE `affected_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `affected_biodiversity`
--
ALTER TABLE `affected_biodiversity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application_type`
--
ALTER TABLE `application_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asset_deployment`
--
ALTER TABLE `asset_deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `asset_mobility_deployed_type`
--
ALTER TABLE `asset_mobility_deployed_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `body_built`
--
ALTER TABLE `body_built`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bouy_type`
--
ALTER TABLE `bouy_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cadaver_approximate_age`
--
ALTER TABLE `cadaver_approximate_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cadaver_location`
--
ALTER TABLE `cadaver_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coastal_and_beach_violation`
--
ALTER TABLE `coastal_and_beach_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conduct_of_activity`
--
ALTER TABLE `conduct_of_activity`
  MODIFY `conduct_of_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `damage_estimated_cost`
--
ALTER TABLE `damage_estimated_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drill_conducted`
--
ALTER TABLE `drill_conducted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drowning_cause`
--
ALTER TABLE `drowning_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drowning_incident_location`
--
ALTER TABLE `drowning_incident_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `earthquake_cause`
--
ALTER TABLE `earthquake_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `earthquake_location`
--
ALTER TABLE `earthquake_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `earthquake_magnitude_level`
--
ALTER TABLE `earthquake_magnitude_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eod_deployment`
--
ALTER TABLE `eod_deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ere_result`
--
ALTER TABLE `ere_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility_type`
--
ALTER TABLE `facility_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fire_cause`
--
ALTER TABLE `fire_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fire_incident_location`
--
ALTER TABLE `fire_incident_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garbage_type_collected`
--
ALTER TABLE `garbage_type_collected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `incident_cause`
--
ALTER TABLE `incident_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `incident_consequences`
--
ALTER TABLE `incident_consequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `information_acquired_thru`
--
ALTER TABLE `information_acquired_thru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inspection_type`
--
ALTER TABLE `inspection_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `k9_deployed_type`
--
ALTER TABLE `k9_deployed_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lighthouse_cause_if_not_operating`
--
ALTER TABLE `lighthouse_cause_if_not_operating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lighthouse_inspection_purpose`
--
ALTER TABLE `lighthouse_inspection_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lighthouse_status`
--
ALTER TABLE `lighthouse_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lighthouse_type`
--
ALTER TABLE `lighthouse_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `light_bouy_inspection_purpose`
--
ALTER TABLE `light_bouy_inspection_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `light_buoy_status`
--
ALTER TABLE `light_buoy_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `light_buoy__cause_if_not_operating`
--
ALTER TABLE `light_buoy__cause_if_not_operating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `man_overboard_incident_cause`
--
ALTER TABLE `man_overboard_incident_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marep`
--
ALTER TABLE `marep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `maritime_acitivity`
--
ALTER TABLE `maritime_acitivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maritime_casualty_nature`
--
ALTER TABLE `maritime_casualty_nature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `maritime_incident_severity`
--
ALTER TABLE `maritime_incident_severity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maritime_incident_type`
--
ALTER TABLE `maritime_incident_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maritime_related_violation`
--
ALTER TABLE `maritime_related_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marpol_violation`
--
ALTER TABLE `marpol_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marsaf`
--
ALTER TABLE `marsaf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `marsaf_aton`
--
ALTER TABLE `marsaf_aton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marsaf_cabrsasi`
--
ALTER TABLE `marsaf_cabrsasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marsaf_cabrsasi_data`
--
ALTER TABLE `marsaf_cabrsasi_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marsaf_ere`
--
ALTER TABLE `marsaf_ere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marsaf_ere_data`
--
ALTER TABLE `marsaf_ere_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `marsaf_incident_cause`
--
ALTER TABLE `marsaf_incident_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marsaf_inspection_type`
--
ALTER TABLE `marsaf_inspection_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marsaf_mci`
--
ALTER TABLE `marsaf_mci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marsaf_mpramra`
--
ALTER TABLE `marsaf_mpramra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marsaf_pdi`
--
ALTER TABLE `marsaf_pdi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marsaf_pdi_data`
--
ALTER TABLE `marsaf_pdi_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `marsaf_psc`
--
ALTER TABLE `marsaf_psc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marsaf_psc_data`
--
ALTER TABLE `marsaf_psc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marsaf_rsei`
--
ALTER TABLE `marsaf_rsei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marsaf_rsei_data`
--
ALTER TABLE `marsaf_rsei_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marsaf_so`
--
ALTER TABLE `marsaf_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `marsaf_vessel_type`
--
ALTER TABLE `marsaf_vessel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marsaf_vsei`
--
ALTER TABLE `marsaf_vsei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marsaf_vsei_data`
--
ALTER TABLE `marsaf_vsei_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marsar`
--
ALTER TABLE `marsar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marsar_incident_cause`
--
ALTER TABLE `marsar_incident_cause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marslec`
--
ALTER TABLE `marslec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material_report`
--
ALTER TABLE `material_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mep_violation`
--
ALTER TABLE `mep_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mep_violation_marpol_equipment`
--
ALTER TABLE `mep_violation_marpol_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `noted_deficiency`
--
ALTER TABLE `noted_deficiency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oil_type`
--
ALTER TABLE `oil_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `panelling_conducted_facilities`
--
ALTER TABLE `panelling_conducted_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participating_agency`
--
ALTER TABLE `participating_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pdi_result`
--
ALTER TABLE `pdi_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pd_no_532`
--
ALTER TABLE `pd_no_532`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pd_no_705`
--
ALTER TABLE `pd_no_705`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pre_emptive_evacuation_activity`
--
ALTER TABLE `pre_emptive_evacuation_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pre_emptive_evacuation_coordination_with`
--
ALTER TABLE `pre_emptive_evacuation_coordination_with`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `psc_action_code`
--
ALTER TABLE `psc_action_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `psc_center`
--
ALTER TABLE `psc_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ra_1937`
--
ALTER TABLE `ra_1937`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ra_6539`
--
ALTER TABLE `ra_6539`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ra_9147`
--
ALTER TABLE `ra_9147`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ra_9165`
--
ALTER TABLE `ra_9165`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ra_9208`
--
ALTER TABLE `ra_9208`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ra_10066`
--
ALTER TABLE `ra_10066`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ra_10591`
--
ALTER TABLE `ra_10591`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ra_10654`
--
ALTER TABLE `ra_10654`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ra_10845`
--
ALTER TABLE `ra_10845`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recration_watercraft`
--
ALTER TABLE `recration_watercraft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recreational_violation`
--
ALTER TABLE `recreational_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `related_international_conventions_noted_deficiency`
--
ALTER TABLE `related_international_conventions_noted_deficiency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report_selection`
--
ALTER TABLE `report_selection`
  MODIFY `report_selection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `responding_unit`
--
ALTER TABLE `responding_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salvage_operation_purpose`
--
ALTER TABLE `salvage_operation_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seaborne_patrol_activity_conduct`
--
ALTER TABLE `seaborne_patrol_activity_conduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spiller`
--
ALTER TABLE `spiller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_station`
--
ALTER TABLE `sub_station`
  MODIFY `sub_station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tier_level`
--
ALTER TABLE `tier_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_assets_deployment`
--
ALTER TABLE `time_assets_deployment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `training_type`
--
ALTER TABLE `training_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `urban_marsar`
--
ALTER TABLE `urban_marsar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urban_rescue_type`
--
ALTER TABLE `urban_rescue_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `very_serious_mc_category`
--
ALTER TABLE `very_serious_mc_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vessel_age`
--
ALTER TABLE `vessel_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vessel_size`
--
ALTER TABLE `vessel_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vessel_type`
--
ALTER TABLE `vessel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vessel_type_involved`
--
ALTER TABLE `vessel_type_involved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `victim_age`
--
ALTER TABLE `victim_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `victim_number`
--
ALTER TABLE `victim_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vsei_deficiency_code`
--
ALTER TABLE `vsei_deficiency_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vsei_result`
--
ALTER TABLE `vsei_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weather_forecast`
--
ALTER TABLE `weather_forecast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marsaf_aton`
--
ALTER TABLE `marsaf_aton`
  ADD CONSTRAINT `marsaf_aton_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_cabrsasi`
--
ALTER TABLE `marsaf_cabrsasi`
  ADD CONSTRAINT `marsaf_cabrsasi_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_cabrsasi_data`
--
ALTER TABLE `marsaf_cabrsasi_data`
  ADD CONSTRAINT `marsaf_cabrsasi_data_ibfk_1` FOREIGN KEY (`marsaf_cabrsasi`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_ere`
--
ALTER TABLE `marsaf_ere`
  ADD CONSTRAINT `marsaf_ere_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_ere_data`
--
ALTER TABLE `marsaf_ere_data`
  ADD CONSTRAINT `marsaf_ere_data_ibfk_1` FOREIGN KEY (`marsaf_ere`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_mci`
--
ALTER TABLE `marsaf_mci`
  ADD CONSTRAINT `marsaf_mci_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_mpramra`
--
ALTER TABLE `marsaf_mpramra`
  ADD CONSTRAINT `marsaf_mpramra_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_pdi`
--
ALTER TABLE `marsaf_pdi`
  ADD CONSTRAINT `marsaf_pdi_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_pdi_data`
--
ALTER TABLE `marsaf_pdi_data`
  ADD CONSTRAINT `marsaf_pdi_data_ibfk_1` FOREIGN KEY (`marsaf_pdi`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_psc`
--
ALTER TABLE `marsaf_psc`
  ADD CONSTRAINT `marsaf_psc_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_psc_data`
--
ALTER TABLE `marsaf_psc_data`
  ADD CONSTRAINT `marsaf_psc_data_ibfk_1` FOREIGN KEY (`marsaf_psc`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_rsei`
--
ALTER TABLE `marsaf_rsei`
  ADD CONSTRAINT `marsaf_rsei_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_rsei_data`
--
ALTER TABLE `marsaf_rsei_data`
  ADD CONSTRAINT `marsaf_rsei_data_ibfk_1` FOREIGN KEY (`marsaf_rsei`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_so`
--
ALTER TABLE `marsaf_so`
  ADD CONSTRAINT `marsaf_so_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_vsei`
--
ALTER TABLE `marsaf_vsei`
  ADD CONSTRAINT `marsaf_vsei_ibfk_1` FOREIGN KEY (`marsaf_report_type`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marsaf_vsei_data`
--
ALTER TABLE `marsaf_vsei_data`
  ADD CONSTRAINT `marsaf_vsei_data_ibfk_1` FOREIGN KEY (`marsaf_vsei`) REFERENCES `marsaf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
