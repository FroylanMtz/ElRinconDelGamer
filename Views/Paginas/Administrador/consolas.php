<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new Controlador();

//Se crea un array que va a recibir todos los obejtos 
$datosConsolas = array();

//Y se llena ese array con la respuesta con los datos
$datosConsolas = $controlador -> obtenerDatosconsolas();

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

        if($_GET['e'] == 'successEditar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Guardado con exito',
                text: 'Datos editados con exito'
                }) </script> ";
        }

        if($_GET['e'] == 'errorEditar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al guardar los datos'
                }) </script> ";
        }


        if($_GET['e'] == 'successEliminar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Datos eliminados',
                text: 'Datos eliminados con exito'
                }) </script> ";
        }

        if($_GET['e'] == 'errorEliminar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al eliminar los datos'
                }) </script> ";
        }



    }
?>


<section class="content-header">
    <h1>
        Consolas
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Consolas </a></li>
        <li class="active"> Lista de Consolas </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="inicio.php?action=agregar_consola" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nueva consola </a>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Plataforma</th>
                    <th>Numero</th>
                    <th>Serial</th>
                    <th>Costo renta</th>
                    <th>Total monedas</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosConsolas); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosConsolas[$i]['nombre_plataforma'] .'</td>';
                            echo '<td>'. $datosConsolas[$i]['numero'] .'</td>';
                            echo '<td>'. $datosConsolas[$i]['serial_consola'] .'</td>';
                            echo '<td>'. $datosConsolas[$i]['costo_renta'] .'</td>';
                            echo '<td>'. $datosConsolas[$i]['total_monedas'] .'</td>';
                           
                            echo '<td> <a href="inicio.php?action=editar_consola&id='.$datosConsolas[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="inicio.php?action=consolas&accion=eliminar_consola&id='.$datosConsolas[$i]['id'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
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
    if( $_GET['accion'] == "eliminar_consola"){
        $controlador -> eliminarConsola();
    }
}

?>