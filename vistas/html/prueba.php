<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   
</head>

<body>
   
<h1>hola mundo</h1>
<input type="text"><input type="text"><input type="text"><input type="text"><input type="text">







<?php 

  echo "hola deimys";
?>



<?php




require("../modelos/maquina.php");
require("../controladores/controladormaquina.php");

$idmaquinaelemento = $_POST['idmaquinaelemento'];
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '' ;
$costo = isset($_POST['costo']) ? $_POST['costo'] : '' ;


$objeto = new Maquina($idmaquinaelemento,$nombre, $costo);
$controladorGenerico = new ControladorMaquina();



?>




























     <!---script de bootstrap-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
     integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
     crossorigin="anonymous"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>

</html>



<?php

include '../controladores/controladorcargo.php';
$controladorCargo = new ControladorCargo();
$resultado = $controladorCargo->listar(); 

while ($fila = $resultado->fetch_assoc()){

echo "<option value=".$fila['idcargo'].">".$fila['cargo']."</option>";

}

?>



























<?php
    $controlador = $_POST['controlador'];
    $operacion = $_POST['operacion'];

    if ($controlador=='clientes") {

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
