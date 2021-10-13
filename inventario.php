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
      


      <!-- bootstra CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- bootstra JavaScript -->
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
          <a class="navbar-brand titulo" href="#">CORHUILA</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="selectSection"><a href="index2.php">Registrar equipo</a></li>
            <li class="selectSection"><a href="inventario.php">Inventario</a></li>
            <li class="selectSection"><a href="reporte.php">Reporte de equipos</a></li>
            <li class="selectSection"><a href="grafica.php">Dashboard</a></li>
            <li class="selectSection"><a href="busqueda.php">Busqueda</a></li>
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


    <div class="row" style="margin: 1%;">
      <div class="col-md-12">
        <div class="table-responsive">
          <table id="tabla" class="table table-striped">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Dependencia</th>
                    <th>Colaborador</th>
                    <th>Objeto</th>
                    <th>Sede</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                  </tr>
              </thead>
              <tbody>
                  <?php

                  include "php/conexion.php";

                  $mysqli = getConn();

                  $consulta="SELECT inventario.inventario_id AS ID, objeto.objeto_nombre AS Equipo,portatil.portatil_placa AS placa,dependencia.dependencia_nombre AS Dependencia, colaborador.colaborador_nombre AS Colaborador,portatil_inventario.portatil_inventario_estado AS estado, portatil_inventario_fecha AS fecha, sede_corhuila.sede_corhuila_nombre AS Sede FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN colaborador ON inventario.inventario_colaborador_id=colaborador.colaborador_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id UNION ALL
                  SELECT inventario.inventario_id AS ID, objeto.objeto_nombre AS Equipo,impresora.impresora_placa AS placa,dependencia.dependencia_nombre AS Dependencia, colaborador.colaborador_nombre AS Colaborador,impresora_inventario.impresora_inventario_estado AS estado, impresora_inventario_fecha AS fecha, sede_corhuila.sede_corhuila_nombre AS Sede FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN colaborador ON inventario.inventario_colaborador_id=colaborador.colaborador_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id
                  UNION ALL
                  SELECT inventario.inventario_id AS ID, objeto.objeto_nombre AS Equipo,computador_mesa.computador_mesa_placa AS placa,dependencia.dependencia_nombre AS Dependencia, colaborador.colaborador_nombre AS Colaborador,computador_mesa_inventario.computador_mesa_inventario_estado AS estado, computador_mesa_inventario.computador_mesa_inventrario_fecha AS fecha, sede_corhuila.sede_corhuila_nombre AS Sede FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN colaborador ON inventario.inventario_colaborador_id=colaborador.colaborador_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id;";
                  $result = $mysqli->query($consulta);

                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                  {
                      echo "<tr>
                          <td id='".$row["ID"]."' onClick='funcion(this.innerText)'><a href='#'>".$row['ID']."</a></td>
                          <td>".$row['Dependencia']."</td>
                          <td>".$row['Colaborador']."</td>
                          <td>".$row['Equipo']."</td>
                          <td>".$row['Sede']."</td>
                          <td>".$row['estado']."</td>
                          <td>".$row['fecha']."</td>
                      </tr>";

                  }
                  ?>
              </tbody>
          </table>
        </div>    
      </div>
    </div>



    <script src="js/filtrar.js"></script>
    <script src="js/informacion.js"></script>

    <script>
      $(document).ready(function() {
        $('#tabla').DataTable( {
          language: {
            url: 'http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
          },
          dom: 'Bfrtip',
          buttons: [
            'excelHtml5',
            'pdfHtml5'
          ]
        } );
      });

    </script>


  </body>
</html>
