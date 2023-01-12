<?php

class ServicioDiagnostico {

    public $codigo;
    public $numeroSesionesMinimas;
    public $numeroSesionesFaltantes;
    public $servicios_idservicio ;
    public $diagnosticosCitas_iddiagnostico ;

    public function __construct($numeroSesionesMinimas,$numeroSesionesFaltantes, $servicios_idservicio, $diagnosticosCitas_iddiagnostico) {

        $this->numeroSesionesMinimas = $numeroSesionesMinimas;
        $this->numeroSesionesFaltantes = $numeroSesionesFaltantes;
        $this->servicios_idservicio = $servicios_idservicio;
        $this->diagnosticosCitas_iddiagnostico = $diagnosticosCitas_iddiagnostico;
    }

    public function getCodigo() {
        return $codigo  ;
    }

}


?>