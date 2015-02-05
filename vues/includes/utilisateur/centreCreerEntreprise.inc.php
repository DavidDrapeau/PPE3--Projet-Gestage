<script language="JavaScript" type="text/javascript" src="../vues/javascript/fonctionsJavascript.inc.js"></script>
<script language="JavaScript" type="text/javascript" src="../bibliotheques/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src=".../vues/javascript/ajax.inc.js"></script>


<!-- VARIABLES NECESSAIRES -->

<!-- $this->message : à afficher sous le formulaire -->
<form method="post" action=".?controleur=Utilisateur&action=validationCreerEntreprise" name="CreateCompany">
    <h1>Creation d'une entreprise</h1>

    <!-- Données valables pour tous les rôles -->
    <fieldset>
        <legend>Informations g&eacute;n&eacute;rales</legend>
        <input type="hidden" readonly="readonly" name="id" id="id"></input>
        
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom"></input><br/>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville"></input><br/>
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse"></input><br/>
        <label for="cp">Code Postal :</label>
        <input type="text" name="cp" id="cp"></input><br/>
        <label for="tel">Tel :</label>
        <input type="text" name="tel" id="tel"></input><br/>
        <label for="fax">Fax :</label>
        <input type="text" name="fax" id="fax"></input><br/>
        <label for="frmJu">Forme Juridique :</label>
        <input type="text" name="frmJu" id="frmJu"></input><br/>
        <label for="activite">Activité :</label>
        <input type="text" name="activite" id="activite"></input><br/>
        
    </fieldset>
 
    <fieldset>
        <input type="submit" value="Creer" onclick="return validerE()"></input><!-- OnClick éxécutera le JS qui testera tout les champs du formulaire. -->
        <input type="button" value="Retour" onclick="history.go(-1)">
    </fieldset>
</form>
<?php
// message de validation de création ou non 
if (isset($this->message)) {
    echo "<strong>" . $this->message . "</strong>";
}

?>

