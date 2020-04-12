<?php
session_start();
$idUs = filter_var($_POST['usuario'],FILTER_SANITIZE_NUMBER_INT);
$idDulce = filter_var($_POST['dulce'],FILTER_SANITIZE_NUMBER_INT);
$cant = filter_var($_POST['cantidad'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($idUs)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_usuario").show();';
}else{
    $resultadoValidacion .= '$("#alerta_usuario").hide();';
}
if(empty($idDulce)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_dulce").show();';
}else{
    $resultadoValidacion .= '$("#alerta_dulce").hide();';
}
if(empty($cant)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_cantidad").show();';
}else{
    $resultadoValidacion .= '$("#alerta_cantidad").hide();';
}
if($grabar){
  include_once '../php/consultasVentasDulces.php';
  //echo $xml;
  $resultado = add_ventaDulce($idUs,$idDulce,$cant);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Venta de Dulce Registrada",
            text: "Se ha registrado la venta con éxito",
            confirmButtonText: "Aceptar"
        }).then(function(){
            window.location = "ventaDulces.php";
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
