<?php
include_once '../php/consultasRentasAccesorios.php';
$users = get_usuariosRenAcc();
//var_dump($usuarios);
echo json_encode($users);
?>
