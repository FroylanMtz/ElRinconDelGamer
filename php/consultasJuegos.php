<?php
function add_juego($id,$xml,$nombre,$destino,$n){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call add_juego (?,?,?,?,?);");
    $sentencia->bindParam(1, $id, PDO::PARAM_INT);
    $sentencia->bindParam(2, $xml, PDO::PARAM_STR);
    $sentencia->bindParam(3, $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(4, $destino, PDO::PARAM_STR);
    $sentencia->bindParam(5, $n, PDO::PARAM_STR);
    if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
function get_juegos(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_juegos();");
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
function get_consola($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_consola(?);");
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
function delete_consola($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL delete_consola(?);");
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
?>
