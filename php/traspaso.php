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
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
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
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
       echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
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
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
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
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
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
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT servidor_inventario.servidor_inventario_inventario_id FROM servidor_inventario INNER JOIN inventario ON servidor_inventario.servidor_inventario_inventario_id=inventario.inventario_id WHERE servidor_inventario.servidor_inventario_id=$servidor_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['servidor_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="Estabilizador"){

    $buscar_estabilizador_inventario_id="SELECT estabilizador_inventario.estabilizador_inventario_id FROM estabilizador_inventario INNER JOIN inventario ON estabilizador_inventario.estabilizador_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_estabilizador_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $estabilizador_inventario_id=$row_dos['estabilizador_inventario_id'];
    }

    $query="UPDATE estabilizador_inventario SET estabilizador_inventario_estado='inactivo' WHERE estabilizador_inventario_id=$estabilizador_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT estabilizador_inventario.estabilizador_inventario_inventario_id FROM estabilizador_inventario INNER JOIN inventario ON estabilizador_inventario.estabilizador_inventario_inventario_id=inventario.inventario_id WHERE estabilizador_inventario.estabilizador_inventario_id=$estabilizador_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['estabilizador_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="Rack"){

    $buscar_rack_inventario_id="SELECT rack_inventario.rack_inventario_id FROM rack_inventario INNER JOIN inventario ON rack_inventario.rack_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_rack_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $rack_inventario_id=$row_dos['rack_inventario_id'];
    }

    $query="UPDATE rack_inventario SET rack_inventario_estado='inactivo' WHERE rack_inventario_id=$rack_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT rack_inventario.rack_inventario_inventario_id FROM rack_inventario INNER JOIN inventario ON rack_inventario.rack_inventario_inventario_id=inventario.inventario_id WHERE rack_inventario.rack_inventario_id=$rack_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['rack_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="Switch"){

    $buscar_switch_inventario_id="SELECT switch_inventario.switch_inventario_id FROM switch_inventario INNER JOIN inventario ON switch_inventario.switch_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_switch_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $switch_inventario_id=$row_dos['switch_inventario_id'];
    }

    $query="UPDATE switch_inventario SET switch_inventario_estado='inactivo' WHERE switch_inventario_id=$switch_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT switch_inventario.switch_inventario_inventario_id FROM switch_inventario INNER JOIN inventario ON switch_inventario.switch_inventario_inventario_id=inventario.inventario_id WHERE switch_inventario.switch_inventario_id=$switch_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['switch_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="monitor"){

    $buscar_monitor_inventario_id="SELECT monitor_inventario.monitor_inventario_id FROM monitor_inventario INNER JOIN inventario ON monitor_inventario.monitor_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_monitor_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $monitor_inventario_id=$row_dos['monitor_inventario_id'];
    }

    $query="UPDATE monitor_inventario SET monitor_inventario_estado='inactivo' WHERE monitor_inventario_id=$monitor_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT monitor_inventario.monitor_inventario_inventario_id FROM monitor_inventario INNER JOIN inventario ON monitor_inventario.monitor_inventario_inventario_id=inventario.inventario_id WHERE monitor_inventario.monitor_inventario_id=$monitor_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['monitor_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="cpu"){

    $buscar_cpu_inventario_id="SELECT cpu_inventario.cpu_inventario_id FROM cpu_inventario INNER JOIN inventario ON cpu_inventario.cpu_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_cpu_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $cpu_inventario_id=$row_dos['cpu_inventario_id'];
    }

    $query="UPDATE cpu_inventario SET cpu_inventario_estado='inactivo' WHERE cpu_inventario_id=$cpu_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT cpu_inventario.cpu_inventario_inventario_id FROM cpu_inventario INNER JOIN inventario ON cpu_inventario.cpu_inventario_inventario_id=inventario.inventario_id WHERE cpu_inventario.cpu_inventario_id=$cpu_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['cpu_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}else if($equipo=="disco"){

    $buscar_disco_inventario_id="SELECT disco_inventario.disco_inventario_id FROM disco_inventario INNER JOIN inventario ON disco_inventario.disco_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";
    $result_uno=$mysqli->query($buscar_disco_inventario_id);

    while($row_dos=$result_uno->fetch_array(MYSQLI_ASSOC)){
                            
        $disco_inventario_id=$row_dos['disco_inventario_id'];
    }

    $query="UPDATE disco_inventario SET disco_inventario_estado='inactivo' WHERE disco_inventario_id=$disco_inventario_id";

    $result = $mysqli->query($query);

    if ($result){
        echo "<script language='javascript'>alert('Equipo dado de baja');window.location.href='../inventario.php'</script>";
    }else{
        echo "<script language='javascript'>alert('El equipo no se pudo dar de baja');window.location.href='../inventario.php'</script>";
    }

    $buscar_inventario_id="SELECT disco_inventario.disco_inventario_inventario_id FROM disco_inventario INNER JOIN inventario ON disco_inventario.disco_inventario_inventario_id=inventario.inventario_id WHERE disco_inventario.disco_inventario_id=$disco_inventario_id";
    $result_dos=$mysqli->query($buscar_inventario_id);

    while($row_tres=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
        $inventario_id=$row_tres['disco_inventario_inventario_id'];
    }

    $query_update_dos="UPDATE inventario SET inventario_dependencia='36',inventario_colaborador_id='188',inventario_sede_id='1' WHERE inventario_id=$inventario_id";
    $result_tres=$mysqli->query($query_update_dos);

}

?>