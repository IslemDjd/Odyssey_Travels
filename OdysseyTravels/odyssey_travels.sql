-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 juin 2023 à 01:58
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
-- Structure de la table `reservation_tour`
--

CREATE TABLE `reservation_tour` (
  `id` int(11) NOT NULL,
  `id_sejour` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_vol`
--

CREATE TABLE `reservation_vol` (
  `num_vol` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nbr_personne` int(50) NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date NOT NULL,
  `ville_depart` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ville_arive` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time_reservation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reservation_vol`
--

INSERT INTO `reservation_vol` (`num_vol`, `id`, `nbr_personne`, `date_depart`, `date_retour`, `ville_depart`, `ville_arive`, `time_reservation`) VALUES
(10, 42, 1, '2023-05-13', '2023-05-16', 'AAE', 'AMS', 'May 11, 2023, 1:48 pm'),
(12, 42, 1, '2023-05-26', '2023-05-31', 'AAE', 'BCN', 'May 14, 2023, 4:39 pm');

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
(40, 'anis', 'Debz', 'anissannabi2@gmail.com', '+213696566905', 'male', '17-1-2008', 518979774, '$2y$10$iG4DQfwAapt227j2FanJM.YSkkuqYTHM.e0lY6JVOxxdVOmFzDVP.', 1, '3b1d4ed7ffaea19860812b209789addd', 'May 10, 2023, 5:49 pm', '1683736128.jpg'),
(42, 'Islem', 'Dj', 'islemas23@gmail.com', '+213540329517', 'male', '27-11-2003', 622155040, '$2y$10$eLKFNQC9NJRZ6g6GJfQqeO5h2RbTResj8GQZBL0/8dgDEc29wj4Ra', 1, '6a67dd6de0a9546c8eef700b1d5b7aac', 'May 11, 2023, 12:59 pm', 'no-profil-picture-male.jpg');

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
-- Index pour la table `reservation_tour`
--
ALTER TABLE `reservation_tour`
  ADD PRIMARY KEY (`id_sejour`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD PRIMARY KEY (`num_vol`),
  ADD KEY `fk_reservation_client` (`id`),
  ADD KEY `ville_depart` (`ville_depart`),
  ADD KEY `ville_arive` (`ville_arive`);

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
-- AUTO_INCREMENT pour la table `reservation_tour`
--
ALTER TABLE `reservation_tour`
  MODIFY `id_sejour` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  MODIFY `num_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `sejour`
--
ALTER TABLE `sejour`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation_tour`
--
ALTER TABLE `reservation_tour`
  ADD CONSTRAINT `reservation_tour_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_tour_ibfk_2` FOREIGN KEY (`id_sejour`) REFERENCES `sejour` (`id`);

--
-- Contraintes pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD CONSTRAINT `fk_reservation_client` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_vol_ibfk_1` FOREIGN KEY (`ville_depart`) REFERENCES `ville_depart` (`code_iata`),
  ADD CONSTRAINT `reservation_vol_ibfk_2` FOREIGN KEY (`ville_arive`) REFERENCES `ville_arrivee` (`id_iata`);

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
