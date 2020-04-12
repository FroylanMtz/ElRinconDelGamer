<?php
include_once '../php/consultasTorneos.php';
session_start();
$idEquipo = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$resultado = aceptar_invitacion($idEquipo,$_SESSION['idUsuario']);
if(count($resultado)==0){
  echo 1;
}else{
  echo $resultado[2];
}
?>
