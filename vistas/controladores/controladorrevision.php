<?php 
    
    require("../componentes/conectarmysql.php");
    require("interfazcontrolador.php");

    class ControladorRevision extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "revisiones";
    
    public function guardar($objeto){

        $codigo = ($objeto->idrevision > 0) ? $objeto->idrevision : -1;

        $sql = "Select 1 from ".$this->tabla." where idrevision = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i", $codigo );
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        //var_dump($objeto);

        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values(0,?,?,?,?,?,?)";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("sisiii",$objeto->motivoCita, $objeto->peso, $objeto->derivacion,$objeto->presionArterial,$objeto->personalEmpresa_numeroIdentificacion,$objeto->citas_idcita );
          $sentencia->execute();
          //var_dump( $sentencia );

        } else {
            $sql = "update ".$this->tabla. 
                " set motivoCita = ? where idrevision = ? ";

            $sentencia = $this->getConexion()->prepare($sql);
            $sentencia->bind_param("sisiiii",$objeto->motivoCita,$objeto->peso,$objeto->derivacion,$objeto->presionArterial,$objeto->personalEmpresa_numeroIdentificacion,$objeto->citas_idcita, $objeto->idrevision);
            $sentencia->execute();
        }


    }
    public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idrevision = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idrevision);
        $sentencia->execute();


    }
    public function listar(){

        $sql = "select idrevision, motivoCita from ".$this->tabla;
                
        return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosTipo( $derivacion ) {

        
        $sql = "select idrevision as indice, motivoCita, peso as valor from ".$this->tabla . " where derivacion = '" . $derivacion . "';";
        
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