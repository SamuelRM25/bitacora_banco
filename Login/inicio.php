<?php
// Se inicia la sesión
session_start();

// Se verifica que el usuario haya iniciado sesión
if (!isset($_SESSION['username'])) {
	// Si no ha iniciado sesión, se redirige a la página de inicio de sesión
	header("Location: index.php");
}

// Si el usuario ha iniciado sesión, se muestra la página de inicio
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Página de inicio</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Bienvenido a la página de inicio</h1>
		<p>¡Ha iniciado sesión correctamente!</p>
		<a href="logout.php">Cerrar sesión</a>
	</div>
</body>
</html>