<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="description" content="">
  <meta name="author" content="">

  <title> Rincon del gamer - Consolas </title>
  <link rel="shortcut icon" type="image/x-icon" href="Public/img/gamepad.png">


  <link href="Public/css/bootstrap.min.css" rel="stylesheet">


  <link href="Public/css/estilos.css" rel="stylesheet">
 
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
            <a class="nav-link" href="index.php">Inicio
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
<br>
<br>
  <!-- Page Content -->
  <div class="container" id="container1">
<style>
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: gray;
}

.container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  padding-left: 30%;
  padding-right: 30%;
  margin-block-start: auto;
}
</style>
    
  <form action="/action_page.php">
    <label for="fname">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre(s)">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellidos">

    <label for="correo">Correo eléctronico</label>
    <input type="text" id="correo" name="country" placeholder="Correo eléctronico">
      
    </select>

    <label for="mensaje">Mensaje</label>
    <textarea id="mensaje" name="mensaje" style="height:200px"></textarea>

    <input type="submit" value="Enviar">
  </form>

  </div>
  <!-- /.container -->
<br><br>
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
