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
                            usuarioSecretaria
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
    <div class="container" style="width: 99999999999999999px; margin-top: 60px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center;">Facturacion</h5>

            </div> <br>
            <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" >
                          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" style="width:330px;" >
                          <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div> <br>
                    <div  class="table">
                        <table>
                            <tr>
                             <th style="text-align:center"> identificación</th>
                             <th style="text-align:center">Nombres</th>
                             <th style="text-align:center">Apellidos</th>
                             <th style="text-align:center">Correo electronico</th>
                             <th style="text-align:center">Categoria</th>
                             <th style="text-align:center">tipo servicio </th>
                             <th style="text-align:center">Precio servicio</th>
                             <th style="text-align:center">Numero sesiones</th>
                             <th style="text-align:center">Sesiones faltantes</th>

                            </tr>
                            
                            <tr>
                                <td style="text-align:center">1103738656</td>
                                <td style="text-align:center">Maria pilar</td>
                                <td style="text-align:center">Moreno perez</td>
                                <td style="text-align:center">Mariamoreno@gmail.com</td>
                                <td style="text-align:center">Fisioterapeuticos</td>
                                <td style="text-align:center"> Fisioterapia neurologica</td>
                                <td style="text-align:center">xxxxxx</td>
                                <td style="text-align:center">xxx</td>
                                <td style="text-align:center">xxx</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">1103738656</td>
                                <td style="text-align:center">Maria pilar</td>
                                <td style="text-align:center">Moreno perez</td>
                                <td style="text-align:center">Mariamoreno@gmail.com</td>
                                <td style="text-align:center">Fisioterapeuticos</td>
                                <td style="text-align:center"> Fisioterapia neurologica</td>
                                <td style="text-align:center">xxxxxx</td>
                                <td style="text-align:center">xxx</td>
                                <td style="text-align:center">xxx</td>
                            </tr>
                           

                          </table> 

                          <div class="col-4 flo">
                            <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                <a href="" type="button" class="btn btn-outline-primary" style="width: 100px;">Calcular</a>
                              
                            </div>
                        </div> <br>

                          <table>

                            <tr>
                                <td style="text-align: center;"> total  </td>
                                <td style="width: 100px; text-align: center;"></td>
                            </tr>
                          </table>
                        </div> 
                 
                            <br>
                            <div class="col-4 flo">
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example" style="margin-left: 163px;">
                                    <a href="login.html" type="button" class="btn btn-outline-primary" style="width: 200px;">Factura a pagar</a>
                                  
                                </div>
                            </div> <br>

                        
                  </div>
                </div> 
            </div> 


        </div> 
    </div> <br>



    <!---script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>

    


</body>
</html>