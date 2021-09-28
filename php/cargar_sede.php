<?php 
require_once 'conexion.php';

function getListaDep(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `sede_corhuila`';
  $result = $mysqli->query($query);
  $lista_sede = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $lista_sede .= "<option value='$row[sede_corhuila_id]'>$row[sede_corhuila_nombre]</option>";
  }
  return $lista_sede;
}

echo getListaDep();