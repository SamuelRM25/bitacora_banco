<?php
// Se inicia la sesión
session_start();

// Se verifica si ya se ha iniciado sesión
if (isset($_SESSION['username'])) {
	// Si ya se ha iniciado sesión, se redirige al usuario a la página de inicio
	header("Location: inicio.php");
	exit();
}

// Se verifica si hay un mensaje de error
$error = '';
if (isset($_GET['error'])) {
	$error = 'Credenciales incorrectas. Por favor, inténtelo de nuevo.';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Página de inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Iniciar sesión</h1>
		<?php if (!empty($error)) { ?>
			<p class="error"><?php echo $error; ?></p>
		<?php } ?>
		<form method="post" action="login.php">
			<label for="username">Nombre de usuario:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" required>
			<button type="submit">Iniciar sesión</button>
		</form>
	</div>
</body>
</html>
