<?php
include_once '../php/consultasConsolas.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$consola=get_consola($id);
echo json_encode($consola);
?>
