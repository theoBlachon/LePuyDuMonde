-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 oct. 2022 à 11:49
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `puydumonde`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nom_admin` varchar(25) NOT NULL,
  `prenom_admin` varchar(25) NOT NULL,
  `mailadmin` varchar(25) NOT NULL,
  `mdp_admin` varchar(10) NOT NULL,
  `pseudo_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `prenom_admin`, `mailadmin`, `mdp_admin`, `pseudo_admin`) VALUES
(1, 'ETTER', 'Christopher', 'chris-admin@gmail.fr', '123456', 'MonsieurChris'),
(3, 'BLACHON', 'Theo', 'blachon-admin@gmail.fr', '678910', 'TETRIS3000');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(4) NOT NULL,
  `nom_artiste` varchar(25) NOT NULL,
  `prenom_artiste` varchar(25) NOT NULL,
  `metier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_billets` int(4) NOT NULL,
  `id_concert` int(4) NOT NULL,
  `id_client` int(4) NOT NULL,
  `date_billet` date NOT NULL,
  `Id_tarifplein` int(4) NOT NULL,
  `Id_tarifreduit` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(4) NOT NULL,
  `nom_client` varchar(25) NOT NULL,
  `prenom_client` varchar(25) NOT NULL,
  `telephone_client` varchar(10) NOT NULL,
  `mail_client` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

CREATE TABLE `concert` (
  `id_concert` int(4) NOT NULL,
  `nom_concert` varchar(25) NOT NULL,
  `prix_concert` float NOT NULL,
  `id_artiste` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `Id_pays` int(4) NOT NULL,
  `nom_pays` varchar(25) NOT NULL,
  `img_drap` varchar(100) NOT NULL,
  `img_photo` varchar(100) NOT NULL,
  `id_stands` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stands`
--

CREATE TABLE `stands` (
  `id_stands` int(4) NOT NULL,
  `Description_stands` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tarif_plein`
--

CREATE TABLE `tarif_plein` (
  `Id_tarifplein` int(4) NOT NULL,
  `prix_tarifplein` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tarif_reduit`
--

CREATE TABLE `tarif_reduit` (
  `id_tarifreduit` int(4) NOT NULL,
  `prix_tarifreduit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id_artiste`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billets`),
  ADD KEY `id_concert` (`id_concert`),
  ADD KEY `id_reservations` (`id_client`),
  ADD KEY `Id_tarifplein` (`Id_tarifplein`),
  ADD KEY `Id_tarifreduit` (`Id_tarifreduit`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id_concert`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`Id_pays`),
  ADD KEY `id_stands` (`id_stands`);

--
-- Index pour la table `stands`
--
ALTER TABLE `stands`
  ADD PRIMARY KEY (`id_stands`);

--
-- Index pour la table `tarif_plein`
--
ALTER TABLE `tarif_plein`
  ADD PRIMARY KEY (`Id_tarifplein`);

--
-- Index pour la table `tarif_reduit`
--
ALTER TABLE `tarif_reduit`
  ADD PRIMARY KEY (`id_tarifreduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id_artiste` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billets` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `id_concert` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `Id_pays` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stands`
--
ALTER TABLE `stands`
  MODIFY `id_stands` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tarif_plein`
--
ALTER TABLE `tarif_plein`
  MODIFY `Id_tarifplein` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tarif_reduit`
--
ALTER TABLE `tarif_reduit`
  MODIFY `id_tarifreduit` int(4) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`id_concert`) REFERENCES `concert` (`id_concert`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `billet_ibfk_3` FOREIGN KEY (`Id_tarifplein`) REFERENCES `tarif_plein` (`Id_tarifplein`),
  ADD CONSTRAINT `billet_ibfk_4` FOREIGN KEY (`Id_tarifreduit`) REFERENCES `tarif_reduit` (`id_tarifreduit`);

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`id_stands`) REFERENCES `stands` (`id_stands`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
