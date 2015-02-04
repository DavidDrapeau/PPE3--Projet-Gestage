<?php 
// on récupère un objet métier de type Organisation
$uneEntreprise = $this->lireDonnee('uneEntreprise');
?>

    <h1><?php echo $this->lireDonnee('titreVue');?></h1>
    <fieldset>
        <legend>Détails de l'entreprise</legend>
            <label for="nomEntre">Nom:</label>
        <input type="text" readonly="readonly" name="nomEntreprise" id="nomEntre" value="<?php echo $uneEntreprise->getNom(); ?>"></input><br/>
            <label for="villeEntre">Ville:</label>
        <input type="text" readonly="readonly" name="villeEntreprise" id="villeEntre" value="<?php echo $uneEntreprise->getVille(); ?>"></input><br/>
            <label for="adresseEntre">Adresse:</label>
        <input type="text" readonly="readonly" name="adresseEntreprise" id="adresseEntre" value="<?php echo $uneEntreprise->getAdresse(); ?>"></input><br/>
            <label for="cpEntre">Code Postal:</label>
        <input type="text" readonly="readonly" name="cpEntreprise" id="cpEntre" value="<?php echo $uneEntreprise->getCp(); ?>"></input><br/>
            <label for="telEntre">Téléphone:</label>
        <input type="text" readonly="readonly" name="telEntreprise" id="telEntre" value="<?php echo $uneEntreprise->getTel(); ?>"></input><br/>
            <label for="faxEntre">Fax:</label>
        <input type="text" readonly="readonly" name="faxEntreprise" id="faxEntre" value="<?php echo $uneEntreprise->getFax(); ?>"></input><br/>
            <label for="fjEntre">Forme Juridique:</label>
        <input type="text" readonly="readonly" name="formeJEntreprise" id="fjEntre" value="<?php echo $uneEntreprise->getFormeJur(); ?>"></input><br/>
            <label for="activEntre">Activité:</label>
        <input type="text" readonly="readonly" name="activiteEntreprise" id="activEntre" value="<?php echo $uneEntreprise->getActivite(); ?>"></input><br/>










