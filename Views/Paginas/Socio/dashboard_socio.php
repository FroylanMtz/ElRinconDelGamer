<?php


//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnosPorProfe();

$totalAlumnos = count($datosAlumnos);

//Se crea un array que va a recibir todos los obejtos 
$datosSesiones = array();

//Y se llena ese array con la respuesta con los datos
$datosSesiones = $controlador -> obtenerDatosSesiones();

$totalSesiones = count($datosSesiones);


//Se crea un array que va a recibir todos los obejtos 
$datosTemas = array();

//Y se llena ese array con la respuesta con los datos
$datosTemas = $controlador -> obtenerDatosTemas();

$totalTemas = count($datosTemas);



$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosTutores = $controlador -> obtenerDatosTutores();

$totalTutores = count($datosTutores);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Dashboard de tutor
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $totalAlumnos ?> </h3>

                <p>Alumnos a cargo</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $totalSesiones ?> </h3>

                <p>Sesiones de tutorias dadas</p>
            </div>

            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>

        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $totalTemas ?> </h3>

                <p>Temas de tutorias registrados</p>
            </div>
            <div class="icon">
                <i class="ion-android-bookmark"></i>
            </div>

        </div>
    </div>

    
    <div class="col-lg-6 col-xs-6">

        <div class="small-box bg-red">

            <div class="inner">
                <h3><?= $totalTutores ?> </h3>

                <p>Tutores al servicio de los alumnos</p>
            </div>

            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            

        
        </div>
    
    </div>


</div>

     


</section>