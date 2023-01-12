<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorDiagnosticar extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "diagnosticoscitas";
    
    public function guardar($objeto){

        $codigo = ($objeto->iddiagnostico > 0) ? $objeto->iddiagnostico : -1;

        $sql = "Select 1 from ".$this->tabla." where iddiagnostico = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i", $codigo );
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        //var_dump($objeto);

        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values(0,?,?)";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("si",$objeto->descripcion, $objeto->citas_idcita);
          $sentencia->execute();
          
          return $sentencia->insert_id;

        } else {
            $sql = "update ".$this->tabla. 
                " set descripcion = ? where iddiagnostico = ? ";

            $sentencia = $this->getConexion()->prepare($sql);
            $sentencia->bind_param("sii",$objeto->descripcion,$objeto->citas_idcita, $objeto->iddiagnostico);
            $sentencia->execute();
        }


    }
    public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where iddiagnostico = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->iddiagnostico);
        $sentencia->execute();


    }
    public function listar(){

        $sql = "select iddiagnostico, descripcion from ".$this->tabla;
                
        return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosTipo( $derivacion ) {

        
        $sql = "select iddiagnostico as indice, descripcion, citas_idcita  as valor from ".$this->tabla . " where derivacion = '" . $derivacion . "';";
        
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