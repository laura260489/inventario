<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    
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
        <a class="navbar-brand titulo" href="#">CORHUILA</a>
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
            <th>Placa</th>
            <th>Equipo</th>
            <th>Velocidad</th>
            <th>Modelo</th>
            <th>RAM</th>
            <th>Procesador</th>
            <th>Dependencia</th>
            <th>Colaborador</th>
            <th>Estado</th>
            <th>Fecha</th>

          </tr>
        </thead>
        <tbody>
        
          <?php

            include "php/conexion.php";

            $mysqli = getConn();

            $consulta="SELECT objeto.objeto_nombre AS equipo,portatil.portatil_placa AS placa, portatil.portatil_velocidad AS velocidad, portatil.portatil_modelo AS modelo, portatil.portatil_ram AS ram, portatil.portatil_procesador AS procesador,dependencia.dependencia_nombre AS dependencia, colaborador.colaborador_nombre AS colaborador,portatil_inventario.portatil_inventario_estado AS estado, portatil_inventario_fecha AS fecha FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN colaborador ON inventario.inventario_colaborador_id=colaborador.colaborador_id INNER JOIN dependencia ON inventario.inventario_dependencia=dependencia.dependencia_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id";
            $result = $mysqli->query($consulta);

            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
            echo "
            <tr>
              <td id='".$row["placa"]."' onClick='funcion(this.innerText)'><a href='#'>".$row['placa']."</a></td>
              <td>".$row['equipo']."</td>
              <td>".$row['velocidad']."</td>
              <td>".$row['modelo']."</td>
              <td>".$row['ram']."</td>
              <td>".$row['procesador']."</td>
              <td>".$row['dependencia']."</td>
              <td>".$row['colaborador']."</td>
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
     

<div class="row" style="margin-right: 2%">

  <div class="col-md-4">
  </div>

  <div class="col-md-4">


      <?php

        $consulta="SELECT COUNT(objeto.objeto_id) AS total_objeto FROM registro_objeto INNER JOIN inventario ON registro_objeto.registro_objeto_inventario=inventario.inventario_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id WHERE sede_corhuila.sede_corhuila_nombre='Quirinal' GROUP BY sede_corhuila.sede_corhuila_nombre;";
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

        $consulta_dos="SELECT COUNT(objeto.objeto_id) AS total_objeto FROM registro_objeto INNER JOIN inventario ON registro_objeto.registro_objeto_inventario=inventario.inventario_id INNER JOIN objeto ON inventario.inventario_objeto_id=objeto.objeto_id INNER JOIN sede_corhuila ON inventario.inventario_sede_id=sede_corhuila.sede_corhuila_id WHERE sede_corhuila.sede_corhuila_nombre='Prado Alto' GROUP BY sede_corhuila.sede_corhuila_nombre;";
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
<script src="js/busqueda.js"></script>


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