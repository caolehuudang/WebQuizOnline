-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 02:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT '1',
  `messenger` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_member`, `id_admin`, `messenger`, `image`, `name`, `time`, `status`) VALUES
(3, 6, 1, 'Đồ đáng ghét', 'admin.jpg', 'Tú Tú', '07:18:13pm', 0),
(30, 6, 1, 'tao ghét mày', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(31, 6, 1, 'chắc chưa', 'admin.jpg', 'Tú Tú', '07:18:13pm', 0),
(32, 6, 1, 'xí', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(33, 8, 1, 'ê', 'logo.jpg', 'Cao Đẳng', '07:18:13pm', 0),
(34, 8, 1, 'gì 3', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(35, 8, 1, 'mai có đi học không', 'logo.jpg', 'Cao Đẳng', '07:18:13pm', 0),
(36, 8, 1, 'mai nghĩ', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(37, 8, 1, 'ờ vậy thôi', 'logo.jpg', 'Cao Đẳng', '07:18:13pm', 0),
(38, 5, 1, 'anh ơi', 'Facebook.png', 'Bé Mèo', '07:18:13pm', 0),
(39, 5, 1, 'gì bà nội', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(41, 8, 1, ':)', 'logo1.jpg', 'Hữu Đẳng', '07:18:13pm', 0),
(43, 6, 1, 'mệt qué', 'admin.jpg', 'Tú Tú', '07:20:38pm', 0),
(44, 6, 1, 'thôi đi ngủ', 'logo1.jpg', 'Hữu Đẳng', '07:21:55pm', 0),
(49, 6, 1, 'ừ', 'admin.jpg', 'Tú Tú', '12:03:14pm', 0),
(52, 6, 1, 'muốn gì nói luôn', 'admin.jpg', 'Tú Tú', '12:14:11pm', 0),
(53, 6, 1, 'mệt quá man', 'logo1.jpg', 'Hữu Đẳng', '12:16:25pm', 0),
(54, 6, 1, 'đánh lộn không', 'logo1.jpg', 'Hữu Đẳng', '12:16:58pm', 0),
(57, 6, 1, 'làm bài tới đâu rồi', 'admin.jpg', 'Tú Tú', '12:01:19am', 0),
(58, 6, 1, 'Gần xong rồi', 'logo1.jpg', 'Hữu Đẳng', '12:04:59am', 0),
(59, 6, 1, 'Ờ tui làm cũng gần xong rồi', 'admin.jpg', 'Tú Tú', '12:06:21am', 0),
(60, 6, 1, 'tui còn cái dụ chat box :(', 'logo1.jpg', 'Hữu Đẳng', '12:06:44am', 0),
(61, 6, 1, 'xong òi', 'admin.jpg', 'Tú Tú', '12:15:50am', 0),
(62, 6, 1, 'có bug rồi', 'admin.jpg', 'Tú Tú', '12:34:33am', 0),
(68, 6, 1, 'sửa được chưa', 'logo1.jpg', 'Hữu Đẳng', '12:39:53am', 0),
(69, 6, 1, 'vẫn chưa', 'admin.jpg', 'Tú Tú', '12:40:05am', 0),
(70, 6, 1, 'xong òi nè', 'logo1.jpg', 'Hữu Đẳng', '03:41:07pm', 0),
(71, 6, 1, 'search tao với', 'admin.jpg', 'Tú Tú', '03:41:53pm', 1),
(72, 11, 1, '2222222222', 'Facebook.png', 'Tú Nguyễn', '10:18:44am', 0),
(73, 11, 1, 'gì bạn ?', 'logo1.jpg', 'Hữu Đẳng', '10:19:15am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_registration`
--

