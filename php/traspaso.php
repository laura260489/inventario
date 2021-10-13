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

    $buscar_inventario_id="SELECT portatil_inventario.portatil_inventario_inventario_id FROM portatil_inventario INNER JOIN inventario ON portatil_inventario.portatil_inventario_inventario_id=inventario.inventario_id WHERE portatil_inventario.portatil_inventario_id=$portatil_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['portatil_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

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

    $buscar_inventario_id="SELECT impresora_inventario.impresora_inventario_inventario_id FROM impresora_inventario INNER JOIN inventario ON impresora_inventario.impresora_inventario_inventario_id=inventario.inventario_id WHERE impresora_inventario.impresora_inventario_id=$impresora_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['impresora_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

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

    $buscar_inventario_id="SELECT computador_mesa_inventario.computador_mesa_inventario_inventario_id FROM computador_mesa_inventario INNER JOIN inventario ON computador_mesa_inventario.computador_mesa_inventario_inventario_id=inventario.inventario_id WHERE computador_mesa_inventario.computador_mesa_inventario_id=$computador_mesa_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['computador_mesa_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="escaner"){

    $buscar_escaner_inventario_id="SELECT escaner_inventario.escaner_inventario_id FROM escaner_inventario INNER JOIN inventario ON escaner_inventario.escaner_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_escaner_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $escaner_inventario_id=$row_dos['escaner_inventario_id'];
    }

    $query="UPDATE escaner_inventario SET escaner_inventario_estado='inactivo' WHERE escaner_inventario_id=$escaner_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "si";
    }else{
        echo "no";
    }

    $buscar_inventario_id="SELECT escaner_inventario.escaner_inventario_inventario_id FROM escaner_inventario INNER JOIN inventario ON escaner_inventario.escaner_inventario_inventario_id=inventario.inventario_id WHERE escaner_inventario.escaner_inventario_id=$escaner_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['escaner_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);


}else if($equipo=="servidor"){

    $buscar_servidor_inventario_id="SELECT servidor_inventario.servidor_inventario_id FROM servidor_inventario INNER JOIN inventario ON servidor_inventario.servidor_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_servidor_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $servidor_inventario_id=$row_dos['servidor_inventario_id'];
    }

    $query="UPDATE servidor_inventario SET servidor_inventario_estado='inactivo' WHERE servidor_inventario_id=$servidor_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "si";
    }else{
        echo "no";
    }

    $buscar_inventario_id="SELECT servidor_inventario.servidor_inventario_inventario_id FROM servidor_inventario INNER JOIN inventario ON servidor_inventario.servidor_inventario_inventario_id=inventario.inventario_id WHERE servidor_inventario.servidor_inventario_id=$servidor_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['servidor_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}


?>