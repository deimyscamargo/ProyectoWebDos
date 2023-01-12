<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftDJY</title>
    <!---link de bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body
    style="background-image: url(../recursos/imagenes/fondo.jpeg); background-repeat: no-repeat center center fixed; background-size: cover;">

    <div class="container bg-light">
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                        <a class="navbar-brand" href="../html/secretaria.php">SoftDJP</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </nav>
                </div>
                <div class="col-4">
                    <div class="col-4 flo" style="margin-left: 100px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown" aria-expanded="false">
                            ---Seleccionar---
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="../html/gestionarhistorialclinico.php">Gestionar el historial clínico</a></li>  
                              <li><a class="dropdown-item" href="../html/recordatoriocitas.php">Recordatorio de las citas</a></li>
                              <li><a class="dropdown-item" href="../html/factura.php">Factura</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-4 flo" style="margin-left: 170px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                usuarioSecretaria
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php">Salir</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="width: 99999px; margin-top: 60px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center;">Recordatorio de las citas</h5>

            </div> <br>

            <!-- <form action="">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <h5>Buscar por fecha</h5>
                            <input class="form-control" type="date" aria-label="default input example"
                                style="width: 310px;margin-top: 15px;margin-left: 140px;">
                        </div>
                        <div class="col">
                            <h5>Buscar por hora</h5>
                            <input class="form-control" type="time" aria-label="default input example"
                                style="width: 310px;margin-top: 15px;margin-left: 110px;">
                        </div>
                    </div>
                </div>
            </form> -->
            <br><br>

            <!-- <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar"
                        style="width:330px;">
                    <button class="btn btn-outline-success" type="submit" name="operacion"
                        value="consultar">Buscar</button>
                </form>
            </div>  -->
            <br>
            <div>
                <table class="table table-striped" id="tftable2" class="tftable">
                    <tr>
                        <th scope="col" style="text-align:center">Identificación</th>
                        <th scope="col" style="text-align:center">Nombres</th>
                        <th scope="col" style="text-align:center">Número de celular</th>
                        <th scope="col" style="text-align:center">Correo electronico</th>
                        <th scope="col" style="text-align:center">Fecha - Hora cita</th>
                        <th scope="col" style="text-align:center">Estado</th>
                        <th scope="col" style="text-align:center">Acciones</th>
                    </tr>

                    <?php 
                    

                include '../controladores/controladorcliente.php';
                $controladorCliente = new ControladorCliente();
                $resultado = $controladorCliente->listarDatos(); 

                while ($fila = $resultado->fetch_assoc()){

                echo "<tr style='text-align:center'>";
                echo "<td>". $fila['clientes_identificador'] ."</td>";
                echo "<td>". $fila['NombreCompleto'] ."</td>";
                echo "<td>". $fila['numeroCelular'] ."</td>";
                echo "<td>". $fila['correoElectronico'] ."</td>";
                echo "<td>". $fila['fechaCita'] ."</td>";
                echo "<td>". $fila['estado'] ."</td>";

    
                echo "<td>
                
                <form action='../mensajes/testAltiriaSms.php' method='post'>
                    <div class='d-flex justify-content-center'>
                    <input type='submit' name='operacion' value='notificar' class='btn btn-danger d-flex justify-content-center'>&emsp;
                </form >

                <form  method='post'>
            
                    <input type='checkbox'   class='btn btn-info '>
                    
                    </div>
                </form >
                
                
                </td>";

                echo "</tr>";

                }

                ?>

                </table>
            </div> <br><br>

        </div> <br> <br><br>
    </div><br>

    <style type="text/css">
        .tftable {
            font-size: 12px;
            color: #333333;
            width: 100%;
            border-width: 1px;
            border-color: #729ea5;
            border-collapse: collapse;
        }

        .tftable th {
            font-size: 12px;
            background-color: #acc8cc;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #729ea5;
            text-align: left;
        }

        .tftable tr {
            background-color: #d4e3e5;
        }

        .tftable td {
            font-size: 12px;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #729ea5;
        }

        .tftable tr:hover {
            background-color: #ffffff;
        }
    </style>

    <!---script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>