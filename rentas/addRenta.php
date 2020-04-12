<?php
session_start();
if(!isset($_SESSION['iniciada'])){
    header("Location: ../salir.php");
    $id=0;
}else{
  $id=0;
  if(isset($_GET['rrr'])){
    $id = filter_var($_GET['rrr'],FILTER_SANITIZE_NUMBER_INT);
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
            <a href="rentas.php" id="logo"> <img class="center-block " src="../Public/img/logo.png" width="250px" height="100px"> </a>
        </div>
        <div class="register-box-body">
            <h4> <p class="login-box-msg"> Registro de rentas </p> </h4>
            <form id="frmRegistrar">
              <div class="" id="nueva">
                <div class="form-group has-feedback">
                  <select class="form-control" name="usuario" id="usuario">
                      <option value="0"> Usuario </option>
                  </select>
                  <input style="display:none;" type="text" placeholder="Fecha" class="form-control" name="usuario2" id="usuario2">
                  <p id="alerta_usuario" style="display:none;">*El campo <b>Usuario</b> es obligatorio.</p>
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
                  <label for="promocion"> Promoción</label>
                  <select name="promocion" id="promocion" class="form-control">
                      <option value="1"> Por horas de renta (Promoción 1) </option>
                      <option value="2"> Por referencia (Promoción 2) </option>
                  </select>
                </div>
              </div>
              <div class="" id="actualizar" style="display:none;">
                <div class="form-group has-feedback">
                  <label for="costo">Subtotal (hrs)</label>
                  <input type="text" placeholder="Costo" class="form-control" name="subHrs" id="subHrs">
                  <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="costo">Subtotal (Accesorios)</label>
                  <input type="text" placeholder="Costo" class="form-control" name="subAcc" id="subAcc">
                  <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="costo">Subtotal (Dulces)</label>
                  <input type="text" placeholder="Costo" class="form-control" name="sunDul" id="sunDul">
                  <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="costo">Total ($)</label>
                  <input type="text" placeholder="Costo" class="form-control" name="costo" id="costo">
                  <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="costoMon">Total en monedas</label>
                  <input type="text" placeholder="Costo" class="form-control" name="costoMon" id="costoMon">
                  <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="monGan">Monedas ganadas</label>
                  <input type="text" placeholder="Costo" class="form-control" name="monGan" id="monGan">
                  <span class="glyphicon glyphicon-gift form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="monAct">Monedas actuales</label>
                  <input type="text" placeholder="Costo" class="form-control" name="monAct" id="monAct">
                  <span class="glyphicon glyphicon-gift form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="number" class="form-control" placeholder="Pago en efectivo" name="pago" id="pago" min="1" step="0.01">
                  <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                  <p id="alerta_pago" style="display:none;">*El campo <b>Pago</b> es obligatorio.</p>
                  <br>
                  <button id="metodoPago" type="button" class="btn btn-primary" onclick="metodoDePago()">
                    <span class="">Pagar con monedas</span>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                  <input type="hidden" name="metPago" id="metPago" value="1" />
                  <button id="boton" type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
                  <div id="resultado"></div>
                </div>
              </div>
            </form>
            <hr>
            <a id="regresarbtn" href="rentas.php" class="text-center btn btn-success btn-block"> <p> Regresar </p> </a>
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
      var subHrs=0;
      var subAcc=0;
      var subDul=0;
      var costo=0;
      var costoMonedas=0;
      var monedasConsola=0;
      var monedasUsuario=0;
      var monedasDulces=0;
      var metodo;
      var id = $('#id').val();
      function metodoDePago(){
        metodo = $('#metPago').val();
        if(metodo == 1){
          document.getElementById('metodoPago').innerText="Pagar con efectivo";
          $("#pago").attr("placeholder", "Pagar con monedas");
          $('#metPago').val(2);
          $('#pago').val(null);
          $("#pago").attr('step', 1);
        }else{
          document.getElementById('metodoPago').innerText="Pagar con monedas";
          $("#pago").attr("placeholder", "Pagar con efectivo");
          $('#metPago').val(1);
          $('#pago').val(null);
          $("#pago").attr('step', 0.01);
        }
      }
      function juegos(){
        var id = document.getElementById("consola").value;
        $.ajax({
          url: 'getJuegosCon_.php',
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
                $("#juego").append('<option value="'+returndata[1][i].idJuego+'">'+returndata[1][i].nombre+' ('+returndata[1][i].nombrePla+')'+'</option>');
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
      function calcularCosto(horaCom){
        horaRen=horaCom.substring(0,2);
        minRen=horaCom.substring(3,5);
        var hoy=new Date();
        hora = hoy.getHours();
        min = hoy.getMinutes();
        if(minRen < min){
          total=subHrs*((hora-horaRen)+((min-minRen)/60));
          totalMon=costoMonedas*((hora-horaRen)+((min-minRen)/60));
          monGan=monedasConsola*((hora-horaRen)+((min-minRen)/60));
        }else{
          total=subHrs*((hora-horaRen)+(((minRen-60)+min)/60));
          totalMon=costoMonedas*((hora-horaRen)+(((minRen-60)+min)/60));
          monGan=monedasConsola*((hora-horaRen)+(((minRen-60)+min)/60));
        }
        var tot=Number(parseFloat(Math.round(total * 100) / 100).toFixed(2))+Number(subAcc)+Number(subDul);
        $("#subHrs").val(parseFloat(Math.round(total * 100) / 100).toFixed(2));
        $("#subAcc").val(subAcc);
        $("#sunDul").val(subDul);
        $("#costo").val(tot.toFixed(2));
        $("#costoMon").val(Math.ceil(totalMon));
        $("#monGan").val(Math.ceil(Number(monGan) + Number(monedasDulces)));
      }
      $(document).ready(function(){
        $("#frmRegistrar").submit(function(event){
          event.preventDefault();
          if(id > 0){
            $("#costo").prop('disabled', false);
            $("#costoMon").prop('disabled', false);
            $("#monGan").prop('disabled', false);
            $("#monAct").prop('disabled', false);
            var formData = new FormData($(this)[0]);
            $.ajax({
              url: "pagar_renta_.php",
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
                $("#costo").prop('disabled', true);
                $("#costoMon").prop('disabled', true);
                $("#monGan").prop('disabled', true);
                $("#monAct").prop('disabled', true);
              },
              error: function (){
                $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrido un error, inténtelo nuevamente</span>");});
                $("#resultado").fadeIn(100);
              }
            });
            return false;
          }else{
            var formData = new FormData($(this)[0]);
            $.ajax({
              url: "addRenta_.php",
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
          }

        });
        $.ajax({
          url: 'getUsuariosRen_.php',
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
              $("#usuario").empty();
              $("#usuario").append('<option value="0"> Usuario </option>');
              for (var i=0; i<returndata[1].length; i++) {
                $("#usuario").append('<option value="'+returndata[1][i].idUsuario+'">'+returndata[1][i].nombre+' '+returndata[1][i].aPaterno+' ('+returndata[1][i].usuario+')'+'</option>');
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
        if(id > 0){
          document.getElementById('boton').innerText="Pagar";
          $("#actualizar").show();
          $("#usuario2").show();
          $("#juego2").show();
          $("#usuario").hide();
          $("#juego").hide();
          $("#subHrs").prop('disabled', true);
          $("#subAcc").prop('disabled', true);
          $("#sunDul").prop('disabled', true);
          $("#costoMon").prop('disabled', true);
          $("#monAct").prop('disabled', true);
          $("#monGan").prop('disabled', true);
          $("#usuario2").prop('disabled', true);
          $("#juego2").prop('disabled', true);
          $("#consola").prop('disabled', true);
          $("#fecha").prop('disabled', true);
          $("#hora").prop('disabled', true);
          $("#promocion").prop('disabled', true);
          $("#costo").prop('disabled', true);
          $.ajax({
            url: 'getRenta_.php',
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
              $("#resultado").fadeOut(300, function (){$("#resultado").html("");});
              $("#resultadoJson").html("");
              console.log(returndata);
              if(returndata[0].error==0){
                $("#usuario2").val(returndata[1][0].usuario);
                $("#consola").val(returndata[1][0].idConsola);
                $("#consola option[value="+ returndata[1][0].idConsola +"]").attr("selected",true);
                $("#juego2").val(returndata[1][0].nombreJu);
                $("#fecha").val(returndata[1][0].fecha);
                $("#hora").val(returndata[1][0].hora);
                $("#promocion").val(returndata[1][0].promocionActiva);
                $("#promocion option[value="+ returndata[1][0].promocionActiva +"]").attr("selected",true);
                subHrs=returndata[1][0].costo;
                if(returndata[1][0].totalAccesorios != null)
                  subAcc=returndata[1][0].totalAccesorios;
                if(returndata[1][0].totalDulces != null)
                subDul=returndata[1][0].totalDulces;
                //costo=returndata[1][0].costo;
                costoMonedas=returndata[1][0].costoMonedas;
                monedasConsola=returndata[1][0].premioMonedas;
                monedasUsuario=returndata[1][0].totalMonedas;
                monedasDulces=returndata[1][0].monedasDulces;
                $("#monAct").val(returndata[1][0].totalMonedas);
                calcularCosto(returndata[1][0].hora);
              }else{
                  var rError=returndata[1];
                  $("#resultadoJson").html(rError);
              }
            },
            error: function (){
              $("#resultado").fadeOut(200, function (){$("#resultado").html("<span class= \"error\">Ha ocurrrrrrrido un error, inténtelo nuevamente</span>");});
              $("#resultado").fadeIn(100);
            }
          });
        }
      });
    </script>
  </body>
</html>
