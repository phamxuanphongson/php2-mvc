-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2019 at 04:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `images`, `link`) VALUES
(1, 'ads1.jpg', 'https://www.google.com'),
(2, 'ads2.jpg', 'https://www.google.com'),
(3, 'ads3.jpg', 'https://www.google.com'),
(5, 'ads4.jpg', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`) VALUES
(1, 'Thể Thao', 'red'),
(2, 'Chính Trị', 'green'),
(3, 'Hot', 'blue'),
(4, 'Âm nhạc', 'purple'),
(6, 'aaaa', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `guestname` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `guestname`, `comment`, `posts_id`) VALUES
(12, '', 'The thao', 'trtrtt', 48),
(13, '', 'The thao22', '2222', 48),
(14, '', 'Game22', '222222', 48),
(15, '', 'Gamee', 'ddddd', 48),
(16, 'phamxuanphongson', '', 'ddddddd', 46),
(17, '', 'son', 'ok r', 48),
(18, 'phamxuanphongson', '', 'ucucucuucc', 46),
(19, 'phamxuanphongson', '', 'aaaa', 25);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `content` text,
  `images` varchar(255) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `short_desc`, `content`, `images`, `cate_id`, `view`) VALUES
(21, 'Vĩnh Yên - Vĩnh Phúc - edited22', 'ddasd edited22', '2232331 edited', '43701026_1830278893755268_4186715432738095104_o.jpg', 3, 24),
(22, 'aaaaaaaa post 30', '2333', '23313', 'Screenshot from 2019-02-17 11-03-57.png', 1, 15),
(23, 'ccccc', 'ccc21321313', 'casdasdasdasq3e2213', 'Screenshot from 2019-02-17 23-09-33.png', 1, 0),
(24, 'post 123', '321213131321', 'ddddddddddddddddddddddddddddd', 'Screenshot from 2019-02-17 11-03-57.png', 1, 0),
(25, 'Vũ Tông Phan', 'ddddddd', 'eeeeeeeeeeeeeee', 'Screenshot from 2019-02-17 11-03-57.png', 2, 10),
(26, 'khonssfsmksklfkmlf', 'dsdskjklajalmkasda', 'fmkemlmddsmklsdkmldklmdsf', 'Screenshot from 2019-02-17 23-09-33.png', 1, 0),
(27, 'dad;lasl;kasl;asl;ssad', 'dadssadlalklddas', 'dadaklmamklsaklmadsklmadas', 'Screenshot from 2019-02-17 23-09-33.png', 4, 0),
(28, 'dassssssssss', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbbbb', 'Screenshot from 2019-02-17 23-09-33.png', 1, 1),
(29, 'ccccccccccccccccccccc', 'dddddddddddddddddddddddddddddddddd', 'eeeeeeeeeeeeeeeeeeeeeeeee', 'Screenshot from 2019-02-17 23-09-33.png', 3, 0),
(30, 'hhhgghhg', 'fhggfhgffgd', 'ffdfdgdfdlkajdkaskjhakjakjdas', 'Screenshot from 2019-02-17 23-09-33.png', 1, 9),
(31, 'aaaaaaaa post 3033', 'aaaaaaaa post 3033 aaaaaaaa post 3033 aaaaaaaa post 3033', 'aaaaaaaa post 3033aaaaaaaa post 3033aaaaaaaa post 3033aaaaaaaa post 3033aaaaaaaa post 3033aaaaaaaa post 3033', '43701026_1830278893755268_4186715432738095104_o.jpg', 2, 0),
(32, 'jsiejsjksdfjdksdksldskj', 'dkmdskldskdlkldaskladsadlkklad', 'dknajandjdnsjakndasdansdamskaslmksamklsdmkl', '43701026_1830278893755268_4186715432738095104_o.jpg', 3, 0),
(33, 'dadkmsdklsdkladkldajlkdsjidasdas', 'asddsamasdmladsmklsadmadsmdsa', 'refkjngjlkgtmgtkmklgtklmgrkmrlgt', '43701026_1830278893755268_4186715432738095104_o.jpg', 4, 0),
(34, ' haf boi noif', 'fndsajsdjksdkmdlsaekmldskldssklddmsklsdmkl', 'sdfkmfsdkfsdmklfsdklmmklsfsdfklmsfkmlsfkml', 'Screenshot from 2019-02-17 23-09-33.png', 1, 5),
(35, ' Vũ Tông PhanVũ Tông Phan', 'Vũ Tông PhanVũ Tông PhanVũ Tông PhanVũ Tông Phan', 'Vũ Tông PhanVũ Tông PhanVũ Tông PhanVũ Tông Phan', 'Screenshot from 2019-02-17 23-09-33.png', 3, 0),
(36, 'dkjsskdsdkmljsdksdkljdjsa', 'dsadsdjjdksakldaskladdkajsdkls', 'adkdksdjskdkdajkdsajkda', 'Screenshot from 2019-02-17 23-09-33.png', 1, 2),
(41, 'ddaadsa', 'aaasddasdasd', 'dadaasdasasdasasasssad', 'Screenshot from 2019-02-17 23-09-33.png', 1, 0),
(42, 'asasdjasdkasajskdjsakadksljkldaskljsdakljsadjklssddda', 'asasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsdaasasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsda', 'asasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsdaasasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsdaasasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsdaasasdjasdkasajskdjsakadksljkldaskljsdakljsadjklsda', 'Screenshot from 2019-02-17 23-09-33.png', 1, 0),
(43, 'kudoadoiiqwdoiqqkowppoqw', 'kudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqw', 'kudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqw', 'Screenshot from 2019-02-17 11-03-57.png', 2, 0),
(44, 'adadddadasdsass', 'kudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqw', 'kudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqwkudoadoiiqwdoiqqkowppoqw', 'Screenshot from 2019-02-17 23-09-33.png', 2, 0),
(45, 'dadsdaasdasas', 'dadsdaasdasasdadsdaasdasasdadsdaasdasasdadsdaasdasas', 'dadsdaasdasasdadsdaasdasasdadsdaasdasasdadsdaasdasasdadsdaasdasas', 'Screenshot from 2019-02-17 11-03-57.png', 3, 1),
(46, 'dadsdaasdasasdadsdaasdasas', 'dadsdaasdasasdadsdaasdasasdadsdaasdasasdadsdaasdasas', 'dadsdaasdasasdadsdaasdasas', '43701026_1830278893755268_4186715432738095104_o.jpg', 2, 22),
(48, 'aaaaaaa', 'aaaaa', 'aaaaaa', '43701026_1830278893755268_4186715432738095104_o.jpg', 2, 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(52, 'phamxuanphongson', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'phamxuanphongson@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
