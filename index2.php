<?php

require_once "controllers/plantilla.controller.php";
require_once "controllers/formularios.controller.php";
require_once "models/conexion.php";

/* Instanciamos la Clase Contollador*/

$conexion = Conexion::conectar();
//echo '<pre>'; print_r($conexion); '<pre>';
echo var_dump($conexion);


$plantilla = new ControllerPlantilla();
$plantilla -> ctrTraerPlantilla();


?>