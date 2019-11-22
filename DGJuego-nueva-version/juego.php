<?php
require_once('clases/Juego.php');
require_once('db/databases.php');
$db = obtenerBaseDeDatos();

function traerPreguntas(PDO $db, $posicion)
{
    $consulta = $db->prepare("SELECT id, pregunta FROM preguntas WHERE id = $posicion LIMIT 1");
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerRtas(PDO $db, $id_preg)
{
    $consulta = $db->prepare("SELECT respuesta, validacion, id_pregunta FROM respuestas WHERE id_pregunta = $id_preg");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerRtaC(PDO $db, $id_preg)
{
    $consulta = $db->prepare("SELECT respuesta, validacion FROM respuestas WHERE id_pregunta = $id_preg AND validacion = 'c' LIMIT 1");
    $consulta->execute();
    $puntaje = $consulta->fetch(PDO::FETCH_ASSOC);
    return $puntaje;
}
function traerPuntajeUsuario(PDO $db, $usuario) {
    $consulta = $db->prepare("SELECT puntaje FROM usuarios WHERE usuario = '$usuario'");
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}
function guardarPuntaje(PDO $db, $puntaje, $puntajeViejo, $usuario)
{
    if ($puntajeViejo == null) {
        $puntajeViejo = 0;
    }
    $consulta = $db->prepare("UPDATE usuarios SET puntaje = :puntaje + :puntajeviejo WHERE usuarios.usuario = :usuario");
    $consulta->bindValue(':puntaje', $puntaje, PDO::PARAM_INT);
    $consulta->bindValue(':puntajeviejo', $puntajeViejo, PDO::PARAM_INT);
    $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
    return $consulta->execute();
}

if (!isset($_SESSION['vidas'])) {
    $vidas = 3;
    $_SESSION['vidas'] = $vidas;
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
            if ($_SESSION['vidas'] > 0) {
                $_SESSION['vidas']--;
                $_SESSION['posicion']++;
            } else {
                $respuesta = "Su respuesta es incorrecta" . "<br>" . "Su puntaje " . $_SESSION['correo'] . " es " . $_SESSION['puntaje'];
                $puntajeAnterior = traerPuntajeUsuario($db, $_SESSION['correo']);
                guardarPuntaje($db, $_SESSION['puntaje'], $puntajeAnterior['puntaje'], $_SESSION['correo']);
            }
        }
    }
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
    <h2>VIDAS: <?= $_SESSION['vidas'] ?></h2>
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