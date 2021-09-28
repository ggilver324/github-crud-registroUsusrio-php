<?php

if(isset($_POST['submit'])){
	
	$nombre = $_POST['registroNombre'];
	$email = $_POST['registroEmail'];
	$password = $_POST['registroPassword'];
	
	/*$nombre = document.getElementById('nombre');
	$email = document.getElementById('email');
	$password = document.getElementById('pwd');
	$error = document.getElementById('error');*/
	//error.style.color = 'red';

}

?>
<div class="d-flex justify-content-center">

	<form class="p-5 bg-light" method="post">
		<!--script type="text/javascript">
	
		var nombre = document.getElementById('nombre');
		var email = document.getElementById('email');
		var password = document.getElementById('pwd');
		var error = document.getElementById('error');
		error.style.color = 'red';
		alert(nombre);
		
		function enviarFormulario(){
			console.log('Enviando formulario....');

			var mensajesError = [];

			if(nombre.value === null || nombre.value === ''){
				mensajesError.push('Ingresa tu nombre');
			}

			if(email.value === null || email.value === ''){
				mensajesError.push('Ingresa tu email');
			}

			if(password.value === null || password.value === ''){
				mensajesError.push('Ingresa tu contraseña');
			}

			error.innerHTML = mensajesError.join(', ');

		//return false;
		}

		</script-->
		<div class="form-group">
			<label for="nombre">Nombre:</label>

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fad fa-user"></i></span>
				</div>

				<input type="text" class="form-control" placeholder="" id="nombre" name="registroNombre" required="true">
			</div>
		</div>
		
		<div class="form-group">
			<label for="email">Correo Electronico:</label>

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fal fa-envelope"></i></span>
				</div>

				<input type="email" class="form-control" placeholder="" id="email" name="registroEmail" required="true">
			</div>
		</div>
			
		<div class="form-group">
			<label for="pwd">Contraseña:</label>

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-lock-alt"></i></span>
				</div>
	
				<input type="password" class="form-control" placeholder="" id="pwd" name="registroPassword" required="true">
			</div>
			
		</div>

		<!--input type="button" value="Enviar" onclick="enviarFormulario()" class="btn btn-primary"-->

		<button type="submit" name="submit" class="btn btn-primary">Enviar</button>

		<!--script src= 'validar.js'></script-->

		<?php
			/* FORMA COMO SE INSTANCIA UNA CLASE NO ESTATICA*/
		/*
		$registro = new ControllerFormularios();
		$registro -> ctrRegistro();
		*/

			/* FORMA COMO SE INSTANCIA UNA CLASE NO ESTATICA*/

			//include("views/Validador/validar.php");

			$registro = ControllerFormularios::ctrRegistros();

			if ($registro == "Ok") {

				echo '<script>

				if(window.history.replaceState){

					window.history.replaceState(null, null, window.location.href);
				}

				</script>';

				echo '<div class="alert alert-success">El usuario ha sido registrado</div>';

					}

			if ($registro == "error") {

				echo '<script>

				if(window.history.replaceState){

					window.history.replaceState(null, null, window.location.href);
				}

				</script>';

				echo '<div class="alert alert-danger">Error, no se permiten caracteres especiales</div>';

					}



		?>

	</form>
</div>