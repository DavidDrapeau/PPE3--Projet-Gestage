<?php 
// on récupère un objet métier de type Personne
$unStage = $this->lireDonnee('unStage');
?>
    <h1>Informations du stage</h1>
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



