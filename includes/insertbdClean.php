<?php

// Accès base de données



include("parametres.inc.php");
try {
    $pdo = new PDO(DSN, USER, MDP);
} catch (Exception $e) {
    echo 'Echec de la connexion à la base de données';
    exit();
}


// Structure

$sql = "
CREATE TABLE IF NOT EXISTS `ANNEESCOL` (
  `ANNEESCOL` char(9) NOT NULL,
  PRIMARY KEY (`ANNEESCOL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `CLASSE` (
  `NUMCLASSE` char(32) NOT NULL,
  `IDSPECIALITE` smallint(6) DEFAULT NULL,
  `NUMFILIERE` int(11) NOT NULL,
  `NOMCLASSE` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMCLASSE`),
  KEY `CLASSE_IBFK_1` (`IDSPECIALITE`),
  KEY `CLASSE_IBFK_2` (`NUMFILIERE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `CONTACT_ORGANISATION` (
  `IDORGANISATION` int(11) NOT NULL,
  `IDCONTACT` int(11) NOT NULL,
  `FONCTION` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDORGANISATION`,`IDCONTACT`),
  KEY `I_FK_CONTACT_ORGANISATION_ORGA` (`IDORGANISATION`),
  KEY `I_FK_CONTACT_ORGANISATION_PERS` (`IDCONTACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `FILIERE` (
  `NUMFILIERE` int(11) NOT NULL,
  `LIBELLEFILIERE` varchar(128) NOT NULL,
  PRIMARY KEY (`NUMFILIERE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ORGANISATION` (
  `IDORGANISATION` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_ORGANISATION` varchar(255) NOT NULL,
  `VILLE_ORGANISATION` varchar(128) NOT NULL,
  `ADRESSE_ORGANISATION` varchar(128) NOT NULL,
  `CP_ORGANISATION` char(10) NOT NULL,
  `TEL_ORGANISATION` char(15) NOT NULL,
  `FAX_ORGANISATION` char(15) DEFAULT NULL,
  `FORMEJURIDIQUE` varchar(10) NOT NULL,
  `ACTIVITE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDORGANISATION`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `PERSONNE` (
  `IDPERSONNE` int(11) NOT NULL AUTO_INCREMENT,
  `IDSPECIALITE` smallint(6) DEFAULT NULL,
  `IDROLE` smallint(6) NOT NULL,
  `CIVILITE` char(32) NOT NULL,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(20) NOT NULL,
  `NUM_TEL` char(13) NOT NULL,
  `ADRESSE_MAIL` varchar(30) NOT NULL,
  `NUM_TEL_MOBILE` char(15) DEFAULT NULL,
  `ETUDES` varchar(40) DEFAULT NULL,
  `FORMATION` varchar(128) DEFAULT NULL,
  `LOGINUTILISATEUR` varchar(128) DEFAULT NULL,
  `MDPUTILISATEUR` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDPERSONNE`),
  KEY `PERSONNE_IBFK_1` (`IDSPECIALITE`),
  KEY `PERSONNE_IBFK_2` (`IDROLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `PROMOTION` (
  `ANNEESCOL` char(9) NOT NULL,
  `IDPERSONNE` int(11) NOT NULL,
  `NUMCLASSE` char(32) NOT NULL,
  PRIMARY KEY (`ANNEESCOL`,`IDPERSONNE`,`NUMCLASSE`),
  KEY `PROMOTION_IBFK_4` (`IDPERSONNE`),
  KEY `PROMOTION_IBFK_5` (`NUMCLASSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ROLE` (
  `IDROLE` smallint(6) NOT NULL,
  `RANG` smallint(6) NOT NULL,
  `LIBELLE` varchar(30) NOT NULL,
  PRIMARY KEY (`IDROLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `SPECIALITE` (
  `IDSPECIALITE` smallint(6) NOT NULL,
  `LIBELLECOURTSPECIALITE` varchar(10) NOT NULL,
  `LIBELLELONGSPECIALITE` varchar(128) NOT NULL,
  PRIMARY KEY (`IDSPECIALITE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `STAGE` (
  `NUM_STAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ANNEESCOL` char(9) NOT NULL,
  `IDETUDIANT` int(11) NOT NULL,
  `IDPROFESSEUR` int(11) NOT NULL,
  `IDORGANISATION` int(11) NOT NULL,
  `IDMAITRESTAGE` int(11) NOT NULL,
  `DATEDEBUT` date NOT NULL,
  `DATEFIN` date NOT NULL,
  `DATEVISITESTAGE` date DEFAULT NULL,
  `VILLE` varchar(128) NOT NULL,
  `DIVERS` varchar(255) DEFAULT NULL,
  `BILANTRAVAUX` varchar(255) NOT NULL,
  `RESSOURCESOUTILS` varchar(255) NOT NULL,
  `COMMENTAIRES` varchar(255) NOT NULL,
  `PARTICIPATIONCCF` varchar(255) NOT NULL,
  PRIMARY KEY (`NUM_STAGE`),
  KEY `I_FK_STAGE_ANNEESCOL` (`ANNEESCOL`),
  KEY `I_FK_STAGE_ORGANISATION` (`IDORGANISATION`),
  KEY `I_FK_STAGE_PERSONNE` (`IDETUDIANT`),
  KEY `I_FK_STAGE_PERSONNE3` (`IDPROFESSEUR`),
  KEY `I_FK_STAGE_PERSONNE4` (`IDMAITRESTAGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `CLASSE`
  ADD CONSTRAINT `CLASSE_IBFK_1` FOREIGN KEY (`IDSPECIALITE`) REFERENCES `SPECIALITE` (`IDSPECIALITE`),
  ADD CONSTRAINT `CLASSE_IBFK_2` FOREIGN KEY (`NUMFILIERE`) REFERENCES `FILIERE` (`NUMFILIERE`);

ALTER TABLE `CONTACT_ORGANISATION`
  ADD CONSTRAINT `FK_CONTACT_ORGANISATION_ORGANI` FOREIGN KEY (`IDORGANISATION`) REFERENCES `ORGANISATION` (`IDORGANISATION`),
  ADD CONSTRAINT `FK_CONTACT_ORGANISATION_PERSON` FOREIGN KEY (`IDCONTACT`) REFERENCES `PERSONNE` (`IDPERSONNE`);

ALTER TABLE `PERSONNE`
  ADD CONSTRAINT `PERSONNE_IBFK_1` FOREIGN KEY (`IDSPECIALITE`) REFERENCES `SPECIALITE` (`IDSPECIALITE`),
  ADD CONSTRAINT `PERSONNE_IBFK_2` FOREIGN KEY (`IDROLE`) REFERENCES `ROLE` (`IDROLE`);

ALTER TABLE `PROMOTION`
  ADD CONSTRAINT `PROMOTION_IBFK_3` FOREIGN KEY (`ANNEESCOL`) REFERENCES `ANNEESCOL` (`ANNEESCOL`),
  ADD CONSTRAINT `PROMOTION_IBFK_4` FOREIGN KEY (`IDPERSONNE`) REFERENCES `PERSONNE` (`IDPERSONNE`),
  ADD CONSTRAINT `PROMOTION_IBFK_5` FOREIGN KEY (`NUMCLASSE`) REFERENCES `CLASSE` (`NUMCLASSE`);

ALTER TABLE `STAGE`
  ADD CONSTRAINT `FK_STAGE_ANNEESCOL` FOREIGN KEY (`ANNEESCOL`) REFERENCES `ANNEESCOL` (`ANNEESCOL`),
  ADD CONSTRAINT `FK_STAGE_ORGANISATION` FOREIGN KEY (`IDORGANISATION`) REFERENCES `ORGANISATION` (`IDORGANISATION`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE` FOREIGN KEY (`IDETUDIANT`) REFERENCES `PERSONNE` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE1` FOREIGN KEY (`IDETUDIANT`) REFERENCES `PERSONNE` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE2` FOREIGN KEY (`IDETUDIANT`) REFERENCES `PERSONNE` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE3` FOREIGN KEY (`IDPROFESSEUR`) REFERENCES `PERSONNE` (`IDPERSONNE`),
  ADD CONSTRAINT `FK_STAGE_PERSONNE4` FOREIGN KEY (`IDMAITRESTAGE`) REFERENCES `PERSONNE` (`IDPERSONNE`);
";
$pdo->query($sql);

/**
 * Table ANNEESCOL
 * 
 */
echo "-- Annee scolaire";
echo "<br>";
echo "<br>";


$annee_debut = 2000;
$annee_debut = 2030;

for ($i = 2000; $i < 2030; $i++) {

    $annee_scolaire = $i . "-" . ($i + 1);

    $sql = "INSERT INTO `ANNEESCOL` (`ANNEESCOL`)VALUES ('$annee_scolaire');";
    echo $sql;
    $pdo->query($sql);
    echo "<br>";
}


/**
 * Table Spécialité
 */
echo "-- Specialite";
echo "<br>";
echo "<br>";

$specialite = array();
$specialite[0]['IDSPECIALITE'] = 1;
$specialite[0]['LIBELLECOURTSPECIALITE'] = "SLAM";
$specialite[0]['LIBELLELONGSPECIALITE'] = "Solutions logicielles et applications metiers";

$specialite[1]['IDSPECIALITE'] = 2;
$specialite[1]['LIBELLECOURTSPECIALITE'] = "SISR";
$specialite[1]['LIBELLELONGSPECIALITE'] = "Solutions d infrastructures systemes et reseaux";

for ($i = 0; $i <= 1; $i++) {

    $sql = "INSERT INTO `SPECIALITE` (
    `IDSPECIALITE` ,
    `LIBELLECOURTSPECIALITE` ,
    `LIBELLELONGSPECIALITE`
    )
    VALUES (" .
            $specialite[$i]['IDSPECIALITE'] . ",'" .
            $specialite[$i]['LIBELLECOURTSPECIALITE'] . "','" .
            $specialite[$i]['LIBELLELONGSPECIALITE'] . "');";

    echo $sql;
    $pdo->query($sql);
    echo "<br>";
}


/**
 * Table filière
 */
echo "-- Filiere";
echo "<br>";
echo "<br>";


$sql = "INSERT INTO `FILIERE` (`NUMFILIERE`, `LIBELLEFILIERE`) VALUES
(1, 'Management des Unites Commerciales'),
(2, 'Comptabilite et Gestion des Organisations'),
(3, 'Informatique de Gestion'),
(4, 'Services Informatiques aux Organisations'),
(5, 'Diplome de Comptabilite et de Gestion'),
(6, 'Formation Complementaire d''Initiative Locale');";

echo $sql;
$pdo->query($sql);
echo "<br>";





/**
 * Table classe 
 */
echo "-- Classe";
echo "<br>";
echo "<br>";

$classe = array();
$classe[0]['NUMCLASSE'] = "1SIOA";
$classe[0]['IDSPECIALITE'] = "NULL";
$classe[0]['NUMFILIERE'] = 4;
$classe[0]['NOMCLASSE'] = "1ere annee BTS Service Informatique auxOrganisation";

$classe[1]['NUMCLASSE'] = "1SIOB";
$classe[1]['IDSPECIALITE'] = "NULL";
$classe[1]['NUMFILIERE'] = 4;
$classe[1]['NOMCLASSE'] = "1ere annee BTS Service Informatique auxOrganisation";

$classe[2]['NUMCLASSE'] = "2SISR";
$classe[2]['IDSPECIALITE'] = 2;
$classe[2]['NUMFILIERE'] = 4;
$classe[2]['NOMCLASSE'] = "2eme annee BTS Service Informatique auxOrganisation";

$classe[3]['NUMCLASSE'] = "2SLAM";
$classe[3]['IDSPECIALITE'] = 1;
$classe[3]['NUMFILIERE'] = 4;
$classe[3]['NOMCLASSE'] = "2eme annee BTS Service Informatique auxOrganisation";

for ($i = 0; $i < count($classe); $i++) {

    $sql = "INSERT INTO `CLASSE` (`NUMCLASSE`, `IDSPECIALITE`, `NUMFILIERE`, `NOMCLASSE`) VALUES ('" .
            $classe[$i]['NUMCLASSE'] . "'," .
            $classe[$i]['IDSPECIALITE'] . "," .
            $classe[$i]['NUMFILIERE'] . ",'" .
            $classe[$i]['NOMCLASSE'] . "');";

    echo $sql;
    $pdo->query($sql);
    echo "<br>";
}

/**
 * Table role
 */
echo "-- Role";
echo "<br>";
echo "<br>";


$sql = "INSERT INTO `ROLE` (`IDROLE`, `RANG`, `LIBELLE`) VALUES
(0, 0, 'Autre'),
(1, 1, 'Administrateur'),
(2, 2, 'Secretaire'),
(3, 3, 'Professeur'),
(4, 4, 'Etudiant'),
(5, 5, 'MaitreDeStage');";


echo $sql;
$pdo->query($sql);
echo "<br>";


/**
 * TABLE PERSONNE
 */
echo "-- Classe SLAM";
echo "<br>";
echo "<br>";

//2SLAM
$listePrenom = array('MAEL', 'DAVID', 'FLORIAN', 'JEREMY', 'EMILIE', 'PIERRE', 'BENJAMIN', 'MAXIME', 'LOIC', 'THOMAS', 'AURELIEN', 'FLORIAN', 'PIERRE', 'STANISLAS', 'LAURENT', 'STEPHANE', 'YANNIS', 'THIBAULT', 'JULIEN', 'VALENTIN', 'ANTOINE', 'TANGUY', 'ANTOINE');
$listeNom = array('ANDRE', 'BONNET', 'BRETIN', 'BROYARD', 'CHANSON', 'CHARRIAU', 'CORBINEAU', 'COUTEAU', 'DESIREST', 'DION', 'DROUAUD', 'DURIEUX', 'FRENEAU', 'LEDUC', 'LEPEE', 'LOISEAU', 'MACHOURI', 'PERROIN', 'REDOR', 'RIO', 'SAINDRENAN', 'THIBEAU', 'TOUCHARD');


for ($i = 0; $i < count($listePrenom); $i++) {


    //Table Personne
    $IDPERSONNE = "NULL";
    $IDSPECIALITE = 1; //SLAM
    $IDROLE = 4; //Eleve
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = strtolower($listePrenom[$i]) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);

    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            '$IDSPECIALITE',
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";
    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    $idpersonne = $pdo->lastInsertId();

    //Table Promotion
    $ANNEESCOL = "2014-2015";
    $IDPERSONNE = $idpersonne;
    $NUMCLASSE = '2SLAM';

    $sql2 = "INSERT INTO `PROMOTION` (
    `ANNEESCOL` ,
    `IDPERSONNE` ,
    `NUMCLASSE`
    )
    VALUES 
    ('$ANNEESCOL',$IDPERSONNE,'$NUMCLASSE');";
    echo $sql2;
    //$pdo->query($sql2);
    echo "<br>";
    echo "<br>";
}


echo "-- Classe SISR";
echo "<br>";
echo "<br>";


//2SISR
$listePrenom = array('KEVIN', 'FLORIAN', 'JORDAN', 'GAETAN', 'PIERRE', 'AMANDINE', 'THOMAS', 'AURELIEN', 'FABIEN', 'NICOLAS', 'ANTOINE', 'YANN', 'CYRIL', 'VIANNEY', 'VALENTIN', 'LAURENT', 'STEPHANE', 'WILLIAM', 'YANNIS', 'SEBASTIEN', 'MAXIME', 'YOANN', 'THIBAULT', 'FELIX', 'KEVIN', 'JULIEN', 'AXEL', 'TANGUY', 'ANTOINE', 'KILLIAN');
$listeNom = array('BOITIVEAU', 'BRETIN', 'BUREAU', 'CHAPRENTIER', 'CHARRIAU', 'CUNIBERTI', 'DION', 'DROUAUD', 'DURAND', 'DURET', 'FERRE', 'GOURLAOUEN', 'HAMON', 'HASTINGS', 'LEMONNIER', 'LEPEE', 'LE MONNIER', 'LOISEAU', 'MABILEAU', 'MACHOURI', 'MARCOUYOUX', 'MORNET', 'PARISOT', 'PERROIN', 'POIRSON', 'RADOJKOVIC', 'REDOR', 'SALARDAINE', 'THIBEAU', 'TOUCHARD');


for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = 2; //SISR
    $IDROLE = 4; //Eleve
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            '$IDSPECIALITE',
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";

    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    $idpersonne = $pdo->lastInsertId();

    //Table Promotion
    $ANNEESCOL = "2014-2015";
    $IDPERSONNE = $idpersonne;
    $NUMCLASSE = '2SLAM';

    $sql2 = "INSERT INTO `PROMOTION` (
    `ANNEESCOL` ,
    `IDPERSONNE` ,
    `NUMCLASSE`
    )
    VALUES 
    ('$ANNEESCOL',$IDPERSONNE,'$NUMCLASSE');";
    echo $sql2;
    //$pdo->query($sql2);
    echo "<br>";
    echo "<br>";
}


echo "-- Professeur";
echo "<br>";
echo "<br>";
//Insertion Professeur

$listePrenom = array('NICOLAS', 'FRANCOISE', 'JEAN-PIERRE', 'SAMI');
$listeNom = array('BEAUVAIS', 'CARBONNIER', 'BORUGEOIS', 'GHADDAR');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 3; //Professeur
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}


echo "-- Administrateur";
echo "<br>";
echo "<br>";
//Insertion Administrateur

$listePrenom = array('Bourgeois');
$listeNom = array('Nicolas');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 1; //Admin
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}



echo "-- Maitre de Stage";
echo "<br>";
echo "<br>";
//Insertion Maitre de Stage

$listeNom = array('JOBS','LAO','LANGLE','HOUBON','DIXNEUF');
$listePrenom = array('Steve','Jean','Thierry','Daniel','Guillaume');

for ($i = 0; $i < count($listePrenom); $i++) {

    $IDPERSONNE = "NULL";
    $IDSPECIALITE = "NULL";
    $IDROLE = 5; //Maitre de Stage
    if ($i % 2 == 0) {
        $CIVILITE = "Monsieur";
    } else {
        $CIVILITE = "Madame";
    }
    $NOM = $listeNom[$i];
    $PRENOM = $listePrenom[$i];
    $NUM_TEL = '02' . rand(11111111, 99999999);
    $ADRESSE_MAIL = substr(strtolower($listePrenom[$i]), 0, 1) . '.' . strtolower($listeNom[$i]) . "@la-joliverie.com";
    $NUM_TEL_MOBILE = '06' . rand(11111111, 99999999);
    $ETUDES = "Informatique";
    $FORMATION = "BTSSIO";
    $LOGINUTILISATEUR = substr(strtolower($listePrenom[$i]), 0, 1) . strtolower($listeNom[$i]);
    $MDPUTILISATEUR = sha1($LOGINUTILISATEUR);



    $sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}


echo "-- Utilisateur";
echo "<br>";
echo "<br>";
// REQ : INSERT INTO `gestage`.`PERSONNE` (`IDPERSONNE`, `IDSPECIALITE`, `IDROLE`, `CIVILITE`, `NOM`, `PRENOM`, `NUM_TEL`, `ADRESSE_MAIL`, `NUM_TEL_MOBILE`, `ETUDES`, `FORMATION`, `LOGINUTILISATEUR`, `MDPUTILISATEUR`) VALUES (NULL, NULL, '0', 'Monsieur', 'Dupont', 'Jean', '0000000000', 'autre@autre.autre', NULL, NULL, NULL, 'autre', SHA1('autre')), (NULL, NULL, '1', 'Mr', 'Pierre', 'Dupont', '0123456789', 'admin@admin.admin', NULL, NULL, NULL, 'administrateur', SHA1('administrateur')), (NULL, NULL, '2', 'Mme', 'Sylvie', 'Jaqueline', '0123456789', 'secretaire@secretaire.secretaire', NULL, NULL, NULL, 'secretaire', SHA1('secretaire')), (NULL, NULL, '3', 'Mr', 'Pierre', 'Paul', '0123456789', 'prof@prof.prof', NULL, NULL, NULL, 'professeur', SHA1('professeur')), (NULL, NULL, '4', 'Mr', 'Paul', 'Henry', '0123456789', 'etudiant@etudiant.etudiant', NULL, NULL, NULL, 'etudiant', SHA1('etudiant')), (NULL, NULL, '5', 'Mr', 'Henry', 'Emmanuel', '0123456789', 'maitrestage@maitrestage.maitrestage', NULL, NULL, NULL, 'maitrestage', SHA1('maitrestage'));
/*$sql = "INSERT INTO `PERSONNE` (
            `IDPERSONNE`,
            `IDSPECIALITE`,
            `IDROLE`,
            `CIVILITE`,
            `NOM`,
            `PRENOM`,
            `NUM_TEL`,
            `ADRESSE_MAIL`,
            `NUM_TEL_MOBILE`,
            `ETUDES`,
            `FORMATION`,
            `LOGINUTILISATEUR`,
            `MDPUTILISATEUR`) 
            VALUES(
            $IDPERSONNE,
            $IDSPECIALITE,
            '$IDROLE',
            '$CIVILITE',
            '$NOM',
            '$PRENOM',
            '$NUM_TEL',
            '$ADRESSE_MAIL',
            '$NUM_TEL_MOBILE',
            '$ETUDES',
            '$FORMATION',
            '$LOGINUTILISATEUR',
            '$MDPUTILISATEUR');";




    echo $sql;
    $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}
*/

$sql = "INSERT INTO PERSONNE (`IDPERSONNE`, `IDSPECIALITE`, `IDROLE`, `CIVILITE`, `NOM`, `PRENOM`, `NUM_TEL`, `ADRESSE_MAIL`, `NUM_TEL_MOBILE`, `ETUDES`, `FORMATION`, `LOGINUTILISATEUR`, `MDPUTILISATEUR`) VALUES (NULL, NULL, '0', 'Monsieur', 'Dupont', 'Jean', '0000000000', 'autre@autre.autre', NULL, NULL, NULL, 'autre', SHA1('autre')), (NULL, NULL, '1', 'Mr', 'Pierre', 'Dupont', '0123456789', 'admin@admin.admin', NULL, NULL, NULL, 'administrateur', SHA1('administrateur')), (NULL, NULL, '2', 'Mme', 'Sylvie', 'Jaqueline', '0123456789', 'secretaire@secretaire.secretaire', NULL, NULL, NULL, 'secretaire', SHA1('secretaire')), (NULL, NULL, '3', 'Mr', 'Pierre', 'Paul', '0123456789', 'prof@prof.prof', NULL, NULL, NULL, 'professeur', SHA1('professeur')), (NULL, NULL, '4', 'Mr', 'Paul', 'Henry', '0123456789', 'etudiant@etudiant.etudiant', NULL, NULL, NULL, 'etudiant', SHA1('etudiant')), (NULL, NULL, '5', 'Mr', 'Henry', 'Emmanuel', '0123456789', 'maitrestage@maitrestage.maitrestage', NULL, NULL, NULL, 'maitrestage', SHA1('maitrestage'));";
$pdo->query($sql);

/**
 * Table Orgnisation
 * 
 */
echo "-- Organisation";
echo "<br>";
echo "<br>";
//Insertion Organisation

$sql = "ALTER TABLE `ORGANISATION` CHANGE `IDORGANISATION` `IDORGANISATION` INT( 11 ) NOT NULL AUTO_INCREMENT ";
$pdo->query($sql);

$listeNom = array('ECOLE DES MINES DE NANTES', 'ALERTE INFORMATIQUE', 'APS SOLUTIONS INFORMATIQUES', 'CITRUS INGENIERIE', 'QUATERNAIRE', 'PC NEW LIFE', 'LYCEE NOTRE DAME', 'MAKINA CORPUS', 'ATHLONE EXTRUSIONS LTCL', 'AKOS', 'TOUANG K.M.', 'France TELECOM ORANGE', 'BULL SAS', 'AGENCE 404', 'MANITOU BF', 'REPRO CONSEIL', 'STRATOS', 'HG INFORMATIQUE', 'CAPGEMINI', 'IBM', 'HP', 'BOULANGER', 'FNAC');
$listeAdresse = array('4 RUE ALFRED KASTLER', '186 BIS RUE DES COUPERIES', '8 RUE DU MARCHE COMMUN', 'LIEU DIT LENIPHEN', '9 RUE JULES VERNE', '1 TER AVENUE DE LA VERTONNE', '50 RUE JEAN JAURES', '29 QUAI DE VERSAILLES', 'GRACE ROAD ATHLONE', '8 RUE DESCARTES', '11 RUE Allemagne', '4 RUE ALFRED KASTLER', '12 H rue du Pâtis Tatelin - CS 50855', '8 BLD ALBERT EINSTEIN', '1 RUE SUFFREN', '430 RUE DE lAUBINIERE', 'RUE ST GREGOIRE', '14 PLACE DU COMMERCE', 'ZI DE VILLEJAMES', 'rue capgeminie', 'rue de hp', 'rue de boulanger', 'rue de la fnac');

for ($i = 0; $i < count($listeAdresse); $i++) {

    $sql = "INSERT INTO `ORGANISATION` (
        `IDORGANISATION`,
        `NOM_ORGANISATION`,
        `VILLE_ORGANISATION`,
        `ADRESSE_ORGANISATION`,
        `CP_ORGANISATION`,
        `TEL_ORGANISATION`,
        `FAX_ORGANISATION`,
        `FORMEJURIDIQUE`,
        `ACTIVITE`)
  VALUES(NULL, '" . $listeNom[$i] . "', 'Nantes', '" . $listeAdresse[$i] . "', '44000','0" . rand(000000000, 999999999) . "', '0" . rand(000000000, 999999999) . "', 'SARL','Developpement');";





    echo $sql;
   $pdo->query($sql);
    echo "<br>";
    echo "<br>";
}

// Stage
$sql = "INSERT INTO `STAGE` (`NUM_STAGE`, `ANNEESCOL`, `IDETUDIANT`, `IDPROFESSEUR`, `IDORGANISATION`, `IDMAITRESTAGE`, `DATEDEBUT`, `DATEFIN`, `DATEVISITESTAGE`, `VILLE`, `DIVERS`, `BILANTRAVAUX`, `RESSOURCESOUTILS`, `COMMENTAIRES`, `PARTICIPATIONCCF`) VALUES
(1, '2004-2005', 4, 57, 6, 62, '2015-01-01', '2015-01-03', '2015-01-02', 'Paris', NULL, '', '', '', ''),
(2, '2011-2012', 5, 54, 4, 61, '2015-01-01', '2015-05-01', '2015-01-02', 'Nantes', NULL, '', '', '', ''),
(3, '2014-2015', 6, 56, 2, 60, '2015-01-01', '2015-01-01', '2015-01-01', 'Vertou', NULL, '', '', '', ''),
(4, '2008-2009', 5, 55, 7, 60, '2015-01-01', '2015-01-01', '2015-01-01', 'Lyon', NULL, '', '', '', ''),
(5, '2009-2010', 4, 67, 9, 61, '2015-01-01', '2015-01-01', '2015-01-01', 'Marseille', NULL, '', '', '', ''),
(6, '2012-2013', 4, 56, 15, 62, '2015-01-01', '2015-01-01', '2015-01-01', 'New York', NULL, '', '', '', '');";

    echo $sql;
   $pdo->query($sql);
    echo "<br>";
    echo "<br>";
?>