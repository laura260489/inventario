<?php 
require_once 'conexion.php';

function guardarTraspaso(){

 $mysqli = getConn();
 session_start();
 
 $id_objeto = $_POST['id_objeto'];
 $dependencia_id = $_POST['dependencia_id'];
 $colaborador=$_POST['colaborador'];
 $sede_id=$_POST['sede_id'];
 $portatil_id=$_SESSION['portatil_id'];

 $insertar_inventario = "INSERT INTO inventario(inventario_id,inventario_dependencia,inventario_colaborador_id,inventario_objeto_id,inventario_sede_id,inventario_estado) VALUES ('0','$dependencia_id','$colaborador','$id_objeto','$sede_id','activo')";
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

  $buscar_portatil_inventario_id="SELECT portatil_inventario_id FROM portatil_inventario WHERE portatil_inventario_portatil_id=$portatil_id";
  $resultado_cuatro = $mysqli->query($buscar_portatil_inventario_id);

     while($row_cuatro=$resultado_cuatro->fetch_array(MYSQLI_ASSOC)){
                            
        $portatil_inventario_id=$row_cuatro['portatil_inventario_id'];
    }

  $actualizar_estado="UPDATE portatil_inventario SET portatil_inventario_estado='traspaso' WHERE portatil_inventario_id=$portatil_inventario_id";
  $resultado_actualizar=$mysqli->query($actualizar_estado);

  $insertar_portatil_inventario="INSERT INTO portatil_inventario(portatil_inventario_id,portatil_inventario_portatil_id,portatil_inventario_inventario_id,portatil_inventario_estado) VALUES ('0','$portatil_id','$buscar_inventario_id','activo')";
  $resultado_tres=$mysqli->query($insertar_portatil_inventario);


    if ($resultado_tres) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }


}

return guardarTraspaso();

?>