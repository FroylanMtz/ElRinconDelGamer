<?php
    $controlador= new Controlador();
    $controlador->registrarSocio();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrate en Rincón del gamer </title>

    <link rel="shortcut icon" href="Public/img/logo.png">
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

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Public/bower_components/font-awesome/css/font-awesome.min.css">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="Public/bower_components/Ionicons/css/ionicons.min.css">
    
    <!-- daterange picker -->
    <link rel="stylesheet" href="Public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
    
    <!-- iCheck -->
    <link rel="stylesheet" href="Public/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="Public/css/estilos_registro.css">

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>

</head>
<body class="hold-transition register-page">

    <?php
        if(isset($_GET['e']) ){

            if($_GET['e'] == 'noCoincideContrasena'){
                echo " <!-- Sweet alert -->
                <script> Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden'
                  }) </script> ";
            }

            if($_GET['e'] == 'camposVacios'){
                echo " <!-- Sweet alert -->
                <script> Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe llenar todos los campos'
                  }) </script> ";
            }


            if($_GET['e'] == 'errorAlGuardar'){
                echo " <!-- Sweet alert -->
                <script> Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al guardar los datos'
                  }) </script> ";
            }

        }
    ?>

    <div class="register-box">

        <div class="register-logo">
            <a href="index.php"> <img class="center-block " src="Public/img/logo.png" width="250px" height="100px"> </a>
        </div>

        <div class="register-box-body">

            <h4> <p class="login-box-msg"> Registro de socio </p> </h4>

            <form method="post">

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre completo" name="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">                                             
                    <input type="text" placeholder="Fecha de nacimiento" class="form-control" id="datepicker" name="fecha">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Gamer Tag" name="tag">
                    <span class="glyphicon glyphicon-fire form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <select class="form-control" placeholder="Sexo" name="sexo"> 
                        <option value="M"> Masculino </option>
                        <option value="F"> Femenino </option>
                    </select>
                </div>

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Correo Electronico" name="correo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
        
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repite contraseña" name="repContrasena">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"> Registrarse </button>
                    </div>
                </div>

            </form>

            <hr>
            <a href="inicio.php?p=iniciarSesion" class="text-center"> <p id="link_iniciarsesion"> Iniciar Sesión </p> </a> 
        </div>
    
    </div>


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


<script>
//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true, format: 'yyyy-mm-dd'
    })
</script>
</body>
</html>

