<?php
require_once('clases/Juego.php');




?>

<?php
function titulo()
{
    echo "Burn Quiz | Juego";
}
?>

<?php include("header.php"); ?>
<div id="portada">
    <form id="juego" action="juego.php" method="POST">
        <?= $pyrArray[$_SESSION['posicion']]['pregunta'] ?> <br>
        <br>
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']]['rta1'] ?>"><?= $pyrArray[$_SESSION['posicion']]['rta1'] ?> <br>
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']]['rta2'] ?>"><?= $pyrArray[$_SESSION['posicion']]['rta2'] ?> <br>
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']]['rtaC'] ?>"><?= $pyrArray[$_SESSION['posicion']]['rtaC'] ?> <br>
        <br>
        <input type="submit" name="enviar" id="btnjuego"> <br>
        <div id="rta">
            <?php if (isset($respuesta)) : ?>
                <?= $respuesta; ?>
            <?php endif ?>
        </div>
    </form>


</div>


<?php include("footer.php"); ?>

</body>

</html>