<?php

require_once 'conexion.php';

$mysqli = getConn();

session_start();

$id_inventario=$_SESSION['id_inventario'];


$query="UPDATE inventario SET inventario_estado='traspaso' WHERE inventario_id='".mysqli_real_escape_string($mysqli,$id_inventario)."'";

$result = $mysqli->query($query);

if ($result){
    echo "<script language='javascript'>alert('Traspaso realizado con éxito');;window.location.href='../inventario.php'</script>";
}else{
    echo "<script language='javascript'>alert('No se pudo realizar la transacción');;window.location.href='../inventario.php'</script>";
}
?>