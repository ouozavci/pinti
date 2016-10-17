-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Eki 2016, 20:08:08
-- Sunucu sürümü: 10.1.16-MariaDB
-- PHP Sürümü: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `pinti`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Giyim & Ayakkabı', 0),
(2, 'Elektronik', 0),
(3, 'Ev, Bahçe, Ofis', 0),
(4, 'Spor & Outdoor', 0),
(5, 'Hobi, Eğlence ve Sanat', 0),
(6, 'Kişisel Bakım & Kozmetik', 0),
(7, 'Ayakkabı & Çanta', 1),
(8, 'Kadın Giyim & Aksesuar', 1),
(9, 'Erkek Giyim & Aksesuar', 1),
(10, 'Çocuk Giyim', 1),
(11, 'Güneş Gözlüğü', 1),
(12, 'Telefon & Aksesuarlar', 2),
(13, 'Bilgisayar', 2),
(14, 'Televizyon & Ses sistemleri', 2),
(15, 'Elektrikli Ev Aletleri', 2),
(16, 'Fotoğraf & Kamera', 2),
(17, 'Tablet', 2),
(18, 'Süpermarket', 3),
(19, 'Ofis, Kırtasiye', 3),
(20, 'Yapı, Market', 3),
(21, 'Ev Tekstili', 3),
(22, 'Fitness & Kondüsyon', 4),
(23, 'Spor Giyim & Ayakkabı', 4),
(24, 'Outdoor & Kamp', 4),
(25, 'Bireysel & Takım Sporları', 4),
(26, 'Avcılık & Balıkçılık', 4),
(27, 'Su Sporları', 4),
(28, 'Bisiklet', 4),
(29, 'Koleksiyon', 5),
(30, 'DVD, VCD, Blueray', 5),
(31, 'Oyuncak, Hobi', 5),
(32, 'Kitap, Dergi', 5),
(33, 'Müzik, Plak, Enstrüman', 5),
(34, 'Oyun, Video ve Konsol', 5),
(35, 'Parfüm', 6),
(36, 'Saç Bakımı', 6),
(37, 'Medikal Ürünler', 6),
(38, 'Cilt, Yüz Bakımı', 6),
(39, 'Medikal Ürünler', 6),
(40, 'Cilt,Yüz Bakımı', 6),
(41, 'Makyaj, Kozmetik', 6),
(42, 'Erkek Kişisel Bakım', 6),
(43, 'Diğer', NULL),
(44, 'Diğer', 1),
(45, 'Diğer', 2),
(46, 'Diğer', 3),
(47, 'Diğer', 4),
(48, 'Diğer', 5),
(49, 'Diğer', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_img`
--

CREATE TABLE `category_img` (
  `category_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category_img`
--

INSERT INTO `category_img` (`category_id`, `image_url`) VALUES
(1, 'http://www.kadinlarportali.com/wp-content/uploads/2011/06/yeni-moda-sonbahar-giyimi.jpg'),
(2, 'http://cdn.pocket-lint.com/r/s/970x/assets/images/php2ah0vp.jpg'),
(3, 'http://blog.cms.gittigidiyor.com/wp-content/uploads/sites/13/2016/09/Evinizin-Havasini-Temizleyecek-12-Ev-Bitkisi-660x330.jpg'),
(4, 'http://www.cengizyildiz.com.tr/plus/9.jpg'),
(5, 'http://blog.cms.gittigidiyor.com/wp-content/uploads/sites/13/2016/03/Gitar-Alma-Rehberi-331x219.jpg'),
(6, 'http://www.yesiltopuklar.com/wp-content/uploads/2012/12/Sa%C4%9Fl%C4%B1kl%C4%B1-Ya%C5%9Fam-ve-Kozmetik-%C3%9Cr%C3%BCnleri.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `lastName` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `phoneNumber` mediumtext COLLATE utf8mb4_turkish_ci,
  `address` mediumtext COLLATE utf8mb4_turkish_ci,
  `signType` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `facebookID` text COLLATE utf8mb4_turkish_ci,
  `img_url` text COLLATE utf8mb4_turkish_ci,
  `register_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `address`, `signType`, `facebookID`, `img_url`, `register_date`) VALUES
(38, 'Can', 'Canbay', 'can._canbay@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10154517555249774', NULL, '0000-00-00'),
(35, 'Oğuzhan', 'Özavcı', 'ouozavci@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10202083311760485', NULL, '0000-00-00'),
(39, 'Kaan', 'Taş', 'kaan.t7@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10206948770059608', NULL, '0000-00-00'),
(40, 'kaan', 'taş', 'afajshfajhfjahjha', '202cb962ac59075b964b07152d234b70', NULL, NULL, 'form', '', NULL, '0000-00-00'),
(41, 'kaan', 'taş', 'kaan.tas.31@facebook.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '0000-00-00'),
(43, 'doğukan', 'taş', 'dogukan_tas@hotmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '2016-10-16'),
(44, 'kaan', 'a', 'asfafa@a.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '2016-10-17'),
(45, 'Oğuzhan', 'Özavcı', 'oguzhanozavci@anadolu.edu.tr', 'fae1a546f80b5422d7a99d72677ea04d', NULL, NULL, 'form', '', NULL, '2016-10-17');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_img`
--
ALTER TABLE `category_img`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
