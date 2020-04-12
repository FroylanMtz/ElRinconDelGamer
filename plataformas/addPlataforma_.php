<?php
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($nombre)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nombre").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nombre").hide();';
}

if($grabar){
  include_once '../php/consultasPlataformas.php';
  $resultado = registrarPlataforma($id,$nombre);
  if(count($resultado)==0){
    if($id > 0){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Plataforma Actualizada",
              text: "Se ha actualizado la plataforma con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "plataformas.php";
          });
      </script>';
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Plataforma Registrada",
              text: "Se ha registrado la plataforma con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "plataformas.php";
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
