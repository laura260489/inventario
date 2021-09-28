<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="inicio_sesion/images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="inicio_sesion/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&family=Lato:wght@300&family=Lexend+Deca:wght@600&family=Overpass:ital,wght@1,200&display=swap" rel="stylesheet">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-30 p-b-20">
				<form class="login100-form validate-form" method='POST' action='php/iniciar_sesion.php'>
					<span class="login100-form-avatar">
						<img src="inicio_sesion/images/avatar-01.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-20 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="usuario" id="usuario">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="contrasena" id="contrasena">
						<span class="focus-input100" data-placeholder="contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="iniciar_sesion" type="submit" onclick="validar()">
							Ingresar
						</button>
					</div><br>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<script> function validar(){

		
	}</script>
	

	<script src="inicio_sesion/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="inicio_sesion/vendor/animsition/js/animsition.min.js"></script>

	<script src="inicio_sesion/vendor/bootstrap/js/popper.js"></script>
	<script src="inicio_sesion/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="inicio_sesion/vendor/select2/select2.min.js"></script>

	<script src="inicio_sesion/vendor/daterangepicker/moment.min.js"></script>
	<script src="inicio_sesion/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="inicio_sesion/vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

</body>
</html>