<?php

require_once 'php/conexion.php';

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
  <link href="css/grafica.css" type="text/css"  rel="stylesheet">

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


<div class="container">
  <div class="col-lg-12">
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Portatil</h3>
      </div>
      <div class="graficaSpace" id="tester_uno"></div>
    </div>
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Impresora</h3>
      </div>
      <div class="graficaSpace" id="tester_dos"></div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Computador de mesa</h3>
      </div>
      <div class="graficaSpace" id="tester_tres"></div>
    </div>
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Portatiles por dependencia</h3>
      </div>
      <div class="graficaSpace" id="tester_cuatro"></div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Impresoras por dependencia</h3>
      </div>
      <div class="graficaSpace" id="tester_cinco"></div>
    </div>
    <div class="col-lg-6">
      <div class="list-group-item">
        <h3 class="tamanio">Computadores de mesa por dependencia</h3>
      </div>
      <div class="graficaSpace" id="tester_seis"></div>
    </div>
  </div>
</div>



<?php

require_once 'php/conexion.php';

$mysqli = getConn();


$sql_uno="SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total,sede_corhuila.sede_corhuila_nombre AS sede FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id WHERE portatil_inventario.portatil_inventario_estado LIKE 'activo%' GROUP BY sede_corhuila.sede_corhuila_nombre";


$result_uno=mysqli_query($mysqli,$sql_uno);


$valoresY_uno=array();//cantidad
$valoresX_uno=array();//sedes


while($row_uno=mysqli_fetch_row($result_uno)){

    $valoresY_uno[]=$row_uno[0];
    $valoresX_uno[]=$row_uno[1];

}

$datoX_uno=json_encode($valoresX_uno);
$datoY_uno=json_encode($valoresY_uno);

$sql_dos="SELECT COUNT(impresora_inventario.impresora_inventario_id) AS impresora_total,sede_corhuila.sede_corhuila_nombre AS sede FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id WHERE impresora_inventario.impresora_inventario_estado LIKE 'activo%' GROUP BY sede_corhuila.sede_corhuila_nombre;";


$result_dos=mysqli_query($mysqli,$sql_dos);


$valoresY_dos=array();//cantidad
$valoresX_dos=array();//sedes


while($row_dos=mysqli_fetch_row($result_dos)){

    $valoresY_dos[]=$row_dos[0];
    $valoresX_dos[]=$row_dos[1];

}

$datoX_dos=json_encode($valoresX_dos);
$datoY_dos=json_encode($valoresY_dos);


$sql_tres="SELECT COUNT(computador_mesa_inventario.computador_mesa_inventario_id) AS computador_mesa_total,sede_corhuila.sede_corhuila_nombre AS sede FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN sede_corhuila ON sede_corhuila.sede_corhuila_id=inventario.inventario_sede_id WHERE computador_mesa_inventario.computador_mesa_inventario_estado LIKE 'activo%' GROUP BY sede_corhuila.sede_corhuila_nombre;";


$result_tres=mysqli_query($mysqli,$sql_tres);


$valoresY_tres=array();//cantidad
$valoresX_tres=array();//sedes


while($row_tres=mysqli_fetch_row($result_tres)){

    $valoresY_tres[]=$row_tres[0];
    $valoresX_tres[]=$row_tres[1];

}

$datoX_tres=json_encode($valoresX_tres);
$datoY_tres=json_encode($valoresY_tres);

$sql_cuatro="SELECT COUNT(portatil_inventario.portatil_inventario_portatil_id) AS portatil_total FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE (dependencia.dependencia_nombre NOT LIKE 'Estudiantes%') AND (dependencia.dependencia_nombre NOT LIKE 'Profesor%') AND (portatil_inventario.portatil_inventario_estado LIKE 'activo%') UNION ALL SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE (dependencia.dependencia_nombre LIKE 'Estudiantes%') AND (portatil_inventario.portatil_inventario_estado LIKE 'activo%')
UNION ALL SELECT COUNT(portatil_inventario.portatil_inventario_id) AS portatil_total FROM portatil INNER JOIN portatil_inventario ON portatil_inventario.portatil_inventario_portatil_id=portatil.portatil_id INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE (dependencia.dependencia_nombre LIKE 'Profesor%') AND (portatil_inventario.portatil_inventario_estado LIKE 'activo%');";


$result_cuatro=mysqli_query($mysqli,$sql_cuatro);


$valoresY_cuatro=array();//cantidad


while($row_cuatro=mysqli_fetch_row($result_cuatro)){

    $valoresY_cuatro[]=$row_cuatro[0];

}



$datoY_cuatro=json_encode($valoresY_cuatro);


$sql_cinco="SELECT COUNT(impresora_inventario.impresora_inventario_id) AS impresora_total FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre NOT LIKE 'Estudiantes%' AND dependencia.dependencia_nombre NOT LIKE 'Profesor%' AND impresora_inventario.impresora_inventario_estado LIKE 'activo%' UNION ALL SELECT COUNT(impresora_inventario.impresora_inventario_id) AS impresora_total FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre LIKE 'Estudiantes%' AND impresora_inventario.impresora_inventario_estado LIKE 'activo%' UNION ALL SELECT COUNT(impresora_inventario.impresora_inventario_id) AS impresora_total FROM impresora INNER JOIN impresora_inventario ON impresora_inventario.impresora_inventario_impresora_id=impresora.impresora_id INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre LIKE 'Profesor%'AND impresora_inventario.impresora_inventario_estado LIKE 'activo%';";


