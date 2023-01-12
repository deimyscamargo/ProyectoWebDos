<?php 


    class ConectarMySQL {

      private $conexion;

      function __construct()
      {
        require("../configuraciones/configuraciones.php");
        $this->conexion = mysqli_connect($servidor, $usuario, 
                                  $contraseña, $basedatos, $puerto);

      }

      function getConexion() {

        return $this->conexion;

      }

    }


?>