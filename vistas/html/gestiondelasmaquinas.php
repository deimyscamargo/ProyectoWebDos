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

<body
    style="background-image: url(../recursos/imagenes/fondo.jpg); background-repeat: no-repeat; background-size: cover;">

    <div class="container bg-light">
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="../html/pgprincipaladmin.php">SoftDJY</a>
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
                                <li><a class="dropdown-item" href="../html/gestionusuarios.php">Gestión de los
                                        usuarios</a>
                                </li>
                                <li><a class="dropdown-item" href="../html/gestioncategorias.php">Gestión de categorias
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="../html/gestiondelasmaquinas.php">Gestión de las
                                        máquinas</a></li>
                                </li>
                                <li><a class="dropdown-item" href="../html/gestionservicios.php">Gestión de los
                                        servicios</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4 flo">
                    <div class="btn-group">
                        <button type="button" class=" btn btn-outline-primary dropdown-toggle mt-2"
                            data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:215px;">
                            usuarioAdministrador
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

    <div class="container" style="width: 700px; margin-top: 100px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center;">Gestión de las máquinas</h5>

            </div>
            <div class="card-body">
                <form action="../controladores/controladorformulario.php" method="post" class="px-4 py-3">

                    <div class="mb-3">
                        <input type="number" class="form-control" name="idmaquinaelemento" placeholder="Código" value=<?php   
                        echo isset($_POST['idmaquinaelemento']) ? $_POST['idmaquinaelemento'] : '';
                        ?>>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value=<?php   
                        echo isset($_POST['nombre']) ? $_POST['nombre'] : '';
                        
                        ?>>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="costo" placeholder="Costo" value=<?php   
                        echo isset($_POST['costo']) ? $_POST['costo'] : '';
                        
                        ?>>
                    </div>
                    <div class="mb-3">
                        <!-- <input type="text" class="form-control"   name="tipo" placeholder="Tipo"> -->
                        <label for="">Tipo</label>
                        <select id="genero" class="form-control" name="tipo">
                            <option>---Seleccionar---</option>
                            <option value="maquina"  <?php echo isset($_POST['tipo']) ? ($_POST['tipo'] == 'maquina' ? 'selected' : '' ) : '' ?> >Máquina</option>
                            <option value="elemento"  <?php echo isset($_POST['tipo']) ? ($_POST['tipo'] == 'elemento' ? 'selected' : '' ) : '' ?> >Elemento</option>
                        </select>




                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="gestiondelasmaquinas.php" class="btn btn-info">Nuevo</a>&emsp;

                        <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion"
                            value="guardar3">Guardar</button> &emsp;&emsp;&emsp;
                    </div>

                    <input type="text" name="controlador" value="maquinas" hidden>

                </form>
                <table class="table table-striped" id="tftable2" class="tftable">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Costo</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>

                    <?php 

                include '../controladores/controladormaquina.php';
                $controladorMaquina = new ControladorMaquina();
                $resultado = $controladorMaquina->listarDatos(); 

                while ($fila = $resultado->fetch_assoc()){

                echo "<tr style='text-align:center'>";
                echo "<td>". $fila['idmaquinaelemento'] ."</td>";
                echo "<td>". $fila['nombre'] ."</td>";
                echo "<td>". $fila['costo'] ."</td>";
                echo "<td>". $fila['tipo'] ."</td>";

                echo "<td>

                <form action='../controladores/controladorformulario.php' method='post'>
                <input type='number' name='idmaquinaelemento' value='". $fila['idmaquinaelemento'] ."' hidden>
                <input type='text' name='controlador' value='maquinas' hidden>
                <div class='d-flex justify-content-center'>
                <input type='submit' name='operacion' value='eliminar3' class='btn btn-danger d-flex justify-content-center'>&emsp;
                </form>

                    <form action='gestiondelasmaquinas.php' method='post'>
                    <input type='number' name='idmaquinaelemento' value='". $fila['idmaquinaelemento'] ."' hidden>
                    <input type='text' name='nombre' value='". $fila['nombre'] ."' hidden>
                    <input type='text' name='costo' value='". $fila['costo'] ."' hidden>
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
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>