<?php

class Nomina {

    public $idnomina;
    public $personalEmpresa_numeroIdentificacion ;
    public $salario;
    public $fechaInicial;
    public $fechaFinal;


        
    public function __construct($idnomina,$personalEmpresa_numeroIdentificacion ,$salario, $fechaInicial,$fechaFinal) {

        $this->idnomina = $idnomina;
        $this->personalEmpresa_numeroIdentificacion  = $personalEmpresa_numeroIdentificacion ;
        $this->salario = $salario;
        $this->fechaInicial = $fechaInicial;
        $this->fechaFinal = $fechaFinal;
    }


    public function getCodigo() {

        return $idnomina;
    }

}


?>