-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 01:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kilo`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE `db_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `create_time` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`id`, `name`, `weight`, `price`, `status`, `shipping`, `create_time`) VALUES
(13, 'test 5', 10, 242, 1, 13500, 1632603294),
(14, 'test1', 34, 242, 1, 45900, 1632603306),
(15, 'test1', 34, 242, 1, 45900, 1632603350),
(16, 'test1', 34, 242, 1, 45900, 1632603369),
(17, 'test1', 1, 242, 1, 1000, 1632603399),
(18, '9.9元超值1', 1, 242, 1, 1000, 1632603485),
(21, 'ww', 34, 242, 0, 45900, 1632611933);

-- --------------------------------------------------------

--
-- Table structure for table `db_product_photo`
--

CREATE TABLE `db_product_photo` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pic_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_product_photo`
--

INSERT INTO `db_product_photo` (`id`, `product_id`, `pic_url`) VALUES
(1, 20, '微信图片_20210924210946.png'),
(2, 13, 'Screenshot (7).png'),
(3, 12, 'Screenshot (15).png'),
(4, 14, 'Screenshot (15).png'),
(5, 21, 'Screenshot (27).png');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `user_name`, `password`, `mobile`, `email`) VALUES
(1, 'khant', '123456', 1223, 'khantminthu22@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_product_photo`
--
ALTER TABLE `db_product_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_product`
--
ALTER TABLE `db_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `db_product_photo`
--
ALTER TABLE `db_product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
