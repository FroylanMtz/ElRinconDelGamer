<?php
include_once '../php/consultasRentas.php';
$users = get_usuariosRen();
//var_dump($usuarios);
echo json_encode($users);
?>
