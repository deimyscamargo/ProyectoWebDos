<?php
    $server = '127.0.0.1'; // Aquí colocan la URL del servidor para accesar a él
    $username = 'root'; // Se necesita el usuario del servidor de MySQL
    $password = 'Yennisu#12345'; // Colocar la contraseña
    $database = 'proyectowebdos'; // Elegir la base de datos que se requiere usar
    

	// Se utiliza un try catch para intentar la conexión y en caso de no establecerse nos regrese un mensaje de error y cierre la conexión
    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $e) {
        print "!error:".$e->getMessage()."<br/>";
        
        die();
    }
?>