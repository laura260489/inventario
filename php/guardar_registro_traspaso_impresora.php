<?php 
require_once 'conexion.php';

function guardarTraspaso(){

 $mysqli = getConn();
 session_start();
 
 $id_objeto = $_POST['id_objeto'];
 $dependencia_id = $_SESSION['dependencia_id'];
 $colaborador=$_POST['colaborador'];
 $sede_id=$_SESSION['sede_id'];
 $impresora_id=$_SESSION['impresora_id'];

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

  $buscar_impresora_inventario_id="SELECT impresora_inventario_id FROM impresora_inventario WHERE impresora_inventario_impresora_id=$impresora_id";
  $resultado_cuatro = $mysqli->query($buscar_impresora_inventario_id);

     while($row_cuatro=$resultado_cuatro->fetch_array(MYSQLI_ASSOC)){
                            
        $impresora_inventario_id=$row_cuatro['impresora_inventario_id'];
    }

  $actualizar_estado="UPDATE impresora_inventario SET impresora_inventario_estado='traspaso' WHERE impresora_inventario_id=$impresora_inventario_id";
  $resultado_actualizar=$mysqli->query($actualizar_estado);

  $insertar_impresora_inventario="INSERT INTO impresora_inventario(impresora_inventario_id,impresora_inventario_impresora_id,impresora_inventario_inventario_id,impresora_inventario_estado) VALUES ('0','$impresora_id','$buscar_inventario_id','activo')";
  $resultado_tres=$mysqli->query($insertar_impresora_inventario);


    if ($resultado_tres) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }


}

return guardarTraspaso();

?>