<?php
require_once('validar.php');

class Ranking
{
    protected $usuario;
    protected $puntaje;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getPuntaje()
    {
        return $this->puntaje;
    }

    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;
        return $this;
    }

    public function mostrarRanking()
    {
        $fileContent = file_get_contents("files/ranking.json");
        $allUsers = json_decode($fileContent, true);
        for ($i = 0; $i < count($allUsers); $i++) {
            echo $allUsers[$i]['userLoged']['name'] . " | " . "Puntos: " . $allUsers[$i]['userLoged']['puntaje'] . "<br>";
        }
    }
}