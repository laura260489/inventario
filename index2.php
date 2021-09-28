<?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['id'])){
        $cliente = $_SESSION['id'];
    }else{
 header('Location: index.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Inventario CORHUILA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="inicio_sesion/vendor/bootstrap/js/popper.js"></script>
  <link href="css/navbar.css" type="text/css"  rel="stylesheet">
  <link href="css/pagina_principal.css" type="text/css"  rel="stylesheet">
  
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand titulo" href="#">CORHUILA</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="selectSection"><a href="index2.php">Registrar equipo</a></li>
          <li class="selectSection"><a href="inventario.php">Inventario</a></li>
          <li class="selectSection"><a href="reporte.php">Reporte de equipos</a></li>
          <li class="selectSection"><a href="grafica.php">Dashboard</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right login">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row" style="margin: 1.5%; border-radius: 18px; margin-top: -1%">

    <div class="page-header text-left">
      <h1>Inventario de equipos tecnológicos de CORHUILA</h1>
    </div>
    <div class="alert alert-info " role="alert" style="font-size:16px;">Diligencie los campos a continuación</div>
    
    <form action="php/enviar.php" method='POST' id="imagen" name="imagen" enctype="multipart/form-data">
      <div class=row>
        <div class="col-md-4">
          <p>Guardar imagen para registro</p>
        </div>
        <div class="col-md-4">
          <input type="file" name="imagen" id="imagen" class="custom-file-input" required>
        </div>
        <div class="col-md-4">
          <br><button type="submit" class="btn btn-success btn-block border botonImagen" style="margin-top: -6.3%" >Subir Archivo</button>
        </div>
      </div>
    </form>

    <form id="form" name="form">
      <div class="row">
        <div class="col-md-4">
          <p>Lista de equipos
            <select id="lista_reproduccion" name="lista_reproduccion" class="form-control border" required>
            </select>
          </p>
        </div>
      
        <div class="col-md-4">
          <p>Información
            <div class="alert alert-info border" id="videos" name="video" style="margin-top: -3%"></div>
          </p>
        </div>
        <div class="col-md-4">
          <p><br><button id="enviar" type="button" class="btn btn-success btn-block border botonItem" style="margin-top: -1%" onclick="validar()">Guardar Item</button></p>
        </div>
      </div>
      <div class="row" style="margin-top: -2%">
        <div class="col-md-4">
              <p>Lista de sedes
              <select id="lista_sede" name="lista_sede" class="form-control border" required>
              </select>
            </p>
          </div>

        <div class="col-md-4">
            <p>Lista de dependencias
            <select id="lista_dependencia" name="lista_dependencia" class="form-control border">
            </select>
          </p>
        </div>

        <div class="col-md-4">
          <p>Colaboradores
            <select id="colaborador" name="colaboradores" class="form-control border">
            </select>
          </p>
        </div>

      </div>

      <div class="text-center">

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
            <p class='boton'><button id="guardar_registro" type="submit" class="btn btn-success btn-block border botonRegistro">Guardar registro</button></p>
        </div>

      </div>
    </form>

    
  </div>
  </div>


  <br>
  
  
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/validacion.js"></script>

</body>
</html>