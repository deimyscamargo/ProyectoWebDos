<!DOCTYPE html>
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
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
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
                        <li><a class="dropdown-item" href="../html/gestionusuarios.php">Gestión de los usuarios</a>
                        </li>
                        <li><a class="dropdown-item" href="../html/gestioncategorias.php">Gestión de categorias</a>
                        </li>
                        <li><a class="dropdown-item" href="../html/gestiondelasmaquinas.php">Gestión de las máquinas</a></li>
                        </li>
                        <li><a class="dropdown-item" href="../html/gestionservicios.php">Gestión de los servicios</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-4 flo">
               <div class="btn-group">
                  <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown"
                     aria-expanded="false" style="margin-left:215px;">
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
   <div class="container" style="width: 700px; margin-top: 100px; position: relative;">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title" style="text-align: center;">Gestión de los usuarios</h5>
         </div>
         <div class="card-body">
            <form action="../controladores/controladorformulario.php" method="post" class="px-4 py-3">
               <div class="mb-3">
                  <label for="">Tipo de identificación:</label>
                  <!-- <input type="text" name="tipoIdentificacion"> -->
                  <select name="tipoIdentificacion" id="" class="form-control">
                     <option value="cedula de ciudadania">Cedula de ciudadanía</option>
                     <option value="cedula de extrangeria">Cedula de extrangería</option>
                  </select>
               </div>
               <div class="mb-3">
                  <input type="number" class="form-control" name="numeroIdentificacion"
                     placeholder="Número de identificación">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" name="nombres" placeholder="Nombres">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" name="direccionDeResidencia"
                     placeholder="Dirección de residencia">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" name="numeroCelular" placeholder="Número de celular">
               </div>
               <div class="mb-3">
                  <input type="text" class="form-control" name="correo" placeholder="Correo electrónico">
               </div>
               <div class="mb-3">
                  <label for="">Cargo</label>
   
                  <select name="cargos_idcargo" id="cargos_idcargo" onchange="colocarTipo()" class="form-control">
                     <?php
                     include_once '../controladores/controladorcargo.php';
                     $controladorCargo = new ControladorCargo();
                     $resultado = $controladorCargo->listar(); 
                     echo "<option value=-1>--Seleccione--</option>";

                     while ($fila = $resultado->fetch_assoc()){
                        // echo "<option value=".$fila['idcargo'].">".$fila['cargo']."</option>";
                        echo '<option value="' .$fila['idcargo']. '" data-tipo="' . $fila['tipo'].  '">' . $fila['cargo']. '</option>';
                     }
                     ?>
                  </select>
                     <input type="hidden" name="tipo" id="tipo">







               </div>
               <br>
               <div class="mb-3" id="profesional" style="display:none;">
                  <h5 for="" style="text-align: center;">Profesional del área</h5>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="wrap">
                           <label for="">Agregar Estudios</label>
                           <a href="#" class="add"> &plus;</a>
                        </div>
                        <div class="inp-group">
                        </div>

                        <div class="wrap">
                           <label for="">Agregar Experticia</label>
                           <a href="#" class="add2"> &plus;</a>
                        </div>
                        <div class="inp-group2">
                        </div>

                        <div class="diasLaborales">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="lunes"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="martes"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="miercoles"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Miercoles</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="jueves"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Jueves</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="viernes"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Viernes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="sabado"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Sabado</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="domingo"
                                 name="diasLaborales[]">
                              <label class="form-check-label" for="inlineCheckbox2">Domingo</label>
                           </div>

                        </div>

                        <div class="horas">
                           <p>Hora de entrada: <input type="time" name="horaEntrada"></p>
                           <p>Hora de salida: <input type="time" name="horaSalida" style="margin-left: 13px;">
                        </div>

                     </div>
                  </div>
               </div>

               <div class="mb-3">
                  <div class="row">
                     <div class="mb-3">
                        <input type="hidden" name="usuarios_idusuario" class="form-control">
                        <label for="">Usuario</label>
                        <input type="text" name="nombreUsuario" class="form-control">
                     </div>

                     <div class="mb-3">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="*********">
                     </div>
                     <div class="mb-3">
                        <label for="">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="confirmarcontrasena" placeholder="*********">
                     </div>
                  </div>
               </div>

               <div class="d-flex justify-content-center">
                  <a href="gestionusuarios.php" class="btn btn-info">Nuevo</a>&emsp;

                  <button type="submit" class="btn btn-success" style="text-align: center;" name="operacion"
                     value="guardar5">Guardar</button> &emsp;&emsp;&emsp;
               </div>

               <input type="text" name="controlador" value="personal" hidden>

            </form>
         </div>
      </div>
   </div>
   <br><br>
   <script>
      const addBtn = document.querySelector(".add");
      const input = document.querySelector(".inp-group");
      let iel = 1;

      function removeInput() {
         this.parentElement.remove();
      }

      function addInput() {
         const estudios = document.createElement("textarea");
         estudios.type = "text";
         estudios.cols = "80";
         estudios.rows = "3";
         estudios.placeholder = "Estudios";
         estudios.setAttribute("name", "estudio[]");
         estudios.setAttribute("id", "estudio" + iel);
         estudios.setAttribute("data-idx", iel);
         const btn = document.createElement("a");
         btn.className = "delete";
         btn.innerHTML = "&times";
         btn.addEventListener("click", removeInput);
         const flex = document.createElement("div");
         flex.className = "flex";
         input.appendChild(flex);
         flex.appendChild(estudios);
         flex.appendChild(btn);
         iel++;
      }
      addBtn.addEventListener("click", addInput);
      ////////////////////////////////////////////////////
      const addBtn2 = document.querySelector(".add2");
      const input2 = document.querySelector(".inp-group2");

      function removeInput2() {
         this.parentElement.remove();
      }

      function addInput2() {
         const experticia = document.createElement("textarea");
         experticia.type = "text";
         experticia.cols = "80";
         experticia.rows = "3";
         experticia.placeholder = "Experticia";
         experticia.setAttribute("name", "experticia[]");
         experticia.setAttribute("id", "experticia" + iel);
         experticia.setAttribute("data-idx", iel);
         const btn = document.createElement("a");
         btn.className = "delete";
         btn.innerHTML = "&times";
         btn.addEventListener("click", removeInput2);
         const flex = document.createElement("div");
         flex.className = "flex";
         input2.appendChild(flex);
         flex.appendChild(experticia);
         flex.appendChild(btn);
         iel++;
      }
      addBtn2.addEventListener("click", addInput2);

      function mostrarProfesional() {
         let divProfesional = document.getElementById("profesional");
         let selElemento = document.getElementById("cargos_idcargo");
         if (selElemento) {
            divProfesional.style.display = "none";
            if (selElemento.selectedIndex > 0) {
               //var seleccionado = selElemento.options[selElemento.selectedIndex];
               var seleccionado = selElemento.options[selElemento.selectedIndex];
               if (seleccionado.text.indexOf("Personal") >= 0) {
                  divProfesional.style.display = "block";
               }
            }
         }
         //divProfesional.setAttribute("disabled");
      }


      function colocarTipo(){
         let txtTipo = document.getElementById( "tipo");
         let selElemento = document.getElementById( "cargos_idcargo"); 

         if( selElemento ){
            txtTipo.value = "0";
            if( selElemento.selectedIndex > 0 ){
                  var seleccionado = selElemento.options[selElemento.selectedIndex];
                  txtTipo.value = seleccionado.getAttribute("data-tipo");
            }
         }

         mostrarProfesional();
      }
   </script>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
   </script>
   <script src="../js/bootstrap.min.js"></script>
</body>

</html>