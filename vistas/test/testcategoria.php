<?php

require("../modelos/categoria.php");
require("../controladores/controladorcategoria.php");

//Se crea un objeto de tipo cliente
$categoria = new Categoria(6,'Phyton2');

$controladorCategoria = new ControladorCategoria();
// $controladorCategoria->guardar($categoria);
$controladorCategoria->eliminar($categoria);

echo 'Inserto de forma exitosa!!';

?>