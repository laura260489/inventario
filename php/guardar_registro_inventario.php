<?php 
require_once 'conexion.php';
include 'cargar_listas.php';

function getListaDep(){

 $mysqli = getConn();
 session_start();
 $po=$_SESSION['buscar_portatil_id'];
 $servidor=$_SESSION['buscar_servidor_id'];
 $cpu=$_SESSION['buscar_cpu_id'];
 $computador_mesa=$_SESSION['buscar_computador_mesa_id'];
 $escaner=$_SESSION['buscar_escaner_id'];
 $disco=$_SESSION['buscar_disco_id'];
 $impresora=$_SESSION['buscar_impresora_id'];
 $monitor=$_SESSION['buscar_monitor_id'];
 $estabilizador=$_SESSION['buscar_estabilizador_id'];
 $rack=$_SESSION['buscar_rack_id'];
 $switch=$_SESSION['buscar_switch_id'];
 $videobeam=$_SESSION['buscar_videobeam_id'];

 $id = $_POST['id'];
 $dependencia_id = $_POST['dependencia_id'];
 $colaborador=$_POST['colaborador'];
 $sede_id=$_POST['sede_id'];

 $insertar_inventario = "INSERT INTO inventario(inventario_id,inventario_dependencia,inventario_colaborador_id,inventario_objeto_id,inventario_sede_id,inventario_estado) VALUES ('0','$dependencia_id','$colaborador','$id','$sede_id','activo')";
 $resultado = $mysqli->query($insertar_inventario);
    
    if ($resultado) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }
  $buscar_inventario_id=mysqli_insert_id($mysqli);

  $insertar_registro = "INSERT INTO registro_objeto(registro_objeto_id,registro_objeto_inventario) VALUES ('0','$buscar_inventario_id')";
  $resultado_dos = $mysqli->query($insertar_registro);


    if ($resultado_dos) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }

    if($id=='1'){

        $insertar_portatil_inventario="INSERT INTO portatil_inventario(portatil_inventario_id,portatil_inventario_portatil_id,portatil_inventario_inventario_id,portatil_inventario_estado) VALUES ('0','$po','$buscar_inventario_id','activo')";
        $resultado_tres=$mysqli->query($insertar_portatil_inventario);
      
          if ($resultado_dos) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='2'){

        $insertar_servidor_inventario="INSERT INTO servidor_inventario(servidor_inventario_id,servidor_inventario_servidor_id,servidor_inventario_inventario_id,servidor_inventario_estado) VALUES ('0','$servidor','$buscar_inventario_id','activo')";
        $resultado_cuatro=$mysqli->query($insertar_servidor_inventario);
      
          if ($resultado_cuatro) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='3'){

        $insertar_cpu_inventario="INSERT INTO cpu_inventario(cpu_inventario_id,cpu_inventario_cpu_id,cpu_inventario_inventario_id,cpu_inventario_estado) VALUES ('0','$cpu','$buscar_inventario_id','activo')";
        $resultado_cinco=$mysqli->query($insertar_cpu_inventario);
      
          if ($resultado_cinco) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='4'){

        $insertar_computador_mesa_inventario="INSERT INTO computador_mesa_inventario(computador_mesa_inventario_id,computador_mesa_inventario_computador_mesa_id,computador_mesa_inventario_inventario_id,computador_mesa_inventario_estado) VALUES ('0','$computador_mesa','$buscar_inventario_id','activo')";
        $resultado_seis=$mysqli->query($insertar_computador_mesa_inventario);
      
          if ($resultado_seis) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='5'){

        $insertar_escaner_inventario="INSERT INTO escaner_inventario(escaner_inventario_id,escaner_inventario_escaner_id,escaner_inventario_inventario_id,escaner_inventario_estado) VALUES ('0','$escaner','$buscar_inventario_id','activo')";
        $resultado_siete=$mysqli->query($insertar_escaner_inventario);
      
          if ($resultado_siete) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='6'){

        $insertar_disco_inventario="INSERT INTO disco_inventario(disco_inventario_id,disco_inventario_disco_id,disco_inventario_inventario_id) VALUES ('0','$disco','$buscar_inventario_id')";
        $resultado_ocho=$mysqli->query($insertar_disco_inventario);
      
          if ($resultado_ocho) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='7'){

        $insertar_impresora_inventario="INSERT INTO impresora_inventario(impresora_inventario_id,impresora_inventario_impresora_id,impresora_inventario_inventario_id,impresora_inventario_estado) VALUES ('0','$impresora','$buscar_inventario_id','activo')";
        $resultado_nueve=$mysqli->query($insertar_impresora_inventario);
      
          if ($resultado_nueve) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='8'){

        $insertar_monitor_inventario="INSERT INTO monitor_inventario(monitor_inventario_id,monitor_inventario_monitor_id,monitor_inventario_inventario_id,monitor_inventario_estado) VALUES ('0','$monitor','$buscar_inventario_id','activo')";
        $resultado_diez=$mysqli->query($insertar_monitor_inventario);
      
          if ($resultado_diez) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='9'){

        $insertar_estabilizador_inventario="INSERT INTO estabilizador_inventario(estabilizador_inventario_id,estabilizador_inventario_estabilizador_id,estabilizador_inventario_inventario_id,estabilizador_inventario_estado) VALUES ('0','$estabilizador','$buscar_inventario_id','activo')";
        $resultado_once=$mysqli->query($insertar_estabilizador_inventario);
      
          if ($resultado_once) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }
    }else if($id=='10'){

        $insertar_rack_inventario="INSERT INTO rack_inventario(rack_inventario_id,rack_inventario_rack_id,rack_inventario_inventario_id,rack_inventario_estado) VALUES ('0','$rack','$buscar_inventario_id','activo')";
        $resultado_doce=$mysqli->query($insertar_rack_inventario);
      
          if ($resultado_doce) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }
    }else if($id=='11'){

        $insertar_switch_inventario="INSERT INTO switch_inventario(switch_inventario_id,switch_inventario_switch_id,switch_inventario_inventario_id,switch_inventario_estado) VALUES ('0','$switch','$buscar_inventario_id','activo')";
        $resultado_trece=$mysqli->query($insertar_switch_inventario);
      
          if ($resultado_trece) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }
    }else if($id=='14'){

        $insertar_videobeam_inventario="INSERT INTO videobeam_inventario(videobeam_inventario_id,videobeam_inventario_videobeam_id,videobeam_inventario_inventario_id,videobeam_inventario_estado) VALUES ('0','$videobeam','$buscar_inventario_id','activo')";
        $resultado_catorce=$mysqli->query($insertar_videobeam_inventario);
      
          if ($resultado_catorce) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }
    }


}

return getListaDep();
?>