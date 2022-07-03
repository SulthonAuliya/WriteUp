-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 11.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17909935_writeup`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profpict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `email`, `username`, `password`, `profpict`) VALUES
(1, 'sulthon@gmail.com', 'Sulthonaul', '$2y$10$LOZrTuxz8oi8qO7g0CNi/.6Ej3/3Fj0l6i.qCIddtQVmGEMA6dk7C', 'image1.jpg'),
(2, 'holy@gmail.com', 'HolyCrown', '$2y$10$LOZrTuxz8oi8qO7g0CNi/.6Ej3/3Fj0l6i.qCIddtQVmGEMA6dk7C', '1p.jpg'),
(3, 'user@gmail.com', 'user', '$2y$10$LOZrTuxz8oi8qO7g0CNi/.6Ej3/3Fj0l6i.qCIddtQVmGEMA6dk7C', '3.png'),
(4, 'priscilla@gmail.com', 'priscilla', '$2y$10$LOZrTuxz8oi8qO7g0CNi/.6Ej3/3Fj0l6i.qCIddtQVmGEMA6dk7C', '3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `id_account`, `id_post`, `comment`) VALUES
(1, 2, 2, 'Great job!!!'),
(2, 2, 2, 'mantaaap'),
(19, 2, 11, 'yeay'),
(20, 2, 3, 'Nice keyb dude love it!!!'),
(21, 2, 2, 'Yeaaay me tooo. i also love this cartoon so muuuuch!!!!'),
(22, 2, 2, 'yeaaay!!!!'),
(23, 2, 10, 'TRUEEEE! it was my dream since i was a child'),
(24, 2, 6, 'nice work, love it so much!'),
(25, 2, 4, 'i remember my first mini moris too, it was very full of history');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id_likes` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id_likes`, `id_post`, `id_account`) VALUES
(12, 2, 1),
(16, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `reader` int(20) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `title`, `description`, `image`, `id_account`, `reader`, `created_at`) VALUES
(2, 'WBB', 'My favourite cartoon show of all time', 'wbb.gif', 1, 234, '2022-01-18'),
(3, 'Mechanical Keyboard Hobby', 'Mechanical keyboard hobby is beeing so hyped', '3.jpg', 2, 111, '2022-01-18'),
(4, 'My lovely Mini Moris', 'My lovely mini moris is always there for me', '2.jpg', 1, 126, '2022-01-18'),
(6, 'Cute illustration of my friend', 'She is so cute i cant handle it', 'image1.jpg', 2, 20, '2022-01-18'),
(10, 'Paradise Falls', 'Paradise Falls drops 40 feet into a large pool along the Arroyo Conejo in Thousand Oaks. The waterfall is located within Wildwood Park, and thanks to an almost excessive network of trails, Paradise Falls may be reached via several routes, including a 2.15-mile out and back hike or a 2.55-mile loop that visits a small cave. It is a downhill hike from the trailhead to Paradise Falls with 260 feet of elevation change. Adding a visit to Wildwood Park’s other main attraction, Lizard Rock, is a good way to extend the hike to 4.35 miles or more.\r\n\r\nParadise Falls is close to many other Los Angeles waterfall hikes.\r\nThe direction to Paradise Falls is marked at most trail junctions in tWildwood Park, so it will not be difficult to find the waterfall. The easiest route is to head straight west on Mesa Trail, the most obvious trail departing the parking area for Wildwood Park. Pass through a few junctions over the first 0.35 miles and turn left at a split onto North Tepee Trail, following an arrow for Paradise Falls.\r\n\r\nStay straight through three junctions over the next 0.4 miles to come to a T-junction next to a recreation of a tepee. Here you may look down on the V-shaped canyon carved by the Arroyo Conejo. The landscape above the canyon is dotted with cactus and sage, while the creek is lined with sycamores and oaks, creating a riparian oasis. Since most of Wildwood Park can feel like a desert on a hot day, be sure to wear sunscreen and drink plenty of water.\r\n\r\nTurn right at the tepee, and drop into the canyon for 1/8 of a mile on Tepee Trail. At the next sign for Paradise Falls, turn left down a single track cutting down the canyon. At the next junction, turn right onto Wildwood Canyon Trail and make an immediate left to continue descending to Paradise Falls. Pass through a picnic area to arrive at a pool below Paradise Falls, 1.07 miles from the start.\r\n\r\n', 'Up-Paradise-Falls-up-39350143-1600-900.jpg', 1, 125, '2022-01-18'),
(11, 'New pair of shoes', 'This holiday i got a new pair of shoes from my grandmother, i really love my new shoes, cause this shoe is so special for me.\r\nI promise i will keep this shoe my whole life!', '2.jpg', 2, 23, '2022-01-18'),
(12, 'Astronaut', 'Imagine yourself being an astronaut!', '09.jpg', 1, 125, '2022-01-18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_likes`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_post` (`id_post`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_account` (`id_account`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id_likes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
