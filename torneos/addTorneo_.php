<?php
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_var($_POST['titulo'],FILTER_SANITIZE_STRING);
$consola = filter_var($_POST['consola'],FILTER_SANITIZE_NUMBER_INT);
$juego = filter_var($_POST['juego'],FILTER_SANITIZE_NUMBER_INT);
$fecha = filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
$hora = filter_var($_POST['hora'],FILTER_SANITIZE_STRING);
$modalidad = filter_var($_POST['modalidad'],FILTER_SANITIZE_NUMBER_INT);
$totIntegrantes = filter_var($_POST['persEquipo'],FILTER_SANITIZE_NUMBER_INT);
$forma = filter_var($_POST['forma'],FILTER_SANITIZE_NUMBER_INT);
$maxJug = filter_var($_POST['totEqui'],FILTER_SANITIZE_NUMBER_INT);
$descripcion = filter_var($_POST['descripcion'],FILTER_SANITIZE_STRING);
$costo = filter_var($_POST['costo'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
//print_r($_POST);
if(empty($titulo)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_titulo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_titulo").hide();';
}
if(empty($consola)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_consola").show();';
}else{
    $resultadoValidacion .= '$("#alerta_consola").hide();';
}
if(empty($juego)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_juego").show();';
}else{
    $resultadoValidacion .= '$("#alerta_juego").hide();';
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
if(empty($modalidad)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_modalidad").show();';
}else{
    $resultadoValidacion .= '$("#alerta_modalidad").hide();';
}
if(empty($totIntegrantes)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_persEquipo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_persEquipo").hide();';
}
if(empty($forma)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_forma").show();';
}else{
    $resultadoValidacion .= '$("#alerta_forma").hide();';
}
if(empty($maxJug)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_totEqui").show();';
}else{
    $resultadoValidacion .= '$("#alerta_totEqui").hide();';
}
if(empty($descripcion)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_descripcion").show();';
}else{
    $resultadoValidacion .= '$("#alerta_descripcion").hide();';
}
if(empty($costo)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_costo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_costo").hide();';
}
if($grabar){
  include_once '../php/consultasTorneos.php';
  //echo $xml;
  $resultado = add_torneo($id,$titulo,$consola,$juego,$fecha,$hora,$modalidad,$totIntegrantes,$forma,$maxJug,$descripcion,$costo);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Torneo Registrado",
            text: "Se ha registrado el torneo con éxito",
            confirmButtonText: "Aceptar"
        }).then(function(){
            window.location = "torneos.php";
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
