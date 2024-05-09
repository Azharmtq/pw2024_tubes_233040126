-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 10:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_besarpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '$2y$10$vGxyQfyG8yux9LBWecA4S.m.IZxFIRl.gfWCiXU0EWmHat/ckfn7.');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_musik` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_upload` date DEFAULT NULL,
  `content_release` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_title`, `content_musik`, `content_url`, `content_picture`, `content_upload`, `content_release`) VALUES
(1, 'Konser Justin Bieber di Jakarta Ditunda, Penggemar Kecewa', 'Konser Justin Bieber di Jakarta yang dijadwalkan pada 2 Juni 2023 ditunda hingga 3 Oktober 2023. Penundaan ini diumumkan secara resmi oleh Live Nation Indonesia melalui akun Instagramnya pada hari Senin (28/11/2023).', 'https://www.cnnindonesia.com/hiburan/20221007062018-227-857434/konser-justin-bieber-di-jakarta-resmi-ditunda', 'justin-bieber_169.jpeg', '2024-05-08', '2023-11-28'),
(2, 'Blackpink Gelar Konser di Jakarta pada 19-20 Maret 2024', 'Blackpink akan kembali menggelar konser di Jakarta pada 19-20 Maret 2024 di Stadion Utama Gelora Bung Karno. Tiket konser akan mulai dijual pada 15 November 2023.', 'https://www.cnbcindonesia.com/lifestyle/20230312122907-33-420943/konser-di-jakarta-blackpink-pecahkan-rekor-dunia', 'blkpik_169.jpeg', '2024-05-08', '2023-03-12'),
(3, 'Album Baru Slank ', 'Slank merilis album baru mereka yang berjudul \"Slank 30 Tahun\" untuk merayakan 30 tahun perjalanan mereka di dunia musik Indonesia. Album ini berisi 12 lagu baru dan 3 lagu lama yang telah diaransemen ulang.', 'https://seleb.tempo.co/read/1685245/slank-segera-masuk-dapur-rekaman-tahun-ini-siapkan-album-baru', 'slank_170.jpg', '2024-05-08', '2023-01-23'),
(4, '30 Tahun Berkarya, Sheila Majid Gelar Konser di Indonesia', 'Sheila Majid merayakan tiga dekade dalam 30th Anniversary perjalanan karir bermusiknya di blantika musik. Sheila Majid adalah penyanyi yang memiliki pengaruh besar di musik tanah air. Lagu-lagu hitsnya seperti Antara Anyer dan Jakarta adalah salah satu lagu hits yang membuat namanya dikenal di Indonesia.', 'https://www.fimela.com/entertainment/read/2466332/30-tahun-berkarya-sheila-majid-gelar-konser-di-indonesia', 'sheila.webp', '2024-05-08', '2024-05-08'),
(5, 'Jonathan Kuo, Pianis Muda Indonesia yang Kembali Memukau di Panggung Musik Klasik ', 'VIVA Showbiz – Pianis muda Indonesia, Jonathan Kuo, kembali menghadirkan keajaiban musik klasik bagi para penikmat di Tanah Air. Bersama dengan Jakarta Sinfonietta di bawah arahan komposer Iswargia R Sudarno, Jonathan Kuo menggelar konser Brahms & Dvořák di Usmar Ismail Hall pada Sabtu, 4 Mei 2024.', 'https://www.viva.co.id/showbiz/musik/1712085-jonathan-kuo-pianis-muda-indonesia-yang-kembali-memukau-di-panggung-musik-klasik', 'jonathan-kuo.webp', '2024-05-08', '2024-05-08'),
(6, 'Lucky Widja Element Kenang Cobaan Terberat Hidupnya Termasuk Kehilangan Ayah Melalui Single Mencintaimu Merelakanmu', 'Liputan6.com, Jakarta Lucky Widja, salah satu dari dua vokalis Element Band (ditulis ELEMENT), terbilang aktif dalam hal berkreasi di kancah musik Indonesia. Sudah lebih dari seperempat abad ia telah berkarya bersama band yang telah membesarkan namanya, Lucky Widja kini kembali merilis album solo yang merupakan koleksi lagu-lagu gubahannya.\r\n\r\nSebelumnya, Lucky sempat merilis album solo perdananya pada tahun 2006 bertajuk “Untukmu Cinta”. Kali ini dalam album solo keduanya yang nantinya berjudul “Mencintaimu”, sebagai awal pembuka, ia memutuskan untuk merilis single pertamanya dahulu dengan judul “Mencintaimu Merelakanmu” pada tanggal 1 Mei 2024.', 'https://www.liputan6.com/showbiz/read/5589016/lucky-widja-element-kenang-cobaan-terberat-hidupnya-termasuk-kehilangan-ayah-melalui-single-mencintaimu-merelakanmu', 'lucky-widja.webp', '2024-05-08', '2024-05-07'),
(7, 'Konser Gratisnya Dihadiri 1,6 Juta Penonton, Madonna Patahkan Rekor The Rolling Stones', 'Liputan6.com, Rio de Janeiro - Madonna sukses menutup rangkaian konser The Celebration Tour-nya dengan sebuah rekor.\r\n\r\nDigelar di Pantai Copacabana, Rio de Janeiro, Brasil, secara gratis, menurut catatan Live Nation, konser ratu pop veteran itu dihadiri tak kurang dari 1,6 juta penonton.\r\n\r\nCatatan jumlah penonton ini melewati rekor yang dicetak band rock veteran The Rolling Stones saat menggelar konser di tempat yang sama tahun 2006. Ketika itu, penampilan Mick Jagger dan kawan disaksikan 1,5 juta penonton.', 'https://www.liputan6.com/showbiz/read/5589801/konser-gratisnya-dihadiri-16-juta-penonton-madonna-patahkan-rekor-the-rolling-stones', 'madonna.webp', '2024-05-09', '2024-05-06'),
(8, 'Tulus Gelar Tur Konser \"Tur Nalar\" di 11 Kota Indonesia', 'Tulus akan menggelar tur konser \"Tur Nalar\" di 11 kota di Indonesia. Tur ini akan dimulai pada bulan Februari 2024 dan berakhir pada bulan April 2024.', 'https://www.loket.com/e/tulusturmanusia2023', '[IMAGE_URL]', NULL, NULL),
(9, 'Judika Kembali Rilis Album Baru Setelah 7 Tahun', 'Judika kembali merilis album baru setelah 7 tahun hiatus. Album ini berjudul \"Judika\" dan berisi 10 lagu baru.', 'https://www.youtube.com/watch?v=zQFwOJXxstg', '[IMAGE_URL]', '2024-05-08', '2024-05-08'),
(10, 'Yovie & Nuno Gelar Konser \"Terima Kasih 30 Tahun\" di 15 Kota', 'Yovie & Nuno akan menggelar konser \"Terima Kasih 30 Tahun\" untuk merayakan 30 tahun perjalanan mereka di dunia musik Indonesia. Konser ini akan diadakan di 15 kota di Indonesia.', 'https://nasional.tempo.co/read/1666810/yovie-nuno-gelar-konser-terima-kasih-30-tahun-di-15-kota', '[IMAGE_URL]', NULL, NULL),
(11, 'Rich Brian Rilis Album Baru \"IDIOT\", Kolaborasi dengan NIKI', 'Rich Brian merilis album baru berjudul \"IDIOT\" yang merupakan kolaborasi dengan penyanyi Indonesia, NIKI. Album ini berisi 10 lagu baru.', 'https://www.youtube.com/watch?v=24-5945188k', '[IMAGE_URL]', NULL, NULL),
(12, 'Festival Musik \"Soundrenaline\" Kembali Digelar di Bali', 'Festival musik \"Soundrenaline\" akan kembali digelar di Bali pada tanggal 2-4 September 2023. Festival ini akan menghadirkan berbagai musisi ternama dari Indonesia dan mancanegara.', 'https://www.cnnindonesia.com/hiburan/20230519151606-227-956524/festival-musik-soundrenaline-kembali-di-gelar-di-bali', '[IMAGE_URL]', NULL, NULL),
(13, 'Ardhito Pramono Rilis Single Baru \"Sudah\", Lagu tentang Kehilangan', 'Ardhito Pramono merilis single baru berjudul \"Sudah\" yang menceritakan tentang kehilangan dan rasa sakit hati. Lagu ini telah ditonton lebih dari 1 juta kali di YouTube.', 'https://www.youtube.com/watch?v=y10_y38a5wE', '[IMAGE_URL]', NULL, NULL),
(14, 'Pamungkas Kembali Manggung di Synchronize Fest 2023', 'Pamungkas akan kembali manggung di Synchronize Fest 2023 yang akan diadakan di Gambir Expo, Jakarta pada tanggal 7-9 Oktober 2023.', 'https://www.youtube.com/watch?v=24-5945188k', '[IMAGE_URL]', NULL, NULL),
(15, 'ini ujicoba last aja\"🗿🗿🗿\"', 'mungkin saya kurang sih di bagian design', 'inimah pribadi banget', 'logo.jpg', '2024-05-09', '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username_user`, `email_user`, `password_user`) VALUES
(1, 'azhar', 'azhar@gmail.com', '$2y$10$GYL4HlbvnjdM5NxUapoyn..I7F3rqs4zhc8kW4RbSC.zMZWD3PRjG'),
(2, 'raihan', 'raihan@gmail.com', '$2y$10$hqbRn.As3r6.XJFHtJjgReg4niFo7bs8yUSNB65Hp/V71R/t7uURu'),
(3, 'yapi', 'yapi@gmail.com', '$2y$10$SlWi/IcjouMh3dLO6wPDWONsIiGvEydT9N1fOKM.2z5Dtv3RFc8Wy'),
(4, 'radhia', 'radhia@gmail.com', '$2y$10$xJnlerUgDKiAwvdPkpd1MuCVMlTka7TBJP5U35CTcvcD9ov1BCzTG'),
(5, 'akmal', 'akmal@gmail.com', '$2y$10$imGjlcQ4bsUaFWDlpjR6lutS6KpW/xkrpVf4tkCKZJXksI2sBrQii'),
(6, 'ramon', 'ramon@gmail.com', '$2y$10$OB2QV6lXaBrTmuApKPOlQe8kJD/Y9ViJ/K6KVTYnv6eocC.ClNc9S'),
(7, 'ndaw', 'ndaw@gmail.com', '$2y$10$XkT.tgGUK52/5mL7T1nwc.f9Zlj0HOefgXaE5PmBlXEOKVJPqvXfG'),
(8, 'fadhil', 'fadhil@gmail.com', '$2y$10$kYHEzUlYQ3ms3/6OGraf.ud6qdm/apu4A2h6RyWSH92ghA41C7v9e'),
(9, 'tegar', 'tegar@gmail.com', '$2y$10$9LsO2NZgr9udXnFl4GTmRO28lcEAgRjKQJV1zcXnyAg0Z0iD8dtuG'),
(10, 'yoan', 'yoan@gmail.com', '$2y$10$Oe5VDtE/.FFVm6bnXPgKA.5QrLLQjcp/FdNYLM7MO7aspoXVkmi3m'),
(11, 'ripan', 'ripan@gmail.com', '$2y$10$DyfJxjbmeBX0EvlkOpaSzO8hT9xfZsd5dHVe4M4uLGGoQA9GMwfTm'),
(12, 'haikal', 'haikal@gmail.com', '$2y$10$VFV3f0fkeZYY9/ExyV7Sw.rGQiVlDvfcE8oVWy/GGEiqsYepIRwgy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `idx_content_title` (`content_title`) USING BTREE,
  ADD KEY `idx_content_upload` (`content_upload`),
  ADD KEY `idx_content_release` (`content_release`);
ALTER TABLE `content` ADD FULLTEXT KEY `idx_content_musik` (`content_musik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email_user`),
  ADD UNIQUE KEY `username` (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
