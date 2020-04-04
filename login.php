<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Sesión</title>

    <link rel="shortcut icon" href="Public/img/logo.jpg">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="Public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="Public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Public/plugins/iCheck/square/blue.css">
    
    

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Public/css/estilos_login.css">

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
    
</head>
<body class="hold-transition login-page" >

    <?php
        if(isset($_GET['p']) ){
            if($_GET['p'] == 'contraincorrecta'){
                echo " <!-- Sweet alert -->
                
                <script> Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Verifique los datos y vuelva a intentarlo'
                  }) </script> ";

            }
        }

        if(isset($_GET['e']) ){
            if($_GET['e'] == 'recienRegistrado'){
                echo " <!-- Sweet alert -->
                
                <script> Swal.fire({
                    icon: 'success',
                    title: 'Registro completado',
                    text: 'Usuario registrado con exito'
                  }) </script> ";

            }
        }
    ?>

<div class="login-box" >

    <div class="register-logo">
        <a href="index.php"> <img class="center-block " src="Public/img/logo.png" width="250px" height="100px"> </a>
    </div>
  
    <div class="login-box-body">
        <h4> <p class="login-box-msg">  Iniciar Sesión </p> </h4>
        <form  method="post">

            <div class="form-group has-feedback">
                <input name="correo" type="email" class="form-control" placeholder="Correo">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            
            <div class="form-group has-feedback">
                <input name= "contrasena" type="password" class="form-control" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <select name="tipoUsuario" class="form-control">
                    <option> Administrador </option>
                    <option> Socio </option>
                </select>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
            </div>
        </form>

        <hr>
        <a href="inicio.php?p=registrarse" class="text-center"> <p id="link_iniciarsesion"> Registrarse </p> </a> 


    </div>
    <!-- /.login-box-body -->

</div>
    <!-- jQuery 3 -->
    <script src="Public/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="Public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- iCheck -->
    <script src="Public/plugins/iCheck/icheck.min.js"></script>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

</body>
</html>

<?php
    $controlador= new Controlador();
    $controlador->iniciarSesion();
?>