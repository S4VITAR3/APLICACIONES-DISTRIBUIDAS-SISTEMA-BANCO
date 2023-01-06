<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style-deposito.css">
    <title>Deposito</title>
</head>

<?php

$nombre = "";

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
}

?>

<body>
    <div class="nav-bar">
        <div class="bienvenida">
            <?php echo $nombre ?>
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
        <h1 class="title">Deposito de efectivo</h1>

        <div class="img-enca"></div>

        <form action="../php/depositarUsuario.php" method="GET">
            <label for="" class="lbl-cuenta">No. Cuenta</label>
            <input type="text" name="no_cuenta" id="" class="input-cuenta">
            <br>
            <label for="" class="lbl-cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="" class="input-cantidad">

            <button class="btn-guardar" type="submit">
                <p class="lbl-boton">Depositar</p>
            </button>
        </form>
    </div>

</body>

</html>