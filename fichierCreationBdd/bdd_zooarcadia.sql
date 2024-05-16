-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mai 2024 à 11:02
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
-- Base de données : `bdd_zooarcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `Id_Animal` int(11) NOT NULL,
  `animal_firstName` varchar(50) NOT NULL,
  `Id_Habitat` int(11) NOT NULL,
  `Id_Race` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`Id_Animal`, `animal_firstName`, `Id_Habitat`, `Id_Race`, `image`) VALUES
(1, 'Padington le petit panda', 6, 2, 'panda.jpg'),
(2, 'poppy la marmotte', 4, 9, 'marmotte.jpg'),
(3, 'teddy bear le gros ours', 6, 2, 'ours.jpg'),
(6, 'goupil le renard', 3, 11, 'renard.jpg'),
(12, 'castor', 4, 10, 'castor.jpg'),
(13, 'bouba', 3, 11, 'mon image'),
(14, 'castor premier', 4, 10, 'castor.jpg'),
(16, 'lion premier', 1, 1, 'lion.jpg'),
(18, 'crocodile premier', 2, 5, 'crocodile.jpg'),
(19, 'girafe premiere', 5, 4, 'girafe.jpg'),
(20, 'ours second', 6, 2, 'ours.jpg'),
(21, 'lionne ', 1, 1, 'lionne.jpg'),
(23, 'chimpanzé', 13, 12, 'chimpanzé.jpg'),
(24, 'Gorille', 14, 12, 'gorille.jpg'),
(25, 'ponchien', 3, 11, 'ponchien.jpg'),
(26, 'panda second', 6, 6, 'panda.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `avis_id` int(10) NOT NULL,
  `avis_champ` text NOT NULL,
  `visiteur_pseudo` varchar(50) NOT NULL,
  `champ_valider` tinyint(4) NOT NULL,
  `avis_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`avis_id`, `avis_champ`, `visiteur_pseudo`, `champ_valider`, `avis_date`) VALUES
(2, 'mon message', 'jacque', 0, '2024-05-10 18:31:05.666347'),
(3, 'un nouveau message', 'toto', 0, '2024-05-10 18:31:05.666347'),
(4, 'un nouveau message', 'toto', 0, '2024-05-10 18:31:05.666347'),
(5, 'tuti fruiti', 'berlusconni', 0, '2024-05-10 18:31:05.666347'),
(6, 'un nouveau message', 'toto', 0, '2024-05-10 18:31:05.666347'),
(7, 'un nouveau message', 'toto', 0, '2024-05-10 18:31:05.666347'),
(8, 'mon message', 'rasmus', 0, '2024-05-10 18:31:05.666347'),
(9, 'mon message aussi', 'bouba', 0, '2024-05-10 18:31:05.666347'),
(10, 'site en maintenance', 'visiteur a', 0, '2024-05-10 18:31:05.666347'),
(11, 'mon message', 'sylvain', 0, '2024-05-10 18:31:05.666347'),
(12, 'text', 'jean gerald centaure', 0, '2024-05-10 18:31:05.666347'),
(13, 'text', 'jean gerald centaure', 0, '2024-05-10 18:31:05.666347'),
(14, 'tres bon sejour', 'eclipse', 0, '2024-05-10 18:39:21.821184');

-- --------------------------------------------------------

--
-- Structure de la table `category_race`
--

