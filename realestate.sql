-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2015 at 07:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `post_id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `post_id`, `name`) VALUES
(28, 1449392102, '06122015155635hNRyV03122015174245kCL3N70x70-5347cd16a18994a77348983f.png'),
(29, 1449392102, '06122015155635It5Wk03122015174245kFdSb70x70-5347cd16a18994a77348984c.png'),
(30, 1449392102, '06122015155635xVhrX03122015174245UQynG70x70-5347cd16a18994a77348983d.png'),
(31, 1449392102, '06122015155635OKgAs0312201515162770x70-5347cd16a18994a773489854.png'),
(35, 1449388119, '06122015160054r5Fd402122015094631273010-3g4xIP1411841556.png'),
(36, 1449388119, '06122015161650kTgKG02122015094631273010-3g4xIP1411841556.png'),
(37, 1449388119, '06122015161707xfBkJ02122015094631273010-3g4xIP1411841556.png'),
(43, 1449388119, '06122015170007FbilZ02122015094631273010-3g4xIP1411841556.png'),
(44, 1449403571, '06122015170656bCTEh03122015174245kCL3N70x70-5347cd16a18994a77348983f.png'),
(45, 1449403571, '06122015170656pPxNV03122015174245kFdSb70x70-5347cd16a18994a77348984c.png'),
(46, 1449403571, '06122015170656JAXij03122015174245UQynG70x70-5347cd16a18994a77348983d.png'),
(47, 1449403571, '06122015170656630mC0312201515162770x70-5347cd16a18994a773489854.png'),
(48, 1449403571, '06122015170656LrpG60312201515162770x70-5347cd17a18994a77348985a.png'),
(49, 1449403571, '06122015170656GpvWI0312201515162770x70-5347cd17a18994a77348985c.png'),
(50, 1449463269, '07122015095250UXWIRimg1.jpg'),
(51, 1449463269, '07122015095250I2Gijimg2.jpg'),
(52, 1449464871, '07122015100851D5xNA1172.jpg'),
(53, 1449464871, '07122015100851YKyQfimg1.jpg'),
(54, 1449464871, '07122015100851VzRpaimg2.jpg'),
(55, 1449464941, '07122015101005FIzdp1172.jpg'),
(56, 1449464941, '071220151010055A47ximg1.jpg'),
(57, 1449464941, '07122015101005in0kOimg4.jpg'),
(58, 1449465025, '07122015101128h28lrimg1.jpg'),
(59, 1449465025, '07122015101128X4odiimg5.jpg'),
(60, 1449465025, '07122015101128mZcqKmontreux1.jpg'),
(61, 1449465025, '07122015101128dBRrAprague1.jpg'),
(62, 1449465095, '07122015101315K7q8Wimg1.jpg'),
(63, 1449465095, '07122015101315Gbg7Pimg2.jpg'),
(64, 1449465095, '071220151013158kOUPimg5.jpg'),
(65, 1449465095, '07122015101316SKEYGmontreux1.jpg'),
(66, 1449465258, '07122015101508Kuma41172.jpg'),
(67, 1449465258, '07122015101509u2tNBimg1.jpg'),
(68, 1449465258, '07122015101509RiA8oimg2.jpg'),
(69, 1449465311, '07122015101610zs8J1img4.jpg'),
(70, 1449465311, '07122015101610HTho9montreux1.jpg'),
(71, 1449465311, '07122015101610xcrbYprague1.jpg'),
(72, 1449465377, '07122015101702JeYuiimg1.jpg'),
(73, 1449465377, '071220151017024ZhdKimg2.jpg'),
(74, 1449465377, '07122015101702fX5EVimg3.jpg'),
(75, 1449465444, '07122015101817rYTtP1172.jpg'),
(76, 1449465444, '07122015101818WaBTkimg1.jpg'),
(77, 1449465444, '071220151018185I6Pvimg5.jpg'),
(78, 1449465501, '07122015101911u8ReXimg3.jpg'),
(79, 1449465501, '07122015101911rg04Fimg4.jpg'),
(80, 1449465501, '07122015101911KGCkXmontreux1.jpg'),
(81, 1449465555, '07122015102014ZlJfu1172.jpg'),
(82, 1449465555, '07122015102014xSFDgimg1.jpg'),
(83, 1449465555, '07122015102014T2DLwimg5.jpg'),
(84, 1449465555, '071220151020143WPC5montreux1.jpg'),
(85, 1449465617, '07122015102101qHMisimg1.jpg'),
(86, 1449465617, '07122015102101zXsHPimg2.jpg'),
(87, 1449465617, '07122015102101ER7XHimg3.jpg'),
(88, 1449465617, '07122015102101e4BRTimg4.jpg'),
(89, 1449465617, '071220151021010YqOjimg5.jpg'),
(90, 1449465687, '07122015102212PDlUWimg1.jpg'),
(91, 1449465687, '07122015102212vPi0yimg2.jpg'),
(92, 1449465687, '071220151022136lMFhimg3.jpg'),
(93, 1449465687, '07122015102213jnvKtimg5.jpg'),
(94, 1449465687, '07122015102213Kbyzhmontreux1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `about` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `rooms` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `parking` text NOT NULL,
  `fimage` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_id`, `name`, `about`, `category`, `city`, `rooms`, `area`, `price`, `location`, `parking`, `fimage`, `title`, `keywords`, `description`, `date`) VALUES
