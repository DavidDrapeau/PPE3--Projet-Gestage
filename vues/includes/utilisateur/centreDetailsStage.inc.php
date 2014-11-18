<?php 
// on récupère un objet métier de type Personne
$unStage = $this->lireDonnee('unStage');
?>

    <h1><?php echo $this->lireDonnee('titreVue');?></h1>
    <fieldset>
        <legend>Détails du stage</legend>
            <label for="numStage">Numéro du stage:</label>
        <input type="text" readonly="readonly" name="numStage" id="numeroStage" value="<?php echo $unStage->getNumStage(); ?>"></input><br/>
            <label for="AnneeScol">Année Scolaire:</label>
        <input type="text" readonly="readonly" name="anneeScol" id="anneeScolaire" value="<?php echo $unStage->getAnneeScolaire(); ?>"></input><br/>
            <label for="idEtud">Id de l'étudiant:</label>
        <input type="text" readonly="readonly" name="idEtud" id="idEtudiant" value="<?php echo $unStage->getIdEtudiant(); ?>"></input><br/>
            <label for="idProf">Id du Professeur:</label>
        <input type="text" readonly="readonly" name="idProf" id="idProfesseur" value="<?php echo $unStage->getIdProfesseur(); ?>"></input><br/>
            <label for="idOrga">Id de l'organisation:</label>
        <input type="text" readonly="readonly" name="idOrga" id="idOrganisation" value="<?php echo $unStage->getIdOrganisation(); ?>"></input><br/>
            <label for="idMS">Id Maitre Stage:</label>
        <input type="text" readonly="readonly" name="idMS" id="idMaitreStage" value="<?php echo $unStage->getIdMaitreStage(); ?>"></input><br/>
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

        


