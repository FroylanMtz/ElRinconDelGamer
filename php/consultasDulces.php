<?php
function add_dulce($id,$nombre,$costo,$monedasDad){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call add_dulce (?,?,?,?);");
    $sentencia->bindParam(1, $id, PDO::PARAM_INT);
    $sentencia->bindParam(2, $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(3, $costo, PDO::PARAM_INT);
    $sentencia->bindParam(4, $monedasDad, PDO::PARAM_INT);
    if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
function get_dulces(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_dulces();");
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
function get_dulce($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_dulce(?);");
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
function delete_dulce($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL delete_dulce(?);");
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
