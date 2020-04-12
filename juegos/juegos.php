<?php
session_start();
if(!isset($_SESSION['iniciada'])){
    header("Location: ../salir.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rincón del Gamer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--Favicon-->
  <link rel="shortcut icon" href="../Public/img/logo.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../Public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Public/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../Public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../Public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../Public/plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../Public/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../Public/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../Public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Public/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style media="screen">
.contenedortabla{
background-color: rgba(195,195,195,.7);
width: 90%;
padding-left: 1%;
padding-right: 1%;
margin-left: 5%;
margin-right: 5%;
margin-top: 10px;
margin-bottom: 20px;
border-radius: 10px;
}
.boton{
  border-radius: 15px;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php
      include '../Views/Paginas/header.php';
      if( $_SESSION['tipoUsuario'] == '1' ){
        include '../Views/Paginas/navegacionTutor.php';
      }else{
        include '../Views/Paginas/navegacion.php';
      }
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="row">
      <div class="col-xs-10">
      </div>
      <div class="col-xs-2">
          <a href="addJuego.php" class="btn btn-success btn-block boton" style="">Nuevo</a>
      </div>
    </div>
    <div class="contenedortabla">
        <h3><i class="fa fa-users"></i>
        Consolas</h3>
        <div id="resultado"></div>
        <div id="resultadoJson"></div>
    </div>
  </div>
</div>
<!--Archivos JavaScript-->
<!-- jQuery 3 -->
<script src="../Public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../Public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../Public/bower_components/raphael/raphael.min.js"></script>
<script src="../Public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../Public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../Public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../Public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../Public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../Public/bower_components/moment/min/moment.min.js"></script>
<script src="../Public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../Public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../Public/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Public/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../Public/js/demo.js"></script>
  <!-- jQuery 3 -->
<script src="../Public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../Public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../Public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../Public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="../Public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../Public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../Public/plugins/iCheck/icheck.min.js"></script>
<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- page script -->
<script>
  $(function () {
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true, format: 'yyyy-mm-dd'
    })
    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
    //Initialize Select2 Elements
    $('.select2').select2()
    //Inicializacion de Data-Table
    $('#tabla').DataTable({
      "ordering": false,
      "info":     false,
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
      }
    })
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url: 'getJuegos_.php',
      type: 'POST',
      dataType:'json',
      async: false,
      cache: false,
      beforeSend : function (){
        $("#resultado").fadeOut(200, function (){$("#resultado").html("<center><img border='0' src='../Public/img/loading.gif'></center>");});
        $("#resultado").fadeIn(100);
      },
      success: function (returndata) {
        $("#resultado").fadeOut(300, function (){$("#resultado").html("");});
        $("#resultadoJson").html("");
        console.log(returndata);
        if(returndata[0].error==0){
          var rJson = '<table id="example" class="display" cellspacing="0" width="100%" >';
          rJson = rJson + " <thead> <tr> <th>Juego</th> <th>Consola</th> <th>Plataforma</th> <th>Foto</th> <th>Editar</th> <th>Eliminar</th> </tr> </thead> ";
          for (i = 0; i < returndata[1].length; i++) {
            rJson = rJson + " <tbody>  <tr id='tr"+returndata[1][i].idJuego+"'><td>" + returndata[1][i].nombre + "</td><td>" + returndata[1][i].nombreCon + "</td><td>" + returndata[1][i].nombrePla + "</td><td><img style='border-radius: 25px;' width='80' height='80' src="+returndata[1][i].rutaFoto+" alt='Imagen'></td>";
            rJson = rJson + "<th><a href='addJuego.php?jjj="+returndata[1][i].idJuego+"' target='_self' class='btn btn-primary btn-block boton'>EDITAR</a></th>";
            rJson = rJson + "<th><a href='#' target='_self' data-id='"+returndata[1][i].idJuego+"' class='link_eliminar btn btn-danger btn-block boton'>ELIMINAR</a></th>";
            rJson = rJson + "</tr>";
          }
          rJson = rJson + " </tbody> </table>";
          $("#resultadoJson").html(rJson);
          $('#example').DataTable({
            "language":{
              "lengthMenu":"Mostrar _MENU_ registros por página.",
              "zeroRecords": "Lo sentimos. No se encontraron registros.",
              "info": "Mostrando página _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros aún.",
              "infoFiltered": "(filtrados de un total de _MAX_ registros)",
              "search" : "Búsqueda",
              "LoadingRecords": "Cargando ...",
              "Processing": "Procesando...",
              "SearchPlaceholder": "Comience a teclear...",
              "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "previous": "Anterior",
                "next": "Siguiente",
              }
            }
          });
        }else{
          var rError=returndata[1];
          $("#resultadoJson").html(rError);
        }
        jQuery(document).on('click','.link_eliminar', function() {
          var id=$(this).data("id");
          swal.fire({
            icon: "warning",
            title: "¿Seguro que deseas continuar?",
            text: "No podrás deshacer este paso...",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Continuar",
            closeOnConfirm: false
          }).then(function(isConfirm){
            if(isConfirm['dismiss'] != 'cancel'){
              $.ajax({
                url: 'delete_consola_.php',
                type: 'POST',
                data:{'id': id},
                async: false,
                cache: false,
                beforeSend : function (){
                 $("#resultado").fadeOut(200, function (){$("#resultado").html("<center><img border='0' src='../Public/img/loading.gif'></center>");});
                 $("#resultado").fadeIn(100);
                 },
                success: function (returndata) {
                  if(returndata == 1){
                    swal.fire({
                      icon: "success",
                      title: "Consola eliminada",
                      text: "Una consola fue eliminada con éxito.",
                      confirmButtonText: "Aceptar",
                      type: "success"
                    });
                    $('#tr'+id).remove();
                    $("#resultado").fadeOut(300, function (){$("#resultado").html("");});
                    $("#resultado").fadeIn(300);
                  }else {
                    $("#resultado").fadeOut(300, function (){$("#resultado").html(returndata);});
                    $("#resultado").fadeIn(300);
                  }
                },
                error: function (){
                 $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
                 $("#resultado").fadeIn(100);
                 }
              });
            }
          });
        });
      },
      error: function (){
        $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
        $("#resultado").fadeIn(100);
      }
    });
  });
</script>
</body>
</html>
