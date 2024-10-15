-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 11:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` text NOT NULL,
  `ad_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_pass`, `ad_img`) VALUES
(4, 'Muhammad Zaid', 'admin123@gmail.com', '$2y$10$dnLkrRzLj8vwyVbXtK8f1ewcoeNvs2SIySzpYenetwldTenl7tWUG', 'admin-profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `projid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_message`, `datetime`, `status`, `user_id`, `projid`) VALUES
(90, 'aaa', '2024-08-24 00:25:58', 1, 14, 19),
(106, 'aaaaaaaaa', '2024-08-24 00:47:36', 1, 14, 19),
(109, 'Nice', '2024-08-24 00:52:40', 1, 14, 19),
(115, 'Excellent', '2024-08-24 12:56:04', 1, 10, 23),
(116, 'nice', '2024-08-24 13:08:34', 1, 10, 21),
(117, 'Alaw', '2024-08-24 13:12:07', 1, 10, 33),
(119, '                        nice                    ', '2024-08-24 14:24:57', 1, 10, 33),
(127, '                                                    Superb                                                ', '2024-08-26 00:40:00', 1, 11, 19),
(129, 'Superb', '2024-08-26 00:41:57', 1, 11, 19);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `com_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `email`, `password`, `com_img`) VALUES
(2, 'Digital Tech', 'digital@gmail.com', '$2y$10$qLD7Yp8pFZd333VtOZaIO.68MTL9B5WonPUM4CKVORj6WIl1ijQom', 'digital-abstract-technology-logo-stock-free-vector.jpg'),
(3, 'TrackTerra', 'trackterra@gmail.com', '$2y$10$RSQ6cxwLLeaBSOL73Wqu7OasjevEA8PGcmEakj.vHkttvwPg4KLF6', 'trackTerra.jpg'),
(4, 'PixelBits', 'pixels@gmail.com', '$2y$10$TjOuUqLESodZ0opau74CR.xDuDE2hO1JhKTLnTmu0IyDtTL85rC5q', 'pixelbits.png'),
(5, 'softech', 'softech@gmail.com', '$2y$10$WWyvjj/cdILm4pGlpgZeQe.pshBpgcCzl2gS94HEFG7p40lEC/ZPi', '');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `count` int(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `user_id`, `project_id`, `count`) VALUES
(16, 10, 19, 1),
(20, 11, 23, 1),
(21, 1, 23, 1),
(22, 1, 22, 1),
(23, 14, 19, 1),
(30, 10, 23, 1),
(36, 10, 33, 1),
(37, 11, 19, 1),
(38, 13, 19, 1),
(40, 15, 19, 1),
(41, 15, 33, 1),
(43, 11, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `join_url` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `join_url`, `user_id`) VALUES
(4, 'https://zoom.us/j/94039013080?pwd=xcia6ZO6bdezK7eofNrqPOyNyTDKE2.1', 0),
(5, 'https://zoom.us/j/93294859052?pwd=px1CGYq83xcEdhzbazganNVzq9Yj6U.1', 0),
(6, 'https://zoom.us/j/94913293155?pwd=6VGofemxL8sa0CqzQZsaTVJe30CH5V.1', 0),
(7, 'https://zoom.us/j/93352161174?pwd=kb1g6pFdebIUVf9kJaSqkNDtrE7Vxr.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_faculty` varchar(255) NOT NULL,
  `project_batchcode` varchar(255) NOT NULL,
  `project_semester` varchar(255) NOT NULL,
  `project_url` text NOT NULL,
  `project_img` varchar(255) NOT NULL,
  `project_desc` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `Sta` varchar(255) NOT NULL,
  `Statuss` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_faculty`, `project_batchcode`, `project_semester`, `project_url`, `project_img`, `project_desc`, `status`, `user_id`, `category`, `Sta`, `Statuss`) VALUES
(19, 'Oakberry Real Estate Agency', 'Sir Sameer', '2241D2', '1st', 'https://preview.colorlib.com/theme/oakberry/', 'Oakberry.jpg', 'Oakberry is the most modern and easy-to-use Bootstrap 5 real estate website template. If you are looking for a striking example that will help execute your business website with style, opt for Oakberry. The tool follows all the latest trends and includes many practical features, making it a stand-out alternative.\r\n\r\nSome of the stuff you get with Oakberry is a top bar with extra information, a massive slider, hover effects, testimonials, and a gallery. You can also expand Oakberry with a blog section and introduce a strategic and compelling content marketing plan. In conclusion, instead of working on the design and all the handy amenities yourself, grab Oakberry and sort out your real estate website.', 1, 10, 13, '1', 0),
(21, 'DJoz Music', 'Sir Owais Khan', '4414E2', '3rd', 'https://preview.colorlib.com/theme/djoz/', 'djoz.jpg', 'If you want to expand your music project, do it with the HTML DJ website template, DJoz. This site’s skin mixes minimalism with creativity very well. In other words, everyone who lands on your page will have a blast skimming through your compelling content. While DJoz primarily focuses on DJs, you can easily alter it and use it for other types of musicians, heck, even bands.\r\n\r\nAwesome banner above the fold, video support, music player, countdown timer, transparent header—you name it, DJoz rocks it. Other treats contain social media icons, call-to-actions, a drop-down menu, Google Maps, and a working contact form. What’s more, the code is organized and clean, allowing you to perform customization tweaks effortlessly. Save time and energy when establishing a solid online presence by choosing the jaw-dropping DJoz.', 1, 11, 13, '1', 0),
(22, 'Feliciano Restaurant ', 'Sir Usama', '1131D3', '4th', 'https://preview.colorlib.com/theme/feliciano/', 'feliciano.jpg', 'Feliciano is your number-one solution if you are looking for the best restaurant and catering website template. The tool covers it all for a striking and delicious online presence for your business. Instead of building the whole website from the ground up, you can save time with the impressive Feliciano. This template sports a ton of premium-like features and functions. In other words, your professionalism will stay intact.\r\n\r\nFeliciano’s amazingness includes a full-screen slider, a sticky menu, animated statistics, a filterable food menu, scrolling animations, a parallax effect, and a functional online reservation form. There are also testimonials to build customer trust, social media icons, a newsletter subscription form, and Google Maps to display your location. In conclusion, with Feliciano, you will ensure a warm welcome to your world of deliciousness.', 1, 11, 16, '1', 0),
(23, 'Vegefoods Store', 'Mis Aatika', '6626G26', '3rd', 'https://preview.colorlib.com/theme/vegefoods/', 'vegefoods.jpg', 'Vegefoods is an excellent fruit and vegetable website template for crafting a modern webspace. If you would like to sell products online, start the journey to creating a top-notch eCommerce website with Vegefoods. The layout has a clean and minimal web design, pushing products right in front of their eyes. There are loads of premium-like features to Vegefoods which will get you going in close to no time. The tool is also organized and simple to use, ensuring you get the most out of it without sweat.\r\n\r\nFrom full-width slider and call-to-action buttons to sticky menu, hover effects, countdown timer for special deals and testimonials, Vegefoods sports it all and then some. Along with the enticing home page, you will also find cart, checkout, wishlist, blog, and contact sections. Start selling fruits and vegetables online with the power of Vegefoods.', 1, 11, 15, '1', 0),
(26, 'eStore e-commerce', 'Sir Mubeen', 'B1C2E4', '4th', 'https://preview.colorlib.com/theme/estore/', 'estore.jpg', 'While eStore is very versatile and highly adaptive, it is still the best to search for an apparel eCommerce website template. Options regarding the type of products you would like to push online with eStore are endless. Let your imagination not limit you when using all the perks and goodies of eStore. The page skin also ensures a responsive design that promises a smooth mobile shopping experience. It also works with popular browsers and retina screens.\r\n\r\nOther features of eStore include the top bar, sticky menu, slider, social media icons, all the necessary inner eCommerce pages, and blog. A working contact form and Google Maps are also integrated into the design. Start with your online business by employing eStore and enjoy the outcome.', 1, 10, 16, '1', 0),
(27, 'Coffee Blend', 'Sir Usama', 'B1C2E4', '3rd', 'https://preview.colorlib.com/theme/coffeeblend/', 'coffee-blend.jpg', 'Coffee Blend is a coffee website template for nearly any coffee-based business you plan to launch or already run. It is a highly adaptive site canvas that is super simple to use. Moreover, the tool is responsive and mobile-ready, following the latest trends and regulations regarding modern web and technology.\r\n\r\nUndoubtedly, your page based on Coffee Blend will work smoothly as butter, seamlessly displaying all its content to everyone. And if the dark layout is your favorite, you will dig Coffee Blend ten times more. It loads content on scroll, sports animated statistics, hovers effect, filterable menu, and a blog. Use Coffee Blend as is or tweak and improve it however you see it fit your cafe or bar best. Whatever the case, the end product will always be of the highest degree.', 1, 10, 18, '1', 0),
(28, 'Aranoz furniture shop', 'Sir Usama', 'B1C2E4', '3rd', 'https://preview.colorlib.com/theme/aranoz/', 'aranoz.jpg', 'With a reliable and easy to use furniture shop website template, Aranoz, you can start your project quicker than ever. This excellent web design lets you promote and sell all the fabulous furniture you offer professionally. The template’s clean and minimal look ensures a smooth shopping experience regardless of the device and platform they use for surfing the web. Speaking of which, Aranoz is mobile-ready, fast loading and cross-browser compatible.\r\n\r\nIn the Aranoz bundle, you will find very many premium-like features. From slider and call-to-action buttons to drop-down menu, countdown timer, newsletter subscription and social media buttons. Along with the home page, Aranoz also sports other pages for tracking, checkout, cart and order confirmation. Additionally, you can even start writing a furniture blog and let everyone get in touch with you through the integrated contact form.', 1, 10, 18, '1', 0),
(32, 'Hock Up', 'Sir Sameer', '1131D3', '4th', 'https://preview.colorlib.com/theme/hookup/', 'hookup-free-template.jpg', 'If you would like to announce your nuptials uniquely, create a page with a free one-page website template, Hookup. The tool is lovely and appealing to the eye, perfect for spreading awareness. Get your hands on Hookup now and turn it into a stunning wedding website. Share it with your family and friends, and even use it as an invitation form. Speaking of invitations, Hookup has an RSVP included in the web design.\r\n\r\nOther nifty amenities of Hookup include a countdown timer, sticky navigation, parallax effect, full-screen slider, scrolling animations, and a love story timeline. There are also sections for groom and bride, maids and groomsmen, gallery, and event schedule. That’s that—you now have a resourceful template at hand that will speed up the process of establishing your wedding page.', 1, 10, 15, '1', 2),
(33, 'Engineers', 'Sir Usama', '3313D4', '1st', 'https://preview.colorlib.com/theme/engineers/', 'engineers-free-templat.jpg', 'Engineers is a sophisticated engineering website template with a stunning and appealing web design. It is based on the powerful Bootstrap Framework, which gives Engineers flexibility and extendability. Indeed, Engineers is 100% mobile-friendly and in tune with all modern web browsers. Everyone will have a pleasant experience browsing your content and filling out the “request a quote” form.\r\n\r\nEngineers’ other features include a massive slideshow, sticky navigation, testimonials, blog pages, newsletter subscriptions, and contact forms. Instead of starting from complete scratch, Engineers offers you a striking layout that you can put into play right away; the theme is just a click away anyway. Spread the word out with this nifty engineering website template and start making big moves.', 1, 10, 13, '1', 0),
(34, 'Glint Portfolio ', 'Mis Neha', '1131D3', '1st', 'https://quomodosoft.com/html/glint/?storefront=envato-elements', 'Glint.jpg', 'Glint - Personal Portfolio is a contemporary, clean, and creatively designed personal portfolio template tailored for individuals looking to showcase their work and achievements. It is perfect for creative professionals seeking to build an online portfolio and present their creative endeavors in an impressive manner. The template features hand-coded HTML and comes with comprehensive documentation, making it easy to customize and modify. Built on the reliable Bootstrap 4 framework, Glint offers a comfortable and flexible platform for freelancers, artists, businesses, agencies, fashion enthusiasts, and more.', 2, 11, 13, '', 0),
(35, 'Elegance', 'Sir Sameer', '6626G26', '2nd', 'https://preview.colorlib.com/theme/ashion/', 'Glint.jpg', 'testing', 2, 11, 15, '', 0),
(37, 'Glint Portfolio ', 'Sir Sameer', '3313D4', '1st', 'https://quomodosoft.com/html/glint/?storefront=envato-elements', 'Glint.jpg', 'Glint - Personal Portfolio is a contemporary, clean, and creatively designed personal portfolio template tailored for individuals looking to showcase their work and achievements. It is perfect for creative professionals seeking to build an online portfolio and present their creative endeavors in an impressive manner.', 1, 11, 13, '', 2),
(38, 'Glint Portfolio2', 'Sir Usama', 'B1C2E4', '1st', 'https://quomodosoft.com/html/glint/?storefront=envato-elements', 'Glint.jpg', 'Glint - Personal Portfolio is a contemporary, clean, and creatively designed personal portfolio template tailored for individuals looking to showcase their work and achievements. It is perfect for creative professionals seeking to build an online portfolio and present their creative endeavors in an impressive manner.', 1, 11, 13, '', 1),
(39, 'Append - Modern for Startups and IT Services', 'Mis Neha', '2341D2', '3rd', 'https://bootstrapmade.com/demo/Append/', 'Append-Modern.jpg', 'Introducing Append - A Modern Business Bootstrap Template for Startups, Apps, and IT Services.\r\n\r\nAppend is a cutting-edge website template meticulously crafted to cater to the needs of startups, apps, and IT service providers. With its sleek and contemporary design, this template offers a perfect blend of functionality and aesthetics, empowering your online presence and captivating your audience.', 1, 11, 18, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

CREATE TABLE `project_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_img` varchar(255) NOT NULL,
  `c_desc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`c_id`, `c_name`, `c_img`, `c_desc`, `user_id`, `status`) VALUES
