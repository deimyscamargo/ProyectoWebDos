<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorLogin extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "usuarios";
      public function guardar($objeto){
      }
      public function eliminar($objeto){}
      public function listar(){}
      public function listarDatos() {}
      public function consultarRegistro($objeto){

        

        $sql = "SELECT U.tipo, U.idusuario, TP.nombre_completo
                FROM usuarios U,
                    ( SELECT   cl.identificador AS identificacion , CONCAT( cl.nombres, ' ', cl.apellidos ) nombre_completo
                      FROM clientes cl
                
                      UNION 
                
                      SELECT  pe.numeroIdentificacion AS identificacion,    CONCAT( pe.nombres, ' ', pe.apellidos ) nombre_completo
                      FROM personalempresa pe ) TP
                WHERE U.idusuario = TP.identificacion
                  AND U.nombreUsuario = ?
                  AND U.contrasena = ?;";

        // $sql = "Select idusuario, tipo from ".$this->tabla." where 
        // nombreUsuario = ? and contrasena = ?";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("ss",$objeto->nombreUsuario, $objeto->contrasena);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        return $result;

      }
}
  



?>