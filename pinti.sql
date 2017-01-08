-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Oca 2017, 23:43:43
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
(49, 'Diğer', 6),
(50, 'Laptop', 13),
(53, 'Masaüstü', 13),
(54, 'Erkek Ayakkabı', 7),
(55, 'Kadın Ayakkabı', 7),
(56, 'Erkek & Unisex Çanta', 7),
(57, 'Kadın Çanta', 7),
(58, 'Cep Telefonu', 12),
(59, 'Cep Telefonu Kılıfı', 12),
(60, 'Şarj Aleti & Batarya', 12),
(61, 'Bilgisayar Aksesuar', 13),
(62, 'LED TV', 14),
(63, 'LCD TV', 14),
(64, 'Ses Sistemleri', 14),
(65, 'Beyaz Eşya', 15),
(66, 'Elektrikli Süpürge & Vakum', 15),
(67, 'Ütü, Ütü Masası', 15),
(68, 'Çay, Kahve Makineleri ve Su Isıtıcıları', 15);

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

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `brand_id`, `seller_id`, `image_url`) VALUES
(1, 'Asus Laptop', 1500, 50, 0, 38, 'https://www.bhphotovideo.com/images/images2500x2500/asus_r556la_rh51_wx_15_6_r556la_notebook_1183460.jpg'),
(2, 'Toshiba Laptop', 2000, 50, 0, 39, 'http://anindabul.net/images/toshiba-laptop/toshiba-laptop.jpg'),
(3, 'IPhone 7 Plus', 4000, 12, 0, 38, 'http://cdn2.ubergizmo.com/wp-content/uploads/2016/09/iphone-7-plus-design-back-B.jpg'),
(4, 'Galaxy S7 Edge', 3700, 12, 0, 39, 'https://cnet1.cbsistatic.com/img/n_8qmqFD2OXexOgnWK9TM-myH3Q=/770x433/2016/03/08/a63f3fac-7ab1-4214-adee-cf0d2b0aca7e/galaxy-s7-edge-still.jpg'),
(5, 'Galaxy Note 3', 4000, 12, 0, 38, 'https://cdn.arstechnica.net/wp-content/uploads/2016/10/Galaxy-Note-7-16-1-1440x960.jpg'),
(6, 'Pixel', 3000, 12, 0, 38, 'http://cdn2.gsmarena.com/vv/pics/google/google-pixel-02.jpg'),
(7, 'LG G4', 2000, 12, 0, 38, 'http://www.lg.com/us/mobile-phones/g4/images/overview_design_phone_grey.jpg'),
(8, 'TOSHIBA I6', 2000, 12, 0, 38, 'http://www.pcdepo.com/image/data/seo-url/toshiba-i5-laptop-modelleri-ve-fiyatlari-2.jpg'),
(9, 'Canon EOS  1300D', 100, 55, 0, 46, 'http://cdn.vatanbilgisayar.com/upload/PRODUCT/CANON/thumb/v2-82306_large.jpg'),
(10, 'Asus X540SA-XX378DC', 3000, 50, 0, 46, 'http://images.hepsiburada.net/assets/Bilgisayar/500/9544556675122.jpg'),
(11, 'Samsung 88KS9800', 55900, 62, 0, 46, 'http://img-teknosa.mncdn.com/TeknosaImg/productImages/568x434/110016030-1-samsung-88ks9800-88-9-serisi-curved-quantum-dot-suhd-tv-smart-tizen-dahili-uhd-uydu-alici.png'),
(12, 'Samsung 88KS9800', 55900, 62, 0, 46, 'http://img-teknosa.mncdn.com/TeknosaImg/productImages/568x434/110016030-1-samsung-88ks9800-88-9-serisi-curved-quantum-dot-suhd-tv-smart-tizen-dahili-uhd-uydu-alici.png'),
(13, 'Samsung K?l?f', 10, 59, 0, 46, 'http://cinithalatihracat.com/wp-content/uploads/2012/11/XO-02-9-1024x768.jpg'),
(14, 'Samsung Galaxy Trend Plus Batarya Pil S7580 ', 25, 60, 0, 46, 'http://cdn4.n11.com.tr/a1/1024/15/12/15/57/89/35/93/82/67/14/86/89/67759171337686855887.jpg'),
(15, 'Kaa', 20, 60, 0, 46, 'http://cdn4.n11.com.tr/a1/1024/15/12/15/57/89/35/93/82/67/14/86/89/67759171337686855887.jpg'),
(16, 'Kingston HyperX Predator ', 3000, 61, 0, 46, 'http://images.hepsiburada.net/assets/Bilgisayar/500/Bilgisayar_2715022.jpg'),
(17, 'ARMANI JEANS KADIN 9221106A730', 500, 57, 0, 46, 'http://cdn3.n11.com.tr/a1/1024/15/15/48/76/41082178.JPG'),
(18, 'NIKON Coolpix B700', 1000, 16, 0, 46, 'http://picscdn.redblue.de/doi/pixelboxx-mss-72915001/fee_786_587_png/NIKON-Coolpix-B700-21-MP-Dijitall-Kompakt-Foto%C4%9Fraf-Makinesi-Siyah'),
(19, 'IPhone 4S', 1000, 58, 0, 46, 'http://store.storeimages.cdn-apple.com/4662/as-images.apple.com/is/image/AppleInc/aos/published/images/M/C8/MC839/MC839_AV5?wid=1000&hei=1000&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=1463184330035'),
(20, 'ASUS G11CB TR006T', 10000, 53, 0, 46, 'http://picscdn.redblue.de/doi/pixelboxx-mss-72587255/fee_786_587_png/ASUS-G11CB-TR006T-Core-i7-6700U-8GB-1TB-128GB-SSD-2-GB-Masa%C3%BCst%C3%BC-PC'),
(21, 'BOSCH KGN57VI20N', 2310, 65, 0, 46, 'https://www.stokfirsati.com/image/cache/0fatos/KGNNNNNNNNNNNNNNNNNNN-1200x899.jpg'),
(22, 'A', 1111, 21, 0, 46, 'https://www.prodpad.com/wp-content/uploads/man.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sellers_products`
--

CREATE TABLE `sellers_products` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sellers_products`
--

INSERT INTO `sellers_products` (`product_id`, `seller_id`) VALUES
(1, 0),
(1, 0),
(1, 0),
(1, 38),
(22, 46);

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
(38, 'Can', 'Canbay', 'can._canbay@hotmail.commmmmmmmmmmm', 'd41d8cd98f00b204e9800998ecf8427e', '05367865600', 'Yenibağlar Mahallesi Bolay Soka', 'fb', '10154517555249774', 'https://pbs.twimg.com/profile_images/779273646212866049/h4jSHKBn.jpg', '0000-00-00'),
(35, 'Oğuzhan', 'Özavcı', 'ouozavci@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 'fb', '10202083311760485', NULL, '0000-00-00'),
(39, 'Kaan', 'Taş', 'kaan.t7@hotmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '05348836395', 'hatboyu ', 'fb', '10206948770059608', 'http://www.twittergunlugu.com/gallery/besmersoy796594040678584321.jpg', '0000-00-00'),
(40, 'kaan', 'taş', 'afajshfajhfjahjha', '202cb962ac59075b964b07152d234b70', NULL, NULL, 'form', '', NULL, '0000-00-00'),
(41, 'kaan', 'taş', 'kaan.tas.31@facebook.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '0000-00-00'),
(43, 'doğukan', 'taş', 'dogukan_tas@hotmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '2016-10-16'),
(44, 'kaan', 'a', 'asfafa@a.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, 'form', '', NULL, '2016-10-17'),
(45, 'Oğuzhan', 'Özavcı', 'oguzhanozavci@anadolu.edu.tr', 'fae1a546f80b5422d7a99d72677ea04d', NULL, NULL, 'form', '', NULL, '2016-10-17'),
(46, 'Can', 'Canbay', 'cancanbay@anadolu.edu.tr', '0ed1f8a8672815ecec8cf1ae23d95924', '000000', ' yenibağlar mahallesii        ', 'form', '', '', '2016-11-25'),
(49, 'Kaan', 'Taş', 'kaantas@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, NULL, 'form', '', NULL, '2017-01-08'),
(47, 'Houman', 'Farshchi', 'hmn_fard@ymail.com', '73acbc268055da864539305d3275ae49', '879879', ' 98787', 'form', '', '', '2016-12-17'),
(48, 'Human', 'Being', 'hmn_fard@gmail.com', '73acbc268055da864539305d3275ae49', NULL, NULL, 'form', '', NULL, '2016-12-17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_products`
--

CREATE TABLE `users_products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users_products`
--

INSERT INTO `users_products` (`product_id`, `user_id`) VALUES
(6, 46),
(1, 46),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(1, 49),
(22, 49);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
