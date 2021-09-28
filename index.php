<?php

require_once "controllers/plantilla.controller.php";
require_once "controllers/formularios.controller.php";
require_once "models/formularios.modelo.php";


//require_once "models/conexion.php";

/* Instanciamos la Clase Contollador*/

//$conexion = Conexion::conectar();
//$conexion = new Conexion();
//echo '<pre>'; print_r($conexion); '<pre>';
//$conexion->conectar();
//var_dump($conexion);echo '<br>';

$plantilla = new ControllerPlantilla();
$plantilla -> ctrTraerPlantilla();

