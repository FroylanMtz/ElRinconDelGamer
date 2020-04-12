<?php
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$costo = filter_var($_POST['costo'],FILTER_SANITIZE_NUMBER_INT);
$monedasDad = filter_var($_POST['monedasDad'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($nombre)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nombre").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nombre").hide();';
}
if(empty($costo)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_costo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_costo").hide();';
}
if(empty($monedasDad)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_monedasDad").show();';
}else{
    $resultadoValidacion .= '$("#alerta_monedasDad").hide();';
}


if($grabar){
  include_once '../php/consultasDulces.php';
  $resultado = add_dulce($id,$nombre,$costo,$monedasDad);
  if(count($resultado)==0){
    if($id > 0){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Dulce Actualizado",
              text: "Se ha actualizado el dulce con éxito",
              confirmButtonText: "Aceptar"
          }).then(function(){
              window.location = "dulces.php";
          });
      </script>';
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Dulce Registrado",
              text: "Se ha registrado el dulce con éxito",
              confirmButtonText: "Aceptar"
          }).then(function(){
              window.location = "dulces.php";
          });
      </script>';
    }
    echo $script;
  }else{
    echo $resultado[2];
  }
}else {
  echo "<script>" . $resultadoValidacion . "</script>";
}
?>
