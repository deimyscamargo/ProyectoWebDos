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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
</head>


<body style="background-image: url(../recursos/imagenes/fondo.jpg); background-repeat: no-repeat; background-size: cover; position: relative;">

    <div class="container bg-light" >
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <!-- <a class="navbar-brand" href="../html/pgprincipaladmin.html">SoftDJY</a>
                             -->
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
                                <li><a class="dropdown-item" href="../html/definirservicios.php">Eliminacion o aprobacion de servicios</a></li>
                                <li><a class="dropdown-item" href="../html/reportes.php">Reportes</a>
                            </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4 flo">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown"
                            aria-expanded="false" style="margin-left:215px;">
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
<div class="card container">
<br>
<h3 style="text-align: center;">Reportes</h3>

    <div class="mb-3">

        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <br><br>
                        <div class="btn-group" style="margin-left: 110px;">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ---Seleccionar---
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item">Semanal</a>
                                </li>
                                <li><a class="dropdown-item">Quincenal </a>
                                </li>
                                <li><a class="dropdown-item">Mensual</a></li>
                            </li>
                              
                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-6" style="margin-top: 50px;">
                        <input type="date">
                    </div>
                </div>
                <br>
                <h5 style="text-align:center;">Importe de ganacia por tipo de servicio</h5><br>
                <div style="width: 500px; ">
                    <canvas id="grafica"></canvas>
                </div>
                
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <br><br>
                        <div class="btn-group" style="margin-left: 110px;">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ---Seleccionar---
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item">Semanal</a>
                                </li>
                                <li><a class="dropdown-item">Quincenal </a>
                                </li>
                                <li><a class="dropdown-item">Mensual</a></li>
                            </li>
                              
                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-6" style="margin-top: 50px;">
                        <input type="date">
                    </div>
                </div>
                <br>
                <h5 style="text-align:center;">Importe de ganacia por Mes, Quincena o Semana</h5><br>
                <div style="width: 500px; ">
                    <canvas id="grafica2"></canvas>
                </div>
                
            </div>
<br><br><br><br><br><br>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <br><br>
                        <div class="btn-group" style="margin-left: 110px;">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ---Seleccionar---
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item">Factor 1</a>
                                </li>
                                <li><a class="dropdown-item">Factor 2 </a>
                                </li>
                                <li><a class="dropdown-item">Factor 3</a></li>
                            </li>
                              
                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-6" style="margin-top: 50px;">
                        <input type="date">
                    </div>
                </div>
                <br>
                <h5 style="text-align:center;">Evolución de clientes(Positiva o Negativa)</h5><br>
                <div style="width: 500px; ">
                    <canvas id="grafica3"></canvas>
                </div>
                
            </div>
        </div>
    </div>


















</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ejemplo.js"></script>

</body>

</html>



