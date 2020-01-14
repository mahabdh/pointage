-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 21 Avril 2018 à 11:27
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ihm`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_fonctionnaire` varchar(50) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `duree` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`nom`, `mdp`) VALUES
('maouas', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnaire`
--

CREATE TABLE `fonctionnaire` (
  `id` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonctionnaire`
--

INSERT INTO `fonctionnaire` (`id`, `nom`, `prenom`, `datenaissance`, `fonction`, `departement`) VALUES
('1531088681', 'titiche', 'boo3lem', '1998-02-20', 'PDG', 'Elit'),
('123', 'oussama', 'maouas', '2222-02-20', 'dscdvs', 'vvdfvd');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `id_fonctionnaire` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `entre_mat` time DEFAULT NULL,
  `sortie_mat` time DEFAULT NULL,
  `entre_soire` time DEFAULT NULL,
  `sortie_soire` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pointage`
--

INSERT INTO `pointage` (`id_fonctionnaire`, `nom`, `prenom`, `date`, `entre_mat`, `sortie_mat`, `entre_soire`, `sortie_soire`) VALUES
('123', 'oussama', 'maouas', '2018-04-17', '06:45:36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `retard`
--

CREATE TABLE `retard` (
  `id_fonctionnaire` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `retard_entre_mat` time NOT NULL,
  `retard_sortie_mat` time NOT NULL,
  `retard_entre_soire` time NOT NULL,
  `retard_sortie_soire` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `retard`
--

INSERT INTO `retard` (`id_fonctionnaire`, `nom`, `prenom`, `date`, `id`, `retard_entre_mat`, `retard_sortie_mat`, `retard_entre_soire`, `retard_sortie_soire`) VALUES
('vdfdv', 'vdfvd', 'vdfvdfv', '2018-04-10', 4, '09:00:00', '00:00:22', '00:00:00', '00:43:00'),
('vdfdv', 'vdfvd', 'vdfvdfv', '2018-04-10', 5, '09:00:00', '00:00:22', '00:00:00', '00:43:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `retard`
--
ALTER TABLE `retard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `retard`
--
ALTER TABLE `retard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
