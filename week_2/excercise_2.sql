-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 25, 2021 lúc 06:30 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `excercise_2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(11) NOT NULL,
  `device` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `mac` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `pc` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dashboards`
--

INSERT INTO `dashboards` (`id`, `device`, `color`, `mac`, `ip`, `pc`, `created_at`, `updated_at`) VALUES
(18, 'kiz', 'rgb(58,170,95)', '44:%G:1111', '1231234', 12, '2021-08-24 01:00:00', '2021-08-24 01:00:00'),
(19, 'Computer', 'rgb(166,173,67)', '123:GG:66', '127.00.001', 20, '2021-08-24 01:00:43', '2021-08-24 01:00:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `db_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `name`, `action`, `date`, `db_id`, `created_at`, `updated_at`) VALUES
(1, 'TV', 'sleep', '2021-08-23', 18, NULL, NULL),
(2, 'Sofa', 'active', '2021-08-23', 18, NULL, NULL),
(3, 'Computer', 'turn off', '2021-08-23', 18, NULL, NULL),
(4, 'Phone', 'active', '2021-08-23', 18, NULL, NULL),
(5, 'washer', 'sleep', '2021-08-23', 18, NULL, NULL),
(6, 'selling fan', 'turn on', '2021-08-23', 18, NULL, NULL),
(7, 'ABC', 'sleep', '2021-08-23', 18, NULL, NULL),
(8, 'Now', 'sleep', '2021-08-23', 18, NULL, NULL),
(9, 'Bee', 'sleep', '2021-08-23', 18, NULL, NULL),
(10, 'Kiz', 'active', '2021-08-23', 18, NULL, NULL),
(11, 'TV', 'sleep', '2021-08-23', 19, NULL, NULL),
(12, 'PC', 'turn on', '2021-08-23', 19, NULL, NULL),
(13, 'TV', 'sleep', '2021-08-23', 19, NULL, NULL),
(14, 'TV2', 'on', '2021-08-23', 19, NULL, NULL),
(18, 'kiên', '124', '2021-08-25', 18, '2021-08-24 21:14:07', '2021-08-24 21:14:07'),
(19, 'jk', 'njkj', '0124-04-12', 18, '2021-08-24 21:16:30', '2021-08-24 21:16:30'),
(20, 'nj', 'kj', '0004-12-14', 19, '2021-08-24 21:17:14', '2021-08-24 21:17:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Admin',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'uploads/kiz.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Trần Híu Kiên', 'john', '$2y$10$q/g0x3u/KDfuEqYgCNEfG.Tkpf5cspAsRwnTizqsX2COfja9lLUsi', 'uploads//6125b0e735d0b-ClipartKey_1420348.png', '2021-08-25 01:53:29', '2021-08-24 21:04:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_ibfk_1` (`db_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`db_id`) REFERENCES `dashboards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
