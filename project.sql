-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2020 lúc 03:08 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `a`
--

CREATE TABLE `a` (
  `id` int(20) NOT NULL,
  `b` varchar(20) NOT NULL,
  `d` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `a`
--

INSERT INTO `a` (`id`, `b`, `d`) VALUES
(1, 'dsfzdfg', '2020-06-18 05:57:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_info`
--

CREATE TABLE `admin_info` (
  `id_admin` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_info`
--

INSERT INTO `admin_info` (`id_admin`, `email`, `UserName`, `Password`) VALUES
(1, 'quang.lx@gmail.com', 'quanglx', '123456'),
(2, 'abc@gmail.com', 'abc', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `Id_category` int(20) NOT NULL,
  `Name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`Id_category`, `Name_category`) VALUES
(1, 'Javascript'),
(2, 'Font-End'),
(3, 'Back-End');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `Id_course` int(20) NOT NULL,
  `Name_course` varchar(100) NOT NULL,
  `Id_Categories` int(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`Id_course`, `Name_course`, `Id_Categories`, `Description`, `Image`) VALUES
(34, 'Vanilla Javascript', 1, 'VanillaJS là một cái tên để chỉ việc sử dụng Javascript thông thường mà không dùng bất cứ thư viện phụ trợ nào như jQuery. Mọi người dùng tên này như một lời đùa cợt để nhắc các lập trình viên khác rằ', 'Vanilla Javascriptvanilla.png'),
(35, 'ReactJS', 2, 'React là thư viện JavaScript phổ biến nhất để xây dựng giao diện người dùng (UI). Nó cho tốc độ phản hồi tuyệt vời khi user nhập liệu bằng cách sử dụng phương pháp mới để render', 'ReactJSreact.png'),
(36, 'NodeJS', 3, 'Nodejs là một nền tảng (Platform) phát triển độc lập được xây dựng ở trên Javascript Runtime của Chrome mà chúng ta có thể xây dựng được các ứng dụng mạng một cách nhanh chóng và dễ dàng mở rộng ', 'NodeJSnode.jpg'),
(37, 'Jquery', 1, 'JQuery thư viện JavaScript đa trình duyệt được thiết kế để đơn giản hóa lập trình phía máy người dùng của HTML, phát hành vào tháng 1 năm 2006 tại BarCamp NYC bởi John Resig. Được sử dụng bởi hơn 52% ', 'Jqueryjquery.jpg'),
(38, 'Angular', 2, 'AngularJS là một web framework JavaScript được phát triển và tài trợ bởi Google và cộng đồng để giải quyết các vấn đề gặp phải trong việc phát triển ứng dụng đơn trang. Ngoài ra, AngularJs còn có các ', 'AngularAngularJS.jpg'),
(39, 'Golang', 3, 'Go là một ngôn ngữ lập trình mới do Google thiết kế và phát triển. Nó được kỳ vọng sẽ giúp ngành công nghiệp phần mềm khai thác nền tảng đa lõi của bộ vi xử lý và hoạt động đa nhiệm tốt hơn.', 'Denogolang.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_ofuser`
--

CREATE TABLE `course_ofuser` (
  `id` int(20) NOT NULL,
  `id_course` int(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course_ofuser`
--

INSERT INTO `course_ofuser` (`id`, `id_course`, `id_user`) VALUES
(8, 37, 20),
(9, 34, 20),
(10, 36, 20),
(11, 38, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `User_id` int(12) NOT NULL,
  `Email_id` varchar(40) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`User_id`, `Email_id`, `UserName`, `Password`) VALUES
(20, 'admin@gmail.com', 'test', '1'),
(23, 'son.buingoc@gmail.com', 'chess', '123'),
(26, 'quang.lun@gmail.com', 'quang.lx', '123456'),
(27, 'abd@gmail.com', 'quang', '12345'),
(28, 'polaris@gmail.com', 'Polaris', '123456'),
(29, 'anh@gmail.com', 't.anh', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `Id_video` int(50) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Id_Course` int(20) NOT NULL,
  `Src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`Id_video`, `Title`, `Id_Course`, `Src`) VALUES
(7, 'Golang for beginner', 39, '391.mp4'),
(8, 'Lesson 1 Golang', 39, '392.mp4'),
(9, 'Lesson 2 Golang', 39, '393.mp4'),
(10, 'Vanilla Javascript for beginner', 34, '344.mp4'),
(11, 'Lesson 1 Vanilla', 34, '345.mp4'),
(12, 'Lesson 3 Vanilla', 34, '346.mp4'),
(13, 'React for beginner', 35, '351.mp4'),
(14, 'Lesson 1 React', 35, '352.mp4'),
(15, 'Lesson 2 React', 35, '353.mp4'),
(16, 'Node for beginner', 36, '364.mp4'),
(17, 'Lesson 1 Node', 36, '365.mp4'),
(18, 'Lesson 2 Node', 36, '366.mp4'),
(19, 'Angular for beginner', 38, '382.mp4'),
(20, 'Lesson 1 Angular', 38, '384.mp4'),
(21, 'Lesson 2 Angular', 38, '386.mp4'),
(22, 'Jquery for beginner', 37, '371.mp4'),
(23, 'Lesson 1 Jquery', 37, '373.mp4'),
(24, 'Lesson 2 Jquery', 37, '375.mp4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `votes`
--

CREATE TABLE `votes` (
  `id_vote` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `id_course` int(20) NOT NULL,
  `vote` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `votes`
--

INSERT INTO `votes` (`id_vote`, `id_user`, `comment`, `id_course`, `vote`, `date`) VALUES
(1, 28, '2wertyuioikuyjthrgef', 34, 4, '2020-06-17 13:30:43'),
(13, 20, 'Polarispolaris', 37, 4, '2020-06-18 05:59:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id_category`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id_course`);

--
-- Chỉ mục cho bảng `course_ofuser`
--
ALTER TABLE `course_ofuser`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Id_video`);

--
-- Chỉ mục cho bảng `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id_vote`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `Id_category` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `Id_course` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `course_ofuser`
--
ALTER TABLE `course_ofuser`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `Id_video` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `votes`
--
ALTER TABLE `votes`
  MODIFY `id_vote` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
