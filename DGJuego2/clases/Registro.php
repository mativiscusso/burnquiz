<?php
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

  public function validarEstadoUsuario()
  {
    if (isLogged()) {
      header('location: index.php');
      exit;
    }
  }

  public function registerValidate()
  {
    // Defino el array local de errores que voy a retornar
    $errors = [];

    // Si está vació el campo: $name
    if (empty($this->nombre)) {
      $errors['name'] = 'El campo nombre no puede estar vacío';
    }

    // Si está vació el campo: $email
    if (empty($this->email)) {
      $errors['email'] = 'El campo email es obligatorio';
    } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) { // Si el campo $email NO es un formato de email válido
      $errors['email'] = 'Introducí un formato de email válido';
    } elseif ($this->emailExist($this->email)) { // Si el email ya existe, es porque alguien ya se registró con el mismo
      $errors['email'] = 'Ese correo ya está registrado';
    }

    // Si está vació el campo: $password
    if (empty($this->password)) {
      $errors['password'] = 'El campo password es obligatorio';
    }

    // Si está vació el campo: $rePassword
    if (empty($this->rePassword)) {
      $errors['rePassword'] = 'El campo repetir password es obligatorio';
    } elseif ($this->password != $this->rePassword) { // Si el valor de los campos $password y $rePassword son distintos
      $errors['password'] = 'Las contraseñas no coinciden';
      $errors['rePassword'] = 'Las contraseñas no coinciden';
    }

    // Si está vació el campo: $country
    if (empty($this->country)) {
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

    // Finalmente retornamos el array de errores
    return $errors;
  }
  public function saveImage()
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
  public function saveUser()
  {

    // Hasheo el password del usuario
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);

    // Elimino de $_POST la posición "rePassword" ya que no me interesa guardar este dato en mi DB (Data Base)
    unset($_POST['rePassword']);

    // En la variable $finalUser guardo el array de $_POST
    $finalUser = new Registro;

    // Obtengo todos los usuarios
    $allUsers = getAllUsers();

    // En la última posición del array de usuarios, inserto al usuario nuevo
    $allUsers[] = $finalUser;

    // Guardo todos los usuarios de vuelta en el JSON
    file_put_contents(USERS_JSON_PATH, json_encode($allUsers));

    // Retorno al usuario que acabo de guardar para poder tenerlo listo y loguearlo
    return $finalUser;
  }
  public function userLogin($user)
  {
    // Guardo en sesión al usuario que recibo por parámetro
    $_SESSION['userLoged'] = $user;

    // Redirecciono al perfil del usuario
    header('location: index.php');
    exit; // Siempre, después de una redirección se recomienda hacer un exit.
  }
  public function emailExist()
  {
    // Traigo a todos los usuarios
    $allUsers = getAllUsers();
  
    // Recorro el array de usuarios
    foreach ($allUsers as $oneUser) {
      // Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
      if ($oneUser['email'] == $this->email) {
        return true;
      }
    }
}
}