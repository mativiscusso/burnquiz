<?php
function obtenerBaseDeDatos()
{
$nombre_base_de_datos = "burnquiz";
    $usuario = "root";
    $contraseña = "";
    try {
        $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
        $base_de_datos->query("set names utf8;");
        return $base_de_datos;
    } catch (Exception $e) {
        # Nota: ¡en la vida real no imprimas errores!
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }
}
?>