<?php
// Se inicia la sesión
session_start();

// Se destruyen todas las variables de sesión
session_destroy();

// Se redirige al usuario a la página de inicio de sesión
header("Location: index.php");
?>
