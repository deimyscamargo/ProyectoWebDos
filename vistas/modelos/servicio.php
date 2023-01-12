<?php

class Servicio {

    public $idservicio;
    public $nombre;
    // public $descripcion;
    public $porcentajeGanancia;
    public $costoTotal;
    public $precio;
    public $estado;
    public $valoracionPeso;
    public $valoracionPresion;
    public $resultado;
    public $categorias_idcategoria;


        
    public function __construct($idservicio ,$nombre,
    $porcentajeGanancia, $costoTotal, $precio,$estado,  $valoracionPeso,
    $valoracionPresion, $resultado, $categorias_idcategoria ) {

        $this->idservicio  = $idservicio ;
        $this->nombre = $nombre;
        // $this->descripcion = $descripcion;
        $this->porcentajeGanancia = $porcentajeGanancia;
        $this->costoTotal = $costoTotal;
        $this->precio = $precio;
        $this->estado = $estado;
        $this->valoracionPeso = $valoracionPeso;
        $this->valoracionPresion = $valoracionPresion;
        $this->resultado = $resultado;
        $this->categorias_idcategoria = $categorias_idcategoria;
    }


    public function getCodigo() {
        return $idservicio ;
    }

}


?>