<?php
include_once '../php/consultasRentas.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$juegos=get_juegos_consola($id);
echo json_encode($juegos);
?>
