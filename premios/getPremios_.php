<?php
include_once '../php/consultasPremios.php';
$premios = get_premios();
//var_dump($usuarios);
echo json_encode($premios);
?>
