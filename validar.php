<?php
$json= "datosDeRegistro.json";

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
  //TRAER EL JSON
  $traigoJson = FILE_GET_CONTENTS('datosDeRegistro.json');
  //CONVERTIRLO A ARRAY
  $arrayJson = json_decode($traigoJson, true);
  //RECORRER EL ARRAY Y BUSCAR COINCIDENCIA ENTRE $USUARIO Y $PASS YA GUARDADOS
  $passHash = password_hash($pass, PASSWORD_DEFAULT);
  foreach ($arrayJson as $num => $arrayUsuario) {
    foreach ($arrayUsuario as $key => $valor) {
        if (($key == "usuario" && $valor == $usuario)) {
          //el usuario fue encontrado
          }
          
        }
      
      }
    }


function validarRegistro ($nombre,$apellido,$usuario,$ciudad,$provincia,$pais) {
  if (($_POST['nombre'] == "") || ($_POST['apellido'] == "") || ($_POST['ciudad'] == "") || ($_POST['provincia'] == "") || ($_POST['pais'] == "")) {
    $retorno = "Hay campos vacios";
  }
  else if (filter_var($_POST['usuario'], FILTER_VALIDATE_EMAIL) == false) {
    $retorno = "El campo no contiene un email correcto";
  }
  else { return header('Location: bienvenida.php'); 
  }
  return $retorno;
}
function validarImg ($error,$nombre,$tmp) {
  if ($error != 0) {
    $retorno = "Error en la carga de archivo";
  } else {
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
     if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" ) {
       $retorno = "Extension no permitida";
     } else {
       return move_uploaded_file($tmp, 'files/'.rand(0,500).'.' . $ext);
     }
  }
}
function cargaDatosRegistro ($nombre,$apellido,$usuario,$pass,$ciudad,$provincia,$pais){
   $usuarios = [
      'nombre' => $nombre,
      'apellido' => $apellido,
      'usuario' => $usuario,
      'pass' => password_hash($pass, PASSWORD_DEFAULT),
      'ciudad' => $ciudad,
      'provincia' => $provincia,
      'pais' => $pais
  ];
  return guardarDatosUnicos($usuarios, "datosDeRegistro.json");
}

function guardardatos ($que, $donde) {
    $exito = false;

    $traigoJson = file_get_contents($donde);
    if ($traigoJson) {
        $exito = true;
        $jsonArray = json_decode($traigoJson, true);
        $jsonArray[] = $que;
        $json = json_encode($jsonArray);
        file_put_contents($donde, $json);
    }
    return $exito; 
}
function eliminarDatos($queEliminar,$dondeEliminar){
  $exito = false;
   $traigoJson = file_get_contents($dondeEliminar);
       if($traigoJson){
           $exito = true;
             $arrayJson = json_decode($traigoJson, true);
       foreach($arrayJson as $key => $array){
           if ($queEliminar == $array) {
               unset($arrayJson[$key]);
            }
              }
   $encodeJson = json_encode($arrayJson);
   file_put_contents($dondeEliminar, $encodeJson);
          }
  return $exito;
}
function guardarDatosUnicos($queGuardar,$dondeGuardar){
  $exito = false;
          $traigoJson = FILE_GET_CONTENTS($dondeGuardar);
          if($traigoJson){
              $exito = true;
              $arrayJson = json_decode($traigoJson, true);
              foreach($arrayJson as $key => $array){
                  if ($queGuardar == $array){
                      $exito = false;
                      return $exito;
                  }
              }
              $arrayJson [] = $queGuardar;
              $encodeJson = json_encode($arrayJson);
              file_put_contents($dondeGuardar, $encodeJson);
          }
  return $exito;
      }
?>