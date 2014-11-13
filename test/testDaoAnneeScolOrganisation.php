<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>test DaoAnneeScol et test DaoOrganisation</title>
    </head>
    <body>
        <?php
        require_once("../includes/parametres.inc.php");
        require_once("../includes/fonctions.inc.php");

        $dao = new M_DaoAnneeScol();
        $dao->connecter();

        // AnneeScol: test de sélection de tous les enregistrements
        echo "<p>AnneeScol : test de sélection de tous les enregistrements</p>";
        $anneeScol = $dao->getAll();
        var_dump($anneeScol);

        $dao = new M_DaoOrganisation();
        $dao->connecter();

        // Organisation : test de sélection par Id 
        echo "<p>Organisation : test de sélection par Id</p>";
        $orga = $dao->getOneById(1);
        var_dump($orga);

        // Organisation : test de sélection de tous les enregistrements
        echo "<p>Organisation : test de sélection de tous les enregistrements</p>";
        $lesOrga = $dao->getAll();
        var_dump($lesOrga);

        $dao->deconnecter();
        ?>
    </body>
</html>
