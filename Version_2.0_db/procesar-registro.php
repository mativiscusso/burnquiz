<?php
require_once('clases/Registro.php');

$errorsInRegister = [];

// Variables para persitir
$name = '';
$email = '';
$countryFromPost = '';

if ($_POST) {
	$registracion = new Registro();
	$registracion->setNombre($_POST['name']);
	$registracion->setEmail($_POST['email']);
	$registracion->setPassword($_POST['password']);
	$registracion->setRePassword($_POST['rePassword']);
	$registracion->setPais($_POST['country']);
	$registracion->setAvatar($_FILES['avatar']);

	// Las variables de persistencia les asigno el valor que vino de $_POST
	$_SESSION['nombre'] = $registracion->getNombre();
	$_SESSION['email'] = $registracion->getEmail();
	$_SESSION['country'] = $registracion->getPais();

	// La función registerValidate() nos retorna el array de errores que almacenamos en esta variable
	$errorsInRegister = $registracion->registerValidate();
	if (!$errorsInRegister) {

		// Guardo la imagen y obtengo el nombre aleatorio creado
		$imgName = $registracion->guardarImg();
		$_SESSION['avatar'] = $imgName;
		$registracion->setAvatar($imgName);
		$existe = $registracion->usuarioExiste();
		if ($existe) {
			echo "Lo siento, ya existe alguien registrado con ese correo";
			exit; # Salir para no ejecutar el siguiente código
		}
		$registracion->registrarUsuario();
		$registracion->iniciarSesion();
	} else header('location:registro.php');
}
