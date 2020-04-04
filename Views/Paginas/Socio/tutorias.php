<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosSesiones = array();

//Y se llena ese array con la respuesta con los datos
$datosSesiones = $controlador -> obtenerDatosSesiones();

?>

<section class="content-header">
    <h1>
        Tutorias
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tutorias </a></li>
        <li class="active"> Lista de tutorias </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="index.php?action=agregar_tutoria" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nueva tutoria </a>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Id Sesion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Tema</th>
                    <th>Observaciones</th>
                    <th>Alumno (s)</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0; $i < count($datosSesiones); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosSesiones[$i]['sesion_id'] .'</td>';
                            echo '<td>'. $datosSesiones[$i]['fecha'] .'</td>';
                            echo '<td>'. $datosSesiones[$i]['hora'] .'</td>';
                            echo '<td>'. $datosSesiones[$i]['tipo'] .'</td>';
                            echo '<td>'. $datosSesiones[$i]['tema_nombre'] .'</td>';
                            echo '<td>'. $datosSesiones[$i]['observaciones'] .'</td>';

                            $alumnosDeSesion = $controlador->obtenerAlumnosSesion($datosSesiones[$i]['sesion_id']);
                            
                            $alumnosEnUnaVariable = "";
                           
                            for($j=0; $j <count($alumnosDeSesion); $j++){
                                $alumnosEnUnaVariable = $alumnosEnUnaVariable . ' ' . $alumnosDeSesion[$j]['nombre'] . '<br/>';
                            }

                            echo '<td>' . $alumnosEnUnaVariable . '</td>';

                            echo '<td>  <a href="index.php?action=tutorias&accion=eliminar_sesion&id='.$datosSesiones[$i]['sesion_id'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
                        echo '</tr>';
                    }
                ?>

                
            </tbody>
        </table>
    </div>
</div>


</section>
<!-- /.content -->

<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_sesion"){
        $controlador -> eliminarSesion();
    }
}

?>