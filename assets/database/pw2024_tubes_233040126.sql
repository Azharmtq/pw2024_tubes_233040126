-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2024 at 07:13 AM
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
-- Database: `pw2024_tubes_233040126`
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
(1, 'admin', '$2y$10$vGxyQfyG8yux9LBWecA4S.m.IZxFIRl.gfWCiXU0EWmHat/ckfn7.'),
(2, 'azhar', '$2y$10$mnb2FxfVHU9CRgrpyTN8PeGIbRUm.zf5v/e0L7iJw4Z7ncuLto5wa');

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
(8, 'SOORA Music Festival digelar di Bandung pada 8 Juni', 'Jakarta (ANTARA) - The RoomMate & LIT Experience akan menyelenggarakan SOORA Music Festival 2024 - The Most Exciting Music Festival 2024 pada 8 Juni 2024 di Tritan Point, Bandung, Jawa Barat.\r\n\r\nMenurut keterangan pers penyelenggara festival yang diterima di Jakarta, Rabu, nama festival diambil dari kata \"sora\" dalam bahasa Sunda, yang artinya suara.\r\n\r\nSOORA Music Festival 2024 - The Most Exciting Music Festival 2024 akan menampilkan musisi Tanah Air seperti Agnez Mo, Armada, Ifan Seventeen, Lyodra, Mahalini, Rizky Febian, dan Smash. ', 'https://www.antaranews.com/berita/4030992/soora-music-festival-digelar-di-bandung-pada-8-juni', 'soora.jpg', '2024-05-11', '2024-03-27'),
(9, 'Judika Kembali Rilis Album Baru Setelah 7 Tahun', 'TEMPO.CO, Jakarta - Penampilan Chen EXO di Saranghaeyo Indonesia (SHI) 2024 menarik perhatian usai bernyanyi tanpa diiringi musik. Main vocal EXO itu justru bernyanyi dengan diiringi suara tepukan tangan penonton. Hal ini disebabkan karena Music Recorder atau MR yang disiapkan panitia bermasalah.\r\n\r\nPada awalnya, Chen sudah bersiap di bagian paling depan extended stage untuk bernyanyi “Hold Your Tight”. Dia juga sudah menceritakan bagaimana suasana yang pas untuk mendengarkan dan menyanyikan lagu tersebut. Di antaranya adalah duduk di taman dengan angin sepoi-sepoi dan perasaan bahagia.', 'https://seleb.tempo.co/read/1864127/tanpa-musik-chen-exo-nyanyi-diiringi-tepuk-tangan-penonton-saranghaeyo-indonesia', 'exo.jpg', '2024-05-11', '2024-05-05'),
(10, 'International Golo Mori Jazz 2024 Padukan Musik dengan Keindahan Laut dan Bukit', 'Jazz Gunung Indonesia, yang menjadi mitra pelaksana acara ini memiliki pengalaman menghadirkan pertunjukan musik di tengah kawasan pegunungan, mulai dari Jazz Gunung Bromo pada 2009. Sejalan dengan waktu, pegunungan yang dipilih semakin bertambah, mulai dari Gunung Ijen, Gunung Slamet, dan Gunung Burangrang. Di Golo Mori, wisatawan bisa menikmati musik jazz dengan latar bukit dan lautan yang indah. ', 'https://travel.tempo.co/read/1862578/international-golo-mori-jazz-2024-padukan-musik-dengan-keindahan-laut-dan-bukit', 'golo.jpg', '2024-05-11', '2024-04-30'),
(11, 'Musik dan Kritik Sosial', 'SIAPA yang tidak menyukai musik? Hampir setiap hari kita mendengarkan musik dalam berbagai kesempatan. Kebanyakan orang menikmati musik untuk berbagai alasan, mulai dari hanya sekadar menghilangkan stres hingga mengisi waktu luang.\r\n\r\nSebagai salah satu artefak kultural non benda, musik merupakan bagian dari kebudayaan dan peradaban yang selalu tidak pernah lekang oleh waktu dan terus berevolusi seturut perkembangan zaman.', 'https://www.kompas.com/tren/read/2021/02/03/095537465/musik-dan-kritik-sosial?page=all', 'kompas_musik.jpg', '2024-05-11', '2021-02-03'),
(12, 'Macklemore Rilis MV Lagu Bela Palestina, Dicap Sensitif oleh YouTube', 'Jakarta, CNN Indonesia -- Macklemore merilis video musik untuk lagu Hind\'s Hall yang menyuarakan dukungan terhadap Palestina dan kecaman untuk Amerika hingga Israel atas serangan di Jalur Gaza.\r\nVideo musik itu dirilis di YouTube pada Rabu (8/5) dan telah ditonton lebih dari 735 ribu kali. Namun, MV itu juga mendapat catatan konten sensitif dari YouTube ketika pertama kali dibuka.', 'https://www.cnnindonesia.com/hiburan/20240509120447-227-1095729/macklemore-rilis-mv-lagu-bela-palestina-dicap-sensitif-oleh-youtube', 'macklemore_169.jpeg', '2024-05-11', '2024-05-10'),
(13, 'Konser di Suhu 8 Derajat Celcius', 'TEMPO.CO, Jakarta - Winter Concert yang diselenggarakan Imaginaction bersama Jakarta Experience Board (Jxb) pada awal Juni mendatang akan menjadi konser bersalju pertama di Indonesia. Tidak hanya itu, suhu dalam ruangan yang mencapai 8 derajat celcius akan memberikan pengalaman tersendiri bagi para penonton maupun musisi yang tampil dalam konser bertema “Experience of Cold and Happiness” ini. \r\n\r\n“Ide untuk membuat Winter Concert ini karena ingin membuat sesuatu yang baru,” ucap Dino Hamid selaku Creator & Founder Imaginaction menjawab pertanyaan pembuka pada konferensi pers Winter Concert yang diadakan di Trans Snow World Bintaro pada Selasa, 7 Mei 2024. Lokasi dilangsungkannya konferensi pers kemarin juga akan menjadi tempat konser yang mengusung konsep unik dan membawa angin segar pada dunia pertunjukan Indonesia.', 'https://seleb.tempo.co/read/1865601/konser-di-suhu-8-derajat-celcius-berikut-line-up-dan-daftar-harga-tiket-winter-concert?tracking_page_direct', 'winter.jpg', '2024-05-11', '2024-05-08'),
(14, 'Winter Concert, Konser di Atas Salju Pertama di Indonesia, Dino Hamid Ungkap Tantangannya', 'TEMPO.CO, Jakarta - Dino Hamid, dalang di balik berbagai konser dengan konsep unik dan menarik, kembali hadir dengan ide segar yang out of the box untuk pagelaran konser Tanah Air pada tahun ini. Winter Concert, konser pertama di Indonesia yang digelar di dalam ruangan dengan hamparan salju dan atmosfer bersuhu 8 derajat celcius pada 7-8 Juni 2024. \r\n\r\nMengenai ide uniknya, Creator & Founder Imaginaction tersebut mengungkapkan keinginannya untuk memberi kebaruan di dunia pertunjukan. “Pascapandemi semua orang membuat berbagai macam pertunjukan, jadi saya ingin buat alternatif yang bisa dinikmati secara pengalaman, baik musisinya dan penontonnya,” ujar Dino Hamid dalam konferensi pers di Trans Snow World Bintaro pada 7 Mei 2024. Terletak di dalam Trans Park Mall Bintaro, lokasi konferensi pers ini nantinya juga akan menjadi tempat pelaksanaan konser.', 'https://seleb.tempo.co/read/1865357/winter-concert-konser-di-atas-salju-pertama-di-indonesia-dino-hamid-ungkap-tantangannya?tracking_page_direct', 'winter2.jpg', '2024-05-11', '2024-05-08'),
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
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
