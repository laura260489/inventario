<?php

include 'conexion.php';
$mysqli = getConn();

    $usuario=$_POST["usuario"];
    $contrasena=$_POST["contrasena"];


    $sql1 = "SELECT usuario_id FROM usuario WHERE usuario_identificacion = '$usuario'";
	$sql2 = "SELECT usuario_id FROM usuario WHERE usuario_contrasena = '$contrasena'"; 
	$result1=mysqli_query($mysqli,$sql1);
    $result2=mysqli_query($mysqli,$sql2);

    $fila_usuario=mysqli_num_rows($result1);
    $fila_contrasena=mysqli_num_rows($result2);

    if($fila_usuario && $fila_contrasena == '1'){
        
        session_start();  
  
        $_SESSION['id'] = $usuario; 
        $_SESSION['nombre'] = $contrasena; 
        header('Location: ../index2.php');
        
    }else{
        echo "<script language='javascript'>alert('Usuario o contraseña incorrect@');;window.location.href='../index.php'</script>";
    }


?>