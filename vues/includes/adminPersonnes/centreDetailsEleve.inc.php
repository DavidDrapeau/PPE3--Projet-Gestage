<?php 
// on récupère un objet métier de type Personne
$unEleve = $this->lireDonnee('unEleve');
?>

    <h1><?php echo $this->lireDonnee('titreVue');?></h1>
    <fieldset>
        <legend>Détails sur l'élève</legend>
            <label for="idEleve">Id de l'élève:</label>
        <input type="text" readonly="readonly" name="idEleve" id="idEleve" value="<?php echo $unEleve->getId(); ?>"></input><br/>
        <?php if($unEleve->getSpecialite() != null){ ?>    
            <label for="speEleve">Spécialité :</label>
            <input type="text" readonly="readonly" name="specialiteEleve" id="speEleve" value="<?php echo $unEleve->getSpecialite()->getLibelleLong(); ?>"></input><br/>
        <?php } ?>    
            <label for="civEleve">Civilité:</label>
        <input type="text" readonly="readonly" name="civiliteEleve" id="civEleve" value="<?php echo $unEleve->getCivilite(); ?>"></input><br/>
            <label for="nomEleve">Nom:</label>
        <input type="text" readonly="readonly" name="nomEleve" id="nomEleve" value="<?php echo $unEleve->getNom(); ?>"></input><br/>
            <label for="prenomEleve">Prénom:</label>
        <input type="text" readonly="readonly" name="prenomEleve" id="prenomEleve" value="<?php echo $unEleve->getPrenom(); ?>"></input><br/>
            <label for="numTel">Numéro de téléphone:</label>
        <input type="text" readonly="readonly" name="numeroTel" id="numTel" value="<?php echo $unEleve->getNumTel(); ?>"></input><br/>
            <label for="mailEleve">Mail:</label>
        <input type="text" readonly="readonly" name="mailEleve" id="mailEleve" value="<?php echo $unEleve->getMail(); ?>"></input><br/>
            <label for="mobileEleve">Téléphone Mobile:</label>
        <input type="text" readonly="readonly" name="mobileEleve" id="mobileEleve" value="<?php echo $unEleve->getMobile(); ?>"></input><br/>
            <label for="etudesEleve">Etudes:</label>
        <input type="text" readonly="readonly" name="etudesEleve" id="etudes" value="<?php echo $unEleve->getEtudes(); ?>"></input><br/>
            <label for="formationEleve">Formation:</label>
        <input type="text" readonly="readonly" name="formationEleve" id="formation" value="<?php echo $unEleve->getFormation(); ?>"></input><br/>
            <label for="loginEleve">Login:</label>
        <input type="text" readonly="readonly" name="loginEleve" id="loginEleve" value="<?php echo $unEleve->getLogin(); ?>"></input><br/>      