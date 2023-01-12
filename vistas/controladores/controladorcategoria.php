<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorCategoria extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "categorias";
     
      public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idcategoria = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcategoria);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("iss",$objeto->idcategoria,$objeto->nombre, $objeto->descripcion);
          $sentencia->execute();

      } else {

        $sql = "update ".$this->tabla. 
              " set nombre = ? where idcategoria = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("ssi",$objeto->nombre,$objeto->descripcion, $objeto->idcategoria);
          $sentencia->execute();
      }


      }
      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idcategoria = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcategoria);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idcategoria, nombre, descripcion from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }


      // public function listarDatosServicio(){

      //   $sql = "select idcategoria, nombre, descripcion from ".$this->tabla;
                
      //     return $this->getDatos($sql);
    
      // }





      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function getDatos($sql) {

        $stmt = $this->getConexion()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado;
        
      }

      public function consultarRegistro($objeto){}
       

    }
       



?>