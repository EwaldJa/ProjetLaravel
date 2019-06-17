--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`id_Histoire`, `paragraphe_Histoire`) VALUES
(1, 'Société indépendante à taille humaine crée il y a bientôt 25 ans s’adressant aux professionnels'),
(2, 'Notre cœur de métier est de réaliser des prestations de service dans le domaine de la propreté et de l’hygiène.  Nos prestations  de nettoyage, nos méthodes et notre matériel sont adaptées et s’adressent aux professionnels.'),
(3, 'Notre organisation repose sur un organigramme en fonction de branches opérationnelles d’une large autonomie. Ce mode d’organisation confère responsabilités et initiatives à tous les collaborateurs.'),
(4, 'La volonté et le goût d’entreprendre sont présents depuis notre création. Des étapes de transformation ont permis à LIMPILUX de s’invertir dans de nouveaux périmètres d’activité afin d’élargir son champ d’action.'),
(5, 'Ce dynamisme est porté par une équipe de collaborateurs de proximité, réactifs, motivés et ponctuels.'),
(6, 'Ils sont prêts à vous épauler en trouvant des solutions dans vos problématiques de nettoyage, à intervenir dans des délais très courts.'),
(7, 'Plus de 200 clients sont servis chaque jour par les équipes de LIMPILUX présentes sur Paris et sa région.'),
(8, 'Plus de 200 clients sont servis chaque jour par les équipes de LIMPILUX présentes sur Paris et sa région.');


--
-- Déchargement des données de la table `engagements`
--

INSERT INTO `engagements` (`id_Engagement`, `intitule_Engagement`, `description_Engagement`) VALUES
(1, 'Engagements sociaux', 'Nos salariés sont constamment formés aux méthodes de nettoyage mais également à la vigilance en termes de règles de sécurité. \r\nLe dialogue, le respect des compétences et du travail réalisé par les hommes et les femmes formant nos équipes et le socle de notre pérennité.'),
(2, 'Engagements environnementaux', 'Nous utilisons des produits de fournisseurs sont tous engagés dans des processus de respect de l’environnement. ');


--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_Service`, `intitule_Service`, `description_Service`) VALUES
(1, 'Nettoyage tout type de site', 'Nettoyage réguliers de bureaux, salle de formation, de réceptions, boutiques, usines, zone de stockage…'),
(2, 'Nettoyage de vitrerie', 'Solutions adaptées au nettoyage de vitrerie'),
(3, 'Fourniture', 'Fourniture de produits d’hygiène pour les sanitaires (appareils et consommables)'),
(4, 'Nettoyage sur-mesure de vos locaux', 'Nettoyage spécifiques des différents types de sols : nettoyage de moquettes, lustrage de parquet, cristallisation des marbres, traitement des sols en thermoplastique');

--
-- Déchargement des données de la table `images_services`
--

INSERT INTO `images_services` (`id_Image`, `fk_Image`, `lien_Image`) VALUES
(1, 4, 'Images\\ImageService\\moquette.jpg'),
(2, 2, 'Images\\ImageService\\laveurVitre.png'),
(3, 3, 'Images\\ImageService\\produits.png');