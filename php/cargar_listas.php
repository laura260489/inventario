<?php 
require_once 'conexion.php';

function getListasRep(){
  $mysqli = getConn();
  $query = 'SELECT objeto_id, objeto_descripcion FROM `objeto` ORDER by objeto_descripcion ASC;';
  $result = $mysqli->query($query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[objeto_id]'>$row[objeto_descripcion]</option>";
  }
  return $listas;
}

echo getListasRep();