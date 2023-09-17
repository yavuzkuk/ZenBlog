-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Eyl 2023, 13:52:48
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
-- Veritabanı: `web`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `companyAboutTitle` text NOT NULL,
  `companyAbout` text NOT NULL,
  `companyMissionTitle` text NOT NULL,
  `companyMission` text NOT NULL,
  `companyTeamTitle` text NOT NULL,
  `companyTeam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `companyAboutTitle`, `companyAbout`, `companyMissionTitle`, `companyMission`, `companyTeamTitle`, `companyTeam`) VALUES
(1, 'Problem çözmeye çalışıyoruz', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an ', '', 'Takımımız ile tanışın');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogcomment`
--

CREATE TABLE `blogcomment` (
  `id` int(11) NOT NULL,
  `blogId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `blogComment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blogcomment`
--

INSERT INTO `blogcomment` (`id`, `blogId`, `userId`, `blogComment`) VALUES
(1, 2, 2, 'Güzel bir içerik olmuş'),
(2, 2, 1, 'Deneme'),
(3, 2, 1, 'bUNU DENE BAKALIM'),
(4, 2, 1, 'alert(1)'),


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blogTitle` varchar(400) NOT NULL,
  `blogSummary` text DEFAULT NULL,
  `blogContent` text NOT NULL,
  `blogPic` text NOT NULL,
  `categoryId` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `likeNumber` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `blogTitle`, `blogSummary`, `blogContent`, `blogPic`, `categoryId`, `author`, `visible`, `likeNumber`, `date`) VALUES
(1, 'Samsunda gezilecek yerler', 'adadasd', 'Samsunda gezilecek yerler. ile daha güzel gezilir.Samsunda gezilecek yerler.  ile daha güzel gezilir.Samsunda gezilecek yerler.  ile daha güzel gezilir.Samsunda gezilecek yerler.  ile daha güzel gezilir.Samsunda gezilecek yerler.  ile daha güzel gezilir.Samsunda gezilecek yerler.  ile daha güzel gezilir.', '17099e780dcb8b26e8f3cbf9320c4a66.png', 2, 1, 1, 0, '2023-09-07 19:19:57'),
(2, 'Polonya\'da gezilecek yerler', 'adasdasdsa', ' Polonya\'ya gidiyor.ya gidiyor.  gidip gelicek.', '7fd697997c1c31ea4c6715e2ed471ec5.png', 2, 1, 1, 3, '2023-09-09 17:09:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Bilişim'),
(2, 'Gezme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactmessage`
--

CREATE TABLE `contactmessage` (
  `id` int(11) NOT NULL,
  `contactName` varchar(400) NOT NULL,
  `contactSubject` varchar(400) NOT NULL,
  `contactMail` text NOT NULL,
  `contactConten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mainpage`
--

CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL,
  `fourth` int(11) NOT NULL,
  `fifth` int(11) NOT NULL,
  `sixth` int(11) NOT NULL,
  `seventh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `mainpage`
--

INSERT INTO `mainpage` (`id`, `first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`) VALUES
(1, 2, 2, 1, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teammember`
--

CREATE TABLE `teammember` (
  `id` int(11) NOT NULL,
  `memberName` varchar(500) NOT NULL,
  `memberPosition` varchar(500) NOT NULL,
  `memberCv` text NOT NULL,
  `memberPic` text NOT NULL,
  `skills` varchar(900) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `teammember`
--

INSERT INTO `teammember` (`id`, `memberName`, `memberPosition`, `memberCv`, `memberPic`, `skills`, `admin`) VALUES
(1, 'Yavuz Kuk', 'CEO', 'Karabük Üniversitesi Bilgisayar Mühendisliği 3.sınıf öğrencisiyken bu şirketi kurmayı düşünen 2 ortaktan biridir.', 'person.png', '', 1),
(2, 'Gülde Turhanoğlu', 'CEO', 'Şirketi kuran ortaklardan diğeridir.', 'person.png', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(500) NOT NULL,
  `userPass` varchar(500) NOT NULL,
  `userMail` varchar(700) NOT NULL,
  `userPic` text NOT NULL DEFAULT 'person.png',
  `activationCode` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `activate` int(11) NOT NULL DEFAULT 0,
  `isAdmin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `userName`, `userPass`, `userMail`, `userPic`, `activationCode`, `try`, `activate`, `isAdmin`) VALUES
(1, 'yvz', 'asd', 'yavuz-kuk@hotmail.com', 'person.png', 3113313, 0, 1, 1),
(2, 'polo', 'asd', 'cowaf17001@lieboe.com', 'person.png', 898724, 0, 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogComment` (`blogId`),
  ADD KEY `commentUserId` (`userId`);

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogsCategory` (`categoryId`),
  ADD KEY `blogsAuthor` (`author`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mainpage`
--
ALTER TABLE `mainpage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mainpageFirst` (`first`),
  ADD KEY `mainpageSecond` (`second`),
  ADD KEY `mainpageThird` (`third`),
  ADD KEY `mainpageFourth` (`fourth`),
  ADD KEY `mainpageFifth` (`fifth`),
  ADD KEY `mainpageSixth` (`sixth`),
  ADD KEY `mainpageSeventh` (`seventh`);

--
-- Tablo için indeksler `teammember`
--
ALTER TABLE `teammember`
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
-- Tablo için AUTO_INCREMENT değeri `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `mainpage`
--
ALTER TABLE `mainpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `teammember`
--
ALTER TABLE `teammember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD CONSTRAINT `blogComment` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `commentUserId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogsAuthor` FOREIGN KEY (`author`) REFERENCES `teammember` (`id`),
  ADD CONSTRAINT `blogsCategory` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);

--
-- Tablo kısıtlamaları `mainpage`
--
ALTER TABLE `mainpage`
  ADD CONSTRAINT `mainpageFifth` FOREIGN KEY (`fifth`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageFirst` FOREIGN KEY (`first`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageFourth` FOREIGN KEY (`fourth`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageSecond` FOREIGN KEY (`second`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageSeventh` FOREIGN KEY (`seventh`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageSixth` FOREIGN KEY (`sixth`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `mainpageThird` FOREIGN KEY (`third`) REFERENCES `blogs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
