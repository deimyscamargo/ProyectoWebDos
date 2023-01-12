<?php
    $controlador = $_POST['controlador'];
    $operacion = $_POST['operacion'];

    // var_dump( $_POST );


    if ($controlador=="login") {

        require_once("../modelos/usuario.php");
        require_once("../controladores/controladorlogin.php");
    
        $nombreUsuario = $_POST['nombreUsuario'];
        $contrasena = $_POST['contrasena'];

        $usuario = new Usuario($nombreUsuario,$contrasena);
        $controladorLogin = new ControladorLogin();
    
        $resultado = $controladorLogin->consultarRegistro($usuario);
      
        if ($resultado->num_rows == 0 ) {
    
            echo 'El usuario o contraseña no coinciden';
    
        } else {

            $fila = $resultado->fetch_assoc();
            $tipoUsuario = $fila['tipo'];
            $idusuario  = $fila['idusuario'];
            $nombre_profesional = $fila['nombre_completo'];

            unset( $_SESSION );
            session_start();
            $_SESSION['usuario'] = $tipoUsuario;
            $_SESSION['idusuario'] = $idusuario;
            $_SESSION['nombre_completo'] = $nombre_profesional;

            if ($tipoUsuario == 'A')
                header('Location: ../html/pgprincipaladmin.php');
            elseif ($tipoUsuario == 'G')
                header('Location: ../html/pgGerente.php');
            elseif ($tipoUsuario == 'S')
                header('Location: ../html/secretaria.php');
            elseif ($tipoUsuario == 'P')
                header('Location: ../html/AgendarCita.php');
            elseif ($tipoUsuario == 'C')
                header('Location: ../html/Cliente.php');
    
        }    
    }

    elseif ($controlador=="categorias") {

        require("../modelos/categoria.php");
        require("../controladores/controladorcategoria.php");

        $idcategoria = $_POST['idcategoria'];
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ;



        //Se crea un objeto de tipo categoria
        $objeto = new Categoria($idcategoria,$nombre, $descripcion);
        $controladorGenerico = new ControladorCategoria();

    } 
    elseif ($controlador=="cargos") {

        require("../modelos/cargo.php");
        require("../controladores/controladorcargo.php");

        $idcargo = $_POST['idcargo'];
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '' ;
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '' ;
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '' ;


        //Se crea un objeto de tipo cargo
        $objeto = new Cargo($idcargo,$cargo,$salario,$tipo);
        $controladorGenerico = new ControladorCargo();

    }
    elseif ($controlador=="maquinas") {
        
        require("../modelos/maquina.php");
        require("../controladores/controladormaquina.php");

        $idmaquinaelemento  = $_POST['idmaquinaelemento'];
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
        $costo = isset($_POST['costo']) ? $_POST['costo'] : '' ;
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '' ;

        $objeto = new Maquina($idmaquinaelemento,$nombre, $costo, $tipo);
        $controladorGenerico = new ControladorMaquina();
// var_dump($objeto);

    }
    elseif ($controlador=="servicios") {

        require("../modelos/servicio.php");
        require("../controladores/controladorservicio.php");

        
        //var_dump(  $_REQUEST ) .'<BR>';
        

        //Primero, Guardar el servicio
        $idservicio = $_POST['idservicio'];
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
        //$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '' ;
        $porcentajeGanancia = isset($_POST['porcentajeGanancia']) ? $_POST['porcentajeGanancia'] : '0' ;
        $costoTotal = isset($_POST['costoTotal']) ? $_POST['costoTotal'] : '0' ;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '0' ;
        $estado = 'Enviado' ;
        $valoracionPeso = isset($_POST['valoracionPeso']) ? $_POST['valoracionPeso'] : 'Sube' ;
        $valoracionPresion = isset($_POST['valoracionPresion']) ? $_POST['valoracionPresion'] : 'Sube' ;
        $resultado = isset($_POST['resultado']) ? $_POST['resultado'] : '1' ;
        $categorias_idcategoria = isset($_POST['categorias_idcategoria']) ? $_POST['categorias_idcategoria'] : '' ;

        //Se crea un objeto de tipo servicio
        $objeto = new Servicio($idservicio ,$nombre,
        $porcentajeGanancia, $costoTotal, $precio,$estado,  $valoracionPeso,
        $valoracionPresion, $resultado, $categorias_idcategoria);

        $controladorGenerico = new ControladorServicio();

    }
    elseif ($controlador=="personal") {

        require("../modelos/personalempresa.php");
        require("../controladores/controladorpersonal.php");

        $numeroIdentificacion  = $_POST['numeroIdentificacion'];
        $tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '' ;
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '' ;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '' ;
        $direccionDeResidencia = isset($_POST['direccionDeResidencia']) ? $_POST['direccionDeResidencia'] : '' ;
        $numeroCelular = isset($_POST['numeroCelular']) ? $_POST['numeroCelular'] : '' ;
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '' ;
        $usuarios_idusuario = isset($_POST['usuarios_idusuario']) ? $_POST['usuarios_idusuario'] : '' ;
        $nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : '' ;
        $constrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '' ;
        $confirmarcontrasena = isset($_POST['confirmarcontrasena']) ? $_POST['confirmarcontrasena'] : '' ;
        $cargos_idcargo = isset($_POST['cargos_idcargo']) ? $_POST['cargos_idcargo'] : '' ;


        $objeto = new PersonalEmpresa($numeroIdentificacion , $tipoIdentificacion, $nombres,$apellidos,$direccionDeResidencia,$numeroCelular,$correo,$usuarios_idusuario, $cargos_idcargo );
        $controladorGenerico = new ControladorPersonal();

    }
    elseif ($controlador=="revision") {

        require("../modelos/revision.php");
        require("../controladores/controladorrevision.php");

        //var_dump($_POST);

        $motivoCita = isset($_POST['motivoCita']) ? $_POST['motivoCita'] : '' ;
        $peso = isset($_POST['peso']) ? $_POST['peso'] : '' ;
        $derivacion = isset($_POST['derivacion']) ? $_POST['derivacion'] : '' ;
        $presionArterial = isset($_POST['presionArterial']) ? $_POST['presionArterial'] : '' ;
        $personalEmpresa_numeroIdentificacion = isset($_POST['personalEmpresa_numeroIdentificacion']) ? $_POST['personalEmpresa_numeroIdentificacion'] : '' ;
        $citas_idcita = isset($_POST['citas_idcita']) ? $_POST['citas_idcita'] : '' ;

        $objeto = new Revision($motivoCita,$peso,$derivacion,$presionArterial,$personalEmpresa_numeroIdentificacion,$citas_idcita);
        $controladorGenerico = new ControladorRevision();

        // var_dump($objeto);
    }

