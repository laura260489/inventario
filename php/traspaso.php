<?php

require_once 'conexion.php';

$mysqli = getConn();

session_start();

$id_inventario=$_SESSION['id_inventario'];
$equipo=$_SESSION['equipo'];


if($equipo=="portatil"){

    $buscar_portatil_inventario_id="SELECT portatil_inventario.portatil_inventario_id FROM portatil_inventario INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_portatil_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $portatil_inventario_id=$row_dos['portatil_inventario_id'];
    }

    $query="UPDATE portatil_inventario SET portatil_inventario_estado='inactivo' WHERE portatil_inventario_id=$portatil_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "si";
    }else{
        echo "no";
    }

}else if($equipo=="impresora"){

    $buscar_impresora_inventario_id="SELECT impresora_inventario.impresora_inventario_id FROM impresora_inventario INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_impresora_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $impresora_inventario_id=$row_dos['impresora_inventario_id'];
    }

    $query="UPDATE impresora_inventario SET impresora_inventario_estado='inactivo' WHERE impresora_inventario_id=$impresora_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "si";
    }else{
        echo "no";
    }


}else if($equipo=="computador_mesa"){

    $buscar_computador_mesa_inventario_id="SELECT computador_mesa_inventario.computador_mesa_inventario_id FROM computador_mesa_inventario INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_computador_mesa_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $computador_mesa_inventario_id=$row_dos['computador_mesa_inventario_id'];
    }

    $query="UPDATE computador_mesa_inventario SET computador_mesa_inventario_estado='inactivo' WHERE computador_mesa_inventario_id=$computador_mesa_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "si";
    }else{
        echo "no";
    }

}


?>