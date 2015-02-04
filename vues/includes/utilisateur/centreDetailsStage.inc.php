<?php 
// on récupère un objet métier de type Personne
$unStage = $this->lireDonnee('unStage');
$unEtudiant = $this->lireDonnee('unEtudiant');
$unProfesseur = $this->lireDonnee('unProfesseur');
$uneOrganisation = $this->lireDonnee('uneOrganisation');
$unMaitreStage = $this->lireDonnee('unMaitreStage');
?>

    <h1><?php echo $this->lireDonnee('titreVue');?></h1>
    <fieldset>
        <legend>Détails du stage</legend>
            <label for="numStage">Numéro du stage:</label>
        <input type="text" readonly="readonly" name="numStage" id="numeroStage" value="<?php echo $unStage->getNumStage(); ?>"></input><br/>
            <label for="AnneeScol">Année Scolaire:</label>
        <input type="text" readonly="readonly" name="anneeScol" id="anneeScolaire" value="<?php echo $unStage->getAnneeScolaire(); ?>"></input><br/>
            <label for="nomEtud">Nom/Prénom de l'étudiant:</label>
        <input type="text" readonly="readonly" name="nomEtud" id="nomEtudiant" value="<?php echo $unEtudiant->getNom(); ?> <?php echo $unEtudiant->getPrenom(); ?>"></input><br/>
            <label for="nomProf">Nom/Prénom du Professeur:</label>
        <input type="text" readonly="readonly" name="nomProf" id="nomProfesseur" value="<?php echo $unProfesseur->getNom(); ?> <?php echo $unProfesseur->getPrenom(); ?>"></input><br/>
            <label for="nomOrga">Nom de l'organisation:</label>
        <input type="text" readonly="readonly" name="nomOrga" id="nomOrganisation" value="<?php echo $uneOrganisation->getNom(); ?>"></input><br/>
            <label for="idMS">Nom/Prénom Maitre Stage:</label>
        <input type="text" readonly="readonly" name="nomMS" id="nomMaitreStage" value="<?php echo $unMaitreStage->getNom(); ?> <?php echo $unMaitreStage->getPrenom(); ?>"></input><br/>
            <label for="dateDeb">Date début stage:</label>
        <input type="text" readonly="readonly" name="dateDeb" id="dateDebut" value="<?php echo $unStage->getDateDebut(); ?>"></input><br/>
            <label for="dateF">Date de fin stage:</label>
        <input type="text" readonly="readonly" name="dateF" id="dateFin" value="<?php echo $unStage->getDateFin(); ?>"></input><br/>
            <label for="dateV">Date de visite durant le stage:</label>
        <input type="text" readonly="readonly" name="dateV" id="dateVisite" value="<?php echo $unStage->getDateVisite(); ?>"></input><br/>
            <label for="ville">Ville du stage:</label>
        <input type="text" readonly="readonly" name="ville" id="villeStage" value="<?php echo $unStage->getVille(); ?>"></input><br/>
            <label for="divers">Renseignements divers:</label>
        <input type="text" readonly="readonly" name="divers" id="RensDivers" value="<?php echo $unStage->getDivers(); ?>"></input><br/>
            <label for="bilan">Bilan des travaux effectués:</label>
        <input type="text" readonly="readonly" name="bilan" id="bilanTravaux" value="<?php echo $unStage->getBilanTravaux(); ?>"></input><br/>
            <label for="ROutils">Ressources/Outils utilisé(e)s:</label>
        <input type="text" readonly="readonly" name="ROutils" id="RessourcesOutils" value="<?php echo $unStage->getRessourcesOutils(); ?>"></input><br/>
            <label for="com">Commentaires:</label>
        <input type="text" readonly="readonly" name="com" id="commentaires" value="<?php echo $unStage->getCommentaires(); ?>"></input><br/>
            <label for="ccf">Note CCF (/20):</label>
        <input type="text" readonly="readonly" name="ccf" id="NoteCcf" value="<?php echo $unStage->getCcf(); ?>"></input><br/>

        


