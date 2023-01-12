<?php

class Diagnostico {

    public $iddiagnostico;
    public $descripcion;
    public $citas_idcita;


        
    public function __construct($descripcion,$citas_idcita) {

        $this->descripcion = $descripcion;
        $this->citas_idcita = $citas_idcita;

    }

    public function getCodigo() {
        return $iddiagnostico  ;
    }

}


?>