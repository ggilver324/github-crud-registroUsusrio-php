<?php

class ControllerFormularios{
	
	/* FORMA DE DECLARAR UN METODO NO ESTATICO*/
	/*public function ctrRegistro(){

		if(isset($_POST["registroNombre"])){

			echo $_POST["registroNombre"];

		}
	*/

	/* FORMA DE DECLARAR UN METODO NO STATIC*/
	
	static public function ctrRegistros(){

		if(isset($_POST["registroNombre"])){

			if(preg_match('/^[a-zA-ZñÑéáíóú ]+$/', $_POST["registroNombre"]) &&  preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])){
 //&& preg_match('/^[^0-9][a-zA-Z0-9]+[.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+[.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"])  
			
			$tabla = "registro";

			$token = md5($_POST["registroNombre"]."+".$_POST["registroEmail"] );

			$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$tutorialedecursophpamialc$');

			$datos = array("token" => $token,
							"nombre" => $_POST["registroNombre"],
							"email" => $_POST["registroEmail"],
							"password" => $encriptarPassword);

			$respuesta = ModeloFormularios::mdlRegistros($tabla, $datos);

			return $respuesta;

			}else{

				$respuesta = "error";
				return $respuesta;

			}

		}
	
	}


	/* SELECCINAR REGISTRO */


	static public function ctrSeleccionarRegistros($item, $valor){

		$tabla = "registro";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
	}

	/* INGRESO USUARIO  */

	public function ctrIngresos(){

		if(isset($_POST["ingresoEmail"])){

			$tabla = "registro";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			$encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$tutorialedecursophpamialc$');

			if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword){

				ModeloFormularios::mdlIntentosFallidos($tabla, 0, $respuesta["token"]);


				$_SESSION["validarIngreso"] = "ok";

				echo '<script>

				if( window.history.replaceState){

					window.history.replaceState(null, null, window.location.href);
				}

				window.location = "inicio";

				</script>';

			}else{

					if($respuesta["intentos_fallidos"] < 3){

					$tabla = "registro";
					$intentosFallidos = $respuesta["intentos_fallidos"]+1;

					ModeloFormularios::mdlIntentosFallidos($tabla, $intentosFallidos, $respuesta["token"]);

				}else{

					echo '<div class="alert alert-warning">RECAPTCHA Debe validar que no es un robots..</div>';

				}

				//print_r($intentos_fallidos);

				echo '<script>

				if( window.history.replaceState){

					window.history.replaceState(null, null, window.location.href);
				}

				</script>';

				echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden..</div>';

			}

		}


	}

	/* ACTUALIZAR REGISTRO */


	static public function ctrActualizarRegistro(){
        
        if(isset($_POST["actualizarNombre"])){
		
		$tabla = "registro";
		$item = "token";
		$valor = $_POST["tokenUsuario"];

		if(preg_match('/^[a-zA-ZñÑéáíóú ]+$/', $_POST["actualizarNombre"])){
 //&& preg_match('/^[^0-9][a-zA-Z0-9]+[.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+[.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"])  


		$usuario = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		$compararToken = md5($usuario["nombre"]."+".$usuario["email"] );


			if($compararToken == $_POST["tokenUsuario"]){

			

				if($_POST["actualizarPassword"] != ""){

					if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPassword"])){

					$password = crypt($_POST["actualizarPassword"], '$2a$07$tutorialedecursophpamialc$');

					}

				}else{

					$password = $_POST["passwordActual"];
				}


				$tabla = "registro";

				$datos = array("token" => $_POST["tokenUsuario"],
								"nombre" => $_POST["actualizarNombre"],
								"email" => $_POST["actualizarEmail"],
								"password" => $password );


				$respuesta = ModeloFormularios::mdlActualizarRegistros($tabla, $datos);

				return $respuesta;

				}

			}else{

				$respuesta = "error";

				return $respuesta;
			}
		}else{

			$respuesta = "error";

			return $respuesta;
		}

	}


	public function ctrEliminarRegistro(){ 

		if(isset($_POST["eliminarRegistro"])){

			$tabla = "registro";
			$item = "token";
			$valor = $_POST["eliminarRegistro"];echo "Hola -----";


			$usuario = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			$compararToken = md5($usuario["nombre"]."+".$usuario["email"] );


			if($compararToken == $_POST["eliminarRegistro"]){

				//$tabla = "registro";
				//$valor = $_POST["eliminarRegistro"];

				$respuesta = ModeloFormularios::mdlEliminarRegistros($tabla, $valor);

				if($respuesta == "ok"){


					echo '<script>

					if( window.history.replaceState){

						window.history.replaceState(null, null, window.location.href);
					}

					window.location = "inicio";

					</script>';

				}

			}

		}

	}

}
