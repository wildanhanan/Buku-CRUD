-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2026 pada 23.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_pbo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(150) DEFAULT NULL,
  `halaman` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `isbn`, `foto`, `judul`, `pengarang`, `halaman`, `tahun`, `sinopsis`, `stok`, `user_id`) VALUES
(24, '4-1234-567', 'atomic.jpeg', 'Atomic Habits', 'Wildan', 245, '2023', 'Bagiamana kita bisa membangun kebiasaan baru dari kebiasaan kecil. Mulai dari menumpuk kebiasaan lama dengan kebiasaan baru, atau membuat rangkaian kebiasaan secara terperinci. ', 10, 4),
(25, '1-1111-111', 'bumimanusia.jpeg', 'Bumi Manusia', 'Pramodya Antatoer', 345, '2021', 'Manusia yang angkuh akan kekuasaan, dan kekayaan, menjadikannya sebagai makhluk yang sangat sangat ', 10, 4),
(26, '4567289298', 'filosofi.jpeg', 'Filosofi Teras', 'Wildan', 243, '2021', 'bagaimana seorang bisa mennjadi hebat karena ia memiliki kendali emosional yang kuat, ia tak kan pernah marah hanya karena hal sepele, namun ia juga memiliki batas. Jika ada yang melanggar batas itu ia akan tak segan- segan melakukan tindakan luarbiasa yang belum pernah anda lihat sebelumnya. Jadi wasapda terhadap orang- orang seperti ini.', 10, 5),
(27, '4-3211-122', 'psyco.jpg', 'Psycology of money', 'Wildan', 256, '2021', 'Bagaimana uang bisa kita atur sebaik mungkin, bagaimana uang bisa mempengaruhi pikiran kita, bagaimana jika harta yang selama ini kita dambakan, susah payah kita cari, banting tulang, memeras keringat, tidak di bawa mati?. Lalu untuk apa kita ini selalu memikirkan uang. Uang memang bukan segalanya, tapi uang dapat menyelesaikan segalanya. Jadi kesimpulannya, jangan jadikan uang sebagai tujuan, tapi jadikan sebagai alat bayar. KELAZZ KINGG :>', 10, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(3, 'Dimas Ulung Septiaji', 'dimas123@gmail.com', '12345'),
(4, 'Bima', 'bima123@gmail.com', '123'),
(5, 'Wildan', 'wildan123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
