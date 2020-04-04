<?php

class Controlador
{
    private $enlace = '';
    private $pagina = '';

    //Llamar a la plantilla
    public function cargarPlantilla() {
        session_start();
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        if( isset($_SESSION['iniciada']) ){
            include 'Views/plantilla.php';
        }else{
            $pagina = $_GET['p'];
            if($pagina == 'registrarse'){
                include 'signup.php';
            } else if($pagina == 'iniciarSesion'){
                include 'login.php';
            }else{
                if( $pagina == 'contraincorrecta'){
                    include 'login.php';
                }
            }
        }
    }

    //Interacción con el usuario
    public function mostrarPagina() {

        //Trabajar con los enlaces de las páginas
        //Validamos si la variable "action" viene vacia, es decir cuando se abre la pagina por primera vez se debe cargar la vista index.php

        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlace = $_GET['action'];
        }else{
            //Si viene vacio inicializo con el dashboard dependiendo del tipo de usuario loggeado
            if($_SESSION['tipoUsuario'] == 'Socio'){
                $enlace = 'dashboard_socio';
            }else{
                $enlace = 'dashboard';
            }
        }

        //Mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, etc.
        //Para esto hay que mandar al modelo para que haga dicho proceso y muestre la informacions

        $pagina = Modelo::mostrarPagina($enlace);

