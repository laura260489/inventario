<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- datatables -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/b-2.0.1/b-html5-2.0.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/b-2.0.1/b-html5-2.0.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"></script>

    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script link="https://unpkg.com/@popperjs/core@2"></script>

    <link href="css/navbar.css" type="text/css"  rel="stylesheet">
    <link href="css/inventario.css" type="text/css"  rel="stylesheet">

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
          <li class="selectSection"><a href="crear.php">Registrar colaborador</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Traspaso<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="busqueda.php">PORTATIL</a></li>
                <li><a href="busqueda_computador_mesa.php">COMPUTADOR DE MESA</a></li>
                <li><a href="busqueda_impresora.php">IMPRESORA</a></li>
                <li><a href="#">ESCANER</a></li>
            
              </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right login">
          <li><a href="php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
        </ul>
      </div>
    </div>
  </nav>

 

<div class="row"  style="margin: 1%;">
  <div class="col-md-12">
    <div class="table-responsive">
      <table id="tableReporte" class="table table-striped">
        <thead>
          <tr>
            <th>Dependencia</th>
            <th>Equipo</th>
            <th>Total</th>

          </tr>
        </thead>
        <tbody>
        
          <?php

            include "php/conexion.php";

            $mysqli = getConn();

            $consulta="SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE portatil_inventario.portatil_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE impresora_inventario.impresora_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE computador_mesa_inventario.computador_mesa_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM escaner INNER JOIN escaner_inventario ON escaner_inventario.escaner_inventario_escaner_id=escaner.escaner_id INNER JOIN inventario ON escaner_inventario.escaner_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE escaner_inventario.escaner_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM servidor INNER JOIN servidor_inventario ON servidor_inventario.servidor_inventario_servidor_id=servidor.servidor_id INNER JOIN inventario ON servidor_inventario.servidor_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE servidor_inventario.servidor_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM monitor INNER JOIN monitor_inventario ON monitor_inventario.monitor_inventario_monitor_id=monitor.monitor_id INNER JOIN inventario ON monitor_inventario.monitor_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE monitor_inventario.monitor_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM cpu INNER JOIN cpu_inventario ON cpu_inventario.cpu_inventario_cpu_id=cpu.cpu_id INNER JOIN inventario ON cpu_inventario.cpu_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE cpu_inventario.cpu_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM estabilizador INNER JOIN estabilizador_inventario ON estabilizador_inventario.estabilizador_inventario_estabilizador_id=estabilizador.estabilizador_id INNER JOIN inventario ON estabilizador_inventario.estabilizador_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE estabilizador_inventario.estabilizador_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM switch INNER JOIN switch_inventario ON switch_inventario.switch_inventario_switch_id=switch.switch_id INNER JOIN inventario ON switch_inventario.switch_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE switch_inventario.switch_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre
            UNION ALL
            SELECT COUNT(inventario.inventario_id) AS total_objeto,sede_corhuila.sede_corhuila_nombre AS sede, dependencia.dependencia_nombre AS dependencia, objeto.objeto_nombre AS equipo FROM rack INNER JOIN rack_inventario ON rack_inventario.rack_inventario_rack_id=rack.rack_id INNER JOIN inventario ON rack_inventario.rack_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id INNER JOIN  objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id WHERE rack_inventario.rack_inventario_estado LIKE 'activo%' GROUP BY dependencia.dependencia_nombre,sede_corhuila.sede_corhuila_nombre,objeto.objeto_nombre;";
            $result = $mysqli->query($consulta);

            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
            echo "
            <tr>
              <td>".$row['dependencia']."</td>
              <td>".$row['equipo']."</td>
              <td>".$row['total_objeto']."</td>
            </tr>";

            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
     

<div class="row" style="margin-right: 2%">

  <div class="col-md-4">
  </div>

  </div>
</div>

<script src="js/filtrar.js"></script>

<script>
  $(document).ready(function() {
    $('#tableReporte').DataTable( {
        language: {
          url: 'http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        }
    } );
  });

</script>

</body>
</html>