<?php

/**
 * Description of M_Specialite
 *
 * @author btssio
 */
class M_Specialite{
    
	private $id; // type : int
	private $libelleCourt; // type : string
	private $libelleLong; 
        
        function __construct($id, $libelleCourt, $libelleLong) {
            $this->id = $id;
            $this->libelleCourt = $libelleCourt;
            $this->libelleLong = $libelleLong;
        }

        public function getId() {
            return $this->id;
        }

        public function getLibelleCourt() {
            return $this->libelleCourt;
        }

        public function getLibelleLong() {
            return $this->libelleLong;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setLibelleCourt($libelleCourt) {
            $this->libelleCourt = $libelleCourt;
        }

        public function setLibelleLong($libelleLong) {
            $this->libelleLong = $libelleLong;
        }

        
        
}
