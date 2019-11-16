<?php
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

require_once ('header.php');
require_once('funciones.php');
function titulo()
{
	echo "Burn Quiz | REGISTRO";
}
?>
<!-- Register-Form -->
<div class="container" style="margin-top:30px; margin-bottom: 30px;">
	<div class="row justify-content-center">
		<div class="col-md-10">
				<div class="alert alert-danger">
					<ul>
					<?php mostrarErrores($_SESSION['erroresReg']) ?>
					</ul>
				</div>



			<h2>Formulario de registro</h2>

			<form method="post" enctype="multipart/form-data" action="procesar-registro.php">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Nombre completo:</b></label>
							<input type="text" name="name" class="form-control <?= isset($_SESSION['erroresReg']['name']) ? 'is-invalid' : null ?>" value="<?= isset($_SESSION['nombre']); ?>">
							<div class="invalid-feedback">
								<?= isset($_SESSION['erroresReg']['name']) ? $_SESSION['erroresReg']['name'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Correo electrónico:</b></label>
							<input type="text" name="email" class="form-control <?= isset($_SESSION['erroresReg']['email']) ? 'is-invalid' : null ?>" value="<?= isset($_SESSION['email']); ?>">
							<div class="invalid-feedback">
								<?= isset($_SESSION['erroresReg']['email']) ? $_SESSION['erroresReg']['email'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Password:</b></label>
							<input type="password" name="password" class="form-control <?= isset($_SESSION['erroresReg']['password']) ? 'is-invalid' : null ?>">
							<div class="invalid-feedback">
								<?= isset($_SESSION['erroresReg']['password']) ? $_SESSION['erroresReg']['password'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Repetir Password:</b></label>
							<input type="password" name="rePassword" class="form-control <?= isset($_SESSION['erroresReg']['rePassword']) ? 'is-invalid' : null; ?>">
							<div class="invalid-feedback">
								<?= isset($_SESSION['erroresReg']['rePassword']) ? $_SESSION['erroresReg']['rePassword'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>País de nacimiento:</b></label>
							<select name="country" class="form-control <?= isset($_SESSION['erroresReg']['country']) ? 'is-invalid' : null; ?>">
								<option value="">Elegí un país</option>
								<?php foreach ($countries as $code => $country) : ?>
									<option>
										<?= $country ?>
									</option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?= isset($_SESSION['erroresReg']['country']) ? $_SESSION['erroresReg']['country'] : null; ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label><b>Imagen de perfil:</b></label>
							<div class="custom-file">
								<input type="file" name="avatar" class="custom-file-input <?= isset($_SESSION['erroresReg']['avatar']) ? 'is-invalid' : null; ?>">
								<label class="custom-file-label">Choose file...</label>
								<div class="invalid-feedback">
									<?= isset($_SESSION['erroresReg']['avatar']) ? $_SESSION['erroresReg']['avatar'] : null; ?>
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