        include $pagina;
    }

    public function iniciarSesion() {
        if( isset($_POST['correo']) && isset( $_POST['contrasena'] ) && isset($_POST['tipoUsuario']) )
        {
            $datos = array( 'correo'      => $_POST['correo'],
                            'contrasena'  => $_POST['contrasena'],
                            'tipoUsuario' => $_POST['tipoUsuario'] );
            
            if($datos['tipoUsuario'] == 'Administrador' )
            {
                $respuesta = Datos::validarUsuario($datos, 'usuarios');
            }else{
                $respuesta = Datos::validarUsuario($datos, 'socios');
            }
           
            if( $respuesta )
            {
                if( $datos['tipoUsuario'] == 'Administrador' ){
                    $tipoUsuario = $respuesta['rol'];
                    $idUsuario = $respuesta['usuario_id'];
                }else{
                    $tipoUsuario = 'Socio';
                    $idUsuario = $respuesta['numero_empleado'];
                }

                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['idUsuario'] = $idUsuario;
                
                header("location:inicio.php?action=dashboard");
                //echo 'Bienvenido al sistema';
            }else
            {
                header("location:inicio.php?p=contraincorrecta");
            }
        }
    }

    /**  FUNCIONES PARA LA ADMINISTRACION DE LOS SOCIOS **/
    public function registrarSocio(){
        
        if(isset($_POST['nombre'])){

            $nombre_usuario = $_POST['nombre'];
            $game_tag = $_POST['tag'];
            $correo_usuario=$_POST['correo'];
            $contra_usuario=$_POST['contrasena'];
            $repContrasena = $_POST['repContrasena'];
            $fechaNacimiento = $_POST['fecha'];
            $telefono = $_POST['telefono'];
            $sexo = $_POST['sexo'];
            
            if(  empty($_POST['telefono']) || empty($_POST['fecha']) || empty($_POST['nombre']) || empty($_POST['tag']) || empty($_POST['correo']) || empty($_POST['contrasena']) || empty($_POST['repContrasena']) ){
                
                header("location: inicio.php?p=registrarse&e=camposVacios");

            }else{

                if( $contra_usuario == $repContrasena ){

                    $datos = array( 'nombre_usuario'=>$nombre_usuario,
                                    'game_tag'=>$game_tag,
                                    'correo_usuario'=>$correo_usuario,
                                    'contra_usuario'=>$contra_usuario,
                                    'fecha_nacimiento' => $fechaNacimiento,
                                    'telefono' => $fechaNacimiento,
                                    'sexo' => $sexo );
    
                    //print_r($datos);

                    $respuesta = Datos::registrarSocioModel($datos, 'socios');

                    if($respuesta == "success"){
                        header("location: inicio.php?p=iniciarSesion&e=recienRegistrado");
                    }else{
                        header("location: inicio.php?p=registrarse&e=errorAlGuardar");
                    }

                }else{
                    header("location: inicio.php?p=registrarse&e=noCoincideContrasena");
                }

            }
        
        }
    }



    /*** FUNCIONES PARA LA ADMINISTRACION DE LOS ALUMNOS ***/

    //Funcion que retorna a la vista de registro los datos de las carreras disponibles para ponerlos en una lista seleccionable
    public function obtenerDatosCarreras()
    {

        $datosDeCarreras = array();
        
        //Manda llamar el metodo desde el modelo y pasandole la tabla de donde se van a extraer los datos como parametro
        $datosDeCarreras = Datos::traerDatosCarreras("carreras");

        return $datosDeCarreras;
    }

    //Funcion para obtener los datos de los tutores registros, esto debido a que cuando se registra o actualiza el registro de un alumno necesita vincular un tutor, estos datos son desplegados en un lista
    public function obtenerDatosTutores()
    {

        $datosDeTutores = array();
        
        //Manda llamar una funcion desde el modelo pasandole el nombre de la tabla desde dodne va a traer los datos
        $datosDeTutores = Datos::traerDatosTutores("tutores");

        return $datosDeTutores;
    }

    //Funcion que trae a todos los alumnos registrados en la dicha tabla para mostrarlos en la pagina de alumnos.php, se muestra ademas un boton para actualizar y eliminar para administrarlos
    public function obtenerDatosAlumnos()
    {
        $datosDeAlumnos = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosDeAlumnos = Datos::traerDatosAlumnos();

        return $datosDeAlumnos;
    }

    //Funcion que trae los datos de UN solo alumno, esto con el fin de actualizarlo en la vista editar_alumno, para saber que usario se va a editar se manda un parametro GET llamado id en el cual va el id del usuario que en este caso es la matricula
    public function obtenerDatosAlumno(){

        $matriculaAlumno = $_GET['id'];

        $datosDeAlumnos = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del usuario a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $datosDeAlumnos = Datos::traerDatosAlumno($matriculaAlumno);

        return $datosDeAlumnos;
    }

    //Funcion que se manda llamar al registrar un usuario nuevo a la aplicacion, todos los datos son enviados a traves de un formulario el cual esta funcion cacha con los parametros POST identificandolos con el respectivo nombre de campo de la vista agregar_alumno.php
    public function guardarDatosAlumno(){
        
        //Datos recibidos de la vista, necesarios para identificar al usuario
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $situacion = $_POST['situacion'];
        $correo = $_POST['correo'];
        $tutor = $_POST['tutor'];

        //Para saber el nombre de la foto se manda llamar esta funcion
        $nombreArchivo = basename($_FILES['foto']['name']);
        
        //Se concatena al nombre la carpeta en donde se guardaran todas las fotos cargadas por los usuarios
        $directorio = 'fotos/' . $nombreArchivo;

        //Para hacer algunas validaciones y el usuario por ejemplo no pase como foto una archivo pdf se extrae la extencion de la foto
        $extension = pathinfo($directorio , PATHINFO_EXTENSION);

        //Todos los datos obtenidos del formulario son guardados en un objeto para luego ser pasados al modelo en donde serna almacenados en su respectiva tabla
        $datosAlumno = array('matricula' => $matricula,
                            'nombre' => $nombre,
                            'carrera' => $carrera,
                            'situacion' => $situacion,
                            'correo' => $correo,
                            'tutor' => $tutor,
                            'foto' => $matricula.'.'.$extension ); //El nombre de la foto de cada uusario sera el nombre de su matricula, para de esta forma llevar un control y que las fotos no se repiten y se sobreescriban


        //Aqui es donde se hace la validacion de el archivo sea una foto con extensiones de imagenes frecuentes y no un formato .docs o un pdf por ejemplo
        if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){
            echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
        }else{

            //Una vez que se ha cargado la imagen a los archivos temporales de php, esta funcion la mueve de ahi y la coloca en la direccion donde se guardaran las fotos ya con el nombre presonalizado por cada usuario, que es su matricula
            move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$matricula . '.' . $extension);

            //Despues de que se ha guardado la imagen en la carpeta, se manda llamar la funcion del modelo en la cual se pasan el objeto con los datos del formulario para ser guardado
            $respuesta = Datos::guardarDatosUsuario($datosAlumno, "alumnos");

            //Se recibe la respuesta del metodo y si esta es exitosa se manda un mensaje de notificacion al cliente y se reenvia al usuario a la lista de todos los usuarios para que vea la insercion del nuevo alumno.
            if($respuesta == "success"){
                echo '<script> 
                            alert("Datos guardados correctamente");
                            window.location.href = "index.php?action=alumnos"; 
                      </script>';
                //header('index.php?action=alumnos');
            }else{
                //En caso de haber un error se queda en la misma pagina y le notifica al ususario
                echo '<script> alert("Error al guardar") </script>';
            }
        }
    }

    //Funcion que permite editar los datos de un alumno pasandole los datos por medio de un formualrio, esta funcion es muy parecida a la de arriba a diferencia que manda a otra funcion al modelo la cual sirve para actualizar los datos de un respectivo alumno
    public function editarDatosAlumno(){

        $matricula = $_GET['id'];
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $situacion = $_POST['situacion'];
        $correo = $_POST['correo'];
        $tutor = $_POST['tutor'];
        //$foto = $_POST['fotoActual'];
        
        $nombreArchivo = basename($_FILES['foto']['name']);
        $directorio = 'fotos/' . $nombreArchivo;
        $extension = pathinfo($directorio , PATHINFO_EXTENSION);
        

        //Tambien se compara si el usuario solo quiere actualizar los datos o tambien la foto de perfil, en caso de que solo quiera editar los datos y quiera conservar la foto entra en el if de acontinuacion para almacenar el nombre de la misma foto que tenia previamente
        if($nombreArchivo == "" ){
            $foto = $_POST['fotoActual'];
        }else{
            
            if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG'){
                echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
                
                $foto = $_POST['fotoActual'];

            }else{

                //En caso de que el usuario haya querido ademas de actualizar sus datos en tipo texto, tambien editar la foto, entra aesta parte del if en donde crea una nueva foto, o sobreescibe la existente y la almacena en la variable foto la cual sera almacenada con los datos realizado.

                move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$matricula . '.' . $extension);

                $foto = $matricula . '.' . $extension;

            }
        }

        //Se finaliza de crear los datos, ya con la  foto nueva o en caso de que haya elegido una nueva
        $datosAlumno = array('matricula' => $matricula,
                            'nombre' => $nombre,
                            'carrera' => $carrera,
                            'situacion' => $situacion,
                            'correo' => $correo,
                            'tutor' => $tutor,
                            'foto' => $foto );
        
        //Se manda ese objeto con los datos al modelo para que los almacenen en la tabla pasada por parametro aqui abajo
        $respuesta = Datos::editarDatosUsuario($datosAlumno, "alumnos");
        
        //El metodo responde con un success o un error y se realiza las notificaciones pertinentes al usuario
        if($respuesta == "success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "index.php?action=alumnos"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    //Funcion que sirve para eliminar los datos de un alumno de la tabla, para saber que alumno eliminar se pasa como parametro GET la matricula del alumno, y posterioremte se pasa como parametro junto con el nombre de la tabla para que el modelo haga el resto
    public function eliminarAlumno(){

        $matriculaAlumno = $_GET['id'];
        $respuesta = Datos::eliminarDatosAlumno($matriculaAlumno, "alumnos");
        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Alumno eliminado");
                    window.location.href = "index.php?action=alumnos";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }

    }

    //Funcion que edita los datos de un registro existente en la tabla de los temas de las tutorias (tema_sesion), para saber que dato se va a eliminar y que nueva informacion se le va a añadir se le manda esta informacion al modelo a traves  de un objeto el cual dicha informacion porviene de la vista en donde esta el formulario en donde el usuario puede editar esta informacion
    public function editarDatosTema(){
        $datosTema = array( 'id'   => $_GET['id'],
                            'tema' => $_POST['tema'] );

        $respuesta = Datos::editarDatosTema($datosTema, "sesion_tema");

        if($respuesta == "success"){
            echo '<script> 
                    alert("Tema editado correctamente");
                    window.location.href = "index.php?action=temas";
                  </script>';
        }else{
            echo '<script> alert("Error al editar") </script>';
        }

    }

    //Funcion que trae todos los alumnos en la tabla asociados a un tutor en especifico, sacando el id del tutor de la sesion en donde se le asigno al momento en que el tutor inicia sesion
    public function obtenerDatosAlumnosPorProfe(){
        $datosDeAlumnos = array();
        $idTutor = $_SESSION['idUsuario'];
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $datosDeAlumnos = Datos::traerDatosAlumnosPorProfe($idTutor);
        return $datosDeAlumnos;
    }



}