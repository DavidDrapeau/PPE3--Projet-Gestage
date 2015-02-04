<?php

/**
 * Description of M_DaoOrganisation
 *
 * @author btssio
 */

class M_DaoOrganisation extends M_DaoGenerique{
    
    function __construct() {
        $this->nomTable = "ORGANISATION";
        $this->nomClefPrimaire = "IDORGANISATION";
    }

    /**
     * Redéfinition de la méthode abstraite de M_DaoGenerique
     * Permet d'instancier un objet d'après les valeurs d'un enregistrement lu dans la base de données
     * @param tableau-associatif $unEnreg liste des valeurs des champs d'un enregistrement
     * @return objet :  instance de la classe métier, initialisée d'après les valeurs de l'enregistrement 
     */
    public function enregistrementVersObjet($enreg) {

        //on construit l'objet Organisation
        $retour = new M_Organisation($enreg["IDORGANISATION"], $enreg["NOM_ORGANISATION"], $enreg["VILLE_ORGANISATION"], $enreg["ADRESSE_ORGANISATION"]
                , $enreg["CP_ORGANISATION"], $enreg["TEL_ORGANISATION"], $enreg["FAX_ORGANISATION"], $enreg["FORMEJURIDIQUE"], $enreg["ACTIVITE"]);
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
            ':nomOrganisation' => $objetMetier->getNom(),
            ':villeOrganisation' => $objetMetier->getVille(),
            ':adresseOrganisation' => $objetMetier->getAdresse(),
            ':cpOrganisation' => $objetMetier->getCp(),
            ':telOrganisation' => $objetMetier->getTel(),
            ':faxOrganisation' => $objetMetier->getFax(),
            ':formeJuridique' => $objetMetier->getFormeJur(),
            ':activite' => $objetMetier->getActivite()
                        
        );
        return $retour;
    }
    
     /**
     * Lire tous les enregistrements de la table organisation
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
    /**
     *  Lire un enregistrement d'après une valeur de clef primaire
     * @param type $id
     * @return type
     */
    function getOneById($id) {
        $retour = null;
        try {
            // Requête textuelle
            $sql = "SELECT * FROM $this->nomTable S ";
            $sql .= "WHERE $this->nomClefPrimaire = :id";
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            if ($queryPrepare->execute(array(':id' => $id))) {
                // si la requête réussit :
                // extraire l'enregistrement retourné par la requête
                $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                // construire l'objet métier correspondant
                $retour = $this->enregistrementVersObjet($enregistrement);
            }
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }

    public function insert($objetMetier) {
        return FALSE;
    }

    public function update($idMetier, $objetMetier) {
        return FALSE;
    }
    
    
    /**
     * Suppression d'une organisation
     * @param type $idMetier
     * @return type
     */
    function delete($idMetier) {
        $retour = FALSE;
        try {
            // Requête textuelle paramétrée 
            $sql = "DELETE FROM $this->nomTable WHERE $this->nomClefPrimaire = :id";
            // préparer la  liste des paramètres (1 seul)
            $parametres = array(':id'=>$idMetier);
            // préparer la requête PDO
            $queryPrepare = $this->pdo->prepare($sql);
            // exécuter la requête avec les valeurs des paramètres (il n'y en a qu'un ici) dans un tableau
            $retour = $queryPrepare->execute($parametres);
        } catch (PDOException $e) {
            echo get_class($this) . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
        }
        return $retour;
    }   
    

}

