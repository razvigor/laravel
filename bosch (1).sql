-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 11:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosch`
--

-- --------------------------------------------------------

--
-- Table structure for table `alati`
--

CREATE TABLE `alati` (
  `id` int(10) NOT NULL,
  `vrsta_namjena` varchar(50) DEFAULT NULL,
  `alatnaziv_id` int(10) NOT NULL,
  `proizvodjac_id` int(10) NOT NULL,
  `kataloski_br` varchar(50) DEFAULT NULL,
  `dimenzija_opis` varchar(100) DEFAULT NULL,
  `precnik` int(5) DEFAULT NULL,
  `vrsta_rez_mat` varchar(20) DEFAULT NULL,
  `br_zuba_pera` int(5) DEFAULT NULL,
  `s_reza_p_rupe` decimal(5,1) DEFAULT NULL,
  `smjer` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alati`
--

INSERT INTO `alati` (`id`, `vrsta_namjena`, `alatnaziv_id`, `proizvodjac_id`, `kataloski_br`, `dimenzija_opis`, `precnik`, `vrsta_rez_mat`, `br_zuba_pera`, `s_reza_p_rupe`, `smjer`, `created_at`, `updated_at`) VALUES
(1, 'wewre', 2, 1, '34543', '22', 223, 'vrm3', 2, '2.0', 'LH', '2020-07-23 21:08:54', '2020-07-23 21:10:17'),
(3, NULL, 3, 3, '234', '234', 234, 'vrm1', 234, '234.0', 'RH', '2020-07-23 21:17:42', '2020-07-23 21:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `alatnazivi`
--

CREATE TABLE `alatnazivi` (
  `id` int(10) NOT NULL,
  `vrsta_namjena` varchar(50) DEFAULT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `aktivan` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alatnazivi`
--

INSERT INTO `alatnazivi` (`id`, `vrsta_namjena`, `naziv`, `aktivan`, `created_at`, `updated_at`) VALUES
(1, 'Alati za rezanje', 'Kružna pila za formatizovanje ploče', 1, '2020-07-21 18:37:07', '2020-07-23 18:06:59'),
(2, 'Alati za rezanje', 'Tračna pila za brentu', 0, '2020-07-21 18:37:07', '2020-07-23 18:14:41'),
(3, 'Alati za rezanje', 'Tračna pila za bansek', 1, '2020-07-21 18:37:07', '2020-07-23 18:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Travel', 'Travel ideas for everyone', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(2, 'Food', 'Our favourite recipes', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(3, 'Home', 'The latest trends in home decorations', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(4, 'Fashion', 'Stay in touch with the latest trends', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(5, 'Health', 'An apple a day keeps the doctor away', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(7, 'nova kat', 'qweqwerwr', '2020-06-02 20:46:48', '2020-06-02 20:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `configsifre`
--

CREATE TABLE `configsifre` (
  `id` int(10) NOT NULL,
  `tabela` varchar(50) DEFAULT NULL,
  `mattip_id` int(5) DEFAULT NULL,
  `polje` varchar(50) DEFAULT NULL,
  `sifra` varchar(50) DEFAULT NULL,
  `opis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='sadrži male šifratrnie koji su bili u config.php fajlu';

--
-- Dumping data for table `configsifre`
--

INSERT INTO `configsifre` (`id`, `tabela`, `mattip_id`, `polje`, `sifra`, `opis`) VALUES
(7, 'materijali', 11, 'vrsta_podloge', '11_Platno', 'Platno'),
(8, 'materijali', 11, 'vrsta_podloge', '11_Papir', 'Papir'),
(9, 'materijali', 11, 'vrsta_podloge', '11_Flex', 'Flex'),
(10, 'materijali', 9, 'proizvodjac', '09_Dunlop', 'Dunlop'),
(11, 'materijali', 9, 'proizvodjac', '09_Kleiberit', 'Kleiberit'),
(12, 'materijali', 4, 'namjena', '04_Za tapaciranje', 'Za tapaciranje'),
(13, 'materijali', 4, 'namjena', '04_Za pakovanje', 'Za pakovanje'),
(14, 'materijali', 5, 'namjena', '05_Za tapaciranje', 'Za tapaciranje'),
(15, 'materijali', 11, 'namjena', '11_Brušenje drveta', 'Brušenje drveta'),
(16, 'materijali', 11, 'namjena', '11_Brušenje temeljnog laka', 'Brušenje temeljnog laka'),
(17, 'materijali', 4, 'forma_oblik', '04_Plast', 'Plašt'),
(18, 'materijali', 4, 'forma_oblik', '04_Kutija', 'Kutija'),
(19, 'materijali', 5, 'sp_tezina', '05_1.1', '1.1'),
(20, 'materijali', 5, 'sp_tezina', '05_1.2', '1.2'),
(21, 'materijali', 6, 'gustina', '06_30', '30'),
(22, 'materijali', 6, 'gustina', '06_40', '40'),
(23, 'materijali', 6, 'gustina', '06_50', '50'),
(24, 'materijali', 6, 'tvrdoca', '06_20T', '20T'),
(25, 'materijali', 6, 'tvrdoca', '06_25T', '25T'),
(26, 'materijali', 6, 'tvrdoca', '06_30T', '30T'),
(27, 'materijali', 6, 'tvrdoca', '06_18PT', '18PT'),
(28, 'materijali', 1, 'klasa', '01_AB', 'AB'),
(29, 'materijali', 1, 'klasa', '01_BC', 'BC'),
(30, 'materijali', 1, 'klasa', '01_CD', 'CD'),
(31, 'materijali', 2, 'klasa', '02_Sirova', 'Sir.'),
(32, 'materijali', 2, 'klasa', '02_Bijela', 'Bijel.'),
(33, 'materijali', 2, 'klasa', '02_Oplemenjena', 'Oplemenjena'),
(34, 'materijali', 2, 'klasa', '02_AA', 'AA'),
(35, 'materijali', 2, 'klasa', '02_AC', 'AC'),
(36, 'materijali', 2, 'klasa', '02_CC-tapaciranje', 'CC-tapaciranje'),
(37, 'materijali', 4, 'klasa', '04_B-2Š', 'B-2Š'),
(38, 'materijali', 4, 'klasa', '04_B-TŠ', 'B-TŠ'),
(39, 'materijali', 4, 'klasa', '04_B-2T', 'B-2T'),
(40, 'materijali', 4, 'klasa', '04_CB-T2Š', 'CB-T2Š'),
(41, 'materijali', 4, 'klasa', '04_1100gr', '1100gr'),
(42, 'materijali', 5, 'klasa', '05_A', 'A'),
(43, 'materijali', 6, 'klasa', '06_A', 'A'),
(44, 'materijali', 6, 'klasa', '06_B', 'B'),
(45, 'materijali', 3, 'br_linija', '03_3', '3'),
(46, 'materijali', 3, 'br_linija', '03_4', '4'),
(47, 'materijali', 4, 'br_slojeva', '04_3', '3'),
(48, 'materijali', 4, 'br_slojeva', '04_5', '5'),
(49, 'materijali', 3, 'sirina', '03_50', '50'),
(50, 'materijali', 3, 'sirina', '03_60', '60'),
(51, 'materijali', 3, 'sirina', '03_70', '70'),
(52, 'materijali', 1, 'duz_razred', '01_600', 'do 600'),
(53, 'materijali', 1, 'duz_razred', '01_900', '600-900'),
(54, 'materijali', 1, 'duz_razred', '01_preko_900', 'preko 900'),
(55, 'materijali', 11, 'granulacija', '11_120', '120'),
(56, 'materijali', 11, 'granulacija', '11_150', '150'),
(57, 'materijali', 11, 'granulacija', '11_180', '180'),
(58, 'materijali', 11, 'granulacija', '11_280', '280'),
(59, 'materijali', 11, 'granulacija', '11_600', '600'),
(60, 'materijali', 1, 'debljina', '30', '30'),
(61, 'materijali', 1, 'debljina', '40', '40'),
(62, 'materijali', 1, 'debljina', '50', '50'),
(63, 'materijali', 2, 'debljina', '10', '10'),
(64, 'materijali', 5, 'debljina', '10', 'standardna'),
(65, 'materijali', 2, 'debljina', '12', '12'),
(66, 'materijali', 2, 'debljina', '16', '16'),
(67, 'materijali', 2, 'debljina', '6_5', '6.5'),
(68, 'materijaii', 2, 'debljina', '2_8', '2.8'),
(69, 'materijali', 2, 'debljina', '3_2', '3.2'),
(70, 'materijali', 10, 'namjena', '10_B', 'Bojenje/bajcovanje'),
(71, 'materijali', 10, 'namjena', '10_TL', 'Temeljno lakiranje'),
(72, 'materijali', 10, 'namjena', '10_ZL_U', 'Završno lakiranje ili uljenje'),
(74, 'materijali', 5, 'sp_tezina', '05_1.5', '1.5'),
(75, 'materijali', 2, 'debljina', '7_5', '7.5'),
(76, 'materijali', 9, 'proizvodjac', '09_opisni', '(dat opisno)'),
(77, 'materijali', 6, 'gustina', '06_18', '18'),
(78, 'materijali', 6, 'gustina', '06_25', '25'),
(79, 'kupci', NULL, 'status', '0', 'neaktivan'),
(80, 'kupci', NULL, 'status', '1', 'aktivan'),
(81, 'kupci', NULL, 'status', '2', 'povlašten'),
(82, 'materijali', 5, 'debljina', '99', '(data opisno)');

-- --------------------------------------------------------

--
-- Table structure for table `elementi`
--

CREATE TABLE `elementi` (
  `id` int(10) NOT NULL,
  `proizvod_id` int(10) NOT NULL,
  `naziv` varchar(150) DEFAULT NULL,
  `mattip_id` int(10) NOT NULL,
  `sklop` tinyint(4) DEFAULT NULL,
  `id_nadredjenog` int(10) DEFAULT NULL,
  `materijal_id` int(10) NOT NULL,
  `elint_01` int(10) DEFAULT NULL,
  `elint_02` int(10) DEFAULT NULL,
  `elint_03` int(10) DEFAULT NULL,
  `elint_04` int(10) DEFAULT NULL,
  `elint_05` int(10) DEFAULT NULL,
  `elint_06` int(10) DEFAULT NULL,
  `elint_07` int(10) DEFAULT NULL,
  `elvar_21` varchar(50) DEFAULT NULL,
  `elvar_22` varchar(50) DEFAULT NULL,
  `elvar_23` varchar(50) DEFAULT NULL,
  `eltxt_31` text DEFAULT NULL,
  `izvorni_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elementi`
--

INSERT INTO `elementi` (`id`, `proizvod_id`, `naziv`, `mattip_id`, `sklop`, `id_nadredjenog`, `materijal_id`, `elint_01`, `elint_02`, `elint_03`, `elint_04`, `elint_05`, `elint_06`, `elint_07`, `elvar_21`, `elvar_22`, `elvar_23`, `eltxt_31`, `izvorni_id`, `created_at`, `updated_at`) VALUES
(1, 6, 'lijeva vrata ormarića', 1, 0, 0, 2, 1950000, 180000, 30000, 1000000, 100000, 30000, 1000, 'BC', NULL, NULL, '-', 1, '2020-10-04 13:08:09', '2020-12-29 17:39:03'),
(3, 6, 'Sanduk plakara', 2, 0, 0, 6, 1300000, 200000, 5000, NULL, NULL, NULL, 3000, NULL, NULL, NULL, '-', 3, '2020-10-04 18:24:30', '2020-11-19 20:57:51'),
(4, 9, 'lijeva vrata plakara', 1, 0, 0, 5, 1000000, 2000, 3000, 4000, 5000, 6000, 7000, 'CD', NULL, NULL, '-', 4, '2020-10-04 13:08:09', '2020-10-18 21:26:21'),
(12, 9, 'skroz n ovo u plakaru', 4, 0, 43, 16, 234000, 234000, 3000, 43000, 43000, 34000, NULL, 'Za tapaciranje', 'Kutija', 'CB-T2Š', '-', 12, '2020-10-08 19:28:02', '2020-10-18 21:26:51'),
(43, 9, 'okvir plakara', 2, 1, 0, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 43, '2020-10-08 21:35:10', '2020-10-11 18:47:06'),
(48, 6, 'ispuna sjedišta', 6, 0, 0, 19, 2000, 500000, 200000, 300000, 2000, NULL, NULL, 'Standardna', 'B', '30T', '-', 48, '2020-10-08 21:50:27', '2020-11-19 21:14:22'),
(49, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 49, '2020-10-08 21:53:33', '2020-10-19 20:35:46'),
(50, 1, 'Noga - zadnja lijeva', 3, 0, 1, 12, 1000, 2000, 3000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 50, '2020-10-08 22:11:52', '2020-12-16 16:47:03'),
(52, 9, 'daska', 1, 0, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, '-', 52, '2020-10-09 14:14:40', '2020-10-18 18:47:41'),
(54, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 54, '2020-10-09 16:03:44', '2020-10-12 20:12:32'),
(55, 11, 'sada se zovem ovako', 11, 1, 0, 566, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 55, '2020-10-09 18:38:33', '2020-10-11 19:10:25'),
(56, 11, 'tezthdgb', 3, 0, 55, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 56, '2020-10-09 18:42:24', '2020-10-11 19:09:35'),
(57, 6, 'presvlaka nekakva', 4, 0, 0, 15, 45000, 21000, 41000, 5000, 4000, 2000, 0, 'Za pakovanje', 'Kutija', '1100gr', '-', 57, '2020-10-11 12:16:07', '2020-11-19 21:10:24'),
(60, 16, 'zadnja noga', 1, 0, 0, 675, 500000, 60000, 26000, 550000, 80000, 30000, 2000, NULL, NULL, NULL, '-', 60, '2020-10-12 14:36:08', '2021-02-14 09:07:25'),
(64, 1, 'Presvlaka naslona', 7, 0, 94, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 64, '2020-10-12 15:59:12', '2020-10-20 17:14:34'),
(66, 1, 'Sjedište2', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 66, '2020-10-14 22:46:30', '2021-08-19 20:56:22'),
(67, 9, 'vijci za sklapanje', 12, 0, 43, 570, 24000, NULL, NULL, NULL, NULL, NULL, NULL, 'komad', NULL, NULL, 'af asa dsf ads gasdgasg sdf asgysdfhsdfh sfh yfh ysdj sj sdfrgs dfgds sd afd a ahadh h fa asfh a', 67, '2020-10-16 13:45:00', '2020-10-18 21:12:24'),
(68, 9, 'ljrp', 2, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 'Bijela', NULL, NULL, '-', 68, '2020-10-18 19:20:20', '2020-10-18 21:31:18'),
(69, 9, 'gurtna', 3, 0, 0, 13, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 69, '2020-10-18 21:42:59', '2020-10-18 21:42:59'),
(70, 11, 'novi element', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 70, '2020-10-19 18:31:02', '2020-10-19 18:31:02'),
(71, 11, 'novi element', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 71, '2020-10-19 18:31:04', '2020-10-19 18:31:04'),
(72, 11, 'novi element', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 72, '2020-10-19 18:31:09', '2020-10-19 18:31:09'),
(73, 11, 'novi element', 12, 0, 0, 577, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 73, '2020-10-19 18:31:22', '2020-10-19 18:31:22'),
(78, 0, 'asda', 12, 0, 0, 577, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 78, '2020-10-19 18:43:48', '2020-10-19 18:43:48'),
(79, 0, 'asda', 12, 0, 0, 577, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 79, '2020-10-19 18:43:50', '2020-10-19 18:43:50'),
(80, 0, 'asda', 12, 0, 0, 577, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 80, '2020-10-19 18:43:51', '2020-10-19 18:43:51'),
(91, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 91, '2020-10-19 19:42:31', '2020-10-19 19:43:30'),
(92, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 92, '2020-10-19 20:07:34', '2020-10-19 20:07:34'),
(93, 9, 'nova sifra', 3, 1, 33, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 93, '2020-10-19 21:03:00', '2020-10-19 21:03:00'),
(94, 1, 'Naslon stolice', 1, 1, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 94, '2020-10-20 15:26:49', '2020-10-20 17:15:28'),
(96, 6, 'zadnja strana ormara', 5, 0, 0, 17, 50000, 1000000, 40000, 1000000, 2000, 1000, 3000, 'Za tapaciranje', 'A', '1.1', '-', 96, '2020-11-19 20:40:25', '2021-05-28 15:24:09'),
(97, 6, 'neka gurtna', 3, 0, 0, 13, 3000, 50000, 4000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 97, '2020-11-19 21:29:19', '2021-03-30 17:50:22'),
(98, 6, 'presvlaka sećije', 7, 0, 0, 114, NULL, 400000, 4000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 98, '2020-11-19 21:41:01', '2020-11-19 21:41:27'),
(99, 6, 'lepilo', 9, 0, 0, 533, 2000, NULL, NULL, NULL, NULL, NULL, NULL, 'Dunlop', NULL, NULL, '-', 99, '2020-11-19 21:47:31', '2020-11-19 21:48:22'),
(100, 6, 'čime se farba', 10, 0, 0, 540, 3000, NULL, NULL, NULL, NULL, NULL, NULL, 'polupokrivni', NULL, NULL, '-', 100, '2020-11-19 21:54:20', '2020-11-19 21:54:47'),
(101, 6, 'brusni', 11, 0, 0, 566, 400000, 30000, 1000, NULL, NULL, NULL, NULL, 'Brušenje drveta', 'Papir', '600', '-', 101, '2020-11-19 22:08:15', '2020-11-19 22:08:53'),
(102, 6, 'okov', 12, 0, 0, 569, 50000, 0, 0, 0, 0, 0, 0, 'komad', NULL, NULL, 'evo dam malo opišemo ovu kesu od 505 vijaka', 102, '2020-11-19 22:10:48', '2020-11-19 22:59:07'),
(103, 6, 'šarga', 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'evo da se malo raspištoljimo sa ovim opisima, juhuhhiuhu evo da se malo raspištoljimo sa ovim opisima, juhuhhiuhu evo da se malo raspištoljimo sa ovim op', 103, '2020-11-19 22:33:33', '2020-11-19 23:04:32'),
(104, 6, 'nova presvlaka', 7, 0, 103, 103, 0, 30000, 5000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 104, '2020-11-23 15:56:51', '2020-11-23 15:57:11'),
(105, 6, 'test', 9, 0, 0, 534, 24000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 105, '2020-12-21 17:39:20', '2020-12-21 17:39:41'),
(107, 9, 'novia gurtnau plakaru', 3, 0, 0, 14, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 107, '2021-01-23 09:11:11', '2021-01-23 09:11:11'),
(108, 18, 'noga e', 1, 0, 240, 4, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-01-23 18:07:02', '2021-08-19 19:22:48'),
(109, 18, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-01-23 21:00:16', '2021-03-30 17:54:13'),
(110, 19, 'Geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '0', '0', 'opis', 110, '2021-01-31 14:19:56', '2021-01-31 14:19:56'),
(111, 19, 'Korpus', 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'drugi sklop u proizvodu', 111, '2021-01-31 14:31:55', '2021-01-31 14:31:55'),
(115, 19, 'zadnja noga 23', 1, 0, 111, 705, 460000, 81000, 44000, 440000, 44000, 50000, 10000, NULL, NULL, NULL, 'nema', 115, '2021-01-31 14:59:36', '2021-02-11 11:27:27'),
(118, 20, 'Geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'opis ge[tela', 118, '2021-01-31 16:45:24', '2021-01-31 16:45:24'),
(119, 20, 'zadnja noga', 1, 0, 118, 665, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 119, '2021-01-31 16:47:02', '2021-01-31 16:47:02'),
(120, 19, 'sjedište', 2, 0, 0, 712, 233000, 333000, 223000, 443000, 555000, 555000, 1000, NULL, NULL, NULL, '-', 120, '2021-01-31 16:54:56', '2021-01-31 17:16:02'),
(121, 19, 'naslon', 2, 0, 0, 721, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, '-', 121, '2021-01-31 17:40:56', '2021-01-31 17:42:48'),
(123, 19, 'karton naslona', 4, 0, 0, 715, 1000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 123, '2021-01-31 17:58:01', '2021-02-08 20:27:46'),
(124, 19, 'swwq', 6, 0, 0, 718, 44000, 22000, 474000, 32000, 42000, 42000, 52000, NULL, NULL, NULL, 'spužva postala sklop pa nazad u spužve', 124, '2021-02-07 18:19:08', '2021-02-08 20:18:20'),
(125, 19, 'gurtna kućna', 3, 0, 0, 14, NULL, NULL, 25000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 125, '2021-02-08 18:57:48', '2021-02-08 18:57:48'),
(126, 19, 'spužva br II0', 9, 0, 0, 533, 2730, 23000, 24000, 25000, 26000, 0, 0, NULL, NULL, NULL, 'ehej', 126, '2021-02-08 19:06:39', '2021-02-11 11:39:23'),
(127, 19, 'nova presvlaka', 7, 0, 0, 106, NULL, 20000, 3000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 127, '2021-02-08 19:18:41', '2021-02-08 19:18:41'),
(128, 19, 'masivčina', 1, 0, 0, 665, 117000, 227000, 33000, 117000, 117000, 44000, 2000, NULL, NULL, NULL, '-', 128, '2021-02-08 19:19:29', '2021-02-11 11:27:41'),
(129, 19, 'nova skroz gurtna', 0, 1, 110, 0, 12000, 12000, 16000, 2000, 2000, 0, 0, NULL, NULL, NULL, 'evo normalnog opisa', 129, '2021-02-08 19:42:15', '2021-02-08 20:30:58'),
(130, 16, 'Geštel/kostur', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'spojeni elementi masiva', 130, '2021-02-14 15:29:36', '2021-02-14 15:29:36'),
(131, 16, 'elem 2', 1, 0, 0, 583, 1312000, 13231000, 12313000, 231000, 12312000, 2313000, 3000, NULL, NULL, NULL, '-', 131, '2021-05-19 18:47:19', '2021-05-19 18:47:19'),
(132, 16, 'neki alk', 10, 0, 0, 540, 1000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 132, '2021-05-19 19:09:14', '2021-05-19 19:09:14'),
(133, 1, '-', 2, 0, 0, 9, 22000, 0, 0, 0, 0, 0, 3000, NULL, NULL, NULL, '-', 133, '2021-05-24 16:29:31', '2021-05-24 16:29:31'),
(134, 1, '-', 2, 0, 0, 6, 1000000, 1000000, 10000, 2000000, 2000000, 20000, 3000, NULL, NULL, NULL, '-', 134, '2021-05-24 17:44:43', '2021-05-24 17:48:34'),
(135, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 135, '2021-05-25 18:44:35', '2021-05-25 18:44:35'),
(136, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 136, '2021-05-25 18:44:35', '2021-05-25 18:44:35'),
(137, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 137, '2021-05-25 18:44:35', '2021-05-25 18:44:35'),
(138, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 138, '2021-05-25 18:44:35', '2021-05-25 18:44:35'),
(139, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 139, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(140, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 140, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(141, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 141, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(142, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 142, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(143, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 143, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(144, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 144, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(145, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 145, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(146, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 146, '2021-05-25 18:46:43', '2021-05-25 18:46:43'),
(147, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 147, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(148, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 148, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(149, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 149, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(150, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 150, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(151, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 151, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(152, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 152, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(153, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 153, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(154, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 154, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(155, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 155, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(156, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 156, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(157, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 157, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(158, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 158, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(159, 14, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 159, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(160, 14, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 160, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(161, 14, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 161, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(162, 14, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 162, '2021-05-25 18:47:46', '2021-05-25 18:47:46'),
(163, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 163, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(164, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 164, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(165, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 165, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(166, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 166, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(167, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 167, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(168, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 168, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(169, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 169, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(170, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 170, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(171, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 171, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(172, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 172, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(173, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 173, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(174, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 174, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(175, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 175, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(176, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 176, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(177, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 177, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(178, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 178, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(179, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 179, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(180, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 180, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(181, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 181, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(182, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 182, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(183, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 183, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(184, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 184, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(185, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 185, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(186, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 186, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(187, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 187, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(188, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 188, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(189, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 189, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(190, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 190, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(191, 39, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 191, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(192, 39, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 192, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(193, 39, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 193, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(194, 39, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 194, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(195, 40, 'zadnja noga', 1, 0, 0, 675, 500000, 60000, 26000, 550000, 80000, 30000, 2000, NULL, NULL, NULL, '-', 195, '2021-05-25 18:56:02', '2021-05-25 18:56:02'),
(196, 40, 'Geštel/kostur', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'spojeni elementi masiva', 196, '2021-05-25 18:56:02', '2021-05-25 18:56:02'),
(197, 40, 'elem 2', 1, 0, 0, 583, 1312000, 13231000, 12313000, 231000, 12312000, 2313000, 3000, NULL, NULL, NULL, '-', 197, '2021-05-25 18:56:02', '2021-05-25 18:56:02'),
(198, 40, 'neki alk', 10, 0, 0, 540, 1000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 198, '2021-05-25 18:56:02', '2021-05-25 18:56:02'),
(199, 41, 'zadnja noga', 1, 0, 0, 675, 500000, 60000, 26000, 550000, 80000, 30000, 2000, NULL, NULL, NULL, '-', 199, '2021-05-25 20:50:04', '2021-05-25 20:50:04'),
(200, 42, 'zadnja noga', 1, 0, 0, 675, 500000, 60000, 26000, 550000, 80000, 30000, 2000, NULL, NULL, NULL, '-', 200, '2021-05-25 20:53:16', '2021-05-25 20:53:16'),
(201, 43, 'zadnja noga', 1, 0, 0, 675, 500000, 60000, 26000, 550000, 80000, 30000, 2000, NULL, NULL, NULL, '-', 201, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(202, 43, 'Geštel/kostur', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'spojeni elementi masiva', 202, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(203, 43, 'elem 2', 1, 0, 0, 583, 1312000, 13231000, 12313000, 231000, 12312000, 2313000, 3000, NULL, NULL, NULL, '-', 203, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(204, 43, 'neki alk', 10, 0, 0, 540, 1000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 204, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(205, 1, 'novi masiv', 1, 0, 0, 583, 0, 0, 0, 0, 0, 0, 1000, NULL, NULL, NULL, '-', NULL, '2021-05-26 17:31:13', '2021-05-26 17:31:13'),
(206, 1, 'najnoviji novi', 1, 0, 0, 3, 0, 0, 0, 0, 0, 0, 45000, NULL, NULL, NULL, '-', 999, '2021-05-26 17:34:11', '2021-05-26 17:34:11'),
(207, 1, 'još ovaj', 1, 0, 0, 3, 0, 0, 0, 0, 0, 0, 1000, NULL, NULL, NULL, '-', NULL, '2021-05-26 17:37:56', '2021-05-26 17:37:56'),
(208, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 49, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(209, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 54, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(210, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 91, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(211, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 92, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(212, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 135, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(213, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 136, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(214, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 137, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(215, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 138, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(216, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 139, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(217, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 140, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(218, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 141, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(219, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 142, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(220, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 143, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(221, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 144, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(222, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 145, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(223, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 146, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(224, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 147, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(225, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 148, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(226, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 149, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(227, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 150, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(228, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 151, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(229, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 152, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(230, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 153, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(231, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 154, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(232, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 155, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(233, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 156, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(234, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 157, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(235, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 158, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(236, 44, 'dio krevetića 2', 5, 0, 0, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 159, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(237, 44, 'postava kreveta', 6, 1, 0, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 160, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(238, 44, 'ogradica', 10, 0, 0, 549, 567000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', 161, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(239, 44, 'evo ga', 6, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 162, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(240, 18, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:02:49', '2021-05-26 18:02:49'),
(241, 45, 'noga', 1, 0, 240, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:03:48', '2021-05-26 18:03:48'),
(242, 45, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:03:48', '2021-05-26 18:03:48'),
(243, 45, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:03:48', '2021-05-26 18:03:48'),
(244, 46, 'noga', 1, 0, 240, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:06:47', '2021-05-26 18:06:47'),
(245, 46, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:06:47', '2021-05-26 18:06:47'),
(246, 46, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:06:47', '2021-05-26 18:06:47'),
(247, 47, 'noga', 1, 0, NULL, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:08:24', '2021-05-26 18:08:24'),
(248, 47, 'noga 2', 1, 0, NULL, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:08:24', '2021-05-26 18:08:24'),
(249, 47, 'geštel', 0, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:08:24', '2021-05-26 18:08:24'),
(250, 48, 'noga', 1, 0, 252, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:18:58', '2021-05-26 18:18:58'),
(251, 48, 'noga 2', 1, 0, NULL, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:18:58', '2021-05-26 18:18:58'),
(252, 48, 'geštel', 0, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:18:58', '2021-05-26 18:18:58'),
(253, 48, 'mad', 5, 0, 0, 717, 0, 0, 0, 0, 1000, 11000, 1000, NULL, NULL, NULL, '-', NULL, '2021-05-26 18:24:25', '2021-05-26 18:24:25'),
(254, 48, 'lklklk', 3, 0, 0, 14, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', NULL, '2021-05-26 18:31:44', '2021-05-26 18:31:44'),
(255, 48, 'lklklk', 3, 0, 0, 14, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', NULL, '2021-05-26 18:31:49', '2021-05-26 18:31:49'),
(256, 48, 'lklklk', 3, 0, 0, 14, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', NULL, '2021-05-26 18:31:52', '2021-05-26 18:31:52'),
(259, 49, 'noga', 1, 0, 261, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(260, 49, 'noga 2', 1, 0, NULL, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(261, 49, 'geštel', 0, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(262, 49, 'baon', 3, 0, NULL, 703, 0, 0, 88000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 257, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(263, 49, 'gupi', 3, 0, NULL, 13, 0, 0, 23000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 258, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(264, 50, 'noga', 1, 0, 266, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(265, 50, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(266, 50, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(267, 50, 'baon', 3, 0, 0, 703, 0, 0, 88000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 257, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(268, 50, 'gupi', 3, 0, 0, 13, 0, 0, 23000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 258, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(269, 51, 'noga', 1, 0, 1, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(270, 51, 'noga 2', 1, 0, 1, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(271, 51, 'geštel', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(272, 51, 'baon', 3, 0, 1, 703, 0, 0, 88000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 257, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(273, 51, 'gupi', 3, 0, 1, 13, 0, 0, 23000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 258, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(274, 52, 'noga', 1, 0, 1, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(275, 52, 'noga 2', 1, 0, 1, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(276, 52, 'geštel', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(277, 53, 'noga', 1, 0, 1, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(278, 53, 'noga 2', 1, 0, 1, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(279, 53, 'geštel', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(280, 54, 'noga', 1, 0, 240, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(281, 54, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(282, 54, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(283, 55, 'noga', 1, 0, 1, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(284, 55, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(285, 55, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(286, 56, 'noga', 1, 0, 1, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(287, 56, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(288, 56, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(289, 57, 'noga', 1, 0, 240, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(290, 57, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(291, 57, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(292, 58, 'noga', 1, 0, 294, 674, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-05-26 20:53:38', '2021-05-26 20:53:38'),
(293, 58, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-05-26 20:53:38', '2021-05-26 20:53:38'),
(294, 58, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-05-26 20:53:38', '2021-05-26 20:53:38'),
(295, 58, '-sdasd', 1, 0, 0, 584, 500000, 500000, 500000, 500000, 500000, 500000, 3000, NULL, NULL, NULL, '-', 295, '2021-05-26 20:58:26', '2021-05-26 20:58:26'),
(296, 18, 'n oga dod', 1, 0, 0, 3, 455000, 322000, 235000, 456000, 223000, 232000, 1000, NULL, NULL, NULL, '-', 296, '2021-05-27 13:29:06', '2021-06-15 17:33:03'),
(297, 6, 'selotejp', 13, 0, 0, 729, 2000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'sdfsw', 297, '2021-05-28 15:46:59', '2021-05-28 15:46:59'),
(298, 18, 'novi otpresak borna', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2000, NULL, NULL, NULL, '-', 298, '2021-05-30 10:19:59', '2021-05-30 10:19:59'),
(299, 18, 'gurgr', 3, 0, 0, 704, 0, 0, 35000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 299, '2021-05-30 11:45:43', '2021-07-01 14:47:35'),
(300, 59, 'pres', 7, 0, 0, 26, 0, 0, 2000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 300, '2021-05-31 17:46:56', '2021-05-31 17:53:26'),
(301, 59, '-', 6, 0, 0, 19, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 301, '2021-05-31 17:54:21', '2021-05-31 17:54:21'),
(302, 59, 'stopa', 1, 0, 0, 641, 0, 0, 0, 0, 0, 0, 3000, NULL, NULL, NULL, '-', 302, '2021-05-31 17:56:15', '2021-05-31 17:56:15'),
(303, 67, 'noga', 1, 0, 0, 3, 111000, 111000, 111000, 111000, 111000, 111000, 111000, NULL, NULL, NULL, '-', 303, '2021-09-05 08:19:16', '2021-09-05 08:19:16'),
(304, 70, 'noga e', 1, 0, 306, 4, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 108, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(305, 70, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 109, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(306, 70, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 240, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(307, 70, 'n oga dod', 1, 0, 0, 3, 455000, 322000, 235000, 456000, 223000, 232000, 1000, NULL, NULL, NULL, '-', 296, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(308, 70, 'novi otpresak borna', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2000, NULL, NULL, NULL, '-', 298, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(309, 70, 'gurgr', 3, 0, 0, 704, 0, 0, 35000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 299, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(310, 71, 'noga e', 1, 0, 312, 4, 100000, 100000, 100000, 110000, 110000, 110000, 2000, NULL, NULL, NULL, '-', 304, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(311, 71, 'noga 2', 1, 0, 0, 672, 220000, 220000, 220000, 330000, 330000, 330000, 1000, NULL, NULL, NULL, '-', 305, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(312, 71, 'geštel', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '-', 306, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(313, 71, 'n oga dod', 1, 0, 0, 3, 455000, 322000, 235000, 456000, 223000, 232000, 1000, NULL, NULL, NULL, '-', 307, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(314, 71, 'novi otpresak borna', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2000, NULL, NULL, NULL, '-', 308, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(315, 71, 'gurgr', 3, 0, 0, 704, 0, 0, 35000, 0, 0, 0, 0, NULL, NULL, NULL, '-', 309, '2021-09-06 16:56:32', '2021-09-06 16:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `picture`, `category_id`, `status`, `date`, `show_on_homepage`, `options`, `created_at`, `updated_at`) VALUES
(1, '5 citybreak ideas for this year', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut. Etiam scelerisque dapibus lorem, vitae maximus ante condimentum quis. Maecenas ac arcu a lacus aliquet elementum posuere id nunc. Curabitur sem lorem, faucibus ac enim ut, vestibulum feugiat ante. Fusce hendrerit leo nibh, nec consectetur nulla venenatis et. Nulla tincidunt neque quam, sit amet tincidunt quam blandit in. Nunc fringilla rutrum tortor, sit amet bibendum augue convallis a. Etiam mauris orci, sollicitudin eu condimentum sed, dictum ut odio. Sed vel ligula in lectus scelerisque ornare.Mauris dolor nisl, finibus eget sem in, ultrices semper libero. Nullam accumsan suscipit tortor, a vestibulum sapien imperdiet quis. Donec pretium mauris quis lectus sodales accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec tincidunt semper orci eu molestie. Vivamus fermentum enim vitae magna elementum, quis iaculis augue tincidunt. Donec fermentum quam facilisis sem dictum rutrum. Nunc nec urna lectus. Nulla nec ultrices lorem. Integer ac ante massa.', 'pictures/9Pj4oHb0CafswkWFgFjtC9pMalWwZC1dK6cuwxHy.png', 1, 'archive', '2020-05-19', 1, '[\"0\",\"1\"]', '2020-05-28 12:52:02', '2020-07-13 13:57:36'),
(2, 'Top 10 restaurants in Italy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut. Etiam scelerisque dapibus lorem, vitae maximus ante condimentum quis. Maecenas ac arcu a lacus aliquet elementum posuere id nunc. Curabitur sem lorem, faucibus ac enim ut, vestibulum feugiat ante. Fusce hendrerit leo nibh, nec consectetur nulla venenatis et. Nulla tincidunt neque quam, sit amet tincidunt quam blandit in. Nunc fringilla rutrum tortor, sit amet bibendum augue convallis a. Etiam mauris orci, sollicitudin eu condimentum sed, dictum ut odio. Sed vel ligula in lectus scelerisque ornare.Mauris dolor nisl, finibus eget sem in, ultrices semper libero. Nullam accumsan suscipit tortor, a vestibulum sapien imperdiet quis. Donec pretium mauris quis lectus sodales accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec tincidunt semper orci eu molestie. Vivamus fermentum enim vitae magna elementum, quis iaculis augue tincidunt. Donec fermentum quam facilisis sem dictum rutrum. Nunc nec urna lectus. Nulla nec ultrices lorem. Integer ac ante massa.', NULL, 2, 'aktivna', '2020-05-28', 1, '[\"0\",\"1\"]', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(3, 'Cocktail ideas for your birthday party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla nulla. Donec luctus lorem justo, ut ullamcorper eros pellentesque ut. Etiam scelerisque dapibus lorem, vitae maximus ante condimentum quis. Maecenas ac arcu a lacus aliquet elementum posuere id nunc. Curabitur sem lorem, faucibus ac enim ut, vestibulum feugiat ante. Fusce hendrerit leo nibh, nec consectetur nulla venenatis et. Nulla tincidunt neque quam, sit amet tincidunt quam blandit in. Nunc fringilla rutrum tortor, sit amet bibendum augue convallis a. Etiam mauris orci, sollicitudin eu condimentum sed, dictum ut odio. Sed vel ligula in lectus scelerisque ornare.Mauris dolor nisl, finibus eget sem in, ultrices semper libero. Nullam accumsan suscipit tortor, a vestibulum sapien imperdiet quis. Donec pretium mauris quis lectus sodales accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec tincidunt semper orci eu molestie. Vivamus fermentum enim vitae magna elementum, quis iaculis augue tincidunt. Donec fermentum quam facilisis sem dictum rutrum. Nunc nec urna lectus. Nulla nec ultrices lorem. Integer ac ante massa.', NULL, 2, 'aktivna', '2020-05-28', 1, '[\"0\",\"1\"]', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(4, 'test2', 'sada', 'pictures/nTaEXRhWRj2JvCrLPrjkU60TOh8JfnUXbW5o80uW.jpeg', 4, 'aktivna', '2020-05-28', 0, NULL, '2020-05-28 20:20:41', '2020-05-28 20:20:41'),
(5, 'sdfsdf', 'sdfsdfsdf', 'pictures/irFN1UxKsQTGUB1SJsfOWQvesNLF878LDHuZDRJX.jpeg', 7, 'draft', '2020-06-02', 0, NULL, '2020-06-02 20:48:00', '2020-06-02 20:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `item_tag`
--

CREATE TABLE `item_tag` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_tag`
--

INSERT INTO `item_tag` (`item_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 2),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kupci`
--

CREATE TABLE `kupci` (
  `id` int(10) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `ulica_i_broj` varchar(100) DEFAULT NULL,
  `post_br_mjesto` varchar(100) DEFAULT NULL,
  `drzava` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `kontakt_osoba` varchar(100) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telefon` varchar(50) DEFAULT NULL,
  `jmb_jib` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`id`, `naziv`, `ulica_i_broj`, `post_br_mjesto`, `drzava`, `status`, `kontakt_osoba`, `mail`, `telefon`, `jmb_jib`, `created_at`, `updated_at`) VALUES
(1, 'Dragiša Popadić', 'Put u bolje sutra bb', '11000 Beograd', 'Srbija', '0', 'Dara Zavišić, sekretarica', 'email@server.com', '387 11 345 334', '0211972160017', '2021-05-12 20:47:46', '2022-03-17 23:55:04'),
(2, 'Agencija \"Perspektiva\"', 'Topolska 18', '11000 Beograd', 'Srbija', '1', 'Malina Vojvodić', 'adresa_neka@server.com', '555-123-456', '123125425156', '2021-05-12 20:48:02', '2022-03-18 21:17:50'),
(3, 'Jezdimir Uskoković', 'Šampiona tranzicije 69', '11000 Beograd', 'SR Jugoslavija', '2', NULL, 'elekronsk_posta@server.com', '011 666-555', '1234566778', '2021-05-18 20:12:27', '2022-02-13 18:49:31'),
(12, 'Ozren Soldatović', 'ulica i broj 14', '78000 Banja Luka', 'RS, BIH', '2', NULL, 'ozren.soldatovic@eunet.yu.rs', '123-345', '4443342432324', '2022-02-09 20:03:52', '2022-02-13 18:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `masina_mtag`
--

CREATE TABLE `masina_mtag` (
  `masina_id` int(10) UNSIGNED NOT NULL,
  `mtag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masina_mtag`
--

INSERT INTO `masina_mtag` (`masina_id`, `mtag_id`) VALUES
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `masine`
--

CREATE TABLE `masine` (
  `id` int(10) UNSIGNED NOT NULL,
  `r_br` int(5) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masinvrsta_id` int(10) UNSIGNED NOT NULL,
  `komada` int(3) DEFAULT NULL,
  `lokacija` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bruto_mjere` tinyint(1) NOT NULL DEFAULT 0,
  `masinlokacija_id` int(10) DEFAULT NULL,
  `inst_ee_kw` decimal(5,2) DEFAULT NULL,
  `opt_fi1` int(5) DEFAULT NULL,
  `opt_kom1` int(5) DEFAULT NULL,
  `opt_fi2` int(5) DEFAULT NULL,
  `opt_kom2` int(5) DEFAULT NULL,
  `opt_fi3` int(5) DEFAULT NULL,
  `opt_kom3` int(5) DEFAULT NULL,
  `kz` tinyint(1) NOT NULL DEFAULT 0,
  `kz_p` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kz_l` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `show_on_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `options` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masine`
--

INSERT INTO `masine` (`id`, `r_br`, `name`, `description`, `picture`, `masinvrsta_id`, `komada`, `lokacija`, `bruto_mjere`, `masinlokacija_id`, `inst_ee_kw`, `opt_fi1`, `opt_kom1`, `opt_fi2`, `opt_kom2`, `opt_fi3`, `opt_kom3`, `kz`, `kz_p`, `kz_l`, `status`, `date`, `show_on_homepage`, `options`, `created_at`, `updated_at`) VALUES
(4, 99, 'Tračna pila trupčara - horizontalna', 'neki tekst', 'pictures/jrEL8Ryz4U5uMpleK6vfLgUhbE1FB91PsZDyW5qr.jpeg', 10, NULL, NULL, 0, 8, '45.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'remont', NULL, 0, NULL, '2020-06-02 14:40:53', '2021-02-14 14:48:19'),
(5, 1, 'Poprečni presjekač - grubi', 'Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubiPoprečni presjekač - grubi Poprečni presjekač - grubi Poprečni presjekač - grubi', 'pictures/WGMAxUBsmxcTiPqulp9g7wtLg5hP5zutK6uSDXGI.jpeg', 18, NULL, NULL, 1, 1, '300.00', 80, 1, NULL, NULL, NULL, NULL, 1, '6/7', '50', 'aktivna', NULL, 0, NULL, '2020-06-04 11:45:18', '2021-05-22 19:01:14'),
(6, 2, 'Poprečni presjekač - Bansek', '-', 'pictures/hzrI3JIGGNqiPTFX92c5iD9nhrHp7r6Of2qO0gwZ.jpeg', 12, NULL, 'Pilana', 0, 1, '240.00', 160, 2, 1, 5, 1, 1, 0, '6-10', '50', 'otpisana', NULL, 0, NULL, '2020-06-04 16:34:16', '2020-12-07 20:56:09'),
(11, 7, 'Blanja', '-', 'pictures/Jzbo5uQLQZeXZyraIslYZXgogbCgTfbd8p1uXiR5.jpeg', 8, NULL, 'Pilana', 0, 2, '44.00', 1, 2, NULL, NULL, NULL, NULL, 0, '7', '8', 'aktivna', NULL, 0, NULL, '2020-06-25 19:52:58', '2021-05-21 20:14:30'),
(13, 4, 'nova mašina', 'aasd', 'pictures/ZEwjtYHwGaB9UbHoqx5VQYrElT0iWrgTDICF6bP7.jpeg', 8, NULL, NULL, 0, 6, '1.00', 1, 1, 1, NULL, 1, NULL, 1, '1', '1', 'remont', '2020-12-07', 0, NULL, '2020-12-07 21:00:49', '2020-12-07 21:00:49'),
(14, 17, '19točara', 'sa 19 na 17', 'pictures/KBipSpjN6jR0Wua8thPdNG2LajIXhNhIj071M19f.jpeg', 17, NULL, NULL, 0, 4, '1.00', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'aktivna', NULL, 0, NULL, '2021-02-14 15:23:03', '2021-02-14 15:25:49'),
(15, 22, 'skroz nova', 'sqweq', 'pictures/pKGPz6ZYsqnXqtVFWUBmvXtfAuPBnXoDGx4N7rWk.png', 11, NULL, NULL, 1, 2, '11.00', 11, 1, NULL, NULL, NULL, NULL, 0, '11', NULL, 'aktivna', NULL, 0, NULL, '2021-05-22 19:03:58', '2021-05-22 19:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `masinlokacije`
--

CREATE TABLE `masinlokacije` (
  `id` int(10) NOT NULL,
  `r_br` int(5) DEFAULT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `teh_koef` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masinlokacije`
--

INSERT INTO `masinlokacije` (`id`, `r_br`, `naziv`, `teh_koef`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hala 1  - krojačnica', 103, '2020-12-07 22:45:46', '2021-07-13 15:53:04'),
(2, 2, 'Hala 1 - mašinsko', 104, '2020-12-07 22:45:47', '2020-12-07 21:58:38'),
(3, 3, 'Hala 1  -  montaža', 102, '2020-12-07 22:45:47', '2020-12-07 22:45:53'),
(4, 4, 'Hala 2 - lakirnica', 103, '2020-12-07 22:45:48', '2020-12-07 22:45:52'),
(5, 5, 'Hala 2  - završna motaža i tapaciranje', 105, '2020-12-07 22:45:49', '2021-07-13 15:53:26'),
(6, 6, 'Hala 2  - krojenje i šivenje presvlaka', 109, '2020-12-07 22:45:50', '2020-12-07 22:16:51'),
(8, 7, 'Pilana', 102, '2020-12-07 22:33:08', '2021-07-13 15:53:51'),
(9, 12, 'trinaesto prae pod brojem 12', 5, '2021-02-14 15:06:13', '2021-07-13 15:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `masinvrste`
--

CREATE TABLE `masinvrste` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masinvrste`
--

INSERT INTO `masinvrste` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'blanjaricas', '-........', '2020-05-28 12:52:02', '2020-07-23 16:15:28'),
(2, 'brusilica', 'neki opis brusilice u pola 11 četvrtkom', '2020-05-28 12:52:02', '2020-06-18 18:38:00'),
(3, 'bušilica', '-', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(4, 'čeparica', '-', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(5, 'debljača', 'opis od preko  5 polja', '2020-05-28 12:52:02', '2020-06-18 19:01:35'),
(6, 'formatizer', '-', '2020-05-30 20:53:34', '2020-05-30 20:53:34'),
(7, 'glodalica', '-', '2020-06-02 13:55:01', '2020-06-02 13:55:01'),
(8, 'oscilatorna bušilica', '-', '2020-06-02 20:06:02', '2020-06-02 20:06:02'),
(9, 'parač', '-', '2020-06-02 20:51:17', '2020-06-02 20:51:17'),
(10, 'pila', '-', '2020-06-04 02:44:28', '2020-06-04 02:44:28'),
(11, 'presa', '-', '2020-06-04 10:57:00', '2020-06-04 10:57:00'),
(12, 'presjekač', '-', '2020-06-04 11:06:24', '2020-06-04 11:06:24'),
(13, 'raskrajač', '-', '2020-06-04 17:33:52', NULL),
(14, 'ravnalica', '-', '2020-06-04 17:40:20', NULL),
(16, 'stolarska mašina', '-', '2020-06-04 17:33:52', NULL),
(17, 'testna vrsta', 'neki kratakois testne vrste mašina', '2020-06-13 03:47:15', '2020-06-13 03:47:15'),
(18, 'krokotača', 'asdas sad asd ADS ADSA', '2020-06-15 16:25:50', '2020-06-15 16:25:50'),
(19, 'torokača', 'as aaf adf ADF', '2020-06-16 02:15:26', '2020-06-16 02:15:26'),
(20, 'koroguljača', 'asdfa  afads fas', '2020-06-18 16:07:10', '2020-06-18 16:07:10'),
(22, 'suportnjača', 'sdfaf asf af', '2020-06-18 16:26:32', '2020-06-18 16:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `materijali`
--

CREATE TABLE `materijali` (
  `id` int(10) NOT NULL,
  `naziv` varchar(200) DEFAULT '-',
  `dodatni_opis` varchar(50) DEFAULT '',
  `mattip_id` int(10) DEFAULT 0,
  `mattipvrsta_id` int(10) DEFAULT 0,
  `vrsta_podloge` varchar(50) DEFAULT '0',
  `vrsta_okova` varchar(50) DEFAULT NULL,
  `proizvodjac` varchar(50) DEFAULT '0',
  `namjena` varchar(50) DEFAULT '0',
  `forma_oblik` varchar(50) DEFAULT '0',
  `sp_tezina` varchar(50) DEFAULT NULL,
  `gustina` varchar(50) DEFAULT NULL,
  `tvrdoca` varchar(50) DEFAULT NULL,
  `klasa` varchar(50) DEFAULT '0',
  `br_linija` varchar(50) DEFAULT '0',
  `br_slojeva` varchar(50) DEFAULT '0',
  `debljina` int(11) DEFAULT NULL,
  `duz_trake` decimal(7,2) DEFAULT NULL,
  `sir_trake` decimal(7,2) DEFAULT NULL,
  `sirina` varchar(50) DEFAULT '0',
  `duz_razred` varchar(50) DEFAULT '0',
  `jed_mjere` varchar(50) DEFAULT '-',
  `cijena` int(10) DEFAULT NULL,
  `granulacija` varchar(50) DEFAULT NULL,
  `mattipoznaka_id` int(10) DEFAULT NULL,
  `kmat_01` int(10) DEFAULT NULL,
  `kmat_02` int(10) DEFAULT NULL,
  `kmat_03` int(10) DEFAULT NULL,
  `kmat_04` int(10) DEFAULT NULL,
  `kmat_05` int(10) DEFAULT NULL,
  `kmat_06` int(10) DEFAULT NULL,
  `kmat_07` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materijali`
--

INSERT INTO `materijali` (`id`, `naziv`, `dodatni_opis`, `mattip_id`, `mattipvrsta_id`, `vrsta_podloge`, `vrsta_okova`, `proizvodjac`, `namjena`, `forma_oblik`, `sp_tezina`, `gustina`, `tvrdoca`, `klasa`, `br_linija`, `br_slojeva`, `debljina`, `duz_trake`, `sir_trake`, `sirina`, `duz_razred`, `jed_mjere`, `cijena`, `granulacija`, `mattipoznaka_id`, `kmat_01`, `kmat_02`, `kmat_03`, `kmat_04`, `kmat_05`, `kmat_06`, `kmat_07`, `created_at`, `updated_at`) VALUES
(2, 'eve ga', '', 1, 46, '0', 'neki okov', '0', '04_Za tapaciranje', '04_Plast', '05_1.1', '06_30', '06_20T', '01_AB', '03_3', '04_3', 30, '1.00', '1.00', '03_50', '01_600', 'kom', 20000, NULL, 79, 100, 200, 0, 0, 0, 0, 0, '2020-08-04 20:13:06', '2021-01-28 13:01:00'),
(3, 'Masiv, Bukva - daska sirova parena, AB, 40, 600-900', NULL, 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 2310000, NULL, 0, 100, 200, 0, 0, 0, 0, 0, '2020-08-04 20:33:40', '2021-05-11 19:50:54'),
(4, 'Masiv, Bukva - daska suva parena, obavezan unos, obavezan unos, AB, 50, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 2675600, NULL, 0, 120, 200, 0, 0, 0, 0, 0, '2020-08-04 20:33:40', '2021-01-28 18:10:48'),
(5, 'Klenić', '', 1, 4, '11_Papir', '-', '09_Dunlop', '04_Za tapaciranje', '04_Plast', '05_1.1', '06_30', '06_20T', '01_BC', '03_3', '04_3', 50, '0.00', '0.00', '03_50', '01_preko_2000', '-', 120000, NULL, 1, 0, 0, 0, 0, 0, 0, 0, '2020-08-05 02:52:12', '2020-08-17 18:00:03'),
(6, 'Iverica sirova', '', 2, 5, '11_Platno', '-', '09_Dunlop', '04_Za tapaciranje', '04_Plast', '05_1.1', '06_30', '06_20T', '02_Sirova', '03_3', '04_3', 16, '0.00', '0.00', '03_50', '01_600', '-', 100000, NULL, 1, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 18:03:04', '2020-08-17 18:07:35'),
(7, 'Lesonit', '', 2, 6, '0', '-', '0', '0', '0', '0', '0', '0', '02_Bijela', '0', '0', 3, NULL, NULL, '0', '0', '-', 230000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:05:57', '2020-08-17 18:11:34'),
(8, 'Šperploča', '', 2, 7, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:05:59', '2020-08-17 20:06:00'),
(9, 'Furnirski otpresak', '', 2, 8, '0', '-', '0', '0', '0', '0', '0', '0', '02_AA', '0', '0', 12, NULL, NULL, '0', '0', '-', 330000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:06:04', '2020-08-17 18:12:03'),
(10, 'Furnirski otpresak AC', '', 2, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:09:50', '2020-08-17 20:09:52'),
(11, 'Furnirski otpresak - tapaciranje', '', 2, 8, '0', '-', '0', '0', '0', '0', '0', '0', '02_CC-tapaciranje', '0', '0', 2, NULL, NULL, '0', '0', '-', 180000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:09:51', '2020-08-17 18:12:39'),
(12, 'Gurtna 60', '', 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '03_4', '0', 0, NULL, NULL, '03_60', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:18:11', '2020-08-17 18:19:29'),
(13, 'Gurtna 50', '', 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '03_4', '0', 0, NULL, NULL, '03_50', '0', '-', 200000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:18:13', '2020-08-17 18:19:59'),
(14, 'Gurtna 70', '', 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '03_4', '0', 0, NULL, NULL, '03_70', '0', '-', 330000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:18:14', '2020-08-17 18:20:21'),
(15, 'Karton za tapaciranje', '', 4, 29, '0', '-', '0', '04_Za tapaciranje', '04_Plast', '0', '0', '0', '04_B-2Š', '0', '04_3', 0, NULL, NULL, '0', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:23:34', '2020-08-17 18:38:21'),
(16, 'Kutija za pakovanje', '', 4, 30, '0', '-', '0', '04_Za pakovanje', '04_Kutija', '0', '0', '0', '04_CB-T2Š', '0', '04_3', 0, NULL, NULL, '0', '0', '-', 250000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:23:36', '2020-08-17 18:39:03'),
(17, 'Ljepenka 1.1', '', 5, 31, '0', '-', '0', '05_Za tapaciranje', '0', '05_1.1', '0', '0', '05_A', '0', '0', 1, NULL, NULL, '0', '0', '-', 150000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:40:32', '2020-08-17 18:45:01'),
(18, 'Ljepenka 1.5', '', 5, 31, '0', '-', '0', '04_Za tapaciranje', '0', '05_1.2', '0', '0', '06_B', '0', '0', 2, NULL, NULL, '0', '0', '-', 150000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:40:35', '2020-08-17 18:45:48'),
(19, 'Spužva standardna', '', 6, 10, '0', '-', '0', '0', '0', '0', '06_30', '06_20T', '06_A', '0', '0', 0, NULL, NULL, '0', '0', '-', 210000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:49:59', '2020-08-17 18:50:33'),
(20, 'Spužva - crna', '', 6, 11, '0', '-', '0', '0', '0', '0', '06_50', '06_30T', '06_B', '0', '0', 0, NULL, NULL, '0', '0', '-', 330000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 20:50:00', '2020-08-17 18:51:07'),
(22, 's', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 33, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-28 13:05:00'),
(23, '8020 CASTELLO', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 34, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(24, '8623 CASTELLO', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 35, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(25, 'AFRICA 9901 WHITE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 36, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(26, 'Presvlaka, Eko koža, čćšđžČĆŠĐŽ, Kat. ozn.: AFRICA 9902 BEIGE', 'čćšđžČĆŠĐŽ', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 37, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-06-08 18:41:48'),
(27, 'AFRICA 9903 DARK BROWN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 38, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(28, 'AFRICA 9905 BROWN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 39, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(29, 'AFRICA 9906 GRAY', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 40, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(30, 'AFRICA 9907 BLACK', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 41, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(31, 'AFRIKA 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 42, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(32, 'AMBER 1001', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 43, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(33, 'AMBER 1018', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 44, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(34, 'AMBER 1019', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 45, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(35, 'AQUA 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 46, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(36, 'AQUA 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 47, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(37, 'AQUA 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 48, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(38, 'AQUA 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 49, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(39, 'AQUA 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 50, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(40, 'AQUA 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 51, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(41, 'AQUA 110 LINIJE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 52, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(42, 'AQUA 110 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 53, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(43, 'AQUA 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 54, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(44, 'AQUA 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 55, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(45, 'AQUA 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 56, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(46, 'AQUA 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 57, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(47, 'AQUA 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 58, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(48, 'AQUA 133', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 59, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(49, 'AQUA 136', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 60, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(50, 'AQUA 211', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 61, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(51, 'AQUA 311', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 62, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(52, 'AQUA 324', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 63, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(53, 'ARENA GORDON 10', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 64, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(54, 'ARENA GORDON 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 65, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(55, 'ARENA GORDON 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 66, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(56, 'ARENA GORDON 14', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 67, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(57, 'ARENA GORDON 15', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 68, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(58, 'ARENA GORDON 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 69, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(59, 'ARENA GORDON 17', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 70, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(60, 'ARENA GORDON 2', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 71, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(61, 'ARENA GORDON 3', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 72, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(62, 'ARENA GORDON 4', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 73, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(63, 'ARENA GORDON 8', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 74, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(64, 'ATLAS DARK BROWN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 75, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(65, 'AURA 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 76, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(66, 'BAHAMI 22', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 77, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(67, 'BAHAMI 31', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 78, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(68, 'BAHAMI 32', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 79, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(69, 'BAHAMI 33', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 80, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(70, 'BAHAMI 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 81, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(71, 'BAXAN 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 82, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(72, 'BAXAN 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 83, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(73, 'BOLZAN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 84, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(74, 'BOMBAJ 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 85, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(75, 'BOMBAJ 39', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 86, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(76, 'COLORADO ANTRACITE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 87, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(77, 'COLORADO DARK BROWN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 88, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(78, 'COLORADO ELEPHANT', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 89, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(79, 'COLORADO MARRONE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 90, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(80, 'COLORADO NEW BLACK', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 91, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(81, 'COLORADO SAND', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 92, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(82, 'COLORADO SAWANA', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 93, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(83, 'COLORADO SIENA', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 94, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(84, 'COLORADO SILVER', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 95, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(85, 'COLORADO TERRA', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 96, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(86, 'COSMIC 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 97, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(87, 'COSMIC 06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 98, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(88, 'COSMIC 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 99, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(89, 'COSMIC 09', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 100, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(90, 'COSMIC 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 101, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(91, 'COSMIC 15', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 102, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(92, 'COSMIC 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 103, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(93, 'COSMIC 19', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 104, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(94, 'COSMIC 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 105, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(95, 'COSMIC 23', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 106, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(96, 'COSMIC 26', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 107, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(97, 'COSMIC 27', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 108, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(98, 'COSMIC NEW 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 109, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(99, 'COSMIC NEW 106', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 110, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(100, 'COSMIC NEW 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 111, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(101, 'COSMIC NEW 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 112, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(102, 'COSMIC NEW 109', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 113, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(103, 'COSMIC NEW 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 114, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(104, 'COSMIC NEW 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 115, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(105, 'COSMIC NEW 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 116, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(106, 'COSMIC NEW 123', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 117, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(107, 'COSMIC NEW 136', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 118, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(108, 'COVER 24', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 119, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(109, 'COVER 61', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 120, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(110, 'COVER 69', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 121, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(111, 'COVER 70', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 122, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(112, 'COVER 83', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 123, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(113, 'COVER 87', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 124, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(114, 'DERBY 7004', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 125, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(115, 'DERBY 8017', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 126, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(116, 'DOLARO 900', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 127, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(117, 'DURBAN 9909', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 128, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(118, 'EKO K. LOTOS BIJELI', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 129, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(119, 'EKO K. LOTOS CRNI', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 130, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(120, 'ELEPHANT 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 131, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(121, 'ELEPHANT 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 132, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(122, 'ENGLIŠ DEKOR', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 133, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(123, 'ETHA 24', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 134, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(124, 'EVERLAST 9120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 135, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(125, 'EVERLAST 9591', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 136, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(126, 'FANTASYA 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 137, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(127, 'FANTASYA 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 138, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(128, 'FANTASYA 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 139, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(129, 'FANTASYA 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 140, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(130, 'FANTASYA 119', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 141, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(131, 'FANTASYA 203', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 142, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(132, 'FANTASYA BEIGE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 143, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(133, 'FANTASYA BROWN', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 144, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(134, 'FLORES 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 145, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(135, 'FLORES 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 146, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(136, 'FLORES 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 147, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(137, 'FLORES 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 148, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(138, 'FOX 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 149, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(139, 'FOX 106', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 150, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(140, 'FOX 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 151, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(141, 'FOX 109', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 152, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(142, 'FOX 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 153, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(143, 'FOX 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 154, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(144, 'FOX 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 155, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(145, 'FOX 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 156, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(146, 'GOMEZ 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 157, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(147, 'GORDON 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 158, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(148, 'GORDON 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 159, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(149, 'GORDON 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 160, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(150, 'GORDON 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 161, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(151, 'GORDON 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 162, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(152, 'GORDON 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 163, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(153, 'GORDON 08', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 164, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(154, 'GORDON 09', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 165, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(155, 'GORDON 11', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 166, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(156, 'GORDON 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 167, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(157, 'GORDON 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 168, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(158, 'GORDON 14', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 169, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(159, 'GORDON 15', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 170, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(160, 'GORDON 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 171, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(161, 'GORDON NEW 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 172, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(162, 'GORDON NEW 104', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 173, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(163, 'GORDON NEW 106', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 174, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(164, 'GORDON NEW 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 175, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(165, 'GORDON NEW 109', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 176, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(166, 'GORDON NEW 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 177, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(167, 'GORDON NEW 112', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 178, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(168, 'GORDON NEW 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 179, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(169, 'GORDON NEW 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 180, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(170, 'GORDON NEW 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 181, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(171, 'GORDON NEW 195', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 182, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(172, 'GRAND 4012', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 183, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(173, 'GRAND 7047', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 184, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(174, 'HELENA 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 185, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(175, 'HELENA 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 186, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(176, 'HELENA 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 187, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(177, 'HELENA 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 188, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(178, 'HELENA 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 189, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(179, 'HELENA 133', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 190, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(180, 'HELENA 135', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 191, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(181, 'HIMALIA 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 192, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(182, 'HIMALIA 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 193, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(183, 'HIMALIA 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 194, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(184, 'HIMALIA 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 195, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(185, 'HIMALIA 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 196, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(186, 'HIMALIA 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 197, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(187, 'HIMALIA 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 198, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(188, 'HIMALIA 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 199, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(189, 'HIMALIA 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 200, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(190, 'HIMALIA 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 201, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(191, 'HIMALIA 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 202, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(192, 'HIMALIA 133', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 203, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(193, 'HIMALIA 136', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 204, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(194, 'HIMALIA 182', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 205, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(195, 'HIMALIA 201', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 206, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(196, 'HIMALIA 203', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 207, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(197, 'HIMALIA 211', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 208, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(198, 'HIMALIA 301', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 209, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(199, 'HOUSTON 08', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 210, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(200, 'HOUSTON 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 211, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(201, 'HOUSTON 20', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 212, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(202, 'HOUSTON 83', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 213, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(203, 'HOUSTON 94 ', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 214, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(204, 'HOUSTON 98', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 215, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(205, 'KITANA 9180', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 216, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(206, 'KITANA 9200', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 217, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(207, 'KITANA 9206', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 218, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(208, 'KITANA 9244', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 219, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(209, 'KITANA 9410', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 220, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(210, 'KITANA 9426', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 221, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(211, 'KITANA 9502', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 222, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(212, 'KITANA 9573', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 223, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(213, 'KITANA 9844', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 224, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(214, 'KITANA 9908', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 225, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(215, 'KITANA 9934', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 226, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(216, 'LAPAZ PORSCHE 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 227, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(217, 'LAPAZ PORSCHE 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 228, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(218, 'LAPAZ PORSCHE 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 229, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(219, 'LAPAZ PORSCHE 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 230, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(220, 'LAPAZ PORSCHE 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 231, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(221, 'LAPAZ PORSCHE 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 232, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(222, 'LAPAZ PORSCHE 119', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 233, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(223, 'LAPAZ PORSHE 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 234, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(224, 'LAPAZ POSHE 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 235, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(225, 'LAWA 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 236, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(226, 'LAWA 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 237, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(227, 'LAWA 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 238, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(228, 'LAWA 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 239, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(229, 'LAWA 06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 240, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(230, 'LAWA 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 241, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(231, 'LAWA ORANGE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 242, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(232, 'LINO 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 243, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(233, 'LINO 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 244, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(234, 'LINO 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 245, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(235, 'LINO 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 246, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(236, 'LINO 06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 247, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(237, 'LINO 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 248, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(238, 'LINO 08', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 249, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(239, 'LINO 09', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 250, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(240, 'LINO 10', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 251, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(241, 'LINO 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 252, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(242, 'LINO 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 253, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(243, 'LINO 15', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 254, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(244, 'LINO 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 255, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(245, 'LINO 17', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 256, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(246, 'LINO 18', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 257, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(247, 'LISA 100', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 258, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(248, 'LISA 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 259, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(249, 'LISA 105 ', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 260, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(250, 'LISA 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 261, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07');
INSERT INTO `materijali` (`id`, `naziv`, `dodatni_opis`, `mattip_id`, `mattipvrsta_id`, `vrsta_podloge`, `vrsta_okova`, `proizvodjac`, `namjena`, `forma_oblik`, `sp_tezina`, `gustina`, `tvrdoca`, `klasa`, `br_linija`, `br_slojeva`, `debljina`, `duz_trake`, `sir_trake`, `sirina`, `duz_razred`, `jed_mjere`, `cijena`, `granulacija`, `mattipoznaka_id`, `kmat_01`, `kmat_02`, `kmat_03`, `kmat_04`, `kmat_05`, `kmat_06`, `kmat_07`, `created_at`, `updated_at`) VALUES
(251, 'LISA 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 262, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(252, 'LOCA 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 263, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(253, 'LOCA 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 264, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(254, 'LOCA 06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 265, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(255, 'LOCA 08', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 266, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(256, 'LOCA 10', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 267, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(257, 'Presvlaka, Eko koža, Kat. ozn.: AFRICA 9903 DARK BROWN', NULL, 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 38, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-31 20:20:59'),
(258, 'LOCA 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 269, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(259, 'LOCA 14', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 270, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(260, 'LOCA 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 271, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(261, 'Presvlaka, Eko koža, Kat. ozn.: LOCA 17', NULL, 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 272, 140, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-31 20:50:42'),
(262, 'LOCA 20', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 273, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(263, 'LOCA 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 274, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(264, 'LOCA 23', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 275, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(265, 'LOCA 27', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 276, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(266, 'LOCA 36', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 277, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(267, 'LOTOS 7006', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 278, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(268, 'LOTOS 8201', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 279, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(269, 'LUX 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 280, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(270, 'LUX 17', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 281, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(271, 'MADRYTNEW 1100', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 282, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(272, 'MADRYTNEW 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 283, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(273, 'MADRYTNEW 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 284, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(274, 'MADRYTNEW 125', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 285, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(275, 'MADRYTNEW 195', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 286, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(276, 'MALMO NEW 79', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 287, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(277, 'MALMO NEW 95', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 288, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(278, 'MANGO BEŽ', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 289, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(279, 'MANGO BIJELA', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 290, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(280, 'MANGO BRAON', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 291, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(281, 'MANGO CAPUCCINO', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 292, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(282, 'MANGO CRNA', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 293, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(283, 'MANHAJM 2005', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 294, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(284, 'MANILA 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 295, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(285, 'MANILA 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 296, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(286, 'MANILA 104', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 297, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(287, 'MANILA 112', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 298, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(288, 'MANILA 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 299, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(289, 'MERIDA 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 300, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(290, 'MERIDA 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 301, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(291, 'MERIDA 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 302, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(292, 'MERIDA 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 303, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(293, 'MERIDA 06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 304, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(294, 'MERIDA 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 305, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(295, 'MF BEŽ ', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 306, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(296, 'MF BRAON', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 307, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(297, 'MF LK - 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 308, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(298, 'MF LK - 26', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 309, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(299, 'MILOS 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 310, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(300, 'MILOS 69', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 311, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(301, 'MILOS 72', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 312, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(302, 'MILOS 76', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 313, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(303, 'MILOS 84', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 314, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(304, 'MILOS 94', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 315, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(305, 'MIYABI 5410', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 316, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(306, 'MONA 109 FLOCK', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 317, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(307, 'MONACO 100', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 318, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(308, 'MONACO 200', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 319, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(309, 'MONACO 300', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 320, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(310, 'MUSTANG CRNI', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 321, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(311, 'NATAL 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 322, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(312, 'NATAL 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 323, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(313, 'NATAL 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 324, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(314, 'NATAL 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 325, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(315, 'NATAL 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 326, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(316, 'NATAL 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 327, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(317, 'NATAL 109', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 328, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(318, 'NATAL 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 329, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(319, 'NATAL 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 330, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(320, 'NATAL 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 331, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(321, 'NATAL 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 332, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(322, 'NATAL 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 333, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(323, 'NATAL 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 334, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(324, 'NATAL 203', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 335, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(325, 'NATAL 211', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 336, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(326, 'NATAL 301', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 337, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(327, 'NEO 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 338, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(328, 'NEO 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 339, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(329, 'NEO 106', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 340, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(330, 'NEO 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 341, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(331, 'NEO 117', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 342, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(332, 'NEO 119', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 343, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(333, 'NEO 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 344, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(334, 'NEO 121', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 345, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(335, 'NEVADA28', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 346, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(336, 'NOBEL 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 347, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(337, 'NOBEL 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 348, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(338, 'NOBEL 11', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 349, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(339, 'NOBEL 20', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 350, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(340, 'NOBEL NEW 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 351, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(341, 'NVBOC', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 352, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(342, 'ORION 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 353, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(343, 'ORION 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 354, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(344, 'ORION 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 355, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(345, 'ORION 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 356, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(346, 'ORION 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 357, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(347, 'ORION 112', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 358, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(348, 'ORION 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 359, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(349, 'ORION 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 360, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(350, 'ORION 119', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 361, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(351, 'ORION 120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 362, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(352, 'ORION 133', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 363, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(353, 'ORION 211', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 364, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(354, 'ORION 282', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 365, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(355, 'ORION 311', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 366, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(356, 'OUTLANDER A06', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 367, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(357, 'PANDA DARK BEIGE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 368, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(358, 'PANDA DARK GRAY', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 369, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(359, 'PATCHWORK', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 370, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(360, 'PIAVO 7006', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 371, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(361, 'PIAVO 9107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 372, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(362, 'PIAVO 9116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 373, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(363, 'PIAVO 9244', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 374, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(364, 'PIAVO 9491', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 375, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(365, 'PIAVO 9502', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 376, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(366, 'PIAVO 9534', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 377, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(367, 'PIAVO 9573', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 378, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(368, 'PIAVO 9611', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 379, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(369, 'PIAVO 9612', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 380, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(370, 'PIAVO 9930', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 381, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(371, 'PLY STORE 013', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 382, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(372, 'PLY STORE 342', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 383, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(373, 'PLY STORE 512', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 384, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(374, 'PLY STORE 901', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 385, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(375, 'PORTLAND 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 386, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(376, 'PORTLAND 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 387, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(377, 'PORTLAND 03', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 388, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(378, 'PORTLAND 04', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 389, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(379, 'PORTLAND 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 390, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(380, 'PORTLAND 07', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 391, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(381, 'PORTLAND 09', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 392, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(382, 'PORTLAND 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 393, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(383, 'PORTLAND 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 394, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(384, 'PORTLAND 14', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 395, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(385, 'PORTLAND 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 396, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(386, 'PORTLAND 18', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 397, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(387, 'PORTLAND 19', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 398, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(388, 'PORTLAND 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 399, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(389, 'PORTLAND 22', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 400, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(390, 'PORTLAND PRINT 12', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 401, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(391, 'PORTLND NEW 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 402, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(392, 'PRESTON 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 403, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(393, 'PRESTON 29', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 404, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(394, 'RABIT 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 405, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(395, 'RABIT 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 406, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(396, 'RABIT 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 407, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(397, 'RIO 101', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 408, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(398, 'RIO 201', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 409, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(399, 'RIO 401', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 410, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(400, 'RIO 501', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 411, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(401, 'RIO 701', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 412, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(402, 'RIO 801', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 413, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(403, 'RIVIERA 16', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 414, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(404, 'RIVIERA 26', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 415, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(405, 'RIVIERA 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 416, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(406, 'RIVIERA 36', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 417, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(407, 'RIVIERA 38', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 418, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(408, 'RIVIERA 41', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 419, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(409, 'RIVIERA 61', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 420, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(410, 'RIVIERA 62', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 421, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(411, 'RIVIERA 79', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 422, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(412, 'RIVIERA 87', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 423, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(413, 'RIVIERA 97', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 424, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(414, 'RODOS 01', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 425, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(415, 'RODOS 02', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 426, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(416, 'SAWANA 05', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 427, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(417, 'SAWANA 11', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 428, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(418, 'SAWANA 17', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 429, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(419, 'SAWANA 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 430, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(420, 'SAWANA 27', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 431, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(421, 'SAWANA 31', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 432, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(422, 'SAWANA 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 433, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(423, 'SAWANA 61', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 434, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(424, 'SAWANA 69', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 435, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(425, 'SAWANA 72', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 436, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(426, 'SAWANA 80', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 437, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(427, 'SAWANA 84', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 438, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(428, 'SAWANA 96', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 439, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(429, 'SILVIA 0028', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 440, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(430, 'SOFT 002', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 441, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(431, 'SOFT 003', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 442, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(432, 'SOFT 004', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 443, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(433, 'SOFT 020', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 444, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(434, 'SOFT 030', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 445, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(435, 'SOFT 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 446, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(436, 'SOFT 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 447, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(437, 'SOFT 134', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 448, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(438, 'SOFT 202', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 449, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(439, 'SOFT 253', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 450, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(440, 'SOFT 270', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 451, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(441, 'SOFT 270 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 452, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(442, 'SOFT 303', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 453, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(443, 'SOFT 304', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 454, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(444, 'SOFT 305', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 455, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(445, 'SOFT 355', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 456, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(446, 'SOFT 402', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 457, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(447, 'SOFT 402 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 458, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(448, 'SOFT 403', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 459, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(449, 'SOFT 404', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 460, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(450, 'SOFT 404 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 461, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(451, 'SOFT 432', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 462, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(452, 'SOFT 483', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 463, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(453, 'SOFT 483 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 464, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(454, 'SOFT 484', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 465, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(455, 'SOFT 484 ROMB', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 466, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(456, 'SOFT 501', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 467, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(457, 'SOFT 512', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 468, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(458, 'SOFT 601', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 469, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(459, 'SOFT 664', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 470, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(460, 'SOFT 726', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 471, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(461, 'SOFT 901', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 472, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(462, 'SORO 13', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 473, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(463, 'SORO 21', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 474, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(464, 'SORO 24', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 475, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(465, 'SORO 28', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 476, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(466, 'SORO 34', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 477, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(467, 'SORO 40', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 478, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(468, 'SORO 51', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 479, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(469, 'SORO 60', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 480, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(470, 'SORO 61', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 481, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(471, 'SORO 86', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 482, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(472, 'SORO 90', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 483, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(473, 'STRATOS 9000', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 484, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(474, 'Presvlaka, Eko koža, borg3, 8623 CASTELLO', 'borg3', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 35, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-08-19 20:29:00'),
(475, 'STRATOS 9120', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 486, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(476, 'STRATOS 9123', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 487, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(477, 'STRATOS 9125', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 488, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(478, 'STRATOS 9170', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 489, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(479, 'STRATOS 9244', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 490, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(480, 'STRATOS 9591', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 491, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(481, 'STRATOS 9811', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 492, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(482, 'SUMBA 410', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 493, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(483, 'SUMBA 430', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 494, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(484, 'SUMBA 440', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 495, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(485, 'TIAGO 3718', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 496, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(486, 'TIAGO 5453', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 497, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(487, 'TIAGO 5454', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 498, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(488, 'TIAGO 5569', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 499, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(489, 'TIAGO 5579', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 500, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(490, 'TIAGO 5580', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 501, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(491, 'TIAGO 6110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 502, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(492, 'TIAGO 6540', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 503, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(493, 'TIAGO 8658', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 504, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(494, 'TIAGO 9130', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 505, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(495, 'TIAGO 9324', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 506, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(496, 'TIAGO 9354', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 507, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(497, 'TIAGO 9409', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 508, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(498, 'TIAGO 9580', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 509, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(499, 'TIAGO 9615', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 510, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(500, 'TIAGO 9636', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 511, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(501, 'TIAGO 9905', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 512, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(502, 'TIAGO 9912', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 513, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07');
INSERT INTO `materijali` (`id`, `naziv`, `dodatni_opis`, `mattip_id`, `mattipvrsta_id`, `vrsta_podloge`, `vrsta_okova`, `proizvodjac`, `namjena`, `forma_oblik`, `sp_tezina`, `gustina`, `tvrdoca`, `klasa`, `br_linija`, `br_slojeva`, `debljina`, `duz_trake`, `sir_trake`, `sirina`, `duz_razred`, `jed_mjere`, `cijena`, `granulacija`, `mattipoznaka_id`, `kmat_01`, `kmat_02`, `kmat_03`, `kmat_04`, `kmat_05`, `kmat_06`, `kmat_07`, `created_at`, `updated_at`) VALUES
(503, 'TIMOR 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 514, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(504, 'TIMOR 115', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 515, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(505, 'TIMOR 119', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 516, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(506, 'TIMOR NEW 102', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 517, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(507, 'TIMOR NEW 103', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 518, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(508, 'TIMOR NEW 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 519, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(509, 'TIMOR NEW 117', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 520, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(510, 'TIMOR NEW 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 521, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(511, 'ULTRA MARA B.WHITE', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 522, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(512, 'Presvlaka, Eko koža, Kat. ozn.: ULTRA MARA WHITE', NULL, 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 523, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-31 19:23:58'),
(513, 'Presvlaka, Eko koža, Kat. ozn.: 8020 CASTELLO', NULL, 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 34, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-31 20:42:11'),
(514, 'Presvlaka, Eko koža, Kat. ozn.: BEZ ŠTOFA', NULL, 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 70000, NULL, 33, 800, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-31 20:40:36'),
(515, 'WESTER 105', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 526, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(516, 'WESTER 107', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 527, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(517, 'WESTER 108', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 528, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(518, 'WESTER 110', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 529, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(519, 'WESTER 111', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 530, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(520, 'WESTER 113', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 531, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(521, 'WESTER 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 532, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(522, 'WESTER 116', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 533, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(523, 'WESTER 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 534, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(524, 'WESTER 133', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 535, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(525, 'WESTER 136', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 536, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(526, 'WESTER 301', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 537, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(527, 'WESTER 318', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 538, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(528, 'Retex crni', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 539, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(529, 'Retex bež', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 540, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(530, 'Retex bijeli', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 541, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(531, 'Rabit 114', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 542, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(532, 'LISA 118', '', 7, 13, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 543, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(533, 'Ljepilo za spužvu', '', 9, 18, '0', '-', '09_Dunlop', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:14:27', '2020-08-17 19:15:21'),
(534, 'Ljepilo za drvo', '', 9, 19, '0', '-', '09_Kleiberit', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:14:28', '2020-08-17 19:15:47'),
(535, 'Bijelo test', '', 10, 62, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 50000, NULL, 1, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:22:51', '2020-12-20 22:01:34'),
(536, 'Natur', '', 10, 62, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 2, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:22:52', '2021-01-17 20:13:07'),
(537, 'Sonoma', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 3, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:22:53', '2021-01-17 20:13:07'),
(538, 'Wenge', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 4, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:22:54', '2021-01-17 20:13:07'),
(539, 'Orah', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(540, 'Lak, Završno lakiranje, null, RAL 9005', NULL, 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 100000, NULL, 11, 10, 30, 0, 0, 0, 0, 112000, '2020-08-17 21:06:03', '2021-05-31 20:34:58'),
(541, 'Tamni hrast', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 7, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(542, 'Svijetla tre?nja', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(543, 'Tamna tre?nja', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 9, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(544, 'RAL 1013', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 10, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(545, 'RAL 9005', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 11, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(546, 'Lak, Završno lakiranje, borg,', 'borg', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 12, 10, 30, 0, 0, 0, 0, 112000, '2020-08-17 21:06:03', '2021-08-18 21:31:09'),
(547, 'K031', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 13, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(548, 'K116', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 14, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(549, 'NCS S 2010-R10B', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 15, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(550, 'NCS S 2010-Y80R', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 16, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(551, 'NCS S 3000 N', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 17, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(552, 'NCS S 3502-Y (KOREKCIJA)', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 18, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(553, 'NCS S 5005-Y20R', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 19, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(554, 'NCS S 5040-B10G', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 20, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(555, 'NCS S 7500-N', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 21, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(556, 'NCS S 8005-R10B', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 22, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(557, 'Lak, Bojenje/bajcovanje, Laneno', '', 10, 63, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 23, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-02-02 19:15:53'),
(558, 'Natur bajc', '', 10, 61, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 24, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(566, 'Flex za drvo - test izmjene uspio', '', 11, 32, '11_Flex', '-', '0', '11_Brušenje drveta', '0', '0', '0', '0', '0', '0', '04_3', 0, '4000.00', '150.00', '0', '0', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-27 19:20:46'),
(567, 'Papir za lak test', '', 11, 32, '11_Papir', '-', '0', '11_Brušenje temeljnog laka', '0', '0', '0', '0', '0', '0', '04_3', 0, '3700.00', '140.00', '0', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2020-12-20 22:54:33'),
(568, 'ss', '', 12, 34, '0', 'Klamerica', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:43:56', '2021-01-17 20:13:07'),
(569, 'Vijak M6 40 mm - torban', NULL, 12, 34, '0', 'Vijak M6 40 mm - torban', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 10000, NULL, 0, 103, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-05-28 15:38:15'),
(570, 'Vijak za drvo 4x40 mm', '', 12, 34, '0', 'Vijak za drvo 4x40 mm', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(571, 'Konac svileni crveni tanki', NULL, 12, 34, '0', 'Konac svileni crveni tanki', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'm?', 12, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-04-15 16:13:04'),
(572, 'Rajsfešlus L 350', '', 12, 34, '0', 'Rajsfešlus L 350', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2020-08-17 19:50:23'),
(573, 'Selotejp traka ', '', 12, 34, '0', 'Selotejp traka ', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(574, 'Okov, Vijci, more pivo sad', 'more pivo sad', 12, 59, '0', 'Streč folija', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kg', 0, NULL, 0, 102, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-02-02 19:40:20'),
(575, 'Filc', '', 12, 34, '0', 'Filc', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'm', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(576, 'Lim', '', 12, 34, '0', 'Lim', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'm2', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-17 20:13:07'),
(577, 'Tipla 08', '', 12, 34, '0', 'Tipla 08  test', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', 'kom', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2020-08-17 21:06:03', '2021-01-28 08:44:18'),
(582, 'stand', '', 6, 11, '11_Platno', 'AS', '09_Dunlop', '04_Za tapaciranje', '04_Plast', '05_1.1', '06_30', '06_20T', '01_AB', '03_3', '04_3', 3, '3.00', '3.00', '03_50', '01_600', '5', 30000, NULL, 1, 0, 0, 0, 0, 0, 0, 0, '2020-12-20 23:03:43', '2020-12-20 23:04:42'),
(583, 'Masiv, Bukva - daska sirova neparena, borg3335, AB, 30, do 600', 'borg3335', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, '0.00', '0.00', '0', '01_600', '-', 125500, '0', 0, 100, 200, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-08-19 20:29:14'),
(584, 'Bukva - daska sirova neparena, AB, 40, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(585, 'Bukva - daska sirova neparena, AB, 50, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(586, 'Bukva - daska sirova neparena, BC, 30, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(587, 'Bukva - daska sirova neparena, BC, 40, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(588, 'Bukva - daska sirova neparena, BC, 50, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(589, 'Bukva - daska sirova neparena, CD, 30, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(590, 'Bukva - daska sirova neparena, CD, 40, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(591, 'Bukva - daska sirova neparena, CD, 50, do 600', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(592, 'Bukva - daska sirova neparena, AB, 30, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(593, 'Bukva - daska sirova neparena, AB, 40, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(594, 'Bukva - daska sirova neparena, AB, 50, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(595, 'Bukva - daska sirova neparena, BC, 30, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(596, 'Bukva - daska sirova neparena, BC, 40, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(597, 'Bukva - daska sirova neparena, BC, 50, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(598, 'Bukva - daska sirova neparena, CD, 30, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(599, 'Bukva - daska sirova neparena, CD, 40, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(600, 'Bukva - daska sirova neparena, CD, 50, 600 do 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(601, 'Bukva - daska sirova neparena, AB, 30, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(602, 'Bukva - daska sirova neparena, AB, 40, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(603, 'Bukva - daska sirova neparena, AB, 50, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(604, 'Bukva - daska sirova neparena, BC, 30, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(605, 'Bukva - daska sirova neparena, BC, 40, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(606, 'Bukva - daska sirova neparena, BC, 50, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(607, 'Bukva - daska sirova neparena, CD, 30, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(608, 'Bukva - daska sirova neparena, CD, 40, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(609, 'Bukva - daska sirova neparena, CD, 50, preko 900', '', 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(610, 'Bukva - daska sirova parena, AB, 30, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(611, 'Bukva - daska sirova parena, AB, 40, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(612, 'Bukva - daska sirova parena, AB, 50, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(613, 'Bukva - daska sirova parena, BC, 30, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(614, 'Bukva - daska sirova parena, BC, 40, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(615, 'Bukva - daska sirova parena, BC, 50, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(616, 'Bukva - daska sirova parena, CD, 30, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(617, 'Bukva - daska sirova parena, CD, 40, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(618, 'Bukva - daska sirova parena, CD, 50, do 600', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(619, 'Bukva - daska sirova parena, AB, 30, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(620, 'Bukva - daska sirova parena, AB, 40, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(621, 'Bukva - daska sirova parena, AB, 50, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(622, 'Bukva - daska sirova parena, BC, 30, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(623, 'Bukva - daska sirova parena, BC, 40, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(624, 'Bukva - daska sirova parena, BC, 50, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(625, 'Bukva - daska sirova parena, CD, 30, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(626, 'Bukva - daska sirova parena, CD, 40, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(627, 'Bukva - daska sirova parena, CD, 50, 600 do 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(628, 'Bukva - daska sirova parena, AB, 30, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(629, 'Bukva - daska sirova parena, AB, 40, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(630, 'Bukva - daska sirova parena, AB, 50, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(631, 'Bukva - daska sirova parena, BC, 30, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(632, 'Bukva - daska sirova parena, BC, 40, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(633, 'Bukva - daska sirova parena, BC, 50, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(634, 'Bukva - daska sirova parena, CD, 30, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(635, 'Bukva - daska sirova parena, CD, 40, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(636, 'Bukva - daska sirova parena, CD, 50, preko 900', '', 1, 2, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(641, 'Masiv, Bukva - daska suva neparena, AB, 30, do 600', NULL, 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 2306500, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-05-31 17:58:12'),
(642, 'Bukva - daska suva neparena, AB, 40, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(643, 'Bukva - daska suva neparena, AB, 50, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(644, 'Bukva - daska suva neparena, BC, 30, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(645, 'Bukva - daska suva neparena, BC, 40, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(646, 'Bukva - daska suva neparena, BC, 50, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(647, 'Bukva - daska suva neparena, CD, 30, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(648, 'Bukva - daska suva neparena, CD, 40, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(649, 'Bukva - daska suva neparena, CD, 50, do 600', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(650, 'Bukva - daska suva neparena, AB, 30, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(651, 'Bukva - daska suva neparena, AB, 40, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(652, 'Bukva - daska suva neparena, AB, 50, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(653, 'Bukva - daska suva neparena, BC, 30, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(654, 'Bukva - daska suva neparena, BC, 40, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(655, 'Bukva - daska suva neparena, BC, 50, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(656, 'Bukva - daska suva neparena, CD, 30, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(657, 'Bukva - daska suva neparena, CD, 40, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(658, 'Bukva - daska suva neparena, CD, 50, 600 do 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(659, 'Bukva - daska suva neparena, AB, 30, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(660, 'Bukva - daska suva neparena, AB, 40, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(661, 'Bukva - daska suva neparena, AB, 50, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(662, 'Bukva - daska suva neparena, BC, 30, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(663, 'Bukva - daska suva neparena, BC, 40, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(664, 'Bukva - daska suva neparena, BC, 50, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(665, 'Bukva - daska suva neparena, CD, 30, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(666, 'Bukva - daska suva neparena, CD, 40, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(667, 'Bukva - daska suva neparena, CD, 50, preko 900', '', 1, 3, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(672, 'Bukva - daska suva parena, AB, 30, do 600', NULL, 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 50000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-03-30 18:17:27'),
(673, 'Bukva - daska suva parena, AB, 40, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(674, 'Bukva - daska suva parena, AB, 50, do 600', NULL, 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 50000, NULL, 0, 110, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-03-30 18:17:11'),
(675, 'Bukva - daska suva parena, BC, 30, do 600', NULL, 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 50000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-03-30 18:16:51'),
(676, 'Bukva - daska suva parena, BC, 40, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(677, 'Bukva - daska suva parena, BC, 50, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(678, 'Bukva - daska suva parena, CD, 30, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(679, 'Bukva - daska suva parena, CD, 40, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(680, 'Bukva - daska suva parena, CD, 50, do 600', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_600', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(681, 'Bukva - daska suva parena, AB, 30, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(682, 'Bukva - daska suva parena, AB, 40, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(683, 'Bukva - daska suva parena, AB, 50, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(684, 'Bukva - daska suva parena, BC, 30, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(685, 'Bukva - daska suva parena, BC, 40, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(686, 'Bukva - daska suva parena, BC, 50, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(687, 'Bukva - daska suva parena, CD, 30, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(688, 'Bukva - daska suva parena, CD, 40, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(689, 'Bukva - daska suva parena, CD, 50, 600 do 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(690, 'Bukva - daska suva parena, AB, 30, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(691, 'Bukva - daska suva parena, AB, 40, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(692, 'Bukva - daska suva parena, AB, 50, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(693, 'Bukva - daska suva parena, BC, 30, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(694, 'Bukva - daska suva parena, BC, 40, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(695, 'Bukva - daska suva parena, BC, 50, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(696, 'Bukva - daska suva parena, CD, 30, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 30, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(697, 'Bukva - daska suva parena, CD, 40, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(698, 'Bukva - daska suva parena, CD, 50, preko 900', '', 1, 4, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-17 20:12:49', '2021-01-17 20:13:07'),
(703, 'testna gurtna', '', 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-26 20:54:35', '2021-01-27 06:57:56'),
(704, 'Gurtna, Elastična, 3, 60', NULL, 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '03_3', '0', 0, NULL, NULL, '03_60', '0', '-', 100000, NULL, 0, 101, 0, 0, 0, 0, 0, 0, '2021-01-27 19:13:39', '2021-07-01 14:50:20'),
(705, 'Masiv, Sport Box - testna, AB, 50, preko 900', '', 1, 46, '0', 'afas', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-28 17:50:48', '2021-01-28 17:50:48'),
(706, 'Masiv, Sport Box - testna, CD, 40, preko 900', '', 1, 46, '0', '-', '0', '0', '0', '0', '0', '0', '01_CD', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-28 17:56:01', '2021-01-28 17:56:01'),
(707, 'Masiv, Bukva - daska sirova neparena, BC, 40, preko 900', NULL, 1, 1, '0', '-', '0', '0', '0', '0', '0', '0', '01_BC', '0', '0', 40, NULL, NULL, '0', '01_preko_900', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-28 18:02:35', '2021-02-14 18:39:33'),
(708, 'Pločasti materijal, Iverica - sirova, Oplemenjena, 20', '', 2, 5, '0', '-', '0', '0', '0', '0', '0', '0', '02_Oplemenjena', '0', '0', 20, NULL, NULL, '0', '0', '-', 230000, NULL, 0, 4300, 0, 0, 0, 0, 0, 0, '2021-01-28 18:37:02', '2021-01-28 18:38:29'),
(709, 'Masiv, Sport Box - testna, AB, 50, preko 900', '', 1, 46, '0', '-', '0', '0', '0', '0', '0', '0', '01_AB', '0', '0', 50, NULL, NULL, '0', '01_preko_900', '-', 108800, NULL, 0, 100, 200, 300, 0, 0, 0, 0, '2021-01-29 08:04:07', '2021-01-29 08:04:07'),
(710, 'Pločasti materijal, Iverica sportbox, Sirova, 10mm (treba unijeti i ostale)', '', 2, 57, '0', '-', '0', '0', '0', '0', '0', '0', '02_Sirova', '0', '0', 10, NULL, NULL, '0', '0', '-', 550000, NULL, 0, 167, 0, 0, 0, 0, 0, 0, '2021-01-29 12:42:49', '2021-01-29 12:42:49'),
(711, 'Pločasti materijal, Iverica, Sirova', '', 2, 5, '0', '-', '0', '0', '0', '0', '0', '0', '02_Sirova', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 120, 0, 0, 0, 0, 0, 0, '2021-01-29 12:54:24', '2021-01-29 12:54:24'),
(712, 'Pločasti materijal, Iverica, Sirova, 10', '', 2, 5, '0', '-', '0', '0', '0', '0', '0', '0', '02_Sirova', '0', '0', 10, NULL, NULL, '0', '0', '-', 4440000, NULL, 0, 120, 0, 0, 0, 0, 0, 0, '2021-01-29 13:04:09', '2021-01-29 13:04:09'),
(713, 'Pločasti materijal, Lesonit, Sirova, 16', '', 2, 6, '0', '-', '0', '0', '0', '0', '0', '0', '02_Sirova', '0', '0', 16, NULL, NULL, '0', '0', '-', 120000, NULL, 0, 300, 0, 0, 0, 0, 0, 0, '2021-01-29 13:08:44', '2021-01-29 13:08:44'),
(714, 'Gurtna, Elastična, 3, 50', '', 3, 9, '0', '-', '0', '0', '0', '0', '0', '0', '0', '03_3', '0', 0, NULL, NULL, '03_50', '0', '-', 110000, NULL, 0, 120, 0, 0, 0, 0, 0, 0, '2021-01-29 17:14:30', '2021-01-29 17:35:25'),
(715, 'Karton, Za tapaciranje, Plašt, B-2T, 5', '', 4, 29, '0', '-', '0', '0', '04_Plast', '0', '0', '0', '04_B-2T', '0', '04_5', 0, NULL, NULL, '0', '0', '-', 1230000, NULL, 0, 100, 100, 0, 0, 0, 0, 0, '2021-01-29 18:12:04', '2021-01-29 18:48:45'),
(716, 'Karton, Za pakovanje, Kutija, B-TŠ, 5', '', 4, 30, '0', '-', '0', '0', '04_Kutija', '0', '0', '0', '04_B-TŠ', '0', '04_5', 0, NULL, NULL, '0', '0', '-', 2320000, NULL, 0, 103, 103, 0, 0, 0, 0, 0, '2021-01-29 18:54:15', '2021-01-29 18:54:15'),
(717, 'Ljepenka, Ljepenka za tapaciranje, 1.1, A, 10mm (treba unijeti i ostale)', '', 5, 31, '0', '-', '0', '0', '0', '05_1.1', '0', '0', '05_A', '0', '0', 10, NULL, NULL, '0', '0', '-', 220000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-29 19:35:00', '2021-01-29 19:35:00'),
(718, 'Spužva, Crna, 30, 25T, B', '', 6, 11, '0', '-', '0', '0', '0', '0', '06_30', '06_25T', '06_B', '0', '0', 0, NULL, NULL, '0', '0', '-', 320000, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-01-29 19:35:36', '2021-01-29 19:35:36'),
(719, 'Okov, Vijci, s', 's', 12, 59, '0', 'M10/30', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 400, NULL, 0, 102, 0, 0, 0, 0, 0, 0, '2021-01-30 18:15:24', '2021-02-03 09:22:04'),
(720, 'Pločasti materijal, Iverica, Sir., 16', '', 2, 5, '0', '-', '0', '0', '0', '0', '0', '0', '02_Sirova', '0', '0', 16, NULL, NULL, '0', '0', '-', 100000, NULL, 0, 120, 0, 0, 0, 0, 0, 0, '2021-01-31 16:59:47', '2021-01-31 16:59:47'),
(721, 'Pločasti materijal, Furnirski otpresak, AA, 10', '', 2, 8, '0', '-', '0', '0', '0', '0', '0', '0', '02_AA', '0', '0', 10, NULL, NULL, '0', '0', '-', 120000, NULL, 0, 102, 0, 0, 0, 0, 0, 0, '2021-01-31 17:18:26', '2021-01-31 17:18:26'),
(722, 'Pločasti materijal, Furnirski otpresak, AA, 10', '', 2, 8, '0', '-', '0', '0', '0', '0', '0', '0', '02_AA', '0', '0', 10, NULL, NULL, '0', '0', '-', 100000, NULL, 0, 110, 0, 0, 0, 0, 0, 0, '2021-01-31 17:38:30', '2021-01-31 17:38:30'),
(723, 'Ljepilo, nova vrsta ljepila, dfdf', 'dfdf', 9, 64, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 18, 110, 0, 0, 0, 0, 0, '2021-02-04 18:04:46', '2021-02-04 18:08:29'),
(724, 'Gurtna, Elastična, d, 3, 50', 'd', 3, 9, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '03_3', '0', 0, NULL, NULL, '03_50', '0', '-', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '2021-02-04 18:09:29', '2021-02-04 18:09:29'),
(725, 'Lak, Bio ulje, lanaeneo', 'lanaeneo', 10, 66, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 330000, NULL, 0, 60, 10, 0, 0, 0, 0, 0, '2021-02-21 17:31:46', '2021-02-21 17:31:46'),
(726, 'Okov, konac, evo crnog konca', 'evo crnog konca', 12, 621, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 120000, NULL, 0, 105, 0, 0, 0, 0, 0, 0, '2021-02-21 17:51:02', '2021-02-21 17:51:02'),
(727, 'Lak, Bio ulje, omegol, (bio ulje opis)', 'omegol', 10, 66, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 0, 60, 10, 0, 0, 0, 0, 0, '2021-04-15 17:24:07', '2021-04-15 17:24:07'),
(728, 'Ljepenka, Ljepenka za tapaciranje, debljina: 2.8mm, , 1.1, A, (data opisno)', 'debljina: 2.8mm,', 5, 31, '0', NULL, '0', '0', '0', '05_1.1', '0', '0', '05_A', '0', '0', 99, NULL, NULL, '0', '0', '-', 550000, NULL, 0, 100, 0, 0, 0, 0, 0, 0, '2021-05-24 15:58:03', '2021-05-24 15:58:45'),
(729, 'Ostalo, selotejp', NULL, 13, 6302, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 100000, NULL, 0, 102, 0, 0, 0, 0, 0, 0, '2021-05-28 15:46:14', '2021-05-28 15:46:14'),
(730, 'Lak, Bojenje/bajcovanje, borg43, (bajc opis)', 'borg43', 10, 61, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 100000, NULL, 546, 0, 0, 0, 0, 0, 0, 0, '2021-08-18 22:18:02', '2021-08-18 23:02:52'),
(731, 'Presvlaka, Eko koža, borg111', 'borg111', 7, 13, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 37, 140, 0, 0, 0, 0, 0, 0, '2021-08-18 22:56:28', '2021-08-18 22:56:28'),
(732, 'Presvlaka, Štof, borg12, 8623 CASTELLO', 'borg12', 7, 12, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 35, 170, 0, 0, 0, 0, 0, 0, '2021-08-18 22:59:53', '2021-08-19 19:41:28'),
(733, 'Gurtna, Elastična, test, 3, 60,', 'test', 3, 9, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '03_3', '0', 0, NULL, NULL, '03_60', '0', '-', 0, NULL, 0, 101, 0, 0, 0, 0, 0, 0, '2021-08-19 19:42:05', '2021-08-19 19:42:28'),
(734, 'Presvlaka, Štof, borg, AFRICA 9903 DARK BROWN', 'borg', 7, 12, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 38, 170, 0, 0, 0, 0, 0, 0, '2021-08-20 19:18:56', '2021-08-20 19:18:56'),
(735, 'Lak, Bojenje/bajcovanje, borg, Tamna trešnja se zajebav oko kotla', 'borg', 10, 61, '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, '0', '0', '-', 0, NULL, 9, 0, 0, 0, 0, 0, 0, 0, '2021-08-26 18:47:27', '2021-08-26 18:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `mattipovi`
--

CREATE TABLE `mattipovi` (
  `id` int(10) NOT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `redni_broj` int(3) DEFAULT NULL,
  `klab01` varchar(50) DEFAULT NULL,
  `klab02` varchar(50) DEFAULT NULL,
  `klab03` varchar(50) DEFAULT NULL,
  `klab04` varchar(50) DEFAULT NULL,
  `klab05` varchar(50) DEFAULT NULL,
  `klab06` varchar(50) DEFAULT NULL,
  `klab07` varchar(50) DEFAULT NULL,
  `kdef01` int(11) DEFAULT NULL,
  `kdef02` int(11) DEFAULT NULL,
  `kdef03` int(11) DEFAULT NULL,
  `kdef04` int(11) DEFAULT NULL,
  `kdef05` int(11) DEFAULT NULL,
  `kdef06` int(11) DEFAULT NULL,
  `kdef07` int(11) DEFAULT NULL,
  `kdec01` int(11) DEFAULT NULL,
  `kdec02` int(11) DEFAULT NULL,
  `kdec03` int(11) DEFAULT NULL,
  `kdec04` int(11) DEFAULT NULL,
  `kdec05` int(11) DEFAULT NULL,
  `kdec06` int(11) DEFAULT NULL,
  `kdec07` int(11) DEFAULT NULL,
  `kjed01` varchar(50) DEFAULT NULL,
  `kjed02` varchar(50) DEFAULT NULL,
  `kjed03` varchar(50) DEFAULT NULL,
  `kjed04` varchar(50) DEFAULT NULL,
  `kjed05` varchar(50) DEFAULT NULL,
  `kjed06` varchar(50) DEFAULT NULL,
  `kjed07` varchar(50) DEFAULT NULL,
  `elab01` varchar(50) DEFAULT NULL,
  `ejed01` varchar(50) DEFAULT NULL,
  `elab02` varchar(50) DEFAULT NULL,
  `ejed02` varchar(50) DEFAULT NULL,
  `elab03` varchar(50) DEFAULT NULL,
  `ejed03` varchar(50) DEFAULT NULL,
  `elab04` varchar(50) DEFAULT NULL,
  `ejed04` varchar(50) DEFAULT NULL,
  `elab05` varchar(50) DEFAULT NULL,
  `ejed05` varchar(50) DEFAULT NULL,
  `elab06` varchar(50) DEFAULT NULL,
  `ejed06` varchar(50) DEFAULT NULL,
  `elab07` varchar(50) DEFAULT NULL,
  `ejed07` varchar(50) DEFAULT NULL,
  `elab21` varchar(50) DEFAULT NULL,
  `ejed21` varchar(50) DEFAULT NULL,
  `elab22` varchar(50) DEFAULT NULL,
  `ejed22` varchar(50) DEFAULT NULL,
  `elab23` varchar(50) DEFAULT NULL,
  `ejed23` varchar(50) DEFAULT NULL,
  `elab31` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aktivan` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mattipovi`
--

INSERT INTO `mattipovi` (`id`, `naziv`, `redni_broj`, `klab01`, `klab02`, `klab03`, `klab04`, `klab05`, `klab06`, `klab07`, `kdef01`, `kdef02`, `kdef03`, `kdef04`, `kdef05`, `kdef06`, `kdef07`, `kdec01`, `kdec02`, `kdec03`, `kdec04`, `kdec05`, `kdec06`, `kdec07`, `kjed01`, `kjed02`, `kjed03`, `kjed04`, `kjed05`, `kjed06`, `kjed07`, `elab01`, `ejed01`, `elab02`, `ejed02`, `elab03`, `ejed03`, `elab04`, `ejed04`, `elab05`, `ejed05`, `elab06`, `ejed06`, `elab07`, `ejed07`, `elab21`, `ejed21`, `elab22`, `ejed22`, `elab23`, `ejed23`, `elab31`, `created_at`, `updated_at`, `aktivan`) VALUES
(1, 'Masiv', 1, 'koef. trebovanja elementa', 'koef. trebovanja daske', 'koef. trebovanja trupca', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 'x br. bruto elemenata', 'x m3 bruto elemenata', 'x m3 bruto elemenata', '', '', '', '', 'Dužina neto', 'mm', 'Širina neto', 'mm', 'Debljina neto', 'mm', 'Dužina bruto', 'mm', 'Širina bruto', 'mm', 'Debljina bruto', 'mm', 'Br. komada', '(kom/proizvod)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:20:19', '2021-01-28 19:14:49', 1),
(2, 'Pločasti materijal', 2, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 107, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 'x jed.mjere', NULL, NULL, NULL, NULL, NULL, NULL, 'Dužina neto', 'mm', 'Širina neto', 'mm', 'Debljina neto', 'mm', 'Dužina bruto', 'mm', 'Širina bruto', 'mm', 'Debljina bruto', 'mm', 'Br. komada', '(kom/proizvod)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:30:24', '2020-09-17 22:05:52', 1),
(3, 'Gurtna', 3, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 102, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Potrebna dužina', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:30:23', '2020-09-17 20:52:19', 1),
(4, 'Karton', 4, 'koef. trebovanja za tapaciranje', 'koeficijent trebovanja za pakovanje', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x komada', 'x komada', NULL, NULL, NULL, NULL, NULL, 'Dužina', 'mm', 'Širina', 'mm', 'Visina', 'mm', NULL, NULL, 'Proizvoda u kutiji', 'komada', 'Potrebano plašteva', 'komada/proizvod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:30:22', '2020-09-17 21:27:07', 1),
(5, 'Ljepenka', 5, 'koef. trebovanja', 'specifična težina', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x m2', '', NULL, NULL, NULL, NULL, NULL, 'Dužina - neto', 'mm', 'Dužina - tržišna', 'mm', 'Širina - neto', 'mm', 'Širina - tržišna', 'mm', 'Potrebno plašteva - neto', 'komada/proizvod', 'Potrebno plašteva - tržišna', 'komada/proizvod', 'Debljina', 'mm', 'Namjena', NULL, 'Kvalitet', NULL, 'Spec. težina', NULL, NULL, '2020-09-17 20:30:21', '2020-09-17 20:30:27', 1),
(6, 'Spužva', 6, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x komada', NULL, NULL, NULL, NULL, NULL, NULL, 'Gustina', 'kg/m3', 'Dužina', 'mm', 'Širina', 'mm', 'Debljina', 'mm', 'Potebno', 'kom', NULL, NULL, NULL, NULL, 'Vrsta spužve', NULL, 'Tip/klasa spužve', NULL, 'Tvrdoća', NULL, NULL, '2020-09-17 20:32:56', '2020-09-17 20:32:56', 1),
(7, 'Presvlaka', 7, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Širina', 'mm', 'Potrebna dužina', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:32:54', '2020-09-17 20:32:57', 1),
(8, 'Retex', 8, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:32:53', '2020-09-17 20:32:58', 0),
(9, 'Ljepilo', 9, 'nanos na površinu', 'koef. rasipa', NULL, NULL, NULL, NULL, NULL, 5, 11, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'kg/m2', NULL, NULL, NULL, NULL, NULL, NULL, 'Površina nanošenja', 'm2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nazv / proizvođač', NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:38:01', '2020-09-17 20:09:26', 1),
(10, 'Lak', 10, 'nanos na površinu', 'koef. rasipa', 'Koef. konrtakta u odnosu na lak', 'Cijena kontakta', 'Koef. razređivača u odnosu na lak', 'Cijena razređivača', 'Dodatne komponente', 18, 105, 0, 0, 0, 0, 0, 100, 100, 100, 100, 100, 100, 100, 'kg/m2', NULL, NULL, 'KM', '', 'KM', NULL, 'Površina nanošenja', 'm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Transparentnost', NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 20:37:58', '2020-09-17 22:33:33', 1),
(11, 'Brusni materijal', 11, 'koeficijent', NULL, NULL, NULL, NULL, NULL, NULL, 200, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'm2 proizvoda /m2 trake', NULL, NULL, NULL, NULL, NULL, NULL, 'Dužina ', 'mm', 'Širina', 'mm', 'Površina brušenja', 'm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Namjena', NULL, 'Vrsta podloge', NULL, 'Granulacija', NULL, NULL, '2020-09-17 20:42:37', '2020-09-17 20:42:36', 0),
(12, 'Okov', 12, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 102, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x komada', NULL, NULL, NULL, NULL, NULL, NULL, 'Količina', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jedinica mjere', NULL, NULL, NULL, NULL, NULL, 'Opis', '2020-09-17 20:46:55', '2020-09-17 20:46:54', 1),
(13, 'Ostalo', 13, 'koef. trebovanja', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 100, 100, 100, 100, 100, 'x komada', NULL, NULL, NULL, NULL, NULL, NULL, 'Količina', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jedinica mjere', NULL, NULL, NULL, NULL, NULL, 'Opis', '2020-09-17 20:46:56', '2020-09-17 20:46:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mattipoznake`
--

CREATE TABLE `mattipoznake` (
  `id` int(10) NOT NULL,
  `mattip_id` int(10) DEFAULT NULL,
  `natpis` varchar(20) DEFAULT NULL,
  `oznaka` varchar(50) DEFAULT NULL,
  `internasifra` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mattipoznake`
--

INSERT INTO `mattipoznake` (`id`, `mattip_id`, `natpis`, `oznaka`, `internasifra`, `created_at`, `updated_at`) VALUES
(1, 10, '62', 'Bijelo', '1', NULL, NULL),
(2, 10, '62', 'Bezbojni', '2', NULL, NULL),
(3, 10, '61', 'Sonoma', '3', NULL, NULL),
(4, 10, '61', 'Wenge', '4', NULL, NULL),
(5, 10, '61', 'Orahovina', '5', NULL, '2021-09-06 20:55:23'),
(6, 10, '61', 'Svijetli hrast', '6', NULL, NULL),
(7, 10, '61', 'Tamni hrast', '7', NULL, NULL),
(8, 10, '62', 'Svijetla trešnja plete priglavke za borce zzrr', '99', NULL, '2021-09-06 20:52:40'),
(9, 10, '63', 'Tamna trešnja se zajebav oko kotla', '777700000', NULL, '2021-09-06 20:35:13'),
(10, 10, '63', 'RAL 1013', '10', NULL, NULL),
(11, 10, '63', 'RAL 9005', '11', NULL, NULL),
(12, 10, '63', 'K025', '12', NULL, NULL),
(13, 10, '63', 'K031', '13', NULL, NULL),
(14, 10, '63', 'K116', '14', NULL, NULL),
(15, 10, '63', 'NCS S 2010-R10B', '15', NULL, NULL),
(16, 10, '63', 'NCS S 2010-Y80R', '16', NULL, NULL),
(17, 10, '63', 'NCS S 3000 N', '17', NULL, NULL),
(18, 10, '63', 'NCS S 3502-Y (KOREKCIJA)', '18', NULL, NULL),
(19, 10, '63', 'NCS S 5005-Y20R', '19', NULL, NULL),
(20, 10, '63', 'NCS S 5040-B10G', '20', NULL, NULL),
(21, 10, '63', 'NCS S 7500-N', '21', NULL, NULL),
(22, 10, '63', 'NCS S 8005-R10B', '22', NULL, NULL),
(23, 10, '63', 'Bio ulje', '23', NULL, NULL),
(24, 10, '61', 'Natur bajc', '24', NULL, NULL),
(33, 7, 'Kat. ozn.', 'BEZ ŠTOFA', '000', NULL, NULL),
(34, 7, 'Kat. ozn.', '8020 CASTELLO', '001', NULL, NULL),
(35, 7, 'Kat. ozn.', '8623 CASTELLO', '002', NULL, NULL),
(36, 7, 'Kat. ozn.', 'AFRICA 9901 WHITE', '003', NULL, NULL),
(37, 7, 'Kat. ozn.', 'AFRICA 9902 BEIGE', '004', NULL, NULL),
(38, 7, 'Kat. ozn.', 'AFRICA 9903 DARK BROWN', '005', NULL, NULL),
(39, 7, 'Kat. ozn.', 'AFRICA 9905 BROWN', '006', NULL, NULL),
(40, 7, 'Kat. ozn.', 'AFRICA 9906 GRAY', '007', NULL, NULL),
(41, 7, 'Kat. ozn.', 'AFRICA 9907 BLACK', '008', NULL, NULL),
(42, 7, 'Kat. ozn.', 'AFRIKA 04', '009', NULL, NULL),
(43, 7, 'Kat. ozn.', 'AMBER 1001', '010', NULL, NULL),
(44, 7, 'Kat. ozn.', 'AMBER 1018', '011', NULL, NULL),
(45, 7, 'Kat. ozn.', 'AMBER 1019', '012', NULL, NULL),
(46, 7, 'Kat. ozn.', 'AQUA 101', '013', NULL, NULL),
(47, 7, 'Kat. ozn.', 'AQUA 102', '014', NULL, NULL),
(48, 7, 'Kat. ozn.', 'AQUA 103', '015', NULL, NULL),
(49, 7, 'Kat. ozn.', 'AQUA 107', '016', NULL, NULL),
(50, 7, 'Kat. ozn.', 'AQUA 108', '017', NULL, NULL),
(51, 7, 'Kat. ozn.', 'AQUA 110', '018', NULL, NULL),
(52, 7, 'Kat. ozn.', 'AQUA 110 LINIJE', '019', NULL, NULL),
(53, 7, 'Kat. ozn.', 'AQUA 110 ROMB', '020', NULL, NULL),
(54, 7, 'Kat. ozn.', 'AQUA 111', '021', NULL, NULL),
(55, 7, 'Kat. ozn.', 'AQUA 113', '022', NULL, NULL),
(56, 7, 'Kat. ozn.', 'AQUA 115', '023', NULL, NULL),
(57, 7, 'Kat. ozn.', 'AQUA 118', '024', NULL, NULL),
(58, 7, 'Kat. ozn.', 'AQUA 120', '025', NULL, NULL),
(59, 7, 'Kat. ozn.', 'AQUA 133', '026', NULL, NULL),
(60, 7, 'Kat. ozn.', 'AQUA 136', '027', NULL, NULL),
(61, 7, 'Kat. ozn.', 'AQUA 211', '028', NULL, NULL),
(62, 7, 'Kat. ozn.', 'AQUA 311', '029', NULL, NULL),
(63, 7, 'Kat. ozn.', 'AQUA 324', '030', NULL, NULL),
(64, 7, 'Kat. ozn.', 'ARENA GORDON 10', '031', NULL, NULL),
(65, 7, 'Kat. ozn.', 'ARENA GORDON 12', '032', NULL, NULL),
(66, 7, 'Kat. ozn.', 'ARENA GORDON 13', '033', NULL, NULL),
(67, 7, 'Kat. ozn.', 'ARENA GORDON 14', '034', NULL, NULL),
(68, 7, 'Kat. ozn.', 'ARENA GORDON 15', '035', NULL, NULL),
(69, 7, 'Kat. ozn.', 'ARENA GORDON 16', '036', NULL, NULL),
(70, 7, 'Kat. ozn.', 'ARENA GORDON 17', '037', NULL, NULL),
(71, 7, 'Kat. ozn.', 'ARENA GORDON 2', '038', NULL, NULL),
(72, 7, 'Kat. ozn.', 'ARENA GORDON 3', '039', NULL, NULL),
(73, 7, 'Kat. ozn.', 'ARENA GORDON 4', '040', NULL, NULL),
(74, 7, 'Kat. ozn.', 'ARENA GORDON 8', '041', NULL, NULL),
(75, 7, 'Kat. ozn.', 'ATLAS DARK BROWN', '042', NULL, NULL),
(76, 7, 'Kat. ozn.', 'AURA 01', '043', NULL, NULL),
(77, 7, 'Kat. ozn.', 'BAHAMI 22', '044', NULL, NULL),
(78, 7, 'Kat. ozn.', 'BAHAMI 31', '045', NULL, NULL),
(79, 7, 'Kat. ozn.', 'BAHAMI 32', '046', NULL, NULL),
(80, 7, 'Kat. ozn.', 'BAHAMI 33', '047', NULL, NULL),
(81, 7, 'Kat. ozn.', 'BAHAMI 34', '048', NULL, NULL),
(82, 7, 'Kat. ozn.', 'BAXAN 01', '049', NULL, NULL),
(83, 7, 'Kat. ozn.', 'BAXAN 34', '050', NULL, NULL),
(84, 7, 'Kat. ozn.', 'BOLZAN', '051', NULL, NULL),
(85, 7, 'Kat. ozn.', 'BOMBAJ 34', '052', NULL, NULL),
(86, 7, 'Kat. ozn.', 'BOMBAJ 39', '053', NULL, NULL),
(87, 7, 'Kat. ozn.', 'COLORADO ANTRACITE', '054', NULL, NULL),
(88, 7, 'Kat. ozn.', 'COLORADO DARK BROWN', '055', NULL, NULL),
(89, 7, 'Kat. ozn.', 'COLORADO ELEPHANT', '056', NULL, NULL),
(90, 7, 'Kat. ozn.', 'COLORADO MARRONE', '057', NULL, NULL),
(91, 7, 'Kat. ozn.', 'COLORADO NEW BLACK', '058', NULL, NULL),
(92, 7, 'Kat. ozn.', 'COLORADO SAND', '059', NULL, NULL),
(93, 7, 'Kat. ozn.', 'COLORADO SAWANA', '060', NULL, NULL),
(94, 7, 'Kat. ozn.', 'COLORADO SIENA', '061', NULL, NULL),
(95, 7, 'Kat. ozn.', 'COLORADO SILVER', '062', NULL, NULL),
(96, 7, 'Kat. ozn.', 'COLORADO TERRA', '063', NULL, NULL),
(97, 7, 'Kat. ozn.', 'COSMIC 03', '064', NULL, NULL),
(98, 7, 'Kat. ozn.', 'COSMIC 06', '065', NULL, NULL),
(99, 7, 'Kat. ozn.', 'COSMIC 07', '066', NULL, NULL),
(100, 7, 'Kat. ozn.', 'COSMIC 09', '067', NULL, NULL),
(101, 7, 'Kat. ozn.', 'COSMIC 13', '068', NULL, NULL),
(102, 7, 'Kat. ozn.', 'COSMIC 15', '069', NULL, NULL),
(103, 7, 'Kat. ozn.', 'COSMIC 16', '070', NULL, NULL),
(104, 7, 'Kat. ozn.', 'COSMIC 19', '071', NULL, NULL),
(105, 7, 'Kat. ozn.', 'COSMIC 21', '072', NULL, NULL),
(106, 7, 'Kat. ozn.', 'COSMIC 23', '073', NULL, NULL),
(107, 7, 'Kat. ozn.', 'COSMIC 26', '074', NULL, NULL),
(108, 7, 'Kat. ozn.', 'COSMIC 27', '075', NULL, NULL),
(109, 7, 'Kat. ozn.', 'COSMIC NEW 103', '076', NULL, NULL),
(110, 7, 'Kat. ozn.', 'COSMIC NEW 106', '077', NULL, NULL),
(111, 7, 'Kat. ozn.', 'COSMIC NEW 107', '078', NULL, NULL),
(112, 7, 'Kat. ozn.', 'COSMIC NEW 108', '079', NULL, NULL),
(113, 7, 'Kat. ozn.', 'COSMIC NEW 109', '080', NULL, NULL),
(114, 7, 'Kat. ozn.', 'COSMIC NEW 113', '081', NULL, NULL),
(115, 7, 'Kat. ozn.', 'COSMIC NEW 116', '082', NULL, NULL),
(116, 7, 'Kat. ozn.', 'COSMIC NEW 118', '083', NULL, NULL),
(117, 7, 'Kat. ozn.', 'COSMIC NEW 123', '084', NULL, NULL),
(118, 7, 'Kat. ozn.', 'COSMIC NEW 136', '085', NULL, NULL),
(119, 7, 'Kat. ozn.', 'COVER 24', '086', NULL, NULL),
(120, 7, 'Kat. ozn.', 'COVER 61', '087', NULL, NULL),
(121, 7, 'Kat. ozn.', 'COVER 69', '088', NULL, NULL),
(122, 7, 'Kat. ozn.', 'COVER 70', '089', NULL, NULL),
(123, 7, 'Kat. ozn.', 'COVER 83', '090', NULL, NULL),
(124, 7, 'Kat. ozn.', 'COVER 87', '091', NULL, NULL),
(125, 7, 'Kat. ozn.', 'DERBY 7004', '092', NULL, NULL),
(126, 7, 'Kat. ozn.', 'DERBY 8017', '093', NULL, NULL),
(127, 7, 'Kat. ozn.', 'DOLARO 900', '094', NULL, NULL),
(128, 7, 'Kat. ozn.', 'DURBAN 9909', '095', NULL, NULL),
(129, 7, 'Kat. ozn.', 'EKO K. LOTOS BIJELI', '096', NULL, NULL),
(130, 7, 'Kat. ozn.', 'EKO K. LOTOS CRNI', '097', NULL, NULL),
(131, 7, 'Kat. ozn.', 'ELEPHANT 01', '098', NULL, NULL),
(132, 7, 'Kat. ozn.', 'ELEPHANT 04', '099', NULL, NULL),
(133, 7, 'Kat. ozn.', 'ENGLIŠ DEKOR', '100', NULL, NULL),
(134, 7, 'Kat. ozn.', 'ETHA 24', '101', NULL, NULL),
(135, 7, 'Kat. ozn.', 'EVERLAST 9120', '102', NULL, NULL),
(136, 7, 'Kat. ozn.', 'EVERLAST 9591', '103', NULL, NULL),
(137, 7, 'Kat. ozn.', 'FANTASYA 102', '104', NULL, NULL),
(138, 7, 'Kat. ozn.', 'FANTASYA 105', '105', NULL, NULL),
(139, 7, 'Kat. ozn.', 'FANTASYA 108', '106', NULL, NULL),
(140, 7, 'Kat. ozn.', 'FANTASYA 116', '107', NULL, NULL),
(141, 7, 'Kat. ozn.', 'FANTASYA 119', '108', NULL, NULL),
(142, 7, 'Kat. ozn.', 'FANTASYA 203', '109', NULL, NULL),
(143, 7, 'Kat. ozn.', 'FANTASYA BEIGE', '110', NULL, NULL),
(144, 7, 'Kat. ozn.', 'FANTASYA BROWN', '111', NULL, NULL),
(145, 7, 'Kat. ozn.', 'FLORES 01', '112', NULL, NULL),
(146, 7, 'Kat. ozn.', 'FLORES 02', '113', NULL, NULL),
(147, 7, 'Kat. ozn.', 'FLORES 05', '114', NULL, NULL),
(148, 7, 'Kat. ozn.', 'FLORES 07', '115', NULL, NULL),
(149, 7, 'Kat. ozn.', 'FOX 101', '116', NULL, NULL),
(150, 7, 'Kat. ozn.', 'FOX 106', '117', NULL, NULL),
(151, 7, 'Kat. ozn.', 'FOX 108', '118', NULL, NULL),
(152, 7, 'Kat. ozn.', 'FOX 109', '119', NULL, NULL),
(153, 7, 'Kat. ozn.', 'FOX 110', '120', NULL, NULL),
(154, 7, 'Kat. ozn.', 'FOX 114', '121', NULL, NULL),
(155, 7, 'Kat. ozn.', 'FOX 115', '122', NULL, NULL),
(156, 7, 'Kat. ozn.', 'FOX 118', '123', NULL, NULL),
(157, 7, 'Kat. ozn.', 'GOMEZ 01', '124', NULL, NULL),
(158, 7, 'Kat. ozn.', 'GORDON 01', '125', NULL, NULL),
(159, 7, 'Kat. ozn.', 'GORDON 02', '126', NULL, NULL),
(160, 7, 'Kat. ozn.', 'GORDON 03', '127', NULL, NULL),
(161, 7, 'Kat. ozn.', 'GORDON 04', '128', NULL, NULL),
(162, 7, 'Kat. ozn.', 'GORDON 05', '129', NULL, NULL),
(163, 7, 'Kat. ozn.', 'GORDON 07', '130', NULL, NULL),
(164, 7, 'Kat. ozn.', 'GORDON 08', '131', NULL, NULL),
(165, 7, 'Kat. ozn.', 'GORDON 09', '132', NULL, NULL),
(166, 7, 'Kat. ozn.', 'GORDON 11', '133', NULL, NULL),
(167, 7, 'Kat. ozn.', 'GORDON 12', '134', NULL, NULL),
(168, 7, 'Kat. ozn.', 'GORDON 13', '135', NULL, NULL),
(169, 7, 'Kat. ozn.', 'GORDON 14', '136', NULL, NULL),
(170, 7, 'Kat. ozn.', 'GORDON 15', '137', NULL, NULL),
(171, 7, 'Kat. ozn.', 'GORDON 16', '138', NULL, NULL),
(172, 7, 'Kat. ozn.', 'GORDON NEW 102', '139', NULL, NULL),
(173, 7, 'Kat. ozn.', 'GORDON NEW 104', '140', NULL, NULL),
(174, 7, 'Kat. ozn.', 'GORDON NEW 106', '141', NULL, NULL),
(175, 7, 'Kat. ozn.', 'GORDON NEW 108', '142', NULL, NULL),
(176, 7, 'Kat. ozn.', 'GORDON NEW 109', '143', NULL, NULL),
(177, 7, 'Kat. ozn.', 'GORDON NEW 111', '144', NULL, NULL),
(178, 7, 'Kat. ozn.', 'GORDON NEW 112', '145', NULL, NULL),
(179, 7, 'Kat. ozn.', 'GORDON NEW 114', '146', NULL, NULL),
(180, 7, 'Kat. ozn.', 'GORDON NEW 115', '147', NULL, NULL),
(181, 7, 'Kat. ozn.', 'GORDON NEW 116', '148', NULL, NULL),
(182, 7, 'Kat. ozn.', 'GORDON NEW 195', '149', NULL, NULL),
(183, 7, 'Kat. ozn.', 'GRAND 4012', '150', NULL, NULL),
(184, 7, 'Kat. ozn.', 'GRAND 7047', '151', NULL, NULL),
(185, 7, 'Kat. ozn.', 'HELENA 103', '152', NULL, NULL),
(186, 7, 'Kat. ozn.', 'HELENA 105', '153', NULL, NULL),
(187, 7, 'Kat. ozn.', 'HELENA 113', '154', NULL, NULL),
(188, 7, 'Kat. ozn.', 'HELENA 116', '155', NULL, NULL),
(189, 7, 'Kat. ozn.', 'HELENA 120', '156', NULL, NULL),
(190, 7, 'Kat. ozn.', 'HELENA 133', '157', NULL, NULL),
(191, 7, 'Kat. ozn.', 'HELENA 135', '158', NULL, NULL),
(192, 7, 'Kat. ozn.', 'HIMALIA 101', '159', NULL, NULL),
(193, 7, 'Kat. ozn.', 'HIMALIA 102', '160', NULL, NULL),
(194, 7, 'Kat. ozn.', 'HIMALIA 103', '161', NULL, NULL),
(195, 7, 'Kat. ozn.', 'HIMALIA 105', '162', NULL, NULL),
(196, 7, 'Kat. ozn.', 'HIMALIA 107', '163', NULL, NULL),
(197, 7, 'Kat. ozn.', 'HIMALIA 108', '164', NULL, NULL),
(198, 7, 'Kat. ozn.', 'HIMALIA 113', '165', NULL, NULL),
(199, 7, 'Kat. ozn.', 'HIMALIA 114', '166', NULL, NULL),
(200, 7, 'Kat. ozn.', 'HIMALIA 115', '167', NULL, NULL),
(201, 7, 'Kat. ozn.', 'HIMALIA 118', '168', NULL, NULL),
(202, 7, 'Kat. ozn.', 'HIMALIA 120', '169', NULL, NULL),
(203, 7, 'Kat. ozn.', 'HIMALIA 133', '170', NULL, NULL),
(204, 7, 'Kat. ozn.', 'HIMALIA 136', '171', NULL, NULL),
(205, 7, 'Kat. ozn.', 'HIMALIA 182', '172', NULL, NULL),
(206, 7, 'Kat. ozn.', 'HIMALIA 201', '173', NULL, NULL),
(207, 7, 'Kat. ozn.', 'HIMALIA 203', '174', NULL, NULL),
(208, 7, 'Kat. ozn.', 'HIMALIA 211', '175', NULL, NULL),
(209, 7, 'Kat. ozn.', 'HIMALIA 301', '176', NULL, NULL),
(210, 7, 'Kat. ozn.', 'HOUSTON 08', '177', NULL, NULL),
(211, 7, 'Kat. ozn.', 'HOUSTON 13', '178', NULL, NULL),
(212, 7, 'Kat. ozn.', 'HOUSTON 20', '179', NULL, NULL),
(213, 7, 'Kat. ozn.', 'HOUSTON 83', '180', NULL, NULL),
(214, 7, 'Kat. ozn.', 'HOUSTON 94 ', '181', NULL, NULL),
(215, 7, 'Kat. ozn.', 'HOUSTON 98', '182', NULL, NULL),
(216, 7, 'Kat. ozn.', 'KITANA 9180', '183', NULL, NULL),
(217, 7, 'Kat. ozn.', 'KITANA 9200', '184', NULL, NULL),
(218, 7, 'Kat. ozn.', 'KITANA 9206', '185', NULL, NULL),
(219, 7, 'Kat. ozn.', 'KITANA 9244', '186', NULL, NULL),
(220, 7, 'Kat. ozn.', 'KITANA 9410', '187', NULL, NULL),
(221, 7, 'Kat. ozn.', 'KITANA 9426', '188', NULL, NULL),
(222, 7, 'Kat. ozn.', 'KITANA 9502', '189', NULL, NULL),
(223, 7, 'Kat. ozn.', 'KITANA 9573', '190', NULL, NULL),
(224, 7, 'Kat. ozn.', 'KITANA 9844', '191', NULL, NULL),
(225, 7, 'Kat. ozn.', 'KITANA 9908', '192', NULL, NULL),
(226, 7, 'Kat. ozn.', 'KITANA 9934', '193', NULL, NULL),
(227, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 101', '194', NULL, NULL),
(228, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 102', '195', NULL, NULL),
(229, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 108', '196', NULL, NULL),
(230, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 111', '197', NULL, NULL),
(231, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 115', '198', NULL, NULL),
(232, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 118', '199', NULL, NULL),
(233, 7, 'Kat. ozn.', 'LAPAZ PORSCHE 119', '200', NULL, NULL),
(234, 7, 'Kat. ozn.', 'LAPAZ PORSHE 105', '201', NULL, NULL),
(235, 7, 'Kat. ozn.', 'LAPAZ POSHE 103', '202', NULL, NULL),
(236, 7, 'Kat. ozn.', 'LAWA 01', '203', NULL, NULL),
(237, 7, 'Kat. ozn.', 'LAWA 02', '204', NULL, NULL),
(238, 7, 'Kat. ozn.', 'LAWA 04', '205', NULL, NULL),
(239, 7, 'Kat. ozn.', 'LAWA 05', '206', NULL, NULL),
(240, 7, 'Kat. ozn.', 'LAWA 06', '207', NULL, NULL),
(241, 7, 'Kat. ozn.', 'LAWA 07', '208', NULL, NULL),
(242, 7, 'Kat. ozn.', 'LAWA ORANGE', '209', NULL, NULL),
(243, 7, 'Kat. ozn.', 'LINO 01', '210', NULL, NULL),
(244, 7, 'Kat. ozn.', 'LINO 02', '211', NULL, NULL),
(245, 7, 'Kat. ozn.', 'LINO 03', '212', NULL, NULL),
(246, 7, 'Kat. ozn.', 'LINO 05', '213', NULL, NULL),
(247, 7, 'Kat. ozn.', 'LINO 06', '214', NULL, NULL),
(248, 7, 'Kat. ozn.', 'LINO 07', '215', NULL, NULL),
(249, 7, 'Kat. ozn.', 'LINO 08', '216', NULL, NULL),
(250, 7, 'Kat. ozn.', 'LINO 09', '217', NULL, NULL),
(251, 7, 'Kat. ozn.', 'LINO 10', '218', NULL, NULL),
(252, 7, 'Kat. ozn.', 'LINO 12', '219', NULL, NULL),
(253, 7, 'Kat. ozn.', 'LINO 13', '220', NULL, NULL),
(254, 7, 'Kat. ozn.', 'LINO 15', '221', NULL, NULL),
(255, 7, 'Kat. ozn.', 'LINO 16', '222', NULL, NULL),
(256, 7, 'Kat. ozn.', 'LINO 17', '223', NULL, NULL),
(257, 7, 'Kat. ozn.', 'LINO 18', '224', NULL, NULL),
(258, 7, 'Kat. ozn.', 'LISA 100', '225', NULL, NULL),
(259, 7, 'Kat. ozn.', 'LISA 101', '226', NULL, NULL),
(260, 7, 'Kat. ozn.', 'LISA 105 ', '227', NULL, NULL),
(261, 7, 'Kat. ozn.', 'LISA 110', '228', NULL, NULL),
(262, 7, 'Kat. ozn.', 'LISA 111', '229', NULL, NULL),
(263, 7, 'Kat. ozn.', 'LOCA 03', '230', NULL, NULL),
(264, 7, 'Kat. ozn.', 'LOCA 05', '231', NULL, NULL),
(265, 7, 'Kat. ozn.', 'LOCA 06', '232', NULL, NULL),
(266, 7, 'Kat. ozn.', 'LOCA 08', '233', NULL, NULL),
(267, 7, 'Kat. ozn.', 'LOCA 10', '234', NULL, NULL),
(268, 7, 'Kat. ozn.', 'LOCA 11', '235', NULL, NULL),
(269, 7, 'Kat. ozn.', 'LOCA 12', '236', NULL, NULL),
(270, 7, 'Kat. ozn.', 'LOCA 14', '237', NULL, NULL),
(271, 7, 'Kat. ozn.', 'LOCA 16', '238', NULL, NULL),
(272, 7, 'Kat. ozn.', 'LOCA 17', '239', NULL, NULL),
(273, 7, 'Kat. ozn.', 'LOCA 20', '240', NULL, NULL),
(274, 7, 'Kat. ozn.', 'LOCA 21', '241', NULL, NULL),
(275, 7, 'Kat. ozn.', 'LOCA 23', '242', NULL, NULL),
(276, 7, 'Kat. ozn.', 'LOCA 27', '243', NULL, NULL),
(277, 7, 'Kat. ozn.', 'LOCA 36', '244', NULL, NULL),
(278, 7, 'Kat. ozn.', 'LOTOS 7006', '245', NULL, NULL),
(279, 7, 'Kat. ozn.', 'LOTOS 8201', '246', NULL, NULL),
(280, 7, 'Kat. ozn.', 'LUX 13', '247', NULL, NULL),
(281, 7, 'Kat. ozn.', 'LUX 17', '248', NULL, NULL),
(282, 7, 'Kat. ozn.', 'MADRYTNEW 1100', '249', NULL, NULL),
(283, 7, 'Kat. ozn.', 'MADRYTNEW 115', '250', NULL, NULL),
(284, 7, 'Kat. ozn.', 'MADRYTNEW 120', '251', NULL, NULL),
(285, 7, 'Kat. ozn.', 'MADRYTNEW 125', '252', NULL, NULL),
(286, 7, 'Kat. ozn.', 'MADRYTNEW 195', '253', NULL, NULL),
(287, 7, 'Kat. ozn.', 'MALMO NEW 79', '254', NULL, NULL),
(288, 7, 'Kat. ozn.', 'MALMO NEW 95', '255', NULL, NULL),
(289, 7, 'Kat. ozn.', 'MANGO BEŽ', '256', NULL, NULL),
(290, 7, 'Kat. ozn.', 'MANGO BIJELA', '257', NULL, NULL),
(291, 7, 'Kat. ozn.', 'MANGO BRAON', '258', NULL, NULL),
(292, 7, 'Kat. ozn.', 'MANGO CAPUCCINO', '259', NULL, NULL),
(293, 7, 'Kat. ozn.', 'MANGO CRNA', '260', NULL, NULL),
(294, 7, 'Kat. ozn.', 'MANHAJM 2005', '261', NULL, NULL),
(295, 7, 'Kat. ozn.', 'MANILA 101', '262', NULL, NULL),
(296, 7, 'Kat. ozn.', 'MANILA 102', '263', NULL, NULL),
(297, 7, 'Kat. ozn.', 'MANILA 104', '264', NULL, NULL),
(298, 7, 'Kat. ozn.', 'MANILA 112', '265', NULL, NULL),
(299, 7, 'Kat. ozn.', 'MANILA 113', '266', NULL, NULL),
(300, 7, 'Kat. ozn.', 'MERIDA 02', '267', NULL, NULL),
(301, 7, 'Kat. ozn.', 'MERIDA 03', '268', NULL, NULL),
(302, 7, 'Kat. ozn.', 'MERIDA 04', '269', NULL, NULL),
(303, 7, 'Kat. ozn.', 'MERIDA 05', '270', NULL, NULL),
(304, 7, 'Kat. ozn.', 'MERIDA 06', '271', NULL, NULL),
(305, 7, 'Kat. ozn.', 'MERIDA 07', '272', NULL, NULL),
(306, 7, 'Kat. ozn.', 'MF BEŽ ', '273', NULL, NULL),
(307, 7, 'Kat. ozn.', 'MF BRAON', '274', NULL, NULL),
(308, 7, 'Kat. ozn.', 'MF LK - 03', '275', NULL, NULL),
(309, 7, 'Kat. ozn.', 'MF LK - 26', '276', NULL, NULL),
(310, 7, 'Kat. ozn.', 'MILOS 02', '277', NULL, NULL),
(311, 7, 'Kat. ozn.', 'MILOS 69', '278', NULL, NULL),
(312, 7, 'Kat. ozn.', 'MILOS 72', '279', NULL, NULL),
(313, 7, 'Kat. ozn.', 'MILOS 76', '280', NULL, NULL),
(314, 7, 'Kat. ozn.', 'MILOS 84', '281', NULL, NULL),
(315, 7, 'Kat. ozn.', 'MILOS 94', '282', NULL, NULL),
(316, 7, 'Kat. ozn.', 'MIYABI 5410', '283', NULL, NULL),
(317, 7, 'Kat. ozn.', 'MONA 109 FLOCK', '284', NULL, NULL),
(318, 7, 'Kat. ozn.', 'MONACO 100', '285', NULL, NULL),
(319, 7, 'Kat. ozn.', 'MONACO 200', '286', NULL, NULL),
(320, 7, 'Kat. ozn.', 'MONACO 300', '287', NULL, NULL),
(321, 7, 'Kat. ozn.', 'MUSTANG CRNI', '288', NULL, NULL),
(322, 7, 'Kat. ozn.', 'NATAL 101', '289', NULL, NULL),
(323, 7, 'Kat. ozn.', 'NATAL 102', '290', NULL, NULL),
(324, 7, 'Kat. ozn.', 'NATAL 103', '291', NULL, NULL),
(325, 7, 'Kat. ozn.', 'NATAL 105', '292', NULL, NULL),
(326, 7, 'Kat. ozn.', 'NATAL 107', '293', NULL, NULL),
(327, 7, 'Kat. ozn.', 'NATAL 108', '294', NULL, NULL),
(328, 7, 'Kat. ozn.', 'NATAL 109', '295', NULL, NULL),
(329, 7, 'Kat. ozn.', 'NATAL 111', '296', NULL, NULL),
(330, 7, 'Kat. ozn.', 'NATAL 114', '297', NULL, NULL),
(331, 7, 'Kat. ozn.', 'NATAL 115', '298', NULL, NULL),
(332, 7, 'Kat. ozn.', 'NATAL 116', '299', NULL, NULL),
(333, 7, 'Kat. ozn.', 'NATAL 118', '300', NULL, NULL),
(334, 7, 'Kat. ozn.', 'NATAL 120', '301', NULL, NULL),
(335, 7, 'Kat. ozn.', 'NATAL 203', '302', NULL, NULL),
(336, 7, 'Kat. ozn.', 'NATAL 211', '303', NULL, NULL),
(337, 7, 'Kat. ozn.', 'NATAL 301', '304', NULL, NULL),
(338, 7, 'Kat. ozn.', 'NEO 101', '305', NULL, NULL),
(339, 7, 'Kat. ozn.', 'NEO 103', '306', NULL, NULL),
(340, 7, 'Kat. ozn.', 'NEO 106', '307', NULL, NULL),
(341, 7, 'Kat. ozn.', 'NEO 113', '308', NULL, NULL),
(342, 7, 'Kat. ozn.', 'NEO 117', '309', NULL, NULL),
(343, 7, 'Kat. ozn.', 'NEO 119', '310', NULL, NULL),
(344, 7, 'Kat. ozn.', 'NEO 120', '311', NULL, NULL),
(345, 7, 'Kat. ozn.', 'NEO 121', '312', NULL, NULL),
(346, 7, 'Kat. ozn.', 'NEVADA28', '313', NULL, NULL),
(347, 7, 'Kat. ozn.', 'NOBEL 05', '314', NULL, NULL),
(348, 7, 'Kat. ozn.', 'NOBEL 105', '315', NULL, NULL),
(349, 7, 'Kat. ozn.', 'NOBEL 11', '316', NULL, NULL),
(350, 7, 'Kat. ozn.', 'NOBEL 20', '317', NULL, NULL),
(351, 7, 'Kat. ozn.', 'NOBEL NEW 111', '318', NULL, NULL),
(352, 7, 'Kat. ozn.', 'NVBOC', '319', NULL, NULL),
(353, 7, 'Kat. ozn.', 'ORION 101', '320', NULL, NULL),
(354, 7, 'Kat. ozn.', 'ORION 102', '321', NULL, NULL),
(355, 7, 'Kat. ozn.', 'ORION 105', '322', NULL, NULL),
(356, 7, 'Kat. ozn.', 'ORION 107', '323', NULL, NULL),
(357, 7, 'Kat. ozn.', 'ORION 110', '324', NULL, NULL),
(358, 7, 'Kat. ozn.', 'ORION 112', '325', NULL, NULL),
(359, 7, 'Kat. ozn.', 'ORION 113', '326', NULL, NULL),
(360, 7, 'Kat. ozn.', 'ORION 118', '327', NULL, NULL),
(361, 7, 'Kat. ozn.', 'ORION 119', '328', NULL, NULL),
(362, 7, 'Kat. ozn.', 'ORION 120', '329', NULL, NULL),
(363, 7, 'Kat. ozn.', 'ORION 133', '330', NULL, NULL),
(364, 7, 'Kat. ozn.', 'ORION 211', '331', NULL, NULL),
(365, 7, 'Kat. ozn.', 'ORION 282', '332', NULL, NULL),
(366, 7, 'Kat. ozn.', 'ORION 311', '333', NULL, NULL),
(367, 7, 'Kat. ozn.', 'OUTLANDER A06', '334', NULL, NULL),
(368, 7, 'Kat. ozn.', 'PANDA DARK BEIGE', '335', NULL, NULL),
(369, 7, 'Kat. ozn.', 'PANDA DARK GRAY', '336', NULL, NULL),
(370, 7, 'Kat. ozn.', 'PATCHWORK', '337', NULL, NULL),
(371, 7, 'Kat. ozn.', 'PIAVO 7006', '338', NULL, NULL),
(372, 7, 'Kat. ozn.', 'PIAVO 9107', '339', NULL, NULL),
(373, 7, 'Kat. ozn.', 'PIAVO 9116', '340', NULL, NULL),
(374, 7, 'Kat. ozn.', 'PIAVO 9244', '341', NULL, NULL),
(375, 7, 'Kat. ozn.', 'PIAVO 9491', '342', NULL, NULL),
(376, 7, 'Kat. ozn.', 'PIAVO 9502', '343', NULL, NULL),
(377, 7, 'Kat. ozn.', 'PIAVO 9534', '344', NULL, NULL),
(378, 7, 'Kat. ozn.', 'PIAVO 9573', '345', NULL, NULL),
(379, 7, 'Kat. ozn.', 'PIAVO 9611', '346', NULL, NULL),
(380, 7, 'Kat. ozn.', 'PIAVO 9612', '347', NULL, NULL),
(381, 7, 'Kat. ozn.', 'PIAVO 9930', '348', NULL, NULL),
(382, 7, 'Kat. ozn.', 'PLY STORE 013', '349', NULL, NULL),
(383, 7, 'Kat. ozn.', 'PLY STORE 342', '350', NULL, NULL),
(384, 7, 'Kat. ozn.', 'PLY STORE 512', '351', NULL, NULL),
(385, 7, 'Kat. ozn.', 'PLY STORE 901', '352', NULL, NULL),
(386, 7, 'Kat. ozn.', 'PORTLAND 01', '353', NULL, NULL),
(387, 7, 'Kat. ozn.', 'PORTLAND 02', '354', NULL, NULL),
(388, 7, 'Kat. ozn.', 'PORTLAND 03', '355', NULL, NULL),
(389, 7, 'Kat. ozn.', 'PORTLAND 04', '356', NULL, NULL),
(390, 7, 'Kat. ozn.', 'PORTLAND 05', '357', NULL, NULL),
(391, 7, 'Kat. ozn.', 'PORTLAND 07', '358', NULL, NULL),
(392, 7, 'Kat. ozn.', 'PORTLAND 09', '359', NULL, NULL),
(393, 7, 'Kat. ozn.', 'PORTLAND 105', '360', NULL, NULL),
(394, 7, 'Kat. ozn.', 'PORTLAND 12', '361', NULL, NULL),
(395, 7, 'Kat. ozn.', 'PORTLAND 14', '362', NULL, NULL),
(396, 7, 'Kat. ozn.', 'PORTLAND 16', '363', NULL, NULL),
(397, 7, 'Kat. ozn.', 'PORTLAND 18', '364', NULL, NULL),
(398, 7, 'Kat. ozn.', 'PORTLAND 19', '365', NULL, NULL),
(399, 7, 'Kat. ozn.', 'PORTLAND 21', '366', NULL, NULL),
(400, 7, 'Kat. ozn.', 'PORTLAND 22', '367', NULL, NULL),
(401, 7, 'Kat. ozn.', 'PORTLAND PRINT 12', '368', NULL, NULL),
(402, 7, 'Kat. ozn.', 'PORTLND NEW 103', '369', NULL, NULL),
(403, 7, 'Kat. ozn.', 'PRESTON 21', '370', NULL, NULL),
(404, 7, 'Kat. ozn.', 'PRESTON 29', '371', NULL, NULL),
(405, 7, 'Kat. ozn.', 'RABIT 101', '372', NULL, NULL),
(406, 7, 'Kat. ozn.', 'RABIT 108', '373', NULL, NULL),
(407, 7, 'Kat. ozn.', 'RABIT 110', '374', NULL, NULL),
(408, 7, 'Kat. ozn.', 'RIO 101', '375', NULL, NULL),
(409, 7, 'Kat. ozn.', 'RIO 201', '376', NULL, NULL),
(410, 7, 'Kat. ozn.', 'RIO 401', '377', NULL, NULL),
(411, 7, 'Kat. ozn.', 'RIO 501', '378', NULL, NULL),
(412, 7, 'Kat. ozn.', 'RIO 701', '379', NULL, NULL),
(413, 7, 'Kat. ozn.', 'RIO 801', '380', NULL, NULL),
(414, 7, 'Kat. ozn.', 'RIVIERA 16', '381', NULL, NULL),
(415, 7, 'Kat. ozn.', 'RIVIERA 26', '382', NULL, NULL),
(416, 7, 'Kat. ozn.', 'RIVIERA 34', '383', NULL, NULL),
(417, 7, 'Kat. ozn.', 'RIVIERA 36', '384', NULL, NULL),
(418, 7, 'Kat. ozn.', 'RIVIERA 38', '385', NULL, NULL),
(419, 7, 'Kat. ozn.', 'RIVIERA 41', '386', NULL, NULL),
(420, 7, 'Kat. ozn.', 'RIVIERA 61', '387', NULL, NULL),
(421, 7, 'Kat. ozn.', 'RIVIERA 62', '388', NULL, NULL),
(422, 7, 'Kat. ozn.', 'RIVIERA 79', '389', NULL, NULL),
(423, 7, 'Kat. ozn.', 'RIVIERA 87', '390', NULL, NULL),
(424, 7, 'Kat. ozn.', 'RIVIERA 97', '391', NULL, NULL),
(425, 7, 'Kat. ozn.', 'RODOS 01', '392', NULL, NULL),
(426, 7, 'Kat. ozn.', 'RODOS 02', '393', NULL, NULL),
(427, 7, 'Kat. ozn.', 'SAWANA 05', '394', NULL, NULL),
(428, 7, 'Kat. ozn.', 'SAWANA 11', '395', NULL, NULL),
(429, 7, 'Kat. ozn.', 'SAWANA 17', '396', NULL, NULL),
(430, 7, 'Kat. ozn.', 'SAWANA 21', '397', NULL, NULL),
(431, 7, 'Kat. ozn.', 'SAWANA 27', '398', NULL, NULL),
(432, 7, 'Kat. ozn.', 'SAWANA 31', '399', NULL, NULL),
(433, 7, 'Kat. ozn.', 'SAWANA 34', '400', NULL, NULL),
(434, 7, 'Kat. ozn.', 'SAWANA 61', '401', NULL, NULL),
(435, 7, 'Kat. ozn.', 'SAWANA 69', '402', NULL, NULL),
(436, 7, 'Kat. ozn.', 'SAWANA 72', '403', NULL, NULL),
(437, 7, 'Kat. ozn.', 'SAWANA 80', '404', NULL, NULL),
(438, 7, 'Kat. ozn.', 'SAWANA 84', '405', NULL, NULL),
(439, 7, 'Kat. ozn.', 'SAWANA 96', '406', NULL, NULL),
(440, 7, 'Kat. ozn.', 'SILVIA 0028', '407', NULL, NULL),
(441, 7, 'Kat. ozn.', 'SOFT 002', '408', NULL, NULL),
(442, 7, 'Kat. ozn.', 'SOFT 003', '409', NULL, NULL),
(443, 7, 'Kat. ozn.', 'SOFT 004', '410', NULL, NULL),
(444, 7, 'Kat. ozn.', 'SOFT 020', '411', NULL, NULL),
(445, 7, 'Kat. ozn.', 'SOFT 030', '412', NULL, NULL),
(446, 7, 'Kat. ozn.', 'SOFT 102', '413', NULL, NULL),
(447, 7, 'Kat. ozn.', 'SOFT 115', '414', NULL, NULL),
(448, 7, 'Kat. ozn.', 'SOFT 134', '415', NULL, NULL),
(449, 7, 'Kat. ozn.', 'SOFT 202', '416', NULL, NULL),
(450, 7, 'Kat. ozn.', 'SOFT 253', '417', NULL, NULL),
(451, 7, 'Kat. ozn.', 'SOFT 270', '418', NULL, NULL),
(452, 7, 'Kat. ozn.', 'SOFT 270 ROMB', '419', NULL, NULL),
(453, 7, 'Kat. ozn.', 'SOFT 303', '420', NULL, NULL),
(454, 7, 'Kat. ozn.', 'SOFT 304', '421', NULL, NULL),
(455, 7, 'Kat. ozn.', 'SOFT 305', '422', NULL, NULL),
(456, 7, 'Kat. ozn.', 'SOFT 355', '423', NULL, NULL),
(457, 7, 'Kat. ozn.', 'SOFT 402', '424', NULL, NULL),
(458, 7, 'Kat. ozn.', 'SOFT 402 ROMB', '425', NULL, NULL),
(459, 7, 'Kat. ozn.', 'SOFT 403', '426', NULL, NULL),
(460, 7, 'Kat. ozn.', 'SOFT 404', '427', NULL, NULL),
(461, 7, 'Kat. ozn.', 'SOFT 404 ROMB', '428', NULL, NULL),
(462, 7, 'Kat. ozn.', 'SOFT 432', '429', NULL, NULL),
(463, 7, 'Kat. ozn.', 'SOFT 483', '430', NULL, NULL),
(464, 7, 'Kat. ozn.', 'SOFT 483 ROMB', '431', NULL, NULL),
(465, 7, 'Kat. ozn.', 'SOFT 484', '432', NULL, NULL),
(466, 7, 'Kat. ozn.', 'SOFT 484 ROMB', '433', NULL, NULL),
(467, 7, 'Kat. ozn.', 'SOFT 501', '434', NULL, NULL),
(468, 7, 'Kat. ozn.', 'SOFT 512', '435', NULL, NULL),
(469, 7, 'Kat. ozn.', 'SOFT 601', '436', NULL, NULL),
(470, 7, 'Kat. ozn.', 'SOFT 664', '437', NULL, NULL),
(471, 7, 'Kat. ozn.', 'SOFT 726', '438', NULL, NULL),
(472, 7, 'Kat. ozn.', 'SOFT 901', '439', NULL, NULL),
(473, 7, 'Kat. ozn.', 'SORO 13', '440', NULL, NULL),
(474, 7, 'Kat. ozn.', 'SORO 21', '441', NULL, NULL),
(475, 7, 'Kat. ozn.', 'SORO 24', '442', NULL, NULL),
(476, 7, 'Kat. ozn.', 'SORO 28', '443', NULL, NULL),
(477, 7, 'Kat. ozn.', 'SORO 34', '444', NULL, NULL),
(478, 7, 'Kat. ozn.', 'SORO 40', '445', NULL, NULL),
(479, 7, 'Kat. ozn.', 'SORO 51', '446', NULL, NULL),
(480, 7, 'Kat. ozn.', 'SORO 60', '447', NULL, NULL),
(481, 7, 'Kat. ozn.', 'SORO 61', '448', NULL, NULL),
(482, 7, 'Kat. ozn.', 'SORO 86', '449', NULL, NULL),
(483, 7, 'Kat. ozn.', 'SORO 90', '450', NULL, NULL),
(484, 7, 'Kat. ozn.', 'STRATOS 9000', '451', NULL, NULL),
(485, 7, 'Kat. ozn.', 'STRATOS 9100', '452', NULL, NULL),
(486, 7, 'Kat. ozn.', 'STRATOS 9120', '453', NULL, NULL),
(487, 7, 'Kat. ozn.', 'STRATOS 9123', '454', NULL, NULL),
(488, 7, 'Kat. ozn.', 'STRATOS 9125', '455', NULL, NULL),
(489, 7, 'Kat. ozn.', 'STRATOS 9170', '456', NULL, NULL),
(490, 7, 'Kat. ozn.', 'STRATOS 9244', '457', NULL, NULL),
(491, 7, 'Kat. ozn.', 'STRATOS 9591', '458', NULL, NULL),
(492, 7, 'Kat. ozn.', 'STRATOS 9811', '459', NULL, NULL),
(493, 7, 'Kat. ozn.', 'SUMBA 410', '460', NULL, NULL),
(494, 7, 'Kat. ozn.', 'SUMBA 430', '461', NULL, NULL),
(495, 7, 'Kat. ozn.', 'SUMBA 440', '462', NULL, NULL),
(496, 7, 'Kat. ozn.', 'TIAGO 3718', '463', NULL, NULL),
(497, 7, 'Kat. ozn.', 'TIAGO 5453', '464', NULL, NULL),
(498, 7, 'Kat. ozn.', 'TIAGO 5454', '465', NULL, NULL),
(499, 7, 'Kat. ozn.', 'TIAGO 5569', '466', NULL, NULL),
(500, 7, 'Kat. ozn.', 'TIAGO 5579', '467', NULL, NULL),
(501, 7, 'Kat. ozn.', 'TIAGO 5580', '468', NULL, NULL),
(502, 7, 'Kat. ozn.', 'TIAGO 6110', '469', NULL, NULL),
(503, 7, 'Kat. ozn.', 'TIAGO 6540', '470', NULL, NULL),
(504, 7, 'Kat. ozn.', 'TIAGO 8658', '471', NULL, NULL),
(505, 7, 'Kat. ozn.', 'TIAGO 9130', '472', NULL, NULL),
(506, 7, 'Kat. ozn.', 'TIAGO 9324', '473', NULL, NULL),
(507, 7, 'Kat. ozn.', 'TIAGO 9354', '474', NULL, NULL),
(508, 7, 'Kat. ozn.', 'TIAGO 9409', '475', NULL, NULL),
(509, 7, 'Kat. ozn.', 'TIAGO 9580', '476', NULL, NULL),
(510, 7, 'Kat. ozn.', 'TIAGO 9615', '477', NULL, NULL),
(511, 7, 'Kat. ozn.', 'TIAGO 9636', '478', NULL, NULL),
(512, 7, 'Kat. ozn.', 'TIAGO 9905', '479', NULL, NULL),
(513, 7, 'Kat. ozn.', 'TIAGO 9912', '480', NULL, NULL),
(514, 7, 'Kat. ozn.', 'TIMOR 103', '481', NULL, NULL),
(515, 7, 'Kat. ozn.', 'TIMOR 115', '482', NULL, NULL),
(516, 7, 'Kat. ozn.', 'TIMOR 119', '483', NULL, NULL),
(517, 7, 'Kat. ozn.', 'TIMOR NEW 102', '484', NULL, NULL),
(518, 7, 'Kat. ozn.', 'TIMOR NEW 103', '485', NULL, NULL),
(519, 7, 'Kat. ozn.', 'TIMOR NEW 105', '486', NULL, NULL),
(520, 7, 'Kat. ozn.', 'TIMOR NEW 117', '487', NULL, NULL),
(521, 7, 'Kat. ozn.', 'TIMOR NEW 118', '488', NULL, NULL),
(522, 7, 'Kat. ozn.', 'ULTRA MARA B.WHITE', '489', NULL, NULL),
(523, 7, 'Kat. ozn.', 'ULTRA MARA WHITE', '490', NULL, NULL),
(524, 7, 'Kat. ozn.', 'WESTER 101', '491', NULL, NULL),
(525, 7, 'Kat. ozn.', 'WESTER 103', '492', NULL, NULL),
(526, 7, 'Kat. ozn.', 'WESTER 105', '493', NULL, NULL),
(527, 7, 'Kat. ozn.', 'WESTER 107', '494', NULL, NULL),
(528, 7, 'Kat. ozn.', 'WESTER 108', '495', NULL, NULL),
(529, 7, 'Kat. ozn.', 'WESTER 110', '496', NULL, NULL),
(530, 7, 'Kat. ozn.', 'WESTER 111', '497', NULL, NULL),
(531, 7, 'Kat. ozn.', 'WESTER 113', '498', NULL, NULL),
(532, 7, 'Kat. ozn.', 'WESTER 114', '499', NULL, NULL),
(533, 7, 'Kat. ozn.', 'WESTER 116', '500', NULL, NULL),
(534, 7, 'Kat. ozn.', 'WESTER 118', '501', NULL, NULL),
(535, 7, 'Kat. ozn.', 'WESTER 133', '502', NULL, NULL),
(536, 7, 'Kat. ozn.', 'WESTER 136', '503', NULL, NULL),
(537, 7, 'Kat. ozn.', 'WESTER 301', '504', NULL, NULL),
(538, 7, 'Kat. ozn.', 'WESTER 318', '505', NULL, NULL),
(539, 7, 'Kat. ozn.', 'Retex crni', '506', NULL, NULL),
(540, 7, 'Kat. ozn.', 'Retex bež', '507', NULL, NULL),
(541, 7, 'Kat. ozn.', 'Retex bijeli', '508', NULL, NULL),
(542, 7, 'Kat. ozn.', 'Rabit 114', '509', NULL, NULL),
(543, 7, 'Kat. ozn.', 'LISA 118', '510', NULL, NULL),
(544, 8, '', 'Crna', '0', NULL, NULL),
(545, 8, '', 'Bež', '0', NULL, NULL),
(546, 10, '61', '(bajc opis)', '0', NULL, NULL),
(547, 10, '62', '(temeljna opis)', '0', NULL, NULL),
(548, 10, '63', '(završna opis)', '0', NULL, NULL),
(549, 10, '66', '(bio ulje opis)', '0', NULL, NULL),
(552, 7, 'Kat. ozn.', 'za brisanje krpom', '5556', '2021-05-29 22:08:52', '2021-05-29 22:09:20'),
(553, 7, 'Kat. ozn.', 'ĐURĐA', '23245', '2021-05-31 08:31:08', '2021-05-31 08:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `mattipvrste`
--

CREATE TABLE `mattipvrste` (
  `id` int(10) NOT NULL,
  `mattip_id` int(10) DEFAULT NULL,
  `dodatni_izbor` int(5) DEFAULT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `jed_mjere` varchar(20) DEFAULT NULL,
  `lokacija_id` int(10) DEFAULT NULL,
  `k_vm_01` int(5) DEFAULT NULL,
  `k_vm_02` int(5) DEFAULT NULL,
  `k_vm_03` int(5) DEFAULT NULL,
  `k_vm_04` int(5) DEFAULT NULL,
  `k_vm_05` int(5) DEFAULT NULL,
  `k_vm_06` int(5) DEFAULT NULL,
  `k_vm_07` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mattipvrste`
--

INSERT INTO `mattipvrste` (`id`, `mattip_id`, `dodatni_izbor`, `naziv`, `jed_mjere`, `lokacija_id`, `k_vm_01`, `k_vm_02`, `k_vm_03`, `k_vm_04`, `k_vm_05`, `k_vm_06`, `k_vm_07`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Bukva - daska sirova neparena', 'm3', 1, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:42', '2020-12-21 18:01:43'),
(2, 1, 0, 'Bukva - daska sirova parena', 'm3', 1, 120, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:41', '2021-06-15 17:27:37'),
(3, 1, 0, 'Bukva - daska suva neparena', 'm3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:40', '2020-12-21 18:01:45'),
(4, 1, 0, 'Bukva - daska suva parena', 'm3', 1, 110, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:39', '2021-03-30 18:11:22'),
(5, 2, 0, 'Iverica', 'm3', 1, 120, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:39', '2021-01-29 12:52:54'),
(6, 2, 0, 'Lesonit', 'm2', 1, 150, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:38', '2021-01-29 18:58:54'),
(7, 2, 0, 'Šperploča', 'm2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:25', '2020-12-21 18:01:27'),
(8, 2, 0, 'Furnirski otpresak', 'kom', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:24', '2020-12-21 18:01:28'),
(9, 3, 0, 'Elastična', 'm', 1, 101, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:24', '2021-07-01 14:54:08'),
(10, 6, 0, 'Standardna', 'set', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:22', '2020-12-21 18:01:30'),
(11, 6, 0, 'Crna', 'set', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:22', '2020-12-21 18:01:31'),
(12, 7, 0, 'Štof', 'm', 1, 170, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:21', '2021-01-30 15:42:32'),
(13, 7, 0, 'Eko koža', 'm', 1, 140, 0, 0, 0, 0, 0, 0, '2020-12-21 18:01:20', '2021-01-30 15:43:07'),
(14, 8, 0, 'Retex 14gr', 'm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:20', '2020-12-21 18:01:33'),
(15, 8, 0, 'Retex 70gr', 'm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:10', '2020-12-21 18:01:34'),
(16, 8, 0, 'Retex 100gr', 'm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:18', '2020-12-21 18:01:35'),
(17, 8, 0, 'Mikrofiber', 'm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:17', '2020-12-21 18:01:36'),
(18, 9, 0, 'Ljepilo za spužvu', 'kg', 5, 12, 110, 0, 0, 0, 0, 0, '2020-12-21 18:01:11', '2021-01-30 18:19:43'),
(19, 9, 0, 'Ljepilo za drvo', 'kg', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:01:12', '2020-12-21 18:01:03'),
(29, 4, 0, 'Za tapaciranje', 'kom', 5, 103, 103, 0, 0, 0, 0, 0, '2020-12-21 18:01:09', '2021-01-29 18:52:04'),
(30, 4, 0, 'Za pakovanje', 'kom', 5, 103, 103, 0, 0, 0, 0, 0, '2020-12-21 18:00:50', '2021-01-29 18:53:44'),
(31, 5, 0, 'Ljepenka za tapaciranje', 'kg', 1, 100, 110, 0, 0, 0, 0, 0, '2020-12-21 18:00:51', '2021-05-28 15:26:14'),
(32, 11, 0, 'Brušenje drveta', 'kom', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:00:52', '2020-12-21 18:00:55'),
(33, 11, 0, 'Brušenje laka', 'kom', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-21 18:00:53', '2020-12-21 18:00:55'),
(34, 12, 0, 'Okovi', 'kom', 1, 110, 0, 0, 0, 0, 0, 0, '2020-12-21 18:00:53', '2021-05-28 15:39:42'),
(46, 1, 0, 'Sport Box - testna', 'm3', 5, 101, 202, 303, 5, 6, 7, 8, '2021-01-23 17:34:57', '2021-01-29 11:24:03'),
(57, 2, 0, 'Iverica sportbox', 'm3', 5, 167, 0, 0, 0, 0, 0, 0, '2021-01-29 12:40:37', '2021-01-29 12:40:50'),
(58, 3, 0, 'Neelastična', 'm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 12, 0, 'Vijci', 'kom', 5, 102, 0, 0, 0, 0, 0, 0, '2021-01-30 18:14:17', '2021-01-30 18:14:29'),
(60, 13, 0, 'Streč folija', 'kg', 5, 103, 0, 0, 0, 0, 0, 0, '2021-01-30 18:17:05', '2021-01-30 18:17:05'),
(61, 10, 0, 'Bojenje/bajcovanje', 'kg', 4, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-02-21 09:23:15'),
(62, 10, 0, 'Temeljno lakiranje', 'kg', 4, 10, 105, 1400, 0, 200, 0, 1200, NULL, '2021-02-21 09:21:26'),
(63, 10, 0, 'Završno lakiranje', 'kg', 4, 10, 30, 0, 0, 0, 0, 112000, NULL, '2021-05-19 19:13:33'),
(64, 9, 0, 'nova vrsta ljepila', 'kg', 1, 18, 110, 0, 0, 0, 0, 0, '2021-02-04 17:54:31', '2021-02-04 17:54:31'),
(65, 4, 0, 'katon za gledanje', 'kom.', 5, 100, 120, 0, 0, 0, 0, 0, '2021-02-04 18:17:29', '2021-02-04 18:17:29'),
(66, 10, 0, 'Bio ulje', 'kg', 4, 60, 10, 0, 0, 0, 0, 0, '2021-02-21 08:09:08', '2021-02-21 09:01:58'),
(69, 10, 10, 'Kontakt za temeljni lak', 'kg', 4, 0, 0, 50, 1000, 0, 0, 0, '2021-02-21 09:04:37', '2021-02-21 09:04:37'),
(70, 10, 11, 'Kontakt za završni lak', 'kg', 4, 0, 0, 50, 1500, 0, 0, 0, '2021-02-21 09:05:17', '2021-02-21 09:05:17'),
(71, 10, 20, 'Razređivač PU', 'kg', 4, 0, 0, 0, 0, 10, 100, 0, '2021-02-21 09:06:34', '2021-03-15 21:09:29'),
(621, 12, 0, 'konac', 'm', 6, 105, 0, 0, 0, 0, 0, 0, '2021-02-21 17:50:11', '2021-02-21 17:50:11'),
(6302, 13, 0, 'selotejp', 'kom', 3, 102, 0, 0, 0, 0, 0, 0, '2021-05-28 15:45:38', '2021-05-28 15:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_01_15_100000_create_roles_table', 1),
(3, '2019_01_15_110000_create_users_table', 1),
(4, '2019_01_17_121504_create_categories_table', 1),
(5, '2019_01_21_130422_create_tags_table', 1),
(6, '2019_01_21_163402_create_items_table', 1),
(7, '2019_01_21_163414_create_item_tag_table', 1),
(8, '2019_03_06_132557_add_photo_column_to_users_table', 1),
(9, '2019_03_06_143255_add_fields_to_items_table', 1),
(10, '2019_03_20_090438_add_color_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtags`
--

CREATE TABLE `mtags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtags`
--

INSERT INTO `mtags` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Za otpis', '#f44336', '2020-05-28 12:52:02', '2020-06-04 16:36:59'),
(3, 'Ispravna', '#50acd3', '2020-05-28 12:52:02', '2020-06-04 16:37:28'),
(4, 'na servisu', '#eaa81a', '2020-06-02 20:46:03', '2020-06-04 16:23:27'),
(6, 'NOVO', '#31c93b', '2020-06-04 16:37:46', '2020-06-04 16:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `operacije`
--

CREATE TABLE `operacije` (
  `id` int(10) NOT NULL,
  `element_id` int(10) DEFAULT NULL,
  `redni_broj` int(3) DEFAULT NULL,
  `masina_id` int(10) NOT NULL,
  `br_rr` int(5) DEFAULT NULL,
  `br_pr` int(5) DEFAULT NULL,
  `br_us` int(5) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `parametri` text DEFAULT NULL,
  `alat_id` int(10) NOT NULL,
  `vrijeme` int(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operacije`
--

INSERT INTO `operacije` (`id`, `element_id`, `redni_broj`, `masina_id`, `br_rr`, `br_pr`, `br_us`, `opis`, `parametri`, `alat_id`, `vrijeme`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 6, 1, 1, 2, 'operacija na elementu', 'parametri su bitni parametri su bitni parametri su bitni parametri su bitni parametri su bitni', 3, 1000, NULL, '2020-12-17 20:31:28'),
(2, 3, 2, 4, 1, 2, 3, 'druga operacija', 'malo paramatara i još malo paramatara i još malo paramatara i još malo paramatara i još malo paramatara i još', 1, 3000, NULL, '2020-12-09 16:35:36'),
(4, 4, 1, 4, 1, 2, 3, '.', '.', 3, 65000, '2020-10-19 17:17:22', '2020-10-19 17:17:22'),
(5, 1, 1, 5, 1, 1, 7, 'opis', 'neki paramatri teka da ne bude prazno', 1, 1000, '2020-10-19 17:45:18', '2021-02-14 17:40:39'),
(13, 1, 5, 4, 1, 0, 1, '5', '555', 3, 2000, '2020-10-19 18:13:41', '2020-12-09 16:34:34'),
(14, 55, 1, 5, 1, 1, 12, '121', '212', 3, 33000, '2020-10-19 18:21:53', '2021-02-14 18:13:49'),
(19, 55, 2, 4, 1, 1, 2, '2', '2', 1, 2000, '2020-10-19 18:22:43', '2020-10-19 18:22:43'),
(25, 49, 2, 4, 3, 3, 6, NULL, NULL, 1, 10000, '2020-10-19 19:37:50', '2020-12-16 22:18:13'),
(26, 91, 1, 6, 7, 7, 14, '77', '88', 3, 5000, '2020-10-19 19:43:17', '2020-12-16 22:18:57'),
(27, 50, 1, 5, 1, 0, 7, NULL, NULL, 1, 10000, '2020-10-20 17:16:17', '2021-02-14 17:40:39'),
(28, 66, 1, 11, 1, 1, 2, 'lijepimo nešto s nečim', NULL, 1, 0, '2020-10-20 17:17:56', '2020-10-20 17:17:56'),
(29, 60, 1, 5, 1, 2, 9, 'asdfa fa saf asfa f', 'a sda sdf sd sdsdf', 3, 1000, '2020-11-23 16:03:15', '2021-02-14 18:06:08'),
(30, 60, 2, 4, 2, 0, 2, 'druga operacija', NULL, 1, 2000, '2020-11-23 16:03:55', '2021-02-14 08:41:50'),
(32, 1, 5, 4, 2, 1, 3, NULL, NULL, 1, 1000, '2020-12-17 18:01:03', '2020-12-17 18:02:57'),
(33, 54, 1, 11, 1, 0, 1, NULL, NULL, 3, 5000, '2020-12-20 21:01:43', '2020-12-20 21:01:43'),
(34, 115, 1, 5, 1, 0, 7, '1', '1', 3, 10000, '2021-01-31 15:38:28', '2021-02-14 17:40:39'),
(35, 116, 2, 5, 1, 0, 7, NULL, NULL, 3, 20000, '2021-01-31 15:53:56', '2021-02-14 17:40:39'),
(36, 121, 1, 11, 1, 0, 2, NULL, NULL, 3, 15000, '2021-01-31 17:42:11', '2021-02-01 23:07:08'),
(37, 115, 1, 5, 1, 0, 7, NULL, NULL, 1, 1000, '2021-02-01 22:11:04', '2021-02-14 17:40:39'),
(38, 110, 1, 5, 1, 0, 7, NULL, NULL, 1, 0, '2021-02-02 17:45:31', '2021-02-14 17:40:39'),
(39, 126, 1, 5, 1, 0, 7, NULL, NULL, 1, 1750, '2021-02-11 11:44:30', '2021-02-14 17:40:39'),
(40, 60, 1, 5, 1, 0, 9, '1', NULL, 3, 1000, '2021-02-14 07:56:57', '2021-02-14 18:06:08'),
(41, 60, 4, 6, 1, 0, 1, NULL, NULL, 1, 10000, '2021-02-14 14:27:35', '2021-02-14 14:27:35'),
(42, 60, 5, 11, 1, 0, 1, NULL, NULL, 1, 10000, '2021-02-14 14:51:06', '2021-02-14 14:51:06'),
(43, 130, 1, 14, 5, 0, 5, 'lakiranje', NULL, 3, 10000, '2021-02-14 15:30:16', '2021-02-14 15:30:16'),
(44, 201, 1, 5, 1, 2, 9, 'asdfa fa saf asfa f', 'a sda sdf sd sdsdf', 3, 1000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(45, 201, 2, 4, 2, 0, 2, 'druga operacija', NULL, 1, 2000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(46, 201, 1, 5, 1, 0, 9, '1', NULL, 3, 1000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(47, 201, 4, 6, 1, 0, 1, NULL, NULL, 1, 10000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(48, 201, 5, 11, 1, 0, 1, NULL, NULL, 1, 10000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(49, 202, 1, 14, 5, 0, 5, 'lakiranje', NULL, 3, 10000, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(50, 208, 2, 4, 3, 3, 6, NULL, NULL, 1, 10000, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(51, 209, 1, 11, 1, 0, 1, NULL, NULL, 3, 5000, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(52, 210, 1, 6, 7, 7, 14, '77', '88', 3, 5000, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(53, 108, 1, 6, 1, 0, 2, NULL, NULL, 3, 10000, '2021-05-26 19:57:08', '2021-08-26 15:34:50'),
(54, 109, 4, 6, 1, 0, 2, NULL, NULL, 1, 20000, '2021-05-26 19:57:47', '2021-08-26 15:34:50'),
(55, 274, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(56, 275, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(57, 277, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(58, 278, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(59, 280, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(60, 281, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(61, 283, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(62, 284, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(63, 286, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(64, 287, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(65, 289, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(66, 290, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(67, 292, 1, 11, 1, 0, 1, NULL, NULL, 3, 10000, '2021-05-26 20:53:38', '2021-05-26 20:53:38'),
(68, 293, 4, 6, 1, 0, 1, NULL, NULL, 1, 20000, '2021-05-26 20:53:38', '2021-05-26 20:53:38'),
(69, 298, 5, 11, 1, 0, 3, NULL, NULL, 1, 1000, '2021-07-17 10:59:28', '2021-08-26 15:45:29'),
(70, 303, 1, 6, 1, 0, 1, NULL, NULL, 3, 100000, '2021-09-05 08:19:43', '2021-09-05 08:19:43'),
(71, 304, 1, 6, 1, 0, 2, NULL, NULL, 3, 10000, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(72, 305, 4, 6, 1, 0, 2, NULL, NULL, 1, 20000, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(73, 308, 5, 11, 1, 0, 3, NULL, NULL, 1, 1000, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(74, 310, 1, 6, 1, 0, 2, NULL, NULL, 3, 10000, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(75, 311, 4, 6, 1, 0, 2, NULL, NULL, 1, 20000, '2021-09-06 16:56:32', '2021-09-06 16:56:32'),
(76, 314, 5, 11, 1, 0, 3, NULL, NULL, 1, 1000, '2021-09-06 16:56:32', '2021-09-06 16:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `parametri`
--

CREATE TABLE `parametri` (
  `id` int(10) NOT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `vrijednost` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='opšti paramatri aplikacije';

--
-- Dumping data for table `parametri`
--

INSERT INTO `parametri` (`id`, `naziv`, `vrijednost`, `created_at`, `updated_at`) VALUES
(1, 'Norma sat (KM)', 1100, '2021-04-17 16:31:51', '2021-06-18 20:31:21'),
(2, 'novi parametar', 432180, '2021-04-17 16:05:13', '2021-04-17 16:10:13'),
(3, 'jo[ noviji', 765433, '2021-04-17 16:10:35', '2021-05-23 09:17:58'),
(4, 'ahahah', 4500, '2021-05-23 09:18:52', '2021-05-28 17:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predracuni`
--

CREATE TABLE `predracuni` (
  `id` int(5) NOT NULL,
  `broj` varchar(20) DEFAULT '0',
  `datum` date DEFAULT NULL,
  `kupac_id` int(10) NOT NULL,
  `napomena` varchar(300) DEFAULT NULL,
  `komplet_remont` int(1) DEFAULT 1 COMMENT '1-komplet; 2-remont',
  `usluga_id` int(10) DEFAULT 1,
  `ukupna_cijena` int(11) DEFAULT NULL,
  `nacin_placanja` int(1) DEFAULT 1 COMMENT '1 - gotovina, 2-ziralno',
  `status` int(11) DEFAULT 0,
  `rabat` int(2) DEFAULT 0,
  `garancija` int(2) DEFAULT 0,
  `garancija_el` int(2) DEFAULT 0,
  `oem` varchar(50) DEFAULT NULL,
  `oem_cijena` int(10) DEFAULT NULL,
  `CW_id` int(10) DEFAULT NULL,
  `CW_cijena` int(10) DEFAULT NULL,
  `TW_id` int(10) DEFAULT NULL,
  `TW_cijena` int(10) DEFAULT NULL,
  `BH_id` int(10) DEFAULT NULL,
  `BH_cijena` int(10) DEFAULT NULL,
  `BP_id` int(10) DEFAULT NULL,
  `BP_cijena` int(10) DEFAULT NULL,
  `HS_id` int(10) DEFAULT NULL,
  `HS_cijena` int(10) DEFAULT NULL,
  `AC_id` int(10) DEFAULT NULL,
  `AC_cijena` int(10) DEFAULT NULL,
  `NZ_id` int(10) DEFAULT NULL,
  `NZ_cijena` int(10) DEFAULT NULL,
  `GK_id` int(10) DEFAULT NULL,
  `GK_cijena` int(10) UNSIGNED DEFAULT NULL,
  `RK_id` int(10) DEFAULT NULL,
  `RK_cijena` int(10) DEFAULT NULL,
  `TH_id` int(10) DEFAULT NULL,
  `TH_cijena` int(10) DEFAULT NULL,
  `CN_id` int(10) DEFAULT NULL,
  `CN_cijena` int(10) DEFAULT NULL,
  `X01_id` int(10) DEFAULT NULL,
  `X01_cijena` int(10) DEFAULT NULL,
  `X02_id` int(10) DEFAULT NULL,
  `X02_cijena` int(10) DEFAULT NULL,
  `X03_id` int(10) DEFAULT NULL,
  `X03_cijena` int(10) DEFAULT NULL,
  `X04_id` int(10) DEFAULT NULL,
  `X04_cijena` int(10) DEFAULT NULL,
  `X05_id` int(10) DEFAULT NULL,
  `X05_cijena` int(10) DEFAULT NULL,
  `X06_id` int(10) DEFAULT NULL,
  `X06_cijena` int(10) DEFAULT NULL,
  `X07_id` int(10) DEFAULT NULL,
  `X07_cijena` int(10) DEFAULT NULL,
  `X08_id` int(10) DEFAULT NULL,
  `X08_cijena` int(10) DEFAULT NULL,
  `X09_id` int(10) DEFAULT NULL,
  `X09_cijena` int(10) DEFAULT NULL,
  `X10_id` int(10) DEFAULT NULL,
  `X10_cijena` int(10) DEFAULT NULL,
  `X11_id` int(10) DEFAULT NULL,
  `X11_cijena` int(10) DEFAULT NULL,
  `X12_id` int(10) DEFAULT NULL,
  `X12_cijena` int(10) DEFAULT NULL,
  `X13_id` int(10) DEFAULT NULL,
  `X13_cijena` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CW_kolicina` int(11) DEFAULT 0,
  `TW_kolicina` int(11) DEFAULT 0,
  `BH_kolicina` int(11) DEFAULT 0,
  `BP_kolicina` int(11) DEFAULT 0,
  `HS_kolicina` int(11) DEFAULT 0,
  `AC_kolicina` int(11) DEFAULT 0,
  `NZ_kolicina` int(11) DEFAULT 0,
  `GK_kolicina` int(11) DEFAULT 0,
  `RK_kolicina` int(11) DEFAULT 0,
  `TH_kolicina` int(11) DEFAULT 0,
  `CN_kolicina` int(11) DEFAULT 0,
  `X01_kolicina` int(11) DEFAULT 0,
  `X02_kolicina` int(11) DEFAULT 0,
  `X03_kolicina` int(11) DEFAULT 0,
  `X04_kolicina` int(11) DEFAULT 0,
  `X05_kolicina` int(11) DEFAULT 0,
  `X06_kolicina` int(11) DEFAULT 0,
  `X07_kolicina` int(11) DEFAULT 0,
  `X08_kolicina` int(11) DEFAULT 0,
  `X09_kolicina` int(11) DEFAULT 0,
  `X10_kolicina` int(11) DEFAULT 0,
  `X11_kolicina` int(11) DEFAULT 0,
  `X12_kolicina` int(11) DEFAULT 0,
  `X13_kolicina` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predracuni`
--

INSERT INTO `predracuni` (`id`, `broj`, `datum`, `kupac_id`, `napomena`, `komplet_remont`, `usluga_id`, `ukupna_cijena`, `nacin_placanja`, `status`, `rabat`, `garancija`, `garancija_el`, `oem`, `oem_cijena`, `CW_id`, `CW_cijena`, `TW_id`, `TW_cijena`, `BH_id`, `BH_cijena`, `BP_id`, `BP_cijena`, `HS_id`, `HS_cijena`, `AC_id`, `AC_cijena`, `NZ_id`, `NZ_cijena`, `GK_id`, `GK_cijena`, `RK_id`, `RK_cijena`, `TH_id`, `TH_cijena`, `CN_id`, `CN_cijena`, `X01_id`, `X01_cijena`, `X02_id`, `X02_cijena`, `X03_id`, `X03_cijena`, `X04_id`, `X04_cijena`, `X05_id`, `X05_cijena`, `X06_id`, `X06_cijena`, `X07_id`, `X07_cijena`, `X08_id`, `X08_cijena`, `X09_id`, `X09_cijena`, `X10_id`, `X10_cijena`, `X11_id`, `X11_cijena`, `X12_id`, `X12_cijena`, `X13_id`, `X13_cijena`, `created_at`, `updated_at`, `CW_kolicina`, `TW_kolicina`, `BH_kolicina`, `BP_kolicina`, `HS_kolicina`, `AC_kolicina`, `NZ_kolicina`, `GK_kolicina`, `RK_kolicina`, `TH_kolicina`, `CN_kolicina`, `X01_kolicina`, `X02_kolicina`, `X03_kolicina`, `X04_kolicina`, `X05_kolicina`, `X06_kolicina`, `X07_kolicina`, `X08_kolicina`, `X09_kolicina`, `X10_kolicina`, `X11_kolicina`, `X12_kolicina`, `X13_kolicina`) VALUES
(11, 'sb-011', '2022-02-15', 2, '-', 1, 2, 14600, 2, 9, 0, 2, 0, '555', 14600, 25, 4400, 16, 3000, 0, 0, 0, 0, 0, 0, 0, 0, 17, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 08:32:20', '2022-02-20 20:20:35', 1, 2, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'serv-3 / 2022', '2022-02-15', 3, '-', 2, 4, 33300, 1, 1, 0, 2, 1, '755042-0002', 18525, 12, 2300, 0, 0, 0, 0, 15, 2300, 1, 3575, 0, 0, 0, 0, 8, 3300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 19:00:26', '2022-03-19 21:28:31', 1, 0, 0, 2, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(14, 'serv-1/2022', '2022-02-15', 1, '-', 2, 4, 11245, 1, 0, 0, 3, 0, '534-345', 2245, 12, 2300, 0, 0, 14, 2200, 15, 2300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 19:12:01', '2022-02-20 21:49:12', 1, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, '3215', '2022-02-15', 3, 'dfa fa afsd assa dg', 1, 6, 12000, 1, 0, 0, 3, 0, '555', 12000, 12, 2300, 16, 3000, 0, 0, 0, 0, 0, 0, 0, 0, 17, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 21:37:23', '2022-02-19 22:57:26', 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, '270', '2022-02-15', 3, '-', 1, 4, 27045, 1, 0, 0, 2, 0, '534-345', 2245, 12, 2300, 0, 0, 14, 2200, 15, 2300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 22:26:33', '2022-02-15 22:27:14', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, '45 / 2022', '2022-02-15', 1, '-', 1, 4, 2500, 1, 1, 0, 2, 0, 'skroz nov', 2500, 12, 2300, 16, 3000, 14, 2200, 0, 0, 1, 3575, 13, 1100, 17, 5000, 8, 3300, 2, 4100, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-15 22:56:52', '2022-02-19 23:26:43', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(19, '785 / 2022', '2022-02-21', 3, '-', 2, 5, 21000, 1, 0, 0, 0, 0, '534-345', 7000, 12, 2300, 0, 0, 14, 2200, 22, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 4500, 0, 0, 27, 1000, 0, 0, 0, 0, 0, 0, 24, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-21 19:50:56', '2022-02-26 22:01:43', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(20, '1234/2022', '2022-02-21', 12, '-', 2, 1, 40000, 1, 0, 0, 3, 0, '534-345', 20000, 12, 2300, 0, 0, 14, 2200, 22, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 4500, 0, 0, 27, 1000, 0, 0, 0, 0, 0, 0, 24, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-21 21:27:49', '2022-02-26 22:01:10', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 9, 0, 0, 0, 0, 0),
(21, '78999', '2022-02-26', 2, '-', 2, 4, 50276, 1, 0, 5, 0, 0, 'skroz nov', 18000, 12, 2300, 16, 3000, 14, 2200, 15, 2300, 1, 3575, 13, 1100, 17, 5000, 8, 3300, 2, 4100, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-26 22:34:20', '2022-03-18 21:38:03', 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, '3335', '2022-02-26', 2, '-', 2, 5, 31600, 1, 0, 0, 0, 0, 'ddd', 7000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 12300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-26 22:39:18', '2022-02-26 22:41:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'ASa', '2022-03-19', 2, '-', 2, 5, 20800, 1, 0, 0, 0, 0, '2342-999991234', 7000, 12, 2300, 16, 3000, 14, 2200, 22, 1000, 0, 0, 13, 1100, 0, 0, 0, 0, 0, 0, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 26, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-19 20:16:20', '2022-03-19 20:16:20', 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'wq', '2022-03-19', 2, '-', 2, 3, 21000, 1, 0, 0, 0, 0, '2342-999991234', 4200, 12, 2300, 16, 3000, 14, 2200, 22, 1000, 0, 0, 13, 1100, 0, 0, 0, 0, 0, 0, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 26, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-19 20:17:36', '2022-03-20 18:50:40', 1, 1, 1, 4, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'yxycyx', '2022-03-19', 3, '-', 2, 3, 33075, 1, 0, 0, 0, 0, 'skroz nov', 0, 12, 2300, 16, 3000, 14, 2200, 15, 2300, 1, 3575, 13, 1100, 17, 5000, 8, 3300, 2, 4100, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-19 20:17:53', '2022-03-20 19:01:39', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'yxcy', '2022-03-19', 1, '-', 2, 3, 7600, 1, 0, 0, 0, 0, 'tesla', 0, 0, 0, 16, 3000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 4500, 0, 0, 26, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-19 20:18:05', '2022-03-19 20:18:05', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, '222555', '2022-03-20', 2, '-', 2, 5, 20015, 1, 0, 5, 3, NULL, '2342-999991234', 7000, 12, 2300, 16, 3000, 14, 2200, 22, 1000, 0, 0, 13, 1100, 0, 0, 0, 0, 0, 0, 19, 2000, 18, 2100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-20 14:57:11', '2022-03-20 14:57:11', 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proiztipovi`
--

CREATE TABLE `proiztipovi` (
  `id` int(5) NOT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `opis` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proiztipovi`
--

INSERT INTO `proiztipovi` (`id`, `naziv`, `opis`) VALUES
(1, 'namještaj', 'stolovi, stolice, ormari itd.');

-- --------------------------------------------------------

--
-- Table structure for table `proiztipvrste`
--

CREATE TABLE `proiztipvrste` (
  `id` int(5) NOT NULL,
  `proiztip_id` int(5) DEFAULT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `aktivna` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proiztipvrste`
--

INSERT INTO `proiztipvrste` (`id`, `proiztip_id`, `naziv`, `aktivna`) VALUES
(1, 1, 'Stolica', 1),
(2, 1, 'Sto', 1),
(3, 1, 'Komoda', 1),
(4, 1, 'Vitrina', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(10) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `sifra_proizvoda` varchar(50) DEFAULT NULL,
  `model_id` int(5) DEFAULT NULL,
  `boja1_id` int(5) DEFAULT NULL,
  `boja2_id` int(5) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `proizvoda_u_smjeni` int(5) DEFAULT 1,
  `aktivan` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `sifra_proizvoda`, `model_id`, `boja1_id`, `boja2_id`, `opis`, `proizvoda_u_smjeni`, `aktivan`, `created_at`, `updated_at`) VALUES
(1, 'Kancona', 'STOL-01-2020', NULL, NULL, NULL, 'prvi testni proizvod', 1, 0, '2020-10-01 20:47:50', '2020-10-01 20:51:03'),
(6, 'Noćni ormarić', 'NORM-3434-2020', NULL, NULL, NULL, 'Dajemo evo par napomena o proizvodu tek toliko da ima nešt', 143, 1, '2020-10-01 20:04:53', '2021-05-28 15:47:15'),
(9, 'Plakar', 'PLA-2020', NULL, NULL, NULL, 'dovoljan da se u njega natrpa sve gardorebe što ima u kući', 1, 1, '2020-10-04 00:18:47', '2020-10-05 11:00:06'),
(11, 'Potpuno nov proizvod', 'nova šifra', NULL, NULL, NULL, 'novi opis', 1, 0, '2020-10-04 09:39:11', '2020-10-11 19:08:59'),
(14, 'krevet dječiji', 'KRE-15/2020', NULL, NULL, NULL, 'krevet  neki frk stariji od', 69, 0, '2020-10-05 15:53:32', '2021-05-27 18:12:54'),
(16, 'Stolica: Ditta, Wenge, SOFT 432', '002004462', 2, 4, 462, 'wenge, pu soft', 1, 1, '2020-10-12 14:33:50', '2021-09-01 15:58:55'),
(18, 'Komoda: Linea, Natur bajc, AFRIKA 04', '004024042', 4, 24, 42, 'opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh', 16, 1, '2021-01-23 18:04:23', '2021-09-01 16:00:44'),
(19, 'SportBox', '001-SB', NULL, NULL, NULL, 'kratak opis evo ga na', 1, 1, '2021-01-31 14:02:19', '2021-02-01 23:29:46'),
(20, 'sportbox 3', '0003', NULL, NULL, NULL, '-', 1, 1, '2021-01-31 16:37:22', '2021-01-31 16:37:22'),
(39, 'krevet dječiji lklklklkl', 'KRE-15/2020', NULL, NULL, NULL, 'krevet  neki frk stari', 1, 0, '2021-05-25 18:51:23', '2021-05-25 18:51:23'),
(40, 'Stolica Dita druga', 'STL-001-2020', NULL, NULL, NULL, 'wenge, pu soft KOPIRANO', 1, 1, '2021-05-25 18:56:02', '2021-05-25 18:56:02'),
(41, 'Stolica Dita', 'STL-001-2020', NULL, NULL, NULL, 'wenge, pu soft - SA OPERACIJAMA', 1, 1, '2021-05-25 20:50:04', '2021-05-25 20:50:04'),
(42, 'Stolica Dita - OPERACIONALIZIRANA', 'STL-001-2020', NULL, NULL, NULL, 'wenge, pu soft', 1, 1, '2021-05-25 20:53:16', '2021-05-25 20:53:16'),
(43, 'Stolica Dita - new hope', 'STL-001-2020', NULL, NULL, NULL, 'wenge, pu soft', 1, 1, '2021-05-25 20:55:20', '2021-05-25 20:55:20'),
(44, 'krevet dječiji kkkkk', 'KRE-15/2020', NULL, NULL, NULL, 'krevet  neki frk stari', 1, 0, '2021-05-26 17:50:29', '2021-05-26 17:50:29'),
(45, 'Sport Box - duplikat', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:03:48', '2021-05-26 18:03:48'),
(46, 'Sport Box - - dupli', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:06:47', '2021-05-26 18:06:47'),
(47, 'Sport Box ---- trodupli', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:08:24', '2021-05-26 18:08:24'),
(48, 'Sport Box --- kvadron', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:18:58', '2021-05-26 18:18:58'),
(49, 'Sport Box dupli gupi', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:41:08', '2021-05-26 18:41:08'),
(50, 'Sport Box rubn', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 18:47:08', '2021-05-26 18:47:08'),
(51, 'Sport Box 777', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 19:53:03', '2021-05-26 19:53:03'),
(52, 'Sport Box 8888', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 19:59:49', '2021-05-26 19:59:49'),
(53, 'Sport Box 9999', 'int-0007', NULL, NULL, NULL, 'opis', 1, 1, '2021-05-26 20:19:20', '2021-05-26 20:19:20'),
(54, 'Sport Box 1111', 'int-0007', NULL, NULL, NULL, 'opis', 15, 1, '2021-05-26 20:20:12', '2021-05-26 20:20:12'),
(55, 'Sport Box 1212', 'int-0007', NULL, NULL, NULL, 'opis', 15, 1, '2021-05-26 20:36:48', '2021-05-26 20:36:48'),
(56, 'Sport Box 201', 'int-0007', NULL, NULL, NULL, 'opis', 15, 1, '2021-05-26 20:40:18', '2021-05-26 20:40:18'),
(57, 'Sport Box - EVO GA', 'int-0007', NULL, NULL, NULL, 'opis', 15, 1, '2021-05-26 20:47:31', '2021-05-26 20:47:31'),
(58, 'Sport Box -  krenulo je', 'int-0007', NULL, NULL, NULL, 'opis asdflka ačldfkajč aldfkjačs kasjčdfl ačdlkjačsd alkajsčdl ačldkjč dlaf', 15, 1, '2021-05-26 20:53:38', '2021-06-14 15:51:48'),
(59, '27maj test 1', '423', 0, 0, 0, '-', 1, 0, '2021-05-27 18:21:47', '2021-09-01 23:44:15'),
(60, '27maj test 1.2', '423', NULL, NULL, NULL, '-', 1, 1, '2021-05-27 18:22:12', '2021-05-27 18:22:12'),
(61, 'krme', '22', NULL, NULL, NULL, '-', 1, 1, '2021-08-31 12:48:12', '2021-08-31 12:48:12'),
(62, 'Sto: Rustika, NCS S 2010-R10B, AFRICA 9903 DARK BROWN', '33', NULL, NULL, NULL, '-', 1, 1, '2021-08-31 16:20:30', '2021-08-31 16:20:30'),
(63, 'Komoda: Linea, Svijetli hrast, TIMOR NEW 118', '004006521', NULL, NULL, NULL, 'sd', 1, 1, '2021-08-31 17:52:18', '2021-08-31 17:52:18'),
(64, 'Stolica: Ditta, Sonoma, ĐURĐA', '002003553', NULL, NULL, NULL, 'sadas', 1, 1, '2021-08-31 18:00:24', '2021-08-31 18:00:24'),
(65, 'Stolica: Andora, Orah, PORTLAND 03', '003005388', 3, NULL, NULL, '-zzzz', 1, 1, '2021-08-31 20:12:16', '2021-08-31 20:13:43'),
(66, 'Komoda: Linea, Sonoma, LAPAZ PORSCHE 119', '004003233', 4, 3, 233, '-', 1, 1, '2021-08-31 21:44:29', '2021-08-31 21:47:30'),
(67, 'Komoda: Linea, Sonoma, LAPAZ PORSHE 105', '004003234', 4, 3, 234, '-', 1, 1, '2021-08-31 22:01:39', '2021-08-31 22:02:02'),
(68, 'Komoda: Linea, Sonoma, LAPAZ PORSCHE 111', '004003230', 4, 3, 230, '-', 1, 1, '2021-08-31 22:36:51', '2021-08-31 22:36:51'),
(69, 'Komoda: Linea, Sonoma, LAWA 02', '004003237', 4, 3, 237, '-', 1, 1, '2021-08-31 22:49:24', '2021-08-31 22:49:24'),
(70, 'Komoda: Linea, Natur bajc, AFRICA 9901 WHITE', '004024036', 4, 24, 36, 'opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh', 16, 1, '2021-09-06 16:56:17', '2021-09-06 16:56:17'),
(71, 'Komoda: Linea, Natur bajc, AFRICA 9902 BEIGE', '004024037', 4, 24, 37, 'opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh opis sdfgs fsfdg sdfh sdf hsdh sdf hsdh shfdshsdfh', 16, 1, '2021-09-06 16:56:32', '2021-09-06 16:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

CREATE TABLE `proizvodjaci` (
  `id` int(10) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `aktivan` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodjaci`
--

INSERT INTO `proizvodjaci` (`id`, `naziv`, `aktivan`, `created_at`, `updated_at`) VALUES
(1, 'Freud', 0, '2020-07-21 18:33:40', '2020-07-23 16:14:06'),
(2, 'Udeholm', 1, '2020-07-21 18:34:47', '2020-07-21 18:34:50'),
(3, 'Metal World', 1, '2020-07-21 18:34:48', '2020-07-21 18:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `proizvrstamodeli`
--

CREATE TABLE `proizvrstamodeli` (
  `id` int(11) NOT NULL,
  `proiztip_id` int(11) DEFAULT NULL,
  `proiztipvrsta_id` int(11) DEFAULT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `aktivan` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvrstamodeli`
--

INSERT INTO `proizvrstamodeli` (`id`, `proiztip_id`, `proiztipvrsta_id`, `naziv`, `aktivan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kanzona', 1, NULL, '2021-09-01 23:18:33'),
(2, 1, 1, 'Ditta', 1, NULL, '2021-09-01 23:48:08'),
(3, 1, 1, 'Andora', 1, NULL, NULL),
(4, 1, 3, 'Linea', 1, '2021-09-01 23:36:28', '2021-09-01 23:48:12'),
(5, 1, 2, 'Rustika', 1, NULL, NULL),
(6, NULL, 4, 'za figurice', 1, '2021-09-01 23:19:03', '2021-09-01 23:20:26'),
(7, NULL, 3, 'nak', 1, '2021-09-01 23:48:30', '2021-09-01 23:48:44'),
(8, NULL, 4, 'za alat', 0, '2021-09-01 23:48:56', '2021-09-01 23:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

CREATE TABLE `radnici` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jmbg` varchar(13) NOT NULL,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(50) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `drzavljanstvo` varchar(30) DEFAULT NULL,
  `nacionalnost` varchar(30) DEFAULT NULL,
  `vjeroispovjest` varchar(30) DEFAULT NULL,
  `vjerski_praznik` varchar(100) DEFAULT NULL,
  `bracno_stanje` varchar(20) DEFAULT NULL,
  `djeca` varchar(50) DEFAULT NULL,
  `stambeno_pitanje` varchar(30) DEFAULT NULL,
  `invalidnost` varchar(50) DEFAULT NULL,
  `pol` varchar(10) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `stepen` varchar(10) DEFAULT NULL,
  `skolska_sprema` varchar(10) DEFAULT NULL,
  `naziv_ustanove` varchar(150) DEFAULT NULL,
  `zanimanje` varchar(150) DEFAULT NULL,
  `posebna_znanja` text DEFAULT NULL,
  `strucni_ispiti` text DEFAULT NULL,
  `p_radna_mjesta` text DEFAULT NULL,
  `p_opis_posla` text DEFAULT NULL,
  `p_trajanje` varchar(50) DEFAULT NULL,
  `z_datum` date DEFAULT NULL,
  `z_staz` varchar(100) DEFAULT NULL,
  `z_status` varchar(50) DEFAULT NULL,
  `z_vrsta_RO` varchar(50) DEFAULT NULL,
  `z_org_cjelina` varchar(100) DEFAULT NULL,
  `z_radno_mjesto` text DEFAULT NULL,
  `z_angazovanja` text DEFAULT NULL,
  `br_ormarica` varchar(15) DEFAULT NULL,
  `z_licni_dohodak` decimal(7,2) DEFAULT NULL,
  `z_radni_sat` decimal(7,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radnici`
--

INSERT INTO `radnici` (`id`, `name`, `jmbg`, `birthday`, `birthplace`, `adress`, `drzavljanstvo`, `nacionalnost`, `vjeroispovjest`, `vjerski_praznik`, `bracno_stanje`, `djeca`, `stambeno_pitanje`, `invalidnost`, `pol`, `telefon`, `stepen`, `skolska_sprema`, `naziv_ustanove`, `zanimanje`, `posebna_znanja`, `strucni_ispiti`, `p_radna_mjesta`, `p_opis_posla`, `p_trajanje`, `z_datum`, `z_staz`, `z_status`, `z_vrsta_RO`, `z_org_cjelina`, `z_radno_mjesto`, `z_angazovanja`, `br_ormarica`, `z_licni_dohodak`, `z_radni_sat`, `created_at`, `updated_at`) VALUES
(1711, 'Aleksić Sretko Miladin', '1010960160060', '1960-10-10', 'Prijedor Prijedor', ' Srpskih Velikana 72 Prijedor', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'SSS', '', 'KV voza?', 'Vatrogasac', '', NULL, NULL, NULL, '2019-02-01', '', 'a', 'no', 'Kotlovnica - kompresori', 'Pomo?ni radnik', 'Korlovni?ar', '', NULL, NULL, NULL, NULL),
(1712, 'Aleksić  Stevo Siniša', '1009977160009', '1977-03-11', 'Jugovci 36', 'Jugovci 36', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', NULL, 'o', '0', 'm', '065/269-988', '', 'SSS', NULL, 'Pomo?ni radnik', 'GTVG IV stepen', NULL, NULL, NULL, NULL, '2016-11-01', NULL, 'a', 'no', 'Montaža kostura', 'Pomo?ni radnik', 'Sastav prednje i zadnje fronte', NULL, NULL, NULL, NULL, '2020-12-07 21:51:36'),
(1713, 'Babić  Brane Branislav', '1210986165019', '1983-09-15', 'Bosanska Krupa', 'M.Vrhovca72', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/531-189', '', 'SSS', '', 'Majstor', 'GTVG IV stepen', '', NULL, NULL, NULL, '2015-04-01', '', 'a', 'no', 'Finalna obrada', 'Majstor', '?eparica - majstor 1 klase', '93', NULL, NULL, NULL, NULL),
(1714, 'Babić  Milorad Sanja', '1210986165019', '1986-10-12', 'Novi Grad', 'Miska Glava', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'ž', '065/843-413', '', 'SSS', '', 'Šiva?', 'Trgovac', '', NULL, NULL, NULL, '2015-03-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '', NULL, NULL, NULL, NULL),
(1715, 'Banjac  Stojan Mirjana', '2003961105028', '1961-03-20', 'Stri?i?', 'Pecani C1-19', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '065/173-687', '', 'NK', '', 'Šiva?', 'OŠ', '', NULL, NULL, NULL, '2016-06-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '68', NULL, NULL, NULL, NULL),
(1716, 'Bartoš Sretko Sanja', '0507980165024', '1980-07-05', 'Banja Luka', 'PP Njegosa 4/5', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '065/898-747', '', 'KV', '', 'Administrativni radnik', 'VSS', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', '-', 'Administrativni radnik', 'Komercijalni poslovi', '', NULL, NULL, NULL, NULL),
(1717, 'Bašić Drago Bojana', '1602988105019', '1988-02-16', 'Banja Luka', 'Donji Garevci BB', 'RS/BiH', 'sr', 'o', '8/9/2020', 'ne', '', 'o', '0', 'ž', '065/316-567', '', 'SSS', '', 'pomo?ni radnik', 'Polj.Tehni?ar', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'od', 'Površinska obrada', 'Pomo?ni radnik', 'Brušenje temeljnog laka', '', NULL, NULL, NULL, NULL),
(1718, 'Bikarević Branko  Srđan', '1411983170092', '1983-11-14', 'Hadži?i', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '1/12/2020', 'ne', '', 'o', '0', 'm', '065/763-576', '', 'SSS', '', 'Tehni?ka priprema', 'Gradje.laborant', '', NULL, NULL, NULL, '2019-04-15', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Teh.priprema', 'Pomo?ni radnik na banseku', '', NULL, NULL, NULL, NULL),
(1719, 'Bikarević Branko Vesna', '2212992107388', '1992-12-22', 'Kljuc', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '1/12/2020', 'ne', '', 'o', '0', 'ž', '066/668-702', '', 'SSS', '', 'Pomocni radnik', 'Sanitarni dip. Ing', '', NULL, NULL, NULL, '2019-08-01', '', 'a', 'od', 'Površinska obrada', 'Pomo?ni radnik', 'Brušenje temeljnog laka', '', NULL, NULL, NULL, NULL),
(1720, 'Blagić Djordje Velimir', '2202975198064', '1975-02-22', 'Travnik', 'Nova Orlovaca', 'RS/BiH', 'sr', 'o', '11/30/2020', 'ne', '', 'o', '0', 'm', '065/930-689', '', 'SSS', '', 'Konfekcionar tekstila', 'Konf.Tekstila', '', NULL, NULL, NULL, '2015-07-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Konfekcionar tekstila', 'Krojenje presvlaka', '', NULL, NULL, NULL, NULL),
(1721, 'Bojić Cedo Dragan', '3005984123593', '1984-05-30', 'Teslic', 'Carice Milice 38', 'RS/BiH', 'sr', 'o', '1/29/2020', 'ne', '', 'o', '0', 'm', '065/579-256', '', 'VSS', '', 'Diplomirani.inzinjer', 'Diplomirani.in', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'no', 'Tehni?ki sektor', 'Sef proizvodnje', 'Organizator proizvodnje', '', NULL, NULL, NULL, NULL),
(1722, 'Bundalo Milutin Dragana', '1705971167510', '1971-05-17', 'Bosanski Novi', 'Petra Pecije 9/3', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '065/334-328', '', 'SSS', '', 'Inzinjer tekstila', 'Modelar', '', NULL, NULL, NULL, '2019-02-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Modelar', 'Šabloner - poslovo?a odjeljenja', '90', NULL, NULL, NULL, NULL),
(1723, 'Ciganović Dusan Nikica', '0606978160048', '1978-06-06', 'Prijedor', 'Muhameda Suljanovica', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/633-189', '', 'SSS', '', 'Tehni?ar ra?unara', 'Tapetar', '', NULL, NULL, NULL, '2020-02-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Tapetar', 'Krojenje presvlaka', '16', NULL, NULL, NULL, NULL),
(1724, 'Ćiverica Petar  Gorana', '0503964165035', '1964-03-05', 'Banja Luka', 'Veliko Palaciste BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '066/673-153', '', 'KV', '', 'Skola mjesoviti struka i zanimanja', 'Pomocni radnik', '', NULL, NULL, NULL, '2020-02-18', '', 'a', 'od', 'Krojenje i šivenje presvlaka', 'Pomo?ni radnik', 'Radnik', '62', NULL, NULL, NULL, NULL),
(1725, 'Čudić Mile  Dane', '2210971160049', '1971-10-22', 'Prijedor', 'Jaruge BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/263-632', '', 'SSS', '', 'Konfekcijski tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2018-09-04', '', 'a', 'no', 'Finalna obrada', 'Pomo?ni radnik', 'Majstor na brušenju drveta', '', NULL, NULL, NULL, NULL),
(1726, 'Cumbo  Andjelko Božidar', '0601992800031', '1992-01-06', 'Novi Sad', 'Aleja  SV.Save 25', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'VSS', '', 'Diplomirani inžinjer arhitekture', 'Direktor', '', NULL, NULL, NULL, '2017-12-01', '', 'a', 'no', '-', 'Direktor', 'DIREKTOR', '', NULL, NULL, NULL, NULL),
(1727, 'Cvijić Lako  Dragan', '1102966102382', '1966-02-11', 'Kljuc', 'Mile Rajlica BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/226-246', '', 'SSS', '', 'Tehnicar energetike', 'Elektricar', '', NULL, NULL, NULL, '2019-03-01', '', 'a', 'od', 'Održavanje i energetika', 'Elektricar', 'Elektri?ar', '103', NULL, NULL, NULL, NULL),
(1728, 'Delić Jadranko  Darko', '1011994160007', '1994-11-10', 'Prijedor', 'Orlovaca', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '066/663-619', '', 'SSS', '', 'Pomo?ni radnik', 'Gradjevinska', '', NULL, NULL, NULL, '2017-12-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomo?ni radnik', 'Pomo?ni radnik na banseku', '10', NULL, NULL, NULL, NULL),
(1729, 'Dobrić Perica Radoslav', '0411976163311', '1976-11-04', 'Sanski Most', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/462-099', '', 'NK', '', 'Pomo?ni radnik', 'Osnovna', '', NULL, NULL, NULL, '2020-02-03', '', 'a', 'od', 'Finalna obrada', 'Pomo?ni radnik', '?eparica - majstor 3 klase', '100', NULL, NULL, NULL, NULL),
(1730, 'Dobrijević  Božo Stevo', '1805976102381', '1976-05-18', 'Kljuc', 'Gornji Garevci BB', 'RS/BiH', 'sr', 'o', '1/9/2020', 'ne', '', 'o', '0', 'm', '066/353-030', '', 'KV', '', 'Pomo?ni radnik', 'Bravar', '', NULL, NULL, NULL, '2019-02-01', '', 'a', 'no', 'Unutrašnji transport', 'Pomo?ni radnik', 'Viljuškarista', '', NULL, NULL, NULL, NULL),
(1731, 'Dragić Simeun Ana', '2801972197688', '1972-01-28', 'Kupres', 'Mesa Selimovic', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '065/261-019', '', 'SSS', '', 'Pomocni.rad u krojacnici', 'Osnovna', '', NULL, NULL, NULL, '2019-03-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'pomocni radnik u sivaoni', 'Sivenje', '61', NULL, NULL, NULL, NULL),
(1732, 'Drinčić Nada Dario', '0502988160011', '1992-05-22', 'Prijedor', 'Pe?ani B2 9/5', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/466-856', '', 'SSS', '', 'Tehnicar energetike', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-04-01', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Navla?enje presvlaka', '36', NULL, NULL, NULL, NULL),
(1733, 'Đuričić  Mićo Aleksandar', '0810992102553', '1992-10-08', 'Kljuc', 'Nova Orlovaca', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '066/848-259', '', 'SSS', '', 'Tehnicar energetike', 'Tehni?ka priprema', '', NULL, NULL, NULL, '2017-07-01', '', 'a', 'no', 'Razvoj i teh. Priprema', 'Administrativni radnik', 'Operativna priprema', '', NULL, NULL, NULL, NULL),
(1734, 'Gagić Dusan  Dušan', '1407956160010', '1956-07-14', 'Srpska Crnja', 'Uži?ka 16', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/642-289', '', 'KV', '', 'Bravar', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-03-01', '', 'a', 'no', 'Održavanje i energetika', 'pomocni radnik', 'Korlovni?ar', '85', NULL, NULL, NULL, NULL),
(1735, 'Gagić Dusan  Miloš', '0508982160050', '1982-08-05', 'Prijedor', 'Uži?ka 16', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/402-901', '', 'SSS', '', 'Prehrabeni tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2014-07-01', '', 'a', 'no', 'Finalna obrada', 'pomocni radnik', 'Pomo?nik na brušenju drveta', '99', NULL, NULL, NULL, NULL),
(1736, 'Gavran  Boro Marijan', '0112952102403', '1952-12-01', 'Kljuc', 'D.Orlovci BB', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'KV', '', 'Vozac motornih vozila', 'KV vozac', '', NULL, NULL, NULL, '2018-08-01', '', 'a', 'no', '-', 'Vozac', 'Vozac', '', NULL, NULL, NULL, NULL),
(1737, ' Gavranović Radovan Goran', '1108975160008', '1975-08-11', 'Prijedor', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/543-183', '', 'KV', '', 'Tehni?ar elektonike', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2019-08-15', '', 'a', 'od', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Pomo?ni radnik na banseku', '44', NULL, NULL, NULL, NULL),
(1738, 'Gavranović Čedo  Gordana', '2912990165013', '1990-12-29', 'Prijedor', 'Medjedja BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '066/782-471', '', 'NK', '', 'Osnovna skola', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2019-08-01', '', 'a', 'od', 'Površinska obrada', 'Pomocni radnik', 'Brušenje temeljnog laka', '24', NULL, NULL, NULL, NULL),
(1739, 'Gligić Dragan Darko', '0707997160009', '1997-07-07', 'Prijedor', 'Srpskih Velikana', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'SSS', '', 'Kuvar', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2016-04-01', '', 'a', 'no', 'Površinska obrada', 'Pomocni radnik', 'Lakirer', '', NULL, NULL, NULL, NULL),
(1740, 'Gligić Dragan  Zoran', '1805985160009', '1985-05-18', 'Prijedor', 'Srpskih Velikana', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/488-113', '', 'KV', '', 'Konobar', 'Sef lakirnice', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Površinska obrada', 'Sef lakirnice', 'Lakirer', '', NULL, NULL, NULL, NULL),
(1741, 'Gnjatović Dordje Radovan', '1212964160024', '1964-12-12', 'Prijedor', 'Rasavci BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/334-225', '', 'NK', '', 'Osnovna skola', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2019-03-01', '', 'a', 'no', 'Pilana sa sušarama', 'Pomocni radnik', 'Slaganje daske', '', NULL, NULL, NULL, NULL),
(1742, 'Goronja  Branko Dijana', '0904979165001', '1979-04-09', 'Prijedor', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '065/710-677', '', 'NK', '', 'Osnovna skola', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2016-04-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Lijepljenje spužve', '5', NULL, NULL, NULL, NULL),
(1743, 'Goronja Zoran', '0810975162518', '1975-10-08', 'Novi Grad', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/459-531', '', 'NK', '', 'Bravar', 'Tapetar', '', NULL, NULL, NULL, '2011-07-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Tapetar', 'Tapetar', '', NULL, NULL, NULL, NULL),
(1744, 'Grujičić  Vladimir Aleksandar', '2911996160076', '1996-11-29', 'Prijedor', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '065/640-075', '', 'SSS', '', 'Teh.zeljeznog saobracaja', 'Tapetar', '', NULL, NULL, NULL, '2018-02-08', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Tapetar', 'Tapetar', '43', NULL, NULL, NULL, NULL),
(1745, 'Ilić  Ranko Siniša', '1508978160023', '1978-08-15', 'Banja Luka', 'Pe?ani 4/29', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '066/188-813', '', 'SSS', '', 'Elektrotehnicar', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-08-15', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Montaža kartona na kostur', '15', NULL, NULL, NULL, NULL),
(1746, 'Inđić  Goran Petar', '1802999160002', '1999-02-18', 'Prijedor', 'Veliko Palaciste BB', 'RS/BiH', 'sr', 'o', '2/14/2020', 'ne', '', 'o', '0', 'm', '066/880-188', '', 'SSS', '', 'Prehrabeni preradjiva?', 'Tapetar', '', NULL, NULL, NULL, '2018-03-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Navla?enje presvlaka', '37', NULL, NULL, NULL, NULL),
(1747, 'Janković  Dragoljub Dejan', '1102972161501', '1972-02-11', 'Svetozarevo', '29 Novembar BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/488-105', '', 'SSS', '', 'Stru?ni smijer', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2017-06-13', '', 'a', 'no', 'Montaža kostura', 'Pomocni radnik', 'Majstor na presi', '', NULL, NULL, NULL, NULL),
(1748, 'Jeftenić  Dušan Miroslav', '0705972160044', '1972-05-07', 'Prijedor', 'Pe?ani G1', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/962-435', '', 'SSS', '', 'Mehani?ar', 'Pomo?ni radnik', '', NULL, NULL, NULL, '2019-09-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Pomo?ni radnik na banseku', '', NULL, NULL, NULL, NULL),
(1749, 'Jeftić  Zoran Goran', '2110997160077', '1997-10-21', 'Prijedor', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '065/035-447', '', 'KV', '', 'Autoelektri?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2020-01-01', '', 'a', 'no', 'Me?ufazno skladište', 'Pomocni radnik', 'Skladištar gotovih elemenata', '', NULL, NULL, NULL, NULL),
(1750, 'Jeftić Miroslav Ilija', '2609980160019', '1980-09-26', 'Prijedor', '25-May-40', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '066/637-076', '', 'SSS', '', 'Elektrotehnicar', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-03-15', '', 'a', 'od', 'Pilana sa sušarama', 'Pomocni radnik', 'Slaganje daske', '', NULL, NULL, NULL, NULL),
(1751, 'Jeftić Zoran Zorica', '2002994166492', '1994-02-20', 'Prijedor', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '11/25/2020', 'ne', '', 'o', '0', 'ž ', '065/695-759', '', 'SSS', '', 'Prehrabeni preradjiva?', 'Tapetar', '', NULL, NULL, NULL, '2018-10-10', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Tapetar', 'Tapetar', '', NULL, NULL, NULL, NULL),
(1752, 'Glušica Dusan Duška', '0404984115036', '1984-04-04', 'Biha?', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'ž', '065/794-780', '', 'KV', '', 'Kuvar', 'Šiva?', '', NULL, NULL, NULL, '2020-03-12', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Krojenje presvlaka', '77', NULL, NULL, NULL, NULL),
(1753, 'Jeličić Vlado  Drenko', '0504962500747', '1962-04-05', 'Drvar', 'Unska 6', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/013-210', '', 'SSS', '', 'Ekonomski tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-08-15', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Pomo?ni radnik na banseku', '', NULL, NULL, NULL, NULL),
(1754, 'Jelisavac Nikola Ranko', '1409968163301', '1968-09-14', 'Hadrovci', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '11/25/2020', 'ne', '', 'o', '0', 'ž', '065/867-636', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2020-02-24', '', 'a', 'od', 'Pilana sa sušarama', 'Pomocni radnik', 'Štucerista', '', NULL, NULL, NULL, NULL),
(1755, 'Jokanović  Nedeljko Snježana', '1303971198032', '1971-03-13', 'Travnik', ' Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '1/27/2020', 'ne', '', 'o', '0', 'm', '066/282-933', '', 'SSS', '', 'Bankarski tehni?ar ', 'Tapetar', '', NULL, NULL, NULL, '2019-11-25', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Tapetar', 'Tapetar', '52', NULL, NULL, NULL, NULL),
(1756, 'Jovanić Simo Branko', '2003979111076', '1979-03-20', 'Veliki Dubovik 89', 'VelikI Dubovik 89', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '065/877-049', '', 'KV', '', 'NK', 'Radnik', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Održavanje i energetika', 'Radnik', 'Bravar', '', NULL, NULL, NULL, NULL),
(1757, 'Jovanović  Nedo Mile', '1102995160065', '1995-02-11', 'Prijedor', 'Mladena Olj?a 24', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '065/406-529', '', 'SSS', '', 'Gradjevinski tehni?ar', 'Tapetar', '', NULL, NULL, NULL, '2019-04-15', '', 'a', 'no', 'Magacin', 'Tapetar', 'Skladištar spužve', '3', NULL, NULL, NULL, NULL),
(1758, 'Jovanović Drago  Vojna', '1005963196798', '1963-05-10', 'D Vakuf', 'Aerodrom BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '066/338-911', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Tapetar', 'Lijepljenje spužve', '3', NULL, NULL, NULL, NULL),
(1759, 'Kačavenda  Rajko Danka', '0802993165009', '1993-02-08', 'Prijedor', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/637-126', '', 'SSS', '', 'Tekstilni tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2016-04-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Lijepljenje spužve', '7', NULL, NULL, NULL, NULL),
(1760, 'Kalaba  Dusan Stevo', '1603969160021', '1969-03-16', 'Prijedor', 'Slavise Vajnera ?i?e 9', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'ž', '', '', 'SSS', '', 'Masinski tehni?ar', 'Rukovalac kopir masine', '', NULL, NULL, NULL, '2019-08-01', '', 'a', 'no', 'Finalna obrada', 'Rukovalac kopir masine', 'Majstor u ostavci', '', NULL, NULL, NULL, NULL),
(1761, 'Kalinić Mladjen  Ljiljana', '0803966165028', '1966-03-08', 'Prijedor', 'Kozarska 36', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/307-697', '', 'SSS', '', 'Proizvodja? sokova III', 'Pomocni rad u kroja?nici', '', NULL, NULL, NULL, '2019-01-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Pomo? radnik u kroja?nici', 'Sivenje', '69', NULL, NULL, NULL, NULL),
(1762, 'Končar  Ljuban Mladen ', '2111976160014', '1976-11-21', 'Prijedor', 'Jaruge BB', 'RS/BiH', 'sr', 'o', '1/9/2020', 'ne', '', 'o', '0', 'm', '066/157-264', '', 'SSS', '', 'Pomocni bravar II stepen', 'Pomocni radnik', '', NULL, NULL, NULL, '2016-04-01', '', 'a', 'no', 'Pilana sa sušarama', 'Pomocni radnik', 'Brentista', '', NULL, NULL, NULL, NULL),
(1763, 'Kovačević  Petar Milorad', '2205968160018', '1968-05-22', 'Crna Dolina ', '11.Kozarske Brigade BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '065/695-111', '', 'SSS', '', 'Masinski tehni?ar', 'Pakovanje i kontrola', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', '', 'Pakovanje i kontrola', 'Loko nabava', '', NULL, NULL, NULL, NULL),
(1764, 'Korvlija Zoran  Ognjen', '0601996160002', '1996-01-06', 'Prijedor', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '1/14/2020', 'ne', '', 'o', '0', 'ž', '065/880-348', '', 'SSS', '', 'Fizioterapeutski tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2020-02-17', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Montaža sjedala', '58', NULL, NULL, NULL, NULL),
(1765, 'Kremić  Radoslav Stana', '2608967165048', '1967-08-26', 'Prijedor', 'Duška Radeti?a 3', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '065-566-298', '', 'PK', '', 'Pomocni proiz papira', 'Šiva?', '', NULL, NULL, NULL, '2019-04-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šiva?', '74', NULL, NULL, NULL, NULL),
(1766, 'Krupljanin  Dragan Željko', '0405979160038', '1979-05-04', 'Prijedor', 'Jaruge BB 85', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '065/415-895', '', 'KV', '', 'Mehani?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2012-03-01', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Majstor na brušenju drveta', '', NULL, NULL, NULL, NULL),
(1767, 'Kumović Žarko  Mirko', '0406977192664', '1977-06-04', 'D.ravno Kupres', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '066/088-184', '', 'SSS', '', 'NK', 'Ruk.vertikalne tra?ne pile', '', NULL, NULL, NULL, '2015-02-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Ruk.vertikalne tra?ne pile', 'Majstor na banseku', '', NULL, NULL, NULL, NULL),
(1768, 'Kuseta Milan  Dragan', '0902000160001', '2000-02-09', 'Prijedor', 'Kozarusa BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/838-167', '', 'SSS', '', 'Teh.za obradu drveta', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-11-25', '', 'a', 'od', 'Finalna obrada', 'Pomocni radnik', 'pomo?nik na oscilatornoj', '108', NULL, NULL, NULL, NULL),
(1769, 'Lazarević  Niko Željka', '2704986198134', '1986-04-27', 'Travnik', 'D.Orlovci BB', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'ž', '065/829-687', '', 'SSS', '', 'Šiva? tekstila', 'Šiva?', '', NULL, NULL, NULL, '2018-03-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '67', NULL, NULL, NULL, NULL),
(1770, 'Levanić  Petar Goran', '0804975160000', '1975-04-08', 'Prijedor', 'Jaruge 63', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/450-857', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2011-06-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Majstor na ?etverostranoj', '', NULL, NULL, NULL, NULL),
(1771, 'Mamić Tomislav Dražen', '2008975160007', '1975-08-20', 'Prijedor', 'Donji Garevci BB', 'RS/BiH', 'sr', 'o', '1/12/2020', 'ne', '', 'o', '0', 'm', '065/616-085', '', 'SSS', '', 'Bravar III stepen', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'no', 'Održavanje i energetika', 'Pomocni radnik', 'Korlovni?ar', '110', NULL, NULL, NULL, NULL),
(1772, 'Marković Miroslav  Mile', '1512981193045', '1981-12-15', 'Travnik', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '11/14/2020', 'ne', '', 'o', '0', 'm', '065/872-517', '', 'SSS', '', 'Elektrotehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2015-08-15', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Vulkanizer', '39', NULL, NULL, NULL, NULL),
(1773, 'Matić Dusan  Mladen', '1604985191251', '1985-04-16', 'Bugojno', 'Sanska 6 Nova Orlova?a', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '066/469-333', '', 'SSS', '', 'Trgovac', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-04-15', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Majstor na kopirci-segomat', '', NULL, NULL, NULL, NULL),
(1774, 'Matijać Dusko  Bojan', '2606992160031', '1992-06-26', 'Prijedor', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '8/9/2020', 'ne', '', 'o', '0', 'm', '065/398-832', '', 'SSS', '', 'Instalater', 'Stolar', '', NULL, NULL, NULL, '2019-12-07', '', 'a', 'no', 'Finalna obrada', 'Stolar', 'Majstor na ?etverostranoj-kopirka', '13', NULL, NULL, NULL, NULL),
(1775, 'Matijaš  Dusko Sr?an', '0603985160003', '1985-03-06', 'Prijedor', 'Gornji Orlovci BB', 'RS/BiH', 'sr', 'o', '8/9/2020', 'ne', '', 'o', '0', 'm', '065/398-822', '', 'SSS', '', 'Mesar', 'Pomocni radnik', '', NULL, NULL, NULL, '2013-09-19', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Pomo?ni radnik na ?etverostranoj', '116', NULL, NULL, NULL, NULL),
(1776, 'Medić Dragan  Nikola', '2712986100056', '1986-12-27', 'Banja Luka', 'Mile Rajlica 1', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '066/178-619', '', 'NK', '', 'Ugostiteljka ', 'Tapetar', '', NULL, NULL, NULL, '2018-11-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Tapetar', 'Tapetar', '2', NULL, NULL, NULL, NULL),
(1777, 'Miladinović  Jovo Dragan', '1509973163306', '1973-09-15', 'Sanski Most', 'Gornji Garevci BB', 'RS/BiH', 'sr', 'o', '8/9/2020', 'ne', '', 'o', '0', 'm', '065/818-945', '', 'KV', '', 'Bravar', 'Ruk.masinom za busenje', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Finalna obrada', 'Ruk.masinom za busenje', 'Majstor na oscilatornoj', '116', NULL, NULL, NULL, NULL),
(1778, 'Mrđa  Milos Milka', '2903972168324', '1972-03-29', 'Sanski Most', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '065/994-672', '', 'PK', '', 'Siva? kurs  ', 'Šiva?', '', NULL, NULL, NULL, '2019-06-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '63', NULL, NULL, NULL, NULL),
(1779, 'Mrđa Lazo  Ranko', '0510963163302', '1963-10-05', 'Sanski Most', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/833-477', '', 'NK', '', 'NK', 'Monter namjestaja', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Montaža kostura', 'Monter namjestaja', 'montaža zadnje fronta', '92', NULL, NULL, NULL, NULL),
(1780, 'Nišević   Djordjo Rosa', '1008971116077', '1971-08-10', 'Bosanska Krupa', 'Vika Karadzica 30 B Prijedor', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'ž', '065/219-824', '', 'KV', '', 'Kofekcioni tehni?ar', 'Kroja?', '', NULL, NULL, NULL, '2020-05-11', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '84', NULL, NULL, NULL, NULL),
(1781, 'Not  Dragica Zoran', '2606975160036', '1975-06-26', 'Prijedor', 'Kralja Aleksandra 45', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '065/986-914', '', 'SSS', '', 'Konobar', 'Skladištar', '', NULL, NULL, NULL, '2015-08-15', '', 'a', 'no', 'Magacin', 'Skladištar', 'Skladištar gotovih proizvoda', '', NULL, NULL, NULL, NULL),
(1782, 'Ostojić Ratko Ognjen', '2703982192674', '1982-03-27', 'Kupres', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '065/755-726', '', 'SSS', '', 'Autolimar', 'Pomicni radnik', '', NULL, NULL, NULL, '2017-08-01', '', 'a', 'no', 'Montaža kostura', 'Pomocni radnik', 'montaža zadnje fronta', '', NULL, NULL, NULL, NULL),
(1783, ' Pačavra Novo Kosana', '1810967198035', '1967-10-18', 'Travnik', 'Orlovaca BB', 'RS/BiH', 'sr', 'o', '1/9/2020', 'ne', '', 'o', '0', 'ž', '065/275-376', '', 'KV', '', 'NK', 'Šiva?', '', NULL, NULL, NULL, '2018-02-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '83', NULL, NULL, NULL, NULL),
(1784, 'Petrović  Marko Svetozar', '2612985163300', '1985-12-26', 'Sanski Most', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '065/477-518', '', 'SSS', '', 'Trgovac ', 'Pomicni radnik', '', NULL, NULL, NULL, '2018-04-15', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', '?eparica - majstor 2 klase', '109', NULL, NULL, NULL, NULL),
(1785, 'Plavšić Stevo  Milanko', '0105967162511', '1967-05-01', 'Bos.Novi', 'Mitasovci 72', 'RS/BiH', 'sr', 'o', '1/19/2020', 'ne', '', 'o', '0', 'm', '066/473-203', '', 'SSS', '', 'Elektroni?ar', 'Odrzava? mašina', '', NULL, NULL, NULL, '2014-11-11', '', 'a', 'no', 'Održavanje i energetika', 'Odrzavanje masina', 'Serviser šiva?ih mašina', '20', NULL, NULL, NULL, NULL),
(1786, 'Potkolnjak Dragan  Milica', '2008963168347', '1963-08-20', 'Sanski Most', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '066/980-731', '', 'KV', '', 'Ugostiteljka ekonomska', 'Šiva?', '', NULL, NULL, NULL, '2013-10-25', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '65', NULL, NULL, NULL, NULL),
(1787, 'Pržar Ostoja  Davor', '2307976172197', '1976-07-23', 'Prijedor', 'Dera bb', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '066/216-744', '', 'KV', '', 'Veterinarski tehni?ar', 'Pomicni radnik', '', NULL, NULL, NULL, '2018-06-01', '', 'a', 'no', 'Pilana sa sušarama', 'Pomocni radnik', 'Brentista', '', NULL, NULL, NULL, NULL),
(1788, 'Radaković  Radoja Bojan', '2606991160038', '1991-06-26', 'Prijedor', 'Orlovaca BB', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '065/162-487', '', 'SSS', '', 'Varijoc', 'Pomicni radnik', '', NULL, NULL, NULL, '2016-09-10', '', 'a', 'no', 'Površinska obrada', 'Pomocni radnik', 'pomo?nik lakirera', '', NULL, NULL, NULL, NULL),
(1789, 'Radaković Todor  Darko', '1901977160015', '1977-01-19', 'Prijedor', 'Raskovac 16', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/270-158', '', 'SSS', '', 'Teh.elektronike', 'Lalirer poizvodne robe', '', NULL, NULL, NULL, '2013-09-19', '', 'a', 'no', 'Površinska obrada', 'Lakirer proizvodne robe', 'Lakirer', '', NULL, NULL, NULL, NULL),
(1790, 'Radaković  Svetko Slobodan', '2706972160013', '1972-06-27', 'Prijedor', 'Jovana Raskovica 30', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '066/749-935', '', 'NK', '', 'NK', 'Pomicni radnik', '', NULL, NULL, NULL, '2015-11-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Majstor na banseku', '111', NULL, NULL, NULL, NULL),
(1791, 'Radanović Mirko  Nenad ', '1807959370014', '1959-07-18', 'Prijedor', 'Ivana Cankara 36', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '065/473-349', '', 'KV', '', 'KV', 'Ruk.masinom za busenje', '', NULL, NULL, NULL, '2011-09-01', '', 'a', 'no', 'Finalna obrada', 'Ruk.masinom za busenje', 'Majstor 1 na brušenju drveta', '102', NULL, NULL, NULL, NULL),
(1792, 'Radanović  Nenad Predrag', '1304998160033', '1998-04-13', 'Prijedor', 'Ivana Cankara 36', 'RS/BiH', 'sr', 'o', '11/21/2020', 'ne', '', 'o', '0', 'm', '066/112-417', '', 'SSS', '', 'Teh.drumskog saobracaja', 'Pomicni radnik', '', NULL, NULL, NULL, '2017-10-25', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Majstor na oscilatornoj', '96', NULL, NULL, NULL, NULL),
(1793, 'Rakas  Mile Goran', '0306977113832', '1977-06-03', 'Velika Kladusa ', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/410-495', '', 'KV', '', 'Vozac motornih vozila', 'Viljuskarista', '', NULL, NULL, NULL, '2017-12-01', '', 'a', 'no', 'Unutrašnji transport', 'Viljuskarista', 'Viljuškarista', '', NULL, NULL, NULL, NULL),
(1794, 'Rauš  Boro Milan', '0509992160004', '1992-09-05', 'Prijedor', 'Kralja Aleksandra 41C', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '064/406-7162', '', 'SSS', '', 'Teh.drumskog saobracaja', 'Pomicni radnik', '', NULL, NULL, NULL, '2018-07-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Kontrola i pakovanje gotovih proizvoda', '50', NULL, NULL, NULL, NULL),
(1795, 'Rauš Vlado  Mladena', '0910977165039', '1977-10-09', 'Prijedor', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '7/12/2020', 'ne', '', 'o', '0', 'ž', '065/873-550', '', 'NK', '', 'NK', 'Pomicni radnik', '', NULL, NULL, NULL, '2017-08-01', '', 'a', 'no', 'Površinska obrada', 'Pomocni radnik', 'Brušenje temeljnog laka', '47', NULL, NULL, NULL, NULL),
(1796, 'Savić  Zdravko Dejan', '2612973102403', '1973-12-26', 'Kljuc', 'Šumadijska bb', 'RS/BiH', 'sr', 'o', '1/31/2020', 'ne', '', 'o', '0', 'm', '065/938-686', '', 'NK', '', 'Mehanicar masina', 'Pomicni radnik', '', NULL, NULL, NULL, '2017-06-13', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Pomocni radnik', 'Majstor na banseku', '', NULL, NULL, NULL, NULL),
(1797, 'Savić Sloboda  Nikola', '0507000160005', '2000-07-05', 'Prijedor', 'Jugovci bb', 'RS/BiH', 'sr', 'o', '2/14/2020', 'ne', NULL, 'o', '0', 'm', '065/871-672', '', 'KV', NULL, 'Konobar', 'Pomicni radnik', NULL, NULL, NULL, NULL, '2019-03-15', NULL, 'a', 'od', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Pajovanje gotovih proizvoda', '54', NULL, NULL, NULL, '2021-04-13 15:16:14'),
(1798, 'Savić Ilije Slavko', '2008960160043', '1960-08-20', 'Prijedor', 'Brezicani BB', 'RS/BiH', 'sr', 'o', '2/14/2020', 'ne', '', 'o', '0', 'm', '065/784-873', '', 'SSS', '', 'Elektroni?ar', 'Radnik u tapetariji', '', NULL, NULL, NULL, '2013-09-19', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik u tapetariji', 'Navla?enje presvlaka', '21', NULL, NULL, NULL, NULL),
(1799, 'Skendžić  Ranko Dragomir', '0605978111067', '1978-05-06', 'Bos. Krupa', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '065/818-885', '', 'KV', '', 'NK', 'Ruk. Vertikalne tracne pile', '', NULL, NULL, NULL, '2014-02-01', '', 'a', 'no', 'Kroja?nica sa blanjanjem', 'Ruk.vertikalne tracne masine', 'Majstor na banseku', '', NULL, NULL, NULL, NULL),
(1800, 'Sredić Dragan  Rada', '2905966165006', '1966-05-29', 'Prijedor', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '066/842-443', '', 'SSS', '', 'Krojac muske odjece', 'Kroja?', '', NULL, NULL, NULL, '2014-12-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šivac', 'Šivenje presvlaka', '', NULL, NULL, NULL, NULL),
(1801, 'Stojnić Milojica  Daliborka', '2403988165004', '1988-03-24', 'Prijedor', 'Nistavci bb', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '066/996-814', '', 'NK', '', 'NK', 'Pomicni radnik', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'od', 'Montaža kostura', 'Pomocni radnik', 'Montaža prednje fronte', '115', NULL, NULL, NULL, NULL),
(1802, 'Stojnić  Milomir Miloš', '1412995161508', '1995-12-14', 'Prijedor', 'Rade Gnjatovica BB Prijedor', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/020-287', '', 'SSS', '', 'Hemijski tehnicar', 'Pomicni radnik', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Montaža sjedala', '', NULL, NULL, NULL, NULL),
(1803, 'Stojnić  Rajko Sla?ana', '1809996165008', '1996-09-18', 'Prijedor', 'Novi Orlovci bb', 'RS/BiH', 'sr', 'o', '11/19/2020', 'ne', '', 'o', '0', 'ž', '066/941-454', '', 'SSS', '', 'Prehrabeni preradjivac', 'Pomicni radnik', '', NULL, NULL, NULL, '2018-05-01', '', 'a', 'no', '', 'Pomocni radnik', 'Održavanje ?isto?e', '', NULL, NULL, NULL, NULL),
(1804, 'Štrbac Rajko  David', '2806996160000', '1996-06-28', 'Prijedor', 'Veliko Palaciste BB', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/222-956', '', 'SSS', '', 'Teh.za obradu drveta', 'Pomicni radnik', '', NULL, NULL, NULL, '2019-10-01', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Navla?enje presvlaka', '17', NULL, NULL, NULL, NULL),
(1805, 'Štrbac  Sava Ljubica', '0401984116076', '1984-01-04', 'Bosanska Krupa', 'Crna Dolina bb', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '066/425-439', '', 'NK', '', 'NK', 'Pomicni radnik', '', NULL, NULL, NULL, '2019-03-01', '', 'a', 'od', 'Površinska obrada', 'Pomocni radnik', 'Brušenje temeljnog laka', '', NULL, NULL, NULL, NULL),
(1806, 'Šušnica Pero  Jovo', '2405959163313', '1959-05-24', 'Sanski Most', 'Aerodrom bb', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/609-441', '', 'KV', '', 'Kuhar', 'Ruk.horizotalne tracne pile', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Finalna obrada', 'Ruk.horizontalen tracne pile', 'Univerzalac', '91', NULL, NULL, NULL, NULL),
(1807, 'Tadić  Milan Duško', '0505971163342', '1971-05-05', 'Sanski Most', 'Ranka Šipke bb', 'RS/BiH', 'sr', 'o', '4/11/2020', 'ne', '', 'o', '0', 'm', '066/784-249', '', 'NK', '', 'NK', 'Stolar', '', NULL, NULL, NULL, '2016-11-01', '', 'a', 'no', 'Finalna obrada', 'Stolar', 'Majstor na stolarskim mašinama', '', NULL, NULL, NULL, NULL),
(1808, 'Trninić Mladen  Nemanja', '2302997160006', '1997-02-23', 'Prijedor', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '1/9/2020', 'ne', '', 'o', '0', 'm', '066/146-231', '', 'SSS', '', 'Teh.za obradu drveta', 'Pomicni radnik', '', NULL, NULL, NULL, '2017-06-13', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Majstor na stolarskim mašinama', '', NULL, NULL, NULL, NULL),
(1809, 'Tubić  Milovan Marko', '0805999160008', '1999-05-08', 'Prijedor', 'Vaskrsije Marica 15', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '066/667-859', '', 'SSS', '', 'Elektroni?ar', 'Pomicni radnik', '', NULL, NULL, NULL, '2018-05-01', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Montaža kartona na kostur', '', NULL, NULL, NULL, NULL),
(1810, 'Udovčić  Rade Zoran', '2510993100027', '1993-10-25', 'Banja Luka', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'm', '066/996-333', '', 'SSS', '', 'Trgovac ', 'Pomicni radnik', '', NULL, NULL, NULL, '2019-01-01', '', 'a', 'no', 'Površinska obrada', 'Pomocni radnik', 'Bajcer', '', NULL, NULL, NULL, NULL),
(1811, 'Uzelac Obrad  Neško', '0903978111068', '1978-03-09', 'Bosanska Krupa', 'Novska bb', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '065/903-017', '', 'KV', '', 'Metalostrugar', 'Radnik', '', NULL, NULL, NULL, '2011-03-01', '', 'a', 'no', 'Održavanje i energetika', 'Pomocni radnik', 'NEŠKO', '106', NULL, NULL, NULL, NULL),
(1812, 'Varmaz  Rade Zorka', '0104979118856', '1979-04-01', 'Velika Kladusa ', '?ela bb', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'ž', '', '', '', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-05-10', '', 'a', 'od', 'Montaža kostura', 'Pomocni radnik', 'Pomo?ni radnik na montaži', '', NULL, NULL, NULL, NULL),
(1813, 'Vejin  Ilija An?elko', '1304973102381', '1973-04-13', 'Klju?', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/14/2020', 'ne', '', 'o', '0', 'm', '066/786-111', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-04-01', '', 'a', 'no', 'Površinska obrada', 'Pomocni radnik', 'Pomo?nik lakirera', '55', NULL, NULL, NULL, NULL),
(1814, 'Vranješ  Nikola Kosa', '0103963168318', '1963-03-01', 'Sanski Most', 'Orlovaca BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '066/252-760', '', 'SSS', '', 'Rudarski tehni?ar', 'Šiva?', '', NULL, NULL, NULL, '2016-03-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '73', NULL, NULL, NULL, NULL),
(1815, 'Vujinovi? Ratko  Zoran', '0704975110009', '1975-04-07', 'Biha?', 'Veliko Palaciste BB', 'RS/BiH', 'sr', 'o', '11/14/2020', 'ne', '', 'o', '0', 'm', '066/600-863', '', 'SSS', '', 'Mašinski tehni?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-10-25', '', 'a', 'no', 'Pilana sa sušarama', 'Pomocni radnik', 'Slaganje daske', '4', NULL, NULL, NULL, NULL),
(1816, 'Vukobrad  Luka Milena', '0605969168315', '1969-05-06', 'S.Most', 'Orlovaca BB', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '065/718-128', '', 'SSS', '', 'Teh.finalne obrade drveta', 'Šiva?', '', NULL, NULL, NULL, '2016-03-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '66', NULL, NULL, NULL, NULL),
(1817, 'Vukojević  Dušan Jelena', '1812987165012', '1987-12-18', 'Prijedor', 'Srpskih Velikana 243', 'RS/BiH', 'sr', 'o', '8/9/2020', 'ne', '', 'o', '0', 'ž', '066/859-154', '', 'SSS', '', 'Tehni?ar ra?unara', 'Administrativni radnik', '', NULL, NULL, NULL, '2014-12-01', '', 'a', 'no', '', 'Administrativni radnik', 'Šefica opštih poslova', '', NULL, NULL, NULL, NULL),
(1818, 'Vuleta Ostoja  Draško', '1009972160041', '1972-09-10', 'Prijedor', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'm', '065/843-092', '', 'KV', '', 'Tesar', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-08-15', '', 'a', 'no', 'Pilana sa sušarama', 'Pomocni radnik', 'Slaganje daske', '', NULL, NULL, NULL, NULL),
(1819, 'Zavišić Vukasin  Milenko', '2111975160002', '1975-11-21', 'Prijedor', 'Pe?ani  B-4', 'RS/BiH', 'sr', 'o', '1/13/2020', 'ne', '', 'o', '0', 'm', '066/041-221', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2015-11-01', '', 'a', 'no', 'Montaža kostura', 'Pomocni radnik', 'Majstor na presi', '', NULL, NULL, NULL, NULL),
(1820, 'Zavišić Vukasin Mladen', '0205974160014', '1974-05-02', 'Prijedor', 'Srpskih Velikana 161', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '065/822-788', '', 'SSS', '', 'Elektroni?ar - mehani?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2017-12-01', '', 'a', 'no', 'Održavanje i energetika', 'Pomocni radnik', 'Kotlovni?ar', '', NULL, NULL, NULL, NULL),
(1821, 'Zec Slavica  Radojka', '0211986195042', '1986-11-02', 'Zenica', 'Meše Selimovi?a 801', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '065/483-954', '', 'SSS', '', 'Zenski frizer', 'Pomocni radnik', '', NULL, NULL, NULL, '2016-04-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Pomocni radnik', 'Preslikavanje šablona na štof', '82', NULL, NULL, NULL, NULL),
(1822, 'Zeljić Ljupko Milka', '0101968116941', '1968-01-01', 'Bos.Petrovac', 'Donji Orlovci BB', 'RS/BiH', 'sr', 'o', '1/20/2020', 'ne', '', 'o', '0', 'ž', '066/357-270', '', 'KV', '', 'NK', 'Šiva?', '', NULL, NULL, NULL, '2018-02-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Šiva?', 'Šivenje presvlaka', '89', NULL, NULL, NULL, NULL),
(1823, 'Žigić  Miroslav Sanja ', '2610976196767', '1976-10-26', 'Travnik', 'Donje Balte bb Brdjani', 'RS/BiH', 'sr', 'o', '5/6/2020', 'ne', '', 'o', '0', 'ž', '066/316-392', '', 'SSS', '', 'Stolar', 'Tapetar', '', NULL, NULL, NULL, '2019-11-01', '', 'a', 'od', 'Tapaciranje i pakovanje', 'Tapetar', 'Pomo?ni tapetar', '71', NULL, NULL, NULL, NULL),
(1824, 'Živak  Stanko ?uro', '1202965151961', '1965-02-12', 'Konjice', 'Gornji Garevci BB', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'SSS', '', 'Ekonomski tehni?ar', 'Montaža', '', NULL, NULL, NULL, '2015-04-01', '', 'a', 'no', 'Montaža kostura', 'Montaža', 'Ravnanje smontiranih kostura', '', NULL, NULL, NULL, NULL),
(1825, 'Zolak Dragan  Davor', '1007991102386', '1991-07-10', 'Klju?', 'Moštani?ka 3', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/025-868', '', 'SSS', '', 'Konobar', 'Pomocni radnik', '', NULL, NULL, NULL, '2018-10-01', '', 'a', 'no', 'Finalna obrada', 'Pomocni radnik', 'Pomo?nik na brušenju drveta', '', NULL, NULL, NULL, NULL),
(1826, 'Zolak  Božo Drena', '1403967107388', '1967-03-14', 'Klju?', 'Moštani?ka 3', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'ž', '066/496-884', '', 'NK', '', 'NK', 'Pomocni radnik', '', NULL, NULL, NULL, '2018-09-01', '', 'a', 'no', 'Krojenje i šivenje presvlaka', 'Pomocni radnik', 'Preslikavanje šablona na štof', '76', NULL, NULL, NULL, NULL),
(1827, 'Zolak  Dragan Duško', '1408986102380', '1986-08-14', 'Klju?', 'Moštani?ka 3', 'RS/BiH', 'sr', 'o', '12/19/2020', 'ne', '', 'o', '0', 'm', '066/029-868', '', 'SSS', '', 'Elektromehani?ar', 'Pomocni radnik', '', NULL, NULL, NULL, '2019-02-05', '', 'a', 'no', 'Tapaciranje i pakovanje', 'Pomocni radnik', 'Pajovanje gotovih proizvoda', '', NULL, NULL, NULL, NULL),
(1828, 'Đurić Marinko Boban', '0401991193108', '1991-01-04', 'Travnik', 'Aerodromsko BB Prijedor', 'RS/BiH', 'sr', 'o', '', 'ne', '', 'o', '0', 'm', '', '', 'SSS', '', 'Dip.inzinjer sumarstva', 'Šef proizvodnje', '', NULL, NULL, NULL, '2020-05-04', '', 'a', 'od', 'Tehni?ki sektor', 'Šef proizvodnje', 'Organizator proizvodnje', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rnalozi`
--

CREATE TABLE `rnalozi` (
  `id` int(10) NOT NULL,
  `broj_RN` varchar(50) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `broj_dana` int(3) DEFAULT NULL,
  `datum_montaze` date DEFAULT NULL,
  `datum_isporuke` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rnalozi`
--

INSERT INTO `rnalozi` (`id`, `broj_RN`, `opis`, `broj_dana`, `datum_montaze`, `datum_isporuke`, `status`, `created_at`, `updated_at`) VALUES
(1, '1213', 'testni nalog 1', 3, '2021-03-03', '2021-05-17', 1, '2021-03-03 20:01:22', '2021-03-03 20:01:23'),
(7, '88 / 2021', 'nalog za testiranje štampe trebovnice', 3, '2001-05-17', '2001-07-13', 2, '2021-05-15 04:12:10', '2021-09-03 20:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Definiše korisnike i prava korisika. Ima mogućnost vršenja svih pregleda i obrada.', '2020-05-28 12:52:01', '2020-05-31 06:05:47'),
(2, 'Tehnolog', 'Ima mogućnost definisanja modela, normativa i sl.', '2020-05-28 12:52:01', '2020-05-31 05:53:52'),
(3, 'Operater', 'Unosi realizaciju radnih naloga', '2020-05-28 12:52:01', '2020-05-31 05:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `stavkern`
--

CREATE TABLE `stavkern` (
  `id` int(10) NOT NULL,
  `rnalog_id` int(10) DEFAULT NULL,
  `r_br` int(5) DEFAULT NULL,
  `kupac_id` int(10) DEFAULT NULL,
  `proizvod_id` int(10) DEFAULT NULL,
  `kolicina` int(10) DEFAULT NULL,
  `napomena` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stavkern`
--

INSERT INTO `stavkern` (`id`, `rnalog_id`, `r_br`, `kupac_id`, `proizvod_id`, `kolicina`, `napomena`, `created_at`, `updated_at`) VALUES
(15, 7, 6, 2, 70, 1, 'evo i napomenen evo i napomenen evo i napomenen evo i napomenen evo i napomenen', '2021-05-18 19:53:43', '2021-09-06 16:57:18'),
(16, 7, 2, 9, 71, 10, NULL, '2021-07-01 14:35:18', '2021-09-06 16:57:41'),
(17, 7, 3, 7, 18, 25, NULL, '2021-07-02 14:01:34', '2021-09-06 16:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Hot', '#f44336', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(2, 'Trending', '#9c27b0', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(3, 'New', '#00bcd4', '2020-05-28 12:52:02', '2020-05-28 12:52:02'),
(4, 'halva', '#1aea21', '2020-06-02 20:46:03', '2020-06-02 20:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `tipovipolja`
--

CREATE TABLE `tipovipolja` (
  `tip` int(11) DEFAULT NULL,
  `polje` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipovipolja`
--

INSERT INTO `tipovipolja` (`tip`, `polje`) VALUES
(1, 'debljina'),
(1, 'duz_razred'),
(1, 'klasa'),
(1, 'mattipvrsta_id'),
(2, 'debljina'),
(2, 'klasa'),
(2, 'mattipvrsta_id'),
(3, 'br_linija'),
(3, 'mattipvrsta_id'),
(3, 'sirina'),
(4, 'br_slojeva'),
(4, 'forma_oblik'),
(4, 'klasa'),
(4, 'namjena'),
(5, 'debljina'),
(5, 'klasa'),
(5, 'namjena'),
(5, 'sp_tezina'),
(6, 'gustina'),
(6, 'klasa'),
(6, 'mattipvrsta_id'),
(6, 'tvrdoca'),
(7, 'mattipoznaka_id'),
(7, 'mattipvrsta_id'),
(8, 'mattipvrsta_id'),
(9, 'mattipvrsta_id'),
(9, 'proizvodjac'),
(10, 'mattipoznaka_id'),
(10, 'mattipvrsta_id'),
(10, 'namjena'),
(11, 'duz_trake'),
(11, 'granulacija'),
(11, 'namjena'),
(11, 'sir_trake'),
(11, 'vrsta_podloge'),
(12, 'jed_mjere'),
(12, 'vrsta_okova'),
(13, 'jed_mjere'),
(13, 'mattipvrsta_id');

-- --------------------------------------------------------

--
-- Table structure for table `turbinadijelovi`
--

CREATE TABLE `turbinadijelovi` (
  `id` int(5) NOT NULL,
  `oznaka` varchar(50) DEFAULT NULL,
  `turbinadiotip_id` int(5) DEFAULT NULL,
  `cijena` int(10) DEFAULT NULL,
  `nab_cijena` int(10) DEFAULT NULL,
  `na_stanju_s` int(5) DEFAULT NULL,
  `na_stanju_r` int(5) DEFAULT NULL,
  `na_stanju_p` int(5) DEFAULT NULL,
  `limit` int(5) DEFAULT NULL,
  `polica_s` varchar(50) DEFAULT NULL,
  `polica_r` varchar(50) DEFAULT NULL,
  `polica_p` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turbinadijelovi`
--

INSERT INTO `turbinadijelovi` (`id`, `oznaka`, `turbinadiotip_id`, `cijena`, `nab_cijena`, `na_stanju_s`, `na_stanju_r`, `na_stanju_p`, `limit`, `polica_s`, `polica_r`, `polica_p`, `created_at`, `updated_at`) VALUES
(1, 'HS-115', 6, 3575, 0, 12, NULL, NULL, 7, NULL, NULL, NULL, '2021-12-13 23:45:08', '2021-12-15 19:11:37'),
(2, 'RK-107', 8, 4100, 0, 7, NULL, NULL, 7, NULL, NULL, NULL, '2021-12-13 23:45:07', '2021-12-13 18:41:02'),
(8, 'GK-1112', 5, 3300, 0, 20, NULL, NULL, 21, NULL, NULL, NULL, '2021-12-10 23:24:47', '2021-12-13 19:00:44'),
(9, 'tw-333', 10, 2500, 0, 6, NULL, NULL, 7, NULL, NULL, NULL, '2021-12-11 09:00:01', '2021-12-13 18:41:05'),
(12, 'CW-002', 4, 2300, 200, 3, NULL, NULL, 4, NULL, NULL, NULL, '2021-12-13 18:55:19', '2021-12-13 19:58:05'),
(13, 'AC-113', 1, 1100, 100, 0, 7, 0, 111, 'A27', 'b11', 'C12', '2021-12-13 19:01:20', '2022-03-18 01:42:57'),
(14, 'bh', 2, 2200, 2200, 4, 5, 6, 22, NULL, NULL, NULL, '2021-12-14 00:18:59', '2022-03-18 00:42:38'),
(15, 'BP-119', 3, 2300, 1200, 0, NULL, NULL, 7, NULL, NULL, NULL, '2021-12-14 00:19:25', '2021-12-14 01:05:47'),
(16, 'TW', 9, 3000, 1700, 0, 3, 0, 0, '-', 'ab/dd', '-', '2021-12-14 00:19:56', '2022-03-18 02:09:33'),
(17, 'nz', 7, 5000, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '2021-12-14 00:20:25', '2022-02-14 20:41:25'),
(18, 'CN-123', 11, 2100, 0, 0, 0, 0, 0, 'abd', '34', '79a', '2021-12-14 00:36:46', '2022-03-18 01:29:08'),
(19, 'th-33', 12, 2000, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '2021-12-14 00:47:38', '2022-02-14 20:41:10'),
(20, 'RO-223', 14, 12300, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '2021-12-14 01:08:15', '2022-02-14 20:41:03'),
(21, 'con-22', 13, 4500, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '2021-12-14 01:08:35', '2022-02-14 20:41:45'),
(22, 'BP-DRUGI', 3, 1000, 200, 3, 0, 0, 4, 'pol. s', 'pol. r.', 'pol .p', '2021-12-16 18:57:04', '2022-03-18 00:58:06'),
(23, 'jhj', 12, 2000, 1200, 2, NULL, NULL, 10, NULL, NULL, NULL, '2021-12-17 12:24:23', '2021-12-17 12:24:23'),
(24, 'hm-323', 19, 1000, 500, 17, NULL, NULL, 25, NULL, NULL, NULL, '2021-12-20 19:05:02', '2021-12-20 19:05:02'),
(25, 'cw-44', 4, 4400, 400, 4, NULL, NULL, 4, NULL, NULL, NULL, '2022-02-14 20:35:17', '2022-02-14 20:35:17'),
(26, 'kr-124', 15, 100, 0, 1, NULL, NULL, 0, '-', NULL, NULL, '2022-02-21 19:26:13', '2022-02-21 19:26:13'),
(27, 'kr-456', 15, 1000, 0, 0, NULL, NULL, 0, '-', NULL, NULL, '2022-02-21 19:26:32', '2022-02-21 19:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `turbinadiotipovi`
--

CREATE TABLE `turbinadiotipovi` (
  `id` int(5) NOT NULL,
  `oznaka` varchar(50) DEFAULT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `naziv_2` varchar(50) DEFAULT NULL,
  `dodatni_dijelovi` int(1) DEFAULT 0,
  `u_setu` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turbinadiotipovi`
--

INSERT INTO `turbinadiotipovi` (`id`, `oznaka`, `naziv`, `naziv_2`, `dodatni_dijelovi`, `u_setu`) VALUES
(1, 'AC', 'Actuator', 'Vakum ventil', 0, 1),
(2, 'BH', 'Bearing Housing', 'Kućište srca', 0, 1),
(3, 'BP', 'Back Plate', 'Ploča', 0, 1),
(4, 'CW', 'Compressor Wheel', 'Impeler', 0, 1),
(5, 'GK', 'Gasket Kit', 'Set za montažu turbine, dihtunzi limeni', 0, 1),
(6, 'HS', 'Heat Shield', 'Toplotni štit', 0, 2),
(7, 'NZ', 'Noozles', 'Varijabilna geomerija', 0, 1),
(8, 'RK', 'Repair Kit', 'Set za reparaciju', 0, 1),
(9, 'TW', 'Turbine Wheel', 'Rotor/osovina turbine', 0, 1),
(10, 'X01', 'Axialni ležaj', 'Axialni ležaj', 1, 1),
(11, 'CN', 'CHRA No.', 'Srce turbine', 0, 1),
(12, 'TH', 'Turbine Housing', 'Grana turbine', 0, 1),
(13, 'X02', 'Radialni ležaj', 'Radialni ležaj', 1, 2),
(14, 'X03', 'Distanceri', 'Distanceri', 1, 2),
(15, 'X04', 'Karike', 'Karike', 1, 2),
(16, 'X05', 'Gumica', 'Gumica', 1, 1),
(17, 'X06', 'Matica osovine', 'Matica osovine', 1, 1),
(18, 'X07', 'Dihtung povrata  ulja', 'Dihtung povrata  ulja', 1, 1),
(19, 'X08', 'Hella motorić', 'Hella motorić', 1, 1),
(20, 'X09', 'Hella zupčanik', 'Hella zupčanik', 1, 1),
(21, 'X10', 'Senzor položaja', 'Senzor položaja', 1, 1),
(22, 'X11', 'Elektronika turbine', 'Elektronika turbine', 1, 1),
(23, 'X12', 'Vakuum ventil sa senzorom', 'Vakum ventil sa senzorom', 1, 1),
(24, 'X13', 'Limeni obruč (dihtung) ispod srca turbine', 'Limeni obruč (dihtung) ispod srca turbine', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `turbine`
--

CREATE TABLE `turbine` (
  `id` int(5) NOT NULL,
  `oem` varchar(50) DEFAULT NULL,
  `comp_wheel` int(5) DEFAULT NULL,
  `turbine_wheel` int(5) DEFAULT NULL,
  `bearing_housing` int(5) DEFAULT NULL,
  `back_plate` int(5) DEFAULT NULL,
  `heat_shield` int(5) DEFAULT NULL,
  `actuator` int(5) DEFAULT NULL,
  `noozles` int(5) DEFAULT NULL,
  `gasket_kit` int(5) DEFAULT NULL,
  `repair_kit` int(5) DEFAULT NULL,
  `turbine_housing` int(5) DEFAULT NULL,
  `chra_no` int(5) DEFAULT NULL,
  `X01` int(5) DEFAULT NULL,
  `X02` int(5) DEFAULT NULL,
  `X03` int(5) DEFAULT NULL,
  `X04` int(5) DEFAULT NULL,
  `X05` int(5) DEFAULT NULL,
  `X06` int(5) DEFAULT NULL,
  `X07` int(5) DEFAULT NULL,
  `X08` int(5) DEFAULT NULL,
  `X09` int(5) DEFAULT NULL,
  `X10` int(5) DEFAULT NULL,
  `X11` int(5) DEFAULT NULL,
  `X12` int(5) DEFAULT NULL,
  `X13` int(5) DEFAULT NULL,
  `cijena` int(10) DEFAULT NULL,
  `nab_cijena` int(10) DEFAULT NULL,
  `na_stanju` int(5) DEFAULT NULL,
  `limit` int(5) DEFAULT NULL,
  `polica` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turbine`
--

INSERT INTO `turbine` (`id`, `oem`, `comp_wheel`, `turbine_wheel`, `bearing_housing`, `back_plate`, `heat_shield`, `actuator`, `noozles`, `gasket_kit`, `repair_kit`, `turbine_housing`, `chra_no`, `X01`, `X02`, `X03`, `X04`, `X05`, `X06`, `X07`, `X08`, `X09`, `X10`, `X11`, `X12`, `X13`, `cijena`, `nab_cijena`, `na_stanju`, `limit`, `polica`, `created_at`, `updated_at`) VALUES
(1, '534-345', 12, 0, 14, 22, 0, 0, 0, 0, 0, 0, 0, 9, 21, 0, 26, 0, 0, 0, 24, 0, 0, 0, 0, 0, 2245, 700, 23, 25, '-', '2021-12-13 23:48:59', '2022-02-26 22:56:40'),
(2, '755042-0002', 12, 0, 0, 15, 1, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21500, 0, 2, 7, NULL, '2021-12-13 23:48:58', '2021-12-14 00:55:48'),
(3, '755042-0003', 12, 16, 0, 0, 0, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12545, 0, 0, 7, NULL, '2021-12-07 22:40:29', '2021-12-14 00:56:31'),
(4, '2342-999991234', 12, 16, 14, 22, 0, 13, 0, 0, 0, 19, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 1100, 12, 13, 'ah/44', '2021-12-08 20:48:41', '2022-03-20 13:57:05'),
(6, 'zt', 0, 0, 0, 0, 0, 0, 17, 0, 0, 0, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2200, 1100, 5, 10, NULL, '2021-12-12 18:08:53', '2021-12-14 00:57:01'),
(12, 'skroz nov', 12, 16, 14, 15, 1, 13, 17, 8, 2, 19, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-12-14 00:52:55', '2021-12-14 00:52:55'),
(13, 'noš', 0, 0, 14, 0, 0, 13, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2021-12-14 00:53:08', '2021-12-14 00:53:24'),
(14, 'TEST', 12, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 27, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a', '2021-12-16 18:54:55', '2022-02-22 00:45:39'),
(15, '5558678', 12, 16, 14, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'SDF', '2021-12-16 18:55:58', '2022-02-13 21:38:24'),
(16, '87878', 12, 0, 0, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'aa', '2021-12-17 12:22:27', '2022-02-26 22:55:27'),
(17, '555', 12, 16, 0, 0, 0, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14600, 0, 0, 0, '-', '2021-12-25 15:43:25', '2022-02-27 00:26:41'),
(18, 'test_001', 12, 16, 14, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4500, 0, 0, 0, NULL, '2022-02-11 17:46:48', '2022-02-11 17:46:48'),
(19, 'tesy', 12, 0, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ah/33', '2022-02-11 19:28:37', '2022-02-17 00:13:32'),
(20, 'test7', 12, 0, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23000, 2300, 5, 5, '1f-zu', '2022-02-13 19:14:26', '2022-02-13 19:14:26'),
(21, 'wwwww', 0, 0, 0, 0, 0, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a', '2022-02-21 17:45:35', '2022-02-21 17:45:35'),
(22, 'tesla', 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 0, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 35500, 0, 0, 0, '-', '2022-02-22 00:11:16', '2022-02-22 00:11:44'),
(23, 'ddd', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '2022-02-26 22:38:20', '2022-02-26 22:38:20'),
(24, 'xcxc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'xc', '2022-02-27 00:32:50', '2022-02-27 00:32:50'),
(25, 'gggg', 0, 0, 0, 15, 0, 13, 0, 0, 0, 0, 0, 9, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'g', '2022-02-27 00:35:46', '2022-03-20 18:40:09'),
(26, 'rrr', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'rrr', '2022-02-27 00:38:46', '2022-02-27 00:38:46'),
(27, 'qq', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 0, 0, 27, 0, 0, 0, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'qq', '2022-02-27 00:42:20', '2022-02-27 00:42:20'),
(28, 'test nedelja', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 51200, 40000, 1, 1, 'polica', '2022-03-20 14:07:32', '2022-03-20 14:07:32'),
(29, 'tes17', 0, 0, 0, 22, 1, 0, 0, 0, 0, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2300, 0, 0, 0, 'ah/44', '2022-03-20 15:03:36', '2022-03-20 15:03:36'),
(30, 'dddr', 25, 0, 0, 22, 0, 13, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '/', '2022-03-20 18:47:15', '2022-03-20 18:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `picture`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dragan Sredić', 'dragan.sredic@gmail.com', '2020-05-28 12:52:01', '$2y$10$ysrAqhAsUyCqIH1EPy/1VOMfiALDbzjPNZwqy2bBuDZt0uodPMqhC', 'profile/F4J61yVze5jTrxf5ScwExf3m3434deqgkMJjEXZv.jpg', 1, '5yj3g6EjLjjmpiOvahYrXys1OSX34oPkcg6n7DK0MyBv5qVu0RhwRR7qlsrr', '2020-05-28 12:52:02', '2021-12-10 23:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `id` int(10) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `cijena` int(5) DEFAULT NULL,
  `aktivna` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`id`, `opis`, `cijena`, `aktivna`) VALUES
(1, 'Remont turbine', 20000, 1),
(2, 'Odmašćivanje, pranje, testiranje turbine', 8000, 1),
(3, 'Odmašćivanje, pranje, testiranje i kalibracija turbine', 10000, 1),
(4, 'Čišćenje i kalibracija turbine', 18000, 1),
(5, 'Balansiranje turbine', 7000, 1),
(6, 'Remont/popravka elektronike', 20000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alati`
--
ALTER TABLE `alati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alatnazivi`
--
ALTER TABLE `alatnazivi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `configsifre`
--
ALTER TABLE `configsifre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementi`
--
ALTER TABLE `elementi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_name_unique` (`name`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_tag`
--
ALTER TABLE `item_tag`
  ADD KEY `item_tag_item_id_foreign` (`item_id`),
  ADD KEY `item_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masina_mtag`
--
ALTER TABLE `masina_mtag`
  ADD KEY `masina_mtag_masina_id_foreign` (`masina_id`) USING BTREE,
  ADD KEY `masina_mtag_mtag_id_foreign` (`mtag_id`) USING BTREE;

--
-- Indexes for table `masine`
--
ALTER TABLE `masine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masine_name_unique` (`name`) USING BTREE,
  ADD KEY `masine_vrste_id_foreign` (`masinvrsta_id`) USING BTREE;

--
-- Indexes for table `masinlokacije`
--
ALTER TABLE `masinlokacije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masinvrste`
--
ALTER TABLE `masinvrste`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vrste_masina_name_unique` (`name`) USING BTREE;

--
-- Indexes for table `materijali`
--
ALTER TABLE `materijali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mattipovi`
--
ALTER TABLE `mattipovi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mattipoznake`
--
ALTER TABLE `mattipoznake`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mattipvrste`
--
ALTER TABLE `mattipvrste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtags`
--
ALTER TABLE `mtags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `operacije`
--
ALTER TABLE `operacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masina_id` (`masina_id`),
  ADD KEY `alat_id` (`alat_id`);

--
-- Indexes for table `parametri`
--
ALTER TABLE `parametri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `predracuni`
--
ALTER TABLE `predracuni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proiztipovi`
--
ALTER TABLE `proiztipovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proiztipvrste`
--
ALTER TABLE `proiztipvrste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvrstamodeli`
--
ALTER TABLE `proizvrstamodeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radnici`
--
ALTER TABLE `radnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rnalozi`
--
ALTER TABLE `rnalozi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `stavkern`
--
ALTER TABLE `stavkern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `tipovipolja`
--
ALTER TABLE `tipovipolja`
  ADD KEY `tip_polje` (`tip`,`polje`);

--
-- Indexes for table `turbinadijelovi`
--
ALTER TABLE `turbinadijelovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turbinadiotipovi`
--
ALTER TABLE `turbinadiotipovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turbine`
--
ALTER TABLE `turbine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alati`
--
ALTER TABLE `alati`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alatnazivi`
--
ALTER TABLE `alatnazivi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `configsifre`
--
ALTER TABLE `configsifre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `elementi`
--
ALTER TABLE `elementi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masine`
--
ALTER TABLE `masine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `masinlokacije`
--
ALTER TABLE `masinlokacije`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `masinvrste`
--
ALTER TABLE `masinvrste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `materijali`
--
ALTER TABLE `materijali`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=736;

--
-- AUTO_INCREMENT for table `mattipoznake`
--
ALTER TABLE `mattipoznake`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;

--
-- AUTO_INCREMENT for table `mattipvrste`
--
ALTER TABLE `mattipvrste`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6303;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mtags`
--
ALTER TABLE `mtags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operacije`
--
ALTER TABLE `operacije`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `parametri`
--
ALTER TABLE `parametri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `predracuni`
--
ALTER TABLE `predracuni`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `proiztipovi`
--
ALTER TABLE `proiztipovi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proiztipvrste`
--
ALTER TABLE `proiztipvrste`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvrstamodeli`
--
ALTER TABLE `proizvrstamodeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `radnici`
--
ALTER TABLE `radnici`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1829;

--
-- AUTO_INCREMENT for table `rnalozi`
--
ALTER TABLE `rnalozi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stavkern`
--
ALTER TABLE `stavkern`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turbinadijelovi`
--
ALTER TABLE `turbinadijelovi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `turbinadiotipovi`
--
ALTER TABLE `turbinadiotipovi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `turbine`
--
ALTER TABLE `turbine`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `item_tag`
--
ALTER TABLE `item_tag`
  ADD CONSTRAINT `item_tag_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
