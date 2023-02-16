-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 10:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eneryfirst`
--

-- --------------------------------------------------------

--
-- Table structure for table `meterstand_gas`
--

CREATE TABLE `meterstand_gas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `opname_datum` date NOT NULL,
  `gas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meterstand_gas`
--

INSERT INTO `meterstand_gas` (`id`, `user_id`, `opname_datum`, `gas`) VALUES
(2, NULL, '2022-11-07', 3479),
(3, NULL, '2022-11-06', 3478),
(4, NULL, '2022-11-05', 3477),
(5, NULL, '2022-11-04', 3477),
(6, NULL, '2022-11-03', 3477),
(7, NULL, '2022-11-02', 3476),
(8, NULL, '2022-11-01', 3476),
(9, NULL, '2022-10-31', 3476),
(10, NULL, '2022-10-30', 3475),
(11, NULL, '2022-10-29', 3474),
(12, NULL, '2022-10-28', 3474),
(13, NULL, '2022-10-27', 3474),
(14, NULL, '2022-10-26', 3474),
(15, NULL, '2022-10-25', 3474),
(16, NULL, '2022-10-24', 3473),
(17, NULL, '2022-10-23', 3473),
(18, NULL, '2022-10-22', 3472),
(19, NULL, '2022-10-21', 3472),
(20, NULL, '2022-10-20', 3471),
(21, NULL, '2022-10-19', 3471),
(22, NULL, '2022-10-18', 3471),
(23, NULL, '2022-10-17', 3470),
(24, NULL, '2022-10-16', 3470),
(25, NULL, '2022-10-15', 3469),
(26, NULL, '2022-10-14', 3468),
(27, NULL, '2022-10-13', 3467),
(28, NULL, '2022-10-12', 3467),
(29, NULL, '2022-10-11', 3466),
(30, NULL, '2022-10-10', 3466),
(31, NULL, '2022-10-09', 3466),
(32, NULL, '2022-10-08', 3465),
(33, NULL, '2022-10-07', 3465),
(34, NULL, '2022-10-06', 3464),
(35, NULL, '2022-10-05', 3464),
(36, NULL, '2022-10-04', 3464),
(37, NULL, '2022-10-03', 3464),
(38, NULL, '2022-10-02', 3463),
(39, NULL, '2022-10-01', 3462),
(40, NULL, '2022-09-30', 3462),
(41, NULL, '2022-09-29', 3462),
(42, NULL, '2022-09-28', 3461),
(43, NULL, '2022-09-27', 3461),
(44, NULL, '2022-09-26', 3461),
(45, NULL, '2022-09-25', 3460),
(46, NULL, '2022-09-24', 3459),
(47, NULL, '2022-09-23', 3459),
(48, NULL, '2022-09-22', 3458),
(49, NULL, '2022-09-21', 3458),
(50, NULL, '2022-09-20', 3457),
(51, NULL, '2022-09-19', 3457),
(52, NULL, '2022-09-18', 3456),
(53, NULL, '2022-09-17', 3456),
(54, NULL, '2022-09-16', 3456),
(55, NULL, '2022-09-15', 3455),
(56, NULL, '2022-09-14', 3455),
(57, NULL, '2022-09-13', 3454),
(58, NULL, '2022-09-12', 3454),
(59, NULL, '2022-09-11', 3454),
(60, NULL, '2022-09-10', 3453),
(61, NULL, '2022-09-09', 3453),
(62, NULL, '2022-09-08', 3453),
(63, NULL, '2022-09-07', 3452),
(64, NULL, '2022-09-06', 3452),
(65, NULL, '2022-09-05', 3451),
(66, NULL, '2022-09-04', 3451),
(67, NULL, '2022-09-03', 3451),
(68, NULL, '2022-09-02', 3451),
(69, NULL, '2022-09-01', 3450),
(70, NULL, '2022-08-31', 3450),
(71, NULL, '2022-08-30', 3449),
(72, NULL, '2022-08-29', 3449),
(73, NULL, '2022-08-28', 3448),
(74, NULL, '2022-08-27', 3448),
(75, NULL, '2022-08-26', 3448),
(76, NULL, '2022-08-25', 3447),
(77, NULL, '2022-08-24', 3447),
(78, NULL, '2022-08-23', 3447),
(79, NULL, '2022-08-22', 3446),
(80, NULL, '2022-08-21', 3446),
(81, NULL, '2022-08-20', 3445),
(82, NULL, '2022-08-19', 3445),
(83, NULL, '2022-08-18', 3445),
(84, NULL, '2022-08-17', 3444),
(85, NULL, '2022-08-16', 3444),
(86, NULL, '2022-08-15', 3443),
(87, NULL, '2022-08-14', 3443),
(88, NULL, '2022-08-13', 3443),
(89, NULL, '2022-08-12', 3443),
(90, NULL, '2022-08-11', 3442),
(91, NULL, '2022-08-10', 3442),
(92, NULL, '2022-08-09', 3442),
(93, NULL, '2022-08-08', 3442),
(94, NULL, '2022-08-07', 3442),
(95, NULL, '2022-08-06', 3442),
(96, NULL, '2022-08-05', 3441),
(97, NULL, '2022-08-04', 3441),
(98, NULL, '2022-08-03', 3441),
(99, NULL, '2022-08-01', 3441),
(100, NULL, '2022-08-01', 3441);

