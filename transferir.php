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
                        $_SESSION["id_placa_portatil"] = $id;

                        $mysqli = getConn();

                        $query="SELECT portatil.portatil_procesador AS procesador, portatil.portatil_modelo AS modelo, portatil.portatil_ram AS RAM, portatil_velocidad AS Disco FROM portatil WHERE portatil.portatil_placa='".mysqli_real_escape_string($mysqli,$id)."' LIMIT 1";

                        $result = $mysqli->query($query);

                        while($row = $result->fetch_array(MYSQLI_ASSOC)){

                            
                
                            echo "<li class='list-group-item'>Procesador: ".$row['procesador']."</li>";
                            echo "<li class='list-group-item'>Modelo: ".$row['modelo']."</li>";
                            echo "<li class='list-group-item'>Disco: ".$row['Disco']."</li>";
                            echo "<li class='list-group-item'>RAM: ".$row['RAM']."</li>";
                        
                               
                        }

                        $query_dos="SELECT portatil.portatil_id FROM portatil WHERE portatil.portatil_placa='".mysqli_real_escape_string($mysqli,$id)."'";
                        $result_dos = $mysqli->query($query_dos);

                        while($row_dos=$result_dos->fetch_array(MYSQLI_ASSOC)){
                            
                            $portatil_id=$row_dos['portatil_id'];
                        }

                        $_SESSION['portatil_id']=$portatil_id;


                    ?>

                    
                </ul>

                <div class="col-md-4">
                    <p>Seleccione una sede
                        <select id="lista_sede" name="lista_sede" class="form-control border" required>
                        </select>
                    </p>
                </div>

                <div class="col-md-4">
                    <p>Seleccione una dependencia
                        <select id="lista_dependencia" name="lista_dependencia" class="form-control border">
                        </select>
                    </p>
                </div>

                <div class="col-md-4">
                    <p>Seleccione un colaborador
                        <select id="colaborador" name="colaboradores" class="form-control border">
                        </select>
                    </p>
                </div>

                <div class="card text-center list-group ">
                        <div class="col-sm-12"> 
                            <p class='boton'><button id="guardar_registro" type="submit" class="btn btn-success btn-block border botonRegistro" style="font-size:14px">Guardar registro</button></p>
                        </div>
                        <div class="col-lg-12 textList">
                            <div class="col-sm-12">
                                <a href="inventario.php" class="list-group-item list-group-item-action border">Regresar</a>
                            </div>
                            
                        </div>
                    </div>
            </div>  
        </div>
    </div>

    <script src="js/transferir.js"></script>
</body>
</html>