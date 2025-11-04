-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 31 août 2019 à 00:41
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
('GC', 'LIC', 'Gestion Commerciale'),
('GLSAP', 'MAS', 'Genie Logiciel et Système d\'Aide à la Prise de décision'),
('IG', 'LIC', 'Informatique de Gestion');

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
  `photo` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id_stagiaire`, `id_filiere`, `nom`, `prenom`, `photo`) VALUES
('11228459', 'IG', 'BIO GUERRA', 'Hanifath', 'img/Scre.png'),
('11444818', 'IG', 'M\'PO', 'Tchéytiba Frank Delphin', 'img/card3.jpg'),
('11458975', 'GC', 'GBONBGON', 'Gil-Christ', 'img/carousel3.jpg'),
('11489785', 'GC', 'BABABODI', 'Zakiyou', 'img/Scre.png');

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
(1, 'root', 'mpofranck000@gmail.com', '2019', 'admin', 1);

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
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `fk_id_niveau` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `fk_id_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
