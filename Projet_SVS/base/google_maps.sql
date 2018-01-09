-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 15 Mai 2013 à 10:13
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `google_maps`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_role` varchar(3) NOT NULL,
  `login` varchar(15) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `id_role`, `login`, `pass`) VALUES
(1, '1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, '2', 'compte1', 'f984a882448c0b850a7cea8a4cbc749ae2e6fe1f'),
(3, '3', 'compte2', '098cc54c5b88b57c81d3b3e239af23e380154257'),
(4, '4', 'compte3', 'bcd891170c9e585d40c4f927d0b94bd8f6cf5c48'),
(5, '5', 'compte4', '185625d322dfb45f51a8d2b775a6e41fc6c94526'),
(6, '1', 'compte5', '97ca5cda703f130298be3b7942394735b26263c6'),
(7, '2', 'compte6', '308dd1e4874d0fdf79bc172e8c3092f9881343f4'),
(8, '3', 'compte7', '596992c0e2764519b3dbdfdd3c4310c6d3863470'),
(9, '4', 'compte8', '0c63db99df1c2e77742285106bd4fe588cb18132'),
(10, '5', 'compte9', '4d16258494b225ec3e6ecd227e517c739a9d29ca');

-- --------------------------------------------------------

--
-- Structure de la table `admin_niv`
--

CREATE TABLE IF NOT EXISTS `admin_niv` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_role` int(3) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `admin_niv`
--

INSERT INTO `admin_niv` (`id`, `id_role`, `role`) VALUES
(1, 1, 'Administrateur'),
(2, 2, 'Editeur'),
(3, 3, 'Auteur'),
(4, 4, 'Contributeur'),
(5, 5, 'Abonné');

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `evenement` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
