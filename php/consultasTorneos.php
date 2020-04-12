<?php
          //vista admin
function get_juegos_consola($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_juegosCon(?);");
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
function get_equiposPremios($id){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_equiposPremios(?);");
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
function add_torneo($id,$titulo,$consola,$juego,$fecha,$hora,$modalidad,$totIntegrantes,$forma,$maxJug,$descripcion,$costo){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call add_torneo(?,?,?,?,?,?,?,?,?,?,?,?);");
    $sentencia->bindParam(1, $id, PDO::PARAM_INT);
    $sentencia->bindParam(2, $consola, PDO::PARAM_INT);
    $sentencia->bindParam(3, $juego, PDO::PARAM_INT);
    $sentencia->bindParam(4, $titulo, PDO::PARAM_STR);
    $sentencia->bindParam(5, $fecha, PDO::PARAM_STR);
    $sentencia->bindParam(6, $hora, PDO::PARAM_STR);
    $sentencia->bindParam(7, $modalidad, PDO::PARAM_INT);
    $sentencia->bindParam(8, $totIntegrantes, PDO::PARAM_INT);
    $sentencia->bindParam(9, $forma, PDO::PARAM_INT);
    $sentencia->bindParam(10, $maxJug, PDO::PARAM_INT);
    $sentencia->bindParam(11, $descripcion, PDO::PARAM_STR);
    $sentencia->bindParam(12, $costo, PDO::PARAM_INT);
    if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
function get_Torneos(){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_Torneos();");
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
function cancelar_torneo($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL cancelar_torneo(?);");
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
function finalizar_torneo($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL finalizar_torneo(?);");
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
          //vista gamer
function get_TorneosRegistro($id){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_TorneosRegistro(?);");
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
function get_MisTorneos($id){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_MisTorneos(?);");
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
function get_invitaciones($id){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_invitaciones(?);");
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
function get_UsuariosTorneosRegistro($id){
    $resultado=array();
    include_once '../config.php';
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_UsuariosTorneosRegistro(?);");
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
function get_Torneo($id){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL get_Torneo(?);");
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
function add_equipoTorneo($idTorneo,$nombreEq,$xml,$n,$idUsu){
  $resultado=array();
  include_once '../config.php';
  try{
    $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
    $conn->exec("set names utf8");
    $sentencia=$conn->prepare("call add_equipoTorneo(?,?,?,?,?);");
    $sentencia->bindParam(1, $idTorneo, PDO::PARAM_INT);
    $sentencia->bindParam(2, $nombreEq, PDO::PARAM_STR);
    $sentencia->bindParam(3, $xml, PDO::PARAM_STR);
    $sentencia->bindParam(4, $n, PDO::PARAM_INT);
    $sentencia->bindParam(5, $idUsu, PDO::PARAM_INT);
    if(!$sentencia->execute()){
            $resultado=$sentencia->errorInfo();
    }
  }catch(PDOException $exception) {
      $resultado=array("error","conexion",$exception->getMessage());
  }
  $conn=null;
  return $resultado;
}
function aceptar_invitacion($idE,$idU){
    $resultado=array();
    include_once '../config.php';
    try{
        $conn = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USER,DB_PASSWORD);
        $conn->exec("set names utf8");
        $sentencia=$conn->prepare("CALL aceptar_invitacion(?,?);");
        $sentencia->bindParam(1,$idE,PDO::PARAM_INT);
        $sentencia->bindParam(2,$idU,PDO::PARAM_INT);
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
