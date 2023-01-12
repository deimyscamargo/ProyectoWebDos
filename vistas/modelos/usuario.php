<?php 

  class Usuario {

    public $nombreUsuario;
    public $contrasena;

    public function __construct($nombreUsuario,$contrasena) {

       $this->nombreUsuario = $nombreUsuario ;
       $this->contrasena = $contrasena ;

    }

  }


?>