-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 29 Mai 2019 à 14:07
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.3.5-1+0~20190503093827.38+stretch~1.gbp60a41b

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Maestro`
--

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_Partitions`
--

CREATE TABLE `asfbcvj_Partitions` (
  `id` int(11) NOT NULL,
  `pathPartition` varchar(120) NOT NULL,
  `datePartition` varchar(40) NOT NULL,
  `namePartition` varchar(40) NOT NULL,
  `id_asfbcvj_Users` int(11) NOT NULL,
  `id_asfbcvj_statusPartition` int(11) NOT NULL,
  `id_asfbcvj_typePartition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_Partitions`
--

INSERT INTO `asfbcvj_Partitions` (`id`, `pathPartition`, `datePartition`, `namePartition`, `id_asfbcvj_Users`, `id_asfbcvj_statusPartition`, `id_asfbcvj_typePartition`) VALUES
(1, 'partitions/4/Test.pdf', '2019-03-14', 'Test', 4, 1, 2),
(2, 'partitions/4/Piano test terminée.pdf', '2019-03-14', 'Piano test terminée', 4, 2, 2),
(3, 'partitions/4/En cours.pdf', '2019-03-14', 'En cours', 4, 1, 2),
(4, 'partitions/4/Afds.pdf', '2019-03-18', 'Afds', 4, 1, 1),
(5, 'partitions/4/CV.pdf', '2019-03-18', 'CV.pdf', 4, 1, 4),
(6, 'partitions/4/Rerrrrrrr.pdf', '2019-04-16', 'Rerrrrrrr', 4, 1, 1),
(7, 'partitions/4/Atdrggfc.pdf', '2019-04-16', 'Atdrggfc', 4, 1, 1),
(8, 'partitions/4/As test.pdf', '2019-04-16', 'As test', 4, 1, 1),
(9, 'partitions/4/Attestation_Maxime_DEFRETIN_210318.pdf', '2019-04-16', 'Attestation_Maxime_DEFRETIN_210318.pdf', 4, 1, 4),
(10, 'partitions/4/Re teste.pdf', '2019-04-16', 'Re teste', 4, 1, 1),
(11, 'partitions/4/Re teste.pdf', '2019-04-16', 'Re teste', 4, 1, 1),
(12, 'partitions/4/Doc20190409162023.pdf', '2019-04-16', 'Doc20190409162023.pdf', 4, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_statusPartition`
--

CREATE TABLE `asfbcvj_statusPartition` (
  `id` int(11) NOT NULL,
  `nameStatus` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_statusPartition`
--

INSERT INTO `asfbcvj_statusPartition` (`id`, `nameStatus`) VALUES
(1, 'Terminée'),
(2, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_typePartition`
--

CREATE TABLE `asfbcvj_typePartition` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_typePartition`
--

INSERT INTO `asfbcvj_typePartition` (`id`, `type`) VALUES
(1, 'Éditeur de partition'),
(2, 'Piano'),
(3, 'Batterie'),
(4, 'Partition envoyée');

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_Users`
--

CREATE TABLE `asfbcvj_Users` (
  `id` int(11) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `password` varchar(72) NOT NULL,
  `keyUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_Users`
--

INSERT INTO `asfbcvj_Users` (`id`, `lastName`, `firstName`, `mail`, `pseudo`, `password`, `keyUser`) VALUES
(4, 'Defretin', 'Paul', 'maximedefertin@gmail.com', 'Maxime', '$2y$10$Fh.ujzWV5SkGGuNqFTXYsOteqVAwi45VVd.w.IqZ14gC6tZS//ema', 7487),
(5, 'Defret', 'Max', 'maximedefretin@laposte.net', 'Max', '$2y$10$Fh.ujzWV5SkGGuNqFTXYsOteqVAwi45VVd.w.IqZ14gC6tZS//ema', 9560);

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_usersAvatar`
--

CREATE TABLE `asfbcvj_usersAvatar` (
  `id` int(11) NOT NULL,
  `pathAvatar` varchar(120) NOT NULL,
  `id_asfbcvj_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_usersAvatar`
--

INSERT INTO `asfbcvj_usersAvatar` (`id`, `pathAvatar`, `id_asfbcvj_Users`) VALUES
(1, 'avatar/4/26168348_118084882326247_4274051784081797820_n (copie).png', 4);

-- --------------------------------------------------------

--
-- Structure de la table `asfbcvj_usersComment`
--

CREATE TABLE `asfbcvj_usersComment` (
  `id` int(11) NOT NULL,
  `userComment` varchar(200) NOT NULL,
  `dateComment` char(10) NOT NULL,
  `id_asfbcvj_Users` int(11) DEFAULT NULL,
  `id_asfbcvj_Partitions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `asfbcvj_usersComment`
--

INSERT INTO `asfbcvj_usersComment` (`id`, `userComment`, `dateComment`, `id_asfbcvj_Users`, `id_asfbcvj_Partitions`) VALUES
(1, 'Afre', '2019-03-14', 5, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `asfbcvj_Partitions`
--
ALTER TABLE `asfbcvj_Partitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asfbcvj_Partitions_asfbcvj_statusPartition0_FK` (`id_asfbcvj_statusPartition`),
  ADD KEY `asfbcvj_Partitions_asfbcvj_typePartition1_FK` (`id_asfbcvj_typePartition`),
  ADD KEY `asfbcvj_Partitions_asfbcvj_Users_FK` (`id_asfbcvj_Users`);

--
-- Index pour la table `asfbcvj_statusPartition`
--
ALTER TABLE `asfbcvj_statusPartition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `asfbcvj_typePartition`
--
ALTER TABLE `asfbcvj_typePartition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `asfbcvj_Users`
--
ALTER TABLE `asfbcvj_Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `asfbcvj_usersAvatar`
--
ALTER TABLE `asfbcvj_usersAvatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asfbcvj_usersAvatar_asfbcvj_Users_AK` (`id_asfbcvj_Users`);

--
-- Index pour la table `asfbcvj_usersComment`
--
ALTER TABLE `asfbcvj_usersComment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asfbcvj_usersComment_asfbcvj_Partitions0_FK` (`id_asfbcvj_Partitions`),
  ADD KEY `id_asfbcvj_Users` (`id_asfbcvj_Users`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `asfbcvj_Partitions`
--
ALTER TABLE `asfbcvj_Partitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `asfbcvj_statusPartition`
--
ALTER TABLE `asfbcvj_statusPartition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `asfbcvj_typePartition`
--
ALTER TABLE `asfbcvj_typePartition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `asfbcvj_Users`
--
ALTER TABLE `asfbcvj_Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `asfbcvj_usersAvatar`
--
ALTER TABLE `asfbcvj_usersAvatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `asfbcvj_usersComment`
--
ALTER TABLE `asfbcvj_usersComment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `asfbcvj_Partitions`
--
ALTER TABLE `asfbcvj_Partitions`
  ADD CONSTRAINT `asfbcvj_Partitions_asfbcvj_Users_FK` FOREIGN KEY (`id_asfbcvj_Users`) REFERENCES `asfbcvj_Users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asfbcvj_Partitions_asfbcvj_statusPartition0_FK` FOREIGN KEY (`id_asfbcvj_statusPartition`) REFERENCES `asfbcvj_statusPartition` (`id`),
  ADD CONSTRAINT `asfbcvj_Partitions_asfbcvj_typePartition1_FK` FOREIGN KEY (`id_asfbcvj_typePartition`) REFERENCES `asfbcvj_typePartition` (`id`);

--
-- Contraintes pour la table `asfbcvj_usersAvatar`
--
ALTER TABLE `asfbcvj_usersAvatar`
  ADD CONSTRAINT `asfbcvj_usersAvatar_asfbcvj_Users_FK` FOREIGN KEY (`id_asfbcvj_Users`) REFERENCES `asfbcvj_Users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `asfbcvj_usersComment`
--
ALTER TABLE `asfbcvj_usersComment`
  ADD CONSTRAINT `asfbcvj_usersComment_asfbcvj_Partitions0_FK` FOREIGN KEY (`id_asfbcvj_Partitions`) REFERENCES `asfbcvj_Partitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_asfbcvj_Users` FOREIGN KEY (`id_asfbcvj_Users`) REFERENCES `asfbcvj_Users` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
