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

    public function loginValidate() {
        // Genero el array local de errores que retornaré al final
        $errors = [];
      
        // Trimeo los campos que recibo por $_POST
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
      
        // Si está vacío el campo: $email
        if ( empty($email) ) {
          $errors['email'] = 'El campo email es obligatorio';
        } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email no es un email válido
          $errors['email'] = 'Introducí un formato de email válido';
        } elseif ( !emailExist($email) ) { // Si no existe el email
          // $errors['email'] = 'Ese correo no está registrado en nuestra base de datos';
          $errors['email'] = 'Las credenciales no coinciden';
        } else {
          // Si pasamos las 3 validaciones anteriores, busco y  obtengo al usuario con el email que llegó por $_POST
          $theUser = getUserByEmail($email);
      
          // Si el password que recibí por $_POST NO coincide con el password hasheado que está guardado en el usuario
          if ( !password_verify($password, $theUser['password']) ) {
            $errors['password'] = 'Las credenciales no coinciden';
          }
        }
      
        // Si está vacío el campo: $password
        if ( empty($password) ) {
          $errors['password'] = 'El campo password es obligatorio';
        }
      
        // Retorno el array de errores con los mensajes de error
        return $errors;
      }
    public function validarEstadoUsuario() {
        if (isLogged()) {
            header('location: index.php');
            exit;
        }

    }
    function login($user) {
        // Del usuario que recibo saco la posición "password" pues no me interesa tenerla en sesión
        unset($user['password']);
      
        // Guardo en sesión al usuario que recibo por parámetro
        $_SESSION['userLoged'] = $user;
      
        // Redirecciono al perfil del usuario
        header('location: index.php');
        exit; // Siempre, después de una redirección se recomienda hacer un exit.
      }
      public function emailExist($email) {
        // Traigo a todos los usuarios
        $allUsers = getAllUsers();
      
        // Recorro el array de usuarios
        foreach ($allUsers as $oneUser) {
          // Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
          if ($oneUser['email'] == $email) {
            return true;
          }
        }
      
        // Si termino de recorrer el array y no se encontró al email que pasé como parámetro
        return false;
      }
}