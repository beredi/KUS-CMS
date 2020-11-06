-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2020 at 02:36 PM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_photo` text NOT NULL,
  `event_content` text NOT NULL,
  `event_place` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_value`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_last_edited` varchar(255) NOT NULL,
  `post_position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`, `post_last_edited`, `post_position`) VALUES
(1, 'V novembri v roku 2017 KUS Jána Kollára oslávil svoje 70. narodeniny', 'Jaroslav Beredi', '2018-12-17', '70rokov.jpg', '<p>Pri tejto pr&iacute;ležitosti členovia divadelnej sekcie zahrali &uacute;ryvok z prv&eacute;ho divadeln&eacute;ho predstavenia, ktor&yacute;m sa Selenčsk&eacute;mu obecenstvu predstavili ochotn&iacute;ci v roku 1895. Vtedy P&aacute;na Tom&aacute;&scaron;a nacvičila pani far&aacute;rova Juliana Medveck&aacute;. Pri pr&iacute;ležitosti st&eacute;ho v&yacute;ročia t&uacute;to jednoaktovku na javisko postavila Svetlana Zolňanov&aacute;. Ďalej sa počas osl&aacute;v o divadle zmienili Ter&eacute;zia Žiakov&aacute; a Jozef Kov&aacute;č v tvare audio nahr&aacute;vky, ktor&yacute; svoj vrchol v r&eacute;žii pri spolku dosiahol filmom &ndash; najzn&aacute;mej&scaron;&iacute; &uacute;ryvok z filmu je žatva. Počas cel&eacute;ho programu div&aacute;ci mali možnosť sledovať z&aacute;znamy z RTV2, ktor&eacute; boli nahrat&eacute; e&scaron;te na sklonku 20. storočia.</p>\r\n\r\n<p>Selenču medzi slovensk&yacute;mi osadami ako v s&uacute;časnosti tak aj v minulosti považovali za kol&iacute;sku slovenskej&nbsp; ľudovej pesničky. Svoju spev&aacute;cku kari&eacute;ru v mene KUS si vybudovali Michal Zol&aacute;rek, Vlasta Faďo&scaron;ov&aacute;, M&aacute;ria Turansk&aacute; a&nbsp;in&iacute;. Počas tohto programu, už ako 70-ročn&iacute;, spievali spomenut&iacute; spev&aacute;ci M. Zol&aacute;rek a M. Turansk&aacute;. O samotn&yacute;ch podkladoch spev&aacute;ckej skupiny preč&iacute;tala Anna Ber&eacute;diov&aacute;. Pr&iacute;ležitosť uk&aacute;zať spev&aacute;kom svoj talent v ľudovej pesničky dal aj Juraj Ber&eacute;di, ktor&yacute; založil Detsk&yacute; kľ&uacute;čik. Z preč&iacute;tan&yacute;ch najn&aacute;kladnej&scaron;&iacute;ch &uacute;dajov o speve&nbsp; v&nbsp;Selenči, dievčensk&aacute; skupina, ktor&aacute; poč&iacute;tala dievčence a vydat&eacute; ženy, obecenstvu zaspievala dve pesničky, s ktor&yacute;mi sa KUS J&aacute;na Koll&aacute;ra prezentoval viackr&aacute;t na festivaloch, programoch a s&uacute;ťaženiach. V ten večer, ako aj dovtedy, spev&aacute;kov a tanečn&iacute;kov sprev&aacute;dzal orchester pod veden&iacute;m J&aacute;na &Scaron;imoniho, ktor&yacute; sa zmienil aj o jeho začiatkoch.</p>\r\n\r\n<p>V&yacute;zvu zachov&aacute;vať slovensk&eacute; ľudov&eacute; piesne a kroje sme pochopili v&aacute;žne. Aktivisti Kult&uacute;rno umeleck&eacute;ho spolku pravidelne z&iacute;skavaj&uacute; odmenu pre kroj na festivale V pivnickom poli, na festivale Cez Nadlak je... v Rumunsku a na festivale slovensk&yacute;ch krojov v Kys&aacute;či.</p>\r\n\r\n<p>Založen&yacute; pri spolku bol i KZ Zvony, ktor&eacute;ho je dodnes ved&uacute;cim Dr. Juraj S&uacute;di, a obecenstvu pribl&iacute;žil aj začiatky, ktor&eacute; spestrili akt&iacute;vnu činnosť KUS. Potom sa aj KZ Zvony predstavil s najzn&aacute;mej&scaron;ou skladbou ich dirigenta, ktor&uacute; zhudobnil na slov&aacute; Ivana Krasku - Otcova roľa. Medzi najv&yacute;znamnej&scaron;ie činnosti Selenčanov, ktor&iacute; pracovali na kult&uacute;rnom poli, bola aj prv&aacute; vojvodinsk&aacute; opera, ktor&uacute; podpisuje J&aacute;n Nos&aacute;l.</p>\r\n\r\n<p>Čo sa t&yacute;ka folkl&oacute;ru, najv&yacute;znamnej&scaron;ie ocenenie v minulom storoč&iacute;, Iskru kult&uacute;ry si tanečn&iacute;ci z&iacute;skali počas p&ocirc;sobenia Katar&iacute;ny Ber&eacute;diovej. Ďalej s tanečn&iacute;kmi pri spolku pracoval aj Juraj Ber&eacute;di, Anna Burčiarov&aacute;, ktor&aacute; boli choreografkou detskej skupiny Medovn&iacute;ček, po nich s dorastencami pracovali Ivana Ži&scaron;kov&aacute;, Svetlana Zolňanov&aacute; a Malv&iacute;na Zolňanov&aacute;. V priebehu osl&aacute;v sa predstavili aj s&uacute;časn&iacute; tanečn&iacute;ci, ktor&iacute; tancovali choreografiu menovanej Katar&iacute;ny Ber&eacute;diovej, ktor&aacute; sa m&ocirc;že považovať ako symbol selenčsk&eacute;ho folkl&oacute;ru, keďže z&iacute;skala najviac ocenen&iacute; a je aj p&ocirc;vodn&yacute;m tancom, ktor&yacute; sa do dnes zachov&aacute;va. Tento raz tanečn&iacute;kov sprev&aacute;dzal detsk&yacute; Orchestr&iacute;k.</p>\r\n\r\n<p>Najakt&iacute;vnej&scaron;&iacute;m členom od založenia spolku boli udelen&eacute; ďakovn&eacute; listiny. V ten večer do Domu kult&uacute;ry v Selenči mal pr&iacute;stup každ&yacute;, ktor&yacute; aspoň kamienkom prispel do dlhoročnej mozaike KUS J&aacute;na Koll&aacute;ra.</p>\r\n\r\n<p>Bol to opis &uacute;stredn&yacute;ch osl&aacute;v, ktor&eacute; prebiehali v nedeľu. No, nie menej d&ocirc;ležit&eacute; je pripomen&uacute;ť aj to, že deň pred t&yacute;m akt&iacute;vni členovia folkl&oacute;rnej sekcie pripravili pre v&scaron;etk&yacute;ch občanov svojej dediny aj ľudov&uacute; veselicu, a tak si každ&yacute; jeden mohol zatancovať a pobaviť sa pri slovenskej hudbe. Bola zorganizovan&aacute; i v&yacute;stava star&yacute;ch fotografi&iacute;, ktor&eacute; sa t&yacute;m sp&ocirc;sobom zachovali a tak sa pripomenula činnosť tohto združenia Selenčsk&yacute;ch ochotn&iacute;kov.</p>\r\n\r\n<p>Boli to celov&iacute;kendov&eacute; oslavy, o ktor&eacute; sa postarali v&scaron;etci ochotn&iacute;ci ako s&uacute;časn&iacute; tak aj t&iacute;, ktor&iacute; sa zap&aacute;jali predt&yacute;m. Bolo vidno, že Selenča m&aacute; byť na čo hrd&aacute; a ako osada e&scaron;te žije v slovenskom ľudovom duchu.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/70rokov.jpg\" style=\"height:1148px; width:3652px\" /></p>\r\n', 'KUS Jána Kollára, oslavy, 70 rokov', 'published', 'Jaroslav Beredi', 0),
(2, 'Vystúpenie na matičnom programe v Selenči', 'Jaroslav Beredi', '2018-12-17', 'maticny-program.jpg', '<p>V nedeľu 14. okt&oacute;bra v Dome kult&uacute;ry v Selenči prebiehal matičn&yacute; večierok.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/maticny-program.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n\r\n<p>Po pr&iacute;hovore PaedDr. Svetlany Zolňanovej, predsedn&iacute;čke selenčsk&eacute;ho MOMS, podujatie prebiehalo v matičnom duchu povzbudzovania na&scaron;ej slovenskej identity. Slovenskou rečou pr&iacute;tomn&yacute;ch oslovili aj KZ Zvony, spevokol evanjelickej a. v. cirkvy Ozvena, ako i Orchestr&iacute;k pod veden&iacute;m Dr. Juraja S&uacute;diho. Bolo počuť recit&aacute;cie, zatancovali aj členovia KUS J&aacute;na Koll&aacute;ra a spievali početn&iacute; spev&aacute;ci zo Selenče a medzi nimi aj vojlovičanka Katar&iacute;na Kalm&aacute;rov&aacute; a Boris Bab&iacute;k zo Starej Pazovy. Z&aacute;verom, v mene NRSNM, pam&auml;tn&uacute; tabuľu udelil predseda V&yacute;boru pre &uacute;radn&eacute; použ&iacute;vanie jazyka a p&iacute;sma Branislav Kul&iacute;k a prihovorila sa Libu&scaron;ka Lakato&scaron;ov&aacute;, republikov&aacute; poslankyňa.</p>\r\n\r\n<p>Večierok sa zakončil tak, že v&scaron;etci pr&iacute;tomn&iacute; spolu s &uacute;častn&iacute;kmi programu zaspievali matičn&uacute; hymnu <em>Po n&aacute;brež&iacute;</em>.</p>\r\n', '', 'published', 'Jaroslav Beredi', 0),
(3, 'Oslavy 260 rokov Selenče', 'Jaroslav Beredi', '2018-12-17', 'selenca-260-1.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/selenca-260-1.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n\r\n<p>V dňoch 7. a 8. j&uacute;la konali sa oslavy 260 rokov Selenče, v ktor&yacute;ch sa z&uacute;častnil aj KUS J&aacute;na Koll&aacute;ra a predstavil sa r&ocirc;znymi choreografiami a piesňami.</p>\r\n\r\n<p>Prv&eacute;ho dňa (v sobotu) sa uskutočnila v&yacute;stava fotografi&iacute; slovensk&yacute;ch krojov pod n&aacute;zvom Slovensk&aacute; kr&aacute;sa-karav&aacute;na slovensk&yacute;ch krojov autorov Branislava Kokavca a Pavla Surov&eacute;ho. Organiz&aacute;tormi tohto podujatia boli Kult&uacute;rne centrum Kys&aacute;č a KUS J&aacute;na Koll&aacute;ra v spolupr&aacute;ci s MS Selenča. V&yacute;stavy sa z&uacute;častnili aj členovia spolku J&aacute;na Koll&aacute;ra tak, že prezentovali selenčsk&eacute; kroje z r&ocirc;znych obdob&iacute; na m&oacute;dnej prehliadke.</p>\r\n\r\n<p>Vo večern&yacute;ch hodin&aacute;ch uskutočnil sa kult&uacute;rno umeleck&yacute; program, na ktorom sa tanečn&aacute; skupina predstavila p&ocirc;vodn&yacute;m&nbsp;<em>Kyj&aacute;čkov&yacute;m tancom</em>. Dievčence na sebe mali &scaron;pecifick&eacute; kyckav&eacute; &bdquo;na &scaron;iroko&ldquo; zviazan&eacute; ka&scaron;mer&iacute;nov&eacute; ručn&iacute;ky a ka&scaron;mer&iacute;nky. Chlapci mali okolo struku vy&scaron;&iacute;van&eacute; ketene taktiež s kyckami. Dodatočn&uacute; autentickosť dali aj kyj&aacute;ky v ruk&aacute;ch mlad&yacute;ch a vesel&yacute;ch tanečn&iacute;kov. Tanečn&aacute; skupina obohatila v&yacute;stup spev&aacute;čky Anny Ber&eacute;diovej, finalistky &scaron;ou&nbsp;<em>Zem spieva</em>&nbsp;, tancuj&uacute;c nov&uacute; &scaron;tylizovan&uacute; choreografiu. Aj spev&aacute;cka skupina sa taktiež z&uacute;častnila piesňami&nbsp;<em>V na&scaron;om dvore, Darmo vy mňa, mamko a Hre&scaron;te ma, bite ma</em>&nbsp;za sprievodu Orchestr&iacute;ka z&aacute;kladnej &scaron;koly a komorn&eacute;ho zboru Zvony. Spev&aacute;cku skupinu nacvičila Anna Ber&eacute;diov&aacute; a tanečn&uacute; skupinu predsedn&iacute;čka spolku Malv&iacute;na Zolňanov&aacute;. Nakoniec si v&scaron;etci &uacute;častn&iacute;ci zaspievali pieseň&nbsp;<em>Nad Selenčou</em>.</p>\r\n\r\n<p>V nedeľu 8. 7. na &scaron;kolskom dvore bol usporiadan&yacute; jarmok, na ktorom bola možnosť si obzrieť a k&uacute;piť r&ocirc;zne suven&iacute;ry, n&aacute;hrdeln&iacute;ky, typick&eacute; v&yacute;robky s mot&iacute;vmi Selenče. Po jarmoku nasledoval detsk&yacute; program, ktor&yacute; pripravili nielen selenčsk&eacute;, ale aj deti a hostia zo Slovenska, ktor&iacute; boli hosťami počas t&yacute;chto osl&aacute;v a svojou pr&iacute;tomnosťou obohatili na&scaron;e jubileum. Na programe sa z&uacute;častnil aj KUS J&aacute;na Koll&aacute;ra choreografiou&nbsp;<em>V na&scaron;om dvore</em>. Z programu v&scaron;etci pr&iacute;tomn&iacute; i&scaron;li na sl&aacute;vnostn&yacute; defil&eacute;. Počas defil&eacute; si tanečn&aacute; skupina zatancovala jednu časť choreografie. Cestou sa spievalo, hralo, tancovalo...</p>\r\n\r\n<p>Z&aacute;ver osl&aacute;v bol na &scaron;kolskom dvore, kde sa konala tanečn&aacute; z&aacute;bava pri hudbe selenčsk&yacute;ch hudobn&yacute;ch skup&iacute;n: ZOZ, Kardio band, Leopold band, Euro band, skupina Maks. Na tejto z&aacute;bave si zatancovali nielen mlad&iacute;, ale ľudia v&scaron;etk&yacute;ch vekov&yacute;ch kateg&oacute;ri&iacute;, čo pote&scaron;ilo organiz&aacute;torov.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/selenca-260-2.jpg\" style=\"height:720px; width:1083px\" /></p>\r\n', 'Oslavy, 260, Selenča', 'published', 'Jaroslav Beredi', 0),
(4, 'Naše leto v Bulharsku', 'Jaroslav Beredi', '2018-12-17', 'bulharsko1.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bulharsko1.jpg\" style=\"height:736px; width:960px\" /></p>\r\n\r\n<p>Tohto roku sme sa z&uacute;častnili na medzin&aacute;rodnom festivale Balkan folk fest vo Varne (Bulharsko). Okrem členov KUS J&aacute;na Koll&aacute;ra, z&aacute;jazdu sa z&uacute;častnili aj členovia SKC P. J. &Scaron;af&aacute;rika a in&iacute;. Tak sme v&scaron;etci spolu tr&aacute;vili chv&iacute;le od 13. augusta až po 21. august. V pondelok poobede sme vy&scaron;tartovali na dlho očak&aacute;van&uacute; dovolenku, ktor&aacute; okrem dobrodružstiev pri mori vyžadovala aj určit&eacute; povinnosti. Obidva spolky vyst&uacute;pili na už spom&iacute;nanom folkl&oacute;rnom festivale. Ako prv&yacute; vyst&uacute;pili &Scaron;af&aacute;rikovci s choreografiou&nbsp;<em>Keď som sa ja z n&aacute;&scaron;ho kraja...</em>&nbsp;a dva dni nesk&ocirc;r vyst&uacute;pili Selenčania s choreografiou&nbsp;<em>V Selenči na tanci</em>. Počas voľn&eacute;ho času sme si už&iacute;vali slnečn&eacute; dni na pl&aacute;ži a organizovali sme si aj spoločn&eacute; z&aacute;bavy vo večern&yacute;ch hodin&aacute;ch sprev&aacute;dzan&eacute; spevom a zvukmi gitary a husl&iacute;.</p>\r\n\r\n<p>Domov sme sa vr&aacute;tili 21. augusta okolo obeda. Každ&eacute;mu z n&aacute;s zostali vrezan&eacute; kr&aacute;sne spomienky na dovolenku v Bulharsku.</p>\r\n\r\n<p>Foto: Peter Vala&scaron;ek</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bulharsko2.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n', 'Bulharsko, zájazd, 2018', 'published', 'Jaroslav Beredi', 0),
(5, 'Dni európskeho dedičstva', 'Jaroslav Beredi', '2018-12-17', 'bastine2018-1.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/bastine2018-1.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n\r\n<p>V r&aacute;mci manifest&aacute;cie &bdquo;Dani evropske ba&scaron;tine&ldquo; (Dni eur&oacute;pskeho dedičstva) na&scaron;i tanečn&iacute;ci vyst&uacute;pili s choreografiou&nbsp;<em>Kyj&aacute;čkov&yacute; tanec</em>. Tanečn&iacute;ci pod umeleck&yacute;m veden&iacute;m Marijana Trusinu sa obecenstvu predstavili v poobedňaj&scaron;&iacute;ch hodin&aacute;ch na pevnosti v B&aacute;či.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Dani evropske baštine, Bač, Dani Bača', 'published', 'Jaroslav Beredi', 0),
(6, 'Cez Nadlak je... 2018', 'Jaroslav Beredi', '2018-12-17', 'nadlak2018-1.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/nadlak2018-1.jpg\" style=\"height:617px; width:960px\" /></p>\r\n\r\n<p>Festival Cez Nadlak je&hellip; tohto roku osl&aacute;vil 20. narodeniny a tohto jubilea sa z&uacute;častnilo 35 spev&aacute;kov, ktor&iacute; spievali jeden večer pomal&uacute; a druh&yacute; večer r&yacute;chlu pesničku. V tret&iacute; večer, čiže v nedeľu, bola revu&aacute;lna časť, v ktorej spievali odmenen&iacute; spev&aacute;ci. Je to pozoruhodn&yacute; počet mlad&yacute;ch ľud&iacute;, ktor&iacute; zachov&aacute;vaj&uacute; slovensk&eacute; ľudov&eacute; pesničky. Tento festival finančne podporuje Demokratick&yacute; zv&auml;z Slov&aacute;kov a Čechov v Rumunsku, &Uacute;rad pre Slov&aacute;kov žij&uacute;cich v zahranič&iacute;, Župn&yacute; kult&uacute;rny center mesta Arad, Mestsk&eacute; zastupiteľstvo radnice mesta Nadlak ako i ďal&scaron;&iacute; sponzori. Festival Cez Nadlak je&hellip; spev&aacute;ci zo Srbska nav&scaron;tevuj&uacute; už dlh&yacute; rad rokov a každoročne z&iacute;skavaj&uacute; pozoruhodn&eacute; ocenenia. Tohto roku si Slov&aacute;ci z Vojvodiny odniesli až 11 cien, buď &scaron;peci&aacute;lnych, alebo cien odbornej poroty, ktor&aacute; pracovala v zložen&iacute;: J&aacute;n &Scaron;utinsk&yacute; (predseda poroty), M&aacute;ria Peniakov&aacute;, Krist&iacute;na Žukanov&aacute;, Anna Medveďov&aacute; a Dr. Juraj S&uacute;di. Odborn&aacute; porota odmenila v detskej kateg&oacute;rii: 3. cenou Mareka &Scaron;kablu zo Selenče, 2. cenu z&iacute;skala Petrovčanka Simona S&yacute;korov&aacute;, k&yacute;m 1. si vyspievala Krist&iacute;na Benciov&aacute; z Nadlaku. V kateg&oacute;rii od 13 do 18 rokov tretia cena patr&iacute; Martine Ag&aacute;rskej z Boľoviec, druh&aacute; Nadlačanky Andrei F&aacute;briovej a najlep&scaron;&iacute; v tejto kateg&oacute;rii bol Zlatko Klinovsk&yacute;, ktor&yacute; reprezentoval Nov&yacute; Sad. V kateg&oacute;rii nad 18 rokov najlep&scaron;ie boli spev&aacute;čky z Vojvodiny. Tretia cena patr&iacute; Petrovčanky Alexandre Brtkovej, druhou cenou sa ovenčila Katar&iacute;na Kalm&aacute;rov&aacute; z Vojlovice a prv&aacute; cena sa dostala do Selenče. Vyspievala si ju Anna Ber&eacute;diov&aacute;. V&yacute;hercovia prv&yacute;ch cien z&iacute;skali i odmenu N&aacute;rodnej rady Slovenskej republiky.</p>\r\n\r\n<p>V&scaron;etk&yacute;ch spev&aacute;kov na tomto festivale sprev&aacute;dzal orchester pod veden&iacute;m Ondreja Maglovsk&eacute;ho. Moder&aacute;tormi boli Bianka Ucov&aacute; a Juraj Cig&aacute;ň. V nedeľu, keď vyspievali odmenen&iacute; spev&aacute;ci 20. ročn&iacute;ka festivalu Cez Nadlak je..., pokračovala revu&aacute;lna časť, v ktorej sa predstavili naj&uacute;spe&scaron;nej&scaron;&iacute; spev&aacute;ci za posledn&yacute;ch desať rokov. Medzi nich patria: Ivan Sl&aacute;vik, Andrea Lačokov&aacute;, Anita Ryb&aacute;rov&aacute;, Zuzana Barto&scaron;ov&aacute;, Ren&aacute;ta Ryb&aacute;rov&aacute; (obecenstvu zn&aacute;ma pod dievčensk&yacute;m priezviskom Lov&aacute;sov&aacute;), potom Adriana Fur&iacute;kov&aacute;, M&aacute;ria Bonc&aacute; - Krajč&iacute;kov&aacute; a Tatiana Ja&scaron;kov&aacute;. Potom tanečn&iacute;ci V&scaron;etečn&iacute;ci pobavili publikum v nadlackom Dome kult&uacute;ry a tak sa ukončil 20. ročn&iacute;k festivalu Cez Nadlak je&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/nadlak2018-2.jpg\" style=\"height:720px; width:960px\" /></p>\r\n', 'Nadlak, Selenča, spev, úspech', 'published', 'Jaroslav Beredi', 0),
(7, 'Matičný večierok v Selenči', 'Jaroslav Beredi', '2018-12-17', '44185878_10156746588486670_384303318479929344_o.jpg', '<p>V nedeľu 14. okt&oacute;bra v Dome kult&uacute;ry v Selenči prebiehal matičn&yacute; večierok.</p>\r\n\r\n<p>Po pr&iacute;hovore PaedDr. Svetlany Zolňanovej, predsedn&iacute;čke selenčsk&eacute;ho MOMS, podujatie prebiehalo v matičnom duchu povzbudzovania na&scaron;ej slovenskej identity. Slovenskou rečou pr&iacute;tomn&yacute;ch oslovili aj KZ Zvony, spevokol evanjelickej a. v. cirkvy Ozvena, ako i Orchestr&iacute;k pod veden&iacute;m Dr. Juraja S&uacute;diho. Bolo počuť recit&aacute;cie, zatancovali aj členovia KUS J&aacute;na Koll&aacute;ra a spievali početn&iacute; spev&aacute;ci zo Selenče a medzi nimi aj vojlovičanka Katar&iacute;na Kalm&aacute;rov&aacute; a Boris Bab&iacute;k zo Starej Pazovy. Z&aacute;verom, v mene NRSNM, pam&auml;tn&uacute; tabuľu udelil predseda V&yacute;boru pre &uacute;radn&eacute; použ&iacute;vanie jazyka a p&iacute;sma Branislav Kul&iacute;k a prihovorila sa Libu&scaron;ka Lakato&scaron;ov&aacute;, republikov&aacute; poslankyňa.</p>\r\n\r\n<p>Večierok sa zakončil tak, že v&scaron;etci pr&iacute;tomn&iacute; spolu s &uacute;častn&iacute;kmi programu zaspievali matičn&uacute; hymnu <em>Po n&aacute;brež&iacute;</em>.</p>\r\n\r\n<p>Foto: Juraj Ber&eacute;di - Ďuky</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/44185878_10156746588486670_384303318479929344_o.jpg\" style=\"height:960px; width:1444px\" /></p>\r\n', 'MOMS, Matica slovenská v Srbsku', 'published', 'Jaroslav Beredi', 0),
(8, 'Festival V pivnickom poli', 'Jaroslav Beredi', '2018-12-17', '46710490_2169474139986575_4834801988837310464_n.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/46866247_2169474479986541_5720486097096540160_n.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Predstavitelia kult&uacute;rno umeleck&eacute;ho spolku J&aacute;na Koll&aacute;ra v Selenči Anna Ber&eacute;diov&aacute; a Zlatko Klinovsk&yacute; sa z&uacute;častnili&nbsp;53. festivalu V pivnickom poli.</p>\r\n\r\n<p>Festival prebiehal&nbsp;od 23. novembra a skončil sa z&aacute;verečn&yacute;m večierkom v nedeľu 25. novembra, kde si na&scaron;i spolk&aacute;ri zase zaspievali, tentokr&aacute;t ako odmenen&iacute;. Zlatkovi sa do r&uacute;k dostala 3. cena odbornej poroty za prednes a Anne porota udelila &scaron;peci&aacute;lnu odmenu za pr&iacute;nos tomuto festivalu a &uacute;spe&scaron;n&uacute; propag&aacute;ciu slovenskej ľudovej piesne ako v Srbsku, tak aj v zahranič&iacute;. Mus&iacute;me pripomen&uacute;ť, že v odbornej porote, ktor&uacute; tvorili M&aacute;ria Zdravkovićov&aacute;, Jarmila Juricov&aacute;-Stupavsk&aacute; a Miroslav Hemela bol aj etnol&oacute;g, Selenčan Patrik Rago, ktor&yacute; obom spev&aacute;kom pomohol pri v&yacute;bere kroju a rozhodol sa odmenu pre najautentickej&scaron;&iacute; ľudov&yacute; odev udeliť Anne Ber&eacute;diovej.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/46710490_2169474139986575_4834801988837310464_n.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Text: Anna Ber&eacute;diov&aacute;</p>\r\n\r\n<p>Foto: Nata&scaron;a Klinovsk&aacute;</p>\r\n', 'Pivnica, V pivnickom poli', 'published', 'Jaroslav Beredi', 0),
(11, '\"Z teho konca na tem koniec\" na FFTT 2019', 'Jaroslav Beredi', '2019-06-21', '64787600_853256088377302_4779944068077584384_o.jpg', '<p>V&nbsp;sobotu 15. j&uacute;na odznel <em>49. Folkl&oacute;rny festival Tancuj, Tancuj...</em> v&nbsp;Hložanoch. Na&scaron;i tanečn&iacute;ci sa z&uacute;častnili choreografiou <em>Z&nbsp;teho konca na tem koniec</em> v&nbsp;r&aacute;mci druh&eacute;ho koncertu. Takto predstavili tohtoročn&uacute; činnosť.</p>\r\n\r\n<p>Na javisku tancovali viacer&iacute; debutanti n&aacute;&scaron;ho spolku. Zostava bola kombinovan&aacute; z&nbsp;nov&yacute;ch tanečn&iacute;kov a&nbsp;služobne star&scaron;&iacute;ch. Zostavy v&nbsp;podobnej podobe bud&uacute; vystupovať počas celej sez&oacute;ny.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64962348_853256101710634_5741469408929251328_o.jpg\" style=\"height:900px; width:1600px\" /></p>\r\n\r\n<p>Dievčensk&aacute; spev&aacute;cka skupina sa predstavila v&nbsp;r&aacute;mci s&uacute;ťažnej časti spev&aacute;ckych skup&iacute;n zmesou ľudov&yacute;ch piesn&iacute;<em> Kade ja chodievam, tam aj stromy plač&uacute;</em>. Boli verejne pochv&aacute;len&eacute; pre tento prednes. Pr&iacute;pravu mala na starosti ved&uacute;ca spev&aacute;ckej skupiny Anna Ber&eacute;diov&aacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64573933_853256471710597_2668710429387128832_o.jpg\" style=\"height:900px; width:1600px\" /></p>\r\n\r\n<p>Za autorov&nbsp;choreografie sa podpisuj&uacute; členovia KUS J&aacute;na Koll&aacute;ra, tanečn&iacute;kov nacvičil Marijan Trusina a&nbsp;zahral im orchester pod veden&iacute;m J&aacute;na &Scaron;imoniho.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/62605958_853256261710618_6655035929478037504_o.jpg\" style=\"height:1095px; width:1600px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/64920658_853256201710624_4836188344150917120_n.jpg\" style=\"height:960px; width:656px\" /></p>\r\n\r\n<p>FOTO: Foto Video Benka</p>\r\n', 'FFTT', 'published', 'Jaroslav Beredi', 0),
(10, 'Posledná akcia v roku 2018: Vianočná dielňa pre deti', 'Jaroslav Beredi', '2018-12-24', '48419304_747398532296392_5547724890200604672_o.jpg', '<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/48419304_747398532296392_5547724890200604672_o.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p>Vianočn&eacute; obdobie n&aacute;m pripom&iacute;na pokoj, l&aacute;sku a radosť z&nbsp;mal&yacute;ch a nehmotn&yacute;ch vec&iacute;, na ktor&eacute; počas cel&eacute;ho roka zab&uacute;dame a&nbsp;nedb&aacute;me. Predsa najv&auml;č&scaron;iu radosť zo sviatkov maj&uacute; deti.</p>\r\n\r\n<p>Tak v&nbsp;Kult&uacute;rno-umeleckom spolku sme sa rozhodli prispieť k detskej radosti a&nbsp;zorganizovať vianočn&uacute; dielňu pre deti. Dielňa bola usporiadan&aacute; 21. decembra, kedy na&scaron;e priestory odzv&aacute;ňali detsk&yacute;m krikom.</p>\r\n\r\n<p>Hlavnou t&eacute;mou dielne bola tvorba vianočn&yacute;ch pohľadn&iacute;c. Deti si, podľa n&aacute;vodov dievčat zo spolku, zhotovili n&aacute;dhern&eacute; pohľadnice s&nbsp;vlastnou &uacute;pravou. Tiež namaľovali vianočn&yacute; stromček podľa svojich predst&aacute;v. Ved&uacute;cou dielne bola Andrea &Scaron;o&scaron;kićov&aacute;.</p>\r\n\r\n<p>Pri odchode, za skvel&uacute; pr&aacute;cu a&nbsp;vynaložen&eacute; &uacute;silie, každ&eacute; dieťa dostalo priliehav&yacute; vianočn&yacute; darček. Darčeky poskytli MOMS Selenča, Krist&iacute;na Kaňov&aacute;, Ren&aacute;ta S&uacute;diov&aacute;, Kvetoslava &Scaron;vecov&aacute;-Kočondov&aacute;, Patrik Rago, Darina T&yacute;rov&aacute; a&nbsp;Peter Vala&scaron;ek.</p>\r\n\r\n<p>Dielňu hodnot&iacute;me ako &uacute;spe&scaron;n&uacute; a určite bud&uacute; organizovan&eacute; aj ďal&scaron;ie dielne v bud&uacute;cnosti.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/48428918_747398618963050_5892715793199661056_o.jpg\" style=\"height:1365px; width:2048px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'vianoce, kus jana kollara, deti', 'published', 'Jaroslav Beredi', 0),
(12, 'Vystúpili sme v Oraviciach na Slovensku', 'Jaroslav Beredi', '2019-08-07', '_DSC9127-385.JPG', '<p>Od 26. do 29. j&uacute;la kult&uacute;rno umeleck&yacute; spolok J&aacute;na Koll&aacute;ra zo Selenče pobudol v Oraviciach na Slovensku. Selenčsk&yacute; spolok sa z&uacute;častnil na festivale <em>Pod Osobitou</em>, kde sa v sobotu predstavili hodinov&yacute;m programom. V nedeľu vystupovali najprv v Oraviciach a potom &nbsp;svoju činnosť predstavili aj na festivale <em>Witowianska vatra</em> v Poľsku. Predstavili sa tancami <em>Oči, oči</em>, <em>Z teho konca na ten koniec</em>, <em>Kyj&aacute;čkov&yacute; tanec</em> a <em>V Selenči na tanci</em>. Tancom spestrili aj s&oacute;lo spev Anny Ber&eacute;diovej. Okrem Ane, zaspievali si aj &nbsp;Magdalena Kaňov&aacute;, Andrej Pavlov, Davorin Ga&scaron;parovsk&yacute; a Zlatko Klinovsk&yacute;, ktor&yacute; sa predstavil zmesou piesn&iacute;.&nbsp; Spev&aacute;cka skupina obecenstvu v Oraviciach a vo Witove v&nbsp;Poľsku, predviedla v&yacute;ber&nbsp; slovensk&yacute;ch&nbsp; ľudov&yacute;ch piesn&iacute; pod n&aacute;zvom <em>Veje vetor hore dolinami</em>, <em>S kade ja chodievam tam aj stormy plač&uacute;</em>, <em>Pod obl&ocirc;čkom zahrad&ocirc;čka tŕnim pleten&aacute;</em>, ktor&eacute; nacvičila Anna Ber&eacute;diov&aacute;.&nbsp; Tieto body sprev&aacute;dzal orchester, ktor&yacute; mal na starosti Juraj S&uacute;di ml. ako i prednes niektor&yacute;ch spev&aacute;kov. Tanečn&iacute;kov nacvičoval Marian Trusina. Jaroslav Ber&eacute;di mal na starosti r&eacute;žiu programu a pom&aacute;hal aj pri n&aacute;cvikoch. Organiz&aacute;ciu z&aacute;jazdu mala na starosti predsedn&iacute;čka KUS J&aacute;na Koll&aacute;ra Malv&iacute;na Zolňanov&aacute; a tajomn&iacute;čka Andrea &Scaron;o&scaron;kićov&aacute;. Selenčsk&yacute; spolk&aacute;ri predstavili iba časť slovenskej vojvodinskej kult&uacute;ry na p&oacute;diu v zahranič&iacute; a pl&aacute;nuj&uacute; sa tak&yacute;mto programom predstaviť aj obecenstvu v Selenči. Najprv sa z&uacute;častnia na <em>Slovensk&yacute;ch n&aacute;rodn&yacute;ch sl&aacute;vnostiach</em> v sobotu 10. augusta a&nbsp;pobudn&uacute; aj v&nbsp;Čiernej hore, kde sa z&uacute;častnia folkl&oacute;rneho festivalu v&nbsp;Herceg Novom.</p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/67454553_882376848798559_2446377397155528704_o.jpg\" style=\"height:721px; width:1080px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/_DSC9043-336.JPG\" style=\"height:708px; width:1061px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/_DSC9006-315.JPG\" style=\"height:708px; width:1061px\" /></p>\r\n\r\n<p>Malv&iacute;na Zolňanov&aacute;</p>\r\n\r\n<p>Foto: fb/@folklorneslavnostioravice</p>\r\n', 'Oravice, Slovensko', 'published', 'Jaroslav Beredi', 0),
(13, 'Novoročný program TV Petrovec', 'Jaroslav Beredi', '2019-12-06', 'obr1.jpg', '<p>V priebehu novembra a&nbsp;decembra členovia kult&uacute;rno-umeleck&eacute;ho spolku s&uacute; viac než akt&iacute;vni. Najm&auml; vďaka TV Petrovec nat&aacute;čaj&uacute; novoročn&yacute; program na t&eacute;mu priadky v&nbsp;Selenči. Do tohto projektu je zapojen&yacute; každ&yacute; k&uacute;tik n&aacute;&scaron;ho spolku. Členovia s&uacute; maxim&aacute;lne zodpovedn&iacute;, zorganizovan&iacute; a&nbsp;pln&iacute; entuziazmu.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/obr-priadky-2.jpg\" style=\"height:720px; width:960px\" /></p>\r\n\r\n<p>Za nami je už veľk&aacute; časť projektu a&nbsp;už očak&aacute;vame na posledn&eacute; časti nahr&aacute;vania. Aj touto cestou sa chceme poďakovať v&scaron;etk&yacute;m, ktor&iacute; &uacute;činkuj&uacute; v&nbsp;nahr&aacute;van&iacute;, pom&aacute;haj&uacute; pri realiz&aacute;cii samotn&eacute;ho projektu, v&scaron;etk&yacute;m rodičom a&nbsp;star&yacute;m rodičom, ktor&iacute; nezi&scaron;tne pripravili svoje deti a&nbsp;vn&uacute;čatk&aacute;, prichystali kroje a&nbsp;sladk&eacute; či slan&eacute; poch&uacute;ťky pre v&scaron;etk&yacute;ch, ktor&iacute; sa z&uacute;častnili doteraj&scaron;ieho nat&aacute;čania.</p>\r\n\r\n<p>D&uacute;fame, že aj ľudia, ktor&iacute; bud&uacute; sledovať novoročn&yacute; program TV Petrovec, bud&uacute; aspoň tak spokojn&iacute;, ako sme my. Priadky budete m&ocirc;cť sledovať v&nbsp;silvestrovsk&yacute; večer na TV Petrovec. Pre t&yacute;ch, ktor&iacute; maj&uacute; už in&eacute; pl&aacute;ny, zabezpeč&iacute;me nahr&aacute;vku, ktor&uacute; budeme zdieľať na na&scaron;ej webovej a&nbsp;facebookovej str&aacute;nke.</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/obr-priadky-3.jpg\" style=\"height:960px; width:720px\" /></p>\r\n', 'TV Petrovec, kus jana kollara, priadky', 'published', 'Jaroslav Beredi', 0),
(14, 'Na základe núdzového stavu v štáte', 'Jaroslav Beredi', '2020-03-16', 'KUS.jpg', '<p>Keďže n&aacute;&scaron; &scaron;t&aacute;t vyhl&aacute;sil n&uacute;dzov&yacute; stav, KUS J&aacute;na Koll&aacute;ra sa prip&aacute;ja k prosb&aacute;m ku v&scaron;etk&yacute;m ľudom, aby čo najviac zost&aacute;vali doma. V pr&iacute;pade, že star&scaron;&iacute; ľudia potrebuj&uacute; pomoc v podobe n&aacute;kupu potrav&iacute;n, či liekov, m&ocirc;žu sa ozvať na č&iacute;slo na plag&aacute;te.</p>\r\n\r\n<p>Buď odv&aacute;žny a zostaň doma!</p>\r\n\r\n<p><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/KUS.jpg\" style=\"height:960px; width:960px\" /><img alt=\"\" src=\"/dashboard/ckeditor/kcfinder-3.12/upload/images/kus2.jpg\" style=\"height:960px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'pomoc', 'published', 'Jaroslav Beredi', 0),
(15, 'ZOSTAŇ DOMA A HRAJ!', 'Jaroslav Beredi', '2020-04-25', 'marienka.png', '<p>V čase, keď v&scaron;etci mus&iacute;me byť doma, každ&yacute; rozm&yacute;&scaron;ľa ako zabiť voľn&yacute; čas. Selenčsk&iacute; muzikanti sa rozhodli zabaviť ľud&iacute;, ktor&iacute; zostan&uacute; doma a sleduj&uacute; ich na soci&aacute;lnej sieti Facebook. Takto podporili aj v&yacute;zvu #zostandomaahraj.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n<div id=\"fb-root\"></div>\r\n<script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v6.0&appId=239215892613&autoLogAppEvents=1\"></script>\r\n<div class=\"fb-post\" data-href=\"https://www.facebook.com/zlatko.klinovski/posts/2790749207714612\" data-show-text=\"true\" data-width=\"\"><blockquote cite=\"https://developers.facebook.com/zlatko.klinovski/posts/2790749207714612\" class=\"fb-xfbml-parse-ignore\"><p>ĽH SELENČA\r\nKALAPOŠI\r\nKOHÚTIK JARABÝ \r\nEmilija Kovačev Jaroslav Jaro Berédi Marian Castvan Robert Čapanda Juraj Súdi Juraj...</p>Uverejnil používateľ <a href=\"https://www.facebook.com/zlatko.klinovski\">Zlatko Klinovsky</a>&nbsp;<a href=\"https://developers.facebook.com/zlatko.klinovski/posts/2790749207714612\">Streda 8. apríla 2020</a></blockquote></div>', 'zostandoma, koronavirus', 'published', 'Jaroslav Beredi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varbinary(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_titul` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_function` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_name`, `user_lastname`, `user_titul`, `user_image`, `user_function`, `user_role`) VALUES
(1, 'jaroslav.beredi@kusjanakollara.org', 0xe10ebb4c18801fc96b0c4e5fd2a17338, 'Jaroslav', 'Beredi', 'Bc.', '13612327_10205318203749465_306213853260155397_n.jpg', '', ' admin'),
(3, 'andrea.soskicova@kusjanakollara.org', 0xb59440a5e345dc9bf1ff0da412dfd49c, 'Andrea', 'Šoškićová', '', '12313638_637773803029406_1046548926179884525_n.jpg', 'Vedúca detskej skupiny, pokladníčka', ' uzivatel'),
(7, 'admin@admin', 0xe0fbd62c325a9a39c174f703f1526ad38f9458929f9ca22c6a5ea8fa39da365a, 'admin', 'admin', '', 'person.jpg', '', ' admin'),
(4, 'dvrbova7@gmail.com', 0x69ff2eb3f4223b4a6d6f58bc33342d4b, 'Danka', 'Vŕbová', '', 'person.jpg', '', ' lektor'),
(5, 'juraj.sudi@kusjanakollara.org', 0x7f49c3d66f8e2a6c35c2e60dd6ea1ae6, 'Juraj', 'Súdi', '', 'person.jpg', 'Vedúci orchestra', ' uzivatel'),
(6, 'malvina.zolnanova@kusjanakollara.org', 0xa863a39c60b722f5185fecb5d8e8bda9, 'Malvína', 'Zolňanová', '', 'person.jpg', 'Predsedníčka spolku', ' moderator'),
(8, 'test@test', 0xa6f1d6f1eb6a67fac2ceb32b4533527a, 'test', 'test', '', 'person.jpg', '', ' admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
