-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2022 at 11:29 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
                         `id` int NOT NULL,
                         `media_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                         `media_type` enum('img','image/jpg','video/mp4','image/png') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                         `body` text COLLATE utf8mb4_general_ci,
                         `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         `last_update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         `user_id` int NOT NULL,
                         `group_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `media_url`, `media_type`, `body`, `created_at`, `last_update_datetime`, `user_id`, `group_id`) VALUES
                                                                                                                               (1, 'https://images.pexels.com/photos/3184433/pexels-photo-3184433.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'img', 'Le dispositif 100 Chances 100 Emplois sur le bassin chambérien en collaboration avec Manpower permet aux jeunes de 18-30 ans issus des quartiers populaires de la ville d\'être accompagnés par des entreprises dans la construction de leur projet professionnel.\n \nCes deux dernières semaines, 6 jeunes ont intégré le dispositif ! Après une semaine de coaching à la Mission Locale Jeunes du Bassin Chambérien, les professionnels ont pu leur donner des conseils concrets pour trouver un #emploi ou une #alternance, activer leur réseau…', '2022-01-03 00:00:00', '2022-04-13 11:58:04', 1, NULL),
(2, 'https://images.pexels.com/photos/5940842/pexels-photo-5940842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'img', 'Clap de fin sur notre #séminaire qui réunissait les équipes du siège et nos responsables de site durant 3 jours.  C’était l’occasion de se rencontrer à nouveau en présentiel, d’échanger, de partager et surtout de communiquer sur les nouveaux objectifs pour cette année 2022.', '2022-02-13 00:00:00', '2022-04-13 11:59:14', 3, NULL),
(3, 'https://images.pexels.com/photos/5023135/pexels-photo-5023135.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'img', 'Retour en images sur le Tournoi de Pétanque organisé par Le Réseau de Bordeaux à l\'Espace Garonne\n', '2022-01-28 00:00:00', '2022-04-13 11:59:11', 2, NULL),
                                                                                                                               (4, 'https://images.pexels.com/photos/433452/pexels-photo-433452.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'img', 'Nous sommes très fier.e.s d’avoir obtenu la première place du palmarès Best Workplaces France 2022, dans la catégorie des entreprises de plus de 2500 collaborateur.trice.s !\n\nCette première place couronne un effort collectif constant mené par nos équipes pour placer et maintenir.', '2022-02-24 00:00:00', '2022-04-13 11:59:15', 4, NULL),
                                                                                                                               (5, 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'img', 'Découvrez Robin, notre nouvelle recrue !  En tant que stagiaire commercial, il va découvrir pendant les 5 prochains mois le métier d’ingénieur d’affaires avec notre équipe de Lyon.  Curieux et investi, il apprend les ficelles du métier sous la tutelle de notre cher Maxime, de quoi devenir un as de la négociation B2B. Et comme d’habitude, on lui a posé quelques questions pour en apprendre plus sur lui !', '2022-03-11 00:00:00', '2022-04-13 11:59:17', 3, NULL),
                                                                                                                               (6, 'https://images.pexels.com/photos/3811082/pexels-photo-3811082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'img', 'Dans le cadre du projet des Cordées de la Réussite, les étudiants Ingénieurs CESI ont passés quelques jours au sein de nos équipes sur la conception et le prototypage de mini fusées, dont le lancement s\'est déroulé sur le site de l’Aérocampus de Bordeaux.', '2022-04-29 00:00:00', '2022-04-13 11:59:18', 2, 1),
(7, 'https://escape-kit.com/wp-content/uploads/2017/01/e4aa8ed_17040-1fko2ho.jpg', 'img', 'Pour renforcer la cohésion de nos équipes, nous vous proposons de participer  au Teambuilding de juin 2022, celui-ci se compose d\'un espace game au Escape Room de Bordeaux. 25 places disponibles.', '2022-04-30 00:00:00', '2022-04-20 11:59:26', 1, 1),
                                                                                                                               (8, 'https://www.toutetbon.fr/blog/wp-content/uploads/2020/01/2019-10-Tout-Bon-072-770x513.jpg', 'img', 'Apres 36ans au sein d\'EdithO l\'heure de la retraite à sonnée pour notre cher Philippe. Nous vous proposons de participer au pot de départ prévu ce vendredi à 16h dans la grande salle de réunion. Cacahuètes et apéricubes seront de la partie.', '2022-05-03 00:00:00', '2022-04-13 11:59:26', 1, NULL),
                                                                                                                               (9, 'https://www.protegez-vous.ca/var/protegez_vous/storage/images/_aliases/social_network_image/8/4/7/1/1531748-3-fre-CA/anniveraire.jpg', 'img', 'Charles fête aujourd\'hui ses 15ans d\'entreprise, nous vous proposons de féter ça autour d\'un gouter cet après-midi.', '2022-05-04 00:00:00', '2022-04-13 11:59:26', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_posts_users_idx` (`user_id`),
  ADD KEY `fk_posts_groups` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
