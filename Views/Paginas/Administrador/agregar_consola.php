<?php
//Se instancia a un objeto de l clase controlador para que se manden llamar todos los metodo que cominican a la vista con el controlador
$controlador = new Controlador();

//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosPlataformas = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosPlataformas = $controlador -> obtenerDatosPlataformas();

?>

<?php
    if(isset($_GET['e']) ){

        if($_GET['e'] == 'camposVacios'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe llenar todos los campos'
                }) </script> ";
        }

        if($_GET['e'] == 'successGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Guardado con exito',
                text: 'Consola guardado con exito'
                }) </script> ";
        }

        if($_GET['e'] == 'errorGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al guardar los datos'
                }) </script> ";
        }

    }
?>


<section class="content-header">
    <h1>
        Agregar Consola
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Consolas </a></li>
        <li class="active">Agregar Consola</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<div class="row">

    <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos de la consola</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                
                <div class="box-body">

                    <div class="form-group">
                        <label for="plataforma">Plataforma</label>
                        <select class="form-control" name="plataforma">
                            <?php
                                for($i = 0; $i < count($datosPlataformas); $i++ ){
                                    echo '<option value="'.$datosPlataformas[$i]['id'].'"> '. $datosPlataformas[$i]['nombre'] .' </option>';
                                }
                            ?>
                        </select>

                    </div>


                    <div class="form-group">
                        <label for="numeroConsola">Numero</label>
                        <input type="number" class="form-control" name="numeroConsola" placeholder="Numero de la consola">
                    </div>
                    
                    <div class="form-group">
                        <label for="serialConsola">Serial</label>
                        <input type="text" class="form-control" name="serialConsola" placeholder="Serial de la consola">
                    </div>

                    <div class="form-group">
                        <label for="costoRenta">Costo de renta</label>
                        <input type="text" class="form-control" name="costoRenta" placeholder="Costo de ranta por hora">
                    </div>

                    <div class="form-group">
                        <label for="totalMonedas">Total de monedas que ganas</label>
                        <input type="text" class="form-control" name="totalMonedas" placeholder="Monedas que obtiene el socio por renta">
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
if(isset($_POST['numeroConsola']) ){
    
    //Funcion del controlador que permite la lecutra de todas las variables del formulario para reunirlas en un objeto y posteriormente pasarlas al modelo apra que la almacene
    $controlador ->  guardarDatosConsola();

    

}

?>