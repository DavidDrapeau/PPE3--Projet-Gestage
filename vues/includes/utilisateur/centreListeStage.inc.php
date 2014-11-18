<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
<form method="post" action=".?controleur=Utilisateurs&action=afficheListeStage">
    <h1> <?php echo $this->lireDonnee('titreVue');?> </h1>
    <table>
        <tr>
            <th>Numéro du stage</th> 
            <th>Id Etudiant</th>
            <th>Id Professeur</th>
            <th>Id Organisation</th>
            <th>Id Maître du stage</th>
            <th>Participation aux CCF</th>
            <th> Action </th>
            
        </tr>
        <?php
            //Parcours la liste des stages
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
            <!-- Envoie la valeur du numéro du stage au controleur afin d'afficher les détails concernant un stage-->
            <td><a href="?controleur=Utilisateur&action=afficherStage&idStage=<?php echo $unStage->getNumStage() ?>">Détails</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</form>


