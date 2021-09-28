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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
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
          </ul>
          <ul class="nav navbar-nav navbar-right login">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
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

                  $consulta="SELECT inventario.inventario_id AS ID,dependencia.dependencia_nombre AS Dependencia,colaborador.colaborador_nombre AS Colaborador,objeto.objeto_nombre AS Equipo,sede_corhuila.sede_corhuila_nombre AS Sede, inventario.fecha AS Fecha,inventario.inventario_estado AS Estado FROM registro_objeto INNER JOIN inventario ON registro_objeto.registro_objeto_inventario=inventario.inventario_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN colaborador ON colaborador.colaborador_dependencia=dependencia.dependencia_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id;";
                  $result = $mysqli->query($consulta);

                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                  {
                      echo "<tr>
                          <td id='".$row["ID"]."' onClick='funcion(this.innerText)'><a href='#'>".$row['ID']."</a></td>
                          <td>".$row['Dependencia']."</td>
                          <td>".$row['Colaborador']."</td>
                          <td>".$row['Equipo']."</td>
                          <td>".$row['Sede']."</td>
                          <td>".$row['Fecha']."</td>
                          <td>".$row['Estado']."</td>
                      </tr>";

                  }
                  ?>
              </tbody>
          </table>
        </div>    
      </div>
    </div>


    <div class="container">

      <div class="col-md-4">
      </div>

      <div class="col-md-4">


        <?php

          $consulta="SELECT COUNT(objeto.objeto_id) AS total_objeto FROM registro_objeto INNER JOIN inventario ON registro_objeto.registro_objeto_inventario=inventario.inventario_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN colaborador ON colaborador.colaborador_dependencia=dependencia.dependencia_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id WHERE sede_corhuila.sede_corhuila_nombre='Quirinal' GROUP BY sede_corhuila.sede_corhuila_nombre;";
          $result = $mysqli->query($consulta);

          while($row = $result->fetch_array(MYSQLI_ASSOC))
          {
            $html= "Total Quirinal: <input type='text' class='form-control' name='total_quirinal' value='".$row["total_objeto"]."' readonly>";

            echo $html;

          }

        ?>
      </div>  

      <div class="col-md-4">
        <?php

          $consulta_dos="SELECT COUNT(objeto.objeto_id) AS total_objeto FROM registro_objeto INNER JOIN inventario ON registro_objeto.registro_objeto_inventario=inventario.inventario_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN colaborador ON colaborador.colaborador_dependencia=dependencia.dependencia_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id WHERE sede_corhuila.sede_corhuila_nombre='Prado Alto' GROUP BY dependencia.dependencia_nombre";
          $result_dos = $mysqli->query($consulta_dos);

          while($row_dos = $result_dos->fetch_array(MYSQLI_ASSOC))
          {
            $html_dos= "Total Prado Alto: <input type='text' class='form-control' name='total_prado_alto' value='".$row_dos["total_objeto"]."' readonly>";

            echo $html_dos;

          }

        ?>

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
