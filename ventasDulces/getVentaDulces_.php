<?php
include_once '../php/consultasVentasDulces.php';
$ventaDulces = get_DulcesVenta();
//var_dump($usuarios);
echo json_encode($ventaDulces);
?>
