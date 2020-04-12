<?php
include_once '../php/consultasTorneos.php';
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$resultado = finalizar_torneo($id);
if(count($resultado)==0){
  echo 1;
}else{
  echo $resultado[2];
}
?>
