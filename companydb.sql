-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2019 at 12:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companydb`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `CalcHike`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CalcHike` ()  BEGIN
DECLARE c_emp_id INTEGER;
DECLARE c_stars INTEGER;
DECLARE c_hike_per VARCHAR(4);
    DECLARE finished INTEGER DEFAULT 0;

DECLARE
curEmp CURSOR FOR
SELECT emp_id , stars FROM performance;

DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET finished = 1;
 

OPEN curEmp;

hikeLoop:LOOP

FETCH curEmp INTO c_emp_id, c_stars;
IF finished = 1 THEN
LEAVE hikeLoop;
END IF;
IF( c_stars <= 4 )
THEN SET c_hike_per = "4%";
ELSEIF ( c_stars >= 5 AND  c_stars <= 7 )
THEN SET c_hike_per = "10%";
ELSEIF ( c_stars >= 8 AND  c_stars <= 9 )
THEN SET c_hike_per = "14%";
ELSE
SET c_hike_per = "20%";
END IF;
UPDATE calc SET hike = c_hike_per WHERE emp_id = c_emp_id;

END LOOP;

CLOSE curEmp;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `calc`
--

DROP TABLE IF EXISTS `calc`;
CREATE TABLE IF NOT EXISTS `calc` (
  `EMP_ID` int(11) NOT NULL,
  `OLD_SAL` int(11) DEFAULT NULL,
  `NEW_SAL` int(11) NOT NULL,
  `HIKE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calc`
--

INSERT INTO `calc` (`EMP_ID`, `OLD_SAL`, `NEW_SAL`, `HIKE`) VALUES
(12, NULL, 2323, '20%');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `DEP_NO` int(11) NOT NULL,
  `DEP_NAME` varchar(20) DEFAULT NULL,
  `NO_OF_EMP` int(11) DEFAULT NULL,
  `DEP_MANAGER` varchar(20) DEFAULT NULL,
  `DEP_LOC` varchar(20) DEFAULT NULL,
  `NO_OF_PROJECT` int(11) DEFAULT NULL,
  PRIMARY KEY (`DEP_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` int(11) NOT NULL,
  `NAME` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(40) DEFAULT NULL,
  `PH_NO` int(11) DEFAULT NULL,
  `DOB` varchar(11) DEFAULT NULL,
  `E_MAIL` varchar(25) DEFAULT NULL,
  `PROOF_NAME` varchar(10) DEFAULT NULL,
  `PROOF_ID` varchar(20) DEFAULT NULL,
  `DEP_NO` int(11) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`),
  KEY `DEP_NO` (`DEP_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

DROP TABLE IF EXISTS `performance`;
CREATE TABLE IF NOT EXISTS `performance` (
  `EMP_ID` int(11) NOT NULL,
  `PROJ_ID` int(11) DEFAULT NULL,
  `STARS` int(11) DEFAULT NULL,
  `DEP_NO` int(11) DEFAULT NULL,
  `COMMENTS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`),
  KEY `PROJ_ID` (`PROJ_ID`),
  KEY `DEP_NO` (`DEP_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`EMP_ID`, `PROJ_ID`, `STARS`, `DEP_NO`, `COMMENTS`) VALUES
(12, 12, 10, 121212, 'safs');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `PROJ_ID` int(11) NOT NULL,
  `PROJ_NAME` varchar(20) DEFAULT NULL,
  `DEP_NO` int(11) DEFAULT NULL,
  `PROJ_LOC` varchar(50) DEFAULT NULL,
  `BUDGET` int(11) DEFAULT NULL,
  `PROJ_LEAD` varchar(20) DEFAULT NULL,
  `NO_OF_EMP` int(11) DEFAULT NULL,
  `TOTAL_RATING` int(1) DEFAULT NULL,
  `DURATION` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`PROJ_ID`),
  KEY `DEP_NO` (`DEP_NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `EMP_ID` int(11) NOT NULL,
  `BASIC_PAY` int(11) DEFAULT NULL,
  `BONUS` int(11) DEFAULT NULL,
  `DATE_OF_SAL` varchar(11) DEFAULT NULL,
  `TOTAL_PAY` int(11) DEFAULT NULL,
  `REIMBURSEMENT` int(11) DEFAULT NULL,
  `PENALTY` int(11) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`EMP_ID`, `BASIC_PAY`, `BONUS`, `DATE_OF_SAL`, `TOTAL_PAY`, `REIMBURSEMENT`, `PENALTY`) VALUES
(12, 1212, 1212121, 'adsff', 2323, 2323, 23);

--
-- Triggers `salary`
--
DROP TRIGGER IF EXISTS `after_salary_delete`;
DELIMITER $$
CREATE TRIGGER `after_salary_delete` AFTER DELETE ON `salary` FOR EACH ROW BEGIN
DELETE from calc
WHERE emp_id = old.emp_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_salary_edit`;
DELIMITER $$
CREATE TRIGGER `after_salary_edit` AFTER UPDATE ON `salary` FOR EACH ROW BEGIN
UPDATE calc
SET
old_sal = old.total_pay,
new_sal = new.total_pay
WHERE
emp_id = old.emp_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_salary_insert`;
DELIMITER $$
CREATE TRIGGER `before_salary_insert` BEFORE INSERT ON `salary` FOR EACH ROW BEGIN
    INSERT INTO calc
    SET 
emp_id  = new.emp_id,
    new_sal = new.total_pay;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(4, 'anand', '$2y$10$8Cxr8jr3e3yPLlFrWstcoOfuu4DVcbMg/fbARe6KKqHdBolu.WAZ.', '2019-11-16 10:21:55'),
(5, 'pri', '$2y$10$RflvHU2a.2UN4.6xvA/C0ejpUZIWXBNx/gquk9X03Mdyguj8qnJG.', '2019-11-16 10:44:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
