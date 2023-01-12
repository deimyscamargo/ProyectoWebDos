<!DOCTYPE html>
<html lang="es">
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftDJY</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/utilidades.js"></script>
</head>

<body
    style="background-image: url(../recursos/imagenes/fondo.jpg); background-repeat: no-repeat; background-size: cover; position: relative;">

    <div class="container bg-light">
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="../html/pgGerente.php">SoftDJY</a>
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
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ---Seleccionar---
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../html/gestiondecargos.php">Gestión de cargos</a>
                                </li>
                                <li><a class="dropdown-item" href="../html/gestionnomina.php">Gestión de la nómina </a>
                                </li>
                                <li><a class="dropdown-item" href="../html/definirservicios.php">Eliminacion o
                                        aprobacion de servicios</a></li>
                                <li><a class="dropdown-item" href="../html/reportes.php">Reportes</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4 flo">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                            data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:215px;">
                            usuarioGerente
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cliente virtual </a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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

    <br><br>
    <h4 style="text-align:center">Eliminacion o aprobacion de servicios</h4>
    <br>
    <table class="table table-success" id="tftable2" class="tftable">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Categorias</th>
            <th>Elementos</th>
            <th>Costo Elementos</th>
            <th>Máquinas</th>
            <th>Costo Máquinas</th>
            <th>Costo total</th>
            <th>Porcentaje</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php 

            include '../controladores/controladorservicio.php';
            $controladorCategoria = new ControladorServicio();
            $resultado = $controladorCategoria->listarDatosGerente(); 

            while ($fila = $resultado->fetch_assoc()){

                echo "<tr style='text-align:center'>";
                echo "<td>". $fila['idservicio'] ."</td>";
                echo "<td>". $fila['NOM_SERVICIO'] ."</td>";
                echo "<td>". $fila['CAT_SERVICIO'] ."</td>";
                echo "<td>". $fila['elementos_servicio'] ."</td>";
                echo "<td>". $fila['COSTO_ELEMENTOS'] ."</td>";
                echo "<td>". $fila['maquinas_servicio'] ."</td>";
                echo "<td>". $fila['COSTO_MAQUINAS'] ."</td>";
                echo "<td>". $fila['costoTotal'] ."</td>";
                echo "<td>". $fila['porcentajeGanancia'] ."</td>";
                echo "<td>". $fila['precio'] ."</td>";
                echo "<td>". $fila['estado'] ."</td>";
            
                echo "<td>
                
                    <form action='../controladores/controladorformulario.php' method='post'>
                        <input type='number' name='idservicio' value='". $fila['idservicio'] ."' hidden>
                        <input type='text' name='controlador' value='definirServicio' hidden>

                        <div class='d-flex justify-content-center'>
                        <button type='submit' class='btn btn-success' name='operacion' value='guardar7'>Aprobar</button>&emsp;                    
                    </form>

                    <form action='../controladores/controladorformulario.php' method='post'>
                        <input type='number' name='idservicio' value='". $fila['idservicio'] ."' hidden>
                        <input type='text' name='controlador' value='definirServicio' hidden>
                        <button type='submit' class='btn btn-danger' name='operacion' value='guardar8'>Rechazar</button>
                        </div>
                    </form>

                
                </td>";

                echo "</tr>";

            }

        ?>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>