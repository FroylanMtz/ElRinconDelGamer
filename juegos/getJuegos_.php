<?php
include_once '../php/consultasJuegos.php';
$juegos= get_juegos();
//var_dump($usuarios);
echo json_encode($juegos);
?>
