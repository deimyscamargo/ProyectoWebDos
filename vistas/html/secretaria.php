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
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body style="background-image: url(../recursos/imagenes/fondo.jpeg); background-repeat: no-repeat center center fixed; background-size: cover;">

    <div class="container bg-light"  >
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
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown" aria-expanded="false">
                            UsuarioSecretaria
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php">Salir</a></li>
                            </ul>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>



    <!---script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>