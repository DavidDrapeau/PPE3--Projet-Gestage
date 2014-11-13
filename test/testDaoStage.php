<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoPersonne</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao= new M_DaoStage();
        $dao->connecter();
        
        //Test de sélection par Id 
        echo "<p>Test de sélection par Id </p>";
        $stage = $dao->getOneById(15);
        var_dump($stage);
        
        //Test de sélection de tous les enregistrements
        echo "<p>Test de sélection de tous les enregistrements</p>";
        $lesStages = $dao->getAll();
        var_dump($lesStages);
        
        $dao->deconnecter();
       ?>
    </body>
</html>