(13, 'Html/CSS/JS ', 'html.css.png', '  HTML (HyperText Markup Language): The standard markup language used to create web pages.\r\nCSS (Cascading Style Sheets): Used for styling HTML elements (layout, colors, fonts, etc.).\r\nJavaScript: A programming language used for creating interactive effec', 0, 1),
(15, 'PHP/MySQL ', 'php.myslq.jpg', '   PHP: A server-side scripting language for web development.\r\nMySQL: An open-source relational database management system.', 0, 1),
(16, 'Python/Django ', 'phyton.jpg', '  Python: Often used with frameworks like Django or Flask for back-end development.\r\n\r\nFrameworks:\r\nDjango: A high-level Python web framework.', 0, 1),
(18, 'C#/ASP.NET ', 'asp.net.jpg', '  C#: A language used in ASP.NET for building dynamic websites and applications.\r\n\r\nFramework\r\nASP.NET: A framework for building web applications and services with .NET and C#.', 0, 1),
(20, 'Mern', 'mern.jpg', 'MERN is a technology stack used for building full-stack web applications, consisting of MongoDB, Express.js, React.js, and Node.js.\r\n\r\nMongoDB: A NoSQL database for storing data.\r\nExpress.js: A web application framework for the backend.\r\nReact.js: A libra', 0, 1),
(21, 'Java', 'java.jpg', 'Java is a versatile, high-level, object-oriented programming language designed for platform independence, meaning code written in Java can run on any device that has the Java Virtual Machine (JVM). It is widely used for building enterprise-level applicati', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_studentid` varchar(255) NOT NULL,
  `u_number` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_cv` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_studentid`, `u_number`, `u_address`, `u_cv`, `u_email`, `u_password`, `u_img`) VALUES
(1, 'Mubeen', '', '034567890', 'Baldia Town, Razaqabad, Karachi', '', 'mubeen@gmail.com', '$2y$10$9p4qqDcB6XWfWo8dMtfmEeuH/l9zIAAv8p9mcOZ8jCLH8uZrQoB6W', ''),
(3, 'Usama', '', '', '', '', 'usama@gmail.com', '$2y$10$BilBIHD2iEgMchD0lLGW5up45X.UiMor6y8Pe5TkCETcy06bnel3u', ''),
(5, 'Ovais Khan', '', '', '', '', 'ovais@gmail.com', '$2y$10$qu3C5dEqaQSQn30DX3WPYOScKnn3IgVbXLqVN.XMNCWutaJiiob1W', ''),
(9, 'Yahya', '', '', '', '', 'yahya@gmail.com', '$2y$10$8IcaLxt7u4suuyNFFtaLg.yxMRkwhJdhnUBvbjlPHDfQQPWwrjI46', 'person_1.jpg'),
(10, 'yahya4', 'Student 122345', '03456789', 'Liaqtabad', '', 'yahya4@gmail.com', '$2y$10$t.5btuNzdenmlhoqx.Zbb.TUVgaDNlhfNOtQx4ySW3T.zt0CVDfWa', 'author.jpg'),
(11, 'M Zaid', 'Student1446624', '32235234', 'Nazimabad # 2', 'Professional CV Resume.pdf', 'zaid@gmail.com', '$2y$10$OFHhZ8V1emfRS6nk1rs9p.L.wMDd1yAICwWW.nRBXCHyZSpnR1Fgq', 'images (1).jfif'),
(12, 'Zain ', '', '', '', '', 'zain@gmail.com', '$2y$10$PaJqIhQmNCCKyo3SrSoW8uWmSHycznT2rBJ58oHfGW4IwKtWV4rJW', ''),
(13, 'Zainab Khan', '', '', '', '', 'zainab11@gmail.com', '$2y$10$muciNm4lynOjuPlekvFede9r2I/YRW4zPxcWQV7Aj2KMihCS2BzNa', ''),
(14, 'Maheen', 'Student13346', '0221888568', 'Murtaza ky dill mein', '', 'maheen@gmail.com', '$2y$10$ElUHxql5tXKzvqulc.mdxOqs9j9TooAU5OM93LzHIOkr6AteL/Htu', 'female.jpeg'),
(15, 'Abbas Qureshi', '', '', '', '', 'abbas@gmail.com', '$2y$10$7J7qqe8FaYCaG.SE6KOdU.5OtqerOzNrinfRC7LnM.259Ww1M.nI2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `us_fk` (`user_id`),
  ADD KEY `pr_fk` (`projid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `use_fk` (`user_id`),
  ADD KEY `pro_fk` (`project_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `fk_category_id` (`category`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `project_category`
--
ALTER TABLE `project_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `pr_fk` FOREIGN KEY (`projid`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `us_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `pro_fk` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `use_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category`) REFERENCES `project_category` (`c_id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