-- --------------------------------------------------------

--
-- Table structure for table `meterstand_stroom`
--

CREATE TABLE `meterstand_stroom` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `opname_datum` date NOT NULL,
  `stand_normaal` int(11) NOT NULL,
  `stand_dal` int(11) NOT NULL,
  `teruglevering_normaal` int(11) NOT NULL,
  `teruglevering_dal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meterstand_stroom`
--

INSERT INTO `meterstand_stroom` (`id`, `user_id`, `opname_datum`, `stand_normaal`, `stand_dal`, `teruglevering_normaal`, `teruglevering_dal`) VALUES
(1, NULL, '2022-11-07', 1985, 2354, 3539, 1606),
(2, NULL, '2022-11-06', 1985, 2346, 3539, 1604),
(3, NULL, '2022-11-05', 1985, 2331, 3539, 1600),
(4, NULL, '2022-11-04', 1979, 2329, 3537, 1600),
(5, NULL, '2022-11-03', 1973, 2326, 3536, 1600),
(6, NULL, '2022-11-02', 1969, 2324, 3528, 1600),
(7, NULL, '2022-11-01', 1965, 2322, 3520, 1600),
(8, NULL, '2022-10-31', 1960, 2319, 3518, 1600),
(9, NULL, '2022-10-30', 1960, 2310, 3518, 1596),
(10, NULL, '2022-10-29', 1960, 2301, 3518, 1592),
(11, NULL, '2022-10-28', 1956, 2300, 3514, 1592),
(12, NULL, '2022-10-27', 1952, 2298, 3511, 1592),
(13, NULL, '2022-10-26', 1947, 2295, 3504, 1592),
(14, NULL, '2022-10-25', 1940, 2292, 3502, 1592),
(15, NULL, '2022-10-24', 1935, 2291, 3499, 1592),
(16, NULL, '2022-10-23', 1935, 2286, 3499, 1590),
(17, NULL, '2022-10-22', 1935, 2279, 3499, 1587),
(18, NULL, '2022-10-21', 1929, 2277, 3496, 1587),
(19, NULL, '2022-10-20', 1927, 2274, 3495, 1587),
(20, NULL, '2022-10-19', 1924, 2272, 3486, 1587),
(21, NULL, '2022-10-18', 1918, 2270, 3480, 1587),
(22, NULL, '2022-10-17', 1913, 2267, 3480, 1587),
(23, NULL, '2022-10-16', 1913, 2261, 3480, 1579),
(24, NULL, '2022-10-15', 1913, 2255, 3480, 1578),
(25, NULL, '2022-10-14', 1906, 2253, 3480, 1578),
(26, NULL, '2022-10-13', 1902, 2250, 3480, 1578),
(27, NULL, '2022-10-12', 1900, 2248, 3474, 1578),
(28, NULL, '2022-10-11', 1895, 2246, 3465, 1578),
(29, NULL, '2022-10-10', 1889, 2244, 3461, 1578),
(30, NULL, '2022-10-09', 1889, 2235, 3461, 1569),
(31, NULL, '2022-10-08', 1889, 2229, 3461, 1560),
(32, NULL, '2022-10-07', 1883, 2227, 3454, 1560),
(33, NULL, '2022-10-06', 1878, 2225, 3446, 1560),
(34, NULL, '2022-10-05', 1877, 2223, 3443, 1560),
(35, NULL, '2022-10-04', 1873, 2222, 3432, 1560),
(36, NULL, '2022-10-03', 1870, 2220, 3424, 1560),
(37, NULL, '2022-10-02', 1870, 2214, 3424, 1554),
(38, NULL, '2022-10-01', 1870, 2208, 3424, 1548),
(39, NULL, '2022-09-30', 1867, 2206, 3415, 1548),
(40, NULL, '2022-09-29', 1863, 2203, 3404, 1548),
(41, NULL, '2022-09-28', 1862, 2202, 3396, 1548),
(42, NULL, '2022-09-27', 1851, 2200, 3396, 1548),
(43, NULL, '2022-09-26', 1847, 2198, 3395, 1548),
(44, NULL, '2022-09-25', 1847, 2194, 3395, 1538),
(45, NULL, '2022-09-24', 1847, 2181, 3395, 1538),
(46, NULL, '2022-09-23', 1836, 2179, 3393, 1538),
(47, NULL, '2022-09-22', 1835, 2178, 3382, 1538),
(48, NULL, '2022-09-21', 1833, 2176, 3371, 1538),
(49, NULL, '2022-09-20', 1832, 2174, 3365, 1538),
(50, NULL, '2022-09-19', 1829, 2173, 3359, 1538),
(51, NULL, '2022-09-18', 1829, 2167, 3359, 1537),
(52, NULL, '2022-09-17', 1829, 2165, 3359, 1528),
(53, NULL, '2022-09-16', 1827, 2163, 3350, 1528),
(54, NULL, '2022-09-15', 1826, 2162, 3347, 1528),
(55, NULL, '2022-09-14', 1824, 2160, 3345, 1528),
(56, NULL, '2022-09-13', 1821, 2158, 3338, 1528),
(57, NULL, '2022-09-12', 1819, 2157, 3327, 1528),
(58, NULL, '2022-09-11', 1819, 2153, 3327, 1520),
(59, NULL, '2022-09-10', 1819, 2146, 3327, 1517),
(60, NULL, '2022-09-09', 1817, 2144, 3325, 1517),
(61, NULL, '2022-09-08', 1815, 2143, 3318, 1517),
(62, NULL, '2022-09-07', 1814, 2141, 3310, 1517),
(63, NULL, '2022-09-06', 1812, 2139, 3297, 1517);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_created`, `date_updated`, `role`) VALUES
(4, 'Harm', 'harmkraats@gmail.com', '$2y$10$7/Dx/hAiB7iNjquysE4IceVcsvCkCf2Gt6gv0f5.XyVBcRvZuL9xK', '2023-02-09 14:23:51', '2023-02-09 14:23:51', 0),
(5, 'Test', 'testuser@mail.nl', '$2y$10$B90fIzx1NQvwzNNNDx7GkuuaxuNw8boTc2mag13H5UxW9jzQ7CNs2', '2023-02-09 17:11:53', '2023-02-09 17:11:53', 0),
(6, 'Henk jan', 'henkjan@gmail.com', '$2y$10$TyVBSDTS.ah6Dcb5dXaiAurKILNgFUKyykv06Zbdo.chUJ8BdT/ce', '2023-02-09 22:00:44', '2023-02-09 22:00:44', 0),
(7, 'pietje', 'pietje@email.nl', '$2y$10$pKr5MruR7uJAse8egHNapewaJPBooctXuXBwphfHqy.G1rYy5WMhO', '2023-02-09 22:34:26', '2023-02-09 22:34:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meterstand_gas`
--
ALTER TABLE `meterstand_gas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meterstand_stroom`
--
ALTER TABLE `meterstand_stroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meterstand_gas`
--
ALTER TABLE `meterstand_gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `meterstand_stroom`
--
ALTER TABLE `meterstand_stroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
