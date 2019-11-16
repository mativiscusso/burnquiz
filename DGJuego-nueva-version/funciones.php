<?php
session_start();
// Definimos las constantes que necesitamos en nuestro proyecto, de esta manera puedo usar las mismas dentro de las funciones sin tener que usar una variable global o pasarla por parámetro
define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']);
define('IMAGE_PATH', dirname(__FILE__) . '/files/avatars/');
define('USERS_JSON_PATH', dirname(__FILE__) . '/files/users.json');

function verificarErrores($key){
    $errores = "";
    if(isset($_SESSION[$key]) && $_SESSION[$key] != ""){
      $errores = $_SESSION[$key];
      $_SESSION[$key] = "";
  }
      return $errores;
  }
  function mostrarErrores($errores){
    if(isset($errores) && ($errores != "")){
      foreach($errores as $error){
        echo $error . "<br/>";
    }
  }
  }

  

