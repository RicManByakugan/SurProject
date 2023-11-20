-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2022 at 07:58 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sur`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `idAdminAct` int(11) NOT NULL,
  `TypeAct` varchar(1000) NOT NULL,
  `DescAct` varchar(1000) NOT NULL,
  `heureAct` time NOT NULL,
  `dateAct` date NOT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `idAdminAct` (`idAdminAct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `activiteuser`
--

DROP TABLE IF EXISTS `activiteuser`;
CREATE TABLE IF NOT EXISTS `activiteuser` (
  `idActiviteUser` int(11) NOT NULL AUTO_INCREMENT,
  `idUserAct` int(11) NOT NULL,
  `descAct` varchar(500) NOT NULL,
  `DateActU` date NOT NULL,
  `HeureActU` time NOT NULL,
  PRIMARY KEY (`idActiviteUser`),
  KEY `idUserAct` (`idUserAct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL,
  `nom_admin` varchar(255) DEFAULT NULL,
  `prenom_admin` varchar(255) DEFAULT NULL,
  `contact_admin` varchar(255) DEFAULT NULL,
  `email_admin` varchar(255) DEFAULT NULL,
  `poste_admin` varchar(250) DEFAULT NULL,
  `profil_admin` longtext,
  `status_admin` varchar(255) DEFAULT NULL,
  `dernierConnexion` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id_admin`, `pseudo_admin`, `mdp_admin`, `nom_admin`, `prenom_admin`, `contact_admin`, `email_admin`, `poste_admin`, `profil_admin`, `status_admin`, `dernierConnexion`) VALUES
(1, 'Man', '9d32f54a7c3b153ccd7cbd587051229d', 'Ratovonirina', 'Eric', '0342487719', 'eric.ratovonirina@gmail.com', 'INFORMATIQUE', NULL, 'OK', 1645106013),
(2, 'Cesar', 'b3f5e8cbf06ddeb7f8e43a7779107236', 'Andrianomanana', 'Endrehina', '0349107490', 'cesar@gmail.com', 'MANAGEMENT DES AFFAIRES', NULL, 'OK', 1644587977);

-- --------------------------------------------------------

--
-- Table structure for table `carat`
--

DROP TABLE IF EXISTS `carat`;
CREATE TABLE IF NOT EXISTS `carat` (
  `idCarat` int(11) NOT NULL AUTO_INCREMENT,
  `numCompte` varchar(250) NOT NULL,
  `idUserPC` int(11) NOT NULL,
  `creditPC` int(11) NOT NULL,
  PRIMARY KEY (`idCarat`),
  KEY `idUserPC` (`idUserPC`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carat`
--

INSERT INTO `carat` (`idCarat`, `numCompte`, `idUserPC`, `creditPC`) VALUES
(1, '6728-1001', 1, 0),
(2, '6728-1002', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `caratactvity`
--

DROP TABLE IF EXISTS `caratactvity`;
CREATE TABLE IF NOT EXISTS `caratactvity` (
  `idCaratAct` int(11) NOT NULL AUTO_INCREMENT,
  `idCaratC` int(11) NOT NULL,
  `idAdminRes` int(11) DEFAULT NULL,
  `Action` varchar(250) NOT NULL,
  `montant` int(11) NOT NULL,
  `Solde` int(11) NOT NULL,
  `ReferCarat` int(11) NOT NULL,
  `cacheUser` varchar(250) DEFAULT NULL,
  `DateCA` date NOT NULL,
  `HeureCA` time NOT NULL,
  PRIMARY KEY (`idCaratAct`),
  KEY `idCaratC` (`idCaratC`),
  KEY `idAdminRes` (`idAdminRes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commandeuser`
--

DROP TABLE IF EXISTS `commandeuser`;
CREATE TABLE IF NOT EXISTS `commandeuser` (
  `idComFait` int(11) NOT NULL AUTO_INCREMENT,
  `idComCoUser` bigint(11) NOT NULL,
  `idComUser` int(11) NOT NULL,
  `idComPub` int(11) NOT NULL,
  `QtCom` int(11) NOT NULL,
  `opCom` varchar(250) NOT NULL,
  `numCom` varchar(250) NOT NULL,
  `adreCom` longtext NOT NULL,
  `proCom` longtext NOT NULL,
  `statusCom` varchar(250) NOT NULL,
  `causeDec` text,
  `dateCom` date NOT NULL,
  `heureCom` time NOT NULL,
  PRIMARY KEY (`idComFait`),
  KEY `idComUser` (`idComUser`),
  KEY `idComPub` (`idComPub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diponibilitepub`
--

DROP TABLE IF EXISTS `diponibilitepub`;
CREATE TABLE IF NOT EXISTS `diponibilitepub` (
  `idDispo` int(11) NOT NULL AUTO_INCREMENT,
  `idPubDispo` int(11) NOT NULL,
  `Antananarivo` varchar(255) DEFAULT NULL,
  `Antsiranana` varchar(255) DEFAULT NULL,
  `Fianarantsoa` varchar(255) DEFAULT NULL,
  `Mahajanga` varchar(255) DEFAULT NULL,
  `Toamasina` varchar(255) DEFAULT NULL,
  `Toliara` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDispo`),
  KEY `idPubDispo` (`idPubDispo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin_mess` int(11) NOT NULL,
  `contain_mess` text NOT NULL,
  `imageMess1` mediumtext,
  `imageMess2` mediumtext,
  `imageMess3` mediumtext,
  `date_mess` date NOT NULL,
  `heure_mess` time NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `idAdmin_mess` (`idAdmin_mess`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifcommande`
--

DROP TABLE IF EXISTS `notifcommande`;
CREATE TABLE IF NOT EXISTS `notifcommande` (
  `idNC` int(11) NOT NULL AUTO_INCREMENT,
  `idNumNC` int(11) NOT NULL,
  `idUserNC` int(11) NOT NULL,
  `descNotifNC` varchar(250) NOT NULL,
  `statusNotifNC` varchar(250) NOT NULL,
  `dateNotifNC` date NOT NULL,
  `heureNotifNC` time NOT NULL,
  PRIMARY KEY (`idNC`),
  KEY `idUserNC` (`idUserNC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `idAdminEnvoie` int(11) NOT NULL,
  `idAdminRecoit` int(11) DEFAULT NULL,
  `descNotif` text NOT NULL,
  `typeNotif` varchar(255) NOT NULL,
  `statusNotif` varchar(255) NOT NULL,
  `dateNotif` date NOT NULL,
  `tempsNotif` time NOT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `idAdminEnvoie` (`idAdminEnvoie`,`idAdminRecoit`),
  KEY `idAdminRecoit` (`idAdminRecoit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `idUserPanier` int(11) NOT NULL,
  `idPubPanier` int(11) NOT NULL,
  `QtPanier` int(11) NOT NULL,
  `statusPanier` varchar(250) NOT NULL,
  `datePanier` date NOT NULL,
  `heurePanier` time NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `idUserPanier` (`idUserPanier`),
  KEY `idPubPanier` (`idPubPanier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin_partenaire` int(11) NOT NULL,
  `nom_partenaire` varchar(255) NOT NULL,
  `contactpartenaire` varchar(250) DEFAULT NULL,
  `logo_partenaire` mediumtext NOT NULL,
  `province_partenaire` varchar(255) DEFAULT NULL,
  `adresse_partenaire` varchar(255) DEFAULT NULL,
  `date_partenaire` date NOT NULL,
  `heure_partenaire` time NOT NULL,
  PRIMARY KEY (`id_partenaire`),
  KEY `idAdmin_partenaire` (`idAdmin_partenaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin_pub` int(11) NOT NULL,
  `type_pub` varchar(250) NOT NULL,
  `categorie_pub` varchar(255) NOT NULL,
  `titre_pub` varchar(255) NOT NULL,
  `genrePub` varchar(255) DEFAULT NULL,
  `PrioPub` varchar(255) DEFAULT NULL,
  `desc_pub` text CHARACTER SET utf8 NOT NULL,
  `prix_pub` int(11) NOT NULL,
  `prix_prom` int(11) DEFAULT NULL,
  `date_com` date DEFAULT NULL,
  `img1_pub` longtext NOT NULL,
  `img2_pub` longtext NOT NULL,
  `img3_pub` longtext NOT NULL,
  `img4_pub` longtext,
  `date_pub` date NOT NULL,
  `heure_pub` time NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `idAdmin_pub` (`idAdmin_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `id_spons` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmin_spons` int(11) NOT NULL,
  `nom_spons` varchar(255) NOT NULL,
  `contactSpons` varchar(250) DEFAULT NULL,
  `logo_spons` mediumtext NOT NULL,
  `Province_spons` varchar(255) DEFAULT NULL,
  `Adresse_spons` varchar(255) DEFAULT NULL,
  `date_spons` date NOT NULL,
  `heure_spons` time NOT NULL,
  PRIMARY KEY (`id_spons`),
  KEY `idAdmin_spons` (`idAdmin_spons`),
  KEY `idAdmin_spons_2` (`idAdmin_spons`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sur`
--

DROP TABLE IF EXISTS `sur`;
CREATE TABLE IF NOT EXISTS `sur` (
  `id_sur` int(11) NOT NULL,
  `tel_sur` varchar(255) DEFAULT NULL,
  `tel_sur2` varchar(255) DEFAULT NULL,
  `tel_sur3` varchar(255) DEFAULT NULL,
  `autre_tel` varchar(2255) DEFAULT NULL,
  `email_sur` varchar(255) DEFAULT NULL,
  `newArrivage_sur` date DEFAULT NULL,
  `newProm_sur` date DEFAULT NULL,
  `fbSur` mediumtext,
  `youSur` mediumtext,
  `instaSur` mediumtext,
  `twiSur` mediumtext,
  `off` varchar(10) DEFAULT NULL,
  `ofH` int(11) DEFAULT NULL,
  `ofM` int(11) DEFAULT NULL,
  `ofS` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sur`
--

INSERT INTO `sur` (`id_sur`, `tel_sur`, `tel_sur2`, `tel_sur3`, `autre_tel`, `email_sur`, `newArrivage_sur`, `newProm_sur`, `fbSur`, `youSur`, `instaSur`, `twiSur`, `off`, `ofH`, `ofM`, `ofS`) VALUES
(1, '0342415789', '0324578963', '0330303303', NULL, 'surmada@gmail.com', NULL, NULL, 'https://facebook.com/surmada', NULL, NULL, NULL, NULL, 23, 59, 49);

-- --------------------------------------------------------

--
-- Table structure for table `usersee`
--

DROP TABLE IF EXISTS `usersee`;
CREATE TABLE IF NOT EXISTS `usersee` (
  `idUs` int(11) NOT NULL AUTO_INCREMENT,
  `idUserUs` int(11) NOT NULL,
  `idPubUs` int(11) NOT NULL,
  `descUs` text NOT NULL,
  `dateUs` date NOT NULL,
  `heureUs` time NOT NULL,
  PRIMARY KEY (`idUs`),
  KEY `idUserUs` (`idUserUs`,`idPubUs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `imageUser` mediumtext,
  `nomUser` varchar(255) DEFAULT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `sexeUser` varchar(255) NOT NULL,
  `contactUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `mdpUser` varchar(255) DEFAULT NULL,
  `provinceUser` varchar(255) NOT NULL,
  `statusUser` varchar(255) DEFAULT NULL,
  `inscriptionUser` datetime NOT NULL,
  `dernierCoUser` bigint(20) NOT NULL,
  `codeUser` varchar(255) DEFAULT NULL,
  `UserReady` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `imageUser`, `nomUser`, `prenomUser`, `sexeUser`, `contactUser`, `emailUser`, `mdpUser`, `provinceUser`, `statusUser`, `inscriptionUser`, `dernierCoUser`, `codeUser`, `UserReady`) VALUES
(1, '50801643617535surimageUser.jpg', 'Ratovonirina', 'Ric', 'Homme', '0342487719', 'eric.ratovonirina@gmail.com', '9d32f54a7c3b153ccd7cbd587051229d', 'Antananarivo', 'KO', '2021-07-22 20:43:21', 1626975801, NULL, 'OK'),
(2, NULL, 'Rabarison', 'Princia', 'Femme', '0326792559', 'rabarison@gmail.com', 'd59cf7153e8c3c998f0f048fe7b33bdb', 'Antananarivo', 'KO', '2022-02-14 11:09:07', 1644826147, NULL, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurnotifcommande`
--

DROP TABLE IF EXISTS `utilisateurnotifcommande`;
CREATE TABLE IF NOT EXISTS `utilisateurnotifcommande` (
  `idNCUS` int(11) NOT NULL AUTO_INCREMENT,
  `idNumNCUS` int(11) NOT NULL,
  `idUserNCUS` int(11) NOT NULL,
  `descNotifNCUS` text NOT NULL,
  `statusNotifNCUS` varchar(250) NOT NULL,
  `dateNotifNCUS` date NOT NULL,
  `heureNotifNCUS` time NOT NULL,
  PRIMARY KEY (`idNCUS`),
  KEY `idNumNCUS` (`idNumNCUS`),
  KEY `idUserNCUS` (`idUserNCUS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utlilisateurusernotification`
--

DROP TABLE IF EXISTS `utlilisateurusernotification`;
CREATE TABLE IF NOT EXISTS `utlilisateurusernotification` (
  `idUNotifNC` int(11) NOT NULL AUTO_INCREMENT,
  `idUserNotifNC` int(11) DEFAULT NULL,
  `idPubNotifLNC` int(11) DEFAULT NULL,
  `idCoNotifLNC` int(11) DEFAULT NULL,
  `descNotifUNC` text NOT NULL,
  `statusNUNC` varchar(250) NOT NULL,
  `dateNUNC` date NOT NULL,
  `heureNUNC` time NOT NULL,
  PRIMARY KEY (`idUNotifNC`),
  KEY `idUNotifNC` (`idUNotifNC`),
  KEY `idPubNotifLNC` (`idPubNotifLNC`),
  KEY `idCoNotifLNC` (`idCoNotifLNC`),
  KEY `idUserNotifNC` (`idUserNotifNC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utlisateurnav`
--

DROP TABLE IF EXISTS `utlisateurnav`;
CREATE TABLE IF NOT EXISTS `utlisateurnav` (
  `idusernav` int(11) NOT NULL AUTO_INCREMENT,
  `UserAgent` varchar(9000) NOT NULL,
  `Platform` varchar(250) NOT NULL,
  `Product` varchar(252) NOT NULL,
  `DatedAt` date NOT NULL,
  `TimeAt` time NOT NULL,
  PRIMARY KEY (`idusernav`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utlisateurnavcommande`
--

DROP TABLE IF EXISTS `utlisateurnavcommande`;
CREATE TABLE IF NOT EXISTS `utlisateurnavcommande` (
  `idComFaitNCa` int(11) NOT NULL AUTO_INCREMENT,
  `idCoNamerNCa` int(11) NOT NULL,
  `idUserNCa` int(11) NOT NULL,
  `nomNCa` varchar(255) DEFAULT NULL,
  `prenomNCa` varchar(255) DEFAULT NULL,
  `idPubNCa` int(11) NOT NULL,
  `QtCNCa` int(11) NOT NULL,
  `opNCa` varchar(250) NOT NULL,
  `numNCa` varchar(250) NOT NULL,
  `adreNCa` varchar(250) NOT NULL,
  `proNCa` varchar(250) NOT NULL,
  `statusNCa` varchar(250) NOT NULL,
  `causeDNCa` text,
  `DateNCa` date NOT NULL,
  `HeureNCa` time NOT NULL,
  PRIMARY KEY (`idComFaitNCa`),
  KEY `idComFaitNCa` (`idComFaitNCa`,`idUserNCa`),
  KEY `idPubNCa` (`idPubNCa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utlisateurnavpanier`
--

DROP TABLE IF EXISTS `utlisateurnavpanier`;
CREATE TABLE IF NOT EXISTS `utlisateurnavpanier` (
  `idunPanier` int(11) NOT NULL AUTO_INCREMENT,
  `idUserNPa` int(11) NOT NULL,
  `idPubNPa` int(11) NOT NULL,
  `QtPanierNPa` int(11) NOT NULL,
  `statusPanierNPa` varchar(250) NOT NULL,
  `DateNPa` date NOT NULL,
  `HeureNPa` time NOT NULL,
  PRIMARY KEY (`idunPanier`),
  KEY `idUserNPa` (`idUserNPa`),
  KEY `idPubNPa` (`idPubNPa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`idAdmin_pub`) REFERENCES `administration` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usersee`
--
ALTER TABLE `usersee`
  ADD CONSTRAINT `usersee_ibfk_1` FOREIGN KEY (`idUserUs`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
