<?php
include_once '../php/consultasPlataformas.php';
$plataformas = get_plataformas();
//var_dump($usuarios);
echo json_encode($plataformas);
?>
