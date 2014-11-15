<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
<?php
// on récupère un objet métier de type Stage
$unStage = $this->lireDonnee('stage');
?>
<form method="post" action=".?controleur=Utilisateurs&action=afficheListeStage">
    <link href="print.css" rel="stylesheet" media="all" type="text/css"/> 

    <h1> Affichage de la liste des stages </h1>
    <table>
        <tr>
            <th>N°</th>
            <th>An</th> 
            <th>Id E</th>
            <th>Id P</th>
            <th>Id O</th>
            <th>Id M</th>
            <th>DateD</th>
            <th>DateF</th>
            <th>DateVi</th>
            <th>Ville</th>
            <th>Divers</th>
            <th>Bilan</th>
            <th>Res</th>
            <th>Com</th>
            <th>ccf</th>
            
        </tr>
        <?php
            $listeStages = $this->lireDonnee('lesStages');
            for($i=0; $i<count($listeStages); $i++) {
              $unStage=$listeStages[$i];
        ?>    
        <tr>
            <td><?php echo $unStage->getNumStage() ?></td>
            <td><?php echo $unStage->getAnneeScolaire()?></td>
            <td><?php echo $unStage->getIdEtudiant() ?></td>
            <td><?php echo $unStage->getIdProfesseur() ?></td>
            <td><?php echo $unStage->getIdOrganisation() ?></td>
            <td><?php echo $unStage->getIdMaitreStage() ?></td>
            <td><?php echo $unStage->getDateDebut() ?></td>
            <td><?php echo $unStage->getDateFin() ?></td>
            <td><?php echo $unStage->getDateVisite() ?></td>
            <td><?php echo $unStage->getVille() ?></td>
            <td><?php echo $unStage->getDivers() ?></td>
            <td><?php echo $unStage->getBilanTravaux() ?></td>
            <td><?php echo $unStage->getRessourcesOutils() ?></td>
            <td><?php echo $unStage->getCommentaires() ?></td>
            <td><?php echo $unStage->getCcf() ?></td>
        </tr>
        <?php
            }
        ?>
    </table>

</form>


