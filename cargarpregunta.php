<?php
include('database.php');

$pregunta =  $_POST['pregunta'];

function cargarPregunta(PDO $db, $pregunta) {
    $consulta = $db->prepare("INSERT INTO preguntas VALUES (NULL, :pregunta)");
    $consulta->bindValue(':pregunta', $pregunta, PDO::PARAM_STR);
    $consulta->execute();
}

cargarPregunta($db, $pregunta);

header('location:abm.php');

?>