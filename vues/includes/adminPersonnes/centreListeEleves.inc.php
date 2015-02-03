<meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
    <h1> <?php echo $this->lireDonnee('titreVue');?> </h1>
     <table>
        <tr>
            <th>Id Personne</th> 
            <th>Spécialité</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th> Action </th>
            
        </tr>
        <?php
            //Parcours la liste des élèves
            $listeEleves = $this->lireDonnee('lesEleves');
            for($i=0; $i<count($listeEleves); $i++) {
              $unEleve=$listeEleves[$i];
        ?>    
        <tr>
            <td><?php echo $unEleve->getId() ?></td>
            <?php if($unEleve->getSpecialite() != null){ ?>
                <td><?php echo $unEleve->getSpecialite()->getLibelleCourt() ?></td>
            <?php } else{  ?>
                <td><?php echo "" ?></td>
            <?php } ?>
            <td><?php echo $unEleve->getCivilite() ?></td>
            <td><?php echo $unEleve->getNom() ?></td>
            <td><?php echo $unEleve->getPrenom() ?></td>
            <!-- Afficher les détails concernant un élève-->
            <td><a href="?controleur=AdminPersonnes&action=afficherUnEleve&idEleve=<?php echo $unEleve->getId() ?>">Détails</a></td>
        </tr>
        <?php
           }
        ?>
    </table>
 
 <!-- Pagination de la liste des élèves-->
 <nav>
  <ul class="pagination">
    <?php echo "<<" ?>
    <?php for ($i = 1; $i <= $this->lireDonnee('pages'); $i++): ?>
        <li>
            <a href="?controleur=AdminPersonnes&action=afficherEleves&page=<?php echo $i; ?>" 
               <?php if ((isset($_GET['page'])) && ($i == $_GET['page'])) echo 'class="active"' ?> >
                   <?php echo $i; ?>
            </a>
        </li>
        
   
    <?php endfor; ?>  
    <?php echo ">>" ?>
    </ul>
</nav>

