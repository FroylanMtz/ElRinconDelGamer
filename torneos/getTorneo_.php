<?php
include_once '../php/consultasTorneos.php';
$idTorneo = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$torneos = get_Torneo($idTorneo);
echo json_encode($torneos);
?>
