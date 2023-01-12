<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorPersonal extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "personalempresa";
     
      public function guardar($objeto){

        $nuevo = TRUE;

        $sql = "Select 1 from ".$this->tabla." where numeroIdentificacion = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->numeroIdentificacion);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?,?,?,?,?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("issssssii",$objeto->numeroIdentificacion,$objeto->tipoIdentificacion,$objeto->nombres,$objeto->apellidos,$objeto->direccionDeResidencia,$objeto->numeroCelular,$objeto->correo,$objeto->numeroIdentificacion,$objeto->cargos_idcargo);
          $sentencia->execute();
          // echo $sentencia;
        } else {

          $sql = "update ".$this->tabla. 
              " set tipoIdentificacion = ?,  nombres = ? where numeroIdentificacion = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("s,s,s,s,s,s,i,i,i",$objeto->tipoIdentificacion,$objeto->nombres,$objeto->apellidos,$objeto->direccionDeResidencia,$objeto->numeroCelular,$objeto->correo,$objeto->numeroIdentificacion,$objeto->cargos_idcargo,$objeto->numeroIdentificacion);
          $sentencia->execute();
          $nuevo = FALSE;
        }

        // if( $nuevo ){
        //   //Insertar en la tabla de usuarios
        // }else{
        //   //Actualizar el usuario existente en la tabla de usuarios
        // }
      }


      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where numeroIdentificacion = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->numeroIdentificacion);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select numeroIdentificacion, tipoIdentificacion from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosPersona($datos) {

        
        // $sql = "select * from ".$this->tabla;
        $sql = "select numeroIdentificacion, nombres, apellidos from ".$this->tabla . " where numeroIdentificacion = '" . $datos . "';";
        
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