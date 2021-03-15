-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 14 mars 2021 à 21:12
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `usa`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(12) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `site_web` varchar(255) DEFAULT NULL,
  `type_annonce` varchar(255) DEFAULT NULL,
  `categorie_annonce` varchar(255) DEFAULT NULL,
  `date_annonce` varchar(255) DEFAULT NULL,
  `heure_annonce` varchar(255) DEFAULT NULL,
  `internaute_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `ville`, `etat`, `code_postal`, `pays`, `telephone`, `adresse`, `site_web`, `type_annonce`, `categorie_annonce`, `date_annonce`, `heure_annonce`, `internaute_id`) VALUES
(1, 'Regression', 'Rennes', '', '35000', 'FRANCE', '07856922252', '', '', '', '1', '', '', '2'),
(2, 'CNN', 'Lille', '', '35000', 'FRANCE', '07856922252', '', '', '', '1', '', '', '3'),
(3, 'RNN', 'Caen', '', '35000', 'FRANCE', '07856922252', '', '', '', '2', '', '', '3'),
(4, 'Deep', 'Nice', '', '35000', 'FRANCE', '07856922252', '', '', '', '3', '', '', '4'),
(6, 'LM', 'Rennes', 'neuf', '35000', 'FRANCE', '0767518102', '20 Rue Saint HÃ©lier', '', '1', '1', '13/03/2021', '03:15', '3'),
(7, 'o', 'ok', 'oo', '35231', 'jn', '7845', 'jk,', '', '2', '3', '13/03/2021', '03:25', '3'),
(8, 'papa', 'mama', 'oro', '521', 'fgj', 'cfghjk', 'vg,hj', 'sdjv', '1', '2', '13/03/2021', '16:36', '3');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_annonce`
--

