<?php

/**
 * Description of M_DaoStage
 *
 * @author btssio
 */

class M_DaoStage extends M_DaoGenerique{
    
    function __construct() {
        $this->nomTable = "STAGE";
        $this->nomClefPrimaire = "NUM_STAGE";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {
        $retour = new M_Stage($enreg["NUM_STAGE"],$enreg["ANNEESCOL"], $enreg["IDETUDIANT"], $enreg["IDPROFESSEUR"], $enreg["IDORGANISATION"], $enreg["IDMAITRESTAGE"],
                $enreg["DATEDEBUT"], $enreg["DATEFIN"], $enreg["DATEVISITESTAGE"], $enreg["VILLE"], $enreg["DIVERS"], $enreg["BILANTRAVAUX"],
                $enreg["RESSOURCESOUTILS"], $enreg["COMMENTAIRES"], $enreg["PARTICIPATIONCCF"]);
        return $retour;
    }

    /**
     * Prépare une liste de paramètres pour une requête SQL UPDATE ou INSERT
     * @param Object $objetMetier
     * @return array : tableau ordonné de valeurs
     */
    public function objetVersEnregistrement($objetMetier) {
        // construire un tableau des paramètres d'insertion ou de modification
        // l'ordre des valeurs est important : il correspond à celui des paramètres de la requête SQL
        $retour = array(
            ':numStage' => $objetMetier-> getNumStage(),
            ':anneeScol' => $objetMetier->getAnneeScolaire(),
            ':idEtudiant' => $objetMetier->getIdEtudiant(),
            ':idProfesseur'=> $objetMetier->getIdProfesseur(),
            ':idOrganisation'=> $objetMetier->getIdOrganisation(),
            ':idMaitreStage'=> $objetMetier->getIdMaitreStage(),
            ':dateDebut'=> $objetMetier->getDatedebut(),
            ':dateFin'=> $objetMetier->getDateFin(),
            ':dateVisite'=> $objetMetier->getDateVisite(),
            ':ville'=> $objetMetier->getVille(),
            ':divers'=> $objetMetier->getDivers(),
            ':bilanTravaux'=> $objetMetier->getBilanTravaux(),
            ':ressourcesOutils'=> $objetMetier->getRessourcesOutils(),
            ':commentaires'=> $objetMetier->getCommentaires(),
            ':participationCcf'=> $objetMetier->getCcf()
                        
        );
        return $retour;
    }
    
     /**
     * Lire tous les enregistrements de la table stage
     * @return tableau-associatif d'objets : un tableau d'instances de la classe métier
     */
    function getAll() {
        $retour = null;
        // Requête textuelle
        $sql = "SELECT * FROM $this->nomTable ORDER BY $this->nomClefPrimaire";
        try {
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête PDO
            if ($queryPrepare->execute()) {
                // si la requête réussit :
                // initialiser le tableau d'objets à retourner
                $retour = array();
                // pour chaque enregistrement retourné par la requête
                while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    // construir un objet métier correspondant
                    $unObjetMetier = $this->enregistrementVersObjet($enregistrement);
                    // ajouter l'objet au tableau
                    $retour[] = $unObjetMetier;
                }
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - '.__METHOD__ . ' : '. $e->getMessage();
        }
        return $retour;
    }


    public function insert($objetMetier) {
        return FALSE;
    }

    public function update($idMetier, $objetMetier) {
        return FALSE;
    }

}
