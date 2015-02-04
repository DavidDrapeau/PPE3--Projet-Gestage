<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
    <h1> <?php echo $this->lireDonnee('titreVue');?> </h1>
    <table>
        <tr>
            <th>Id Entreprise</th> 
            <th>Nom</th>
            <th>Ville</th>
            <th> Action </th>
            
        </tr>
        <?php
            //Parcours la liste des stages
            $listeEntreprises = $this->lireDonnee('lesEntreprises');
            for($i=0; $i<count($listeEntreprises); $i++) {
              $uneEntreprise=$listeEntreprises[$i];
        ?>    
        <tr>
            <td><?php echo $uneEntreprise->getIdOrganisation() ?></td>
            <td><?php echo $uneEntreprise->getNom() ?></td>
            <td><?php echo $uneEntreprise->getVille() ?></td>
            <!-- Afficher les détails concernant un stage-->
            <td><a href="?controleur=Utilisateur&action=afficherEntreprise&idEntreprise=<?php echo $uneEntreprise->getIdOrganisation() ?>">Détails</a></td>
                   
        </tr>
        <?php
            }
        ?>
    </table>




