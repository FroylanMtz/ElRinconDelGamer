<?php
include_once '../php/consultasTorneos.php';
session_start();
$users = get_UsuariosTorneosRegistro($_SESSION['idUsuario']);
//var_dump($usuarios);
echo json_encode($users);
?>
