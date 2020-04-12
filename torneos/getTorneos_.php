<?php
include_once '../php/consultasTorneos.php';
$torneos = get_Torneos();
//var_dump($usuarios);
echo json_encode($torneos);
?>
