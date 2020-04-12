<?php
include_once '../php/consultasUsuario.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$usuario=get_usuario($id);
echo json_encode($usuario);
?>
