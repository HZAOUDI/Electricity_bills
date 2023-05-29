-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 09:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zessaie`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id_ag` int(255) NOT NULL,
  `matricule` int(20) NOT NULL,
  `nom_ag` varchar(20) NOT NULL,
  `prenom_ag` varchar(20) NOT NULL,
  `date_embauche` date NOT NULL,
  `cin_ag` varchar(10) NOT NULL,
  `email_ag` varchar(100) NOT NULL,
  `mdp_ag` varchar(100) NOT NULL,
  `id_fr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id_ag`, `matricule`, `nom_ag`, `prenom_ag`, `date_embauche`, `cin_ag`, `email_ag`, `mdp_ag`, `id_fr`) VALUES
(1, 1234, 'agent1', 'agent1', '2023-03-01', 'L1234', 'agent1@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_cl` int(255) NOT NULL,
  `nom_cl` varchar(50) NOT NULL,
  `prenom_cl` varchar(50) NOT NULL,
  `cin_cl` varchar(20) NOT NULL,
  `adresse_cl` varchar(100) NOT NULL,
  `tel_cl` varchar(20) NOT NULL,
  `email_cl` varchar(50) NOT NULL,
  `passwd_cl` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_abonnement` date DEFAULT NULL,
  `id_zone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_cl`, `nom_cl`, `prenom_cl`, `cin_cl`, `adresse_cl`, `tel_cl`, `email_cl`, `passwd_cl`, `created_at`, `date_abonnement`, `id_zone`) VALUES
(6, 'zaoudi', 'haya', 'l0000', 'av jamea rabia', '0234567890', 'haya159@hotmail.fr', '123', '2023-03-04 23:42:10', '2000-01-01', 6),
(7, 'zian', 'iman', 'l111', 'Av mohamed5', '0987654', 'iman@gmail.com', '567', '2023-03-15 23:43:04', '2010-03-03', 1),
(8, 'zaoudi', 'mounir', 'l9999', 'sdfghjklñ', '0994567', 'mounir@gmail.com', '', '2023-03-09 05:10:22', '2018-10-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consommations`
--

CREATE TABLE `consommations` (
  `id_consommation` int(255) NOT NULL,
  `index_compteur` int(20) NOT NULL,
  `mois` varchar(10) NOT NULL,
  `annee` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `etat_cons` varchar(20) NOT NULL,
  `id_cl` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consommations`
--

INSERT INTO `consommations` (`id_consommation`, `index_compteur`, `mois`, `annee`, `image`, `etat_cons`, `id_cl`) VALUES
(86, 100, '1', '2019', '', 'Verifiee', 6),
(88, 200, '2', '2019', '1678307706.', 'Verifiee', 6),
(89, 300, '3', '2019', '1678307715.', 'Verifiee', 6),
(90, 400, '4', '2019', '1678307724.', 'Verifiee', 6),
(91, 500, '5', '2019', '1678307733.', 'Verifiee', 6),
(92, 600, '6', '2019', '1678307741.', 'Verifiee', 6),
(93, 700, '7', '2019', '1678307750.', 'Verifiee', 6),
(94, 800, '8', '2019', '1678307829.', 'Verifiee', 6),
(95, 900, '9', '2019', '1678307838.', 'Verifiee', 6),
(96, 1000, '10', '2019', '1678307857.', 'Verifiee', 6),
(97, 1100, '11', '2019', '1678307870.', 'Verifiee', 6),
(115, 1222, '12', '2019', '1678312176.', 'Verifiee', 6),
(116, 1222, '12', '2019', '1678312202.', 'Verifiee', 6),
(117, 1222, '12', '2019', '1678312286.', 'Verifiee', 6),
(118, 1222, '12', '2019', '1678312363.', 'Verifiee', 6),
(119, 1222, '12', '2019', '1678312501.', 'Verifiee', 6),
(120, 1222, '12', '2019', '1678312585.', 'Verifiee', 6),
(121, 200, '1', '2006', '', 'Verifiee', 6),
(122, 400, '2', '2006', '1678312764.', 'Verifiee', 6),
(123, 600, '3', '2006', '1678312859.', 'Verifiee', 6),
(124, 300, '1', '2012', '', 'Verifiee', 7),
(125, 600, '2', '2012', '1678313023.', 'Verifiee', 7),
(126, 900, '3', '2012', '1678313075.', 'Verifiee', 7),
(127, 1200, '4', '2012', '1678313088.', 'Verifiee', 7),
(128, 1500, '5', '2012', '1678313103.', 'Verifiee', 7),
(129, 1800, '6', '2012', '1678313120.', 'Verifiee', 7),
(130, 2100, '7', '2012', '1678313151.', 'Verifiee', 7),
(131, 2400, '8', '2012', '1678313165.', 'Verifiee', 7),
(132, 2700, '9', '2012', '1678313186.', 'Verifiee', 7),
(133, 3000, '10', '2012', '1678313204.', 'Verifiee', 7),
(134, 3300, '11', '2012', '1678313231.', 'Verifiee', 7),
(135, 3600, '12', '2012', '1678313245.', 'Verifiee', 7),
(136, 150, '1', '2015', '', 'Verifiee', 7),
(137, 300, '2', '2015', '1678314792.', 'Verifiee', 7),
(138, 450, '3', '2015', '1678314804.', 'Verifiee', 7),
(139, 600, '4', '2015', '1678314821.', 'Verifiee', 7),
(140, 750, '5', '2015', '1678314843.', 'Verifiee', 7),
(141, 900, '6', '2015', '1678314858.', 'Verifiee', 7),
(142, 1050, '7', '2015', '1678314875.', 'Verifiee', 7),
(143, 1200, '8', '2015', '1678314910.', 'Verifiee', 7),
(144, 1350, '9', '2015', '1678314928.', 'Verifiee', 7),
(145, 1500, '10', '2015', '1678314948.', 'Verifiee', 7),
(146, 1650, '11', '2015', '1678314970.', 'Verifiee', 7),
(147, 1899, '12', '2015', '1678314985.', 'Verifiee', 7),
(148, 150, '1', '2015', '', 'Verifiee', 7),
(149, 175, '1', '2015', '', 'Verifiee', 7),
(150, 175, '1', '2015', '', 'Verifiee', 7),
(777, 150, '1', '2015', '', 'Verifiee', 7),
(778, 150, '1', '2015', '', 'Verifiee', 7),
(1300, 150, '1', '2015', '', 'Verifiee', 7),
(1301, 150, '1', '2015', '', 'Verifiee', 6),
(1302, 150, '1', '2015', '', 'Verifiee', 6),
(1303, 350, '2', '2015', '1678315595.', 'Verifiee', 6),
(1304, 700, '3', '2015', '1678315605.', 'Verifiee', 6),
(1305, 1100, '4', '2015', '1678315649.', 'Verifiee', 6),
(1306, 1500, '5', '2015', '1678315718.', 'Verifiee', 6),
(1307, 1900, '6', '2015', '1678315735.', 'Verifiee', 6),
(1308, 2300, '7', '2015', '1678315754.', 'Verifiee', 6),
(1309, 2700, '8', '2015', '1678315772.', 'Verifiee', 6),
(1310, 3100, '9', '2015', '1678315801.', 'Verifiee', 6),
(1311, 3500, '10', '2015', '1678315814.', 'Verifiee', 6),
(1312, 3900, '11', '2015', '1678315838.', 'Verifiee', 6),
(1313, 4300, '12', '2015', '1678315860.', 'Verifiee', 6),
(1314, 150, '1', '2015', '', 'Verifiee', 6),
(1315, 150, '1', '2015', '', 'Verifiee', 6),
(1316, 400, '1', '2014', 'ASDFGHJKLÑ', 'Verifiee', 6),
(1317, 400, '1', '2014', 'ASDFGHJKLÑ', 'Verifiee', 6),
(1318, 800, '4', '2006', '1678316152.', 'Verifiee', 6),
(1319, 1522, '1', '2020', '1678336612.', 'Verifiee', 6),
(1320, 0, '4', '2010', '1678338297.', 'En attente', 7),
(1328, 200, '11', '2018', '1678341861.', 'Verifiee', 8),
(1329, 400, '12', '2018', '1678341875.', 'Verifiee', 8),
(1330, 600, '1', '2019', '1678341930.', 'Verifiee', 8),
(1332, 800, '1', '2019', '1678343416.', 'Verifiee', 8),
(1333, 900, '1', '2019', '1678343450.', 'Verifiee', 8),
(1334, 1000, '1', '2019', '1678343519.', 'Verifiee', 8),
(1335, 1000, '1', '2019', '1678343626.', 'Verifiee', 8),
(1336, 1000, '1', '2019', '1678360932.', 'Verifiee', 8),
(1337, 1000, '1', '2019', '1678361002.', 'En attente', 8),
(1338, 4500, '1', '2016', '1678361618.', 'Verifiee', 6),
(1339, 4500, '1', '2016', '1678361633.', 'Verifiee', 6),
(1340, 4700, '2', '2016', '1678362163.', 'Verifiee', 6),
(1341, 4800, '3', '2016', '1678362237.', 'Verifiee', 6),
(1342, 4900, '4', '2016', '1678451660.jpg', 'Verifiee', 6),
(1343, 4920, '5', '2016', '1678452354.jpg', 'Verifiee', 6),
(1344, 1999, '1', '2016', '1678452703.jpg', 'Verifiee', 7),
(1345, 2100, '2', '2016', '1678452738.png', 'Verifiee', 7),
(1346, 2200, '3', '2016', '1678452763.jpg', 'Verifiee', 7),
(1347, 2300, '4', '2016', '1678452850.jpg', 'Verifiee', 7),
(1348, 2400, '5', '2016', '1678452885.jpg', 'Verifiee', 7),
(1349, 2500, '6', '2016', '1678452909.jpg', 'Verifiee', 7),
(1350, 2600, '7', '2016', '1678452959.jpg', 'Verifiee', 7),
(1351, 2700, '8', '2016', '1678452991.jpg', 'Verifiee', 7),
(1352, 2800, '9', '2016', '1678453013.jpg', 'Verifiee', 7),
(1353, 2900, '10', '2016', '1678453079.jpg', 'Verifiee', 7),
(1354, 3000, '11', '2016', '1678453109.jpg', 'Verifiee', 7),
(1355, 3100, '12', '2016', '1678453170.jpg', 'Verifiee', 7),
(1356, 4930, '6', '2016', '1678453682.jpg', 'Verifiee', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cons_annuelles`
--

CREATE TABLE `cons_annuelles` (
  `id_row` int(255) NOT NULL,
  `idClient` int(255) NOT NULL,
  `Consommation` int(20) NOT NULL,
  `Annee` varchar(5) NOT NULL,
  `ID_ZoneGeog` int(255) NOT NULL,
  `Date_Saisie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cons_annuelles`
--

INSERT INTO `cons_annuelles` (`id_row`, `idClient`, `Consommation`, `Annee`, `ID_ZoneGeog`, `Date_Saisie`) VALUES
(108, 6, 2000, '2019', 6, '01-01-2020'),
(109, 7, 3333, '2012', 1, '01-01-2013'),
(112, 7, 1000, '2016', 1, '01-01-2017');

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id_fac` int(255) NOT NULL,
  `montant_ht` float NOT NULL,
  `montant_taxes` float NOT NULL,
  `montant_ttc` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `created_fr` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_cl` int(20) NOT NULL,
  `id_fr` int(20) NOT NULL,
  `id_consommation` int(20) NOT NULL,
  `cons_par_annee` int(20) NOT NULL,
  `solde_anterieur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id_fac`, `montant_ht`, `montant_taxes`, `montant_ttc`, `quantite`, `etat`, `created_fr`, `id_cl`, `id_fr`, `id_consommation`, `cons_par_annee`, `solde_anterieur`) VALUES
(64, 91, 12.74, 103.74, 100, 'paye', '2023-03-08 20:35:06', 6, 1, 88, 0, 0),
(65, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:35:15', 6, 1, 89, 0, 0),
(66, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:35:24', 6, 1, 90, 0, 0),
(67, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:35:33', 6, 1, 91, 0, 0),
(68, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:35:41', 6, 1, 92, 0, 0),
(69, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:35:50', 6, 1, 93, 0, 0),
(70, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:37:09', 6, 1, 94, 0, 0),
(71, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:37:18', 6, 1, 95, 0, 0),
(72, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:37:37', 6, 1, 96, 0, 0),
(73, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-08 20:37:50', 6, 1, 97, 0, 0),
(84, 111.02, 15.5428, 126.563, 122, 'khraa', '2023-03-08 21:56:25', 6, 1, 120, 1122, 1121.03),
(85, 182, 25.48, 207.48, 200, 'Non payee', '2023-03-08 21:59:24', 6, 1, 122, 0, 0),
(86, 182, 25.48, 207.48, 200, 'Non payee', '2023-03-08 22:00:59', 6, 1, 123, 0, 0),
(87, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:03:43', 7, 1, 125, 0, 0),
(88, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:04:35', 7, 1, 126, 0, 0),
(89, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:04:48', 7, 1, 127, 0, 0),
(90, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:05:03', 7, 1, 128, 0, 0),
(91, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:05:20', 7, 1, 129, 0, 0),
(92, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:05:51', 7, 1, 130, 0, 0),
(93, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:06:05', 7, 1, 131, 0, 0),
(94, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:06:26', 7, 1, 132, 0, 0),
(95, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:06:44', 7, 1, 133, 0, 0),
(96, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:07:11', 7, 1, 134, 0, 0),
(97, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-08 22:07:25', 7, 1, 135, 3300, 0),
(98, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:33:12', 7, 1, 137, 0, 0),
(99, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:33:24', 7, 1, 138, 0, 0),
(100, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:33:41', 7, 1, 139, 0, 0),
(101, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:34:03', 7, 1, 140, 0, 0),
(102, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:34:18', 7, 1, 141, 0, 0),
(103, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:34:35', 7, 1, 142, 0, 0),
(104, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:35:10', 7, 1, 143, 0, 0),
(105, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:35:28', 7, 1, 144, 0, 0),
(106, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:35:48', 7, 1, 145, 0, 0),
(107, 136.5, 19.11, 155.61, 150, 'Non payee', '2023-03-08 22:36:10', 7, 1, 146, 0, 0),
(108, 278.88, 39.0432, 317.923, 249, 'Non payee', '2023-03-08 22:36:25', 7, 1, 147, 1749, 0),
(109, 182, 25.48, 207.48, 200, 'Non payee', '2023-03-08 22:46:35', 6, 1, 1303, 0, 0),
(110, 392, 54.88, 446.88, 350, 'Non payee', '2023-03-08 22:46:45', 6, 1, 1304, 0, 0),
(111, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:48:12', 6, 1, 1305, 0, 0),
(112, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:48:38', 6, 1, 1306, 0, 0),
(113, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:48:55', 6, 1, 1307, 0, 0),
(114, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:49:14', 6, 1, 1308, 0, 0),
(115, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:49:32', 6, 1, 1309, 0, 0),
(116, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:50:01', 6, 1, 1310, 0, 0),
(117, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:50:14', 6, 1, 1311, 0, 0),
(118, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:50:38', 6, 1, 1312, 0, 0),
(119, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-08 22:51:00', 6, 1, 1313, 4150, 0),
(120, 182, 25.48, 207.48, 200, 'Non payee', '2023-03-08 22:55:52', 6, 1, 1318, 0, 0),
(121, 336, 47.04, 383.04, 300, 'Non payee', '2023-03-09 04:36:52', 6, 1, 1319, 0, 0),
(126, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-09 06:04:21', 8, 1, 1328, 0, 0),
(127, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-09 06:04:35', 8, 1, 1329, 0, 0),
(128, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-09 06:05:30', 8, 1, 1330, 0, 0),
(130, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-09 06:30:16', 8, 1, 1332, 0, 0),
(131, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-09 11:33:38', 6, 1, 1338, 0, 0),
(132, 448, 62.72, 510.72, 400, 'Non payee', '2023-03-09 11:33:53', 6, 1, 1339, 0, 0),
(133, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-09 11:42:43', 6, 1, 1340, 0, 0),
(134, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-09 11:43:57', 6, 1, 1341, 0, 0),
(135, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:34:20', 6, 1, 1342, 0, 0),
(136, 18.2, 2.548, 20.748, 20, 'Non payee', '2023-03-10 12:46:11', 6, 1, 1343, 0, 0),
(137, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:51:43', 7, 1, 1344, 0, 0),
(138, 102.01, 14.2814, 116.291, 101, 'Non payee', '2023-03-10 12:52:18', 7, 1, 1345, 0, 0),
(139, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:52:43', 7, 1, 1346, 0, 0),
(140, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:54:10', 7, 1, 1347, 0, 0),
(141, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:54:45', 7, 1, 1348, 0, 0),
(142, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:55:09', 7, 1, 1349, 0, 0),
(143, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:55:59', 7, 1, 1350, 0, 0),
(144, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:56:31', 7, 1, 1351, 0, 0),
(145, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-10 12:56:53', 7, 1, 1352, 0, 0),
(146, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:57:59', 7, 1, 1353, 0, 0),
(147, 202, 28.28, 230.28, 200, 'Non payee', '2023-03-10 12:58:29', 7, 1, 1354, 0, 0),
(148, 91, 12.74, 103.74, 100, 'Non payee', '2023-03-10 12:59:30', 7, 1, 1355, 1401, -415.997),
(149, 9.1, 1.274, 10.374, 10, 'Non payee', '2023-03-10 13:08:31', 6, 1, 1356, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fr` int(255) NOT NULL,
  `nom_fr` varchar(30) NOT NULL,
  `adresse_fr` varchar(200) NOT NULL,
  `tel_fr` varchar(20) NOT NULL,
  `email_fr` varchar(50) NOT NULL,
  `mdp_fr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fr`, `nom_fr`, `adresse_fr`, `tel_fr`, `email_fr`, `mdp_fr`) VALUES
(1, 'xxx', 'wertyu', '0987', 'xxx@gmil.com', '123'),
(2, 'amendis', 'xxxxxxxxxxxxxx', '09999999', 'amendis@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE `reclamations` (
  `id_rec` int(255) NOT NULL,
  `type_rec` varchar(20) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `id_cl` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reponse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`id_rec`, `type_rec`, `objet`, `description`, `id_cl`, `created_at`, `reponse`) VALUES
(10, 'Fuite externe/intern', 'qqqqqqqqqqqqq', '<p>kkkkkkkkkkkkkkkkkkkkkkkkk</p>', 6, '2023-03-05 00:23:12', 'on va voir le plutot possible'),
(11, 'Autre', 'wwwwwwwwwwwwwwwwwwwwwww22', '<p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvv222222222</p>', 6, '2023-03-05 00:24:51', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla '),
(12, 'Fuite externe/intern', 'qqqqqqqqqqqqqqqq', '<p>qqqqqqqqqqqqqqqqqqqqqqq</p>', 6, '2023-03-10 13:05:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id_zone` int(255) NOT NULL,
  `nom_zone` varchar(50) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `id_fr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id_zone`, `nom_zone`, `ville`, `id_fr`) VALUES
(1, 'Al Azhar', 'Tetouan', 1),
(2, 'Al Matar', 'Tetouan', 1),
(3, 'Azla', 'Tetouan', 1),
(4, 'Fnideq', 'Tetouan', 1),
(5, 'Sidi Al Mendri', 'Tetouan', 1),
(6, 'Lot Aviation', 'Tetouan', 1),
(7, 'Oued Laou', 'Tetouan', 1),
(8, 'Martil-Chbar', 'Tetouan', 1),
(9, 'Boukhalef', 'Tanger', 1),
(10, 'Imam Ghazali', 'Tanger', 1),
(11, 'Dradeb', 'Tanger', 1),
(12, 'Asilah', 'Tanger', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id_ag`),
  ADD KEY `ag_fr` (`id_fr`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_cl`),
  ADD KEY `cl_zone` (`id_zone`);

--
-- Indexes for table `consommations`
--
ALTER TABLE `consommations`
  ADD PRIMARY KEY (`id_consommation`),
  ADD KEY `cl1` (`id_cl`);

--
-- Indexes for table `cons_annuelles`
--
ALTER TABLE `cons_annuelles`
  ADD PRIMARY KEY (`id_row`),
  ADD KEY `an_cl2` (`ID_ZoneGeog`),
  ADD KEY `an_cl4` (`idClient`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `test` (`id_cl`),
  ADD KEY `test2` (`id_fr`),
  ADD KEY `test3` (`id_consommation`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fr`);

--
-- Indexes for table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id_rec`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id_zone`),
  ADD KEY `zone_fr` (`id_fr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id_ag` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consommations`
--
ALTER TABLE `consommations`
  MODIFY `id_consommation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1357;

--
-- AUTO_INCREMENT for table `cons_annuelles`
--
ALTER TABLE `cons_annuelles`
  MODIFY `id_row` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id_fac` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id_rec` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id_zone` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `ag_fr` FOREIGN KEY (`id_fr`) REFERENCES `fournisseurs` (`id_fr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `cl_zone` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consommations`
--
ALTER TABLE `consommations`
  ADD CONSTRAINT `cl1` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`) ON UPDATE CASCADE;

--
-- Constraints for table `cons_annuelles`
--
ALTER TABLE `cons_annuelles`
  ADD CONSTRAINT `an_cl1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id_cl`),
  ADD CONSTRAINT `an_cl3` FOREIGN KEY (`idClient`) REFERENCES `consommations` (`id_cl`),
  ADD CONSTRAINT `an_cl4` FOREIGN KEY (`idClient`) REFERENCES `factures` (`id_cl`);

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_cl`) REFERENCES `clients` (`id_cl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test2` FOREIGN KEY (`id_fr`) REFERENCES `fournisseurs` (`id_fr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test3` FOREIGN KEY (`id_consommation`) REFERENCES `consommations` (`id_consommation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zone_fr` FOREIGN KEY (`id_fr`) REFERENCES `fournisseurs` (`id_fr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
