<?php
session_start();
$monedas = filter_var($_POST['monedas'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($monedas)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_monedas").show();';
}else{
    $resultadoValidacion .= '$("#alerta_monedas").hide();';
}

if($grabar){
  include_once '../php/consultasUsuario.php';
  $resultado = updateMonedasRef($monedas);
  if(count($resultado)==0){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Monedas de referencia actualizadas",
              text: "Se han actualizado las monedas con éxito",
              confirmButtonText: "Aceptar"
          }).then(function(){
              window.location = "usuarios.php";
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
