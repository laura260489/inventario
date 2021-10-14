<?php 
require_once 'conexion.php';

function getColaborador(){
  $mysqli = getConn();
  $dependencia_id = $_POST['dependencia_id'];
  $query = "SELECT * FROM `colaborador` WHERE colaborador_dependencia = $dependencia_id ORDER BY colaborador.colaborador_nombre ASC";
  $result = $mysqli->query($query);
  $colaborador = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $colaborador .= "<option value='$row[colaborador_id]'>$row[colaborador_nombre]</option>";
  }
  return $colaborador;
}

echo getColaborador();