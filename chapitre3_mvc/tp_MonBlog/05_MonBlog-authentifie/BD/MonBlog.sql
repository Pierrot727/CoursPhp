-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 23 Septembre 2017 à 21:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_billet`
--

CREATE TABLE `t_billet` (
  `BIL_ID` int(11) NOT NULL,
  `BIL_DATE` datetime NOT NULL,
  `BIL_TITRE` varchar(100) NOT NULL,
  `BIL_CONTENU` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_billet`
--

INSERT INTO `t_billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`) VALUES
(1, '2017-08-22 16:11:28', 'Premier billet', 'Bonjour monde ! Ceci est le premier billet sur mon blog.'),
(2, '2017-08-22 16:11:28', 'Au travail', 'Il faut enrichir ce blog dès maintenant.'),
(3, '2010-10-10 00:00:00', 'Ratatouill', 'Un chasseur sachant chasser'),
(4, '2011-01-01 00:00:00', 'L\'odyssée commence', '<p>Spoooke</p>'),
(5, '2017-09-22 00:00:00', 'Exploration', '<p>Elle prend l&rsquo;escalier courbe qui m&egrave;ne au soussol</p>\r\n<p>de sa maison</p>\r\n<p>mais elle ne reconna&icirc;t pas son soussol</p>\r\n<p>; la cave vo&ucirc;t&eacute;e est &eacute;clair&eacute;e</p>\r\n<p>par un soupirail. Le sol est recouvert d&rsquo;une poussi&egrave;re jaun&acirc;tre. Dans</p>\r\n<p>le fond de la cave &agrave; gauche, elle s&rsquo;aper&ccedil;oit que le sol est en pente et</p>\r\n<p>recouvert de davantage de poussi&egrave;res. Elle pense qu&rsquo;il faudrait y</p>\r\n<p>passer l&rsquo;aspirateur. Pourtant, ses pieds reposent sur le sol. Elle</p>\r\n<p>s&rsquo;agenouille pour examiner cette poussi&egrave;re et se rend compte qu&rsquo;il</p>\r\n<p>s&rsquo;agit d&rsquo;une esp&egrave;ce de treillis souple en tissu, sous lequel il y a un</p>\r\n<p>espace de quelques centim&egrave;tres. Avec son index, elle le soul&egrave;ve</p>\r\n<p>doucement mais sa main en le p&eacute;n&eacute;trant, a fait un trou sans qu&rsquo;elle ait</p>\r\n<p>ressenti la moindre pression. Un insecte volette en dessous, de</p>\r\n<p>gauche &agrave; droite, un papillon ? Le sol est propre sous ce treillis. Par</p>\r\n<p>cette ouverture, elle voit un autre escalier qui descend encore plus</p>\r\n<p>profond, en ligne droite celuici</p>\r\n<p>et assez escarp&eacute;. Elle &eacute;prouve de la</p>\r\n<p>r&eacute;ticence &agrave; aller plus loin. Que vatelle</p>\r\n<p>y trouver ? Une cave</p>\r\n<p>sombre ? Recelant quoi ? Sans souvenir d&rsquo;avoir descendu cet</p>\r\n<p>escalier, elle se retrouve &agrave; l&rsquo;ext&eacute;rieur, sur un chemin, en contrebas de</p>\r\n<p>sa maison. Le soleil brille. Sur sa gauche, il y a de jolies maisons</p>\r\n<p>pimpantes et un couple &acirc;g&eacute; assis sur un banc, heureux et souriant qui</p>\r\n<p>la regarde passer. Sur sa droite, un talus herbeux lui cache la vue. Un</p>\r\n<p>panneau fl&eacute;ch&eacute; lui indique qu&rsquo;elle est dans l&rsquo;autre monde. Elle</p>\r\n<p>s&rsquo;approche du couple et demande :</p>\r\n<p>&mdash; Je suis encore loin ?</p>\r\n<p>L&rsquo;homme aux cheveux blancs, avec un grand sourire, lui r&eacute;pond,</p>\r\n<p>3</p>\r\n<p>et sa femme acquiesce :</p>\r\n<p>&mdash; Vous y &ecirc;tes, mais l&rsquo;endroit pr&eacute;cis que vous cherchez est assez</p>\r\n<p>loin dans la direction de la fl&egrave;che.</p>\r\n<p>Il est trop tard pour qu&rsquo;elle y aille ce jourl&agrave;.</p>\r\n<p>Elle revient &agrave;</p>\r\n<p>l&rsquo;escalier et trouve sa m&egrave;re qui appuie sa main droite sur son coeur</p>\r\n<p>devant une porte ferm&eacute;e. Elle est tr&egrave;s essouffl&eacute;e et se tient dans</p>\r\n<p>l&rsquo;encoignure avec deux autres personnes &acirc;g&eacute;es. Elle les soutient et</p>\r\n<p>les aide &agrave; passer la porte.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL,
  `COM_SIGNALEMENT` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `BIL_ID`, `COM_SIGNALEMENT`) VALUES
(1, '2017-08-22 16:11:28', 'A. Nonyme', 'Bravo pour ce début', 1, 11),
(2, '2017-08-22 16:11:28', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `UTIL_ID` int(11) NOT NULL,
  `UTIL_LOGIN` varchar(100) NOT NULL,
  `UTIL_MDP` varchar(100) NOT NULL,
  `UTIL_NOM` varchar(100) DEFAULT NULL,
  `UTIL_PRENOM` varchar(100) DEFAULT NULL,
  `UTIL_DNAISSANCE` date DEFAULT NULL,
  `UTIL_EMAIL` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_NOM`, `UTIL_PRENOM`, `UTIL_DNAISSANCE`, `UTIL_EMAIL`) VALUES
(1, 'admin', '$2y$10$HE6J84zkx18CCJE1XQ8hnucPxsHVjeZAZxrt4FEeAmILuLmYacmAG', '', '', NULL, ''),
(2, 'test', 'abc', NULL, 'abc', '2012-01-20', 'erre'),
(3, 'seb', '$2y$10$YmaxfW6GrfeY7z/k6yymeeheNzE3WKupDf1vNRsnMxKFlyzUYqkqC', 'sebastien', 'seb', '1980-01-01', 'azert');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_billet`
--
ALTER TABLE `t_billet`
  ADD PRIMARY KEY (`BIL_ID`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`UTIL_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_billet`
--
ALTER TABLE `t_billet`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `t_billet` (`BIL_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
