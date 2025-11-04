-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 sep. 2019 à 17:14
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_stagiaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `autre`
--

CREATE TABLE `autre` (
  `id_autre` int(11) NOT NULL,
  `dat_ins` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `autre`
--

INSERT INTO `autre` (`id_autre`, `dat_ins`) VALUES
(1, '2019-09-08'),
(2, '2019-09-08');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` char(5) NOT NULL,
  `id_niveau` char(5) DEFAULT NULL,
  `libelle_filiere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `id_niveau`, `libelle_filiere`) VALUES
('GB', 'LIC', 'Gestion des Banques'),
('GC', 'LIC', 'Gestion Commerciale'),
('GE', 'LIC', 'Gestion des Entreprises'),
('GLIA', 'MAS', 'Génie Logiciel et Intégration d\'Application'),
('GTL', 'LIC', 'Gestion des Transports et Logistique'),
('IG', 'LIC', 'Informatique de Gestion'),
('SIAD', 'MAS', 'Système d\'Information et d\'Aide à la Décision');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE `inscrire` (
  `id_inscription` int(11) NOT NULL,
  `id_stagiaire` varchar(20) NOT NULL,
  `id_filiere` char(5) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscrire`
--

INSERT INTO `inscrire` (`id_inscription`, `id_stagiaire`, `id_filiere`, `date_inscription`) VALUES
(4, '11444828', 'GTL', '2019-09-11 09:55:46'),
(5, '58412545', 'GE', '2019-09-11 10:00:03'),
(9, '12548555', 'SIAD', '2019-09-11 14:04:54'),
(10, '114448828', 'GTL', '2019-09-11 14:05:29'),
(11, '95129562', 'GE', '2019-09-11 14:06:10'),
(12, '875412', 'GC', '2019-09-11 14:06:47'),
(13, '8754127', 'GC', '2019-09-11 14:08:07'),
(14, '87584127', 'GC', '2019-09-11 14:08:23'),
(15, '1144828', 'GTL', '2019-09-11 14:11:53');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` char(5) NOT NULL,
  `libelle_niveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `libelle_niveau`) VALUES
('LIC', 'Licence'),
('MAS', 'Master');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `id_stagiaire` varchar(20) NOT NULL,
  `id_filiere` char(5) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `civilite` varchar(1) NOT NULL,
  `date_nais` date NOT NULL,
  `photo` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id_stagiaire`, `id_filiere`, `nom`, `prenom`, `civilite`, `date_nais`, `photo`) VALUES
('11444818', 'IG', 'M\'PO', 'Tchéytiba Frank Delphin', 'M', '2019-09-10', 'img/card3.jpg'),
('11444828', 'GTL', 'BADA', 'Merveille', 'F', '2000-04-04', 'img/Screenshot_20190803-154309.png'),
('114448828', 'GTL', 'Toto', 'Jean-Marc', 'M', '2019-09-21', 'img/garcon.png'),
('1144828', 'GTL', 'Toto', 'Jean', 'M', '2019-09-07', 'img/garcon.png'),
('11489785', 'GC', 'BABABODI', 'Zakiyou', 'M', '2019-09-10', 'img/Scre.png'),
('12458798', 'GC', 'STOHOU', 'Diane', 'F', '2019-09-10', '	\r\nimg/fille.jpg'),
('12548555', 'SIAD', 'Patron DOUSSOU', 'Léonel Franck', 'M', '1997-06-19', 'img/44948 - Copie.png'),
('58412545', 'GE', 'BADA', 'olaïtan', 'F', '2001-04-04', 'img/Screenshot_20190722-215336.png'),
('875412', 'GC', 'HUINUIU', 'Prosperte', 'F', '2019-09-04', 'img/fille.jpg'),
('8754127', 'GC', 'HUINUpIU', 'Prosperte', 'F', '2019-09-12', 'img/3c6a88884c2e4900b70daefa79f902e1.jpg'),
('87584127', 'GC', 'HUINUpIU', 'Prosperte', 'F', '2019-09-12', 'img/3c6a88884c2e4900b70daefa79f902e1.jpg'),
('95129562', 'GE', 'GANDAHO', 'Firmine', 'F', '2019-09-08', 'img/fille.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `role` char(15) NOT NULL DEFAULT 'visiteur',
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `email`, `mot_de_passe`, `role`, `etat`) VALUES
(1, 'root', 'mpofranck000@gmail.com', '2019', 'admin', 1),
(9, 'roo', 'mpofra0@gmail.com', '2018', 'visit', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `fk_id_niveau` (`id_niveau`);

--
-- Index pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `FK_2ID_STAGIAIRE` (`id_stagiaire`),
  ADD KEY `FK_2ID_FILIERE` (`id_filiere`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`id_stagiaire`),
  ADD KEY `fk_id_filiere` (`id_filiere`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscrire`
--
ALTER TABLE `inscrire`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `fk_id_niveau` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`);

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `FK_2ID_FILIERE` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_2ID_STAGIAIRE` FOREIGN KEY (`id_stagiaire`) REFERENCES `stagiaire` (`id_stagiaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `fk_id_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
