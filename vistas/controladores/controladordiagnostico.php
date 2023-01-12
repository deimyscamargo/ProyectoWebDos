<?php

    include 'controladorservicio.php';

    if (isset($_POST["accion"]) && isset($_POST["tipo"]) ) {
        if ($_POST["accion"] == "datosTodos") {

            $cserv = new ControladorServicio();
            
            $data = array();

            if ($res = $cserv->listarDatosTipo( $_POST["tipo"] ) ) {

                while ($fila = mysqli_fetch_array($res)) {
                    $numCampos = mysqli_num_fields($res);
    
                    for ($i = 0; $i < ($numCampos); $i++) {
                        $nombreCampo = (string)mysqli_fetch_field_direct($res, $i)->name;
                        $row_array[$nombreCampo] = trim( $fila[$nombreCampo] );
                    }
    
                    array_push($data,  $row_array);
                }
            }
    
            echo '' . json_encode($data) . '';
        }
    }
?>