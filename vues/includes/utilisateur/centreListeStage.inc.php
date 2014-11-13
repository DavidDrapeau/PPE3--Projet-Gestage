<?php
// on récupère un objet métier de type Stage
$unStage = $this->lireDonnee('stage');
?>
<form method="post" action=".?controleur=Utilisateurs&action=afficheListeStage">

    <h1> Affichage de la liste des stages </h1>
    <table>
        <tr>
            <th>Num du stage</th>
            <th>Année scolaire</th> 
            <th>Id étudiant</th>
            <th>Id professeur</th>
            <th>Id organisation</th>
            <th>Id maître de stage</th>
            <th>Date début</th>
            <th>Date de fin</th>
            <th>Date visite de stage</th>
            <th>Ville</th>
            <th>Divers</th>
            <th>Bilan des travaux</th>
            <th>Ressources outils</th>
            <th>Commentaires</th>
            <th>Participation aux CCF</th>
            
        </tr>
        <tr>
            <td></td>
            <td></td> 
            <td></td>
        </tr>
    </table>

</form>


