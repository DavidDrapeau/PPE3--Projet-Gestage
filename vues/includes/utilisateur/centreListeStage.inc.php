<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
    <h1> <?php echo $this->lireDonnee('titreVue');?> </h1>
    <table>
        <tr>
            <th>Numéro du stage</th> 
            <th>Id Etudiant</th>
            <th>Participation aux CCF</th>
            <th> Actions </th>
            
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
            <td><?php echo $unStage->getCcf() ?></td>
            <!-- Afficher les détails concernant un stage-->
            <td><a href="?controleur=Utilisateur&action=afficherStage&idStage=<?php echo $unStage->getNumStage() ?>&idEtudiant=<?php echo $unStage->getIdEtudiant() ?>
                   &idProfesseur=<?php echo $unStage->getIdProfesseur() ?>&idOrganisation=<?php echo $unStage->getIdOrganisation() ?>&idMaitreStage=<?php echo $unStage->getIdMaitreStage() ?>">Détails</a>
                <a href="?controleur=Utilisateur&action=supprimerStage&idStage=<?php echo $unStage->getNumStage() ?>">Supprimer</a>
            </td>
                   
        </tr>
        <?php
            }
        ?>
    </table>