CREATE TABLE `categorie_annonce` (
  `id` int(12) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_annonce`
--

INSERT INTO `categorie_annonce` (`id`, `libelle`) VALUES
(1, 'Regression'),
(2, 'CNN'),
(3, 'RNN');

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

CREATE TABLE `code` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `internaute_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `code`
--

INSERT INTO `code` (`id`, `code`, `internaute_id`) VALUES
(1, '78491', '1'),
(2, '46955', '2'),
(3, '40335', '3'),
(4, '17500', '4'),
(5, '92658', '5'),
(6, '69164', '6'),
(7, '74454', '7'),
(8, '85140', '8'),
(9, '69504', '9'),
(10, '37089', '10'),
(11, '28185', '11'),
(12, '35408', '12'),
(13, '81611', '13'),
(14, '74514', '1'),
(15, '95948', '2'),
(16, '19505', '3'),
(17, '51201', '4'),
(18, '39001', '5');

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `id` int(12) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_insc` varchar(255) NOT NULL,
  `heure_insc` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenoms` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `lien_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`id`, `user_name`, `email`, `mdp`, `date_insc`, `heure_insc`, `ip`, `nom`, `prenoms`, `ville`, `pays`, `telephone`, `adresse`, `lien_photo`) VALUES
(1, 'abiola', 'awagbeabiola@gmail.com', 'pppppp', '16/01/2017', '11:43', '127.0.0.1', '', '', '', '', '', '', ''),
(2, 'aaaa', 'awadagbegerard@yahoo.fr', 'aaaaaa', '14/03/2017', '19:49', '127.0.0.1', '', '', '', '', '', '', ''),
(3, 'Carloss', 'calebcarloss@yahoo.fr', 'mabrebis', '14/03/2017', '21:28', '::1', 'AGUIDA', 'Caleb', 'Rennes', '', '0767518102', '20 Rue Saint HÃ©lier', 'images/drapeau_benin.jpg'),
(4, 'Xavier', 'xavier@gmail.com', 'sejour', '26/03/2017', '11:47', '127.0.0.1', '', '', '', '', '', '', ''),
(5, 'Ines', 'bines@yahoo.fr', 'joyeuse', '26/03/2017', '12:03', '127.0.0.1', '', '', '', '', '', '', 'images/usa.jpg'),
(6, 'david', 'davidoubda@gmail.com', '123456', '10/03/2021', '20:28', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Carl', 'olymp@yahoo.fr', '123456', '11/03/2021', '17:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 'images/bg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `destinataire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `auteur`, `message`, `destinataire`) VALUES
(1, '3', 'bjr!', '1'),
(2, '3', 'comment tu vas?', '1'),
(3, '3', 'Alloo!!', '1'),
(4, '1', 'oui bjr', '3'),
(5, '3', 'xa fait un bail', '1'),
(6, '1', 'oui j\\\'avais voyagÃ©', '3'),
(7, '4', 'olymp je suis confu', '3'),
(8, '1', 'ok', '3'),
(9, '3', 'quel pays?', '1'),
(10, '4', 'erreur dans les messages', '3'),
(11, '4', 'je pense que oui', '3'),
(12, '3', 'xavier hello', '4'),
(13, '5', 'bjr ab', '1'),
(14, '1', 'bjr ino', '5'),
(15, '4', 'hi bro', '3'),
(16, '1', 'oh! couleur', '3'),
(17, '3', 'vraiment inh couleur la', '1'),
(18, '3', 'on se voit quand?', '4'),
(19, '3', 'Diamnche ?', '4'),
(20, '4', 'non dimanche je suis oqp', '3'),
(21, '4', 'mardi est mieux', '3'),
(22, '4', 'ok on se dit a mardi', '3'),
(23, '3', 'barack va bien?\\n', '4'),
(24, '3', 'yes men', '1'),
(25, '3', 'okkk cal', '2'),
(26, '3', 'Cc Ines', '5'),
(27, '3', 'C\'est quoi', '5'),
(28, '3', 'pour', '1'),
(29, '3', 'okk', '1'),
(30, '3', 'okkk', '1'),
(31, '3', 'pll', '1'),
(32, '3', 'oijh', '4'),
(33, '3', 'okk', '4'),
(34, '3', 'ollkk', '1'),
(35, '3', 'poko', '4'),
(36, '3', 'ok', '2'),
(37, '3', 'COmment vas-tu ?', '4'),
(38, '3', 'Bien et toi', '4'),
(39, '3', 'pl', '4'),
(40, '5', 'aloo', '1'),
(41, '3', 'Jesus', '2'),
(42, '3', 'Jesus', '2'),
(43, '3', 'Dieu est grand', '2'),
(44, '3', 'Seigneur', '2'),
(45, '3', 'Un dernier test', '2'),
(46, '3', 'C\"est encore moi', '5'),
(47, '3', 'Pour moi ?', '5'),
(48, '3', 'Oui ok', '4'),
(49, '3', 'okkkkkkkkkkkkk', '4'),
(50, '3', 'poui', '6'),
(51, '3', 'bbbbb', '5'),
(52, '3', 'd\'accord', '4'),
(53, '3', 'd\'accord', '6'),
(54, '3', 'ok', '6'),
(55, '3', 'ok', '6'),
(56, '3', 'pourr', '4'),
(57, '3', 'ok', '1'),
(58, '3', 'okkppppp', '1'),
(59, '3', 'lplplpp', '1'),
(60, '3', 'ok', '7'),
(61, '3', 'okjhjmmmmmm', '7'),
(62, '3', 'd\'accord', '7'),
(63, '3', 'pourqyoi', '7'),
(64, '3', 'bien', '7'),
(65, '3', 'Jesus', '7'),
(66, '3', 'salut', '7'),
(67, '3', 'out est bien', '7'),
(68, '3', 'Je vois', '6'),
(69, '3', 'bien', '6'),
(70, '3', 'pourquoi', '6'),
(71, '3', 'salut', '6'),
(72, '3', 'Dieu est grand', '2'),
(73, '3', 'pfff', '2'),
(74, '3', 'kw', '2'),
(75, '3', 'bof', '2'),
(76, '3', 'c\'est bon', '2'),
(77, '3', 'pouiiiiiiiiiiiiiiii', '1'),
(78, '3', 'ok?', '1'),
(79, '3', 'okkkkk', '1'),
(80, '3', 'bien\n', '1'),
(81, '3', 'et alors ?', '1'),
(82, '3', 'ooo', '1'),
(83, '3', 'pol', '1'),
(84, '3', 'maintenant', '1'),
(85, '3', 'bof', '1'),
(86, '3', 'et alors', '1'),
(87, '3', 'lo', '1'),
(88, '3', 'po', '1'),
(89, '3', 'c\'est bon', '1'),
(90, '3', 'maintenant', '1'),
(91, '3', 'gaga', '1'),
(92, '3', 'new', '1'),
(93, '3', 'newwww', '1'),
(94, '3', 'tuoi', '1'),
(95, '3', 'bien', '1'),
(96, '3', 'nouveau', '1'),
(97, '3', 'non', '1'),
(98, '3', 'depart', '6'),
(99, '3', 'ok', '6'),
(100, '3', 'lm', '6'),
(101, '3', 'bref', '6'),
(102, '3', 'mp', '6'),
(103, '3', 'pourquoi', '6'),
(104, '3', 'bien', '1'),
(105, '3', 'eyon', '1'),
(106, '3', 'ok', '1'),
(107, '3', 'bien', '1'),
(108, '3', 'mo', '1'),
(109, '3', 'l', '1'),
(110, '3', 'po', '7'),
(111, '3', 'bien', '7'),
(112, '3', 'pmmmm', '7'),
(113, '3', 'bien', '7'),
(114, '3', 'bien', '1'),
(115, '3', 'ok', '2'),
(116, '3', 'Merci Dieu', '1'),
(117, '3', 'moi pou', '1'),
(118, '3', 'Koi', '1'),
(119, '3', 'd\'accord', '1'),
(120, '3', 'salut', '1'),
(121, '3', 'devo', '7'),
(122, '3', 'jesus', '7'),
(123, '3', 'waoooh', '7'),
(124, '3', 'now', '7'),
(125, '3', 'pouiiiiiiiiiiiiiii', '7'),
(126, '3', 'loi', '7'),
(127, '3', 'euo', '7'),
(128, '3', 'plol', '7'),
(129, '3', 'pmlk', '7'),
(130, '3', 'Ã§a', '7'),
(131, '3', 'y est', '7'),
(132, '3', 'bg', '7'),
(133, '3', 'okkk', '6');

-- --------------------------------------------------------

--
-- Structure de la table `type_annonce`
--

CREATE TABLE `type_annonce` (
  `id` int(12) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_annonce`
--

INSERT INTO `type_annonce` (`id`, `libelle`) VALUES
(1, 'Achat'),
(2, 'Vente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie_annonce`
--
ALTER TABLE `categorie_annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_annonce`
--
ALTER TABLE `type_annonce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `categorie_annonce`
--
ALTER TABLE `categorie_annonce`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `internaute`
--
ALTER TABLE `internaute`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT pour la table `type_annonce`
--
ALTER TABLE `type_annonce`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
