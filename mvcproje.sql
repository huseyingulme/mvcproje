-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2025, 14:01:37
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mvcproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresler`
--

CREATE TABLE `adresler` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `adres` text NOT NULL,
  `varsayilan` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adresler`
--

INSERT INTO `adresler` (`id`, `uyeid`, `adres`, `varsayilan`) VALUES
(1, 10, 'php sokak. mvc mahallesi. olcay apt. no:55 istanbul', 1),
(2, 10, 'array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir', 0),
(11, 12, 'array sokak. class mahallesi extends plaza no:850  Alsancak/ İzmir', 1),
(12, 10, 'güneşli mah. asdmsaldsa', 0),
(16, 17, 'Adana birleşik devletleri los adanas sokak no 21', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alt_kategori`
--

CREATE TABLE `alt_kategori` (
  `id` int(11) NOT NULL,
  `cocuk_kat_id` int(11) NOT NULL,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `alt_kategori`
--

INSERT INTO `alt_kategori` (`id`, `cocuk_kat_id`, `ana_kat_id`, `ad`) VALUES
(1, 1, 2, 'Kadın Tişört'),
(2, 2, 1, 'Erkek Pantolon'),
(3, 1, 2, 'Kadın Ceket'),
(4, 2, 1, 'Erkek Gömlek'),
(5, 3, 1, 'Erkek Atlet'),
(6, 3, 1, 'Erkek Boxer'),
(10, 2, 1, 'Erkek Klasik'),
(9, 19, 1, 'Erkek Spor Ayakabı'),
(11, 4, 2, 'Kadın İç Çamaşır'),
(12, 4, 2, 'Kadın Atlet'),
(13, 5, 2, 'Deri Çanta'),
(14, 5, 2, 'Kumaş Çanta'),
(15, 17, 2, 'Kadın Spor Ayakkabı'),
(16, 1, 2, 'Kadın Klasik'),
(17, 18, 1, 'Deri Kordon'),
(18, 7, 3, 'Işıklı'),
(19, 7, 3, 'Spor'),
(20, 7, 3, 'İlk Adım'),
(21, 8, 3, 'Araba'),
(22, 8, 3, 'Bebek'),
(23, 8, 3, 'Tren'),
(24, 9, 3, 'Zıbın'),
(25, 9, 3, 'Çocuk Tişört'),
(26, 9, 3, 'Çocuk Pantolon'),
(30, 2, 1, 'Erkek Tişört'),
(31, 13, 1, 'Cüzdan'),
(32, 6, 2, 'Akıllı Saat'),
(35, 1, 2, 'Kadın Pantolon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ana_kategori`
--

CREATE TABLE `ana_kategori` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ana_kategori`
--

INSERT INTO `ana_kategori` (`id`, `ad`) VALUES
(1, 'ERKEK'),
(2, 'KADIN'),
(3, 'ÇOCUK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `site_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sayfaAciklama` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `anahtarKelime` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganUst1` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganAlt1` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganUst2` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganAlt2` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganUst3` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sloganAlt3` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cocuk_kategori`
--

CREATE TABLE `cocuk_kategori` (
  `id` int(11) NOT NULL,
  `ana_kat_id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cocuk_kategori`
--

INSERT INTO `cocuk_kategori` (`id`, `ana_kat_id`, `ad`) VALUES
(1, 2, 'Dış Giyim'),
(2, 1, 'Dış Giyim'),
(3, 1, 'İç Giyim'),
(4, 2, 'İç Giyim'),
(5, 2, 'Çanta'),
(6, 2, 'Saat'),
(7, 3, 'Ayakkabı'),
(8, 3, 'Oyuncak'),
(9, 3, 'Giyim'),
(13, 1, 'Çanta'),
(17, 2, 'Ayakkabı'),
(18, 1, 'Saat'),
(19, 1, 'Ayakkabı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `konu` varchar(20) NOT NULL,
  `mesaj` text NOT NULL,
  `tarih` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `ad`, `mail`, `konu`, `mesaj`, `tarih`) VALUES
(1, 'Yusuf dsadasd', 'olcay@hotmail.com', 'deneme Konu', 'Mesajıızı deniyoruz fdsflködslfksdmlfjds', '20-05-2019'),
(2, 'Naber', 'oasdaskşd@gmail.com', 'staj', 'naber', '26-05-2025');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `siparis_no` int(11) NOT NULL,
  `adresid` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(30) NOT NULL,
  `urunadet` int(11) NOT NULL,
  `urunfiyat` int(11) NOT NULL,
  `toplamfiyat` int(11) NOT NULL,
  `kargodurum` int(11) NOT NULL DEFAULT 0,
  `odemeturu` varchar(10) NOT NULL,
  `tarih` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`id`, `siparis_no`, `adresid`, `uyeid`, `urunad`, `urunadet`, `urunfiyat`, `toplamfiyat`, `kargodurum`, `odemeturu`, `tarih`) VALUES
(31, 13290820, 1, 10, 'Işıklı', 3, 140, 420, 2, 'Nakit', '11.06.2019'),
(32, 13290820, 1, 10, 'Tahta', 3, 169, 507, 2, 'Nakit', '11.06.2019'),
(34, 92552904, 11, 12, 'Y MODEL', 3, 169, 507, 2, 'Nakit', '14.06.2019'),
(40, 50532941, 1, 10, 'Keten Ceket', 3, 147, 441, 0, 'Nakit', '28.05.2025'),
(39, 50532941, 1, 10, 'Gs Çocuk Tişört', 1, 147, 147, 0, 'Nakit', '28.05.2025'),
(38, 3284555, 1, 10, 'Beyaz Tişört', 1, 380, 380, 0, 'Nakit', '27.05.2025'),
(35, 59926344, 1, 10, 'Gs Çocuk Tişört', 1, 1905, 1905, 0, 'Nakit', '26.05.2025'),
(36, 63545040, 1, 10, 'Gs Çocuk Tişört', 1, 1905, 1905, 1, 'Nakit', '26.05.2025'),
(37, 18187291, 1, 10, 'Gs Çocuk Tişört', 1, 1905, 1905, 1, 'Nakit', '26.05.2025'),
(30, 13290820, 1, 10, 'X MODEL', 3, 147, 441, 2, 'Nakit', '11.06.2019'),
(29, 18408288, 1, 13, 'Normal', 3, 90, 270, 2, 'Nakit', '11.06.2019'),
(33, 92552904, 11, 12, 'Çamaşır-1', 3, 90, 270, 2, 'Nakit', '14.06.2019'),
(28, 18408288, 1, 13, 'Kot Pantolon', 2, 90, 180, 2, 'Nakit', '11.06.2019'),
(41, 78307889, 16, 17, 'Kumaş Pantolon', 1, 140, 140, 0, 'Nakit', '28.05.2025'),
(42, 78307889, 16, 17, 'Siyah Spor Ayakkabı', 1, 147, 147, 0, 'Nakit', '28.05.2025'),
(43, 78307889, 16, 17, 'Keten Gömlek', 1, 380, 380, 0, 'Nakit', '28.05.2025'),
(44, 78307889, 16, 17, 'Deri Kordonlu Saat', 1, 147, 147, 0, 'Nakit', '28.05.2025');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teslimatbilgileri`
--

CREATE TABLE `teslimatbilgileri` (
  `id` int(11) NOT NULL,
  `siparis_no` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teslimatbilgileri`
--

INSERT INTO `teslimatbilgileri` (`id`, `siparis_no`, `ad`, `soyad`, `mail`, `telefon`) VALUES
(1, 17131105, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(2, 78669138, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(3, 45747779, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(4, 89026050, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(5, 41370623, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(6, 55902761, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(7, 55155696, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(8, 70407290, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(9, 79279869, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(10, 18408288, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(11, 13290820, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(12, 92552904, 'dilek', 'kal', 'dilek@hotmail.com', '55522211122'),
(13, 59926344, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(14, 62800722, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(15, 63545040, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(16, 18187291, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(17, 3284555, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(18, 50532941, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', '0555178786'),
(19, 78307889, 'bunyamin', 'oter', 'bunyamin@gmial.com', '05551785451');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `katid` int(11) NOT NULL,
  `urunad` varchar(80) NOT NULL,
  `res1` varchar(100) NOT NULL,
  `res2` varchar(100) NOT NULL,
  `res3` varchar(100) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  `aciklama` text NOT NULL,
  `kumas` varchar(20) NOT NULL,
  `urtYeri` varchar(20) NOT NULL,
  `renk` varchar(10) NOT NULL,
  `fiyat` float NOT NULL,
  `stok` int(11) NOT NULL,
  `ozellik` text NOT NULL,
  `ekstraBilgi` text NOT NULL,
  `satisadet` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `katid`, `urunad`, `res1`, `res2`, `res3`, `durum`, `aciklama`, `kumas`, `urtYeri`, `renk`, `fiyat`, `stok`, `ozellik`, `ekstraBilgi`, `satisadet`) VALUES
(1, 1, 'Beyaz Tişört', 'e3a8a4ab1b0f74dc5da86c4ffa583d05.jpg', '33d14e857b3589229d9637f8afbd74bc.jpg', '52e0cf6add564698d1b3e744d5bb5c88.jpg', 2, 'Kadın Beyaz Tişörtt', 'Pamuk', 'Çin', 'Beyaz', 380, 10000, 'Beyaz Tişört için özellikler', 'Beyaz Tişört için ekstra bilgi', 10),
(2, 1, 'Sarı Tişört', '61ab534fa4bcc29b251724214f2c6b16.jpg', '80d54d1b00c191c1434da7552635e5a7.jpg', 'da04a30538b7327a8bfd927343aafd34.jpg', 2, 'Kadın Sarı Tişört', 'Pamuk', 'Uganda', 'Sarı', 270, 1000, 'Sarı Tişört için özellikler', 'Sarı Tişört için ekstra bilgi', 2),
(3, 2, 'Kumaş Pantolon', '2c1afd7b1d8bc3d17b708a7c08aafa0b.jpg', 'c67f277ca226f25913050dec132aba2a.jpg', 'de2498855b16c1742d4c9ac37b314e92.jpg', 2, 'Erkek Kumaş Pantolon', 'Likra', 'Afrika', 'Siyah', 140, 100, 'Kumaş Pantolon için özellikler', 'Kumaş Pantolon için ekstra bilgi', 5),
(4, 2, 'Kot Pantolon', 'f400177d1b10d9e6c9d358086d749ec1.jpg', '86e45c3e5409ef89379443a7c636df23.jpg', 'f8d06e1dc0a0cf060a1d03860f99089c.jpg', 0, 'Erkek Kot Pantolon', 'Kot', 'Kamboçya', 'Mavi', 90, 100, 'Kot Pantolon için özellikler', 'Kot Pantolon için ekstra bilgi', 8),
(5, 3, 'Keten Ceket', 'e4c17f5044bbf9612a40253eeeabfd74.jpg', '52ec28e60e9677ea2f4712a17cd2bf62.jpg', 'd3b16384666c39ea9c70a002646d978b.jpg', 2, 'Kadın Keten Ceket', 'Keten', 'Çin', 'Gri', 147, 190, 'Keten Ceket için özellikler', 'Keten Ceket için ekstra bilgi', 9),
(6, 3, 'Kumaş Ceket', '6d8e088922dd2a74fedd5f5233b3e214.jpg', 'da7640c8aad94c8bc4c33d19c41fd974.jpg', '11cd0fd998b3ff7c49714b6dc60eac8d.jpg', 0, 'Kadın Kumaş Ceket', 'Kumaş', 'Uganda', 'Pembe', 169, 10000, 'Kadın Kumaş Ceket için özellikler', 'Kadın Kumaş Ceket için ekstra bilgi', 0),
(7, 13, 'Deri Çanta', '3adf710896e43c40c6dda44b55fd1608.jpg', 'dcb67dd793a94acc8c90f99ffe5a64c7.jpg', '1751afcbd56d97bed10643e2b948016b.jpg', 1, 'Kadın Deri Çanta', 'Polyester', 'Afrika', 'Siyah', 570, 170, 'Kadın Deri Çanta için özellikler', 'Kadın Deri Çanta için ekstra bilgi', 0),
(8, 35, 'Kumaş Pantolon', '5ac02142e9dcda7d86f43c5368cb5e41.jpg', '0631cb3f216e25a50422c17aa6a693c6.jpg', '678d90fc190dbc0ceeeba97ad0d938cf.jpg', 1, 'Kadın Kumaş Pantolon', 'Kumaş', 'Kamboçya', 'Haki Yeşil', 684, 10000, 'Kumaş Pantolon için özellikler', 'Kumaş Pantolon için ekstra bilgi', 0),
(9, 30, 'Beyaz Tişört', '9d061d9be1eba747cae0d21b12b22d3d.jpg', 'c33f009201122de47452717ee2c6f20a.jpg', '2054d6d8450f173cd442ff0596dae4bd.jpg', 0, 'Beyaz Tişört', 'Pamuk', 'Kamboçya', 'Beyaz', 157, 10000, 'Beyaz Tişört için özellikler', 'Beyaz Tişört için ekstra bilgi', 0),
(10, 4, 'Keten Gömlek', 'b41a55c6c7c0bda8e2c7e5a96e47a54b.jpg', '5eea807fcb44ac52b379dd2446f62ba1.jpg', '58c9423277e9e635b2e9c49d288469ec.jpg', 0, 'Keten Gömlek', 'Keten', 'Çin', 'Beyaz', 380, 10000, 'Keten Gömlek için özellikler', 'Keten Gömlek için ekstra bilgi', 0),
(11, 4, 'Yazlık Gömlek', 'a69495bab3ab005aba22c53bb3a42666.jpg', '33cd60ecf7ac7a9613516c2c699d8783.jpg', '9bdcc750eed0ed950184e9767b99fd3c.jpg', 2, 'Desenli Yazlık Gömlek', 'Keten', 'Türkiye', 'Sarı', 270, 10000, 'Yazlık Gömlek için özellikler', 'Yazlık Gömlek için ekstra bilgi', 0),
(12, 5, 'Beyaz Atlet', '19afafb69a2531ca01c554200cf97358.jpg', '4491b8e9453fcd15f95e4905c2cbb3b7.jpg', '485d01e277166211b693d175a143928b.jpg', 0, 'Beyaz Atlet', 'Likra', 'Afrika', 'Beyaz', 140, 10000, 'Beyaz Atlet için özellikler', 'Beyaz Atlet için ekstra bilgi', 0),
(13, 5, 'Siyah Atlet', '3ec30a1aaa15ad2645aefd9fc70326ca.jpg', '25a2255d16809d831f9d162cb8bb4c52.jpg', 'ca532440171084254570162cdc2cc42f.jpg', 0, 'Siyah Atlet', 'Likra', 'Kamboçya', 'Sarı', 90, 100, 'Siyah Atlet için özellikler', 'Siyah Atlet için ekstra bilgi', 0),
(14, 6, 'Siyah Boxer 3&#039;lü', '99d562ab2eaf5c36c2f1eade48e4c6c7.jpg', 'feaac68bdff7c20bb099ca97df65155d.jpg', 'd72d2f04aa8b33af9a5d37b50b18c55a.jpg', 0, 'Siyah Boxer 3&#039;lü', 'Pamuk', 'Çin', 'Siyah', 147, 190, 'Siyah Boxer için özellikler', 'Siyah Boxer için ekstra bilgi', 0),
(15, 6, 'Erkek Boxer 3&#039;lü', 'c600aab674466da9057b406448ea92f5.jpg', 'f26dadae3e7dcb926e9ff43898b3abb0.jpg', 'e8c560ad71a15cf4568bfb108eaa2de9.jpg', 0, 'Erkek Boxer 3&#039;lü', 'Pamuk', 'Uganda', 'Siyah', 169, 10000, 'Erkek Boxer için özellikler', 'Erkek Boxer için ekstra bilgi', 0),
(16, 10, 'Siyah Takım Elbise', '48ec163e90b133f5efd4207653def1fa.jpg', '2b16b8fd90eacea1bae10c845a9803c7.jpg', 'e33b13d6828a8ce331472deb9c74061a.jpg', 0, 'Siyah Takım Elbise', 'Kumaş', 'Afrika', 'Siyah', 10000, 100, 'Siyah Takım Elbise için özellikler', 'Siyah Takım Elbise için ekstra bilgi', 0),
(17, 10, 'Lacivert Takım Elbise', '1a5c396c0bf062a445934849fcc6b629.jpg', 'a5522df8ef3579d0295544002e1fe1ab.jpg', '7ef0f7ed9edcb539b039d756fa0ef711.jpg', 2, 'Lacivert Takım Elbise', 'Kumaş', 'Kamboçya', 'Lacivert', 9000, 100, 'Lacivert Takım Elbise için özellikler', 'Lacivert Takım Elbise için ekstra bilgi', 0),
(18, 9, 'Siyah Spor Ayakkabı', '2c96b4d12dc163a91db2744f559c608a.jpg', '4f69f307e11e2349be187d03d341a986.jpg', '7562163147b78a7d9d4e5c4a888d4c67.jpg', 0, 'Siyah Spor Ayakkabı', 'Kumaş', 'Amerika', 'Siyah', 147, 190, 'Siyah Spor Ayakkabı için özellikler', 'Siyah Spor Ayakkabı için ekstra bilgi', 0),
(19, 9, 'Beyaz Spor Ayakkabı', '0e7f084dbf881c82ecd3836f653e7fea.jpg', '648467dd2d38c7edf3c575a21ed43c7c.jpg', 'b6b18b90f25d84f2344c25cbe05fa118.jpg', 0, 'Beyaz Spor Ayakkabı', 'Keten', 'Amerika', 'Beyaz', 2255, 10000, 'Beyaz Spor Ayakkabı için özellikler', 'Beyaz Spor Ayakkabı için ekstra bilgi', 0),
(20, 11, 'Kadın Külot', '7ef5b9b3d230910935fe3855abd7b93f.jpg', '1b8a9ff24cc0151fa4f6f14144c736ed.jpg', '7840e34fbfa20607b5e1b04ee4801fee.jpg', 0, 'Kadın Külot', 'Likra', 'Türkiye', 'Pembe', 140, 1000, 'Kadın Külot için özellikler', 'Kadın Külot için ekstra bilgi', 0),
(21, 11, 'Leopar Desenli İç Çamaşır', 'ad577db631461a973c16e966711d73d1.jpg', 'c8a541afc1bcd2ecf3659c815da1f4e7.jpg', '858c72f6cbd1055d87f8ec304234dd3c.jpg', 1, 'Leopar Desenli İç Çamaşır', 'Saten', 'Adana', 'Leopar Des', 1999, 10000, 'Leopar Desenli İç Çamaşır için özellikler', 'Leopar Desenli İç Çamaşır için ekstra bilgi', 0),
(22, 12, 'Siyah Kadın Atlet', '4545ffe301a69a546be842568eaca9b7.jpg', 'acf416867df0f00ad6598f96f7ff2867.jpg', 'ef93f6516163cd64bceaa1c7ab79590e.jpg', 0, 'Siyah Kadın Atlet', 'Pamuk', 'Çin', 'Siyah', 147, 190, 'Siyah Kadın Atlet için özellikler', 'Siyah Kadın Atlet için ekstra bilgi', 0),
(23, 12, 'Beyaz Büstiyer', '92b2a0483cd2a8414921d560dd674d5c.jpg', 'e81513156a832976c456c4b6a83a2984.jpg', '8c6ede503e33608d373f3044e572bb08.jpg', 0, 'Beyaz Büstiyer', 'Pamuk', 'Uganda', 'Beyaz', 169, 101, 'Beyaz Büstiyer için özellikler', 'Beyaz Büstiyer için ekstra bilgi', 0),
(24, 13, 'Timsah Derisi Çanta', '66cbea5bf5f61ac5cc2e8282e9303f90.jpg', '21abb412132d23bb9035ff63669e89b5.jpg', '2c76ff4299d3705087635d36da092a9c.jpg', 1, 'Timsah Derisi Çanta', 'Deri', 'Afrika', 'Timsah Der', 140, 10000, 'Timsah Derisi Çanta için özellikler', 'Timsah Derisi Çanta için ekstra bilgi', 0),
(26, 14, 'Askılı Çanta', 'fe5f20aa060f6c65834dbdd4c6c7325a.jpg', '8c63eda32b19e45b3c49449a70c13012.jpg', '7d518ac0458c8d98811077648a9b6c3b.jpg', 0, 'Askılı Çanta', 'Polyester', 'Çin', 'Kahverengi', 147, 190, 'Askılı Çanta için özellikler', 'Askılı Çanta için ekstra bilgi', 0),
(27, 14, 'Bez Çanta', '653416d8f8c9a3ac512bf2c1dd5c5d55.jpg', '3fb1ce72efd6e1a84345d959df9ddf66.jpg', '1f6afc31317fa9adb85eddb2ae982adf.jpg', 0, 'Bez Çanta', 'Keten', 'Uganda', 'Koyu Yeşil', 169, 10000, 'Bez Çanta için özellikler', 'Bez Çanta için ekstra bilgi', 0),
(28, 15, 'Pembe Spor Ayakkabı', '31e3b0083a3d1384adfa0001d832f347.jpg', '6979b125089cb2ed8f0605abbe1db098.jpg', 'f2bf52ae7c3c3c6a9d5941d085c4149e.jpg', 0, 'Pembe Spor Ayakkabı', 'Kumaş', 'Afrika', 'Pembe', 140, 10000, 'Pembe Spor Ayakkabı için özellikler', 'Pembe Spor Ayakkabı için ekstra bilgi', 0),
(29, 15, 'Beyaz Spor Ayakkabı', '74923807eb757d280e763cae5dd27b8f.jpg', '96fbd7184cd34bd72035c2b7336ff2cc.jpg', '4785be344ba2a9f8663a134e97cd3982.jpg', 0, 'Beyaz Spor Ayakkabı', 'Kumaş', 'Amerika', 'Beyaz', 900, 10000, 'Beyaz Spor Ayakkabı için özellikler', 'Beyaz Spor Ayakkabı için ekstra bilgi', 0),
(30, 16, 'Klasik Takım', '5c3cdf5a61d73d0559d3f0ed18e82ba6.jpg', '2188023d2511b4a74157851442014c51.jpg', 'ae0b189e3a2d694598a3669f193811d5.jpg', 2, 'Klasik Takım', 'Pamuk', 'Çin', 'Bej', 147, 190, 'Klasik Takım için özellikler', 'Klasik Takım için ekstra bilgi', 0),
(31, 16, 'Klasik Takım', '331595205321be60c1dbbc1c110e7f68.jpg', 'd844cd5e496f33dfb298cf7936a656c9.jpg', 'f0aaa78936ed3cd8ab471b86933c0987.jpg', 0, 'Klasik Takım', 'Keten', 'Uganda', 'Siyah', 1699, 10000, 'Klasik Takım için özellikler', 'Klasik Takım için ekstra bilgi', 0),
(32, 17, 'Deri Kordonlu Saat', '969779f9af9d1cb3a2b71033c69ea0da.jpg', '026777d885e883299e6e74f6158f9b09.jpg', '87c2dfabd9f0d977d6a94a1dc164a080.jpg', 0, 'Deri Kordonlu Saat', 'Deri', 'Amerika', 'Siyah', 147, 190, 'Deri Kordonlu Saat için özellikler', 'Deri Kordonlu Saat için ekstra bilgi', 0),
(33, 32, 'Pembe Akıllı Saat', '79d8abf5e5718651e02e61ff4ce77481.jpg', 'fc7bd7d398117e15faf831a688b33eea.jpg', 'a6823b2bf71a5ff2211c705c8f40dbcf.jpg', 0, 'Pembe Akıllı Saat', 'Polyester', 'Çin', 'Pembe', 1690, 10000, 'Pembe Akıllı Saat için özellikler', 'Pembe Akıllı Saat için ekstra bilgi', 0),
(34, 18, 'Işıklı Ayakkabı', '8a9223f7139d6495de74458c412cf5ec.jpg', '89e1f1efda79e11cc973e03fcb5f3104.jpg', 'eaa5bfbf7a989107caae6b91bfa7a2fd.jpg', 0, 'Işıklı Ayakkabı', 'Polyester', 'Çin', 'Gri', 147, 190, 'Işıklı Ayakkabı için özellikler', 'Işıklı Ayakkabı için ekstra bilgi', 0),
(36, 19, 'Çocuk Spor Ayakkabı', '3b9e588043a85094a95fcf8476dafe6a.jpg', '423d72db47f0c0c997fcba0a0a472927.jpg', 'be1230354208dd717cd3b98c47d5aadb.jpg', 0, 'Çocuk Spor Ayakkabı', 'Likra', 'Türkiye', 'Beyaz', 1905, 1905, 'Çocuk Spor Ayakkabı için özellikler', 'Çocuk Spor Ayakkabı için ekstra bilgi', 0),
(37, 19, 'Çocuk Spor Ayakkabı', '7b9a3e7e4e9f24f9b57344c6683a8d8c.jpg', '1c22aebf6ef62014fe5225b420f8debf.jpg', '54804b8e910d1e8820f108d6b21d12c3.jpg', 0, 'Çocuk Spor Ayakkabı', 'Kumaş', 'Türkiye', 'Siyah', 1905, 1905, 'Çocuk Spor Ayakkabı için özellikler', 'Çocuk Spor Ayakkabı için ekstra bilgi', 0),
(38, 20, '0-3 Yaş Bebek Ayakkabı', '614a573f1d088fc51baa7ab6e6b8be35.jpg', '4fb881419125c114643291b206347d36.jpg', 'e938b1a64fe4e71e223ef4632c6295a7.jpg', 0, '0-3 Yaş Bebek Ayakkabı', 'Pamuk', 'Çin', 'Siyah', 147, 190, '0-3 Yaş Bebek Ayakkabı için özellikler', '0-3 Yaş Bebek Ayakkabı için ekstra bilgi', 0),
(39, 20, '0-3 Yaş Bebek Ayakkabı', '5357dc8586add3460d736d89d2ee71ab.jpg', '8c71cbc1a39fe45f690365d21dba03c7.jpg', 'ddbfe10ccbe05b8dd06124bb858c1faf.jpg', 0, '0-3 Yaş Bebek Ayakkabı', 'Pamuk', 'Türkiye', 'Siyah', 169, 10000, '0-3 Yaş Bebek Ayakkabı için özellikler', '0-3 Yaş Bebek Ayakkabı için ekstra bilgi', 0),
(40, 21, 'Oyuncak Araba Kamyon', '58aae0bfad970c2580b8ce8217f619a0.jpg', 'd49e11f3e35ce17eafe2b832fc3c404e.jpg', '3fa8e9cd027d493f8b17e374d45501a8.jpg', 0, 'Oyuncak Araba', 'Plastik', 'Çin', 'Sarı', 147, 190, 'Oyuncak Araba için özellikler', 'Oyuncak Araba için ekstra bilgi', 0),
(41, 21, 'Oyuncak Araba F1', 'eb5181600d40f6d43acf9aab8e1b7fa5.jpg', 'fda718f5c5004a8933c2947ef9bf6985.jpg', '49e1eeae85236ab7e6eefb9ac70ad60d.jpg', 0, 'Oyuncak Araba F1', 'Plastik', 'Türkiye', 'Kırmızı', 169, 10000, 'Oyuncak Araba F1 için özellikler', 'Oyuncak Araba F1 için ekstra bilgi', 0),
(42, 22, 'Barbie Oyuncak Bebek', '2a44178ad5363c12877cd8a79f01aa6d.jpg', '527793a918d0c608d6d71eecc7a29c06.jpg', '0ae7c12a1a308d595a543fd6cf5cab13.jpg', 0, 'Barbie Bebek', 'Pamuk', 'Çin', 'Pembe', 147, 190, 'Barbie Bebek için özellikler', 'Barbie Bebek için ekstra bilgi', 0),
(43, 22, 'Tilki Oyuncak Bebek', 'bf3515ed8347b9c834975af86e1197de.jpg', '8c2b9b4dd1ad833b90967e3ea20670da.jpg', '07a38b9dcdc91b173575a2895a6628ea.jpg', 0, 'Tilki Oyuncak Bebek', 'Pamuk', 'Afrika', 'Turuncu', 169, 10000, 'Tilki Oyuncak Bebek için özellikler', 'Tilki Oyuncak Bebek için ekstra bilgi', 0),
(44, 23, 'Lego Tren', '350d461d708fea3c44b1ede2cfeba9ff.jpg', 'd1e97a2e698a6b8fd2eb4c2b945482fc.jpg', '854517fd92c5ff007c61afcbf146161d.jpg', 0, 'Lego Tren', 'Plastik', 'Çin', 'Kırmızı', 147, 190, 'Lego Tren için özellikler', 'Lego Tren için ekstra bilgi', 0),
(46, 24, 'Superman Zıbın', 'a0ca5649297acd005beec4829e8df46d.jpg', '5b089ffe067f92f76ff1339b77dcf9cd.jpg', 'bfc304dbdc5f20501bb1e59bf35d0d81.jpg', 0, 'Superman Zıbın', 'Likra', 'Amerika', 'Mavi', 140, 10000, 'Superman Zıbın için özellikler', 'Superman Zıbın için ekstra bilgi', 0),
(47, 24, 'Kahverengi Zıbın', '666f36423558760d651d949b673aeeca.jpg', 'c1cab36677bdebc4db5b9ca7ae6e88e9.jpg', '10db4b117245138a2da547c6de777235.jpg', 0, 'Kahverengi Zıbın', 'Pamuk', 'Afrika', 'Kahverengi', 90, 10000, 'Kahverengi Zıbın için özellikler', 'Kahverengi Zıbın için ekstra bilgi', 0),
(48, 25, 'Gs Çocuk Tişört', '1f71ec2c418284ef67db3a180aed62b1.jpg', '74dc15bda80e6d89fb746d29994c6d5b.jpg', '522f0d99564bbc7b155273a583845460.jpg', 2, 'Gs Çocuk Tişört', 'Pamuk', 'Türkiye', 'Sarı', 147, 190, 'Gs Çocuk Tişört için özellikler', 'Gs Çocuk Tişört için ekstra bilgi', 0),
(49, 26, 'Çocuk Keten Pantolon', 'bcbae769006482c429664604a60b99e2.jpg', 'c69d1635caed89ffaa960fdb3a2975a3.jpg', '543d5a30ba09f690c71e309378105bb3.jpg', 0, 'Çocuk Keten Pantolon', 'Keten', 'Uganda', 'Bej', 169, 10000, 'Çocuk Keten Pantolon için özellikler', 'Çocuk Keten Pantolon için ekstra bilgi', 0),
(50, 26, ' Çocuk Kot Pantolon', '451f8e07738613e5c086ce7ff357fa10.jpg', '26527605ecbf6f0436ead58f61418fbd.jpg', 'fea101f2d17e2b53cf7655cd8bb5c7c3.jpg', 0, ' Çocuk Kot Pantolon', 'Kot', 'Çin', 'Mavi', 147, 190, ' Çocuk Kot Pantolon için özellikler', ' Çocuk Kot Pantolon için ekstra bilgi', 0),
(61, 31, 'Deri Cüzdan', 'f40abd4050e5891b00e5e076c7598226.jpg', '70241dded9228ed3fd1689b2ec6f4230.jpg', '94ab2acc0aea6df551a5982b30191708.jpg', 0, 'Deri Cüzdan', 'Deri', 'Türkiye', 'Kahverengi', 1905, 10, 'Deri Cüzdan', 'Deri Cüzdan', 0),
(57, 25, 'Gs Çocuk Tişört', 'a1c9fad2d53ae70ba4a99cbe11cc3a9d.jpg', '99ffe92a9dbddd536500dc7bee543e96.jpg', 'ea2add0cc62e2e05f0a30c8551ad833f.jpg', 1, 'Galatasaray', 'Pamuk', 'Türkiye', 'Sarı', 1905, 1905, 'Galatasaray', 'Galatasaray', 0),
(59, 30, 'Gri Tişört', '4dfda3b44a4d43ee66a4f42648ea8f9f.jpg', '19213a0dcdb6a4985b5482127e078ca9.jpg', '53440500518057e41aaf26d345231e1c.jpg', 2, 'Gri Tişört', 'Penye', 'Türkiye', 'Gri', 1999, 10, 'Gri Tişört için özellik', 'Gri Tişört için ekstra bilgi', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_panel`
--

CREATE TABLE `uye_panel` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sifre` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uye_panel`
--

INSERT INTO `uye_panel` (`id`, `ad`, `soyad`, `mail`, `sifre`, `telefon`, `durum`) VALUES
(13, 'hakann', 'yılmaz', 'hak@gmail.com', '1', '04442221122', 0),
(12, 'dilek', 'kal', 'dilek@hotmail.com', 'q5ijvc1oU5CRScAmNgZuacZfAA==', '55522211122', 1),
(10, 'olcay', 'Kalyon', 'olcayrewr@gmail.com', 'q5ijvc1oU5CRUcAmNgZuecbfAA==', '0555178786', 1),
(16, 'bunyamincik', 'yılmazaaa', 'bunyamin@gmial.com', 'q5ijvc1oU5CRQcgmNgZuKcZfAA==', '0555178787', 0),
(17, 'bunyamin', 'oter', 'bunyamin@gmial.com', 'q5ijvc1oU5CRScAmNgZuacZfAA==', '05551785451', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) NOT NULL,
  `sifre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `ad`, `sifre`) VALUES
(22, 'bunyamin', 'q5ijvc1oU5CRScAmNgZuacZfAA=='),
(23, 'huseyin', 'q5ijvc1oU5CRScAmNgZuacZfAA=='),
(19, 'olcay', 'q5ijvc1oU5CRUcAmNgZuecbfAA==');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `urunid` int(11) NOT NULL,
  `ad` varchar(40) NOT NULL,
  `icerik` text NOT NULL,
  `tarih` varchar(20) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `uyeid`, `urunid`, `ad`, `icerik`, `tarih`, `durum`) VALUES
(6, 10, 4, 'aaaaaa', 'İyi ürün', '17-05-2019', 0),
(11, 10, 6, 'DSF', 'Gayet güzel 3454345', '17-05-2019', 0),
(10, 10, 6, 'fdg', 'Düzelttik\n', '17-05-2019', 0),
(13, 10, 4, 'olcay', 'İsimden sonra yorum deneme', '23-05-2019', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresler`
--
ALTER TABLE `adresler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `alt_kategori`
--
ALTER TABLE `alt_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ana_kategori`
--
ALTER TABLE `ana_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cocuk_kategori`
--
ALTER TABLE `cocuk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `teslimatbilgileri`
--
ALTER TABLE `teslimatbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye_panel`
--
ALTER TABLE `uye_panel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresler`
--
ALTER TABLE `adresler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `alt_kategori`
--
ALTER TABLE `alt_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `ana_kategori`
--
ALTER TABLE `ana_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `cocuk_kategori`
--
ALTER TABLE `cocuk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `teslimatbilgileri`
--
ALTER TABLE `teslimatbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Tablo için AUTO_INCREMENT değeri `uye_panel`
--
ALTER TABLE `uye_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
