<?php 
require_once 'conexion.php';

function guardarTraspaso(){

 $mysqli = getConn();
 session_start();
 
 $id_objeto = $_POST['id_objeto'];
 $dependencia_id = $_SESSION['dependencia_id'];
 $colaborador=$_POST['colaborador'];
 $sede_id=$_SESSION['sede_id'];
 $escaner_id=$_SESSION['escaner_id'];

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

  $buscar_escaner_inventario_id="SELECT escaner_inventario_id FROM escaner_inventario WHERE escaner_inventario_escaner_id=$escaner_id";
  $resultado_cuatro = $mysqli->query($buscar_escaner_inventario_id);

     while($row_cuatro=$resultado_cuatro->fetch_array(MYSQLI_ASSOC)){
                            
        $escaner_inventario_id=$row_cuatro['escaner_inventario_id'];
    }

  $actualizar_estado="UPDATE escaner_inventario SET escaner_inventario_estado='traspaso' WHERE escaner_inventario_id=$escaner_inventario_id";
  $resultado_actualizar=$mysqli->query($actualizar_estado);

  $insertar_escaner_inventario="INSERT INTO escaner_inventario(escaner_inventario_id,escaner_inventario_escaner_id,escaner_inventario_inventario_id,escaner_inventario_estado) VALUES ('0','$escaner_id','$buscar_inventario_id','activo')";
  $resultado_tres=$mysqli->query($insertar_escaner_inventario);


    if ($resultado_tres) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }


}

return guardarTraspaso();

?>