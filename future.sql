-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2022 pada 09.16
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `future`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qtyorder` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `item_image` varchar(200) DEFAULT NULL,
  `totprice` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `qtyorder`, `price`, `product_name`, `item_image`, `totprice`) VALUES
(161, 1, 30, '1', '250.00', 'Vivo17Y', 'Product_img_524.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `images` varchar(250) NOT NULL,
  `auditor` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `active` varchar(50) NOT NULL,
  `featured` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `name`, `brand`, `images`, `auditor`, `date`, `active`, `featured`) VALUES
(7, 'Iphone', '1', 'Category_img_545.jpg', ' admin ', '2022-05-04', 'Yes', 'Yes'),
(9, 'Xiaomi', '2', 'Category_img_365.jpg', ' admin ', '2022-05-12', 'Yes', 'Yes'),
(10, 'Samsung', '3', 'Category_img_527.jpg', ' admin ', '2022-05-04', 'Yes', 'Yes'),
(11, 'Vivo', '4', 'Category_img_143.Array', ' admin ', '2022-05-06', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderinfo`
--

CREATE TABLE `orderinfo` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qtyorder` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `item_image` varchar(200) DEFAULT NULL,
  `totprice` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `post_price` varchar(50) DEFAULT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `featured` varchar(200) DEFAULT NULL,
  `active` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `auditor` varchar(200) DEFAULT NULL,
  `RAM1` varchar(50) DEFAULT NULL,
  `RAM2` varchar(50) DEFAULT NULL,
  `RAM3` varchar(50) DEFAULT NULL,
  `RAM4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `post_price`, `item_image`, `item_register`, `featured`, `active`, `description`, `auditor`, `RAM1`, `RAM2`, `RAM3`, `RAM4`) VALUES
(30, 'Vivo', 'Vivo17Y', 250.00, '280', 'Product_img_524.jpg', '2022-05-22 10:12:26', 'Yes', 'Yes', 'fRTJRSYJGWr', ' admin ', '2GB', '4GB', '6GB', '8GB'),
(31, 'Xiaomi', 'Xiaomi T11', 300.00, NULL, 'Product_img_120.jpg', '2022-05-29 22:57:23', 'Yes', 'Yes', 'Xiaomi T11', ' admin ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ram_data`
--

CREATE TABLE `ram_data` (
  `id_ram` int(11) NOT NULL,
  `ram_size` varchar(50) NOT NULL,
  `ram_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ram_data`
--

INSERT INTO `ram_data` (`id_ram`, `ram_size`, `ram_name`) VALUES
(1, '2', 'RAM'),
(2, '4', 'RAM'),
(3, '6', 'RAM'),
(4, '8', 'RAM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `DOB` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `CustomerAddress` varchar(250) DEFAULT NULL,
  `CustomerCity` varchar(250) DEFAULT NULL,
  `CustomerState` varchar(250) DEFAULT NULL,
  `Zip_Code` varchar(250) DEFAULT NULL,
  `Name_On_Card` varchar(250) DEFAULT NULL,
  `CreditCardNumber` varchar(250) DEFAULT NULL,
  `Card_Exp_Month` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `Card_Exp_Year` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `CVV` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `full_name_ship` varchar(250) DEFAULT NULL,
  `Phone_Num` varchar(50) DEFAULT NULL,
  `Zip_Code_Ship` varchar(50) DEFAULT NULL,
  `CustomerAddressShipping` varchar(250) DEFAULT NULL,
  `CustomerCityShipping` varchar(250) DEFAULT NULL,
  `CustomerStateShipping` varchar(250) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `gmail`, `DOB`, `status`, `CustomerAddress`, `CustomerCity`, `CustomerState`, `Zip_Code`, `Name_On_Card`, `CreditCardNumber`, `Card_Exp_Month`, `Card_Exp_Year`, `CVV`, `full_name_ship`, `Phone_Num`, `Zip_Code_Ship`, `CustomerAddressShipping`, `CustomerCityShipping`, `CustomerStateShipping`, `role`) VALUES
(20, 'AGUS YANTO', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'agusyanto2113@gmail.com', '2022-05-03', 'active', 'L. TG UBAN KM 25, RT/RW 004/001, Kel/Desa TOAPAYA ASRI, Kecamatan TOAPAYA', 'Kota/Kabupaten', 'Kepulauan Riau', '29151', NULL, NULL, NULL, NULL, NULL, 'AGUS YANTO', '082172040214', '29151', 'Jl. TG UBAN KM 25, RT/RW 004/001, Kel/Desa TOAPAYA ASRI, Kecamatan TOAPAYA', 'Kota/Kabupaten', 'Kepulauan Riau', 'admin'),
(21, 'AGUS YANTO', 'Paskaris', '9555e0591eaf7478ef1ec0c2f4ab9ab8', 'agusyanto2113@gmail.com', '0000-00-00', '', 'JL. TG UBAN KM 25', 'Kab Bintan', 'Kepulauan Riau', '29151', NULL, NULL, NULL, NULL, NULL, 'AGUS YANTO', '082172040214', '29151', 'JL. TG UBAN KM 25', 'Bintan', 'Indonesia', NULL),
(22, 'AGUS YANTO', 'jerry', '30035607ee5bb378c71ab434a6d05410', 'agusyanto2113@gmail.com', '0000-00-00', '', 'L. TG UBAN KM 25, RT/RW 004/001, Kel/Desa TOAPAYA ASRI, Kecamatan TOAPAYA', 'Kota/Kabupaten', 'Kepulauan Riau', '29151', NULL, NULL, NULL, NULL, NULL, 'AGUS YANTO', '082172040214', '29151', 'JL. TG UBAN KM 25', 'Kab Bintan', 'Kepulauan Riau', NULL),
(24, 'Beauty salon', 'salon12', '202cb962ac59075b964b07152d234b70', 'agusyanto2113@gmail.com', '2022-05-30', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'agusyanto', 'invisible', '4c4999ac17adcef1a5a75fab71e5c857', 'invisible@gmail.com', '2022-06-01', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin'),
(26, 'sayu', 'sayu', '671b73f699c20aed9a5d7130f0040b4a', 'sayu', '0000-00-00', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brand`
--

CREATE TABLE `tb_brand` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_brand`
--

INSERT INTO `tb_brand` (`id_brand`, `brand_name`) VALUES
(1, 'Iphone'),
(2, 'Xiaomi'),
(3, 'Samsung'),
(4, 'Vivo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `product` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(250) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `orderdate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_contact` varchar(250) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `item_id` varchar(200) DEFAULT NULL,
  `zip_code` varchar(200) DEFAULT NULL,
  `cardname` varchar(200) DEFAULT NULL,
  `card_number` varchar(200) DEFAULT NULL,
  `expmonth` varchar(200) DEFAULT NULL,
  `expyear` varchar(200) DEFAULT NULL,
  `cvv` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qtyorder` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `item_image` varchar(200) DEFAULT NULL,
  `totprice` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `ram_data`
--
ALTER TABLE `ram_data`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `ram_data`
--
ALTER TABLE `ram_data`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
