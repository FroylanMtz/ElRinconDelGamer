<?php

class Modelo
{

    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
    public function mostrarPagina($enlace){
        if($_SESSION['tipoUsuario'] != '2'){
            // Posible paginas para los administradores
            if( $enlace == "agregar_alumno" ||
                $enlace == "alumnos" ||
                $enlace == "dashboard" ||
                $enlace == "editar_alumno" ||
                $enlace == "salir"){
                //Mostramos el URL concatenado con la variable $enlacesModel
                $pagina = "Views/Paginas/Administrador/". $enlace .".php";
            }
            //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
            else if($enlace == "index"){
                $pagina = "Views/Paginas/Administrador/dashboard.php";
            }
            //Validar una LISTA BLANCA
            else{
                $pagina = "Views/Paginas/Administrador/dashboard.php";
            }

        }else{

            //Posible paginas para los tutores
            if( $enlace == "agregar_tutoria"  ||
                $enlace == "alumnos" ||
                $enlace == "dashboard_socio" ||
                $enlace == "reportes_alumno" ||
                $enlace == "reportes_tutoria" ||
                $enlace == "salir" ||
                $enlace == "tutorias" )
            {
                //Mostramos el URL concatenado con la variable $enlacesModel
                $pagina = "Views/Paginas/Tutores/". $enlace .".php";
            }
            //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
            else if($enlace == "index"){
                $pagina = "Views/Paginas/Tutores/dashboard_tutor.php";
            }
            //Validar una LISTA BLANCA
            else{
                $pagina = "Views/Paginas/Tutores/dashboard_tutor.php";
            }

        }



        return $pagina;
    }

}
