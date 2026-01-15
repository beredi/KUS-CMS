-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2021 at 07:16 PM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.32

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
AUTOCOMMIT = 0;
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kusjanko_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events`
(
    `event_id`      int(11) NOT NULL,
    `event_name`    varchar(255) NOT NULL,
    `event_date`    date         NOT NULL,
    `event_time`    varchar(255) NOT NULL,
    `event_photo`   text         NOT NULL,
    `event_content` text         NOT NULL,
    `event_place`   varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory`
(
    `id`           int(11) NOT NULL,
    `name`         varchar(255) NOT NULL,
    `count`        int(11) NOT NULL,
    `actual_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `count`, `actual_count`)
VALUES (57, 'TV Fox 42\'\'', 1, 1),
       (3, 'Laptop MSI', 1, 1),
       (4, 'Fotoaparat Canon', 1, 0),
       (5, 'Monitor ', 1, 1),
       (6, 'Tlačiareň HP - stara', 1, 1),
       (8, 'Bim projektor', 1, 1),
       (9, 'Plátno pre projektor', 1, 1),
       (10, 'Reproduktory - veľké', 8, 6),
       (11, 'Reproduktory - malé', 1, 1),
       (56, 'Sluchadlá', 4, 4),
       (16, 'vlajka -  KUS', 3, 3),
       (21, 'CD Prehrávač ', 1, 1),
       (22, 'Mixážne pulty - Yamaha', 1, 1),
       (23, 'Zosilňovač', 1, 1),
       (24, 'Ovládač svetiel a stmievača', 1, 1),
       (25, 'mikrofóny ', 9, 9),
       (26, 'stojan na noty', 10, 10),
       (27, 'reflektory', 20, 18),
       (28, 'Stojan na reproduktor', 4, 4),
       (29, 'ohrievač - magitec', 1, 1),
       (30, 'radiátor', 1, 1),
       (31, 'tlačiareňa a scaner - HP - nový', 1, 1),
       (32, 'Kremenný ohrievač', 1, 1),
       (33, 'chladnička - BIRA', 1, 1),
       (34, 'Varič - Sigma', 1, 1),
       (35, 'Skriňa - jednokrídlová', 1, 1),
       (36, 'Skriňa - dvojkrídolvá', 1, 1),
       (37, 'Stôl - veľký', 2, 2),
       (38, 'Stoličky - biele', 8, 8),
       (39, 'Rámy pre výstavu', 10, 9),
       (40, 'Bluetooth reproduktor', 1, 1),
       (41, 'Stará polica - rekvizit', 1, 1),
       (42, 'hoklík - \"stóvčoke\"', 7, 7),
       (43, 'Akustický panel', 4, 4),
       (44, 'stôl - starý', 1, 1),
       (45, 'kontrabas', 1, 1),
       (46, 'computer - starý', 2, 2),
       (47, 'monitor - starý', 2, 2),
       (48, 'kyjake', 12, 12),
       (49, 'Reflektor - duble ', 1, 1),
       (50, 'Reflektor ', 1, 1),
       (51, 'Kulisne', 1, 1),
       (52, 'Stojan na refletory', 2, 2),
       (53, 'Prijimač pre mikrofón', 2, 2),
       (54, 'Taška za laptop', 1, 1),
       (58, 'Laptop Lenovo', 1, 1),
       (59, 'Myš a klávesnica HAMA', 1, 1),
       (60, 'HDMI kábel', 1, 1),
       (61, 'Toner HP', 1, 1),
       (62, 'Zakladač', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs`
(
    `id`          int(11) NOT NULL,
    `log_date`    date         NOT NULL,
    `log_author`  int(11) NOT NULL,
    `log_section` varchar(255) NOT NULL,
    `log_action`  text         NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `log_date`, `log_author`, `log_section`, `log_action`)
VALUES (66, '2021-01-14', 1, 'články', 'Publikoval článok Nová publikácia nášho spolku'),
       (65, '2021-01-14', 1, 'články', 'Publikoval článok Nová publikácia nášho spolku'),
       (64, '2021-01-14', 1, 'články', 'Publikoval článok Nová publikácia nášho spolku'),
       (63, '2020-12-21', 1, 'články', 'Publikoval článok Prajeme Vám krásne sviatky!'),
       (62, '2020-12-21', 1, 'novinky', 'Zmenil zobrazovanie noviniek na uvode'),
       (61, '2020-12-21', 1, 'články', 'Publikoval článok Prajeme Vám krásne sviatky!'),
       (150, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (14, '2020-11-25', 1, 'články', 'Publikoval článok Výstava archívnych fotografií o činnosti divadelnej sekcie'),
       (15, '2020-11-25', 1, 'články', 'Publikoval článok Výstava archívnych fotografií o činnosti divadelnej sekcie'),
       (153, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (17, '2020-12-01', 8, 'používatelia', 'Aktualizoval používateľa Pouzivatel'),
       (18, '2020-12-01', 8, 'používatelia', 'Aktualizoval používateľa Pouzivatel'),
       (20, '2020-12-01', 9, 'články', 'Pridal článok Priadky aj na DVD'),
       (21, '2020-12-01', 9, 'články', 'Upravil článok Priadky aj na DVD'),
       (22, '2020-12-01', 9, 'používatelia', 'Aktualizoval používateľa Meno'),
       (23, '2020-12-01', 1, 'články', 'Publikoval článok Priadky aj na DVD'),
       (24, '2020-12-01', 1, 'novinky', 'Zmenil zobrazovanie noviniek na uvode'),
       (25, '2020-12-01', 1, 'články', 'Upravil článok Priadky aj na DVD'),
       (26, '2020-12-01', 1, 'novinky', 'Zmenil zobrazovanie noviniek na uvode'),
       (27, '2020-12-02', 8, 'články', 'Vymazal článok Priadky aj na DVD'),
       (28, '2020-12-02', 1, 'tutorialy', 'Pridal tutorial test'),
       (29, '2020-12-02', 1, 'tutorialy', 'Vymazal tutorial test'),
       (30, '2020-12-07', 8, 'články', 'Pridal článok test'),
       (31, '2020-12-07', 8, 'články', 'Vymazal článok test'),
       (32, '2020-12-07', 8, 'články', 'Pridal článok aet'),
       (33, '2020-12-07', 8, 'používatelia', 'Pridal používateľa Lektor'),
       (34, '2020-12-07', 8, 'články', 'Pridal článok test'),
       (35, '2020-12-07', 8, 'články', 'Upravil článok aet'),
       (36, '2020-12-07', 8, 'články', 'Vymazal článok test'),
       (37, '2020-12-07', 8, 'články', 'Vymazal článok aet'),
       (38, '2020-12-07', 8, 'používatelia', 'Vymazal používateľa Lektor Lektor'),
       (50, '2020-12-07', 1, 'používatelia', 'Aktualizoval používateľa Jaroslav'),
       (51, '2020-12-07', 1, 'používatelia', 'Aktualizoval používateľa Jaroslav'),
       (52, '2020-12-07', 9, 'články', 'Pridal článok asd'),
       (53, '2020-12-07', 1, 'články', 'Vymazal článok asd'),
       (54, '2020-12-08', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (55, '2020-12-08', 1, 'podujatie', 'Pridal podujatie Vianočný večierok'),
       (56, '2020-12-15', 1, 'články', 'Publikoval článok Priadky už aj na DVD'),
       (47, '2020-12-07', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (48, '2020-12-07', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (49, '2020-12-07', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (57, '2020-12-15', 1, 'články', 'Upravil článok Priadky už aj na DVD'),
       (58, '2020-12-15', 1, 'články', 'Publikoval článok Priadky už aj na DVD'),
       (59, '2020-12-15', 1, 'novinky', 'Zmenil zobrazovanie noviniek na uvode'),
       (60, '2020-12-15', 1, 'články', 'Publikoval článok Priadky - už aj na DVD'),
       (67, '2021-01-14', 1, 'články', 'Publikoval článok Nová publikácia nášho spolku'),
       (68, '2021-01-14', 1, 'články', 'Publikoval článok Nová publikácia nášho spolku'),
       (69, '2021-01-14', 1, 'podujatia', 'Vymazal podujatie Vianočný večierok'),
       (70, '2021-01-17', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (71, '2021-01-22', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (72, '2021-01-22', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (73, '2021-01-22', 1, 'stránky', 'Aktualizoval stránku O nás '),
       (74, '2021-01-22', 1, 'stránky', 'Vymazal stránku Spevácka sekcia'),
       (75, '2021-01-22', 1, 'stránky', 'Aktualizoval stránku so pseudonymom folklor'),
       (76, '2021-01-24', 1, 'stránky', 'Pridal stránku Dievčenská spevácka skupina'),
       (77, '2021-01-24', 1, 'stránky', 'Pridal stránku Speváci'),
       (80, '2021-02-09', 1, 'používatelia', 'Pridal používateľa Teodora'),
       (81, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Jaroslav'),
       (82, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Malvína'),
       (83, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Andrea'),
       (84, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Juraj'),
       (85, '2021-02-09', 1, 'používatelia', 'Pridal používateľa Jana'),
       (86, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Malvína'),
       (87, '2021-02-09', 8, 'inventár', 'Vymazal položku Laptop MSI'),
       (88, '2021-02-09', 8, 'inventár', 'Vymazal položku Laptop MSI'),
       (89, '2021-02-09', 1, 'používatelia', 'Pridal používateľa Karmena'),
       (90, '2021-02-09', 1, 'používatelia', 'Aktualizoval používateľa Andrea'),
       (91, '2021-02-09', 1, 'používatelia', 'Pridal používateľa Anna'),
       (92, '2021-02-09', 18, 'používatelia', 'Aktualizoval používateľa Anna'),
       (98, '2021-02-12', 15, 'články', 'Pridal článok Nahraté aj prvé video'),
       (99, '2021-02-12', 1, 'články', 'Upravil článok Nahraté aj prvé video'),
       (100, '2021-02-12', 1, 'články', 'Publikoval článok Nahraté aj prvé video'),
       (101, '2021-02-12', 1, 'články', 'Publikoval článok Nahraté aj prvé video'),
       (102, '2021-02-24', 1, 'články', 'Publikoval článok Nahraté aj prvé video'),
       (112, '2021-03-29', 8, 'členovia', 'Upravil člena Jaroslav Beredi'),
       (113, '2021-03-30', 1, 'používatelia', 'Aktualizoval používateľa Anna'),
       (106, '2021-03-05', 1, 'členovia', 'Pridal používateľa Jaroslav Beredi'),
       (107, '2021-03-05', 1, 'členovia', 'Upravil člena Jaroslav Beredi'),
       (108, '2021-03-05', 1, 'tutorialy', 'Pridal tutorial Ako pridať/upraviť/zmazať člena'),
       (109, '2021-03-05', 1, 'tutorialy', 'Pridal tutorial Podujatia'),
       (110, '2021-03-05', 1, 'tutorialy', 'Pridal tutorial Inventar'),
       (111, '2021-03-05', 1, 'používatelia', 'Aktualizoval používateľa Andrea'),
       (114, '2021-03-30', 1, 'používatelia', 'Aktualizoval používateľa Jaroslav'),
       (115, '2021-04-04', 1, 'články', 'Publikoval článok Pár slov k Veľkej noci'),
       (116, '2021-04-04', 1, 'články', 'Publikoval článok Pár slov k Veľkej noci'),
       (117, '2021-04-04', 1, 'články', 'Publikoval článok Pár slov k Veľkej noci'),
       (119, '2021-04-20', 1, 'články', 'Publikoval článok Čo sa stalo šej noveho?'),
       (151, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (121, '2021-04-20', 1, 'články', 'Publikoval článok Čo sa stalo šej noveho?'),
       (152, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (129, '2021-04-22', 8, 'inventár', 'Pridal položku Laptop Lenovo'),
       (128, '2021-04-22', 8, 'inventár', 'Pridal položku TV Fox 42\'\''),
       (127, '2021-04-22', 8, 'inventár', 'Pridal položku Sluchadlá'),
       (130, '2021-04-22', 8, 'inventár', 'Pridal položku Myš a klávesnica HAMA'),
       (131, '2021-04-22', 8, 'inventár', 'Pridal položku HDMI kábel'),
       (132, '2021-04-22', 8, 'inventár', 'Pridal položku Toner HP'),
       (133, '2021-04-22', 8, 'inventár', 'Pridal položku Zakladač'),
       (143, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (144, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (145, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (146, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (147, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (148, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (149, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (154, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (155, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (156, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (157, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (158, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom folklor'),
       (159, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom dievensk spevcka skupina592'),
       (160, '2021-05-11', 1, 'stránky', 'Aktualizoval stránku so pseudonymom dievensk spevcka skupina592'),
       (161, '2021-05-11', 1, 'články', 'Publikoval článok Pár slov k Veľkej noci'),
       (162, '2021-06-10', 1, 'podujatie', 'Pridal podujatie Vystúpenie'),
       (163, '2021-06-14', 1, 'články', 'Publikoval článok Selenčou sa znovu ozývali piesne'),
       (164, '2021-06-14', 1, 'články', 'Publikoval článok Selenčou sa znovu ozývali piesne'),
       (165, '2021-06-14', 1, 'články', 'Publikoval článok Selenčou sa znovu ozývali piesne'),
       (166, '2021-06-14', 1, 'videogallery', 'Pridal video DSS - Tečte prúdom'),
       (167, '2021-06-15', 8, 'podujatie', 'Pridal podujatie Vystúpenie'),
       (168, '2021-06-16', 1, 'články', 'Publikoval článok Príbeh „Rozprávala  mi stará mama“ vo fotografiách'),
       (169, '2021-06-16', 1, 'články', 'Publikoval článok Príbeh „Rozprávala  mi stará mama“ vo fotografiách'),
       (170, '2021-06-17', 1, 'články', 'Publikoval článok Príbeh „Rozprávala  mi stará mama“ vo fotografiách'),
       (171, '2021-06-17', 1, 'články', 'Publikoval článok Príbeh „Rozprávala  mi stará mama“ vo fotografiách'),
       (172, '2021-07-05', 1, 'podujatia', 'Vymazal podujatie Vystúpenie'),
       (173, '2021-07-05', 1, 'články', 'Publikoval článok Vydarená detská dielňa Selenči k narodeninám'),
       (174, '2021-07-05', 1, 'články', 'Publikoval článok Vydarená detská dielňa Selenči k narodeninám'),
       (175, '2021-07-05', 1, 'články', 'Publikoval článok Vydarená detská dielňa Selenči k narodeninám'),
       (176, '2021-07-05', 1, 'články', 'Publikoval článok Vydarená detská dielňa Selenči k narodeninám'),
       (177, '2021-07-05', 1, 'podujatie', 'Pridal podujatie Vystúpenie'),
       (178, '2021-08-16', 8, 'podujatia', 'Vymazal podujatie Vystúpenie'),
       (179, '2021-08-16', 8, 'podujatia', 'Vymazal podujatie Vystúpenie'),
       (180, '2021-10-02', 1, 'články', 'Pridal článok Prvé video mužskej speváckej skupiny'),
       (181, '2021-10-02', 1, 'články', 'Upravil článok Prvé video mužskej speváckej skupiny'),
       (182, '2021-10-05', 1, 'články', 'Publikoval článok Prvé video mužskej speváckej skupiny'),
       (183, '2021-10-05', 1, 'videogallery', 'Pridal video Mužská spevácka skupina - Zmes vojenských piesní'),
       (184, '2021-10-05', 1, 'články', 'Publikoval článok Prvé video mužskej speváckej skupiny'),
       (185, '2021-11-29', 1, 'články', 'Publikoval článok Magdaléna na 55. Stretnutí v pivnickom poli'),
       (186, '2021-11-29', 1, 'články', 'Publikoval článok Magdaléna na 55. Stretnutí v pivnickom poli'),
       (187, '2021-11-29', 1, 'články', 'Publikoval článok Magdaléna na 55. Stretnutí v pivnickom poli'),
       (188, '2021-11-29', 1, 'stránky', 'Aktualizoval stránku so pseudonymom spevci666'),
       (189, '2021-11-30', 1, 'články', 'Publikoval článok Magdaléna na 55. Stretnutí v pivnickom poli');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members`
(
    `id`          int(11) NOT NULL,
    `name`        varchar(255) NOT NULL,
    `lastname`    varchar(255) NOT NULL,
    `dateofbirth` date         NOT NULL,
    `adress`      varchar(255) NOT NULL,
    `JMBG`        bigint(20) NOT NULL,
    `number`      varchar(255) NOT NULL,
    `email`       varchar(255) NOT NULL,
    `passnumber`  varchar(255) NOT NULL,
    `year`        int(11) NOT NULL,
    `passscan`    text         NOT NULL,
    `degree`      varchar(128) NOT NULL,
    `sex`         varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `lastname`, `dateofbirth`, `adress`, `JMBG`, `number`, `email`, `passnumber`,
                       `year`, `passscan`, `degree`, `sex`)
VALUES (1, 'Jaroslav', 'Beredi', '1996-03-24', 'Benešova 4, 21425 Selenča', 2403996800045, '+381629678469',
        'xarocx@gmail.com', '014675105', 2016, '1614949544.jpg', 'Ing.', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news`
(
    `news_id`    int(11) NOT NULL,
    `news_value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_value`)
VALUES (1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages`
(
    `id`               int(11) NOT NULL,
    `page_title`       varchar(255) NOT NULL,
    `page_description` text         NOT NULL,
    `page_content`     text         NOT NULL,
    `page_pseu`        varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_description`, `page_content`, `page_pseu`)
VALUES (1, 'O nás', 'Niekoľko slov o našom spolku',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/kus2020.jpg\" /></p>\r\n\r\n<p>P&iacute;sal sa rok 1947 keď Selenčania, ktor&iacute; sa venovali kult&uacute;rnej činnosti, založili spolok. Rozhodli sa ho pomenovať po zn&aacute;mej česko-slovenskej osobnosti J&aacute;novi Koll&aacute;rovi, ktor&eacute;ho meno nos&iacute; aj z&aacute;kladn&aacute; &scaron;kola v Selenči. Takto novozaložen&yacute; Kult&uacute;rno osvetov&yacute; spolok bol akt&iacute;vny na r&ocirc;znych poliach kult&uacute;ry.</p>\r\n\r\n<p>Prv&yacute; orchester viedol Juraj Zolňan, zn&aacute;mej&scaron;&iacute; ako B&aacute;ťa Ďurko. Vtedy naďaleko zn&aacute;my prim&aacute;&scaron;, ktor&yacute; zoskupil selenčsk&yacute;ch hudobn&iacute;kov a spolu tvorili ľudov&yacute; orchester. Ďalej orchester nacvičoval odborn&iacute;k J&aacute;n Nos&aacute;l.</p>\r\n\r\n<p>Počas osemdesiatych rokov minul&eacute;ho storočia pri Kult&uacute;rno umeleckom spolku p&ocirc;sobili žensk&aacute;, mužsk&aacute; a zmie&scaron;an&aacute; spev&aacute;cka skupina pod veden&iacute;m J&aacute;na &Scaron;imoniho. Žensk&aacute; spev&aacute;cka skupina dosahovala pozoruhodn&eacute; v&yacute;sledky na r&ocirc;znych hudobno-folkl&oacute;rnych prehliadkach. Tieto skupiny zanechali aj hudobn&eacute; nahr&aacute;vky.</p>\r\n\r\n<p>V časovom rozp&auml;t&iacute; od roku 1993 po 1997 p&ocirc;sobil pri spolku i Komorn&yacute; zbor Zvony s jeho ved&uacute;cim Dr. Jurajom S&uacute;dim.</p>\r\n\r\n<p>Spolok &uacute;spe&scaron;ne predstavovali aj s&oacute;lov&yacute; spev&aacute;ci, ktor&iacute; sa z&uacute;častňovali aj festivalu Stretnutie v pivnickom poli od roku 1966.</p>\r\n\r\n<p>V r&aacute;mci činnosti KUS pracovali: divadeln&aacute;, tanečn&aacute;, hudobno-spev&aacute;cka, v&yacute;tvarn&aacute; sekcia a knižnica. V spomenut&yacute;ch oblastiach sa striedali početn&iacute; selenčsk&iacute; ochotn&iacute;ci, ktor&iacute; prispeli do kult&uacute;rneho bohatstva Selenče. Cieľom vždy bolo zachovať zvyky, obyčaje a trad&iacute;cie, ktor&eacute; boli nacvičovan&eacute; v podobe tanečn&yacute;ch choreografi&iacute; a n&aacute;sledne vhodne spracovan&eacute; pre javiskov&eacute; predvedenie.</p>\r\n\r\n<p>Katar&iacute;na Ber&eacute;diov&aacute; venovala svoj voľn&yacute; čas spolku od roku 1956. Dlh&eacute; roky bola ved&uacute;cou tanečn&yacute;ch skup&iacute;n a akt&iacute;vnou členkou divadelnej sekcie.</p>\r\n\r\n<p>KUS bol nositeľom&nbsp;Okt&oacute;brovej ceny&nbsp;obce B&aacute;č v roku 1975 a ceny&nbsp;Iskra kult&uacute;ry&nbsp;Kult&uacute;rno osvetov&eacute;ho spoločenstva SAPV v roku 1978, pod veden&iacute;m Katar&iacute;ny Ber&eacute;diovej.</p>\r\n\r\n<p>Dnes spolok poč&iacute;ta okolo 40 členov r&ocirc;znych vekov&yacute;ch kateg&oacute;ri&iacute;. Najpočetnej&scaron;ia je tanečn&aacute; skupina, kde je umeleck&yacute;m ved&uacute;cim Jaroslav Ber&eacute;di. Divadeln&aacute; sekcia pracuje pr&iacute;ležitostne, keď prispieva do kult&uacute;rno-umeleck&yacute;ch programov r&ocirc;znymi sc&eacute;nkami. Pod veden&iacute;m Jaroslava Ber&eacute;diho a Juraja S&uacute;diho ml. pracuje dievčensk&aacute; spev&aacute;cka skupina. Juraj S&uacute;di ml. m&aacute; na starosti aj orchester.</p>\r\n\r\n<p>Tanečn&aacute; a spev&aacute;cka skupina sa pravidelne z&uacute;častňuj&uacute; folkl&oacute;rneho festivalu&nbsp;Tancuj, tancuj...&nbsp;v Hložanoch. Taktiež vystupuj&uacute; na r&ocirc;znych festivaloch a programoch, ako doma, tak aj v zahranič&iacute;.</p>\r\n\r\n<p><em>Použit&aacute; literat&uacute;ra: Selenča 1758 &ndash; 1998, KULT&Uacute;RA, B&aacute;čsky Petrovec.</em></p>\r\n',
        'about'),
       (8, 'Speváci', 'Naši speváci nám prinášaju veľmi pekné výsledky',
        '<p>Početn&yacute; rad s&oacute;lo spev&aacute;kov predstavoval selenčsk&yacute; spolok na r&ocirc;znych s&uacute;ťažiach, ale aj na podujatiach, ktor&eacute; boli organizovan&eacute; doma a za hranicami. Od roku 2015 s&oacute;lo spev&aacute;ci pre spolok vyspievali početn&eacute; ocenenia na festivaloch Cez Nadlak je v Rumunsku, a to Anna Ber&eacute;diov&aacute; 1. cenu, Zlatko Klinovsk&yacute; 1. cenu a Krist&iacute;na Krajč&iacute;kov&aacute; a Jana Trusinov&aacute; boli odmenen&eacute; &scaron;peci&aacute;lnymi cenami. Na festivale v Pivnici Stretnutie v pivnickom poli Anna Ber&eacute;diov&aacute; z&iacute;skala 2. cenu odbornej poroty, &scaron;peci&aacute;lnu cenu a odmenen&yacute; bol aj jej kroj. Zlatko Klinovsk&yacute; z&iacute;skal dve 3. ceny odbornej poroty. S&oacute;lo spev selenčsk&yacute;ch spolk&aacute;rov bolo počuť aj na Oraviciach na Slovensku a na dom&aacute;com javisku.</p>\r\n\r\n<p><img alt=\"Jana Trusinová (autor fotografie: Jaroslav Berédi)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/78752779_983109802058596_3893006580987199488_o.jpg\" style=\"height:752px; width:500px\" />&nbsp; &nbsp;</p>\r\n\r\n<p><img alt=\"Kristína Krajčíková a Andrej Pavlov\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/21768897_487991178237130_1955434704565061005_o.jpg\" style=\"height:889px; width:500px\" /></p>\r\n\r\n<p><img alt=\"Anna Berédiová (autor fotografie: Ondrej Miháľ)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/46911417_10216284853608534_7635381808430841856_o.jpg\" style=\"height:667px; width:1000px\" /></p>\r\n\r\n<p><img alt=\"Zlatko Klinovský (zdroj: Udscr Nădlac Dzsčr Nadlak)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/44771679_1243283715811518_8322815972972953600_o.jpg\" style=\"height:1498px; width:1000px\" /></p>\r\n\r\n<p><img alt=\"Magdaléna Kaňová (2021)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/DSC_4955.jpg\" style=\"height:1333px; width:2000px\" /></p>\r\n',
        'spevci666'),
       (3, 'Divadelná sekcia', 'Viac informácií o divadle.',
        '<p>S divadlom sa začalo pracovať d&aacute;vneho 06. janu&aacute;ra roku 1895, keď sa Juliana Medvedck&aacute; rozhodla rež&iacute;rovať jednoaktovku&nbsp;P&aacute;n Tom&aacute;&scaron;, v ktorej &uacute;činkovalo 9 hercov. A tak sa to roztočilo.</p>\r\n\r\n<p>V rokoch 1895 až 1949 sa v Selenči divadeln&eacute; predstavenia hr&aacute;vali pri evanjelickej a katol&iacute;ckej cirkvi a v r&aacute;mci r&ocirc;znych organiaz&aacute;ci&iacute;, ako s&uacute; MOMS, N&aacute;rodn&yacute; front, Č&iacute;tac&iacute; kr&uacute;žok, AFŽ, Remeseln&iacute;cke družstvo, &Scaron;portov&yacute; klub Kriv&aacute;ň a Dobrovoľn&yacute; hasičsk&yacute; spolok. V tomto obdob&iacute; v Selenči zahrali asi 30 divadeln&yacute;ch hier. V obdob&iacute; Druhej svetovej vojny sa divadl&aacute; nehr&aacute;vali.</p>\r\n\r\n<p>Roku 1949 sa divadeln&iacute;ctvo dost&aacute;va do r&uacute;k kult&uacute;rno-osvetov&eacute;ho spolku J&aacute;na Koll&aacute;ra, ktor&yacute; dal dokopy v&scaron;etk&yacute;ch ochotn&iacute;kov oboch konfesi&iacute; v Selenči. V r&aacute;mci hasičsk&eacute;ho spolku sa odohralo 12 divadeln&yacute;ch predstaven&iacute; e&scaron;te do roku 1958, keď aj divadeln&aacute; činnosť zanik&aacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/divadlo1.jpg\" style=\"height:659px; width:934px\" /></p>\r\n\r\n<p>Od roku 1949 až po s&uacute;časn&uacute; dobu ochotn&iacute;ci Kult&uacute;rno-umeleck&eacute;ho spolku nacvičili nasledovn&eacute; divadeln&eacute; hry:</p>\r\n\r\n<ul>\r\n	<li>1949 - Statky-zm&auml;tky</li>\r\n	<li>1950 - Podozriv&aacute; osoba</li>\r\n	<li>1951 - Pytačky, Hora vol&aacute;, Mozoľovci, Moc</li>\r\n	<li>1952 - Ženba, Medveď</li>\r\n	<li>1953 - Z&aacute;veje, Vzorn&yacute; n&aacute;rodovedec, Oklaman&iacute; klam&aacute;ri, Roztržit&yacute;, Posledn&aacute; izba</li>\r\n	<li>1954 - Star&yacute; zaľ&uacute;benec, Chce sa vydať, Str&yacute;ko, Zaživa v nebi, Deti jedn&eacute;ho otca</li>\r\n	<li>1955 - Bačova žena, Čertov mlyn, Dobr&aacute; bolesť čo d&aacute; pojesť, Sluha dvoch p&aacute;nov</li>\r\n	<li>1956 - Maliarečka, Za frontom, Falo&scaron;n&iacute; pytači, Ťažk&eacute; chv&iacute;le, T&aacute; na&scaron;a Marča, Keď sa bačkor opapuč&iacute;</li>\r\n	<li>1957 - Truc na truc, Kamenn&yacute; chodn&iacute;ček, Testina do domu, spokojnosť z domu, Prevr&aacute;ten&yacute; svet, Dev&auml;ť zemiakov, Ľudia</li>\r\n	<li>1958 - Zl&aacute; žena, Statočn&yacute; valach, Slobodn&iacute; manželia, Mar&iacute;na Havranov&aacute;</li>\r\n	<li>1959 - Exek&uacute;tor v sukniach, Krut&yacute; život</li>\r\n	<li>1960 - Pani ministrov&aacute;, Konop&aacute;reň, Keď vonia zem, Lekcia</li>\r\n	<li>1961 - Zlomen&aacute; p&yacute;cha, Prv&yacute; obed v manželstve, Peniaze</li>\r\n	<li>1962 - Denn&iacute;k Anny Frankovej, Chudobn&aacute; rodina, &Scaron;kriatok</li>\r\n	<li>1963 - Krist&iacute;na</li>\r\n	<li>1964 - Doktor, Z&aacute;veje</li>\r\n	<li>1965 - P&aacute;n Tom&aacute;&scaron;</li>\r\n	<li>1966 &ndash; &Oacute;, tie ženy</li>\r\n	<li>1967 - Čertov mlyn</li>\r\n</ul>\r\n\r\n<p>V rokoch 1968-1972 divadeln&aacute; činnosť pri spolku ut&iacute;chla.</p>\r\n\r\n<ul>\r\n	<li>1972 - Posledn&aacute; izba</li>\r\n	<li>1973 - Nebožt&iacute;k</li>\r\n	<li>1974 - Pytliakova žena, Bytčianka z doliny</li>\r\n	<li>1975 - Nov&yacute; život</li>\r\n	<li>1976 - Meteor</li>\r\n	<li>1978 - Meridi&aacute;n, Divadlo v dome</li>\r\n	<li>1979 - Kamenn&yacute; chodn&iacute;ček</li>\r\n	<li>1980 - Petrolej</li>\r\n	<li>1983 - Verona</li>\r\n	<li>1990 - Oklaman&iacute; klam&aacute;ri, Pani richt&aacute;rka</li>\r\n	<li>1992 - Hora vol&aacute;</li>\r\n	<li>1993 - Skryt&aacute; kamera</li>\r\n	<li>1995 - Pri pr&iacute;ležitosti 100 rokov divadla v Selenči - P&aacute;n Tom&aacute;&scaron;</li>\r\n	<li>1995 - Kr&iacute;za</li>\r\n	<li>1997 - P&aacute;nik</li>\r\n</ul>\r\n\r\n<p>Od roku 1997 divadeln&aacute; činnosť pri spolku a v&ocirc;bec v Selenči zanikla až do roku 2007, keď sa činnosť divadelnej odbočky obnovila premi&eacute;rou hry&nbsp;Žobr&aacute;cke dobrodružstvo.</p>\r\n\r\n<ul>\r\n	<li>2009 - Stra&scaron;ne o&scaron;emetn&aacute; situ&aacute;cia</li>\r\n	<li>2011 - Dvojn&iacute;k p&aacute;na Barana</li>\r\n	<li>2012 - Dobr&aacute; bolesť čo d&aacute; pojesť</li>\r\n	<li>2014 &ndash; Krpčeky sv&auml;t&eacute;ho Flori&aacute;na</li>\r\n	<li>2016 - Cirkevn&aacute; daň</li>\r\n</ul>\r\n\r\n<p>Od začiatku jestvovania Kult&uacute;rno-umeleck&eacute;ho spolku, r&eacute;žiu divadeln&yacute;ch hier mali na starosti:</p>\r\n\r\n<ul>\r\n	<li>Juraj Kr&iacute;žov</li>\r\n	<li>Adam Rago</li>\r\n	<li>J&aacute;n Turčan</li>\r\n	<li>Juraj Ber&eacute;di</li>\r\n	<li>Jozef Kov&aacute;č</li>\r\n	<li>Karol Burčiar</li>\r\n	<li>Svetlana Zolňanov&aacute;</li>\r\n	<li>Vlasta Faďo&scaron;ov&aacute;</li>\r\n</ul>\r\n\r\n<p>V s&uacute;časnosti je na tom poste Rastislav Ryb&aacute;rsky.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/divadlo2.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n',
        'divadlo'),
       (4, 'Tanečná sekcia', 'Viac informácií o našich tanečníkoch.',
        '<p>Hovor&iacute; sa, že rock and roll a beetov&aacute; hudba podnietili vznik folkl&oacute;rnych skup&iacute;n za cieľom zachov&aacute;vania slovensk&yacute;ch ľudov&yacute;ch trad&iacute;ci&iacute;. V Selenči v&scaron;ak prv&aacute; folkl&oacute;rna skupina vznikla pre potreby z&uacute;častnenia sa na Slovensk&yacute;ch n&aacute;rodn&yacute;ch sl&aacute;vnostiach. Gener&aacute;cie tanečn&iacute;kov naroden&yacute;ch začiatkom 30. rokov minul&eacute;ho storočia už nie s&uacute; medzi nami.</p>\r\n\r\n<p>Prv&yacute; v&yacute;znamnej&scaron;&iacute; festival, na ktor&yacute; spom&iacute;naj&uacute; niekdaj&scaron;&iacute; folkloristi bol v roku 1968 vo V&yacute;chodnej.</p>\r\n\r\n<p>Selenčsk&yacute; folkl&oacute;r dosiahol svoj rozkvet pod veden&iacute;m Katar&iacute;ny Ber&eacute;diovej, keď sa v roku 1978 z&uacute;častnil na festivale Podpolianske sl&aacute;vnosti v Detve na Slovensku a potom na početn&yacute;ch festivaloch v Slov&iacute;nsku, na balk&aacute;nskej prehliadke v Ochride, v Nemecku. V tomto obdob&iacute; spolok z&iacute;skal aj najvy&scaron;&scaron;ie vojvodinsk&eacute; uznanie z oblasti kult&uacute;ry - Iskru kult&uacute;ry a Okt&oacute;brov&uacute; cenu Obce B&aacute;č. T&uacute;to gener&aacute;ciu tanečn&iacute;kov prestriedala folkl&oacute;rna skupina pod veden&iacute;m Anny Burčiarovej a vystupovali na festivale Tancuj, tancuj... a na početn&yacute;ch manifest&aacute;ci&aacute;ch doma a na Slovensku.</p>\r\n\r\n<p>Koncom dev&auml;ťdesiatych rokov Selenčania maj&uacute; podp&iacute;san&uacute; družbu s Pukancom v Slovenskej republike.</p>\r\n\r\n<p>Koncom dev&auml;ťdesiatych rokov dorastenci detsk&eacute;ho folkl&oacute;rneho s&uacute;boru Pramienok, ktor&yacute; pracoval pri &scaron;kole, pokračuj&uacute; s pr&aacute;cou aj v mene Kult&uacute;rno-umeleck&eacute;ho spolku. Pod veden&iacute;m Svetlany Zolňanovej z&iacute;skavaj&uacute; vyznamenania na pokrajinskej &uacute;rovni, z&uacute;častňuj&uacute; sa na festivaloch na Slovensku, v Gr&eacute;cku, Turecku a v Bulharsku.</p>\r\n\r\n<p>Po choreografi&aacute;ch Ivany Horv&aacute;tovej sa do folkl&oacute;rnych v&ocirc;d zap&aacute;ja Malv&iacute;na Zolňanov&aacute; a dne&scaron;n&iacute; folkloristi sa pod jej veden&iacute;m prezentuj&uacute; na dom&aacute;cich festivaloch v Rumunsku, Maďarsku a na Slovensku.&nbsp;</p>\r\n\r\n<p>Nesk&ocirc;r Malv&iacute;nu vystriedal sk&uacute;sen&yacute; tanečn&iacute;k Marijan Trusina.</p>\r\n\r\n<p>V s&uacute;časnosti je na poste umeleck&eacute;ho ved&uacute;ceho Jaroslav Ber&eacute;di.</p>\r\n\r\n<p><img alt=\"Choreografia Žatva v roku 2016 v Báči\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bac.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p><img alt=\"SNS 2016 - Báčsky Petrovec\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/slavnosti-2016.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n\r\n',
        'folklor'),
       (7, 'Dievčenská spevácka skupina', 'Niečo o našich šikovných dievčatách',
        '<p>Dievčensk&aacute; spev&aacute;cka skupina vždy bola akt&iacute;vna pri selenčskom spolku. S odstupom času sa jej činnosť znovu obnovila v roku 2015, keď vyst&uacute;pila na dom&aacute;com javisku so zmesou piesn&iacute; &Scaron;koda mojho veku mladyho. Potom sa spev&aacute;čky predstavili v roku 2016 zmesou Pod obl&ocirc;čkom zahrad&ocirc;čka a v roku 2017 Veje vetor hore dolinami na FF Tancuj, tancuj... v Hložanoch. Vtedy spev&aacute;čky mala na starosti Malv&iacute;na Zolňanov&aacute;. V roku 2018 zmes V na&scaron;om dvore a v roku 2019 zmes Skade ja chodievam spev&aacute;čky nacvičila Anna Ber&eacute;diov&aacute; pre FF Tancuj, tancuj...</p>\r\n\r\n<p><img alt=\"ZZ vystúpenia na FFTT 2019 - Hložany (autor fotografie: foto BENKA)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/aaaaaaaaa434.jpg\" style=\"height:731px; width:1300px\" /></p>\r\n\r\n<p>Spev&aacute;cka skupina spievala aj tanečn&iacute;kom počas vyst&uacute;pen&iacute; a vystupovala spolu s nimi na početn&yacute;ch podujatiach doma a v zahranič&iacute;.</p>\r\n\r\n<p>Aktu&aacute;ln&yacute;mi ved&uacute;cimi dievčenskej spev&aacute;ckej skupiny s&uacute; Juraj S&uacute;di ml. a Jaroslav Ber&eacute;di.</p>\r\n\r\n<p><img alt=\"SNS 2019 (autor fotografie: Juraj Berédi Ďuky)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/aaaaaaaaaaaaa2.jpg\" style=\"height:864px; width:1300px\" /></p>\r\n<p><img alt=\"Oslavy dňa Selenče - 2020 (autor fotografie: Juraj Berédi Ďuky)\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/aaaaaa.jpg\" style=\"height:864px; width:1300px\" /></p>\r\n',
        'dievensk spevcka skupina592');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts`
(
    `post_id`          int(11) NOT NULL,
    `post_title`       varchar(255) NOT NULL,
    `post_author`      varchar(255) NOT NULL,
    `post_date`        date         NOT NULL,
    `post_image`       text         NOT NULL,
    `post_content`     text         NOT NULL,
    `post_tags`        varchar(255) NOT NULL,
    `post_status`      varchar(255) NOT NULL,
    `post_last_edited` varchar(255) NOT NULL,
    `post_position`    int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,
                     `post_status`, `post_last_edited`, `post_position`)
VALUES (1, 'V novembri v roku 2017 KUS Jána Kollára oslávil svoje 70. narodeniny', '1', '2018-12-17', '70rokov.jpg',
        '<p>Pri tejto pr&iacute;ležitosti členovia divadelnej sekcie zahrali &uacute;ryvok z prv&eacute;ho divadeln&eacute;ho predstavenia, ktor&yacute;m sa Selenčsk&eacute;mu obecenstvu predstavili ochotn&iacute;ci v roku 1895. Vtedy P&aacute;na Tom&aacute;&scaron;a nacvičila pani far&aacute;rova Juliana Medveck&aacute;. Pri pr&iacute;ležitosti st&eacute;ho v&yacute;ročia t&uacute;to jednoaktovku na javisko postavila Svetlana Zolňanov&aacute;. Ďalej sa počas osl&aacute;v o divadle zmienili Ter&eacute;zia Žiakov&aacute; a Jozef Kov&aacute;č v tvare audio nahr&aacute;vky, ktor&yacute; svoj vrchol v r&eacute;žii pri spolku dosiahol filmom &ndash; najzn&aacute;mej&scaron;&iacute; &uacute;ryvok z filmu je žatva. Počas cel&eacute;ho programu div&aacute;ci mali možnosť sledovať z&aacute;znamy z RTV2, ktor&eacute; boli nahrat&eacute; e&scaron;te na sklonku 20. storočia.</p>\r\n\r\n<p>Selenču medzi slovensk&yacute;mi osadami ako v s&uacute;časnosti tak aj v minulosti považovali za kol&iacute;sku slovenskej&nbsp; ľudovej pesničky. Svoju spev&aacute;cku kari&eacute;ru v mene KUS si vybudovali Michal Zol&aacute;rek, Vlasta Faďo&scaron;ov&aacute;, M&aacute;ria Turansk&aacute; a&nbsp;in&iacute;. Počas tohto programu, už ako 70-ročn&iacute;, spievali spomenut&iacute; spev&aacute;ci M. Zol&aacute;rek a M. Turansk&aacute;. O samotn&yacute;ch podkladoch spev&aacute;ckej skupiny preč&iacute;tala Anna Ber&eacute;diov&aacute;. Pr&iacute;ležitosť uk&aacute;zať spev&aacute;kom svoj talent v ľudovej pesničky dal aj Juraj Ber&eacute;di, ktor&yacute; založil Detsk&yacute; kľ&uacute;čik. Z preč&iacute;tan&yacute;ch najn&aacute;kladnej&scaron;&iacute;ch &uacute;dajov o speve&nbsp; v&nbsp;Selenči, dievčensk&aacute; skupina, ktor&aacute; poč&iacute;tala dievčence a vydat&eacute; ženy, obecenstvu zaspievala dve pesničky, s ktor&yacute;mi sa KUS J&aacute;na Koll&aacute;ra prezentoval viackr&aacute;t na festivaloch, programoch a s&uacute;ťaženiach. V ten večer, ako aj dovtedy, spev&aacute;kov a tanečn&iacute;kov sprev&aacute;dzal orchester pod veden&iacute;m J&aacute;na &Scaron;imoniho, ktor&yacute; sa zmienil aj o jeho začiatkoch.</p>\r\n\r\n<p>V&yacute;zvu zachov&aacute;vať slovensk&eacute; ľudov&eacute; piesne a kroje sme pochopili v&aacute;žne. Aktivisti Kult&uacute;rno umeleck&eacute;ho spolku pravidelne z&iacute;skavaj&uacute; odmenu pre kroj na festivale V pivnickom poli, na festivale Cez Nadlak je... v Rumunsku a na festivale slovensk&yacute;ch krojov v Kys&aacute;či.</p>\r\n\r\n<p>Založen&yacute; pri spolku bol i KZ Zvony, ktor&eacute;ho je dodnes ved&uacute;cim Dr. Juraj S&uacute;di, a obecenstvu pribl&iacute;žil aj začiatky, ktor&eacute; spestrili akt&iacute;vnu činnosť KUS. Potom sa aj KZ Zvony predstavil s najzn&aacute;mej&scaron;ou skladbou ich dirigenta, ktor&uacute; zhudobnil na slov&aacute; Ivana Krasku - Otcova roľa. Medzi najv&yacute;znamnej&scaron;ie činnosti Selenčanov, ktor&iacute; pracovali na kult&uacute;rnom poli, bola aj prv&aacute; vojvodinsk&aacute; opera, ktor&uacute; podpisuje J&aacute;n Nos&aacute;l.</p>\r\n\r\n<p>Čo sa t&yacute;ka folkl&oacute;ru, najv&yacute;znamnej&scaron;ie ocenenie v minulom storoč&iacute;, Iskru kult&uacute;ry si tanečn&iacute;ci z&iacute;skali počas p&ocirc;sobenia Katar&iacute;ny Ber&eacute;diovej. Ďalej s tanečn&iacute;kmi pri spolku pracoval aj Juraj Ber&eacute;di, Anna Burčiarov&aacute;, ktor&aacute; boli choreografkou detskej skupiny Medovn&iacute;ček, po nich s dorastencami pracovali Ivana Ži&scaron;kov&aacute;, Svetlana Zolňanov&aacute; a Malv&iacute;na Zolňanov&aacute;. V priebehu osl&aacute;v sa predstavili aj s&uacute;časn&iacute; tanečn&iacute;ci, ktor&iacute; tancovali choreografiu menovanej Katar&iacute;ny Ber&eacute;diovej, ktor&aacute; sa m&ocirc;že považovať ako symbol selenčsk&eacute;ho folkl&oacute;ru, keďže z&iacute;skala najviac ocenen&iacute; a je aj p&ocirc;vodn&yacute;m tancom, ktor&yacute; sa do dnes zachov&aacute;va. Tento raz tanečn&iacute;kov sprev&aacute;dzal detsk&yacute; Orchestr&iacute;k.</p>\r\n\r\n<p>Najakt&iacute;vnej&scaron;&iacute;m členom od založenia spolku boli udelen&eacute; ďakovn&eacute; listiny. V ten večer do Domu kult&uacute;ry v Selenči mal pr&iacute;stup každ&yacute;, ktor&yacute; aspoň kamienkom prispel do dlhoročnej mozaike KUS J&aacute;na Koll&aacute;ra.</p>\r\n\r\n<p>Bol to opis &uacute;stredn&yacute;ch osl&aacute;v, ktor&eacute; prebiehali v nedeľu. No, nie menej d&ocirc;ležit&eacute; je pripomen&uacute;ť aj to, že deň pred t&yacute;m akt&iacute;vni členovia folkl&oacute;rnej sekcie pripravili pre v&scaron;etk&yacute;ch občanov svojej dediny aj ľudov&uacute; veselicu, a tak si každ&yacute; jeden mohol zatancovať a pobaviť sa pri slovenskej hudbe. Bola zorganizovan&aacute; i v&yacute;stava star&yacute;ch fotografi&iacute;, ktor&eacute; sa t&yacute;m sp&ocirc;sobom zachovali a tak sa pripomenula činnosť tohto združenia Selenčsk&yacute;ch ochotn&iacute;kov.</p>\r\n\r\n<p>Boli to celov&iacute;kendov&eacute; oslavy, o ktor&eacute; sa postarali v&scaron;etci ochotn&iacute;ci ako s&uacute;časn&iacute; tak aj t&iacute;, ktor&iacute; sa zap&aacute;jali predt&yacute;m. Bolo vidno, že Selenča m&aacute; byť na čo hrd&aacute; a ako osada e&scaron;te žije v slovenskom ľudovom duchu.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/70rokov.jpg\" style=\"height:1148px; width:3652px\" /></p>\r\n',
        'KUS Jána Kollára, oslavy, 70 rokov', 'published', '1', 0),
       (2, 'Vystúpenie na matičnom programe v Selenči', '1', '2018-12-17', 'maticny-program.jpg',
        '<p>V nedeľu 14. okt&oacute;bra v Dome kult&uacute;ry v Selenči prebiehal matičn&yacute; večierok.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/maticny-program.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n\r\n<p>Po pr&iacute;hovore PaedDr. Svetlany Zolňanovej, predsedn&iacute;čke selenčsk&eacute;ho MOMS, podujatie prebiehalo v matičnom duchu povzbudzovania na&scaron;ej slovenskej identity. Slovenskou rečou pr&iacute;tomn&yacute;ch oslovili aj KZ Zvony, spevokol evanjelickej a. v. cirkvy Ozvena, ako i Orchestr&iacute;k pod veden&iacute;m Dr. Juraja S&uacute;diho. Bolo počuť recit&aacute;cie, zatancovali aj členovia KUS J&aacute;na Koll&aacute;ra a spievali početn&iacute; spev&aacute;ci zo Selenče a medzi nimi aj vojlovičanka Katar&iacute;na Kalm&aacute;rov&aacute; a Boris Bab&iacute;k zo Starej Pazovy. Z&aacute;verom, v mene NRSNM, pam&auml;tn&uacute; tabuľu udelil predseda V&yacute;boru pre &uacute;radn&eacute; použ&iacute;vanie jazyka a p&iacute;sma Branislav Kul&iacute;k a prihovorila sa Libu&scaron;ka Lakato&scaron;ov&aacute;, republikov&aacute; poslankyňa.</p>\r\n\r\n<p>Večierok sa zakončil tak, že v&scaron;etci pr&iacute;tomn&iacute; spolu s &uacute;častn&iacute;kmi programu zaspievali matičn&uacute; hymnu <em>Po n&aacute;brež&iacute;</em>.</p>\r\n',
        '', 'published', '1', 0),
       (3, 'Oslavy 260 rokov Selenče', '1', '2018-12-17', 'selenca-260-1.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/selenca-260-1.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n\r\n<p>V dňoch 7. a 8. j&uacute;la konali sa oslavy 260 rokov Selenče, v ktor&yacute;ch sa z&uacute;častnil aj KUS J&aacute;na Koll&aacute;ra a predstavil sa r&ocirc;znymi choreografiami a piesňami.</p>\r\n\r\n<p>Prv&eacute;ho dňa (v sobotu) sa uskutočnila v&yacute;stava fotografi&iacute; slovensk&yacute;ch krojov pod n&aacute;zvom Slovensk&aacute; kr&aacute;sa-karav&aacute;na slovensk&yacute;ch krojov autorov Branislava Kokavca a Pavla Surov&eacute;ho. Organiz&aacute;tormi tohto podujatia boli Kult&uacute;rne centrum Kys&aacute;č a KUS J&aacute;na Koll&aacute;ra v spolupr&aacute;ci s MS Selenča. V&yacute;stavy sa z&uacute;častnili aj členovia spolku J&aacute;na Koll&aacute;ra tak, že prezentovali selenčsk&eacute; kroje z r&ocirc;znych obdob&iacute; na m&oacute;dnej prehliadke.</p>\r\n\r\n<p>Vo večern&yacute;ch hodin&aacute;ch uskutočnil sa kult&uacute;rno umeleck&yacute; program, na ktorom sa tanečn&aacute; skupina predstavila p&ocirc;vodn&yacute;m&nbsp;<em>Kyj&aacute;čkov&yacute;m tancom</em>. Dievčence na sebe mali &scaron;pecifick&eacute; kyckav&eacute; &bdquo;na &scaron;iroko&ldquo; zviazan&eacute; ka&scaron;mer&iacute;nov&eacute; ručn&iacute;ky a ka&scaron;mer&iacute;nky. Chlapci mali okolo struku vy&scaron;&iacute;van&eacute; ketene taktiež s kyckami. Dodatočn&uacute; autentickosť dali aj kyj&aacute;ky v ruk&aacute;ch mlad&yacute;ch a vesel&yacute;ch tanečn&iacute;kov. Tanečn&aacute; skupina obohatila v&yacute;stup spev&aacute;čky Anny Ber&eacute;diovej, finalistky &scaron;ou&nbsp;<em>Zem spieva</em>&nbsp;, tancuj&uacute;c nov&uacute; &scaron;tylizovan&uacute; choreografiu. Aj spev&aacute;cka skupina sa taktiež z&uacute;častnila piesňami&nbsp;<em>V na&scaron;om dvore, Darmo vy mňa, mamko a Hre&scaron;te ma, bite ma</em>&nbsp;za sprievodu Orchestr&iacute;ka z&aacute;kladnej &scaron;koly a komorn&eacute;ho zboru Zvony. Spev&aacute;cku skupinu nacvičila Anna Ber&eacute;diov&aacute; a tanečn&uacute; skupinu predsedn&iacute;čka spolku Malv&iacute;na Zolňanov&aacute;. Nakoniec si v&scaron;etci &uacute;častn&iacute;ci zaspievali pieseň&nbsp;<em>Nad Selenčou</em>.</p>\r\n\r\n<p>V nedeľu 8. 7. na &scaron;kolskom dvore bol usporiadan&yacute; jarmok, na ktorom bola možnosť si obzrieť a k&uacute;piť r&ocirc;zne suven&iacute;ry, n&aacute;hrdeln&iacute;ky, typick&eacute; v&yacute;robky s mot&iacute;vmi Selenče. Po jarmoku nasledoval detsk&yacute; program, ktor&yacute; pripravili nielen selenčsk&eacute;, ale aj deti a hostia zo Slovenska, ktor&iacute; boli hosťami počas t&yacute;chto osl&aacute;v a svojou pr&iacute;tomnosťou obohatili na&scaron;e jubileum. Na programe sa z&uacute;častnil aj KUS J&aacute;na Koll&aacute;ra choreografiou&nbsp;<em>V na&scaron;om dvore</em>. Z programu v&scaron;etci pr&iacute;tomn&iacute; i&scaron;li na sl&aacute;vnostn&yacute; defil&eacute;. Počas defil&eacute; si tanečn&aacute; skupina zatancovala jednu časť choreografie. Cestou sa spievalo, hralo, tancovalo...</p>\r\n\r\n<p>Z&aacute;ver osl&aacute;v bol na &scaron;kolskom dvore, kde sa konala tanečn&aacute; z&aacute;bava pri hudbe selenčsk&yacute;ch hudobn&yacute;ch skup&iacute;n: ZOZ, Kardio band, Leopold band, Euro band, skupina Maks. Na tejto z&aacute;bave si zatancovali nielen mlad&iacute;, ale ľudia v&scaron;etk&yacute;ch vekov&yacute;ch kateg&oacute;ri&iacute;, čo pote&scaron;ilo organiz&aacute;torov.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/selenca-260-2.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n',
        'Oslavy, 260, Selenča', 'published', '1', 0),
       (4, 'Naše leto v Bulharsku', '1', '2018-12-17', 'bulharsko1.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bulharsko1.jpg\" style=\"height:736px; width:960px\" /></p>\r\n\r\n<p>Tohto roku sme sa z&uacute;častnili na medzin&aacute;rodnom festivale Balkan folk fest vo Varne (Bulharsko). Okrem členov KUS J&aacute;na Koll&aacute;ra, z&aacute;jazdu sa z&uacute;častnili aj členovia SKC P. J. &Scaron;af&aacute;rika a in&iacute;. Tak sme v&scaron;etci spolu tr&aacute;vili chv&iacute;le od 13. augusta až po 21. august. V pondelok poobede sme vy&scaron;tartovali na dlho očak&aacute;van&uacute; dovolenku, ktor&aacute; okrem dobrodružstiev pri mori vyžadovala aj určit&eacute; povinnosti. Obidva spolky vyst&uacute;pili na už spom&iacute;nanom folkl&oacute;rnom festivale. Ako prv&yacute; vyst&uacute;pili &Scaron;af&aacute;rikovci s choreografiou&nbsp;<em>Keď som sa ja z n&aacute;&scaron;ho kraja...</em>&nbsp;a dva dni nesk&ocirc;r vyst&uacute;pili Selenčania s choreografiou&nbsp;<em>V Selenči na tanci</em>. Počas voľn&eacute;ho času sme si už&iacute;vali slnečn&eacute; dni na pl&aacute;ži a organizovali sme si aj spoločn&eacute; z&aacute;bavy vo večern&yacute;ch hodin&aacute;ch sprev&aacute;dzan&eacute; spevom a zvukmi gitary a husl&iacute;.</p>\r\n\r\n<p>Domov sme sa vr&aacute;tili 21. augusta okolo obeda. Každ&eacute;mu z n&aacute;s zostali vrezan&eacute; kr&aacute;sne spomienky na dovolenku v Bulharsku.</p>\r\n\r\n<p>Foto: Peter Vala&scaron;ek</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bulharsko2.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n',
        'Bulharsko, zájazd, 2018', 'published', '1', 0),
       (5, 'Dni európskeho dedičstva', '1', '2018-12-17', 'bastine2018-1.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bastine2018-1.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n\r\n<p>V r&aacute;mci manifest&aacute;cie &bdquo;Dani evropske ba&scaron;tine&ldquo; (Dni eur&oacute;pskeho dedičstva) na&scaron;i tanečn&iacute;ci vyst&uacute;pili s choreografiou&nbsp;<em>Kyj&aacute;čkov&yacute; tanec</em>. Tanečn&iacute;ci pod umeleck&yacute;m veden&iacute;m Marijana Trusinu sa obecenstvu predstavili v poobedňaj&scaron;&iacute;ch hodin&aacute;ch na pevnosti v B&aacute;či.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p>&nbsp;</p>\r\n',
        'Dani evropske baštine, Bač, Dani Bača', 'published', '1', 0),
       (6, 'Cez Nadlak je... 2018', '1', '2018-12-17', 'nadlak2018-1.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/nadlak2018-1.jpg\" style=\"height:617px; width:960px\" /></p>\r\n\r\n<p>Festival Cez Nadlak je&hellip; tohto roku osl&aacute;vil 20. narodeniny a tohto jubilea sa z&uacute;častnilo 35 spev&aacute;kov, ktor&iacute; spievali jeden večer pomal&uacute; a druh&yacute; večer r&yacute;chlu pesničku. V tret&iacute; večer, čiže v nedeľu, bola revu&aacute;lna časť, v ktorej spievali odmenen&iacute; spev&aacute;ci. Je to pozoruhodn&yacute; počet mlad&yacute;ch ľud&iacute;, ktor&iacute; zachov&aacute;vaj&uacute; slovensk&eacute; ľudov&eacute; pesničky. Tento festival finančne podporuje Demokratick&yacute; zv&auml;z Slov&aacute;kov a Čechov v Rumunsku, &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute;, Župn&yacute; kult&uacute;rny center mesta Arad, Mestsk&eacute; zastupiteľstvo radnice mesta Nadlak ako i ďal&scaron;&iacute; sponzori. Festival Cez Nadlak je&hellip; spev&aacute;ci zo Srbska nav&scaron;tevuj&uacute; už dlh&yacute; rad rokov a každoročne z&iacute;skavaj&uacute; pozoruhodn&eacute; ocenenia. Tohto roku si Slov&aacute;ci z Vojvodiny odniesli až 11 cien, buď &scaron;peci&aacute;lnych, alebo cien odbornej poroty, ktor&aacute; pracovala v zložen&iacute;: J&aacute;n &Scaron;utinsk&yacute; (predseda poroty), M&aacute;ria Peniakov&aacute;, Krist&iacute;na Žukanov&aacute;, Anna Medveďov&aacute; a Dr. Juraj S&uacute;di. Odborn&aacute; porota odmenila v detskej kateg&oacute;rii: 3. cenou Mareka &Scaron;kablu zo Selenče, 2. cenu z&iacute;skala Petrovčanka Simona S&yacute;korov&aacute;, k&yacute;m 1. si vyspievala Krist&iacute;na Benciov&aacute; z Nadlaku. V kateg&oacute;rii od 13 do 18 rokov tretia cena patr&iacute; Martine Ag&aacute;rskej z Boľoviec, druh&aacute; Nadlačanky Andrei F&aacute;briovej a najlep&scaron;&iacute; v tejto kateg&oacute;rii bol Zlatko Klinovsk&yacute;, ktor&yacute; reprezentoval Nov&yacute; Sad. V kateg&oacute;rii nad 18 rokov najlep&scaron;ie boli spev&aacute;čky z Vojvodiny. Tretia cena patr&iacute; Petrovčanky Alexandre Brtkovej, druhou cenou sa ovenčila Katar&iacute;na Kalm&aacute;rov&aacute; z Vojlovice a prv&aacute; cena sa dostala do Selenče. Vyspievala si ju Anna Ber&eacute;diov&aacute;. V&yacute;hercovia prv&yacute;ch cien z&iacute;skali i odmenu N&aacute;rodnej rady Slovenskej republiky.</p>\r\n\r\n<p>V&scaron;etk&yacute;ch spev&aacute;kov na tomto festivale sprev&aacute;dzal orchester pod veden&iacute;m Ondreja Maglovsk&eacute;ho. Moder&aacute;tormi boli Bianka Ucov&aacute; a Juraj Cig&aacute;ň. V nedeľu, keď vyspievali odmenen&iacute; spev&aacute;ci 20. ročn&iacute;ka festivalu Cez Nadlak je..., pokračovala revu&aacute;lna časť, v ktorej sa predstavili naj&uacute;spe&scaron;nej&scaron;&iacute; spev&aacute;ci za posledn&yacute;ch desať rokov. Medzi nich patria: Ivan Sl&aacute;vik, Andrea Lačokov&aacute;, Anita Ryb&aacute;rov&aacute;, Zuzana Barto&scaron;ov&aacute;, Ren&aacute;ta Ryb&aacute;rov&aacute; (obecenstvu zn&aacute;ma pod dievčensk&yacute;m priezviskom Lov&aacute;sov&aacute;), potom Adriana Fur&iacute;kov&aacute;, M&aacute;ria Bonc&aacute; - Krajč&iacute;kov&aacute; a Tatiana Ja&scaron;kov&aacute;. Potom tanečn&iacute;ci V&scaron;etečn&iacute;ci pobavili publikum v nadlackom Dome kult&uacute;ry a tak sa ukončil 20. ročn&iacute;k festivalu Cez Nadlak je&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/nadlak2018-2.jpg\" style=\"height:720px; width:960px\" /></p>\r\n',
        'Nadlak, Selenča, spev, úspech', 'published', '1', 0),
       (7, 'Matičný večierok v Selenči', '1', '2018-12-17', '44185878_10156746588486670_384303318479929344_o.jpg',
        '<p>V nedeľu 14. okt&oacute;bra v Dome kult&uacute;ry v Selenči prebiehal matičn&yacute; večierok.</p>\r\n\r\n<p>Po pr&iacute;hovore PaedDr. Svetlany Zolňanovej, predsedn&iacute;čke selenčsk&eacute;ho MOMS, podujatie prebiehalo v matičnom duchu povzbudzovania na&scaron;ej slovenskej identity. Slovenskou rečou pr&iacute;tomn&yacute;ch oslovili aj KZ Zvony, spevokol evanjelickej a. v. cirkvy Ozvena, ako i Orchestr&iacute;k pod veden&iacute;m Dr. Juraja S&uacute;diho. Bolo počuť recit&aacute;cie, zatancovali aj členovia KUS J&aacute;na Koll&aacute;ra a spievali početn&iacute; spev&aacute;ci zo Selenče a medzi nimi aj vojlovičanka Katar&iacute;na Kalm&aacute;rov&aacute; a Boris Bab&iacute;k zo Starej Pazovy. Z&aacute;verom, v mene NRSNM, pam&auml;tn&uacute; tabuľu udelil predseda V&yacute;boru pre &uacute;radn&eacute; použ&iacute;vanie jazyka a p&iacute;sma Branislav Kul&iacute;k a prihovorila sa Libu&scaron;ka Lakato&scaron;ov&aacute;, republikov&aacute; poslankyňa.</p>\r\n\r\n<p>Večierok sa zakončil tak, že v&scaron;etci pr&iacute;tomn&iacute; spolu s &uacute;častn&iacute;kmi programu zaspievali matičn&uacute; hymnu <em>Po n&aacute;brež&iacute;</em>.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/44185878_10156746588486670_384303318479929344_o.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n',
        'MOMS, Matica slovenská v Srbsku', 'published', '1', 0),
       (8, 'Festival V pivnickom poli', '1', '2018-12-17', '46710490_2169474139986575_4834801988837310464_n.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/46866247_2169474479986541_5720486097096540160_n.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Predstavitelia kult&uacute;rno umeleck&eacute;ho spolku J&aacute;na Koll&aacute;ra v Selenči Anna Ber&eacute;diov&aacute; a Zlatko Klinovsk&yacute; sa z&uacute;častnili&nbsp;53. festivalu V pivnickom poli.</p>\r\n\r\n<p>Festival prebiehal&nbsp;od 23. novembra a skončil sa z&aacute;verečn&yacute;m večierkom v nedeľu 25. novembra, kde si na&scaron;i spolk&aacute;ri zase zaspievali, tentokr&aacute;t ako odmenen&iacute;. Zlatkovi sa do r&uacute;k dostala 3. cena odbornej poroty za prednes a Anne porota udelila &scaron;peci&aacute;lnu odmenu za pr&iacute;nos tomuto festivalu a &uacute;spe&scaron;n&uacute; propag&aacute;ciu slovenskej ľudovej piesne ako v Srbsku, tak aj v zahranič&iacute;. Mus&iacute;me pripomen&uacute;ť, že v odbornej porote, ktor&uacute; tvorili M&aacute;ria Zdravkovićov&aacute;, Jarmila Juricov&aacute;-Stupavsk&aacute; a Miroslav Hemela bol aj etnol&oacute;g, Selenčan Patrik Rago, ktor&yacute; obom spev&aacute;kom pomohol pri v&yacute;bere kroju a rozhodol sa odmenu pre najautentickej&scaron;&iacute; ľudov&yacute; odev udeliť Anne Ber&eacute;diovej.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/46710490_2169474139986575_4834801988837310464_n.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Text: Anna Ber&eacute;diov&aacute;</p>\r\n\r\n<p>Foto: Nata&scaron;a Klinovsk&aacute;</p>\r\n',
        'Pivnica, V pivnickom poli', 'published', '1', 0),
       (11, '\"Z teho konca na tem koniec\" na FFTT 2019', '1', '2019-06-21',
        '64787600_853256088377302_4779944068077584384_o.jpg',
        '<p>V&nbsp;sobotu 15. j&uacute;na odznel <em>49. Folkl&oacute;rny festival Tancuj, Tancuj...</em> v&nbsp;Hložanoch. Na&scaron;i tanečn&iacute;ci sa z&uacute;častnili choreografiou <em>Z&nbsp;teho konca na tem koniec</em> v&nbsp;r&aacute;mci druh&eacute;ho koncertu. Takto predstavili tohtoročn&uacute; činnosť.</p>\r\n\r\n<p>Na javisku tancovali viacer&iacute; debutanti n&aacute;&scaron;ho spolku. Zostava bola kombinovan&aacute; z&nbsp;nov&yacute;ch tanečn&iacute;kov a&nbsp;služobne star&scaron;&iacute;ch. Zostavy v&nbsp;podobnej podobe bud&uacute; vystupovať počas celej sez&oacute;ny.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64962348_853256101710634_5741469408929251328_o.jpg\" style=\"height:900px; width:1600px\" /></p>\r\n\r\n<p>Dievčensk&aacute; spev&aacute;cka skupina sa predstavila v&nbsp;r&aacute;mci s&uacute;ťažnej časti spev&aacute;ckych skup&iacute;n zmesou ľudov&yacute;ch piesn&iacute;<em> Kade ja chodievam, tam aj stromy plač&uacute;</em>. Boli verejne pochv&aacute;len&eacute; pre tento prednes. Pr&iacute;pravu mala na starosti ved&uacute;ca spev&aacute;ckej skupiny Anna Ber&eacute;diov&aacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64573933_853256471710597_2668710429387128832_o.jpg\" style=\"height:900px; width:1600px\" /></p>\r\n\r\n<p>Za autorov&nbsp;choreografie sa podpisuj&uacute; členovia KUS J&aacute;na Koll&aacute;ra, tanečn&iacute;kov nacvičil Marijan Trusina a&nbsp;zahral im orchester pod veden&iacute;m J&aacute;na &Scaron;imoniho.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/62605958_853256261710618_6655035929478037504_o.jpg\" style=\"height:1095px; width:1600px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64920658_853256201710624_4836188344150917120_n.jpg\" style=\"height:960px; width:656px\" /></p>\r\n\r\n<p>FOTO: Foto Video Benka</p>\r\n',
        'FFTT', 'published', '1', 0),
       (10, 'Posledná akcia v roku 2018: Vianočná dielňa pre deti', '1', '2018-12-24',
        '48419304_747398532296392_5547724890200604672_o.jpg',
        '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/48419304_747398532296392_5547724890200604672_o.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p>Vianočn&eacute; obdobie n&aacute;m pripom&iacute;na pokoj, l&aacute;sku a radosť z&nbsp;mal&yacute;ch a nehmotn&yacute;ch vec&iacute;, na ktor&eacute; počas cel&eacute;ho roka zab&uacute;dame a&nbsp;nedb&aacute;me. Predsa najv&auml;č&scaron;iu radosť zo sviatkov maj&uacute; deti.</p>\r\n\r\n<p>Tak v&nbsp;Kult&uacute;rno-umeleckom spolku sme sa rozhodli prispieť k detskej radosti a&nbsp;zorganizovať vianočn&uacute; dielňu pre deti. Dielňa bola usporiadan&aacute; 21. decembra, kedy na&scaron;e priestory odzv&aacute;ňali detsk&yacute;m krikom.</p>\r\n\r\n<p>Hlavnou t&eacute;mou dielne bola tvorba vianočn&yacute;ch pohľadn&iacute;c. Deti si, podľa n&aacute;vodov dievčat zo spolku, zhotovili n&aacute;dhern&eacute; pohľadnice s&nbsp;vlastnou &uacute;pravou. Tiež namaľovali vianočn&yacute; stromček podľa svojich predst&aacute;v. Ved&uacute;cou dielne bola Andrea &Scaron;o&scaron;kićov&aacute;.</p>\r\n\r\n<p>Pri odchode, za skvel&uacute; pr&aacute;cu a&nbsp;vynaložen&eacute; &uacute;silie, každ&eacute; dieťa dostalo priliehav&yacute; vianočn&yacute; darček. Darčeky poskytli MOMS Selenča, Krist&iacute;na Kaňov&aacute;, Ren&aacute;ta S&uacute;diov&aacute;, Kvetoslava &Scaron;vecov&aacute;-Kočondov&aacute;, Patrik Rago, Darina T&yacute;rov&aacute; a&nbsp;Peter Vala&scaron;ek.</p>\r\n\r\n<p>Dielňu hodnot&iacute;me ako &uacute;spe&scaron;n&uacute; a určite bud&uacute; organizovan&eacute; aj ďal&scaron;ie dielne v bud&uacute;cnosti.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/48428918_747398618963050_5892715793199661056_o.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n',
        'vianoce, kus jana kollara, deti', 'published', '1', 0),
       (12, 'Vystúpili sme v Oraviciach na Slovensku', '1', '2019-08-07', '_DSC9127-385.JPG',
        '<p>Od 26. do 29. j&uacute;la kult&uacute;rno umeleck&yacute; spolok J&aacute;na Koll&aacute;ra zo Selenče pobudol v Oraviciach na Slovensku. Selenčsk&yacute; spolok sa z&uacute;častnil na festivale <em>Pod Osobitou</em>, kde sa v sobotu predstavili hodinov&yacute;m programom. V nedeľu vystupovali najprv v Oraviciach a potom &nbsp;svoju činnosť predstavili aj na festivale <em>Witowianska vatra</em> v Poľsku. Predstavili sa tancami <em>Oči, oči</em>, <em>Z teho konca na ten koniec</em>, <em>Kyj&aacute;čkov&yacute; tanec</em> a <em>V Selenči na tanci</em>. Tancom spestrili aj s&oacute;lo spev Anny Ber&eacute;diovej. Okrem Ane, zaspievali si aj &nbsp;Magdalena Kaňov&aacute;, Andrej Pavlov, Davorin Ga&scaron;parovsk&yacute; a Zlatko Klinovsk&yacute;, ktor&yacute; sa predstavil zmesou piesn&iacute;.&nbsp; Spev&aacute;cka skupina obecenstvu v Oraviciach a vo Witove v&nbsp;Poľsku, predviedla v&yacute;ber&nbsp; slovensk&yacute;ch&nbsp; ľudov&yacute;ch piesn&iacute; pod n&aacute;zvom <em>Veje vetor hore dolinami</em>, <em>S kade ja chodievam tam aj stormy plač&uacute;</em>, <em>Pod obl&ocirc;čkom zahrad&ocirc;čka tŕnim pleten&aacute;</em>, ktor&eacute; nacvičila Anna Ber&eacute;diov&aacute;.&nbsp; Tieto body sprev&aacute;dzal orchester, ktor&yacute; mal na starosti Juraj S&uacute;di ml. ako i prednes niektor&yacute;ch spev&aacute;kov. Tanečn&iacute;kov nacvičoval Marian Trusina. Jaroslav Ber&eacute;di mal na starosti r&eacute;žiu programu a pom&aacute;hal aj pri n&aacute;cvikoch. Organiz&aacute;ciu z&aacute;jazdu mala na starosti predsedn&iacute;čka KUS J&aacute;na Koll&aacute;ra Malv&iacute;na Zolňanov&aacute; a tajomn&iacute;čka Andrea &Scaron;o&scaron;kićov&aacute;. Selenčsk&yacute; spolk&aacute;ri predstavili iba časť slovenskej vojvodinskej kult&uacute;ry na p&oacute;diu v zahranič&iacute; a pl&aacute;nuj&uacute; sa tak&yacute;mto programom predstaviť aj obecenstvu v Selenči. Najprv sa z&uacute;častnia na <em>Slovensk&yacute;ch n&aacute;rodn&yacute;ch sl&aacute;vnostiach</em> v sobotu 10. augusta a&nbsp;pobudn&uacute; aj v&nbsp;Čiernej hore, kde sa z&uacute;častnia folkl&oacute;rneho festivalu v&nbsp;Herceg Novom.</p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/67454553_882376848798559_2446377397155528704_o.jpg\" style=\"height:721px; width:1080px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/_DSC9043-336.JPG\" style=\"height:708px; width:1061px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/_DSC9006-315.JPG\" style=\"height:708px; width:1061px\" /></p>\r\n\r\n<p>Malv&iacute;na Zolňanov&aacute;</p>\r\n\r\n<p>Foto: fb/@folklorneslavnostioravice</p>\r\n',
        'Oravice, Slovensko', 'published', '1', 0),
       (13, 'Novoročný program TV Petrovec', '1', '2019-12-06', 'obr1.jpg',
        '<p>V priebehu novembra a&nbsp;decembra členovia kult&uacute;rno-umeleck&eacute;ho spolku s&uacute; viac než akt&iacute;vni. Najm&auml; vďaka TV Petrovec nat&aacute;čaj&uacute; novoročn&yacute; program na t&eacute;mu priadky v&nbsp;Selenči. Do tohto projektu je zapojen&yacute; každ&yacute; k&uacute;tik n&aacute;&scaron;ho spolku. Členovia s&uacute; maxim&aacute;lne zodpovedn&iacute;, zorganizovan&iacute; a&nbsp;pln&iacute; entuziazmu.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/obr-priadky-2.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Za nami je už veľk&aacute; časť projektu a&nbsp;už očak&aacute;vame na posledn&eacute; časti nahr&aacute;vania. Aj touto cestou sa chceme poďakovať v&scaron;etk&yacute;m, ktor&iacute; &uacute;činkuj&uacute; v&nbsp;nahr&aacute;van&iacute;, pom&aacute;haj&uacute; pri realiz&aacute;cii samotn&eacute;ho projektu, v&scaron;etk&yacute;m rodičom a&nbsp;star&yacute;m rodičom, ktor&iacute; nezi&scaron;tne pripravili svoje deti a&nbsp;vn&uacute;čatk&aacute;, prichystali kroje a&nbsp;sladk&eacute; či slan&eacute; poch&uacute;ťky pre v&scaron;etk&yacute;ch, ktor&iacute; sa z&uacute;častnili doteraj&scaron;ieho nat&aacute;čania.</p>\r\n\r\n<p>D&uacute;fame, že aj ľudia, ktor&iacute; bud&uacute; sledovať novoročn&yacute; program TV Petrovec, bud&uacute; aspoň tak spokojn&iacute;, ako sme my. Priadky budete m&ocirc;cť sledovať v&nbsp;silvestrovsk&yacute; večer na TV Petrovec. Pre t&yacute;ch, ktor&iacute; maj&uacute; už in&eacute; pl&aacute;ny, zabezpeč&iacute;me nahr&aacute;vku, ktor&uacute; budeme zdieľať na na&scaron;ej webovej a&nbsp;facebookovej str&aacute;nke.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/obr-priadky-3.jpg\" style=\"height:960px; width:720px\" /></p>\r\n',
        'TV Petrovec, kus jana kollara, priadky', 'published', '1', 0),
       (14, 'Na základe núdzového stavu v štáte', '1', '2020-03-16', 'KUS.jpg',
        '<p>Keďže n&aacute;&scaron; &scaron;t&aacute;t vyhl&aacute;sil n&uacute;dzov&yacute; stav, KUS J&aacute;na Koll&aacute;ra sa prip&aacute;ja k prosb&aacute;m ku v&scaron;etk&yacute;m ľudom, aby čo najviac zost&aacute;vali doma. V pr&iacute;pade, že star&scaron;&iacute; ľudia potrebuj&uacute; pomoc v podobe n&aacute;kupu potrav&iacute;n, či liekov, m&ocirc;žu sa ozvať na č&iacute;slo na plag&aacute;te.</p>\r\n\r\n<p>Buď odv&aacute;žny a zostaň doma!</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/KUS.jpg\" style=\"height:960px; width:960px\" /><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/kus2.jpg\" style=\"height:960px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n',
        'pomoc', 'published', '1', 0),
       (15, 'ZOSTAŇ DOMA A HRAJ!', '1', '2020-04-25', 'marienka.png',
        '<p>V čase, keď v&scaron;etci mus&iacute;me byť doma, každ&yacute; rozm&yacute;&scaron;ľa ako zabiť voľn&yacute; čas. Selenčsk&iacute; muzikanti sa rozhodli zabaviť ľud&iacute;, ktor&iacute; zostan&uacute; doma a sleduj&uacute; ich na soci&aacute;lnej sieti Facebook. Takto podporili aj v&yacute;zvu #zostandomaahraj.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n<div id=\"fb-root\"></div>\r\n<script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v6.0&appId=239215892613&autoLogAppEvents=1\"></script>\r\n<div class=\"fb-post\" data-href=\"https://www.facebook.com/zlatko.klinovski/posts/2790749207714612\" data-show-text=\"true\" data-width=\"\"><blockquote cite=\"https://developers.facebook.com/zlatko.klinovski/posts/2790749207714612\" class=\"fb-xfbml-parse-ignore\"><p>ĽH SELENČA\r\nKALAPOŠI\r\nKOHÚTIK JARABÝ \r\nEmilija Kovačev Jaroslav Jaro Berédi Marian Castvan Robert Čapanda Juraj Súdi Juraj...</p>Uverejnil používateľ <a href=\"https://www.facebook.com/zlatko.klinovski\">Zlatko Klinovsky</a>&nbsp;<a href=\"https://developers.facebook.com/zlatko.klinovski/posts/2790749207714612\">Streda 8. apríla 2020</a></blockquote></div>',
        'zostandoma, koronavirus', 'published', '1', 0),
       (25, 'Priadky - už aj na DVD', '1', '2020-12-15', '1608056051.jpg',
        '<p>V neskor&uacute; jeseň roku 2019 sme nakr&uacute;tili novoročn&yacute; program s n&aacute;zvom&nbsp;<em>Priadky v Selenči</em>.&nbsp; Nahrali sme trad&iacute;ciu, ktor&aacute; už pomaly zanik&aacute; s cieľom, aby sme k&uacute;sok minulosti nosili so sebou nielen v pr&iacute;tomnosti, ale aj v bud&uacute;cnosti a aby t&aacute;to trad&iacute;cia unikla zabudnutiu. Časť&nbsp;novoročn&eacute;ho programu sme doplnili rozhovormi a z&aacute;žitkami star&scaron;&iacute;ch Selenčaniek a vznikol dokument <em>Priadky</em>, ktor&yacute; si m&ocirc;žete pozrieť na na&scaron;ej str&aacute;nke a m&ocirc;žete si ho zadov&aacute;žiť aj na DVD. Ak m&aacute;te z&aacute;ujem o toto DVD, nap&iacute;&scaron;te n&aacute;m spr&aacute;vu prostredn&iacute;ctvom soci&aacute;lnych siet&iacute; Facebook a Instagram, alebo n&aacute;m nap&iacute;&scaron;te e-mail.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/130238375_1310636225972617_7544965729426363171_n.jpg\" style=\"height:960px; width:960px\" /></p>\r\n\r\n<p>Dokument vyrobila TV Petrovec v roku 2020.</p>\r\n\r\n<p>Projekt finančne podporil &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute; a ďal&scaron;&iacute; sponzori.</p>\r\n\r\n<p>R&eacute;žia a scen&aacute;r: Malv&iacute;na Zolňanov&aacute;,</p>\r\n\r\n<p>Kost&yacute;mer a sc&eacute;nograf: &nbsp;Patrik Rago,</p>\r\n\r\n<p>Nahrat&eacute; v rodinn&yacute;ch domoch rod&iacute;n Pavlovovej, Kaňovej a Trusinovej,</p>\r\n\r\n<p>Design obalu: &nbsp;Jaroslav Ber&eacute;di</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/omotvnutro.jpg\" style=\"height:1417px; width:1417px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/omotZadna%20strana.jpg\" style=\"height:1417px; width:1630px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n',
        'priadky, dvd', 'published', '1', 0),
       (19, 'Výstava archívnych fotografií o činnosti divadelnej sekcie', '1', '2020-11-25',
        '124027111_1285774525125454_8703382948415517159_o.jpg',
        '<p>Dňa 25. okt&oacute;bra 2020 v&nbsp;priestoroch Domu kult&uacute;ry v&nbsp;Selenči bola uskutočnen&aacute; v&yacute;stava arch&iacute;vnych fotografi&iacute; o&nbsp;činnosti divadelnej sekcie kult&uacute;rno-umeleck&eacute;ho spolku J&aacute;na Koll&aacute;ra. T&yacute;mto podujat&iacute;m sme si pripomenuli 125 rokov od zahran&eacute;ho prv&eacute;ho divadeln&eacute;ho predstavenia v&nbsp;Selenči. Po v&yacute;stave, so začiatkom o&nbsp;20.00h, divadeln&yacute; s&uacute;bor Slovensk&eacute;ho vojvodinsk&eacute;ho divadla z&nbsp;B&aacute;čskeho Petrovca zahral divadeln&eacute; predstavenie Profesion&aacute;l v&nbsp;r&eacute;žii Richarda Sanitru a&nbsp;J&aacute;na Chalupku.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/123766344_1285774535125453_5468575231491170339_o.jpg\" style=\"height:912px; width:1208px\" /></p>\r\n\r\n<p>V&yacute;stava bola zrealizovan&aacute; z projektu a&nbsp;na starosti ju mali Iveta Pecn&iacute;kov&aacute;, Dana Pavl&iacute;niov&aacute;, Jasmina Junčoviarov&aacute;, J&aacute;n Junčoviar, Zdenko Nos&aacute;l a&nbsp;Tereza Žjakov&aacute;. Technick&eacute; veci mal na starosti &Scaron;tefan Rožnaji. Okrem fotografi&iacute; zo spolku, na v&yacute;stave sa nach&aacute;dzaj&uacute; aj fotografie zo s&uacute;kromn&eacute;ho arch&iacute;vu J&aacute;na Jochu, Katar&iacute;ny Moln&aacute;rovej, Zuzany Javorn&iacute;kovej, Pavla Pavl&iacute;niho, Anny Fodorovej, J&aacute;na Junčoviara a&nbsp;Juraja Ber&eacute;diho &ndash; Ďukyho.</p>\r\n\r\n<p>V&nbsp;s&uacute;časnosti divadeln&aacute; sekcia pri kult&uacute;rno-umeleckom spolku sa stret&aacute;va pr&iacute;ležitostne. Zoskupujeme sa v&nbsp;spolku keď sa pripr&aacute;vame na vesel&eacute; vyst&uacute;penia, pri ktor&yacute;ch sa v&scaron;etci pr&iacute;jemne bav&iacute;me. V&nbsp;rokoch 2018 a&nbsp;2019 sme nat&aacute;čali časť novoročn&eacute;ho programu TV Petrovec a&nbsp;snaž&iacute;me sa aj naďalej na r&ocirc;zne sp&ocirc;soby udržať divadeln&uacute; činnosť v&nbsp;Selenči. Preto sme aj na tak&yacute;to sp&ocirc;sob, na&scaron;ou v&yacute;stavou, spr&iacute;tomnili kus divadla v&nbsp;podobe fotografi&iacute;.</p>\r\n\r\n<p>Vystavu finančne podporili &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zajranič&iacute;, AP Vojvodina a Obec B&aacute;č.&nbsp;</p>\r\n\r\n<p>Tereza Žjakov&aacute;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/124027111_1285774525125454_8703382948415517159_o.jpg\" style=\"height:904px; width:1203px\" /><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/123823459_1285774515125455_2363674793152994836_o.jpg\" style=\"height:900px; width:1200px\" /></p>\r\n',
        'divadlo', 'published', '1', 0),
       (26, 'Prajeme Vám krásne sviatky!', '1', '2020-12-21', '1608541927.jpg',
        '<p>O&nbsp;čom s&uacute; Vianoce? Zamyslime sa!<br />\r\nO drah&yacute;ch darčekoch? Nie, m&yacute;lite sa.<br />\r\nKažd&yacute; každ&eacute;mu praje &scaron;ťastn&eacute;,<br />\r\nale čo to znamen&aacute;? To chcem mať jasn&eacute;!</p>\r\n\r\n<p>Po dlhom roku plnom nap&auml;tia a&nbsp;stresu,<br />\r\nje čas sa op&yacute;tať: pokoj a&nbsp;radosť, kde s&uacute;?<br />\r\nZabudnite na to, čo V&aacute;s zajtra čak&aacute;,<br />\r\nčo Va&scaron;e rozumy tak silne l&aacute;ka.<br />\r\nVenuj sa bl&iacute;zkym, čo m&aacute;&scaron; kolo seba,<br />\r\nnem&iacute;ňaj energiu zbytočne, veď nie je treba.</p>\r\n\r\n<p>Rozd&aacute;vajte l&aacute;sku, lebo je jej m&aacute;lo,<br />\r\nveď koľko ľud&iacute; by bohatstvo za ňu dalo.<br />\r\nSadnite spolu, vypnite svetl&aacute;,<br />\r\nnech len vianočn&eacute; lampy na stromčeku svietia.</p>\r\n\r\n<p>Každ&eacute;mu človeku chceme popriať,<br />\r\nnech m&aacute; tak&eacute; Vianoce, ako ich v&auml;č&scaron;ina bude mať.<br />\r\nNech nikomu nech&yacute;ba&nbsp;vn&uacute;torn&yacute; pokoj,<br />\r\nhlavne zdravie nech sl&uacute;ži aj v&nbsp;roku novom.</p>\r\n\r\n<p>Kr&aacute;sne prežitie vianočn&yacute;ch a&nbsp;novoročn&yacute;ch sviatkov v&nbsp;kruhu svojich bl&iacute;zkych V&aacute;m prajeme z&nbsp;kult&uacute;rno-umeleck&eacute;ho spolku J&aacute;na Koll&aacute;ra zo Selenče.&nbsp;</p>\r\n\r\n<p>Video na&nbsp;<a href=\"https://www.facebook.com/kusjanakollara/videos/142948150730500\">facebookovej str&aacute;nke</a>&nbsp;- <a href=\"https://www.facebook.com/kusjanakollara/videos/142948150730500\">https://www.facebook.com/kusjanakollara/videos/142948150730500</a></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/132008874_2842029432699374_6533735766841765057_n.jpg\" style=\"height:2048px; width:3073px\" /></p>\r\n',
        'vianoce, sviatky', 'published', '1', 0),
       (27, 'Nová publikácia nášho spolku', '1', '2021-01-14', '1610642803.jpg',
        '<p>Ku koncu roka 2020 sme boli veľmi akt&iacute;vni. Svedčia o tom aj &uacute;spe&scaron;ne dotiahnut&eacute; projekty, ktor&eacute; sme si napl&aacute;novali na tento rok.&nbsp;</p>\r\n\r\n<p>Po vydan&iacute; dokumentu <em>Priadky</em> sa n&aacute;m podarilo vydať publik&aacute;ciu pod n&aacute;zvom <em>Činnosť sprev&aacute;dzan&aacute; hudbou</em>. Ako autor sa podpisuje Kult&uacute;rno-umeleck&yacute; spolok J&aacute;na Koll&aacute;ra zo Selenče. Pracovala na tom skupina ľud&iacute;, ktor&iacute; mali niečo spoločn&eacute; s obsahom samotnej publik&aacute;cie.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/BBBBBBBBBB.jpg\" style=\"height:2000px; width:3000px\" /></p>\r\n\r\n<p>V tejto knihe je zobrazen&aacute; činnosť spolku od roku 2015 až do konca 2020 v podobe notov&yacute;ch z&aacute;pisov. Zhrunuli sme v&scaron;etky body, s ktor&yacute;mi sme sa predstavili na r&ocirc;znych podujatiach. Obsah je rozdelen&yacute; do kapitol. Každ&aacute; sekcia kult&uacute;rno-umeleck&eacute;ho spolku m&aacute; svoju kapitolu a samozrejme obsahom t&yacute;chto kapit&oacute;l s&uacute; notov&eacute; z&aacute;pisy, ktor&eacute; boli použit&eacute; pri predstavovan&iacute; sa tej konkr&eacute;tnej sekcie v spomenutom časovom peri&oacute;de.&nbsp;</p>\r\n\r\n<p>Okrem toho, na začiatku je pr&iacute;hovor aktu&aacute;lnej predsedn&iacute;čky Malv&iacute;ny Zolňanovej, ako aj p&aacute;r slov o spolku na &uacute;vod.</p>\r\n\r\n<p>Publik&aacute;cia bola vydan&aacute; za finančnej podpory Obce B&aacute;č. Tak isto n&aacute;s podporili aj Pokrajinsk&yacute; sekretari&aacute;t pre kult&uacute;rua &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute;.</p>\r\n\r\n<p>Na pr&iacute;prave sa podielali:</p>\r\n\r\n<ul>\r\n	<li>Notov&yacute; materi&aacute;l: <strong>Juraj S&uacute;di ml.</strong></li>\r\n	<li>Texty: <strong>Malv&iacute;na Zolňanov&aacute;</strong></li>\r\n	<li>Grafick&aacute; &uacute;prava: <strong>Jaroslav Ber&eacute;di</strong></li>\r\n	<li>Ilustr&aacute;cie: <strong>Juraj Ber&eacute;di</strong></li>\r\n</ul>\r\n\r\n<p>Ak m&aacute; niekto z&aacute;ujem o knihu m&ocirc;že n&aacute;m nap&iacute;sať e-mail <strong>(jaroslav.beredi@kusjanakollara.org)</strong>&nbsp;alebo na Facebookovej str&aacute;nke <strong>Kus J&aacute;na Koll&aacute;ra</strong> a nejako V&aacute;m ju poskytneme. Kniha je &uacute;plne zadarmo.</p>\r\n\r\n<p>Kniha je dostupn&aacute; aj v elektronickej podobe&nbsp;na na&scaron;om webe&nbsp;(<a href=\"http://kusjanakollara.org/download\"><em>PROMO</em>&nbsp;-&gt;&nbsp;<em>Na stiahnutie</em></a>).&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/AAAAAAAAAAAAA.jpg\" style=\"height:2000px; width:3000px\" /></p>\r\n',
        'kniha, publikacia, cinnost sprevadzana hudbou', 'published', '1', 0),
       (28, 'Nahraté aj prvé video', '15', '2021-02-12', '1613132896.jpg',
        '<p>Dievčensk&aacute; spev&aacute;cka skupina vo febru&aacute;ri 2021. roku spolu s Ľudovou hudbou Selenča&nbsp;nahrali svoje prv&eacute; video k piesni M&aacute;m pred domom.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/FB_IMG_1612806880085.jpg\" style=\"height:720px; width:1080px\" /></p>\r\n\r\n<p>Počasie, ktor&eacute; im vy&scaron;lo v &uacute;strety, pracovn&aacute; atmosf&eacute;ra a samozrejme vesel&aacute; n&aacute;lada spravili z videa pekn&uacute; prezent&aacute;ciu KUS-u J&aacute;na Koll&aacute;ra, ako aj samej Selenče a taktiež odvr&aacute;tili aspoň na tri min&uacute;ty pozornosť zo v&scaron;ade naliehavej pand&eacute;mie. Nahr&aacute;vanie zvuku, videa a strih mali na starosti Jaroslav Ber&eacute;di a Juraj S&uacute;di ml.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/FB_IMG_1612638635773.jpg\" style=\"height:720px; width:1080px\" />​​​​​​</p>\r\n\r\n<p>Za prv&eacute; dva dni&nbsp;video malo vy&scaron;e 15 tis&iacute;c pozret&iacute;, čo n&aacute;s veľmi pote&scaron;ilo, lebo vid&iacute;me, že to ľud&iacute; naozaj zaujalo. Video si m&ocirc;žete pozrieť na na&scaron;ej Facebookovej str&aacute;nke a tiež aj na na&scaron;om YouTube kan&aacute;li.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',
        'Video, pesnička, Dievčenská spevácka skupina', 'published', '1', 0),
       (30, 'Pár slov k Veľkej noci', '1', '2021-04-04', '1617547790.jpg',
        '<p>Prijmite n&aacute;&scaron; pozdrav kr&aacute;tky na tieto VEĽKONOČN&Eacute; SVIATKY.</p>\r\n\r\n<p>V dobrom zdrav&iacute; ich prežite, pohody a radosti si užite.</p>\r\n\r\n<p>Dobr&uacute; &scaron;ibačku a k&uacute;pačku aj s v&yacute;služkou vo vačku</p>\r\n\r\n<p>V&aacute;m želaj&uacute; členovia KUS J&aacute;na Koll&aacute;ra zo Selenče.</p>\r\n\r\n<p>Video: <a href=\"https://www.facebook.com/kusjanakollara/posts/1397028120666760\">https://www.facebook.com/kusjanakollara/posts/1397028120666760</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Spoločná fotografia po nahrávaní\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/Untitled-1%20copy.jpg\" style=\"height:3024px; width:4032px\" /></p>\r\n',
        'veľá noc', 'published', '1', 0),
       (31, 'Čo sa stalo šej nového?', '1', '2021-04-20', '1618912072.jpg',
        '<p>V r&aacute;mci pravidelnej činnosti v jednom roku, každ&yacute; kult&uacute;rno-umeleck&yacute; spolok v čase celostvetovej pand&eacute;mie mus&iacute; prisp&ocirc;sobiť svoje aktivity. Od star&yacute;ch a dobr&yacute;ch vyst&uacute;pen&iacute; a z&aacute;jazdov sa na&scaron;a činnosť zmenila na nahr&aacute;vanie video spotov. No, a čo?</p>\r\n\r\n<p>Dievčensk&aacute; spev&aacute;cka skupina nahrala svoj druh&yacute; video spot. Tento kr&aacute;t je to vesel&aacute; a žartovn&aacute; pesnička <em>Čo sa stalo &scaron;ej nov&eacute;ho</em> a v tomto &scaron;t&yacute;le je koncipovan&eacute; aj video ku spomenutej piesni. Nahr&aacute;van&eacute; bolo v priestoroch podniku<em> Zlatno burence 186</em> zo Selenče. Iniciat&iacute;va pustiť sa do niečoho tak&eacute;hoto, nastala &uacute;plne spont&aacute;nne na sk&uacute;&scaron;kach spev&aacute;ckej skupiny. Keďže sme nacvičovali zm&auml;s piesn&iacute; (ktor&uacute; sme nahrali a tiež m&ocirc;žete očak&aacute;vať video) a boli sme z toho vyčerpan&iacute;, lebo ide o tro&scaron;ku n&aacute;ročnej&scaron;ie piesne, tak sme sa rozhodli vytvoriť si vesel&scaron;iu atmosf&eacute;ru. V&scaron;etk&yacute;m sa pracovalo veľmi dobre a vždy s &uacute;smevom na tv&aacute;ri. Hlavne sa to preuk&aacute;zalo pri nahr&aacute;van&iacute; video spotu, po čom sme nestr&aacute;cali &uacute;smev z tv&aacute;re aj nasledovn&eacute; dni.</p>\r\n\r\n<p>N&aacute;&scaron; spot oslovil tis&iacute;ce ľud&iacute;, ktor&iacute; vyjadrili spokojnosť a z&aacute;ujem o na&scaron;u tvorbu. Ver&iacute;me, že sme aj im vyčarili &uacute;smev.</p>\r\n\r\n<p>Pod scen&aacute;r sa podpisuj&uacute; členovia KUS J&aacute;na Koll&aacute;ra. Tak isto aj v&yacute;ber krojov, ktor&eacute; mali diečat&aacute; oblečen&eacute;. Tu, ako aj pri organiz&aacute;cii a realiz&aacute;cii, samozrejme patr&iacute; vďaka na&scaron;im rodin&aacute;m a kamar&aacute;tom, ktor&iacute; n&aacute;m pom&aacute;hali.&nbsp;</p>\r\n\r\n<p>Hudbu nahrali Juraj S&uacute;di ml. a Jaroslav Ber&eacute;di, ktor&iacute; aj hrali spolu s Jurajom Ber&eacute;dim - Ďukym. &Uacute;pravu pre orchester mal na starosti Juraj S&uacute;di ml.</p>\r\n\r\n<p>Koordin&aacute;torkou cel&eacute;ho projektu je predsedn&iacute;čka spolku Malv&iacute;na Zolňanov&aacute;, ktor&aacute; vybavila v&scaron;etky veci a veľmi pom&aacute;hala pri nahr&aacute;van&iacute; audia a videa.</p>\r\n\r\n<p>R&eacute;žiu, kameru a strih mal na starosti Jaroslav Ber&eacute;di.</p>\r\n\r\n<p>Sme nesmierne radi, že m&aacute;me skupinu &scaron;ikovn&yacute;ch ľud&iacute;, ktor&iacute; sami dok&aacute;žu vytvoriť niečo, ako je aj tento video spot a že tak&yacute;mto sp&ocirc;sobom zachov&aacute;vaj&uacute; piesne, kroje, tance, trad&iacute;cie a vpl&yacute;vaj&uacute; na mlad&scaron;&iacute;ch, č&iacute; čas e&scaron;te len nastane.</p>\r\n\r\n<p>Projekt finančne podporila Obec Bač. Ďalej n&aacute;m pomohli majitelia podniku Zlatno burence 186, Tectona KSC a Juraj Ber&eacute;di - Ďuky.</p>\r\n\r\n<p>Ďakujeme.</p>\r\n\r\n<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/mNQYUrTr_jo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/IMG_1355%20(1).jpg\" style=\"height:1333px; width:2000px\" /><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/IMG_1408%20(1).jpg\" style=\"height:1333px; width:2000px\" /><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/IMG_1402%20(1).jpg\" style=\"height:1333px; width:2000px\" /></p>\r\n',
        'spot', 'published', '1', 0);
INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,
                     `post_status`, `post_last_edited`, `post_position`)
VALUES (32, 'Selenčou sa znovu ozývali piesne', '1', '2021-06-14', '1623657828.jpg',
        '<p>V prvej polovici j&uacute;na bolo u n&aacute;s ru&scaron;no. Nahr&aacute;vali sme v porad&iacute; tretie hudobn&eacute; video. Tentokr&aacute;t ide o zmes piesn&iacute; pod n&aacute;zvom <em>Tečte pr&uacute;dom</em>.</p>\r\n\r\n<p>Keďže je n&aacute;ročnosť o dosť vy&scaron;&scaron;ia, ako pri nahr&aacute;van&iacute; len jednej piesni, t&aacute;to akcia trvala dlh&scaron;ie ako jeden deň. Akt&iacute;vne sme cvičili, potom nahrali zvuk a nat&aacute;čanie video klipu n&aacute;m trvalo dva v&iacute;kendy. Aj keď časovo n&aacute;ročnej&scaron;ie, ale pocitovo veľmi kr&aacute;sne a o v&yacute;sledku ani hovoriť. Vzniklo tak kr&aacute;sne video, ktor&eacute; dokonale reprezentuje nielen dievčensk&uacute; spev&aacute;cku skupinu alebo kult&uacute;rno-umeleck&yacute; spolok, ale celkovo ho m&ocirc;žeme zaradiť medzi reprezentačn&eacute; vide&aacute; na&scaron;ej osady.</p>\r\n\r\n<p>Počas cel&eacute;ho pr&iacute;behu sa leskn&uacute; selenčsk&eacute; kroje, ktor&eacute; hrdo nosia selenčsk&eacute; dievčat&aacute;. Taktiež pozadie a priestory s&uacute; typick&eacute; selenčsk&eacute;. Nahr&aacute;valo sa v strede osady, pri dedinskom dome, u rodine Ga&scaron;parovskej, Trusinovej, pred domom rodiny Nos&aacute;lovej, po ulici Čmel&iacute;kovej a na konci na kr&aacute;snom tr&aacute;vniku na konci dediny. V&scaron;etko to dokonale zobrazuje Selenču a toto video z časti venujeme aj na&scaron;ej osade, keďže už čoskoro zaznamen&aacute;me jej 263. narodeniny.</p>\r\n\r\n<p>Novinkou je, že sme zapojili aj ďal&scaron;&iacute;ch členov spolku. V hlavnej &uacute;lohy sa vysk&uacute;&scaron;al Bernard Govda, dlhoročn&yacute; akt&iacute;vny člen (hlavne v&yacute;born&yacute; tanečn&iacute;k). Ďalej sme zapojili na&scaron;ich zn&aacute;mych divadeln&iacute;kov - manželov Jasminu a J&aacute;na Junčoviarov&yacute;ch. O tom ako sa im to podarilo nemus&iacute;me hovoriť, svedč&iacute; o tom spokojnosť v&scaron;etk&yacute;ch z&uacute;častnen&yacute;ch, ako aj na&scaron;ich kamar&aacute;tov, sledovateľov a &scaron;irok&eacute; publikum.</p>\r\n\r\n<p><img alt=\"Spoločná fotka pri nahrávaní s divadelníkmi\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/200718018_184669986996016_6714184786596102167_n.jpg\" style=\"height:1536px; width:2048px\" /></p>\r\n\r\n<p>Ku každ&eacute;mu videu n&aacute;jdeme popis o tom, kto mal na starosti kost&yacute;mi hercov. Tak aj u n&aacute;s sa vždy n&aacute;jde t&aacute;to inform&aacute;cia a samozrejme vždy s&uacute; to na&scaron;e mamy, star&eacute; mamy a rodiny, ktor&eacute; vždy kr&aacute;sne pripravia kroje, obleč&uacute; n&aacute;s a držia n&aacute;m palce. D&uacute;fame, že to čo rob&iacute;me im vyvol&aacute; dobr&yacute; pocit, veď vlastne určite to tak je, lebo vždy s radosťou a nedočkavosťou čakaj&uacute; na&scaron;u ďal&scaron;iu aktivitu. Za v&scaron;etk&uacute; n&aacute;mahu, čas, podporu a pomoc im ďakujeme.</p>\r\n\r\n<p>Na&scaron;u činnosť finančne podporuj&uacute;:&nbsp;Obec B&aacute;č, &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute;, AP Vojvodina, NRSNM ako aj s&uacute;kromn&eacute; podniky a na&scaron;i Selenčania. V&scaron;etk&yacute;m patr&iacute; &uacute;primn&aacute; vďaka.</p>\r\n\r\n<p><img alt=\"Spoločná fotka zučastnených pri nahrávaní dievčat\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/201218705_3995221753847184_7732346728514931997_n.jpg\" style=\"height:1214px; width:2048px\" /></p>\r\n\r\n<p>Dievčat&aacute; nacvičili a nahrali: Jaroslav Ber&eacute;di a Juraj S&uacute;di ml.</p>\r\n\r\n<p>Pieseň zahrali: Juraj S&uacute;di ml. a Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p>Audio produkcia: Juraj S&uacute;di ml, Jaroslav Ber&eacute;di a Zlatko Klinovsky</p>\r\n\r\n<p>Video produkcia, kamera, strih a r&eacute;žia: Jaroslav Ber&eacute;di</p>\r\n\r\n<p>Pri nahr&aacute;van&iacute; videa pom&aacute;hali: Bernard Govda, Juraj S&uacute;di ml., na&scaron;e rodiny, kamar&aacute;ti a na&scaron;i spoluobčania</p>\r\n\r\n<p>Scen&aacute;r: kolekt&iacute;v</p>\r\n\r\n<p>Koordin&aacute;torka: Malv&iacute;na Zolňanov&aacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Vyparádené dievčatá\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/200426314_1456238914745680_6298581668485503360_n.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/q25hDJe7zy8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n',
        'videoklip', 'published', '1', 0),
       (33, 'Príbeh „Rozprávala  mi stará mama“ vo fotografiách', '1', '2021-06-16', '1623862779.jpg',
        '<h1>V&yacute;zva pre fotografov amat&eacute;rov</h1>\r\n\r\n<p>Kult&uacute;rno-umeleck&yacute; spolok J&aacute;na Koll&aacute;ra v&nbsp;r&aacute;mci osl&aacute;v 75 rokov od založenia spolku, vyz&yacute;va v&scaron;etk&yacute;ch fotografov a&nbsp;najm&auml; členov spolkov a&nbsp;s&uacute;borov vojvodinsk&yacute;ch Slov&aacute;kov, aby zobudili svoje umeleck&eacute; schopnosti a&nbsp;aby zastavili čas v&nbsp;tom spr&aacute;vnom okamihu.</p>\r\n\r\n<p>Selenčsk&yacute; spolok osl&aacute;vi svoje 75. narodeniny v&nbsp;roku 2022 a&nbsp;napl&aacute;novan&aacute; je aj v&yacute;stava fotografi&iacute;, ako jedna zo sprievodn&yacute;ch manifest&aacute;ci&iacute;. V&yacute;stava nebude s&uacute;ťažn&eacute;ho charakteru. Cieľom v&yacute;stavy je zoskupiť milovn&iacute;kov fotografie, vytvoriť tematick&uacute; zbierku fotografi&iacute; z&nbsp;Vojvodiny a&nbsp;umožniť fotografom, aby sa navz&aacute;jom zozn&aacute;mili a&nbsp;vymenili si sk&uacute;senosti a&nbsp;znalosti.</p>\r\n\r\n<p>T&eacute;mou v&yacute;stavy fotografi&iacute; je <strong>ROZPR&Aacute;VALA MI STAR&Aacute; MAMA</strong>.</p>\r\n\r\n<p>Cel&eacute; v&yacute;ročie spolku bude prebiehať v&nbsp;duchu tejto t&eacute;my. Ž&aacute;ner fotografii nie je určen&yacute;. T&eacute;ma je dostatočne &scaron;irok&aacute; a&nbsp;umožňuje umelcom rozm&yacute;&scaron;ľať a&nbsp;stv&aacute;rať.</p>\r\n\r\n<p>Fotografie treba zaslať do <strong>30. novembra 2021</strong>. Fotky treba zachovať v&nbsp;čo najv&auml;č&scaron;om rozl&iacute;&scaron;en&iacute;, aby bolo možn&eacute; fotky vytlačiť bez straty kvality. Jeden fotograf m&ocirc;že poslať maxim&aacute;lne 3 fotografie.</p>\r\n\r\n<p>Každ&aacute; fotografia mus&iacute; byť v&nbsp;JPEG form&aacute;te a&nbsp;okrem toho mus&iacute; obsahovať n&aacute;zov fotografie a&nbsp;kr&aacute;tky ľubovoľn&yacute; popis. T&yacute;mto popisom m&ocirc;žete v&nbsp;kr&aacute;tkosti vyrozpr&aacute;vať pr&iacute;beh, spojen&yacute; s&nbsp;fotografiou. Ďalej je potrebn&eacute; uviesť meno a&nbsp;priezvisko<br />\r\nautora/-ov, trval&eacute; bydlisko, d&aacute;tum narodenia a&nbsp;n&aacute;zov spolku alebo s&uacute;boru, ak je členom. Ak s&uacute; na fotke osoby, potrebn&eacute; je, aby s&uacute;hlasili so zverejnen&iacute;m a&nbsp;pokiaľ sa s&nbsp;t&yacute;m zhoduj&uacute;, poslať zoznam ľud&iacute;. Potrebn&eacute; &uacute;daje m&ocirc;žete poslať vo form&aacute;te .docx (MS Word), .txt (klasick&yacute; Pozn&aacute;mkov&yacute; blok &ndash; angl. Notepad), alebo n&aacute;m ich nap&iacute;sať v&nbsp;maily, z&nbsp;čoho mus&iacute; byť jasne naznačen&eacute;, ktor&eacute; &uacute;daje sa vzťahuj&uacute; na ktor&uacute; fotku.</p>\r\n\r\n<p>Svoje fotografie m&ocirc;žete zasielať na e-mailov&uacute; adresu<br />\r\n<strong>foto-vyzva@kusjanakollara.org</strong>.</p>\r\n\r\n<p>Projekt finančne podporuje N&aacute;rodnostn&aacute; rada slovenskej n&aacute;rodnostnej men&scaron;iny.</p>\r\n\r\n<p><img alt=\"Foto výzva\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/foto-vyzva%20(1).jpg\" style=\"height:3543px; width:2480px\" /></p>\r\n',
        'foto vyzva', 'published', '1', 0),
       (34, 'Vydarená detská dielňa Selenči k narodeninám', '1', '2021-07-05', '1625503945.jpg',
        '<p>V &scaron;tvrtok 1. j&uacute;la sme zorganizuvali dielňu pre najmlad&scaron;&iacute;ch. Pod veden&iacute;m vychov&aacute;vateľky Andrei &Scaron;o&scaron;kićovej, dlhoročnej akt&iacute;vnej členky viacer&yacute;ch sekci&iacute; spolku, sa zoskupilo vy&scaron;e 30 det&iacute;. Keďže počet det&iacute; presiahol očak&aacute;van&yacute; počet a v&ocirc;bec možn&yacute; počet v priestoroch spolku, vďaka futbalov&eacute;mu klubu Kriv&aacute;ň zo Selenče sme sa presťahovali na ihrisko dom&aacute;ceho klubu.</p>\r\n\r\n<p>Počasie n&aacute;m žičilo. Kr&aacute;sny slnečn&yacute; deň si deti užili naplno. Najprv usilovne vyfarbovali p&iacute;smen&aacute;, ktor&eacute; im zabezbečila rodina Kočondov&aacute; (<em>Dekoracije od stiropora Selenča</em>), z ktor&yacute;ch vznikol n&aacute;dpis &quot;Selenča&quot; a takto spolok spolu s deťmi venoval tento n&aacute;dpis svojej osade k jej 263. narodenin&aacute;m.</p>\r\n\r\n<p>Potom sa už sedieť nedalo. Tak r&yacute;chlo ako sa len dalo, vyleteli deti spolu s členmi spolku, ktor&iacute; im pom&aacute;hali pri vykon&aacute;van&iacute; napl&aacute;novan&yacute;ch aktiv&iacute;t, na tr&aacute;vnik. Tam ich už čakali lopty, kde si zahrali futbal a vyb&iacute;jan&uacute;.</p>\r\n\r\n<p>Ďalej sa zab&aacute;vali s pripravenou mydlovou vodou, kde s pl&aacute;cačkami (veľmi efekt&iacute;vne) vytv&aacute;rali bal&oacute;ny. Vyvolalo to obrovsk&uacute; radosť ako mal&yacute;ch z&uacute;častnen&yacute;ch akcie, tak aj star&scaron;&iacute;ch, ktor&iacute; si to tiež užili.</p>\r\n\r\n<p>Na koniec, už tro&scaron;ku unaven&iacute; si vychutn&aacute;vali zmrzlinu. Po spoločnej fotke t&aacute;to dielňa skončila a s &uacute;smevom na tv&aacute;re sa deti te&scaron;ia na ďal&scaron;ie podujatie, ktor&eacute; sa už pl&aacute;nuje v kult&uacute;rno-umeleckom spolku.</p>\r\n\r\n<p>Dielňu podporila NRSNM.</p>\r\n\r\n<p>Foto: Jaroslav Ber&eacute;di</p>\r\n\r\n<p><img alt=\"Radosť zo života\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/210325030_10216008873769534_868414345052768619_n.jpg\" style=\"height:1366px; width:2048px\" /></p>\r\n\r\n<p><img alt=\"Usilovne pracovali\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/210858652_10216008898650156_3225272349469140120_n.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p><img alt=\"Ani hra s loptou nechýbala\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/211586469_10216008920010690_6151895030624838700_n.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p><img alt=\"Nakoniec spoločná fotka\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/212034755_10216008911450476_8657476577175498092_n.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n',
        'dielňa, deti', 'published', '1', 0),
       (35, 'Prvé video mužskej speváckej skupiny', '1', '2021-10-02', '1633194823.jfif',
        '<p>Už nie je žiadnou novinkou, že sa n&aacute;&scaron; spolok predstavuje cel&eacute;mu spotu formou video z&aacute;znamov. Tento kr&aacute;t v&scaron;ak sa publikum pok&uacute;sili osloviť chlapci z mužskej spev&aacute;ckej skupiny. T&aacute;to skupina je najmlad&scaron;iou sekciou n&aacute;&scaron;ho spolku a toto je ich prv&eacute; video a prv&aacute; audio nahr&aacute;vka.&nbsp;</p>\r\n\r\n<p>S&uacute; to vojensk&eacute; piesne: <em>Tam na g&aacute;te, Keď som sa ja z n&aacute;&scaron;ho kraja, V tom selenskom miestnom dome, E&scaron;te som začal len.</em></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/DSC_3433.jfif\" style=\"height:1280px; width:1920px\" /></p>\r\n\r\n<p>Ako aj oni tak aj v&scaron;etci členovia spolku sa te&scaron;ili z tohto videa. Nahrali zmes vojensk&yacute;ch piesn&iacute;. Keďže v radoch mužskej skupiny s&uacute; aj sk&uacute;sen&yacute; muzikanti a odborn&iacute;ci, tak si to nacvičili a nahrali.&nbsp;</p>\r\n\r\n<p>Organizačn&uacute; časť mal na starosti Jaroslav Ber&eacute;di, &uacute;pravu pre orchester Juraj S&uacute;di a audio produkciou sa zaoberal Zlatko Klinovsky.</p>\r\n\r\n<p>Vyzer&aacute;, že je to veľmi schopn&yacute; t&iacute;m ľud&iacute;, ktor&iacute; sľubuje &uacute;spe&scaron;n&uacute; pr&aacute;cu aj do bud&uacute;cna.&nbsp;</p>\r\n\r\n<p>Projekt podobrili: &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute;, PS pre kult&uacute;ru a verejn&eacute; informovanie, PS pre vzdel&aacute;vanie, spr&aacute;vu predpisy a n&aacute;rodnostn&eacute; spoločenstv&aacute;, Obec B&aacute;č a NRSNM.</p>\r\n\r\n<p>Vydavateľ je KUS J&aacute;na Koll&aacute;ra spolu s MOMS Selenča.</p>\r\n\r\n<p>Koordin&aacute;torky s&uacute; Malv&iacute;na Zolňanov&aacute; a Svetlana Zolňanov&aacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Cl8VpO1HLFc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n',
        'mužska spevacka, video, spot', 'published', '1', 0),
       (36, 'Magdaléna na 55. Stretnutí v pivnickom poli', '1', '2021-11-29', '1638216440.jpg',
        '<p>Počas v&iacute;kendu prebiehal 55. ročn&iacute;k festivalu Stretnutie v pivnikom poli v Pivnici. N&aacute;&scaron; spolok na tomto ročn&iacute;ku predstavovala mlad&aacute; n&aacute;dejn&aacute; spev&aacute;čka Magdal&eacute;na Kaňov&aacute;.</p>\r\n\r\n<p>Ako je to aj pravidlom festivalu, Magdal&eacute;na spievala dve piesne: ťahav&uacute;, rub&aacute;tov&uacute; ľudov&uacute; pieseň a r&yacute;chlej&scaron;iu ľudov&uacute; pieseň.</p>\r\n\r\n<p>Prv&yacute; večer zaspievala pieseň Von obločkom pozerala, teda na začiatku r&yacute;chle&scaron;iu pesničku. Druh&yacute; večer zaspievala Kr&aacute;sna je noc.</p>\r\n\r\n<p>Obi dve pesničky zaspievala veľmi dobre a tak prezentovala v dobrom svetle nie len kult&uacute;rno-umeleck&yacute; spolok, ale aj na&scaron;u dedinu Selenču.</p>\r\n\r\n<p>Na festival ju pripravovali Jaroslav Ber&eacute;di a Zlatko Klinovsky.</p>\r\n\r\n<p>Magdal&eacute;ne budeme aj naďalej držať palce v jej sľubnej spev&aacute;ckej kari&eacute;re a ver&iacute;me, že využije aj ďal&scaron;ie dve možnosti &uacute;časti na festivale Stretnutie v pivnickom poli, keďže teraz debutovala ako 17-ročn&aacute;.</p>\r\n\r\n<p>Podporila ju aj jej rodina. Pripravili jej kr&aacute;sne kroje, v ktor&yacute;ch žiarila na javisku v Pivnici.</p>\r\n\r\n<p><img alt=\"Prvý festivalový večer\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/DSC_4634%20(1).jpg\" style=\"height:2000px; width:1333px\" /></p>\r\n\r\n<p><img alt=\"Druhý festivalový večer\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/DSC_4786.jpg\" style=\"height:2000px; width:1333px\" /></p>\r\n\r\n<p><img alt=\"Tretí festivalový večer\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/DSC_4969.jpg\" style=\"height:2000px; width:1333px\" /></p>\r\n\r\n<p>Vide&aacute; z festivalu n&aacute;jdete na na&scaron;ej facebookovej str&aacute;nke.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Foto: Jaroslav Ber&eacute;di</p>\r\n',
        'pivnicke pole', 'published', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `secretmsgs`
--

CREATE TABLE `secretmsgs`
(
    `id`   int(11) NOT NULL,
    `msg`  text NOT NULL,
    `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secretmsgs`
--

INSERT INTO `secretmsgs` (`id`, `msg`, `date`)
VALUES (5, 'Pači sa mi lebo sa v šeci spolu žartujeme. ', '12-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials`
(
    `id`          int(11) NOT NULL,
    `title`       varchar(255) NOT NULL,
    `code`        text         NOT NULL,
    `description` text         NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `code`, `description`)
VALUES (3, 'KUS WEB - Dashboard\r\n',
        'src=\"https://www.youtube.com/embed/yJoM95I5E6I\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        'Tutorial o spravovani\r\nInfo: mozete menit svoje meno a priezvisko, budete moct upravovat svoje clanky'),
       (2, 'KUS WEB: Pridanie článku\r\n',
        'src=\"https://www.youtube.com/embed/ZdVGqqmf3r8\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        'Tutorial ako pridať článok'),
       (4, 'Ako pridať/upraviť/zmazať člena',
        'src=\"https://www.youtube.com/embed/GayVZtvvcSA\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        ''),
       (5, 'Podujatia',
        'src=\"https://www.youtube.com/embed/jgzoUETyY5g\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        'Ako pridať, mazať, upravovať podujatia'),
       (6, 'Inventar',
        'src=\"https://www.youtube.com/embed/IvVFcENsl24\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        'Ako pridať, mazať a upraviť položku inventaru'),
       (7, 'Ako exportovat do Excelu',
        'src=\"https://www.youtube.com/embed/1MG_rRPcQ5I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen',
        'Ako exportovat inventar do excelu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `user_id`       int(11) NOT NULL,
    `user_email`    varchar(255) NOT NULL,
    `user_password` varbinary(255) NOT NULL,
    `user_name`     varchar(255) NOT NULL,
    `user_lastname` varchar(255) NOT NULL,
    `user_titul`    varchar(50)  NOT NULL,
    `user_image`    text         NOT NULL,
    `user_function` varchar(255) NOT NULL,
    `user_role`     varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_name`, `user_lastname`, `user_titul`, `user_image`,
                     `user_function`, `user_role`)
VALUES (1, 'jaroslav.beredi@kusjanakollara.org', 0xe10ebb4c18801fc96b0c4e5fd2a17338, 'Jaroslav', 'Berédi', 'Ing.',
        '13612327_10205318203749465_306213853260155397_n.jpg', 'Vedúci tanečnej skupiny, vedúci speváckej skupiny',
        ' admin'),
       (3, 'andrea96.soskic@gmail.com', 0x9a774cb59372bb48cce0fa419742212b8053851bc405e3a997d75f3ad2816a13, 'Andrea',
        'Šoškićová', '', '147073610_10215300536021533_1407857440966026823_o.jpg', 'Vedúca detskej skupiny, pokladníčka',
        ' moderator'),
       (15, 'teodorasimoni@gmail.com', 0xdef1b151c07bdc38895140b1cc94488f5f27cbe9d516f33e9d4cb85ebf52458f, 'Teodora',
        'Šimoniová', '', '146612887_10215300539061609_417368798451478973_o.jpg', '', ' uzivatel'),
       (9, 'user@user', 0xd44ebc5607e2ca40f468e1db672703b5, 'Meno', 'Priezvisko', 'Bc.', 'upravene2_tiny.jpg',
        'test pouzivatel', ' uzivatel'),
       (5, 'juraj.sudi@kusjanakollara.org', 0x7f49c3d66f8e2a6c35c2e60dd6ea1ae6, 'Juraj', 'Súdi', '',
        '73203606_2757593957586902_2099295021176979456_o.jpg', 'Vedúci orchestra, vedúci speváckej skupiny',
        ' uzivatel'),
       (6, 'malvinazolnjan96@gmail.com', 0xb07982cd35cba6d5ca0f73ea12d455d5b62abf309d2d7cdc802f4f7e900850e8, 'Malvína',
        'Zolňanová', '', '146946616_10215300545261764_3553938547196082641_o.jpg', 'Predsedníčka spolku', ' moderator'),
       (8, 'test@test', 0xa6f1d6f1eb6a67fac2ceb32b4533527a, 'test', 'test', '', 'person.jpg', '', ' admin'),
       (16, 'janassvec03@gmail.com', 0x5b1a8b0e3fca90b1885e6fbb3d9df3a0e1b08a0757bca4090ef93de2b22dee4c, 'Jana',
        'Švecová', '', '146874511_10215300530541396_2944191447034031744_o.jpg', '', ' uzivatel'),
       (17, 'karmenakovac2003.com@gmail.com', 0x1501cef272bfbd831d0632ef7e7d2dae48815aaffd91a686608eb76e2fbcb348,
        'Karmena', 'Kováčová', '', '146945304_10215300541461669_3128408612174527269_o.jpg', '', ' uzivatel'),
       (18, 'anaberedi@gmail.com', 0x63cd017f23f43454ef77ee51c4652f01, 'Anna', 'Berédiová', '',
        '146912903_10215300546101785_7005161258352433100_o.jpg', 'Vedúca literárno-informačnej sekcie', ' uzivatel');

-- --------------------------------------------------------

--
-- Table structure for table `videogallery`
--

CREATE TABLE `videogallery`
(
    `id`    int(11) NOT NULL,
    `title` text NOT NULL,
    `code`  text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videogallery`
--

INSERT INTO `videogallery` (`id`, `title`, `code`)
VALUES (1, 'Choreografia: V Selenči na tanci | Choreografi: Kolektív',
        'src=\"https://www.youtube.com/embed/CKL4ZkFoH1w\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (2, 'Dievčenská spevácka skupina - Zmes - Pod oblôčkom záhradôčka',
        'src=\"https://www.youtube.com/embed/VDGvhhC0ON4\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (3, 'Dievčenská spevácka skupina - Zmes - Veje vetor hore dolinami',
        'src=\"https://www.youtube.com/embed/ls1QbdNEV7Q\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (4, 'Choreografia: Žeň sa, pajtáš | Choreografka: Malvína Zolňanová',
        'src=\"https://www.youtube.com/embed/kON18J1pYyw\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (5, 'Choreografia: Kyjáčkový tanec | Choreografka: Katarína Berédiová',
        'src=\"https://www.youtube.com/embed/OLBqJ9tsRMo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen'),
       (6, 'Choreografia: Kyjáčkový tanec | Choreografka: Katarína Berédiová, úprava: Jaroslav Beredi',
        'src=\"https://www.youtube.com/embed/lt9Zz0Nmf1g\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (7, 'Choreografia: Z teho konca na tem koniec | Choreografi: Koletív',
        'src=\"https://www.youtube.com/embed/suxytogt2i4\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen'),
       (8, 'Dievčenská spevácka skupina a ĽH Selenča - Mám pred domom',
        'src=\"https://www.youtube.com/embed/56aXn-6nBRg\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen'),
       (9, 'Dievčenská skupina - Čo sa stalo šej nového',
        'src=\"https://www.youtube.com/embed/mNQYUrTr_jo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen'),
       (11, 'DSS - Tečte prúdom',
        'src=\"https://www.youtube.com/embed/q25hDJe7zy8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen'),
       (12, 'Mužská spevácka skupina - Zmes vojenských piesní',
        'src=\"https://www.youtube.com/embed/Cl8VpO1HLFc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
    ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `secretmsgs`
--
ALTER TABLE `secretmsgs`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videogallery`
--
ALTER TABLE `videogallery`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
    MODIFY `event_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
    MODIFY `news_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
    MODIFY `post_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `secretmsgs`
--
ALTER TABLE `secretmsgs`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `user_id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `videogallery`
--
ALTER TABLE `videogallery`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
