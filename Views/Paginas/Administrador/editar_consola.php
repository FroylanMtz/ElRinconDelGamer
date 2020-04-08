<?php

$controlador = new Controlador();
$datosConsola = array();
$datosConsola = $controlador -> obtenerDatosconsola();


//Se crean dos arreglos para recibir la informacion de las carreras y los tutores
$datosPlataformas = array();

//Se mandan llamar los metodos que traen estos datos, estos retornan un arreglo asociativo, esta informacion sera desplegada en los campos del formulario en donde se necesite mostrar los datos de la tabla que existen
$datosPlataformas = $controlador -> obtenerDatosPlataformas();

?>




<section class="content-header">
    <h1>
        Editar Consola
        
    </h1>
        <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Consolas </a></li>
        <li class="active">Editar Consola</li>
    </ol>
           
</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Edite los datos de la consola</h3>
            </div>

            <form role="form" method='post' >
                
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
                        <input type="text" class="form-control" name="numeroConsola" value="<?=$datosConsola[0][2] ?>"  placeholder="Numero de la consola">
                    </div>
                    
                    <div class="form-group">
                        <label for="serialConsola">Serial</label>
                        <input type="text" class="form-control" name="serialConsola" value="<?= $datosConsola[0][3] ?>" placeholder="Serial de la consola">
                    </div>

                    <div class="form-group">
                        <label for="costoRenta">Costo de renta</label>
                        <input type="text" class="form-control" name="costoRenta" value="<?= $datosConsola[0][4] ?>" placeholder="Costo de ranta por hora">
                    </div>

                    <div class="form-group">
                        <label for="totalMonedas">Total de monedas que ganas</label>
                        <input type="text" class="form-control" name="totalMonedas" value="<?= $datosConsola[0][5] ?>" placeholder="Monedas que obtiene el socio por renta">
                    </div>
                

                    </div>
                        <div class="box-footer">
                        <center> <button type="submit" class="btn btn-primary">Guardar Datos</button> </center>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

</section>


<?php

//Toda la informacion la cacha el metodo del controlador para editar los datos del usuario que se le paso como parametro GET la matricula
if(isset($_POST['numeroConsola'])){
        
    $controlador -> editarDatosConsola();

}

?>