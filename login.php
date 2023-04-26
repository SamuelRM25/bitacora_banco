<?php
// Conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mi_base_de_datos";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die("Error de conexión: " . mysqli_connect_error());
}

// Obtención de las credenciales del usuario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificación de las credenciales en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario='$username' AND contraseña='$password'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) == 1) {
	// Credenciales correctas, se redirige al usuario a la página de inicio
	header("Location: inicio.php");
} else {
	// Credenciales incorrectas, se muestra un mensaje de error
	echo "Nombre de usuario o contraseña incorrectos.";
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);

// Se inicia la sesión
session_start();

// Se verifica si ya se ha iniciado sesión
if (isset($_SESSION['username'])) {
	// Si ya se ha iniciado sesión, se redirige al usuario a la página de inicio
	header("Location: inicio.php");
	exit();
}

// Se verifican las credenciales del usuario
if ($_POST['username'] == 'usuario' && $_POST['password'] == 'contraseña') {
	// Si las credenciales son correctas, se inicia la sesión y se redirige al usuario a la página de inicio
	$_SESSION['username'] = $_POST['username'];
	header("Location: inicio.php");
	exit();
} else {
	// Si las credenciales son incorrectas, se redirige al usuario a la página de inicio de sesión con un mensaje de error
	header("Location: index.php?error=1");
	exit();
}
?>