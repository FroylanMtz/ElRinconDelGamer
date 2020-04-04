<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosAlumnos = array();

//Y se llena ese array con la respuesta con los datos
$datosAlumnos = $controlador -> obtenerDatosAlumnos();

?>

<section class="content-header">
    <h1>
        Alumnos
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active"> Lista de Alumnos </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="inicio.php?action=agregar_alumno" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nuevo alumno </a>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Situacion</th>
                    <th>Correo</th>
                    <th>Tutor</th>
                    <th>Foto</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosAlumnos); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosAlumnos[$i]['matricula'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['alumno'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['carrera'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['situacion'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['correo'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['tutor'] .'</td>';
                            echo '<td>'. $datosAlumnos[$i]['foto'] .'</td>';
                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina que se ellama editar y eliminar, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="inicio.php?action=editar_alumno&id='.$datosAlumnos[$i]['matricula'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="inicio.php?action=alumnos&accion=eliminar_alumno&id='.$datosAlumnos[$i]['matricula'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

    

</section>


<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_alumno"){
        $controlador -> eliminarAlumno();
    }
}

?>