<?php
$usuario = '';
$pass = '';
if ($_POST) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
}

include ('validar.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilosIndex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <title>Burn Quiz | LOGIN </title>
</head>
<body>
    <?php include("header.php"); ?>
    
        <div id="portada" class= "container-fluid">
                <form class="container" action="login.php" method="get">
                        <h1>Login</h1>
                        
                    <input class="completar" type="text" name="usuario" id="" placeholder="Email"><br>
                    <input class="completar" type="password" name="pass" id="" placeholder="Contraseña"><br>
                    <input class="check" type="checkbox" name="" id="">
                    <div class="a2" ><a href=""><p></p> Olvido su cotraseña o email?</p></a></div>
                    <div class="a2" ><a href=""><p></p> Aún no se ha registrado?</p></a></div>
                    <div class="btn"><input type="submit" value="Iniciar Sesión"><br></div>
                    <div class="parrafo"><p>Al hacer clic en Iniciar sesión, confirmo que he leído y acepto los Términos de servicio y la Política de privacidad de  ESTE JUEGO INCREIBLE</p></div>
            </form>
        </div>  
    
    <?php include("footer.php"); ?>
  
</body>
</html>