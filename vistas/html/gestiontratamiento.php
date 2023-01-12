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
              UsuarioProfesionalArea
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

      <div class="container">
        <div>
          <div class="container">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Gestionar el tratamiento y el Seguimiento evolutivo del
                cliente</h5>
            </div>
            <div class="container">
              <br>
                 <div class="mb-3">
                  <label for="">Tipo de servicio:</label>
                  <select name="" id="">
                    
                  </select>
               </div>

               <div class="mb-3">
                  <label for="">Descripción</label><br>
                  <textarea name="descripcion" cols="76" rows="3" id="descripcion" disabled>
                  </textarea>
               </div>
              <br>
              <div>
                <label for="">Número de la sesion actual</label>
                <input type="number" name="" id="">
              </div><br>
              <div>
                <label for="">Número de sesiones faltantes</label>
                <input type="number" name="" id="">
              </div><br>
              <div class="card container">
                <div class="mb-3">

                  <div class="row">
                    <div class="col-sm-6">
                      <h5 style="text-align:center;">Evolución del tratamiento (positivo o negativo)</h5><br>
                      <div style="width: 400px; ">
                        <canvas id="grafica"></canvas>
                      </div>

                    </div>

                  </div>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/Gestionarcliente.js"></script>
</body>

</html>