<?php
include ('validar.php');

if ($_POST) {
  validarRegistro ($_POST['nombre'],$_POST['apellido'],$usuario = $_POST['usuario'],$_POST['ciudad'],$_POST['provincia'],$_POST['pais']);
  validarPass ($_POST['pass'],$rpass = $_POST['rpass']);
  validarImg ($_FILES['imagenDePerfil']['error'],$_FILES['imagenDePerfil']['name'],$_FILES['imagenDePerfil']['tmp_name']);
      };


$nombre = '';
$apellido = '';
$usuario = '';
$pass = '';
$rpass = '';
$ciudad = '';
$provincia = '';
$pais = '';
$imagenDePerfil = '';

if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];
    $pais = $_POST['pais'];
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilosRegistro.css">
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <title>Burn Quiz | REGISTRO</title>
</head>
<body>
  <?php include("header.php"); ?>

        <div id="registro" class="container-fluid">
        <h1>REGISTRO</h1>   
        <form action="registro.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$nombre?>" required>
              <small class="text-muted">
              </small>
            </div>
            <div class="col-md-4 mb-3">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?=$apellido?>" required>
              <small class="text-muted">
              </small>
            </div>
            <div class="col-md-4 mb-3">
              <label for="usuario">Usuario</label>
              <div class="input-group">
                <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?=$usuario?>" aria-describedby="inputGroupPrepend" required>
                <small class="text-muted">
                  </small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="contra">Contraseña</label>
              <input type="password" id="contra" class="form-control mx-sm-3" name="pass" value="<?=$pass?>" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
              </small>
            </div>
            <div class="form-group" id="contra2">
              <label for="rcontra">Repetir Contraseña</label>
              <input type="password" id="rcontra" class="form-control mx-sm-3" name="rpass" value="<?=$rpass?>" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
              </small>
            </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="ciudad">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?=$ciudad?>" required>
              <small class="text-muted">
              </small>
            </div>
            <div class="col-md-3 mb-3">
              <label for="provincia">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="<?=$provincia?>" required>
              <small class="text-muted">
              </small>
              </div>
              <div class="col-md-3 mb-3">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais" placeholder="País" value="<?=$pais?>" required>
                <small class="text-muted">
              </small>
              </div>
              <div class="col-md-12 mb-3">
                <label class="imagenDePerfil"for="imagenDePerfil" id="imagenDePerfil">Foto de perfil</label>
                <input type="file" class="form-control" id="imagenDePerfil" name="imagenDePerfil" placeholder="imagenDePerfil" value="<?=$imagenDePerfil?>" required>
                <small class="text-muted">
              </small>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Acepto terminos y condiciones.
                </label>
                <div class="invalid-feedback">
                  Tienes que aceptar antes de enviar.
                </div>
            <button type="submit" class="btn-primary">Registrarse</button>
            </form>
            </div>
          </div>
        </div>
        </div>
<?php include("footer.php"); ?>

</body>
</html>