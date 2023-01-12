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
    <div class="container mt-3 mb-3">
        <h3 style="text-align: center;">Clientes</h3><br>
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-4 col-xl-4">
                <form action="../controladores/controladorformulario.php" method="post" class="border border-5 p-2 p-3 mb-2 bg-secondary text-white" style="background-color: #9ea7ad; border-radius: 30px;">
                    <div class="mb-3">
                        <label class="form-label">Codigo</label>
                        <input type="number" class="form-control" placeholder="Ingrese el codigo" name="codigo"
                         value= <?php   
                        echo isset($_POST['codigo']) ? $_POST['codigo'] : '';
                        ?>>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese Sus nombres" name="nombres"
                        
                        value= <?php   
                        echo isset($_POST['nombres']) ? $_POST['nombres'] : '';
                        ?>
                        
                        >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos" name="apellidos"
                        
                        value= <?php   
                        echo isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
                        ?>
                        >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input type="text" class="form-control" placeholder="Ingrese la direccion" name="direccion"
                        
                        value= <?php   
                        echo isset($_POST['direccion']) ? $_POST['direccion'] : '';
                        ?>
                        
                        >
                    </div>
                   
                    <div class="d-flex justify-content-center">
                        <!-- <button type="submit" class="btn btn-outline-light" style="text-align: center;" name="operacion" value="eliminar">eliminar</button> &emsp;&emsp;&emsp;

                        <button type="reset" class="btn btn-outline-warning" style="text-align: center;">Limpiar</button> -->
                        <a href="vistacliente.php" class="btn btn-info">Nuevo</a>&emsp;

                        <button type="submit" class="btn btn-outline-light" style="text-align: center;" name="operacion" value="guardar">Guardar</button> &emsp;&emsp;&emsp;

                    </div>

                    <input type="text" name="controlador" 
                    value="clientes" hidden>

                </form>

                <br><br>

                <table class="table">

<tr>
    <th scope="col">Codigo</th>
    <th scope="col">Nombres</th>
    <th scope="col">Apellidos</th>
    <th scope="col">Direccion</th>
    <th scope="col" style="text-align:center">Acciones</th>
</tr>

<?php 

    include '../controladores/controladorcliente.php';
    $controladorCliente = new ControladorCliente();
    $resultado = $controladorCliente->listarDatos(); 

    while ($fila = $resultado->fetch_assoc()){

      echo "<tr>";
      echo "<td>". $fila['codigo'] ."</td>";
      echo "<td>". $fila['nombres'] ."</td>";
      echo "<td>". $fila['apellidos'] ."</td>";
      echo "<td>". $fila['direccion'] ."</td>";
      echo "<td>
      
        <form action='../controladores/controladorformulario.php' method='post'>
        <input type='number' name='codigo' value='". $fila['codigo'] ."' hidden>
        <input type='text' name='controlador' value='clientes' hidden>
        <div class='d-flex justify-content-center'>
        <input type='submit' name='operacion' value='eliminar' class='btn btn-danger d-flex justify-content-center'>&emsp;
        
  
        </form>


        <form action='vistacliente.php' method='post'>
        <input type='number' name='codigo' value='". $fila['codigo'] ."' hidden>
        <input type='text' name='nombres' value='". $fila['nombres'] ."' hidden>
        <input type='text' name='apellidos' value='". $fila['apellidos'] ."' hidden>

        
        <input type='text' name='direccion' value='". $fila['direccion'] ."' hidden>


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

     <!---script de bootstrap-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
     integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
     crossorigin="anonymous"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>

</html>