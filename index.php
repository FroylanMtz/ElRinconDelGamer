<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Rincon del gamer</title>
  <link rel="shortcut icon" type="image/x-icon" href="Public/img/gamepad.png">

  <!-- Bootstrap core CSS -->
  <link href="Public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="Public/css/estilos.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  
  </style>
  <style type="text/css">
  .sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
}
.sticky li{
    list-style-type:none;
    background-color:#fff;
    color:#efefef;
    height:43px;
    padding:0px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}
.sticky li:hover{
    margin-left:-115px;
}
.sticky li img{
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p{
    padding-top:5px;
    margin:0px;
    line-height:16px;
    font-size:11px;
}
.sticky li p a{
    text-decoration:none;
    color:#2C3539;
}
.sticky li p a:hover{
    text-decoration:underline;
}
</style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"> <img class="center-block " src="Public/img/logo.png" width="180px" height="60px"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="plataformas.php">Plataformas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="juegos.php">Juegos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ubicación</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Galeria.php">Galería</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="torneos.html">Torneos</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-info mr-2 " href="usuarios/signup.php">
                Registrarse <i class="fa fa-user-plus "></i>
            </a>
            <a class="btn btn-outline-danger mr-2 " href="usuarios/login.php">
                Inciar Sesion <i class="fa fa-lock "></i>
            </a>
        </form>

      </div>
    </div>
  </nav>


<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div align="center" class="carousel-inner">
    <div class="carousel-item active">
      <img  src="Public/img/logo.png" alt="" width="800" height="400">
    </div>
    <div class="carousel-item">
      <img src="Public/img/fondo.jpg" alt="" width="800" height="400">
    </div>
    <div class="carousel-item">
      <img src="Public/img/logo3.png" alt="" width="800" height="400">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>




  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Gamer Land!</h1>
      <p class="lead">Bienvenido a Gamer Land, un sitio donde vas a poder encontrar lo mas nuevo en entretenimiento y diversión.</p>
      <a href="acercade.html" class="btn btn-warning btn-lg">Conocenos!</a>
    </header>

      


<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="Public/img/facebook.png" width="32" height="34">
            <p><a href="https://www.facebook.com/" target="_blank">Dale Like<br>Facebook</a></p>
        </li>
        <li>
            <img src="Public/img/twitter.png" width="32" height="25">
            <p><a href="https://twitter.com/noprog" target="_blank">Follow Us on<br>Twitter</a></p>
        </li>
        <li>
            <img src="Public/img/gmail.png" width="30" height="28">
            <p><a href="https://www.gmail.com" target="_blank">Follow Us on<br>Google+</a></p>
        </li>
        <li>
            <img src="Public/img/youtube.png" width="32" height="28">
            <p><a href="https://www.youtube.com" target="_blank">Siguenos<br>Youtube</a></p>
        </li>
        <li>
            <img src="Public/img/instagram.jpg" width="32" height="32">
            <p><a href="http://www.instagram.com" target="_blank">Subscribe on<br>YouYube</a></p>
        </li>
       
    </ul>
</div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Rincon Del Gamer 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="Public/js/jquery.min.js"></script>
  <script src="Public/js/bootstrap.bundle.min.js"></script>

</body>

</html>
