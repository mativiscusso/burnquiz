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
    function editUser($email){
        // Obtengo a todos los usuarios
        $allUsers = getAllUsers();
      
        // Recorro el array de usuarios
        foreach ($allUsers as $position => $oneUser) {
          // Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
          if ($oneUser['email'] == $email) {
            // Obtengo la posición en la cual se encuentra el usuario dentro del array de usuarios
            $userPosition = $position;
            // Obtengo al usuario completo
            $theUser = $oneUser;
          }
        }
      
        // Al usuario que obtuve, le vuelvo a setear los valores editados
        $theUser['name'] = $_POST['name'];
        $theUser['email'] = $_SESSION['userLoged']['email']; // El email siempre será el mismo
        $theUser['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $theUser['country'] = $_POST['country'];
        $theUser['avatar'] = $_POST['avatar'];
      
        // Guardo en la misma posición al usuario actualizado
        $allUsers[$userPosition] = $theUser;
      
        // Guardo todos los usuarios de vuelta en el JSON
        file_put_contents(USERS_JSON_PATH, json_encode($allUsers));
      
        // Retorno al usuario que acabo de editar para poder tenerlo listo y re-loguearlo
        return $theUser;
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
