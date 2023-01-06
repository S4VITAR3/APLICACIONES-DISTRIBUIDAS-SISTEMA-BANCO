<?php
header('Access-Control-Allow-Origin: *');
$no_cuenta = $_GET['no_cuenta'];
$nombre = $_GET['nombre'];
$apellido_pa = $_GET['apellido_pa'];
$apellido_ma = $_GET['apellido_ma'];
$username = $_GET['username'];
$nip = $_GET['nip'];
$rol = $_GET['rol'];

$curl = curl_init(); //inicia la sesión cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://192.168.1.70:8080/ServidorRESTBanco/webresources/Aplicacion/agregarUsuario?numCuenta=$no_cuenta&nombre=$nombre&apellido_pa=$apellido_pa&apellido_ma=$apellido_ma&username=$username&nip=$nip&rol=$rol", //url a la que se conecta
    CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
    CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
    CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
    CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
    CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
    CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
)); //curl_setopt_array configura las opciones para una transferencia cURL

$response = curl_exec($curl); // respuesta generada
$err = curl_error($curl); // muestra errores en caso de existir

curl_close($curl);


if ($err) {
    echo "cURL Error #:" . $err; // mostramos el error

}else{
    if($response == true){
        echo"<script type='text/javascript'>
        alert('Cliente Registrado!');
        window.location.href='../index/dashboard.php';
        </script>";
    }else{
        echo"<script type='text/javascript'>
        alert('Error al registrar el cliente!');
        window.location.href='../index/dashboard.php';
        </script>";
    }
}



?>