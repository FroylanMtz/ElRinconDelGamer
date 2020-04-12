<?php
include_once '../php/consultasTorneos.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$equipos=get_equiposPremios($id);
echo json_encode($equipos);
?>
