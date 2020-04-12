<?php
function get_login($usu, $contrasena){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("call get_login (?,md5(?));");
        $sentencia->bindParam(1,$usu,PDO::PARAM_STR);
        $sentencia->bindParam(2,$contrasena,PDO::PARAM_STR);
        if($sentencia->execute()){
            $resultado=array(array("error" => 0),$sentencia->FetchAll(PDO::FETCH_ASSOC));
        }else{
            $resultado=array(array("error" => 1),$sentencia->errorInfo());
        }
    }catch(PDOException $exception) {
        $resultado=array(array("error" => 1),$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function registrarUsuario($id,$tipoUsuario,$nombre, $aPaterno,$aMaterno,$fechaNacimiento,$sexo,$telefono,$correo_usuario,$game_tag,$contra_usuario,$rutaFoto,$usuRef){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call add_usuario (?,?,?,?,?,?,?,?,?,?,md5(?),?,?);");
    $sentencia->bindParam(1, $id, PDO::PARAM_INT);
    $sentencia->bindParam(2, $tipoUsuario, PDO::PARAM_INT);
    $sentencia->bindParam(3, $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(4, $aPaterno, PDO::PARAM_STR);
    $sentencia->bindParam(5, $aMaterno, PDO::PARAM_STR);
    $sentencia->bindParam(6, $fechaNacimiento, PDO::PARAM_STR);
    $sentencia->bindParam(7, $sexo, PDO::PARAM_INT);
    $sentencia->bindParam(8, $telefono, PDO::PARAM_STR);
    $sentencia->bindParam(9, $correo_usuario, PDO::PARAM_STR);
    $sentencia->bindParam(10, $game_tag, PDO::PARAM_STR);
    $sentencia->bindParam(11, $contra_usuario, PDO::PARAM_STR);
    $sentencia->bindParam(12, $rutaFoto, PDO::PARAM_STR);
    $sentencia->bindParam(13, $usuRef, PDO::PARAM_INT);
    if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
function get_usuarios(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_usuarios();");
        if($sentencia->execute()){
            $resultado=array(array("error" => 0),$sentencia->fetchAll(PDO::FETCH_ASSOC));
        }else{
            $resultado=array(array("error" => 1),$sentencia->errorInfo());
        }
    }
    catch(PDOException $exception) {
        $resultado=array(array("error" => 1),$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function get_usuariosRef(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_usuariosRef();");
        if($sentencia->execute()){
            $resultado=array(array("error" => 0),$sentencia->fetchAll(PDO::FETCH_ASSOC));
        }else{
            $resultado=array(array("error" => 1),$sentencia->errorInfo());
        }
    }
    catch(PDOException $exception) {
        $resultado=array(array("error" => 1),$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function get_usuario($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_usuario(?);");
        $sentencia->bindParam(1,$id,PDO::PARAM_INT);
        if($sentencia->execute()){
            $resultado=array(array("error" => 0),$sentencia->fetchAll(PDO::FETCH_ASSOC));
        }else{
            $resultado=array(array("error" => 1),$sentencia->errorInfo());
        }
    }
    catch(PDOException $exception) {
        $resultado=array(array("error" => 1),$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function delete_usuario($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL delete_usuario(?);");
        $sentencia->bindParam(1,$id,PDO::PARAM_INT);
        if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
        }
    }
    catch(PDOException $exception) {
        $resultado=array("error","conexion",$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function get_monedasRef(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_monedasRef();");
        if($sentencia->execute()){
            $resultado=array(array("error" => 0),$sentencia->fetchAll(PDO::FETCH_ASSOC));
        }else{
            $resultado=array(array("error" => 1),$sentencia->errorInfo());
        }
    }
    catch(PDOException $exception) {
        $resultado=array(array("error" => 1),$exception->getMessage());
    }
    $conn=null;
    return $resultado;
}
function updateMonedasRef($monedas){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call updateMonedasRef (?);");
    $sentencia->bindParam(1, $monedas, PDO::PARAM_INT);
    if(!$sentencia->execute()){
        $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
?>
