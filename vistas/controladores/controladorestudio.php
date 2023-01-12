<?php 
    
    //include("../componentes/conectarmysql.php");
    // require("interfazcontrolador.php");

    class ControladorEstudio extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "estudios";
    
    public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idestudio = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idestudio  );
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

        $sql = "insert into ".$this->tabla. "(nombre, personalEmpresa_numeroIdentificacion ) values (?,?) ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("si",$objeto->nombre, $objeto->personalEmpresa_numeroIdentificacion );
        $sentencia->execute();

    } else {

        $sql = "update ".$this->tabla. 
            " set nombre = ? where idestudio   = ? ";

        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("sii",$objeto->nombre,$objeto->personalEmpresa_numeroIdentificacion , $objeto->idestudio );
        $sentencia->execute();
    }


    }
    public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idestudio   = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idestudio  );
        $sentencia->execute();


    }
    public function listar(){

        $sql = "select idestudio  , nombre, personalEmpresa_numeroIdentificacion   from ".$this->tabla;
                
        return $this->getDatos($sql);
    
    }

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