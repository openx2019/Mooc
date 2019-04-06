-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 06 avr. 2019 à 15:07
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tutorat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ecue`
--

CREATE TABLE `ecue` (
  `id` int(11) NOT NULL,
  `nom_ecue` varchar(50) NOT NULL,
  `ue_id` int(11) NOT NULL,
  `tuteur_id` int(11) NOT NULL,
  `filiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecue`
--

INSERT INTO `ecue` (`id`, `nom_ecue`, `ue_id`, `tuteur_id`, `filiere_id`) VALUES
(1, 'Analyse', 1, 3, 1),
(2, 'Algèbre', 1, 3, 1),
(3, 'JavaScript', 2, 3, 1),
(4, 'HTML / CSS / BOOTSTRAP', 2, 3, 1),
(5, 'Analyse', 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filiere_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `user_id`, `filiere_id`) VALUES
(2, 12, 1),
(4, 16, NULL),
(9, 21, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `nom_filiere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `nom_filiere`) VALUES
(1, 'Développement d\'applications et e-services');

-- --------------------------------------------------------

--
-- Structure de la table `lecon`
--

CREATE TABLE `lecon` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `ecue_id` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `nmbre_vu` int(11) DEFAULT '0',
  `nmbre_j_aime` int(11) DEFAULT '0',
  `auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE `tuteur` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`id`, `user_id`) VALUES
(3, 21);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tuteur_enseigne_ecue`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `tuteur_enseigne_ecue` (
`filiere_id` int(11)
,`nom_filiere` varchar(50)
,`ecue_id` int(11)
,`nom_ecue` varchar(50)
,`ue_id` int(11)
,`tuteur_id` int(11)
,`user_id` int(11)
,`nom` varchar(255)
,`prenoms` varchar(255)
,`sexe` enum('M','F','H')
,`date_naissance` date
,`lieu_naissance` varchar(255)
,`username` varchar(255)
,`email` varchar(60)
,`telephone` varchar(255)
,`avatar` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE `ue` (
  `id` int(11) NOT NULL,
  `nom_ue` varchar(50) NOT NULL,
  `filiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`id`, `nom_ue`, `filiere_id`) VALUES
(1, 'Mathématique', 1),
(2, 'Programmation Web', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `sexe` enum('M','F','H') NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `lieu_habitation` varchar(255) DEFAULT NULL,
  `biographie` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkdin` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `type_user` enum('1','2','3') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `first_login` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `online` tinyint(1) NOT NULL,
  `nmbre_connexion` int(11) NOT NULL,
  `temps_passe_plateforme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenoms`, `sexe`, `date_naissance`, `lieu_naissance`, `username`, `email`, `telephone`, `avatar`, `password`, `lieu_habitation`, `biographie`, `facebook`, `twitter`, `linkdin`, `google`, `date_creation`, `date_modification`, `type_user`, `is_active`, `first_login`, `last_login`, `online`, `nmbre_connexion`, `temps_passe_plateforme`, `cle`) VALUES
(11, 'Diak', 'Dev', 'M', '2019-04-17', 'ANYAMA', 'dev@gmail.com', 'dev@gmail.com', '07431292', 'media/user/Capture dâ€™Ã©cran (5).png', '$2y$10$vpSvI1IArwy4OZoC0g76FuciLVRld84Sa/6vS/8ptqu.6gb8Q4u3i', '', '                              ', '', '', '', '', '2019-03-21 01:38:53', '2019-03-21 01:38:53', '2', 1, '2019-03-21 10:14:57', '2019-03-21 10:18:59', 0, 0, '2019-04-02 14:06:30', 'effe9f5f8bc9bfbde633bfa880e27d08'),
(12, 'Diak', 'Pro', 'M', '2019-04-16', 'ANYAMA', 'odiakite229@gmail.com', 'odiakite229@gmail.com', '07431292', 'media/user/Capture dâ€™Ã©cran (2).png', '$2y$10$AxhFFBdwi5jtG6pyfIRY..4xbSjLLiy2vJmdcu6BDII/Z89DoUbaG', '', '                              ', '', '', '', '', '2019-03-21 01:39:34', '2019-03-21 01:39:34', '1', 1, '2019-03-21 10:19:35', '2019-04-05 00:17:20', 0, 0, '2019-04-04 22:17:20', '7a33db9f6944c724846abc29adfdcecf'),
(13, 'Diakite', 'OUMAR', 'M', NULL, NULL, 'odiakite2@gmail.com', 'odiakite2@gmail.com', '07 43 12 92', NULL, '$2y$10$dhiHetwRvWrrxdXUTCzvu..tjsAojIZDrpiIiNcpWBfwnSJYz2Yde', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:00:25', '2019-03-31 12:00:25', '1', 0, NULL, NULL, 0, 0, '2019-03-31 10:00:25', 'dbe0141b72f41c1dd0d86661fe4faa89'),
(14, 'Diakite', 'OUMAR', 'M', NULL, NULL, 'odiakite@gmail.com', 'odiakite@gmail.com', '54 82 94 87', NULL, '$2y$10$SOgw9eZ8s3gUFbseLtlc4eN9NCOOZgvVkl6wf3lxOqFi8UaaglNRq', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:10:58', '2019-03-31 12:10:58', '1', 0, NULL, NULL, 0, 0, '2019-03-31 10:10:58', '469a544bcaa1f43341390cf63b31d1b2'),
(15, 'Diakite', 'OUMAR', 'F', NULL, NULL, 'odiakit@gmail.com', 'odiakit@gmail.com', '07 43 12 92', NULL, '$2y$10$6yNfN3PKmGgsaX4rZHMhiOWoCTNGMSxdthYIdrqKrlWlgjpU9jlse', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:43:30', '2019-03-31 12:43:30', '1', 0, NULL, NULL, 0, 0, '2019-03-31 10:43:30', '17dd542ba952ab3207f11c8b252b9ed0'),
(21, 'Diakite', 'Ousmane', 'F', NULL, NULL, 'episod56@gmail.com', 'episod56@gmail.com', '07 43 12 92', NULL, '$2y$10$H42TK48VZWFfd5awCV0zROyGhmkk6v0mZnYWavPcKR3CMxSgOhBRG', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 17:51:41', '2019-04-02 17:51:41', '2', 1, '2019-04-02 17:51:42', '2019-04-05 00:20:56', 0, 0, '2019-04-04 22:20:56', 'f1ec65aded71c1366a6d34a8f36f18d0');

-- --------------------------------------------------------

--
-- Structure de la vue `tuteur_enseigne_ecue`
--
DROP TABLE IF EXISTS `tuteur_enseigne_ecue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tuteur_enseigne_ecue`  AS  select `filiere`.`id` AS `filiere_id`,`filiere`.`nom_filiere` AS `nom_filiere`,`ecue`.`id` AS `ecue_id`,`ecue`.`nom_ecue` AS `nom_ecue`,`ecue`.`ue_id` AS `ue_id`,`tuteur`.`id` AS `tuteur_id`,`user`.`id` AS `user_id`,`user`.`nom` AS `nom`,`user`.`prenoms` AS `prenoms`,`user`.`sexe` AS `sexe`,`user`.`date_naissance` AS `date_naissance`,`user`.`lieu_naissance` AS `lieu_naissance`,`user`.`username` AS `username`,`user`.`email` AS `email`,`user`.`telephone` AS `telephone`,`user`.`avatar` AS `avatar` from (((`filiere` join `ecue`) join `tuteur`) join `user`) where ((`filiere`.`id` = `ecue`.`filiere_id`) and (`ecue`.`tuteur_id` = `tuteur`.`id`) and (`tuteur`.`user_id` = `user`.`id`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_1` (`user_id`);

--
-- Index pour la table `ecue`
--
ALTER TABLE `ecue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ue` (`ue_id`),
  ADD KEY `fk_tuteur_id` (`tuteur_id`),
  ADD KEY `fk_fililiere_2` (`filiere_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_3` (`user_id`),
  ADD KEY `fk_filiere` (`filiere_id`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lecon`
--
ALTER TABLE `lecon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auteur` (`auteur`);

--
-- Index pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_2` (`user_id`);

--
-- Index pour la table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_appartient_filiere` (`filiere_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ecue`
--
ALTER TABLE `ecue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `lecon`
--
ALTER TABLE `lecon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tuteur`
--
ALTER TABLE `tuteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ue`
--
ALTER TABLE `ue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ecue`
--
ALTER TABLE `ecue`
  ADD CONSTRAINT `fk_fililiere_2` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `fk_tuteur_id` FOREIGN KEY (`tuteur_id`) REFERENCES `tuteur` (`id`),
  ADD CONSTRAINT `fk_ue` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_filiere` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `fk_user_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `lecon`
--
ALTER TABLE `lecon`
  ADD CONSTRAINT `fk_auteur` FOREIGN KEY (`auteur`) REFERENCES `tuteur` (`id`);

--
-- Contraintes pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD CONSTRAINT `fk_user_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ue`
--
ALTER TABLE `ue`
  ADD CONSTRAINT `fk_appartient_filiere` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
