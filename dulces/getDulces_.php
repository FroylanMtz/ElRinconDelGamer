<?php
include_once '../php/consultasDulces.php';
$dulces = get_dulces();
//var_dump($usuarios);
echo json_encode($dulces);
?>
