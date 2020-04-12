<?php
require_once('conexion.php');

class Datos extends Conexion{

    public function validarUsuario($datos){

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo AND contrasena = md5(:contra) ");
        $stmt = Conexion::conectar()->prepare("call get_login (?,md5(?));");
        $stmt->bindParam(1, $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindParam(2, $datos['contrasenia'], PDO::PARAM_STR);
        $stmt->execute();
        $r = array();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return $r;
    }
    /* FUNCIONES PARA LA ADMINISTRADOR DE SOCIOS */

    public function registrarUsuario($datosUsuario){
        //Se prepara el query con el comando INSERT -> DE INSERTAR
        //$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, fecha_nacimiento, genero, telefono, correo, contrasena, tag) VALUES(:nombre, :fecha_nacimiento, :genero, :telefono, :correo, md5(:contrasena), :tag) ");
        $stmt = Conexion::conectar()->prepare("call add_usuario (?,?,?,?,?,?,?,?,?,?,?);");
        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(1, $datosUsuario["tipoUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(2, $datosUsuario["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(3, $datosUsuario["aPaterno"] , PDO::PARAM_STR);
        $stmt->bindParam(4, $datosUsuario["aMaterno"] , PDO::PARAM_STR);
        $stmt->bindParam(5, $datosUsuario["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(6, $datosUsuario["sexo"], PDO::PARAM_INT);
        $stmt->bindParam(7, $datosUsuario["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(8, $datosUsuario["correo_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(9, $datosUsuario["game_tag"], PDO::PARAM_STR);
        $stmt->bindParam(10, $datosUsuario["contra_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(11, "null", PDO::PARAM_STR);
        $stmt->bindParam(12, $datosUsuario["usuarioRef"], PDO::PARAM_INT);


        print_r($datosSocio);

        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            return "success";
        }else{
            //$stmt->close();
            return "error";
        }

    }





    /* FUNCION PARA LA ADMINISTRACION DE LOS ALUMNOS */

    //Funcion que envia al controlador todos los datos de la tabla carreras, la cual contiene las carreras de la universdiad
    public function traerDatosCarreras($tabla){

        //Conexion::conectar() -> es igual a un objeto PDO el cual sirve para conectarse a la base de datos
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        //Metodo que ejecuta el query previamente preparado
        $stmt->execute();

        //Se crea un objeto tipo array para recibir los datos
        $r = array();
        //se traen todos los datos con la funcion fetchAll
        $r = $stmt->FetchAll();

        //Se retornan los datos para el modelo
        return $r;

    }

    //Igualita a la funcion para traer carreras solo que esta trae los tutores
    public function traerDatosTutores($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        $r = array();

        $r = $stmt->FetchAll();

        return $r;

    }

    //Funcion que trae todos los registros de la tabla alumnos para mostrarlos,
    //Como todas las tablas pertenecientes a esta base de datos estan relacionados, se ocupo de una union de las mismas, para de esta forma mandar todo como si fuera una unica tabla con la informacion necesaria por la tabla principal que es de alumnos, por ejemplo digamos que se relacion la tabla alumnos con la re tutores, pero solo es por un id, para poder ver el nombre del tutor es necesario esta union
    public function traerDatosAlumnos(){

        //Es la union de las tablas alumnos, carreras y tutores
        $stmt = Conexion::conectar()->prepare("SELECT t1.matricula as matricula, t1.nombre as alumno, t2.nombre as carrera, t1.situacion as situacion, t1.correo as correo, t3.nombre as tutor,t1.foto as foto FROM alumnos as t1 INNER JOIN carreras AS t2 ON t2.carrera_id = t1.carrera INNER JOIN tutores AS t3 ON t3.numero_empleado = t1.tutor_id");

        $stmt->execute();

        $r = array();

        //Se guardan todos los datos en el arreglo antes creado
        $r = $stmt->FetchAll();

        //SE retornan al controlador para luego ser aventadas a la vista xD
        return $r;

    }

    //Funcion que retorna solo los datos de un alumno, esta de igual forma utiliza la union de las tres tablas para mostrar toda la informacion del usuario de uan mejor forma, la diferencia es que a esta se le pasa un parametro para identificiar el registro que se quiere, que en este caso pra identificarlo se hace uso del id que es la matricula
    public function traerDatosAlumno($matricula){

        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT t1.matricula as matricula, t1.nombre as alumno, t2.nombre as carrera, t1.situacion as situacion, t1.correo as correo, t3.nombre as tutor,t1.foto as foto FROM alumnos as t1 INNER JOIN carreras AS t2 ON t2.carrera_id = t1.carrera INNER JOIN tutores AS t3 ON t3.numero_empleado = t1.tutor_id WHERE matricula = :matricula");

        //Se pasan los parametros de ese query
        $stmt->bindParam(":matricula", $matricula , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();

        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
        return $r;

    }

    //Funcion que almacena todos los datos de un alumno en su respectiva tabla, tabmien pasada por parametro (el nombre)
    public function guardarDatosUsuario($datosAlumno, $tabla){

        //Se prepara el query con el comando INSERT -> DE INSERTAR
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(matricula, nombre, carrera, situacion, correo, tutor_id, foto) VALUES(:matricula, :nombre, :carrera_id, :situacion, :correo, :tutor_id, :foto) ");

        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
        //Asi como se especifica como deben ser tratados (tipo de dato)
        $stmt->bindParam(":matricula", $datosAlumno["matricula"] , PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera_id", $datosAlumno["carrera"], PDO::PARAM_INT);
        $stmt->bindParam(":situacion", $datosAlumno["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor_id", $datosAlumno["tutor"], PDO::PARAM_INT);
        $stmt->bindParam(":foto", $datosAlumno["foto"], PDO::PARAM_STR);

        print_r($datosAlumno);
        //Se ejecuta dicha insercion y se notifica al controlador para que este le notifique a las vistas necesarias
        if($stmt->execute()){
            //$stmt->close();
            return "success";
        }else{
            //$stmt->close();
            return "error";
        }

    }

    //Funcion que se usa para editar un cierto registro de la tabla alumnos, Este de giual forma tiene dos parametros, uno para especificar los datos en una arreglo asociativo y otro para indicar el nombre de la tabla donde se editaran dichos datos
    public function editarDatosUsuario($datosAlumno, $tabla){

        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla
                                               SET nombre = :nombre, carrera = :carrera, situacion = :situacion, correo = :correo, tutor_id = :tutor, foto = :foto
                                               WHERE matricula = :matricula ");

        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
        $stmt->bindParam(":nombre", $datosAlumno["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosAlumno["carrera"], PDO::PARAM_INT);
        $stmt->bindParam(":situacion", $datosAlumno["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosAlumno["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":tutor", $datosAlumno["tutor"], PDO::PARAM_INT);
        $stmt->bindParam(":foto", $datosAlumno["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":matricula", $datosAlumno["matricula"] , PDO::PARAM_STR);

        print_r($datosAlumno);

        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();


    }

    //Funcion que elimina un registro pasandole la matricula para identificarlo asi como la tabla donde se encuentra ese registro
    public function eliminarDatosAlumno($matricula, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula ");

        $stmt->bindParam(":matricula", $matricula , PDO::PARAM_STR);

        //Le informa al controlador si se realizao con exito o no dicha transaccion
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }

    }





}

?>
