<?php
require_once('conexion.php');

class Datos extends Conexion{

    public function validarUsuario($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo AND contrasena = md5(:contra) ");
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);
        $stmt->execute();
        $r = array();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return $r;
    }




    /* FUNCIONES PARA LA ADMINISTRADOR DE SOCIOS */

    public function registrarSocioModel($datosSocio, $tabla){
        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, fecha_nacimiento, genero, telefono, correo, contrasena, tag) VALUES(:nombre, :fecha_nacimiento, :genero, :telefono, :correo, md5(:contrasena), :tag) ");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":nombre", $datosSocio["nombre_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datosSocio["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datosSocio["sexo"], PDO::PARAM_INT);
        $stmt->bindParam(":telefono", $datosSocio["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosSocio["correo_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosSocio["contra_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":tag", $datosSocio["game_tag"], PDO::PARAM_STR);

        print_r($datosSocio);

        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            return "success";
        }else{
            //$stmt->close();
            return "error";
        }

    }

    /*******************  ADMINSITRACION DE CONSOLAS    ***************/
    public function traerDatosPlataformas() {

        //Se prepara el query
        $query = Conexion::conectar()->prepare("SELECT id, nombre FROM plataformas");

        //se ejecuta
        $query->execute();

        $resultado = array();

        //Se trane todos los ddatos
        $resultado = $query->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $resultado;

    }


    public function guardarDatosConsola($datosConsola, $tabla){
        //Se prepara el query con el comando INSERT -> DE INSERTAR 
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_plataforma, numero, serial_consola, costo_renta, total_monedas) VALUES(:id_plataforma, :numero, :serial, :costo_renta, :total_monedas) ");
        
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)

        $stmt->bindParam(":id_plataforma", $datosConsola["plataformaConsola"] , PDO::PARAM_INT);
        $stmt->bindParam(":numero", $datosConsola["numeroConsola"], PDO::PARAM_INT);
        $stmt->bindParam(":serial", $datosConsola["serialConsola"], PDO::PARAM_STR);
        $stmt->bindParam(":costo_renta", $datosConsola["costoRenta"], PDO::PARAM_INT);
        $stmt->bindParam(":total_monedas", $datosConsola["totalMonedas"], PDO::PARAM_INT);

        //print_r($datosConsola);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }


    public function traerDatosConsolas() {

        $stmt = Conexion::conectar()->prepare(" 
            SELECT consolas.id as id, consolas.id_plataforma as id_plataforma, consolas.numero as numero, consolas.serial_consola as serial_consola, consolas.costo_renta as costo_renta, consolas.total_monedas as total_monedas, plataformas.nombre as nombre_plataforma FROM consolas INNER JOIN plataformas ON consolas.id_plataforma = plataformas.id;
        ");

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }

    public function traerDatosConsola($id){

        $stmt = Conexion::conectar()->prepare(" 
            SELECT consolas.id as id, consolas.id_plataforma as id_plataforma, consolas.numero as numero, consolas.serial_consola as serial_consola, consolas.costo_renta as costo_renta, consolas.total_monedas as total_monedas, plataformas.nombre as nombre_plataforma FROM consolas INNER JOIN plataformas ON consolas.id_plataforma = plataformas.id WHERE consolas.id = :id;
        ");

        $stmt->bindParam(":id", $id , PDO::PARAM_INT);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
        
        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }



    public function editarDatosConsola($datosConsola, $tabla){
        //Se prepara el query con el comando INSERT -> DE INSERTAR 
       // $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_plataforma, numero, serial_consola, costo_renta, total_monedas) VALUES(:id_plataforma, :numero, :serial, :costo_renta, :total_monedas) ");
        
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET id_plataforma = :id_plataforma, numero = :numero, serial_consola = :serial, costo_renta = :costo_renta, total_monedas = :total_monedas
                                               WHERE id = :id ");

        $stmt->bindParam(":id_plataforma", $datosConsola["plataformaConsola"] , PDO::PARAM_INT);
        $stmt->bindParam(":numero", $datosConsola["numeroConsola"], PDO::PARAM_INT);
        $stmt->bindParam(":serial", $datosConsola["serialConsola"], PDO::PARAM_STR);
        $stmt->bindParam(":costo_renta", $datosConsola["costoRenta"], PDO::PARAM_INT);
        $stmt->bindParam(":total_monedas", $datosConsola["totalMonedas"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datosConsola["id"], PDO::PARAM_INT);

        //print_r($datosConsola);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }


    public function eliminarDatosConsola($id, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");

        $stmt->bindParam(":id", $id , PDO::PARAM_INT);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }


}

?>