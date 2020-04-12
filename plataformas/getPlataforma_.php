<?php
include_once '../php/consultasPlataformas.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$plataforma=get_plataforma($id);
echo json_encode($plataforma);
?>
