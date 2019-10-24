<?php
require_once('../validar.php');

class Usuario
{
    protected $usuario;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }


    public function jugar(Juego)
    { }
    public function registrarse(Registro)
    { }
    public function loguearse(Login)
    { }
    public function cargarPreguntas(CargaPreguntas)
    { }
}
