-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2024 lúc 11:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlchsach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_dat_hang`
--

CREATE TABLE `chi_tiet_don_dat_hang` (
  `DDH_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `CTDDH_SOLUONG` int(11) NOT NULL,
  `CTDDH_DONGIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_dat_hang`
--

INSERT INTO `chi_tiet_don_dat_hang` (`DDH_MA`, `SACH_MA`, `CTDDH_SOLUONG`, `CTDDH_DONGIA`) VALUES
(1, 5, 1, 100000),
(2, 3, 1, 20000),
(2, 8, 2, 100000),
(3, 6, 3, 200000),
(4, 4, 1, 150000),
(4, 17, 2, 30000),
(5, 4, 2, 150000),
(6, 5, 1, 120000),
(7, 3, 1, 25000),
(8, 12, 5, 100000),
(9, 16, 1, 100000),
(10, 17, 1, 30000),
(11, 14, 1, 20000),
(16, 18, 2, 169000),
(17, 19, 4, 115000),
(21, 4, 1, 150000),
(21, 17, 2, 35000),
(22, 19, 1, 115000),
(23, 11, 1, 85000),
(23, 12, 1, 107000),
(23, 17, 2, 35000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `GH_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `CTGH_SOLUONGSACH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`GH_MA`, `SACH_MA`, `CTGH_SOLUONGSACH`) VALUES
(1, 1, 1),
(1, 6, 4),
(2, 6, 1),
(2, 7, 1),
(3, 5, 2),
(3, 8, 3),
(4, 3, 1),
(4, 13, 1),
(5, 14, 1),
(5, 20, 2),
(6, 2, 1),
(6, 15, 2),
(7, 9, 3),
(7, 16, 1),
(8, 10, 1),
(8, 17, 4),
(10, 12, 2),
(10, 19, 2),
(15, 19, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_lo_nhap`
--

CREATE TABLE `chi_tiet_lo_nhap` (
  `LN_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `CTLN_SOLUONG` int(11) NOT NULL,
  `CTLN_GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_lo_nhap`
--

INSERT INTO `chi_tiet_lo_nhap` (`LN_MA`, `SACH_MA`, `CTLN_SOLUONG`, `CTLN_GIA`) VALUES
(1, 1, 300, 30000000),
(2, 2, 250, 25000000),
(3, 3, 400, 40000000),
(4, 4, 500, 50000000),
(5, 5, 700, 70000000),
(5, 10, 500, 7800000),
(6, 6, 850, 85000000),
(7, 7, 900, 90000000),
(8, 8, 650, 65000000),
(9, 9, 780, 8000000),
(10, 10, 975, 97000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_lo_xuat`
--

CREATE TABLE `chi_tiet_lo_xuat` (
  `LX_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `CTLX_SOLUONG` int(11) NOT NULL,
  `CTLX_GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_lo_xuat`
--

INSERT INTO `chi_tiet_lo_xuat` (`LX_MA`, `SACH_MA`, `CTLX_SOLUONG`, `CTLX_GIA`) VALUES
(1, 1, 100, 10000000),
(2, 2, 250, 30000000),
(3, 3, 150, 20000000),
(4, 4, 180, 25000000),
(5, 5, 300, 35000000),
(6, 6, 600, 60000000),
(7, 7, 450, 50000000),
(8, 8, 700, 70000000),
(9, 9, 800, 80000000),
(10, 10, 400, 38000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_trang_thai`
--

CREATE TABLE `chi_tiet_trang_thai` (
  `TT_MA` int(11) NOT NULL,
  `DDH_MA` int(11) NOT NULL,
  `CTTT_NGAYCAPNHAT` datetime NOT NULL,
  `CTTT_GHICHU` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_trang_thai`
--

INSERT INTO `chi_tiet_trang_thai` (`TT_MA`, `DDH_MA`, `CTTT_NGAYCAPNHAT`, `CTTT_GHICHU`) VALUES
(1, 1, '2022-02-02 00:00:00', 'Trạng thái đã cập nhật'),
(1, 7, '2022-02-08 00:00:00', 'Trạng thái đã cập nhật'),
(1, 23, '2023-03-18 22:52:35', 'Đang chờ xử lý'),
(2, 2, '2022-02-03 00:00:00', 'Trạng thái đã cập nhật'),
(2, 8, '2022-02-09 00:00:00', 'Trạng thái đã cập nhật'),
(3, 3, '2022-02-04 00:00:00', 'Trạng thái đã cập nhật'),
(3, 9, '2022-02-10 00:00:00', 'Trạng thái đã cập nhật'),
(4, 4, '2022-02-05 00:00:00', 'Trạng thái đã cập nhật'),
(4, 10, '2022-02-11 00:00:00', 'Trạng thái đã cập nhật'),
(5, 5, '2022-02-06 00:00:00', 'Trạng thái đã cập nhật'),
(5, 11, '2023-03-05 02:12:21', ''),
(6, 6, '2022-02-07 00:00:00', 'Trạng thái đã cập nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `CV_MA` int(11) NOT NULL,
  `CV_TEN` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`CV_MA`, `CV_TEN`) VALUES
(1, 'Giao hàng'),
(2, 'Tiếp thị'),
(3, 'Thu ngân'),
(4, 'Kiểm kho'),
(5, 'Kế toán'),
(6, 'Quản trị hệ thống'),
(7, 'Chủ cửa hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_dia_chi_giao_hang`
--

CREATE TABLE `co_dia_chi_giao_hang` (
  `DCGH_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `co_dia_chi_giao_hang`
--

INSERT INTO `co_dia_chi_giao_hang` (`DCGH_MA`, `KH_MA`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(22, 9),
(23, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_tac_gia`
--

CREATE TABLE `co_tac_gia` (
  `SACH_MA` int(11) NOT NULL,
  `TG_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `co_tac_gia`
--

INSERT INTO `co_tac_gia` (`SACH_MA`, `TG_MA`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cua_sach`
--

CREATE TABLE `cua_sach` (
  `TLS_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cua_sach`
--

INSERT INTO `cua_sach` (`TLS_MA`, `SACH_MA`) VALUES
(1, 1),
(2, 2),
(3, 2),
(3, 13),
(4, 3),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 17),
(4, 19),
(4, 20),
(5, 4),
(5, 8),
(5, 18),
(6, 4),
(7, 4),
(8, 5),
(9, 6),
(9, 18),
(10, 7),
(11, 10),
(11, 20),
(12, 4),
(12, 19),
(13, 14),
(14, 16),
(15, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `DG_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `DG_NOIDUNG` text NOT NULL,
  `DG_DIEM` int(11) NOT NULL,
  `DG_THOIGIAN` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`DG_MA`, `KH_MA`, `SACH_MA`, `DG_NOIDUNG`, `DG_DIEM`, `DG_THOIGIAN`) VALUES
(1, 1, 1, 'Sách hay', 5, '2022-02-07 00:00:00'),
(2, 2, 6, 'Quá tuyệt vời', 5, '2022-02-08 00:00:00'),
(3, 3, 5, 'Sách hay', 5, '2022-02-09 00:00:00'),
(4, 4, 3, 'Quá tuyệt vời', 5, '2022-02-10 00:00:00'),
(5, 5, 20, 'Sách hay', 4, '2022-02-11 00:00:00'),
(6, 6, 2, 'Sách hay', 4, '2022-02-12 00:00:00'),
(7, 7, 9, 'Sách hay', 4, '2022-02-13 00:00:00'),
(8, 8, 10, 'Sách hay', 4, '2022-02-14 00:00:00'),
(9, 9, 11, 'Không như mong đợi', 3, '2022-02-15 00:00:00'),
(10, 10, 12, 'Thú vị', 5, '2022-02-16 00:00:00'),
(11, 1, 6, 'Thú vị', 5, '2022-02-17 00:00:00'),
(12, 2, 7, 'Không như mong đợi', 3, '2022-02-18 00:00:00'),
(13, 3, 8, 'Quá tuyệt vời', 5, '2022-02-19 00:00:00'),
(14, 4, 13, 'Sẽ ủng hộ tiếp', 5, '2022-02-20 00:00:00'),
(15, 5, 14, 'Quá tuyệt vời', 5, '2022-02-21 00:00:00'),
(16, 6, 15, 'Xuất sắc', 5, '2022-02-22 00:00:00'),
(17, 7, 16, 'Xuất sắc', 5, '2022-02-23 00:00:00'),
(18, 8, 17, 'Không như mong đợi', 5, '2022-02-24 00:00:00'),
(19, 9, 18, 'Xuất sắc', 5, '2022-02-25 00:00:00'),
(20, 10, 19, 'Quá tuyệt vời', 5, '2022-02-26 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi_giao_hang`
--

CREATE TABLE `dia_chi_giao_hang` (
  `DCGH_MA` int(11) NOT NULL,
  `XP_MA` int(11) NOT NULL,
  `DCGH_HOTENNGUOINHAN` char(30) NOT NULL,
  `DCGH_SONHA` char(30) NOT NULL,
  `DCGH_GHICHU` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi_giao_hang`
--

INSERT INTO `dia_chi_giao_hang` (`DCGH_MA`, `XP_MA`, `DCGH_HOTENNGUOINHAN`, `DCGH_SONHA`, `DCGH_GHICHU`) VALUES
(1, 9, 'Trần Văn Nhẹ', '210 tổ 14 ấp Bình Phú', 'Không'),
(2, 10, 'Phạm Thi Hoa', '210 to 15 ấp Bình Phú', 'Không'),
(3, 1, 'Hoa Thị Trâm', '210 to 6 ấp Bình Phú', 'Không'),
(4, 2, ' Nguyễn Ngọc Ánh', '210 to 7 ấp Bình Phú', 'Không'),
(5, 3, 'Trần Ý', '210 to 8 ấp Bình Phú', 'Không'),
(6, 4, 'Phan Văn Khải', '210 to 9 ấp Bình Phú', 'Không'),
(7, 5, 'Nguyễn Văn Kiên', '210 to 10 ấp Bình Phú', 'Không'),
(8, 6, 'Trịnh Ngọc Kỳ', '210 to 11 ấp Bình Phú', 'Không'),
(9, 7, 'Trần Ngọc Phước', '210 to 12 ấp Bình Phú', 'Không'),
(10, 8, 'Ý Nhi', '210 to 13 ấp Bình Phú', 'Không'),
(22, 2, 'Ý 123', '123 A', 'Nhà có chó dữ'),
(23, 5, 'Ý 123', '23', 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_dat_hang`
--

CREATE TABLE `don_dat_hang` (
  `DDH_MA` int(11) NOT NULL,
  `HTTT_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `DCGH_MA` int(11) NOT NULL,
  `DDH_NGAYDAT` datetime NOT NULL,
  `DDH_TONGTIEN` float NOT NULL,
  `DDH_PHISHIPTHUCTE` float NOT NULL,
  `DDH_THUEVAT` float NOT NULL,
  `DDH_DUONGDANHINHANHCHUYENKHOAN` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_dat_hang`
--

INSERT INTO `don_dat_hang` (`DDH_MA`, `HTTT_MA`, `KH_MA`, `DCGH_MA`, `DDH_NGAYDAT`, `DDH_TONGTIEN`, `DDH_PHISHIPTHUCTE`, `DDH_THUEVAT`, `DDH_DUONGDANHINHANHCHUYENKHOAN`) VALUES
(1, 1, 1, 1, '2023-06-06 00:00:00', 150000, 30000, 8, ''),
(2, 2, 2, 2, '2023-08-05 00:00:00', 200000, 20000, 8, 'minhchung.jpg'),
(3, 3, 3, 3, '2023-07-08 00:00:00', 50000, 15000, 8, 'minhchung.jpg'),
(4, 4, 4, 4, '2023-10-04 00:00:00', 350000, 10000, 8, 'minhchung.jpg'),
(5, 5, 5, 5, '2023-10-01 00:00:00', 700000, 25000, 8, 'minhchung.jpg'),
(6, 1, 6, 6, '2023-05-06 00:00:00', 500000, 15000, 8, 'minhchung.jpg'),
(7, 2, 7, 7, '2023-09-08 00:00:00', 450000, 20000, 8, 'NULL'),
(8, 3, 8, 8, '2023-07-04 00:00:00', 250000, 10000, 8, 'minhchung.jpg'),
(9, 4, 9, 9, '2023-08-03 00:00:00', 600000, 30000, 8, 'minhchung.jpg'),
(10, 5, 10, 10, '2023-08-03 00:00:00', 550000, 25000, 8, 'minhchung.jpg'),
(11, 1, 2, 6, '2023-03-05 02:10:46', 20000, 20000, 8, ''),
(16, 1, 9, 9, '2023-03-17 05:43:32', 628400, 20000, 8, ''),
(17, 1, 9, 9, '2023-03-17 05:50:28', 848000, 20000, 8, NULL),
(21, 2, 9, 22, '2023-03-17 06:03:10', 436000, 40000, 8, 'minhchung93.jpg'),
(22, 1, 9, 9, '2023-03-17 20:20:52', 227000, 20000, 8, NULL),
(23, 1, 9, 23, '2023-03-18 22:52:35', 506600, 35000, 8, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duoc_quan_ly_boi`
--

CREATE TABLE `duoc_quan_ly_boi` (
  `TT_MA` int(11) NOT NULL,
  `DDH_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `duoc_quan_ly_boi`
--

INSERT INTO `duoc_quan_ly_boi` (`TT_MA`, `DDH_MA`, `NV_MA`) VALUES
(1, 1, 1),
(1, 7, 1),
(1, 23, 1),
(2, 2, 2),
(2, 8, 2),
(3, 3, 3),
(3, 9, 3),
(4, 4, 4),
(4, 10, 4),
(5, 5, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duoc_xu_ly`
--

CREATE TABLE `duoc_xu_ly` (
  `DDH_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `duoc_xu_ly`
--

INSERT INTO `duoc_xu_ly` (`DDH_MA`, `NV_MA`) VALUES
(1, 3),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 3),
(7, 3),
(8, 3),
(9, 10),
(10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `GH_MA` int(11) NOT NULL,
  `KH_MA` int(11) DEFAULT NULL,
  `GH_NGAYCAPNHATLANCUOI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`GH_MA`, `KH_MA`, `GH_NGAYCAPNHATLANCUOI`) VALUES
(1, 1, '2022-02-01 00:00:00'),
(2, 2, '2022-02-01 00:00:00'),
(3, 3, '2022-02-02 00:00:00'),
(4, 4, '2022-02-03 00:00:00'),
(5, 5, '2022-02-04 00:00:00'),
(6, 6, '2022-02-05 00:00:00'),
(7, 7, '2022-02-06 00:00:00'),
(8, 8, '2022-02-07 00:00:00'),
(9, 9, '2023-03-18 22:52:26'),
(10, 10, '2022-02-09 00:00:00'),
(13, 13, '2023-03-18 22:29:11'),
(15, 15, '2023-03-18 22:33:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_sach`
--

CREATE TABLE `hinh_anh_sach` (
  `HAS_MA` int(11) NOT NULL,
  `SACH_MA` int(11) NOT NULL,
  `HAS_TEN` char(100) NOT NULL,
  `HAS_DUONGDAN` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_sach`
--

INSERT INTO `hinh_anh_sach` (`HAS_MA`, `SACH_MA`, `HAS_TEN`, `HAS_DUONGDAN`) VALUES
(1, 1, 'NCXN', 'NCXN.jpg'),
(2, 2, 'PING', 'PING.png'),
(3, 3, 'SPY', 'SPY.jpg'),
(4, 4, 'PHAPY', 'PHAPY.jpg'),
(5, 5, 'TCNYTNSM', 'TCNYTNSM.jpg'),
(6, 6, 'TPTKD', 'TPTKD.jpg'),
(7, 7, 'TAMBIET', 'TAMBIET.jpg'),
(8, 8, 'SOICUU', 'SOICUU.jpg'),
(9, 9, 'BLUE', 'BLUE.jpg'),
(10, 10, 'THO', 'THO.jpg'),
(11, 11, 'NLBBB', 'NLBBB.jpg'),
(12, 12, 'NLBGX', 'NLBGX.jpg'),
(13, 13, 'HIRA', 'HIRA.jpg'),
(14, 14, 'TLTV', 'TLTV.jpg'),
(15, 15, 'GATSBY', 'GATSBY.jpg'),
(16, 16, 'ODSKNX', 'ODSKNX.jpg'),
(17, 17, 'BLLK', 'BLLK.jpg'),
(18, 18, 'TTTL', 'TTTL.jpg'),
(19, 19, 'TMS6G', 'TMS6G.jpg'),
(20, 20, 'TANAKA', 'TANAKA.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_thuc_thanh_toan`
--

CREATE TABLE `hinh_thuc_thanh_toan` (
  `HTTT_MA` int(11) NOT NULL,
  `HTTT_TEN` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_thuc_thanh_toan`
--

INSERT INTO `hinh_thuc_thanh_toan` (`HTTT_MA`, `HTTT_TEN`) VALUES
(1, 'Thanh toán trực tiếp'),
(2, 'Thanh toán qua MOMO'),
(3, 'Thanh toán qua QR'),
(4, 'Thanh toán qua Ngân hàng'),
(5, 'Thanh toán qua VISA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen_quan`
--

CREATE TABLE `huyen_quan` (
  `HQ_MA` int(11) NOT NULL,
  `TTP_MA` int(11) NOT NULL,
  `HQ_TEN` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `huyen_quan`
--

INSERT INTO `huyen_quan` (`HQ_MA`, `TTP_MA`, `HQ_TEN`) VALUES
(1, 1, 'Ninh Kiều'),
(2, 2, 'Châu Thành'),
(3, 3, 'Vĩnh Lợi'),
(4, 4, 'Phụng Hiệp'),
(5, 5, 'Vĩnh Lợi'),
(6, 6, 'Cái Nước'),
(7, 7, 'Bình Chánh'),
(8, 8, 'Đống Đa'),
(9, 9, 'Hoà Vang'),
(10, 10, 'Phong Điền'),
(11, 1, 'Bình Thủy'),
(12, 1, 'Phong Điền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `KH_MA` int(11) NOT NULL,
  `GH_MA` int(11) DEFAULT NULL,
  `KH_HOTEN` char(30) NOT NULL,
  `KH_SODIENTHOAI` char(11) NOT NULL,
  `KH_DIACHI` char(255) NOT NULL,
  `KH_MATKHAU` char(20) NOT NULL,
  `KH_NGAYSINH` date NOT NULL,
  `KH_GIOITINH` char(5) NOT NULL,
  `KH_EMAIL` char(50) NOT NULL,
  `KH_DUONGDANANHDAIDIEN` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`KH_MA`, `GH_MA`, `KH_HOTEN`, `KH_SODIENTHOAI`, `KH_DIACHI`, `KH_MATKHAU`, `KH_NGAYSINH`, `KH_GIOITINH`, `KH_EMAIL`, `KH_DUONGDANANHDAIDIEN`) VALUES
(1, 1, 'Phan Văn Khải', '826798684', 'Quảng Ninh', 'Vankhai212', '2000-05-05', 'Nam', 'vankhai@gmail.com', 'vankhai.jpg'),
(2, 2, 'Nguyễn Văn Kiên', '826798675', 'An Giang', 'Vankien123', '2000-02-21', 'Nam', 'vankien@gmail.com', 'vankien.jpg'),
(3, 3, 'Trần Văn Nhẹ', '926798676', 'Đồng Tháp', 'Vannhe214', '1999-08-22', 'Nam', 'vannhe@gmail.com', 'vannhe.'),
(4, 4, 'Trịnh Ngọc Kỳ', '826798677', 'Cần Thơ', 'Ngocky214', '2003-12-05', 'Nữ', 'ngocky@gmail.com', 'ngocky.jpg'),
(5, 5, 'Hoa Thị Trâm', '826798678', 'Kiên Giang', 'ThiTram215', '2001-06-14', 'Nữ', 'thitram@gmail.com', 'thitram.jpg'),
(6, 6, ' Nguyễn Ngọc Ánh', '826798679', 'Hậu Giang', 'Ngocanh216', '2000-08-20', 'Nữ', 'ngocanh@gmail.com', 'ngocanh.jpg'),
(7, 7, 'Trần Ngọc Phước', '826798680', 'Long Bình', 'Ngocphuoc217', '2002-05-19', 'Nữ', 'ngocphuoc@gmail.com', 'ngocphuoc.jpg'),
(8, 8, 'Ý Nhi', '826798681', 'Hòa Bình', 'Nhiy218', '1969-06-16', 'Nữ', 'ynhi@gmail.com', 'ynhi.jpg'),
(9, 9, 'Trần Như Ý', '0111888999', 'Ninh Bình', 'yyy', '2001-07-11', 'Nữ', 'trany@gmail.com', 'Cute55.jpg'),
(10, 10, 'Phạm Thi Hoa', '826798683', 'Ninh Thuận', 'ThiHoa220', '2002-08-18', 'Nữ', 'thihoa@gmail.com', 'thihoa.jpg'),
(13, 13, 'Trần Nhi', '0123456789', 'Cần Thơ', '123', '2023-02-27', 'Nữ', 'nhi@gmail.com', 'nhi0949.jpg'),
(15, 15, 'Trần Na', '0123456788', 'Cần Thơ', '123', '2000-02-27', 'Nữ', 'na@gmail.com', 'chi0880.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_nhap`
--

CREATE TABLE `lo_nhap` (
  `LN_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL,
  `LN_NGAYNHAP` datetime NOT NULL,
  `LN_NOIDUNG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lo_nhap`
--

INSERT INTO `lo_nhap` (`LN_MA`, `NV_MA`, `LN_NGAYNHAP`, `LN_NOIDUNG`) VALUES
(1, 4, '2023-01-01 00:00:00', 'Nhập thành công'),
(2, 4, '2023-02-03 00:00:00', 'Nhập thành công'),
(3, 4, '2023-01-04 00:00:00', 'Nhập thành công'),
(4, 10, '2023-03-05 00:00:00', 'Nhập thành công'),
(5, 10, '2023-06-05 00:00:00', 'Nhập thành công'),
(6, 4, '2023-07-08 00:00:00', 'Nhập thành công'),
(7, 10, '2023-09-04 00:00:00', 'Nhập thành công'),
(8, 4, '2023-10-06 00:00:00', 'Nhập thành công'),
(9, 10, '2023-11-09 00:00:00', 'Nhập thành công'),
(10, 8, '2023-09-09 00:00:00', 'Nhập thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_xuat`
--

CREATE TABLE `lo_xuat` (
  `LX_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL,
  `LX_NGAYXUAT` datetime NOT NULL,
  `LX_NOIDUNG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lo_xuat`
--

INSERT INTO `lo_xuat` (`LX_MA`, `NV_MA`, `LX_NGAYXUAT`, `LX_NOIDUNG`) VALUES
(1, 4, '2023-01-11 00:00:00', 'Xuất kho'),
(2, 4, '2023-02-15 00:00:00', 'Xuất kho'),
(3, 4, '2023-01-20 00:00:00', 'Xuất kho'),
(4, 10, '2022-12-25 00:00:00', 'Bán theo lô'),
(5, 10, '2022-12-21 00:00:00', 'Bán theo lô'),
(6, 4, '2023-01-13 00:00:00', 'Bán theo lô'),
(7, 10, '2023-02-18 00:00:00', 'Được mua bởi nhà sách'),
(8, 4, '2023-01-05 00:00:00', 'Được mua bởi nhà sách'),
(9, 10, '2023-02-10 00:00:00', 'Được mua bởi nhà sách'),
(10, 10, '2023-01-28 00:00:00', 'Được mua bởi nhà sách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngon_ngu`
--

CREATE TABLE `ngon_ngu` (
  `NN_MA` int(11) NOT NULL,
  `NN_TEN` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ngon_ngu`
--

INSERT INTO `ngon_ngu` (`NN_MA`, `NN_TEN`) VALUES
(1, 'Tiếng Việt'),
(2, 'Tiếng Anh'),
(3, 'Tiếng Nhật'),
(4, 'Tiếng Hàn'),
(5, 'Tiếng Trung'),
(6, 'Tiếng Pháp'),
(7, 'Tiếng Tây Ban Nha'),
(8, 'Tiếng Thái'),
(9, 'Tiếng Đức'),
(10, 'Tiếng Nga');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_MA` int(11) NOT NULL,
  `CV_MA` int(11) NOT NULL,
  `NV_HOTEN` char(30) NOT NULL,
  `NV_SODIENTHOAI` char(11) NOT NULL,
  `NV_DIACHI` char(255) NOT NULL,
  `NV_MATKHAU` char(20) NOT NULL,
  `NV_NGAYSINH` date NOT NULL,
  `NV_GIOITINH` char(5) NOT NULL,
  `NV_EMAIL` char(50) NOT NULL,
  `NV_DUONGDANANHDAIDIEN` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_MA`, `CV_MA`, `NV_HOTEN`, `NV_SODIENTHOAI`, `NV_DIACHI`, `NV_MATKHAU`, `NV_NGAYSINH`, `NV_GIOITINH`, `NV_EMAIL`, `NV_DUONGDANANHDAIDIEN`) VALUES
(1, 7, 'Phan Thanh Duy', '9132441239', 'Cần Thơ', '1236', '1998-03-12', 'Nam', 'phanthanhduy@gmail.com', 'thanhduy.png'),
(2, 2, 'Lâm Đại Ngọc', '9134559887', 'Hậu Giang', '1234', '1999-05-15', 'Nam', 'lamdaingoc@gmail.com', 'daingoc.jpg'),
(3, 3, 'Trần Châu Khoa', '9081112225', 'Sóc Trăng', '1235', '2000-07-20', 'Nam', 'tranchaukhoa@gmail.com', 'chaukhoa.png'),
(4, 4, 'Lê Chí Kiên', '1234561239', 'An Giang', '1237', '1997-01-08', 'Nam', 'lechikien@gmail.com', 'download2023020016002244.png'),
(5, 5, 'Phan Thanh Tâm', '9789923342', 'Tiền Giang', '1238', '1996-04-26', 'Nam', 'phanthanhtam@gmail.com', 'thanhtam.jpg'),
(6, 6, 'Mai Thị Lựu', '9712245511', 'Vĩnh Long', '1233', '1995-09-24', 'Nữ', 'maithiluu@gmail.com', 'thiluu.png'),
(7, 1, 'Đào Thị Hồng', '8399709443', 'Đồng Tháp', '1239', '1999-08-22', 'Nữ', 'daothihong@gmail.com', 'thihong.jpg'),
(8, 1, 'Phan Thanh Nhân', '8397709416', 'Vũng Tàu', '1232', '1998-09-13', 'Nam', 'phanthanhnhan@gmail.com', 'thanhnhan.png'),
(9, 2, 'Phan Nguyễn Ánh Dương', '9181834445', 'Đà Lạt', '1231', '2000-02-18', 'Nữ', 'anhduong@gmail.com', 'anhduong.png'),
(10, 4, 'Phan Nguyễn Ánh Nguyệt', '9181824041', 'Bến\r\nTre', '1230', '1999-06-17', 'Nữ', 'phannguyenanhnguyet@gmail.com', 'anhnguyet.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `NXB_MA` int(11) NOT NULL,
  `NXB_TEN` char(255) NOT NULL,
  `NXB_SODIENTHOAI` char(11) NOT NULL,
  `NXB_DIACHI` char(255) NOT NULL,
  `NXB_EMAIL` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`NXB_MA`, `NXB_TEN`, `NXB_SODIENTHOAI`, `NXB_DIACHI`, `NXB_EMAIL`) VALUES
(1, 'Kim Đồng', '1900571595', 'So 55 Quang Trung, Hai Bà Trưng, Hà Nội', 'cskh_online@nxbkimdong.com.vn'),
(2, 'Tổng hợp TP.HCM', '2838256804', '62 Nguyễn Thị Minh Khai, Phường Đa Kao, Quận 1, TP.HCM', 'tonghop@nxbhcm.com.vn'),
(3, 'Thanh Niên', '19002297', 'Số 64 Bà Triệu, Hà Nội', 'hopthu@nxbthanhnien.com.vn'),
(4, 'Văn Học', ' 0243716151', '18 Nguyễn Trường Tộ, Phường Trúc Bạch, Quận Ba Đình, Hà Nội', 'info@nxbvanhoc.com.vn'),
(5, 'Thế Giới', '8438253841', '46 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', 'thegioi@hn.vnn.vn'),
(6, 'Dân Trí', '2466860751', 'Số 9 ngõ 26 Hoàng Cầu, Phường ô Chợ Dừa, Quận Đống Đa, Hà Nội', 'nxbdantri@gmail.com'),
(7, 'Trẻ', '8439316289', '161B Lý Chính Thắng, Quận 3 – TP.HCM', 'hopthubandoc@nxbtre.com.vn'),
(8, 'Lao Đồng', '43851538', '175, Giảng Võ, Quận Đống Đa, Hà Nội', 'nxblaodong@yahoo.com'),
(9, 'Hà Nội', '02438252916', 'Số 4 Tống Duy Tân, Phường Hàng Bông, Quận Hoàn Kiếm, TP. Hà Nội', 'vanthu_nxbhn@hanoi.gov.vn'),
(10, 'Tài Chính', '2439187666', 'Số 7, Phan Huy Chú, Hoàn Kiếm, Hà Nội', 'vanduongnxbtc@gmail.com'),
(11, 'Hồng Đức', '2439260024', 'Số 65, phố Tràng Thi, Phường Hàng Bông, Quận Hoàn Kiếm, Hà Nội', 'nhaxuatbanhongduc65@gmail.com'),
(12, 'Giáo Dục', '2438221386', 'Số 81, Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội', 'veph@nxbgd.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `SACH_MA` int(11) NOT NULL,
  `NXB_MA` int(11) NOT NULL,
  `NN_MA` int(11) NOT NULL,
  `SACH_TEN` char(255) NOT NULL,
  `SACH_MOTA` text NOT NULL,
  `SACH_GIA` float NOT NULL,
  `SACH_CHIETKHAU` float NOT NULL,
  `SACH_NGAYCAPNHAT` datetime NOT NULL,
  `SACH_NGAYTAO` datetime NOT NULL,
  `SACH_SOTRANG` int(11) NOT NULL,
  `SACH_ISBN` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`SACH_MA`, `NXB_MA`, `NN_MA`, `SACH_TEN`, `SACH_MOTA`, `SACH_GIA`, `SACH_CHIETKHAU`, `SACH_NGAYCAPNHAT`, `SACH_NGAYTAO`, `SACH_SOTRANG`, `SACH_ISBN`) VALUES
(1, 1, 1, 'NGẪM CHUYỆN XƯA NAY', 'Với sự uyên bác, nghiêm cẩn, vững vàng nhiều ngoại ngữ cùng phong thái giao tiếp lịch lãm, bước qua tuổi 100, nhà văn hóa Hữu Ngọc đã dành bảy thập kỉ đưa văn hóa Việt Nam ra thế giới, đồng thời luôn giữ sức sáng tạo và cầu thị trong hành trình vạn dặm tới “chân trời góc bể” để thu lượm, chắt lọc tinh túy các nền văn hóa năm châu nhằm giới thiệu về Việt Nam. Tuyển tập bài viết trong Ngẫm chuyện xưa nay được trích xuất từ vốn sống, vốn đi và sự ngẫm suy của ông trong hàng chục năm làm “xuất nhập khẩu văn hóa” sẽ khơi dậy trong lòng mỗi độc giả tình yêu, lòng tự hào dân tộc và trách nhiệm cá nhân để bảo tồn, gìn giữ và phát huy các giá trị văn hóa truyền thống tốt đẹp của dân tộc Việt.', 100000, 10, '2022-01-01 00:00:00', '2022-01-01 00:00:00', 304, '978-604-2-23799-4'),
(2, 2, 1, 'PING - VƯỢT AO TÙ RA BIỂN LỚN', 'Với những câu chuyện hấp dẫn này, Stuart Avery Gold dẫn dắt bạn đọc vào một chuyến phiêu lưu cực kỳ thú vị cùng chú ếch Ping nhằm tìm kiếm sự thay đổi, thay đổi từ chính nội tâm mình. \'Cuộc hành trình có ý nghĩa nhất chính là cuộc hành trình bên trong mỗi chúng ta\', để có thể vững bước trên hành trình ấy, Ping cần đến sự giúp đỡ của một bác Cú thông thái. Từ đây, hai bác cháu Cú và Ếch cùng trải qua chặng đường gian nan để tôi luyện tinh thần, vượt lên thử thách nhằm tìm ra con đường minh triết – con đường SỐNG CÓ CHỦ ĐÍCH - giữa cuộc đời, nơi mỗi cá thể có thể nắm giữ vận mệnh của chính mình thông qua quá trình TRI NGỘ.\r\n\r\nSau chuyến hành trình đầu tiên, vượt khỏi ao tù thành công, đến hành trình thứ hai Ping thực hiện một cuộc phiêu lưu mới – cuộc hành hương ra biển lớn với hai chú ếch trẻ là Daikon và Hodo. Lúc này đây, Ping giữ vai trò người thầy, người anh đi trước dẫn đường, hướng dẫn và truyền lại kinh nghiệm cho các đàn em. Để rồi cái đích của cuộc hành trình ấy là đại dương mênh mông, rộng lớn và hơn thế nữa là tư duy \'dám nghĩ dám làm\' và sự tự tin vào bản thân của hai chú ếch trẻ.\r\n\r\nKhép lại với hai cuộc hành trình thú vị của chú ếch Ping chúng ta có thể nhận thấy được rằng câu chuyện không chỉ là sự khôi hài, thông minh, tính uyên bác, trong cả việc xây dựng cốt truyện lẫn gợi mở những bài học tinh thần có giá trị. Mà cuốn sách còn gửi gắm đến độc giả trẻ thông điệp về cách sống một cuộc đời tốt nhất - cuộc đời mà từ sâu thẳm tâm hồn bạn luôn khao khát, có thể đạt được thông qua một cuộc sống biết chọn lựa và dám hành động. Có như vậy bạn mới đạt được một đời sống đầy sôi động và say mê, thông qua sự nhận ra bản chất thật sự và những tiềm năng bất tận của bản thân.', 88000, 10, '2022-01-02 00:00:00', '2022-01-02 00:00:00', 276, '9786045851784'),
(3, 1, 1, 'SPY X FAMILY - Tập 1', 'Nhằm ngăn chặn âm mưu gây chiến, giữ vững nền hòa bình Đông - Tây, điệp viên hàng đầu của Westalis, Twilight phải xây dựng một gia đình và cho con theo học tại học viện danh giá nhất\r\n\r\nOstania hòng tiếp cận yếu nhân cầm đầu phe chủ chiến của đất nước này: Desmon Donavan! Và thật tình cờ, đứa trẻ mà Twilight nhận làm \"con\" ở cô nhi viện, Anya, lại có khả năng đọc suy nghĩ của người khác. Chưa kể \"người vợ\" anh buộc phải chọn lựa trong lúc vội vàng, Yor, lại là một… sát thủ...!! Ba người với lí do riêng để che giấu thân phận đã cùng chung sống với nhau dưới một mái nhà. Từ đây câu chuyện siêu hấp dẫn và hài hước về gia đình điệp viên chính thức mở ra...!!', 25000, 8, '2022-01-03 00:00:00', '2022-01-03 00:00:00', 212, '978-604-2-24591-3'),
(4, 3, 1, 'GHI CHÉP PHÁP Y - NHỮNG CÁI CHẾT BÍ ẨN', '\"Làm cách nào để một “xác chết lên tiếng”? - đó là công việc của bác sĩ pháp y. \r\n\r\n“Ghi chép pháp y - Những cái chết bí ẩn” là cuốn sách nằm trong hệ liệt với “Pháp y Tần Minh” - bộ tiểu thuyết nổi đình đám của xứ Trung đã được chuyển thể thành series phim. Cuốn sách tổng hợp những vụ án có thật, được viết bởi bác sĩ pháp y Lưu Hiểu Huy - người có 15 năm kinh nghiệm và từng mổ xẻ hơn 800 tử thi. \r\n\r\nTrải qua 15 câu chuyện kinh hoàng, cuốn sách sẽ đưa bạn bước vào hiện trường của những vụ án man rợ như: xác chết phi tang dưới cánh đồng ngô, thi thể thiếu nữ không lành lặn, xác chết nhầy nhụa đang bị giòi bọ đục khoét hay một thi thể co cứng trong màng bọc nilon…lần theo những dấu vết, ghép lại sự thật từ những mảnh vụn thi thể, nguyên nhân của cái chết sẽ dần được hé mở.', 150000, 10, '2023-03-14 21:38:52', '2022-01-04 00:00:00', 344, '978-604-566-258-9'),
(5, 4, 1, 'TỪNG CÓ NGƯỜI YÊU TÔI NHƯ SINH MỆNH', 'Cô bé của tôi,\r\n\r\nchúc em một đời\r\n\r\nbình an vui vẻ.\r\n\r\n-----\r\n\r\nTác giả\r\n\r\nThư Nghi - Nhà văn thuộc thế hệ 7X\r\n\r\nTừng tốt nghiệp đại học danh tiếng, nhiều năm làm giám đốc cho công ty nước ngoài. Tuy làm việc trong môi trường kỹ thuật nhưng cô lại rất yêu văn chương.\r\n\r\nCác tác phẩm tiêu biểu:\r\n\r\n- Bẫy văn phòng\r\n\r\n- Từng có người yêu tôi như sinh mệnh\r\n\r\nMã hàng	8935212350433\r\nTên Nhà Cung Cấp	Đinh Tị\r\nTác giả	Thư Nghi\r\nNgười Dịch	Greenrosetq\r\nNXB	NXB Văn Học\r\nNăm XB	2020\r\nTrọng lượng (gr)	480\r\nKích Thước Bao Bì	20.5 x 14.5 cm\r\nSố trang	464\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nĐinh Tị\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Ngôn Tình bán chạy của tháng\r\nGiá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\nCô bé của tôi,\r\n\r\nchúc em một đời\r\n\r\nbình an vui vẻ.\r\n\r\n-----\r\n\r\nTác giả\r\n\r\nThư Nghi - Nhà văn thuộc thế hệ 7X\r\n\r\nTừng tốt nghiệp đại học danh tiếng, nhiều năm làm giám đốc cho công ty nước ngoài. Tuy làm việc trong môi trường kỹ thuật nhưng cô lại rất yêu văn chương.\r\n\r\nCác tác phẩm tiêu biểu:\r\n\r\n- Bẫy văn phòng\r\n\r\n- Từng có người yêu tôi như sinh mệnh', 129000, 9, '2022-01-05 00:00:00', '2022-01-05 00:00:00', 464, '9786049853326'),
(6, 5, 6, 'PHÁP LÝ TRONG KINH DOANH - TẬP 1: DOANH NGHIỆP', 'Bộ sách gồm 5 tập nội dung Doanh Nghiệp - Quản Trị - Tài Sản - Giao Dịch - Hội Nhập là chia sẻ từ tâm huyết nghề nghiệp của Luật sư Nguyễn Văn Lộc (Chủ tịch Tổ hợp LP Group và Luật sư sáng lập Công ty Luật LPVN) dành cho giới doanh chủ tại Việt Nam. Đây là ấn bản viết đặc biệt về pháp lý - luật pháp (duy nhất) tại Việt Nam hiện nay thể hiện hầu hết các vấn đề pháp lý trong kinh doanh mà một doanh nhân, CEO, nhà quản lý doanh nghiệp cần biết.', 220000, 10, '2022-01-06 00:00:00', '2022-01-06 00:00:00', 220, '9786047769735'),
(7, 6, 1, 'TẠM BIỆT TÔI CỦA NHIỀU NĂM VỀ TRƯỚC', '\"Dành tặng bạn, những người muốn buông bỏ những “điều đã cũ” nhưng chưa đủ can đảm.\r\n\r\nDành tặng những ai đang khao khát được “chạm vào”, được vỗ về và thấu hiểu.\r\n\r\nDành tặng cho tất cả chúng ta, trong những năm tháng tươi đẹp nhất của thanh xuân, đang có một chốn để mơ về, có một ước mơ để theo đuổi và có một ai đó để da diết nhớ thương.\r\n\r\n“Tạm biệt tôi của nhiều năm về trước” là ấn phẩm mới nhất của An, chàng tác giả từng được biết tới với “cơn sốt” sách “Hẹn nhau phía sau tan vỡ” - liên tục cháy hàng và chinh phục trái tim của hàng vạn độc giả trẻ.\r\n\r\nTrong “Tạm biệt tôi của nhiều năm về trước”, với 248 trang viết kèm minh họa được thực hiện bởi chính tác giả, An dẫn bạn đọc bóc tách từng tổn thương chưa được chữa lành bên trong mình. Dù đó là vết thương do ai gây ra, vì lý do gì, vào thời điểm nào, còn sâu hay đã vơi… thì đều được vỗ về và ủi an.\r\n\r\n“Để trưởng thành chúng ta phải nói lời tạm biệt với nhiều người, và có thể là tạm biệt chính bản thân mình trong quá khứ.”', 95000, 8, '2023-03-14 21:38:27', '2022-01-07 00:00:00', 230, '8935325003875'),
(8, 5, 1, 'KHÔNG PHẢI SÓI NHƯNG CŨNG ĐỪNG LÀ CỪU', '\"SÓI VÀ CỪU - BẠN KHÔNG TỐT NHƯ BẠN NGHĨ ĐÂU!\r\n\r\nLàn ranh của việc ngây thơ hay xấu xa đôi khi mỏng manh hơn bạn nghĩ.\r\n\r\nBạn làm một việc mà mình cho là đúng, kết quả lại bị mọi người khiển trách.\r\n\r\nBạn ủng hộ một quan điểm của ai đó, và số đông khác lại ủng hộ một quan điểm trái chiều.\r\n\r\nRốt cuộc thì bạn sai hay họ sai?\r\n\r\nCuốn sách “Không phải sói nhưng cũng đừng là cừu” đến từ tác giả Lê Bảo Ngọc sẽ giúp bạn hiểu rõ hơn những khía cạnh sắc sảo phía sau những nhận định đúng, sai đơn thuần của mỗi người.\r\n\r\nNhững câu hỏi đầy tính tranh cãi như “Cứu người hay cứu chó?”, “Một kẻ thô lỗ trong lớp vỏ “thẳng tính” khác với người EQ thấp như thế nào?”, “Vì sao một bộ phận nữ giới lại victim blaming đối với nạn nhân bị xâm hại?”,... được tác giả đưa ra trong “Không phải sói nhưng cũng đừng là cừu”. Bằng từng chương sách của mình, tác giả vạch rõ cho bạn rằng “thật sự thế nào mới là người tốt”, ngây thơ và xấu xa có ranh giới rõ ràng như thế không, rốt cuộc bạn có là người tốt như mình vẫn luôn nghĩ?\r\n\r\nTrong thời đại mà mọi thứ đều rất chóng vánh này, ranh giới giữa tốt và xấu, đúng và sai đôi lúc là không tồn tại.\r\n\r\nCái tốt mà chúng ta nghĩ, hóa ra lại là xấu trong mắt kẻ khác.\r\n\r\nCái đúng ở thời điểm này, đến một thời điểm khác lại trở thành sai.\r\n\r\nTốt đẹp hay xấu xa, thật khó phân định.', 128000, 9, '2023-03-14 21:37:55', '2022-01-08 00:00:00', 296, '8935325006685'),
(9, 7, 1, 'BLUE PERIOD - Tập 1', 'Yataro Yaguchi là một học sinh xuất sắc nhưng có lối sống buông thả, không mục đích. Một ngày nọ, tận mắt chiêm ngưỡng bức tranh của một chị lớp trên ở CLB Mỹ thuật, Yataro hoàn toàn bị hút hồn và lần đầu tiên trong đời, cậu đã tìm ra thứ mình thật sự đam mê và đặt mọi tâm huyết vào đó. Yataro quyết định tham gia vào CLB mỹ thuật và nuôi hy vọng thi vào trường ĐH mỹ thuật Tokyo danh tiếng. Thế nhưng, cậu liên tục vấp phải sự phản đối từ cha mẹ và bạn bè. Đứng trước tình thế khó xử này, Yataro đã quyết định tự mình thuyết phục mọi người bằng các bức vẽ đầy tâm huyết. \r\nBộ truyện đã đạt giải Manga Taisho và giải thưởng Kodansha năm 2019. Năm 2020, bộ truyện tiếp tục đạt hai giải Manga Taisho và Kodansha, đồng thời nhận giải thưởng danh giá Tezuka Osamu.', 48000, 8, '2022-01-09 00:00:00', '2022-01-09 00:00:00', 250, '8934974179726'),
(10, 6, 1, 'THỎ BẢY MÀU VÀ NHỮNG NGƯỜI NGHĨ NÓ LÀ BẠN', '\"Thỏ Bảy Màu là một nhân vật hư cấu chẳng còn xa lạ gì với anh em dùng mạng xã hội với slogan “Nghe lời Thỏ, kiếp này coi như bỏ!”.\r\n\r\nThỏ Bảy Màu đơn giản chỉ là một con thỏ trắng với sự dở hơi, ngang ngược nhưng đáng yêu vô cùng tận. Nó luôn nghĩ rằng mình không có cuộc sống và không có bạn bè. Tuy nhiên, Thỏ lại chẳng bao giờ thấy cô đơn vì đến cô đơn cũng bỏ nó mà đi.\r\n\r\nCuốn sách là những mẩu chuyện nhỏ được ghi lại bằng tranh xoay quanh Thỏ Bảy Màu và những người nghĩ nó là bạn. Những mẩu chuyện được truyền tải rất “teen” đậm chất hài hước, châm biếm qua sự sáng tạo không kém phần “mặn mà” của tác giả càng trở nên độc đáo và thu hút.\r\n\r\nNếu một ngày bạn lỡ cảm thấy buồn thì hãy đọc cuốn sách này để biết thế nào là cười sảng nha!', 99000, 8, '2023-03-14 21:37:33', '2022-01-10 00:00:00', 216, '9786043850093'),
(11, 9, 1, 'NGƯỜI LẠ BÊN BỜ BIỂN', '\"Anh chàng nhà văn trẻ Shun đã tình cờ bắt gặp hình bóng cô đơn của cậu học sinh cấp ba Mio trong khi cậu bé đang ngắm biển một mình. Shun liền quyết định bắt chuyện với cậu nhưng chẳng lâu sau, Mio buộc phải rời khỏi hòn đảo nơi hai người họ sinh sống. Ba năm sau, Mio nay đã trưởng thành và quay trở về, cậu bé năm nào thổ lộ tình cảm của mình với Shun nhưng lại không được đối phương chấp nhận. Rốt cuộc lý do của Shun là gì và liệu câu chuyện tình trên hòn đảo nhỏ thuộc tỉnh Okinawa sẽ kết thúc ra sao?\r\n\r\nAmak xin được mang đến với các bạn cuốn manga thể loại BL, \"Người lạ bên bờ biển/Umibe no Étranger\", tác phẩm mở đầu cho series \"L\'étranger\" nổi tiếng của tác giả Kii Kanna đã được chuyển thể thành anime và nhận được nhiều lời khen ngợi từ phía người hâm mộ. Hãy cùng chào đón cặp đôi Shun x Mio các bạn nhé!', 85000, 8, '2023-03-14 21:37:08', '2022-01-11 00:00:00', 182, '978-614-41-4298-8'),
(12, 9, 1, 'NGƯỜI LẠ DƯỚI GIÓ XUÂN', '\"Rời khỏi hòn đảo nhỏ xa xôi thuộc tỉnh Okinawa, tiểu thuyết gia Shun trở lại quê nhà ở Hokkaido, dẫn theo Mio, người yêu kém tuổi mà anh quen trên đảo.\r\nKể từ ngày tuyên bố mình là *** rồi chạy trốn khỏi hôn lễ với cô bạn thuở ấu thơ, Shun đã hoàn toàn đoạn tuyệt với gia đình. Nhưng khi nghe tin cha bị bệnh, anh quyết định phải trở về nhà một chuyến.\r\n\r\nCùng cậu bạn trai sống dưới mái nhà nơi mình đã từng gây ra bao điều rắc rối, đối với Shun, đây quả là cuộc đoàn tụ vô cùng khó xử, nhưng với Mio, người đã mất cả cha lẫn mẹ … Diễn biến câu chuyện sẽ ra sao, mời các bạn đón đọc tập 1 của phần 2 bộ truyện Người lạ bên bờ biển nhé!', 107000, 8, '2023-03-14 21:36:46', '2022-01-12 00:00:00', 188, '978-604-382-674-6'),
(13, 9, 3, 'KEEP IT UP - TẬP VIẾT TIẾNG NHẬT THEO BẢNG CHỮ CÁI HIRAGANA', 'Khác với tiếng Việt hay tiếng Anh là ngôn ngữ sử dụng chữ cái Latinh, tiếng Nhật là ngôn ngữ sử dụng chữ tượng hình phức tạp và khó hơn rất nhiều. Bởi vậy, rào cản đầu tiên mà nhiều người gặp phải khi bắt đầu học tiếng Nhật chính là các ký tự tiếng Nhật.\r\n\r\nChính vì thế, cùng với cuốn sách Keep it up – Tiếng Nhật cấp tốc cho người mới bắt đầu, cuốn Keep it up – Tập viết chữ Nhậttheo bảng chữ cái Hiraganađược biên soạn giúp các bạn tự luyện viết tại nhà, ghi nhớ từ vựng hiệu quả.', 50000, 10, '2022-01-13 00:00:00', '2022-01-13 00:00:00', 68, '8936110986847'),
(14, 7, 1, 'TIẾNG VIỆT GIÀU ĐẸP - TRIẾT LÝ TIẾNG VIỆT', 'Đây là tựa sách mới nhất của tiến sĩ Nguyễn Đúc Dân viết cho bộ Tiếng Việt Giàu Đẹp. Sách phân tích điểm nhìn, tầm quan trọng của tư duy trong đọc hiểu và ứng dụng ngôn ngữ vào đời sống, đồng thời giải thích những điều tưởng như là \"nghịch lý\" trong ca dao, tục ngữ một cách thuyết phục và hợp lý. Càng hiểu về tiếng Việt, chúng ta càng yêu quý và ý thức được tầm quan trọng của việc giữ gìn ngôn ngữ mẹ đẻ của mình hơn. Vận dụng tốt tiếng Việt sẽ dễ dàng đạt hiệu quả cao trong giao tiếp và công việc viết lách. Cũng như các tựa khác trong bộ Tiếng Việt Giàu Đẹp, sách sẽ giúp ích rất nhiều cho học sinh - sinh viên, nhà báo, người làm việc trong những ngành nghề cần vận dụng ngôn ngữ một cách linh hoạt, ứng biến.', 72000, 9, '2022-01-14 00:00:00', '2022-01-14 00:00:00', 192, '8934974180135'),
(15, 5, 2, 'GATSBY VĨ ĐẠI', 'Kiệt tác Gatsby vĩ đại (1925) của văn hào Mỹ F. Scott Fitzgerald (1896-1940) là câu chuyện về chàng trai Jay Gatsby muốn thoát khỏi thân phận nghèo hèn và đặt chân vào tầng lớp cao sang mà hiện thân là một cô gái nhà giầu anh đã yêu và được yêu khi còn khoác trên vai bộ quân phục không phân biệt đẳng cấp giầu nghèo. Qua mối tình mãnh liệt và mê muội của Gatsby, bằng một lối văn cực kỳ súc tích, đa tầng khiến cho ngay T. S. Eliot, nhà văn gốc Mỹ đương thời với Fitzgerald, Giải thưởng Nobel về văn học năm 1948, như kể lại trong thư viết cho tác giả, đã phải đọc đi đọc lại ba lần trong năm 1925, Fitzgerald đã vẽ ra một trong bức tranh cô đọng nhất, sâu sắc và giầu biểu tượng nhất về xã hội Mỹ trong những năm 1920 với đủ các mặt tàn nhẫn, giả dối, bịp bợm và ích kỷ của nó.\r\n\r\nMang trong mình những ước vọng và cả những mâu thuẫn chứa chất trong tâm hồn con người Mỹ, trong kiệt tác văn chương này tác giả đã phơi bày một cách ngậm ngùi, đau xót sự tan vỡ của những mộng tưởng ở nước Mỹ, mặt giả dối, hư trá của Giấc mơ Mỹ từng được nhen lên và nuôi dưỡng ở những người định cư đầu tiên kể từ giây phút khám phá và đặt chân lên “Tân thế giới” này.', 135000, 10, '2022-01-15 00:00:00', '2022-01-15 00:00:00', 550, '9786047715091'),
(16, 9, 1, 'Ở ĐÂY SỬA KỶ NIỆM XƯA', 'Thất bại trong tình yêu, rời viện thẩm mỹ, Akari chuyển về đường Thần Xã Tsukumo sống, nhưng cô nhận ra khu phố mua sắm sầm uất ngày nào nay đã vắng hoe. Khiến người chú ý, họa chăng chỉ có tấm biển lạ lùng “Ở đây sửa kỷ niệm xưa” treo trước cửa hiệu anh thợ sửa đồng hồ Shuji đang một mình sống lặng lẽ.\r\n\r\nChính tấm biển ấy lại run rủi Akari gặp những người mangcùng nỗi niềm quá khứ như cô. Akari, cùng với Shuji và cậu sinh viên thân thế bí ẩn Taichi bỗng trở thành chìa khóa giúp họ tháo gỡ những ưu phiền ôm giấu từ lâu. Vì một kỷ niệm chunggiữa họ đã trởvề, mở ra con đường dẫn tới những kỷ niệm êm đềm mới…', 109000, 8, '2022-01-16 00:00:00', '2022-01-16 00:00:00', 296, '8935235217089'),
(17, 1, 1, 'BLUE LOCK - Tập 1', 'Yoichi Isagi đã bỏ lỡ cơ hội tham dự giải Cao Trung toàn quốc do đã chuyền cho đồng đội thay vì tự thân mình dứt điểm. Cậu là một trong 300 chân sút U-18 được tuyển chọn bởi Jinpachi Ego, người đàn ông được Hiệp Hội Bóng Đá Nhật Bản thuê sau hồi FIFA World Cup năm 2018, nhằm dẫn dắt Nhật Bản vô địch World Cup bằng cách tiêu diệt nền bóng đá Nhật Bản. Kế hoạch của Ego gồm việc cô lập 300 tay sút trong một nhà ngục - dưới một tổ chức với tên gọi là \"Blue Lock\", với mục tiêu là tạo ra chân sút \"tự phụ\" nhất thế giới, điều mà nền bóng đá Nhật Bản còn thiếu.', 35000, 8, '2022-01-17 00:00:00', '2022-01-17 00:00:00', 208, '8935244883930'),
(18, 6, 1, 'THAO TÚNG TÂM LÝ', '\"Trong cuốn “Thao túng tâm lý”, tác giả Shannon Thomas giới thiệu đến độc giả những hiểu biết liên quan đến thao túng tâm lý và lạm dụng tiềm ẩn.\r\n\r\n“Thao túng tâm lý” là một dạng của lạm dụng tâm lý. Cũng giống như lạm dụng tâm lý, thao túng tâm lý có thể xuất hiện ở bất kỳ môi trường nào, từ bất cứ đối tượng độc hại nào. Đó có thể là bố mẹ ruột, anh chị em ruột, người yêu, vợ hoặc chồng, sếp hay đồng nghiệp… của bạn. Với tính chất bí hiểm, âm thầm gây hại, thao túng, lạm dụng tâm lý làm tổn thương cảm xúc, lòng tự trọng, cuộc sống của mỗi nạn nhân. Những người từng bị lạm dụng tâm lý thường không thể miêu tả rõ ràng điều gì đã xảy ra với mình. Trong nhiều trường hợp, nạn nhân bị thao túng đến mức tự hỏi có phải họ là người có lỗi, thậm chí họ có phải là người độc hại trong mối quan hệ đó.\r\n\r\nHành vi của (những) kẻ lạm dụng giống như một trò chơi bí ẩn, tệ hại và lặp đi lặp lại, do một cá nhân hoặc một nhóm người thực hiện với nạn nhân. Những hành vi này được ngụy trang tài tình đến mức hành vi độc ác của họ diễn ra thường xuyên, nhưng không bị phát hiện.', 169000, 10, '2023-03-14 21:36:21', '2022-01-18 00:00:00', 328, '8936066692298'),
(19, 6, 1, 'TRUYỆN MA SAU 6 GIỜ - Tập 1', 'Truyện Ma Sau 6 Giờ là tác phẩm được chuyển thể từ bộ truyện tranh cùng tên của họa sĩ Lê Vũ Kiến Duy. Bộ phim lấy bối cảnh hiện đại, nơi thế giới âm dương giao nhau bởi những cánh cổng kì bí. Minh Nhựt là một cậu học sinh cấp 3 sở hữu năng lực nhìn thấy những cánh cổng ấy. Cậu luôn cố gắng lảng tránh năng lực này và không muốn nhìn những người của thế giới bên kia. \r\n\r\nTuy nhiên, Minh Nhựt buộc phải nhìn nhận và đối mặt với sự thật này sau khi bị kéo vào thế giới phía sau cánh cổng. Từ 6h chiều ngày hôm ấy, Minh Nhựt sống một cuộc sống hoàn toàn khác. \r\n\r\nNếu bạn là người yêu thích những câu chuyện tâm linh, kinh dị thì Truyện Ma Sau 6 Giờ là series không thể bỏ qua. Đặc biệt, series này còn lồng ghép nhiều yếu tố văn hóa đậm chất Việt Nam, giúp bạn tìm hiểu thêm về các câu chuyện ma quỷ dân gian Việt.', 115000, 8, '2022-01-19 00:00:00', '2022-01-19 00:00:00', 192, '9786043317367'),
(20, 1, 1, 'TANAKA LÚC NÀO CŨNG VẬT VỜ - Tập 1', '\"Tanaka chẳng bao giờ chịu cố gắng, lúc nào cũng thở dài, một tay chống cằm, hai mắt lờ đờ, vậy nhưng không ai ghét cậu cả. Chúa đã gửi một cậu bạn cao lớn, kiệm lời tên Ota tới để chăm sóc cậu, giúp cậu tận hưởng thanh xuân vô cảm, thong dong và biếng nhác...\r\n\r\nĐó là một chút mô tả về nhân vật chính của chúng ta, anh chàng TANAKA LÚC NÀO CŨNG VẬT VỜ nhưng đã nhận được sự yêu thích từ đông đảo các Fan Manga! Trọn vẹn 13 tập truyện, đây sẽ là một tác phẩm hài hước, vui tươi và không kém phần lí thú mà NXB Kim Đồng gửi đến các bạn độc giả vào dip đầu mùa thu năm 2022.\r\n\r\nĐặc biệt hơn, tất cả các tập truyện đều được tặng kèm Photo Strip vô cùng dễ thương! Chúng ta đừng bỏ lỡ nhé!!', 38000, 8, '2023-03-14 21:35:37', '2022-01-20 00:00:00', 160, '8935244877267');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `TG_MA` int(11) NOT NULL,
  `TG_HOTEN` char(30) NOT NULL,
  `TG_BUTDANH` char(50) NOT NULL,
  `TG_NGAYSINH` date NOT NULL,
  `TG_GIOITINH` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`TG_MA`, `TG_HOTEN`, `TG_BUTDANH`, `TG_NGAYSINH`, `TG_GIOITINH`) VALUES
(1, 'Hữu Ngọc', 'Hữu Ngọc', '1918-12-22', 'Nam'),
(2, 'Stuart Avery Gold', 'Stuart Avery Gold', '1970-01-01', 'Nam'),
(3, 'Tatsuya Endo', 'Tatsuya Endo', '1980-07-23', 'Nam'),
(4, 'Lưu Hiểu Huy', 'Lưu Hiểu Huy', '1986-02-12', 'Nam'),
(5, 'Thư Nghi', 'Thư Nghi', '1901-04-27', 'Nữ'),
(6, 'Nguyễn Văn Lộc', 'Nguyễn Văn Lộc', '1982-11-16', 'Nam'),
(7, 'Nguyễn Ngọc An', 'An', '2000-03-07', 'Nam'),
(8, 'Lê Bảo Ngọc', 'Lê Bảo Ngọc', '1995-08-07', 'Nam'),
(9, 'Yamaguchi Tsubasa', 'Yamaguchi Tsubasa', '1990-06-26', 'Nữ'),
(10, 'Huỳnh Thái Học', 'Huỳnh Thái Học', '1999-01-10', 'Nam'),
(11, 'Kii Kanna', 'Kii Kanna', '1999-08-13', 'Nữ'),
(12, 'Jeong Eui Sang', 'Jeong Eui Sang', '1990-08-30', 'Nam'),
(13, 'Nguyễn Đức Dân', 'Nguyễn Đức Dân', '1936-06-23', 'Nam'),
(14, 'F Scott Fitzgerald', 'F Scott Fitzgerald', '1896-09-24', 'Nam'),
(15, 'Tani Mizue', 'Tani Mizue', '1967-02-03', 'Nữ'),
(16, 'Muneyuki Kaneshiro', 'Muneyuki Kaneshiro', '1987-12-09', 'Nam'),
(17, 'Shannon Thomas', 'LCSW', '1976-10-01', 'Nữ'),
(18, 'Lê Vũ Kiến Duy', 'Lê Vũ Kiến Duy', '1994-11-29', 'Nam'),
(19, 'Nozomi Uda', 'Nozomi Uda', '1989-12-11', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai_sach`
--

CREATE TABLE `the_loai_sach` (
  `TLS_MA` int(11) NOT NULL,
  `TLS_TEN` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai_sach`
--

INSERT INTO `the_loai_sach` (`TLS_MA`, `TLS_TEN`) VALUES
(1, 'Văn học Việt Nam'),
(2, 'Sách ngoại văn'),
(3, 'Sách Học Ngoại Ngữ'),
(4, 'Truyện Tranh'),
(5, 'Tâm lý'),
(6, 'Tiểu thuyết'),
(7, 'Trinh Thám'),
(8, 'Ngôn tình'),
(9, 'Tư duy'),
(10, 'Tản văn'),
(11, 'Hài hước'),
(12, 'Kinh dị'),
(13, 'Ký sự'),
(14, 'Light novel'),
(15, 'Kinh điển');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_thanh_pho`
--

CREATE TABLE `tinh_thanh_pho` (
  `TTP_MA` int(11) NOT NULL,
  `TTP_TEN` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_thanh_pho`
--

INSERT INTO `tinh_thanh_pho` (`TTP_MA`, `TTP_TEN`) VALUES
(1, 'TP Cần Thơ'),
(2, 'Long Xuyên'),
(3, 'An Giang'),
(4, 'Hậu Giang'),
(5, 'Bạc Liêu'),
(6, 'Cà Mau'),
(7, 'Hồ Chí Minh'),
(8, 'Hà Nội'),
(9, 'Đà Nẵng'),
(10, 'Thừa Thiên Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `TT_MA` int(11) NOT NULL,
  `TT_TEN` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--

INSERT INTO `trang_thai` (`TT_MA`, `TT_TEN`) VALUES
(1, 'Đã đặt hàng nhưng chưa xử lý'),
(2, 'Đơn hàng đã được xử lý'),
(3, 'Đang giao'),
(4, 'Đã nhận hàng'),
(5, 'Đã thanh toán'),
(6, 'Hủy đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xa_phuong`
--

CREATE TABLE `xa_phuong` (
  `XP_MA` int(11) NOT NULL,
  `HQ_MA` int(11) NOT NULL,
  `XP_TEN` char(100) NOT NULL,
  `XP_CHIPHIGIAOHANG` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `xa_phuong`
--

INSERT INTO `xa_phuong` (`XP_MA`, `HQ_MA`, `XP_TEN`, `XP_CHIPHIGIAOHANG`) VALUES
(1, 1, 'Cái Khế', 20000),
(2, 1, 'Xuân Khánh', 40000),
(3, 1, 'An Lạc', 25000),
(4, 2, 'Thạnh Xuân', 30000),
(5, 3, 'Long Bình', 35000),
(6, 5, 'Châu Thới', 20000),
(7, 6, 'Hiệp Hưng', 20000),
(8, 7, 'Đa Phước', 40000),
(9, 8, 'Cát Linh', 30000),
(10, 9, 'Hòa Châu', 25000),
(12, 4, 'Bình Thành', 40000),
(13, 10, 'Tây Lộc', 40000),
(14, 11, 'Trà Nóc', 10000),
(15, 11, 'Trà An', 10000),
(16, 12, 'Giai Xuân', 20000),
(17, 12, 'Mỹ Khánh', 20000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_dat_hang`
--
ALTER TABLE `chi_tiet_don_dat_hang`
  ADD PRIMARY KEY (`DDH_MA`,`SACH_MA`),
  ADD KEY `FK_SACH_CTDDH` (`SACH_MA`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`GH_MA`,`SACH_MA`),
  ADD KEY `FK_SACH_CTGH` (`SACH_MA`);

--
-- Chỉ mục cho bảng `chi_tiet_lo_nhap`
--
ALTER TABLE `chi_tiet_lo_nhap`
  ADD PRIMARY KEY (`LN_MA`,`SACH_MA`),
  ADD KEY `FK_SACH_CTLN` (`SACH_MA`);

--
-- Chỉ mục cho bảng `chi_tiet_lo_xuat`
--
ALTER TABLE `chi_tiet_lo_xuat`
  ADD PRIMARY KEY (`LX_MA`,`SACH_MA`),
  ADD KEY `FK_SACH_CTLX` (`SACH_MA`);

--
-- Chỉ mục cho bảng `chi_tiet_trang_thai`
--
ALTER TABLE `chi_tiet_trang_thai`
  ADD PRIMARY KEY (`TT_MA`,`DDH_MA`),
  ADD KEY `FK_DDH_CTTT` (`DDH_MA`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`CV_MA`);

--
-- Chỉ mục cho bảng `co_dia_chi_giao_hang`
--
ALTER TABLE `co_dia_chi_giao_hang`
  ADD PRIMARY KEY (`DCGH_MA`,`KH_MA`),
  ADD KEY `FK_CO_DIA_CHI_GIAO_HANG2` (`KH_MA`);

--
-- Chỉ mục cho bảng `co_tac_gia`
--
ALTER TABLE `co_tac_gia`
  ADD PRIMARY KEY (`SACH_MA`,`TG_MA`),
  ADD KEY `FK_CO_TAC_GIA2` (`TG_MA`);

--
-- Chỉ mục cho bảng `cua_sach`
--
ALTER TABLE `cua_sach`
  ADD PRIMARY KEY (`TLS_MA`,`SACH_MA`),
  ADD KEY `FK_CUA_SACH2` (`SACH_MA`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`DG_MA`),
  ADD KEY `FK_DANH_GIA_SACH` (`SACH_MA`),
  ADD KEY `FK_GUI_DANH_GIA` (`KH_MA`);

--
-- Chỉ mục cho bảng `dia_chi_giao_hang`
--
ALTER TABLE `dia_chi_giao_hang`
  ADD PRIMARY KEY (`DCGH_MA`),
  ADD KEY `FK_THUOC` (`XP_MA`);

--
-- Chỉ mục cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD PRIMARY KEY (`DDH_MA`),
  ADD KEY `FK_CUA` (`DCGH_MA`),
  ADD KEY `FK_THANH_TOAN` (`KH_MA`),
  ADD KEY `FK_THUOC_DON_HANG` (`HTTT_MA`);

--
-- Chỉ mục cho bảng `duoc_quan_ly_boi`
--
ALTER TABLE `duoc_quan_ly_boi`
  ADD PRIMARY KEY (`TT_MA`,`DDH_MA`,`NV_MA`),
  ADD KEY `FK_DUOC_QUAN_LY_BOI2` (`NV_MA`);

--
-- Chỉ mục cho bảng `duoc_xu_ly`
--
ALTER TABLE `duoc_xu_ly`
  ADD PRIMARY KEY (`DDH_MA`,`NV_MA`),
  ADD KEY `FK_DUOC_XU_LY2` (`NV_MA`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`GH_MA`),
  ADD KEY `FK_CO_GIO_HANG2` (`KH_MA`);

--
-- Chỉ mục cho bảng `hinh_anh_sach`
--
ALTER TABLE `hinh_anh_sach`
  ADD PRIMARY KEY (`HAS_MA`),
  ADD KEY `FK_CHUA_HINH_ANH` (`SACH_MA`);

--
-- Chỉ mục cho bảng `hinh_thuc_thanh_toan`
--
ALTER TABLE `hinh_thuc_thanh_toan`
  ADD PRIMARY KEY (`HTTT_MA`);

--
-- Chỉ mục cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  ADD PRIMARY KEY (`HQ_MA`),
  ADD KEY `FK_THUOC_TINH_THANH` (`TTP_MA`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`KH_MA`),
  ADD UNIQUE KEY `KH_SODIENTHOAI` (`KH_SODIENTHOAI`),
  ADD KEY `FK_CO_GIO_HANG` (`GH_MA`);

--
-- Chỉ mục cho bảng `lo_nhap`
--
ALTER TABLE `lo_nhap`
  ADD PRIMARY KEY (`LN_MA`),
  ADD KEY `FK_QUAN_LY_LO_NHAP` (`NV_MA`);

--
-- Chỉ mục cho bảng `lo_xuat`
--
ALTER TABLE `lo_xuat`
  ADD PRIMARY KEY (`LX_MA`),
  ADD KEY `FK_QUAN_LY_LO_XUAT` (`NV_MA`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ngon_ngu`
--
ALTER TABLE `ngon_ngu`
  ADD PRIMARY KEY (`NN_MA`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_MA`),
  ADD KEY `FK_DUOC_DAM_NHIEM_BOI` (`CV_MA`);

--
-- Chỉ mục cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`NXB_MA`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`SACH_MA`),
  ADD KEY `FK_CO_CHUA` (`NN_MA`),
  ADD KEY `FK_DUOC_XUAT_BAN_BOI` (`NXB_MA`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`TG_MA`);

--
-- Chỉ mục cho bảng `the_loai_sach`
--
ALTER TABLE `the_loai_sach`
  ADD PRIMARY KEY (`TLS_MA`);

--
-- Chỉ mục cho bảng `tinh_thanh_pho`
--
ALTER TABLE `tinh_thanh_pho`
  ADD PRIMARY KEY (`TTP_MA`);

--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`TT_MA`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD PRIMARY KEY (`XP_MA`),
  ADD KEY `FK_THUOC_HUYEN_QUAN` (`HQ_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `CV_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `DG_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `dia_chi_giao_hang`
--
ALTER TABLE `dia_chi_giao_hang`
  MODIFY `DCGH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  MODIFY `DDH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `GH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_sach`
--
ALTER TABLE `hinh_anh_sach`
  MODIFY `HAS_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `hinh_thuc_thanh_toan`
--
ALTER TABLE `hinh_thuc_thanh_toan`
  MODIFY `HTTT_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  MODIFY `HQ_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `KH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `lo_nhap`
--
ALTER TABLE `lo_nhap`
  MODIFY `LN_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lo_xuat`
--
ALTER TABLE `lo_xuat`
  MODIFY `LX_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ngon_ngu`
--
ALTER TABLE `ngon_ngu`
  MODIFY `NN_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `NV_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  MODIFY `NXB_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `SACH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `TG_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `the_loai_sach`
--
ALTER TABLE `the_loai_sach`
  MODIFY `TLS_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tinh_thanh_pho`
--
ALTER TABLE `tinh_thanh_pho`
  MODIFY `TTP_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `TT_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  MODIFY `XP_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_dat_hang`
--
ALTER TABLE `chi_tiet_don_dat_hang`
  ADD CONSTRAINT `FK_DDH_CTDDH` FOREIGN KEY (`DDH_MA`) REFERENCES `don_dat_hang` (`DDH_MA`),
  ADD CONSTRAINT `FK_SACH_CTDDH` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `FK_GH_CTGH` FOREIGN KEY (`GH_MA`) REFERENCES `gio_hang` (`GH_MA`),
  ADD CONSTRAINT `FK_SACH_CTGH` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `chi_tiet_lo_nhap`
--
ALTER TABLE `chi_tiet_lo_nhap`
  ADD CONSTRAINT `FK_CTLN_LN` FOREIGN KEY (`LN_MA`) REFERENCES `lo_nhap` (`LN_MA`),
  ADD CONSTRAINT `FK_SACH_CTLN` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `chi_tiet_lo_xuat`
--
ALTER TABLE `chi_tiet_lo_xuat`
  ADD CONSTRAINT `FK_LX_CTLX` FOREIGN KEY (`LX_MA`) REFERENCES `lo_xuat` (`LX_MA`),
  ADD CONSTRAINT `FK_SACH_CTLX` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `chi_tiet_trang_thai`
--
ALTER TABLE `chi_tiet_trang_thai`
  ADD CONSTRAINT `FK_DDH_CTTT` FOREIGN KEY (`DDH_MA`) REFERENCES `don_dat_hang` (`DDH_MA`),
  ADD CONSTRAINT `FK_TT_CTTT` FOREIGN KEY (`TT_MA`) REFERENCES `trang_thai` (`TT_MA`);

--
-- Các ràng buộc cho bảng `co_dia_chi_giao_hang`
--
ALTER TABLE `co_dia_chi_giao_hang`
  ADD CONSTRAINT `FK_CO_DIA_CHI_GIAO_HANG` FOREIGN KEY (`DCGH_MA`) REFERENCES `dia_chi_giao_hang` (`DCGH_MA`),
  ADD CONSTRAINT `FK_CO_DIA_CHI_GIAO_HANG2` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`);

--
-- Các ràng buộc cho bảng `co_tac_gia`
--
ALTER TABLE `co_tac_gia`
  ADD CONSTRAINT `FK_CO_TAC_GIA` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`),
  ADD CONSTRAINT `FK_CO_TAC_GIA2` FOREIGN KEY (`TG_MA`) REFERENCES `tac_gia` (`TG_MA`);

--
-- Các ràng buộc cho bảng `cua_sach`
--
ALTER TABLE `cua_sach`
  ADD CONSTRAINT `FK_CUA_SACH` FOREIGN KEY (`TLS_MA`) REFERENCES `the_loai_sach` (`TLS_MA`),
  ADD CONSTRAINT `FK_CUA_SACH2` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `FK_DANH_GIA_SACH` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`),
  ADD CONSTRAINT `FK_GUI_DANH_GIA` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`);

--
-- Các ràng buộc cho bảng `dia_chi_giao_hang`
--
ALTER TABLE `dia_chi_giao_hang`
  ADD CONSTRAINT `FK_THUOC` FOREIGN KEY (`XP_MA`) REFERENCES `xa_phuong` (`XP_MA`);

--
-- Các ràng buộc cho bảng `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT `FK_CUA` FOREIGN KEY (`DCGH_MA`) REFERENCES `dia_chi_giao_hang` (`DCGH_MA`),
  ADD CONSTRAINT `FK_THANH_TOAN` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`),
  ADD CONSTRAINT `FK_THUOC_DON_HANG` FOREIGN KEY (`HTTT_MA`) REFERENCES `hinh_thuc_thanh_toan` (`HTTT_MA`);

--
-- Các ràng buộc cho bảng `duoc_quan_ly_boi`
--
ALTER TABLE `duoc_quan_ly_boi`
  ADD CONSTRAINT `FK_DUOC_QUAN_LY_BOI` FOREIGN KEY (`TT_MA`,`DDH_MA`) REFERENCES `chi_tiet_trang_thai` (`TT_MA`, `DDH_MA`),
  ADD CONSTRAINT `FK_DUOC_QUAN_LY_BOI2` FOREIGN KEY (`NV_MA`) REFERENCES `nhanvien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `duoc_xu_ly`
--
ALTER TABLE `duoc_xu_ly`
  ADD CONSTRAINT `FK_DUOC_XU_LY` FOREIGN KEY (`DDH_MA`) REFERENCES `don_dat_hang` (`DDH_MA`),
  ADD CONSTRAINT `FK_DUOC_XU_LY2` FOREIGN KEY (`NV_MA`) REFERENCES `nhanvien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `FK_CO_GIO_HANG2` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`);

--
-- Các ràng buộc cho bảng `hinh_anh_sach`
--
ALTER TABLE `hinh_anh_sach`
  ADD CONSTRAINT `FK_CHUA_HINH_ANH` FOREIGN KEY (`SACH_MA`) REFERENCES `sach` (`SACH_MA`);

--
-- Các ràng buộc cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  ADD CONSTRAINT `FK_THUOC_TINH_THANH` FOREIGN KEY (`TTP_MA`) REFERENCES `tinh_thanh_pho` (`TTP_MA`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `FK_CO_GIO_HANG` FOREIGN KEY (`GH_MA`) REFERENCES `gio_hang` (`GH_MA`);

--
-- Các ràng buộc cho bảng `lo_nhap`
--
ALTER TABLE `lo_nhap`
  ADD CONSTRAINT `FK_QUAN_LY_LO_NHAP` FOREIGN KEY (`NV_MA`) REFERENCES `nhanvien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `lo_xuat`
--
ALTER TABLE `lo_xuat`
  ADD CONSTRAINT `FK_QUAN_LY_LO_XUAT` FOREIGN KEY (`NV_MA`) REFERENCES `nhanvien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_DUOC_DAM_NHIEM_BOI` FOREIGN KEY (`CV_MA`) REFERENCES `chuc_vu` (`CV_MA`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `FK_CO_CHUA` FOREIGN KEY (`NN_MA`) REFERENCES `ngon_ngu` (`NN_MA`),
  ADD CONSTRAINT `FK_DUOC_XUAT_BAN_BOI` FOREIGN KEY (`NXB_MA`) REFERENCES `nha_xuat_ban` (`NXB_MA`);

--
-- Các ràng buộc cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD CONSTRAINT `FK_THUOC_HUYEN_QUAN` FOREIGN KEY (`HQ_MA`) REFERENCES `huyen_quan` (`HQ_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
