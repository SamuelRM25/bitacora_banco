<!DOCTYPE html>
<html>
<head>
  <title>Detalles de la cuenta</title>
</head>
<body>
  <h1>Detalles de la cuenta</h1>
  <!-- Agrega aquí el código HTML para mostrar los detalles de la cuenta -->

  <!-- Agrega un botón para realizar el pago -->
  <form action="payment.php" method="POST">
    <!-- Incluye los campos necesarios para el pago, como el monto, descripción, etc. -->
    <input type="hidden" name="codigoPersona" value="2">
    <input type="hidden" name="usuarioIng" value="11">
    <input type="hidden" name="codigoCuenta" value="100003">
    <button type="submit">Realizar Pago</button>
  </form>
</body>
</html>
