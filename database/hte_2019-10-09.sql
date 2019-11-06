# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: hte
# Generation Time: 2019-10-09 11:09:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table districts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `province_id` int(11) DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;

INSERT INTO `districts` (`id`, `name`, `status`, `province_id`, `code`)
VALUES
	(1,'Thị xã Sông Cầu',1,1,'1876'),
	(2,'Thành phố Tuy Hòa',1,1,'1875'),
	(3,'Huyện Tuy An',1,1,'1874'),
	(4,'Huyện Tây Hòa',1,1,'1873'),
	(5,'Huyện Sông Hinh',1,1,'1872'),
	(6,'Huyện Sơn Hòa',1,1,'1871'),
	(7,'Huyện Phú Hòa',1,1,'1870'),
	(8,'Huyện Đồng Xuân',1,1,'1869'),
	(9,'Huyện Đông Hòa',1,1,'1868'),
	(10,'Thị xã Bình Minh',1,2,'8097'),
	(11,'Thành phố Vĩnh Long',1,2,'2055'),
	(12,'Huyện Vũng Liêm',1,2,'2054'),
	(13,'Huyện Trà Ôn',1,2,'2053'),
	(14,'Huyện Tam Bình',1,2,'2052'),
	(15,'Huyện Mang Thít',1,2,'2051'),
	(16,'Huyện Long Hồ',1,2,'2050'),
	(17,'Huyện Bình Tân',1,2,'2049'),
	(18,'Thành phố Trà Vinh',1,3,'2041'),
	(19,'Huyện Trà Cú',1,3,'2040'),
	(20,'Huyện Tiểu Cần',1,3,'2039'),
	(21,'Huyện Duyên Hải',1,3,'2038'),
	(22,'Huyện Châu Thành',1,3,'2037'),
	(23,'Huyện Cầu Ngang',1,3,'2036'),
	(24,'Huyện Cầu Kè',1,3,'2035'),
	(25,'Huyện Càng Long',1,3,'2034'),
	(26,'Thị xã Hương Thủy',1,4,'2023'),
	(27,'Thành phố Huế',1,4,'2022'),
	(28,'Huyện Quảng Điền',1,4,'2021'),
	(29,'Huyện Phú Vang',1,4,'2020'),
	(30,'Huyện Phú Lộc',1,4,'2019'),
	(31,'Huyện Phong Điền',1,4,'2018'),
	(32,'Huyện Nam Đông',1,4,'2017'),
	(33,'Thị Xã Hương Trà',1,4,'2016'),
	(34,'Huyện A Lưới',1,4,'2015'),
	(35,'Huyện Đông Sơn',1,5,'1990'),
	(36,'Huyện Hà Trung',1,5,'1991'),
	(37,'Huyện Hậu Lộc',1,5,'1992'),
	(38,'Huyện Hoằng Hóa',1,5,'1993'),
	(39,'Huyện Nga Sơn',1,5,'1996'),
	(40,'Huyện Nông Cống',1,5,'2000'),
	(41,'Huyện Quảng Xương',1,5,'2003'),
	(42,'Huyện Thiệu Hóa',1,5,'2005'),
	(43,'Huyện Tĩnh Gia',1,5,'2008'),
	(44,'Huyện Triệu Sơn',1,5,'2009'),
	(45,'Huyện Vĩnh Lộc',1,5,'2010'),
	(46,'Huyện Yên Định',1,5,'2011'),
	(47,'Thành phố Thanh Hóa',1,5,'2012'),
	(48,'Thị xã Bỉm Sơn',1,5,'2013'),
	(49,'Thị xã Sầm Sơn',1,5,'2014'),
	(50,'Huyện Đồng Hỷ',1,6,'1981'),
	(51,'Thành phố Sông Công',1,6,'1987'),
	(52,'Thành phố Thái Nguyên',1,6,'1986'),
	(53,'Huyện Võ Nhai',1,6,'1985'),
	(54,'Huyện Phú Lương',1,6,'1984'),
	(55,'Huyện Phú Bình',1,6,'1983'),
	(56,'Huyện Phổ Yên',1,6,'1982'),
	(57,'Huyện Định Hóa',1,6,'1980'),
	(58,'Huyện Đại Từ',1,6,'1979'),
	(59,'Huyện Vũ Thư',1,7,'1977'),
	(60,'Huyện Tiền Hải',1,7,'1976'),
	(61,'Huyện Thái Thụy',1,7,'1975'),
	(62,'Huyện Quỳnh Phụ',1,7,'1974'),
	(63,'Huyện Kiến Xương',1,7,'1973'),
	(64,'Huyện Hưng Hà',1,7,'1972'),
	(65,'Huyện Đông Hưng',1,7,'1971'),
	(66,'Thành phố Thái Bình',1,7,'1978'),
	(67,'Thành phố Tây Ninh',1,8,'1970'),
	(68,'Huyện Trảng Bàng',1,8,'1969'),
	(69,'Huyện Tân Châu',1,8,'1968'),
	(70,'Huyện Tân Biên',1,8,'1967'),
	(71,'Huyện Hòa Thành',1,8,'1966'),
	(72,'Huyện Gò Dầu',1,8,'1965'),
	(73,'Huyện Dương Minh Châu',1,8,'1964'),
	(74,'Huyện Châu Thành',1,8,'1963'),
	(75,'Huyện Bến Cầu',1,8,'1962'),
	(76,'Thành phố Sóc Trăng',1,9,'1950'),
	(77,'Thị xã Vĩnh Châu',1,9,'1949'),
	(78,'Huyện Trần Đề',1,9,'1948'),
	(79,'Huyện Thạnh Trị',1,9,'1947'),
	(80,'Huyện Ngã Năm',1,9,'1946'),
	(81,'Huyện Mỹ Xuyên',1,9,'1945'),
	(82,'Huyện Mỹ Tú',1,9,'1944'),
	(83,'Huyện Long Phú',1,9,'1943'),
	(84,'Huyện Kế Sách',1,9,'1942'),
	(85,'Huyện Cù Lao Dung',1,9,'1941'),
	(86,'Huyện Châu Thành',1,9,'1940'),
	(87,'Huyện Ba Tơ',1,10,'1902'),
	(88,'Huyện Bình Sơn',1,10,'1903'),
	(89,'Huyện Đức Phổ',1,10,'1904'),
	(90,'Huyện Minh Long',1,10,'1906'),
	(91,'Huyện Mộ Đức',1,10,'1907'),
	(92,'Huyện Nghĩa Hành',1,10,'1908'),
	(93,'Huyện Sơn Tịnh',1,10,'1911'),
	(94,'Huyện Tư Nghĩa',1,10,'1914'),
	(95,'Thành phố Quảng Ngãi',1,10,'1915'),
	(96,'Huyện Bắc Trà My',1,11,'1884'),
	(97,'Thị xã Điện Bàn',1,11,'1886'),
	(98,'Huyện Duy Xuyên',1,11,'1888'),
	(99,'Huyện Núi Thành',1,11,'1893'),
	(100,'Huyện Phú Ninh',1,11,'1894'),
	(101,'Huyện Quế Sơn',1,11,'1896'),
	(102,'Huyện Thăng Bình',1,11,'1898'),
	(103,'Huyện Tiên Phước',1,11,'1899'),
	(104,'Thành phố Hội An',1,11,'1900'),
	(105,'Thành phố Tam Kỳ',1,11,'1901'),
	(106,'Huyện Lâm Thao',1,12,'1858'),
	(107,'Huyện Phù Ninh',1,12,'1859'),
	(108,'Huyện Tam Nông',1,12,'1860'),
	(109,'Thành phố Việt Trì',1,12,'1866'),
	(110,'Thị xã Phú Thọ',1,12,'1867'),
	(111,'Thành phố Phan Rang-Tháp Chàm',1,13,'1854'),
	(112,'Huyện Thuận Nam',1,13,'1853'),
	(113,'Huyện Thuận Bắc',1,13,'1852'),
	(114,'Huyện Ninh Sơn',1,13,'1851'),
	(115,'Huyện Ninh Phước',1,13,'1850'),
	(116,'Huyện Ninh Hải',1,13,'1849'),
	(117,'Huyên Bác ái',1,13,'1848'),
	(118,'Thành phố Tam Điệp',1,14,'1847'),
	(119,'Huyện Yên Mô',1,14,'1845'),
	(120,'Huyện Yên Khánh',1,14,'1844'),
	(121,'Huyện Nho Quan',1,14,'1843'),
	(122,'Huyện Kim Sơn',1,14,'1842'),
	(123,'Huyện Hoa Lư',1,14,'1841'),
	(124,'Huyện Gia Viễn',1,14,'1840'),
	(125,'Thành phố Ninh Bình',1,14,'1846'),
	(126,'Thị xã Kiến Tường',1,15,'2098'),
	(127,'Thành phố Tân An',1,15,'1809'),
	(128,'Huyện Vĩnh Hưng',1,15,'1808'),
	(129,'Huyện Thủ Thừa',1,15,'1807'),
	(130,'Huyện Thạnh Hóa',1,15,'1806'),
	(131,'Huyện Tân Trụ',1,15,'1805'),
	(132,'Huyện Tân Thạnh',1,15,'1804'),
	(133,'Huyện Tân Hưng',1,15,'1803'),
	(134,'Huyện Mộc Hóa',1,15,'1802'),
	(135,'Huyện Đức Huệ',1,15,'1801'),
	(136,'Huyện Đức Hòa',1,15,'1800'),
	(137,'Huyện Châu Thành',1,15,'1799'),
	(138,'Huyện Cần Giuộc',1,15,'1798'),
	(139,'Huyện Cần Đước',1,15,'1797'),
	(140,'Huyện Bến Lức',1,15,'1796'),
	(141,'Thành phố Đà Lạt',1,16,'1775'),
	(142,'Thành phố Bảo Lộc',1,16,'1774'),
	(143,'Huyện Lâm Hà',1,16,'1773'),
	(144,'Huyện Lạc Dương',1,16,'1772'),
	(145,'Huyện Đức Trọng',1,16,'1771'),
	(146,'Huyện Đơn Dương',1,16,'1770'),
	(147,'Huyện Di Linh',1,16,'1769'),
	(148,'Huyện Đam Rông',1,16,'1768'),
	(149,'Huyện Đạ Tẻh',1,16,'1767'),
	(150,'Huyện Đạ Huoai',1,16,'1766'),
	(151,'Huyện Cát Tiên',1,16,'1765'),
	(152,'Huyện Bảo Lâm',1,16,'1764'),
	(153,'Huyện Phong Thổ',1,17,'1758'),
	(154,'Huyện Sìn Hồ',1,17,'1759'),
	(155,'Huyện Tam Đường',1,17,'1760'),
	(156,'Huyện Tân Uyên',1,17,'1761'),
	(157,'Huyện Than Uyên',1,17,'1762'),
	(158,'Thành phố Lai Châu',1,17,'1763'),
	(159,'Huyện Đắk Glei',1,18,'1748'),
	(160,'Huyện Đắk Hà',1,18,'1749'),
	(161,'Huyện Đắk Tô',1,18,'1750'),
	(162,'Huyện Kon Plông',1,18,'1751'),
	(163,'Huyện Kon Rẫy',1,18,'1752'),
	(164,'Huyện Ngọc Hồi',1,18,'1753'),
	(165,'Huyện Sa Thầy',1,18,'1754'),
	(166,'Huyện Tu Mơ Rông',1,18,'1755'),
	(167,'Thành phố Kon Tum',1,18,'1756'),
	(168,'Huyện Giồng Riềng',1,19,'1737'),
	(169,'Huyện Gò Quao',1,19,'1738'),
	(170,'Huyện Tân Hiệp',1,19,'1743'),
	(171,'Huyện An Biên',1,19,'1733'),
	(172,'Huyện An Minh',1,19,'1734'),
	(173,'Huyện Châu Thành',1,19,'1735'),
	(174,'Huyện Giang Thành',1,19,'1736'),
	(175,'Huyện Hòn Đất',1,19,'1739'),
	(176,'Huyện Kiên Lương',1,19,'1741'),
	(177,'Huyện Phú Quốc',1,19,'1742'),
	(178,'Huyện U Minh Thượng',1,19,'1744'),
	(179,'Huyện Vĩnh Thuận',1,19,'1745'),
	(180,'Thành phố Rạch Giá',1,19,'1746'),
	(181,'Thị xã Hà Tiên',1,19,'1747'),
	(182,'Huyện Cao Phong',1,20,'1703'),
	(183,'Huyện Đà Bắc',1,20,'1704'),
	(184,'Huyện Kim Bôi',1,20,'1705'),
	(185,'Huyện Kỳ Sơn',1,20,'1706'),
	(186,'Huyện Lạc Thủy',1,20,'1708'),
	(187,'Huyện Lương Sơn',1,20,'1709'),
	(188,'Huyện Yên Thủy',1,20,'1712'),
	(189,'Thành phố Hòa Bình',1,20,'1713'),
	(190,'Thị xã Long Mỹ',1,21,'6289'),
	(191,'Thị xã Ngã Bảy',1,21,'1702'),
	(192,'Thành Phố Vị Thanh',1,21,'1701'),
	(193,'Huyện Vị Thủy',1,21,'1700'),
	(194,'Huyện Phụng Hiệp',1,21,'1699'),
	(195,'Huyện Long Mỹ',1,21,'1698'),
	(196,'Huyện Châu Thành A',1,21,'1697'),
	(197,'Huyện Châu Thành',1,21,'1696'),
	(198,'Huyện Cẩm Xuyên',1,22,'1672'),
	(199,'Huyện Can Lộc',1,22,'1673'),
	(200,'Huyện Lộc Hà',1,22,'1678'),
	(201,'Huyện Thạch Hà',1,22,'1680'),
	(202,'Thành phố Hà Tĩnh',1,22,'1682'),
	(203,'Thị xã An Khê',1,23,'1654'),
	(204,'Thị xã AYun Pa',1,23,'1653'),
	(205,'Thành phố PleiKu',1,23,'1652'),
	(206,'Huyện Phú Thiện',1,23,'1651'),
	(207,'Huyện Mang Yang',1,23,'1650'),
	(208,'Huyện Krông Pa',1,23,'1649'),
	(209,'Huyện Kông Chro',1,23,'1648'),
	(210,'Huyện KBang',1,23,'1647'),
	(211,'Huyện Ia Pa',1,23,'1646'),
	(212,'Huyện Ia Grai',1,23,'1645'),
	(213,'Huyện Đức Cơ',1,23,'1644'),
	(214,'Huyện Đăk Pơ',1,23,'1643'),
	(215,'Huyện Đăk Đoa',1,23,'1642'),
	(216,'Huyện Chư Prông',1,23,'1641'),
	(217,'Huyện Chư Sê',1,23,'1640'),
	(218,'Huyện Chư Pưh',1,23,'1639'),
	(219,'Huyện Chư Păh',1,23,'1638'),
	(220,'Huyện Cao Lãnh',1,24,'16127'),
	(221,'Thành Phố Sa Đéc',1,24,'1637'),
	(222,'Thị xã Hồng Ngự',1,24,'1636'),
	(223,'Thành phố Cao Lãnh',1,24,'1635'),
	(224,'Huyện Tháp Mười',1,24,'1634'),
	(225,'Huyện Thanh Bình',1,24,'1633'),
	(226,'Huyện Tân Hồng',1,24,'1632'),
	(227,'Huyện Tam Nông',1,24,'1631'),
	(228,'Huyện Lấp Vò',1,24,'1630'),
	(229,'Huyện Lai Vung',1,24,'1629'),
	(230,'Huyện Hồng Ngự',1,24,'1628'),
	(231,'Huyện Châu Thành',1,24,'1627'),
	(232,'Huyện Điện Biên',1,25,'1606'),
	(233,'Huyện Điện Biên Đông',1,25,'1607'),
	(234,'Huyện Mường Ảng',1,25,'1610'),
	(235,'Huyện Tuần Giáo',1,25,'1612'),
	(236,'Thành phố Điện Biên phủ',1,25,'1613'),
	(237,'Thị xã Gia Nghĩa',1,26,'1605'),
	(238,'Huyện Tuy Đức',1,26,'1604'),
	(239,'Huyện Krông Nô',1,26,'1603'),
	(240,'Huyện Đắk Song',1,26,'1602'),
	(241,'Huyện Đắk RLấp',1,26,'1601'),
	(242,'Huyện Đắk Mil',1,26,'1600'),
	(243,'Huyện Đắk GLong',1,26,'1599'),
	(244,'Huyện Cư Jút',1,26,'1598'),
	(245,'Thị xã Buôn Hồ',1,27,'1597'),
	(246,'Thành phố Buôn Ma Thuột',1,27,'1596'),
	(247,'Huyện MDrắk',1,27,'1595'),
	(248,'Huyện Lắk',1,27,'1594'),
	(249,'Huyện Krông Pắk',1,27,'1593'),
	(250,'Huyện Krông Năng',1,27,'1592'),
	(251,'Huyện Krông Búk',1,27,'1591'),
	(252,'Huyện Krông Bông',1,27,'1590'),
	(253,'Huyện Krông Ana',1,27,'1589'),
	(254,'Huyện EaHLeo',1,27,'1588'),
	(255,'Huyện Ea Súp',1,27,'1587'),
	(256,'Huyện Ea Kar',1,27,'1586'),
	(257,'Huyện Cư MGar',1,27,'1585'),
	(258,'Huyện Cư Kuin',1,27,'1584'),
	(259,'Huyện Buôn Đôn',1,27,'1583'),
	(260,'Huyện Hòa An',1,28,'1574'),
	(261,'Thành Phố Cao Bằng',1,28,'1582'),
	(262,'Huyện Trùng Khánh',1,28,'1581'),
	(263,'Huyện Trà Lĩnh',1,28,'1580'),
	(264,'Huyện Thông Nông',1,28,'1579'),
	(265,'Huyện Thạch An',1,28,'1578'),
	(266,'Huyện Quảng Uyên',1,28,'1577'),
	(267,'Huyện Phục Hòa',1,28,'1576'),
	(268,'Huyện Nguyên Bình',1,28,'1575'),
	(269,'Huyện Hà Quảng',1,28,'1573'),
	(270,'Huyện Hạ Lang',1,28,'1572'),
	(271,'Huyện Bảo Lâm',1,28,'1571'),
	(272,'Huyện Bảo Lạc',1,28,'1570'),
	(273,'Thành phố Cà Mau',1,29,'1569'),
	(274,'Huyện U Minh',1,29,'1568'),
	(275,'Huyện Trần Văn Thời',1,29,'1567'),
	(276,'Huyện Thới Bình',1,29,'1566'),
	(277,'Huyện Phú Tân',1,29,'1565'),
	(278,'Huyện Ngọc Hiển',1,29,'1564'),
	(279,'Huyện Năm Căn',1,29,'1563'),
	(280,'Huyện Đầm Dơi',1,29,'1562'),
	(281,'Huyện Cái Nước',1,29,'1561'),
	(282,'Phú Riềng',1,30,'2106'),
	(283,'Thị xã Phước Long',1,30,'1550'),
	(284,'Thị xã Đồng Xoài',1,30,'1549'),
	(285,'Thị xã Bình Long',1,30,'1548'),
	(286,'Huyện Lộc Ninh',1,30,'1547'),
	(287,'Huyện Hớn Quản',1,30,'1546'),
	(288,'Huyện Đồng Phú',1,30,'1545'),
	(289,'Huyện Chơn Thành',1,30,'1544'),
	(290,'Huyện Bù Gia Mập',1,30,'1543'),
	(291,'Huyện Bù Đốp',1,30,'1542'),
	(292,'Huyện Bù Đăng',1,30,'1541'),
	(293,'Thị Xã Thuận An',1,31,'1101'),
	(294,'Thị Xã Dĩ An',1,31,'1102'),
	(295,'Thị Xã Tân Uyên',1,31,'1104'),
	(296,'Huyện Bàu Bàng',1,31,'1105'),
	(297,'Huyện Phú Giáo',1,31,'2087'),
	(298,'Thủ Dầu Một',1,31,'1100'),
	(299,'Thị Xã Bến Cát',1,31,'1103'),
	(300,'Bắc Tân Uyên',1,31,'2107'),
	(301,'Thành phố Bến Tre',1,32,'1529'),
	(302,'Huyện Thạnh Phú',1,32,'1528'),
	(303,'Huyện Mỏ Cày Nam',1,32,'1527'),
	(304,'Huyện Mỏ Cày Bắc',1,32,'1526'),
	(305,'Huyện Giồng Trôm',1,32,'1525'),
	(306,'Huyện Chợ Lách',1,32,'1524'),
	(307,'Huyện Châu Thành',1,32,'1523'),
	(308,'Huyện Bình Đại',1,32,'1522'),
	(309,'Huyện Ba Tri',1,32,'1521'),
	(310,'Huyện Yên Phong',1,33,'1518'),
	(311,'Huyện Tiên Du',1,33,'1517'),
	(312,'Huyện Quế Võ',1,33,'1515'),
	(313,'Thị xã Từ Sơn',1,33,'1520'),
	(314,'Thành phố Bắc Ninh',1,33,'1519'),
	(315,'Huyện Thuận Thành',1,33,'1516'),
	(316,'Huyện Lương Tài',1,33,'1514'),
	(317,'Huyện Gia Bình',1,33,'1513'),
	(318,'Huyện Đông Hải',1,34,'1506'),
	(319,'Thị Xã Giá Rai',1,34,'1507'),
	(320,'Huyện Hòa Bình',1,34,'1508'),
	(321,'Huyện Hồng Dân',1,34,'1509'),
	(322,'Huyện Phước Long',1,34,'1510'),
	(323,'Huyện Vĩnh Lợi',1,34,'1511'),
	(324,'Thành Phố Bạc Liêu',1,34,'1512'),
	(325,'Thành phố Bắc Kạn',1,35,'1505'),
	(326,'Huyện Pác Nặm',1,35,'1504'),
	(327,'Huyện Ngân Sơn',1,35,'1503'),
	(328,'Huyện Na Rì',1,35,'1502'),
	(329,'Huyện Chợ Mới',1,35,'1501'),
	(330,'Huyện Chợ Đồn',1,35,'1500'),
	(331,'Huyện Bạch Thông',1,35,'1499'),
	(332,'Huyện Ba Bể',1,35,'1498'),
	(333,'Huyện Châu Đức',1,36,'1480'),
	(334,'Huyện Đất Đỏ',1,36,'1482'),
	(335,'Huyện Long Điền',1,36,'1483'),
	(336,'Huyện Tân Thành',1,36,'1484'),
	(337,'Huyện Xuyên Mộc',1,36,'1485'),
	(338,'Thành phố Vũng Tàu',1,36,'1486'),
	(339,'Thành Phố Bà Rịa',1,36,'1487'),
	(340,'Thị xã Tân Châu',1,37,'1479'),
	(341,'Thành Phố Châu Đốc',1,37,'1478'),
	(342,'Thành phố Long Xuyên',1,37,'1477'),
	(343,'Huyện Tri Tôn',1,37,'1476'),
	(344,'Huyện Tịnh Biên',1,37,'1475'),
	(345,'Huyện Thoại Sơn',1,37,'1474'),
	(346,'Huyện Phú Tân',1,37,'1473'),
	(347,'Huyện Chợ Mới',1,37,'1472'),
	(348,'Huyện Châu Thành',1,37,'1471'),
	(349,'Huyện Châu Phú',1,37,'1470'),
	(350,'Huyện An Phú',1,37,'1469'),
	(351,'Huyện Cam Lâm',1,38,'1724'),
	(352,'Huyện Diên Khánh',1,38,'1725'),
	(353,'Huyện Khánh Sơn',1,38,'1726'),
	(354,'Huyện Khánh Vĩnh',1,38,'1727'),
	(355,'Thị Xã Ninh Hòa',1,38,'1728'),
	(356,'Huyện Vạn Ninh',1,38,'1730'),
	(357,'Thành phố Nha Trang',1,38,'1731'),
	(358,'Thành phố Cam Ranh',1,38,'1732'),
	(359,'Huyện Vị Xuyên',1,39,'1662'),
	(360,'thành phố Hà Giang',1,39,'1665'),
	(361,'Huyện Yên Minh',1,39,'1664'),
	(362,'Huyện Xín Mần',1,39,'1663'),
	(363,'Huyện Quang Bình',1,39,'1661'),
	(364,'Huyện Quản Bạ',1,39,'1660'),
	(365,'Huyện Mèo Vạc',1,39,'1659'),
	(366,'Huyện Hoàng Su Phì',1,39,'1658'),
	(367,'Huyện Đồng Văn',1,39,'1657'),
	(368,'Huyện Bắc Quang',1,39,'1656'),
	(369,'Huyện Bắc Mê',1,39,'1655'),
	(370,'Huyện Bình Xuyên',1,40,'2056'),
	(371,'Huyện Lập Thạch',1,40,'2057'),
	(372,'Huyện Sông Lô',1,40,'2058'),
	(373,'Huyện Tam Đảo',1,40,'2059'),
	(374,'Huyện Tam Dương',1,40,'2060'),
	(375,'Huyện Vĩnh Tường',1,40,'2061'),
	(376,'Huyện Yên Lạc',1,40,'2062'),
	(377,'Thành phố Vĩnh Yên',1,40,'2063'),
	(378,'Thị xã Phúc Yên',1,40,'2064'),
	(379,'Thị Xã An Nhơn',1,41,'14988'),
	(380,'Thành phố Quy Nhơn',1,41,'1540'),
	(381,'Huyện Vĩnh Thạnh',1,41,'1539'),
	(382,'Huyện Vân Canh',1,41,'1538'),
	(383,'Huyện Tuy Phước',1,41,'1537'),
	(384,'Huyện Tây Sơn',1,41,'1536'),
	(385,'Huyện Phù Cát',1,41,'1535'),
	(386,'Huyện Phù Mỹ',1,41,'1534'),
	(387,'Huyện Hoài Nhơn',1,41,'1533'),
	(388,'Huyện An Lão',1,41,'1532'),
	(389,'Huyện Hoài Ân',1,41,'1530'),
	(390,'Huyện Tân Phú Đông',1,42,'2030'),
	(391,'Huyện Cái Bè',1,42,'2024'),
	(392,'Thị xã Cai Lậy',1,42,'17533'),
	(393,'Thị xã Gò Công',1,42,'2033'),
	(394,'Thành phố Mỹ Tho',1,42,'2032'),
	(395,'Huyện Tân Phước',1,42,'2031'),
	(396,'Huyện Gò Công Tây',1,42,'2029'),
	(397,'Huyện Gò Công Đông',1,42,'2028'),
	(398,'Huyện Chợ Gạo',1,42,'2027'),
	(399,'Huyện Châu Thành',1,42,'2026'),
	(400,'Huyện Cai Lậy',1,42,'2025'),
	(401,'Huyện Cẩm Mỹ',1,43,'1615'),
	(402,'Huyện Định Quán',1,43,'1616'),
	(403,'Huyện Long Thành',1,43,'1617'),
	(404,'Huyện Nhơn Trạch',1,43,'1618'),
	(405,'Huyện Tân Phú',1,43,'1619'),
	(406,'Huyện Thống Nhất',1,43,'1620'),
	(407,'Huyện Trảng Bom',1,43,'1621'),
	(408,'Huyện Vĩnh Cửu',1,43,'1622'),
	(409,'Huyện Xuân Lộc',1,43,'1623'),
	(410,'Thị xã Long Khánh',1,43,'1625'),
	(411,'Thành phố Biên Hòa',1,43,'1624'),
	(412,'Huyện Diễn Châu',1,44,'1822'),
	(413,'Huyện Hưng Nguyên',1,44,'1824'),
	(414,'Huyện Nam Đàn',1,44,'1826'),
	(415,'Huyện Nghi Lộc',1,44,'1827'),
	(416,'Huyện Quỳnh Lưu',1,44,'1832'),
	(417,'Huyện Yên Thành',1,44,'1836'),
	(418,'Thành phố Vinh',1,44,'1837'),
	(419,'Thị xã Cửa Lò',1,44,'1838'),
	(420,'Thị xã Hoàng Mai',1,44,'2103'),
	(421,'Thị xã Quảng Yên',1,45,'17286'),
	(422,'Huyện Ba Chẽ',1,45,'1916'),
	(423,'Huyện Bình Liêu',1,45,'1917'),
	(424,'Huyện Đầm Hà',1,45,'1919'),
	(425,'Huyện Đông Triều',1,45,'1920'),
	(426,'Huyện Hải Hà',1,45,'1921'),
	(427,'Huyện Hoành Bồ',1,45,'1922'),
	(428,'Huyện Tiên Yên',1,45,'1923'),
	(429,'Huyện Vân Đồn',1,45,'1924'),
	(430,'Thành phố Hạ Long',1,45,'1926'),
	(431,'Thành phố Móng Cái',1,45,'1927'),
	(432,'Thành phố Cẩm Phả',1,45,'1928'),
	(433,'Thành phố Uông Bí',1,45,'1929'),
	(434,'Huyện Bố Trạch',1,46,'1877'),
	(435,'Huyện Lệ Thủy',1,46,'1878'),
	(436,'Huyện Quảng Ninh',1,46,'1880'),
	(437,'Thành phố Đồng Hới',1,46,'1883'),
	(438,'Huyện Tiên Lữ',1,47,'1719'),
	(439,'Huyện Kim Động',1,47,'1716'),
	(440,'Thành phố Hưng Yên',1,47,'1723'),
	(441,'Huyện Yên Mỹ',1,47,'1722'),
	(442,'Huyện Văn Lâm',1,47,'1721'),
	(443,'Huyện Văn Giang',1,47,'1720'),
	(444,'Huyện Phù Cừ',1,47,'1718'),
	(445,'Huyện Mỹ Hào',1,47,'1717'),
	(446,'Huyện Khoái Châu',1,47,'1715'),
	(447,'Huyện Ân Thi',1,47,'1714'),
	(448,'Huyện  Đức Linh',1,48,'1551'),
	(449,'Huyện Bắc Bình',1,48,'1552'),
	(450,'Huyện Hàm Tân',1,48,'1553'),
	(451,'Huyện Hàm Thuận Bắc',1,48,'1554'),
	(452,'Huyện Hàm Thuận Nam',1,48,'1555'),
	(453,'Huyện Tánh Linh',1,48,'1557'),
	(454,'Huyện Tuy Phong',1,48,'1558'),
	(455,'Thành phố Phan Thiết',1,48,'1559'),
	(456,'Thị xã La Gi',1,48,'1560'),
	(457,'Thành phố Nam Định',1,49,'1819'),
	(458,'Huyện Ý Yên',1,49,'1818'),
	(459,'Huyện Xuân Trường',1,49,'1817'),
	(460,'Huyện Vụ Bản',1,49,'1816'),
	(461,'Huyện Trực Ninh',1,49,'1815'),
	(462,'Huyện Nghĩa Hưng',1,49,'1814'),
	(463,'Huyện Nam Trực',1,49,'1813'),
	(464,'Huyện Mỹ Lộc',1,49,'1812'),
	(465,'Huyện Hải Hậu',1,49,'1811'),
	(466,'Huyện Giao Thủy',1,49,'1810'),
	(467,'Huyện Bảo Thắng',1,50,'1788'),
	(468,'Huyện Bát Xát',1,50,'1790'),
	(469,'Huyện Mường Khương',1,50,'1791'),
	(470,'Huyện Sa Pa',1,50,'1792'),
	(471,'Huyện Văn Bàn',1,50,'1794'),
	(472,'Thành phố Lào Cai',1,50,'1795'),
	(473,'Huyện Bình Lục',1,51,'1666'),
	(474,'Huyện Duy Tiên',1,51,'1667'),
	(475,'Huyện Kim Bảng',1,51,'1668'),
	(476,'Huyện Lý Nhân',1,51,'1669'),
	(477,'Huyện Thanh Liêm',1,51,'1670'),
	(478,'Thành phố Phủ Lý',1,51,'1671'),
	(479,'Quận Thốt Nốt',1,52,'1468'),
	(480,'Quận Ô Môn',1,52,'1467'),
	(481,'Quận Ninh Kiều',1,52,'1466'),
	(482,'Quận Cái Răng',1,52,'1465'),
	(483,'Quận Bình Thủy',1,52,'1464'),
	(484,'Huyện Vĩnh Thạnh',1,52,'1463'),
	(485,'Huyện Thới Lai',1,52,'1462'),
	(486,'Huyện Phong Điền',1,52,'1461'),
	(487,'Huyện Cờ Đỏ',1,52,'1460'),
	(488,'Thị xã Chí Linh',1,53,'1695'),
	(489,'Huyện Tứ Kỳ',1,53,'1693'),
	(490,'Huyện Thanh Miện',1,53,'1692'),
	(491,'Huyện Thanh Hà',1,53,'1691'),
	(492,'Huyện Nam Sách',1,53,'1689'),
	(493,'Huyện Kim Thành',1,53,'1687'),
	(494,'Huyện Gia Lộc',1,53,'1686'),
	(495,'Huyện Cẩm Giàng',1,53,'1685'),
	(496,'Huyện Bình Giang',1,53,'1684'),
	(497,'Thành phố Hải Dương',1,53,'1694'),
	(498,'Huyện Ninh Giang',1,53,'1690'),
	(499,'Huyện Kinh Môn',1,53,'1688'),
	(500,'Thành phố Bắc Giang',1,54,'1497'),
	(501,'Huyện Yên Thế',1,54,'1496'),
	(502,'Huyện Yên Dũng',1,54,'1495'),
	(503,'Huyện Việt Yên',1,54,'1494'),
	(504,'Huyện Tân Yên',1,54,'1493'),
	(505,'Huyện Sơn Động',1,54,'1492'),
	(506,'Huyện Lục Ngạn',1,54,'1491'),
	(507,'Huyện Lục Nam',1,54,'1490'),
	(508,'Huyện Lạng Giang',1,54,'1489'),
	(509,'Huyện Hiệp Hòa',1,54,'1488'),
	(510,'Huyện Cam Lộ',1,55,'1930'),
	(511,'Huyện Đa Krông',1,55,'1932'),
	(512,'Huyện Gio Linh',1,55,'1933'),
	(513,'Huyện Hải Lăng',1,55,'1934'),
	(514,'Huyện Hướng Hóa',1,55,'1935'),
	(515,'Huyện Triệu Phong',1,55,'1936'),
	(516,'Huyện Vĩnh Linh',1,55,'1937'),
	(517,'Thành phố Đông Hà',1,55,'1938'),
	(518,'Thị xã Quảng Trị',1,55,'1939'),
	(519,'Huyện Lâm Bình',1,56,'2100'),
	(520,'Thành phố Tuyên Quang',1,56,'2047'),
	(521,'Huyện Yên Sơn',1,56,'2046'),
	(522,'Huyện Sơn Dương',1,56,'2045'),
	(523,'Huyện Na Hang',1,56,'2044'),
	(524,'Huyện Hàm Yên',1,56,'2043'),
	(525,'Huyện Chiêm Hóa',1,56,'2042'),
	(526,'Quận Hồng Bàng',1,57,'1106'),
	(527,'Quận Ngô Quyền',1,57,'1107'),
	(528,'Quận Lê Chân',1,57,'1108'),
	(529,'Quận Hải An',1,57,'1109'),
	(530,'Quận Kiến An',1,57,'1110'),
	(531,'Huyện An Dương',1,57,'2076'),
	(532,'Huyện An Lão',1,57,'2077'),
	(533,'Huyện Kiến Thụy',1,57,'2080'),
	(534,'Huyện Thủy Nguyên',1,57,'2081'),
	(535,'Huyện Tiên Lãng',1,57,'2082'),
	(536,'Huyện Vĩnh Bảo',1,57,'2083'),
	(537,'Quận Dương Kinh',1,57,'2084'),
	(538,'Quận Đồ Sơn',1,57,'2085'),
	(539,'Huyện Cao Lộc',1,58,'1778'),
	(540,'Huyện Chi Lăng',1,58,'1779'),
	(541,'Huyện Đình Lập',1,58,'1780'),
	(542,'Huyện Hữu Lũng',1,58,'1781'),
	(543,'Huyện Lộc Bình',1,58,'1782'),
	(544,'Thành phố Lạng Sơn',1,58,'1786'),
	(545,'Huyện Lục Yên',1,59,'2065'),
	(546,'Huyện Trấn Yên',1,59,'2068'),
	(547,'Huyện Văn Yên',1,59,'2070'),
	(548,'Huyện Yên Bình',1,59,'2071'),
	(549,'Thành phố Yên Bái',1,59,'2072'),
	(550,'Huyện Thuận Châu',1,60,'1959'),
	(551,'Huyện Mai Sơn',1,60,'1952'),
	(552,'Huyện Vân Hồ',1,60,'2101'),
	(553,'Thành phố Sơn La',1,60,'1961'),
	(554,'Huyện Yên Châu',1,60,'1960'),
	(555,'Huyện Sốp Cộp',1,60,'1958'),
	(556,'Huyện Sông Mã',1,60,'1957'),
	(557,'Huyện Quỳnh Nhai',1,60,'1956'),
	(558,'Huyện Phù Yên',1,60,'1955'),
	(559,'Huyện Mường La',1,60,'1954'),
	(560,'Huyện Mộc Châu',1,60,'1953'),
	(561,'Huyện Bắc Yên',1,60,'1951'),
	(562,'Huyện Hòa Vang',1,61,'2074'),
	(563,'Quận Thanh Khê',1,61,'1094'),
	(564,'Quận Cẩm Lệ',1,61,'1095'),
	(565,'Quận Hải Châu',1,61,'1096'),
	(566,'Quận Ngũ Hành Sơn',1,61,'1097'),
	(567,'Quận Sơn Trà',1,61,'1098'),
	(568,'Quận Liên Chiểu',1,61,'1099'),
	(569,'Huyện Cần Giờ',1,62,'1137'),
	(570,'Huyện Củ Chi',1,62,'1136'),
	(571,'Huyện Bình Chánh',1,62,'1093'),
	(572,'Huyện Nhà Bè',1,62,'1092'),
	(573,'Huyện Hóc Môn',1,62,'1091'),
	(574,'Quận Bình Tân',1,62,'1090'),
	(575,'Quận Thủ Đức',1,62,'1089'),
	(576,'Quận Bình Thạnh',1,62,'1088'),
	(577,'Quận Gò Vấp',1,62,'1087'),
	(578,'Quận Phú Nhuận',1,62,'1086'),
	(579,'Quận Tân Phú',1,62,'1085'),
	(580,'Quận Tân Bình',1,62,'1084'),
	(581,'Quận 12',1,62,'1083'),
	(582,'Quận 11',1,62,'1082'),
	(583,'Quận 10',1,62,'1081'),
	(584,'Quận 9',1,62,'1080'),
	(585,'Quận 8',1,62,'1079'),
	(586,'Quận 7',1,62,'1078'),
	(587,'Quận 6',1,62,'1077'),
	(588,'Quận 5',1,62,'1076'),
	(589,'Quận 4',1,62,'1075'),
	(590,'Quận 3',1,62,'1074'),
	(591,'Quận 2',1,62,'128'),
	(592,'Quận 1',1,62,'127'),
	(593,'Thanh Trì',1,63,'27'),
	(594,'Thanh Oai',1,63,'26'),
	(595,'Mê Linh',1,63,'19'),
	(596,'Hoài Đức',1,63,'18'),
	(597,'Gia Lâm',1,63,'17'),
	(598,'Đông Anh',1,63,'16'),
	(599,'Đan Phượng',1,63,'15'),
	(600,'Chương Mỹ',1,63,'14'),
	(601,'Hà Đông',1,63,'11'),
	(602,'Từ Liêm',1,63,'29'),
	(603,'Ba Đình',1,63,'2'),
	(604,'Thanh Xuân',1,63,'10'),
	(605,'Hoàng Mai',1,63,'9'),
	(606,'Hai Bà Trưng',1,63,'8'),
	(607,'Đống Đa',1,63,'7'),
	(608,'Cầu Giấy',1,63,'6'),
	(609,'Long Biên',1,63,'5'),
	(610,'Tây Hồ',1,63,'4'),
	(611,'Hoàn Kiếm',1,63,'3');

