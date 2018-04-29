-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 29 Avril 2018 à 18:33
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `adressearchive`
--

CREATE TABLE `adressearchive` (
  `id_adresseclient` int(11) NOT NULL,
  `libelle_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nomcomplet_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `societe_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `voie_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `complement_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lieuditbp_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `codepostal_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `etatprovince_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ville_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pays_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `adresseclient`
--

CREATE TABLE `adresseclient` (
  `id_adresseclient` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `libelle_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nomcomplet_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `societe_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `voie_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `complement_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lieuditbp_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `etatprovince_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ville_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pays_adresseclient` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `typeadresse_adresseclient` int(11) DEFAULT NULL,
  `idclient_type_adresseclient` int(11) DEFAULT NULL,
  `adressedefaut_adresseclient` int(11) NOT NULL,
  `idclient_adressedefaut_adresseclient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresseclient`
--

INSERT INTO `adresseclient` (`id_adresseclient`, `id_client`, `libelle_adresseclient`, `nomcomplet_adresseclient`, `societe_adresseclient`, `voie_adresseclient`, `complement_adresseclient`, `lieuditbp_adresseclient`, `codepostal_adresseclient`, `etatprovince_adresseclient`, `ville_adresseclient`, `pays_adresseclient`, `typeadresse_adresseclient`, `idclient_type_adresseclient`, `adressedefaut_adresseclient`, `idclient_adressedefaut_adresseclient`) VALUES
(16, 1, '35 rue jean bouin', 'Gr&eacute;gory Cascales', '', NULL, NULL, NULL, '66280', 'Occitanie', 'Saleilles', 'France', NULL, NULL, 1, NULL),
(18, 3, '8 rue du carignan', 'antoine tadiotto', '', NULL, NULL, NULL, '66430', 'Occitanie', 'Bompas', 'France', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `idclient_idproduit_avis` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_avis` date NOT NULL,
  `titre_avis` varchar(255) NOT NULL,
  `description_avis` varchar(1000) NOT NULL,
  `note_avis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `idclient_idproduit_avis`, `id_produit`, `id_client`, `date_avis`, `titre_avis`, `description_avis`, `note_avis`) VALUES
(1, 1, 45, 1, '2018-04-03', 'super !', 'huifhuizhui\r\n fizef ioezp\r\n fuizeo fhoizhuo \r\nfzejifoh€hozh', 4),
(3, 3, 45, 3, '2018-04-03', 'Pas mal', 'j\'ai bien oui oui mais oui\r\noui\r\noui', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `id_categorie_parent` int(11) NOT NULL,
  `libelle_categorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `libelle_par_categorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo_categorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `libelle_id_categorie` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ordre_affichage` int(2) NOT NULL,
  `cle_affichage` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `id_categorie_parent`, `libelle_categorie`, `libelle_par_categorie`, `photo_categorie`, `libelle_id_categorie`, `ordre_affichage`, `cle_affichage`) VALUES
(1, 1, 'chaussures', 'chaussures', '...', '1', 1, 1),
(2, 2, 'tshirt', 'tshirt', '', '2', 2, 2),
(3, 3, 'Pulls', 'Pulls', '', '3', 3, 3),
(4, 4, 'Jeans', 'Jeans', '', '4', 4, 4),
(5, 5, 'Joggings', 'Joggings', '', '5', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `email_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nom_affichage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `civilite` int(11) DEFAULT NULL,
  `nom_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL,
  `reponse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreation_client` date NOT NULL,
  `anonyme` int(11) NOT NULL DEFAULT '0',
  `administrateur` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `email_client`, `nom_affichage`, `mot_de_passe`, `civilite`, `nom_client`, `prenom_client`, `telephone_client`, `id_question`, `reponse`, `datecreation_client`, `anonyme`, `administrateur`) VALUES
(1, 'gregory.cascales@gmail.com', 'Gr&eacute;gory', 'ffc76d04fb1121b11fffcc4f1692317d6d1b3450', NULL, 'Cascales', 'Gr&eacute;gory', NULL, NULL, NULL, '2018-04-23', 0, 3),
(2, 'admin@admin.fr', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 'admin', 'admin', NULL, NULL, NULL, '2018-04-23', 0, 3),
(3, 'antoine.tadiotto@gmail.com', 'antoine', '0659897ec921cf93061ed73f261bcfdb7cf90674', NULL, 'tadiotto', 'antoine', NULL, NULL, NULL, '2018-04-26', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `datetime_commande` datetime NOT NULL,
  `etat_commande` float NOT NULL,
  `totalTTC` float NOT NULL,
  `totalHT` float NOT NULL,
  `totalTVA` float NOT NULL DEFAULT '20',
  `fraisportHT` float NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_adresse_facturation` int(11) NOT NULL,
  `id_adresse_livraison` int(11) NOT NULL,
  `num_commande` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `num_facture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_reglement` int(11) NOT NULL,
  `methode_reglement` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `liste_parametres_reglement` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liaisonproduit`
--

CREATE TABLE `liaisonproduit` (
  `id_liaisonproduit` int(11) NOT NULL,
  `id_produitlie` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `ordre_affichage` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignecde`
--

CREATE TABLE `lignecde` (
  `id_lignecde` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `libelle_produit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prixunitaireHT_produit` float NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `remise_produit` float NOT NULL,
  `tauxtaxe` float NOT NULL,
  `totalligne` float NOT NULL,
  `reference` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cle_id_commande_reference` int(11) NOT NULL,
  `id_declinaison_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marque` int(11) NOT NULL,
  `libelle_marque` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo_marque` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `libelle_id_marque` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `libelle_marque`, `photo_marque`, `libelle_id_marque`) VALUES
(1, 'Nike', '', 'Nike'),
(2, 'Adidas', '', 'Adidas'),
(3, 'Ralph Lauren', '', 'Ralph Lauren'),
(4, 'Le coq sportif', '', 'le coq sportif'),
(6, 'tommy hilfiger', '', 'tommy hilfiger');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_client`, `id_produit`) VALUES
(34, 1, 55),
(35, 3, 45),
(36, 3, 55);

-- --------------------------------------------------------

--
-- Structure de la table `photoproduit`
--

CREATE TABLE `photoproduit` (
  `id_photoproduit` int(11) NOT NULL,
  `photo_produit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_produit` int(11) NOT NULL,
  `role_photoproduit` int(11) DEFAULT NULL,
  `id_role_photoproduit` int(11) DEFAULT NULL,
  `pardefaut_photoproduit` int(11) NOT NULL,
  `id_pardefaut_photoproduit` int(11) DEFAULT NULL,
  `numero_photoproduit` int(11) DEFAULT NULL,
  `id_numero_photoproduit` int(11) DEFAULT NULL,
  `role_id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photoproduit`
--

INSERT INTO `photoproduit` (`id_photoproduit`, `photo_produit`, `id_produit`, `role_photoproduit`, `id_role_photoproduit`, `pardefaut_photoproduit`, `id_pardefaut_photoproduit`, `numero_photoproduit`, `id_numero_photoproduit`, `role_id_produit`) VALUES
(1, 'images/produits/cortez-noir.jpg', 45, 1, 1, 1, 1, 1, 1, 1),
(2, 'images/produits/airmax-stevens-04.jpg', 55, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, 'images/produits/-NI122S079-G11-default-10.jpg', 56, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(4, 'images/produits/417uiTHvyJL.jpg', 57, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(5, 'images/produits/C77124-01-standard.jpg', 58, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(6, 'images/produits/INTOTO7-Ralph-Lauren-Polo-Big-Pony-Short-Sleeve-TShirt-White2.jpg', 59, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, 'images/produits/chaussures-homme-baskets-le-coq-sportif-courtset-s.jpg', 60, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(8, 'images/produits/tommy-hilfiger-slim-scanton-jeans-homme-taille-3.jpg', 61, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(9, 'images/produits/ty-ly-chargement-1-.jpg', 62, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(10, 'images/produits/chaussure-remilly-mode-homme-2-tons-le-coq-sportif-bleu.jpg', 63, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(11, 'images/produits/nike-futura-t-shirt-rot-1720.jpg', 64, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(12, 'images/produits/pull-ralph-lauren-polo-homme-col-chemise.jpg', 65, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `libelle_categorie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libelle_marque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_produit` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_produit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prixdepartHT_produit` float NOT NULL,
  `promo_produit` float DEFAULT NULL,
  `prixunitaireHT_produit` float NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `quantitelimite_produit` int(11) DEFAULT NULL,
  `couleur_produit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `libelle_categorie`, `libelle_marque`, `code_produit`, `nom_produit`, `description_produit`, `prixdepartHT_produit`, `promo_produit`, `prixunitaireHT_produit`, `quantite_produit`, `quantitelimite_produit`, `couleur_produit`) VALUES
(45, 'chaussures', 'Nike', 'NIKCHA45', 'old vintage 90\'s', 'description', 50, 10, 45, 20, 20, 'BLEU'),
(55, 'tshirt', 'Nike', 'NIKTSH55', 'test', 'test', 15, 0, 15, 10, NULL, 'Beige'),
(56, 'Pulls', 'Nike', 'NIKPUL56', 'pull gris rouge bleu nike', 'magnifique pull', 70, 0, 70, 9, NULL, 'Gris'),
(57, 'chaussures', 'tommy hilfiger', 'TOMCHA57', 'chaussure tommy hilfiger bleu', 'superbe chaussure oui', 100, 15, 85, 60, NULL, 'Bleu'),
(58, 'chaussures', 'Adidas', 'ADICHA58', 'adidas original stansmith blanc', 'stansmith blanche oui', 100, 0, 100, 45, NULL, 'Blanc'),
(59, 'tshirt', 'Ralph Lauren', 'RALTSH59', 'polo ralph lauren blanc', 'oui polo ralph lauren', 80, 0, 80, 80, NULL, 'Blanc'),
(60, 'chaussures', 'Le coq sportif', 'LE CHA60', 'chaussure blanche le coq sportif', 'superbe chaussure blanche le coq sportif', 100, 0, 100, 700, NULL, 'Blanc'),
(61, 'Jeans', 'tommy hilfiger', 'TOMJEA61', 'jean slim tommy hilfiger homme', 'jean homme tommy hilfiger made in france', 75, 5, 71.25, 55, NULL, 'Bleu'),
(62, 'Pulls', 'Nike', 'NIKPUL62', 'pull nike rouge', 'pull rouge nike 100 % cotton made in france', 75, 0, 75, 555, NULL, 'Rouge'),
(63, 'chaussures', 'Le coq sportif', 'LE CHA63', 'chaussure le coq sportif bleue', 'chaussure le coq sportif bleue douce', 120, 0, 120, 66, NULL, 'Bleu'),
(64, 'tshirt', 'Nike', 'NIKTSH64', 't shirt rouge nike', 't-shirt rouge nike', 20, 0, 20, 777, NULL, 'Rouge'),
(65, 'Pulls', 'Ralph Lauren', 'RALPUL65', 'pull ralph lauren col chemise homme', 'polo ralph lauren col chemise magnifique oui', 55, 0, 55, 8, NULL, 'Bleu');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_utilisateur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mot_de_passe` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `rue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrateur` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `prenom_utilisateur`, `nom_utilisateur`, `mot_de_passe`, `adresse_email`, `code_postal`, `rue`, `pays`, `administrateur`) VALUES
(6, 'membre', 'membre', 'membre', '0285676daf56797679e6e743a0b5263d7400aae1', 'membre@membre.fr', 66000, '5 Rue du membre', 'France', 0),
(4, 'j.michel', 'jean', 'michel', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'jean.michel@gmail.com', 66000, '5 Rue de la Joie', 'France', 0),
(7, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@admin.fr', 66000, '5 Rue de l\'admin', 'France', 1),
(42, 'g.cascales', 'gr&eacute;gory', 'cascales', 'ffc76d04fb1121b11fffcc4f1692317d6d1b3450', 'gregory.cascales@gmail.com', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `voteavis`
--

CREATE TABLE `voteavis` (
  `id_voteavis` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_avis` int(11) NOT NULL,
  `estutile_voteavis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adressearchive`
--
ALTER TABLE `adressearchive`
  ADD PRIMARY KEY (`id_adresseclient`);

--
-- Index pour la table `adresseclient`
--
ALTER TABLE `adresseclient`
  ADD PRIMARY KEY (`id_adresseclient`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `libelle_categorie` (`libelle_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`,`email_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`,`num_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `liaisonproduit`
--
ALTER TABLE `liaisonproduit`
  ADD PRIMARY KEY (`id_liaisonproduit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `lignecde`
--
ALTER TABLE `lignecde`
  ADD PRIMARY KEY (`id_lignecde`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id_marque`),
  ADD KEY `libelle_marque` (`libelle_marque`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `photoproduit`
--
ALTER TABLE `photoproduit`
  ADD PRIMARY KEY (`id_photoproduit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`libelle_categorie`),
  ADD KEY `id_marque` (`libelle_marque`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `voteavis`
--
ALTER TABLE `voteavis`
  ADD PRIMARY KEY (`id_voteavis`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_avis` (`id_avis`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adressearchive`
--
ALTER TABLE `adressearchive`
  MODIFY `id_adresseclient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `adresseclient`
--
ALTER TABLE `adresseclient`
  MODIFY `id_adresseclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `liaisonproduit`
--
ALTER TABLE `liaisonproduit`
  MODIFY `id_liaisonproduit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lignecde`
--
ALTER TABLE `lignecde`
  MODIFY `id_lignecde` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `photoproduit`
--
ALTER TABLE `photoproduit`
  MODIFY `id_photoproduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `voteavis`
--
ALTER TABLE `voteavis`
  MODIFY `id_voteavis` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresseclient`
--
ALTER TABLE `adresseclient`
  ADD CONSTRAINT `adresseclient_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `liaisonproduit`
--
ALTER TABLE `liaisonproduit`
  ADD CONSTRAINT `liaisonproduit_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `lignecde`
--
ALTER TABLE `lignecde`
  ADD CONSTRAINT `lignecde_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `photoproduit`
--
ALTER TABLE `photoproduit`
  ADD CONSTRAINT `photoproduit_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`libelle_categorie`) REFERENCES `categories` (`libelle_categorie`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`libelle_marque`) REFERENCES `marques` (`libelle_marque`);

--
-- Contraintes pour la table `voteavis`
--
ALTER TABLE `voteavis`
  ADD CONSTRAINT `voteavis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `voteavis_ibfk_2` FOREIGN KEY (`id_avis`) REFERENCES `avis` (`id_avis`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
