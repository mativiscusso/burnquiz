<?php
require_once('../funciones.php');

class Juego
{
    protected $preguntas;
    protected $respuestas;
    protected $posiciones;
    protected $logueo;
    protected $abm;

    public function getPreguntas()
    {
        return $this->preguntas;
    }

    public function setPreguntas($preguntas)
    {
        $this->preguntas = $preguntas;
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

    public function getPosiciones()
    {
        return $this->posiciones;
    }

    public function setPosiciones($posiciones)
    {
        $this->posiciones = $posiciones;
        return $this;
    }

    public function getLogueo()
    {
        return $this->logueo;
    }

    public function setLogueo($logueo)
    {
        $this->logueo = $logueo;
        return $this;
    }

    public function getAbm()
    {
        return $this->abm;
    }

    public function setAbm($abm)
    {
        $this->abm = $abm;
        return $this;
    }

    public function correrJuego()
    {
        $fileContent = file_get_contents("../files/preguntas.json");
        $pyrArray = json_decode($fileContent, true);
        $longArray = count($pyrArray);


        if (!isset($_SESSION['posicion'])) {
            $posicion = 0;
            $_SESSION['posicion'] = $posicion;
            $_SESSION['userLoged']['puntaje'] = 0;
        } else {
            if ($_POST) {
                if ($_POST['rta'] == $pyrArray[$_SESSION['posicion']]['rtaC']) {
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
    }
}
