<?php

require_once 'php/conexion.php';

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

  <script src="https://cdn.plot.ly/plotly-2.4.2.min.js"></script>
  
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

<div class="container">
  <div class="row">
    <h1>Portatil</h1>
    <div class="col" id="tester_uno" style="width:600px;height:250px;"></div>
    <h1>Impresora</h1>
    <div class="col" id="tester_dos" style="width:600px;height:250px;"></div>
    <div class="w-100"></div>
    <h1>Computador de mesa</h1>
    <div class="col" id="tester_tres" style="width:600px;height:250px;"></div>
    <h1>Lista de portatiles por dependencia</h1>
    <div class="col" id="tester_cuatro" style="width:600px;height:250px;"></div>
  </div>
</div>



<?php

require_once 'php/conexion.php';

$mysqli = getConn();


$sql_uno="SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total,sede_corhuila.sede_corhuila_nombre AS sede FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id GROUP BY sede_corhuila.sede_corhuila_nombre;";


$result_uno=mysqli_query($mysqli,$sql_uno);


$valoresY_uno=array();//cantidad
$valoresX_uno=array();//sedes


while($row_uno=mysqli_fetch_row($result_uno)){

    $valoresY_uno[]=$row_uno[0];
    $valoresX_uno[]=$row_uno[1];

}

$datoX_uno=json_encode($valoresX_uno);
$datoY_uno=json_encode($valoresY_uno);

$sql_dos="SELECT COUNT(impresora_inventario.impresora_inventario_id) AS impresora_total,sede_corhuila.sede_corhuila_nombre AS sede FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id GROUP BY sede_corhuila.sede_corhuila_nombre;";


$result_dos=mysqli_query($mysqli,$sql_dos);


$valoresY_dos=array();//cantidad
$valoresX_dos=array();//sedes


while($row_dos=mysqli_fetch_row($result_dos)){

    $valoresY_dos[]=$row_dos[0];
    $valoresX_dos[]=$row_dos[1];

}

$datoX_dos=json_encode($valoresX_dos);
$datoY_dos=json_encode($valoresY_dos);


$sql_tres="SELECT COUNT(computador_mesa_inventario.computador_mesa_inventario_id) AS computador_mesa_total,sede_corhuila.sede_corhuila_nombre AS sede FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id GROUP BY sede_corhuila.sede_corhuila_nombre;";


$result_tres=mysqli_query($mysqli,$sql_tres);


$valoresY_tres=array();//cantidad
$valoresX_tres=array();//sedes


while($row_tres=mysqli_fetch_row($result_tres)){

    $valoresY_tres[]=$row_tres[0];
    $valoresX_tres[]=$row_tres[1];

}

$datoX_tres=json_encode($valoresX_tres);
$datoY_tres=json_encode($valoresY_tres);

$sql_cuatro="SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre NOT LIKE 'Estudiantes%' UNION SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre LIKE 'Estudiantes%';";


$result_cuatro=mysqli_query($mysqli,$sql_cuatro);


$valoresY_cuatro=array();//cantidad


while($row_cuatro=mysqli_fetch_row($result_cuatro)){

    $valoresY_cuatro[]=$row_cuatro[0];

}



$datoY_cuatro=json_encode($valoresY_cuatro);

?>

<script type="text/javascript">

    function crearCadenaGrafico(json){
        var parsed=JSON.parse(json);
        var arr=[];

        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }


</script>

<script>

    datosX_uno=crearCadenaGrafico('<?php echo $datoX_uno ?>');
    datosY_uno=crearCadenaGrafico('<?php echo $datoY_uno ?>');
    
    var tester_uno = document.getElementById('tester_uno');
	Plotly.newPlot( tester_uno, [{
	x: datosX_uno,
	y: datosY_uno,
    type:'bar',
    width: [0.5,0.5]
    }],
     {
	margin: { t: 0 } } );



    datosX_dos=crearCadenaGrafico('<?php echo $datoX_dos ?>');
    datosY_dos=crearCadenaGrafico('<?php echo $datoY_dos ?>');
    
    var tester_dos = document.getElementById('tester_dos');
	Plotly.newPlot( tester_dos, [{
	x: datosX_dos,
	y: datosY_dos,
    type:'bar',
    width: [0.5,0.5]
    }],
     {
	margin: { t: 0 } } );

    datosX_tres=crearCadenaGrafico('<?php echo $datoX_tres ?>');
    datosY_tres=crearCadenaGrafico('<?php echo $datoY_tres ?>');
    
    var tester_tres = document.getElementById('tester_tres');
	Plotly.newPlot( tester_tres, [{
	x: datosX_tres,
	y: datosY_tres,
    type:'bar',
    width: [0.5]
    }],
     {
	margin: { t: 0 } } );

    datosY_cuatro=crearCadenaGrafico('<?php echo $datoY_cuatro ?>');
    
    var tester_cuatro = document.getElementById('tester_cuatro');
	Plotly.newPlot( tester_cuatro, [{
    x: ['colaborador', 'estudiante'],
	y: datosY_cuatro,
    type:'bar',
    width: [0.5,0.5],
    }],
     {
	margin: { t: 0 } } );

</script>
</body>

</html>