(8, 1449388119, 'Name', 'about property', 1, 'lahore', 7, 12, 29000, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015184313P90Htmontreux1.jpg', 'title', 'keywords', 'description', '2015-12-07 13:43:13'),
(9, 1449392102, 'name', 'about property', 3, 'fsd', 5, 27, 25800, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015184353iHBq3img4.jpg', 'title', 'keywords', 'description', '2015-12-07 13:43:53'),
(26, 1449403571, 'new', 'new', 2, 'rwp', 5, 26, 25200, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015184424EJHco1172.jpg', 'title', 'keywords', 'description', '2015-12-07 13:44:24'),
(27, 1449463269, '3rd name', 'about ; jukdfs-nlkjf & s/jkl seirl #kl s* ', 1, 'fasd', 5, 12, 12528, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015095249a8K731172.jpg', 'title', 'keywords', 'description', '2015-12-07 05:06:20'),
(35, 1449464871, '4th name', 'jlkjsfoj -spo fw-;lk. aspka sf', 2, 'rwp', 2, 12, 258222, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015100851qJ8wTimg3.jpg', 'title', 'keywords', 'description', '2015-12-07 05:08:51'),
(36, 1449464941, '5THOO', 'ABLJOSJ LKJ0SFDKJLK JSDFSKKLJ', 3, 'SALRAWAL', 5, 25, 256820, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '071220151010059VoGXmontreux1.jpg', 'find days b/w two dates', 'keywords', 'description', '2015-12-07 05:10:05'),
(37, 1449465025, '5 sneiw lkjso askljoiasfn ioljxh oisdf', 'lkjlsf oij Ã©jlk jokjfoj kljlkdjfo0j oasejl;j osijfej ', 1, 'lahore', 5, 44, 21154, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015101127xIuOMimg3.jpg', 'title', 'keywords', 'description', '2015-12-07 05:11:27'),
(38, 1449465095, 'asdjjlj asklujile lkjdfi eljl adi', 'jsfoi ejr jiojofij ljaerlk jiopsflkjse io laisdfjlkjioer liasjfl ioasfklj lasjfio kljkljfio lj', 2, 'fasd', 7, 34, 445755, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015101315ajFlrprague1.jpg', 'title', 'keywords', 'description', '2015-12-07 05:13:15'),
(39, 1449465258, 'lkjoie aljie lkajaijl halfdjioe', 'jljasdfio ljlkasdjfo aekjfljhofhh lndahfoui hwejlkhjdfoih ohleno', 1, 'isl', 8, 457, 5225542, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '071220151015081nbsximg5.jpg', 'title', 'keywords', 'description', '2015-12-07 05:15:08'),
(40, 1449465311, 'uerijslkjj lkhdililkjf qlkj', 'jkljolidf kljjlsdfoi alsdnkljk-dfjljj /joijd oeoiu& *(8 3ilju ', 2, 'karachi', 3, 245, 451254, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015101610tEZOwimg1.jpg', 'title', 'keywords', 'description', '2015-12-07 05:16:10'),
(41, 1449465377, 'sdfjlickk', 'kljiodf lkjsdij ekkj', 1, 'lahore', 545, 21542, 455445, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015101702lcxO51172.jpg', 'title', 'keywords', 'description', '2015-12-07 05:17:02'),
(42, 1449465444, 'LKNEIkjlj dskf kljf', 'kljljioas fjlkn 990er[\\3;ilj jsf''po-3;k ', 1, 'lahore', 45, 452, 24587542, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '07122015101817MEfKSmontreux1.jpg', 'title', 'keywords', 'description', '2015-12-07 05:18:17'),
(43, 1449465501, 'jienlkdfi', 'kljldfi lkajofjso waekjloi f', 1, 'fsd', 5, 45, 487545, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015101911aM1x2img2.jpg', 'title', 'keywords', 'description', '2015-12-07 05:19:11'),
(44, 1449465555, 'kljei sjfkljsdi ', 'iljliifj -0k;34kjj 09j/\\dfjlkjf', 1, 'SALARAWAL', 4, 55, 44557552, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'yes', '071220151020144gqlVimg4.jpg', 'title', 'keywords', 'description', '2015-12-07 05:20:14'),
(45, 1449465617, 'epos;kfk khjljkjfkiio', 'kjlkjsdfoi ekjkl soipfsjflk', 3, 'fsd', 4, 55, 4557585, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '07122015102101vV9PBmontreux1.jpg', 'title', 'keywords', 'description', '2015-12-07 05:21:01'),
(46, 1449465687, 'kioelknmlvkljh', 'kjisdofj aslkjosdif lkjerioo akfljljasodfj jijlkjsdfoi jlk adsjfoi asdnflkn oisaflkjl joijasiofdj lkjoidf aiojljioah fdoijlajflkj oiasdf ijaisfj iouaifj iouiodru ;iljklfjio asi', 1, 'isl', 5, 55, 554857, 'http://localhost/realestate/administrator/index.php?edit=1&token=TRUE', 'no', '0712201510221215FJd1172.jpg', 'title', 'keywords', 'description', '2015-12-07 05:22:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
