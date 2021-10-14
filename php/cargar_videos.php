
<?php 

require_once 'conexion.php';

function getVideos(){

  echo '<link href="./css/informacion_equipo.css" type="text/css" rel="stylesheet">';
  echo '
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">';
  echo '<html>
          <head>
            <style type="text/css">
              label,.campo {
                display: block;
                align-items:center;
                justify-content: center;
              }
            </style>
          </head>';

  $id = $_POST['id'];
  if ($id=='1'){

    $html_portatil_placa= "<label>Placa: </label> <input type='text' id='placa_portatil' name='placa_portatil' class='campo' required></input><br>";
    $html_portatil_velocidad= "<label>Disco: </label><input type='text' id='velocidad_portatil' name='velocidad_portatil' class='campo' required></input><br>";
    $html_portatil_modelo= "<label>Modelo: </label><input type='text' id='modelo_portatil' name='modelo_portatil' class='campo' required></input><br>";
    $html_portatil_ram= "<label>RAM: </label><input type='text' id='ram_portatil' name='ram_portatil' class='campo' required onkeypress='return (event.charCode >= 48 && event.charCode <= 57)' min='1'></input><br>";
    $html_portatil_procesador= "<label>Procesador: </label><input type='text' id='procesador_portatil' name='procesador_portatil' class='campo' required></input><br>";
    $html_portatil_tamaño= "<label>Tamaño de pantalla: </label><input type='text' id='tamaño_portatil' name='tamaño_portatil' class='campo' required></input>";

    return array ($html_portatil_placa,$html_portatil_velocidad,$html_portatil_modelo,$html_portatil_ram,$html_portatil_procesador,$html_portatil_tamaño);

  }else if($id=='2'){

    $html_servidor_placa="<label>Placa: </label> <input type='text' id='placa_servidor' name='placa_servidor' class='campo' required></input><br>";
    $html_servidor_modelo="<label>Modelo: </label> <input type='text' id='modelo_servidor' name='modelo_servidor' class='campo' required></input>";
    $html_servidor_marca="<label>Marca: </label> <input type='text' id='marca_servidor' name='marca_servidor' class='campo' required></input>";
    $html_servidor_procesador="<label>Procesador: </label> <input type='text' id='procesador_servidor' name='procesador_servidor' class='campo' required></input>";
    $html_servidor_ram="<label>RAM: </label> <input type='text' id='ram_servidor' name='ram_servidor' class='campo' required></input>";
    $html_servidor_almacenamiento="<label>Almacenamiento: </label> <input type='text' id='almacenamiento_servidor' name='almacenamiento_servidor' class='campo' required></input>";

    return array ($html_servidor_placa,$html_servidor_modelo,$html_servidor_marca,$html_servidor_procesador,$html_servidor_ram,$html_servidor_almacenamiento);
  }else if($id=='3'){

    $html_cpu_placa="<label>Placa: </label> <input type='text' id='placa_cpu' name='placa_cpu' class='campo' required></input><br>";
    $html_cpu_modelo="<label>Modelo: </label> <input type='text' id='modelo_cpu' name='modelo_cpu' class='campo' required></input>";

    return array ($html_cpu_placa,$html_cpu_modelo);

  }else if($id=='4'){

    $html_computador_mesa_placa="<label>Placa: </label> <input type='text' id='placa_computador_mesa' name='placa_computador_mesa' class='campo' required></input><br>";
    $html_computador_mesa_modelo="<label>Modelo: </label> <input type='text' id='modelo_computador_mesa' name='modelo_computador_mesa' class='campo' required></input>";
    $html_computador_mesa_velocidad="<label>Disco: </label> <input type='text' id='velocidad_computador_mesa' name='velocidad_computador_mesa' class='campo' required></input>";
    $html_computador_mesa_ram="<label>RAM: </label> <input type='text' id='ram_computador_mesa' name='ram_computador_mesa' class='campo' required></input>";
    $html_computador_mesa_procesador="<label>Procesador: </label> <input type='text' id='procesador_computador_mesa' name='procesador_computador_mesa' class='campo' required></input>";

    return array ($html_computador_mesa_placa,$html_computador_mesa_modelo,$html_computador_mesa_procesador,$html_computador_mesa_ram,$html_computador_mesa_velocidad);

  }else if($id=='5'){

    $html_escaner_placa="<label>Placa: </label> <input type='text' id='placa_escaner' name='placa_escaner' class='campo' required></input><br>";
    $html_escaner_modelo="<label>Modelo: </label> <input type='text' id='modelo_escaner' name='modelo_escaner' class='campo' required></input>";
    $html_escaner_marca="<label>marca: </label> <input type='text' id='marca_escaner' name='marca_escaner' class='campo' required></input>";
    
    return array ($html_escaner_placa,$html_escaner_modelo,$html_escaner_marca);

  }else if($id=='6'){

    $html_disco_placa="<label>Placa: </label> <input type='text' id='placa_disco' name='placa_disco' class='campo' required></input><br>";
    $html_disco_modelo="<label>Modelo: </label> <input type='text' id='modelo_disco' name='modelo_disco' class='campo' required></input>";

    return array ($html_disco_placa,$html_disco_modelo);

  }else if($id=='7'){

    $html_impresora_placa="<label>Placa: </label> <input type='text' id='placa_impresora' name='placa_impresora' class='campo' required></input><br>";
    $html_impresora_marca="<label>Marca: </label> <input type='text' id='marca_impresora' name='marca_impresora' class='campo' required></input>";
    $html_impresora_modelo="<label>Modelo: </label> <input type='text' id='modelo_impresora' name='modelo_impresora' class='campo' required></input>";

    return array ($html_impresora_placa,$html_impresora_marca,$html_impresora_modelo);

  }else if($id=='8'){

    $html_monitor_placa="<label>Placa: </label> <input type='text' id='placa_monitor' name='placa_monitor' class='campo' required></input><br>";
    $html_monitor_modelo="<label>Modelo: </label> <input type='text' id='modelo_monitor' name='modelo_monitor' class='campo' required></input>";

    return array ($html_monitor_placa,$html_monitor_modelo);

  }else if($id=='9'){

    $html_estabilizador_placa="<label>Placa: </label> <input type='text' id='placa_estabilizador' name='placa_estabilizador' class='campo' required></input><br>";
    $html_estabilizador_marca="<label>Marca: </label> <input type='text' id='marca_estabilizador' name='marca_estabilizador' class='campo' required></input>";
    $html_estabilizador_voltios="<label>voltios: </label> <input type='text' id='voltios_estabilizador' name='voltios_estabilizador' class='campo' required></input>";
    
    return array ($html_estabilizador_placa,$html_estabilizador_marca,$html_estabilizador_voltios);

  }else if($id=='10'){

    $html_rack_placa="<label>Placa: </label> <input type='text' id='placa_rack' name='placa_rack' class='campo' required></input><br>";
    

    return array ($html_rack_placa);


  }else if($id=='11'){
    $html_switch_placa="<label>Placa: </label> <input type='text' id='placa_switch' name='placa_switch' class='campo' required></input><br>";
    $html_switch_marca="<label>Marca: </label> <input type='text' id='marca_switch' name='marca_switch' class='campo' required></input>";
    $html_switch_modelo="<label>Modelo: </label> <input type='text' id='modelo_switch' name='modelo_switch' class='campo' required></input>";
    $html_switch_puerto="<label>Puerto: </label> <input type='text' id='puerto_switch' name='puerto_switch' class='campo' required></input>";
    
    return array ($html_switch_placa,$html_switch_marca,$html_switch_modelo,$html_switch_puerto);

  }else if($id=='14'){

    $html_videobeam_placa="<label>Placa: </label> <input type='text' id='placa_videobeam' name='placa_videobeam' class='campo' required></input><br>";
    $html_videobeam_marca="<label>Marca: </label> <input type='text' id='marca_videobeam' name='marca_videobeam' class='campo' required></input>";
    $html_videobeam_modelo="<label>Modelo: </label> <input type='text' id='modelo_videobeam' name='modelo_videobeam' class='campo' required></input>";
    
    return array ($html_videobeam_placa,$html_videobeam_marca,$html_videobeam_modelo);

  }

  
}
$arreglo=getVideos();

foreach($arreglo as $value){
  echo $value;
}


