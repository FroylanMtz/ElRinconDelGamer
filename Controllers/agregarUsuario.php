<?php
  $nombre = $_POST['nombre'];
  $aPaterno = $_POST['aPaterno'];
  $aMaterno = $_POST['aMaterno'];
  $fechaNacimiento = $_POST['fecha'];
  $telefono = $_POST['telefono'];
  $sexo = $_POST['sexo'];
  $correo_usuario=$_POST['correo'];
  $game_tag = $_POST['tag'];
  $contra_usuario=$_POST['contrasena'];
  $repContrasena = $_POST['repContrasena'];
  if(isset($_SESSION['iniciada'])){
    $tipoUsuario =  $_POST['tipoUsuario'];
    $usuRef = $_POST['usuarioRef'];
  }else {
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
  if($sexo == 'x'){
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
  if($tipoUsuario == 'x'){
      $grabar=FALSE;
      $resultadoValidacion .= '$("#alerta_tipoUsuario").show();';
  }else{
      $resultadoValidacion .= '$("#alerta_tipoUsuario").hide();';
  }
  if($grabar){
      if( $contra_usuario == $repContrasena ){
          $datos = array( 'nombre'=>$nombre,
                          'aPaterno'=>$aPaterno,
                          'aMaterno'=>$aMaterno,
                          'fecha_nacimiento' => $fechaNacimiento,
                          'sexo' => $sexo,
                          'telefono' => $telefono,
                          'correo_usuario'=>$correo_usuario,
                          'game_tag'=>$game_tag,
                          'contra_usuario'=>$contra_usuario,
                          'usuarioRef'=>$usuRef,
                          'tipoUsuario'=>$tipoUsuario);
          //print_r($datos);
          $respuesta = Datos::registrarUsuario($datos);
          if($respuesta == "success"){
            $script= '<script>
                          function () {
                              window.location = "inicio.php?p=iniciarSesion&e=recienRegistrado";
                          });
                      </script>';
            echo $script;
            //header("location: inicio.php?p=iniciarSesion&e=recienRegistrado");
          }else{
            $script= '<script>
                          function () {
                              window.location = "inicio.php?p=registrarse&e=errorAlGuardar";
                          });
                      </script>';
            echo $script;
            //header("location: inicio.php?p=registrarse&e=errorAlGuardar");
          }
      }else{
          $resultadoValidacion .= '$("#alerta_contraig2").show();';
          $resultadoValidacion .= '$("#alerta_contra2ig2").show();';
          echo "<script>" . $resultadoValidacion . "</script>";
      }
  }else {
    //header("location: inicio.php?p=registrarse&e=camposVacios");
    echo "<script> location.reload();" . $resultadoValidacion . "</script>";
  }
?>
