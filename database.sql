-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2022 at 01:23 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `editho`
--
CREATE DATABASE IF NOT EXISTS `editho` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `editho`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
                                          `id` int NOT NULL AUTO_INCREMENT,
                                          `body` text COLLATE utf8mb4_general_ci NOT NULL,
                                          `post_id` int NOT NULL,
                                          `user_id` int NOT NULL,
                                          `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          PRIMARY KEY (`id`,`user_id`),
    KEY `fk_comments_users1_idx` (`user_id`),
    KEY `post_id` (`post_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `post_id`, `user_id`, `created_at`) VALUES
                                                                              (41, 'Je tenais à remercier l\'ensemble des collaborateurs d\'EdithO pour leur présence et pour la qualité de nos échanges. Je suis heureux de vous compter au sein de l\'organisation.', 2, 7, '2022-04-20 11:59:35'),
(42, 'Une superbe initiative, bienvenue à ces jeunes', 1, 3, '2022-04-20 11:59:35'),
(43, 'Quelles sont les retombées de cette action ?', 1, 2, '2022-04-20 11:59:35'),
(44, 'Ce fût une joie de les accompagner, en espérant que ceci puisse être pérénisé. ', 1, 4, '2022-04-20 11:59:35'),
(45, 'Je tenais à remercier l\'ensemble des collaborateurs d\'EdithO pour leur présence et pour la qualité de nos échanges. Je suis heureux de vous compter au sein de l\'organisation.', 2, 7, '2022-04-20 11:59:35'),
                                                                              (46, 'Un moment toujours agréable, au plaisir de vous revoir au prochain séminaire ! ', 2, 1, '2022-04-20 11:59:35'),
                                                                              (47, 'Une sacrée victoire de nos rivales, l\'équipe jaune. Nous avons hâte de prendre notre revanche.', 3, 2, '2022-04-20 13:59:35'),
(48, 'Je suis tout à fait d\'accord avec Alfred. Nous allons nous entrainer pour être encore plus fort au prochain tournoi. ', 3, 6, '2022-04-20 11:59:35'),
                                                                              (49, 'J\'espère pouvoir trouver un coéquipier au prochain tournoi et rentrer dans la compétition !', 3, 5, '2022-04-20 11:59:35'),
