<?php
include_once '../php/consultasRentas.php';
session_start();
$rentas = get_rentasHistorico($_SESSION['idUsuario']);
//var_dump($usuarios);
echo json_encode($rentas);
?>
