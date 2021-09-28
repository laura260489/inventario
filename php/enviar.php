 <?php
 
 $directorio ="imagenes/";
 $aleatorio = mt_rand(100, 999);
 $ruta = "imagenes/".$aleatorio.".png";
 
 
	$nombre=$_FILES['imagen']['name'];
	
	$guardado=$_FILES['imagen']['tmp_name'];
	
	if(!file_exists($directorio )){
		mkdir($directorio ,0777,true);
		if(file_exists($directorio )){
	
			if(move_uploaded_file($guardado, 'imagenes/'.$nombre)){
				echo "<script language='javascript'>alert('Imagen guardada');window.location.href='../index2.php'</script>";
			}else{
				echo "Archivo no se pudo guardar";
			}
		}
	}else{
			if(move_uploaded_file($guardado, $directorio.$aleatorio.".png")){
			echo "<script language='javascript'>alert('Imagen guardada');window.location.href='../index2.php'</script>";
	
		}elseif(move_uploaded_file($guardado, $directorio.$aleatorio.".pdf")){
			echo "Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	
		//var_dump($ruta);
 
}
 

?>