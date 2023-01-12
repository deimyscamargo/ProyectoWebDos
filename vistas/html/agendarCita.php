<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
}
?>

<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SoftDJY</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <script type="text/javascript" src="../docs/js/jquery-2.2.4.min.js"></script>

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
                     <!-- <a class="navbar-brand" href="../html/pgprincipaladmin.html">SoftDJY</a> -->
                     <a class="navbar-brand" href="../html/pgprofesionalarea.html">SoftDJY</a>

                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                  </div>
               </nav>
            </div>
            <!-- <div class="col-4">
               <div class="col-4 flo" style="margin-left: 100px;">
                  <div class="btn-group">
                     <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ---Seleccionar---
                     </button>
                     <ul class="dropdown-menu">
                       
                        <li><a class="dropdown-item" href="../html/reportes.html">Reportes</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div> -->
            <div class="col-4 flo">
               <div class="btn-group">
                  <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown"
                     aria-expanded="false" style="margin-left:215px;">
                     usuarioProfesional
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
            <h5 class="card-title" style="text-align: center;">Agendar cita</h5>
         </div>
         <div class="card-body">
            <form action="../controladores/controladorformulario.php" method="post" class="px-4 py-3">
               <div class="mb-3">
                  <div class="input-group">
                     <input type="text" class="form-control datoaBuscar" placeholder="Búscar">
                     <span class="input-group-btn">
                        <button class="btn btn-outline-primary search" id="search" name="search"
                           type="button">Buscar</button>
                     </span>
                  </div>
               </div>
               <div class="mb-3">
                  <input type="number" class="form-control" id="numeroIdentificacion" name="numeroIdentificacion"
                     placeholder="Número de identificación">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
               </div>
               <div class="horas">
                  <p>Fecha cita: <input type="datetime-local" name="fechaCita"></p>
               </div>
               <!-- <div class="horas">
                  <input type="hidden" name="horaCita2" id="horaCita2">
                  <p>Hora cita: <input type="time" class="horaCita" id="horaCita" name="horaCita" onchange="colocarHoraCita()"></p>
               </div> -->


               <div class="d-flex justify-content-center">

                  <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion"
                     value="guardar10">Guardar</button> &emsp;&emsp;&emsp;

               </div>

               <input type="text" name="controlador" value="cita" hidden>

            </form>
         </div>
      </div>
   </div>
   <br><br>
   <table class="table table-success" id="tftable2" class="tftable">
      <tr>
         <th>Número cita</th>
         <th>Número de identificación</th>
         <th>Nombres Completos</th>
         <th>Fecha - Hora</th>
         <th>Estado</th>
         <th>Acciones</th>

      </tr>

      <?php 

            include_once '../controladores/controladorcita.php';
            $controladorCita = new ControladorCita();
            $resultado = $controladorCita->listarDatosCitas(); 

            while ($fila = $resultado->fetch_assoc()){

                echo "<tr style='text-align:center'>";
                echo "<td>". $fila['idcita'] ."</td>";
                echo "<td>". $fila['clientes_identificador'] ."</td>";
                echo "<td>". $fila['NombreCompleto'] ."</td>";
                echo "<td>". $fila['fechaCita'] ."</td>";
                echo "<td>". $fila['estado'] ."</td>";
                echo "<td>
                
                    <form action='../controladores/controladorformulario.php' method='post'>
                        <input type='number' name='idcita' value='". $fila['idcita'] ."' hidden>
                        <input type='text' name='controlador' value='cita2' hidden>

                        <div class='d-flex justify-content-center'>
                        <button type='submit' class='btn btn-success' name='operacion' value='atender'>Atender</button>&emsp;                    
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
   <script src="../js/citas.js"></script>
</body>

</html>