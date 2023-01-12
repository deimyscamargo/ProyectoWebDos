<?php

class Categoria {

    public $idcategoria ;
    public $nombre;
    public $descripcion;

        
    public function __construct($idcategoria ,$nombre,$descripcion) {

        $this->idcategoria  = $idcategoria ;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

    }


    public function getCodigo() {

        return $idcategoria ;
    }

}


?>