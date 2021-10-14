<?php 
require_once 'conexion.php';

function getListasRep(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `objeto` ORDER by objeto_nombre ASC;';
  $result = $mysqli->query($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[objeto_id]'>$row[objeto_nombre]</option>";
  }
  return $listas;
}

echo getListasRep();