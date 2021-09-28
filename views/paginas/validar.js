var nombre = document.getElementById('nombre');
var email = document.getElementById('email');
var password = document.getElementById('pwd');
var error = document.getElementById('error');
error.style.color = 'red';

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

	return false;
}


