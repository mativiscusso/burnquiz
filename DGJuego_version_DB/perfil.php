<?php
session_start();
// Incluimos el controlador del registro-login
// De esta manera tengo el scope a la funciones que necesito
require_once 'validar.php';

// Si no está logueda la persona la redirijo al login
if (!isLogged()) {
	header('location: login.php');
	exit;
}

$theUser = $_SESSION['userLoged'];
?>
<?php
function titulo()
{
	echo "Burn Quiz | Perfil";
}
?>

<?php include("header.php"); ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<br>
			<h2>Hi <?= $theUser['name']; ?></h2>
			<img id="imgusuario" src="files/avatars/<?= $theUser['avatar']; ?>" alt="imagen usuario">
			<br><br>
			<a href="#" class="btn btn-info"><?= $theUser['email']; ?></a><br>
			<a href="editarperfil.php" class="btn btn-danger">Editar información</a><br>
		</div>
	</div>
</div>


<?php include("footer.php"); ?>

</body>

</html>