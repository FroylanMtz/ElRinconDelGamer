<?php
include_once '../php/consultasRentas.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$renta=get_renta($id);
echo json_encode($renta);
?>
