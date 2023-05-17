<?php

$data = array( 'Accion' => 'S3', 'JsonStructure' => '{"CodigoPersona":"2","Usuario_Ing":"11","CodigoCuenta":"100003"}' );

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api-bancovivienda20230424203023.azurewebsites.net/api/Pago",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($data),
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_HTTPHEADER => array(
"Cache-Control: no-cache",
"Content-Type: application/json",
),
));
echo $xmls = curl_exec($curl);
$err = curl_error($curl);
//$aaaa = xml_to_array($xmls);
?>