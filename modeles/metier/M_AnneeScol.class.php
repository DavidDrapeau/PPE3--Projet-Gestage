<?php

/**
 * Description of M_AnneeScol
 *
 * @author btssio
 */

class M_AnneeScol{
    private $anneeScol;
    
    function __construct($anneeScol) {
        $this->anneeScol = $anneeScol;
    }
    
    public function getAnneeScol() {
        return $this->anneeScol;
    }

    public function setAnneeScol($anneeScol) {
        $this->anneeScol = $anneeScol;
    }


}