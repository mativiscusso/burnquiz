<?php
require_once('../validar.php');

class Registro
{
    protected $nombre;
    protected $email;
    protected $password;
    protected $pais;
    protected $imagen;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

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

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }

    public function setCodigoPostal($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }

    public function validarEstadoUsuario()
    {
        if (isLogged()) {
            header('location: index.php');
            exit;
        }
    }
    public function registerValidate(){
        // Defino el array local de errores que voy a retornar
        $errors = [];
      
        // Definimos las variables locales que almacenan lo que nos llegó por $_POST y $_FILES
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $rePassword = trim($_POST['rePassword']);
        $country = $_POST['country'];
        $avatar = $_FILES['avatar'];
      
        // Si está vació el campo: $name
        if ( empty($name) ) {
          $errors['name'] = 'El campo nombre no puede estar vacío';
        }
      
        // Si está vació el campo: $email
        if ( empty($email) ) {
          $errors['email'] = 'El campo email es obligatorio';
        } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email NO es un formato de email válido
          $errors['email'] = 'Introducí un formato de email válido';
        } elseif ( emailExist($email) ) { // Si el email ya existe, es porque alguien ya se registró con el mismo
          $errors['email'] = 'Ese correo ya está registrado';
        }
      
        // Si está vació el campo: $password
        if ( empty($password) ) {
          $errors['password'] = 'El campo password es obligatorio';
        }
      
        // Si está vació el campo: $rePassword
        if ( empty($rePassword) ) {
          $errors['rePassword'] = 'El campo repetir password es obligatorio';
        } elseif ($password != $rePassword) { // Si el valor de los campos $password y $rePassword son distintos
          $errors['password'] = 'Las contraseñas no coinciden';
          $errors['rePassword'] = 'Las contraseñas no coinciden';
        }
      
        // Si está vació el campo: $country
        if ( empty($country) ) {
          $errors['country'] = 'Elegí un país';
        }
      
        // Si no cargaron ningún archivo
        if ( $avatar['error'] != UPLOAD_ERR_OK ) {
          $errors['avatar'] = 'Subí una imagen';
        } else {
          // Si cargaron algún archivo, obtengo su extensión
          $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
      
          // Si la extesión del archivo que cargaron NO está en mi array de formatos permitidos
          if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) {
            $errors['avatar'] = 'Los formatos permitidos son JPG, PNG y GIF';
          }
        }
      
        // Finalmente retornamos el array de errores
        return $errors;
      }
      public function saveImage() {
        // Obtengo la extensión del archivo
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
      
        // Obtengo el archivo temporal
        $tempFile = $_FILES['avatar']['tmp_name'];
      
        // Armo el nombre de la imagen
        $finalName = uniqid('img_') . '.' . $ext;
      
        // Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
        $finalPath = IMAGE_PATH . $finalName;
      
        // Guardamos la imagen en nuestra carpeta
        move_uploaded_file($tempFile, $finalPath);
      
        // Retorno el nombre de la imagen para poder guardar el mismo en el JSON
        return $finalName;
      }
      public function saveUser() {
        // Trimeamos los valores que vinieron por $_POST
        $_POST['name'] = trim($_POST['name']);
        $_POST['email'] = trim($_POST['email']);
      
        // Hasheo el password del usuario
        $_POST['password'] = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
      
        // Genero el ID y lo guardo en una posición de $_POST llamada "id"
        $_POST['id'] = generateID();
      
        // Elimino de $_POST la posición "rePassword" ya que no me interesa guardar este dato en mi DB (Data Base)
        unset($_POST['rePassword']);
      
        // En la variable $finalUser guardo el array de $_POST
        $finalUser = $_POST;
      
        // Obtengo todos los usuarios
        $allUsers = getAllUsers();
      
        // En la última posición del array de usuarios, inserto al usuario nuevo
        $allUsers[] = $finalUser;
      
        // Guardo todos los usuarios de vuelta en el JSON
        file_put_contents(USERS_JSON_PATH, json_encode($allUsers));
      
        // Retorno al usuario que acabo de guardar para poder tenerlo listo y loguearlo
        return $finalUser;
      }
}