////////////////////////////////
    elseif ($controlador=="definirServicio") {

        // require("../modelos/servicio.php");
        require("../controladores/controladorservicio.php");

        // $idservicio  = $_POST['idservicio'];
        // $motivoCita = isset($_POST['motivoCita']) ? $_POST['motivoCita'] : '' ;

        // $objeto = new Servicio($idrevision,$motivoCita);
        // $controladorGenerico = new ControladorServicio();

    }

    elseif ($controlador=="nomina") {
        
        require("../modelos/nomina.php");
        require("../controladores/controladornomina.php");

        $personalEmpresa_numeroIdentificacion= $_POST['numeroIdentificacion'];
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '' ;
        $fechaInicial = isset($_POST['fechaInicial']) ? $_POST['fechaInicial'] : '' ;
        $fechaFinal = isset($_POST['fechaFinal']) ? $_POST['fechaFinal'] : '' ;


        $fechaInicial = date_create($fechaInicial);
        $fechaFinal = date_create($fechaFinal);

        //se crea un objeto de tipo cliente
        $objeto = new Nomina( -1,$personalEmpresa_numeroIdentificacion, $salario,$fechaInicial,$fechaFinal);
        // var_dump( $objeto);
        $controladorGenerico = new ControladorNomina();
    }

    elseif ($controlador=="cita") {
        
        require("../modelos/cita.php");
        require("../controladores/controladorcita.php");

        $fechaCita = isset($_POST['fechaCita']) ? $_POST['fechaCita'] : '' ;
        // $horaCita = isset($_POST['horaCita2']) ? $_POST['horaCita2'] : '' ;
        $estado = 'Agendado';
        $clientes_identificador= $_POST['numeroIdentificacion'];

        // echo $horaCita;

        $fechaCita = date_create($fechaCita, timezone_open("America/Bogota") );
        // $horaCita = date_create($fechaCita);

        // echo $horaCita;

        //se crea un objeto de tipo cita
        $objeto = new Cita( -1, $fechaCita,$estado,$clientes_identificador);
        // var_dump( $objeto);
        $controladorGenerico = new ControladorCita();
    }
    
    elseif ($controlador=="cita2") {
        
        require_once("../modelos/cita.php");
        require_once("../controladores/controladorcita.php");

    
        $controladorGenerico = new ControladorCita();
    }
    elseif ($controlador=="clientes") {
        
        require("../modelos/cliente.php");
        require("../controladores/controladorcliente.php");

        $identificador = $_POST['identificador'];
        $tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '' ;
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '' ;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '' ;
        $direccionDeResidencia = isset($_POST['direccionDeResidencia']) ? $_POST['direccionDeResidencia'] : '' ;
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '' ;
        $numeroCelular = isset($_POST['numeroCelular']) ? $_POST['numeroCelular'] : '' ;
        $fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '' ;
        $nombresAcompanante = isset($_POST['nombresAcompanante']) ? $_POST['nombresAcompanante'] : '' ;
        $apellidosAcompanante = isset($_POST['apellidosAcompanante']) ? $_POST['apellidosAcompanante'] : '' ;
        $numeroCelularAcompanante = isset($_POST['numeroCelularAcompanante']) ? $_POST['numeroCelularAcompanante'] : '' ;
        $correoAcompanante = isset($_POST['correoAcompanante']) ? $_POST['correoAcompanante'] : '' ;
        $fechaNacimientoAcompanante = isset($_POST['fechaNacimientoAcompanante']) ? $_POST['fechaNacimientoAcompanante'] : '' ;
        $usuarios_idusuario = $_POST['identificador'];
        $nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : '' ;
        $constrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '' ;
        $confirmarcontrasena = isset($_POST['confirmarcontrasena']) ? $_POST['confirmarcontrasena'] : '' ;
        
        //Se crea un objeto de tipo cliente
        $objeto = new Cliente($identificador,$tipoIdentificacion,$nombres,$apellidos,$direccionDeResidencia,
        $correoElectronico,$numeroCelular,$fechaNacimiento,$nombresAcompanante,$apellidosAcompanante,
        $numeroCelularAcompanante,$correoAcompanante,$fechaNacimientoAcompanante,$usuarios_idusuario);
        $controladorGenerico = new ControladorCliente();


    }


    elseif ($controlador=="diagnostico") {

        require_once("../modelos/diagnostico.php");
        require_once("../controladores/controladordiagnosticar.php");

        require_once("../modelos/serviciodiagnostico.php");
        require_once("../controladores/controladorservicios_has_diagnostico.php");


    }





    $conexion = new ConectarMySQL();

    if ($operacion == "guardar") {
        $controladorGenerico->guardar($objeto);
        $nuevaURL="../html/gestioncategorias.php";
        header("Location: $nuevaURL");

        // echo 'Inserto de forma exitosa!!';
    } elseif ($operacion == "eliminar") {

        $controladorGenerico->eliminar($objeto);
        $nuevaURL="../html/gestioncategorias.php";
        header("Location: $nuevaURL");
        // echo 'Registro Eliminado exitosamente!!';    
    }

    if ($operacion == "guardar2") {
        $controladorGenerico->guardar($objeto);
        $URLcargos="../html/gestiondecargos.php";
        header("Location: $URLcargos");
        // echo 'Inserto de forma exitosa!!';
    } elseif ($operacion == "eliminar2") {

        $controladorGenerico->eliminar($objeto);
        // echo 'Registro Eliminado exitosamente!!';
        $URLcargos="../html/gestiondecargos.php";
        header("Location: $URLcargos");
    }
    if ($operacion == "guardar3") {
        $controladorGenerico->guardar($objeto);
        $URLmquinas="../html/gestiondelasmaquinas.php";
        header("Location: $URLmquinas");
        // echo 'Inserto de forma exitosa!! maquinas';
    } elseif ($operacion == "eliminar3") {

        $controladorGenerico->eliminar($objeto);
        // echo 'Registro Eliminado exitosamente!!';
        $URLmquinas="../html/gestiondelasmaquinas.php";
        header("Location: $URLmquinas");
    }

    if ($operacion == "guardar4") {
        // echo "guardar";
        // var_dump ($objeto);
        $controladorGenerico->guardar($objeto);
        $URLservicios="../html/gestionservicios.php";

        //require("../componentes/conectarmysql.php");


        //Guardar los elementos del servicio
        if( isset( $_POST['elemento'] ) ){
            if (is_array($_POST['elemento'])){
                $num_elementos = count($_POST['elemento']);
                $current = 0;
                foreach ($_POST['elemento'] as $key => $value) {
                    if ($current < $num_elementos){
                        //echo $key . ' -> ' . $value . '<br>';
                        //Guardar el elemento del servicio
                        //
                        $sql = 'INSERT INTO maquinaselementos_has_servicios VALUES( ' . $objeto->idservicio . ', ' . $value . ');';
                        $sentencia = $conexion->getConexion()->prepare($sql);
                        $sentencia->execute();
                    }
                    $current++;
                }
            }
        }

        //Guardar las máquinas del servicio
        if( isset( $_POST['maquina'] ) ){
            if (is_array($_POST['maquina'])){
                $num_elementos = count($_POST['maquina']);
                $current = 0;
                foreach ($_POST['maquina'] as $key => $value) {
                    if ($current < $num_elementos){
                        //echo $key . ' -> ' . $value . '<br>';
                        //Guardar el elemento del servicio
                        //
                        $sql = 'INSERT INTO maquinaselementos_has_servicios VALUES( ' . $objeto->idservicio . ', ' . $value . ');';
                        $sentencia = $conexion->getConexion()->prepare($sql);
                        $sentencia->execute();
                    }
                    $current++;
                }
            }
        }

        header("Location: $URLservicios");
        // echo 'Inserto de forma exitosa!! servicios';
        
} elseif ($operacion == "eliminar4") {

       $controladorGenerico->eliminar($objeto);
       // echo 'Registro Eliminado exitosamente!!';
       $URLservicios="../html/gestionservicios.php";
       header("Location: $URLservicios");
}

