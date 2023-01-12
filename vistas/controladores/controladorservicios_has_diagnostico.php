<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorServicioDiagnostico extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "servicios_has_diagnosticartratamientos";
    
    public function guardar($objeto){

        $codigo = ($objeto->codigo > 0) ? $objeto->codigo : -1;

        $sql = "Select 1 from ".$this->tabla." where codigo = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i", $codigo );
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        //var_dump($objeto);

        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values(0,?,?,?,?)";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("iiii",$objeto->numeroSesionesMinimas, $objeto->numeroSesionesFaltantes, $objeto->servicios_idservicio,$objeto->diagnosticosCitas_iddiagnostico);
          $sentencia->execute();
          //var_dump( $sentencia );

        } else {
            $sql = "update ".$this->tabla. 
                " set numeroSesionesMinimas = ? where codigo = ? ";

            $sentencia = $this->getConexion()->prepare($sql);
            $sentencia->bind_param("iiii",$objeto->numeroSesionesMinimas,$objeto->numeroSesionesFaltantes,$objeto->servicios_idservicio,$objeto->diagnosticosCitas_iddiagnostico, $objeto->codigo);
            $sentencia->execute();
        }


    }
    public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where codigo = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->codigo);
        $sentencia->execute();


    }
    public function listar(){

        $sql = "select codigo, numeroSesionesMinimas from ".$this->tabla;
                
        return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosTipo( $servicios_idservicio ) {

        
        $sql = "select codigo as indice, numeroSesionesMinimas, numeroSesionesFaltantes as valor from ".$this->tabla . " where servicios_idservicio = '" . $servicios_idservicio . "';";
        
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