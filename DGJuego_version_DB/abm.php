<?php
session_start();
require_once('db/databases.php');
$db = obtenerBaseDeDatos();
function titulo()
{
    echo "Burn Quiz | Ranking";
}
function ranking(PDO $db)
{
    $consulta = $db->prepare("SELECT nombre, usuario, puntaje FROM usuarios ORDER BY puntaje DESC");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerPreguntas(PDO $db)
{
    $consulta = $db->prepare("SELECT id, pregunta FROM preguntas");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
function traerRtas(PDO $db)
{
    $consulta = $db->prepare("SELECT id, respuesta, validacion,id_pregunta FROM respuestas");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
$preguntas = traerPreguntas($db);
$respuestas = traerRtas($db);
$ranking = ranking($db);
$a = 1;


?>

<?php include("header.php"); ?>
<div class="container py-5">
    <h3>
        <p class="descripcion">PANEL DE ADMINISTRADOR</p>
    </h3>
</div>

<div class="container py-1">
    <table class="table table-hover">
        <thead>
        <tr class="table-warning">
            <th scope="col">#</th>
            <th scope="col">Pregunta</th>
            </tr>
        </thead>
        <?php foreach($preguntas as $pregunta):?>
            <tbody>
                <tr>
                    <th scope="row"><?=$pregunta['id']?></th>
                    <td><?=$pregunta['pregunta']?></td>
                    <td><button type="button" class="btn btn-warning btn-sm">Modificar</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                </tr>
            </tbody>
        <?php endforeach;?>
    </table>
</div>
<div class="container py-1">
    <table class="table table-hover">
        <thead>
        <tr class="table-warning">
            <th scope="col">#</th>
            <th scope="col">Respuesta</th>
            <th scope="col">Validacion</th>
            <th scope="col">N° Pregunta</th>
            </tr>
        </thead>
        <?php foreach($respuestas as $respuesta):?>
            <tbody>
                <tr>
                    <th scope="row"><?=$respuesta['id']?></th>
                    <td><?=$respuesta['respuesta']?></td>
                    <td><?=$respuesta['validacion']?></td>
                    <td><?=$respuesta['id_pregunta']?></td>
                    <td><button type="button" class="btn btn-warning btn-sm">Modificar</button></td>
                    <td><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                </tr>
            </tbody>
        <?php endforeach;?>
    </table>

</div>


<?php include("footer.php"); ?>

</body>

</html>
<th scope="col">Respuesta 1</th>
      <th scope="col">Respuesta 2</th>
      <th scope="col">Respuesta Correcta</th>