<?php

class Cita {

    public $idcita ;
    public $fechaCita ;
    // public $horaCita;
    public $estado;
    public $clientes_identificador;


        
    public function __construct($idcita ,$fechaCita , $estado,$clientes_identificador ) {

        $this->idcita  = $idcita ;
        $this->fechaCita  = $fechaCita ;
        // $this->horaCita = $horaCita;
        // var_dump($horaCita);
        $this->estado = $estado;
        $this->clientes_identificador  = $clientes_identificador ;
    }


    public function getCodigo() {

        return $idcita ;
    }

}


?>