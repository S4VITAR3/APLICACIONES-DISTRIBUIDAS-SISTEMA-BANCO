<?php
header('Access-Control-Allow-Origin: *');
$no_cuenta = $_GET['numero_cuenta'];
$nombre = $_GET['nombre'];
$apellido_pa = $_GET['apellido_paterno'];
$apellido_ma = $_GET['apellido_materno'];
$username = $_GET['username'];
$nip = $_GET['nip'];

$location = "http://192.168.1.73:8080/ServicioSoapActualizar/Servicio?wsdl";

$request = "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ws=\"http://WS/\">
   <soapenv:Header/>
   <soapenv:Body>
      <ws:update>
         <numero_cuenta>$no_cuenta</numero_cuenta>
         <!--Optional:-->
         <nombre>$nombre</nombre>
         <!--Optional:-->
         <apellido_paterno>$apellido_pa</apellido_paterno>
         <!--Optional:-->
         <apellido_materno>$apellido_ma</apellido_materno>
         <!--Optional:-->
         <username>$username</username>
         <nip>$nip</nip>
      </ws:update>
   </soapenv:Body>
</soapenv:Envelope>";

$action = "update";

$header = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: "update"'
];

$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch); // respuesta generada
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo"<script type='text/javascript'>
        alert('Error al actualizar la informacion!');
        window.location.href='panel.php';
        </script>";
}else{
    if($response == true){
        echo"<script type='text/javascript'>
        alert('Informacion actualizada!');
        window.location.href='panel.php';
        </script>";
    }else{
        echo"<script type='text/javascript'>
        alert('Error al actualizar la informacion!');
        window.location.href='panel.php';
        </script>";
    }
}


?>