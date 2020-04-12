<?php
session_start();
$idTorneo = filter_var($_POST['torneo'],FILTER_SANITIZE_NUMBER_INT);
$premio1 = filter_var($_POST['premio1'],FILTER_SANITIZE_STRING);
$premio2 = filter_var($_POST['premio2'],FILTER_SANITIZE_STRING);
$premio3 = filter_var($_POST['premio3'],FILTER_SANITIZE_STRING);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($idTorneo)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_torneo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_torneo").hide();';
}
if(empty($premio1)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_premio1").show();';
}else{
    $resultadoValidacion .= '$("#alerta_premio1").hide();';
}
if(empty($premio2)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_premio2").show();';
}else{
    $resultadoValidacion .= '$("#alerta_premio2").hide();';
}
if(empty($premio3)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_premio3").show();';
}else{
    $resultadoValidacion .= '$("#alerta_premio3").hide();';
}

if($grabar){
  include_once '../php/consultasPremios.php';
  $resultado = add_premio($idTorneo,$premio1,$premio2,$premio3);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Premios Registrados",
            text: "Se han registrado los premios con éxito",
            confirmButtonText: "Aceptar"
        }).then(function(){
            window.location = "premios.php";
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
