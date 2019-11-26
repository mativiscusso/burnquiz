<?php
require_once('db/databases.php');
require_once('funciones.php');

class Login
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
    return $usuario;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
    return $password;
  }

  function usuarioExiste()
  {
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT usuario FROM usuarios WHERE usuario = $this->usuario LIMIT 1;");
    $sentencia->execute();
    return $sentencia->rowCount() > 0;
  }
  function obtenerUsuarioPorCorreo()
  {
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT usuario, pass, imagen FROM usuarios WHERE usuario = '$this->usuario' LIMIT 1;");
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $resultado;
  }

  function loginUsuario()
  {
    # Primero obtener usuario...
    $posibleUsuarioRegistrado = $this->obtenerUsuarioPorCorreo();
    if ($posibleUsuarioRegistrado === false) {
      # Si no existe, salimos y regresamos false
      return false;
    }
    # Esto se ejecuta en caso de que exista
    # Comprobar contraseñas
    # Sacar el hash que tenemos en la BD
    $passDeBaseDeDatos = $posibleUsuarioRegistrado['pass'];
    $coinciden = $this->coincidenPalabrasSecretas($this->password, $passDeBaseDeDatos);
    # Si no coinciden, salimos de una vez
    if (!$coinciden) {
      return false;
    }
    # En caso de que sí hayan coincidido iniciamos sesión pasando el objeto

    $this->iniciarSesion($posibleUsuarioRegistrado);
    # Y regresamos true ;)
    return true;
  }
  function iniciarSesion($usuarioLog)
  {
    $_SESSION["correo"] = $usuarioLog['usuario'];
    $_SESSION['avatar'] = $usuarioLog['imagen'];
    header('location:index.php');
  }

  function coincidenPalabrasSecretas($pass, $passDeBaseDeDatos)
  {
    return password_verify($pass, $passDeBaseDeDatos);
  }
  function hashearPassword($pass)
  {
    return password_hash($pass, PASSWORD_BCRYPT);
  }

  public function loginValidate()
  {
    // Genero el array local de errores que retornaré al final
    $errors = [];

    // Si está vacío el campo: $email
    if ($this->usuario == "") {
      $errors['email'] = 'El campo email es obligatorio';
    }
      if ($this->password == "") {
        $errors['password'] = 'El campo password es obligatorio';
      }
      $_SESSION['errores'] =$errors;
      return $errors;
    
  }
}
