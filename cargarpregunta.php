<?php
include('database.php');

$pregunta =  $_POST['pregunta'];

function cargarPregunta(PDO $db, $pregunta) {
    $consulta = $db->prepare("INSERT INTO preguntas VALUES (NULL, :pregunta)");
    $consulta->bindValue(':pregunta', $pregunta, PDO::PARAM_STR);
    $consulta->execute();
}

$rta1 =  $_POST['0'];
$rta2 =  $_POST['1'];
$rtaC =  $_POST['2'];


function cargarRta(PDO $db, $rta, $val, $idPreg) {
    $consulta = $db->prepare("INSERT INTO  respuestas VALUES (NULL, :respuesta, :validacion, :idpregunta)");
    $consulta->bindValue(':respuesta', $rta, PDO::PARAM_STR);
    $consulta->bindValue(':validacion', $val, PDO::PARAM_STR);
    $consulta->bindValue(':idpregunta', $idPreg, PDO::PARAM_INT);
    $consulta->execute();
}


cargarPregunta($db, $pregunta);
cargarRta($db, $rta1, "no", null);
cargarRta($db, $rta2, "no", null);
cargarRta($db, $rtaC, "si", null);


header('location:abm.php');

?>