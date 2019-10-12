<?php
include('pyr.php');
$posicion = 0;
if($_POST) {
    if ($_POST['rta'] == $pyrArray [$posicion]['rtaC']) {
        $respuesta = "Su respuesta es Correcta"; 
    }
    else {
        $respuesta = "Su respuesta es incorrecta";
    }
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
            <?=$pyrArray[$posicion]['pregunta']?> <br>
            <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$posicion]['rta1']?>"><?=$pyrArray[$posicion]['rta1']?> <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$posicion]['rta2']?>"><?=$pyrArray[$posicion]['rta2']?> <br>
            <input type="radio" name="rta" value="<?=$pyrArray[$posicion]['rtaC']?>"><?=$pyrArray[$posicion]['rtaC']?> <br>
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