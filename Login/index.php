<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $url = 'https://api-bancovivienda20230424203023.azurewebsites.net/api/LogIn';
    $data = array(
        'Accion' => 'L',
        'JsonStructure' => json_encode(array(
            'Usuario' => $usuario,
            'Contrasenia' => $contrasenia
        ))
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data)))
    );
    $response = curl_exec($ch);
    curl_close($ch);
	
	//if ($response['bRespuesta']) { $mensaje = json_decode($response['sMensaje'], true); $datos_persona = $mensaje['Datos_Persona']; // Accede a los datos de la primera persona en el array $persona = $datos_persona[0]; echo "Nombre completo: " . $persona['PrimerNombre'] . " " . $persona['SegundoNombre'] . " " . $persona['PrimerApellido'] . " " . $persona['SegundoApellido']; } else { echo "Error: " . $response['sInformacion']; }
	//$response = json_decode($json, true);
	
    // Aquí puedes procesar la respuesta del servidor
    echo $response;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Login</title>
</head>
<body>
    <h1>Formulario de Login</h1>
    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br><br>
        <label for="contrasenia">Contraseña:</label>
        <input type="password" id="contrasenia" name="contrasenia"><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
