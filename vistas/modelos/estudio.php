<?php

class Estudio {

    public $idestudio;
    public $nombre;
    public $personalEmpresa_numeroIdentificacion ;

        
    public function __construct($nombre,$personalEmpresa_numeroIdentificacion ) {

        $this->nombre = $nombre;
        $this->personalEmpresa_numeroIdentificacion  = $personalEmpresa_numeroIdentificacion ;

    }


    public function getCodigo() {

        return $idestudio   ;
    }

}


?>