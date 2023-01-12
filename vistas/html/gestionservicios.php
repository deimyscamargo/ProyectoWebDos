<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SoftDJY</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <!-- <script src="../js/utilidades.js"></script> -->
   <!-- <script src="../js/ejemplo.js"></script> -->
   <link rel="stylesheet" href="../docs/css/bootstrap-4.5.2.min.css" type="text/css">
   <link rel="stylesheet" href="../docs/css/bootstrap-example.min.css" type="text/css">
   <link rel="stylesheet" href="../docs/css/prettify.min.css" type="text/css">
   <link rel="stylesheet" href="../docs/css/fontawesome-5.15.1-web/all.css" type="text/css">
   <script type="text/javascript" src="../docs/js/jquery-2.2.4.min.js"></script>
   <script type="text/javascript" src="../docs/js/bootstrap.bundle-4.5.2.min.js"></script>
   <script type="text/javascript" src="../docs/js/prettify.min.js"></script>
   <link rel="stylesheet" href="../dist/css/bootstrap-multiselect.css" type="text/css">
   <script type="text/javascript" src="../dist/js/bootstrap-multiselect.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         window.prettyPrint() && prettyPrint();
      });
   </script>
</head>

<body style="background-image: url(../recursos/imagenes/esperanza.jpg);">
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
                  <button type="button" class=" btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown"
                     aria-expanded="false" style="margin-left:160px;">
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
            <h5 class="card-title" style="text-align: center;">Gestión de los servicios</h5>
         </div>
         <div class="card-body">
            <form action="../controladores/controladorformulario.php" method="post" class="px-4 py-3">
               <div class="mb-3">
                  <label for="">Código:</label>
                  <input type="number" class="form-control" name="idservicio"
                  value=<?php   
                        echo isset($_POST['idservicio']) ? $_POST['idservicio'] : '';
                        ?>
                  >
               </div>

               <div class="mb-3">
                  <label for="">Nombre:</label>
                  <input type="text" class="form-control" name="nombre"
                  value=<?php   
                        echo isset($_POST['nombre']) ? $_POST['nombre'] : '';
                        ?>
                  >
               </div>

               <div class="mb-3">
                  <label for="">Categorías:</label>
                  <select class="form-control" name="categorias_idcategoria" id="categorias_idcategoria"
                     onchange="colocarDescripcion()">
                     <?php
                           include '../controladores/controladorcategoria.php';
                           $controladorCategoria = new ControladorCategoria();
                           $resultado = $controladorCategoria->listar();
                           echo '<option value="-1">--Seleccione--</option>';
                           while ($fila = $resultado->fetch_assoc() ) {
                                 echo '<option value="' .$fila['idcategoria']. '" data-desc="' . $fila['descripcion'] . '">' . $fila['nombre']. '</option>';
                           }
                        ?>
                  </select>
               </div>

               <div class="mb-3">
                  <label for="">Descripción</label><br>
                  <textarea name="descripcion" cols="76" rows="3" id="descripcion" disabled>
                  </textarea>
               </div>

               <br>
               <div class="container">
                  <div class="wrap">
                     <h5>Agregar Elementos</h5>
                     <a href="#" class="add"> &plus;</a>
                  </div>
                  <div class="inp-group">
                  </div>
               </div>
               <br><br>
               <div class="container">
                  <div class="wrap">
                     <h5>Agregar Máquinas</h5>
                     <a href="#" class="add2"> &plus;</a>
                  </div>
                  <div class="inp-group2">
                  </div>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <div class="col-sm-3">
                     </div>
                     <div class="col-sm-6" style="margin-left: 185px; width: 50%;">
                        <label for="">Costo total</label>
                        <input type="number" placeholder="$" name="costoTotal" id="costoTotal" class="form-control"
                           readonly
                           value=<?php   
                        echo isset($_POST['costoTotal']) ? $_POST['costoTotal'] : '';
                        ?>
                           
                           >
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <div class="col-sm-6">
                     </div>
                     <div class="col-sm-6" style="margin-left: 185px; width: 50%;">
                        <label for="">Porcentaje de ganancia</label>
                        <input type="number" placeholder="%" name="porcentajeGanancia" id="porcentajeGanancia"
                           class="form-control" onchange="sumarCostos()">
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <div class="col-sm-6" style="margin-left: 185px; width: 50%;">
                        <label for="">Precio</label>
                        <input type="number" placeholder="$" name="precio" id="precio" class="form-control" readonly>
                     </div>
                  </div>
               </div>

               <br><br>
               <div class="container">
                  <div class="wrap">
                     <h5>Factores</h5><br>

                     <label for="">Presion</label>
                     <select name="valoracionPresion" id="">
                        <option value="Sube">Sube</option>
                        <option value="Baja">Baja</option>

                     </select>
                     <label for="">Peso</label>
                     <select name="valoracionPeso" id="">
                        <option value="Sube">Sube</option>
                        <option value="Baja">Baja</option>
                     </select>

                     <!-- <a href="#" class="add3"> &plus;</a> -->
                  </div>
                  <div class="inp-group3">
                  </div>
                  <br><br>
                  <h6 for="">¿La evolución es positiva?</h6>
                  <br>
                  <div class="form-check form-check-inline">
                     <select name="resultado" id="">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                     </select>
                     <!-- <input class="form-check-input" type="check" name="inlineRadioOptions" id="inlineRadio1" value="option1"> -->
                  </div>
                  <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                     </div> -->
               </div>
               <br>
               <div class="d-flex justify-content-center">
                  <a href="gestionservicios.php" class="btn btn-info">Nuevo</a>&emsp;

                  <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion"
                     value="guardar4">Guardar</button> &emsp;&emsp;&emsp;
               </div>
               <input type="text" name="controlador" value="servicios" hidden>
            </form>
            <br>
         </div>
      </div>
   </div>
   <br><br>
   <h4 style="text-align:center">Gestión de los nuevos servicios</h4>
   <br>
   <!-- <table class="table table-success" id="tftable2" class="tftable">
      <tr>
         <th>Categorias</th>
         <th>Tipos de servicios</th>
         <th>Descripción</th>
         <th>Elementos</th>
         <th>Costo Elementos</th>
         <th>Máquinas</th>
         <th>Costo Máquinas</th>
         <th>Costo total</th>
         <th>Porcentaje</th>
         <th>Precio</th>
         <th style="text-align: center;">Acciones</th>
      </tr>
      <tr>
         <td>Celda 1</td>
         <td>Celda 2</td>
         <td>Celda 3</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>Celda</td>
         <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
               Editar
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Editar</button>
                     </div>
                  </div>
               </div>
            </div>
            <button type="button" class="btn btn-danger">Eliminar</button>
            <script>
               $(function() {
                  $('[data-toggle="popover"]').popover()
               })
               $(function() {
                  $('.example-popover').popover({
                     container: 'body'
                  })
               })
            </script>
            <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="top"
               data-content="Enviado!">
               Enviar al gerente
            </button>
         </td>
      </tr>
   </table> -->
   <br><br>




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
            <!-- <th>Estado</th> -->
            <th>Acciones</th>
        </tr>

        <?php 

            include_once '../controladores/controladorservicio.php';
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
               //  echo "<td>". $fila['estado'] ."</td>";
            
               echo "<td>

               <form action='../controladores/controladorformulario.php' method='post'>
               <input type='number' name='idservicio' value='". $fila['idservicio'] ."' hidden>
               <input type='text' name='controlador' value='categorias' hidden>
               <div class='d-flex justify-content-center'>
               <input type='submit' name='operacion' value='eliminar' class='btn btn-danger d-flex justify-content-center'>&emsp;
               </form>


                   <form action='gestionservicios.php' method='post'>
                   <input type='number' name='idservicio' value='". $fila['idservicio'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['NOM_SERVICIO'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['CAT_SERVICIO'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['elementos_servicio'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['COSTO_ELEMENTOS'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['maquinas_servicio'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['COSTO_MAQUINAS'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['costoTotal'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['porcentajeGanancia'] ."' hidden>
                   <input type='text' name='nombre' value='". $fila['precio'] ."' hidden>





               
                   <input type='submit'  style='margin-left:50px;' value='editar' class='btn btn-info '>

                   
                   </div>
               </form>
               
               </td>";

                echo "</tr>";

            }

        ?>

    </table>




















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
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
   </script>
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/dinamico.js"></script>
   <script src="../js/utilidades.js"></script>
</body>

</html>