-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jul 2018 pada 09.36
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik_ramelan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`) VALUES
(1, 'rizki', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailpesanan`
--

CREATE TABLE `tb_detailpesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` char(12) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailpesanan`
--

INSERT INTO `tb_detailpesanan` (`id_detail`, `id_pesanan`, `id_produk`, `qty`, `total`) VALUES
(32, 'BR1531055737', 16, 1, 100000),
(33, 'BR1531055737', 17, 3, 240000);

--
-- Trigger `tb_detailpesanan`
--
DELIMITER $$
CREATE TRIGGER `Trigger Pengurangan Stok` AFTER INSERT ON `tb_detailpesanan` FOR EACH ROW UPDATE tb_produk set jumlah_produk = jumlah_produk-new.qty where id_produk=new.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(12) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_detail`, `id_transaksi`, `id_produk`, `qty`, `total`) VALUES
(3, 'BR1530858408', 16, 1, 100000),
(4, 'BR1530849067', 17, 1, 80000),
(5, 'BR1530848954', 16, 1, 100000),
(6, 'BR1530957590', 18, 1, 20000),
(7, 'BR1530957399', 16, 1, 100000),
(8, 'BR1530957399', 15, 1, 50000),
(9, 'BR1530957673', 16, 1, 100000),
(10, 'BR1530960445', 16, 1, 100000),
(11, 'BR1530960407', 17, 1, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_produk`, `nama_foto`) VALUES
(3, 15, '152956301527699618_1529851863797295_8913086183299350528_n.jpg'),
(4, 16, '152956379226757474_1832233743454035_4214974603853824000_n.jpg'),
(5, 17, '152956427327540415_726312504423511_8722589455271779074_n.jpg'),
(6, 18, '152956616313510990_293660470982915_2550855589099787018_n.jpg'),
(7, 19, '153059126612246772_236201973395432_2400261658699685434_n.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sarung'),
(2, 'Atasan'),
(4, 'Jilbab'),
(5, 'Daster'),
(6, 'Kain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `alamat`, `no_telp`, `password`) VALUES
(2, 'rara', 'rara@gmail.com', 'kesesi', '0867', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'rara', 'rara@gmail.com', 'kesesi', '0867', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'rara', 'rara@gmail.com', 'kesesi', '0867', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'rini', 'rini@gmail.com', 'kesesi', '0867', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Simbah Ganteng', 'simbah@digitallibrary.id', 'Gria Panguripan Indah', '085290059281', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'cantika sari', 'cantik@gmail.com', '', '00898756', '1cdac5ad084879e80e5b67c51baa9095'),
(8, 'Bowo Tiktok', 'bowo@tiktok.com', 'TikTok Cuntry', '08515002100', '9b930621eaa7ca7e9f6f584a1450b8a6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `total` char(12) NOT NULL,
  `statuspesanan` varchar(32) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `total`, `statuspesanan`, `id_rekening`, `tanggal`) VALUES
('BR1531055737', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '340000', 'Belum diproses', 2, '2018-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `jumlah_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga_produk`, `jumlah_produk`) VALUES
(15, 1, 'Sarung Kasarung', 'Sarung Asli Pekalongan', 50000, 149),
(16, 1, 'Sarung Nusantara', 'Sarung Tenun Buatan Pekalongan', 100000, 146),
(17, 2, 'Kemeja Apa Ya', 'Kemeja Berkualitas', 80000, 146),
(18, 4, 'Paris', 'Jilbab Berkualitas', 20000, 149),
(19, 6, 'Kebaya', 'Kebaya Berkualitas', 500000, 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(32) NOT NULL,
  `no_rek` char(32) NOT NULL,
  `an` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `an`) VALUES
(2, 'Bank BNI', '123456789101', 'Batik Ramelan'),
(4, 'Bank Danamon', '1234567890', 'Batik Ramelan'),
(5, 'Bank Mandiri', '1234567890', 'Batik Ramelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sosmed`
--

CREATE TABLE `tb_sosmed` (
  `id_sosmed` int(1) NOT NULL,
  `nama_sosmed` varchar(32) NOT NULL,
  `nama_akun` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sosmed`
--

INSERT INTO `tb_sosmed` (`id_sosmed`, `nama_sosmed`, `nama_akun`) VALUES
(1, 'Whatsapp', ' +6285742494837 '),
(2, 'Instagram', '@batik_ramelan'),
(3, 'Facebook', 'Batik Ramelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `total` char(12) NOT NULL,
  `statustransaksi` varchar(32) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `total`, `statustransaksi`, `id_rekening`, `tanggal`) VALUES
('BR1530848954', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '100000', 'Pesanan di Terima', 2, '2018-07-07'),
('BR1530849067', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '80000', 'Pesanan di Terima', 2, '2018-07-07'),
('BR1530858408', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '100000', 'Pesanan di Terima', 2, '2018-07-07'),
('BR1530957399', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '150000', 'Pesanan di Terima', 2, '2018-07-07'),
('BR1530957590', 6, 'Oratakashi', 'Telkom', '081', '20000', 'Pesanan di Terima', 2, '2018-07-07'),
('BR1530957673', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '100000', 'Pesanan di Terima', 4, '2018-07-08'),
('BR1530960407', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '80000', 'Pesanan di Terima', 2, '2018-07-08'),
('BR1530960445', 6, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281', '100000', 'Pesanan di Batalkan', 5, '2018-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_cart`
--

CREATE TABLE `tmp_cart` (
  `id_cart` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_cart`
--

INSERT INTO `tmp_cart` (`id_cart`, `total`) VALUES
(1530837059, 100000),
(1530837124, 20000),
(1530837491, 500000),
(1530847050, 80000),
(1530858094, 190000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detailcart`
--

CREATE TABLE `tmp_detailcart` (
  `id_detailcart` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_detailcart`
--

INSERT INTO `tmp_detailcart` (`id_detailcart`, `id_cart`, `id_produk`, `harga`, `jumlah`, `total`) VALUES
(23, 1530837059, 16, 100000, 1, 100000),
(24, 1530837124, 18, 20000, 1, 20000),
(25, 1530837491, 19, 500000, 1, 500000),
(26, 1530847050, 17, 80000, 1, 80000),
(29, 1530858094, 16, 100000, 1, 100000),
(30, 1530858094, 15, 50000, 1, 50000),
(31, 1530858094, 18, 20000, 2, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pengiriman`
--

CREATE TABLE `tmp_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pengiriman`
--

INSERT INTO `tmp_pengiriman` (`id_pengiriman`, `id_cart`, `nama_pelanggan`, `alamat`, `no_hp`) VALUES
(12, 1530837059, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281'),
(13, 1530837124, 'Bowo Tiktok', 'TikTok Cuntry', '08515002100'),
(14, 1530837491, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281'),
(15, 1530847050, 'Simbah Ganteng', 'Gria Panguripan Indah', '085290059281'),
(18, 1530858094, 'Tiktok', 'aa', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_detailpesanan`
--
ALTER TABLE `tb_detailpesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kat` (`id_kategori`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indeks untuk tabel `tmp_cart`
--
ALTER TABLE `tmp_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  ADD PRIMARY KEY (`id_detailcart`),
  ADD KEY `fk_detailcart` (`id_cart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tmp_pengiriman`
--
ALTER TABLE `tmp_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_cart` (`id_cart`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_detailpesanan`
--
ALTER TABLE `tb_detailpesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_sosmed`
--
ALTER TABLE `tb_sosmed`
  MODIFY `id_sosmed` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tmp_cart`
--
ALTER TABLE `tmp_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1530858095;

--
-- AUTO_INCREMENT untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  MODIFY `id_detailcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tmp_pengiriman`
--
ALTER TABLE `tmp_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detailpesanan`
--
ALTER TABLE `tb_detailpesanan`
  ADD CONSTRAINT `fk_detail_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detailprd` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD CONSTRAINT `fk_trans_id` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trans_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD CONSTRAINT `fk_foto` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rek_pesanan` FOREIGN KEY (`id_rekening`) REFERENCES `tb_rekening` (`id_rekening`);

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_rek_trans` FOREIGN KEY (`id_rekening`) REFERENCES `tb_rekening` (`id_rekening`),
  ADD CONSTRAINT `fk_trans_pel` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_detailcart`
--
ALTER TABLE `tmp_detailcart`
  ADD CONSTRAINT `fk_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detailcart` FOREIGN KEY (`id_cart`) REFERENCES `tmp_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_pengiriman`
--
ALTER TABLE `tmp_pengiriman`
  ADD CONSTRAINT `fk_pengiriman` FOREIGN KEY (`id_cart`) REFERENCES `tmp_cart` (`id_cart`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