/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `ref_id` int(11) DEFAULT NULL,
  `size` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `title`, `source`, `created_at`, `updated_at`, `status`, `created_by`, `type`, `ref_id`, `size`)
VALUES
	(3,'15782774_230179237436012_222810870_n.jpg','3012/10000_1483078230_dRqoDBHnJf.jpg','2016-12-30 20:10:30','2016-12-30 20:11:20',1,1,0,1,25226),
	(4,'15781865_230179290769340_22110110_n.jpg','3012/10000_1483078265_uJdYcIBZxm.jpg','2016-12-30 20:11:05','2016-12-30 20:11:20',1,1,0,1,32767),
	(5,'15820144_230179174102685_841864340_n.jpg','3012/10000_1483078270_Vu2xjEZQOi.jpg','2016-12-30 20:11:10','2016-12-30 20:11:20',1,1,0,1,11505),
	(8,'WP_20150712_037.jpg','3012/10000_1483078386_XvdPKhaoZz.jpg','2016-12-30 20:13:06','2016-12-30 20:15:55',1,1,0,2,10170),
	(9,'images.jpg','3012/10000_1483078525_xPbw3D7GY1.jpg','2016-12-30 20:15:25','2016-12-30 20:15:55',1,1,0,2,8532),
	(10,'WP_20150712_002.jpg','3012/10000_1483078540_sHHazNCtYk.jpg','2016-12-30 20:15:40','2016-12-30 20:15:55',1,1,0,2,24115),
	(11,'xrz1452043080.jpg','3012/10000_1483078549_wIqw87JaWB.jpg','2016-12-30 20:15:49','2016-12-30 20:15:55',1,1,0,2,19414);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `view_counter` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `category_id`, `summary`, `content`, `view_counter`, `status`, `image`, `created_by`, `created_at`, `updated_at`, `featured`)
