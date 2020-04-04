<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Tutorias</title>

    

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--Favicon-->
  <link rel="shortcut icon" href="Public/img/logo.jpg">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Public/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <!-- Ionicons -->
  <link rel="stylesheet" href="Public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="Public/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="Public/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="Public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="Public/plugins/iCheck/all.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="Public/bower_components/select2/dist/css/select2.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="Public/plugins/timepicker/bootstrap-timepicker.min.css">
  
  

  <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="Public/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <?php

      include 'Views/Paginas/header.php';
      
      if( $_SESSION['tipoUsuario'] == 'Tutor' ){
        include 'Views/Paginas/navegacionTutor.php';
      }else{
        include 'Views/Paginas/navegacion.php';
      }

    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php
      
          //Mostraremos un controlador que muestra la plantilla 
          $controlador = new Controlador();

          //Mostramos la funcion 
          $controlador -> mostrarPagina();
      ?>
    
  </div>



<!--Archivos JavaScript-->

<!-- jQuery 3 -->
<script src="Public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="Public/bower_components/raphael/raphael.min.js"></script>
<script src="Public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="Public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="Public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="Public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="Public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Public/bower_components/moment/min/moment.min.js"></script>
<script src="Public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="Public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Public/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Public/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Public/js/demo.js"></script>

    <!-- jQuery 3 -->
<script src="Public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="Public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="Public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="Public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Public/bower_components/fastclick/lib/fastclick.js"></script>

<!-- Select2 -->
<script src="Public/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- bootstrap datepicker -->
<script src="Public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="Public/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="Public/plugins/iCheck/icheck.min.js"></script>

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
</body>
</html>
