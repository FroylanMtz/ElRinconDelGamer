<?php
include_once '../php/consultasRentas.php';
session_start();
$rentas = get_monedasActuales($_SESSION['idUsuario']);
//var_dump($usuarios);
echo json_encode($rentas);
?>