if ($operacion == "guardar5") {
    //Guardar primero en la tabla user (usuarios)

    $URLpersonal="../html/gestionusuarios.php";

    if( isset( $_POST['nombreUsuario'] ) && isset($_POST['contrasena']) && isset($_POST['tipo'])  ){
        require("../modelos/estudio.php");
        require("../controladores/controladorestudio.php");

        require("../modelos/experticia.php");
        require("../controladores/controladorexperticia.php");


        $sql = 'INSERT INTO usuarios VALUES( ' .  $objeto->numeroIdentificacion . ', \''  . $_POST['nombreUsuario']  . '\', \'' . $_POST['contrasena'] . '\',  \'' . $_POST['tipo'] . '\');';
        $sentencia = $conexion->getConexion()->prepare($sql);
        $sentencia->execute();

        if( !$sentencia->error ){
            $controladorGenerico->guardar($objeto);

            $numero = $objeto->numeroIdentificacion;
            //var_dump($resp);
            // if( $resp ){
                //Guardar estudio del personal 
                if( isset( $_POST['estudio'] ) ){
                    if (is_array($_POST['estudio'])){
                        $num_elementos = count($_POST['estudio']);
                        $current = 0;
                        foreach ($_POST['estudio'] as $key => $value) {
                            if ($current < $num_elementos){
                                //Crear el objeto
                                $objeto = new Estudio($value , $numero );
                                $controladorGenerico = new ControladorEstudio();
                                $controladorGenerico->guardar($objeto);
                                // $sql = 'INSERT INTO estudios (nombre, personalEmpresa_numeroIdentificacion) VALUES(' . $value . ', ' . $objeto->personalEmpresa_numeroIdentificacion  . ');';
                                // $sentencia = $conexion->getConexion()->prepare($sql);
                                // $sentencia->execute();
                            }
                            $current++;
                        }
                    }
                }

                //Guardar las máquinas del servicio
                if( isset( $_POST['experticia'] ) ){
                    if (is_array($_POST['experticia'])){
                        $num_elementos = count($_POST['experticia']);
                        $current = 0;
                        foreach ($_POST['experticia'] as $key => $value) {
                            if ($current < $num_elementos){

                                $objeto = new Experticia($value , $numero );
                                $controladorGenerico = new ControladorExperticia();
                                $controladorGenerico->guardar($objeto);

                                // $sql = 'INSERT INTO experticias (nombre, personalEmpresa_numeroIdentificacion ) VALUES(' . $value . ', ' . $objeto->numeroIdentificacion . ');';
                                // $sentencia = $conexion->getConexion()->prepare($sql);
                                // $sentencia->execute();
                            }
                            $current++;
                        }
                    }
                }

            ///////////////////////// dias laborales
                if( isset( $_POST['diasLaborales'] ) ){
                    if (is_array($_POST['diasLaborales'])){
                        $num_elementos = count($_POST['diasLaborales']);
                        $current = 0;
                        foreach ($_POST['diasLaborales'] as $key => $value) {
                            if ($current < $num_elementos){

                                $sql = 'INSERT INTO horarios(diasLaborales, horaEntrada,horaSalida,personalEmpresa_numeroIdentificacion) VALUES(\'' . $value . '\',\''. $_POST['horaEntrada'] .'\', \''. $_POST['horaSalida'] .'\',' . $numero . ');';
                                $sentencia = $conexion->getConexion()->prepare($sql);
                                $sentencia->execute();
                            }
                            $current++;
                        }
                    }
                }
            // }
        }
    }

    header("Location: $URLpersonal");
    echo 'Inserto de forma exitosa!! personal';

} elseif ($operacion == "eliminar5") {

    $controladorGenerico->eliminar($objeto);
   // echo 'Registro Eliminado exitosamente!!';
    $URLpersonal="../html/gestionusuarios.php";
    header("Location: $URLpersonal");
}
if ($operacion == "guardar6") {
    $controladorGenerico->guardar($objeto);
    $URLrevision="../html/Profesionalarea.php";
    header("Location: $URLrevision");
    // echo 'Inserto de forma exitosa!! revision';
} elseif ($operacion == "eliminar6") {

    $controladorGenerico->eliminar($objeto);
    // echo 'Registro Eliminado exitosamente!!';
    $URLrevision="../html/Profesionalarea.php";
    header("Location: $URLrevision");
}

