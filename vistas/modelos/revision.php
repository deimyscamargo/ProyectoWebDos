<?php

class Revision {

    public $idrevision;
    public $motivoCita;
    public $peso;
    public $derivacion;
    public $presionArterial;
    public $personalEmpresa_numeroIdentificacion ;
    public $citas_idcita;


    public function __construct($motivoCita,$peso,$derivacion,$presionArterial,$personalEmpresa_numeroIdentificacion,$citas_idcita) {

        $this->idrevision = -1;

        $this->motivoCita = $motivoCita;
        $this->peso = $peso;
        $this->derivacion = $derivacion;
        $this->presionArterial = $presionArterial;
        $this->personalEmpresa_numeroIdentificacion = $personalEmpresa_numeroIdentificacion;
        $this->citas_idcita = $citas_idcita;
    }


    public function getCodigo() {

        return $idrevision;
    }

}

?>