VALUES
	(1,'Cụm danh từ dqdwq',1,'wcqwcdsah','<p>qưeqweqưc</p>\r\n',0,1,'1612/cum-danh-tu.jpeg',1,'2016-12-17 06:53:34','2016-12-19 03:59:54',1),
	(2,'Cụm danh từ',1,'bhjnmk,l','<p>cqwcqwcqw</p>\r\n',0,1,'1812/cum-danh-tu.jpeg',1,'2016-12-19 04:00:15','2016-12-19 04:00:15',1),
	(3,'cuong duoc chua',1,'dq','<p>wqqwcwqc</p>\r\n',0,1,'1812/cuong-duoc-chua.png',1,'2016-12-19 04:02:20','2016-12-19 04:02:20',1),
	(4,'Tên danh mục (Tiếng Anh) ',1,'cqwcqw','<table class=\"table borderless\" style=\"box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; background-color: rgb(236, 240, 245); width: 838px; max-width: 100%; margin-bottom: 20px; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">\r\n	<tbody style=\"box-sizing: border-box;\">\r\n		<tr style=\"box-sizing: border-box;\">\r\n			<th class=\"table_right_middle\" style=\"box-sizing: border-box; padding: 8px; text-align: right !important; vertical-align: top; border-top: 1px solid rgb(244, 244, 244); border-right: none !important; border-bottom: none !important; border-left: none !important; border-image: initial !important; line-height: 1.42857;\">T&ecirc;n danh mục (Tiếng Anh)<br />\r\n			&nbsp;</th>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n',0,1,'1812/ten-danh-muc-tieng-anh.png',1,'2016-12-19 04:02:49','2016-12-19 04:02:49',1),
	(5,'cuong duoc chua',1,'f23','<p>f32</p>\r\n',0,1,'1812/cuong-duoc-chua.jpg',1,'2016-12-19 05:10:50','2016-12-19 05:10:50',1),
	(6,'hehe',1,'wqdqwd','<p>dưqdqdw</p>\r\n',0,1,'1812/hehe.jpg',1,'2016-12-19 05:13:19','2016-12-19 05:13:19',1);

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_categories`;

CREATE TABLE `news_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;

