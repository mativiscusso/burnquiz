<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=burnquiz;port=3306', 'root', '');


function consulta($sql){
    $db = new PDO('mysql:host=127.0.0.1;dbname=burnquiz;port=3306', 'root', '');
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>