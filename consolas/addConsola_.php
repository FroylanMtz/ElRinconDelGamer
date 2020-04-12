<?php
function createXML($data) {
    $xmlDoc='<ids>';
    foreach($data as $id){
      if(!empty($id)){
        $xmlDoc.='<id>'.$id.'</id>';
      }
    }
    $xmlDoc.='</ids>';
    return $xmlDoc;
}
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
//$plataformas = $_POST['plataforma'];
$numero = filter_var($_POST['numero'],FILTER_SANITIZE_STRING);
$serial = filter_var($_POST['serial'],FILTER_SANITIZE_STRING);
$costo = filter_var($_POST['costo'],FILTER_SANITIZE_NUMBER_INT);
$costoMon = filter_var($_POST['costoMon'],FILTER_SANITIZE_NUMBER_INT);
$monDad = filter_var($_POST['monedasDad'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($nombre)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nombre").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nombre").hide();';
}
if($id == 0){
  if(empty($_POST['plataforma'])){
      $xml='';
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_plataforma").show();';
  }else{
      $plataformas = $_POST['plataforma'];
      $xml = createXML($plataformas);
      $n=count($plataformas);
      $resultadoValidacion .= '$("#alerta_plataforma").hide();';
  }
}else{
  $xml='';
  $n=0;
}
if(empty($numero)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_numero").show();';
}else{
    $resultadoValidacion .= '$("#alerta_numero").hide();';
}
if(empty($serial)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_serial").show();';
}else{
    $resultadoValidacion .= '$("#alerta_serial").hide();';
}
if(empty($costo)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_costo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_costo").hide();';
}
if(empty($costoMon)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_costoMon").show();';
}else{
    $resultadoValidacion .= '$("#alerta_costoMon").hide();';
}
if(empty($monDad)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_monedasDad").show();';
}else{
    $resultadoValidacion .= '$("#alerta_monedasDad").hide();';
}
if($grabar){
  include_once '../php/consultasConsolas.php';
  //echo $xml;
  $resultado = registrarConsola($id,$xml,$nombre,$numero,$serial,$costo,$costoMon,$monDad,$n);
  if(count($resultado)==0){
    if($id > 0){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Consola Actualizada",
              text: "Se ha actualizado la consola con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "consolas.php";
          });
      </script>';
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Consola Registrada",
              text: "Se ha registrado la consola con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "consolas.php";
          });
      </script>';
    }
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