(50, 'Ce fût un très joli spectacle, bravo à tous !', 3, 4, '2022-04-20 11:59:35'),
(51, 'Classement largement mérité, merci à tous pour votre bienveillance. EdithO n\'en serait pas là sans vous.', 4, 1, '2022-04-20 11:59:35'),
                                                                              (68, 'Nice!!!', 2, 5, '2022-04-29 11:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
                                           `id` int NOT NULL AUTO_INCREMENT,
                                           `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `post_id` int NOT NULL,
    PRIMARY KEY (`id`,`post_id`),
    KEY `fk_documents_posts1_idx` (`post_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `url`, `post_id`) VALUES
                                                     (11, 'URL1', 1),
                                                     (12, 'URL2', 2),
                                                     (13, 'URL3', 3),
                                                     (14, 'URL4', 3),
                                                     (15, 'URL5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `elearning`
--

DROP TABLE IF EXISTS `elearning`;
CREATE TABLE IF NOT EXISTS `elearning` (
                                           `id` int NOT NULL AUTO_INCREMENT,
                                           `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    `img_url` varchar(2083) COLLATE utf8mb4_general_ci NOT NULL,
    `description` varchar(260) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elearning`
--

INSERT INTO `elearning` (`id`, `title`, `img_url`, `description`) VALUES
                                                                      (1, 'Security', 'https://cdn-icons-png.flaticon.com/512/98/98741.png', 'Everything you need to protect your self'),
                                                                      (2, 'Management', 'https://cdn-icons-png.flaticon.com/512/115/115892.png', 'Everything you need to perform in management'),
                                                                      (3, 'Project', 'https://www.clipartmax.com/png/full/256-2560362_capital-improvement-projects-terms-and-condition-svg-icon.png', 'Everything you need to carry out project'),
                                                                      (4, 'Professional efficiency\r\n', 'https://cdn2.iconfinder.com/data/icons/key-performance-indicators/512/Efficiency-effectiveness-value-performance-effective-process-optimization-512.png', 'Everything you need to be efficient');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_content`
--

DROP TABLE IF EXISTS `elearning_content`;
CREATE TABLE IF NOT EXISTS `elearning_content` (
                                                   `id` int NOT NULL AUTO_INCREMENT,
                                                   `title` varchar(60) NOT NULL,
    `img_url` varchar(2600) DEFAULT NULL,
    `body` varchar(50) NOT NULL,
    `elearning_id` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_learning_contents` (`elearning_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `elearning_content`
--

INSERT INTO `elearning_content` (`id`, `title`, `img_url`, `body`, `elearning_id`) VALUES
                                                                                       (77, 'Teamwork: discover roles in teams', 'https://cdn-icons-png.flaticon.com/512/115/115892.png', ' There are many reasons why ', 2),
                                                                                       (90, 'Give and receive feedback', 'https://www.clipartmax.com/png/full/256-2560362_capital-improvement-projects-terms-and-condition-svg-icon.png', 'As you know, Odyssey uses a peer evaluation system', 3),
                                                                                       (92, 'Data security', 'https://cdn-icons-png.flaticon.com/512/98/98741.png', 'Data security is about keeping your data safe', 1),
                                                                                       (94, 'Employee work performance', 'https://cdn2.iconfinder.com/data/icons/key-performance-indicators/512/Efficiency-effectiveness-value-performance-effective-process-optimization-512.png', 'Like most employees, you want to do well', 4);

-- --------------------------------------------------------

--
-- Table structure for table `elearning_display`
--

DROP TABLE IF EXISTS `elearning_display`;
CREATE TABLE IF NOT EXISTS `elearning_display` (
                                                   `id` int NOT NULL AUTO_INCREMENT,
                                                   `content_id` int NOT NULL,
                                                   `title` varchar(80) NOT NULL,
    `body` text NOT NULL,
    `img_header` varchar(5000) NOT NULL,
    `header` text NOT NULL,
    `img_body` varchar(2500) NOT NULL,
    `title_body` varchar(80) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `content_id` (`content_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `elearning_display`
--

INSERT INTO `elearning_display` (`id`, `content_id`, `title`, `body`, `img_header`, `header`, `img_body`, `title_body`) VALUES
    (23, 77, 'Teamwork: discover roles in teams\r\n\r\n', 'Good reasons to work in teams There are many reasons why working in teams gives better results, among them: Engagement: people feel more engaged if they are supported by a team. They benefit from their colleagues\' experiences. They also like showing what they are good at. Innovation: In a group, more ideas come up and talking about ideas gives many other ideas. Productivity: a team where members work well together is more productive. People can help each other. They can also dedicate themselves to do the tasks they are better at. Problem-solving: with diversity in a team, people see problems from different angles and manage to solve them faster. Learning opportunities: people learn from each other and can improve their knowledge and skills. Confidence: by learning and sharing, team members tend to gain confidence. However, teamwork is effective only if team members work well together. Unfortunately, this is not always the case particularly at the very beginning when team members don\'t know each other. Team development process A team where team members don\'t know each other can\'t achieve their best as soon as they have been assigned a project. It takes time for a team to get to know each other and understand how they can work together. You need the patience to build a productive team. Many studies show the development phases of a team. One of the famous ones is the Tuckman\'s stages of group development. When the team is forming, members feel like strangers and need to establish rules. In the \"storming phase\", they feel more comfortable, share feelings but still see themselves as individuals. It is only in the \"norming phase\" that people realize they can work together and that they start being productive (in the \"performing phase\"). If you find yourself with a team you don\'t feel comfortable with, or if there are some conflicts at the beginning, then don\'t worry, this is perfectly normal. What kind of team member are you? Depending on our personality, or experience, we act differently in a group. Some of us prefer taking the role of the leader. Others like doing research and bringing ideas to the group but will be very poor at implementing. There are no good or bad roles. Diversity is important in a group. However, it is useful to know about yourself and your team members\' preferences.\r\n', 'https://www.conseilorga.com/wp-content/uploads/2018/02/management-de-projet-1.jpg', 'Introduction In a competitive world where businesses have to constantly innovate, companies have long understood the power of effective teamwork. Working in a team can be fun, but it is not always easy to make people work together and we all had our bad experiences. Let\'s see if we can learn more about how to work in teams.\r\n\r\n', 'https://storage.googleapis.com/quest_editor_uploads/kUk0TXnbzJ4U3sh19VA6PrpH0yLVcysj.png', 'Why work with a team\r\n\r\n'),
(24, 77, 'Teamwork: discover roles in teams\r\n\r\n', 'Good reasons to work in teams There are many reasons why working in teams gives better results, among them: Engagement: people feel more engaged if they are supported by a team. They benefit from their colleagues\' experiences. They also like showing what they are good at. Innovation: In a group, more ideas come up and talking about ideas gives many other ideas. Productivity: a team where members work well together is more productive. People can help each other. They can also dedicate themselves to do the tasks they are better at. Problem-solving: with diversity in a team, people see problems from different angles and manage to solve them faster. Learning opportunities: people learn from each other and can improve their knowledge and skills. Confidence: by learning and sharing, team members tend to gain confidence. However, teamwork is effective only if team members work well together. Unfortunately, this is not always the case particularly at the very beginning when team members don\'t know each other. Team development process A team where team members don\'t know each other can\'t achieve their best as soon as they have been assigned a project. It takes time for a team to get to know each other and understand how they can work together. You need the patience to build a productive team. Many studies show the development phases of a team. One of the famous ones is the Tuckman\'s stages of group development. When the team is forming, members feel like strangers and need to establish rules. In the \"storming phase\", they feel more comfortable, share feelings but still see themselves as individuals. It is only in the \"norming phase\" that people realize they can work together and that they start being productive (in the \"performing phase\"). If you find yourself with a team you don\'t feel comfortable with, or if there are some conflicts at the beginning, then don\'t worry, this is perfectly normal. What kind of team member are you? Depending on our personality, or experience, we act differently in a group. Some of us prefer taking the role of the leader. Others like doing research and bringing ideas to the group but will be very poor at implementing. There are no good or bad roles. Diversity is important in a group. However, it is useful to know about yourself and your team members\' preferences.\n', 'https://www.conseilorga.com/wp-content/uploads/2018/02/management-de-projet-1.jpg', 'Introduction In a competitive world where businesses have to constantly innovate, companies have long understood the power of effective teamwork. Working in a team can be fun, but it is not always easy to make people work together and we all had our bad experiences. Let\'s see if we can learn more about how to work in teams.\n\n', 'https://storage.googleapis.com/quest_editor_uploads/kUk0TXnbzJ4U3sh19VA6PrpH0yLVcysj.png', 'Why work with a team\r\n\r\n'),
(37, 90, 'Give and receive feedback', 'Feedback when used in an appropriate manner can be a fantastic tool to grow in any tech job.\r\nUnfortunately, it is not always constructive and easy to understand.\r\nIn this video, the speaker says that only 26% of employees consider that the feedback they were given was good.\r\nWatch this video and find the right \"formula\" to help you to give great constructive feedback.\r\n\r\n\r\nThis is the end of this quest.\r\nIf you enjoyed this topic, there are many free resources online you can easily find.\r\nWe suggest you in particular the online Coursera Mooc to go further (see the link below).\r\n\r\nAnd remember, feedback is the fuel of growth.\r\nWhy don\'t you put into practice what you learned here by giving us some constructive feedback on this quest?\r\nWe would love to have it! Please, add it in the comment box at the bottom of this page.', 'https://storage.googleapis.com/quest_editor_uploads/TYeXIu1BAcV02PFZUDKaMlmbRWZ0r6J9.jpg', 'As you know, Odyssey uses a peer evaluation system. You probably already had the chance to give feedback to a colleague or received some.\r\nAt Wild Code School, we love feedback and this is part of our teaching approach. Students regularly receive feedback on the projects they work on. The more feedback you give and receive, the better expert you become on a particular topic. Do you know how to give and receive good feedback? Have you already felt offended or frustrated when receiving feedback. Did you always manage to act upon the received feedback? This quest will help you to become more professional when giving and receiving constructive feedback.', 'https://storage.googleapis.com/quest_editor_uploads/Yr4hi6R8idcspC3HZEgMZpMebWHzapDK.png', 'More tips on giving and receiving feedback'),
(39, 92, 'Data security', 'Passwords\r\nPasswords are a foundation of security. Getting a good one is a great basis for keeping your data safe,\r\nbut a weak password is like an unlocked door.\r\nA good password is between eight to fifteen characters long; the more characters in the password\r\nthe harder it is to guess. Using upper and lower case letters, numbers, and punctuation symbols\r\nsignificantly increases the variation, and thus the strength of your password, although that variation\r\nis minimized by picking common letters like vowels, or lower numbers (1, 2, 3), and sequences.\r\nTherefore, the more randomly distributed the characters in your password, the better.\r\nYour institution’s system should rule-out using proper words and will often mandate password\r\nchanges every few months. Adopt this good practice across all your computers.\r\nA password generator site is useful for randomizing characters and offering hints to remember that\r\npassword, and if you are unsure about using a computer-generated password, you can always tweak\r\nthe suggested password by changing a character or two.\r\n\r\nAn alternative to passwords are pass phrases. Pass phrases are sequences of words or text and are\r\nattractive because they are easier for the user to remember, and in terms of complexity and\r\nvariation, produce longer character strings. However, using an obvious common phrase reduces\r\nsecurity. It is better to use a phrase that has private personal meaning and is not in common usage.\r\nWhether it is a pass phrase or password, both suffer from the trade-off between ease of recall and\r\nsecurity. A simple password is easy to remember but easier to guess; a harder one is difficult to guess\r\nbut difficult to remember. It is sensible to adopt a risk strategy with your passwords. The more\r\nvaluable the content behind the password, the greater the security steps to choose and store a\r\npassword. Writing down passwords is a solution, but taking care of where you store passwords is a\r\nconsideration. Possessing a nice, long, normally distributed random password means nothing if\r\nwritten on a post-it note stuck to your monitor. The easiest way to obtain access is not by “brute\r\nforce attack” but obtaining the password itself through carelessness or deceit. For that reason, if you\r\ndo write down a password keep it somewhere safe and away from the machine.\r\nEncryption\r\nEncryption is a great research data management tool for secure storage and transmission of files and\r\nit is good practice to encrypt any disclosive files and machines or devices that store data.\r\nEncryption maintains the security of data and documentation through an algorithm to transforming\r\ninformation into something unreadable requiring a “key” to decrypt and return to comprehension.\r\nPrograms like SafeHouse, TrueCrypt, AxCrypt offer free cross-platform encryption software.\r\nSafeHouse creates a “container” that appears to be just a drive on your computer allowing you to use\r\nit as you would use any normal drive. When encrypting a drive, the key size determines the strength\r\nof encryption as the number of “brute force” guesses that an attacker needs to make in order to guess\r\nthe decryption key increases. Advanced Encryption Standard (AES) is a widely recognized encryption\r\nstandard with key sizes of 128, 192 and 256 recognized as sufficient levels as encryption.\r\nIf you are unsure about what to encrypt, a good rule to apply is this: encrypt anything you would not\r\nhappily send on a postcard. Encryption not only protects files as they transfer between machines, it\r\nalso ensures files on lost or stolen machines and drives are unreadable to anyone without the\r\nencryption key. After all, to lose a machine or memory stick may be regarded as a misfortune; to lose\r\nyour data looks like carelessness. ', 'https://d117h1jjiq768j.cloudfront.net/images/default-source/blogs/2018/2018-04/data-security-basics-for-cloud-and-big-data-landscapes_870x450.jpg?sfvrsn=d0984f1f_3', 'Data security is about keeping your data safe from accidental or malicious damage.\r\nSecurity is a consideration at all stages of your research, particularly if working with disclosive or\r\nlicensed data. The responsibility to protect data from theft, breach of confidentiality, premature and\r\nunauthorized release, and ensure secure disposal is an essential part of a research data management\r\nstrategy.\r\nSecurity has different dimensions. Physical security refers to the status of devices on which data are\r\nstored and accessed. Consequently, ensure access to rooms, cupboards, and drawers where data is\r\nstored is controlled and anyone with access to disclosive data should sign a non-disclosure\r\nagreement outlining the nature of confidentiality, storage conditions, and data retention policies.\r\nThis will provide formal assurance of secure data handling. ', 'https://itsocial.fr/wp-content/uploads/2022/02/cybersecurity-vs-information-security-illustration.jpg', 'Password and Encryption'),
(41, 94, 'Employee work performance', 'You and your supervisor should have a discussion about your work goals for the upcoming year. You should expect to have this discussion around the time of your annual performance review for the previous year.\r\n\r\nThe discussion may include:\r\n\r\nA review of your job description. Is it accurate and complete?\r\nA list of goals for the coming year. Your goals should be tied to departmental goals and your job description.\r\nAn assessment of skills and knowledge you need to develop in order to achieve your goals.\r\nA discussion of your long-term professional goals. This is a good time to advocate for your professional growth through training and job opportunities.\r\nYou and your supervisor should document your goals and any necessary professional development. Make sure you get a copy of this document so that you can refer to it over the next review period.\r\n\r\nIf you don’t understand any of your goals or expectations, be sure to clarify them with your supervisor.\r\n\r\nNew employees\r\nNew classified non-union and contract covered staff employees, or current classified non-union and contract covered staff employees moving to a new position, are usually required to serve a probationary or trial service period. The length of this period is determined by the applicable collective bargaining agreement or employment program.\r\n\r\nBe sure that you understand the goals and expectations you need to meet in order to successfully complete this period and transition to permanent status.\r\n\r\nProfessional staff don’t have a probationary or trial service period; instead, they serve on an “at will” basis, which means that their appointment can be modified or ended for any reason that does not unlawfully discriminate against the employee or violate public policy.\r\n\r\nStaying connected\r\nMeet with your supervisor throughout the year, formally or informally, so that you can receive timely and regular feedback about your performance. These meetings can also be a great time to discuss any additional support or training you need to accomplish your goals.\r\n\r\nIf your goals change over the course of the year, ask your supervisor to document the changes.\r\n\r\nKeep track of your achievements and professional development during the year, particularly accomplishments related to your annual goals. This information can be helpful when it is time for your annual performance review.\r\n\r\nReviewing the year\r\nPerformance reviews typically take place annually.\r\n\r\nYour annual review has two parts: a written evaluation and a one-on-one meeting with your supervisor to discuss the evaluation.\r\n\r\nFor the annual performance review, pull out the notes you have been keeping on your achievements over the review period. These notes can be a useful aid if you are asked to complete a self-evaluation. If no self-evaluation is required, offer to summarize your achievements for your supervisor. Remembering all the accomplishments of multiple employees is challenging. Your supervisor may appreciate a reminder when writing your evaluation.\r\n\r\nWritten evaluation\r\nYour department may have a standard form for performance evaluations. Ask your supervisor for a blank copy of the form so that you can better understand how you are being assessed.\r\n\r\nEvaluation forms typically cover the following topics:\r\n\r\nQuality of work (accuracy, thoroughness, competence)\r\nQuantity of work (productivity level, time management, ability to meet deadlines)\r\nJob knowledge (skills and understanding of the work)\r\nWorking relationships (ability to work with others, communication skills)\r\nAchievements\r\nOne-on-one meeting\r\nFor many employees, the face-to-face performance discussion is the most stressful work conversation they’ll have all year. But remember that your supervisor wants you to succeed at your job. If you and your supervisor have been communicating openly and frequently all year round, nothing in your evaluation should come as a surprise.\r\n\r\nAsk your supervisor if you can read the written evaluation prior to the meeting. This gives you time to consider the feedback and gather your thoughts before talking in person with your supervisor. And you should have the opportunity to provide input before the written evaluation is finalized.\r\n\r\nAfter you and your supervisor have discussed your evaluation, both of you need to sign the form. Your evaluation is stored in your departmental personnel file for three years.', 'https://blog.vantagecircle.com/content/images/2019/07/work-performance.png', 'Like most employees, you want to do well in your job. In order to do that, you need a clear understanding of what is expected of you. You may also need support and training to meet those expectations.\r\n\r\nPerformance management isn’t simply a once-a-year evaluation. Good performance management is a continuous, positive collaboration between you and your supervisor. By staying connected with your supervisor all year round, you can make adjustments to your work performance as needed, and your supervisor can assess and support your performance and ability to meet your annual goals.', 'https://www.examiz.com/wp-content/uploads/2020/02/os0019_1_6_1-1024x731.jpg', 'Planning for the year ahead');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `image_url`) VALUES
(1, 'RH', 'Groupe de la team RH', 'https://images.unsplash.com/photo-1573496130407-57329f01f769?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80'),
(2, 'R&D', 'Groupe de la team R&D', 'https://www.lemoci.com/wp-content/uploads/2015/09/innovation-turgaygundogdu.jpg'),
(3, 'Comptabilité', 'Groupe de la team comptabilité', 'https://img-0.journaldunet.com/soeDbPw55PQzmsx3RjxuMgCQVXU=/1500x/smart/2a1a7784bea34b23861c68336f865c3e/ccmcms-jdn/10827590.jpg'),
(4, 'Head', 'Groupe CEO et gestionnaires de l\'entreprise ', 'https://entreprendre.vienne-condrieu-agglomeration.fr/wp-content/uploads/2017/07/renforcer-votre-gestion-entreprise_SE-DEVELOPPER_600-X-355-px.jpg'),
(5, 'Ventes', 'Groupe de la team commerciale', 'https://www.pure-illusion.com/media/cache/article_detail/p/2017/08/29/optimisation-ecommerce.jpg'),
(6, 'Achats', 'Groupe de la team achats', 'https://img.actionco.fr/Img/BREVE/2019/3/338441/Comportement-achat-BtoB-quelle-evolution-quel-impact-techniques-ventes--F.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_general_ci NOT NULL,
  `origin_user_id` int NOT NULL,
  `destination_user_id` int NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `origin_user_id` (`origin_user_id`),
  KEY `destination_user_id` (`destination_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `body`, `origin_user_id`, `destination_user_id`, `is_read`, `datetime`) VALUES
(1, 'body body body body body body body body', 1, 5, 0, '2022-04-29 12:17:50'),
(2, 'reply \r\nbody body body body body body body body', 5, 1, 0, '2022-04-29 12:17:50'),
(3, 'body body body body body body body body body body body body body body body body body body body body body body ', 2, 5, 0, '2022-04-29 12:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `media_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `body` varchar(2083) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `media_url`, `body`, `create_at`, `user_id`) VALUES
(1, 'EdithO s’engage pour la place des collaborateurs de plus de 50 ans en entreprise\n', 'https://images.pexels.com/photos/8124232/pexels-photo-8124232.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'Placé sous le Haut Patronage de Madame Olivia Grégoire, Secrétaire d’Etat chargée de l’Économie sociale, solidaire et responsable auprès du ministre de l\'Économie, l’acte est composé de 10 engagements clefs autour du recrutement, de la formation, du maintien dans l’emploi, de l’accompagnement des évolutions de carrière, du bien-être au travail, du départ à la retraite et de la sensibilisation aux stéréotypes liés à l’âge.', '2022-04-20 17:24:10', 7),
(2, 'EdithO se mobilise pour l’égalité professionnelle F/H', 'https://images.pexels.com/photos/1367269/pexels-photo-1367269.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'Les inégalités professionnelles entre les femmes et les hommes restent au cœur des enjeux. Si la crise sanitaire a accentué cet écart, des avancées récentes telles que la Loi Rixain, promulguée en décembre dernier, participent à accélérer l’égalité économique et professionnelle entre les femmes et les hommes. Les entreprises jouant un rôle pivot dans ce domaine sont appelées de fait à se mobiliser.', '2022-04-20 17:24:10', 1),
(3, 'EdithO distingué pour la cinquième année consécutive comme l’une des entreprises les plus admirées au monde selon le classement Fortune Global 500', 'https://media.istockphoto.com/vectors/people-are-holding-stars-over-the-heads-feedback-consumer-or-customer-vector-id1170727252?k=20&m=1170727252&s=612x612&w=0&h=Yr4FQ_Z1mbnY4fZFJ6pV3lXVdhGlgmCmwcSrpEg1b24=', 'Être distingué comme l’une des entreprises les plus admirées au monde est un honneur particulier et reflète nos objectifs ambitieux ainsi que notre engagement en faveur du développement durable et de l’innovation. Nous poursuivrons notre chemin. Nous voulons faire en sorte que progrès et développement durable deviennent compatibles pour tous. ', '2022-04-20 17:24:10', 7),
(4, 'L’engagement d\'EdithO envers la diversité, l’équité et l’inclusion est reconnu par l’indice Bloomberg de performance pour la cinquième année consécutive', 'https://cdn.shrm.org/image/upload/c_crop,h_1194,w_2122,x_0,y_0/c_fit,f_auto,q_auto,w_767/v1/News/iStock-954307646_dtvwxe?databtoa=eyIxNng5Ijp7IngiOjAsInkiOjAsIngyIjoyMTIyLCJ5MiI6MTE5NCwidyI6MjEyMiwiaCI6MTE5NH19', 'a obtenu un résultat supérieur à la moyenne globale de l’indice GEI, avec son score le plus élevé dans la catégorie \"égalité salariale et parité salariale\" où l’entreprise a obtenu un résultat nettement supérieur à la moyenne globale de l’indice. Le \"Cadre mondial d’égalité salariale\" d’EdithOidentifie les écarts de rémunération hommes-femmes au sein de groupes comparables d’employés, et garantit la cohérence, l’équité et une plus grande transparence. EdithO s’est engagé à atteindre un écart salarial inférieur à 1 % entre les femmes et les hommes d’ici 2025.', '2022-04-20 17:24:10', 1),
(5, 'EdithO présente pour la 11e année consécutive au classement Corporate Knights des 100 entreprises les plus durables au monde', 'https://images.pexels.com/photos/1108572/pexels-photo-1108572.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'La société canadienne de médias et de recherche évalue chaque année plus de 6 900 entreprises à travers le monde pour désigner les plus performantes en matière de développement durable. Le classement se base sur 23 indicateurs de performance clés, avec 50 % du coefficient des scores attribués en fonction de la part des revenus et des investissements propres d’une entreprise. Selon Corporate Knights, les 100 entreprises nommées les plus durables sont plus performantes car elles parviennent à générer des revenus plus de quatre fois supérieurs, par tonne de carbone émise, que l’entreprise moyenne de l’indice MSCI All Country World.', '2022-04-20 17:24:10', 7),
(6, 'EdithO intègre le top 10 des meilleurs employeurs de France au classement Glassdoor du Choix des Employés 2022', 'https://images.pexels.com/photos/3321797/pexels-photo-3321797.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'Le classement Glassdoor du Choix des Employés est établi d’après les avis des employé(e)s ayant accepté de s’exprimer à propos de leur emploi, leur environnement de travail et leur entreprise sur le site Glassdoor. Avec une évaluation globale de 4,2 sur 5, les collaborateurs d\'EdithO en France interrogés se déclarent « très satisfaits » par la vie de leur entreprise.', '2022-04-20 17:24:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `media_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(2500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_general_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_posts_users_idx` (`user_id`),
  KEY `fk_posts_groups` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `media_url`, `link`, `body`, `created_at`, `last_update_datetime`, `user_id`, `group_id`) VALUES
(1, 'https://images.pexels.com/photos/3184433/pexels-photo-3184433.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', NULL, 'Le dispositif 100 Chances 100 Emplois sur le bassin chambérien en collaboration avec Manpower permet aux jeunes de 18-30 ans issus des quartiers populaires de la ville d\'être accompagnés par des entreprises dans la construction de leur projet professionnel.\n \nCes deux dernières semaines, 6 jeunes ont intégré le dispositif ! Après une semaine de coaching à la Mission Locale Jeunes du Bassin Chambérien, les professionnels ont pu leur donner des conseils concrets pour trouver un #emploi ou une #alternance, activer leur réseau…', '2022-01-03 00:00:00', '2022-04-13 11:58:04', 1, NULL),
(2, 'https://images.pexels.com/photos/5940842/pexels-photo-5940842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', NULL, 'Clap de fin sur notre #séminaire qui réunissait les équipes du siège et nos responsables de site durant 3 jours.  C’était l’occasion de se rencontrer à nouveau en présentiel, d’échanger, de partager et surtout de communiquer sur les nouveaux objectifs pour cette année 2022.', '2022-02-13 00:00:00', '2022-04-13 11:59:14', 3, NULL),
(3, 'https://images.pexels.com/photos/5023135/pexels-photo-5023135.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', NULL, 'Retour en images sur le Tournoi de Pétanque organisé par Le Réseau de Bordeaux à l\'Espace Garonne\n', '2022-01-28 00:00:00', '2022-04-13 11:59:11', 2, NULL),
(4, 'https://images.pexels.com/photos/433452/pexels-photo-433452.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', NULL, 'Nous sommes très fier.e.s d’avoir obtenu la première place du palmarès Best Workplaces France 2022, dans la catégorie des entreprises de plus de 2500 collaborateur.trice.s !\n\nCette première place couronne un effort collectif constant mené par nos équipes pour placer et maintenir.', '2022-02-24 00:00:00', '2022-04-13 11:59:15', 4, NULL),
(5, 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', NULL, 'Découvrez Robin, notre nouvelle recrue !  En tant que stagiaire commercial, il va découvrir pendant les 5 prochains mois le métier d’ingénieur d’affaires avec notre équipe de Lyon.  Curieux et investi, il apprend les ficelles du métier sous la tutelle de notre cher Maxime, de quoi devenir un as de la négociation B2B. Et comme d’habitude, on lui a posé quelques questions pour en apprendre plus sur lui !', '2022-03-11 00:00:00', '2022-04-13 11:59:17', 3, NULL),
(6, 'https://images.pexels.com/photos/3811082/pexels-photo-3811082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', NULL, 'Dans le cadre du projet des Cordées de la Réussite, les étudiants Ingénieurs CESI ont passés quelques jours au sein de nos équipes sur la conception et le prototypage de mini fusées, dont le lancement s\'est déroulé sur le site de l’Aérocampus de Bordeaux.', '2022-04-29 00:00:00', '2022-04-13 11:59:18', 2, 1),
(7, 'https://escape-kit.com/wp-content/uploads/2017/01/e4aa8ed_17040-1fko2ho.jpg', NULL, 'Pour renforcer la cohésion de nos équipes, nous vous proposons de participer  au Teambuilding de juin 2022, celui-ci se compose d\'un espace game au Escape Room de Bordeaux. 25 places disponibles.', '2022-04-30 00:00:00', '2022-04-20 11:59:26', 1, 1),
(8, 'https://www.toutetbon.fr/blog/wp-content/uploads/2020/01/2019-10-Tout-Bon-072-770x513.jpg', NULL, 'Apres 36ans au sein d\'EdithO l\'heure de la retraite à sonnée pour notre cher Philippe. Nous vous proposons de participer au pot de départ prévu ce vendredi à 16h dans la grande salle de réunion. Cacahuètes et apéricubes seront de la partie.', '2022-05-03 00:00:00', '2022-04-13 11:59:26', 1, NULL),
(9, 'https://www.protegez-vous.ca/var/protegez_vous/storage/images/_aliases/social_network_image/8/4/7/1/1531748-3-fre-CA/anniveraire.jpg', NULL, 'Charles fête aujourd\'hui ses 15ans d\'entreprise, nous vous proposons de féter ça autour d\'un gouter cet après-midi.', '2022-05-04 00:00:00', '2022-04-13 11:59:26', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tricks`
--

DROP TABLE IF EXISTS `tricks`;
CREATE TABLE IF NOT EXISTS `tricks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tricks`
--

INSERT INTO `tricks` (`id`, `title`, `media_url`, `body`) VALUES
(1, 'Accédez à un menu Démarrer avancé', 'https://img.bfmtv.com/c/0/708/0a97/6dc39c492b04815fe348745f6064.png', 'D’un simple clic droit sur le bouton du menu Démarrer, il est possible d’accéder à certaines options avancées sans avoir à naviguer dans d’interminables menus : Paramètres du système, gestionnaire des tâches, gestionnaire des périphériques, de nombreux menus liés au Système, etc.'),
(2, 'Redimensionnez automatiquement vos fenêtres sur la moitié de l’écran', 'https://img.bfmtv.com/c/0/708/fe4/5373407ff40718703db3d794d01d2.png', 'Cliquez sur la barre supérieure d’une fenêtre, et amenez le pointeur de la souris vers le bord droit ou gauche de l’écran. La fenêtre devrait automatiquement se coller du côté de l’écran où vous l’avez amenée et se redimensionner pour occuper la moitié de l’affichage. Il ne vous reste ensuite qu’à sélectionner la deuxième fenêtre que vous souhaitez conserver active pour qu’elle vienne se caser dans l’espace restant.'),
(3, 'Utilisez l’Assistant de concentration', 'https://img.bfmtv.com/c/0/708/0c59/6b410efe0801b2dab087c4824c49.png', 'Si votre degré de concentration chute à la moindre distraction, peut-être vaut-il mieux configurer l’Assistant de concentration de Windows 10. Grâce à lui, toutes les notifications que vous recevez habituellement sur votre machine seront passées sous silence.\n\nPour le trouver, rendez-vous dans les Paramètres, puis au sein du menu Système, entrez dans Assistant de concentration.'),
(4, 'Utilisez l’historique du presse-papier', 'https://img.bfmtv.com/c/0/708/1ce/8e18ec6971a2669e15a82dd75a51e.png', 'Le module est toutefois désactivé par défaut. Une fois configuré, il permet de stocker en mémoire plusieurs éléments que vous copiez à l’aide du raccourci Ctrl+C (texte, photos, etc.), l’accès à l’historique des éléments copié se faisant alors avec le raccourci Windows+V.'),
(5, 'Windows 11 est disponible : voici comment l’installer', 'https://f.hellowork.com/blogdumoderateur/2021/10/microsoft-windows-11.jpg', 'Si vous utilisez encore Windows 7 ou Windows 8, vous pouvez installer gratuitement Windows 10 avant d’installer la nouvelle version du système d’exploitation de Microsoft. Vous recevrez une notification de Windows Update pour vous informer dès que Windows 11 sera disponible'),
(11, 'Activer le dark mode', 'https://img.bfmtv.com/c/0/708/dba/a8faeb1b1250cc3183e3efae308c7.png', 'rendez-vous dans le menu Démarrer,\ncliquez sur Paramètres, puis Personnalisation,\ndans le menu Couleurs, choisissez le mode sombre.\nÀ noter : vous avez la possibilité de modifier votre thème pour une personnalisation plus poussée. Pour cela, rendez-vous dans Thèmes.'),
(12, 'Utiliser des widgets', 'https://f.hellowork.com/blogdumoderateur/2021/06/Windows-11-2.jpg', 'Il est possible d’ajouter d’autres widgets tels que les valeurs de la bourse, une liste de tâches, des photos, les résultats sportifs ou encore l’état du trafic. Pour insérer des widgets, il suffit de cliquer sur Ajouter des widgets ou sur votre photo de profil (située en haut à droite du menu). Vous pouvez aussi supprimer un raccourci en cliquant sur les trois points horizontaux situés dans le coin supérieur droit du widget en question, puis en sélectionnant Supprimer le widget.'),
(13, 'Personnaliser le menu Démarrer', 'https://f.hellowork.com/blogdumoderateur/2021/06/windows-11-interface.jpg', 'Avec la nouvelle interface du menu Démarrer, il est possible d’épingler les applications que vous avez l’habitude d’utiliser afin d’y accéder plus rapidement. Pour épingler une application, rendez-vous dans le menu Toutes les applications, puis effectuez un clic droit sur l’application que vous souhaitez épingler et choisissez Épingler au menu Démarrer.'),
(14, 'Optimiser l’espace d’affichage des fenêtres', 'https://f.hellowork.com/blogdumoderateur/2021/10/windows-11-ancrages-fenetres-1.jpg', 'Sur Windows 11, la mise en page des fenêtres a été repensée pour améliorer votre navigation. L’option Snap Layouts permet d’organiser ses fenêtres ouvertes parmi plusieurs modèles de dispositions. Ainsi, vous pouvez diviser votre écran par deux, par trois ou même par quatre et avoir accès à tous les onglets en un coup d’œil.\n\nIl est possible d’utiliser le raccourci Windows+z pour ancrer facilement vos fenêtres, ou de cliquer sur l’icône agrandir/rétrécir d’une fenêtre.'),
(15, 'Créer plusieurs espaces de travail', 'https://f.hellowork.com/blogdumoderateur/2021/10/windows-11-espaces-travail.jpg', 'Déjà disponible sous Windows 10, la fonction de bureau virtuel a été repensée pour la nouvelle version du système d’exploitation de Microsoft. Vous pouvez créer un nouveau bureau depuis le bouton Affichage des tâches (l’icône avec le carré noir et blanc) situé dans la barre des tâches, ou en utilisant ce raccourci clavier : Windows+Ctrl+d.\n\nPour passer d’un bureau à l’autre, il vous suffit d’appuyer à nouveau sur le bouton Affichage des tâches, ou de balayer votre écran tactile vers la gauche ou vers la droite avec 4 doigts.'),
(16, 'Enregistrer les paramètres de vos écrans externes', 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/i/edit/2021/07/windows-11-menu.jpg', 'Si vous avez l’habitude d’utiliser un (ou plusieurs) écran supplémentaire relié à votre PC, voici une fonctionnalité qui devrait vous plaire : Windows 11 offre la possibilité d’enregistrer les paramètres d’affichage de vos écrans. Concrètement, il est possible de sauvegarder la disposition de chaque fenêtre en fonction des moniteurs connectés. Voici la procédure à suivre :\n\nOuvrez le menu Démarrer, puis cliquez sur Paramètres,\nAppuyez sur Système, puis sur Affichage,\nCochez la case Mémoriser les emplacements des fenêtres en fonction de la connexion au moniteur.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `enrolment_date` date DEFAULT NULL,
  `email` varchar(320) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '/assets/images/logo-s.png',
  `birth_date` date DEFAULT NULL,
  `site_role` enum('user','editor','admin') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `position`, `enrolment_date`, `email`, `phone`, `image_url`, `birth_date`, `site_role`, `password`) VALUES
(1, 'Florence', 'Vallée', 'RH', '2018-01-03', 'florence.vallee@editho.com', '01.73.99.68.99', 'https://zupimages.net/up/22/15/pryj.jpg', '1976-11-09', 'admin', '$2y$10$xvILUYeVFgksPnGW4uze5eFcRPJqHJIFyRMPBnhJxT5EYhQ1KnBXu'),
(2, 'Alfred', 'Grandbois', 'Comptable Manager', '2006-04-10', 'grandbois.a@editho.com', '01.59.19.12.03\n', 'https://zupimages.net/up/22/15/cp53.png', '1960-05-25', 'editor', '$2y$10$ElyjwydvEObGcgrfviLQ5eCXNXL.9GCzQHl3USzcqu9Yelb6pFw9u'),
(3, 'Vivienne', 'Lacharité', 'Comptable', '2008-06-26', 'vivienne.lacharite@editho.com', '01.71.66.11.73\n', 'https://zupimages.net/up/22/15/fn1v.jpg', '1982-04-09', 'user', '$2y$10$w0xJ4p6KkzyLisHwvq5zrejX9nivl7Fvpv2aGXAFnMl9O/YPmD1p2'),
(4, 'Emmeline', 'Therriault', 'R&D Manager', '2016-09-02', 'emmeline.therriault@editho.com', '01.43.83.82.16\n', 'https://zupimages.net/up/22/15/s1g4.jpeg', '1977-05-02', 'editor', '$2y$10$O.55HL1bWbHnYYrTJmzO3eb70lDg5TNDrcgwGyWqFajkI2VHyNlpe'),
(5, 'Elon', 'Musk', 'Stagiaire-café', '2022-02-28', 'elon.musk@editho.com', '02.71.31.13.62\n', 'https://zupimages.net/up/22/15/wbug.jpeg', '1971-06-28', 'user', '$2y$10$uv8fELlkGjsVbm/A1aJXkOrR3IMwas1ogkSJFQMG5M9jG2CyysOYO'),
(6, 'Guy', 'Menier', 'Commercial', '2007-04-12', 'guy.mennier@editho.com', '06.74.65.40.34', 'https://zupimages.net/up/22/15/qad7.jpeg', '1980-07-12', 'user', '$2y$10$QI4buVMlSRCIhgd7AOvszOjqNtpA7hBAN3Dtvqvo938kN.7tNLPci'),
(7, 'John', 'Doe', 'CEO', '2004-03-20', 'john.doe@editho.com', '01.68.06.49.39\n', 'https://zupimages.net/up/22/15/ncsi.png', '1966-06-15', 'admin', '$2y$10$gXqIayGC.NW4vlEXkg7Q9OqP4qyspTYZg.vp0PC4p/Eo4LUqvl/2y'),
(8, 'Audric', 'Marcoux', 'Achats Manager ', '2019-05-06', 'audric.marcoux@editho.com', '03.32.30.48.40', 'https://zupimages.net/up/22/15/8yuu.png', '1985-09-15', 'editor', '$2y$10$vyrQFvbTeuljrT6BJ2eFbOuwUkZS7Rlbp.g7JNzmaislScL0zuZqq');

-- --------------------------------------------------------

--
-- Table structure for table `users_comments_likes`
--

DROP TABLE IF EXISTS `users_comments_likes`;
CREATE TABLE IF NOT EXISTS `users_comments_likes` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`comment_id`,`user_id`),
  KEY `fk_users_comments_reactions_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_comments_likes`
--

INSERT INTO `users_comments_likes` (`comment_id`, `user_id`) VALUES
(41, 1),
(41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_groups`
--

DROP TABLE IF EXISTS `users_has_groups`;
CREATE TABLE IF NOT EXISTS `users_has_groups` (
  `group_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `fk_users_has_groups_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_news_likes`
--

DROP TABLE IF EXISTS `users_news_likes`;
CREATE TABLE IF NOT EXISTS `users_news_likes` (
  `user_id` int NOT NULL,
  `news_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`news_id`),
  KEY `news_id_idx` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_news_likes`
--

INSERT INTO `users_news_likes` (`user_id`, `news_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(6, 1),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(3, 4),
(5, 4),
(6, 4),
(1, 5),
(5, 5),
(8, 5),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users_posts_likes`
--

DROP TABLE IF EXISTS `users_posts_likes`;
CREATE TABLE IF NOT EXISTS `users_posts_likes` (
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`post_id`),
  KEY `fk_users_posts_reactions_posts1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_posts_likes`
--

INSERT INTO `users_posts_likes` (`user_id`, `post_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 6),
(6, 6),
(1, 7),
(5, 7),
(8, 7),
(5, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elearning_content`
--
ALTER TABLE `elearning_content`
  ADD CONSTRAINT `fk_learning_contents` FOREIGN KEY (`elearning_id`) REFERENCES `elearning` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elearning_display`
--
ALTER TABLE `elearning_display`
  ADD CONSTRAINT `elearning_display_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `elearning_content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`origin_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`destination_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_comments_likes`
--
ALTER TABLE `users_comments_likes`
  ADD CONSTRAINT `fk_users_comments_reactions_comments1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_comments_reactions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_has_groups`
--
ALTER TABLE `users_has_groups`
  ADD CONSTRAINT `fk_users_has_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `fk_users_has_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_news_likes`
--
ALTER TABLE `users_news_likes`
  ADD CONSTRAINT `fk_news_likes` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_likes` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_posts_likes`
--
ALTER TABLE `users_posts_likes`
  ADD CONSTRAINT `fk_users_posts_reactions_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_posts_reactions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
