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
        <link rel="stylesheet" href="../css/validacion.css">

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
                    <h5 class="card-title" style="text-align: center;">Abrir el historial clínico</h5>

                </div> <br>
                <form action="../controladores/controladorformulario.php" method="post" class="row  " id="formulaio">
                    <div class="form-group col-6">

                        <input class="form-control" type="number" placeholder="Numero de identificacion"
                            aria-label="default input example"
                            style="width: 310px; margin-top: 15px; margin-left: 110px;" required name="identificador"
                            value=<?php   
                            echo isset($_POST['identificador']) ? $_POST['identificador'] : '';?>>

                        <select name="tipoIdentificacion" class="form-select"
                            style="width: 310px; margin-top: 15px;margin-left: 110px;"
                            aria-label="default input example" required value=<?php   
                            echo isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '';
                            
                            ?>>
                            <option>--Seleccione--</option>
                            <option value="TI">TI</option>
                            <option value="CC">CC</option>
                            <option value="RC">RC</option>
                            <option value="CE">CE</option>
                        </select>

                        <input class="form-control" type="text" placeholder="Nombres" aria-label="default input example"
                            style="width: 310px; margin-top: 15px;margin-left: 110px;" required name="nombres" value=<?php   
                            echo isset($_POST['nombres']) ? $_POST['nombres'] : '';?>>

                        <input class="form-control" type="text" placeholder="Apellidos"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="apellidos" value=<?php   
                            echo isset($_POST['apellidos']) ? $_POST['apellidos'] : '';?>>

                        <input class="form-control" type="text" placeholder="Dirección de residencia"
                            aria-label="default input example"
                            style="width: 310px;margin-top: 15px; margin-left: 110px;" required
                            name="direccionDeResidencia" value=<?php   
                            echo isset($_POST['direccionDeResidencia']) ? $_POST['direccionDeResidencia'] : '';?>>
                        <input class="form-control" type="email" placeholder="Correo electronico"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="correoElectronico" value=<?php   
                            echo isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';?>>

                        <input class="form-control" type="number" placeholder="Numero de celular"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="numeroCelular" value=<?php   
                            echo isset($_POST['numeroCelular']) ? $_POST['numeroCelular'] : '';?>>

                        <label for="" style="margin-left: 170px;"> Fecha de nacimiento </label>
                        <input class="form-control" type="date" placeholder="Fecha de nacimiento"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="fechaNacimiento" value=<?php   
                            echo isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';?>>

                        <!--- se guarda en idusuario-->
                        <div class="mb-3">
                            <div class="row">
                                <div class="mb-3">
                                    <input type="hidden" name="usuarios_idusuario" class="form-control">
                                    <label for="" aria-label="default input example"
                                        style="width: 310px;margin-top: 15px;margin-left: 110px;">Usuario</label>
                                    <input type="text" name="nombreUsuario" class="form-control"
                                        aria-label="default input example" style="width: 310px;margin-left: 110px;">
                                    <input type="hidden" name="tipo" id="tipo" value="C">

                                </div>

                                <div class="mb-3">
                                    <label for="" aria-label="default input example"
                                        style="width: 310px;margin-left: 110px;">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasena" placeholder="***"
                                        aria-label="default input example" style="width: 310px;margin-left: 110px;">
                                </div>
                                <div class="mb-3">
                                    <label for="" aria-label="default input example"
                                        style="width: 310px;margin-left: 110px;">Confirmar contraseña</label>
                                    <input type="password" class="form-control" name="confirmarcontrasena"
                                        placeholder="***" aria-label="default input example"
                                        style="width: 310px;margin-left: 110px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="" style="margin-left: 170px;"> <strong>Datos del acompañante</strong> </label>
                        <input class="form-control" type="text" placeholder="Nombres" aria-label="default input example"
                            style="width: 310px; margin-top: 15px;margin-left: 110px;" required
                            name="nombresAcompanante" value=<?php   
                            echo isset($_POST['nombresAcompanante']) ? $_POST['nombresAcompanante'] : '';?>>

                        <input class="form-control" type="text" placeholder="Apellidos"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="apellidosAcompanante" value=<?php   
                            echo isset($_POST['apellidosAcompanante']) ? $_POST['apellidosAcompanante'] : '';?>>

                        <input class="form-control" type="number" placeholder="Numero de celular"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="numeroCelularAcompanante"
                            value=<?php   
                            echo isset($_POST['numeroCelularAcompanante']) ? $_POST['numeroCelularAcompanante'] : '';?>>

                        <input class="form-control" type="email" placeholder="Correo electronico"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="correoAcompanante" value=<?php   
                            echo isset($_POST['correoAcompanante']) ? $_POST['correoAcompanante'] : '';?>>

                        <label for="" style="margin-left: 170px;"> Fecha de nacimiento </label>
                        <input class="form-control" type="date" placeholder="Fecha de nacimiento"
                            aria-label="default input example" style="width: 310px;margin-top: 15px;margin-left: 110px;"
                            required name="fechaNacimientoAcompanante"
                            value=<?php   
                            echo isset($_POST['fechaNacimientoAcompanante']) ? $_POST['fechaNacimientoAcompanante'] : '';?>>

                        <br><br>
                        <div class="col-4 flo">
                            <div class="btn-group mt-2" role="group" aria-label="Basic outlined example"
                                style="margin-left: 163px;">
                                <button type="submit" name="operacion" value="guardar11" class="btn btn-outline-primary"
                                    style="width: 200px; ">Guardar</button>
                            </div>
                        </div> <br>

                        <div class='col-4 flo'>
                            <div class='btn-group mt-2' role='group' aria-label='Basic outlined example'
                                style='margin-left: 163px;'>
                                <!-- <input type='submit' value='Editar' class='btn btn-outline-primary'
                                    style='width: 200px;'> -->
                            </div>
                        </div>

                    </div>

                    <input type="text" name="controlador" value="clientes" hidden>

                </form>
                <br>

            </div>
        </div>

        <!---script de bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>