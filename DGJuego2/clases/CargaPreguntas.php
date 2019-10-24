<?php
require_once('../validar.php');

class CargaPreguntas
{
    protected $pregunta;
    protected $respuestas;

    public function getPregunta()
    {
        return $this->pregunta;
    }

    public function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;
        return $this;
    }

    public function getRespuestas()
    {
        return $this->respuestas;
    }

    public function setRespuestas($respuestas)
    {
        $this->respuestas = $respuestas;
        return $this;
    }


    public function cargarPreguntas()
    { 
        $fileContent = file_get_contents("files/preguntas.json");
        $pyrArray = json_decode($fileContent, true);
    if ($_POST) {
        $arrayNuevo = $_POST;
        $pyrArray[] = $arrayNuevo;
        file_put_contents("files/preguntas.json", json_encode($pyrArray));
        header('location: abm.php');exit;
    }
    }
}