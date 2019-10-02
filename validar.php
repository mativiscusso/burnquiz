<?php

function validarPass($contraseña, $confirmar) {
    $retorno = "";
    if (($contraseña == "") && ($confirmar == "")) {
      $retorno = "Los dos campos de contraseña estan vacios";
    } else if ($contraseña == "") {
      $retorno = "La contraseña esta vacia";
    } else if ($confirmar == "") {
      $retorno = "Falta la confirmacion de contraseña";
    } else if ($contraseña != $confirmar) {
      $retorno = "Las contraseñas no verifican";
    } else {
      $retorno = "Correcto";
    }
    return $retorno;
}
function validarContacto($nombre, $email, $telefono) {
  
       if ($nombre == "") {
     $validacion = "Hay campos vacios";
    }
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
     $validacion = "El campo no contiene un email correcto";
    }
    else if (is_numeric($telefono) == false) {
     $validacion = "El campo no es un numero telefonico";
    }
    else {
      header('Location: index.php'); exit;
      } 
  return $validacion;
}  
function validarLogin($usuario, $pass) {
    if (($usuario == '') || ($pass == '')) {
        $resultado = "El campo esta vacio";
    }
  else {
  header('Location: bienvenida.php');
  }
  
  return $resultado;
}
function validarRegistro ($nombre,$apellido,$usuario,$ciudad,$provincia,$pais,$foto) {
  if (($_POST['nombre'] == "") || ($_POST['apellido'] == "") || ($_POST['ciudad'] == "") || ($_POST['provincia'] == "") || ($_POST['pais'] == "")) {
    $retorno = "Hay campos vacios";
  }
  else if ($_POST['imagenDePerfil'] == "") {
    $retorno = "No se cargó imagen de perfil";
  }
  else if (filter_var($_POST['usuario'], FILTER_VALIDATE_EMAIL) == false) {
    $retorno = "El campo no contiene un email correcto";
  }
  else { header('Location: bienvenida.php'); 
  }
  return $retorno;
}

?>