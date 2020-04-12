<?php
include_once '../php/consultasConsolas.php';
$consolas = get_consolas();
//var_dump($usuarios);
echo json_encode($consolas);
?>
