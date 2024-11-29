-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2023 lúc 07:25 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MAK` char(100) NOT NULL,
  `TENK` varchar(100) NOT NULL,
  `NGAYTHEM` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MAK`, `TENK`, `NGAYTHEM`) VALUES
('MK01', 'Công Nghệ Thông Tin', '2023-12-15 14:37:18'),
('MK02', 'Luật', '2023-12-15 14:41:11'),
('MK03', 'Ngôn Ngữ Anh', '2023-12-15 14:43:12'),
('MK04', 'Kỹ Thuật Dầu Khí', '2023-12-15 14:44:19'),
('MK05', 'Kinh Tế Đối Ngoại', '2023-12-15 14:44:53'),
('MK06', 'Kế Toán', '2023-12-15 14:45:19'),
('MK07', 'Hải Dương Học', '2023-12-15 14:45:36'),
('MK08', 'Kỹ Thuật Xây Dựng', '2023-12-15 14:45:55'),
('MK09', 'Kiến Trúc', '2023-12-15 14:46:15'),
('MK10', 'Thiên Văn Học', '2023-12-15 14:46:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `idcm` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` char(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `ngaygui` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`idcm`, `name`, `email`, `comment`, `ngaygui`) VALUES
(1, 'Lê Hiếu', 'lehieu18102k3@gmail.com', 'hello', '2023-12-25 11:25:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qldiem`
--

CREATE TABLE `qldiem` (
  `IDDIEM` char(50) NOT NULL,
  `MASV` int(50) NOT NULL,
  `MAMH` char(100) NOT NULL,
  `DIEMCC` double DEFAULT NULL,
  `DIEMGK` double DEFAULT NULL,
  `LANHOC` int(11) DEFAULT NULL,
  `LANTHI` int(11) DEFAULT NULL,
  `DTHI` double DEFAULT NULL,
  `TBCHP` double DEFAULT NULL,
  `DCHU` char(5) DEFAULT NULL,
  `NOTE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qldiem`
--

INSERT INTO `qldiem` (`IDDIEM`, `MASV`, `MAMH`, `DIEMCC`, `DIEMGK`, `LANHOC`, `LANTHI`, `DTHI`, `TBCHP`, `DCHU`, `NOTE`) VALUES
('20214046FL1219', 20214046, 'FL1219', 9, 8, 1, 1, 9.5, 9.15, 'A', ''),
('20214046IT1208', 20214046, 'IT1208', 10, 5, 1, 1, 9.5, 8.65, 'A', ''),
('20214046IT2201', 20214046, 'IT2201', 10, 6, 1, 1, 8.5, 8.15, 'B', ''),
('20214047FL1219', 20214047, 'FL1219', 9, 5.5, 1, 1, 8, 7.6, 'B', ''),
('20214047IT1208', 20214047, 'IT1208', 10, 8, 1, 1, 8.5, 8.55, 'A', ''),
('20214047IT2201', 20214047, 'IT2201', 10, 5.5, 1, 1, 7, 7, 'B', ''),
('20214048FL1219', 20214048, 'FL1219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214048IT1208', 20214048, 'IT1208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214048IT2201', 20214048, 'IT2201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214049FL1219', 20214049, 'FL1219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214049IT1208', 20214049, 'IT1208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214049IT2201', 20214049, 'IT2201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214050MIL1225', 20214050, 'MIL1225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20214051MIL1225', 20214051, 'MIL1225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlmonhoc`
--

CREATE TABLE `qlmonhoc` (
  `MAMH` char(100) NOT NULL,
  `TENMH` varchar(200) NOT NULL,
  `SOTINCHI` int(11) NOT NULL,
  `NGAYTHEM` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlmonhoc`
--

INSERT INTO `qlmonhoc` (`MAMH`, `TENMH`, `SOTINCHI`, `NGAYTHEM`) VALUES
('FL1219', 'Tiếng Anh 1', 3, '2023-12-17 18:39:03'),
('IT1208', 'Tin học đại cương', 3, '2023-12-15 13:50:05'),
('IT2201', 'Cơ sở lập trình với C', 3, '2023-12-17 18:39:41'),
('IT2203', 'Thiết kế Web', 3, '2023-12-17 18:40:09'),
('MI1209', 'Giải tích', 3, '2023-12-15 13:50:26'),
('MIL1225', 'Giáo dục Quốc phòng và An ninh', 3, '2023-12-15 13:51:18'),
('SSH1201', 'Triết học Mác - Lênin', 3, '2023-12-15 13:49:22'),
('SSH1203', 'Chủ nghĩa xã hội khoa học', 2, '2023-12-17 18:43:15'),
('SSH1204', 'Lịch sử Đảng Cộng sản Việt Nam', 3, '2023-12-17 18:42:32'),
('SSH1207', 'Kỹ năng mềm', 3, '2023-12-17 18:38:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlsinhvien`
--

CREATE TABLE `qlsinhvien` (
  `MASV` int(11) NOT NULL,
  `MAK` char(100) NOT NULL,
  `khoahoc` char(20) NOT NULL,
  `HOTEN` varchar(100) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `TBCHT` double NOT NULL DEFAULT 0,
  `XEPLOAI` varchar(20) DEFAULT NULL,
  `NGAYTHEM` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlsinhvien`
--

INSERT INTO `qlsinhvien` (`MASV`, `MAK`, `khoahoc`, `HOTEN`, `NGAYSINH`, `GIOITINH`, `TBCHT`, `XEPLOAI`, `NGAYTHEM`) VALUES
(20214045, 'MK01', 'K12', 'Lê Đình Hi', '2003-10-18', 'nam', 0, NULL, '2023-12-16 21:16:04'),
(20214046, 'MK01', 'K12', 'Lê Đình Hiếu', '2023-12-15', 'nam', 8.65, 'Giỏi', '2023-12-17 03:46:09'),
(20214047, 'MK01', 'K12', 'Lê Đình Hiếu', '2023-12-14', 'nam', 7.716666666666667, 'Khá', '2023-12-17 04:00:22'),
(20214048, 'MK01', 'K12', 'Lê Đình Hiếu', '2023-12-22', 'Nữ', 0, 'Kém', '2023-12-17 18:27:16'),
(20214049, 'MK01', 'K12', 'Lê Đình Hiếu', '2023-12-23', 'nam', 0, 'Kém', '2023-12-17 18:27:35'),
(20214050, 'MK03', 'K11', 'Lê Đình Hiếu', '2023-12-22', 'nam', 0, 'Kém', '2023-12-20 16:07:43'),
(20214051, 'MK03', 'K11', 'Lê Đình Hiếu', '2023-12-21', 'nam', 0, 'Kém', '2023-12-20 16:08:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` char(100) NOT NULL,
  `password` char(250) NOT NULL,
  `duyet` char(5) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `duyet`) VALUES
('admin', 'admin', 'on'),
('lehieu', '12345', 'on'),
('lehieu18', '12345', 'off');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAK`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`idcm`);

--
-- Chỉ mục cho bảng `qldiem`
--
ALTER TABLE `qldiem`
  ADD PRIMARY KEY (`IDDIEM`),
  ADD KEY `key_mamh` (`MAMH`),
  ADD KEY `MASV` (`MASV`);

--
-- Chỉ mục cho bảng `qlmonhoc`
--
ALTER TABLE `qlmonhoc`
  ADD PRIMARY KEY (`MAMH`);

--
-- Chỉ mục cho bảng `qlsinhvien`
--
ALTER TABLE `qlsinhvien`
  ADD PRIMARY KEY (`MASV`),
  ADD KEY `key_mak` (`MAK`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `idcm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `qldiem`
--
ALTER TABLE `qldiem`
  ADD CONSTRAINT `key_mamh` FOREIGN KEY (`MAMH`) REFERENCES `qlmonhoc` (`MAMH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_masv` FOREIGN KEY (`MASV`) REFERENCES `qlsinhvien` (`MASV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `qlsinhvien`
--
ALTER TABLE `qlsinhvien`
  ADD CONSTRAINT `key_mak` FOREIGN KEY (`MAK`) REFERENCES `khoa` (`MAK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
