-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 Tem 2013, 16:18:45
-- Sunucu sürümü: 5.5.24-log
-- PHP Sürümü: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `asilsan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `telefon` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `konu` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `mesaj` varchar(32) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `isim`, `mail`, `telefon`, `konu`, `mesaj`) VALUES
(6, 'BETÜL', 'betul.saral@bil.omu.edu.tr', 'asdsadasd', 'asdasdsa', 'DENEME'),
(9, 'bsaral', 'betul.saral@bil.omu.edu.tr', 'asdsadasd', 'asdasdsa', 'asdasdsadasd'),
(11, 'BETÜL', 'btlsaral@gmail.com', 'asdsadasd', 'asdasdsa', 'sadasdsadasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `haber` varchar(300) NOT NULL,
  `image` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `title`, `haber`, `image`) VALUES
(58, 'deneme4', '<p>\r\n	<strong><span style="color:#4b0082;">bu bir deneme yazısıdır</span></strong></p>\r\n', 0x2e2e2f696d672f75706c6f61642f4b6f616c612e6a7067),
(63, 'deneme3', '<p>\r\n	<font face="comic sans ms, cursive">bu bir deneme yazısıdır</font></p>\r\n', 0x2e2e2f696d672f75706c6f61642f48796472616e676561732e6a7067),
(65, 'deneme2', '<p>\r\n	bu bir&nbsp;<strong>deneme&nbsp;<u>yazısıdır</u></strong></p>\r\n', 0x2e2e2f696d672f75706c6f61642f54756c6970732e6a7067),
(66, 'deneme1', '<p>\r\n	bu bir&nbsp;<strong>deneme yazısıdır</strong></p>\r\n', 0x2e2e2f696d672f75706c6f61642f50656e6775696e732e6a7067);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE IF NOT EXISTS `proje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `content` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `resim` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`id`, `p_name`, `content`, `resim`) VALUES
(2, 'Proje-1', '<p>\r\n	bu deneme projesi</p>\r\n', 0x2e2e2f696d672f75706c6f61642f50656e6775696e732e6a7067),
(3, 'Proje-2', '<p>\r\n	Olaylar olaylar</p>\r\n', 0x2e2e2f696d672f75706c6f61642f54756c6970732e6a7067),
(4, 'Proje-3', '<p>\r\n	asdasdsadasd</p>\r\n', 0x2e2e2f696d672f75706c6f61642f4b6f616c612e6a7067);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE IF NOT EXISTS `referans` (
  `yer` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `proje` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `firma` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `tarih` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`yer`, `proje`, `firma`, `tarih`, `id`, `resim`) VALUES
('İstanbul', 'bsaral', 'Saral Bilişim A.Ş', '1992', 1, 0x2e2e2f696d672f75706c6f61642f4368727973616e7468656d756d2e6a7067),
('Samsun', 'Tardis', 'Saral Bilişim A.Ş', '2013', 2, 0x2e2e2f696d672f75706c6f61642f50656e6775696e732e6a7067),
('İstanbul', 'BETÜL', 'Saral Bilişim A.Ş', '2000', 3, 0x2e2e2f696d672f75706c6f61642f4465736572742e6a7067);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(300) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'bsaral', 'aaa'),
(2, 'admin', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
