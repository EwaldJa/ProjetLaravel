create database if not exists bdd_de_nous character set utf8 collate utf8_unicode_ci;

grant all privileges on bdd_de_nous.* to 'nous'@'localhost' identified by 'secret';

use bdd_de_nous;

drop table if exists secteurs_activite;
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