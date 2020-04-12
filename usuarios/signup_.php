<?php
session_start();
$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
$aPaterno = filter_var($_POST['aPaterno'],FILTER_SANITIZE_STRING);
$aMaterno = filter_var($_POST['aMaterno'],FILTER_SANITIZE_STRING);
$fechaNacimiento = filter_var($_POST['fecha'],FILTER_SANITIZE_STRING);
$telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
$sexo = filter_var($_POST['sexo'],FILTER_SANITIZE_NUMBER_INT);
$correo_usuario=filter_var($_POST['correo'],FILTER_SANITIZE_STRING);
$game_tag = filter_var($_POST['tag'],FILTER_SANITIZE_STRING);
$contra_usuario=filter_var($_POST['contrasena'],FILTER_SANITIZE_STRING);
$repContrasena = filter_var($_POST['repContrasena'],FILTER_SANITIZE_STRING);
if(isset($_SESSION['iniciada'])){
  $session=true;
  $tipoUsuario =  filter_var($_POST['tipoUsuario'],FILTER_SANITIZE_NUMBER_INT);
  $usuRef = filter_var($_POST['usuarioRef'],FILTER_SANITIZE_NUMBER_INT);
}else {
  $session=false;
  $usuRef = 0;
  $tipoUsuario = 2;
}
$grabar=TRUE;
$resultadoValidacion="";
if(empty($nombre)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_nombre").show();';
}else{
    $resultadoValidacion .= '$("#alerta_nombre").hide();';
}
if(empty($aPaterno)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_paterno").show();';
}else{
    $resultadoValidacion .= '$("#alerta_paterno").hide();';
}
if(empty($aMaterno)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_materno").show();';
}else{
    $resultadoValidacion .= '$("#alerta_materno").hide();';
}
if(empty($fechaNacimiento)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_fecha").show();';
}else{
    $resultadoValidacion .= '$("#alerta_fecha").hide();';
}
if(empty($telefono)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_telefono").show();';
}else{
    $resultadoValidacion .= '$("#alerta_telefono").hide();';
}
if($sexo == 2){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_sexo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_sexo").hide();';
}
if(empty($correo_usuario)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_correo").show();';
}else{
    $resultadoValidacion .= '$("#alerta_correo").hide();';
}
if(empty($game_tag)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_tag").show();';
}else{
    $resultadoValidacion .= '$("#alerta_tag").hide();';
}
if($id === 0){
  if(empty($contra_usuario)){
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_contra").show();';
  }else{
      $resultadoValidacion .= '$("#alerta_contra").hide();';
  }
  if(empty($repContrasena)){
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_contra2").show();';
  }else{
      $resultadoValidacion .= '$("#alerta_contra2").hide();';
  }
  if( $contra_usuario === $repContrasena ){
    //$resultadoValidacion .= '$("#alerta_contraig2").show();';
    $resultadoValidacion .= '$("#alerta_contra2ig2").hide();';
  }else{
    $grabar=FALSE;
    //$resultadoValidacion .= '$("#alerta_contraig2").hide();';
    $resultadoValidacion .= '$("#alerta_contra2ig2").show();';
  }
}
if(isset($_SESSION['iniciada']) && $tipoUsuario == 0){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_tipoUsuario").show();';
}else{
    $resultadoValidacion .= '$("#alerta_tipoUsuario").hide();';
}

if($grabar){
  include_once '../php/consultasUsuario.php';
  $resultado = registrarUsuario($id,$tipoUsuario,$nombre, $aPaterno,$aMaterno,$fechaNacimiento,$sexo,$telefono,$correo_usuario,$game_tag,$contra_usuario,"ruta",$usuRef);
  if(count($resultado)==0){
    if($session){
      if($id > 0){
        $script= '<script>
            swal.fire({
                icon: "success",
                title: "Usuario Actualizado",
                text: "Se ha actualizado el usuario con éxito",
                confirmButtonText: "Aceptar",
                type: "success"
            }).then(function(){
                window.location = "usuarios.php";
            });
        </script>';
      }else{
        $script= '<script>
            swal.fire({
                icon: "success",
                title: "Usuario Registrado",
                text: "Se ha registrado el usuario con éxito",
                confirmButtonText: "Aceptar",
                type: "success"
            }).then(function(){
                window.location = "usuarios.php";
            });
        </script>';
      }
    }else{
      $script= '<script>
          swal.fire({
              icon: "success",
              title: "Usuario Registrado",
              text: "Se ha registrado el usuario con éxito",
              confirmButtonText: "Aceptar",
              type: "success"
          }).then(function(){
              window.location = "login.php";
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