////////////////////////////////////////////////
if ($operacion == "guardar7") {
    $idservicio  = $_POST['idservicio'];
    $valor = 'Aprobado';

    $controladorGenerico = new ControladorServicio();
    $controladorGenerico->aprobarRechazar($idservicio, $valor);
    
    $URLrevision="../html/definirservicios.php";
    header("Location: $URLrevision");
}

if ($operacion == "guardar8") {
    //require("../controladores/controladorservicio.php");

    $idservicio  = $_POST['idservicio'];
    $valor = 'Rechazado';

    $controladorGenerico = new ControladorServicio();
    $controladorGenerico->aprobarRechazar($idservicio, $valor);
    
    $URLrevision="../html/definirservicios.php";
    header("Location: $URLrevision");
}

if ($operacion == "guardar9") {
    $controladorGenerico->guardar($objeto);
    $URLnomina="../html/gestionnomina.php";
    header("Location: $URLnomina");
    //echo 'Inserto de forma exitosa!! nomina';
}

if ($operacion == "guardar10") {
    $controladorGenerico->guardar($objeto);
    $URLCita="../html/agendarCita.php";
    header("Location: $URLCita");
    //echo 'Inserto de forma exitosa!! nomina';
}

if ($operacion == "guardar11") {

 //Guardar primero en la tabla user (usuarios)

  $URLcliente="../html/gestionarhistorialclinico.php";

  if( isset( $_POST['nombreUsuario'] ) && isset($_POST['contrasena']) && isset($_POST['tipo']) ){
    
    $sql = 'INSERT INTO usuarios VALUES( ' .  $objeto->identificador . ', \''  . $_POST['nombreUsuario']  . '\', \'' . $_POST['contrasena'] . '\',  \'' . $_POST['tipo'] . '\');';

    //   $sql = 'INSERT INTO usuarios VALUES( ' .  $objeto->identificador  . ', \''  . $_POST['nombreUsuario']  . '\', \'' . $_POST['contrasena'] . '\');';
      $sentencia = $conexion->getConexion()->prepare($sql);
      $sentencia->execute();

      if( !$sentencia->error ){
          $controladorGenerico->guardar($objeto);
        //   echo 'Inserto de forma exitosa!! cliente';
      }
  }

  header("Location: $URLcliente");


}


