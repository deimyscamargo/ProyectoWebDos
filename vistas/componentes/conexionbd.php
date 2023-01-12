<?php 



class ConexionBD {

    private $conexion;

    function __construct() {

        require("../configuraciones/configuraciones.php");
        $this->conexion = mysqli_connect($servidor, $usuario, 
        $contraseña,$baseDatos,$puerto);

    }

    public  function getConexion() {

        return $this->conexion;

    }

    public function cerrarConexion() {

        $conexion->close();
    }




}

?>