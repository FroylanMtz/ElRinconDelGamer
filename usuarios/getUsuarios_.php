<?php
include_once '../php/consultasUsuario.php';
$users = get_usuarios();
//var_dump($usuarios);
echo json_encode($users);
?>
