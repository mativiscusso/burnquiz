<?php
require_once('clases/Registro.php');



$countries = [
	'ar' => 'Argentina',
	'bo' => 'Bolivia',
	'br' => 'Brasil',
	'co' => 'Colombia',
	'cl' => 'Chile',
	'ec' => 'Ecuador',
	'pa' => 'Paraguay',
	'pe' => 'Perú',
	'uy' => 'Uruguay',
	've' => 'Venezuela',
];

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
	$name = $registracion->getNombre();
	$email = $registracion->getEmail();
	$countryFromPost = $registracion->getPais();

	// La función registerValidate() nos retorna el array de errores que almacenamos en esta variable
	$errorsInRegister = $registracion->registerValidate();

	// Si no hay errores en el registro
	// Cuando no hay errores guardo la imagen y los datos
	// if ( count($errorsInRegister) == 0 ) {
	if (!$errorsInRegister) {

		// Guardo la imagen y obtengo el nombre aleatorio creado
		$imgName = $registracion->saveImage();

		// Creo en $_POST una posición "avatar" para guardar el nombre de la imagen
		$_POST['avatar'] = $imgName;

		// Guardo al usuario en el archivo JSON, y me devuelve al usuario que guardó en array
		$theUser = $registracion->saveUser();

		// Al momento en que se registar vamos a mantener la sesión abierta
		setcookie('userLoged', $theUser['email'], time() + 3000);

		// Logueo al usuario
		$registracion->userLogin($theUser);
	}
}


require_once 'header.php';
?>
<?php
function titulo()
{
	echo "Burn Quiz | REGISTRO";
}
?>
<!-- Register-Form -->
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<?php if (count($errorsInRegister) > 0) : ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach ($errorsInRegister as $oneError) : ?>
							<li> <?= $oneError; ?> </li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>


			<h2>Formulario de registro</h2>

			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Nombre completo:</b></label>
							<input type="text" name="name" class="form-control <?= isset($errorsInRegister['name']) ? 'is-invalid' : null ?>" value="<?= $name; ?>">
							<div class="invalid-feedback">
								<?= isset($errorsInRegister['name']) ? $errorsInRegister['name'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Correo electrónico:</b></label>
							<input type="text" name="email" class="form-control <?= isset($errorsInRegister['email']) ? 'is-invalid' : null ?>" value="<?= $email; ?>">
							<div class="invalid-feedback">
								<?= isset($errorsInRegister['email']) ? $errorsInRegister['email'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Password:</b></label>
							<input type="password" name="password" class="form-control <?= isset($errorsInRegister['password']) ? 'is-invalid' : null ?>">
							<div class="invalid-feedback">
								<?= isset($errorsInRegister['password']) ? $errorsInRegister['password'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Repetir Password:</b></label>
							<input type="password" name="rePassword" class="form-control <?= isset($errorsInRegister['rePassword']) ? 'is-invalid' : null; ?>">
							<div class="invalid-feedback">
								<?= isset($errorsInRegister['rePassword']) ? $errorsInRegister['rePassword'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>País de nacimiento:</b></label>
							<select name="country" class="form-control <?= isset($errorsInRegister['country']) ? 'is-invalid' : null; ?>">
								<option value="">Elegí un país</option>
								<?php foreach ($countries as $code => $country) : ?>
									<option value="<?= $code ?>" <?= $code == $countryFromPost ? 'selected' : null; ?>>
										<?= $country ?>
									</option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?= isset($errorsInRegister['country']) ? $errorsInRegister['country'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Imagen de perfil:</b></label>
							<div class="custom-file">
								<input type="file" name="avatar" class="custom-file-input <?= isset($errorsInRegister['avatar']) ? 'is-invalid' : null; ?>">
								<label class="custom-file-label">Choose file...</label>
								<div class="invalid-feedback">
									<?= isset($errorsInRegister['avatar']) ? $errorsInRegister['avatar'] : null; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary">Registrarse</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- //Register-Form -->
<?php include("footer.php"); ?>

</body>

</html>