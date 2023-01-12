<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftDJY</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/utilidades.js"></script>
</head>


<body style="background-image: url(../recursos/imagenes/fondo.jpg); background-repeat: no-repeat; background-size: cover;">

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
                                <li><a class="dropdown-item" href="../html/definirservicios.php">Eliminacion o aprobacion de servicios</a></li>
                                <li><a class="dropdown-item" href="../html/reportes.php">Reportes</a>
                            </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4 flo">
                    <div class="btn-group">
                        <button type="button" class=" btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown"
                            aria-expanded="false" style="margin-left:215px;">
                            usuarioGerente
                        </button>
                        <ul class="dropdown-menu">
                            <!-- <li><a class="dropdown-item" href="#">Cliente virtual </a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li> -->
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

    <div class="container" style="width: 700px; margin-top: 100px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center;">Gestión de los cargos</h5>

            </div>
            <div class="card-body">
                <form action="../controladores/controladorformulario.php" method="post" class="px-4 py-3">

                    <div class="mb-3">
                        <input type="number" class="form-control"  name="idcargo" placeholder="Codigo"
                        
                        value= <?php   
                        echo isset($_POST['idcargo']) ? $_POST['idcargo'] : '';
                        
                        ?>
                        >
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control"  name="cargo" placeholder="Cargo"
                        value= <?php   
                        echo isset($_POST['cargo']) ? $_POST['cargo'] : '';
                        ?>
                        >
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="tipo">
                            <option value="">--Seleccione--</option>
                            <option value="S" <?php echo isset($_POST['tipo']) ? ($_POST['tipo'] == 'S' ? 'selected' : '' ) : '' ?>  >Secretaria</option>
                            <option value="G" <?php echo isset($_POST['tipo']) ? ($_POST['tipo'] == 'G' ? 'selected' : '' ) : '' ?>  >Gerente</option>
                            <option value="P" <?php echo isset($_POST['tipo']) ? ($_POST['tipo'] == 'P' ? 'selected' : '' ) : '' ?>  >Profesional del area</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="salario" placeholder="Salario"
                        value= <?php   
                        echo isset($_POST['salario']) ? $_POST['salario'] : '';
                        
                        ?>
                        >
                    </div>
                   
                    <div class="d-flex justify-content-center">
                        <a href="gestiondecargos.php" class="btn btn-info">Nuevo</a>&emsp;

                        <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion" value="guardar2">Guardar</button> &emsp;&emsp;&emsp;
                    </div>

                    <input type="text" name="controlador" 
                    value="cargos" hidden>

                </form>
                <table class="table table-striped" id="tftable2" class="tftable">
                    <tr>
                        <th scope="col" style="text-align:center">Código</th>
                        <th scope="col" style="text-align:center">Nombre</th>
                        <th scope="col" style="text-align:center">Salario</th>
                        <th scope="col" style="text-align:center">Tipo</th>
                        <th scope="col" style="text-align:center">Acciones</th>
                    </tr>

                    <?php 

                include '../controladores/controladorcargo.php';
                $controladorCargo = new ControladorCargo();
                $resultado = $controladorCargo->listarDatos(); 

                while ($fila = $resultado->fetch_assoc()){

                echo "<tr style='text-align:center'>";
                echo "<td>". $fila['idcargo'] ."</td>";
                echo "<td>". $fila['cargo'] ."</td>";
                echo "<td>". $fila['salario'] ."</td>";
                echo "<td>". $fila['tipo'] ."</td>";



                echo "<td>

                <form action='../controladores/controladorformulario.php' method='post'>
                <input type='number' name='idcargo' value='". $fila['idcargo'] ."' hidden>
                <input type='text' name='controlador' value='cargos' hidden>
                <div class='d-flex justify-content-center'>
                <input type='submit' name='operacion' value='eliminar2' class='btn btn-danger d-flex justify-content-center'>&emsp;
                </form>


                <form action='gestiondecargos.php' method='post'>
                    <input type='number' name='idcargo' value='". $fila['idcargo'] ."' hidden>
                    <input type='text' name='cargo' value='". $fila['cargo'] ."' hidden>
                    <input type='text' name='salario' value='". $fila['salario'] ."' hidden>
                    <input type='text' name='tipo' value='". $fila['tipo'] ."' hidden>

                
                    <input type='submit'  value='editar' class='btn btn-info '>

                    
                    </div>
                </form>

                </td>";

                echo "</tr>";

                }

                ?>
                </table>

            </div>
        </div>
    </div>
    <br><br>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>