CREATE TABLE `exam_registration` (
  `id_member` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_registration`
--

INSERT INTO `exam_registration` (`id_member`, `id_subject`) VALUES
(1, 3),
(2, 3),
(2, 4),
(6, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opinion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `evaluate` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject_name`, `opinion`, `evaluate`) VALUES
(1, 'Nhi nhi', 'caolehuudangga@gmail.com', 'Lập trình Reactjs', 'Hài Lòng', 'Cần thêm nhiều câu hỏi'),
(2, 'Tú Tú', 'caolehuudangga@gmail.com', 'Lập trình Reactjs', 'Rất Hài Lòng', 'Đề khá hay'),
(3, 'Tú Tú', 'caolehuudangga@gmail.com', 'Lập Trình Web', 'Hài Lòng', 'Chúc hệ thống ngày càng phát triển'),
(4, 'Phúc', 'phucphuc1297@gmail.com', 'Lập Trình Web', 'Hài Lòng', 'Câu hỏi khá đa dạng');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `score` double NOT NULL,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_member`, `score`, `subject_name`) VALUES
(33, 1, 10, 'Lập trình Reactjs'),
(34, 6, 9, 'Phương Pháp Tính'),
(35, 1, 5, 'Phương Pháp Tính'),
(36, 8, 4, 'Lập trình Reactjs'),
(37, 12, 10, 'Lập Trình Web');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `role`, `name`, `email`) VALUES
(1, 'admin', '$2y$10$UwWLspEjRaNjHuFJgecCK.0rDCew1M5a6OV2mKMiFDdJFYM5A.uY2', 'ADMIN', 'Hữu Đẳng', 'caolehuudangga@gmail.com'),
(2, 'dang', '$2y$10$/7Zwmff.A8wRyQU3GNzz6O3sT1SNUrQwBrjqBIE2cwNuZVN7lVArS', 'ADMIN', 'Đẳng Gà', 'caolehuudangga@gmail.com'),
(5, 'meomeo', '$2y$10$0lH6hGbwQlo8bO9FZpRuCOXJtOtzT0OS9oWuD5vaqcEI6bYXY/4Eu', 'USER', 'Bé Mèo', 'caolehuudangga@gmail.com'),
(6, 'tutu', '$2y$10$5iACgl.bxnq6V0Ej.gq8se98k0EeJUQK97vjmuG18vkQkneWiw/fm', 'EMPLOYEE', 'Tú Tú', 'caolehuudangga@gmail.com'),
(7, 'meokhung', '$2y$10$HDXeQ8mv272S0G0qKM/JceBoZ5YqFdr9MsQt1vgJB.VCyAHgonp8W', 'USER', 'Mèo Meo', 'caolehuudangga@gmail.com'),
(8, 'huudang', '$2y$10$MkMVYQPq1c4IGfDFHPSFFOerqQR3blbn1zd2JASMgQFeA5CG77OOW', 'EMPLOYEE', 'Cao Đẳng', 'caolehuudangga@gmail.com'),
(11, 'username', '$2y$10$42Pf7wZfGucb0d/JLTKVY.s0WliIdO4pXWeQNzETWe1SYKr3G/bC6', 'USER', 'Tú Nguyễn', 'caolehuudangga@gmail.com'),
(12, 'thienphuc', '$2y$10$4gCW1esjQsSlI4jojP3U9e0N0MqnGwCmtZwLdm0R2aYkQRjxW2bii', 'USER', 'Phúc', 'phucphuc1297@gmail.com'),
(13, 'thienphuc1', '$2y$10$XG4HEbfVijG0kX/CRALyp.brhCDMZlsel0KgizO4PDs7ngfNImkZy', 'EMPLOYEE', 'Thiên Phúc', 'phucphuc1297@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `member_subject`
--

CREATE TABLE `member_subject` (
  `id_member` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_subject`
--

