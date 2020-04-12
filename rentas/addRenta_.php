<?php
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_NUMBER_INT);
$consola = filter_var($_POST['consola'],FILTER_SANITIZE_NUMBER_INT);
$juego = filter_var($_POST['juego'],FILTER_SANITIZE_NUMBER_INT);
$fecha = filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
$hora = filter_var($_POST['hora'],FILTER_SANITIZE_STRING);
$promo = filter_var($_POST['promocion'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($usuario)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_usuario").show();';
}else{
    $resultadoValidacion .= '$("#alerta_usuario").hide();';
}
if(empty($consola)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_consola").show();';
}else{
    $resultadoValidacion .= '$("#alerta_consola").hide();';
}
if(empty($fecha)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_fecha").show();';
}else{
    $resultadoValidacion .= '$("#alerta_fecha").hide();';
}
if(empty($hora)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_hora").show();';
}else{
    $resultadoValidacion .= '$("#alerta_hora").hide();';
}
if($grabar){
  include_once '../php/consultasRentas.php';
  //echo $xml;
  $resultado = registrarRenta($id,$usuario,$consola,$juego,$fecha,$hora,$promo,0,0);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Renta Registrada",
            text: "Se ha registrado la renta con éxito",
            confirmButtonText: "Aceptar",
            type: "success"
        }).then(function(){
            window.location = "rentas.php";
        });
    </script>';
    //var_dump($resultado);
    echo $script;
  }else{
    //var_dump($resultado);
    echo $resultado[2];
  }
}else {
  echo "<script>" . $resultadoValidacion . "</script>";
}
?>
