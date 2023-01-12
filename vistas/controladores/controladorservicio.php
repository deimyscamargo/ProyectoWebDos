<?php 
    
    require_once("../componentes/conectarmysql.php");
    require_once("interfazcontrolador.php");

    class ControladorServicio extends 
      ConectarMySQL implements InterfazControlador {

      private $tabla = "servicios";
     
      public function guardar($objeto){

        $sql = "Select 1 from ".$this->tabla." where idservicio = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idservicio);
        $sentencia->execute();
        $result = $sentencia -> get_result();
        // print_r ($result->num_rows);
        // print_r ($objeto->idservicio);
        if ($result->num_rows == 0 ) {

          $sql = "insert into ".$this->tabla. " values (?,?,?,?,?,?,?,?,?,?) ";
          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("isiiisssii",$objeto->idservicio,$objeto->nombre, $objeto->porcentajeGanancia,$objeto->costoTotal, $objeto->precio,
          $objeto->estado, $objeto->valoracionPeso, $objeto->valoracionPresion, $objeto->resultado, $objeto->categorias_idcategoria);
          $sentencia->execute();

      } else {

        $sql = "update ".$this->tabla. 
              " set nombre = ?, porcentajeGanancia = ?, costoTotal = ?, precio = ?, estado = ? , valoracionPeso = ?, valoracionPresion  = ?,  resultado = ?, categorias_idcategoria = ?   where idservicio = ? ";

          $sentencia = $this->getConexion()->prepare($sql);
          $sentencia->bind_param("siiisssiii",$objeto->nombre, $objeto->porcentajeGanancia,$objeto->costoTotal, $objeto->precio,
          $objeto->estado, $objeto->valoracionPeso, $objeto->valoracionPresion, $objeto->resultado, $objeto->categorias_idcategoria, $objeto->idservicio);
          $sentencia->execute();
      }


      }

      public function aprobarRechazar($idServ, $valor){

        $sql = "update ".$this->tabla." set estado = '" . $valor . "' where idservicio = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$idServ );
        $sentencia->execute();


      }


      public function eliminar($objeto){

        $sql = "delete from ".$this->tabla." where idservicio = ? ";
        $sentencia = $this->getConexion()->prepare($sql);
        $sentencia->bind_param("i",$objeto->idservicio);
        $sentencia->execute();


      }
      public function listar(){

        $sql = "select idservicio, nombre from ".$this->tabla;
                
          return $this->getDatos($sql);
    
      }

      public function listarDatos() {

        
        $sql = "select * from ".$this->tabla;
        
        return $this->getDatos($sql);
      }

      public function listarDatosGerente() {

        
        $sql = "(SELECT CAT.nombre CAT_SERVICIO, SER3.nombre NOM_SERVICIO, ES.elementos_servicio, ES.COSTO_ELEMENTOS, MS.maquinas_servicio, 
                        MS.COSTO_MAQUINAS, SER3.costoTotal, SER3.porcentajeGanancia, SER3.precio, SER3.estado, SER3.idservicio
                FROM 
                    (SELECT SER.idservicio, ( ME.nombre ) elementos_servicio, SUM( ME.costo ) costo_elementos
                    FROM servicios SER
                      INNER JOIN maquinaselementos_has_servicios MES ON MES.servicios_idservicio = SER.idservicio
                      INNER JOIN maquinaselementos ME ON ME.idmaquinaelemento = MES.maquinasElementos_idmaquinaelemento
                    WHERE ME.tipo = 'elemento'
                    GROUP BY SER.idservicio ) ES,
                    
                    (SELECT SER2.idservicio, GROUP_CONCAT( ME2.nombre ) maquinas_servicio, SUM( ME2.costo ) costo_maquinas
                    FROM servicios SER2 
                      INNER JOIN maquinaselementos_has_servicios MES2 ON MES2.servicios_idservicio = SER2.idservicio
                      INNER JOIN maquinaselementos ME2 ON ME2.idmaquinaelemento = MES2.maquinasElementos_idmaquinaelemento
                    WHERE ME2.tipo = 'maquina'
                    GROUP BY SER2.idservicio) MS,
                    categorias CAT
                    INNER JOIN servicios SER3 ON CAT.idcategoria = SER3.categorias_idcategoria
                WHERE ES.IDSERVICIO = MS.IDSERVICIO
                  AND ES.IDSERVICIO = SER3.idservicio
                  AND SER3.estado = 'Enviado')
                  
                UNION ALL 
                
                (SELECT CAT.nombre CAT_SERVICIO, SER3.nombre NOM_SERVICIO, ES.elementos_servicio, ES.COSTO_ELEMENTOS, MS.maquinas_servicio, 
                        MS.COSTO_MAQUINAS, SER3.costoTotal, SER3.porcentajeGanancia, SER3.precio, SER3.estado, SER3.idservicio
                FROM 
                    (SELECT SER.idservicio, ( ME.nombre ) elementos_servicio, SUM( ME.costo ) costo_elementos
                    FROM servicios SER
                      INNER JOIN maquinaselementos_has_servicios MES ON MES.servicios_idservicio = SER.idservicio
                      INNER JOIN maquinaselementos ME ON ME.idmaquinaelemento = MES.maquinasElementos_idmaquinaelemento
                    WHERE ME.tipo = 'elemento'
                    GROUP BY SER.idservicio ) ES,
                    
                    (SELECT SER2.idservicio, GROUP_CONCAT( ME2.nombre ) maquinas_servicio, SUM( ME2.costo ) costo_maquinas
                    FROM servicios SER2 
                      INNER JOIN maquinaselementos_has_servicios MES2 ON MES2.servicios_idservicio = SER2.idservicio
                      INNER JOIN maquinaselementos ME2 ON ME2.idmaquinaelemento = MES2.maquinasElementos_idmaquinaelemento
                    WHERE ME2.tipo = 'maquina'
                    GROUP BY SER2.idservicio) MS,
                    categorias CAT
                    INNER JOIN servicios SER3 ON CAT.idcategoria = SER3.categorias_idcategoria
                WHERE ES.IDSERVICIO = MS.IDSERVICIO
                  AND ES.IDSERVICIO = SER3.idservicio
                  AND SER3.estado = 'Aprobado')
                  
                UNION ALL 
                
                (SELECT CAT.nombre CAT_SERVICIO, SER3.nombre NOM_SERVICIO, ES.elementos_servicio, ES.COSTO_ELEMENTOS, MS.maquinas_servicio, 
                        MS.COSTO_MAQUINAS, SER3.costoTotal, SER3.porcentajeGanancia, SER3.precio, SER3.estado, SER3.idservicio
                FROM 
                    (SELECT SER.idservicio, ( ME.nombre ) elementos_servicio, SUM( ME.costo ) costo_elementos
                    FROM servicios SER
                      INNER JOIN maquinaselementos_has_servicios MES ON MES.servicios_idservicio = SER.idservicio
                      INNER JOIN maquinaselementos ME ON ME.idmaquinaelemento = MES.maquinasElementos_idmaquinaelemento
                    WHERE ME.tipo = 'elemento'
                    GROUP BY SER.idservicio ) ES,
                    
                    (SELECT SER2.idservicio, GROUP_CONCAT( ME2.nombre ) maquinas_servicio, SUM( ME2.costo ) costo_maquinas
                    FROM servicios SER2 
                      INNER JOIN maquinaselementos_has_servicios MES2 ON MES2.servicios_idservicio = SER2.idservicio
                      INNER JOIN maquinaselementos ME2 ON ME2.idmaquinaelemento = MES2.maquinasElementos_idmaquinaelemento
                    WHERE ME2.tipo = 'maquina'
                    GROUP BY SER2.idservicio) MS,
                    categorias CAT
                    INNER JOIN servicios SER3 ON CAT.idcategoria = SER3.categorias_idcategoria
                WHERE ES.IDSERVICIO = MS.IDSERVICIO
                  AND ES.IDSERVICIO = SER3.idservicio
                  AND SER3.estado = 'Rechazado');";

        return $this->getDatos($sql);
      }

      public function listarDatosPrincipal() {

        $sql = "
        SELECT s.nombre AS Servicio, c.nombre Categoria, c.descripcion Descripcion
        FROM servicios s, categorias   c
        WHERE   s.categorias_idcategoria = c.idcategoria
";
        return $this->getDatos($sql);
      }


      public function listarDatosTipo( $tipo ) {

        $sql = "select idservicio as indice, nombre as valor, precio from ".$this->tabla;
                
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