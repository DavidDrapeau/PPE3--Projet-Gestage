<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
<form method="post" action=".?controleur=Utilisateurs&action=afficheListeStage">

    <h1> Affichage de la liste des stages </h1>
    <table>
        <tr>
            <th>Numéro du client</th> 
            <th>Id Etudiant</th>
            <th>Id Professeur</th>
            <th>Id Organisation</th>
            <th>Id Maître du stage</th>
            <th>Participation aux CCF</th>
            <th> Action </th>
            
        </tr>
        <?php
            $listeStages = $this->lireDonnee('lesStages');
            for($i=0; $i<count($listeStages); $i++) {
              $unStage=$listeStages[$i];
        ?>    
        <tr>
            <td><?php echo $unStage->getNumStage() ?></td>
            <td><?php echo $unStage->getIdEtudiant() ?></td>
            <td><?php echo $unStage->getIdProfesseur() ?></td>
            <td><?php echo $unStage->getIdOrganisation() ?></td>
            <td><?php echo $unStage->getIdMaitreStage() ?></td>
            <td><?php echo $unStage->getCcf() ?></td>
            <td><a href="?controleur=Utilisateur&action=afficherStage&idStage=<?php echo $unStage->getNumStage() ?>">Détails</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</form>


