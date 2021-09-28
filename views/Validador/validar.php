<?php

if(isset($_POST['submit'])){
	
	if(empty($nombre)){
		echo "<p class='error'>* Agrega tu nombre </p>";
	}else{
		if (strlen($nombre) > 15 ) {
			echo "<p class='error'>* El nombre es muy largo </p>";
		} 

	}
	
	if(empty($email)){
		echo "<p class='error'>* Agrega tu correo </p>";

	}else{
		if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
			echo "<p class='error'>* El correo es incorrecto</p>";
		}
	}

	if(empty($password)){
		echo "<p class='error'>* Agrega tu password </p>";

	}else{
		if (strlen($password) > 10 ) {
			echo "<p class='error'>* La contraseña es muy larga.... </p>";
		}
	}
					
}