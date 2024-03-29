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
<body>

    <div class="container bg-light">
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar bg-light">
                        <div class="container-fluid">
                          <a class="navbar-brand">SoftDJY</a>
                        </div>
                    </nav>
                </div>
                <div class="col-4" style="margin-top: 10px;">
                  <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="¿Qué desea búscar?" aria-label="Search" >
                    <button class="btn btn-outline-success" type="submit">Buscar</button >
                  </form>
                </div>
                <div class="col-4 flo">
                  <div class="btn-group mt-2" role="group" aria-label="Basic outlined example" style="margin-left: 163px;">
                    <a href="login.html" type="button" class="btn btn-outline-primary" style="width: 200px;">Iniciar sesión</a>
                    
                  </div>
                </div>
        
              </div>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://zonahospitalaria.com/wp-content/uploads/2019/10/GettyImages-908764844.jpg" class="d-block w-100" alt="..." id="img">
                    <div class="carousel-caption d-none d-md-block">
                    <h5 class="titulocarr">TRATAMIENTOS Y SERVICIOS DE FISIOTERAPIA</h5>
                    <p id="textocarr">Diagnosticamos tu problema o lesión para ofrecerte el tratamiento adecuado y un asesoramiento con prescripción de ejercicio, en caso de ser necesario..</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://umb.edu.co/wp-content/uploads/2020/07/fisioterapia.jpg" class="d-block w-100" alt="..." id="img">
                    <div class="carousel-caption d-none d-md-block">
                    <h5 class="titulocarr">TRATAMIENTOS Y SERVICIOS DE FISIOTERAPIA</h5>
                    <p id="textocarr">Diagnosticamos tu problema o lesión para ofrecerte el tratamiento adecuado y un asesoramiento con prescripción de ejercicio, en caso de ser necesario..</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.ces.edu.co/wp-content/uploads/2018/12/fisioterapia.jpg" class="d-block w-100" alt="..." id="img">
                    <div class="carousel-caption d-none d-md-block">
                    <h5 class="titulocarr">TRATAMIENTOS Y SERVICIOS DE FISIOTERAPIA</h5>
                    <p id="textocarr">Diagnosticamos tu problema o lesión para ofrecerte el tratamiento adecuado y un asesoramiento con prescripción de ejercicio, en caso de ser necesario..</p>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div> <br>

            <h2 style="text-align: center; font-family: 'Times New Roman', Times, serif;"> Ofrecemos los mejores servicios</h2> 
            <br><br>
          

            <?php 

include '../controladores/controladorservicio.php';
$controladorServicio = new ControladorServicio();
$resultado = $controladorServicio->listarDatosPrincipal(); 

while ($fila = $resultado->fetch_assoc()){

  echo "<div class='container'>   
    <div class='col-sm-6' style='float: left;'>       
      <div class='col-sm-12'>        
          <div class='card text-center' style='margin-top: 10px; margin-left:10px;' >
            <div class='card-body'>
            <h4 class='card-title'></h4>

              <h4 class='card-title'>" . $fila['Servicio'] ."</h4>
              <h5 class='card-title'>  " . $fila['Categoria'] ."</h5>
              <p class='card-text'> ". $fila['Descripcion'] ."</p>
            </div>
          </div>          
      </div>
    </div>
  </div>";




}
?> 

<!-- 
            <div class="container text-center">
              
                <div class="row" > 
                  <div class="col" style="margin-top:20px;">
                    <img src="https://estaticos-cdn.prensaiberica.es/clip/1c1a5e32-4771-4bae-9c82-84870d4e0e50_16-9-aspect-ratio_default_0.jpg" alt="" id="imgfis">
                  </div>
                  <div class="col" style="margin-top:20px;">
                    <img src="https://www.efisioterapia.net/sites/default/files/imagen_articulos/terapia-manual.jpg" alt="" id="imgfis">
                  </div>
                </div>
            </div>    -->
            <br><br>
            <hr>

           <div class="container text-center">
            <h5>Todos los derechos reservados 2022 Grupo SoftDJY</h5>
            <div class="row">
              <div class="col">
                <img src="../recursos/imagenes/facebook.jpeg" alt="" style="width: 120px; height: 120px; margin-left: 340px;" >
              </div>
              <div class="col">
                 <img src="../recursos/imagenes/Instagram.jpeg" alt="" style="width: 80px; height: 80px; margin-top: 20px; margin-right: 450px;">
              </div>
            </div>
           </div>
            
            
            
        </div>
    </div> <br><br>

    <!---script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>


</body>
</html>




