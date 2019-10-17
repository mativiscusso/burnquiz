<?php
    $fileContent = file_get_contents("files/preguntas.json");
    $pyrArray = json_decode($fileContent, true);
if ($_POST) {
    $arrayNuevo = $_POST;
    $pyrArray[] = $arrayNuevo;
    file_put_contents("files/preguntas.json", json_encode($pyrArray));
    header('location: abm.php');exit;
}


?>