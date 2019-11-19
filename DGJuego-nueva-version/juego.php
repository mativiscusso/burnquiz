<?php
require_once('clases/Juego.php');
require_once('db/databases.php');
$db = obtenerBaseDeDatos();

function traerPreguntas(PDO $db, $posicion) {
    $consulta = $db->prepare("SELECT id, pregunta FROM preguntas WHERE id = $posicion LIMIT 1");
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerRtas(PDO $db, $id_preg) {
    $consulta = $db->prepare("SELECT respuesta, validacion, id_pregunta FROM respuestas WHERE id_pregunta = $id_preg");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerRtaC(PDO $db, $id_preg){
    $consulta = $db->prepare("SELECT respuesta, validacion FROM respuestas WHERE id_pregunta = $id_preg AND validacion = 'c' LIMIT 1");
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

if (!isset($_SESSION['posicion'])) {
    $posicion = 9;
    $_SESSION['posicion'] = $posicion;
    $_SESSION['puntaje'] = 0;
} else {
    if ($_POST) {
        if ($_POST['rta'] == $_SESSION['rtaC']['respuesta']) {
            $_SESSION['posicion']++;
            $_SESSION['puntaje']++;
        } else {
            $respuesta = "Su respuesta es incorrecta" . "<br>" . "Su puntaje " . $_SESSION['correo'] . " es " . $_SESSION['puntaje'];
            
        }
    }
    /* if ($_SESSION['posicion'] == $longArray) {
        header('location: exito.php');
        exit;
    } */
}
$pregunta = traerPreguntas($db, $_SESSION['posicion']);
$id_pregunta = $pregunta['id'];
$_SESSION['rta'] = traerRtas($db, $id_pregunta);
$_SESSION['rtaC'] = traerRtaC($db, $id_pregunta);

header("refresh:11; url=exito.php");

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
        <?= $pregunta['pregunta'] ?> <br>
        <br>
        <input type="radio" name="rta" value="<?= $_SESSION['rta'][0]['respuesta'] ?>"><?= $_SESSION['rta'][0]['respuesta'] ?> <br>
        <input type="radio" name="rta" value="<?= $_SESSION['rta'][1]['respuesta'] ?>"><?= $_SESSION['rta'][1]['respuesta'] ?> <br>
        <input type="radio" name="rta" value="<?= $_SESSION['rta'][2]['respuesta'] ?>"><?= $_SESSION['rta'][2]['respuesta'] ?> <br>
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