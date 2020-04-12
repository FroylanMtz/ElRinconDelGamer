<?php
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$costo = filter_var($_POST['costo'],FILTER_SANITIZE_STRING);
$costoMon = filter_var($_POST['costoMon'],FILTER_SANITIZE_NUMBER_INT);
$pago = filter_var($_POST['pago'],FILTER_SANITIZE_STRING);
$metodo = filter_var($_POST['metPago'],FILTER_SANITIZE_NUMBER_INT);
$monGan = filter_var($_POST['monGan'],FILTER_SANITIZE_NUMBER_INT);
$monAct = filter_var($_POST['monAct'],FILTER_SANITIZE_NUMBER_INT);
$grabar=TRUE;
$resultadoValidacion="";

if(empty($pago)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_pago").show();';
}else{
    $resultadoValidacion .= '$("#alerta_pago").hide();';
    if($metodo == 1){
      if(floatval($costo) > floatval($pago)){
        $grabar=FALSE;
        $resultadoValidacion .= '
            swal.fire({
                icon: "error",
                title: "Monto insuficiente",
                text: "El pago es menor al total.",
                confirmButtonText: "Aceptar",
            });';
      }
    }else{
      if($monAct < $costoMon){
        $grabar=FALSE;
        $resultadoValidacion .= '
            swal.fire({
                icon: "error",
                title: "Monedas insuficientes",
                text: "No cuenta con las suficientes monedas para hacer el pago",
                confirmButtonText: "Aceptar",
            });';
      }else{
        if($pago < $costoMon){
          $grabar=FALSE;
          $resultadoValidacion .= '
              swal.fire({
                  icon: "error",
                  title: "Monedas insuficientes",
                  text: "El pago es menor al costo.",
                  confirmButtonText: "Aceptar",
              });';
        }
      }
    }
}
if($grabar){
  include_once '../php/consultasRentas.php';
  $resultado = pagar_renta($id,$costoMon,$monGan,$metodo);
  if(count($resultado)==0){
    if($metodo == 1){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Renta Pagada",
              text: "Se ha pagado la renta con éxito, su cambio es: '.($pago - $costo).'.",
              confirmButtonText: "Aceptar",
          }).then(function(){
              window.location = "rentas.php";
          });
      </script>';
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Renta Pagada",
              text: "Se ha pagado la renta con éxito.",
              confirmButtonText: "Aceptar",
          }).then(function(){
              window.location = "rentas.php";
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
