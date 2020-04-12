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
$idTorneo = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$totUsu = filter_var($_POST['totalPer'],FILTER_SANITIZE_NUMBER_INT);
$nombreEq = filter_var($_POST['nomEqu'],FILTER_SANITIZE_STRING);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($nombreEq)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nomEqu").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nomEqu").hide();';
}
if($totUsu > 1){
  if(empty($_POST['usuarios'])){
      $xml='';
      $n=0;
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_usuarios").show();';
  }else{
      $usuarios = $_POST['usuarios'];
      if(intval($totUsu) > count($usuarios)){
        $xml = createXML($usuarios);
        $n=count($usuarios);
        $resultadoValidacion .= '$("#alerta_usuarios").hide();';
        $resultadoValidacion .= '$("#alerta_usuarios2").hide();';
      }else{
        $grabar=FALSE;
        $resultadoValidacion .= '$("#alerta_usuarios2").show();';
      }
  }
}
else{
  $xml='';
  $n=0;
}

if($grabar){
  include_once '../php/consultasTorneos.php';
  $resultado = add_equipoTorneo($idTorneo,$nombreEq,$xml,$n,$_SESSION['idUsuario']);
  if(count($resultado)==0){
    $script= '<script>
        swal.fire({
            icon: "success",
            title: "Equipo Registrado",
            text: "Se ha registrado el equipo con éxito",
            confirmButtonText: "Aceptar"
        }).then(function(){
            window.location = "torneosGamer.php";
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
