<?php

include('httpPHPAltiria.php');

$altiriaSMS = new AltiriaSMS();


$altiriaSMS->setLogin('yennifor0123@gmail.com');
$altiriaSMS->setPassword('9b78r35y');

$altiriaSMS->setDebug(true);



//$sDestination = '346xxxxxxxx';
$sDestination = '573015924663';
//$sDestination = array('346xxxxxxxx','346yyyyyyyy');

$response = $altiriaSMS->sendSMS($sDestination, "Hola, buenas tardes este mensaje es para recordarle la cita de hoy");

if (!$response)
  echo "El env�o ha terminado en error";
else
  echo $response;
?>