$result_cinco=mysqli_query($mysqli,$sql_cinco);


$valoresY_cinco=array();//cantidad


while($row_cinco=mysqli_fetch_row($result_cinco)){

    $valoresY_cinco[]=$row_cinco[0];

}



$datoY_cinco=json_encode($valoresY_cinco);


$sql_seis="SELECT COUNT(computador_mesa_inventario.computador_mesa_inventario_id) AS computador_mesa_total FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre NOT LIKE 'Estudiantes%' AND dependencia.dependencia_nombre NOT LIKE 'Profesor%' AND computador_mesa_inventario.computador_mesa_inventario_estado LIKE 'activo%' UNION ALL SELECT COUNT(computador_mesa_inventario.computador_mesa_inventario_id) AS computador_mesa_total FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre LIKE 'Estudiantes%' AND computador_mesa_inventario.computador_mesa_inventario_estado LIKE 'activo%' UNION ALL SELECT COUNT(computador_mesa_inventario.computador_mesa_inventario_id) AS computador_mesa_total FROM computador_mesa INNER JOIN computador_mesa_inventario ON computador_mesa_inventario.computador_mesa_inventario_computador_mesa_id=computador_mesa.computador_mesa_id INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id INNER JOIN dependencia ON dependencia.dependencia_id=inventario.inventario_dependencia WHERE dependencia.dependencia_nombre LIKE 'Profesor%' AND computador_mesa_inventario.computador_mesa_inventario_estado LIKE 'activo';";


$result_seis=mysqli_query($mysqli,$sql_seis);


$valoresY_seis=array();//cantidad


while($row_seis=mysqli_fetch_row($result_seis)){

    $valoresY_seis[]=$row_seis[0];

}



$datoY_seis=json_encode($valoresY_seis);


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
      text: datosY_uno.map(String),
      textposition: 'auto',
      marker:{
      color: ['rgba(240, 123, 26, 1)', 'rgba(61, 153, 240,1)']
      },
      type:'bar',
      width: [0.3,0.3]
      }],
      {
    margin: { t: 0 } } );



    datosX_dos=crearCadenaGrafico('<?php echo $datoX_dos ?>');
    datosY_dos=crearCadenaGrafico('<?php echo $datoY_dos ?>');
    
    var tester_dos = document.getElementById('tester_dos');
    Plotly.newPlot( tester_dos, [{
    x: datosX_dos,
    y: datosY_dos,
    text: datosY_dos.map(String),
    textposition: 'auto',
    marker:{
    color: ['rgba(240, 123, 26, 1)', 'rgba(61, 153, 240,1)']
    },
    type:'bar',
    width: [0.3,0.3]
    }],
     {
	margin: { t: 0 } } );

    datosX_tres=crearCadenaGrafico('<?php echo $datoX_tres ?>');
    datosY_tres=crearCadenaGrafico('<?php echo $datoY_tres ?>');
    
    var tester_tres = document.getElementById('tester_tres');
    Plotly.newPlot( tester_tres, [{
    x: datosX_tres,
    y: datosY_tres,
    text: datosY_tres.map(String),
    textposition: 'auto',
    marker:{
    color: ['rgba(240, 123, 26, 1)', 'rgba(61, 153, 240,1)']
    },
    type:'bar',
    width: [0.3,0.3]
    }],
     {
	margin: { t: 0 } } );

  datosY_cuatro=crearCadenaGrafico('<?php echo $datoY_cuatro ?>');
    
  var tester_cuatro = document.getElementById('tester_cuatro');
	Plotly.newPlot( tester_cuatro, [{
    x: ['colaborador', 'estudiante','profesor'],
	  y: datosY_cuatro,
    text: datosY_cuatro.map(String),
    textposition: 'auto',
    marker:{
    color: ['rgba(27, 105, 250, 1)', 'rgba(240, 233, 23 ,1)', 'rgba(238, 51, 9 ,1)']
    },
    type:'bar',
    width: [0.5,0.5],
    }],
     {
	margin: { t: 0 } } );

  datosY_cinco=crearCadenaGrafico('<?php echo $datoY_cinco ?>');
    
  var tester_cinco = document.getElementById('tester_cinco');
	Plotly.newPlot( tester_cinco, [{
    x: ['colaborador', 'estudiante', 'profesor'],
	  y: datosY_cinco,
    text: datosY_cinco.map(String),
    textposition: 'auto',
    marker:{
    color: ['rgba(27, 105, 250, 1)', 'rgba(240, 233, 23 ,1)', 'rgba(238, 51, 9 ,1)']
    },
    type:'bar',
    width: [0.5,0.5],
    }],
     {
	margin: { t: 0 } } );

  datosY_seis=crearCadenaGrafico('<?php echo $datoY_seis ?>');
    
  var tester_seis = document.getElementById('tester_seis');
	Plotly.newPlot( tester_seis, [{
    x: ['colaborador', 'estudiante', 'profesor'],
	  y: datosY_seis,
    text: datosY_seis.map(String),
    textposition: 'auto',
    marker:{
    color: ['rgba(27, 105, 250, 1)', 'rgba(240, 233, 23 ,1)', 'rgba(238, 51, 9 ,1)']
    },
    type:'bar',
    width: [0.5,0.5],
    }],
     {
	margin: { t: 0 } } );

</script>
</body>

</html>