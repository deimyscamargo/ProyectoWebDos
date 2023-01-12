<?php

require_once("PHPMailer/clsMail.php");



$message = '';

$mailSend = new clsMail();

$titulo ='Signup | Verification';
$correo =$email;
$asunto ='verificar si se envia el correo';
$bodyHTML ='
!Gracias por registrarte!
<br>
<br>

Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
<br>
<br>

------------------------ <br>
id: '.$_idusuario_.'<br>
Username: '.$_nickname_.' <br>
Password: '.$_password_us.'<br>
------------------------<br><br>

Por favor haz clic en este enlace para activar tu cuenta: <br>

http://localhost/ProyectoWebDos/ProyectoWebDos/vistas/PHPcorreos/PHPMailer/activar.php?email='.$email.'?hash='.$hash.'';

$enviado = $mailSend ->metEnviar($titulo, $correo ,$asunto,$bodyHTML);



if($enviado.$stmt->execute()){
    $message ='Successful';
    
    header('Location: ../html/gestionarhistorialclinico.php'); // En caso de que sea satisfactorio el proceso, se redirige al formulario de Login
} else {
    $message = 'Ups :( Algo salió mal';
    

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

</head>
<body style="background-image: url(../recursos/imagenes/fondo.jpeg); background-repeat: no-repeat center center fixed; background-size: cover;">

    <div class="container bg-light"  >
        <div class="bg-light">
            <div class="row">
                <div class="col-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">SoftDJP</a>
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
                                <li><a class="dropdown-item" href="../html/factura.html">Factura</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-4 flo" style="margin-left: 170px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle mt-2" data-bs-toggle="dropdown" aria-expanded="false">
                            usuarioSecretaria
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.html">Salir</a></li>
                            </ul>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="width: 99999999999999999px; margin-top: 60px;">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="text-align: center;">validacion</h5>

            </div> <br>
            <main class="main">

        <div class="signup-box">

            <?php if(!empty($message)): ?>
                    <p><?= $message ?></p>
            <?php endif; ?>
            <h2>Regístrate</h2>

            <form action="enviar.php" method="post" onsubmit="return validarsign();">
                <LABEL for="id">id del usuario</LABEL>
				<input id="id" type="text" name="idusuario" placeholder="Ingresa el id" required autofocus> <br>
				<!--USERNAME-->
				<LABEL for="_nickname_">Nombre de usuario</LABEL>
				<input id="_nickname_" type="text" name="nombreUsuario" placeholder="Ingresa un apodo (max. 10 caracteres)" required > <br>
				<!--EMAIL-->
				<LABEL for="correo">Correo electrónico</LABEL>
				<input id="correo" type="text" name="email" placeholder="Ingresa el correo eléctrico" required> <br>
				<!--PASSWORD-->
				<LABEL for="pssword">Contraseña</LABEL>
				<input id="pssword" type="password" name="contrasena" placeholder="Ingresa contraseña" required> <br>
				<!--PASSWORD CONFIRMATION-->
				<LABEL for="tio">tipo de usuario</LABEL>
				<input id="tipo" type="text" name="tipoUsuario" placeholder="Ingresa el tipo de Usuario" required> <br>
	
                <input type="submit" name="aceptar_" value="Registrar">
            </form>
            <div class="existente">
                <span>¿Ya tienes una cuenta? <a href="login.php">Ingresar ahora</a></span>
            </div>
            
		</div>

    </main>
            


        </div> 
    </div> <br>



    <!---script de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>

    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../scripts.js"></script>
</body>
</html>






    
    


