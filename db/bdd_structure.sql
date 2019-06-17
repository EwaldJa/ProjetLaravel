create database if not exists bdd_de_nous character set utf8 collate utf8_unicode_ci;

grant all privileges on bdd_de_nous.* to 'nous'@'localhost' identified by 'secret';

use bdd_de_nous;

drop table if exists secteurs_activite;
drop table if exists histoire;
drop table if exists images_secteurs_activite;
drop table if exists engagements;
drop table if exists images_engagements;
drop table if exists services;
drop table if exists images_services;
drop table if exists coordonnees;
drop table if exists images_coordonnees;
drop table if exists contacts;
drop table if exists candidatures;
drop table if exists users;
drop table if exists password_resets;

--
-- Base de données :  `bdd_de_nous`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

CREATE TABLE `candidatures` (
  `id_Candidature` int(11) NOT NULL,
  `nom_Candidature` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_Candidature` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email_Candidature` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `objet_Candidature` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `message_Candidature` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `poste_Candidature` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_Candidature` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal_Candidature` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_Candidature` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id_Contact` int(11) NOT NULL,
  `nom_Contact` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_Contact` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email_Contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `objet_Contact` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `message_Contact` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `societe_Contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_Contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal_Contact` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse_Contact` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `id_Site` int(11) NOT NULL,
  `adresse_Site` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_Site` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `engagements`
--

CREATE TABLE `engagements` (
  `id_Engagement` int(11) NOT NULL,
  `intitule_Engagement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_Engagement` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `id_Histoire` int(11) NOT NULL,
  `paragraphe_Histoire` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Structure de la table `images_coordonnees`
--

CREATE TABLE `images_coordonnees` (
  `id_Image` int(11) NOT NULL,
  `fk_Image` int(11) NOT NULL,
  `lien_Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images_engagements`
--

CREATE TABLE `images_engagements` (
  `id_Image` int(11) NOT NULL,
  `fk_Image` int(11) NOT NULL,
  `lien_Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images_secteurs_activite`
--

CREATE TABLE `images_secteurs_activite` (
  `id_Image` int(11) NOT NULL,
  `fk_Image` int(11) NOT NULL,
  `lien_Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images_services`
--

CREATE TABLE `images_services` (
  `id_Image` int(11) NOT NULL,
  `fk_Image` int(11) NOT NULL,
  `lien_Image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secteurs_activite`
--

CREATE TABLE `secteurs_activite` (
  `id_Secteur` int(11) NOT NULL,
  `intitule_Secteur` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_Secteur` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_Service` int(11) NOT NULL,
  `intitule_Service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_Service` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidatures`
--
ALTER TABLE `candidatures`
  ADD PRIMARY KEY (`id_Candidature`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_Contact`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`id_Site`);

--
-- Index pour la table `engagements`
--
ALTER TABLE `engagements`
  ADD PRIMARY KEY (`id_Engagement`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id_Histoire`);

--
-- Index pour la table `images_coordonnees`
--
ALTER TABLE `images_coordonnees`
  ADD PRIMARY KEY (`id_Image`);

--
-- Index pour la table `images_engagements`
--
ALTER TABLE `images_engagements`
  ADD PRIMARY KEY (`id_Image`);

--
-- Index pour la table `images_secteurs_activite`
--
ALTER TABLE `images_secteurs_activite`
  ADD PRIMARY KEY (`id_Image`);

--
-- Index pour la table `images_services`
--
ALTER TABLE `images_services`
  ADD PRIMARY KEY (`id_Image`);

--
-- Index pour la table `secteurs_activite`
--
ALTER TABLE `secteurs_activite`
  ADD PRIMARY KEY (`id_Secteur`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_Service`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidatures`
--
ALTER TABLE `candidatures`
  MODIFY `id_Candidature` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_Contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `id_Site` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `engagements`
--
ALTER TABLE `engagements`
  MODIFY `id_Engagement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images_coordonnees`
--
ALTER TABLE `images_coordonnees`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images_engagements`
--
ALTER TABLE `images_engagements`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images_secteurs_activite`
--
ALTER TABLE `images_secteurs_activite`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images_services`
--
ALTER TABLE `images_services`
  MODIFY `id_Image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secteurs_activite`
--
ALTER TABLE `secteurs_activite`
  MODIFY `id_Secteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*

create table secteurs_activite (
    id_Secteur integer not null primary key auto_increment,
    intitule_Secteur varchar(100) not null,
    description_Secteur varchar(2000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table images_secteurs_activite (
    id_Image integer not null primary key auto_increment,
    fk_Image integer not null references secteurs_activite(id_Secteur),
    lien_Image varchar(100)
) engine=innodb character set utf8 collate utf8_unicode_ci;



create table engagements (
    id_Engagement integer not null primary key auto_increment,
    intitule_Engagement varchar(100) not null,
    description_Engagement varchar(2000) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table images_engagements (
    id_Image integer not null primary key auto_increment,
    fk_Image integer not null references engagements(id_Engagement),
    lien_Image varchar(100)
) engine=innodb character set utf8 collate utf8_unicode_ci;



 CREATE TABLE services (
    id_Service integer not null primary key auto_increment,
    intitule_Service varchar(100) not null,
    description_Service varchar(2000) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table images_services (
    id_Image integer not null primary key auto_increment,
    fk_Image integer not null references services(id_Service),
    lien_Image varchar(100)
) engine=innodb character set utf8 collate utf8_unicode_ci;



create table coordonnees (
    id_Site integer not null primary key auto_increment,
    adresse_Site varchar(100) not null,
    telephone_Site varchar(50) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table images_coordonnees (
    id_Image integer not null primary key auto_increment,
    fk_Image integer not null references coordonnees(id_Site),
    lien_Image varchar(100)
) engine=innodb character set utf8 collate utf8_unicode_ci;



create table contacts (
    id_Contact integer not null primary key auto_increment,
    nom_Contact varchar(30) not null,
    prenom_Contact varchar(30) not null,
    email_Contact varchar(100) not null,
    objet_Contact varchar(300) not null,
    message_Contact varchar(2000) not null,
    societe_Contact varchar(100) not null,
    telephone_Contact varchar(50),
    codepostal_Contact varchar(10),
    adresse_Contact varchar(200)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table candidatures (
    id_Candidature integer not null primary key auto_increment,
    nom_Candidature varchar(30) not null,
    prenom_Candidature varchar(30) not null,
    email_Candidature varchar(100) not null,
    objet_Candidature varchar(300) not null,
    message_Candidature varchar(2000) not null,
    poste_Candidature varchar(100) not null,
    telephone_Candidature varchar(50),
    codepostal_Candidature varchar(10),
    adresse_Candidature varchar(200)
) engine=innodb character set utf8 collate utf8_unicode_ci;



CREATE TABLE users (
    id int(10) UNSIGNED NOT NULL primary key AUTO_INCREMENT,
    name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    email_verified_at timestamp NULL DEFAULT NULL,
    password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE password_resets (
    email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    token varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;