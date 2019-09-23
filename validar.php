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
     $validacion = "El campo esta vacio";
   }
   if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
     $validacion = "El campo no contiene un email correcto";
   }
   if (is_numeric($telefono) == false) {
     $validacion = "El campo no es un numero telefonico";
   }
   echo $validacion;
   return $validacion;
 }  
 

 
?>