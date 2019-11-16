<?php
require_once('db/databases.php');
require_once('funciones.php');

class Registro
{
  protected $id;
  protected $nombre;
  protected $email;
  protected $password;
  protected $rePassword;
  protected $country;
  protected $avatar;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }
  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
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
  public function getRePassword()
  {
    return $this->rePassword;
  }

  public function setRePassword($rePassword)
  {
    $this->rePassword = $rePassword;
    return $this;
  }

  public function getPais()
  {
    return $this->country;
  }

  public function setPais($country)
  {
    $this->country = $country;
    return $this;
  }
  public function getAvatar()
  {
    return $this->avatar;
  }

  public function setAvatar($avatar)
  {
    $this->avatar = $avatar;
    return $this;
  }

  public function registrarUsuario()
  {
    $password = $this->hashearPassword($this->password);
    $this->setPassword($password);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(id, nombre , usuario, pass,imagen) values(null,'$this->nombre','$this->email','$this->password','$this->avatar')");
    return $sentencia->execute();
  }
  function usuarioExiste()
  {
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT usuario FROM usuarios WHERE usuario = $this->email LIMIT 1;");
    $sentencia->execute();
    return $sentencia->rowCount() > 0;
  }
  public function guardarImg()
  {
    // Obtengo la extensión del archivo
    $ext = pathinfo($this->avatar['name'], PATHINFO_EXTENSION);

    // Obtengo el archivo temporal
    $tempFile = $this->avatar['tmp_name'];

    // Armo el nombre de la imagen
    $finalName = uniqid('img_') . '.' . $ext;

    // Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
    $finalPath = IMAGE_PATH . $finalName;

    // Guardamos la imagen en nuestra carpeta
    move_uploaded_file($tempFile, $finalPath);


    // Retorno el nombre de la imagen para poder guardar el mismo en el JSON
    return $finalName;
  }
  function obtenerUsuarioPorCorreo()
  {
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT usuario, pass FROM usuarios WHERE usuario = :correo LIMIT 1;");
    $base_de_datos->bindValue(':correo', $this->email, PDO::PARAM_STR);
    $sentencia->execute();
    return $sentencia->fetchObject();
  }

  function login()
  {
    # Primero obtener usuario...
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo();
    if ($posibleUsuarioRegistrado === false) {
      # Si no existe, salimos y regresamos false
      return false;
    }
    # Esto se ejecuta en caso de que exista
    # Comprobar contraseñas
    # Sacar el hash que tenemos en la BD
    $passDeBaseDeDatos = $posibleUsuarioRegistrado->pass;
    $coinciden = coincidenPalabrasSecretas($this->pass, $passDeBaseDeDatos);
    # Si no coinciden, salimos de una vez
    if (!$coinciden) {
      return false;
    }
    # En caso de que sí hayan coincidido iniciamos sesión pasando el objeto
    iniciarSesion();
    # Y regresamos true ;)
    return true;
  }
  function iniciarSesion()
  {
    $_SESSION["correo"] = $this->email;
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

  public function registerValidate()
  {
    // Defino el array local de errores que voy a retornar
    $errors = [];

    // Si está vació el campo: $name
    if ($this->nombre == "") {
      $errors['name'] = 'El campo nombre no puede estar vacío';
    }
    // Si está vació el campo: $email
    if ($this->email == "") {
      $errors['email'] = 'El campo email es obligatorio';
    }
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) { // Si el campo $email NO es un formato de email válido
      $errors['email'] = 'Introducí un formato de email válido';
      // Si está vació el campo: $password
      if ($this->password == "") {
        $errors['password'] = 'El campo password es obligatorio';
      }
      // Si está vació el campo: $rePassword
      if ($this->rePassword == "") {
        $errors['rePassword'] = 'El campo repetir password es obligatorio';
      } 
      if ($this->password != $this->rePassword) { // Si el valor de los campos $password y $rePassword son distintos
        $errors['password'] = 'Las contraseñas no coinciden';
        $errors['rePassword'] = 'Las contraseñas no coinciden';
      }
      // Si está vació el campo: $country
      if ($this->country == "") {
        $errors['country'] = 'Elegí un país';
      }
      // Si no cargaron ningún archivo
      if ($this->avatar['error'] != UPLOAD_ERR_OK) {
        $errors['avatar'] = 'Subí una imagen';
      } else {
        // Si cargaron algún archivo, obtengo su extensión
        $ext = pathinfo($this->avatar['name'], PATHINFO_EXTENSION);
        // Si la extesión del archivo que cargaron NO está en mi array de formatos permitidos
        if (!in_array($ext, ALLOWED_IMAGE_FORMATS)) {
          $errors['avatar'] = 'Los formatos permitidos son JPG, PNG y GIF';
        }
      }
      $_SESSION['erroresReg'] = $errors;
      return $errors;
    }
  }
}
