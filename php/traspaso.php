<?php

require_once 'conexion.php';

$mysqli = getConn();

session_start();

$id_inventario=$_SESSION['id_inventario'];

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
?>