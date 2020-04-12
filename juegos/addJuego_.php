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
$carpetaDestino="imagenes/";
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$grabar=TRUE;
$resultadoValidacion="";
if(empty($_FILES['foto'])){
    $destino="";
}else{
  if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
  {
    $origen=$_FILES["foto"]["tmp_name"];
    $destino=$carpetaDestino.$_FILES["foto"]["name"];
    # movemos el archivo
    if(@move_uploaded_file($origen, $destino))
    {
      echo "";
    }else{
      echo "<br>No se ha podido subir la foto: ".$_FILES["foto"]["name"];
      $grabar=false;
    }
  }else{
    echo "<br>No se ha podido subir la foto: ".$_FILES["foto"]["name"];
    $grabar=false;
  }
}
if(empty($nombre)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nombre").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nombre").hide();';
}
if($id == 0){
  if(empty($_POST['consola'])){
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_consola").show();';
  }else{
      $plataformas = $_POST['consola'];
      $xml = createXML($plataformas);
      $n=count($plataformas);
      $resultadoValidacion .= '$("#alerta_consola").hide();';
  }
}else{
  $xml='';
  $n=0;
}
//print_r($destino);
if($grabar){
  include_once '../php/consultasJuegos.php';
  $resultado = add_juego($id,$xml,$nombre,"".$destino,$n);
  if(count($resultado)==0){
    if($id > 0){
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Juegp Actualizado",
              text: "Se ha actualizado un juego con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "juegos.php";
          });
      </script>';
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Juego Registrado",
              text: "Se ha registrado un juego con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "juegos.php";
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
