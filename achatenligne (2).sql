-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mai 2021 à 00:44
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `achatenligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `Nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`Nom`, `Prenom`, `Email`, `password`) VALUES
('Gheribi', 'Sofiane', 'titi.gh05@gmail.com', '25f9e794323b453885f5'),
('Tyson', 'mike', 'miketyson@gmail.com', 'a75acadd2226da4ea265'),
('battour', 'mohamed', 'mb@live.fr', 'azerty'),
('Battour', 'Mohamed', 'mohamed.battour@live.fr', 'ab4f63f9ac6515257588'),
('mimi', 'mati', 'mimi@live.fr', 'ab4f63f9ac6515257588'),
('patfoy', 'lat', 'patfoy@live.fr', '94721cdb752287cbf39b'),
('mimi', 'mati', 'mimi@live.fr', 'ab4f63f9ac6515257588'),
('mohamed', 'ali', 'mohamed@live.fr', 'ab4f63f9ac6515257588'),
('lejeune', 'kevin', 'kevin@live.fr', 'azerty'),
('john', 'doe', 'john@live.fr', 'azerty'),
('john', 'dole', 'johny@live.fr', 'azerty'),
('john', 'dole', 'johny@live.fr', 'azerty'),
('john', 'dole', 'johny@live.fr', 'azerty'),
('john', 'dole', 'johny@live.fr', 'azerty'),
('john', 'dole', 'johny@live.fr', 'azerty'),
('tom', 'sawyer', 'tom@live.fr', 'ab4f63f9ac6515257588'),
('olive', 'oil', 'olive@live.fr', 'ab4f63f9ac6515257588'),
('balou', 'balou', 'balou@live.fr', 'azerty123'),
('alain', 'christ', 'alain@live.fr', 'c749505815b3154745ee'),
('mendy', 'mendy', 'mendy@live.fr', 'f7152474857ac50241b2'),
('lee', 'bruce', 'lee@live.fr', 'ff58ac7e8a159bfb312e'),
('jhon', 'mechant', 'johnLemechant', 'mechant'),
('zak', 'zak', 'zak@live.fr', 'zakaria'),
('stallone', 'sylv', 'stallone@live.fr', '$2y$10$fKMhN3huX9GzN5DmmtE3x.gRge7lIGHVFXe3bvm8rqlPrEZWq8oMa'),
('bruce', 'wayne', 'wayne@live.fr', '$2y$10$gLhOn9ea7Q7If7tLM2K4luIYjpm3541l4wMVuJYpqmXsE4.TjvzEi'),
('bruce', 'wayne', 'wayne@live.fr', '$2y$10$i7IiXJy2OprbA6iGfCWbGO9MSQA5HPnBsj9ybmZgeLBvlzwldSy2W'),
('paul', 'paul', 'paul@live.fr', 'patoche'),
('paul', 'paul', 'paul@live.fr', 'patoche'),
('paul', 'paul', 'paul@live.fr', 'patoche'),
('paul', 'paul', 'paul@live.fr', 'patoche'),
('rock', 'rock', 'rock@live.fr', 'rockrock'),
('rock', 'rock', 'rock@live.fr', 'rockrock'),
('rockz', 'rockz', 'rock@live.com', 'zak'),
('rockz', 'rockz', 'rock@live.com', 'zak'),
('rockz', 'rockz', 'rock@live.com', 'rockrock');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `Genre` varchar(20) COLLATE utf8_bin NOT NULL,
  `TypeVet` varchar(20) COLLATE utf8_bin NOT NULL,
  `Taille` varchar(20) COLLATE utf8_bin NOT NULL,
  `Couleur` varchar(20) COLLATE utf8_bin NOT NULL,
  `PrixUnite` float NOT NULL,
  `QuantiteDispo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`Genre`, `TypeVet`, `Taille`, `Couleur`, `PrixUnite`, `QuantiteDispo`) VALUES
('Homme', 'Pantalon', '1-6ans', 'Vert', 12.99, 74),
('Femme', 'Robe', '6-10ans', 'Rouge', 10.99, 100),
('Homme', 'Pantalon', '1-6ans', 'Rouge', 17.99, 57),
('Homme', 'Chemise', 'Adulte', 'Bleu', 11.99, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
