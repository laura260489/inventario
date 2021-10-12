<?php 
require_once 'conexion.php';
include 'cargar_listas.php';

function getListaDep(){

 $mysqli = getConn();
 session_start();
 $po=$_SESSION['buscar_portatil_id'];
 $mouse=$_SESSION['buscar_mouse_id'];
 $cpu=$_SESSION['buscar_cpu_id'];
 $computador_mesa=$_SESSION['buscar_computador_mesa_id'];
 $teclado=$_SESSION['buscar_teclado_id'];
 $disco=$_SESSION['buscar_disco_id'];
 $impresora=$_SESSION['buscar_impresora_id'];
 $monitor=$_SESSION['buscar_monitor_id'];

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

        $insertar_mouse_inventario="INSERT INTO mouse_inventario(mouse_inventario_id,mouse_inventario_mouse_id,mouse_inventario_inventario_id) VALUES ('0','$mouse','$buscar_inventario_id')";
        $resultado_cuatro=$mysqli->query($insertar_mouse_inventario);
      
          if ($resultado_cuatro) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='3'){

        $insertar_cpu_inventario="INSERT INTO cpu_inventario(cpu_inventario_id,cpu_inventario_cpu_id,cpu_inventario_inventario_id) VALUES ('0','$cpu','$buscar_inventario_id')";
        $resultado_cinco=$mysqli->query($insertar_cpu_inventario);
      
          if ($resultado_cinco) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='4'){

        $insertar_computador_mesa_inventario="INSERT INTO computador_mesa_inventario(computador_mesa_inventario_id,computador_mesa_inventario_computador_mesa_id,computador_mesa_inventario_inventario_id) VALUES ('0','$computador_mesa','$buscar_inventario_id')";
        $resultado_seis=$mysqli->query($insertar_computador_mesa_inventario);
      
          if ($resultado_seis) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='5'){

        $insertar_teclado_inventario="INSERT INTO teclado_inventario(teclado_inventario_id,teclado_inventario_teclado_id,teclado_inventario_inventario_id) VALUES ('0','$teclado','$buscar_inventario_id')";
        $resultado_siete=$mysqli->query($insertar_teclado_inventario);
      
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

        $insertar_impresora_inventario="INSERT INTO impresora_inventario(impresora_inventario_id,impresora_inventario_impresora_id,impresora_inventario_inventario_id) VALUES ('0','$impresora','$buscar_inventario_id')";
        $resultado_nueve=$mysqli->query($insertar_impresora_inventario);
      
          if ($resultado_nueve) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }else if($id=='8'){

        $insertar_monitor_inventario="INSERT INTO monitor_inventario(monitor_inventario_id,monitor_inventario_monitor_id,monitor_inventario_inventario_id) VALUES ('0','$monitor','$buscar_inventario_id')";
        $resultado_diez=$mysqli->query($insertar_monitor_inventario);
      
          if ($resultado_diez) {
              echo '200';
          }else {
              echo "Error al Registrar";
          }

    }


}

return getListaDep();
?>