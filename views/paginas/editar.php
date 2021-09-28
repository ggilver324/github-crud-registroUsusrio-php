<?php

if(isset($_GET["token"])){

	$item = "token";
	$valor = $_GET["token"];

	$usuario = ControllerFormularios::ctrSeleccionarRegistros($item, $valor);
	//var_dump($usuario);

}			

?>

<div class="d-flex justify-content-center">
	<form class="p-5 bg-light" method="post">
		<div class="form-group">

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fad fa-user"></i></span>
				</div>

				<input type="text" class="form-control" value="<?php echo $usuario["nombre"] ?>" placeholder="Escriba su nombre" id="nombre" name="actualizarNombre">
			</div>
		</div>
		
		<div class="form-group">

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fal fa-envelope"></i></span>
				</div>

				<input type="email" class="form-control" value="<?php echo $usuario["email"] ?>" placeholder="Escriba su email" id="email" name="actualizarEmail">
			</div>
		</div>
			
		<div class="form-group">

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-lock-alt"></i></span>
				</div>
	
				<input type="password" class="form-control" placeholder="Escriba su password" id="pwd" name="actualizarPassword">

				<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"] ?>">
				<input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"] ?>">

			</div>
			
		</div>

		<?php
			
		$actualizar = ControllerFormularios::ctrActualizarRegistro();


		if($actualizar == "ok"){

			echo '<script>

			if(window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido actualizado correctamente</div>';

		}
		/*
		<script>

				setTimeout(function(){

					window.location = "index.php?pagina=inicio";

				},10);


			<script>*/

		if($actualizar == "error"){

			echo '<script>

			if(window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}

			</script>';

			echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';

		}

		?>


		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>