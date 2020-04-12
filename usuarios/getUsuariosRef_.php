<?php
include_once '../php/consultasUsuario.php';
$users = get_usuariosRef();
//var_dump($usuarios);
echo json_encode($users);
?>
