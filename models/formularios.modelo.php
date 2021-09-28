 <?php 

require_once "conexion.php";


class ModeloFormularios{


	/*=================================
		Registro
	==================================*/
	
	static public function mdlRegistros($tabla, $datos){

		// Statement: Declaracion

			if(isset($datos["nombre"])){
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES (:token, :nombre, :email, :password)");

				/* bindParam(): Vincuta una variable de php a un parametro se sustitucion con nombe o de signo de interrogacioncorrespondiente a la sentencoia SQL que fue usada para preparar la sentencia.*/

				$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
				$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

				if ($stmt->execute()){

					return "Ok";

				}else{

					print_r(Conexion::conectar()->errorInfo());

				}	

			}else{

				return "Debe ingresar datos";
			}

		


		$stmt->close();

		$stmt = null;

	}

	/*  Seleccionar Registroa */

	static public function mdlSeleccionarRegistros($tabla, $item, $valor){


		if($item == null && $valor == null){


			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

			$stmt->execute();

		return $stmt->fetchAll();

        }else{

         	$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla where $item = :valor ORDER BY id DESC");

        	//echo $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			//$stmt->bindParam(":item", $item, PDO::PARAM_STR);
			$stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
        	
        	$stmt->execute();

			return $stmt->fetch();


        }


		$stmt->close();

		$stmt = null;


	}

	/*  Actualizar Registroa */

	static public function mdlActualizarRegistros($tabla, $datos){


			if(isset($datos["nombre"])){

				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE token = :token ");

				$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
				$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
				$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
				$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);

				if ($stmt->execute()){

					return "ok";

				}else{

					print_r(Conexion::conectar()->errorInfo());

				}	

			}else{

				return "Debe ingresar datos";
			}

		


		$stmt->close();

		$stmt = null;

	}


	/*  Eliminar Registroa */

	static public function mdlEliminarRegistros($tabla, $valor){

				$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token = :id ");

				$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

				if ($stmt->execute()){

					return "ok";

				}else{

					print_r(Conexion::conectar()->errorInfo());

				}	

			
		$stmt->close();

		$stmt = null;

	}

	/*  Actualizar Intentos Fallidos */

	static public function mdlIntentosFallidos($tabla, $valor,$token){


				$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token=:token");

				$stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
				$stmt->bindParam(":token", $token, PDO::PARAM_STR);

				if ($stmt->execute()){

					return "ok";

				}else{

					print_r(Conexion::conectar()->errorInfo());

				}	

		$stmt->close();

		$stmt = null;

	}

}