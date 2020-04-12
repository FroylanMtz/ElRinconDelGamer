<?php
include_once '../php/consultasDulces.php';
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$dulce=get_dulce($id);
echo json_encode($dulce);
?>
