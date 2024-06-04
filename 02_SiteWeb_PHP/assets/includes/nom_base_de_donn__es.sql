-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 02 juin 2024 à 10:43
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nom_base_de_données`
--

-- --------------------------------------------------------

--
-- Structure de la table `nom_table`
--

CREATE TABLE `nom_table` (
  `id` int(6) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `salaire` decimal(10,2) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nom_table`
--

INSERT INTO `nom_table` (`id`, `nom`, `salaire`, `ville`, `photo`) VALUES
(1, 'Matthieu', 25.00, 'montreal', 'https://img.freepik.com/photos-gratuite/rendu-3d-personnage-dessin-anime-lunettes-veste_1142-51310.jpg?w=740&t=st=1717317482~exp=1717318082~hmac=5eafa6bfcc31b0df5aa0ce1a84c2f605bdb4f974bd2408112ae371b06fcbda54'),
(2, 'Valentine', 30.00, 'montreal', 'https://img.freepik.com/photos-gratuite/avatar-androgyne-personne-queer-non-binaire_23-2151100226.jpg?t=st=1717316973~exp=1717317573~hmac=7e90bed0c43913bfc7a3632eba2d63c3c9ab39413a69b8a3dc272a20ff2e63c3'),
(3, 'Alexandre', 40.00, 'toronto', 'https://img.freepik.com/photos-gratuite/portrait-jeune-homme-lunettes-costume-rendu-3d_1142-43524.jpg?t=st=1717316973~exp=1717317573~hmac=329fd8543b3042c03468c63f87cee1b9ba963200f58213cc5ce0ef452c333b07'),
(4, 'Sophie', 35.00, 'vancouver', 'https://img.freepik.com/photos-gratuite/illustration-3d-jeune-fille-foulard-noir_1142-51578.jpg?w=740&t=st=1717317182~exp=1717317782~hmac=10df34a4248faf87b9f4293a48ccdec90f671fd1e37e6e523a80e5d1ded03494'),
(5, 'Camila', 25.00, 'quebec', 'https://img.freepik.com/photos-gratuite/personnage-dessin-anime-3d_23-2151033973.jpg?w=740&t=st=1717317275~exp=1717317875~hmac=d941cb70696ed72e6c839697bef29e6dc1859a100a61a7771ef0fcd47bcd644b'),
(6, 'Lucas', 25.00, 'quebec', 'https://img.freepik.com/photos-gratuite/portrait-bel-homme-hipster-lunettes-rendu-3d_1142-51612.jpg?w=740&t=st=1717317319~exp=1717317919~hmac=f949ec6a88e510a8bfe10c1ede22ff4b8eeda8391c208c69f5f082cdda980c5b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `nom_table`
--
ALTER TABLE `nom_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `nom_table`
--
ALTER TABLE `nom_table`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
