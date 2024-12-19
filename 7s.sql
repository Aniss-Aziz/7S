-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 déc. 2024 à 09:31
-- Version du serveur : 5.7.24
-- Version de PHP : 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `7s`
--

-- --------------------------------------------------------
-- Table structure for table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publication` datetime NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cinema`
--

INSERT INTO `cinema` (`id`, `nom`, `portable`, `email`, `adresse`, `seance`) VALUES
(1, 'Wilson', '06 52 28 31 54', 'wilson@contact.fr', 'Rue Wilson', '22:40'),
(2, 'Pathé', '06 52 28 41 74', 'pathe@contact.fr', '91 rue des feaubourd', '22:45');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241217145652', '2024-12-17 15:57:04', 133),
('DoctrineMigrations\\Version20241217151211', '2024-12-17 16:12:17', 228),
('DoctrineMigrations\\Version20241218085944', '2024-12-18 09:59:49', 114),
('DoctrineMigrations\\Version20241218091150', '2024-12-18 10:13:30', 79),
('DoctrineMigrations\\Version20241218091326', '2024-12-18 10:13:30', 18),
('DoctrineMigrations\\Version20241218100918', '2024-12-19 06:42:59', 30),
('DoctrineMigrations\\Version20241219061528', '2024-12-19 06:42:59', 22),
('DoctrineMigrations\\Version20241219062623', '2024-12-19 06:42:59', 22),
('DoctrineMigrations\\Version20241219065050', '2024-12-19 06:51:01', 50);


-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessibilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_sortie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `image`, `accessibilite`, `realisateur`, `date_sortie`) VALUES
(1, 'jamais sans mon psy', 'lorem ipsum', 'https://media.pathe.fr/home/featuring/backdrop/167803/lg/1/desktop-visuel.jpg', 'LSF', 'Jean Edouard', '2024-01-01 00:00:00'),
(2, 'Charlie et la chocolaterie', 'lorem ipsum', 'https://media.pathe.fr/home/featuring/backdrop/167803/lg/1/desktop-visuel.jpg', 'LSF', '', '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `film_cinema`
--

CREATE TABLE `film_cinema` (
  `film_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film_cinema`
--

INSERT INTO `film_cinema` (`film_id`, `cinema_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actualite`
--
ALTER TABLE `actualite`
    ADD PRIMARY KEY (`id`);
--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film_cinema`
--
ALTER TABLE `film_cinema`
  ADD PRIMARY KEY (`film_id`,`cinema_id`),
  ADD KEY `IDX_BF7139BE567F5183` (`film_id`),
  ADD KEY `IDX_BF7139BEB4CB84B6` (`cinema_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

-- AUTO_INCREMENT for table `actualite`
--
ALTER TABLE `actualite`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film_cinema`
--
ALTER TABLE `film_cinema`
  ADD CONSTRAINT `FK_BF7139BE567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BF7139BEB4CB84B6` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
