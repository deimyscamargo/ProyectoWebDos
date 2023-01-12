<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorPlantilla extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "";
     
      public function guardar($objeto){}
      public function eliminar($objeto){}
      public function listar(){}
      public function listarDatos(){}
      public function getDatos($sql){}
      public function consultarRegistro($objeto){}

    }

?>