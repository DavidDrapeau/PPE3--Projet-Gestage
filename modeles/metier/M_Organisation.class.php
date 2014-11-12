<?php

/**
 * Description of M_Organisation
 *
 * @author btssio
 */

 class M_Organisation{
     private $idOrga;
     private $nomOrga;
     private $villeOrga;
     private $adresseOrga;
     private $cpOrga;
     private $telOrga;
     private $faxOrga;
     private $formeJuridique;
     private $activite;
     
     
 
    function __construct($idOrga, $nomOrga, $villeOrga, $adresseOrga, $cpOrga, $telOrga, $faxOrga, $formeJuridique, $activite) {
     $this->idOrga = $idOrga;
     $this->nomOrga = $nomOrga;
     $this->villeOrga = $villeOrga;
     $this->adresseOrga = $adresseOrga;
     $this->cpOrga = $cpOrga;
     $this->telOrga = $telOrga;
     $this->faxOrga = $faxOrga;
     $this->formeJuridique = $formeJuridique;
     $this->activite = $activite;
    }
    
    public function getIdOrga() {
        return $this->idOrga;
    }

    public function getNomOrga() {
        return $this->nomOrga;
    }

    public function getVilleOrga() {
        return $this->villeOrga;
    }

    public function getAdresseOrga() {
        return $this->adresseOrga;
    }

    public function getCpOrga() {
        return $this->cpOrga;
    }

    public function getTelOrga() {
        return $this->telOrga;
    }

    public function getFaxOrga() {
        return $this->faxOrga;
    }

    public function getFormeJuridique() {
        return $this->formeJuridique;
    }

    public function getActivite() {
        return $this->activite;
    }

    public function setIdOrga($idOrga) {
        $this->idOrga = $idOrga;
    }

    public function setNomOrga($nomOrga) {
        $this->nomOrga = $nomOrga;
    }

    public function setVilleOrga($villeOrga) {
        $this->villeOrga = $villeOrga;
    }

    public function setAdresseOrga($adresseOrga) {
        $this->adresseOrga = $adresseOrga;
    }

    public function setCpOrga($cpOrga) {
        $this->cpOrga = $cpOrga;
    }

    public function setTelOrga($telOrga) {
        $this->telOrga = $telOrga;
    }

    public function setFaxOrga($faxOrga) {
        $this->faxOrga = $faxOrga;
    }

    public function setFormeJuridique($formeJuridique) {
        $this->formeJuridique = $formeJuridique;
    }

    public function setActivite($activite) {
        $this->activite = $activite;
    }


 }