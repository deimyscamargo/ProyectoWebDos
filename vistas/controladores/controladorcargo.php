<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorCargo extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "cargos";
     
      public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idcargo = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcargo);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("isis",$objeto->idcargo,$objeto->cargo,$objeto->salario,$objeto->tipo);
          $sentencia->execute();

      } else {

        $sql = "update ".$this->tabla. 
              " set cargo = ?,  salario = ? , tipo = ? where idcargo = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("sisi",$objeto->cargo,$objeto->salario,$objeto->tipo,$objeto->idcargo);
          $sentencia->execute();
      }

      }
      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idcargo = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idcargo);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idcargo, cargo,salario, tipo from ".$this->tabla;
                
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
       


    // SELECT cli.*
    // FROM citas1 c
    //      INNER JOIN clientes cli ON cli.identificador = c.clientes_identificador
    // WHERE c.idcita = 17;
    
    
    // SELECT ser.*, 
    // FROM citas1	cit
    //     INNER JOIN diagnosticoscitas dc ON cit.idcita = dc.citas_idcita
    //     INNER JOIN servicios_has_diagnosticartratamientos sdt ON dc.iddiagnostico = sdt.diagnosticosCitas_iddiagnostico
    //     INNER JOIN servicios ser ON ser.idservicio = sdt.servicios_idservicio
    // WHERE cit.idcita = 17;


?>