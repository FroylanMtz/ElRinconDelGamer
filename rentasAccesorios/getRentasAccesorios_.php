<?php
include_once '../php/consultasRentasAccesorios.php';
$rentasAcce = get_accesoriosRenta();
//var_dump($usuarios);
echo json_encode($rentasAcce);
?>
