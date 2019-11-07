<?php
include_once('validar.php');

$fileContent = file_get_contents("files/preguntas.json");
$pyrArray = json_decode($fileContent, true);
$longArray = count($pyrArray);

if (!isset($_SESSION['posicion'])) {
    $posicion = 0;
    $_SESSION['posicion'] = $posicion;
    $_SESSION['userLoged']['puntaje'] = 0;
} else {
    if ($_POST) {
        $rand = range(0, 2);
        shuffle($rand);
        foreach ($rand as $val) {
            $random[] = $val;
        }
        if ($_POST['rta'] == $pyrArray[$_SESSION['posicion']]["2"]) {
            $_SESSION['posicion']++;
            $_SESSION['userLoged']['puntaje']++;
        } else {
            $respuesta = "Su respuesta es incorrecta" . "<br>" . "Su puntaje " . $_SESSION['userLoged']['name'] . " es " . $_SESSION['userLoged']['puntaje'];
            guardarRanking();
        }
    }
    if ($_SESSION['posicion'] == $longArray) {
        header('location: exito.php');
        exit;
    }
}
$rand = range(0, 2);
shuffle($rand);
foreach ($rand as $val) {
    $random[] = $val;
}


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
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']][$random[0]] ?>"><?= $pyrArray[$_SESSION['posicion']][$random[0]] ?> <br>
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']][$random[1]] ?>"><?= $pyrArray[$_SESSION['posicion']][$random[1]] ?> <br>
        <input type="radio" name="rta" value="<?= $pyrArray[$_SESSION['posicion']][$random[2]] ?>"><?= $pyrArray[$_SESSION['posicion']][$random[2]] ?> <br>
        <br>
        <input type="submit" name="enviar" id="btnjuego"> <br>
        <div id="rta">
            <?php if (isset($respuesta)) : ?>
                <?= $respuesta; ?>
            <?php endif ?>
        </div>
    </form>
    <div id="progresbar" class="progress">
        <div class="progress-bar bg-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100">
          <span class="sr-only"></span>
        </div>
      </div>


</div>


<?php include("footer.php"); ?>

</body>

</html>