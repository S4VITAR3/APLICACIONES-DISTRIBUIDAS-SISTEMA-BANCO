<?php 

session_start(); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style-dashboard.css">
    <title>Dashboard</title>
</head>

<?php

$nombre = "";

if(isset($_SESSION['nombre'])){
    $nombre = $_SESSION['nombre'];
}

?>

<body>
    <div class="nav-bar">
        <div class="bienvenida">
            <?php echo $nombre?>
        </div>

        <a href="./dashboard.php">
            <button class="btn-capturar">
                <p class="lbl-capturar">CAPTURAR</p>
            </button>
        </a>

        <a href="./depositar.php">
            <button class="btn-depositar">
                <p class="lbl-deposito">DEPOSITOS</p>
            </button>
        </a>

        <a href="../php/cerrarSesion.php">
            <button class="btn-salir">
                <p class="lbl-salir">SALIR</p>
            </button>
        </a>
    </div>


    <div class="contenedor">
        <h1 class="title">Capture los siguientes datos</h1>

        <form action="../php/registrarCliente.php" method="GET">
            <label for="" class="lbl-nombre">Nombre</label>
            <input type="text" name="nombre" id="" class="input-nombre">

            <label for="" class="lbl-apellidos">Apellido_Paterno</label>
            <input type="text" name="apellido_pa" id="" class="input-apellidos">

            <label for="" class="lbl-username">Username</label>
            <input type="text" name="username" id="" class="input-username">

            <label for="" class="lbl-contraseña">Apellido_Materno</label>
            <input type="text" name="apellido_ma" id="" class="input-contraseña">

            <label for="" class="lbl-cuenta">No. Cuenta</label>
            <input type="text" name="no_cuenta" id="" class="input-cuenta">

            <label for="" class="lbl-nip">NIP</label>
            <input type="text" name="nip" id="" class="input-nip">

            <label for="" class="lbl-estado">Rol</label>
            <input type="text" name="rol" id="" class="input-estado">

            <button class="btn-guardar" type="submit">
                <p class="lbl-boton">Guardar</p>
            </button>
        </form>
    </div>
</body>
</html>