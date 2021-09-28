<?php

 require_once 'conexion.php';
 include 'cargar_videos.php';
 
 $mysqli = getConn();

 session_start();
 
 $id = $_POST['id'];

 if($id=="1"){

    $placa_portatil=$_POST['placa_portatil'];
    $velocidad_portatil=$_POST['velocidad_portatil'];
    $modelo_portatil= $_POST['modelo_portatil'];
    $ram_portatil= $_POST['ram_portatil'];
    $procesador_portatil= $_POST['procesador_portatil'];
    $tamaño_portatil= $_POST['tamaño_portatil'];

    $consulta = "INSERT INTO portatil(portatil_id,portatil_placa,portatil_velocidad,portatil_modelo,portatil_ram,portatil_procesador,portatil_tamaño,objeto_id) VALUES ('0','$placa_portatil','$velocidad_portatil','$modelo_portatil','$ram_portatil','$procesador_portatil','$tamaño_portatil','$id')";
     $resultado = $mysqli->query($consulta);

        if ($resultado) {
            echo 200;
        }else {
            echo "Error al Registrar";
        }

       $_SESSION['buscar_portatil_id']=mysqli_insert_id($mysqli);

       echo $_SESSION['buscar_portatil_id'];

 }else if($id=="2"){

     $placa_mouse=$_POST['placa_mouse'];
     $modelo_mouse= $_POST['modelo_mouse'];

     $consulta = "INSERT INTO mouse(mouse_id,mouse_placa,mouse_modelo,mouse_objeto_id) VALUES ('0','$placa_mouse','$modelo_mouse','$id')";
     $resultado = $mysqli->query($consulta);


        if ($resultado) {
            echo '200';
        }else {
            echo "Error al Registrar";
        }

        $_SESSION['buscar_mouse_id']=mysqli_insert_id($mysqli);

}else if($id=="3"){

        $placa_cpu=$_POST['placa_cpu'];
        $modelo_cpu= $_POST['modelo_cpu'];
   
        $consulta = "INSERT INTO cpu(cpu_id,cpu_placa,cpu_modelo,cpu_objeto_id) VALUES ('0','$placa_cpu','$modelo_cpu','$id')";
        $resultado = $mysqli->query($consulta);
   
   
       if ($resultado) {
           echo '200';
       }else {
           echo "Error al Registrar";
       }

       $_SESSION['buscar_cpu_id']=mysqli_insert_id($mysqli);

 }else if($id=="4"){

        $placa_computador_mesa=$_POST['placa_computador_mesa'];
        $modelo_computador_mesa= $_POST['modelo_computador_mesa'];

        $consulta = "INSERT INTO computador_mesa(computador_mesa_id,computador_mesa_placa,computador_mesa_modelo,computador_mesa_objeto_id) VALUES ('0','$placa_computador_mesa','$modelo_computador_mesa','$id')";
        $resultado = $mysqli->query($consulta);


        if ($resultado) {
            echo '200';
        }else {
            echo "Error al Registrar";
        }

        $_SESSION['buscar_computador_mesa_id']=mysqli_insert_id($mysqli);

}else if($id=="5"){

    $placa_teclado=$_POST['placa_teclado'];
    $modelo_teclado= $_POST['modelo_teclado'];

    $consulta = "INSERT INTO teclado(teclado_id,teclado_placa,teclado_modelo,teclado_objeto_id) VALUES ('0','$placa_teclado','$modelo_teclado','$id')";
    $resultado = $mysqli->query($consulta);


   if ($resultado) {
       echo '200';
   }else {
       echo "Error al Registrar";
   }

   $_SESSION['buscar_teclado_id']=mysqli_insert_id($mysqli);

}else if($id=="6"){

    $placa_disco=$_POST['placa_disco'];
    $modelo_disco= $_POST['modelo_disco'];

    $consulta = "INSERT INTO disco(disco_id,disco_placa,disco_modelo,disco_objeto_id) VALUES ('0','$placa_disco','$modelo_disco','$id')";
    $resultado = $mysqli->query($consulta);


   if ($resultado) {
       echo '200';
   }else {
       echo "Error al Registrar";
   }

   $_SESSION['buscar_disco_id']=mysqli_insert_id($mysqli);

}else if($id=="7"){

    $placa_impresora=$_POST['placa_impresora'];
    $modelo_impresora= $_POST['modelo_impresora'];

    $consulta = "INSERT INTO impresora(impresora_id,impresora_placa,impresora_modelo,impresora_objeto_id) VALUES ('0','$placa_impresora','$modelo_impresora','$id')";
    $resultado = $mysqli->query($consulta);


   if ($resultado) {
       echo '200';
   }else {
       echo "Error al Registrar";
   }

   $_SESSION['buscar_impresora_id']=mysqli_insert_id($mysqli);

}else if($id=="8"){

    $placa_monitor=$_POST['placa_monitor'];
    $modelo_monitor= $_POST['modelo_monitor'];

    $consulta = "INSERT INTO monitor(monitor_id,monitor_placa,monitor_modelo,monitor_objeto_id) VALUES ('0','$placa_monitor','$modelo_monitor','$id')";
    $resultado = $mysqli->query($consulta);


   if ($resultado) {
       echo '200';
   }else {
       echo "Error al Registrar";
   }

   $_SESSION['buscar_monitor_id']=mysqli_insert_id($mysqli);

}



?>