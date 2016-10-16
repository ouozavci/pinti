-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eki 2016, 20:48:36
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
(1, 'Giyim & Ayakkabı', NULL),
(2, 'Elektronik', NULL),
(3, 'Ev, Bahçe, Ofis', NULL),
(4, 'Spor & Outdoor', NULL),
(5, 'Hobi, Eğlence ve Sanat', NULL),
(6, 'Kişisel Bakım & Kozmetik', NULL),
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
  `facebookID` text COLLATE utf8mb4_turkish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `address`, `signType`, `facebookID`) VALUES
(38, 'Can', 'Canbay', 'can._canbay@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10154517555249774'),
(35, 'Oğuzhan', 'Özavcı', 'ouozavci@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10202083311760485'),
(39, 'Kaan', 'Taş', 'kaan.t7@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10206948770059608'),
(40, 'kaan', 'taş', 'afajshfajhfjahjha', '202cb962ac59075b964b07152d234b70', NULL, NULL, 'form', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
