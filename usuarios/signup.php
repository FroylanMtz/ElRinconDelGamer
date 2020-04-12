<?php
session_start();
if(!isset($_SESSION['iniciada'])){
    $session=false;
    $id=0;
}else{
  $id=0;
  $session=true;
  if(isset($_GET['qqa'])){
    $id = filter_var($_GET['qqa'],FILTER_SANITIZE_NUMBER_INT);
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rincón del gamer </title>
    <link rel="shortcut icon" href="../Public/img/logo.png">
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
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../Public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../Public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../Public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../Public/plugins/iCheck/square/blue.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="../Public/css/estilos_registro.css">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#" id="logo"> <img class="center-block " src="../Public/img/logo.png" width="250px" height="100px"> </a>
        </div>
        <div class="register-box-body">
            <h4> <p class="login-box-msg"> Registro de usuarios </p> </h4>
            <form id="frmRegistrar">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre" id="nombre">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p id="alerta_nombre" style="display:none;">*El campo <b>Nombre</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Apellido paterno" name="aPaterno" id="aPaterno">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p id="alerta_paterno" style="display:none;">*El campo <b>Apellido paterno</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Apellido materno" name="aMaterno" id="aMaterno">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p id="alerta_materno" style="display:none;">*El campo <b>Apellido materno</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" placeholder="Fecha de nacimiento" class="form-control" name="fecha" id="fecha">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                <p id="alerta_fecha" style="display:none;">*El campo <b>Fecha de nacimiento</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                <p id="alerta_telefono" style="display:none;">*El campo <b>Telefono</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <select class="form-control" name="sexo" id="sexo">
                    <option value="2"> Sexo </option>
                    <option value="0"> Masculino </option>
                    <option value="1"> Femenino </option>
                </select>
                <p id="alerta_sexo" style="display:none;">*El campo <b>Sexo</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Correo electronico" name="correo" id="correo">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p id="alerta_correo" style="display:none;">*El campo <b>Correo electronico</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback" id="tipoUsuarioDiv">
                <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                    <option value="0"> Tipo usuario </option>
                    <option value="1"> Administrador </option>
                    <option value="2"> Gamer </option>
                </select>
                <p id="alerta_tipoUsuario" style="display:none;">*El campo <b>Tipo usuario</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Gamer Tag" name="tag" id="tag">
                <span class="glyphicon glyphicon-fire form-control-feedback"></span>
                <p id="alerta_tag" style="display:none;">*El campo <b>Gamer tag</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback" id="contraDiv">
                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" id="contrasena">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p id="alerta_contra" style="display:none;">*El campo <b>Contraseña</b> es obligatorio.</p>
                <!--<p id="alerta_contraig2" style="display:none;">*Los campos <b>Contraseña</b> no coinciden.</p>-->
              </div>
              <div class="form-group has-feedback" id="repetirDiv">
                <input type="password" class="form-control" placeholder="Repite contraseña" name="repContrasena" id="repContrasena">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <p id="alerta_contra2" style="display:none;">*El campo <b>Repite contraseña</b> es obligatorio.</p>
                <p id="alerta_contra2ig2" style="display:none;">*Los campos <b>Contraseña</b> no coinciden.</p>
              </div>
              <div class="form-group has-feedback" id="usuarioRefDiv">
                <select name="usuarioRef" id="usuarioRef" class="form-control">

                </select>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                  <div id="resultado"></div>
                </div>
              </div>
            </form>
            <hr>
            <a id="regresarbtn" href="usuarios.php" class="text-center btn btn-success btn-block" style="display:none;"> <p> Regresar </p> </a>
            <a id="iniciarbtn" href="login.php" class="text-center"> <p id="link_iniciarsesion"> Iniciar Sesión </p> </a>
        </div>
    </div>
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
    <script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Date picker
        $('#fecha').datepicker({
          autoclose: true, format: 'yyyy-mm-dd'
        })
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#frmRegistrar").submit(function(event){
          event.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            url: "signup_.php",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend : function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<center><img border='0' src='../Public/img/loading.gif'></center>");});
              $("#resultado").fadeIn(100);
            },
            success: function (returndata) {
              $("#resultado").fadeOut(300, function (){$("#resultado").html(returndata);});
              $("#resultado").fadeIn(300);
            },
            error: function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
              $("#resultado").fadeIn(100);
            }
          });
          return false;
        });

        if($('#usuarioRefDiv').is(':visible')){
          $.ajax({
            url: 'getUsuariosRef_.php',
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
              if(returndata[0].error==0){
                $("#usuarioRef").empty();
                $("#usuarioRef").append('<option value="0"> Usuario de referencia </option>');
                for (var i=0; i<returndata[1].length; i++) {
                  $("#usuarioRef").append('<option value="'+returndata[1][i].idUsuario+'">'+returndata[1][i].nombre+' '+returndata[1][i].aPaterno+' ('+returndata[1][i].usuario+')'+'</option>');
                }
              }else{
                  var rError=returndata[1];
                  $("#resultadoJson").html(rError);
              }
            },
            error: function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
              $("#resultado").fadeIn(100);
            }
          });
        }
        var id = $('#id').val();
        if(id > 0){
          $('#contraDiv').hide();
          $('#repetirDiv').hide();
          $.ajax({
            url: 'getUsuario_.php',
            type: 'POST',
            data:{'id': <?php echo $id; ?>},
            dataType:'json',
            async: false,
            cache: false,
            beforeSend : function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<center><img border='0' src='../Public/img/loading.gif'></center>");});
              $("#resultado").fadeIn(100);
            },
            success: function (returndata) {
              $("#resultado").fadeOut(300, function (){$("#resultado").html(returndata);});
              $("#resultadoJson").html("");
              if(returndata[0].error==0){
                $("#nombre").val(returndata[1][0].nombre);
                $("#aPaterno").val(returndata[1][0].aPaterno);
                $("#aMaterno").val(returndata[1][0].aMaterno);
                $("#fecha").val(returndata[1][0].fechaNacimiento);
                $("#telefono").val(returndata[1][0].telefono);
                $("#sexo").val(returndata[1][0].genero);
                $("#correo").val(returndata[1][0].correo);
                $("#tipoUsuario").val(returndata[1][0].idRol);
                $("#tag").val(returndata[1][0].usuario);
                /*$("#contrasena").val(returndata[1][0].usuario);
                $("#repContrasena").val(returndata[1][0].usuario);*/
                $("#usuarioRef").val(returndata[1][0].idUsuarioReferencia);
              }else{
                var rError=returndata[1];
                $("#resultadoJson").html(rError);
              }
            },
            error: function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
              $("#resultado").fadeIn(100);
            }
          });
        }
      });
    </script>
    <?php
      if(!$session){
        echo "<script>
                document.getElementById('tipoUsuarioDiv').style.display = 'none';
                document.getElementById('usuarioRefDiv').style.display = 'none';
                document.getElementById('logo').href = '../index.php';
              </script>";
      }else {
        echo "<script>
                document.getElementById('regresarbtn').style.display = 'block';
                document.getElementById('iniciarbtn').style.display = 'none';
                document.getElementById('logo').href = 'usuarios.php';
              </script>";
        if( $_SESSION['tipoUsuario'] == '1' ){
            echo "<script>
                    document.getElementById('tipoUsuarioDiv').style.display = 'block';
                    document.getElementById('usuarioRefDiv').style.display = 'block';
                  </script>";
        }else {
          echo "<script>
                  document.getElementById('tipoUsuarioDiv').style.display = 'none';
                  document.getElementById('usuarioRefDiv').style.display = 'none';
                </script>";
        }
      } ?>
  </body>
</html>
