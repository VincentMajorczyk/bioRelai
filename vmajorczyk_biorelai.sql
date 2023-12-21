-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 déc. 2023 à 05:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vmajorczyk_biorelai`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` int NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`) VALUES
(0),
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(40) NOT NULL,
  PRIMARY KEY (`idCategorie`),
  UNIQUE KEY `nomCategorie` (`nomCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(2, 'fruits'),
(1, 'légumes');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `idVente` int DEFAULT NULL,
  `idAdherent` int DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `commande_FK_vente` (`idVente`),
  KEY `commande_FK_adherent` (`idAdherent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `idVente`, `idAdherent`) VALUES
(1, '2023-12-05', 1, 0),
(2, '2023-11-07', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lignescommande`
--

DROP TABLE IF EXISTS `lignescommande`;
CREATE TABLE IF NOT EXISTS `lignescommande` (
  `idCommande` int NOT NULL,
  `idProduit` int NOT NULL,
  `quantite` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `lignesCommande_FK_produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignescommande`
--

INSERT INTO `lignescommande` (`idCommande`, `idProduit`, `quantite`) VALUES
(1, 1, '10.00'),
(1, 3, '20.00'),
(2, 2, '50.00');

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

DROP TABLE IF EXISTS `producteur`;
CREATE TABLE IF NOT EXISTS `producteur` (
  `idProducteur` int NOT NULL AUTO_INCREMENT,
  `adresseProducteur` varchar(50) DEFAULT NULL,
  `communeProducteur` varchar(40) DEFAULT NULL,
  `codePostalProducteur` varchar(5) DEFAULT NULL,
  `descriptifProducteur` text,
  `photoProducteur` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idProducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `producteur`
--

INSERT INTO `producteur` (`idProducteur`, `adresseProducteur`, `communeProducteur`, `codePostalProducteur`, `descriptifProducteur`, `photoProducteur`) VALUES
(1, '54 rue des mangeurs de patates', 'truc', '48784', 'Des carottes', NULL),
(2, '27 rue des mangeurs de patates', 'truc', '33000', 'Des patates', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(50) NOT NULL,
  `descriptifProduit` text,
  `photoProduit` varchar(40) DEFAULT NULL,
  `idProducteur` int DEFAULT NULL,
  `idCategorie` int DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  UNIQUE KEY `nomProduit` (`nomProduit`),
  KEY `produit_FK_Producteur` (`idProducteur`),
  KEY `produit_FK_Categorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `descriptifProduit`, `photoProduit`, `idProducteur`, `idCategorie`) VALUES
(1, 'patates', 'des légumes, ou quoi que ce soit que c\'est, c\'est très bon', NULL, 2, 1),
(2, 'carotte', 'Des légumes frais et qui sont bons', NULL, 2, 1),
(3, 'pommes', 'Des fruits juteux', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `idVente` int NOT NULL,
  `idProduit` int NOT NULL,
  `unite` varchar(10) DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `prix` int DEFAULT NULL,
  PRIMARY KEY (`idVente`,`idProduit`),
  KEY `proposer_FK_produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proposer`
--

INSERT INTO `proposer` (`idVente`, `idProduit`, `unite`, `quantite`, `prix`) VALUES
(1, 1, '10', 50, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `statut` varchar(15) DEFAULT NULL,
  `nomUtilisateur` varchar(40) DEFAULT NULL,
  `prenomUtilisateur` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`,`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES
(0, 'user1@gmail.com', 'user1', 'adherents', 'Dupont', 'Pierre'),
(1, 'user2@gmail.com', 'user2', 'adherents', 'Salit', 'Mars'),
(2, 'user3@gmail.com', 'user3', 'adherents', 'Arrant', 'Luc');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `idVente` int NOT NULL AUTO_INCREMENT,
  `dateVente` date DEFAULT NULL,
  `dateDebutProd` date DEFAULT NULL,
  `dateFinProd` date DEFAULT NULL,
  `dateFinCli` date DEFAULT NULL,
  PRIMARY KEY (`idVente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`idVente`, `dateVente`, `dateDebutProd`, `dateFinProd`, `dateFinCli`) VALUES
(1, '2023-12-08', '2023-12-08', '2023-12-08', '2023-12-08'),
(2, '2024-01-10', '2024-01-10', '2024-01-10', '2024-01-10');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherents_FK_utilisateur` FOREIGN KEY (`idAdherent`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_FK_adherent` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `commande_FK_vente` FOREIGN KEY (`idVente`) REFERENCES `vente` (`idVente`);

--
-- Contraintes pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `lignesCommande_FK_commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `lignesCommande_FK_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD CONSTRAINT `producteur_FK_utilisateur` FOREIGN KEY (`idProducteur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_FK_Categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `produit_FK_Producteur` FOREIGN KEY (`idProducteur`) REFERENCES `producteur` (`idProducteur`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_FK_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `proposer_FK_vente` FOREIGN KEY (`idVente`) REFERENCES `vente` (`idVente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
