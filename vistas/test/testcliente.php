<?php

    require("../modelos/cliente.php");
    require("../controladores/controladorcliente.php");

   //Se crea un objeto de tipo cliente
  $cliente = new Cliente(2,'Pique','Pique','Calle falsa 143');

  $controladorCliente = new controladorcliente();
  $controladorCliente->eliminar($cliente);
  echo 'Inserto de forma exitosa!!';







?>