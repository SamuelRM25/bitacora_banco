<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario de pago
  $codigoPersona = $_POST['codigoPersona'];
  $usuarioIng = $_POST['usuarioIng'];
  $codigoCuenta = $_POST['codigoCuenta'];

  // Realizar la solicitud de pago
  $pagoUrl = "https://api-bancovivienda20230424203023.azurewebsites.net/api/Pago";
  $data = array(
    'Accion' => 'S3',
    'JsonStructure' => json_encode(array(
      'CodigoPersona' => $codigoPersona,
      'Usuario_Ing' => $usuarioIng,
      'CodigoCuenta' => $codigoCuenta
    ))
  );
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/json\r\n",
      'method'  => 'POST',
      'content' => json_encode($data)
    )
  );
  $context  = stream_context_create($options);
  $response = file_get_contents($pagoUrl, false, $context);

  // Procesar la respuesta del servicio de pago
  $result = json_decode($response, true);

  if (isset($result['Success']) && $result['Success']) {
    // Pago exitoso, mostrar mensaje de éxito
    echo "Pago exitoso";
  } elseif (isset($result['Message'])) {
    // Error en el pago, mostrar mensaje de error
    echo "Error: " . $result['Message'];
  } else {
    // Respuesta inesperada, mostrar mensaje genérico de error
    echo "Error en el pago";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Pago</title>
</head>
<body>
  <h1>Formulario de Pago</h1>
  <!-- Agrega aquí el código HTML para mostrar el formulario de pago -->
  <form action="" method="POST">
    <!-- Incluye los campos necesarios para el pago, como el monto, descripción, etc. -->
    <input type="hidden" name="codigoPersona" value="2">
    <input type="hidden" name="usuarioIng" value="11">
    <input type="hidden" name="codigoCuenta" value="100003">
    <button type="submit">Realizar Pago</button>
  </form>
</body>
</html>
