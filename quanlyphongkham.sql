-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2022 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyphongkham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bacsi`
--

CREATE TABLE `bacsi` (
  `ID_Bacsi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `ID_Khoa` int(11) NOT NULL,
  `Hoten` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'anh1.jpg',
  `Tinhtrangbacsi` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bacsi`
--

INSERT INTO `bacsi` (`ID_Bacsi`, `id`, `ID_Khoa`, `Hoten`, `Ngaysinh`, `Gioitinh`, `image`, `Tinhtrangbacsi`) VALUES
(1, 2, 1, 'Mai Anh Dương', '2021-12-07', 'Nam', 'anh1.jpg', 'Đang làm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhan`
--

CREATE TABLE `benhan` (
  `ID_Benhan` int(11) NOT NULL,
  `id_Lichhen` int(11) NOT NULL,
  `Chuandoan` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `ID_Benhnhan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Hotenbn` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'anh1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`ID_Benhnhan`, `id`, `Hotenbn`, `Ngaysinh`, `Gioitinh`, `image`) VALUES
(4, 7, 'Mai Anh Dương', '2021-11-09', 'Nam', 'https://lh3.googleusercontent.com/a-/AOh14GicIzCp9fpBmfcGooVLOGWvzBhs2iYoA7SBbZcm=s96-c'),
(5, 8, 'Mai Anh Dương', '2021-11-09', 'Nam', 'https://lh3.googleusercontent.com/a-/AOh14GicIzCp9fpBmfcGooVLOGWvzBhs2iYoA7SBbZcm=s96-c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `ID_Khoa` int(11) NOT NULL,
  `Tenkhoa` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Hinhanh` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaythanhlap_khoa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ID_Khoa`, `Tenkhoa`, `Hinhanh`, `Ngaythanhlap_khoa`) VALUES
(1, 'Khoa Mắt', '1640659920_khoamat.jpg', '2021-12-08'),
(2, 'Khoa răng', '1640659860_ranghammat.jpg', '2021-12-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhen`
--

CREATE TABLE `lichhen` (
  `id_Lichhen` int(11) NOT NULL,
  `ID_Benhnhan` int(11) NOT NULL,
  `ID_Bacsi` int(11) NOT NULL,
  `Ngayhen` date NOT NULL,
  `Giobatdau` time NOT NULL,
  `Gioketthuc` time NOT NULL,
  `Trangthai` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang chờ',
  `Ngaytao` date NOT NULL,
  `so` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichhen`
--

INSERT INTO `lichhen` (`id_Lichhen`, `ID_Benhnhan`, `ID_Bacsi`, `Ngayhen`, `Giobatdau`, `Gioketthuc`, `Trangthai`, `Ngaytao`, `so`) VALUES
(1, 5, 1, '2022-01-04', '18:24:00', '19:24:00', 'Đang chờ', '2022-01-03', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `ID_Lich` int(11) NOT NULL,
  `ID_Phongkham` int(11) NOT NULL,
  `ID_Bacsi` int(11) NOT NULL,
  `Ngay` date NOT NULL,
  `Giobatdau` time NOT NULL,
  `Gioketthuc` time NOT NULL,
  `Tinhtrang` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`ID_Lich`, `ID_Phongkham`, `ID_Bacsi`, `Ngay`, `Giobatdau`, `Gioketthuc`, `Tinhtrang`) VALUES
(1, 1, 1, '2021-12-29', '17:47:00', '18:47:00', 'Xác nhận'),
(2, 1, 1, '2021-12-30', '09:55:00', '11:56:00', 'Xác nhận'),
(3, 1, 1, '2022-01-04', '18:24:00', '19:24:00', 'Xác nhận'),
(4, 1, 1, '2022-01-04', '21:26:00', '22:26:00', 'Xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongkham`
--

CREATE TABLE `phongkham` (
  `ID_Phongkham` int(11) NOT NULL,
  `ID_Khoa` int(11) NOT NULL,
  `Tenphongkham` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayThanhLap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongkham`
--

INSERT INTO `phongkham` (`ID_Phongkham`, `ID_Khoa`, `Tenphongkham`, `NgayThanhLap`) VALUES
(1, 1, 'Phòng A1', '0000-00-00'),
(2, 1, 'Phòng A2', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `Tendangnhap` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '827ccb0eea8a706c4c34a16891f84e7b ',
  `Email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phanquyen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `Tendangnhap`, `Password`, `Email`, `Phanquyen`) VALUES
(2, 'duong12', '827ccb0eea8a706c4c34a16891f84e7b ', 'maianhduong9a7@gmail.com', 'Doctor'),
(4, 'admin', '827ccb0eea8a706c4c34a16891f84e7b ', 'maianh@gmail.com', 'Admin'),
(7, 'Mai Anh Dương1', '827ccb0eea8a706c4c34a16891f84e7b ', 'maianhduong@gmail.com', 'Benhnhan'),
(8, 'Mai Anh Dương', '7004e5606ef64d95b5f928d316605879', 'maianhduong9a6@gmail.com', 'Benhnhan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `ID_Thuoc` int(11) NOT NULL,
  `Tenthuoc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Loaithuoc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Thongtinthuoc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Handung` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xemthuoc`
--

CREATE TABLE `xemthuoc` (
  `ID_Thuoc` int(11) NOT NULL,
  `id_Lichhen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`ID_Bacsi`),
  ADD KEY `id` (`id`,`ID_Khoa`),
  ADD KEY `ID_Khoa` (`ID_Khoa`);

--
-- Chỉ mục cho bảng `benhan`
--
ALTER TABLE `benhan`
  ADD PRIMARY KEY (`ID_Benhan`),
  ADD KEY `id_Lichhen` (`id_Lichhen`);

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`ID_Benhnhan`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ID_Khoa`);

--
-- Chỉ mục cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  ADD PRIMARY KEY (`id_Lichhen`),
  ADD KEY `ID_Benhnhan` (`ID_Benhnhan`,`ID_Bacsi`),
  ADD KEY `ID_Bacsi` (`ID_Bacsi`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`ID_Lich`),
  ADD KEY `ID_Phongkham` (`ID_Phongkham`,`ID_Bacsi`),
  ADD KEY `ID_Bacsi` (`ID_Bacsi`);

--
-- Chỉ mục cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  ADD PRIMARY KEY (`ID_Phongkham`),
  ADD KEY `ID_Khoa` (`ID_Khoa`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`ID_Thuoc`);

--
-- Chỉ mục cho bảng `xemthuoc`
--
ALTER TABLE `xemthuoc`
  ADD KEY `ID_Thuoc` (`ID_Thuoc`,`id_Lichhen`),
  ADD KEY `id_Lichhen` (`id_Lichhen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `ID_Bacsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `benhan`
--
ALTER TABLE `benhan`
  MODIFY `ID_Benhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `ID_Benhnhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ID_Khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  MODIFY `id_Lichhen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `ID_Lich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  MODIFY `ID_Phongkham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `ID_Thuoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bacsi_ibfk_2` FOREIGN KEY (`ID_Khoa`) REFERENCES `khoa` (`ID_Khoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `benhan`
--
ALTER TABLE `benhan`
  ADD CONSTRAINT `benhan_ibfk_1` FOREIGN KEY (`id_Lichhen`) REFERENCES `lichhen` (`id_Lichhen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  ADD CONSTRAINT `lichhen_ibfk_1` FOREIGN KEY (`ID_Benhnhan`) REFERENCES `benhnhan` (`ID_Benhnhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lichhen_ibfk_2` FOREIGN KEY (`ID_Bacsi`) REFERENCES `bacsi` (`ID_Bacsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `lichlamviec_ibfk_1` FOREIGN KEY (`ID_Phongkham`) REFERENCES `phongkham` (`ID_Phongkham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lichlamviec_ibfk_2` FOREIGN KEY (`ID_Bacsi`) REFERENCES `bacsi` (`ID_Bacsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phongkham`
--
ALTER TABLE `phongkham`
  ADD CONSTRAINT `phongkham_ibfk_1` FOREIGN KEY (`ID_Khoa`) REFERENCES `khoa` (`ID_Khoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `xemthuoc`
--
ALTER TABLE `xemthuoc`
  ADD CONSTRAINT `xemthuoc_ibfk_1` FOREIGN KEY (`id_Lichhen`) REFERENCES `lichhen` (`id_Lichhen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `xemthuoc_ibfk_2` FOREIGN KEY (`ID_Thuoc`) REFERENCES `thuoc` (`ID_Thuoc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
