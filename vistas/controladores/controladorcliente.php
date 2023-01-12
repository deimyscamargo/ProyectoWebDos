<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorCliente extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "clientes";
     
      public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where identificador = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->identificador);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("issssssssssssi",$objeto->identificador,$objeto->tipoIdentificacion,$objeto->nombres,
              $objeto->apellidos,$objeto->direccionDeResidencia,$objeto->correoElectronico,$objeto->numeroCelular,
              $objeto->fechaNacimiento,$objeto->nombresAcompanante,$objeto->apellidosAcompanante,
              $objeto->numeroCelularAcompanante,$objeto->correoAcompanante,$objeto->fechaNacimientoAcompanante,$objeto->usuarios_idusuario);
          $sentencia->execute();
          

      } else {

        $sql = "update ".$this->tabla. 
              " set tipoIdentificacion = ?, nombres = ?, apellidos = ?, direccionDeResidencia = ?,correoElectronico = ?,
                numeroCelular = ?,fechaNacimiento = ?, nombresAcompanante = ?, apellidosAcompanante = ?,
              numeroCelularAcompanante = ?,correoAcompanante = ?, fechaNacimientoAcompanante = ?,usuarios_idusuario = ? ,
               where identificador = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("ssssssssssssii",$objeto->tipoIdentificacion,$objeto->nombres,
          $objeto->apellidos,$objeto->direccionDeResidencia,$objeto->correoElectronico,$objeto->numeroCelular,
          $objeto->fechaNacimiento,$objeto->nombresAcompanante,$objeto->apellidosAcompanante,
          $objeto->numeroCelularAcompanante,$objeto->correoAcompanante,$objeto->fechaNacimientoAcompanante,
          $objeto->identificador,$objeto->usuarios_idusuario);
          $sentencia->execute();
      }
      }
      public function eliminar($objeto){
        $sql = "delete from ".$this->tabla." where codigo = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->identificador);
        $sentencia->execute();
      }
      public function listar(){

        $sql = "select identificador, from ".$this->tabla;
              
        return $this->getDatos($sql);
      }
      public function listarDatos() {

        $sql = "
        SELECT c.idcita, c.clientes_identificador, CONCAT( cl.nombres, ' ', cl.apellidos ) NombreCompleto, cl.numeroCelular, cl.correoElectronico, c.fechaCita,c.estado
        FROM citas1 c, clientes cl
        WHERE   cl.identificador = c.clientes_identificador 
        AND c.estado = 'Agendado' 
        ORDER BY c.fechaCita;
";
        
        return $this->getDatos($sql);
      }


      public function listarDatosCliente($datos) {

        
        // $sql = "select * from ".$this->tabla;
        $sql = "
        SELECT cli.*
        FROM citas1 c
            INNER JOIN clientes cli ON cli.identificador = c.clientes_identificador
        WHERE c.idcita = " . $datos . ";";
        
        return $this->getDatos($sql);
      }


      public function getDatos($sql) {
      

        $stmt = $this->getConexion()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado;
      }
      public function consultarRegistro($objeto){
        $sql = "select * from ".$this->tabla." where identificador = ?";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->identificador);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado;
  
    }
  }

?>