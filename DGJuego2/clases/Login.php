<?php
require_once('../validar.php');

class Loguin
{
    protected $usuario;
    protected $password;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function validarDatosLoguin()
    { 
        $errorsInLogin = [];
        if ($_POST) {
            // Persistimos el email con lo vino por $_POST
            $email = trim($_POST['email']);
        
            // La función loginValidate() nos retorna el array de errores que almacenamos en esta variable
            $errorsInLogin = loginValidate();
        
            if (!$errorsInLogin) {
                // Traemos al usuario que vamos a loguear
                $userToLogin = getUserByEmail($email);
        
                // Preguntamos si quiere ser recordado
                if (isset($_POST['rememberUser'])) {
                    setcookie('userLoged', $email, time() + 3000);
                }
        
                // Logeamos al usuario
                login($userToLogin);
            }
        }

    }
    public function validarEstadoUsuario() {
        if (isLogged()) {
            header('location: index.php');
            exit;
        }

    }
}