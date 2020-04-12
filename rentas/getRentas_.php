<?php
include_once '../php/consultasRentas.php';
$rentas = get_rentas();
//var_dump($usuarios);
echo json_encode($rentas);
?>
