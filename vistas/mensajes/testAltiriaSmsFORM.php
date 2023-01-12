<!DOCTYPE html>
<html>
<head>
    <title>Test SMS PHP Altiria</title>
    <meta charset="utf-8">
</head>
<body>
    <div style="margin: 2em 4em;">
        <h2>Ejemplo de envio de SMS con Altiria</h2>
        <div id="smsbox" style="border: 1px solid red; padding-left: 1em;">
        <p>

        <?php
        // Copyright (c) 2020, Altiria TIC SL
        // All rights reserved.
        // El uso de este c�digo de ejemplo es solamente para mostrar el uso de la pasarela de env�o de SMS de Altiria
        // Para un uso personalizado del c�digo, es necesario consultar la API de especificaciones t�cnicas, donde tambi�n podr�s encontrar
        // m�s ejemplos de programaci�n en otros lenguajes y otros protocolos (http, REST, web services)
        // https://www.altiria.com/api-envio-sms/

        // YY y ZZ se corresponden con los valores de identificacion del
        // usuario en el sistema.
        include('httpPHPAltiria.php');

        $altiriaSMS = new AltiriaSMS();
        

        $altiriaSMS->setDebug(true);
        $altiriaSMS->setLogin('yennifor0123@gmail.com');
        $altiriaSMS->setPassword('9b78r35y');
       

        //if($_SERVER["REQUEST_METHOD"] == "GET"){
          //  $str = $altiriaSMS->getCredit();
            //if(preg_match('/.*OK credit\(0\):(.*?)$/', $str, $match) ==1){
              //  echo "Saldo disponible: ".$match[1]."creditos";
            //}
        //}
         if($_SERVER["REQUEST_METHOD"] == "POST"){

            //$sDestination = '346xxxxxxxx';
            $sDestination = $_POST['phone'];
            //$sDestination = array('346xxxxxxxx','346yyyyyyyy');
            $sMessage = $_POST['message'];

            $response = $altiriaSMS->sendSMS($sDestination, $sMessage);

            if (!$response)
            echo "El envio ha terminado en error";
            else
            echo $response;

        }
        ?>
     </p>
    </div>
    <!---FORMULARIO-->
    <form action="testAltiriaSmsFORM.php" method="POST">
        <P>Telefono movil / Celular</P>
        <input type="text" name="phone">

        <p>Mensaje</p>
        <Textarea name="message" rows="3" cols="60"></Textarea>

        <input type="submit" value="ENVIAR SMS">
        
    </form>
    </div>
</body>
</html>


