<?php
session_start();
// Definimos las constantes que necesitamos en nuestro proyecto, de esta manera puedo usar las mismas dentro de las funciones sin tener que usar una variable global o pasarla por parámetro
define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']);
define('IMAGE_PATH', dirname(__FILE__) . '/files/avatars/');
define('USERS_JSON_PATH', dirname(__FILE__) . '/files/users.json');

function isLogged() {
  // El return devuelve true o false, según lo que retorne la función isset()
  return isset($_SESSION['userLoged']);
}

// Si está la cookie almacenada y si NO está logueda la persona:
if (isset($_COOKIE['userLoged']) && !isLogged()) {
  // Busco al usuario por el email que tengo almacenado en la cookie
  $theUser = getUserByEmail($_COOKIE['userLoged']);

  // Guardo en sesión al usuario que busqué anteiormente
  $_SESSION['userLoged'] = $theUser;
}
// Función para generar un ID
function generateID()
{
  // Traigo a todos los usuarios
  $allUsers = getAllUsers();

  // Si el conteo del array de usuarios es igual a cero
  if (count($allUsers) == 0) {
    return 1;
  }

  // Si el conteo del array de usuarios es superior a cero, obtengo el último usuario registrado
  $lastUser = array_pop($allUsers);

  // Retorno el ID del último usuario registrado + 1
  return $lastUser['id'] + 1;
}
// Función traer todo del JSON
function getAllUsers()
{
  // Obtengo el contenido del archivo JSON
  $fileContent = file_get_contents(USERS_JSON_PATH);

  // Decodifico el JSON a un array asociativo, importante el "true"
  $allUsers = json_decode($fileContent, true);

  // Retorno el array de usuarios
  return $allUsers;
}


  

