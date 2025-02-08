-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 jan. 2024 à 17:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tennis`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `IdTournoi` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `NoteAvis` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IdCategorie` int(11) NOT NULL,
  `NomCategorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IdCategorie`, `NomCategorie`) VALUES
(1, 'ATP250'),
(2, 'ATP500'),
(3, 'ATP1000'),
(4, 'Grand Chelem');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `IdJoueur` int(11) NOT NULL,
  `NomJoueur` varchar(30) NOT NULL,
  `PrenomJoueur` varchar(20) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`IdJoueur`, `NomJoueur`, `PrenomJoueur`, `Points`) VALUES
(1, 'Djokovic', 'Novak', 11245),
(2, 'Alcaraz', 'Carlos', 8855),
(3, 'Medvedev', 'Daniil', 7600),
(4, 'Sinner', 'Jannik', 6490),
(5, 'Rublev', 'Andrey', 4805),
(6, 'Tsitsipas', 'Stefanos', 4235),
(7, 'Zverev', 'Alexander', 3985),
(8, 'Rune', 'Holger', 3660),
(9, 'Hurkacz', 'Hubert', 3245),
(10, 'Fritz', 'Taylor', 3100),
(11, 'Ruud', 'Casper', 2825),
(12, 'De Minaur', 'Alex', 2740),
(13, 'Paul', 'Tommy', 2665),
(14, 'Dimitrov', 'Grigor', 2570),
(15, 'Khachanov', 'Karen', 2520),
(16, 'Tiafoe', 'Frances', 2310),
(17, 'Shelton', 'Ben', 2145),
(18, 'Norrie', 'Cameron', 1940),
(19, 'Jarry', 'Nicolas', 1810),
(20, 'Humbert', 'Ugo', 1765),
(21, 'Cerundolo', 'Fransisco', 1760),
(22, 'Mannarino', 'Adrian', 1755),
(23, 'Griekspoor', 'Tallon', 1640),
(24, 'Korda', 'Sebastian', 1530),
(25, 'Struff', 'Jan Lennard', 1522),
(26, 'Davidovich Fokina', 'Alejandro', 1495),
(27, 'Musetti', 'Lorenzo', 1470),
(28, 'Baez', 'Sebastian', 1435),
(29, 'Auger Alliassime', 'Felix', 1425),
(30, 'Etcheverry', 'Tomas Martin', 1375),
(31, 'Lehecka', 'Jiri', 1372),
(32, 'Bublik', 'Alexander', 1369),
(33, 'Djere', 'Laslo', 1285),
(34, 'Eubanks', 'Christopher', 1235),
(35, 'Karatsev', 'Aslan', 1193),
(36, 'Fils', 'Arthur', 1158),
(37, 'Coric', 'Borna', 1135),
(38, 'Evans', 'Daniel', 1131),
(39, 'Safiullin', 'Roman', 1122),
(40, 'Popyrin', 'Alexei', 1084),
(41, 'McDonald', 'Mackenzie', 1055),
(42, 'Murray', 'Andy', 1050),
(43, 'Ofner', 'Sebastian', 1048),
(44, 'Arnaldi', 'Matteo', 1021),
(45, 'Purcell', 'Max', 1012),
(46, 'Sonego', 'Lorenzo', 990),
(47, 'Nishioka', 'Yoshihito', 955),
(48, 'Shevchenko', 'Alexander', 947),
(49, 'Wawrinka', 'Stan', 942),
(50, 'Van De Zandshulp', 'Botic', 930),
(51, 'Hanfmann', 'Yannick', 914),
(52, 'Lajovic', 'Dusan', 914),
(53, 'Wolf', 'Jeffrey John', 910),
(54, 'Kecmanovic', 'Miomir', 905),
(55, 'Thompson', 'Jordan', 902),
(56, 'Altmaier', 'Daniel', 891),
(57, 'Bautista Agut', 'Roberto', 886),
(58, 'Zhang', 'Zhizhen', 885),
(59, 'Fucsovics', 'Marton', 882),
(60, 'Kokkinakis', 'Thanasi', 802),
(61, 'Borges', 'Nuno', 799),
(62, 'Kotov', 'Pavel', 791),
(63, 'O\'Connell', 'Christopher', 780),
(64, 'Ruusuvuori', 'Emil', 771),
(65, 'Cachin', 'Pedro', 763),
(66, 'Hijikata', 'Rinky', 744),
(67, 'Gojo', 'Borna', 744),
(68, 'Bonzi', 'Benjamin', 738),
(69, 'Monfils', 'Gaël', 737),
(70, 'Daniel', 'Taro', 737),
(71, 'Gasquet', 'Richard', 735),
(72, 'Koepfer', 'Dominik', 733),
(73, 'Machac', 'Tomas', 722),
(74, 'Seyboth Wild', 'Thiago', 718),
(75, 'Giron', 'Marcos', 860),
(76, 'Draper', 'Jack', 856),
(77, 'Vukic', 'Aleksandar', 835),
(78, 'Carballes Baena', 'Roberto', 816),
(79, 'Marozsan', 'Fabian', 805),
(80, 'Zapata Miralles', 'Bernabe', 715),
(81, 'Müller', 'Alexandre', 714),
(82, 'Garin', 'Cristian', 709),
(83, 'Varillas', 'Juan Pablo', 709),
(84, 'Barrère', 'Grégoire', 708),
(85, 'Tabilo', 'Alejandro', 707),
(86, 'Munar', 'Jaume', 706),
(87, 'Lestienne', 'Constant', 699),
(88, 'Coria', 'Federico', 694),
(89, 'Ramos Vinolas', 'Albert', 688),
(90, 'Van Assche', 'Luca', 687),
(91, 'Marterer', 'Maximilian', 683),
(92, 'Berrettini', 'Matteo', 682),
(93, 'Galan', 'Daniel Elahi', 676),
(94, 'Stricker', 'Dominik', 673),
(95, 'Diaz Accosta', 'Facundo', 668),
(96, 'Rinderknech', 'Arthur', 656),
(97, 'Michelsen', 'Alex', 653),
(98, 'Thiem', 'Dominic', 652),
(99, 'Watanuki', 'Yosuke', 646),
(100, 'Halys', 'Quentin', 640);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `IdJoueur` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `notation`
--

