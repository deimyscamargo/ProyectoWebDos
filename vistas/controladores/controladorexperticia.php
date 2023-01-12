<?php 
    
    //include("../componentes/conectarmysql.php");
    // require("interfazcontrolador.php");

    class ControladorExperticia extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "experticias";
    
    public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idexperticia  = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idexperticia );
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

        $sql = "insert into ".$this->tabla. "(nombre, personalEmpresa_numeroIdentificacion) values (?,?) ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("si",$objeto->nombre, $objeto->personalEmpresa_numeroIdentificacion);
        $sentencia->execute();

    } else {

        $sql = "update ".$this->tabla. 
            " set nombre = ? where idexperticia  = ? ";

        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("sii",$objeto->nombre,$objeto->personalEmpresa_numeroIdentificacion , $objeto->idexperticia);
        $sentencia->execute();
    }


    }
    public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idexperticia  = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idexperticia );
        $sentencia->execute();


    }
    public function listar(){

        $sql = "select idexperticia , nombre, personalEmpresa_numeroIdentificacion  from ".$this->tabla;
                
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