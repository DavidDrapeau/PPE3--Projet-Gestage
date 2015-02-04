<?php

class M_Organisation{
    private $idOrganisation;
    private $nom;
    private $ville;
    private $adresse;
    private $cp;
    private $tel;
    private $fax;
    private $formeJur;
    private $activite;
    
    function __construct($idOrganisation, $nom, $ville, $adresse, $cp, $tel, $fax, $formeJur, $activite) {
        $this->idOrganisation = $idOrganisation;
        $this->nom = $nom;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->formeJur = $formeJur;
        $this->activite = $activite;
    }
    
    
    public function getIdOrganisation() {
        return $this->idOrganisation;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getFax() {
        return $this->fax;
    }

    public function getFormeJur() {
        return $this->formeJur;
    }

    public function getActivite() {
        return $this->activite;
    }

    public function setIdOrganisation($idOrganisation) {
        $this->idOrganisation = $idOrganisation;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function setFormeJur($formeJur) {
        $this->formeJur = $formeJur;
    }

    public function setActivite($activite) {
        $this->activite = $activite;
    }

    
}

