<?php

if(!isset($_SESSION["validarIngreso"])){

		echo '<script>window.location = "ingreso";</script>';

		return;

	}else{

		if($_SESSION["validarIngreso"] != "ok"){

		echo '<script>window.location = "ingreso";</script>';
		
		return;

	}

}

$usuario = ControllerFormularios::ctrSeleccionarRegistros(null, null);


$actualizar = new ControllerFormularios();
$actualizar -> ctrActualizarRegistro();

?>


<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($usuario as $key => $value): ?>

			<tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo $value["nombre"]; ?></td>
			<td><?php echo $value["email"]; ?></td>
			<td><?php echo $value["fecha"]; ?></td>
			<td>
				<div class="btn-group">

					<div class="px-1">

					<a href="index.php?pagina=editar&token=<?php echo $value["token"]; ?>" class= "btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

					</div>

					<form method = "post">
					
					<input type="hidden" name="eliminarRegistro" value="<?php echo $value["token"]; ?>">

					<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
					
					</form>

					<?php

					$eliminar = new ControllerFormularios();
					$eliminar->ctrEliminarRegistro(); 
					 ?>

				</div>

			</td>

		</tr>

				
		<?php endforeach ?>	
		
	</tbody>
</table>