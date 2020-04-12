<?php
session_start();
$idUs = filter_var($_POST['usuario'],FILTER_SANITIZE_NUMBER_INT);
$idAcc = filter_var($_POST['accesorio'],FILTER_SANITIZE_NUMBER_INT);
$nHoras = filter_var($_POST['nHoras'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($idUs)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_usuario").show();';
}else{
    $resultadoValidacion .= '$("#alerta_usuario").hide();';
}
if(empty($idAcc)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_accesorio").show();';
}else{
    $resultadoValidacion .= '$("#alerta_accesorio").hide();';
}
if(empty($nHoras)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nHoras").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nHoras").hide();';
}
if($grabar){
  include_once '../php/consultasRentasAccesorios.php';
  //echo $xml;
  $resultado = add_accesorioRenta($idUs,$idAcc,$nHoras);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Renta de Accesorio Registrada",
            text: "Se ha registrado la renta con éxito",
            confirmButtonText: "Aceptar"
        }).then(function(){
            window.location = "rentasAccesorios.php";
        });
    </script>';
    echo $script;
  }else{
    echo $resultado[2];
  }
}else {
  echo "<script>" . $resultadoValidacion . "</script>";
}
?>
