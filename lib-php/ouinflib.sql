-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Mars 2017 à 08:11
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ouinflib`
--

-- --------------------------------------------------------

--
-- Structure de la table `infirmiere`
--

CREATE TABLE `infirmiere` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `nomI` varchar(30) NOT NULL,
  `prenomI` varchar(40) NOT NULL,
  `emailI` varchar(40) NOT NULL,
  `mdpI` varchar(50) NOT NULL,
  `telI` int(11) NOT NULL,
  `rueI` varchar(100) NOT NULL,
  `code-postalI` int(11) NOT NULL,
  `villeI` varchar(50) NOT NULL,
  `type-soinI1` varchar(20) NOT NULL,
  `type-soinI2` varchar(20) NOT NULL,
  `type-soinI3` varchar(20) NOT NULL,
  `type-soinI4` varchar(20) NOT NULL,
  `lieu-intervention` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infirmiere`
--

INSERT INTO `infirmiere` (`id`, `photo`, `nomI`, `prenomI`, `emailI`, `mdpI`, `telI`, `rueI`, `code-postalI`, `villeI`, `type-soinI1`, `type-soinI2`, `type-soinI3`, `type-soinI4`, `lieu-intervention`) VALUES
(6, 'user.png', 'ert', 'er', 'a@gmail.ocm', 'r', 15, 'dd', 12, 'fg', 'Cicatrisation', 'StomarhÃ©rapie', 'Perfusion', 'Sondage', 'Tsenakely'),
(7, 'user.png', 'sdf', 'sdf', 'ay@gmail.ocm', 'y', 15, 'dd', 12, 'fg', 'Cicatrisation', 'StomarhÃ©rapie', 'Perfusion', 'Sondage', 'Tsenakely');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `infirmiere`
--
ALTER TABLE `infirmiere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailI` (`emailI`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `infirmiere`
--
ALTER TABLE `infirmiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