INSERT INTO `news_categories` (`id`, `parent_id`, `status`, `created_at`, `updated_at`, `name`)
VALUES
	(1,0,1,'2016-12-16 23:39:58','2016-12-18 16:28:43','Tin tức'),
	(2,0,1,'2016-12-16 23:41:14','2016-12-18 19:39:56','Tuyển dụng'),
	(4,0,1,'2016-12-18 19:39:16','2016-12-18 19:39:16','Thông báo');

/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(9,2),
	(10,2),
	(9,3),
	(10,3);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permission_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `module`, `action`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'users.create',NULL,'create','Thêm mới Quản trị','Create Users','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(2,'users.read',NULL,'read','Xem Quản trị','Read Users','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(3,'users.update',NULL,'update','Cập nhật Quản trị','Update Users','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(4,'users.delete',NULL,'delete','Xóa Quản trị','Delete Users','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(5,'acl.create',NULL,'create','Thêm mới Acl','Create Acl','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(6,'acl.read',NULL,'read','Xem Acl','Read Acl','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(7,'acl.update',NULL,'update','Cập nhật Acl','Update Acl','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(8,'acl.delete',NULL,'delete','Xóa Acl','Delete Acl','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(9,'profile.read',NULL,'read','Xem Profile','Read Profile','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(10,'profile.update',NULL,'update','Cập nhật Profile','Update Profile','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(11,'roles.read','roles','read','Xem Vai trò','Read Roles','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(12,'roles.create','roles','create','Thêm mới Vai trò','Create Roles','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(13,'roles.update','roles','update','Cập nhật Vai trò','Update Roles','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(14,'roles.delete','roles','delete','Xóa Vai trò','Delete Roles','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(15,'customer_packages.read','customer_packages','read','Xem Gói khách hàng','Read Customer_packages','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(16,'customer_packages.update','customer_packages','update','Cập nhật Gói khách hàng','Update Customer_packages','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(17,'customer_payments.read','customer_payments','read','Xem Thanh toán','Read Customer_payments','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(18,'customer_payments.create','customer_payments','create','Thêm mới Thanh toán','Create Customer_payments','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(19,'customer_payments.update','customer_payments','update','Cập nhật Thanh toán','Update Customer_payments','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(20,'customer_payments.delete','customer_payments','delete','Xóa Thanh toán','Delete Customer_payments','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(21,'customers.addition','customers','addition','Addition Khách hàng','Addition Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(22,'customers.add','customers','add','Add Khách hàng','Add Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(23,'customers.read','customers','read','Xem Khách hàng','Read Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(24,'customers.create','customers','create','Thêm mới Khách hàng','Create Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(25,'customers.update','customers','update','Cập nhật Khách hàng','Update Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(26,'customers.delete','customers','delete','Xóa Khách hàng','Delete Customers','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(27,'partners.read','partners','read','Xem Đối tác','Read Partners','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(28,'partners.create','partners','create','Thêm mới Đối tác','Create Partners','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(29,'partners.update','partners','update','Cập nhật Đối tác','Update Partners','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(30,'partners.delete','partners','delete','Xóa Đối tác','Delete Partners','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(31,'static_pages.read','static_pages','read','Xem Trang tĩnh','Read Static_pages','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(32,'static_pages.create','static_pages','create','Thêm mới Trang tĩnh','Create Static_pages','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(33,'static_pages.update','static_pages','update','Cập nhật Trang tĩnh','Update Static_pages','2019-08-26 23:13:41','2019-08-26 23:13:41'),
	(34,'static_pages.delete','static_pages','delete','Xóa Trang tĩnh','Delete Static_pages','2019-08-26 23:13:41','2019-08-26 23:13:41');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table provinces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;

INSERT INTO `provinces` (`id`, `name`, `status`, `code`)
VALUES
	(1,'Phú Yên',0,'869'),
	(2,'Vĩnh Long',0,'868'),
	(3,'Trà Vinh',0,'867'),
	(4,'Thừa Thiên Huế',0,'866'),
	(5,'Thanh Hóa',0,'865'),
	(6,'Thái Nguyên',0,'864'),
	(7,'Thái Bình',0,'863'),
	(8,'Tây Ninh',0,'862'),
	(9,'Sóc Trăng',0,'861'),
	(10,'Quảng Ngãi',0,'860'),
	(11,'Quảng Nam',0,'859'),
	(12,'Phú Thọ',0,'858'),
	(13,'Ninh Thuận',0,'857'),
	(14,'Ninh Bình',0,'856'),
	(15,'Long An',0,'855'),
	(16,'Lâm Đồng',0,'854'),
	(17,'Lai Châu',0,'853'),
	(18,'Kon Tum',0,'852'),
	(19,'Kiên Giang',0,'851'),
	(20,'Hòa Bình',0,'850'),
	(21,'Hậu Giang',0,'849'),
	(22,'Hà Tĩnh',0,'848'),
	(23,'Gia Lai',0,'847'),
	(24,'Đồng Tháp',0,'846'),
	(25,'Điện Biên',0,'845'),
	(26,'Đắk Nông',0,'844'),
	(27,'Đắk Lắk',0,'843'),
	(28,'Cao Bằng',0,'842'),
	(29,'Cà Mau',0,'841'),
	(30,'Bình Phước',0,'840'),
	(31,'Bình Dương',0,'839'),
	(32,'Bến Tre',0,'838'),
	(33,'Bắc Ninh',0,'837'),
	(34,'Bạc Liêu',0,'836'),
	(35,'Bắc Kạn',0,'835'),
	(36,'Bà Rịa - Vũng Tàu',0,'834'),
	(37,'An Giang',0,'833'),
	(38,'Khánh Hòa',0,'831'),
	(39,'Hà Giang',0,'830'),
	(40,'Vĩnh Phúc',0,'827'),
	(41,'Bình Định',0,'826'),
	(42,'Tiền Giang',0,'824'),
	(43,'Đồng Nai',0,'823'),
	(44,'Nghệ An',0,'821'),
	(45,'Quảng Ninh',0,'819'),
	(46,'Quảng Bình',0,'818'),
	(47,'Hưng Yên',0,'816'),
	(48,'Bình Thuận',0,'812'),
	(49,'Nam Định',0,'811'),
	(50,'Lào Cai',0,'808'),
	(51,'Hà Nam',0,'807'),
	(52,'Cần Thơ',0,'806'),
	(53,'Hải Dương',0,'805'),
	(54,'Bắc Giang',0,'144'),
	(55,'Quảng Trị',0,'143'),
	(56,'Tuyên Quang',0,'137'),
	(57,'Hải Phòng',0,'135'),
	(58,'Lạng Sơn',0,'134'),
	(59,'Yên Bái',0,'132'),
	(60,'Sơn La',0,'130'),
	(61,'Đà Nẵng',0,'129'),
	(62,'TP Hồ Chí Minh',1,'126'),
	(63,'Hà Nội',1,'1');

/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`)
VALUES
	(1,1,'App\\User'),
	(2,2,'App\\User'),
	(3,3,'App\\User');

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'system','System','System','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(2,'administrator','Administrator','Administrator','2019-08-26 23:13:40','2019-08-26 23:13:40'),
	(3,'user','User','User','2019-08-26 23:13:41','2019-08-26 23:13:41');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;

INSERT INTO `sliders` (`id`, `name`, `summary`, `status`, `image`, `created_at`, `updated_at`)
VALUES
	(1,'chào em','Làm quen nhé',1,NULL,'2016-12-17 06:17:53','2016-12-17 06:17:53'),
	(2,'Bui DucCanh ưd dqwd','Làm quen nhé hdwdq',0,NULL,'2016-12-17 06:19:06','2016-12-17 06:19:48'),
	(4,'haha asdasd ','sadasdasd',1,NULL,'2016-12-17 06:24:58','2016-12-17 06:24:58'),
	(5,'polyester','polyester staple fiber',1,NULL,'2016-12-17 22:12:45','2016-12-30 19:34:08'),
	(6,'micro','micro fiber',1,NULL,'2016-12-17 22:13:13','2016-12-30 19:35:17');

/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table static_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `static_pages`;

CREATE TABLE `static_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `static_pages` WRITE;
/*!40000 ALTER TABLE `static_pages` DISABLE KEYS */;

INSERT INTO `static_pages` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `status`)
VALUES
	(1,'Giới thiệu','gioi-thieu','<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Ng&agrave;nh trồng b&ocirc;ng v&agrave; k&eacute;o sợi tại Việt Nam đ&atilde; c&oacute; lịch sử l&acirc;u đời nhưng n&oacute; chỉ trở th&agrave;nh ng&agrave;nh trọng điểm trong khoảng 2 thập kỷ gần đ&acirc;y khi đất nước tiến v&agrave;o c&ocirc;ng cuộc C&ocirc;ng nghiệp h&oacute;a &ndash; hiện đại h&oacute;a. Chỉ trong 10 năm từ 2000 đến 2010, Dệt May Việt Nam đ&atilde; vươn trở th&agrave;nh ng&agrave;nh đạt kim ngạch xuất khẩu lớn nhất cả nước với doanh thu 11,5 tỷ đ&ocirc; la Mỹ, trong đ&oacute; trồng b&ocirc;ng v&agrave; k&eacute;o sợi l&agrave; 2 kh&acirc;u đoạn đầu của chuỗi dệt may. Cũng trong 10 năm đ&oacute;, ng&agrave;nh k&eacute;o sợi đ&atilde; tăng trưởng tr&ecirc;n 300% từ 1,2 triệu cọc sợi với tổng sản lượng 120.000 tấn l&ecirc;n 3,75 triệu cọc đạt 420.000 tấn. Trong khi đ&oacute;, ng&agrave;nh trồng b&ocirc;ng lại diễn ra theo chiều hướng ngược lại. Năm 2000, sản lượng b&ocirc;ng cả nước đạt 12.000 tấn th&igrave; đến năm 2010 chỉ c&ograve;n 3.500 tấn &ndash; tức c&ograve;n 30% sản lượng năm 2000. Nếu như năm 2000 b&ocirc;ng trong nước đ&aacute;p ứng khoảng 20% nhu cầu k&eacute;o sợi th&igrave; đến năm 2010, tỷ lệ n&agrave;y chỉ c&ograve;n 1,3% - đ&acirc;y l&agrave; một dấu hiệu rất đ&aacute;ng lo ngại đặc biệt gi&aacute; b&ocirc;ng thế giới tăng cao một c&aacute;ch bất thường (tăng 2,2 lần) chỉ trong v&ograve;ng 2 năm 2009, 2010, đe dọa tới sự tăng trưởng ổn định của ng&agrave;nh sợi Việt Nam n&oacute;i ri&ecirc;ng v&agrave; to&agrave;n ng&agrave;nh dệt may n&oacute;i chung.</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Bằng việc hợp nhất 2 hiệp hội (Hiệp hội B&ocirc;ng Vải Việt Nam th&agrave;nh lập v&agrave;o ng&agrave;y 21/05/2004 v&agrave; Hiệp hội Sợi Việt Nam th&agrave;nh lập v&agrave;o ng&agrave;y 31/12/2007),hy vọng việc cam kết mua b&ocirc;ng trong nước từ c&aacute;c nh&agrave; k&eacute;o sợi sẽ trở n&ecirc;n vững chắc hơn, tạo nền tảng th&uacute;c đẩy trồng b&ocirc;ng trong nước, mang lại lợi &iacute;ch, sự ổn định, chủ động cho c&aacute;c b&ecirc;n li&ecirc;n quan v&agrave; gi&uacute;p hiện thực h&oacute;a chủ trương, định hướng ph&aacute;t triển ng&agrave;nh của Ch&iacute;nh phủ. Đ&acirc;y cũng ch&iacute;nh l&agrave; m&ocirc; h&igrave;nh th&agrave;nh c&ocirc;ng, l&agrave; b&agrave;i học kinh nghiệm r&uacute;t ra từ c&aacute;c nước c&oacute; nền c&ocirc;ng nghiệp k&eacute;o sợi v&agrave; dệt may ph&aacute;t triển tr&ecirc;n thế giới như Trung Quốc, Ấn Độ, Pakistan, &hellip; Chủ trương hợp nhất 2 Hiệp hội đ&atilde; nhận được sự nhất tr&iacute; tuyệt đối từ c&aacute;c hội vi&ecirc;n của 2 Hiệp hội, sự đồng t&igrave;nh của c&ocirc;ng luận v&agrave; sự ủng hộ mạnh mẽ từ c&aacute;c cơ quan hữu tr&aacute;ch đặc biệt l&agrave; Tập Đo&agrave;n Dệt May Việt Nam, Hiệp hội Dệt May Việt Nam, Bộ C&ocirc;ng thương v&agrave; Bộ Nội Vụ nước CHXHCN Việt Nam</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">QUAN ĐIỂM XUY&Ecirc;N SUỐT CHO VIỆC X&Acirc;Y DỰNG V&Agrave; PH&Aacute;T TRIỂN HIỆP HỘI</strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">1. Lấy c&aacute;c nh&agrave; trồng b&ocirc;ng v&agrave; nh&agrave; k&eacute;o sợi l&agrave;m trọng t&acirc;m;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">2. Lấy lợi &iacute;ch v&agrave; sự ph&aacute;t triển của ng&agrave;nh l&agrave;m mục đ&iacute;ch;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">3. Lấy thị trường to&agrave;n cầu l&agrave;m địa b&agrave;n hoạt động;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">4. D&ugrave;ng th&ocirc;ng tin v&agrave; tạo k&ecirc;nh đối thoại l&agrave;m phương tiện;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Lấy sự ph&aacute;t triển của ng&agrave;nh v&agrave; sự th&agrave;nh c&ocirc;ng của hội vi&ecirc;n l&agrave;m thước đo hiệu quả hoạt động của Hiệp Hội</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">C&Aacute;C YẾU TỐ QUYẾT ĐỊNH TH&Agrave;NH C&Ocirc;NG</strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">1. C&oacute; được Ban Chấp h&agrave;nh c&oacute; tầm, c&oacute; t&acirc;m, c&oacute; t&agrave;i v&agrave; c&oacute; lực;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">2. Nh&acirc;n sự t&aacute;c nghiệp phải chuy&ecirc;n nghiệp;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">3. C&oacute; sự chung tay g&oacute;p sức thỏa đ&aacute;ng của hội vi&ecirc;n.</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">4. C&oacute; sự hỗ trợ kịp thời v&agrave; thiết thực của cơ quan hữu quan</p>\r\n','2016-10-01 02:37:30','2016-12-19 18:25:49',1),
	(2,'Liên hệ','lien-he','<h4><strong>Hồ sơ c&ocirc;ng ty:</strong></h4>\r\n\r\n<p><span style=\"font-size:16px;\"><strong>C&ocirc;ng ty TNHH Sản xuất v&agrave; Thương mại Mạnh Cường Hưng Y&ecirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><strong>MST: 0900918681</strong></span></p>\r\n\r\n<p><strong>Điện thoại: 0321 6272 743</strong></p>\r\n\r\n<p><span style=\"color:#FF0000;\"><strong><font><span style=\"background-color:#FFF0F5;\"><font><font>Hotline: 0974 288 833 - 0909 441 666</font></font></span></font></strong></span></p>\r\n\r\n<p><strong>Email: Jack@manhcuongfiber.com - quynhntt@manhcuongfiber.com</strong></p>\r\n\r\n<p><strong>Địa chỉ: Th&ocirc;n Y&ecirc;n Ph&uacute; - X&atilde; Giai Phạm - Huyện Y&ecirc;n Mỹ - Tỉnh Hưng Y&ecirc;n</strong></p>\r\n\r\n<div>&nbsp;</div>\r\n','2016-10-01 02:37:30','2016-12-30 20:08:51',1),
	(3,'Tiêu đề trang chủ','website-title','HTE ',NULL,NULL,1);

/*!40000 ALTER TABLE `static_pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table translation_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translation_settings`;

CREATE TABLE `translation_settings` (
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `field_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `translation_settings` WRITE;
/*!40000 ALTER TABLE `translation_settings` DISABLE KEYS */;

INSERT INTO `translation_settings` (`table_name`, `field_name`)
VALUES
	('product_categories','name'),
	('products','title'),
	('products','summary'),
	('products','content'),
	('products','price'),
	('sliders','name'),
	('news_categories','name'),
	('sliders','summary'),
	('news','title'),
	('news','summary'),
	('news','content'),
	('banners','title'),
	('static_pages','title'),
	('static_pages','description');

/*!40000 ALTER TABLE `translation_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `translatable_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `translatable_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;

INSERT INTO `translations` (`id`, `locale`, `name`, `created_at`, `updated_at`, `translatable_type`, `translatable_id`, `content`)
VALUES
	(114,'vi','name','2016-12-17 06:41:14','2016-12-19 02:39:56','App\\NewsCategory',2,'Tuyển dụng'),
	(115,'en','name','2016-12-17 06:41:14','2016-12-19 02:39:56','App\\NewsCategory',2,'Recruitments'),
	(117,'vi','name','2016-12-17 06:42:10','2016-12-18 23:29:25','App\\NewsCategory',3,'Tin tiếng Anh'),
	(118,'en','name','2016-12-17 06:42:10','2016-12-18 23:29:25','App\\NewsCategory',3,'English News'),
	(120,'vi','title','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'Cụm danh từ dqdwq'),
	(121,'en','title','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'Morning (updated)'),
	(123,'vi','summary','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'wcqwcdsah'),
	(124,'en','summary','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'hkjdsahkdqwcwqccwq'),
	(126,'vi','content','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'<p>qưeqweqưc</p>\r\n'),
	(127,'en','content','2016-12-17 06:53:34','2016-12-19 03:59:54','App\\News',1,'<p>qưe3r</p>\r\n'),
	(129,'vi','title','2016-12-17 22:06:23','2016-12-30 19:40:07','App\\Banner',4,'xơ kiện'),
	(130,'en','title','2016-12-17 22:06:23','2016-12-30 19:40:07','App\\Banner',4,'polyester bales'),
	(132,'vi','name','2016-12-17 22:13:13','2016-12-30 19:35:17','App\\Slider',6,'micro'),
	(133,'en','name','2016-12-17 22:13:13','2016-12-30 19:35:17','App\\Slider',6,'micro'),
	(135,'vi','summary','2016-12-17 22:13:13','2016-12-30 19:35:17','App\\Slider',6,'micro fiber'),
	(136,'en','summary','2016-12-17 22:13:13','2016-12-30 19:35:17','App\\Slider',6,'micro fiber'),
	(138,'vi','name','2016-12-17 23:04:02','2016-12-30 19:34:08','App\\Slider',5,'polyester'),
	(139,'en','name','2016-12-17 23:04:02','2016-12-30 19:34:08','App\\Slider',5,'polyester'),
	(141,'vi','summary','2016-12-17 23:04:02','2016-12-30 19:34:08','App\\Slider',5,'polyester staple fiber'),
	(142,'en','summary','2016-12-17 23:04:02','2016-12-30 19:34:08','App\\Slider',5,'polyester staple fiber'),
	(204,'vi','name','2016-12-18 23:28:43','2016-12-18 23:28:43','App\\NewsCategory',1,'Tin tức'),
	(205,'en','name','2016-12-18 23:28:43','2016-12-18 23:28:43','App\\NewsCategory',1,'News'),
	(206,'vi','title','2016-12-18 23:53:25','2016-12-19 18:25:49','App\\StaticPage',1,'Giới thiệu'),
	(207,'en','title','2016-12-18 23:53:25','2016-12-19 18:25:49','App\\StaticPage',1,'About'),
	(208,'vi','description','2016-12-18 23:53:25','2016-12-19 18:25:49','App\\StaticPage',1,'<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Ng&agrave;nh trồng b&ocirc;ng v&agrave; k&eacute;o sợi tại Việt Nam đ&atilde; c&oacute; lịch sử l&acirc;u đời nhưng n&oacute; chỉ trở th&agrave;nh ng&agrave;nh trọng điểm trong khoảng 2 thập kỷ gần đ&acirc;y khi đất nước tiến v&agrave;o c&ocirc;ng cuộc C&ocirc;ng nghiệp h&oacute;a &ndash; hiện đại h&oacute;a. Chỉ trong 10 năm từ 2000 đến 2010, Dệt May Việt Nam đ&atilde; vươn trở th&agrave;nh ng&agrave;nh đạt kim ngạch xuất khẩu lớn nhất cả nước với doanh thu 11,5 tỷ đ&ocirc; la Mỹ, trong đ&oacute; trồng b&ocirc;ng v&agrave; k&eacute;o sợi l&agrave; 2 kh&acirc;u đoạn đầu của chuỗi dệt may. Cũng trong 10 năm đ&oacute;, ng&agrave;nh k&eacute;o sợi đ&atilde; tăng trưởng tr&ecirc;n 300% từ 1,2 triệu cọc sợi với tổng sản lượng 120.000 tấn l&ecirc;n 3,75 triệu cọc đạt 420.000 tấn. Trong khi đ&oacute;, ng&agrave;nh trồng b&ocirc;ng lại diễn ra theo chiều hướng ngược lại. Năm 2000, sản lượng b&ocirc;ng cả nước đạt 12.000 tấn th&igrave; đến năm 2010 chỉ c&ograve;n 3.500 tấn &ndash; tức c&ograve;n 30% sản lượng năm 2000. Nếu như năm 2000 b&ocirc;ng trong nước đ&aacute;p ứng khoảng 20% nhu cầu k&eacute;o sợi th&igrave; đến năm 2010, tỷ lệ n&agrave;y chỉ c&ograve;n 1,3% - đ&acirc;y l&agrave; một dấu hiệu rất đ&aacute;ng lo ngại đặc biệt gi&aacute; b&ocirc;ng thế giới tăng cao một c&aacute;ch bất thường (tăng 2,2 lần) chỉ trong v&ograve;ng 2 năm 2009, 2010, đe dọa tới sự tăng trưởng ổn định của ng&agrave;nh sợi Việt Nam n&oacute;i ri&ecirc;ng v&agrave; to&agrave;n ng&agrave;nh dệt may n&oacute;i chung.</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Bằng việc hợp nhất 2 hiệp hội (Hiệp hội B&ocirc;ng Vải Việt Nam th&agrave;nh lập v&agrave;o ng&agrave;y 21/05/2004 v&agrave; Hiệp hội Sợi Việt Nam th&agrave;nh lập v&agrave;o ng&agrave;y 31/12/2007),hy vọng việc cam kết mua b&ocirc;ng trong nước từ c&aacute;c nh&agrave; k&eacute;o sợi sẽ trở n&ecirc;n vững chắc hơn, tạo nền tảng th&uacute;c đẩy trồng b&ocirc;ng trong nước, mang lại lợi &iacute;ch, sự ổn định, chủ động cho c&aacute;c b&ecirc;n li&ecirc;n quan v&agrave; gi&uacute;p hiện thực h&oacute;a chủ trương, định hướng ph&aacute;t triển ng&agrave;nh của Ch&iacute;nh phủ. Đ&acirc;y cũng ch&iacute;nh l&agrave; m&ocirc; h&igrave;nh th&agrave;nh c&ocirc;ng, l&agrave; b&agrave;i học kinh nghiệm r&uacute;t ra từ c&aacute;c nước c&oacute; nền c&ocirc;ng nghiệp k&eacute;o sợi v&agrave; dệt may ph&aacute;t triển tr&ecirc;n thế giới như Trung Quốc, Ấn Độ, Pakistan, &hellip; Chủ trương hợp nhất 2 Hiệp hội đ&atilde; nhận được sự nhất tr&iacute; tuyệt đối từ c&aacute;c hội vi&ecirc;n của 2 Hiệp hội, sự đồng t&igrave;nh của c&ocirc;ng luận v&agrave; sự ủng hộ mạnh mẽ từ c&aacute;c cơ quan hữu tr&aacute;ch đặc biệt l&agrave; Tập Đo&agrave;n Dệt May Việt Nam, Hiệp hội Dệt May Việt Nam, Bộ C&ocirc;ng thương v&agrave; Bộ Nội Vụ nước CHXHCN Việt Nam</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">QUAN ĐIỂM XUY&Ecirc;N SUỐT CHO VIỆC X&Acirc;Y DỰNG V&Agrave; PH&Aacute;T TRIỂN HIỆP HỘI</strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">1. Lấy c&aacute;c nh&agrave; trồng b&ocirc;ng v&agrave; nh&agrave; k&eacute;o sợi l&agrave;m trọng t&acirc;m;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">2. Lấy lợi &iacute;ch v&agrave; sự ph&aacute;t triển của ng&agrave;nh l&agrave;m mục đ&iacute;ch;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">3. Lấy thị trường to&agrave;n cầu l&agrave;m địa b&agrave;n hoạt động;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">4. D&ugrave;ng th&ocirc;ng tin v&agrave; tạo k&ecirc;nh đối thoại l&agrave;m phương tiện;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">Lấy sự ph&aacute;t triển của ng&agrave;nh v&agrave; sự th&agrave;nh c&ocirc;ng của hội vi&ecirc;n l&agrave;m thước đo hiệu quả hoạt động của Hiệp Hội</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">C&Aacute;C YẾU TỐ QUYẾT ĐỊNH TH&Agrave;NH C&Ocirc;NG</strong></p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">1. C&oacute; được Ban Chấp h&agrave;nh c&oacute; tầm, c&oacute; t&acirc;m, c&oacute; t&agrave;i v&agrave; c&oacute; lực;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">2. Nh&acirc;n sự t&aacute;c nghiệp phải chuy&ecirc;n nghiệp;</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">3. C&oacute; sự chung tay g&oacute;p sức thỏa đ&aacute;ng của hội vi&ecirc;n.</p>\r\n\r\n<p style=\"margin: 0px 0px 10px; padding: 0px; font-family: Tahoma; font-size: 12px; text-align: justify;\">4. C&oacute; sự hỗ trợ kịp thời v&agrave; thiết thực của cơ quan hữu quan</p>\r\n'),
	(209,'en','description','2016-12-18 23:53:25','2016-12-19 18:25:49','App\\StaticPage',1,'<p><span itemprop=\"name\" style=\"margin: 0px; padding: 0px; font-family: Tahoma; font-size: 12px;\">G&eacute;n&eacute;rique Viagra</span><br style=\"margin: 0px; padding: 0px; font-family: Tahoma; font-size: 12px;\" />\r\n<span itemprop=\"description\" style=\"margin: 0px; padding: 0px; font-family: Tahoma; font-size: 12px;\">Comment commander bon marche Viagra 150 mg. Viagra g&eacute;n&eacute;rique est un comprim&eacute; de Sildenafil Citrate qui a aid&eacute; des millions d&#39;hommes autour du monde &agrave; atteindre et &agrave; maintenir une &eacute;rection longue-dur&eacute;e durant pr&egrave;s d&#39;une dizaine d&#39;ann&eacute;es. Rejoignez la r&eacute;volution du Viagra et d&eacute;couvrez comment cette petite pilule bleue va changer votre vie. Viagra g&eacute;n&eacute;rique peut &eacute;galement &ecirc;tre commercialis&eacute; en tant que: Revatio, Tadalafil, Vardenafil et Sildenafil Citrate.<br style=\"margin: 0px; padding: 0px;\" />\r\n*Viagra&reg; est une marque d&eacute;pos&eacute;e par Pfizer.</span><br style=\"margin: 0px; padding: 0px; font-family: Tahoma; font-size: 12px;\" />\r\n<br style=\"margin: 0px; padding: 0px;\" />\r\n<span itemprop=\"aggregateRating\" itemscope=\"\" itemtype=\"http://schema.org/AggregateRating\" style=\"margin: 0px; padding: 0px; font-family: Tahoma; font-size: 12px;\">Note 4 &eacute;toiles, bas&eacute; sur 5&nbsp;<span itemprop=\"ratingValue\" style=\"margin: 0px; padding: 0px;\">4.1</span>&nbsp;&eacute;toiles, bas&eacute; sur&nbsp;<span itemprop=\"reviewCount\" style=\"margin: 0px; padding: 0px;\">232</span>&nbsp;commentaires.</span></p>\r\n'),
	(210,'vi','title','2016-12-18 23:56:08','2016-12-30 20:08:51','App\\StaticPage',2,'Liên hệ'),
	(211,'en','title','2016-12-18 23:56:08','2016-12-30 20:08:51','App\\StaticPage',2,'Contact'),
	(212,'vi','description','2016-12-18 23:56:08','2016-12-30 20:08:51','App\\StaticPage',2,'<h4><strong>Hồ sơ c&ocirc;ng ty:</strong></h4>\r\n\r\n<p><span style=\"font-size:16px;\"><strong>C&ocirc;ng ty TNHH Sản xuất v&agrave; Thương mại Mạnh Cường Hưng Y&ecirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><strong>MST: 0900918681</strong></span></p>\r\n\r\n<p><strong>Điện thoại: 0321 6272 743</strong></p>\r\n\r\n<p><span style=\"color:#FF0000;\"><strong><font><span style=\"background-color:#FFF0F5;\"><font><font>Hotline: 0974 288 833 - 0909 441 666</font></font></span></font></strong></span></p>\r\n\r\n<p><strong>Email: Jack@manhcuongfiber.com - quynhntt@manhcuongfiber.com</strong></p>\r\n\r\n<p><strong>Địa chỉ: Th&ocirc;n Y&ecirc;n Ph&uacute; - X&atilde; Giai Phạm - Huyện Y&ecirc;n Mỹ - Tỉnh Hưng Y&ecirc;n</strong></p>\r\n\r\n<div>&nbsp;</div>\r\n'),
	(213,'en','description','2016-12-18 23:56:08','2016-12-30 20:08:51','App\\StaticPage',2,'<h4><strong><font><font>LI&Ecirc;N HỆ CH&Uacute;NG T&Ocirc;I</font></font></strong></h4>\r\n\r\n<p><strong><font><font>Sản phẩm Y&ecirc;n Mạnh Cường Hưng v&agrave; C&ocirc;ng ty TNHH Thương mại</font></font></strong></p>\r\n\r\n<p><strong><font><font><font><font>Tel: (+84) 321 6272 743</font></font></font></font></strong></p>\r\n\r\n<p><strong><font><font><font><font>Hotline: (84) 974 288 833 - (84) 909 441 666</font></font></font></font></strong></p>\r\n\r\n<p><strong>Address: Yen Phu - Giai Pham - My Hao - Hung Yen Province</strong></p>\r\n'),
	(220,'vi','name','2016-12-19 02:39:16','2016-12-19 02:39:16','App\\NewsCategory',4,'Thông báo'),
	(221,'en','name','2016-12-19 02:39:16','2016-12-19 02:39:16','App\\NewsCategory',4,'Announcements'),
	(222,'vi','title','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'Cụm danh từ'),
	(223,'en','title','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'Hello'),
	(224,'vi','summary','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'bhjnmk,l'),
	(225,'en','summary','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'vbhnjlmk'),
	(226,'vi','content','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'<p>cqwcqwcqw</p>\r\n'),
	(227,'en','content','2016-12-19 04:00:15','2016-12-19 04:00:15','App\\News',2,'<p>cqw</p>\r\n'),
	(228,'vi','title','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'cuong duoc chua'),
	(229,'en','title','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'Morning'),
	(230,'vi','summary','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'dq'),
	(231,'en','summary','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'cwqcwq'),
	(232,'vi','content','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'<p>wqqwcwqc</p>\r\n'),
	(233,'en','content','2016-12-19 04:02:20','2016-12-19 04:02:20','App\\News',3,'<p>cqw</p>\r\n'),
	(234,'vi','title','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'Tên danh mục (Tiếng Anh) '),
	(235,'en','title','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'qrbf'),
	(236,'vi','summary','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'cqwcqw'),
	(237,'en','summary','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'cwqcwq'),
	(238,'vi','content','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'<table class=\"table borderless\" style=\"box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; background-color: rgb(236, 240, 245); width: 838px; max-width: 100%; margin-bottom: 20px; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\">\r\n	<tbody style=\"box-sizing: border-box;\">\r\n		<tr style=\"box-sizing: border-box;\">\r\n			<th class=\"table_right_middle\" style=\"box-sizing: border-box; padding: 8px; text-align: right !important; vertical-align: top; border-top: 1px solid rgb(244, 244, 244); border-right: none !important; border-bottom: none !important; border-left: none !important; border-image: initial !important; line-height: 1.42857;\">T&ecirc;n danh mục (Tiếng Anh)<br />\r\n			&nbsp;</th>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
	(239,'en','content','2016-12-19 04:02:49','2016-12-19 04:02:49','App\\News',4,'<table class=\"table borderless\" pro=\"\" sans=\"\" source=\"\" style=\"box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; background-color: rgb(236, 240, 245); width: 838px; max-width: 100%; margin-bottom: 20px; font-family: \">\r\n	<tbody style=\"box-sizing: border-box;\">\r\n		<tr style=\"box-sizing: border-box;\">\r\n			<th class=\"table_right_middle\" style=\"box-sizing: border-box; padding: 8px; text-align: right !important; vertical-align: top; border-top: 1px solid rgb(244, 244, 244); border-right: none !important; border-bottom: none !important; border-left: none !important; border-image: initial !important; line-height: 1.42857;\">T&ecirc;n danh mục (Tiếng Anh)<br />\r\n			&nbsp;</th>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
	(240,'vi','title','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'cuong duoc chua'),
	(241,'en','title','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'Morning (updated)'),
	(242,'vi','summary','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'f23'),
	(243,'en','summary','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'f3232f'),
	(244,'vi','content','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'<p>f32</p>\r\n'),
	(245,'en','content','2016-12-19 05:10:50','2016-12-19 05:10:50','App\\News',5,'<p>3f2</p>\r\n'),
	(246,'vi','title','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'hehe'),
	(247,'en','title','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'ưqđ'),
	(248,'vi','summary','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'wqdqwd'),
	(249,'en','summary','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'dưqdqqwd'),
	(250,'vi','content','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'<p>dưqdqdw</p>\r\n'),
	(251,'en','content','2016-12-19 05:13:19','2016-12-19 05:13:19','App\\News',6,'<p>dưqdqw</p>\r\n'),
	(266,'vi','name','2016-12-30 17:34:26','2016-12-30 17:34:26','App\\ProductCategory',1,'Gòn tơi'),
	(267,'en','name','2016-12-30 17:34:26','2016-12-30 17:34:26','App\\ProductCategory',1,'Gòn tơi'),
	(268,'vi','name','2016-12-30 17:34:33','2016-12-30 17:34:33','App\\ProductCategory',2,'Gòn bi'),
	(269,'en','name','2016-12-30 17:34:33','2016-12-30 17:34:33','App\\ProductCategory',2,'Gòn bi'),
	(270,'vi','name','2016-12-30 17:34:42','2016-12-30 20:18:12','App\\ProductCategory',3,'Gòn tấm'),
	(271,'en','name','2016-12-30 17:34:42','2016-12-30 20:18:12','App\\ProductCategory',3,'Gòn tấm'),
	(272,'vi','name','2016-12-30 17:34:49','2016-12-30 17:34:49','App\\ProductCategory',4,'Xơ polyester'),
	(273,'en','name','2016-12-30 17:34:49','2016-12-30 17:34:49','App\\ProductCategory',4,'Xơ polyester'),
	(274,'vi','title','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'Polyester Staple fiber'),
	(275,'en','title','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'Polyester staple fiber'),
	(276,'vi','summary','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'Polyester staple fiber'),
	(277,'en','summary','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'Polyester staple fiber'),
	(278,'vi','content','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'<p><font><font>sợi polyester staple</font></font></p>\r\n'),
	(279,'en','content','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'<p><font><font>sợi polyester staple</font></font></p>\r\n'),
	(280,'vi','price','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'0'),
	(281,'en','price','2016-12-30 17:39:53','2016-12-30 20:11:20','App\\Product',1,'0'),
	(282,'vi','title','2016-12-30 19:37:05','2016-12-30 19:37:22','App\\Banner',1,'Polyester Staple fiber'),
	(283,'en','title','2016-12-30 19:37:05','2016-12-30 19:37:22','App\\Banner',1,'Polyester Staple fiber'),
	(284,'vi','title','2016-12-30 19:38:20','2016-12-30 19:38:20','App\\Banner',3,'xơ kiện'),
	(285,'en','title','2016-12-30 19:38:20','2016-12-30 19:38:20','App\\Banner',3,'polyester bales'),
	(286,'vi','title','2016-12-30 19:39:24','2016-12-30 19:39:24','App\\Banner',5,'micro'),
	(287,'en','title','2016-12-30 19:39:24','2016-12-30 19:39:24','App\\Banner',5,'micro'),
	(288,'vi','title','2016-12-30 19:40:58','2016-12-30 19:40:58','App\\Banner',6,'Polyester Staple fiber'),
	(289,'en','title','2016-12-30 19:40:58','2016-12-30 19:40:58','App\\Banner',6,'polyester bales'),
	(290,'vi','title','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'Gòn tấm'),
	(291,'en','title','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'Gòn tấm'),
	(292,'vi','summary','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'Gòn tấm'),
	(293,'en','summary','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'Gòn tấm'),
	(294,'vi','content','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'<p>g&ograve;n tấm</p>\r\n'),
	(295,'en','content','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'<p><font><font>g&ograve;n tấm</font></font></p>\r\n'),
	(296,'vi','price','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,'0'),
	(297,'en','price','2016-12-30 20:15:55','2016-12-30 20:15:55','App\\Product',2,''),
	(298,'vi','title','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'Gòn tấm'),
	(299,'en','title','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'Gòn tấm'),
	(300,'vi','summary','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'Gòn tấm'),
	(301,'en','summary','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'Gòn tấm'),
	(302,'vi','content','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'<p>g&ograve;n tấm</p>\r\n'),
	(303,'en','content','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'<p><font><font><font><font>g&ograve;n tấm</font></font></font></font></p>\r\n'),
	(304,'vi','price','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,'0'),
	(305,'en','price','2016-12-30 20:16:58','2016-12-30 20:16:58','App\\Product',3,''),
	(306,'vi','title','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'Gòn tấm'),
	(307,'en','title','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'Gòn tấm'),
	(308,'vi','summary','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'Gòn tấm'),
	(309,'en','summary','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'Gòn tấm'),
	(310,'vi','content','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'<p>g&ograve;n tấm</p>\r\n'),
	(311,'en','content','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'<p><font><font><font><font><font><font>g&ograve;n tấm</font></font></font></font></font></font></p>\r\n'),
	(312,'vi','price','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'0'),
	(313,'en','price','2016-12-30 20:17:48','2016-12-30 20:17:48','App\\Product',4,'');

/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `remember_token`, `activated`, `created_at`, `updated_at`, `created_by`)
VALUES
	(1,'System','contact@bctech.vn','$2y$10$yKqj7u9KELYEWYxgoaXTNOZpkIzTm8YTV0blQ3KuhcKYUnCVQtfyW','YzBFYQvD1CByrawY2obppm6tjmJCrVNke7G4ttMn4R7KtjzvRXxyVMdao0jD',1,'2019-08-26 23:13:40','2019-08-26 23:13:40',NULL),
	(2,'Administrator','administrator@A3','$2y$10$39AM.q8.8WxCvZDL12EnJ.En.PSM3M3AkQFCdmittCg4JjN.3D1gq','QVcuoXoyIH',1,'2019-08-26 23:13:41','2019-08-26 23:13:41',NULL),
	(3,'User','user@A3','$2y$10$l6piXexOFMXL6ryUj0CG9ufelm3evo/eW7hX8VfThXnMgQFM3vrhK','ErU9gf13jr',1,'2019-08-26 23:13:41','2019-08-26 23:13:41',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
