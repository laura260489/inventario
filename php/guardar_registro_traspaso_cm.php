<?php 
require_once 'conexion.php';

function guardarTraspaso(){

 $mysqli = getConn();
 session_start();
 
 $id_objeto = $_POST['id_objeto'];
 $dependencia_id = $_POST['dependencia_id'];
 $colaborador=$_POST['colaborador'];
 $sede_id=$_POST['sede_id'];
 $computador_mesa_id=$_SESSION['computador_mesa_id'];

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

  $buscar_computador_mesa_inventario_id="SELECT computador_mesa_inventario_id FROM computador_mesa_inventario WHERE computador_mesa_inventario_computador_mesa_id=$computador_mesa_id";
  $resultado_cuatro = $mysqli->query($buscar_computador_mesa_inventario_id);

     while($row_cuatro=$resultado_cuatro->fetch_array(MYSQLI_ASSOC)){
                            
        $computador_mesa_inventario_id=$row_cuatro['computador_mesa_inventario_id'];
    }

  $actualizar_estado="UPDATE computador_mesa_inventario SET computador_mesa_inventario_estado='traspaso' WHERE computador_mesa_inventario_id=$computador_mesa_inventario_id";
  $resultado_actualizar=$mysqli->query($actualizar_estado);

    if ($resultado_actualizar) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }

  $insertar_computador_mesa_inventario="INSERT INTO computador_mesa_inventario(computador_mesa_inventario_id,computador_mesa_inventario_computador_mesa_id,computador_mesa_inventario_inventario_id,computador_mesa_inventario_estado) VALUES ('0','$computador_mesa_id','$buscar_inventario_id','activo')";
  $resultado_tres=$mysqli->query($insertar_computador_mesa_inventario);


    if ($resultado_tres) {
        echo '200';
    }else {
        echo "Error al Registrar";
    }


}

return guardarTraspaso();

?>