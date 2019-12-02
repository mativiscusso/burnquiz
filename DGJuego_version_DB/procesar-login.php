<?php
require_once('clases/Login.php');

// Generamos nuestro array de errores interno
$errorsInLogin = [];



if ($_POST) {
	$login = new Login();
	$login->setUsuario($_POST['email']);
	$login->setPassword($_POST['password']);

	// Persistimos el email con lo vino por $_POST
	$email = $login->getUsuario();

	// La función loginValidate() nos retorna el array de errores que almacenamos en esta variable
    $errorsInLogin = $login->loginValidate();
    

	if (!$errorsInLogin) {

		// Preguntamos si quiere ser recordado
		if (isset($_POST['rememberUser'])) {
			setcookie('userLoged', $login->getUsuario(), time() + 3000);
		}

		// Logeamos al usuario
		$login->usuarioExiste();
		$login->loginUsuario();

	} else header('location:login.php');
}