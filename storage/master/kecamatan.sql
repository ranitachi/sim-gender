-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2018 at 09:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `created_at`, `updated_at`, `deleted_at`, `lat`, `lng`) VALUES
(1, 'KOSAMBI', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.079036', '106.6766083'),
(2, 'TELUKNAGA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.0581731', '106.6472538'),
(3, 'PAKUHAJI', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.053025', '106.5889593'),
(4, 'SEPATAN TIMUR', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.120501', '106.5870373'),
(5, 'SEPATAN', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1229985', '106.5613238'),
(6, 'RAJEG', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1154265', '106.50987138'),
(7, 'SUKADIRI', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.0678725', '106.5548253'),
(8, 'KEMIRI', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.0900045', '106.4614654'),
(9, 'MAUK', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.053163', '106.5207503'),
(10, 'MEKAR BARU', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.066476', '106.3992103'),
(11, 'KRONJO', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.0779143', '106.4033206'),
(12, 'GUNUNG KALER', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1015363', '106.3707951'),
(13, 'KRESEK', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1484685', '106.4072948'),
(14, 'SUKAMULYA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1588486', '106.4347153'),
(15, 'JAYANTI', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2093571', '106.3800893'),
(16, 'BALARAJA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2038459', '106.439599983'),
(17, 'SINDANG JAYA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.167658', '106.4926968'),
(18, 'PASAR KEMIS', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.1610686', '106.5421958'),
(19, 'CISAUK', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.3274365', '106.6199587'),
(20, 'PAGEDANGAN', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2970921', '106.6007544'),
(21, 'LEGOK', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.3033705', '106.5672096'),
(22, 'KELAPA DUA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.239185', '106.6087103'),
(23, 'CURUG', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.236728', '106.5613553'),
(24, 'PANONGAN', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2775916', '106.5080203'),
(25, 'CIKUPA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2170425', '106.509085199'),
(26, 'JAMBE', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.3214711', '106.5055494'),
(27, 'TIGARAKSA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2596997', '106.4589741'),
(28, 'SOLEAR', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.3135606', '106.4127178'),
(29, 'CISOKA', '2018-05-02 10:22:50', '2018-05-02 10:22:50', NULL, '-6.2576235', '106.4123067');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
