<?php
$usu = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
$contrasena = filter_var($_POST['contrasenia'],FILTER_SANITIZE_STRING);

$grabar = TRUE;
$resultadoValidacion = "";

if(empty($usu)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_usuario").show();';
}else{
    $resultadoValidacion .= '$("#alerta_usuario").hide();';
}
if(empty($contrasena)){
    $grabar=FALSE;
    $resultadoValidacion .= '$("#alerta_contrasenia").show();';
}else{
    $resultadoValidacion .= '$("#alerta_contrasenia").hide();';
}

if($grabar)
{
  include_once '../php/consultasUsuario.php';
  $resultado = get_login($usu, $contrasena);
  if($resultado[0]['error']==0){
    if(count($resultado[1])>0){
      session_start();
      $_SESSION['iniciada'] = true;
      $_SESSION['idUsuario'] = $resultado[1][0]['idUsuario'];
      $_SESSION['nombre'] = $resultado[1][0]['nombre'] . " " . $resultado[1][0]['aPaterno'] . " " . $resultado[1][0]['aMaterno'];
      $_SESSION['tipoUsuario'] = $resultado[1][0]['idRol'];
      //var_dump($resultado);
      echo "<script>window.location='../Views/plantilla.php';</script>";
      /*$script= '<script>
            swal.fire({
                icon: "error",
                title: "DATOS INCORRECTOS",
                text: "'.$resultado[1][0]['idUsuario'].'",
                confirmButtonText: "Aceptar",
                type: "error"
            });
        </script>';
        echo $script;*/
    }else{
      $script= '<script>
            swal.fire({
                icon: "error",
                title: "DATOS INCORRECTOS",
                text: "Intentelo de nuevo",
                confirmButtonText: "Aceptar"
            });
        </script>';
        //var_dump($resultado);
        echo $script;
    }
  }else{
      //header("location:inicio.php?p=contraincorrecta");
      echo $resultado[1];
  }
}else{
   echo "<script>" . $resultadoValidacion . "</script>";
}
?>
