-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2024-03-04 04:14:56
-- 服务器版本： 5.7.39
-- PHP 版本： 7.4.33

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： portfolio_db
--

-- --------------------------------------------------------

--
-- 表的结构 tbl_contact
--

CREATE TABLE tbl_contact (
  contact_id int(10) UNSIGNED NOT NULL,
  firstname varchar(100) NOT NULL,
  lastname varchar(100) NOT NULL,
  email varchar(100) DEFAULT NULL,
  messages varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 tbl_contact
--

INSERT INTO tbl_contact (contact_id, firstname, lastname, email, messages) VALUES
(2, 'hjk', 'nuhgf', 'yjie9093@gmail.com', 'vsdrfg'),
(8, 'aaa', 'sss', 'sdfs@qq.com', 'sdfasfa'),
(9, 'bbb', 'bbb', 'bbb@qq.com', ' cccc'),
(10, '1', '2', '3@qq.com', '88'),
(11, '22', '22', '22@qq.com', '22'),
(12, '777', 's777', '77@qq.com', '7777');

-- --------------------------------------------------------

--
-- 表的结构 tbl_media
--

CREATE TABLE tbl_media (
  media_id int(11) NOT NULL,
  project_id int(11) DEFAULT NULL,
  image_filename varchar(255) DEFAULT NULL,
  alt_text varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 tbl_media
--

INSERT INTO tbl_media (media_id, project_id, image_filename, alt_text) VALUES
(1, 1, 'project1s.png', 'sitemap'),
(2, 1, 'project1m.png', 'moodboard'),
(3, 2, 'project2s.png', 'sitemap'),
(4, 2, 'project2m.png', 'moodboard'),
(5, 3, 'project3s.png', 'sitemap'),
(6, 3, 'project3m.png', 'moodboard');

-- --------------------------------------------------------

--
-- 表的结构 tbl_project
--

CREATE TABLE tbl_project (
  ID int(11) NOT NULL,
  project_title varchar(255) NOT NULL,
  project_url varchar(255) NOT NULL,
  project_image varchar(255) NOT NULL,
  project_type varchar(50) NOT NULL DEFAULT 'code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 tbl_project
--

INSERT INTO tbl_project (ID, project_title, project_url, project_image, project_type) VALUES
(1, 'University for the Elderly', 'case-study/cuniversity.html', 'university.png', 'code'),
(2, 'Fruit juice', 'https://65dd0ce0a2c2663b759806a8--fastidious-dragon-efa5c9.netlify.app', 'fruitjuice.png', 'code'),
(3, 'Starwar', 'https://65dd0d6416ee3d3854aeac54--courageous-otter-2e9a43.netlify.app', 'Star-Wars.jpg', 'code'),
(4, 'Comfort room', 'case-study/ColourAndBranding.pdf', 'comfortroom.png', 'design'),
(5, 'Lightbox for Characters', 'case-study/CSS-Selection-and-Styles-main/index.html', 'lightbox.png', 'code'),
(6, 'To Do List', 'case-study/mytodolist/index.html', 'todolist.png', 'code'),
(8, '222', '222', '222', 'code'),
(10, 'earbuds', 'sadasfdasf', '333333', 'code'),
(11, '12345', '123443', '12343', '1231243');

-- --------------------------------------------------------

--
-- 表的结构 tbl_projects
--

CREATE TABLE tbl_projects (
  id int(11) NOT NULL,
  title varchar(255) DEFAULT NULL,
  category varchar(50) DEFAULT NULL,
  project_url varchar(300) NOT NULL,
  image_url varchar(255) DEFAULT NULL,
  tools text,
  overview text,
  research text,
  problem_statement text,
  design_process text,
  conclusion text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 tbl_projects
--

INSERT INTO tbl_projects (id, title, category, project_url, image_url, tools, overview, research, problem_statement, design_process, conclusion) VALUES
(1, 'University for the Elderly', 'code', '', 'project1.png', 'HTML, CSS, JavaScript', 'The Senior University Website is a platform designed to provide learning and recreational activities for elderly individuals. Catering to a diverse range of interests such as piano, dance, musical instruments, philosophy, computer courses, and various physical activities suitable for seniors.', 'Our initial step was to deeply understand our target audience - the elderly. As a staff member responsible for enrollment and personnel management, I have a deep understanding of our audience\'s unique needs and challenges. Through direct engagement and research, we identified several key pain points:\r\nComplex Navigation\r\nSmall Text\r\nOverwhelming Information\r\nLack of Technical Confidence\r\n', 'Given these pain points, our problem statement became clear: \"How can we design a digital learning platform that is both accessible and engaging for elderly users, who often face challenges with complex navigation, small text sizes, information overload, and a lack of confidence in using technology?\"', 'Armed with our problem statement, we proceeded to define the website\'s sitemap, focusing on simplicity and ease of access. Our sitemap was designed to offer straightforward pathways to essential features. We chose warm colors like soft yellow and green to create a welcoming atmosphere, countering the coldness often associated with technology. The design incorporated large, readable fonts and ensured that the interface was intuitive, with clear, easy navigation to make the digital leap less daunting for our elderly students.', 'The launch of the Senior University website not only improved the digital learning experience for the elderly by making it more accessible and engaging but also served as a testament to the power of empathetic design. This project vividly demonstrated how mindful UX/UI decisions can bridge the digital divide, profoundly impacting users\' lives and highlighting the pivotal role of empathy in creating meaningful digital solutions.'),
(2, 'Quatro Fruit Juice', 'code', '', 'project2.png', 'HTML, CSS, JavaScript', 'The Quatro Fruit Juice website is an innovative platform designed to showcase a range of organic fruit juices and dried fruit tea bags. The project aimed to highlight the brand\'s commitment to sustainability and organic farming, appealing to health-conscious consumers.', 'The target audience includes health-conscious individuals interested in organic and sustainable products. Through research and direct engagement, key user preferences were identified, focusing on easy navigation, detailed product information, and a seamless shopping experience.\r\n', 'The challenge was to create a digital experience that effectively communicates Quatro\'s dedication to quality and sustainability while being accessible and engaging for users seeking organic juice options.', 'Utilized warm, inviting colors and clear, readable fonts to create a welcoming atmosphere. Responsive design principles were applied to ensure accessibility across devices.', 'The launch of the Quatro Fruit Juice website successfully introduced the brand\'s organic juice line to a wider audience, demonstrating the effectiveness of combining an accessible design with a strong narrative on sustainability. This project illustrates how digital platforms can enhance brand visibility and consumer engagement through thoughtful design and content strategies.'),
(3, 'Lightbox Actor Information Website', 'code', '', 'project3.png', 'HTML, CSS', 'This website project was developed to showcase detailed information about actors in an engaging and interactive manner using lightbox modal displays. The platform is tailored for fans and industry professionals seeking in-depth insights into the careers and profiles of their favorite performers.', 'To cater effectively to our audience, which includes movie enthusiasts and casting agents, we identified key preferences such as quick access to actor information, ease of navigation, and visual appeal. Our team emphasized creating a user-friendly interface that would accommodate both casual browsing and professional research.\r\n', 'The central challenge was, \"How can we present a rich database of actor information in a manner that is easily accessible and visually captivating, while providing a seamless user experience for diverse users?\"', 'We commenced by structuring a clear and intuitive sitemap. The main sections included a Home page and a Character Navigation area with sub-sections for each actor, leading to individual lightbox displays. The sitemap was designed to offer direct pathways to the featured content, with a focus on high usability standards.', 'The completion of the Lightbox Actor Information Website provides a comprehensive and enjoyable platform that enhances the visibility of actor profiles through thoughtful design and interactive elements. It serves as a valuable resource for the film and entertainment community.');

-- --------------------------------------------------------

--
-- 表的结构 tbl_users
--

CREATE TABLE tbl_users (
  id int(11) NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 tbl_users
--

INSERT INTO tbl_users (id, username, password, created_at) VALUES
(1, 'portfolio', 'yangjie', '2024-03-03 04:47:30');

--
-- 转储表的索引
--

--
-- 表的索引 tbl_contact
--
ALTER TABLE tbl_contact
  ADD PRIMARY KEY (contact_id);

--
-- 表的索引 tbl_media
--
ALTER TABLE tbl_media
  ADD PRIMARY KEY (media_id),
  ADD KEY project_id (project_id);

--
-- 表的索引 tbl_project
--
ALTER TABLE tbl_project
  ADD PRIMARY KEY (ID);

--
-- 表的索引 tbl_projects
--
ALTER TABLE tbl_projects
  ADD PRIMARY KEY (id);

--
-- 表的索引 tbl_users
--
ALTER TABLE tbl_users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY username (username);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT tbl_contact
--
ALTER TABLE tbl_contact
  MODIFY contact_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT tbl_media
--
ALTER TABLE tbl_media
  MODIFY media_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT tbl_project
--
ALTER TABLE tbl_project
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT tbl_projects
--
ALTER TABLE tbl_projects
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT tbl_users
--
ALTER TABLE tbl_users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 限制导出的表
--

--
-- 限制表 tbl_media
--
ALTER TABLE tbl_media
  ADD CONSTRAINT tbl_media_ibfk_1 FOREIGN KEY (project_id) REFERENCES tbl_projects (id);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
