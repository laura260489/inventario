<?php

require_once 'conexion.php';

$mysqli = getConn();

$dependencia = $_POST['dependencia'];
$sede = $_POST['sede'];
$id=mt_rand(1,3000);

$consulta = "INSERT INTO dependencia(dependencia_id,dependencia_nombre,dependencia_sede_id) VALUES ('$id','$dependencia','$sede')";
$resultado = $mysqli->query($consulta);

    if ($resultado) {
        echo "<script language='javascript'>alert('Dependencia creada');;window.location.href='../crear.php'</script>";
    }else {
        echo "<script language='javascript'>alert('No se pudo crear la dependencia');;window.location.href='../crear.php'</script>";
    }


?>