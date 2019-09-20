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
<header> 
  <nav id="menu" class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span id="iconboton" class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registro.php">REGISTRO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">CONTACTO</a>
                </li>  
              </ul>
              <span class="navbar-text">
                <img src="img/burnquiz_logow.png" width="10%" alt="">
              </span>
            </div>
          </nav>
   </header>
        <div id="registro" class="container-fluid">
        <h1>REGISTRO</h1>   
        <form action="validar.php" method="POST" class="needs-validation" novalidate>
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Nombre</label>
              <input type="text" class="form-control" id="validationCustom01" name="nombre" placeholder="Nombre" required>
              <div class="valid-feedback">
                Se ve bien!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustom02">Apellido</label>
              <input type="text" class="form-control" id="validationCustom02" name="apellido" placeholder="Apellido" required>
              <div class="valid-feedback">
              Se ve bien!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" name="usuario" placeholder="Usuario" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Por favor elige un nombre de usuario valido.
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword6">Contraseña</label>
              <input type="password" id="inputPassword6" class="form-control mx-sm-3" name="contra" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
                Debe tener entre 8-20 caracteres.
              </small>
            </div>
            <div class="form-group" id="contra2">
              <label for="inputPassword6">Repetir Contraseña</label>
              <input type="password" id="inputPassword6" class="form-control mx-sm-3" name="rcontra" aria-describedby="passwordHelpInline">
              <small id="passwordHelpInline" class="text-muted">
                Debe tener entre 8-20 caracteres.
              </small>
            </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom03">Ciudad</label>
              <input type="text" class="form-control" id="validationCustom03" name="ciudad" placeholder="Ciudad" required>
              <div class="invalid-feedback">
                  Por favor elige una ciudad valida.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationCustom04">Provincia</label>
              <input type="text" class="form-control" id="validationCustom04" name="provincia" placeholder="Provincia" required>
                <div class="invalid-feedback">
                    Por favor elige una provincia valida.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom05">País</label>
                <input type="text" class="form-control" id="validationCustom05" name="pais" placeholder="País" required>
                <div class="invalid-feedback">
                  Por favor elige un país valido.
                </div>
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
            <button type="submit" style="margin-left: 20px; background-color: rgb(165,0,0); border-color: rgb(165,0,0);" class="btn btn-primary">Registrarse</button>
            </form>
            </div>
          </div>
        </div>
        </div>
    <footer>
          <div id="contacto" class="container-fluid py-3">
            <span>BURN QUIZ | Un juego para pensar</span>
            
          </div>
    </footer>
</body>
</html>