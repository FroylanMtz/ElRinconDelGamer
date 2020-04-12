<?php
include_once '../php/consultasUsuario.php';
$monedasRef=get_monedasRef();
echo json_encode($monedasRef);
?>
