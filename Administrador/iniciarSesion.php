<?php
session_start(); 
header('Access-Control-Allow-Origin: *');
$cuenta = $_GET['cuenta'];
$nip = $_GET['nip'];

$curl = curl_init(); //inicia la sesión cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://192.168.1.73:8080/ServidorRESTBanco/webresources/Aplicacion/login?no_cuenta=$cuenta&nip=$nip", //url a la que se conecta
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

} else {
    $objeto = json_decode($response, true);
    $numero_cuenta="";
    $nombre = "";
	$apellido_pa = "";
	$apellido_mat = " ";
	$nombre_completo = "";
    $nip = 0;
    $rol = "";

    foreach ($objeto as $index => $usuario) {
        $numero_cuenta = $usuario["numero_cuenta"];
        $nombre = $usuario["nombre"];
        $apellido_pa = $usuario["apellido_paterno"];
        $apellido_mat = $usuario["apellido_materno"];
        $nip = $usuario["nip"];
        $rol = $usuario["rol"];

    }

    $nombre_completo = $nombre . " " . $apellido_pa . " " . $apellido_mat;

    if($numero_cuenta != ""){
        if($rol == "Administrador"){
            $_SESSION['cuenta']=$numero_cuenta;
            $_SESSION['nombre']=$nombre_completo;
            $_SESSION['nip']=$nip;
            header("Location:panel.php");
        }else{
            echo"<script type='text/javascript'>
        alert('Rol no registrado para el sistema!');
        window.location.href='index.php';
        </script>";
        }
    }else{
        echo"<script type='text/javascript'>
        alert('Datos incorrectos!');
        window.location.href='index.php';
        </script>";
    }
}
?>