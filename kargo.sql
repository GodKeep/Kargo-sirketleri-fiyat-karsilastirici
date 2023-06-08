-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Haz 2023, 18:52:35
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kargo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim_formu`
--

CREATE TABLE `iletisim_formu` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `mesaj` text DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iletisim_formu`
--

INSERT INTO `iletisim_formu` (`id`, `ad`, `email`, `telefon`, `mesaj`, `tarih`) VALUES
(1, 'asdddddddd', '123123123', '123123123', '123123', '2023-06-07 14:49:35'),
(16, 'deneme', 'bora@bora.com', '55555', '123123', '2023-06-08 13:16:34'),
(17, 'deneme', 'bora@bora.com', '55555', '123123', '2023-06-08 13:18:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kargo_firmalari`
--

CREATE TABLE `kargo_firmalari` (
  `desi` int(11) DEFAULT NULL,
  `UPS` decimal(5,2) DEFAULT NULL,
  `PTT` decimal(5,2) DEFAULT NULL,
  `Sürat` decimal(5,2) DEFAULT NULL,
  `MNG` decimal(5,2) DEFAULT NULL,
  `Yurtiçi` decimal(5,2) DEFAULT NULL,
  `Aras` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kargo_firmalari`
--

INSERT INTO `kargo_firmalari` (`desi`, `UPS`, `PTT`, `Sürat`, `MNG`, `Yurtiçi`, `Aras`) VALUES
(0, 112.00, 10.00, 10.00, 10.00, 10.00, 10.00),
(1, 11.00, 11.00, 11.00, 11.00, 11.00, 11.00),
(2, 12.00, 12.00, 12.00, 12.00, 12.00, 12.00),
(3, 12.00, 12.00, 12.00, 12.00, 12.00, 12.00),
(4, 13.00, 13.00, 13.00, 13.00, 13.00, 13.00),
(5, 13.00, 13.00, 13.00, 111.00, 13.00, 13.00),
(6, 14.00, 14.00, 14.00, 14.00, 14.00, 156.00),
(7, 14.00, 14.00, 14.00, 14.00, 14.00, 14.00),
(8, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(9, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(10, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(11, 11.00, 11.00, 11.00, 11.00, 11.00, 11.00),
(12, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(13, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(14, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(15, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(16, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(17, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(18, 18.00, 18.00, 18.00, 18.00, 18.00, 18.00),
(19, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(20, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(21, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(22, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(23, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(24, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00),
(25, 15.00, 15.00, 15.00, 15.00, 15.00, 15.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '123', '123', '2023-06-06 18:51:24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
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
-- Tablo için AUTO_INCREMENT değeri `iletisim_formu`
--
ALTER TABLE `iletisim_formu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
