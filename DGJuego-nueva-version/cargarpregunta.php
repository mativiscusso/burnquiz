<?php
session_start();
require_once('db/databases.php');
$db = obtenerBaseDeDatos();

$pregunta =  $_POST['pregunta'];
$rta1 = $_POST['rta1'];
$rta2 = $_POST['rta2'];
$rtaC = $_POST['rtaC'];



function cargarPregunta(PDO $db, $preg)
{
    $consulta = $db->prepare("INSERT INTO preguntas VALUES (NULL, :pregunta)");
    $consulta->bindValue(':pregunta', $preg, PDO::PARAM_STR);
    $consulta->execute();
    $id = $db->lastInsertId();
    return $id;
}
function cargarRespuesta(PDO $db, $rta, $validacion, $id)
{
    $consulta = $db->prepare("INSERT INTO respuestas VALUES (NULL, :respuesta, :validacion, :id)");
    $consulta->bindValue(':respuesta', $rta, PDO::PARAM_STR);
    $consulta->bindValue(':validacion', $validacion, PDO::PARAM_STR);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $consulta->execute();
}


$id_pregunta=cargarPregunta($db, $pregunta);
cargarRespuesta($db, $rta1, "i", $id_pregunta);
cargarRespuesta($db, $rta2, "i", $id_pregunta);
cargarRespuesta($db, $rtaC, "c", $id_pregunta);
header('location:abm.php');
