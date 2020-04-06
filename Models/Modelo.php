<?php

class Modelo
{

    //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
    public function mostrarPagina($enlace){

        if($_SESSION['tipoUsuario'] != 'Socio'){
            
            // Posible paginas para los administradores
            if( $enlace == "dashboard" || 
                $enlace == "salir" ||
                $enlace == "consolas" || 
                $enlace == "agregar_consola"){
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

            //Posible paginas para los socios
            if( $enlace == "dashboard_socio" ||
                $enlace == "salir" )
            {
                //Mostramos el URL concatenado con la variable $enlacesModel
                $pagina = "Views/Paginas/Socio/". $enlace .".php";
            }
            //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
            else if($enlace == "index"){
                $pagina = "Views/Paginas/Socio/dashboard_socio.php";
            }
            //Validar una LISTA BLANCA 
            else{
                $pagina = "Views/Paginas/Socio/dashboard_socio.php";
            }

        }

        return $pagina;
    }

}