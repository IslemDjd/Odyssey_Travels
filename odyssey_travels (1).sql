-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 mai 2023 à 23:25
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `odyssey_travels`
--

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE `sejour` (
  `id` int(6) UNSIGNED NOT NULL,
  `dates` date NOT NULL,
  `heures` time NOT NULL,
  `ville_depart` varchar(3) NOT NULL,
  `ville_arrivee` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `programme_detaille` text DEFAULT NULL,
  `prix` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sejour`
--

INSERT INTO `sejour` (`id`, `dates`, `heures`, `ville_depart`, `ville_arrivee`, `programme_detaille`, `prix`) VALUES
(1, '2023-05-04', '08:00:00', 'AAE', 'BCN', NULL, '280000'),
(2, '2023-05-25', '20:00:00', 'ALG', 'CDG', NULL, '300000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tele` varchar(13) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `id_user` int(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `checkk` tinyint(2) NOT NULL DEFAULT 0,
  `code_verif` varchar(255) NOT NULL,
  `time` varchar(70) NOT NULL,
  `profile_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `tele`, `gender`, `birthday`, `id_user`, `password`, `checkk`, `code_verif`, `time`, `profile_picture`) VALUES
(37, 'Islem', 'Dj', 'islemas23@gmail.com', '+213540329517', 'male', '27-11-2003', 939558470, '$2y$10$t7aQiO1jyyq6wMetUREcO.H3Uh/qYjYiLjVinup2x/OfHWOBzWv0O', 1, '108bf7830b2bf25674b604a80c069b90', 'May 4, 2023, 11:15 pm', '');

-- --------------------------------------------------------

--
-- Structure de la table `ville_arrivee`
--

CREATE TABLE `ville_arrivee` (
  `id_iata` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` text DEFAULT NULL,
  `pays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville_arrivee`
--

INSERT INTO `ville_arrivee` (`id_iata`, `nom`, `description`, `pays`) VALUES
('AMS', 'Amesterdam', NULL, 'Pays Bas'),
('BCN', 'Barcelone', NULL, 'Espagne'),
('BRU', 'Brussels', NULL, 'Belgique'),
('CDG', 'Paris', NULL, 'France'),
('DPS', 'Bali', NULL, 'Indonesie'),
('FCO', 'Rome', NULL, 'Italy'),
('FLR', 'Florence', NULL, 'Italy'),
('JFK', 'New York', NULL, 'USA'),
('JMK', 'Mykonos', NULL, 'Greece'),
('KUL', 'Kuala lampur', NULL, 'Malysie'),
('LAX', 'Los Angeles', NULL, 'USA'),
('LHR', 'London', NULL, 'UK'),
('MXP', 'Milano', NULL, 'Italy'),
('NRT', 'Tokyo', NULL, 'Japan'),
('SFO', 'San Fransisco', NULL, 'USA'),
('SIN', 'Singapore', NULL, 'Singapore'),
('SVO', 'Moscow', NULL, 'Russia'),
('SYD', 'Sydney', NULL, 'Australie'),
('TXL', 'Berlin', NULL, 'Allemagne'),
('VCE', 'Venice', NULL, 'Italy');

-- --------------------------------------------------------

--
-- Structure de la table `ville_depart`
--

CREATE TABLE `ville_depart` (
  `code_ville` int(3) NOT NULL,
  `code_iata` varchar(3) NOT NULL,
  `nom_ville` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville_depart`
--

INSERT INTO `ville_depart` (`code_ville`, `code_iata`, `nom_ville`) VALUES
(23, 'AAE', 'Annaba'),
(16, 'ALG', 'Alger'),
(6, 'BJA', 'Bejaia'),
(5, 'BLJ', 'Batna'),
(50, 'BMW', 'B.B Mokhtar'),
(7, 'BSK', 'Biskra'),
(28, 'BUJ', 'M\'Sila - Bou Saâda'),
(8, 'CBH', 'Bechar'),
(25, 'CZL', 'Constantine'),
(56, 'DJG', 'Djanet'),
(32, 'EBH', 'El Bayadh'),
(58, 'ELG', 'El Meniaa'),
(39, 'ELU', 'El Oued'),
(47, 'GHA', 'Ghardaïa'),
(18, 'GJL', 'Jijel '),
(30, 'HME', 'Ouargla - Hassi Messaoud'),
(3, 'HRM', 'Laghouat -Hassi R\'Mel'),
(33, 'IAM', 'Illizi - In Amenas'),
(54, 'INF', 'In Guezzam'),
(53, 'INZ', 'In Salah'),
(3, 'LOO', 'Laghouat - Laghouat '),
(29, 'MUW', 'Mascara - Ghriss'),
(45, 'MZW', 'Naâma - Méchria'),
(30, 'OGX', 'Ouargla - Ouargla '),
(31, 'ORN', 'Oran'),
(2, 'QAS', 'Chlef'),
(17, 'QDJ', 'Djelfa'),
(19, 'QSF', 'Sétif'),
(12, 'TEE', 'Tébessa'),
(55, 'TGR', 'Touggourt'),
(14, 'TID', 'Tiaret'),
(37, 'TIN', 'Tindouf'),
(13, 'TLM', 'Tlemcen'),
(11, 'TMR', 'Tamanrasset'),
(49, 'TMX', 'Timimoun'),
(33, 'VVZ', 'Illizi - Illizi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sejour_villedepart` (`ville_depart`),
  ADD KEY `fk_sejour_villearrivee` (`ville_arrivee`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Index pour la table `ville_arrivee`
--
ALTER TABLE `ville_arrivee`
  ADD PRIMARY KEY (`id_iata`);

--
-- Index pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  ADD PRIMARY KEY (`code_iata`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sejour`
--
ALTER TABLE `sejour`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `fk_sejour_villearrivee` FOREIGN KEY (`ville_arrivee`) REFERENCES `ville_arrivee` (`id_iata`),
  ADD CONSTRAINT `fk_sejour_villedepart` FOREIGN KEY (`ville_depart`) REFERENCES `ville_depart` (`code_iata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
