<?php
include_once '../php/consultasAccesorios.php';
$accesorios = get_accesorios();
//var_dump($usuarios);
echo json_encode($accesorios);
?>
