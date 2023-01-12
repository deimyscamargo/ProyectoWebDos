<?php
    $controlador = $_POST['controlador'];
    $operacion = $_POST['operacion'];

    if ($controlador=="clientes") {

        require("../modelos/cliente.php");
        require("../controladores/controladorcliente.php");

        $codigo = $_POST['codigo'];
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '' ;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';

        //Se crea un objeto de tipo cliente
        $objeto = new Cliente($codigo,$nombres, $apellidos, 
        $direccion);
        $controladorGenerico = new controladorcliente();

    } elseif  ($controlador=="paciente"){

    require("../modelos/paciente.php");
    require("../controladores/controladorpaciente.php");
    }
    elseif($controlador=="login"){
        require("../modelos/login.php");
        require("../controladores/controladorlogin.php");

        $identificador = $_POST['identificador'];
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '' ;
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
        $fechacreacion = isset($_POST['fechacreacion']) ? $_POST['fechacreacion'] : '';

        //Se crea un objeto de tipo cliente
        $objeto = new Login($identificador,$contrasena, $tipo, $fechacreacion);
        $controladorGenerico = new ControladorLogin();
    }

    if ($operacion == "guardar") {
    
        $controladorGenerico->guardar($objeto);
        $nuevaURL="../vistas/vistacliente.php";

        header("Location: $nuevaURL");

        

        //echo 'Inserto de forma exitosa!!';
    } elseif ($operacion == "eliminar") {

        $controladorGenerico->eliminar($objeto);
        // echo 'Registro Eliminado exitosamente!!';
        $nuevaURL="../vistas/vistacliente.php";

        header("Location: $nuevaURL");
    }

    




?>


// let option1 = document.createElement("option");
    // option1.setAttribute("value", "value1");
    // let option1Texto = document.createTextNode("---Seleccionar---");
    // option1.appendChild(option1Texto);
 
    // let option2 = document.createElement("option");
    // option2.setAttribute("value", "value2");
    // let option2Texto = document.createTextNode("Aceites");
    // option2.appendChild(option2Texto);
 
    // let option3 = document.createElement("option");
    // option3.setAttribute("value", "value3");
    // let option3Texto = document.createTextNode("Estetoscopio");
    // option3.appendChild(option3Texto);
 
    // select.appendChild(option1);
    // select.appendChild(option2);
    // select.appendChild(option3);
 
    function addInput2(){
    let select = document.createElement("select");
    select.setAttribute("name", "maquina[]");
 
    // let option1 = document.createElement("option");
    // option1.setAttribute("value", "value1");
    // let option1Texto = document.createTextNode("---Seleccionar---");
    // option1.appendChild(option1Texto);
 
    // let option2 = document.createElement("option");
    // option2.setAttribute("value", "value2");
    // let option2Texto = document.createTextNode("Ondas de choque");
    // option2.appendChild(option2Texto);
 
    // let option3 = document.createElement("option");
    // option3.setAttribute("value", "value3");
    // let option3Texto = document.createTextNode("Ultrasonidos");
    // option3.appendChild(option3Texto);
 
    // select.appendChild(option1);
    // select.appendChild(option2);
    // select.appendChild(option3);
 

    const costo = document.createElement("input");
    costo.disabled = true;
    costo.type="number";
    costo.placeholder="$";
    costo.setAttribute("name", "costoMaquina[]");

    const btn=document.createElement("a");
    btn.className="delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput2);

    const flex=document.createElement("div");
    flex.className = "flex";

    input2.appendChild(flex);
    flex.appendChild(select);
    flex.appendChild(costo);
    flex.appendChild(btn);
}
