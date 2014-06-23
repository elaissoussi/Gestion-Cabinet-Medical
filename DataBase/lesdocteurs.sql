-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 22 Juin 2014 à 21:19
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lesdocteurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `observation` text NOT NULL,
  `ordenance` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_medecin`),
  KEY `id_patient_2` (`id_patient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `date`, `heure`, `id_patient`, `id_medecin`, `observation`, `ordenance`) VALUES
(1, '2014-06-22', '14:22:00', 4, 3, '', ''),
(2, '2014-06-22', '14:22:00', 4, 3, '', ''),
(3, '2014-06-22', '01:59:00', 4, 3, '', ''),
(4, '2014-06-22', '14:22:00', 4, 3, '', ''),
(5, '2014-06-22', '22:00:00', 4, 3, '', ''),
(6, '2014-06-11', '11:11:00', 4, 3, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `datedenaissance` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `identifiant`, `motdepasse`, `email`, `prenom`, `profile`, `sexe`, `datedenaissance`) VALUES
(3, 'monsif', 'a', 'a', 'monsif-20@hotmail.fr', 'elaissoussi', 'Medecin', 'Homme', '2014-07-09'),
(4, 'patient1', 'c', 'c', 'monsif-20@hotmail.fr', 'patient1', 'Patient', 'Homme', '2014-06-04'),
(5, 'mimo', 'rmmm', 'rmmm', 'monsif-20@hotmail.fr', 'rssmm', 'Patient', 'Homme', '2014-06-03'),
(7, 'a', 'a', 'a', '', 'a', 'Patient', 'Femme', '2014-06-04'),
(8, 'm', 'm', 'm', 'm', 'm', 'Admin', 'Homme', '2010-10-10'),
(9, 'pp', 'p', 'ppp', 'monsif20@gmail.com', 'p', 'Medecin', 'Homme', '2014-06-18'),
(10, 'EL AISSOUSSI', 'mmm', 'mmm', 'monsif-20@hotmail.fr', 'Monsif', 'Medecin', 'Homme', '2014-06-11');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
