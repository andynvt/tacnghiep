-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2018 lúc 07:35 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `preschool`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `emp_id`, `per_id`) VALUES
('admin', 'admin', 1, 0),
('user1', 'user', 6, 1),
('user2', 'user', 22, 2),
('user3', 'user', 3, 3),
('user4', 'user', 4, 4),
('user5', 'user', 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `year` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `grade_id`, `year`) VALUES
(1, 'F1', 1, '2018-2019'),
(2, 'S2', 2, '2018-2019'),
(3, 'M1', 3, '2018-2019'),
(4, 'C1', 4, '2018-2019'),
(5, 'L1', 5, '2018-2019'),
(6, 'F2', 1, '2017-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_change_log`
--

CREATE TABLE `class_change_log` (
  `id_log` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `new_class_id` int(11) NOT NULL,
  `old_class_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `change_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_employee`
--

CREATE TABLE `class_employee` (
  `assign_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_employee`
--

INSERT INTO `class_employee` (`assign_id`, `class_id`, `emp_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 2, 2),
(4, 2, 7),
(5, 3, 3),
(6, 3, 8),
(7, 4, 4),
(8, 4, 9),
(9, 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_student`
--

CREATE TABLE `class_student` (
  `class_student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_student`
--

INSERT INTO `class_student` (`class_student_id`, `class_id`, `student_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Ban Giám Hiệu'),
(2, 'Ke Toan'),
(3, 'Lop 15-24'),
(4, 'Lop 25-36'),
(5, 'Lop Mam'),
(6, 'Lop Choi'),
(7, 'Lop La');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department_employee`
--

CREATE TABLE `department_employee` (
  `dep_emp_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department_employee`
--

INSERT INTO `department_employee` (`dep_emp_id`, `dep_id`, `emp_id`, `job_id`) VALUES
(1, 1, 22, 1),
(2, 2, 17, 2),
(3, 3, 20, 5),
(4, 4, 15, 5),
(5, 4, 16, 5),
(6, 6, 14, 5),
(7, 7, 21, 5),
(8, 3, 7, 6),
(9, 3, 8, 6),
(10, 7, 9, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `doi` date NOT NULL,
  `hometown` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `current_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `dob`, `gender`, `id_card`, `doi`, `hometown`, `address`, `current_address`, `phone`) VALUES
(1, 'Admin', '1996-01-01', 'Nam', '123456789', '2018-01-01', 'Can Tho', 'Can Tho', 'Can Tho', '0121456789'),
(2, 'Nguyễn Văn An', '1996-01-01', 'Nam', '164102161', '2014-11-11', 'Can Tho', 'Can Tho', 'Can Tho', '0987874578'),
(3, 'Trần Nguyễn Văn Thanh', '1996-11-15', 'Nam', '756418975', '2014-11-25', 'Can Tho', 'Can Tho', 'Can Tho', '0917547847'),
(4, 'Trần Thị Bé', '1996-08-09', 'Nữ', '365424587', '2014-11-30', 'Can Tho', 'Can Tho', 'Can Tho', '0913785478'),
(5, 'Trương Ngọc Ngân', '1993-11-15', 'Nữ', '542888777', '2014-01-30', 'Can Tho', 'Can Tho', 'Can Tho', '0122255455'),
(6, 'Trương Văn Thành', '1993-12-19', 'Nam', '362455785', '2014-01-30', 'Can Tho', 'Can Tho', 'Can Tho', '012234578'),
(7, 'Lê Thanh An', '1994-05-01', 'Nam', '362457857', '2011-05-11', 'Can Tho', 'Can Tho', 'Can Tho', '01214353574'),
(8, 'Hồ Nguyễn Đại Dương', '1994-09-01', 'Nam', '368757487', '2011-05-11', 'Can Tho', 'Can Tho', 'Can Tho', '01214353587'),
(9, 'Trần Văn Thanh', '1996-10-30', 'Nam', '245788787', '2011-02-08', 'Can Tho', 'Can Tho', 'Can Tho', '01214363647'),
(10, 'Ngô Thiên Ân', '1994-02-05', 'Nữ', '951235427', '2011-02-08', 'Can Tho', 'Can Tho', 'Can Tho', '0121553434'),
(11, 'Vương Thị Lành', '1995-06-09', 'Nữ', '875792459', '2015-04-07', 'Can Tho', 'Can Tho', 'Can Tho', '01214353545'),
(12, 'Nguyễn Văn Quang', '1998-02-09', 'Nam', '114757879', '2013-04-08', 'Can Tho', 'Can Tho', 'Can Tho', '01214353564'),
(13, 'Nguyễn Quang Bảo', '1997-09-02', 'Nam', '574527678', '2013-12-12', 'Can Tho', 'Can Tho', 'Can Tho', '01214353578'),
(14, 'Nguyen Van Tai', '1996-01-01', 'Nam', '363931345', '2014-02-02', 'Soc Trang', 'Can Tho', 'Can Tho', '0123400722'),
(15, 'Nguyen Van Hiep', '1996-07-01', 'Nam', '363931360', '2014-03-03', 'Ca Mau', 'Can Tho', 'Can Tho', '0123400757'),
(16, 'Nguyen Hoai Chung', '1996-03-03', 'Nam', '363931321', '2014-04-04', 'Kien Giang', 'Can Tho', 'Can Tho', '0123400746'),
(17, 'Dang Minh Nhut', '1994-05-05', 'Nam', '363931333', '2014-07-07', 'Ben Tre', 'Can Tho', 'Can Tho', '0123400777'),
(18, 'Vo Nguyen Dai Phuc', '1994-06-05', 'Nam', '363931360', '2014-02-02', 'Hau Giang', 'Can Tho', 'Can Tho', '0123400784'),
(19, 'Vo Hoai Phong', '1996-04-01', 'Nam', '363931550', '2014-08-03', 'Kien Giang', 'Can Tho', 'Can Tho', '0123400782'),
(20, 'Huynh Khac Duy', '1996-09-03', 'Nam', '363934441', '2014-08-04', 'Kien Giang', 'Can Tho', 'Can Tho', '0123400748'),
(21, 'Pham Ngoc Long Phi', '1996-09-05', 'Nam', '363931388', '2014-08-07', 'Ben Tre', 'Can Tho', 'Can Tho', '0123400781'),
(22, 'Kieu Nhut Truong', '1996-10-05', 'Nam', '363931300', '2014-08-02', 'Can Tho', 'Can Tho', 'Can Tho', '0123400755');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`) VALUES
(1, '15-24'),
(2, '25-36'),
(3, 'Lớp Mầm'),
(4, 'Lớp Chồi'),
(5, 'Lớp Lá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `in_audit`
--

CREATE TABLE `in_audit` (
  `ia_id` int(11) NOT NULL,
  `ia_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `date` date NOT NULL,
  `payer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `in_audit`
--

INSERT INTO `in_audit` (`ia_id`, `ia_desc`, `money`, `date`, `payer`, `emp_id`) VALUES
(1, 'Hoc Phi', 200000, '2018-02-13', 'Nguyễn Hoài Chung', 1),
(2, 'Phí bảo trì cơ sở vật chất', 400000, '2018-02-13', 'Võ Hoài Phong', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1, 'Hieu Truong'),
(2, 'Truong Phong Ke Toan'),
(3, 'Kiem Toan Vien'),
(4, 'To Truong'),
(5, 'Giao Vien'),
(6, 'Bao Mau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `out_audit`
--

CREATE TABLE `out_audit` (
  `oa_id` int(11) NOT NULL,
  `oa_desc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `out_audit`
--

INSERT INTO `out_audit` (`oa_id`, `oa_desc`, `money`, `date`, `emp_id`) VALUES
(1, 'Sua chua ban ghe', 500000, '2018-03-14', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`per_id`, `per_name`, `description`) VALUES
(0, 'Admin', 'Admin'),
(1, 'Ban Giam Hieu', 'Ban Giam Hieu'),
(2, 'To Truong', 'To Truong Cac To'),
(3, 'Kiem Toan', 'Bo Phan Kiem Toan'),
(4, 'Giao Vien', 'Bo phan giang day'),
(5, 'Bao Mau', 'Bo phan cham soc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score_time` date NOT NULL,
  `score` tinyint(1) NOT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `current_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `father_job` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mother_job` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `dob`, `gender`, `hometown`, `address`, `current_address`, `father_name`, `father_job`, `father_phone`, `mother_name`, `mother_job`, `mother_phone`) VALUES
(1, 'Nguyen Van A', '2016-01-01', 'Nam', 'Can Tho', 'Can Tho', 'Can Tho', 'Nguyen Van AA', 'Ship', '0987654321', 'Tran Thi BB', 'Ban Cafe', '0987654322'),
(2, 'Nguyen Van B', '2016-02-02', 'Nữ', 'Can Tho', 'Can Tho', 'Can Tho', 'Nguyen Van BB', 'Ship', '0987654351', 'Tran Thi AA', 'Ban Cafe', '0987654325'),
(3, 'Nguyen Van C', '2016-03-03', 'Nam', 'Can Tho', 'Can Tho', 'Can Tho', 'Nguyen Van CC', 'Ship', '0987654371', 'Tran Thi CC', 'Ban Cafe', '0987654327'),
(4, 'Nguyen Van D', '2016-04-04', 'Nữ', 'Can Tho', 'Can Tho', 'Can Tho', 'Nguyen Van DD', 'Ship', '0987654331', 'Tran Thi DD', 'Ban Cafe', '0987654329'),
(5, 'Nguyen Van E', '2016-05-05', 'Nam', 'Can Tho', 'Can Tho', 'Can Tho', 'Nguyen Van EE', 'Ship', '0987654301', 'Tran Thi EE', 'Ban Cafe', '0987654321');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_grade` (`grade_id`);

--
-- Chỉ mục cho bảng `class_change_log`
--
ALTER TABLE `class_change_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `new_class_id` (`new_class_id`),
  ADD KEY `old_class_id` (`old_class_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `class_employee`
--
ALTER TABLE `class_employee`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`class_student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_student_ibfk_1` (`class_id`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Chỉ mục cho bảng `department_employee`
--
ALTER TABLE `department_employee`
  ADD PRIMARY KEY (`dep_emp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `department_employee_ibfk_2` (`dep_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Chỉ mục cho bảng `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Chỉ mục cho bảng `in_audit`
--
ALTER TABLE `in_audit`
  ADD PRIMARY KEY (`ia_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Chỉ mục cho bảng `out_audit`
--
ALTER TABLE `out_audit`
  ADD PRIMARY KEY (`oa_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Chỉ mục cho bảng `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class` (`class_id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class_change_log`
--
ALTER TABLE `class_change_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `class_employee`
--
ALTER TABLE `class_employee`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `class_student`
--
ALTER TABLE `class_student`
  MODIFY `class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `department_employee`
--
ALTER TABLE `department_employee`
  MODIFY `dep_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `in_audit`
--
ALTER TABLE `in_audit`
  MODIFY `ia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `out_audit`
--
ALTER TABLE `out_audit`
  MODIFY `oa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `permission` (`per_id`);

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_grade` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`);

--
-- Các ràng buộc cho bảng `class_change_log`
--
ALTER TABLE `class_change_log`
  ADD CONSTRAINT `class_change_log_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `class_change_log_ibfk_2` FOREIGN KEY (`new_class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_change_log_ibfk_3` FOREIGN KEY (`old_class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_change_log_ibfk_4` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Các ràng buộc cho bảng `class_employee`
--
ALTER TABLE `class_employee`
  ADD CONSTRAINT `class_employee_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_employee_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Các ràng buộc cho bảng `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Các ràng buộc cho bảng `department_employee`
--
ALTER TABLE `department_employee`
  ADD CONSTRAINT `department_employee_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `department_employee_ibfk_2` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`),
  ADD CONSTRAINT `department_employee_ibfk_3` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Các ràng buộc cho bảng `in_audit`
--
ALTER TABLE `in_audit`
  ADD CONSTRAINT `in_audit_ibfk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Các ràng buộc cho bảng `out_audit`
--
ALTER TABLE `out_audit`
  ADD CONSTRAINT `out_audit_ibfk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
