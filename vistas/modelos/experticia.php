<?php

class Experticia {

    public $idexperticia  ;
    public $nombre;
    public $personalEmpresa_numeroIdentificacion ;

        
    public function __construct($nombre,$personalEmpresa_numeroIdentificacion ) {

        $this->nombre = $nombre;
        $this->personalEmpresa_numeroIdentificacion  = $personalEmpresa_numeroIdentificacion ;

    }


    public function getCodigo() {

        return $idexperticia  ;
    }

}


?>