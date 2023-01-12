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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
</head>

<body
  style="background-image: url(../recursos/imagenes/fondo.jpeg); background-repeat: no-repeat center center fixed; background-size: cover;">

  <div class="container bg-light">
    <div class="bg-light">
      <div class="row">
        <div class="col-4">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="pgprofesionalarea.html">SoftDJY</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        </div>

        <div class="col-4">
          <div class="col-4 flo" style="margin-left: 100px;">
          </div>
        </div>

        <div class="col-4 flo">
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle mt-2" data-bs-toggle="dropdown"
              aria-expanded="false" style="margin-left:215px;">
            
              UsuarioProfesional

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

  <div class="container" style="width: 1000px; margin-top: 100px;">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title" style="text-align: center;">Gestión del cliente</h5>

      </div>
      <div class="container">
        <!-- <nav class="navbar bg-light">
          <div class="container-fluid">
            <form class="d-flex" role="Buscar">
              <input class="form-control me-2" type="Buscar" placeholder="Buscar cliente" aria-label="Buscar">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </nav> -->
        <div>Tipo de identificación
          <select id="tipoIdentificacion">
            <option>--Seleccione--</option>
            <option value="TI">TI</option>
            <option value="CC">CC</option>
            <option value="RC">RC</option>
            <option value="CE">CE</option>
          </select>
        </div><br>
        <div>
          <label for="">Numero de identificación</label>
          <input type="text" id="identificador" disabled>
        </div><br>

        <div>
          <label for="">Nombres</label>
          <input type="text" id="nombres" disabled>
        </div><br>
        <div>
          <label for="">Apellidos</label>
          <input type="text" id="apellidos" disabled>
        </div><br>
        <!-- <div>
          <label for="">Edad del paciente</label>
          <input type="number" id="" disabled>
        </div><br> -->
        <div>
          <label for="">Direccion de residencia</label>
          <input type="text" id="direccionDeResidencia" disabled>
        </div><br>

        <div>
          <label for="">Número de teléfono</label>
          <input type="number" id="numeroCelular" disabled>
          </select>
        </div><br>
        <div>
          <label for="">Número de teléfono del acompañante</label>
          <input type="number" id="numeroCelularAcompanante" disabled>
        </div><br>
        <div>
          <label for="">Correo electronico del paciente</label>
          <input type="text" id="correoElectronico" disabled>
        </div><br>
        <div>
          <label for="">Correo electronico del acompañante</label>
          <input type="text" id="correoAcompanante" disabled>
        </div><br>
        <div class="card">
          <div class="card-header">
            Ingresar más datos
          </div>
          <div class="card-body">

            <form action="../controladores/controladorformulario.php" method="post">
              <textarea cols="22" rows="3" placeholder="Motivo cita" name="motivoCita"></textarea><br>
              <input type="number" class="" placeholder="Peso" name="peso"><br>
              <input type="text" class="" placeholder="Derivacion" name="derivacion"><br>
              <input type="number" class="" placeholder="Presión arterial" name="presionArterial"><br>
              <br>

              <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion"
                value="guardar6">Guardar</button> &emsp;&emsp;&emsp;
              <input type="text" name="controlador" value="revision" hidden>
              <input type="hidden" name="personalEmpresa_numeroIdentificacion"
                value="<?php echo $_SESSION['idusuario'] ?>" hidden>
              <input type="hidden" name="citas_idcita" id="citas_idcita" value="<?php echo $_SESSION['idcita'] ?>"
                hidden>

            </form>

          </div>
        </div>

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
          Gestionar agendamiento de citas
        </button> -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestionar agendamiento de citas</h5>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div>
                    <label for="">Fecha y hora para apartar cita</label>
                    <input type="datetime-local" name="" id="" required>
                  </div><br>
                  <div>
                    <label for="">Profesional encargado</label>
                    <input type="text" name="" id="" required>
                  </div>
                  <form class="px-4 py-3">
                    <div class="mb-3">

                      <a href=""> <button type="submit" class="btn btn-primary"
                          style="margin-left:240px ; margin-top: 20px;">Agendar</button></a>

                    </div>
                  </form>

                  <div class="container">
                    <div class="card-header" style="padding: 1">

                    </div>

                    <table>
                      <tr>
                        <th style="text-align:center">Fecha cita agendada</th>
                        <th style="text-align:center">Hora cita agendada</th>
                        <th style="text-align:center">Acciones</th>
                      </tr>

                      <tr>
                        <td style="text-align:center">13/10/22</td>
                        <td style="text-align:center">9:10 am</td>
                        <td><a href=""><img src="../recursos/imagenes/lapiz-png.png" height="40" alt=""></a><a
                            href=""><img src="../recursos/imagenes/eliminar-png.png" height="40"
                              alt=""></a>&emsp;&emsp;&emsp;&emsp; <a><img src="../recursos/imagenes/check.png"></a></td>
                      </tr>
                    </table>

                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
          Gestionar el tratamiento y el Seguimiento evolutivo del cliente
        </button> -->

        <!-- Modal -->
      </div>
      <br>
      <div class="d-flex justify-content-center">
        <a href="diagnosticartratamiento.php" class="btn btn-info" style="text-align: center;">Diagnosticar
          tratamiento</a>
      </div>
      <br>

      

      <!-- <a href="gestiontratamiento.php">Gestion</a> -->

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
      </script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/profesional.js"></script>
</body>

</html>