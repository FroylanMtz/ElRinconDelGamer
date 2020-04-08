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



    /***  ADMINISTRACION DE CONSOLAS ***/

    public function obtenerDatosPlataformas(){

        $datosDePlataformas = array();
        $datosDePlataformas = Datos::traerDatosPlataformas();
        return $datosDePlataformas;
        
    }

    public function guardarDatosConsola(){

        if( empty($_POST['totalMonedas']) || empty($_POST['numeroConsola']) || empty($_POST['serialConsola']) || empty($_POST['costoRenta']) ){


            echo '<script> 
                    window.location.href = "inicio.php?action=agregar_consola&e=camposVacios";
                  </script>';


        }else{
            
            $nombreConsola = $_POST['plataforma'];
            $numeroConsola = $_POST['numeroConsola'];
            $serialConsola = $_POST['serialConsola'];
            $costoRenta = $_POST['costoRenta'];
            $totalMonedas = $_POST['totalMonedas'];

            $datosConsola = array('plataformaConsola' => $nombreConsola,
                            'numeroConsola' => $numeroConsola,
                            'serialConsola' => $serialConsola,
                            'costoRenta' => $costoRenta,
                            'totalMonedas' => $totalMonedas );

            
            $respuesta = Datos::guardarDatosConsola($datosConsola, "consolas");
            
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=agregar_consola&e=successGuardar";
                      </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=agregar_consola&e=errorGuardar";
                      </script>';
            }

        }  

        

    }

    public function obtenerDatosconsolas(){

        $datosDeConsolas = array();
        $datosDeConsolas = Datos::traerDatosConsolas();

        return $datosDeConsolas;

    }

    public function obtenerDatosconsola() {
        $idConsola = $_GET['id'];

        $datosDeConsola = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del usuario a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $datosDeConsola = Datos::traerDatosConsola($idConsola);

        return $datosDeConsola;
    }


    public function editarDatosConsola() {

        if( empty($_POST['totalMonedas']) || empty($_POST['numeroConsola']) || empty($_POST['serialConsola']) || empty($_POST['costoRenta']) ){


            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=camposVacios";
                  </script>';


        }else{


            $idConsola = $_GET['id'];
            $nombreConsola = $_POST['plataforma'];
            $numeroConsola = $_POST['numeroConsola'];
            $serialConsola = $_POST['serialConsola'];
            $costoRenta = $_POST['costoRenta'];
            $totalMonedas = $_POST['totalMonedas'];

            $datosConsola = array('plataformaConsola' => $nombreConsola,
                            'numeroConsola' => $numeroConsola,
                            'serialConsola' => $serialConsola,
                            'costoRenta' => $costoRenta,
                            'totalMonedas' => $totalMonedas,
                            'id' => $idConsola );
            
            $respuesta = Datos::editarDatosConsola($datosConsola, "consolas");
            
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=consolas&e=successEditar";
                        </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=consolas&e=errorEditar";
                        </script>';
            }
        
        }

    }


    public function eliminarConsola(){

        $matriculaAlumno = $_GET['id'];
        $respuesta = Datos::eliminarDatosConsola($matriculaAlumno, "consolas");
        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        
        if($respuesta == "success"){
            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=successEliminar";
                  </script>';
        }else{
            //echo '<script> alert("Error al eliminar") </script>';

            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=errorEliminar";
                  </script>';
        }

    }


}