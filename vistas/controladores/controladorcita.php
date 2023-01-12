<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorCita extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "citas1";
    
    public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idcita = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcita);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

        $date = $objeto->fechaCita -> format('Y-m-d H:i:s');
        // $hora = $objeto->fechaCita ->format('H:i:s');

        $sql = "insert into ".$this->tabla. " values (0,?,'Agendado',?) ";
        $sentencia = $this->getConexion()->prepare($sql);        
        $sentencia->bind_param("si",$date,$objeto->clientes_identificador);

        $sentencia->execute();
        

    } else {

        $sql = "update ".$this->tabla. 
              " set personalEmpresa_numeroIdentificacion = ? where idcita = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("iissi",$objeto->personalEmpresa_numeroIdentificacion,$objeto->salario,$objeto->fechaInicial,$objeto->fechaFinal, $objeto->idcita);
          $sentencia->execute();
      }


      }
      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idcita = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcita);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idcita, personalEmpresa_numeroIdentificacion, salario,$objeto->fechaInicial,$objeto->fechaFinal from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosCitas() {

        
        $sql = "
        SELECT c.idcita, c.clientes_identificador, CONCAT( cl.nombres, ' ', cl.apellidos ) NombreCompleto, c.fechaCita,c.estado
        FROM citas1 c, clientes cl
        WHERE   cl.identificador = c.clientes_identificador 
          AND c.estado = 'Agendado' 
          ORDER BY c.fechaCita;";

        return $this->getDatos($sql);
    }


    public function listarDatosCliente($datos) {

        
      // $sql = "select * from ".$this->tabla;
      $sql = "select identificador , nombres, apellidos from clientes where identificador  = '" . $datos . "';";
      
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