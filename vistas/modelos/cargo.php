<?php

class Cargo {

    public $idcargo ;
    public $cargo;
    public $salario;
    public $tipo;


        
    public function __construct($idcargo ,$cargo,$salario, $tipo) {

        $this->idcargo  = $idcargo ;
        $this->cargo = $cargo;
        $this->salario = $salario;
        $this->tipo = $tipo;

    }


    public function getCodigo() {
        return $idcargo ;
    }

}


?>