CREATE TABLE `category_race` (
  `race_id` int(11) NOT NULL,
  `animal_label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category_race`
--

INSERT INTO `category_race` (`race_id`, `animal_label`) VALUES
(1, 'Lion'),
(2, 'Ours'),
(4, 'Zebre'),
(5, 'Crocodile'),
(6, 'Pandas'),
(7, 'Pelican'),
(8, 'Wombat'),
(9, 'Marmotte'),
(10, 'Castor'),
(11, 'canin'),
(12, 'singe');

-- --------------------------------------------------------

--
-- Structure de la table `category_role`
--

CREATE TABLE `category_role` (
  `category_id` int(10) NOT NULL,
  `role_label` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category_role`
--

INSERT INTO `category_role` (`category_id`, `role_label`) VALUES
(1, 'Administrateur'),
(2, 'véterinaire'),
(3, 'employé');

-- --------------------------------------------------------

--
-- Structure de la table `comporte`
--

CREATE TABLE `comporte` (
  `Id_Habitat` int(11) NOT NULL,
  `Id_Image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `consulte_ajoute`
--

CREATE TABLE `consulte_ajoute` (
  `Id_Services` int(11) NOT NULL,
  `Id_Employé` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employé`
--

CREATE TABLE `employé` (
  `employé_id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employé`
--

INSERT INTO `employé` (`employé_id`, `password`, `email`, `username`, `id_Role`) VALUES
(3, 'garcia', 'garcia@zooarcadia.lol', 'garcia', 1),
(4, 'dupont', 'dupont@zooarcadia.lol', 'Dupont', 2),
(6, 'paloma', 'paloma@zooarcadia.lol', 'paloma', 3),
(16, 'dartagnan', 'dartagnan@gmail.com', 'dartagnan', 3),
(18, 'nouveau', 'nouveau@zooarcadia.lol', 'nouveau', 3),
(19, 'athos', 'athos@zooarcadia.lol', 'athos', 3);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `habitat_id` int(11) NOT NULL,
  `habitat_nom` varchar(50) NOT NULL,
  `habitat_commentaire` text NOT NULL,
  `habitat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`habitat_id`, `habitat_nom`, `habitat_commentaire`, `habitat_description`) VALUES
(1, 'Habitat Felins', '', 'lions ,tigres,guepards,pantheres'),
(2, 'Habitat reptile', '', 'vivarium, crocodile,varan comodo,salamandre'),
(3, 'Habitat caniné', '', 'hyenes, renards,loups'),
(4, 'petit mamiphères rongeurs', '', 'les lapins, les cobayes, les octodons, les chinchillas, les hamsters (nains), les rats, les souris, les gerbilles, les écureuils et les furets.'),
(5, 'Habitat équidés', '', 'Chevaux ,Ane,Zebre'),
(6, 'Habitat ursidé', '', 'Les ours forment la famille de mammifères des ursidés (Ursidae), de l\'ordre des carnivores (Carnivora). Le Grand panda, dont la classification a longtemps prêté à débat, est aujourd\'hui considéré comme un ours herbivore au sein de cette famille.'),
(13, 'Habitat petit singe', '', 'chimpanzé,maquaque,ouistiti'),
(14, 'Habitat grand singe', 'Gorille, Orang-outan,mandrill', 'Gorille, Orang-outan,mandrill');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_data` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `informations_general`
--

CREATE TABLE `informations_general` (
  `id` int(11) NOT NULL,
  `horaires` text NOT NULL,
  `informations` text NOT NULL,
  `evenements` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_veterinaire`
--

CREATE TABLE `rapport_veterinaire` (
  `rapport_id` int(11) NOT NULL,
  `rapport_Date` date NOT NULL DEFAULT current_timestamp(),
  `rapport_Detail` text DEFAULT NULL,
  `etat_de_santé_animal` text DEFAULT NULL,
  `Id_Animal` int(11) NOT NULL,
  `Id_Employé` int(11) NOT NULL,
  `nouriture_label` varchar(250) DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rapport_veterinaire`
--

INSERT INTO `rapport_veterinaire` (`rapport_id`, `rapport_Date`, `rapport_Detail`, `etat_de_santé_animal`, `Id_Animal`, `Id_Employé`, `nouriture_label`, `quantité`) VALUES
(1, '2024-05-07', 'Poppy n\' a pas manger sa ration aujourd\'hui', 'bon état de saté général', 2, 6, '', 0),
(2, '2024-05-14', 'a tres bon appetit\r\n\r\n30kgs de bambou', 'bonne santé', 1, 6, '', 0),
(3, '2024-05-14', 'ne mange pas aujourd\'hui', 'bonne santé', 12, 16, '', 0),
(4, '2024-05-14', 'ne mange pas', 'bon', 3, 6, NULL, NULL),
(5, '2024-05-14', 'ne mange pas', 'bon', 6, 6, NULL, NULL),
(29, '0000-00-00', '.en très bonne forme.', '.stable pas de température. ', 12, 3, NULL, NULL),
(30, '2024-05-15', '.en très bonne forme.', '.stable pas de température. ', 2, 4, NULL, NULL),
(31, '2024-05-15', '.chien en très grande forme.', '.kyste à surveillé. ', 25, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) NOT NULL,
  `service_nom` varchar(50) NOT NULL,
  `service_description` varchar(250) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`service_id`, `service_nom`, `service_description`, `icon`) VALUES
(1, 'Restauration', 'Restaurant pour tout les gouts\r\nvenez découvrir nos spécialitées', '<i class=\"bi bi-cup-straw\"></i>'),
(2, 'visite des habitats ', 'Visite des habitats avec guide gratuit renseignez vous', '<i class=\"bi bi-train-lightrail-front\"></i>'),
(3, 'visite du zoo en petit train', 'visite du zoo en petit train a toute heure de la journée et tout les jours de la semaine samedi et dimanche inclus', '<i class=\"bi bi-train-lightrail-front\"></i>'),
(6, 'visite vivarium', 'visite de l\'habitat vivarium', ''),
(7, 'aquarium', 'spectacle de présentation et visite de l\'aquarium requin ,dauphin ,orque', '<i class=\"bi bi-water\"></i>');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`Id_Animal`),
  ADD KEY `Id_Habitat` (`Id_Habitat`),
  ADD KEY `Id_Race` (`Id_Race`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`avis_id`),
  ADD KEY `visiteur_id` (`visiteur_pseudo`);

--
-- Index pour la table `category_race`
--
ALTER TABLE `category_race`
  ADD PRIMARY KEY (`race_id`);

--
-- Index pour la table `category_role`
--
ALTER TABLE `category_role`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD PRIMARY KEY (`Id_Habitat`,`Id_Image`),
  ADD KEY `Id_Image` (`Id_Image`);

--
-- Index pour la table `consulte_ajoute`
--
ALTER TABLE `consulte_ajoute`
  ADD PRIMARY KEY (`Id_Services`,`Id_Employé`),
  ADD KEY `Id_Employé` (`Id_Employé`);

--
-- Index pour la table `employé`
--
ALTER TABLE `employé`
  ADD PRIMARY KEY (`employé_id`),
  ADD KEY `id_Role` (`id_Role`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`habitat_id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Index pour la table `informations_general`
--
ALTER TABLE `informations_general`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD PRIMARY KEY (`rapport_id`),
  ADD KEY `Id_Animal` (`Id_Animal`),
  ADD KEY `Id_Employé` (`Id_Employé`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `Id_Animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `avis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `category_race`
--
ALTER TABLE `category_race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `category_role`
--
ALTER TABLE `category_role`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employé`
--
ALTER TABLE `employé`
  MODIFY `employé_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `habitat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `informations_general`
--
ALTER TABLE `informations_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  MODIFY `rapport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`Id_Habitat`) REFERENCES `habitat` (`habitat_id`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`Id_Race`) REFERENCES `category_race` (`race_id`);

--
-- Contraintes pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD CONSTRAINT `comporte_ibfk_1` FOREIGN KEY (`Id_Habitat`) REFERENCES `habitat` (`habitat_id`),
  ADD CONSTRAINT `comporte_ibfk_2` FOREIGN KEY (`Id_Image`) REFERENCES `image` (`image_id`);

--
-- Contraintes pour la table `consulte_ajoute`
--
ALTER TABLE `consulte_ajoute`
  ADD CONSTRAINT `consulte_ajoute_ibfk_1` FOREIGN KEY (`Id_Services`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `consulte_ajoute_ibfk_2` FOREIGN KEY (`Id_Employé`) REFERENCES `employé` (`employé_id`);

--
-- Contraintes pour la table `employé`
--
ALTER TABLE `employé`
  ADD CONSTRAINT `employé_ibfk_1` FOREIGN KEY (`id_Role`) REFERENCES `category_role` (`category_id`);

--
-- Contraintes pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD CONSTRAINT `rapport_veterinaire_ibfk_1` FOREIGN KEY (`Id_Animal`) REFERENCES `animal` (`Id_Animal`),
  ADD CONSTRAINT `rapport_veterinaire_ibfk_2` FOREIGN KEY (`Id_Employé`) REFERENCES `employé` (`employé_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
