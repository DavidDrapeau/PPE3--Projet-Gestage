<?php

/**
 * Description of M_Stage
 *
 * @author btssio
 */

class M_Stage{
    private $numStage;
    private $anneeScolaire;
    private $idEtudiant;
    private $idProfesseur;
    private $idOrganisation;
    private $idMaitreStage;
    private $dateDebut;
    private $dateFin;
    private $dateVisite;
    private $ville;
    private $divers;
    private $bilanTravaux;
    private $ressourcesOutils;
    private $commentaires; // Commentaires si nécessaires
    private $ccf;  //Note de participation aux CCF
    
    function __construct($numStage, $anneeScolaire, $idEtudiant, $idProfesseur, $idOrganisation, $idMaitreStage, $dateDebut, $dateFin, $dateVisite, $ville, $divers, $bilanTravaux, $ressourcesOutils, $commentaires, $ccf) {
        $this->numStage = $numStage;
        $this->anneeScolaire = $anneeScolaire;
        $this->idEtudiant = $idEtudiant;
        $this->idProfeseur = $idProfesseur;
        $this->idOrganisation = $idOrganisation;
        $this->idMaitreStage = $idMaitreStage;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->dateVisite = $dateVisite;
        $this->ville = $ville;
        $this->divers = $divers;
        $this->bilanTravaux = $bilanTravaux;
        $this->ressourcesOutils = $ressourcesOutils;
        $this->commentaires = $commentaires;
        $this->ccf = $ccf;
        
    }
    
    public function getNumStage() {
        return $this->numStage;
    }

    public function getAnneeScolaire() {
        return $this->anneeScolaire;
    }

    public function getIdEtudiant() {
        return $this->idEtudiant;
    }

    public function getIdProfesseur() {
        return $this->idProfeseur;
    }

    public function getIdOrganisation() {
        return $this->idOrganisation;
    }

    public function getIdMaitreStage() {
        return $this->idMaitreStage;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function getDateVisite() {
        return $this->dateVisite;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getDivers() {
        return $this->divers;
    }

    public function getBilanTravaux() {
        return $this->bilanTravaux;
    }

    public function getRessourcesOutils() {
        return $this->ressourcesOutils;
    }

    public function getCommentaires() {
        return $this->commentaires;
    }

    public function getCcf() {
        return $this->ccf;
    }

    public function setNumStage($numStage) {
        $this->numStage = $numStage;
    }

    public function setAnneeScolaire($anneeScolaire) {
        $this->anneeScolaire = $anneeScolaire;
    }

    public function setIdEtudiant($idEtudiant) {
        $this->idEtudiant = $idEtudiant;
    }

    public function setIdProfesseur($idProfeseur) {
        $this->idProfeseur = $idProfeseur;
    }

    public function setIdOrganisation($idOrganisation) {
        $this->idOrganisation = $idOrganisation;
    }

    public function setIdMaitreStage($idMaitreStage) {
        $this->idMaitreStage = $idMaitreStage;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    public function setDateVisite($dateVisite) {
        $this->dateVisite = $dateVisite;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setDivers($divers) {
        $this->divers = $divers;
    }

    public function setBilanTravaux($bilanTravaux) {
        $this->bilanTravaux = $bilanTravaux;
    }

    public function setRessourcesOutils($ressourcesOutils) {
        $this->ressourcesOutils = $ressourcesOutils;
    }

    public function setCommentaires($commentaires) {
        $this->commentaires = $commentaires;
    }

    public function setCcf($ccf) {
        $this->ccf = $ccf;
    }



            
}