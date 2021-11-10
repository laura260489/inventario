<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="inicio_sesion/vendor/bootstrap/js/popper.js"></script>
    <link href="css/navbar.css" type="text/css"  rel="stylesheet">
    <link href="css/crear.css" type="text/css"  rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Document</title>
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
        <a class="navbar-brand titulo" href="grafica.php">CORHUILA</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="selectSection"><a href="index2.php">Registrar equipo</a></li>
          <li class="selectSection"><a href="inventario.php">Inventario</a></li>
          <li class="selectSection"><a href="reporte.php">Reporte de equipos</a></li>
          <li class="selectSection"><a href="grafica.php">Dashboard</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Traspaso<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="busqueda.php">PORTATIL</a></li>
                <li><a href="busqueda_computador_mesa.php">COMPUTADOR DE MESA</a></li>
                <li><a href="busqueda_impresora.php">IMPRESORA</a></li>
                <li><a href="busqueda_escaner.php">ESCANER</a></li>
            
              </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right login">
          <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container">

        <h1>Registrar dependencia</h1>

        <form id="form" action='php/agregar-dependencia.php' method='POST'>

            <div class="mb-3">
                <label class="form-label">Nombre de la dependencia</label>
                <input type="text" class="form-control" id="dependencia" name="dependencia">
            </div>
            <div class="mb-3">

                <label class="form-label">Sede a la que pertenece</label>

                <select id="sede_se" name="sede" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">

                    <option value='0'>Seleccione una sede:</option>
                    <?php

                        require_once 'php/conexion.php';

                        $mysqli=getConn();

                        $consultar_registros="SELECT sede_corhuila_id,sede_corhuila_nombre FROM sede_corhuila ORDER BY sede_corhuila_nombre ASC";

                        $resultado_consulta=$mysqli->query($consultar_registros);

                        while($fila=$resultado_consulta->fetch_array(MYSQLI_ASSOC))

                        {

                            echo "<option value='$fila[sede_corhuila_id]'>".$fila['sede_corhuila_nombre'].'</option>';


                        }


                    ?>
                </select>
                
            </div>

            <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto; margin-top:2%">Registrar</button>

        </form>

    </div>

    <div class="container">

    <h1>Registrar colaborador</h1>

        <form id="form" action='php/agregar-colaborador.php' method='POST'>

            <div class="mb-3">
                <label class="form-label">Nombre de la dependencia</label>
                
            </div>

            <div class="mb-3">

                <select id="dependencia_dep" name="dependencia" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">

                    <option value='0'>Seleccione una dependencia</option>
                    <?php

                        require_once 'php/conexion.php';

                        $mysqli=getConn();

                        $consultar_registros="SELECT dependencia_id,dependencia_nombre FROM dependencia ORDER BY dependencia_nombre ASC";

                        $resultado_consulta=$mysqli->query($consultar_registros);

                        while($fila=$resultado_consulta->fetch_array(MYSQLI_ASSOC))

                        {

                            echo "<option value='$fila[dependencia_id]'>".$fila['dependencia_nombre'].'</option>';


                        }


                    ?>
                </select>
                
            </div>

            <div>

                <label class="form-label">Nombre del colaborador</label>
                <input type="text" class="form-control" id="colaborador" name="colaborador">

            </div>
            <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto; margin-top:2%">Registrar</button>

        </form>

    </div>
    
</body>
</html>