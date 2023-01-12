<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorNomina extends 
    ConectarMySQL implements InterfazControlador {

    private $tabla = "nominas";
    
    public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idnomina = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idnomina);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        
        if ($result->num_rows == 0 ) {

        $date = $objeto->fechaInicial -> format('Y-m-d H:i:s');
        $date2 = $objeto->fechaFinal -> format('Y-m-d H:i:s');

        $sql = "insert into ".$this->tabla. " values (0, ?,?,?,?) ";
        $sentencia = $this->getConexion()->prepare($sql);        
        $sentencia->bind_param("iiss",$objeto->personalEmpresa_numeroIdentificacion, $objeto->salario,$date,$date2);

        $sentencia->execute();
        

    } else {

        $sql = "update ".$this->tabla. 
              " set personalEmpresa_numeroIdentificacion = ? where idnomina = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("iissi",$objeto->personalEmpresa_numeroIdentificacion,$objeto->salario,$objeto->fechaInicial,$objeto->fechaFinal, $objeto->idnomina);
          $sentencia->execute();
      }


      }
      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idnomina = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idnomina);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idnomina, personalEmpresa_numeroIdentificacion, salario,$objeto->fechaInicial,$objeto->fechaFinal from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosNomina() {

        
        $sql = "
        SELECT n.idnomina as ID_Nomina, p.numeroIdentificacion as Numero_ID,  p.nombres as nombres, p.apellidos as apellidos, c.cargo as cargo, c.salario as salario
        
        FROM  nominas n, personalempresa p , cargos c
        
        WHERE n.personalEmpresa_numeroIdentificacion = p.numeroIdentificacion or p.cargos_idcargo = c.idcargo;
        
      ";

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