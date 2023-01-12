<?php

class Maquina {

    public $idmaquinaelemento ;
    public $nombre;
    public $costo;
    public $tipo;


        
    public function __construct($idmaquinaelemento ,$nombre,$costo,$tipo) {

        $this->idmaquinaelemento  = $idmaquinaelemento ;
        $this->nombre = $nombre;
        $this->costo = $costo;
        $this->tipo = $tipo;


    }


    public function getCodigo() {

        return $idmaquinaelemento ;
    }

}


?>