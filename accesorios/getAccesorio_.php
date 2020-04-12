<?php
include_once '../php/consultasAccesorios.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$accesorio=get_accesorio($id);
echo json_encode($accesorio);
?>
