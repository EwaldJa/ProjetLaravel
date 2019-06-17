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
(7, 'Plus de 200 clients sont servis chaque jour par les équipes de LIMPILUX présentes sur Paris et sa région.');


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


INSERT INTO `secteurs_activite` (`id_Secteur`, `intitule_Secteur`, `description_Secteur`) VALUES
(1, 'Tertiaire', 'Bureaux, salles de formation, salles de conférence.\r\nNous intervenons en fonction de vos besoins qui sont déterminés ensemble. \r\nToute problématique est prise en compte : votre surface, la configuration, les natures de sols, le mobilier, l’environnement. \r\nVos besoins sont analysés et respectés : fréquence des prestations, désir qualité, budget.'),
(2, 'Industrie et logitique', 'Entretien des locaux sociaux, des lignes de production, des lieux de stockage et des machines.\r\nNous nous adaptons à chaque problématique afin d’être le plus efficace et performant possible. \r\nVos horaires d’activité, vos contraintes de production sont respectées afin de ne pas gêner votre activité et de travailler en toute sécurité. \r\nMettre en place des organisations spécifiques à chaque site est notre force.'),
(3, 'Surfaces de vente', 'Assurer la propreté de boutiques avant l’ouverture afin de laisser le personnel de vente se consacrer à sa clientèle.'),
(4, 'Entretien d\'immeubles', 'Assurer le nettoyage des parties communes, la rotation des containers sur la voirie, le 	nettoyage des vitres, le nettoyage des parking');


--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id_Contact`, `nom_Contact`, `prenom_Contact`, `email_Contact`, `objet_Contact`, `message_Contact`, `societe_Contact`, `telephone_Contact`, `codepostal_Contact`, `adresse_Contact`) VALUES
(1, 'Janin', 'Ewald', 'ewald.janin@gmail.com', 'Demande de renseignement', 'Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.Pouvez-vous laver les tois après que nous ayons installé des panneaux photovoltaïques .Merci d\'avance pour votre réponse.', 'Probatimm', '0661598090', '74570', '59 Impasse du Clos des Sauges Thorens-Glières'),
(7, 'Janin', 'Ewald', 'ewald.janin@gmail.com', 'Relance demande de renseignement.', 'Bonjour, vous n\'avez pas répondu à notre précédente demande datant du 17/06.\r\nPourriez-vous nous recontacter ?\r\nMerci', 'Probatimm', '0661598090', '74570', '59 Impasse du Clos des Sauges Thorens-Glières'),
(8, 'Besnard', 'Lucas', 'lucas.besnard2@gmail.com', 'Enquête de satisfaction', 'Bonjour. Après votre journée d\'utilisation de notre site, nous aimerions avoir votre retour. Pourriez vous nous envoyer vos éventuelles demandes de retouche ? Merci, bonne journée !', 'DevAuTop', '0600000000', '69100', 'Chez lui');
