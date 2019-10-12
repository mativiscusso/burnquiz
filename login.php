<?php
include('validar.php');

if ($_POST) {
    validarLogin ($_POST['usuario'], $_POST['pass']);    
    }

    
$usuario = '';
$pass = '';
if ($_POST) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
}



?>

<?php
    function titulo(){
      echo "Burn Quiz | LOGIN";
    }
    ?>

    <?php include("header.php"); ?>
    
        <div id="portada" class= "container-fluid">
                <form class="container" action="login.php" method="POST">
                        <h1>Login</h1>
                      
                    <input class="completar" type="text" name="usuario" id="" placeholder="Email"><br>
                    
                    <input class="completar" type="password" name="pass" id="" placeholder="Contraseña"><br>
                    
                    <br>    
                    <input class="check" type="checkbox" name="recordar" id="Recordarme" checked>Recordarme
                    <div class="a2"><a href="recuperar.php"><p> Olvido su contraseña o email?</p></a></div>
                    <div class="a2"><a href="registro.php"><p> Aún no se ha registrado?</p></a></div>
                    <input type="submit" value="Iniciar Sesión">
                    <div class="parrafo"><p>Al hacer clic en Iniciar sesión, confirmo que he leído y acepto los Términos de servicio y la Política de privacidad de  ESTE JUEGO INCREIBLE</p></div>
            </form>
        </div>  
    
    <?php include("footer.php"); ?>
  
</body>
</html>