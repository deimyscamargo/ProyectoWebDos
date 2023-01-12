<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorMaquina extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "maquinaselementos";
     
      public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idmaquinaelemento = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idmaquinaelemento);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("isis",$objeto->idmaquinaelemento,$objeto->nombre, $objeto->costo, $objeto->tipo);
          $sentencia->execute();

      } else {

        $sql = "update ".$this->tabla. 
              " set nombre = ?,  costo=?, tipo=? where idmaquinaelemento = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("sisi",$objeto->nombre,$objeto->costo,$objeto->tipo, $objeto->idmaquinaelemento);
          $sentencia->execute();
      }


      }
      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idmaquinaelemento = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idmaquinaelemento);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idmaquinaelemento, nombre from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosTipo( $tipo ) {

        
        $sql = "select idmaquinaelemento as indice, nombre, costo as valor from ".$this->tabla . " where tipo = '" . $tipo . "';";
        
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