INSERT INTO `member_subject` (`id_member`, `id_subject`, `checked`) VALUES
(1, 1, 0),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(5, 1, 1),
(5, 2, 1),
(6, 1, 0),
(6, 2, 1),
(6, 4, 1),
(6, 5, 1),
(8, 3, 1),
(8, 4, 0),
(11, 2, 1),
(12, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `days` date NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject_name`, `description`, `days`, `time`, `image`, `id_subject`) VALUES
(3, 'Phương Pháp Tính', 'Nhớ mang theo tài liệu', '2018-12-20', '10:30', 'quiz3.png', 1),
(5, 'Lập trình Reactjs', 'Hỏi về các thành phần trong Reactjs', '2018-12-20', '10:30', 'reactjs2.jpg', 4),
(7, 'Lập Trình Web', 'HTML,CSS,JS,PHP', '2018-12-19', '10:30', 'web.jpg', 2),
(8, 'Cơ Sỡ Dữ Liệu', 'Tập trung hỏi về các câu lệnh truy vấn', '2018-12-22', '10:30', 'sql.jpg', 3),
(9, 'Mạng Máy Tính', 'Hỏi Về các khái niệm cơ bản', '2018-12-20', '10:30', 'mmt.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `image`, `description`, `id_member`) VALUES
(1, 'logo1.jpg', 'Đẳng đáng iu quá à\r\n', 1),
(2, 'Facebook.png', ' Quá khùng', 5),
(3, 'logo1.jpg', ' dasdasda', 2),
(5, 'admin.jpg', 'Quá Đáng iu', 6),
(6, 'logo.jpg', ' Quá nhìu bug\r\n', 8),
(7, 'Facebook.png', ' Phúc đẹp trai \r\n', 11),
(8, 'Facebook.png', '', 12),
(9, 'Facebook.png', ' Tao là Employee :))', 13);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ans1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ans2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ans3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ans4` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ans` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `name`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `id_subject`) VALUES
(1, 'Ai là người phụ trách dạy môn Phương Pháp Tính ?', 'Thầy Cường', 'Thầy Mạnh', 'Thầy Tín', 'Thầy Vĩnh', '4', 1),
(6, 'Reactjs là framework hay Thư viện', 'Framework', 'Thư Viện', 'Cả 2 đều đúng', 'Cả 2 đều sai', '2', 4),
(7, 'Linh hồn của React là', 'Props', 'State', 'Component', 'Tất cả đều đúng', '3', 4),
(8, 'Reactjs là của ?', 'Facebook', 'Google', 'TDTU', 'Linux', '1', 4),
(9, 'Reactjs ứng dụng để ?', 'Tạo trang Web Single Page Application ', 'Tạo trang Web thông thường', 'Cả 2 đều đúng', 'Cà 2 đề sai', '1', 4),
(10, 'Sự khác nhau giữa Props và State', 'Props là trạng thái , State là thuộc tính', 'Props chỉ tồn tại trong Component', 'State hoàn toàn giống Props', 'Props là thuộc tính , State là trạng thái', '4', 4),
(11, 'JSX viết tắt của ? ', 'JavaScript', 'Javascript Syntax Extension', 'Javascript Syntax XML', 'Javascript XML Extension', '2', 4),
(12, 'Để chuyển trang trong Reactjs ta dùng thẻ ? ', 'a', 'go', 'Link', 'Tất cả đều đúng', '3', 4),
(13, 'Muốn thay đổi State trong Reactjs tao dùng hàm ? ', 'this.newState();', 'this.getState();', 'this.props.state();', 'this.setState()', '4', 4),
(14, 'e.preventDefault(); có tác dụng gì', 'Ngăn chuyển trang ', 'Load lại trang', 'không thực hiện lệnh bên dưới', 'Tất cả đều sai', '1', 4),
(15, 'Có thể viết CSS trong ReactJs ?', 'Không thể', 'Có thể', 'Không có khái niệm Css trong reactjs', 'Tất cả đều sai', '2', 4),
(16, 'Phần mềm để thực hành môn Phương Pháp Tính là ', 'Matlab', 'Netbeans', 'Notepad ++', 'PS', '1', 1),
(17, 'Công Thức CDD là viết tắc của từ ?', 'Center Divided Difference', 'Central Divided Difference', 'Component Divided Difference', 'CPU Divided Difference', '2', 1),
(18, 'dec2bin(23)  = ?', '10111', '10110', '11011', '11111', '1', 1),
(19, ' phương trình f(x) = 0 với f(x) = x ^ 3 - 4, thì nghiệm gần đúng với sai số 0.001 tìm được sẽ là', '1.5000 ', '1.4980 ', '1.499', '10 ', '3', 1),
(20, 'Tìm nghiệm phương trình: 2x + x - 4 = 0 bằng pháp chia đôi', 'x ≈ 1.2', 'x ≈ 1.25', 'x ≈ 1.438', 'x ≈ 1.386', '4', 1),
(21, 'Tìm nghiệm dương nhỏ nhất của phương trình 240 ^x  - 4x = 0  bằng phương pháp tiếp tuyến với độ chính xác 10^-5', 'x= 0,3024', 'x= 0,30991', 'x= 0,3070', 'x= 0,3089', '2', 1),
(22, '2+3 = ?', '5', '6', '4', '3', '1', 1),
(23, '10 - 9 = ?', '2', '3', '1', '9', '3', 1),
(24, ' 5 x 5 = ?', '20', '30', '15', '25', '4', 1),
(25, 'HTML là viết tắt của từ ? ', 'Hyperlinks and Text Markup Language', 'Home Toll Markup Language', 'Hyper Text markup language', 'Tất cả đều sai', '3', 2),
(26, 'Đâu là Tag tạo cỡ chữ lớn nhất', 'heading', 'h1', 'h5', 'b', '2', 2),
(27, 'Đâu là thẻ xuống dòng ? ', 'hr', 'br', 'break', 'a', '2', 2),
(28, 'PHP là ngôn ngử xử lý ở phía ?', 'Server', 'Client', 'Cả 2 đều đúng', 'Cà 2 đề sai', '1', 2),
(29, 'Để khai báo biến có kiểu dữ liệu là int trong PHP ta dùng', 'int a;', 'var a;', '$ a;', '$a;', '4', 2),
(30, 'Dòng lệnh \"background-color: blue;\" để làm gì ', 'Định dạng chữ có màu blue', 'Không hiển thị', 'background và chữ có màu blue', 'background có màu blue', '4', 2),
(31, 'Trong JavaScript kết quả phép toán \"22\" - \"2\" =?', '20', '222', '2', 'báo lỗi ', '1', 2),
(32, 'Câu lệnh \"echo\" cho PHP dùng để làm gì ?', 'Vòng lặp', 'điều kiện', 'in ra màng hình', 'không tồn tại', '3', 2),
(33, 'Có thể viết CSS trong file .php?', 'Có', 'Không', 'Cả 2 đều đúng', 'Cả 2 đều sai', '1', 2),
(34, 'Cho var cars = [\"Saab\", \"Volvo\", \"BMW\"]; document.getElementById(\"demo\").innerHTML = cars[1] ?', 'Saab', 'BMW', 'Volvo', 'undefined', '3', 2),
(35, 'Để thêm dữ liệu vào bảng ta dùng câu lệnh ?', '\"select\"', '\"insert\"', '\"update\"', '\"create\"', '2', 3),
(36, 'Để chỉnh sửa dữ liệu trong bảng ta dùng lệnh ?', '\"Update\"', '\"Insert\"', '\"Select\"', '\"Drop\"', '1', 3),
(37, 'Để xóa dữ liệu trong bảng ta dùng câu lệnh ?', '\"Update\"', '\"Insert\"', '\"Delete\"', '\"Drop\"', '3', 3),
(38, 'SQL là viết tắt của ? ', 'Strong Question Language ', 'Structured Question Language ', 'Structured Query Language', 'Strong Query Language', '3', 3),
(39, 'Cú pháp SQL nào được dùng để trả về những giá trị khác nhau ?', '\"SELECT UNIQUE\"', '\"SELECT INDENTITY\" ', '\"SELECT DIFFERNT\"', '\"SELECT DISTINCT\"', '4', 3),
(40, 'ERD là viết tắt của từ ?', 'Entity Relax Diagram', 'Entity Relationship Diagram', 'Entity Role Diagram', 'Entity Relationship Database', '2', 3),
(41, 'Đâu là mối quan hệ bắt cầu ?', 'X => Y, Y => Z thì X => C  ', 'X => Y, Z => Y thì X => Z  ', 'X => Z, Y => Z thì X => Y ', 'X => Y, Y => Z thì X => Z  ', '4', 3),
(42, 'Trình tự thực hiện các câu lệnh trong SQL Server?', 'From - where - order by - select', 'Select - from - where - order by ', 'Where - select - from - order by', 'Select - from - order by - where', '1', 3),
(43, 'Hàm Count() trong SQL dùng để ?', 'Đếm số dòng', 'Đếm số cột', 'Tính trung bình', 'Tất cả đều sai', '1', 3),
(44, 'Thực thể yếu là ? ', 'Thực thể không tồn tại', 'Lá Khóa chính', 'Thực thể có khả năng định danh', 'Thực thể không có khả năng định danh', '4', 3),
(45, 'Trong các mô hình sau, mô hình mạng nào được dùng phổ biến hiện nay ?', 'Peer - To - Peer', 'Remote Access', 'Terminal - Mainframe', 'Client - Server', '4', 5),
(46, 'Dịch vụ mạng DNS dùng để ', 'Cấp địa chỉ cho các máy trạm ', 'Phân giải tên và địa chỉ ', 'Truyền file và dữ liệu', 'Gửi thư điện tử', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(11) NOT NULL,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject_name`, `description`) VALUES
(1, 'Phương Pháp Tính', 'Các phương pháp tính đạo hàm, tích phân'),
(2, 'Lập Trình Web', 'Học HTML, CSS, JS'),
(3, 'Cơ Sỡ Dữ Liệu', 'Học các truy vấn Sql'),
(4, 'Lập trình Reactjs', 'Khóa học Front-end '),
(5, 'Mạng Máy Tính', 'Bài thi sẽ hỏi về các mô hình, các khái niệm cơ bản ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`,`id_member`,`id_admin`),
  ADD KEY `fk_chat_member` (`id_member`);

--
-- Indexes for table `exam_registration`
--
ALTER TABLE `exam_registration`
  ADD PRIMARY KEY (`id_member`,`id_subject`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `fk_HISTORY_MEMBER` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `member_subject`
--
ALTER TABLE `member_subject`
  ADD PRIMARY KEY (`id_member`,`id_subject`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `FK_profile_member` (`id_member`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_group` (`id_subject`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_HISTORY_MEMBER` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `member_subject`
--
ALTER TABLE `member_subject`
  ADD CONSTRAINT `member_subject_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_subject_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
