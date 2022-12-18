-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 05:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_syerra`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `full_name`, `email`, `phone`, `subject`, `message`, `tgl`) VALUES
(2, 'Syerraaaa', 'syerra@gmail.com', '0877312312312', 'Syerra', 'Ini Pesan', '2022-12-06 17:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `deskripsi` text DEFAULT '',
  `foto` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `nama`, `id_kategori`, `harga`, `deskripsi`, `foto`) VALUES
(1, 'Kucing Garong', 1, 2500000, 'Kucing garong adalah istilah yang bisanya digunakan untuk merujuk pada kucing liar atau kucing yang tidak dipelihara, dan biasanya kurang terbiasa dengan keberadaan manusia.', 'cat1.jpg'),
(2, 'Anjing Labrador', 2, 15000000, 'The Labrador Retriever or simply Labrador is a British breed of retriever gun dog. It was developed in the United Kingdom from fishing dogs imported from the colony of Newfoundland, and was named after the Labrador region of that colony.', '1670340427_dog1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

CREATE TABLE `pet_category` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`id`, `nama`) VALUES
(1, 'Cat Food'),
(2, 'Accessories'),
(12, 'Dog Food');

-- --------------------------------------------------------

--
-- Table structure for table `pet_order`
--

CREATE TABLE `pet_order` (
  `id` int(11) NOT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_order`
--

INSERT INTO `pet_order` (`id`, `id_pet`, `nama_lengkap`, `alamat`, `total`, `status`, `tgl_order`, `id_user`) VALUES
(4, 1, 'Syerra', 'Jl. Silitwangi No.25', 2500000, 'Ordered', '2022-12-06 17:27:17', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `deskripsi` text DEFAULT '',
  `foto` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `id_kategori`, `harga`, `deskripsi`, `foto`) VALUES
(1, 'Whiskas', 1, 30000, 'Whiskas is a brand of cat food sold internationally. It is owned by the American company Mars, Incorporated. It is available either as small meaty pieces in sauce, gravy or jelly packaged in tins, foil trays or pouches, as well as in the form of small biscuits sold in cartons or pouches and milk sold in small bottles.', 'food2.jpg'),
(2, 'Divine', 1, 50000, 'Makanan Anjing', '1670340239_food1.jpg'),
(3, 'Dog Cage', 2, 900000, 'Kandang Anjing', '1670340283_product2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `nama`) VALUES
(1, 'Food'),
(2, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `id_product`, `nama_lengkap`, `alamat`, `total`, `status`, `tgl_order`, `id_user`) VALUES
(3, 1, 'Syerraaa', 'Jl. Jalan', 30000, 'Ordered', '2022-12-06 17:26:30', 8),
(4, 3, 'Syerraaa', 'Bandung', 900000, 'Ordered', '2022-12-06 17:38:25', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `no_hp`, `email`, `password`, `role`) VALUES
(8, 'Syerra', '0817273178237', 'syerra@gmail.com', '*1C3054856D254E01125597852D171344A380025B', 'user'),
(9, 'Admin Petshop', '', 'admin@gmail.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori1` (`id_kategori`);

--
-- Indexes for table `pet_category`
--
ALTER TABLE `pet_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_order`
--
ALTER TABLE `pet_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet1` (`id_pet`),
  ADD KEY `user1` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category1` (`id_kategori`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet1` (`id_product`),
  ADD KEY `user1` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pet_category`
--
ALTER TABLE `pet_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pet_order`
--
ALTER TABLE `pet_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `kategori1` FOREIGN KEY (`id_kategori`) REFERENCES `pet_category` (`id`);

--
-- Constraints for table `pet_order`
--
ALTER TABLE `pet_order`
  ADD CONSTRAINT `pet1` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `user1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category1` FOREIGN KEY (`id_kategori`) REFERENCES `product_category` (`id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `user2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