INSERT INTO `notation` (`IdJoueur`, `IdUser`, `Note`) VALUES
(91, 4, 2),
(74, 2, 18),
(32, 2, 15),
(41, 1, 20),
(75, 5, 18),
(75, 3, 20),
(91, 5, 4),
(67, 1, 7),
(39, 2, 11),
(47, 1, 7),
(39, 2, 13),
(95, 1, 17),
(74, 1, 1),
(67, 4, 8),
(30, 2, 7),
(6, 5, 6),
(1, 4, 0),
(93, 1, 1),
(47, 1, 20),
(41, 1, 12),
(17, 4, 8),
(21, 3, 17),
(29, 2, 15),
(70, 3, 1),
(60, 4, 6),
(30, 5, 1),
(48, 4, 5),
(74, 7, 19),
(98, 4, 16),
(59, 1, 15),
(25, 7, 2),
(60, 4, 14),
(36, 5, 9),
(98, 1, 20),
(54, 1, 20),
(47, 4, 4),
(3, 3, 15),
(29, 1, 18),
(9, 2, 10),
(2, 7, 15),
(30, 7, 20),
(62, 4, 11),
(11, 7, 16),
(3, 3, 10),
(27, 7, 9),
(11, 3, 11),
(85, 2, 8),
(65, 1, 1),
(18, 7, 19),
(74, 2, 16),
(4, 1, 12),
(96, 7, 0),
(6, 6, 16);

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE `pratique` (
  `IdSurface` int(11) NOT NULL,
  `IdJoueur` int(11) NOT NULL,
  `PourcentageVictoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `pratique`
--

INSERT INTO `pratique` (`IdSurface`, `IdJoueur`, `PourcentageVictoire`) VALUES
(3, 1, 93),
(3, 4, 84),
(3, 3, 80),
(3, 2, 76),
(3, 10, 75),
(3, 9, 68),
(3, 20, 67),
(3, 12, 67),
(3, 6, 67),
(3, 24, 67),
(3, 67, 67),
(3, 22, 65),
(3, 14, 65),
(3, 15, 65),
(3, 13, 64),
(3, 76, 64),
(3, 7, 62),
(3, 16, 62),
(3, 19, 62),
(3, 17, 61),
(3, 23, 60),
(3, 5, 60),
(3, 41, 60),
(3, 29, 59),
(3, 69, 58),
(3, 72, 58),
(3, 79, 58),
(3, 44, 58),
(3, 33, 57),
(3, 36, 56),
(3, 42, 56),
(3, 26, 55),
(3, 31, 55),
(3, 64, 54),
(3, 68, 54),
(3, 37, 54),
(3, 8, 54),
(3, 21, 54),
(3, 50, 53),
(3, 35, 52),
(3, 49, 52),
(3, 53, 51),
(3, 46, 50),
(3, 47, 50),
(3, 11, 50),
(3, 59, 50),
(3, 60, 50),
(3, 48, 50),
(3, 82, 50),
(3, 62, 50),
(3, 43, 50),
(3, 58, 50),
(3, 54, 48),
(3, 18, 48),
(3, 70, 48),
(3, 52, 47),
(3, 39, 46),
(3, 75, 46),
(3, 28, 45),
(3, 71, 45),
(3, 57, 45),
(3, 73, 45),
(3, 40, 44),
(3, 92, 44),
(3, 66, 44),
(3, 38, 43),
(3, 94, 43),
(3, 84, 42),
(3, 34, 42),
(3, 99, 42),
(3, 30, 41),
(3, 100, 41),
(3, 77, 41),
(3, 27, 40),
(3, 55, 40),
(3, 61, 38),
(3, 25, 37),
(3, 63, 37),
(3, 45, 36),
(3, 32, 36),
(3, 98, 35),
(3, 90, 33),
(3, 83, 33),
(3, 96, 32),
(3, 87, 29),
(3, 78, 25),
(3, 51, 25),
(3, 56, 19),
(3, 93, 17),
(3, 80, 17),
(3, 89, 9),
(4, 4, 91),
(4, 1, 85),
(4, 29, 82),
(4, 22, 79),
(4, 20, 75),
(4, 3, 73),
(4, 9, 71),
(4, 14, 71),
(4, 48, 67),
(4, 6, 67),
(4, 33, 64),
(4, 23, 63),
(4, 12, 62),
(4, 7, 61),
(4, 32, 61),
(4, 36, 60),
(4, 31, 58),
(4, 8, 58),
(4, 46, 57),
(4, 54, 54),
(4, 64, 54),
(4, 50, 53),
(4, 84, 50),
(4, 49, 47),
(4, 5, 46),
(4, 98, 42),
(4, 68, 40),
(4, 90, 40),
(4, 94, 30),
(1, 2, 100),
(1, 1, 86),
(1, 32, 82),
(1, 5, 80),
(1, 23, 78),
(1, 16, 78),
(1, 8, 78),
(1, 22, 75),
(1, 34, 75),
(1, 21, 75),
(1, 4, 73),
(1, 14, 71),
(1, 59, 71),
(1, 25, 71),
(1, 7, 71),
(1, 3, 70),
(1, 12, 67),
(1, 9, 67),
(1, 27, 67),
(1, 66, 67),
(1, 97, 67),
(1, 100, 67),
(1, 62, 67),
(1, 91, 67),
(1, 49, 67),
(1, 55, 64),
(1, 31, 62),
(1, 39, 62),
(1, 57, 60),
(1, 92, 60),
(1, 93, 60),
(1, 24, 60),
(1, 18, 60),
(1, 13, 58),
(1, 33, 57),
(1, 51, 57),
(1, 19, 57),
(1, 63, 57),
(1, 84, 56),
(1, 41, 54),
(1, 6, 50),
(1, 53, 50),
(1, 99, 50),
(1, 81, 50),
(1, 86, 50),
(1, 11, 50),
(1, 94, 50),
(1, 10, 43),
(1, 20, 43),
(1, 64, 43),
(1, 78, 40),
(1, 26, 40),
(1, 35, 40),
(1, 17, 40);

-- --------------------------------------------------------

--
-- Structure de la table `surface`
--

CREATE TABLE `surface` (
  `IdSurface` int(11) NOT NULL,
  `TypeSurface` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `surface`
--

INSERT INTO `surface` (`IdSurface`, `TypeSurface`) VALUES
(1, 'Gazon'),
(2, 'Terre battue'),
(3, 'Dur'),
(4, 'Indoor');

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE `tournoi` (
  `IdTournoi` int(11) NOT NULL,
  `NomTournoi` varchar(20) NOT NULL,
  `DateTournoi` date NOT NULL,
  `IdCategorie` int(11) NOT NULL,
  `IdSurface` int(11) NOT NULL,
  `IdJoueur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tournoi`
--

INSERT INTO `tournoi` (`IdTournoi`, `NomTournoi`, `DateTournoi`, `IdCategorie`, `IdSurface`, `IdJoueur`) VALUES
(1, 'Adelaïde 1', '2023-01-01', 1, 3, 1),
(2, 'Pune', '2023-01-02', 1, 3, 23),
(5, 'Auckland', '2023-01-09', 1, 3, 71),
(6, 'Adelaïde 2', '2023-01-09', 1, 3, 57),
(7, 'Open d\'Australie', '2023-01-16', 4, 3, 1),
(8, 'Dallas', '2023-02-06', 1, 3, 10),
(9, 'Cordoba', '2023-02-06', 1, 2, 28),
(10, 'Montpellier', '2023-02-06', 1, 4, 4),
(11, 'Rotterdam', '2023-02-13', 2, 4, 3),
(12, 'Delray Beach', '2023-02-13', 1, 3, 10),
(13, 'Buenos Aires', '2023-02-13', 1, 2, 2),
(14, 'Rio de Janeiro', '2023-02-20', 2, 2, 18),
(15, 'Doha', '2023-02-20', 1, 3, 3),
(16, 'Marseille', '2023-02-20', 1, 4, 9),
(17, 'Dubaï', '2023-02-27', 2, 3, 3),
(18, 'Acapulco', '2023-02-27', 2, 3, 12),
(19, 'Santiago', '2023-02-27', 1, 2, 19),
(20, 'Indian Wells', '2023-03-08', 3, 3, 2),
(21, 'Miami', '2023-03-22', 3, 3, 3),
(22, 'Houston', '2023-04-03', 1, 2, 16),
(23, 'Marrakech', '2023-04-03', 1, 2, 78),
(24, 'Estoril', '2023-04-03', 1, 2, 11),
(25, 'Monte Carlo', '2023-04-09', 3, 2, 5),
(26, 'Barcelone', '2023-04-17', 2, 2, 2),
(27, 'Banja Luka', '2023-04-17', 1, 2, 52),
(28, 'Munich', '2023-04-17', 1, 2, 8),
(29, 'Madrid', '2023-04-26', 3, 2, 2),
(30, 'Rome', '2023-05-10', 3, 2, 3),
(31, 'Genève', '2023-05-21', 1, 2, 19),
(32, 'Lyon', '2023-05-21', 1, 2, 36),
(33, 'Roland Garros', '2023-05-28', 4, 2, 1),
(34, 'Stuttgart', '2023-06-12', 1, 1, 16),
(35, 'Bois-le-duc', '2023-06-12', 1, 1, 23),
(36, 'Halle', '2023-06-19', 2, 1, 32),
(37, 'Queen\'s', '2023-06-19', 2, 1, 2),
(38, 'Majorque', '2023-06-19', 1, 1, 34),
(39, 'Eastbourne', '2023-06-26', 1, 1, 21),
(40, 'Wimbledon', '2023-07-03', 4, 1, 2),
(41, 'Newport', '2023-07-17', 1, 1, 22),
(42, 'Gstaad', '2023-07-17', 1, 2, 65),
(43, 'Bastad', '2023-07-17', 1, 2, 5),
(44, 'Hambourg', '2023-07-24', 2, 2, 7),
(45, 'Altanta', '2023-07-24', 1, 3, 10),
(46, 'Umag', '2023-07-24', 1, 2, 40),
(47, 'Washington', '2023-07-31', 2, 3, 38),
(48, 'Los Cabos', '2023-07-31', 1, 3, 6),
(49, 'Kitzbuhel', '2023-07-31', 1, 2, 28),
(50, 'Cincinnati', '2023-08-13', 3, 3, 1),
(51, 'Rogers Cup', '2023-08-07', 3, 3, 4),
(52, 'Winston-Salem', '2023-08-20', 1, 3, 28),
(53, 'US Open', '2023-08-28', 4, 3, 1),
(54, 'Chengdu', '2023-09-20', 1, 3, 7),
(55, 'Zhuhai', '2023-09-20', 1, 3, 15),
(56, 'Astana', '2023-12-27', 1, 3, 22),
(57, 'Pekin', '2023-09-28', 2, 3, 4),
(58, 'Shanghai', '2023-10-04', 3, 3, 9),
(59, 'Tokyo', '2023-10-16', 2, 3, 17),
(60, 'Anvers', '2023-10-16', 1, 4, 32),
(61, 'Stockholm', '2023-10-16', 1, 4, 69),
(62, 'Vienne', '2023-10-23', 2, 4, 4),
(63, 'Bâle', '2023-10-23', 2, 4, 29),
(64, 'Paris-Bercy', '2023-10-30', 3, 4, 1),
(65, 'Metz', '2023-11-05', 1, 4, 20),
(66, 'Sofia', '2023-11-07', 1, 4, 22),
(67, 'ATP Finals', '2023-11-12', 4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUser` int(11) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Statut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `Pseudo`, `Password`, `Mail`, `Statut`) VALUES
(1, 'RicoLeRigolo', 'Yeslavie', 'aymeric.massaria@gmail.com', 'Admin'),
(2, 'PierrickDEN03', 'JaimeRire', 'pierrick.dennemont@gmail.com', 'Admin'),
(3, 'Baskaaa', 'BastouLeBambou', 'bastien.argd@gmail.com', 'Utilisateur'),
(4, 'Kekikokoïnen', 'OuaisDeOuf', 'ericballet38090@gmail.com', 'Utilisateur'),
(5, 'Fofore l\'escroc', 'StanFanBoy', 'nael.benchallal@univ-lyon2.fr', 'Utilisateur'),
(6, 'Steph', 'StephFanClub', 'StephLeGoat@gmail.com', 'Utilisateur'),
(7, 'ThorTennis', 'LAlilaLA', 'cedric.hennequin@gmail.com', 'Utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD KEY `IdTournoi` (`IdTournoi`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IdCategorie`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`IdJoueur`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD KEY `IdJoueur` (`IdJoueur`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Index pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD KEY `IdSurface` (`IdSurface`),
  ADD KEY `IdJoueur` (`IdJoueur`);

--
-- Index pour la table `surface`
--
ALTER TABLE `surface`
  ADD PRIMARY KEY (`IdSurface`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`IdTournoi`),
  ADD KEY `IdJoueur` (`IdJoueur`),
  ADD KEY `IdSurface` (`IdSurface`),
  ADD KEY `IdCategorie` (`IdCategorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IdCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `IdJoueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `surface`
--
ALTER TABLE `surface`
  MODIFY `IdSurface` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `IdTournoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `Avis_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `utilisateur` (`IdUser`),
  ADD CONSTRAINT `Avis_ibfk_2` FOREIGN KEY (`IdTournoi`) REFERENCES `tournoi` (`IdTournoi`);

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `Notation_ibfk_1` FOREIGN KEY (`IdJoueur`) REFERENCES `joueur` (`IdJoueur`),
  ADD CONSTRAINT `Notation_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `utilisateur` (`IdUser`);

--
-- Contraintes pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD CONSTRAINT `Pratique_ibfk_1` FOREIGN KEY (`IdSurface`) REFERENCES `surface` (`IdSurface`),
  ADD CONSTRAINT `Pratique_ibfk_2` FOREIGN KEY (`IdJoueur`) REFERENCES `joueur` (`IdJoueur`);

--
-- Contraintes pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD CONSTRAINT `Tournoi_ibfk_1` FOREIGN KEY (`IdCategorie`) REFERENCES `categorie` (`IdCategorie`),
  ADD CONSTRAINT `Tournoi_ibfk_2` FOREIGN KEY (`IdSurface`) REFERENCES `surface` (`IdSurface`),
  ADD CONSTRAINT `Tournoi_ibfk_3` FOREIGN KEY (`IdJoueur`) REFERENCES `joueur` (`IdJoueur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
