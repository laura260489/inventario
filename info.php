<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script link="https://unpkg.com/@popperjs/core@2"></script>

    <link href="css/pagina_principal.css" type="text/css"  rel="stylesheet">
    <link href="css/inventario.css" type="text/css"  rel="stylesheet">
    <link href="css/informacion_equipo.css" type="text/css"  rel="stylesheet">

</head>
<body>
    <div class="container colorBackground">
        <div class="card" style="width: 47rem;">
            <div class="card text-center cardImg">
                <img class="card-img-top" src="inicio_sesion/images/LogoCorhuila.png">
            </div>
            <div class="card-body">
                <h5 class="card-title fontTitulo">Características del equipo</h5>
                <p class="card-text">A continuación se presentan todas las características pertinentes al equipo</p>
            </div> 
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <?php

                    require_once 'php/conexion.php';

                        session_start();

                        $id = $_GET['id'];
                        $_SESSION["id_inventario"] = $id;

                        $mysqli = getConn();

                        $query="SELECT objeto.objeto_nombre AS equipo FROM objeto INNER JOIN inventario ON inventario.inventario_objeto_id=objeto.objeto_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id)."'";

                        $result = $mysqli->query($query);

                        while($row = $result->fetch_array(MYSQLI_ASSOC)){

                            if($row['equipo']=="portatil"){

                                $consulta1="SELECT ".$row['equipo']."_placa AS placa,".$row['equipo']."_modelo AS modelo,".$row['equipo']."_velocidad AS velocidad,".$row['equipo']."_ram AS ram,".$row['equipo']."_procesador AS procesador FROM ".$row['equipo']." INNER JOIN ".$row['equipo']."_inventario ON ".$row['equipo']."_inventario.".$row['equipo']."_inventario_".$row['equipo']."_id=".$row['equipo'].".".$row['equipo']."_id INNER JOIN inventario ON ".$row['equipo']."_inventario.".$row['equipo']."_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id)."'";

                                $result_uno = $mysqli->query($consulta1);
                        
                                while($row_dos = $result_uno->fetch_array(MYSQLI_ASSOC)){
                        
                                    echo "<li class='list-group-item'>Placa: ".$row_dos['placa']."</li>";
                                    echo "<li class='list-group-item'>Modelo: ".$row_dos['modelo']."</li>";
                                    echo "<li class='list-group-item'>Velocidad: ".$row_dos['velocidad']."</li>";
                                    echo "<li class='list-group-item'>RAM: ".$row_dos['ram']."</li>";
                                    echo "<li class='list-group-item'>Procesador: ".$row_dos['procesador']."</li>";
                        
                                }
                        

                            }else{

                                $consulta2="SELECT ".$row['equipo']."_placa AS placa,".$row['equipo']."_modelo AS modelo FROM ".$row['equipo']." INNER JOIN ".$row['equipo']."_inventario ON ".$row['equipo']."_inventario.".$row['equipo']."_inventario_".$row['equipo']."_id=".$row['equipo'].".".$row['equipo']."_id INNER JOIN inventario ON ".$row['equipo']."_inventario.".$row['equipo']."_inventario_inventario_id=inventario.inventario_id WHERE inventario.inventario_id='".mysqli_real_escape_string($mysqli,$id)."'";

                                $result_dos = $mysqli->query($consulta2);
                        
                                while($row_dos = $result_dos->fetch_array(MYSQLI_ASSOC)){
                        
                                    echo "<li class='list-group-item'>Placa: ".$row_dos['placa']."</li>";
                                    echo "<li class='list-group-item'>Modelo: ".$row_dos['modelo']."</li>";
                        
                                }
                        

                            }


                        }


                    ?>

                    <div class="card text-center list-group ">
                        <div class="col-lg-12 textList">
                            <div class="col-sm-6">
                                <a href="inventario.php" class="list-group-item list-group-item-action border">Regresar</a>
                            </div>
                            <div class="col-sm-6"> 
                                <a href="php/traspaso.php" class="list-group-item list-group-item-action border">Traspaso</a>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>  
        </div>
    </div>


</body>
</html>