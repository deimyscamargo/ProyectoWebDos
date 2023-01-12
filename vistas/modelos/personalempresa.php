<?php

class PersonalEmpresa {

    public $numeroIdentificacion ;
    public $tipoIdentificacion;
    public $nombres;
    public $apellidos;
    public $direccionDeResidencia;
    public $numeroCelular;
    public $correo;
    public $usuarios_idusuario ;
    public $cargos_idcargo ;

    public function __construct($numeroIdentificacion , $tipoIdentificacion, $nombres,$apellidos,$direccionDeResidencia,$numeroCelular,$correo,$usuarios_idusuario, $cargos_idcargo ) {

        $this->numeroIdentificacion  = $numeroIdentificacion ;
        $this->tipoIdentificacion = $tipoIdentificacion;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->direccionDeResidencia = $direccionDeResidencia;
        $this->numeroCelular = $numeroCelular;
        $this->correo = $correo;
        $this->usuarios_idusuario = $usuarios_idusuario;
        $this->cargos_idcargo = $cargos_idcargo;
    }

    public function getCodigo() {
        return $numeroIdentificacion ;
    }

}

?>