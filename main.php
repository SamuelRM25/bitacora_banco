<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['11'])) {
  header('Location: index.php');
  exit();
}

// Obtener el nombre de usuario
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Banco Vivienda - Página Principal</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Bienvenido, <?php echo $username; ?></h1>
    <p>Esta es tu página principal.</p>
    <a href="logout.php">Cerrar sesión</a>
  </div>
</body>
</html>
