<?php 
require_once 'conexion.php';

function getListaDep(){
  $mysqli = getConn();
  $sede_id=$_POST['sede_id'];
  $query = "SELECT * FROM `dependencia` where dependencia_sede_id=$sede_id";
  $result = $mysqli->query($query);
  $lista_dependencia = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $lista_dependencia .= "<option value='$row[dependencia_id]'>$row[dependencia_nombre]</option>";
  }
  return $lista_dependencia;
}

echo getListaDep();