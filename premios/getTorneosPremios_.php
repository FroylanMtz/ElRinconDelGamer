<?php
include_once '../php/consultasPremios.php';
$torneos = get_TorneosPremios();
//var_dump($usuarios);
echo json_encode($torneos);
?>