if ($operacion == "atender") {
    session_start();

    $_SESSION['idcita'] = isset($_POST['idcita']) ? $_POST['idcita'] : '';
    $URLCita="../html/Profesionalarea.php";
    header("Location: $URLCita");
}

if ($operacion == "guardar12") {
   
    if( isset( $_POST['citas_idcita'])){
        $citas_idcita = $_POST['citas_idcita'];

        //Recorrer los diagnosticos
        if( isset( $_POST['diagnostico'] ) ){
            if (is_array($_POST['diagnostico'])){
                $num_elementos = count($_POST['diagnostico']);
                $current = 0;
                foreach ($_POST['diagnostico'] as $key => $value) {
                    if ($current < $num_elementos){

                        //var_dump( $_POST['servicio'][$current] );
                        //Crear el objeto
                        $objeto = new Diagnostico($value , $citas_idcita );
                        $controladorGenerico = new ControladorDiagnosticar();
                        $lastId = $controladorGenerico->guardar($objeto);
                        if( $lastId > 0 ){
                            $numeroSesionesMinimas = isset( $_POST['numSesion'][$current] ) ? $_POST['numSesion'][$current] : 0;
                            $numeroSesionesFaltantes = $numeroSesionesMinimas;
                            $servicios_idservicio = $_POST['servicio'][$current];
                            $diagnosticosCitas_iddiagnostico = $lastId;

                            $objeto = new ServicioDiagnostico($numeroSesionesMinimas , $numeroSesionesFaltantes, $servicios_idservicio,$diagnosticosCitas_iddiagnostico);
                            $controladorGenerico = new ControladorServicioDiagnostico();
                            $controladorGenerico->guardar($objeto);
                            $URLcargos="../html/diagnosticartratamiento.php";
                            header("Location: $URLcargos");

                        }
                        // $sql = 'INSERT INTO estudios (nombre, personalEmpresa_numeroIdentificacion) VALUES(' . $value . ', ' . $objeto->personalEmpresa_numeroIdentificacion  . ');';
                        // $sentencia = $conexion->getConexion()->prepare($sql);
                        // $sentencia->execute();
                    }
                    $current++;
                }
            }
        }
    }

    // $controladorGenerico->guardar($objeto);
    // $URLcargos="../html/diagnosticartratamiento.php";
    // header("Location: $URLcargos");
    // echo 'Inserto de forma exitosa!!';
}




?>