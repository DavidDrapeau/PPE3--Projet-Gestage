<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoOrganisation</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao= new M_DaoOrganisation();
        $dao->connecter();
        
        //Test de sélection par Id 
        echo "<p>Test de sélection par Id </p>";
        $organisation = $dao->getOneById(15);
        var_dump($organisation);
        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $lesOrganisations = $dao->getAll();
        var_dump($lesOrganisations);
        
        $dao->deconnecter();
       ?>
    </body>
</html>
