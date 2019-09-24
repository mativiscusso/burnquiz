<?php
$nombre = '';
$apellido = '';
$usuario = '';
$pass = '';
$rpass = '';
$ciudad = '';
$provincia = '';
$pais = '';

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

$validCampo = "";
$validApellido = "";
$validUsuario = "";
$validTel = "";
$retorno = "";
$retornoE = '';

if ($_POST) {
        if ($_POST['nombre'] == "") {
          $validCampo = "El campo esta vacio";
        }
        if ($_POST['apellido'] == "") {
          $validCampo = "El campo esta vacio";
        }
        if ($_POST['ciudad'] == "") {
          $validCampo = "El campo esta vacio";
        }
        if ($_POST['provincia'] == "") {
          $validCampo = "El campo esta vacio";
        }
        if ($_POST['ciudad'] == "") {
          $validCampo = "El campo esta vacio";
        }
        if (filter_var($_POST['usuario'], FILTER_VALIDATE_EMAIL) == false) {
          $validUsuario = "El campo no contiene un email correcto";
        }
        if (($_POST['pass'] == "") && ($_POST['rpass'] == "")) {
          $retorno = "Los dos campos de contraseña estan vacios";
        } else if ($_POST['pass'] == "") {
          $retorno = "La contraseña esta vacia";
        } else if ($_POST['rpass'] == "") {
          $retorno = "Falta la confirmacion de contraseña";
        } else if ($_POST['pass'] != $_POST['rpass']) {
          $retorno = "Las contraseñas no verifican";
        }
        else {  $retornoE = "El registro fue exitoso";
                header('refresh:3; url= index.php'); }
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilosRegistro.css">
    <link rel="stylesheet" href="css/estilosIndex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <title>Burn Quiz | REGISTRO</title>
</head>
<body>
  <?php include("header.php"); ?>

        <div id="registro" class="container-fluid">
        <h1>REGISTRO</h1>   
        <form action="registro.php" method="POST" class="needs-validation" novalidate>
          <?=$retornoE?>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$nombre?>" required>
              <small class="text-muted">
              <?=$validCampo?>.
              </small>
            </div>
            <div class="col-md-4 mb-3">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?=$apellido?>" required>
              <small class="text-muted">
              <?=$validCampo?>.
              </small>
            </div>
            <div class="col-md-4 mb-3">
              <label for="usuario">Usuario</label>
              <div class="input-group">
                <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?=$usuario?>" aria-describedby="inputGroupPrepend" required>
                <small class="text-muted">
                <?=$validUsuario?>
                </small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="contra">Contraseña</label>
              <input type="password" id="contra" class="form-control mx-sm-3" name="pass" value="<?=$pass?>" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
              <?=$retorno?>
              </small>
            </div>
            <div class="form-group" id="contra2">
              <label for="rcontra">Repetir Contraseña</label>
              <input type="password" id="rcontra" class="form-control mx-sm-3" name="rpass" value="<?=$rpass?>" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
              <?=$retorno?>.
              </small>
            </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="ciudad">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?=$ciudad?>" required>
              <small class="text-muted">
              <?=$validCampo?>.
              </small>
            </div>
            <div class="col-md-3 mb-3">
              <label for="provincia">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="<?=$provincia?>" required>
              <small class="text-muted">
              <?=$validCampo?>.
              </small>
              </div>
              <div class="col-md-3 mb-3">
                <label for="pais">País</label>
                <input type="text" class="form-control" id="pais" name="pais" placeholder="País" value="<?=$pais?>" required>
                <small class="text-muted">
              <?=$validCampo?>.
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
          <!-- <script>
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script>
      </div>
    </div>
 -->
<?php include("footer.php"); ?>

</body>
</html>