<?php
require_once('clases/Login.php');

// Generamos nuestro array de errores interno
$errorsInLogin = [];
// Persistimos el email
$email = '';


if ($_POST) {
	// Persistimos el email con lo vino por $_POST
	$email = trim($_POST['email']);

	// La función loginValidate() nos retorna el array de errores que almacenamos en esta variable
	$errorsInLogin = loginValidate();

	if (!$errorsInLogin) {
		// Traemos al usuario que vamos a loguear
		$userToLogin = getUserByEmail($email);

		// Preguntamos si quiere ser recordado
		if (isset($_POST['rememberUser'])) {
			setcookie('userLoged', $email, time() + 3000);
		}

		// Logeamos al usuario
		login($userToLogin);
	}
}

?>


<?php
function titulo()
{
	echo "Burn Quiz | LOGIN";
}
?>

<?php include("header.php"); ?>

<!-- Register-Form -->
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<?php if (count($errorsInLogin) > 0) : ?>
				<div class="alert alert-danger">
					<ul>
						<?php foreach ($errorsInLogin as $oneError) : ?>
							<li> <?= $oneError; ?> </li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<h2>Formulario de Login</h2>

			<form method="post" class="py-2">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Correo electrónico:</b></label>
							<input type="text" name="email" class="form-control" value="<?= $email; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Password:</b></label>
							<input type="password" name="password" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="rememberUser">
								Recordarme
							</label>
						</div>
						<br>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary">Ingresar</button>
						¿Aún no tenés cuenta? <a href="register.php">Registrate</a>
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