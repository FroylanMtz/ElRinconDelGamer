<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Iniciar Sesión</title>
      <link rel="shortcut icon" href="../Public/img/logo.png">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="../Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../Public/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="../Public/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../Public/css/AdminLTE.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="../Public/plugins/iCheck/square/blue.css">
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../Public/css/estilos_login.css">
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
  </head>
  <body class="hold-transition login-page" >
    <div class="login-box" >
        <div class="register-logo">
            <a href="../index.php"> <img class="center-block " src="../Public/img/logo.png" width="250px" height="100px"> </a>
        </div>
        <div class="login-box-body">
            <h4> <p class="login-box-msg">  Iniciar Sesión </p> </h4>
            <form  id="frmlogin" >
                <div class="form-group has-feedback">
                    <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario" value="Admin">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <p id="alerta_usuario" style="display:none;">*El campo <b>Usuario</b> es obligatorio.</p>
                </div>
                <div class="form-group has-feedback">
                    <input name= "contrasenia" id="contrasenia" type="password" class="form-control" placeholder="Contraseña" value="Admin">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <p id="alerta_contrasenia" style="display:none;">*El campo <b>Contraseña</b> es obligatorio.</p>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        <div id="resultado"></div>
                    </div>
                </div>
            </form>
            <hr>
            <a href="signup.php" class="text-center"> <p id="link_iniciarsesion"> Registrarse </p> </a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- jQuery 3 -->
    <script src="../Public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../Public/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#frmlogin").submit(function(event){
          event.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            url: "login_.php",
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
      });
    </script>
  </body>
</html>
