<html lang="es">
<head>
	<title>Ingresar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<script src="../js/jquery-3.4.1.js"></script>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #f5f5f5;
			color: #333;
			margin: 0;
			padding: 0;
		}

		.cover {
			background-color: #fff;
			background-size: cover;
			background-position: center;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 30px;
			flex-direction: column;
		}

		.logInForm {
			background-color: rgba(255, 255, 255, 0.95);
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
			width: 100%;
			max-width: 400px;
			text-align: center;
		}

		.dashboard-Navbar {
			background-color: #ff7673;
			color: white;
			padding: 10px 20px;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
			z-index: 1000;
			display: flex;
			justify-content: center;
			align-items: center;
			border-bottom: 2px solid #ff4c4b;
		}

		.dashboard-sideBar-title {
			text-align: center;
		}

		.dashboard-sideBar-title img {
			border-radius: 50%;
			width: 150px;
			height: 150px;
			display: block;
			margin: 0 auto;
			animation: bounce 2s infinite;
		}

		.dashboard-sideBar-title h1 {
			font-size: 30px;
			color: white; /* Texto blanco */
			margin-top: 10px;
			font-weight: bold;
			letter-spacing: 2px;
			text-transform: uppercase;
			text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Sombra del texto */
		}

		@keyframes bounce {
			0%, 100% {
				transform: translateY(0);
			}
			50% {
				transform: translateY(-10px);
			}
		}

		/* Centrar campos del formulario */
		.form-group {
			margin-bottom: 20px;
			text-align: center; /* Centra el contenido */
		}

		.form-control {
			width: 100%;
			max-width: 300px; /* Limitar el ancho de los campos */
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 16px;
			text-align: center; /* Centrar el texto */
		}

		.control-label {
			font-weight: bold;
			margin-bottom: 5px;
			display: block;
		}

		.btncolor {
			background-color: #ff4c4b;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
			transition: background-color 0.3s;
		}

		.btncolor:hover {
			background-color: #ff7673;
		}
	</style>
</head>
<body class="cover">
	<section class="ashboard-contentPage">
		<nav class="full-box dashboard-Navbar">
			<div class="full-box text-center text-titles dashboard-sideBar-title">
				<img src="../Controlador/imagenes/210x210.png" alt="Logo">
				<h1>CALZASHOP</h1>
			</div>
		</nav>
	</section>
	<form class="full-box logInForm" id="formulario">
		<p class="text-center text-muted"><i class="fa fa-user-circle fa-5x"></i></p>
		<div id="grupo">
			<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
			<div class="form-group label-floating">
				<label class="control-label" for="UserEmail">Usuario</label>
				<input class="form-control" id="UserEmail" name="UserEmail" type="text">
			</div>
			<div class="form-group label-floating">
				<label class="control-label" for="UserPass">Contraseña</label>
				<input class="form-control" id="UserPass" name="UserPass" type="password">
			</div>
		</div>
		<div>
			<input type="submit" value="Iniciar sesión" class="btncolor" id="btn_iniciar">
		</div>
	</form>

	<script src="../Assets/admin/vendors/jquery/dist/jquery.min.js"></script>
	<script src="./Intercomunicador/login.js"></script>
</body>
</html>