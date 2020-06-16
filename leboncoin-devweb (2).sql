-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 09:51
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncoin-devweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `Titre` varchar(100) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date_annonce` varchar(100) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`Titre`, `Prix`, `Description`, `Date_annonce`, `id_annonce`, `image`) VALUES
('Gel Hydro Alcoolique', 10000, 'Gel d&eacute;sinfectant anti coronavirus.\r\nOccasion les 33% gratuit sont d&eacute;j&agrave; utilis&eacute;', '2020-06-16', 23, 'gel.png'),
('Meuble en tr&egrave;s bonne &eacute;tat', 60, 'vend meuble en tr&egrave;s bonne &eacute;tat 380V', '2020-06-01', 24, 'meuble.png'),
('Objet insolite', 0, 'Je l&#039;offre a qui le veux d&#039;OCCASION ', '2020-07-04', 25, 'insolite.png'),
('Caillou pas ch&egrave;re ', 10, 'Bonjour aujourd&#039;hui je vend mon caillou qui appartenait &agrave; mon grand papa du moyen orients , tr&egrave;s utile pour s&rsquo;asseoir ou autre.\r\nJe l&#039;ai nettoy&eacute; ce matin .', '2020-06-14', 26, 'caillou.png'),
('Piano bonne &eacute;tat', 1000, 'Prix non n&eacute;gociable', '2020-06-26', 27, 'piano.png'),
('Armoire m&eacute;tallique ', 100, 'Armoire m&eacute;tallique comme neuf tr&egrave;s peu utilis&eacute;', '2020-06-16', 28, 'armoire.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`username`, `mail`, `password`, `id_user`) VALUES
('pascal', 'pascal@test.fr', '$2y$10$nBmiD1TGhOKVX8KonFD3aOPmY/.NewArwqcpcl182TapMppkG9Mw.', 5),
('Enzo', 'enzo.hadeg@ynov.com', '$2y$10$WqQ8F3Ub14WQ2N65mr2bg.zRxqZG5gaQr3TS9gpCWD2/Hm994yjRa', 6),
('Enzo', 'ehadeg@gmail.com', '9d137038c5cd4ad58e66c98a995cae84bed4431e', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
