<?php
include_once('validar.php');
<<<<<<< HEAD
include('pyr.php');
$_SESSION['posicion'] = 0;
$posicion = $_SESSION['posicion'];
if($_POST) {
    if ($_POST['rta'] == $pyrArray [$posicion]['rtaC']) {
        $respuesta = "Su respuesta es Correcta"; 
        $posicion = $posicion + 1;

    }
    else {
        $respuesta = "Su respuesta es incorrecta";
    }
=======

$fileContent = file_get_contents("files/preguntas.json");
$pyrArray = json_decode($fileContent, true);
$longArray = count($pyrArray);

if(!isset($_SESSION['posicion'])) {
    $posicion = 0;
    $_SESSION['posicion'] = $posicion;
    $_SESSION['userLoged']['puntaje'] = 0;
} else { 
        if($_POST) {
            if ($_POST['rta'] == $pyrArray [$_SESSION['posicion']]['rtaC']) {
                $_SESSION['posicion']++;
                $_SESSION['userLoged']['puntaje']++; 
            }
            else {
                $respuesta = "Su respuesta es incorrecta" . "<br>"."Su puntaje ". $_SESSION['userLoged']['name']." es ". $_SESSION['userLoged']['puntaje'];
                guardarRanking();

            }
        }
        if ($_SESSION['posicion'] == $longArray) {
            header ('location: exito.php'); exit;
        }     
>>>>>>> 6d92e442309d72b88fca98d19ae7117db2657da5
}


?>

<?php    
    function titulo(){
      echo "Burn Quiz | Juego";
    }
    ?>

  <?php include("header.php"); ?>
    <div id="portada">
        <form id="juego" action="juego.php" method="POST">
            <?=$pyrArray[$_SESSION['posicion']]['pregunta']?> <br>
            <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$_SESSION['posicion']]['rta1']?>"><?=$pyrArray[$_SESSION['posicion']]['rta1']?> <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$_SESSION['posicion']]['rta2']?>"><?=$pyrArray[$_SESSION['posicion']]['rta2']?> <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$_SESSION['posicion']]['rtaC']?>"><?=$pyrArray[$_SESSION['posicion']]['rtaC']?> <br>
            <br>
            <input type="submit" name="enviar" id="btnjuego"> <br>
            <div id="rta">
            <?php if(isset($respuesta)):?>
            <?= $respuesta;?>
            <?php endif ?>
            </div>  
         </form>

     
    </div>
  

<?php include("footer.php"); ?>

</body>
</html>