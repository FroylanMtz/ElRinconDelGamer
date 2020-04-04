<?php
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosCarreras = array();
$datosTutores = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosCarreras = $controlador -> obtenerDatosCarreras();
$datosTutores = $controlador -> obtenerDatosTutores();
?>

<section class="content-header">
    <h1>
        Agregar Alumno
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Alumnos </a></li>
        <li class="active">Agregar Alumno</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos del alumno</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                
                <div class="box-body">

                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input type="number" class="form-control" name="matricula" placeholder="Ingrese la matricula">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre completo del alumno">
                </div>

                <div class="form-group">    
                    <label for="carrera">Carrera</label>
                    <select class="form-control" name="carrera">
                        <?php

                            for($i = 0; $i < count($datosCarreras); $i++ ){
                                echo '<option value="'.$datosCarreras[$i]['carrera_id'].'"> '. $datosCarreras[$i]['nombre'] .' </option>';
                            }
                        
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="situacion">Situacion Academica</label>
                    <select class="form-control" name="situacion">
                        <option>Regular</option>
                        <option>Especial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" placeholder="alguien@ejemplo.com">
                </div>

                <div class="form-group">
                    <label for="tutor">Tutor</label>
                    <select class="form-control" name="tutor">
                        <?php
                            for($i = 0; $i < count($datosTutores); $i++ ){
                                echo '<option value="'.$datosTutores[$i]['numero_empleado'].'"> '. $datosTutores[$i]['nombre'] .' </option>';
                            }
                        ?>
                    </select>
                </div>

                <!--Campo que subre la fotografia al servidor, lo coloca en una carpeta temporal desde donde se toma y se almacena en una carpeta especificada, para poder subir la imagen en el formulario se debe cambiar el encabezado a tipo  enctype="multipart/form-data" -->
                <div class="form-group">
                    <label for="foto">Fotografia</label> <br>
                    <input type="file" class="form-control input-lg" name="foto"  />
                </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary input-lg" value="Guardar Datos" /> </center>
                </div>
                
            </form>

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

</section>

<?php

//Compara si la variable exista, para que cuando entre sin que se le haya pulsado al boton esto no se accione y trate de hacer algo, eso solo se habilitara cuando el usaurio de click en el boton, es lo que significa
if(isset($_POST['matricula'])){
    
    //Funcion del controlador que permite la lecutra de todas las variables del formulario para reunirlas en un objeto y posteriormente pasarlas al modelo apra que la almacene
    $controlador ->  guardarDatosAlumno();

}

?>