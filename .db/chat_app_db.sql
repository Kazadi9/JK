-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 nov. 2024 à 11:22
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat_app_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(1, 4, 3, 'bonjour kalume', 1, '2024-10-25 18:19:57'),
(2, 3, 4, 'Bonjour Jean Comment ça va ?', 0, '2024-10-25 18:21:55'),
(3, 3, 2, 'salut kaka', 0, '2024-10-25 18:22:16'),
(4, 3, 2, 'bonjour \n', 0, '2024-10-25 18:24:25'),
(5, 5, 3, 'Bonjour kaka Kalume', 1, '2024-10-25 18:55:56'),
(6, 5, 4, 'salut kaka Jean \n', 0, '2024-10-25 18:56:27'),
(7, 7, 5, 'Bonjour frère', 1, '2024-10-25 19:03:06'),
(8, 5, 7, 'Bonjour grand \nniaye?', 0, '2024-10-25 19:04:03'),
(9, 5, 1, 'hey', 0, '2024-10-25 19:04:23'),
(10, 8, 2, 'Salut Jean\n\ncomment tu vas?', 0, '2024-10-25 19:06:28'),
(11, 8, 5, 'bonjour', 1, '2024-10-25 19:06:52'),
(12, 8, 7, 'bonjour ', 0, '2024-10-25 19:07:06'),
(13, 8, 3, 'salut kaka', 1, '2024-10-25 19:07:24'),
(14, 8, 4, 'salut ', 0, '2024-10-25 19:07:52'),
(15, 5, 8, 'Bonjour vous allez bien?\n', 1, '2024-10-25 19:10:23'),
(16, 5, 7, 'nisawa mon cher naweye niaye \n', 0, '2024-10-25 19:11:32'),
(17, 8, 5, 'oui je vais bien et vous ', 0, '2024-10-25 19:13:14'),
(18, 3, 8, 'Salut comment ça va?', 1, '2024-10-25 19:14:35'),
(19, 3, 5, 'bonjour vous allez bien?', 0, '2024-10-25 19:15:00'),
(20, 9, 8, 'SALUT', 1, '2024-10-25 19:17:39'),
(21, 9, 8, 'Comment tu vas Kethia', 1, '2024-10-25 19:17:48'),
(22, 8, 9, 'Je vais bien ', 0, '2024-10-25 19:20:58'),
(23, 10, 8, 'bonjour ', 1, '2024-10-25 19:23:29'),
(24, 8, 10, 'Bonjour ', 0, '2024-10-25 19:24:13'),
(25, 8, 5, 'NIAYE SASA', 0, '2024-10-25 19:30:05'),
(26, 8, 8, 'Hello', 1, '2024-10-25 19:30:20'),
(27, 8, 8, 'ça va ?', 1, '2024-10-25 19:30:34'),
(28, 12, 8, 'salut madame', 1, '2024-10-30 16:59:51'),
(29, 8, 12, 'bonjour monsieur\n', 1, '2024-10-30 17:00:19'),
(30, 13, 2, 'sycrsxrtrt', 0, '2024-10-30 17:07:12'),
(31, 13, 8, 'salut', 1, '2024-10-30 17:17:41'),
(32, 8, 13, 'salut kaka ça va?', 1, '2024-10-30 17:18:25'),
(33, 13, 8, 'oui Gloria et toi?', 1, '2024-10-30 17:18:55'),
(34, 8, 13, 'je vais bien aussi\n', 1, '2024-10-30 17:19:41'),
(35, 16, 15, 'bonsoir\n', 0, '2024-11-03 00:39:22'),
(36, 17, 4, 'Jean comment?', 0, '2024-11-03 02:50:39'),
(37, 18, 17, 'Salut', 1, '2024-11-03 07:39:30'),
(38, 17, 18, 'comment tu vas?', 1, '2024-11-03 07:39:58'),
(39, 16, 15, 'Bonsoir ', 0, '2024-11-03 19:04:10'),
(40, 16, 9, 'salut\n', 0, '2024-11-03 19:04:37'),
(41, 16, 14, 'Bonjour ', 0, '2024-11-03 19:17:44'),
(42, 22, 15, 'salut', 0, '2024-11-03 19:55:51'),
(43, 23, 1, 'slalut', 0, '2024-11-04 14:39:19'),
(44, 25, 12, 'Bonjour Lucas\n', 0, '2024-11-06 06:27:22'),
(45, 25, 17, 'bonjour Françine', 1, '2024-11-06 06:27:50'),
(46, 17, 25, 'hj\n', 0, '2024-11-07 09:30:01');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 4, 3),
(2, 3, 2),
(3, 5, 3),
(4, 5, 4),
(5, 7, 5),
(6, 5, 1),
(7, 8, 2),
(8, 8, 5),
(9, 8, 7),
(10, 8, 3),
(11, 8, 4),
(12, 9, 8),
(13, 10, 8),
(14, 8, 8),
(15, 12, 8),
(16, 13, 2),
(17, 13, 8),
(18, 16, 15),
(19, 17, 4),
(20, 18, 17),
(21, 16, 9),
(22, 16, 14),
(23, 22, 15),
(24, 23, 1),
(25, 25, 12),
(26, 25, 17);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `Id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  `p_p` varchar(255) DEFAULT 'user-default.png',
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `phone`, `sexe`, `password`, `fonction`, `p_p`, `last_seen`) VALUES
(1, 'Jean', 'zadio', '999999900', 'M', '$2y$10$NgA9sTYihy4ZNhJYu1nGmeUATvq5oczzvwIC.2OHGydz4X/A6gQKW', NULL, 'zadio.jpeg', '2024-11-05 23:05:38'),
(2, 'Jean ', 'Kabeya', NULL, NULL, '$2y$10$3rrmosab3lFs.hS2N.g31.TciRZ.mOsVklsVqGV56nEQPEt4QVoje', NULL, 'Kabeya.jpeg', '2024-10-25 18:15:15'),
(3, 'Kalume', 'Jospin', NULL, NULL, '$2y$10$D6iugKEAcRL5GsJpeHbXru17tBHVeQiAHC931emZOCp38Ifl2BB/K', NULL, 'Jospin.jpg', '2024-10-30 16:54:53'),
(4, 'Jean ', 'Kabasele', NULL, NULL, '$2y$10$BPQShw9q4ajNDqwxssLrmuaoaJBqU7PtTO1jc5Qngk/5t4znjrpg.', NULL, 'Kabasele.jpeg', '2024-10-25 18:20:31'),
(5, 'Christian ', 'Luhari', NULL, NULL, '$2y$10$hYR9Fzk8k.cNpc71GHqHNer4Gbg.wCS0zrBE1s0IZg17ZkGZRbVua', NULL, 'Luhari.jpg', '2024-10-25 19:29:49'),
(7, 'Manegabe', 'Justin', NULL, NULL, '$2y$10$1w.ck3MB1bwj/BLF4mdzMem1KZgzxiYQ/Tb4k0/Lo/spVJpetBgZ.', NULL, 'Justin.jpg', '2024-10-25 19:03:29'),
(8, 'Gloria', 'Bahereni', NULL, NULL, '$2y$10$1iwPqxYkBeLO20K8lZeELO4.kyau8JJQycc4rw5ESGTq837WoINNW', NULL, 'Bahereni.jpg', '2024-11-01 15:19:40'),
(9, 'Kethia ', 'Isamuna', NULL, NULL, '$2y$10$aAk1hn0wr8/.17S9.eGbV.6vo1V0W4c6U0pDdTAM3M9tVj9eVb9Ty', NULL, 'Isamuna.jpg', '2024-10-25 19:20:17'),
(10, 'Janvier ', 'Bwanakambi', NULL, NULL, '$2y$10$rqWv3TrHh0xaNDs1VBysJ.1obPpQtPOApsb9l1zzT4L4EcCfj8wiy', NULL, 'Bwanakambi.jpg', '2024-10-25 19:23:30'),
(11, 'Faustin', 'Armil', NULL, NULL, '$2y$10$XlKH08KUqxQ0RP6EDWr2D.Qgl9ccCVROMaRvyXCrofhAdIDXbrAN2', NULL, 'Armil.jpg', '2024-10-25 19:28:24'),
(12, 'Lucas', 'Kiswahili', NULL, NULL, '$2y$10$wPvmRyiBXC1bqH8mCD45t.4O.RFtwMgerdqLztsp9IKtw.S9fnRre', NULL, 'Kiswahili.jpg', '2024-10-30 17:00:48'),
(14, 'Bilomba Kazadi', 'Jean', NULL, NULL, '$2y$10$utLUA.1qgXq5zY.WXf/Gpe1EvgDQdcmLQDa5iJMD3mVJrcPUEyC3a', NULL, 'Jean.jpg', '2024-11-02 21:49:32'),
(15, 'Christine ', 'lobo', NULL, NULL, '$2y$10$OHz/3/rQgMW/T0cfkkRpd.b.MPYd2X/A0cIYMvG.d/2fd11BjaZJG', NULL, 'lobo.jpg', '2024-11-02 21:55:39'),
(16, 'Jean ', 'Kqlonji', '977275898', 'M', '$2y$10$JUhT/.9WaG08FicIJyj65.JnNj/9mdeS41T8bG6yJUaj9DpnSOfXK', 'chantre', 'Kqlonji.jpg', '2024-11-06 04:39:35'),
(17, 'Françine', 'Chikoza', '988900900', 'F', '$2y$10$o/maF0DdD0EhYV3M6HSGBeVR6Td6OpEaL.o9MxIiB6n4h9E7CCA1.', 'intercesseur', 'Chikoza.jpg', '2024-11-07 09:57:07'),
(18, 'Ashuza', 'Muhigirwa', '973323434', 'M', '$2y$10$JcfAmODp4A.Fs7caUoBvfePmKHsVVFVKWu3IIFse9EB1.cN3.HSDG', 'intercesseur', 'Muhigirwa.jpg', '2024-11-03 07:41:16'),
(19, 'Despat ', 'Dizashi', '973323434', 'M', '$2y$10$N6JHBwFttlTVwAFN3hWxbOMK9vWNyPHNi/./prJeUj1XcI5XKQtIy', 'intercesseur', 'Dizashi.jpg', '2024-11-03 19:09:15'),
(22, 'OSCAR', 'ASUKULU', '859132681', 'M', '$2y$10$xuNl4fjoHXsgRp9VRVaJHOwuNq8sSfAu8fqldO07.KDlQF7MH7lty', 'chantre', 'ASUKULU.jpg', '2024-11-03 20:00:39'),
(23, 'elysée', 'kis', '978206034', 'M', '$2y$10$m1FO1PAcqt/bwOjsHDYOB.5RDgj2jlJ0OoHXQxzo9sP3SlfFV/.yy', 'chantre', 'kis.jpg', '2024-11-04 20:48:31'),
(24, 'Shally', 'Shemulao', '987654321', 'M', '$2y$10$Q50xSosxcWxdn6Fi5dzt8.65E1y0pjOiQ4RykpiFSvnAzwkClkTsq', 'protocole', 'Shemulao.jpg', '2024-11-06 05:47:07'),
(25, 'Vanessa ', 'Sebagenzi', '977376678', 'F', '$2y$10$ChhGYZfUgU4VfMZWe6UWYOBA/gK6RPgzI11OGGTizxoOABI/UJJEO', 'intercesseur', 'Sebagenzi.jpg', '2024-11-06 08:05:38'),
(26, 'Jean ', 'Kazadi ', '977654321', 'M', '$2y$10$5w3GPhMNioCCv07AFzjC0.0ftMd9qedrxB5kmW9ocLqqsqYMV1YhS', 'prédicateur', 'Kazadi .jpg', '2024-11-06 09:12:01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
