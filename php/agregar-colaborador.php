<?php

require_once 'conexion.php';

$mysqli = getConn();

$dependencia = $_POST['dependencia'];
$colaborador = $_POST['colaborador'];
$id=mt_rand(1,3000);

$consulta = "INSERT INTO colaborador(colaborador_id,colaborador_nombre,colaborador_dependencia) VALUES ('$id','$colaborador','$dependencia')";
$resultado = $mysqli->query($consulta);

    if ($resultado) {
        echo "<script language='javascript'>alert('Colaborador creado');;window.location.href='../crear.php'</script>";
    }else {
        echo "<script language='javascript'>alert('No se pudo crear el colaborador');;window.location.href='../crear.php'</script>";
    }


?>