<?php
session_start();
if(!isset($_SESSION['iniciada'])){
    header("Location: ../salir.php");
    $id=0;
}
$id=0;
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
            <a href="torneos.php" id="logo"> <img class="center-block " src="../Public/img/logo.png" width="250px" height="100px"> </a>
        </div>
        <div class="register-box-body">
            <h4> <p class="login-box-msg"> Registro de torneos </p> </h4>
            <form id="frmRegistrar">
              <div class="form-group has-feedback">
                <input type="text" placeholder="Título" class="form-control" name="titulo" id="titulo">
                <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                <p id="alerta_titulo" style="display:none;">*El campo <b>Título</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <select class="form-control" name="consola" id="consola" onchange="juegos()">
                    <option value="0"> Consola </option>
                </select>
                <p id="alerta_consola" style="display:none;">*El campo <b>Consola</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <select class="form-control" name="juego" id="juego">
                    <option value="0"> Juego </option>
                </select>
                <input style="display:none;" type="text" placeholder="Fecha" class="form-control" name="juego2" id="juego2">
                <p id="alerta_juego" style="display:none;">*El campo <b>Juego</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="text" placeholder="Fecha" class="form-control" name="fecha" id="fecha">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                <p id="alerta_fecha" style="display:none;">*El campo <b>Fecha</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="time" class="form-control" placeholder="Hora" name="hora" id="hora">
                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                <p id="alerta_hora" style="display:none;">*El campo <b>Hora</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <select name="modalidad" id="modalidad" class="form-control" onchange="personasEquipo()">
                    <option value="0"> Modalidad </option>
                    <option value="1"> Individual </option>
                    <option value="2"> Parejas </option>
                    <option value="3"> Tercias </option>
                    <option value="4"> Otro </option>
                </select>
                <p id="alerta_modalidad" style="display:none;">*El campo <b>Modalidad</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="number" placeholder="Total de integrantes por equipo" class="form-control" name="persEquipo" id="persEquipo" step="1" min="1" disabled>
                <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                <p id="alerta_persEquipo" style="display:none;">*El campo <b>Total de integrantes por equipo</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <select class="form-control" name="forma" id="forma">
                    <option value="0"> Forma </option>
                    <option value="1"> Presencial </option>
                    <option value="2"> Línea </option>
                    <option value="3"> Ambas </option>
                </select>
                <p id="alerta_forma" style="display:none;">*El campo <b>Forma</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="number" placeholder="Total de equipos" class="form-control" name="totEqui" id="totEqui" step="1" min="1">
                <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                <p id="alerta_totEqui" style="display:none;">*El campo <b>Total de equipos</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="4" cols="50" style="resize: none;"></textarea>
                <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                <p id="alerta_descripcion" style="display:none;">*El campo <b>Descripción</b> es obligatorio.</p>
              </div>
              <div class="form-group has-feedback">
                <input type="number" class="form-control" placeholder="Costo" name="costo" id="costo" min="1" step="0.01">
                <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                <p id="alerta_costo" style="display:none;">*El campo <b>Costo</b> es obligatorio.</p>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                  <button id="boton" type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
                  <div id="resultado"></div>
                </div>
              </div>
            </form>
            <hr>
            <a id="regresarbtn" href="torneos.php" class="text-center btn btn-success btn-block"> <p> Regresar </p> </a>
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
      var id = $('#id').val();
      function personasEquipo(){
        var modalidad = document.getElementById('modalidad').value;
        switch (modalidad) {
          case '1': $("#persEquipo").prop('disabled', true);
                  $("#persEquipo").prop('min', 1);
                  $('#persEquipo').val(1);
                  break;
          case '2': $("#persEquipo").prop('disabled', true);
                  $("#persEquipo").prop('min', 2);
                  $('#persEquipo').val(2);
                  break;
          case '3': $("#persEquipo").prop('disabled', true);
                  $("#persEquipo").prop('min', 3);
                  $('#persEquipo').val(3);
                  break;
          case '4': $("#persEquipo").prop('disabled', false);
                  $("#persEquipo").prop('min', 4);
                  $('#persEquipo').val(4);
                  break;
        }
      }
      function juegos(){
        var id = document.getElementById("consola").value;
        $.ajax({
          url: '../rentas/getJuegosCon_.php',
          type: 'POST',
          data:{'id': id},
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
              $("#juego").empty();
              $("#juego").append('<option value="0"> Juego </option>');
              for (var i=0; i<returndata[1].length; i++) {
                $("#juego").append('<option value="'+returndata[1][i].idJuego+'">'+returndata[1][i].nombre+' ('+returndata[1][i].nombreCon+')'+'</option>');
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
      $(document).ready(function(){
        $("#frmRegistrar").submit(function(event){
          event.preventDefault();
          $("#persEquipo").prop('disabled', false);
          var formData = new FormData($(this)[0]);
          $.ajax({
            url: "addTorneo_.php",
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
              $("#persEquipo").prop('disabled', true);
              $("#resultado").fadeIn(300);
            },
            error: function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
              $("#resultado").fadeIn(100);
            }
          });
          return false;
        });
        $.ajax({
          url: '../consolas/getConsolas_.php',
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
              $("#consola").empty();
              $("#consola").append('<option value="0"> Consola </option>');
              for (var i=0; i<returndata[1].length; i++) {
                $("#consola").append('<option value="'+returndata[1][i].idConsola+'">'+returndata[1][i].nombre+' ('+returndata[1][i].nombrePla+')'+'</option>');
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
      });
    </script>
  </body>
</html>
